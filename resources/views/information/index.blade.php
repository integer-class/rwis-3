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
            <a href="{{ url('information/facility') }}">
                <div
                    class="card card-side bg-base-100 shadow-xl mb-5 hover:text-white hover:bg-primary transition ease-in-out delay-150 hover:-translate-y-1 duration-300">
                    <div class="card-body flex justify-center">
                        <h2 class=" text-3xl font-bold">Facility Information</h2>
                        <div class="card-actions justify-start">
                        </div>
                    </div>
                    <figure><img src="{{ asset('img/facility.png') }}" alt="Movie" />
                    </figure>
                </div>
            </a>
            <a href="{{ url('information/umkm') }}">
                <div
                    class="card card-side bg-base-100 shadow-xl mb-5 hover:text-white hover:bg-primary transition ease-in-out delay-150 hover:-translate-y-1 duration-300">
                    <div class="card-body flex justify-center">
                        <h2 class=" text-3xl font-bold">UMKM Information</h2>
                        <div class="card-actions justify-start">
                        </div>
                    </div>
                    <figure><img src="{{ asset('img/umkm.png') }}" alt="Movie" />
                    </figure>
                </div>
            </a>
        </div>
    </div>
@endsection
