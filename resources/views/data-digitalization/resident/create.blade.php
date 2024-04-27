@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mx-5 mt-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Resident Data</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="{{ url('/resident') }}">Resident Data</a></li>
                        <li>Add New</li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <form action="{{ url('/resident') }}" method="POST" class="flex flex-col space-y-4 w-full form mr-3">
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
                    <label for="full_name">Full Name</label>
                    <input type="text" name="full_name" id="full_name" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter your full name" autofocus>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="nik">NIK</label>
                    <input type="number" name="nik" id="nik" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter your NIK" maxlength="16" min="0">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="place_of_birth">Place of Birth</label>
                    <input type="text" name="place_of_birth" id="place_of_birth"
                        class="rounded-md border border-gray-300 p-2" placeholder="Enter your place of birth">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth"
                        class="rounded-md border border-gray-300 p-2" placeholder="Enter your date of birth">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="rounded-md border border-gray-300 p-2">
                        <option value="">- Choose Gender -</option>
                            @foreach ($gender as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="blood_type">Blood Type</label>
                    <input type="text" name="blood_type" id="blood_type" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter your blood type">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="religion">Religion</label>
                    <select name="religion" id="religion" class="rounded-md border border-gray-300 p-2">
                        <option value="">- Choose Religion -</option>
                            @foreach ($religion as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="marriage_status">Marriage Status</label>
                    <select name="marriage_status" id="marriage_status" class="rounded-md border border-gray-300 p-2">
                        <option value="">- Choose Marriage Status -</option>
                            @foreach ($marriageStatus as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="nationality">Nationality</label>
                    <select name="nationality" id="nationality" class="rounded-md border border-gray-300 p-2">
                        <option value="">- Choose Nationality -</option>
                            @foreach ($nationality as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="income">Income</label>
                    <input type="number" name="income" id="income" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter your income">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="whatsapp_number">Whatsapp Number</label>
                    <input type="text" name="whatsapp_number" id="whatsapp_number" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter your Whatsapp number">
                </div>
                <input type="text" value="{{ $isArchived }}" name="is_archived" hidden>
                <div class="flex">
                    <button type="submit" class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6">Add</button>
                    <a class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6 mx-3 text-center" href="{{ url('/resident') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
