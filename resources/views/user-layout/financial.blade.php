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
        <h2 class="text-4xl font-bold mb-16 text-center text-slate-800">Financial Contribution</h2>
        <div class="grid grid-cols-3 gap-4 px-4 max-w-screen-lg mx-auto">
            @foreach ($mutations as $df)
                @push('body_scripts')
                <script>
                    const mutationCtx = document.getElementById('mutation');
                    new Chart(mutationCtx, {
                        type: 'line',
                        data: {
                            labels: @json($df->pluck('date')),
                            datasets: [{
                                label: 'Mutasi Iuran',
                                data: @json($df->pluck('total')),
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
                            scales: {
                                y: {
                                    grid: {
                                        display: true
                                    }
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
            @endforeach
        </div>
    </div>
</div>
