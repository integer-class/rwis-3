@php use App\Enum\RangeIncomeResident; @endphp
@extends('admin-layout.base')

@section('content')
    @vite('resources/css/resident/app.css')
    <div class="py-8 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
        <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex w-full pb-4 border-b mb-4">
                <ul class="flex items-center gap-4 w-full">
                    <li class="flex-1">
                        <a class="btn hover:btn-primary w-full" href="{{ url('information') }}">
                            <span class="icon-[ic--outline-info] text-xl mt-0.5"></span>
                            Information Centre
                        </a>
                    </li>
                    <li class="flex-1">
                        <a class="btn hover:btn-primary w-full" href="{{ url('data') }}">
                            <span class="icon-[ic--baseline-public] text-xl mt-0.5"></span>
                            Data Digitalization
                        </a>
                    </li>
                    <li class="flex-1">
                        <a class="btn hover:btn-primary w-full" href="{{ url('issue') }}">
                            <span class="icon-[ic--round-track-changes] text-xl mt-0.5"></span>
                            Issue Tracker
                        </a>
                    </li>
                    <li class="flex-1">
                        <a class="btn hover:btn-primary w-full" href="{{ url('broadcast') }}">
                            <span class="icon-[ic--round-podcasts] text-xl mt-0.5"></span>
                            Broadcast
                        </a>
                    </li>
                    <li class="flex-1">
                        <a class="btn hover:btn-primary w-full" href="{{ url('social') }}">
                            <span class="icon-[ic--round-attach-money] text-xl mt-0.5"></span>
                            Social Aid
                        </a>
                    </li>
                </ul>
            </div>
            {{-- content --}}
            <div class="flex border-b pb-4 mb-4">
                <div class="flex-1">
                    <h1 class="text-2xl font-bold">Dashboard</h1>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4 h-[20rem] mb-4">
                <div class="col-span-3 border p-4 rounded-md relative">
                    <h3 class="text-lg font-medium text-slate-700">Penduduk</h3>

                    <p class="text-6xl text-right font-bold bottom-4 right-4 absolute text-slate-700">
                        {{ $totalResidents }}
                    </p>
                </div>
                <div class="col-span-3 border p-4 rounded-md relative">
                    <h3 class="text-lg font-medium text-slate-700">Keluarga</h3>
                    <p class="text-6xl text-right font-bold bottom-4 right-4 absolute text-slate-700">
                        {{ $totalHouseholds }}
                    </p>
                </div>
                <div class="col-span-3 border p-4 rounded-md relative">
                    <h3 class="text-lg font-medium text-slate-700">Laporan Baru</h3>
                    <p class="text-6xl text-right font-bold bottom-4 right-4 absolute text-slate-700">
                        {{ $totalReportToDo }}
                    </p>
                </div>
                <div class="col-span-3 border p-4 rounded-md relative">
                    <h3 class="text-lg font-medium text-slate-700">Laporan Sedang Diproses</h3>
                    <p class="text-6xl text-right font-bold bottom-4 right-4 absolute text-slate-700">
                        {{ $totalReportOnGoing }}
                    </p>
                </div>
                <div class="col-span-3 border p-4 rounded-md relative">
                    <h3 class="text-lg font-medium text-slate-700">Laporan Sudah Selesai</h3>
                    <p class="text-6xl text-right font-bold bottom-4 right-4 absolute text-slate-700">
                        {{ $totalReportSolved }}
                    </p>
                </div>
                <div class="col-span-3 border p-4 rounded-md relative">
                    <h3 class="text-lg font-medium text-slate-700">Laporan Dibatalkan</h3>
                    <p class="text-6xl text-right font-bold bottom-4 right-4 absolute text-slate-700">
                        {{ $totalReportInvalid }}
                    </p>
                </div>
                <div class="col-span-3 border p-4 rounded-md relative">
                    <h3 class="text-lg font-medium text-slate-700">Fasilitas</h3>
                    <p class="text-6xl text-right font-bold bottom-4 right-4 absolute text-slate-700">
                        {{ $totalFacilities }}
                    </p>
                </div>
                <div class="col-span-3 border p-4 rounded-md relative">
                    <h3 class="text-lg font-medium text-slate-700">UMKM</h3>
                    <p class="text-6xl text-right font-bold bottom-4 right-4 absolute text-slate-700">
                        {{ $totalUmkm }}
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-12 grid-flow-dense gap-4">
                <div class="col-span-5 h-[36rem] border p-4 rounded-md">
                    <canvas id="salary" width="100" height="100"></canvas>
                </div>
                <div class="grid grid-rows-[14rem,1fr] gap-4 grid-cols-subgrid col-span-7">
                    <div class="col-span-5 h-full border p-4 rounded-md">
                        <canvas id="gender" width="330" height="120"></canvas>
                    </div>
                    <div class="col-span-2 h-full border p-4 rounded-md">
                        <canvas id="age-group" width="100" height="120"></canvas>
                    </div>
                    <div class="col-span-7 h-full border p-4 rounded-md">
                        <canvas id="mutation" width="360" height="130"></canvas>
                    </div>
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
        const salaryCtx = document.getElementById('salary');
        new Chart(salaryCtx, {
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
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 16
                            }
                        }
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            min: 0,
                            stepSize: 1,
                            font: {
                                size: 14
                            }
                        },
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 14
                            }
                        },
                    }
                }
            }
        });

        const genderCtx = document.getElementById('gender');
        new Chart(genderCtx, {
            type: 'bar',
            data: {
                labels: @json($genders->pluck('gender')),
                datasets: [{
                    label: 'Jenis Kelamin Penduduk',
                    data: @json($genders->pluck('count')),
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                    ],
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 16
                            }
                        }
                    },
                },
                indexAxis: 'y',
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            min: 0,
                            stepSize: 1,
                            font: {
                                size: 14
                            }
                        },
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });

        const ageGroupCtx = document.getElementById('age-group');
        new Chart(ageGroupCtx, {
            type: 'pie',
            data: {
                labels: @json($ageGroups->pluck('group')),
                datasets: [{
                    label: 'Usia Penduduk',
                    data: @json($ageGroups->pluck('count')),
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                    ],
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 16
                            }
                        }
                    },
                },
                scales: {
                    y: {
                        grid: {
                            display: false,
                        },
                        ticks: {
                            display: false,
                            font: {
                                size: 14
                            }
                        },
                    },
                    x: {
                        grid: {
                            display: false,
                        },
                        ticks: {
                            display: false,
                            font: {
                                size: 14
                            }
                        },
                    }
                }
            }
        });

        const mutationCtx = document.getElementById('mutation');
        new Chart(mutationCtx, {
            type: 'line',
            data: {
                labels: @json($mutations->pluck('date')),
                datasets: [{
                    label: 'Mutasi Iuran',
                    data: @json($mutations->pluck('total')),
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgb(75, 192, 192)',
                    ],
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 16
                            }
                        }
                    },
                },
                scales: {
                    y: {
                        grid: {
                            display: true
                        },
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });
    </script>
@endpush
