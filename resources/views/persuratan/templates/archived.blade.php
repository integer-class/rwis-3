@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Arsip Template Persuratan"
        :breadcrumbs="[
            ['href' => route('persuratan.index'), 'title' => 'Home'],
            ['href' => route('persuratan.templates.index'), 'title' => 'Template Persuratan'],
            ['href' => route('persuratan.templates.archived'), 'title' => 'Arsip Template Persuratan'],
        ]"
    >
        <livewire:persuratan-template-archived-table />
    </x-crud-container>
@endsection
