@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Mutasi"
        :add-url="route('data.bookkeeping.cash.create')"
        :archived-url="route('data.bookkeeping.cash.archived')"
        :breadcrumbs="[
            ['href' => route('data.bookkeeping.index'), 'title' => 'Pencatatan Keuangan'],
            ['href' => route('data.bookkeeping.cash.index'), 'title' => 'Cash Mutation'],
        ]"
    >
        <livewire:cash-mutation-table />
    </x-crud-container>
@endsection
