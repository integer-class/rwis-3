@php use App\enum\RangeIncomeResident; @endphp
@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-8 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex w-full pb-4 border-b mb-4">
                <ul class="flex items-center gap-4 w-full">
                    <li class="flex-1">
                        <a class="btn w-full" href="{{ url('information') }}">
                            <span class="icon-[ic--outline-info] text-xl mt-0.5"></span>
                            Information Centre
                        </a>
                    </li>
                    <li class="flex-1">
                        <a class="btn w-full" href="{{ url('data') }}">
                            <span class="icon-[ic--baseline-public] text-xl mt-0.5"></span>
                            Data Digitalization
                        </a>
                    </li>
                    <li class="flex-1">
                        <a class="btn w-full" href="{{ url('issue') }}">
                            <span class="icon-[ic--round-track-changes] text-xl mt-0.5"></span>
                            Issue Tracker
                        </a>
                    </li>
                    <li class="flex-1">
                        <a class="btn w-full" href="{{ url('broadcast') }}">
                            <span class="icon-[ic--round-podcasts] text-xl mt-0.5"></span>
                            Broadcast
                        </a>
                    </li>
                    <li class="flex-1">
                        <a class="btn w-full" href="{{ url('signature') }}">
                            <span class="icon-[ic--round-qr-code text-xl mt-0.5"></span>
                            Signature
                        </a>
                    </li>
                </ul>
            </div>
            {{-- content --}}
            <div class="grid grid-cols-12 ">
                <div class="col-span-5 h-[40rem] border p-4 rounded-md">
                    <canvas id="myChart" width="100" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('head_scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@push('body_scripts')
    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($residentIncomes->pluck('range')),
                datasets: [{
                    label: 'Rentang Pendapatan Penduduk',
                    data: @json($residentIncomes->pluck('count')),
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            min: 0,
                            stepSize: 1
                        },
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
@endpush
