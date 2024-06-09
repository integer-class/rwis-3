@extends('admin-layout.base')

@section('content')
    <x-feature-index
        title="Issue Tracker"
        description="Approve issue and report issue."
        :features="[
            [
                'link' => route('issue.approval.index'),
                'title' => 'Approve Issue',
                'image' => 'img/resident.png',
            ],
            [
                'link' => route('issue.report.index'),
                'title' => 'Issue Report',
                'image' => 'img/household.png',
            ],
        ]"
    />
@endsection
