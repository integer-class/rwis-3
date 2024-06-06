<?php

namespace App\Http\Controllers\information;

use App\Http\Controllers\Controller;
use App\Models\UmkmModel; // Correct class name
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $umkm = UmkmModel::all();
        return view('information.umkm.index', compact('umkm'));
    }

    public function archived()
    {
        $archivedUmkm = UmkmModel::where('is_archived', true)->get();
        return view('information.umkm.archived', compact('archivedUmkm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('information.umkm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'umkm_id' => 'required',
        'name' => 'required',
        'address' => 'required',
        'description' => 'required',
        'whatsapp_number' => 'required',
    ]);

    UmkmModel::create([
        'umkm_id' => $request->umkm_id,
        'name' => $request->name,
        'address' => $request->address,
        'description' => $request->description,
        'whatsapp_number' => $request->whatsapp_number,
        'is_archived' => false
    ]);

    return redirect('information/umkm')->with('success', 'UMKM has been added');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $umkm = UmkmModel::findOrFail($id);
        return view('information.umkm.show', compact('umkm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $umkm = UmkmModel::findOrFail($id);
        return view('information.umkm.edit', compact('umkm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        $umkm = UmkmModel::findOrFail($id);
        $umkm->update([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
        ]);

        return redirect('information/umkm')->with('success', 'UMKM has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $umkm = UmkmModel::findOrFail($id);
        $umkm->delete();

        return redirect('information/umkm')->with('success', 'UMKM has been deleted');
    }
}
