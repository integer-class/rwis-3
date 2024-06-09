@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Arsip Akun Utama"
        :breadcrumbs="[
            ['href' => route('data.bookkeeping.index'), 'title' => 'Pencatatan Keuangan'],
            ['href' => route('data.bookkeeping.account.index'), 'title' => 'Akun Utama'],
            ['href' => route('data.bookkeeping.account.archived'), 'title' => 'Arsip Akun Utama'],
        ]"
    >
        <livewire:account-archived-table />
    </x-crud-container>
@endsection
