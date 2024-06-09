@extends('admin-layout.base')

@section('content')
    <x-feature-index
        title="Social Aid"
        description="Calculate social aid."
        :features="[
            [
                'link' => route('social-aid.calculate.index'),
                'title' => 'Calculate',
                'image' => 'img/bookkeeping.png',
            ],
        ]"
    />
@endsection

