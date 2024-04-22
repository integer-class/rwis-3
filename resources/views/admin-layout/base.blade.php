<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ config('RWIS') }}</title>
</head>

<body class="h-screen flex flex-col">
    {{-- Container untuk Sidebar dan Main Content --}}
    <div class="flex flex-grow">
        {{-- Sidebar --}}
        <aside class="h-full">
            @include('admin-layout.sidebar')
        </aside>

        {{-- Main Content --}}
        <main class="flex-grow bg-base-200 p-4">
            @yield('content')
            {{-- Footer --}}
            @include('admin-layout.footer')
        </main>
    </div>

    {{-- Drawer Overlay for Mobile --}}
    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay lg:hidden"></label>

    {{-- Script to control drawer toggle --}}
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle hidden" />

</body>

</html>
