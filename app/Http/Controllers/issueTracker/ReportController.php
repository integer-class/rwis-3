<?php

namespace App\Http\Controllers\issueTracker;

use App\Enum\ApprovalStatusIssueReport;
use App\Enum\StatusIssueReport;
use App\Http\Controllers\Controller;
use App\Models\IssueReportModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // display
        $issues = IssueReportModel::with('resident')
            ->where('is_archived', false)
            ->where('approval_status', ApprovalStatusIssueReport::Pending)
            ->get();
        $todo = $issues->groupBy('status')->get(StatusIssueReport::Todo->value);
        $onGoing = $issues->groupBy('status')->get(StatusIssueReport::OnGoing->value);
        $solved = $issues->groupBy('status')->get(StatusIssueReport::Solved->value);
        $invalid = $issues->groupBy('status')->get(StatusIssueReport::Invalid->value);
        $status = array_map(fn($case) => $case->value, StatusIssueReport::cases());

        return Auth::check() ? view('issue.report.index', ['todo' => $todo, 'onGoing' => $onGoing, 'solved' => $solved, 'invalid' => $invalid, 'status' => $status]) : redirect('/login');
    }

    public function archived()
    {
        $issue = IssueReportModel::with('resident')->where('is_archived', true)->where('approval_status', 'Approved')->get();
        return Auth::check() ? view('issue.report.archived', ['issue' => $issue]) : redirect('/login');
    }

    public function archive(string $id)
    {
        IssueReportModel::find($id)->update([
            'is_archived' => true
        ]);

        return redirect('issue/report')->with('success', 'Issue Report has been archived');
    }

    public function unarchive(string $id)
    {
        IssueReportModel::find($id)->update([
            'is_archived' => false
        ]);

        return redirect('issue/report/archived')->with('success', 'Issue Report has been unarchived');
    }

    public function update(Request $request, string $id)
    {
        IssueReportModel::find($id)->update([
            'status' => $request->status
        ]);

        return redirect('issue/report')->with('success', 'Issue Report has been updated');
    }
}
