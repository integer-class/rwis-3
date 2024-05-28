<div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side">
        <div class="flex gap-2 justify-center items-center mt-7">
            <img src="{{ asset('img/icon.png') }}" alt="icon" width="70">
            <h6 class="font-bold">RW 11<br>Information<br>System</h6>
        </div>
        <ul class="menu menu-md w-72 rounded-box">
            {{-- Dashboard --}}
            <li>
                <a class="dashboard" href="{{ url('dashboard') }}">
                    <div class="flex">
                        <span class="icon-[ic--baseline-space-dashboard] text-xl mt-0.5"></span>
                        <h6 class="mx-4 mt-1">Dashboard</h6>
                    </div>
                </a>
            </li>
            {{-- Information Centre --}}
            <li>
                <details id="information">
                    <summary>
                        <span class="icon-[ic--outline-info] text-xl mt-0.5"></span>
                        <h6 class="mx-2 mt-1">Information Centre</h6>
                    </summary>
                    <ul>
                        <li id="facility"><a href="{{ url('information/facility') }}"><span
                                    class="icon-[ic--round-location-city] text-xl mb-2"></span>Facility</a></li>
                        <li id="umkm"><a href="{{ url('information/umkm') }}"><span
                                    class="icon-[ic--round-store-mall-directory] text-xl mb-2"></span>UMKM</a></li>
                    </ul>
                </details>
            </li>
            {{-- Data Digitalization --}}
            <li>
                <details id="data">
                    <summary>
                        <span class="icon-[ic--baseline-public] text-xl mt-0.5"></span>
                        <h6 class="mx-2 mt-1">Data Digitalization</h6>
                    </summary>
                    <ul>
                        <li id="household"><a href="{{ url('data/household') }}"><span
                            class="icon-[ic--outline-other-houses] text-xl mb-2"></span>Household</a></li>
                            <li id="resident"><a href="{{ url('data/resident') }}"><span
                                        class="icon-[ic--baseline-person-outline] text-xl mb-2"></span>Resident</a></li>
                        <li id="asset"><a href="{{ url('data/asset') }}"><span
                                    class="icon-[ic--baseline-attach-money] text-xl mb-2"></span>Asset</a></li>
                        {{-- Book Keeping --}}
                        <li>
                            <details id="bookkeeping">
                                <summary>
                                    <span class="icon-[ic--outline-bookmark-added] text-xl mt-0.5"></span>
                                    <h6 class="mx-2 mt-1">Book Keeping</h6>
                                </summary>
                                <ul>
                                    <li id="account"><a href="{{ url('data/bookkeeping/account') }}"><span
                                                class="icon-[ic--round-account-balance] text-xl mb-2"></span>Master
                                            Account</a></li>
                                    <li id="cash"><a href="{{ url('data/bookkeeping/cash') }}"><span
                                                class="icon-[ic--round-attach-money] text-xl mb-2"></span>Cash Mutation</a>
                                    </li>
                                </ul>
                            </details>
                        </li>
                    </ul>
                </details>
            </li>
            {{-- Issue Tracker --}}
            <li>
                <details id="issue">
                    <summary>
                        <span class="icon-[ic--round-track-changes] text-xl mt-0.5"></span>
                        <h6 class="mx-2 mt-1">Issue Tracker</h6>
                    </summary>
                    <ul>
                        <li id="approval"><a href="{{ url('issue/approval') }}"><span
                                    class="icon-[material-symbols--notifications-unread-outline-rounded] text-xl mb-2"></span>Approval Issue</a>
                        </li>
                        <li id="report"><a href="{{ url('issue/report') }}"><span
                                    class="icon-[material-symbols--report-outline-rounded] text-xl mb-2"></span>Issue
                                Report</a></li>
                    </ul>
                </details>
            </li>
            {{-- Broadcast --}}
            <li>
                <details id="broadcast">
                    <summary>
                        <span class="icon-[ic--round-podcasts] text-xl mt-0.5"></span>
                        <h6 class="mx-2 mt-1">Broadcast</h6>
                    </summary>
                    <ul>
                        <li id="template"><a href="{{ url('broadcast/template') }}"><span
                                    class="icon-[material-symbols--chat-outline-rounded] text-xl mb-2"></span>Template</a>
                        </li>
                        <li id="schedule"><a href="{{ url('broadcast/scheduled') }}"><span
                                    class="icon-[material-symbols--nest-clock-farsight-analog-outline-rounded] text-xl mb-2"></span>Scheduled</a>
                        </li>
                    </ul>
                </details>
            </li>
            {{-- Signature --}}
            <li>
                <details id="signature">
                    <summary>
                        <span class="icon-[ic--round-qr-code] text-xl mt-0.5"></span>
                        <h6 class="mx-2 mt-1">Signature</h6>
                    </summary>
                    <ul>
                        <li id="document-format"><a href="{{ url('signature/document-format') }}"><span
                                    class="icon-[material-symbols--edit-document-outline-rounded] text-xl mb-2"></span>Format</a>
                        </li>
                        <li id="log"><a href="{{ url('signature/log') }}"><span class="icon-[ic--round-history] text-xl mb-2"></span>Log</a></li>
                    </ul>
                </details>
            </li>
            {{-- Logout --}}
            <div tabindex="0" class="mt-5 text-center">
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button class="add-btn btn-sm w-5/6 text-white rounded-md" type="submit">Logout</button>
                </form>
            </div>
        </ul>
    </div>
</div>

<script>
    var currentUrl = window.location.href;

    if (currentUrl.includes('/information')) {
        var menu = document.getElementById('information');
        if (menu) {
            menu.setAttribute('open', 'true');

            if (currentUrl.includes('/information/facility')) {
                var subMenu = document.getElementById('facility');
                if (subMenu) {
                    subMenu.setAttribute('class', 'add-btn text-white rounded-md');
                }
            }

            if (currentUrl.includes('/information/umkm')) {
                var subMenu = document.getElementById('umkm');
                if (subMenu) {
                    subMenu.setAttribute('class', 'add-btn text-white rounded-md');
                }
            }
        }
    }

    if (currentUrl.includes('/data')) {
        var menu = document.getElementById('data');
        if (menu) {
            menu.setAttribute('open', 'true');

            if (currentUrl.includes('/data/resident')) {
                var subMenu = document.getElementById('resident');
                if (subMenu) {
                    subMenu.setAttribute('class', 'add-btn text-white rounded-md');
                }
            }

            if (currentUrl.includes('/data/household')) {
                var subMenu = document.getElementById('household');
                if (subMenu) {
                    subMenu.setAttribute('class', 'add-btn text-white rounded-md');
                }
            }

            if (currentUrl.includes('/data/asset')) {
                var subMenu = document.getElementById('asset');
                if (subMenu) {
                    subMenu.setAttribute('class', 'add-btn text-white rounded-md');
                }
            }

            if (currentUrl.includes('/data/bookkeeping')) {
                var subMenu = document.getElementById('bookkeeping');
                if (subMenu) {
                    subMenu.setAttribute('open', 'true');
                    if (currentUrl.includes('/data/bookkeeping/account')) {
                        var subSubMenu = document.getElementById('account');
                        if (subSubMenu) {
                            subSubMenu.setAttribute('class', 'add-btn text-white rounded-md');
                        }
                    }
                    if (currentUrl.includes('/data/bookkeeping/cash')) {
                        var subSubMenu = document.getElementById('cash');
                        if (subSubMenu) {
                            subSubMenu.setAttribute('class', 'add-btn text-white rounded-md');
                        }
                    }
                }
            }
        }
    }

    if (currentUrl.includes('/issue')) {
        var menu = document.getElementById('issue');
        if (menu) {
            menu.setAttribute('open', 'true');

            if (currentUrl.includes('/issue/approval')) {
                var subMenu = document.getElementById('approval');
                if (subMenu) {
                    subMenu.setAttribute('class', 'add-btn text-white rounded-md');
                }
            }

            if (currentUrl.includes('/issue/report')) {
                var subMenu = document.getElementById('report');
                if (subMenu) {
                    subMenu.setAttribute('class', 'add-btn text-white rounded-md');
                }
            }
        }
    }

    if (currentUrl.includes('/broadcast')) {
        var menu = document.getElementById('broadcast');
        if (menu) {
            menu.setAttribute('open', 'true');

            if (currentUrl.includes('/broadcast/template')) {
                var subMenu = document.getElementById('template');
                if (subMenu) {
                    subMenu.setAttribute('class', 'add-btn text-white rounded-md');
                }
            }

            if (currentUrl.includes('/broadcast/schedule')) {
                var subMenu = document.getElementById('schedule');
                if (subMenu) {
                    subMenu.setAttribute('class', 'add-btn text-white rounded-md');
                }
            }
        }
    }

    if (currentUrl.includes('/signature')) {
        var menu = document.getElementById('signature');
        if (menu) {
            menu.setAttribute('open', 'true');

            if (currentUrl.includes('/signature/document-format')) {
                var subMenu = document.getElementById('document-format');
                if (subMenu) {
                    subMenu.setAttribute('class', 'add-btn text-white rounded-md');
                }
            }

            if (currentUrl.includes('/signature/log')) {
                var subMenu = document.getElementById('log');
                if (subMenu) {
                    subMenu.setAttribute('class', 'add-btn text-white rounded-md');
                }
            }
        }
    }
</script>
