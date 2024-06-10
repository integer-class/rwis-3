@extends('admin-layout.base')

@section('content')
    <x-feature-index
        title="Bantuan Sosial"
        description="Alat untuk membantu menentukan penerima bantuan sosial."
        :features="[
            [
                'link' => route('social-aid.calculate.index'),
                'title' => 'Kalkulator',
                'image' => 'img/bookkeeping.png',
            ],
        ]"
    />
@endsection

