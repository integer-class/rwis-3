@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Asset Data"
        :breadcrumbs="[
            ['href' => route('data.index'), 'title' => 'Data'],
            ['href' => route('data.asset.index'), 'title' => 'Data Aset'],
        ]"
    >
        <livewire:asset-table />
    </x-crud-container>
@endsection
