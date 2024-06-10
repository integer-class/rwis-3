@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mx-5 mt-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Fasilitas</h3>
            <div class="flex w-full justify-between">
                <div class="breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ url('information') }}">Pusat Informasi</a></li>
                        <li><a href="{{ url('information/facility') }}">Fasilitas</a></li>
                        <li>Detail</li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <div class="border-t border-gray-200 mb-5">
                <dl>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Nama Fasilitas</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $facility->name }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $facility->address }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Deskripsi</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $facility->description }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Image</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                            @if($facility->image)
                            <img src="{{ asset($facility->image) }}" alt="Facility Image" class="w-full">
                            @else
                                Tidak ada foto yang tersedia
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>
            <a class="add-btn btn-lg px-4 py-1.5 bg-blue-500 text-white rounded-md mt-5" href="{{ url('information/facility') }}">Kembali</a>
        </div>
    </div>
@endsection
