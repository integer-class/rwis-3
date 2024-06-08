@props([
    'href' => '/',
    'title' => 'Default Title',
    'img' => '',
])

<a href="{{ $href }}">
    <div
        class="card card-side bg-base-100 shadow-xl mb-5 hover:text-white hover:bg-primary transition ease-in-out delay-150 hover:-translate-y-1 duration-300"
    >
        <div class="card-body flex justify-center">
            <h2 class=" text-3xl font-bold">{{ $title }}</h2>
        </div>
        @if ($img)
            <figure>
                <img src="{{ asset($img) }}" alt="{{ $title }}" />
            </figure>
        @endif
    </div>
</a>
