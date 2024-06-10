@extends('admin-layout.base')

@section('content')
    <x-feature-index
        title="Siaran"
        description="Buat dan kirim siaran ke seluruh warga"
        :features="[
            [
                'link' => route('broadcast.template.index'),
                'title' => 'Template Siaran',
                'image' => 'img/resident.png',
            ],
            [
                'link' => route('broadcast.scheduled.index'),
                'title' => 'Siaran Terjadwal',
                'image' => 'img/household.png',
            ],
        ]"
    />
@endsection
