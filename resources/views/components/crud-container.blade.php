@props([
    'title' => 'Default Title',
    'breadcrumbs' => [],
    'add-url' => null,
    'archived-url' => null
])

<div class="py-8 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
    <div class="max-w-7-xl mx-auto sm:px-6 lg:px-8">
        <h3 class="text-3xl font-bold">{{ $title }}</h3>
        <div class="flex w-full justify-between items-center mb-4 pb-2 border-b">
            <x-breadcrumb :segments="$breadcrumbs" />
            <div class="flex gap-2">
                @if (isset($attributes['add-url']))
                    <a href="{{ $attributes['add-url'] }}" class="btn btn-sm btn-primary">
                        Tambah Data
                    </a>
                @endif
                @if (isset($attributes['archived-url']))
                    <a href="{{ $attributes['archived-url'] }}" class="btn btn-sm">
                        Lihat Arsip
                    </a>
                @endif
            </div>
        </div>
        <x-toast />
        {{ $slot }}
    </div>
</div>
