@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Household Data</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="{{ url('data/household') }}">Household Data</a></li>
                        <li>Edit Household</li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <form action="{{ url('data/household/' . $household->household_id) }}" method="POST"
                class="flex flex-col space-y-4 w-full form mr-3">
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
                    <label for="number_kk">Number KK</label>
                    <input type="number" name="number_kk" id="number_kk" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter your Number KK" maxlength="16" min="0"
                        value="{{ old('number_kk', $household->number_kk) }}">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="full_address">Full Address</label>
                    <input type="text" name="full_address" id="full_address"
                        class="rounded-md border border-gray-300 p-2" placeholder="Enter your full_address"
                        value="{{ old('full_address', $household->full_address) }}">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="area">House Area</label>
                    <input type="number" name="area" id="area" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter your Household Area" value="{{ old('area', $household->area) }}">
                </div>
                <div class="flex">
                    <button type="submit" class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6">Add</button>
                    <a class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6 mx-3 text-center"
                        href="{{ url('data/household') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
