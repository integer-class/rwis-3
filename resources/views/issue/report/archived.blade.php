@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Arsip Laporan Warga"
        :breadcrumbs="[
            ['href' => route('issue.index'), 'title' => 'Laporan'],
            ['href' => route('issue.report.index'), 'title' => 'Laporan Warga'],
            ['href' => route('issue.report.archived'), 'title' => 'Arsip Laporan Warga'],
        ]"
    >
        <livewire:issue-report-archived />
    </x-crud-container>
@endsection
