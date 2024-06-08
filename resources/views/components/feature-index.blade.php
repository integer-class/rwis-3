@props([
    'title' => '',
    'description' => '',
    'features' => [],
])
@vite('resources/css/resident/app.css')

<div class="py-12 bg-white shadow-xl rounded-t-lg mt-5 mx-5">
    <div class="max-w-7-xl mx-auto px-8">
        <div class="pb-2 mb-4 border-b">
            <h3 class="text-3xl font-medium">{{ $title }}</h3>
            <p class="leading-relaxed">{{ $description }}</p>
        </div>
        @foreach ($features as $feature)
            <x-feature-menu
                href="{{ $feature['link'] }}"
                title="{{ $feature['title'] }}"
                img="{{ $feature['image'] }}"
            />
        @endforeach
    </div>
</div>
