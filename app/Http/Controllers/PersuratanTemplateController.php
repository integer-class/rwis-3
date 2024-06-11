<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersuratanTemplate;
use Illuminate\Support\Facades\Storage;


class PersuratanTemplateController extends Controller
{
    // Menampilkan daftar semua template
    public function index()
    {
        $templates = PersuratanTemplate::all();
        return view('persuratan.templates.index', compact('templates'));
    }

    // Menampilkan form untuk membuat template baru
    public function create()
    {
        return view('persuratan.templates.create');
    }

    // Menyimpan template baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required',
            'jenis_surat' => 'required',
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $path = $request->file('file')->store('templates');

        PersuratanTemplate::create([
            'nama_dokumen' => $request->nama_dokumen,
            'jenis_surat' => $request->jenis_surat,
            'file_path' => $path,
            'is_archived' => false,
        ]);

        return redirect()->route('persuratan.templates.index');
    }

    // Menampilkan form untuk mengedit template
    public function edit($id)
    {
        $template = PersuratanTemplate::findOrFail($id);
        return view('persuratan.templates.edit', compact('template'));
    }

    // Memperbarui template yang ada di database
    public function update(Request $request, PersuratanTemplate $persuratanTemplate)
    {
        $request->validate([
            'nama_dokumen' => 'required',
            'jenis_surat' => 'required',
            'file' => 'mimes:pdf,doc,docx|max:2048',
        ]);

        $persuratanTemplate->nama_dokumen = $request->nama_dokumen;
        $persuratanTemplate->jenis_surat = $request->jenis_surat;

        if ($request->hasFile('file')) {
            Storage::delete($persuratanTemplate->file_path);
            $path = $request->file('file')->store('templates');
            $persuratanTemplate->file_path = $path;
        }

        $persuratanTemplate->save();

        return redirect()->route('persuratan.templates.index');
    }

    // Mengarsipkan template
    public function archive(PersuratanTemplate $persuratanTemplate)
    {
        $persuratanTemplate->is_archived = true;
        $persuratanTemplate->save();

        return redirect()->route('persuratan.templates.index');
    }

    public function archived()
    {
        // Logic to retrieve archived Persuratan Templates
        $archivedTemplates = PersuratanTemplate::where('is_archived', true)->get();

        // Return view with archived templates
        return view('persuratan.templates.archived', compact('archivedTemplates'));
    }
}
