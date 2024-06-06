@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Social Aid Ranking Tools</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ url('social') }}">Home</a></li>
                        <li><a href="{{ url('social/calculate') }}">Social Aid Ranking Tools</a></li>
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

            <form action="{{ url('broadcast/template') }}" method="POST"
                class="flex flex-col space-y-4 w-full form mr-3 mb-5">
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
                    <div id="fillable_fields-container" class="flex flex-col space-y-1">
                        <div class="flex justify-end gap-3">
                            <div class="w-5/6">
                                <label for="fillable_fields">Criteria</label>
                                <input type="text" name="fillable_fields[]"
                                    class="rounded-md border border-gray-300 p-2 w-full" placeholder="Enter Criteria">
                            </div>
                            <div class="w-1/6">
                                <label for="fillable_fields">Weight</label>
                                <input type="text" name="fillable_fields[]"
                                    class="rounded-md border border-gray-300 p-2 w-full" placeholder="Enter Weight">
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-field"
                        class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md w-1/6 btn-sm">Add Fields
                    </button>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6">Save</button>
                    <a class="add-btn btn-sm px-4 py-1.5 text-white rounded-md mt-5 w-1/6 ml-3 text-center"
                        href="{{ url('broadcast/template') }}">Calculate</a>
                </div>
            </form>

            <livewire:resident-table />
        </div>
    </div>

    <script>
        document.getElementById('add-field').addEventListener('click', function() {
            // Create the container for the new fields
            var div = document.createElement('div');
            div.className = 'flex justify-end gap-3';

            // Create the Criteria container
            var criteriaDiv = document.createElement('div');
            criteriaDiv.className = 'w-5/6';

            // Create the Criteria label
            var criteriaLabel = document.createElement('label');
            criteriaLabel.for = 'fillable_fields';

            // Create the Criteria input
            var criteriaInput = document.createElement('input');
            criteriaInput.type = 'text';
            criteriaInput.name = 'fillable_fields[]';
            criteriaInput.className = 'rounded-md border border-gray-300 p-2 w-full';
            criteriaInput.placeholder = 'Enter Criteria';

            // Add the label and input to the Criteria container
            criteriaDiv.appendChild(criteriaLabel);
            criteriaDiv.appendChild(criteriaInput);

            // Create the Weight container
            var weightDiv = document.createElement('div');
            weightDiv.className = 'w-1/6';

            // Create the Weight label
            var weightLabel = document.createElement('label');
            weightLabel.for = 'fillable_fields';

            // Create the Weight input
            var weightInput = document.createElement('input');
            weightInput.type = 'text';
            weightInput.name = 'fillable_fields[]';
            weightInput.className = 'rounded-md border border-gray-300 p-2 w-full';
            weightInput.placeholder = 'Enter Weight';

            // Add the label and input to the Weight container
            weightDiv.appendChild(weightLabel);
            weightDiv.appendChild(weightInput);

            // Add the Criteria and Weight containers to the main container
            div.appendChild(criteriaDiv);
            div.appendChild(weightDiv);

            // Add the new container to the form
            document.getElementById('fillable_fields-container').appendChild(div);
        });
    </script>
@endsection
