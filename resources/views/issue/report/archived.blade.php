@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container title="Arsip Laporan Warga" :breadcrumbs="[
        ['href' => route('issue.index'), 'title' => 'Laporan'],
        ['href' => route('issue.report.index'), 'title' => 'Laporan Warga'],
        ['href' => route('issue.report.archived'), 'title' => 'Arsip Laporan Warga'],
    ]">

        <div class="h-20 grid grid-row md:grid-cols-4 gap-5">
            <div class="bg-neutral p-5 rounded-md">
                <h3 class="text-xl text-white font-bold">Arsip</h3>
                @foreach ($issue as $item)
                    @php
                        $updateModalId = 'update_modal_' . $item->issue_report_id;
                        $unarchiveModalId = 'archive_modal_' . $item->issue_report_id;
                    @endphp
                    <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                        <div class="card-body">
                            <h2 class="card-title">{{ $item->title }}</h2>
                            <p>{{ $item->description }}</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-sm btn-error text-white"
                                    onclick="document.getElementById('{{ $unarchiveModalId }}').showModal()">Pulihkan</button>
                            

                                {{-- modal Archive --}}
                                <dialog id="{{ $unarchiveModalId }}" class="modal">
                                    <div class="modal-box">
                                        <form method="dialog">
                                            <button
                                                class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>
                                        <h3 class="font-bold text-lg mb-3">Pulihkan Laporan</h3>
                                        <form action="{{ url('issue/report/' . $item->issue_report_id . '/unarchive') }}"
                                            method="POST" class="flex flex-col space-y-4 w-full form mr-3">
                                            @csrf
                                            {!! method_field('PUT') !!}
                                            <div class="flex flex-col space-y-1 mb-3">
                                                <div class="flex gap-2">
                                                    <h3 class="font-bold text-xl">{{ $item->title }}</h3>
                                                </div>
                                            </div>
                                            <div class="flex flex-col space-y-1 mb-3">
                                                <p class="text-sm">{{ $item->created_at->timezone('Asia/Jakarta')->translatedFormat('H:i, l, d M Y') }}</p>
                                            </div>
                                            <div class="flex flex-col space-y-1 mb-3">
                                                <p class="text-sm">{{ $item->resident->full_name }}</p>
                                            </div>
                                            <div class="flex flex-col space-y-1 mb-3">
                                                <p class="text-sm">{{ $item->resident->whatsapp_number }}</p>
                                            </div>
                                            <div class="flex flex-col space-y-1 mb-3">
                                                <p class="text-lg">{{ $item->description }}</p>
                                            </div>
                                            <div class="flex flex-col space-y-1">
                                                <label class="text-base font-bold" for="status">Apakah Anda yakin ingin memulihkan masalah ini?</label>
                                            </div>
                                            <div class="flex flex-row justify-end">
                                                <button class="btn btn-error mx-2 text-white">Pulihkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </dialog>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </x-crud-container>
@endsection
