@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Keluarga"
        :add-url="route('data.household.create')"
        :archived-url="route('data.household.archived')"
        :breadcrumbs="[
            ['href' => route('data.index'), 'title' => 'Digitalisasi Data'],
            ['href' => route('data.household.index'), 'title' => 'Keluarga'],
        ]"
    >
        <livewire:household-table />
    </x-crud-container>
@endsection
