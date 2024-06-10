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
            <h2 class="text-4xl font-bold mb-16 text-center text-slate-800">Pencatatan Keuangan</h2>
            <div class="grid grid-cols-3 gap-4 px-4 max-w-screen-lg mx-auto">
                <div class="col-span-3 h-full border p-4 rounded-md">
                    <canvas id="mutation" width="360" height="130"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('head_scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpush

    @push('body_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const mutationCtx = document.getElementById('mutation').getContext('2d');
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
        });
    </script>
    @endpush

    @stack('head_scripts')
    @stack('body_scripts')
</body>
</html>
