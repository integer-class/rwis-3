<?php

namespace App\Http\Controllers\broadcast;

use App\Http\Controllers\Controller;
use App\Models\BroadcastTemplateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

class BroadcastTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Auth::check() ? view('broadcast.template.index') : redirect('login');
    }

    public function archived()
    {
        return Auth::check() ? view('broadcast.template.archived') : redirect('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Auth::check() ? view('broadcast.template.create') : redirect('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'fields' => 'required|array',
            'type' => 'required',
        ]);

        BroadcastTemplateModel::create([
            'text' => $request->text,
            'fields' => $request->fields,
            'type' => $request->type,
        ]);

        return redirect('broadcast/template')->with('success', 'Template has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $template = BroadcastTemplateModel::find($id);
        $fields = is_array($template->fields) ? implode(', ', $template->fields) : $template->fields;
        return Auth::check() ? view('broadcast.template.show', ['template' => $template, 'fields' => $fields]) : redirect('login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $template = BroadcastTemplateModel::find($id);
        return Auth::check() ? view('broadcast.template.edit', ['template' => $template]) : redirect('login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'text' => 'required',
            'fields' => 'required|array',
            'type' => 'required',
        ]);

        $template = BroadcastTemplateModel::find($id);
        $template->update([
            'text' => $request->text,
            'fields' => $request->fields,
            'type' => $request->type,
        ]);

        return redirect('broadcast/template')->with('success', 'Template has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
