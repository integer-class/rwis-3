<!DOCTYPE html>
<html lang="en" class="h-full" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>RW 11 Information System</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/icon.png') }}">
</head>

<body class="h-full font-rubik">
    <div class="bg-base-100 h-full">
        @include('user-layout.header')
        <div id="content" class="py-44">
            <h2 class="text-4xl font-bold mb-16 text-center text-slate-800">Laporan Masalah</h2>


            <div class="max-w-screen-2xl mx-auto">

                <div class="h-20 grid grid-row md:grid-cols-4 gap-5">
                    <div class="bg-primary p-5 rounded-md">
                        <h3 class="text-xl text-white font-bold">To do</h3>
                        @foreach ($todo as $item)
                            @php
                                $viewModalId = 'view_modal_' . $item->issue_report_id;
                            @endphp
                            <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $item->title }}</h2>
                                    <p>{{ $item->description }}</p>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-sm btn-primary"
                                            onclick="document.getElementById('{{ $viewModalId }}').showModal()">View
                                        </button>

                                        {{-- modal View Status --}}
                                        <dialog id="{{ $viewModalId }}" class="modal">
                                            <div class="modal-box">
                                                <form method="dialog">
                                                    <button
                                                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                                </form>
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
                                                        <p class="text-lg">{{ $item->description }}</p>
                                                    </div>
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
                            $viewModalId = 'view_modal_' . $item->issue_report_id;
                        @endphp
                        <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                            <div class="card-body">
                                <h2 class="card-title">{{ $item->title }}</h2>
                                <p>{{ $item->description }}</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-sm btn-primary"
                                        onclick="document.getElementById('{{ $viewModalId }}').showModal()">View
                                    </button>

                                    {{-- modal View Status --}}
                                    <dialog id="{{ $viewModalId }}" class="modal">
                                        <div class="modal-box">
                                            <form method="dialog">
                                                <button
                                                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
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
                                                    <p class="text-lg">{{ $item->description }}</p>
                                                </div>
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
                            $viewModalId = 'view_modal_' . $item->issue_report_id;
                        @endphp
                        <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                            <div class="card-body">
                                <h2 class="card-title">{{ $item->title }}</h2>
                                <p>{{ $item->description }}</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-sm btn-primary"
                                        onclick="document.getElementById('{{ $viewModalId }}').showModal()">View
                                    </button>

                                    {{-- modal View Status --}}
                                    <dialog id="{{ $viewModalId }}" class="modal">
                                        <div class="modal-box">
                                            <form method="dialog">
                                                <button
                                                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
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
                                                    <p class="text-lg">{{ $item->description }}</p>
                                                </div>
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
                            $viewModalId = 'view_modal_' . $item->issue_report_id;
                        @endphp
                        <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                            <div class="card-body">
                                <h2 class="card-title">{{ $item->title }}</h2>
                                <p>{{ $item->description }}</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-sm btn-primary"
                                        onclick="document.getElementById('{{ $viewModalId }}').showModal()">View
                                    </button>

                                    {{-- modal View Status --}}
                                    <dialog id="{{ $viewModalId }}" class="modal">
                                        <div class="modal-box">
                                            <form method="dialog">
                                                <button
                                                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
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
                                                    <p class="text-lg">{{ $item->description }}</p>
                                                </div>
                                        </div>
                                    </dialog>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>

            </div>



        </div>
    </div>
