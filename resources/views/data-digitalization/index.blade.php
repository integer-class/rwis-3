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
