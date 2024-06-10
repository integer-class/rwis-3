<div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side px-2">
        <div class="my-8">
            <a href="{{ url('/') }}" class="flex gap-2 justify-center items-center">
                <img src="{{ asset('img/icon.png') }}" alt="icon" width="70">
                <h6 class="font-bold">RW 11<br>Information<br>System</h6>
            </a>
        </div>
        <ul class="menu w-72 rounded-box">
            {{-- Dashboard --}}
            <x-menu-item href="{{ route('dashboard') }}" icon="ic--baseline-space-dashboard" title="Dashboard" />
            {{-- Information Centre --}}
            <x-menu-item
                icon="ic--outline-info"
                title="Pusat Informasi"
                :submenu="[
                    ['href' => route('information.facility.index'), 'icon' => 'ic--round-location-city', 'title' => 'Fasilitas'],
                    ['href' => route('information.umkm.index'), 'icon' => 'ic--round-store-mall-directory', 'title' => 'UMKM'],
                ]"
            />
            {{-- Data Digitalization --}}
            <x-menu-item
                icon="ic--baseline-public"
                title="Digitalisasi Data"
                :submenu="[
                    ['href' => route('data.household.index'), 'icon' => 'ic--outline-other-houses', 'title' => 'Keluarga'],
                    ['href' => route('data.resident.index'), 'icon' => 'ic--baseline-person-outline', 'title' => 'Warga'],
                    ['href' => route('data.asset.index'), 'icon' => 'ic--baseline-attach-money', 'title' => 'Aset'],
                ]"
            />
            {{-- Book Keeping --}}
            <x-menu-item
                icon="ic--round-account-balance"
                title="Pencatatan Keuangan"
                :submenu="[
                    ['href' => route('data.bookkeeping.account.index'), 'icon' => 'ic--round-account-balance', 'title' => 'Akun Utama'],
                    ['href' => route('data.bookkeeping.cash.index'), 'icon' => 'ic--round-attach-money', 'title' => 'Mutasi'],
                ]"
            />
            {{-- Issue Tracker --}}
            <x-menu-item
                icon="ic--round-track-changes"
                title="Laporan"
                :submenu="[
                    ['href' => route('issue.approval.index'), 'icon' => 'material-symbols--notifications-unread-outline-rounded', 'title' => 'Validasi Laporan'],
                    ['href' => route('issue.report.index'), 'icon' => 'material-symbols--report-outline-rounded', 'title' => 'Laporan Warga'],
                ]"
            />
            {{-- Broadcast --}}
            <x-menu-item
                icon="ic--round-podcasts"
                title="Siaran"
                :submenu="[
                    ['href' => route('broadcast.template.index'), 'icon' => 'material-symbols--chat-outline-rounded', 'title' => 'Template Siaran'],
                    ['href' => route('broadcast.scheduled.index'), 'icon' => 'material-symbols--nest-clock-farsight-analog-outline-rounded', 'title' => 'Siaran Terjadwal'],
                ]"
            />
            {{-- social-aid aid --}}
            <x-menu-item
                icon="ic--round-attach-money"
                title="Bantuan Sosial"
                :submenu="[
                    ['href' => route('social-aid.calculate.index'), 'icon' => 'material-symbols--calculate', 'title' => 'Kalkulator'],
                ]"
            />
            {{-- persuratan --}}
            <x-menu-item
                icon="solar--letter-linear"
                title="Persuratan"
                :submenu="[
                    ['href' => route('persuratan.templates.index'), 'icon' => 'material-symbols:edit-document-outline-rounded', 'title' => 'Format'],
                ]"
            />

            {{-- Logout --}}
            <div tabindex="0" class="mt-5 text-center">
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button class="btn text-slate-800 w-full rounded-md" type="submit">
                        <span class="icon-[ic--baseline-exit-to-app] text-xl"></span>
                        Keluar
                    </button>
                </form>
            </div>
        </ul>
    </div>
</div>

@push('body_scripts')
    <script>
        const currentUrl = window.location.href;
        @stack('sidebar_script')
    </script>
@endpush
