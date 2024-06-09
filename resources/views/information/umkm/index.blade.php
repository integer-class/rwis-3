@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="UMKM"
        :breadcrumbs="[
            ['href' => route('information.index'), 'title' => 'Pusat Informasi'],
            ['href' => route('information.umkm.index'), 'title' => 'UMKM'],
        ]"
    >
        <livewire:umkm-table />
    </x-crud-container>
@endsection
