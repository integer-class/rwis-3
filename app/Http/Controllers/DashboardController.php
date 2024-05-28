<?php

namespace App\Http\Controllers;

use App\Enum\RangeIncomeResident;
use App\Models\ResidentModel;
use function Symfony\Component\String\s;

class DashboardController extends Controller
{
    public function index()
    {
        // sort the order manually because the range_income is a string
        $residentIncomes = ResidentModel::query()
            ->select('range_income')
            ->get()
            ->groupBy('range_income')
            ->reduce(function ($carry, $item, $key) {
                $index = match (RangeIncomeResident::from($key)) {
                    RangeIncomeResident::Group1 => 0,
                    RangeIncomeResident::Group2 => 1,
                    RangeIncomeResident::Group3 => 2,
                    RangeIncomeResident::Group4 => 3,
                    RangeIncomeResident::Group5 => 4,
                    default => 5,
                };
                $carry[$index] = ['range' => $key, 'count' => count($item)];
                return $carry;
            }, collect())
            ->sortKeys()
            ->values();
        return view('dashboard', [
            'residentIncomes' => $residentIncomes
        ]);
    }
}
