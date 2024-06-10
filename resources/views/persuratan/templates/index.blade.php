@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Template Persuratan"
        :breadcrumbs="[
            ['href' => route('persuratan.templates.index'), 'title' => 'Persuratan'],
            ['href' => route('persuratan.templates.index'), 'title' => 'Template Persuratan'],
        ]"
    >
        <livewire:persuratan-template-table />
    </x-crud-container>
@endsection
