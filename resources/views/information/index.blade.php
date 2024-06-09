@extends('admin-layout.base')

@section('content')
    <x-feature-index
        title="Information Centre"
        description="Find information about facilities and UMKM in your area."
            :features="[
            [
                'link' => route('information.facility.index'),
                'title' => 'Facility Information',
                'image' => 'img/facility.png',
            ],
            [
                'link' => route('information.umkm.index'),
                'title' => 'UMKM Information',
                'image' => 'img/umkm.png',
            ],
        ]"
    />
@endsection

