@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Mutasi"
        :breadcrumbs="[
            ['href' => route('data.bookkeeping.index'), 'title' => 'Pencatatan Keuangan'],
            ['href' => route('data.bookkeeping.cash.index'), 'title' => 'Cash Mutation'],
        ]"
    >
        <livewire:cash-mutation-table />
    </x-crud-container>
@endsection
