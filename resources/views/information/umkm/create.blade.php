@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mx-5 mt-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">UMKM Information</h3>
            <div class="flex w-full justify-between">
                <div class="breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ url('information') }}">Home</a></li>
                        <li><a href="{{ url('information/umkm') }}">Facility Information</a></li>
                        <li>Add UMKM</li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <form action="{{ url('information/umkm') }}" method="POST" class="flex flex-col space-y-4 w-full form mr-3">
                @csrf
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
                    <label for="umkm_id">ID Number</label>
                    <input name="umkm_id" id="umkm_id" class="rounded-md border border-gray-300 p-2">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"
                        class="rounded-md border border-gray-300 p-2" placeholder="Enter UMKM Name">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address"
                        class="rounded-md border border-gray-300 p-2" placeholder="Enter UMKM Address">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description"
                        class="rounded-md border border-gray-300 p-2" placeholder="Enter UMKM Description">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="whatsapp_number">Contact</label>
                    <input type="text" name="whatsapp_number" id="contact" class="rounded-md border border-gray-300 p-2" placeholder="Enter Contact">
                </div>

                <div class="flex">
                    <button type="submit" class="add-btn btn-sm px-4 py-1.5 bg-blue-500 text-white rounded-md mt-5 w-1/6">Add</button>
                    <a class="add-btn btn-sm px-4 py-1.5 bg-blue-500 text-white rounded-md mt-5 w-1/6 mx-3 text-center"
                        href="{{ url('information/umkm') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection