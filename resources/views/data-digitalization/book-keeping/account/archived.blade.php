@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Master Data Account"
        :breadcrumbs="[
            ['href' => url('data/bookkeeping'), 'title' => 'Home'],
            ['href' => url('data/bookkeeping/account'), 'title' => 'Master Data Account'],
            ['title' => 'Archived Master Data Account'],
        ]"
    >
        <livewire:account-archived-table />
    </x-crud-container>
@endsection
