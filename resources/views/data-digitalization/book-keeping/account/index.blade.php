@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Akun Utama"
        :add-url="route('data.bookkeeping.account.create')"
        :archived-url="route('data.bookkeeping.account.archived')"
        :breadcrumbs="[
            ['href' => route('data.bookkeeping.index'), 'title' => 'Pencatatan Keuangan'],
            ['href' => route('data.bookkeeping.account.index'), 'title' => 'Akun Utama'],
        ]"
    >
        <livewire:account-table />
    </x-crud-container>
@endsection
