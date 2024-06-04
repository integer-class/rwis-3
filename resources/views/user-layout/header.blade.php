<nav class="flex py-4 px-80 bg-base-100 gap-4 sticky top-0 shadow-sm z-50">
    <div class="flex items-center gap-3 bg-base-100 w-4/6">
        <img src="{{ asset('img/icon.png') }}" alt="icon" width="48">
        <h6 class="font-bold text-black">RW 11 Information System</h6>
    </div>
    <div class="flex items-center gap-14 bg-base-100 w-5/6">
        <a href="{{ url('/information/facility') }}" class="text-black text-center hover:text-primary transition ease-in-out delay-50 hover:-translate-y-0.5 duration-300">Facility</a>
        <a href="{{ url('/information/umkm') }}" class="text-black text-center hover:text-primary transition ease-in-out delay-50 hover:-translate-y-0.5 duration-300">UMKM</a>
        <a href="{{ url('/information/issue-report') }}" class="text-black text-center hover:text-primary transition ease-in-out delay-50 hover:-translate-y-0.5 duration-300">Issue</a>
        <a href="{{ url('/information/financial-contribution') }}" class="text-black text-center hover:text-primary transition ease-in-out delay-50 hover:-translate-y-0.5 duration-300">Contribution</a>
        <a href="{{ url('/login') }}" class="bg-primary text-white text-center py-4 w-2/6 rounded-xl font-bold">Login</a>
    </div>
</nav>
