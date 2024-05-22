@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg my-5 mx-5 h-full">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Issue Tracker Status</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ url('issue') }}">Home</a></li>
                        <li><a href="{{ url('issue/report') }}">Issue Tracker Status</a></li>
                    </ul>
                </div>
                <div class="flex justify-end">
                    <a href="{{ url('issue/report/archived') }}"
                        class="archived-btn btn-sm px-4 py-1.5 bg-blue-500 text-white rounded-md">Archived</a>
                </div>
            </div>
            {{-- content --}}
            @if (session('success'))
                <div role="alert" class="alert alert-info mb-3 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div role="alert" class="alert alert-error mb-3 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <div class="h-20 grid grid-row md:grid-cols-4 gap-5">
                <div class="bg-red-300 p-3 rounded-md">
                    <h3 class="text-xl">To do</h3>
                    @foreach ($todo as $item)
                        <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                            <div class="card-body">
                                <h2 class="card-title">{{ $item->title }}</h2>
                                <p>{{ $item->description }}</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-primary" onclick="my_modal_1.showModal()">Update Status</button>
                                    {{-- modal --}}
                                    <dialog id="my_modal_1" class="modal">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg mb-3">Update Status</h3>
                                            <div class="flex flex-col space-y-1 mb-3">
                                                <label for="full_name">Title</label>
                                                <input type="text" name="full_name" id="full_name"
                                                    class="rounded-md border border-gray-300 p-2"
                                                    placeholder="Enter your full name">
                                            </div>
                                            <div class="flex flex-col space-y-1">
                                                <label for="full_name">Description</label>
                                                <textarea class="rounded-md border border-gray-300 p-2" name="" id="" cols="20" rows="10"></textarea>
                                            </div>
                                            <div class="modal-action">
                                                <form method="dialog">
                                                    <!-- if there is a button in form, it will close the modal -->
                                                    <button class="btn btn-primary mx-2">Update</button>
                                                    <button class="btn">Close</button>
                                                </form>
                                            </div>
                                        </div>
                                    </dialog>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="bg-blue-300 p-3 rounded-md">
                    <h3 class="text-xl">In Progress</h3>
                    @foreach ($inProgress as $item)
                        <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                            <div class="card-body">
                                <h2 class="card-title">{{ $item->title }}</h2>
                                <p>{{ $item->description }}</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-primary">Update Status</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="bg-yellow-300 p-3 rounded-md">
                    <h3 class="text-xl">In Review</h3>
                    @foreach ($inReview as $item)
                        <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                            <div class="card-body">
                                <h2 class="card-title">{{ $item->title }}</h2>
                                <p>{{ $item->description }}</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-primary">Update Status</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="bg-green-300 p-3 rounded-md">
                    <h3 class="text-xl">Done</h3>
                    @foreach ($done as $item)
                        <div class="card card-compact w56 bg-base-100 shadow-xl my-3 rounded-md">
                            <div class="card-body">
                                <h2 class="card-title">{{ $item->title }}</h2>
                                <p>{{ $item->description }}</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-primary">Update Status</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
