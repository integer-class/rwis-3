@extends('admin-layout.base')

@section('content')
    <x-feature-index
        title="Broadcast"
        description="Create and manage broadcast messages."
        :features="[
            [
                'link' => route('broadcast.template.index'),
                'title' => 'Template',
                'image' => 'img/resident.png',
            ],
            [
                'link' => route('broadcast.scheduled.index'),
                'title' => 'Scheduled',
                'image' => 'img/household.png',
            ],
        ]"
    />
@endsection
