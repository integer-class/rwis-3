<?php

namespace App\Http\Controllers\dataDigitalization;

use App\Http\Controllers\Controller;
use App\Models\HouseholdModel;
use App\Models\ResidentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HouseholdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        } else {
            return view('data-digitalization.household.index');
        }
    }

    public function archived()
    {
        if (!Auth::check()) {
            return redirect('/login');
        } else {
            return view('data-digitalization.household.archived');
        }
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
        if (!Auth::check()) {
            return redirect('/login');
        } else {
            $household = HouseholdModel::find($id);
            $resident = ResidentModel::with('household')
            ->where('household_id', $id)
            ->where('is_archived', false)
            ->get();

            return view('data-digitalization.household.show', ['household' => $household, 'resident' => $resident]);
        }
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
