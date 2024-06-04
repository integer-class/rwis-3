@php
$informations = [
[ 'url' => 'information/facility', 'name' => 'Facility Information', 'image' => '/img/facility.png' ],
[ 'url' => 'information/umkm', 'name' => 'UMKM Information', 'image' => '/img/umkm.png' ],
[ 'url' => 'information/issue-report', 'name' => 'Issue Report', 'image' => '/img/resident.png' ],
[ 'url' => 'information/financial-contribution', 'name' => 'Financial Contributions', 'image' => '/img/bookkeeping.png' ],
];
@endphp

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
    <div class="bg-no-repeat bg-cover w-full flex px-80 h-full flex-col gap-4" style="background-image: url('/img/homepage.png')">
        <h1 class="font-bold pt-96 mt-44 text-white text-6xl w-full">Selamat Datang di<br>Sistem Informasi RW 11!</h1>
        <h2 class="text-white font-bold">Lorem Ipsum Dolor Sit Amet, consectetur adipiscing elit. Duis a hendrerit
            diam.</h2>
        <a href="#content" class="bg-primary text-white text-center py-4 w-1/6 rounded-xl font-bold">Yuk Lihat!</a>
    </div>
    <div id="content" class="bg-base-100 py-32">
        <h2 class="text-4xl font-bold mb-8 text-center text-slate-800">Eksplorasi RW 11!</h2>
        <div class="flex flex-col gap-4 max-w-[72rem] mx-auto">
            @foreach($informations as $info)
            <a href="{{ url($info['url']) }}">
                <div
                    class="card card-side bg-base-100 shadow-xl mb-5 hover:text-white hover:bg-primary trloremansition ease-in-out delay-150 hover:-translate-y-1 duration-300">
                    <div class="card-body flex justify-center">
                        <h2 class=" text-3xl font-bold">{{ $info['name'] }}</h2>
                        <div class="card-actions justify-start">
                        </div>
                    </div>
                    <figure>
                        <img src="{{ asset($info['image']) }}" alt="Movie"/>
                    </figure>
                </div>
            </a>
            @endforeach
        </div>
        <h2 class="pt-32 pb-8 text-center text-slate-800 font-bold text-4xl">Tentang RW 11 Information System</h2>
        <p class="text-center text-slate-800 text-2xl px-80">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis doloremque earum et id nesciunt nihil sed sequi sint totam ut. Architecto blanditiis distinctio earum facilis iure quia, quibusdam repellat sed. Earum est et mollitia, nobis odit perspiciatis quam velit voluptatem?</p>
    </div>
    <div class="bg-indigo-900 w-full px-80 py-16">
        <div class="flex items-center gap-3 w-1/12">
            <img src="{{ asset('img/icon.png') }}" alt="icon" width="64">
            <h6 class="font-bold text-white">RW 11 Information System</h6>
        </div>
        <div class="flex w-full">
            <div class="pt-12 flex flex-col gap-6 max-w-[72rem] w-1/2">
                <div class="font-bold text-white flex">
                    <h1>Explorasi</h1>
                </div>
                <div class="text-white flex flex-col gap-6 max-w-[72rem]">
                    <a href="">Tentang RW 11 Information System</a>
                    <a href="">Disclaimer</a>
                    <a href="">Tim Kami</a>
                </div>
            </div>
            <div class="pt-12 flex flex-col gap-6 max-w-[72rem] w-1/2">
                <div class="font-bold text-white flex">
                    <h1>Kontak Kami</h1>
                </div>
                <div class="text-white flex flex-col gap-6 max-w-[72rem]">
                    <a href="">contact@rw11is.id</a>
                    <a href="">Instagram</a>
                    <a href="">Whatsapp</a>
                </div>
            </div>
        </div>
        <hr class="mt-8 border-0 h-0.5 bg-indigo-700">
        <div class="flex justify-between text-white mt-4">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Copyright © 2024 RW 11 Information System</p>
        </div>
    </div>
</div>
</body>

</html>

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!---->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    @vite('resources/css/app.css')-->
<!--    <title>test</title>-->
<!--</head>-->
<!---->
<!--<body>-->
<!--<h1 class="text-3xl font-bold underline">-->
<!--    Hello world!-->
<!--</h1>-->
<!--<a href="{{ url('/login') }}">login</a>-->
<!--</body>-->
<!---->
<!--</html>-->
