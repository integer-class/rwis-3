<div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side">
        <div class="flex gap-2 justify-center items-center mt-7">
            <img src="{{ asset('img/icon.png') }}" alt="icon" width="70">
            <h6 class="font-bold">RW 11<br>Information<br>System</h6>
        </div>
        <ul class="menu p-4 w-50 min-h-full text-base-content">
            {{-- Information Centre --}}
            <div tabindex="0" class="collapse collapse-arrow">
                <input type="checkbox" />
                <div class="collapse-title flex">
                    <span class="icon-[ic--outline-info] text-xl mt-0.5"></span>
                    <h6 class="mx-2 mt-1">Information Centre</h6>
                </div>
                <div class="collapse-content">
                    <li><a><span class="icon-[ic--round-location-city] text-xl mb-2"></span>Facility</a></li>
                    <li><a><span class="icon-[ic--round-store-mall-directory] text-xl mb-2"></span>UMKM</a></li>
                </div>
            </div>
            {{-- Data Digitalization --}}
            <div tabindex="0" class="collapse collapse-arrow">
                <input type="checkbox" />
                <div class="collapse-title flex">
                    <span class="icon-[ic--baseline-public] text-xl mt-0.5"></span>
                    <h6 class="mx-2 mt-1">Data Digitalization</h6>
                </div>
                <div class="collapse-content">
                    <li><a href="{{ url('/resident') }}"><span
                                class="icon-[ic--baseline-person-outline] text-xl mb-2"></span>Resident</a></li>
                    <li><a><span class="icon-[ic--outline-other-houses] text-xl mb-2"></span>Household</a></li>
                    <li><a><span class="icon-[ic--baseline-attach-money] text-xl mb-2"></span>Assets</a></li>
                    <li><a><span class="icon-[ic--outline-bookmark-added] text-xl mb-2"></span>Book Keeping</a></li>
                </div>
            </div>
            {{-- Issue Tracker --}}
            <div tabindex="0" class="collapse collapse-arrow">
                <input type="checkbox" />
                <div class="collapse-title flex">
                    <span class="icon-[ic--round-track-changes] text-xl mt-0.5"></span>
                    <h6 class="mx-2 mt-1">Issue Tracker</h6>
                </div>
                <div class="collapse-content">
                    <li><a><span
                                class="icon-[material-symbols--notifications-unread-outline-rounded] text-xl mb-2"></span>Pending</a>
                    </li>
                    <li><a><span class="icon-[material-symbols--report-outline-rounded] text-xl mb-2"></span>Issue
                            Reports</a></li>
                </div>
            </div>
            {{-- Broadcast --}}
            <div tabindex="0" class="collapse collapse-arrow">
                <input type="checkbox" />
                <div class="collapse-title flex">
                    <span class="icon-[ic--round-podcasts] text-xl mt-0.5"></span>
                    <h6 class="mx-2 mt-1">Broadcast</h6>
                </div>
                <div class="collapse-content">
                    <li><a><span class="icon-[material-symbols--chat-outline-rounded] text-xl mb-2"></span>Template</a>
                    </li>
                    <li><a><span
                                class="icon-[material-symbols--nest-clock-farsight-analog-outline-rounded] text-xl mb-2"></span>Scheduled</a>
                    </li>
                </div>
            </div>
            {{-- Signature --}}
            <div tabindex="0" class="collapse collapse-arrow">
                <input type="checkbox" />
                <div class="collapse-title flex">
                    <span class="icon-[ic--round-qr-code] text-xl mt-0.5"></span>
                    <h6 class="mx-2 mt-1">Signature</h6>
                </div>
                <div class="collapse-content">
                    <li><a><span
                                class="icon-[material-symbols--edit-document-outline-rounded] text-xl mb-2"></span>Format</a>
                    </li>
                    <li><a><span class="icon-[ic--round-history] text-xl mb-2"></span>Log</a></li>
                </div>
            </div>
            <div tabindex="0" class="mt-5 text-center">
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button class="add-btn btn-sm w-5/6 text-white rounded-md" type="submit">Logout</button>
                </form>
            </div>
        </ul>

    </div>
</div>
