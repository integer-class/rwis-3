@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container
        title="Validasi Laporan"
        :breadcrumbs="[
            ['href' => route('issue.index'), 'title' => 'Laporan'],
            ['href' => route('issue.approval.index'), 'title' => 'Validasi Laporan'],
        ]"
    >
        <div role="tablist" class="tabs tabs-lifted">
            <input type="radio" name="my_tabs_2" role="tab" class="tab" aria-label="Menunggu" checked />
            <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                <livewire:issue-table status="pending" :menu="['show', 'approve', 'reject']" />
            </div>

            <input type="radio" name="my_tabs_2" role="tab" class="tab" aria-label="Diterima" />
            <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                <livewire:issue-table status="approved" :menu="['show']" />
            </div>

            <input type="radio" name="my_tabs_2" role="tab" class="tab" aria-label="Ditolak" />
            <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                <livewire:issue-table status="rejected" :menu="['show']" />
            </div>
        </div>
    </x-crud-container>
@endsection
