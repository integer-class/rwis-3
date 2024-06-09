@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Arsip Keluarga"
        :breadcrumbs="[
            ['href' => route('data.index'), 'title' => 'Digitalisasi Data'],
            ['href' => route('data.household.index'), 'title' => 'Keluarga'],
            ['href' => route('data.household.archived'), 'title' => 'Arsip Keluarga'],
        ]"
    >
        <livewire:household-archived-table />
    </x-crud-container>
@endsection
