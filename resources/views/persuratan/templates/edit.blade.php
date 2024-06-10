@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Edit Template Persuratan</h3>
            <div class="flex w-full justify-between">
                <div class="breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ route('persuratan.index') }}">Home</a></li>
                        <li><a href="{{ route('persuratan.templates.index') }}">Template Persuratan</a></li>
                        <li>Edit Template</li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <form action="{{ route('persuratan.templates.update', $template->persuratan_template_id) }}" method="POST" class="flex flex-col space-y-4 w-full form mr-3" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if ($errors->any())
                    <div class="bg-red-100 text-red-500 p-2 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="flex flex-col space-y-1">
                    <label for="nama_dokumen">Nama Dokumen</label>
                    <input type="text" name="nama_dokumen" id="nama_dokumen" class="rounded-md border border-gray-300 p-2" value="{{ $template->nama_dokumen }}" placeholder="Masukkan Nama Dokumen">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="jenis_surat">Jenis Surat</label>
                    <input type="text" name="jenis_surat" id="jenis_surat" class="rounded-md border border-gray-300 p-2" value="{{ $template->jenis_surat }}" placeholder="Masukkan Jenis Surat">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="file_path">Upload Dokumen Baru (Opsional)</label>
                    <input type="file" name="file_path" id="file_path" class="rounded-md border border-gray-300 p-2">
                </div>
                <div class="flex">
                    <button type="submit" class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6">Edit</button>
                    <a class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6 mx-3 text-center"
                        href="{{ route('persuratan.templates.index') }}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
