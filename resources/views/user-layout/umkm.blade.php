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
        <h2 class="text-4xl font-bold mb-16 text-center text-slate-800">UMKM Information</h2>
        <div class="grid grid-cols-3 gap-4 px-4 max-w-screen-lg mx-auto">
            @foreach ($dataumkm as $du)
            <div class="card w-full bg-base-100 shadow-xl flex gap-4 mx-auto">
                <figure><img src="/img/homepage.png" alt="pict"/></figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $du->name }}</h2>
                    <p>{{ $du->description}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
