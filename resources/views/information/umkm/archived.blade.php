@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Arsip Informasi UMKM"
        :breadcrumbs="[
            ['href' => route('dashboard'), 'title' => 'Dashboard'],
            ['href' => route('information.umkm.index'), 'title' => 'Informasi UMKM'],
            ['href' => route('information.umkm.archived'), 'title' => 'Arsip UMKM Information'],
        ]"
    >
        <livewire:umkm-archived />
    </x-crud-container>
@endsection
