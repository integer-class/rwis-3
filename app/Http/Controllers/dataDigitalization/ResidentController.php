<?php

namespace App\Http\Controllers\dataDigitalization;

use App\enum\GenderResident;
use App\enum\IsArchived;
use App\enum\MarriageStatusResident;
use App\enum\NationalityResident;
use App\enum\ReligionResident;
use App\Http\Controllers\auth\CheckController;
use App\Http\Controllers\Controller;
use App\Models\ResidentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        if (!Auth::check()) {
            return redirect('/login');
        } else {
            $resident = ResidentModel::all();
            return view('data-digitalization.resident.index', ['resident' => $resident]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gender = array_map(fn($case) => $case->value, GenderResident::cases());
        $religion = array_map(fn($case) => $case->value, ReligionResident::cases());
        $marriageStatus = array_map(fn($case) => $case->value, MarriageStatusResident::cases());
        $nationality = array_map(fn($case) => $case->value, NationalityResident::cases());
        $isArchived = IsArchived::False;
        return view('data-digitalization.resident.create', ['gender' => $gender, 'religion' => $religion, 'marriageStatus' => $marriageStatus, 'nationality' => $nationality, 'isArchived' => $isArchived]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|digits:16',
            'full_name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'blood_type' => 'required',
            'religion' => 'required',
            'marriage_status' => 'required',
            'nationality' => 'required',
            'income' => 'required',
            'whatsapp_number' => 'required',
            'is_archived' => 'required',
        ]);

        ResidentModel::create([
            'nik' => $request->nik,
            'full_name' => $request->full_name,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'blood_type' => $request->blood_type,
            'religion' => $request->religion,
            'marriage_status' => $request->marriage_status,
            'nationality' => $request->nationality,
            'income' => $request->income,
            'whatsapp_number' => $request->whatsapp_number,
            'is_archived' => $request->is_archived
        ]);

        return redirect('/resident')->with('success', 'Resident has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resident = ResidentModel::find($id);

        return view('data-digitalization.resident.show', ['resident' => $resident]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gender = array_map(fn($case) => $case->value, GenderResident::cases());
        $religion = array_map(fn($case) => $case->value, ReligionResident::cases());
        $marriageStatus = array_map(fn($case) => $case->value, MarriageStatusResident::cases());
        $nationality = array_map(fn($case) => $case->value, NationalityResident::cases());
        $isArchived = IsArchived::False;

        $resident = ResidentModel::find($id);

        return view('data-digitalization.resident.edit', ['resident' => $resident, 'gender' => $gender, 'religion' => $religion, 'marriageStatus' => $marriageStatus, 'nationality' => $nationality, 'isArchived' => $isArchived]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nik' => 'required|numeric|digits:16',
            'full_name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'blood_type' => 'required',
            'religion' => 'required',
            'marriage_status' => 'required',
            'nationality' => 'required',
            'income' => 'required',
            'whatsapp_number' => 'required',
            'is_archived' => 'required',
        ]);

        ResidentModel::find($id)->update([
            'nik' => $request->nik,
            'full_name' => $request->full_name,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'blood_type' => $request->blood_type,
            'religion' => $request->religion,
            'marriage_status' => $request->marriage_status,
            'nationality' => $request->nationality,
            'income' => $request->income,
            'whatsapp_number' => $request->whatsapp_number,
            'is_archived' => $request->is_archived
        ]);

        return redirect('/resident')->with('success', 'Resident has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
