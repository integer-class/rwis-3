<?php

namespace App\Http\Controllers\social;

use App\Http\Controllers\Controller;
use App\Models\HouseholdModel;
use App\Models\ResidentModel;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('social.calculate.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'income_range_weight' => 'required|numeric',
            'family_number_weight' => 'required|numeric',
            'property_area_weight' => 'required|numeric',
            'productive_age_weight' => 'required|numeric',
        ]);

        $incomeRangeWeight = $request->income_range_weight;
        $familyNumberWeight = $request->family_number_weight;
        $propertyAreaWeight = $request->property_area_weight;
        $productiveAgeWeight = $request->productive_age_weight;

        // create the decision matrix, screw with n+1 query for now
        $households = HouseholdModel::query()->all();
        $decisionMatrix = [];
        foreach ($households as $household) {
            $residents = ResidentModel::where('household_id', $household->id)->get();
            $residentCount = $residents->count();
            $incomeRangeSum = $residents->pluck('range_income')->sum();
            $productiveAge = $residents->where('date_of_birth', '>', now()->subYears(18))->count();
            $nonProductiveAge = $residentCount - $productiveAge;

            // map each criteria into decision matrix
            $decisionMatrix[] = [
                $this->mapIncomeRange($incomeRangeSum),
                $this->mapResidentCount($residentCount),
                $this->mapArea($household->area),
                $this->mapProductiveAge($productiveAge)
            ];
        }

        // calculate the weight
        $weight = [
            $incomeRangeWeight,
            $familyNumberWeight,
            $propertyAreaWeight,
            $productiveAgeWeight
        ];
        $numResidents = sizeof($decisionMatrix);
        $numCriteria = sizeof($decisionMatrix[0]);
        // apply the weight
        $weightedDecisionMatrix = [];
        foreach ($decisionMatrix as $row) {
            $weightedRow = [];
            for ($i = 0; $i < $numCriteria; $i++) {
                $weightedRow[] = $row[$i] * $weight[$i];
            }
        }

        // calculate the NIS and PIS
        $NIS = [];
        $PIS = [];
        for ($i = 0; $i < $numCriteria; $i++) {
            $NIS[] = min(array_column($weightedDecisionMatrix, $i));
            $PIS[] = max(array_column($weightedDecisionMatrix, $i));
        }

        // calculate the distance
        $distance = [];
        foreach ($weightedDecisionMatrix as $row) {
            $distance[] = sqrt(array_sum(array_map(function ($x, $y) {
                return pow($x - $y, 2);
            }, $row, $NIS)));
        }

        // calculate the closeness
        $closeness = [];
        foreach ($distance as $d) {
            $closeness[] = 1 / ($d + array_sum($distance));
        }

        // rank
        $rank = array_keys(array_reverse($closeness));
        $households = HouseholdModel::query()->whereIn('id', $rank)->get();

        return view('social.calculate.index', [
            'households' => $households
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
}
