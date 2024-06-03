<nav class="flex py-4 px-80 bg-base-100 gap-4 sticky top-0 shadow-sm z-50">
    <div class="flex items-center gap-3 bg-base-100 w-4/6">
        <img src="{{ asset('img/icon.png') }}" alt="icon" width="48">
        <h6 class="font-bold text-black">RW 11 Information System</h6>
    </div>
    <div class="flex items-center gap-6 bg-base-100 w-5/6">
        <input type="text" class="bg-white py-4 px-4 w-full rounded-xl border-2 shadow-sm" placeholder="Search">
        <a href="{{ url('/login') }}" class="bg-primary text-white text-center py-4 w-2/6 rounded-xl font-bold">Login</a>
    </div>
</nav>
