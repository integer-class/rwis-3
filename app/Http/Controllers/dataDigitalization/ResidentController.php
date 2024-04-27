<?php

namespace App\Http\Controllers\dataDigitalization;

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

    // public function list(Request $request) {
    //     $resident = ResidentModel::select('resident_id', 'nik', 'full_name', 'place_of_birth', 'date_of_birth', 'gender', 'blood_type', 'religion', 'marriage_status', 'nationality', 'income', 'whatsapp_number', 'is_archived');

    //     return DataTables::of($resident)
    //         ->addIndexColumn()
    //         ->addColumn('action', function ($resident) {
    //             $btn = '<a href="'.url('/resident/' . $resident->resident_id).'" class="btn btn-info btn-sm">Detail</a> ';
    //             $btn .= '<a href="'.url('/resident/' . $resident->resident_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
    //             $btn .= '<form class="d-inline-block" method="POST" action="'.url('/resident/'.$resident->resident_id).'">'
    //                 . csrf_field() . method_field('DELETE') .
    //                 '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure to delete this data?\');">Delete</button></form>';
    //             return $btn;
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }

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
