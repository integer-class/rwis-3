@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Information Centre</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ url('information') }}">Home</a></li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <div class="card card-side bg-base-100 shadow-xl mb-5">
                <div class="card-body">
                    <h2 class=" text-3xl">Facility Information</h2>
                    <p>Click the button to see facility information data.</p>
                    <div class="card-actions justify-start">
                        <a href="{{ url('information/facility') }}"
                        class="add-btn text-white rounded-md btn hover:bg-primary w-1/6">Go</a>
                    </div>
                </div>
                <figure><img src="{{ asset('img/household.png') }}" alt="Movie" />
                </figure>
            </div>
            <div class="card card-side bg-base-100 shadow-xl mb-5">
                <div class="card-body">
                    <h2 class=" text-3xl">UMKM Information</h2>
                    <p>Click the button to see umkm data.</p>
                    <div class="card-actions justify-start">
                        <a href="{{ url('information/umkm') }}"
                        class="add-btn text-white rounded-md btn hover:bg-primary w-1/6">Go</a>
                    </div>
                </div>
                <figure><img src="{{ asset('img/resident.png') }}" alt="Movie" />
                </figure>
            </div>
        </div>
    </div>
@endsection
