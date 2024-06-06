<?php

namespace App\Http\Controllers;

use App\Enum\RangeIncomeResident;
use App\Enum\StatusIssueReport;
use App\Models\CashMutationModel;
use App\Models\Facility;
use App\Models\HouseholdModel;
use App\Models\IssueReportModel;
use App\Models\ResidentModel;
use App\Models\UmkmModel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
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
        $genders = ResidentModel::query()
            ->select('gender')
            ->get()
            ->groupBy('gender')
            ->map(function ($item, $key) {
                return ['gender' => $key, 'count' => count($item)];
            })
            ->values();
        $ageGroups = DB::table('resident')
            ->select(
                DB::raw('EXTRACT(YEAR FROM AGE(NOW(), date_of_birth)) AS age'),
            )
            ->get()
            ->groupBy(function ($item) {
                return $item->age >= 15 && $item->age <= 64 ? 'Produktif' : 'Tidak Produktif';
            })
            ->map(function ($item, $key) {
                return ['group' => $key, 'count' => count($item)];
            })
            ->values();
        $mutations = CashMutationModel::query()
            ->select(['amount', 'created_at', 'description'])
            ->orderBy('created_at')
            ->get()
            ->map(function ($item) {
                return [
                    'amount' => $item->amount,
                    'description' => $item->description,
                    'created_at' => $item->created_at->format('Y-m-d'),
                ];
            })
            ->groupBy('created_at')
            ->map(function ($item, $key) {
                return [
                    'date' => $key,
                    'total' => $item->sum('amount'),
                ];
            })
            ->take(100)
            ->values();
        $totalResidents = ResidentModel::query()->count();
        $totalHouseholds = HouseholdModel::query()->count();
        $totalReports = IssueReportModel::query()->count();
        $totalFacilities = Facility::query()->count();
        $totalUmkm = UmkmModel::query()->count();
        $totalReportToDo = IssueReportModel::query()->where('status', StatusIssueReport::Todo)->count();
        $totalReportOnGoing = IssueReportModel::query()->where('status', StatusIssueReport::OnGoing)->count();
        $totalReportSolved = IssueReportModel::query()->where('status', StatusIssueReport::Solved)->count();
        $totalReportInvalid = IssueReportModel::query()->where('status', StatusIssueReport::Invalid)->count();
        return view('dashboard', [
            'residentIncomes' => $residentIncomes,
            'genders' => $genders,
            'totalResidents' => $totalResidents,
            'totalHouseholds' => $totalHouseholds,
            'totalReports' => $totalReports,
            'totalFacilities' => $totalFacilities,
            'totalUmkm' => $totalUmkm,
            'ageGroups' => $ageGroups,
            'mutations' => $mutations,
            'totalReportToDo' => $totalReportToDo,
            'totalReportOnGoing' => $totalReportOnGoing,
            'totalReportSolved' => $totalReportSolved,
            'totalReportInvalid' => $totalReportInvalid,
        ]);
    }
}
