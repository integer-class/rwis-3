<?php

namespace App\Http\Controllers\dataDigitalization\bookKeeping;

use App\Http\Controllers\Controller;
use App\Models\AccountModel;
use App\Models\HouseholdModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data-digitalization.book-keeping.account.index');
    }

    public function archived()
    {
        return view('data-digitalization.book-keeping.account.archived');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $household = HouseholdModel::all();
        return view('data-digitalization.book-keeping.account.create', ['household' => $household]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'household_id' => 'required',
            'name_account' => 'required',
            'number_account' => 'required|numeric',
            'balance' => 'required',
        ]);

        AccountModel::create([
            'household_id' => $request->household_id,
            'name_account' => $request->name_account,
            'number_account' => $request->number_account,
            'balance' => $request->balance,
            'is_archived' => false,
        ]);
        return redirect('/data/bookkeeping/account')->with('success', 'Account has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $account = AccountModel::find($id);
        return view('data-digitalization.book-keeping.account.show', ['account' => $account]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $account = AccountModel::find($id);
        $household = HouseholdModel::all();
        return view('data-digitalization.book-keeping.account.edit', ['account' => $account, 'household' => $household]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'household_id' => 'required',
            'name_account' => 'required',
            'number_account' => 'required|numeric',
            'balance' => 'required',
        ]);

        AccountModel::find($id)->update([
            'household_id' => $request->household_id,
            'name_account' => $request->name_account,
            'number_account' => $request->number_account,
            'balance' => $request->balance,
            'is_archived' => 'false'
        ]);
        return redirect('/data/bookkeeping/account')->with('success', 'Account has been updated');
    }
}
