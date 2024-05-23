<?php

namespace App\Http\Controllers\issueTracker;

use App\enum\StatusIssueReport;
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
        $todo = IssueReportModel::with('resident')->where('status', 'To do')->where('is_archived', false)->where('approval_status', 'Approved')->get();
        $onGoing = IssueReportModel::with('resident')->where('status', 'On Going')->where('is_archived', false)->where('approval_status', 'Approved')->get();
        $solved = IssueReportModel::with('resident')->where('status', 'Solved')->where('is_archived', false)->where('approval_status', 'Approved')->get();
        $invalid = IssueReportModel::with('resident')->where('status', 'Invalid')->where('is_archived', false)->where('approval_status', 'Approved')->get();
        $status = array_map(fn ($case) => $case->value, StatusIssueReport::cases());

        return Auth::check() ? view('issue.report.index', ['todo' => $todo, 'onGoing' => $onGoing, 'solved' => $solved, 'invalid' => $invalid, 'status' => $status]) : redirect('/login');
    }

    public function archived()
    {
        $issue = IssueReportModel::with('resident')->where('is_archived', true)->where('approval_status', 'Approved')->get();
        return Auth::check() ? view('issue.report.archived', ['issue' => $issue]) : redirect('/login');
    }

    public function archive(string $id) {
        IssueReportModel::find($id)->update([
            'is_archived' => true
        ]);

        return redirect('issue/report')->with('success', 'Issue Report has been archived');
    }

    public function unarchive(string $id) {
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
