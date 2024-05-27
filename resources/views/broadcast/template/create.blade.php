@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Broadcast Template</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ url('broadcast') }}">Home</a></li>
                        <li><a href="{{ url('broadcast/template') }}">Broadcast Template</a></li>
                        <li>Add Template</li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <form action="{{ url('broadcast/template') }}" method="POST" class="flex flex-col space-y-4 w-full form mr-3">
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
                {{-- <div class="flex flex-col space-y-1">
                    <label for="resident_id">Family Head</label>
                    <select name="resident_id" id="resident_id" class="rounded-md border border-gray-300 p-2">
                        <option disabled selected value="">- Choose Family Head -</option>
                        @foreach ($familyHead as $item)
                            <option value="{{ $item->resident_id }}">{{ $item->full_name }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="flex flex-col space-y-1">
                    <label for="text">Text</label>
                    <input type="text" name="text" id="text" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter Text">
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="fields">Fillable Fields</label>
                    <div id="fields-container" class="flex flex-col space-y-1">
                        <input type="text" name="fields[]" class="rounded-md border border-gray-300 p-2"
                            placeholder="Enter Fillable Field">
                    </div>
                    <button type="button" id="add-field"
                        class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md w-1/6 btn-sm">Add
                        Fields</button>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="type">Type</label>
                    <input type="text" name="type" id="type" class="rounded-md border border-gray-300 p-2"
                        placeholder="Enter Type">
                </div>
                <div class="flex">
                    <button type="submit" class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6">Add</button>
                    <a class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6 mx-3 text-center"
                        href="{{ url('broadcast/template') }}">Back</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('add-field').addEventListener('click', function() {
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'fields[]';
            input.className = 'rounded-md border border-gray-300 p-2 mt-2';
            input.placeholder = 'Enter Fillable Field';
            document.getElementById('fields-container').appendChild(input);
        });
    </script>
@endsection
