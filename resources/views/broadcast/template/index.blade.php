@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Broadcast Template"
        :breadcrumbs="[
            ['href' => route('broadcast.index'), 'title' => 'Siaran'],
            ['href' => route('broadcast.template.index'), 'title' => 'Template Siaran'],
        ]"
    >
        <livewire:broadcast-template-table />
    </x-crud-container>
@endsection
