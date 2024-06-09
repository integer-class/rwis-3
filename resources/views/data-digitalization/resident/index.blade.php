@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Warga"
        :breadcrumbs="[
            ['href' => route('data.index'), 'title' => 'Digitalisasi Data'],
            ['href' => route('data.resident.index'), 'title' => 'Warga'],
        ]"
    >
        <livewire:resident-table />
    </x-crud-container>
@endsection
