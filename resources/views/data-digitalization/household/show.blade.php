@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mx-5 mt-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Household Data</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ url('data') }}">Home</a></li>
                        <li><a href="{{ url('data/household') }}">Household Data</a></li>
                        <li>Show Details</li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Number KK</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $household->number_kk }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Family Head</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $household->familyHead->full_name }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Full Address</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $household->full_address }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Area</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $household->area }}m&sup2</dd>
                    </div>
                </dl>
            </div>

            <h3 class="mt-5 text-xl">Resident Data</h3>
            <div class="overflow-x-auto">
                <table class="table table-xl mb-5">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>NIK</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resident as $item)
                        <tr class="hover">
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->nik }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            <a class="add-btn btn-lg px-4 py-1.5 text-white rounded-md mt-5" href="{{ url('data/household') }}">Back</a>
        </div>
    </div>
@endsection
