@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mx-5 mt-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">UMKM</h3>
            <div class="flex w-full justify-between">
                <div class="breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ url('information') }}">Pusat Informasi</a></li>
                        <li><a href="{{ url('information/umkm') }}">UMKM</a></li>
                        <li>Ubah</li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <form action="{{ url('information/umkm/' . $umkm->umkm_id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col space-y-4 w-full form mr-3">
                @csrf
                {!! method_field('PUT') !!}
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
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name"
                        class="rounded-md border border-gray-300 p-2" placeholder="Enter UMKM Name" value="{{ old('name', $umkm->name) }}">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="address">Alamat</label>
                    <input type="text" name="address" id="address"
                        class="rounded-md border border-gray-300 p-2" placeholder="Enter UMKM Address" value="{{ old('name', $umkm->address) }}">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="description">Deskripsi</label>
                    <input type="text" name="description" id="description"
                        class="rounded-md border border-gray-300 p-2" placeholder="Enter UMKM Description" value="{{ old('name', $umkm->description) }}">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="whatsapp_number">Kontak</label>
                    <input type="text" name="whatsapp_number" id="contact" class="rounded-md border border-gray-300 p-2" placeholder="Enter Contact" value="{{ old('name', $umkm->whatsapp_number) }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Unggah Foto</label>
                    <input class="form-control" type="file" name="image" id="image" value="{{ old('name', $umkm->image) }}">
                </div>
                <div class="flex">
                    <button type="submit" class="add-btn btn-sm px-4 py-1.5 bg-blue-500 text-white rounded-md mt-5 w-1/6">Ubah</button>
                    <a class="add-btn btn-sm px-4 py-1.5 bg-blue-500 text-white rounded-md mt-5 w-1/6 mx-3 text-center"
                        href="{{ url('information/umkm') }}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
