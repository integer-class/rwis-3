@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Data Digitalization</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ url('data') }}">Home</a></li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            @if (session('success'))
                <div role="alert" class="alert alert-info mb-3 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div role="alert" class="alert alert-error mb-3 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            {{-- Menu --}}
            <div class="card card-side bg-base-100 shadow-xl mb-5">
                <div class="card-body">
                    <h2 class=" text-3xl">Resident</h2>
                    {{-- create <p> description for resident  --}}
                    <p>Click the button to see resident data.</p>
                    <div class="card-actions justify-start">
                        <a href="{{ url('data/resident') }}"
                        class="add-btn text-white rounded-md btn hover:bg-primary w-1/6">Go</a>
                    </div>
                </div>
                <figure><img src="{{ asset('img/resident.png') }}" alt="Movie" />
                </figure>
            </div>
            <div class="card card-side bg-base-100 shadow-xl mb-5">
                <div class="card-body">
                    <h2 class=" text-3xl">Household</h2>
                    <p>Click the button to see household data.</p>
                    <div class="card-actions justify-start">
                        <a href="{{ url('data/household') }}"
                        class="add-btn text-white rounded-md btn hover:bg-primary w-1/6">Go</a>
                    </div>
                </div>
                <figure><img src="{{ asset('img/household.png') }}" alt="Movie" />
                </figure>
            </div>
            <div class="card card-side bg-base-100 shadow-xl mb-5">
                <div class="card-body">
                    <h2 class=" text-3xl">Asset</h2>
                    <p>Click the button to see asset data.</p>
                    <div class="card-actions justify-start">
                        <a href="{{ url('data/asset') }}"
                        class="add-btn text-white rounded-md btn hover:bg-primary w-1/6">Go</a>
                    </div>
                </div>
                <figure><img src="{{ asset('img/asset.png') }}" alt="Movie" />
                </figure>
            </div>
            <div class="card card-side bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class=" text-3xl">Book Keeping</h2>
                    <p>Click the button to see book keeping data.</p>
                    <div class="card-actions justify-start">
                        <a href="{{ url('data/bookkeeping') }}"
                        class="add-btn text-white rounded-md btn hover:bg-primary w-1/6">Go</a>
                    </div>
                </div>
                <figure><img src="{{ asset('img/bookkeeping.png') }}" alt="Movie" />
                </figure>
            </div>
        </div>
    </div>
@endsection
