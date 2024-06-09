@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Arsip UMKM"
        :breadcrumbs="[
            ['href' => route('information.index'), 'title' => 'Pusat Informasi'],
            ['href' => route('information.umkm.index'), 'title' => 'UMKM'],
            ['href' => route('information.umkm.archived'), 'title' => 'Arsip UMKM'],
        ]"
    >
        <livewire:umkm-archived />
    </x-crud-container>
@endsection
