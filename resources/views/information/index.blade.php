@extends('admin-layout.base')

@section('content')
    <x-feature-index
        title="Pusat Informasi"
        description="Pencatatan informasi fasilitas dan UMKM agar lebih mudah diakses oleh warga."
            :features="[
            [
                'link' => route('information.facility.index'),
                'title' => 'Fasilitas',
                'image' => 'img/facility.png',
            ],
            [
                'link' => route('information.umkm.index'),
                'title' => 'UMKM',
                'image' => 'img/umkm.png',
            ],
        ]"
    />
@endsection

