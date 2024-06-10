@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <x-crud-container title="Laporan Warga" :archived-url="route('issue.report.archived')" :breadcrumbs="[
        ['href' => route('issue.index'), 'title' => 'Laporan'],
        ['href' => route('issue.report.index'), 'title' => 'Laporan Warga'],
    ]">

        <div class="h-20 grid grid-row md:grid-cols-4 gap-5">
            <div class="bg-primary p-5 rounded-md">
                <h3 class="text-xl text-white font-bold">To do</h3>
                @foreach ($todo as $item)
                @php
                    $updateModalId = 'update_modal_' . $item->issue_report_id;
                    $archiveModalId = 'archive_modal_' . $item->issue_report_id;
                @endphp
                <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                    <div class="card-body">
                        <h2 class="card-title">{{ $item->title }}</h2>
                        <p>{{ $item->description }}</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-sm btn-primary"
                                onclick="document.getElementById('{{ $updateModalId }}').showModal()">Ubah
                                Status</button>
                            <button class="btn btn-sm btn-error text-white"
                                onclick="document.getElementById('{{ $archiveModalId }}').showModal()">Arsipkan</button>

                            {{-- modal Update Status --}}
                            <dialog id="{{ $updateModalId }}" class="modal">
                                <div class="modal-box">
                                    <form method="dialog">
                                        <button
                                            class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <h3 class="font-bold text-lg mb-3">Ubah Status</h3>
                                    <form action="{{ url('issue/report/' . $item->issue_report_id) }}"
                                        method="POST" class="flex flex-col space-y-4 w-full form mr-3">
                                        @csrf
                                        {!! method_field('PUT') !!}
                                        <div class="flex flex-col space-y-1 mb-3">
                                            <div class="flex gap-2">
                                                <h3 class="font-bold text-xl">{{ $item->title }}</h3>
                                                <h3 class="badge badge-primary">{{ $item->status }}</h3>
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
                                            <label for="status">Status</label>
                                            <select name="status" id="status"
                                                class="rounded-md border border-gray-300 p-2">
                                                <option disabled selected
                                                    value="{{ old('status', $item->status) }}">- Status -</option>
                                                @foreach ($status as $statusItem)
                                                    <option value="{{ $statusItem }}">{{ $statusItem }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="flex flex-row justify-end">
                                            <button class="btn btn-primary mx-2">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>

                            {{-- modal Archive --}}
                            <dialog id="{{ $archiveModalId }}" class="modal">
                                <div class="modal-box">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <h3 class="font-bold text-lg mb-3">Arsipkan Masalah</h3>
                                    <form action="{{ url('issue/report/' . $item->issue_report_id . '/archive') }}"
                                        method="POST" class="flex flex-col space-y-4 w-full form mr-3">
                                        @csrf
                                        {!! method_field('PUT') !!}
                                        <div class="flex flex-col space-y-1 mb-3">
                                            <div class="flex gap-2">
                                                <h3 class="font-bold text-xl">{{ $item->title }}</h3>
                                                <h3 class="badge badge-primary">{{ $item->status }}</h3>
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
                                            <label class="text-base font-bold" for="status">Apakah Anda yakin ingin mengarsipkan masalah ini?</label>
                                        </div>
                                        <div class="flex flex-row justify-end">
                                            <button class="btn btn-error mx-2 text-white">Arsipkan</button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

            <div class="bg-secondary p-5 rounded-md">
                <h3 class="text-xl font-bold text-white">On Going</h3>
                @foreach ($onGoing as $item)
                @php
                    $updateModalId = 'update_modal_' . $item->issue_report_id;
                    $archiveModalId = 'archive_modal_' . $item->issue_report_id;
                @endphp
                <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                    <div class="card-body">
                        <h2 class="card-title">{{ $item->title }}</h2>
                        <p>{{ $item->description }}</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-sm btn-primary"
                                onclick="document.getElementById('{{ $updateModalId }}').showModal()">Ubah
                                Status</button>
                            <button class="btn btn-sm btn-error text-white"
                                onclick="document.getElementById('{{ $archiveModalId }}').showModal()">Arsipkan</button>

                            {{-- modal Update Status --}}
                            <dialog id="{{ $updateModalId }}" class="modal">
                                <div class="modal-box">
                                    <form method="dialog">
                                        <button
                                            class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <h3 class="font-bold text-lg mb-3">Ubah Status</h3>
                                    <form action="{{ url('issue/report/' . $item->issue_report_id) }}"
                                        method="POST" class="flex flex-col space-y-4 w-full form mr-3">
                                        @csrf
                                        {!! method_field('PUT') !!}
                                        <div class="flex flex-col space-y-1 mb-3">
                                            <div class="flex gap-2">
                                                <h3 class="font-bold text-xl">{{ $item->title }}</h3>
                                                <h3 class="badge badge-secondary">{{ $item->status }}</h3>
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
                                            <label for="status">Status</label>
                                            <select name="status" id="status"
                                                class="rounded-md border border-gray-300 p-2">
                                                <option disabled selected
                                                    value="{{ old('status', $item->status) }}">- Status -</option>
                                                @foreach ($status as $statusItem)
                                                    <option value="{{ $statusItem }}">{{ $statusItem }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="flex flex-row justify-end">
                                            <button class="btn btn-primary mx-2">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>

                            {{-- modal Archive --}}
                            <dialog id="{{ $archiveModalId }}" class="modal">
                                <div class="modal-box">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <h3 class="font-bold text-lg mb-3">Arsipkan Masalah</h3>
                                    <form action="{{ url('issue/report/' . $item->issue_report_id . '/archive') }}"
                                        method="POST" class="flex flex-col space-y-4 w-full form mr-3">
                                        @csrf
                                        {!! method_field('PUT') !!}
                                        <div class="flex flex-col space-y-1 mb-3">
                                            <div class="flex gap-2">
                                                <h3 class="font-bold text-xl">{{ $item->title }}</h3>
                                                <h3 class="badge badge-secondary">{{ $item->status }}</h3>
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
                                            <label class="text-base font-bold" for="status">Apakah Anda yakin ingin mengarsipkan masalah ini?</label>
                                        </div>
                                        <div class="flex flex-row justify-end">
                                            <button class="btn btn-error mx-2 text-white">Arsipkan</button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>

                        </div>
                    </div>
                </div>
            @endforeach
            </div>

            <div class="bg-accent p-5 rounded-md">
                <h3 class="text-xl font-bold text-white">Solved</h3>
                @foreach ($solved as $item)
                @php
                    $updateModalId = 'update_modal_' . $item->issue_report_id;
                    $archiveModalId = 'archive_modal_' . $item->issue_report_id;
                @endphp
                <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                    <div class="card-body">
                        <h2 class="card-title">{{ $item->title }}</h2>
                        <p>{{ $item->description }}</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-sm btn-primary"
                                onclick="document.getElementById('{{ $updateModalId }}').showModal()">Ubah
                                Status</button>
                            <button class="btn btn-sm btn-error text-white"
                                onclick="document.getElementById('{{ $archiveModalId }}').showModal()">Arsipkan</button>

                            {{-- modal Update Status --}}
                            <dialog id="{{ $updateModalId }}" class="modal">
                                <div class="modal-box">
                                    <form method="dialog">
                                        <button
                                            class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <h3 class="font-bold text-lg mb-3">Ubah Status</h3>
                                    <form action="{{ url('issue/report/' . $item->issue_report_id) }}"
                                        method="POST" class="flex flex-col space-y-4 w-full form mr-3">
                                        @csrf
                                        {!! method_field('PUT') !!}
                                        <div class="flex flex-col space-y-1 mb-3">
                                            <div class="flex gap-2">
                                                <h3 class="font-bold text-xl">{{ $item->title }}</h3>
                                                <h3 class="badge badge-accent text-white">{{ $item->status }}</h3>
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
                                            <label for="status">Status</label>
                                            <select name="status" id="status"
                                                class="rounded-md border border-gray-300 p-2">
                                                <option disabled selected
                                                    value="{{ old('status', $item->status) }}">- Status -</option>
                                                @foreach ($status as $statusItem)
                                                    <option value="{{ $statusItem }}">{{ $statusItem }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="flex flex-row justify-end">
                                            <button class="btn btn-primary mx-2">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>

                            {{-- modal Archive --}}
                            <dialog id="{{ $archiveModalId }}" class="modal">
                                <div class="modal-box">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <h3 class="font-bold text-lg mb-3">Arsipkan Masalah</h3>
                                    <form action="{{ url('issue/report/' . $item->issue_report_id . '/archive') }}"
                                        method="POST" class="flex flex-col space-y-4 w-full form mr-3">
                                        @csrf
                                        {!! method_field('PUT') !!}
                                        <div class="flex flex-col space-y-1 mb-3">
                                            <div class="flex gap-2">
                                                <h3 class="font-bold text-xl">{{ $item->title }}</h3>
                                                <h3 class="badge badge-accent text-white">{{ $item->status }}</h3>
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
                                            <label class="text-base font-bold" for="status">Apakah Anda yakin ingin mengarsipkan masalah ini?</label>
                                        </div>
                                        <div class="flex flex-row justify-end">
                                            <button class="btn btn-error mx-2 text-white">Arsipkan</button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>

                        </div>
                    </div>
                </div>
            @endforeach
            </div>

            <div class="bg-neutral p-5 rounded-md">
                <h3 class="text-xl font-bold text-white">Invalid</h3>
                @foreach ($invalid as $item)
                @php
                    $updateModalId = 'update_modal_' . $item->issue_report_id;
                    $archiveModalId = 'archive_modal_' . $item->issue_report_id;
                @endphp
                <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                    <div class="card-body">
                        <h2 class="card-title">{{ $item->title }}</h2>
                        <p>{{ $item->description }}</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-sm btn-primary"
                                onclick="document.getElementById('{{ $updateModalId }}').showModal()">Ubah
                                Status</button>
                            <button class="btn btn-sm btn-error text-white"
                                onclick="document.getElementById('{{ $archiveModalId }}').showModal()">Arsipkan</button>

                            {{-- modal Update Status --}}
                            <dialog id="{{ $updateModalId }}" class="modal">
                                <div class="modal-box">
                                    <form method="dialog">
                                        <button
                                            class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <h3 class="font-bold text-lg mb-3">Ubah Status</h3>
                                    <form action="{{ url('issue/report/' . $item->issue_report_id) }}"
                                        method="POST" class="flex flex-col space-y-4 w-full form mr-3">
                                        @csrf
                                        {!! method_field('PUT') !!}
                                        <div class="flex flex-col space-y-1 mb-3">
                                            <div class="flex gap-2">
                                                <h3 class="font-bold text-xl">{{ $item->title }}</h3>
                                                <h3 class="badge badge-neutral">{{ $item->status }}</h3>
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
                                            <label for="status">Status</label>
                                            <select name="status" id="status"
                                                class="rounded-md border border-gray-300 p-2">
                                                <option disabled selected
                                                    value="{{ old('status', $item->status) }}">- Status -</option>
                                                @foreach ($status as $statusItem)
                                                    <option value="{{ $statusItem }}">{{ $statusItem }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="flex flex-row justify-end">
                                            <button class="btn btn-primary mx-2">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>

                            {{-- modal Archive --}}
                            <dialog id="{{ $archiveModalId }}" class="modal">
                                <div class="modal-box">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <h3 class="font-bold text-lg mb-3">Arsipkan Masalah</h3>
                                    <form action="{{ url('issue/report/' . $item->issue_report_id . '/archive') }}"
                                        method="POST" class="flex flex-col space-y-4 w-full form mr-3">
                                        @csrf
                                        {!! method_field('PUT') !!}
                                        <div class="flex flex-col space-y-1 mb-3">
                                            <div class="flex gap-2">
                                                <h3 class="font-bold text-xl">{{ $item->title }}</h3>
                                                <h3 class="badge badge-neutral">{{ $item->status }}</h3>
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
                                            <label class="text-base font-bold" for="status">Apakah Anda yakin ingin mengarsipkan masalah ini?</label>
                                        </div>
                                        <div class="flex flex-row justify-end">
                                            <button class="btn btn-error mx-2 text-white">Arsipkan</button>
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
