<?php

namespace App\Http\Controllers\user;

use App\Enum\ApprovalStatusIssueReport;
use App\Enum\StatusIssueReport;
use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\IssueReportModel;
use App\Models\UmkmModel;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function facility()
    {
        $data = Facility::all();
        return view('user-layout.facility', compact('data'));
    }

    public function umkm()
    {
        $dataumkm = UmkmModel::class::all();
        return view('user-layout.umkm', compact('dataumkm'));
    }

    public function issue()
    {
        // display
        $issues = IssueReportModel::with('resident')
            ->where('is_archived', false)
            ->where('approval_status', ApprovalStatusIssueReport::Approved)
            ->get();

        $groupedIssues = $issues->groupBy('status');

        $todo = $groupedIssues->get(StatusIssueReport::Todo->value, collect());
        $onGoing = $groupedIssues->get(StatusIssueReport::OnGoing->value, collect());
        $solved = $groupedIssues->get(StatusIssueReport::Solved->value, collect());
        $invalid = $groupedIssues->get(StatusIssueReport::Invalid->value, collect());
        $status = array_map(fn ($case) => $case->value, StatusIssueReport::cases());
        return view('user-layout.issue', ['todo' => $todo, 'onGoing' => $onGoing, 'solved' => $solved, 'invalid' => $invalid, 'status' => $status]);
    }
}
