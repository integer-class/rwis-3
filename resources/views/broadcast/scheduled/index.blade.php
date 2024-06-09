@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Siaran Terjadwal"
        :breadcrumbs="[
            ['href' => route('broadcast.index'), 'title' => 'Siaran'],
            ['href' => route('broadcast.scheduled.index'), 'title' => 'Siaran Terjadwal'],
        ]"
    >
        <livewire:scheduled-message-table />
    </x-crud-container>
@endsection
