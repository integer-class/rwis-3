@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Resident Data"
        :breadcrumbs="[
            ['href' => url('data'), 'title' => 'Home'],
            ['href' => url('data/resident'), 'title' => 'Resident Data'],
            ['title' => 'Archived Resident Data'],
        ]"
    >
        <livewire:resident-archived-table />
    </x-crud-container>
@endsection
