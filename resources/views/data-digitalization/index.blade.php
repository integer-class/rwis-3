@extends('admin-layout.base')

@section('content')
    <x-feature-index
        title="Digitalisasi Data"
        description="Digitalisasi data warga. Seperti data rumah tangga, data penduduk, data aset, dan data keuangan."
        :features="[
            [
                'link' => route('data.household.index'),
                'title' => 'Keluarga',
                'image' => 'img/household.png',
            ],
            [
                'link' => route('data.resident.index'),
                'title' => 'Warga',
                'image' => 'img/resident.png',
            ],
            [
                'link' => route('data.asset.index'),
                'title' => 'Aset',
                'image' => 'img/asset.png',
            ],
            [
                'link' => route('data.bookkeeping.index'),
                'title' => 'Pencatatan Keuangan',
                'image' => 'img/bookkeeping.png',
            ],
        ]"
    />
@endsection
