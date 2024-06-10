@extends('admin-layout.base')

@section('content')
    <x-feature-index
        title="Laporan"
        description="Pencatatan laporan yang dilakukan oleh warga."
        :features="[
            [
                'link' => route('issue.approval.index'),
                'title' => 'Validasi Laporan',
                'image' => 'img/resident.png',
            ],
            [
                'link' => route('issue.report.index'),
                'title' => 'Laporan Warga',
                'image' => 'img/household.png',
            ],
        ]"
    />
@endsection
