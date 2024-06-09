@props([
    'href' => '/',
    'icon' => 'ic--outline-info',
    'title' => 'Default Title',
    'submenu' => [],
])

@php($currentUrl = request()->url())

<li>
    @if (count($submenu) > 0)
        <details
            @if (in_array($currentUrl, array_column($submenu, 'href')))
                open
            @endif
        >
            <summary>
                <span class="icon-[{{ $icon }}] text-xl mt-0.5"></span>
                <span class="mx-2 mt-1">{{ $title }}</span>
            </summary>
            <ul>
                @foreach($submenu as $item)
                    <li>
                        <a href="{{ $item['href'] }}">
                            <span class="icon-[{{ $item['icon'] }}] text-xl"></span>
                            {{ $item['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </details>
    @else
        <a href="{{ $href }}">
            <span class="icon-[{{ $icon }}] text-xl"></span>
            {{ $title }}
        </a>
    @endif
</li>

{{-- the script tag is only here because we need to trigger the IDE syntax highlighting --}}
<script>
    @push('sidebar_script')
    if (currentUrl.includes('{{ $href }}')) {
        const menu = document.querySelector('a[href="{{ $href }}"]');
        if (menu) {
            menu.setAttribute('class', 'active');
        }
    }

    @foreach($submenu as $submenuItem)
    if (currentUrl.includes('{{ $submenuItem['href'] }}')) {
        const subMenu = document.querySelector('a[href="{{ $submenuItem['href'] }}"]');
        if (subMenu) {
            subMenu.setAttribute('class', 'active');
        }
    }
    @endforeach
    @endpush
</script>
