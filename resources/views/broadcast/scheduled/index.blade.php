@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Siaran Terjadwal"
        :add-url="route('broadcast.scheduled.create')"
        {{-- :archived-url="route('broadcast.scheduled.archived')" --}}
        :breadcrumbs="[
            ['href' => route('broadcast.index'), 'title' => 'Siaran'],
            ['href' => route('broadcast.scheduled.index'), 'title' => 'Siaran Terjadwal'],
        ]"
    >
        <livewire:scheduled-message-table />
    </x-crud-container>
@endsection
