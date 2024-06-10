@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Laporan Warga"
        :add-url="route('issue.report.create')"
        :archived-url="route('issue.report.archived')"
        :breadcrumbs="[
            ['href' => route('issue.index'), 'title' => 'Laporan'],
            ['href' => route('issue.report.index'), 'title' => 'Laporan Warga'],
        ]"
    >
        <livewire:issue-report-table />
    </x-crud-container>
@endsection
