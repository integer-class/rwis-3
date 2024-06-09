@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Validasi Laporan"
        :breadcrumbs="[
            ['href' => route('issue.index'), 'title' => 'Laporan'],
            ['href' => route('issue.approval.index'), 'title' => 'Validasi Laporan'],
        ]"
    >
        <livewire:pending-issue-table />
    </x-crud-container>
@endsection
