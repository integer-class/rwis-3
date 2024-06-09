@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Facility Information"
        :breadcrumbs="[
            ['href' => url('information'), 'title' => 'Home'],
            ['href' => url('information/facility'), 'title' => 'Facility Information'],
            ['title' => 'Archived Facility Information'],
        ]"
    >
        <livewire:facility-archived />
    </x-crud-container>
@endsection
