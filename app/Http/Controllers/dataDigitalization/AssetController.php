<?php

namespace App\Http\Controllers\dataDigitalization;

use App\Http\Controllers\Controller;
use App\Models\AssetModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Auth::check() ? view('data-digitalization.asset.index') : redirect('/login');
    }

    public function archived()
    {
        return Auth::check() ? view('data-digitalization.asset.archived') : redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Auth::check() ? view('data-digitalization.asset.create') : redirect('/login');
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
        $asset = AssetModel::with('household')->find($id);
        return Auth::check() ? view('data-digitalization.asset.show', ['asset' => $asset]) : redirect('/login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Auth::check() ? view('data-digitalization.asset.edit') : redirect('/login');
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
