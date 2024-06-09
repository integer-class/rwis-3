@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Arsip Fasilitas"
        :breadcrumbs="[
            ['href' => route('information.index'), 'title' => 'Pusat Informasi'],
            ['href' => route('information.facility.index'), 'title' => 'Fasilitas'],
            ['href' => route('information.facility.archived'), 'title' => 'Arsip Fasilitas'],
        ]"
    >
        <livewire:facility-archived />
    </x-crud-container>
@endsection
