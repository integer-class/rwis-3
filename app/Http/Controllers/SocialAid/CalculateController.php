<?php

namespace App\Http\Controllers\SocialAid;

use App\Enum\RangeIncomeResident;
use App\Http\Controllers\Controller;
use App\Models\HouseholdModel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CalculateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('social-aid.calculate.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'income_range_weight' => 'required|numeric',
            'family_number_weight' => 'required|numeric',
            'property_area_weight' => 'required|numeric',
            'productive_age_weight' => 'required|numeric',
            'non_productive_age_weight' => 'required|numeric',
        ]);

        $incomeRangeWeight = $request->income_range_weight;
        $familyNumberWeight = $request->family_number_weight;
        $propertyAreaWeight = $request->property_area_weight;
        $productiveAgeWeight = $request->productive_age_weight;
        $nonProductiveAgeWeight = $request->non_productive_age_weight;

        // step 1: create the decision matrix
        $households = HouseholdModel::with('residents')->get();
        $decisionMatrix = $households->map(function ($household) {
            $residents = $household->residents;
            $residentCount = $residents->count();
            $incomeRangeSum = $residents
                ->pluck('range_income')
                ->map(fn($range) => RangeIncomeResident::from($range)->asInt())
                ->sum();
            $productiveAge = $residents->where('date_of_birth', '>', now()->subYears(18))->count();
            $nonProductiveAge = $residentCount - $productiveAge;
            return [
                'household_id' => $household->household_id,
                'criteria' => collect([
                    'income_range' => $this->mapIncomeRange($incomeRangeSum),
                    'resident_count' => $this->mapResidentCount($residentCount),
                    'area' => $this->mapArea($household->area),
                    'productive_age' => $this->mapProductiveAge($productiveAge),
                    'non_productive_age' => $this->mapNonProductiveAge($nonProductiveAge),
                ]),
            ];
        });

        // step 2: create normalised decision matrix
        // we're applying the topsis method here, so the way we normalise it is using sum(pow(value, 2)) / sqrt(sum(pow(value, 2)))
        $normalisedDecisionMatrix = $decisionMatrix->map(function ($row) {
            $sumOfSquare = $row['criteria']->map(fn($value) => pow($value, 2))->sum();
            $sqrtOfSum = sqrt($sumOfSquare);
            return collect([
                'household_id' => $row['household_id'],
                'criteria' => $row['criteria']->map(fn($value) => $value / $sqrtOfSum),
            ]);
        });

        // step 3: calculate the weight
        $weight = [
            'income_range' => $incomeRangeWeight,
            'resident_count' => $familyNumberWeight,
            'area' => $propertyAreaWeight,
            'productive_age' => $productiveAgeWeight,
            'non_productive_age' => $nonProductiveAgeWeight,
        ];
        /** @var Collection $weightedNormalisedDecisionMatrix */
        $weightedNormalisedDecisionMatrix = $normalisedDecisionMatrix
            ->map(function ($value) use ($weight) {
                return [
                    'household_id' => $value['household_id'],
                    'criteria' => $value['criteria']->map(fn($value, $key) => $value * $weight[$key]),
                ];
            });

        // step 4: calculate the NIS (non ideal solution) and PIS (possible ideal solution)
        // PIS is the max value of the criteria, while NIS is the min value of the criteria
        // we iterate it by the criteria, not by the household
        // we'll also store their household_id so that we can use it to query the household later
        $solutions = ['nis' => [], 'pis' => []];
        $criteriaCount = $weightedNormalisedDecisionMatrix->first()['criteria']->count();
        $rowsCount = $weightedNormalisedDecisionMatrix->count();
        $colIdxToCriteria = ['income_range', 'resident_count', 'area', 'productive_age', 'non_productive_age'];
        for ($criteriaColIdx = 0; $criteriaColIdx < $criteriaCount; $criteriaColIdx++) {
            // we need to calculate the max and min value of the criteria using a regular for loop
            // this is because we're going to need the index of the row that we're iterating
            // so that we can return the household_id back
            for ($rowIdx = 0; $rowIdx < $rowsCount; $rowIdx++) {
                // since the criteria is using a string index, we need to map the idx into its key
                // there's probably a better way of doing it, but this is the simplest way
                // since in PHP, the order of the key is always guaranteed, unlike in most other languages
                // see: https://www.php.net/manual/en/language.types.array.php
                $columnName = $colIdxToCriteria[$criteriaColIdx];
                $currentValue = $weightedNormalisedDecisionMatrix[$rowIdx]['criteria'][$columnName];
                if (!isset($solutions['pis'][$columnName]) || $currentValue > $solutions['pis'][$columnName]['value']) {
                    $solutions['pis'][$columnName] = [
                        'value' => $currentValue,
                        'household_id' => $weightedNormalisedDecisionMatrix[$rowIdx]['household_id'],
                    ];
                }
                if (!isset($solutions['nis'][$columnName]) || $currentValue < $solutions['nis'][$columnName]['value']) {
                    $solutions['nis'][$columnName] = [
                        'value' => $currentValue,
                        'household_id' => $weightedNormalisedDecisionMatrix[$rowIdx]['household_id'],
                    ];
                }
            }
        }

        // step 5: calculate the distance to the solutions
        // it's basically the euclidean distance of each criterion to the NIS and PIS
        $distance = $weightedNormalisedDecisionMatrix->map(function ($row) use ($solutions, $colIdxToCriteria) {
            $nis = 0;
            $pis = 0;
            foreach ($colIdxToCriteria as $columnName) {
                $nis += pow($row['criteria'][$columnName] - $solutions['nis'][$columnName]['value'], 2);
                $pis += pow($row['criteria'][$columnName] - $solutions['pis'][$columnName]['value'], 2);
            }
            return [
                'household_id' => $row['household_id'],
                'nis' => sqrt($nis),
                'pis' => sqrt($pis),
            ];
        });

        // step 6: calculate the relative closeness to the ideal solution
        $relativeCloseness = $distance->map(function ($row) {
            return [
                'household_id' => $row['household_id'],
                'value' => $row['nis'] / ($row['nis'] + $row['pis']),
            ];
        });

        // step 7: sort the relative closeness and pick the top 10
        $sortedRelativeCloseness = $relativeCloseness->sortByDesc('value')->take(10);

        // final step: get the household data based on the sorted relative closeness from the database
        $households = HouseholdModel::with('familyHead')
            ->whereIn('household_id', $sortedRelativeCloseness->pluck('household_id'))
            ->paginate();

        return view('social-aid.calculate.index', [
            'rankedHouseholds' => $households
        ]);
    }

    // cost
    private function mapIncomeRange(int $incomeRange)
    {
        if ($incomeRange > 1 && $incomeRange < 5) return 1;
        if ($incomeRange > 5 && $incomeRange < 10) return 2;
        if ($incomeRange > 10 && $incomeRange < 15) return 3;
        if ($incomeRange > 15 && $incomeRange < 20) return 4;
        if ($incomeRange > 20 && $incomeRange < 25) return 5;
        return 6;
    }

    // cost
    private function mapArea(int $area)
    {
        if ($area > 20 && $area < 50) return 1;
        if ($area > 50 && $area < 100) return 2;
        if ($area > 100 && $area < 200) return 3;
        if ($area > 200 && $area < 500) return 4;
        if ($area > 500 && $area < 1000) return 5;
        return 6;
    }

    // benefit
    private function mapResidentCount(int $count)
    {
        if ($count > 1 && $count <= 3) return 1;
        if ($count > 3 && $count <= 5) return 2;
        if ($count > 5 && $count <= 7) return 3;
        return 4;
    }

    // cost
    private function mapProductiveAge(int $count)
    {
        if ($count > 1 && $count <= 3) return 1;
        if ($count > 3 && $count <= 5) return 2;
        if ($count > 5 && $count <= 7) return 3;
        return 4;
    }

    // benefit
    private function mapNonProductiveAge(int $count)
    {
        if ($count > 1 && $count <= 3) return 1;
        if ($count > 3 && $count <= 5) return 2;
        if ($count > 5 && $count <= 7) return 3;
        return 4;
    }
}
