@props([
    'title' => 'Default Title',
    'breadcrumbs' => [],
])

<div class="py-8 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
    <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
        <h3 class="text-3xl font-bold">{{ $title }}</h3>
        <div class="flex w-full justify-between mb-4 pb-2 border-b">
            <x-breadcrumb :segments="$breadcrumbs" />
        </div>
        <x-toast />
        {{ $slot }}
    </div>
</div>
