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
                title="Information Centre"
                :submenu="[
                    ['href' => route('information.facility.index'), 'icon' => 'ic--round-location-city', 'title' => 'Facility'],
                    ['href' => route('information.umkm.index'), 'icon' => 'ic--round-store-mall-directory', 'title' => 'UMKM'],
                ]"
            />
            {{-- Data Digitalization --}}
            <x-menu-item
                icon="ic--baseline-public"
                title="Data Digitalization"
                :submenu="[
                    ['href' => route('data.household.index'), 'icon' => 'ic--outline-other-houses', 'title' => 'Household'],
                    ['href' => route('data.resident.index'), 'icon' => 'ic--baseline-person-outline', 'title' => 'Resident'],
                    ['href' => route('data.asset.index'), 'icon' => 'ic--baseline-attach-money', 'title' => 'Asset'],
                    [
                        'href' => '#',
                        'icon' => 'ic--outline-bookmark-added',
                        'title' => 'Book Keeping',
                        'submenu' => [
                            ['href' => route('data.bookkeeping.account.index'), 'icon' => 'ic--round-account-balance', 'title' => 'Master Account'],
                            ['href' => route('data.bookkeeping.cash.index'), 'icon' => 'ic--round-attach-money', 'title' => 'Cash Mutation'],
                        ],
                    ],
                ]"
            />
            {{-- Issue Tracker --}}
            <x-menu-item
                icon="ic--round-track-changes"
                title="Issue Tracker"
                :submenu="[
                    ['href' => route('issue.approval.index'), 'icon' => 'material-symbols--notifications-unread-outline-rounded', 'title' => 'Approval Issue'],
                    ['href' => route('issue.report.index'), 'icon' => 'material-symbols--report-outline-rounded', 'title' => 'Issue Report'],
                ]"
            />
            {{-- Broadcast --}}
            <x-menu-item
                icon="ic--round-podcasts"
                title="Broadcast"
                :submenu="[
                    ['href' => route('broadcast.template.index'), 'icon' => 'material-symbols--chat-outline-rounded', 'title' => 'Template'],
                    ['href' => route('broadcast.scheduled.index'), 'icon' => 'material-symbols--nest-clock-farsight-analog-outline-rounded', 'title' => 'Scheduled'],
                ]"
            />
            {{-- social-aid aid --}}
            <x-menu-item
                icon="ic--round-attach-money"
                title="Social Aid"
                :submenu="[
                    ['href' => route('social-aid.calculate.index'), 'icon' => 'material-symbols--calculate', 'title' => 'Calculate'],
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
