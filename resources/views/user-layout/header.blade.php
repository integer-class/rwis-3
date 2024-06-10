<nav class="flex py-4 px-80 bg-base-100 gap-4 fixed top-0 left-0 right-0 shadow-sm z-50 justify-between">
    <a href="{{ url('/') }}">
        <div class="flex items-center gap-3 bg-base-100">
            <img
                src="{{ request('uwu') === 'true' ? asset('img/icon_uwu.png') : asset('img/icon.png') }}" alt="icon"
                class="h-auto {{request('uwu') === 'true' ? 'w-32' : 'w-12' }}"
            >
            <h6 class="font-bold text-black">RW 11 Information System</h6>
        </div>
    </a>
    <div class="flex items-center gap-14 bg-base-100 justify-end">
        <a
            href="{{ url('/facility') }}"
            class="text-black text-center hover:text-primary transition ease-in-out delay-50 hover:-translate-y-0.5 duration-300"
        >Fasilitas</a>
        <a
            href="{{ url('/umkm') }}"
            class="text-black text-center hover:text-primary transition ease-in-out delay-50 hover:-translate-y-0.5 duration-300"
        >UMKM</a>
        <a
            href="{{ url('issue-report') }}"
            class="text-black text-center hover:text-primary transition ease-in-out delay-50 hover:-translate-y-0.5 duration-300"
        >Laporan</a>
        <a
            href="{{ url('financial') }}"
            class="text-black text-center hover:text-primary transition ease-in-out delay-50 hover:-translate-y-0.5 duration-300"
        >Kontribusi</a>
        @if (Auth::check())
        <a
            href="{{ url('/dashboard') }}" class="bg-primary text-white text-center py-4 px-20 rounded-xl font-bold"
        >Dashboard</a>
        @else
        <a
            href="{{ url('/dashboard') }}" class="bg-primary text-white text-center py-4 px-20 rounded-xl font-bold"
        >Login</a>
        @endif
    </div>
</nav>
