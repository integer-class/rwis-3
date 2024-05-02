<?php

namespace App\Http\Controllers\dataDigitalization\bookKeeping;

use App\Http\Controllers\Controller;
use App\Models\AccountModel;
use App\Models\CashMutationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashMutationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Auth::check() ? view('data-digitalization.book-keeping.cash-mutation.index') : redirect('/login');
    }

    public function archived()
    {
        return Auth::check() ? view('data-digitalization.book-keeping.cash-mutation.archived') : redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cash_mutation_code = "CM-" . date('Ymd') . "-" . str_pad(CashMutationModel::count() + 1, 4, '0', STR_PAD_LEFT);
        $account = AccountModel::all();
        return Auth::check() ? view('data-digitalization.book-keeping.cash-mutation.create', ['account' => $account, 'cash_mutation_code' => $cash_mutation_code]) : redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cash_mutation_code' => 'required',
            'account_debit_id' => 'required',
            'debit' => 'required',
            'account_credit_id' => 'required',
            'credit' => 'required',
            'description' => 'required',
        ]);

        AccountModel::find($request->account_debit_id)->update([
            'balance' => AccountModel::find($request->account_debit_id)->balance + $request->debit
        ]);

        AccountModel::find($request->account_credit_id)->update([
            'balance' => AccountModel::find($request->account_credit_id)->balance - $request->credit
        ]);

        CashMutationModel::create([
            'cash_mutation_code' => $request->cash_mutation_code,
            'account_debit_id' => $request->account_debit_id,
            'debit' => $request->debit,
            'account_credit_id' => $request->account_credit_id,
            'credit' => $request->credit,
            'description' => $request->description,
            'is_archived' => false
        ]);
        return redirect('/data/bookkeeping/cash')->with('success', 'Cash Mutation has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cashMutation = CashMutationModel::find($id);
        return Auth::check() ? view('data-digitalization.book-keeping.cash-mutation.show', compact('cashMutation')) : redirect('/login');
    }
}
