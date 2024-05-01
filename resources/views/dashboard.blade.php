@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Dashboard</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ url('information') }}">Information Centre</a></li>
                        <li><a href="{{ url('data') }}">Data Digitalization</a></li>
                        <li><a href="{{ url('issue') }}">Issue Tracker</a></li>
                        <li><a href="{{ url('broadcast') }}">Broadcast</a></li>
                        <li><a href="{{ url('signature') }}">Signature</a></li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <h1 class="text-5xl">Ini Dashboard</h1>
        </div>
    </div>
@endsection
