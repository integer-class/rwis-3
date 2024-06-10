@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Aset"
        :add-url="route('data.asset.create')"
        :archived-url="route('data.asset.archived')"
        :breadcrumbs="[
            ['href' => route('data.index'), 'title' => 'Digitalisasi Data'],
            ['href' => route('data.asset.index'), 'title' => 'Data Aset'],
        ]"
    >
        <livewire:asset-table />
    </x-crud-container>
@endsection
