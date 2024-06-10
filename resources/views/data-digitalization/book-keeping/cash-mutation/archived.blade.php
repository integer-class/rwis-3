@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Arsip Mutasi"
        :breadcrumbs="[
            ['href' => route('data.bookkeeping.index'), 'title' => 'Pencatatan Keuangan'],
            ['href' => route('data.bookkeeping.cash.index'), 'title' => 'Mutasi'],
            ['href' => route('data.bookkeeping.cash.archived'), 'title' => 'Arsip Mutasi'],
        ]"
    >
        <livewire:cash-mutation-archived-table />
    </x-crud-container>
@endsection
