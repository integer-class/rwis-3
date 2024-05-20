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
            <a href="{{ url('data/household') }}">
                <div
                    class="card card-side bg-base-100 shadow-xl mb-5 hover:text-white hover:bg-primary transition ease-in-out delay-150 hover:-translate-y-1 duration-300">
                    <div class="card-body flex justify-center">
                        <h2 class=" text-3xl font-bold">Household</h2>
                        <div class="card-actions justify-start">
                        </div>
                    </div>
                    <figure><img src="{{ asset('img/household.png') }}" alt="Movie" />
                    </figure>
                </div>
            </a>
            <a href="{{ url('data/resident') }}">
                <div
                    class="card card-side bg-base-100 shadow-xl mb-5 hover:text-white hover:bg-primary transition ease-in-out delay-150 hover:-translate-y-1 duration-300">
                    <div class="card-body flex justify-center">
                        <h2 class=" text-3xl font-bold">Resident</h2>
                        <div class="card-actions justify-start">
                        </div>
                    </div>
                    <figure><img src="{{ asset('img/resident.png') }}" alt="Movie" />
                    </figure>
                </div>
            </a>
            <a href="{{ url('data/asset') }}">
                <div
                    class="card card-side bg-base-100 shadow-xl mb-5 hover:text-white hover:bg-primary transition ease-in-out delay-150 hover:-translate-y-1 duration-300">
                    <div class="card-body flex justify-center">
                        <h2 class=" text-3xl font-bold">Asset</h2>
                        <div class="card-actions justify-start">
                        </div>
                    </div>
                    <figure><img src="{{ asset('img/asset.png') }}" alt="Movie" />
                    </figure>
                </div>
            </a>
            <a href="{{ url('data/bookkeeping') }}">
                <div
                    class="card card-side bg-base-100 shadow-xl mb-5 hover:text-white hover:bg-primary transition ease-in-out delay-150 hover:-translate-y-1 duration-300">
                    <div class="card-body flex justify-center">
                        <h2 class=" text-3xl font-bold">Book Keeping</h2>
                        <div class="card-actions justify-start">
                        </div>
                    </div>
                    <figure><img src="{{ asset('img/bookkeeping.png') }}" alt="Movie" />
                    </figure>
                </div>
            </a>
        </div>
    </div>
@endsection
