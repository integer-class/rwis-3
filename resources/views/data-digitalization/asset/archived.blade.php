@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Asset Data"
        :breadcrumbs="[
            ['href' => route('dashboard'), 'title' => 'Dashboard'],
            ['href' => route('data.asset.index'), 'title' => 'Asset Data'],
            ['href' => route('data.asset.archived'), 'title' => 'Archived Asset Data'],
        ]"
    >
        <livewire:asset-archived-table />
    </x-crud-container>
@endsection
