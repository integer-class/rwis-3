<?php

namespace App\Http\Controllers\Broadcast;

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
        return view('broadcast.template.index');
    }

    public function archived()
    {
        return view('broadcast.template.archived');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('broadcast.template.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'fillable_fields' => 'required|array',
            'type' => 'required',
        ]);

        BroadcastTemplateModel::create([
            'text' => $request->text,
            'fillable_fields' => $request->fillable_fields,
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
        $fields = is_array($template->fillable_fields) ? implode(', ', $template->fillable_fields) : $template->fillable_fields;
        return view('broadcast.template.show', ['template' => $template, 'fields' => $fields]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $template = BroadcastTemplateModel::find($id);
        return view('broadcast.template.edit', ['template' => $template]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'text' => 'required',
            'fillable_fields' => 'required|array',
            'type' => 'required',
        ]);

        $template = BroadcastTemplateModel::find($id);
        $template->update([
            'text' => $request->text,
            'fillable_fields' => $request->fillable_fields,
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
