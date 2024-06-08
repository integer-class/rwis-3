@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-12 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-3 text-3xl">Social Aid Ranking Tools</h3>
            <div class="flex w-full justify-between">
                <div class=" breadcrumbs mb-3">
                    <ul>
                        <li><a href="{{ url('social') }}">Home</a></li>
                        <li><a href="{{ url('social/calculate') }}">Social Aid Ranking Tools</a></li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            @if (session('success'))
                <div role="alert" class="alert alert-info mb-3 text-white">
                    <svg
                        xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div role="alert" class="alert alert-error mb-3 text-white">
                    <svg
                        xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form
                action="{{ route('social.calculate.rank') }}" method="POST"
                class="flex flex-col space-y-4 w-full form mr-3 mb-5"
            >
                @csrf
                @if ($errors->any())
                    <div class="bg-red-100 text-red-500 p-2 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="flex flex-col space-y-1">
                    <div class="flex flex-col gap-4">
                        <div class="text-right">
                            Beban Kriteria (0 - 1)
                        </div>
                        <div class="flex gap-3">
                            <input
                                class="w-full input input-bordered"
                                value="Total Pendapatan"
                                readonly
                            />
                            <input
                                type="text"
                                class="rounded-md border border-gray-300 p-2 w-20"
                                value="0.4"
                                name="income_range_weight"
                                placeholder="..."
                            >
                        </div>
                        <div class="flex gap-3">
                            <input
                                class="w-full input input-bordered"
                                value="Jumlah Anggota Keluarga"
                                readonly
                            />
                            <input
                                type="text"
                                class="rounded-md border border-gray-300 p-2 w-20"
                                value="0.2"
                                name="family_number_weight"
                                placeholder="..."
                            >
                        </div>
                        <div class="flex gap-3">
                            <input
                                class="w-full input input-bordered"
                                value="Luas Properti"
                                readonly
                            />
                            <input
                                type="text"
                                class="rounded-md border border-gray-300 p-2 w-20"
                                value="0.3"
                                name="property_area_weight"
                                placeholder="..."
                            >
                        </div>
                        <div class="flex gap-3">
                            <input
                                class="w-full input input-bordered"
                                value="Usia Produktif"
                                readonly
                            />
                            <input
                                type="text"
                                class="rounded-md border border-gray-300 p-2 w-20"
                                value="0.1"
                                name="productive_age_weight"
                                placeholder="..."
                            >
                        </div>
                        <div class="flex gap-3">
                            <input
                                class="w-full input input-bordered"
                                value="Usia Non Produktif"
                                readonly
                            />
                            <input
                                type="text"
                                class="rounded-md border border-gray-300 p-2 w-20"
                                value="0.1"
                                name="non_productive_age_weight"
                                placeholder="..."
                            >
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button
                        class="btn btn-primary text-white rounded-md"
                        type="submit"
                    >
                        Hitung Ranking
                    </button>
                </div>
            </form>

            @if(isset($rankedHouseholds))
                <livewire:social-aid-resident-table :rows="$rankedHouseholds" />
            @endif
        </div>
    </div>
@endsection
