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
                    </ul>
                </div>
                <div class="flex justify-end">
                    <a href="{{ url('broadcast/template/create') }}" class="add-btn btn-sm mx-2 px-4 py-1.5 bg-blue-500 text-white rounded-md">Add
                        Template</a>
                    <a href="{{ url('broadcast/template/archived') }}" class="archived-btn btn-sm px-4 py-1.5 bg-blue-500 text-white rounded-md">Archived</a>
                </div>
            </div>
            {{-- content --}}
            @if (session('success'))
            <div role="alert" class="alert alert-info mb-3 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('success') }}</span>
              </div>
            @endif
            @if (session('error'))
            <div role="alert" class="alert alert-error mb-3 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('error') }}</span>
              </div>
            @endif
            
            <livewire:broadcast-template-table />
        </div>
    </div>
@endsection
