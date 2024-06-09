@extends('admin-layout.base')

@section('content')
    <x-feature-index
        title="Data Digitalization"
        description="Digitalize data about residents, households, assets, and bookkeeping."
        :features="[
            [
                'link' => route('data.household.index'),
                'title' => 'Household',
                'image' => 'img/household.png',
            ],
            [
                'link' => route('data.resident.index'),
                'title' => 'Resident',
                'image' => 'img/resident.png',
            ],
            [
                'link' => route('data.asset.index'),
                'title' => 'Asset',
                'image' => 'img/asset.png',
            ],
            [
                'link' => route('data.bookkeeping.index'),
                'title' => 'Book Keeping',
                'image' => 'img/bookkeeping.png',
            ],
        ]"
    />
@endsection
