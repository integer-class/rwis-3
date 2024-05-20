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
        return Auth::check() ? view('data-digitalization.household.index') : redirect('/login');
    }

    public function archived()
    {
        return Auth::check() ? view('data-digitalization.household.archived') : redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $familyHead = ResidentModel::all();
        return Auth::check() ? view('data-digitalization.household.create', ['familyHead' => $familyHead]) : redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'number_kk' => 'required|numeric|digits:16',
            'resident_id' => 'required',
            'address' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'sub_district' => 'required',
            'district' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required|numeric',
            'area' => 'required',
        ]);

        HouseholdModel::create([
            'number_kk' => $request->number_kk,
            'resident_id' => $request->resident_id,
            'address' => $request->address,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'sub_district' => $request->sub_district,
            'district' => $request->district,
            'city' => $request->city,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
            'area' => $request->area,
            'is_archived' => false,
        ]);
        return redirect('data/household')->with('success', 'Household has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $household = HouseholdModel::with('familyHead')->find($id);
        // $household = HouseholdModel::find($id);
        $resident = ResidentModel::with('household')
        ->where('household_id', $id)
        ->where('is_archived', false)
        ->get();
        return Auth::check() ? view('data-digitalization.household.show', ['household' => $household, 'resident' => $resident]) : redirect('/login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $familyHead = ResidentModel::all();
        $household = HouseholdModel::find($id);
        return Auth::check() ? view('data-digitalization.household.edit', ['household' => $household, 'familyHead' => $familyHead]) : redirect('/login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'number_kk' => 'required|numeric|digits:16',
            'resident_id' => 'required',
            'address' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'sub_district' => 'required',
            'district' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required|numeric',
            'area' => 'required',
        ]);

        HouseholdModel::find($id)->update([
            'number_kk' => $request->number_kk,
            'resident_id' => $request->resident_id,
            'address' => $request->address,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'sub_district' => $request->sub_district,
            'district' => $request->district,
            'city' => $request->city,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
            'area' => $request->area,
            'is_archived' => false,
        ]);

        return redirect('data/household')->with('success', 'Household has been updated');
    }
}
