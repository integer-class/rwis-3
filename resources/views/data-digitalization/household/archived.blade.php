@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Household Data"
        :breadcrumbs="[
            ['href' => url('data'), 'title' => 'Home'],
            ['href' => url('data/household'), 'title' => 'Household Data'],
            ['title' => 'Archived Household Data'],
        ]"
    >
        <livewire:household-archived-table />
    </x-crud-container>
@endsection
