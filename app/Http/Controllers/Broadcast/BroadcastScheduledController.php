<?php

namespace App\Http\Controllers\Broadcast;

use App\Http\Controllers\Controller;
use App\Jobs\SendBroadcast;
use App\Models\BroadcastTemplateModel;
use App\Models\ResidentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class BroadcastScheduledController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('broadcast.scheduled.index');
    }

    public function send(BroadcastTemplateModel $template)
    {
        $markup = $template->text;
        foreach ($template->fillable_fields as $placeholder) {
            $markup = str_replace('{' . $placeholder . '}', '<span contenteditable class="placeholder-input" size="' . strlen($placeholder) . '" name="' . $placeholder . '" type="text">[' . $placeholder . ']</span>', $markup);
        }
        $residentPhoneNumbers = ResidentModel::query()->select(['full_name', 'whatsapp_number'])->orderBy('full_name')->get();
        return view('broadcast.send', [
            'template' => $template,
            'markup' => $markup,
            'residentPhoneNumbers' => $residentPhoneNumbers
        ]);
    }

    public function sendBroadcast(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'numbers' => 'required',
        ]);

        $numbers = explode(',', $request->numbers);
        foreach ($numbers as $number) {
            SendBroadcast::dispatch($request->message, $number);
        }

        return redirect()->route('broadcast.template.index')->with('success', 'Broadcast message has been sent!');
    }

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
