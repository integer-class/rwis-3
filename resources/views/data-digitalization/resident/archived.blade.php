@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Warga"
        :breadcrumbs="[
            ['href' => route('data.index'), 'title' => 'Digitalisasi Data'],
            ['href' => route('data.resident.index'), 'title' => 'Warga'],
            ['href' => route('data.resident.archived'), 'title' => 'Arsip Warga'],
        ]"
    >
        <livewire:resident-archived-table />
    </x-crud-container>
@endsection
