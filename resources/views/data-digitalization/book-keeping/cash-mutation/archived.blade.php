@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Cash Mutation"
        :breadcrumbs="[
            ['href' => url('data'), 'title' => 'Home'],
            ['href' => url('data/bookkeeping'), 'title' => 'Cash Mutation'],
            ['title' => 'Archived Cash Mutation'],
        ]"
    >
        <livewire:cash-mutation-archived-table />
    </x-crud-container>
@endsection
