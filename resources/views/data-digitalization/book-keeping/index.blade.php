@extends('admin-layout.base')

@section('content')
    <x-feature-index
        title="Pencatatan Keuangan"
        description="Pencatatan keuangan yang terdiri dari akun utama dan mutasi kas."
        :features="[
            [
                'link' => route('data.bookkeeping.account.index'),
                'title' => 'Akun Utama',
                'image' => 'img/bookkeeping.png',
            ],
            [
                'link' => route('data.bookkeeping.cash.index'),
                'title' => 'Mutasi',
                'image' => 'img/asset.png',
            ],
        ]"
    />
@endsection
