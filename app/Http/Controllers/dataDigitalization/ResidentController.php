<?php

namespace App\Http\Controllers\dataDigitalization;

use App\Enum\GenderResident;
use App\Enum\MarriageStatusResident;
use App\Enum\NationalityResident;
use App\Enum\RangeIncomeResident;
use App\Enum\ReligionResident;
use App\Http\Controllers\Controller;
use App\Models\HouseholdModel;
use App\Models\ResidentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Auth::check() ? view('data-digitalization.resident.index') : redirect('/login');
    }

    public function archived()
    {
        return Auth::check() ? view('data-digitalization.resident.archived') : redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gender = array_map(fn ($case) => $case->value, GenderResident::cases());
        $religion = array_map(fn ($case) => $case->value, ReligionResident::cases());
        $marriageStatus = array_map(fn ($case) => $case->value, MarriageStatusResident::cases());
        $nationality = array_map(fn ($case) => $case->value, NationalityResident::cases());
        $range_income = array_map(fn ($case) => $case->value, RangeIncomeResident::cases());
        $household = HouseholdModel::all();
        return Auth::check() ? view('data-digitalization.resident.create', ['gender' => $gender, 'religion' => $religion, 'marriageStatus' => $marriageStatus, 'nationality' => $nationality, 'household' => $household, 'range_income' => $range_income]) : redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'household_id' => 'required',
            'nik' => 'required|numeric|digits:16',
            'full_name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'blood_type' => 'required',
            'religion' => 'required',
            'marriage_status' => 'required',
            'nationality' => 'required',
            'range_income' => 'required',
            'job' => 'required',
            'whatsapp_number' => 'required',
        ]);

        ResidentModel::create([
            'household_id' => $request->household_id,
            'nik' => $request->nik,
            'full_name' => $request->full_name,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'blood_type' => $request->blood_type,
            'religion' => $request->religion,
            'marriage_status' => $request->marriage_status,
            'nationality' => $request->nationality,
            'range_income' => $request->range_income,
            'job' => $request->job,
            'whatsapp_number' => $request->whatsapp_number,
            'is_archived' => false
        ]);

        return redirect('data/resident')->with('success', 'Resident has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resident = ResidentModel::with('household')->find($id);
        return Auth::check() ? view('data-digitalization.resident.show', ['resident' => $resident]) : redirect('/login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gender = array_map(fn ($case) => $case->value, GenderResident::cases());
        $religion = array_map(fn ($case) => $case->value, ReligionResident::cases());
        $marriageStatus = array_map(fn ($case) => $case->value, MarriageStatusResident::cases());
        $nationality = array_map(fn ($case) => $case->value, NationalityResident::cases());
        $range_income = array_map(fn ($case) => $case->value, RangeIncomeResident::cases());
        $household = HouseholdModel::all();
        $resident = ResidentModel::find($id);
        return Auth::check() ? view('data-digitalization.resident.edit', ['resident' => $resident, 'gender' => $gender, 'religion' => $religion, 'marriageStatus' => $marriageStatus, 'nationality' => $nationality, 'household' => $household, 'range_income' => $range_income]) : redirect('/login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'household_id' => 'required',
            'nik' => 'required|numeric|digits:16',
            'full_name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'blood_type' => 'required',
            'religion' => 'required',
            'marriage_status' => 'required',
            'nationality' => 'required',
            'range_income' => 'required',
            'job' => 'required',
            'whatsapp_number' => 'required',
        ]);

        ResidentModel::find($id)->update([
            'household_id' => $request->household_id,
            'nik' => $request->nik,
            'full_name' => $request->full_name,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'blood_type' => $request->blood_type,
            'religion' => $request->religion,
            'marriage_status' => $request->marriage_status,
            'nationality' => $request->nationality,
            'range_income' => $request->range_income,
            'job' => $request->job,
            'whatsapp_number' => $request->whatsapp_number,
            'is_archived' => false
        ]);

        return redirect('data/resident')->with('success', 'Resident has been updated');
    }
}
