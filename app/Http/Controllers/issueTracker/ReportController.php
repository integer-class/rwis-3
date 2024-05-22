<?php

namespace App\Http\Controllers\issueTracker;

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
        $todo = IssueReportModel::with('resident')->where('status', 'To do')->get();
        $inProgress = IssueReportModel::with('resident')->where('status', 'In Progress')->get();
        $inReview = IssueReportModel::with('resident')->where('status', 'In Review')->get();
        $done = IssueReportModel::with('resident')->where('status', 'Done')->get();
        return Auth::check() ? view('issue.report.index', ['todo' => $todo, 'inProgress' => $inProgress, 'inReview' => $inReview, 'done' => $done]) : redirect('/login');
    }

    public function archived()
    {
        return Auth::check() ? view('issue.report.archived') : redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
