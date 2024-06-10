@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Fasilitas"
        :add-url="route('information.facility.create')"
        :archived-url="route('information.facility.archived')"
        :breadcrumbs="[
            ['href' => route('information.index'), 'title' => 'Pusat Informasi'],
            ['href' => route('information.facility.index'), 'title' => 'Fasilitas'],
        ]"
    >
        <livewire:facility-table />
    </x-crud-container>
@endsection
