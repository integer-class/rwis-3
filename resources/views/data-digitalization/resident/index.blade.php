@extends('admin-layout.base')

@section('content')
@vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Resident Data</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="{{ url('/resident') }}">Resident Data</a></li>
                    </ul>
                </div>
                <div class="flex justify-end">
                    <a href="{{ url('resident/create') }}" class="add-btn btn-sm mx-2 px-4 py-1.5 bg-blue-500 text-white rounded-md">Add
                        Resident</a>
                    <a href="{{ url('resident/create') }}" class="archived-btn btn-sm px-4 py-1.5 bg-blue-500 text-white rounded-md">Archived</a>
                </div>
            </div>
            {{-- content --}}
            <livewire:resident-table />
        </div>
    </div>
@endsection
