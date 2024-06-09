@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Data Aset"
        :breadcrumbs="[
            ['href' => route('data.index'), 'title' => 'Data'],
            ['href' => route('data.asset.index'), 'title' => 'Data Aset'],
            ['href' => route('data.asset.archived'), 'title' => 'Arsip Data Aset'],
        ]"
    >
        <livewire:asset-archived-table />
    </x-crud-container>
@endsection
