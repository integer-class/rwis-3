@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Issue Report"
        :breadcrumbs="[
            ['href' => url('issue'), 'title' => 'Home'],
            ['href' => url('issue/report'), 'title' => 'Issue Report'],
            ['title' => 'Archived'],
        ]"
    >
        <livewire:issue-report-archived />
    </x-crud-container>
@endsection
