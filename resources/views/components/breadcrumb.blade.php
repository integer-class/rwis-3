@props([
    'segments' => [],
])

<div class="breadcrumbs">
    <ul>
        @foreach($segments as $segment)
            <li>
                <a href="{{ $segment['href'] }}">
                    {{ $segment['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

