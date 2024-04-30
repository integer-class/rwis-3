@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Asset Data</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="{{ url('data/asset') }}">Asset Data</a></li>
                        <li>Edit Asset</li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <form action="{{ url('data/asset/' . $asset->asset_id) }}" method="POST" class="flex flex-col space-y-4 w-full form mr-3">
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
                    <label for="household_id">Full Address</label>
                    <select name="household_id" id="household_id" class="rounded-md border border-gray-300 p-2">
                        <option disabled selected value="{{ old('household_id', $asset->household_id) }}">- Choose household_id -</option>
                            @foreach ($household as $item)
                            <option value="{{ $item->household_id }}">{{ $item->number_kk }} - {{ $item->full_address }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="name">Asset Name</label>
                    <input type="text" name="name" id="name" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter your asset name" value="{{ old('name', $asset->name) }}">
                </div>
                <div class="flex">
                    <button type="submit"
                        class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6">Edit</button>
                    <a class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6 mx-3 text-center"
                        href="{{ url('data/resident') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
