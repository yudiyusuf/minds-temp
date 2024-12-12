<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="">
                        <i data-feather="home"></i>
                        <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>
                        <span data-key="t-dashboard">@lang('translation.Dashboards')</span>
                    </a>
                </li>

                    <li class="menu-title" data-key="t-apps">@lang('translation.Apps')</li>

                        <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="mail"></i>
                                    <span data-key="t-email">Internal Memo</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('internalmemo.request') }}" data-key="t-inbox">Daftar Saya</a></li>
                                    <li><a href="{{ route('internalmemo.request.create') }}" data-key="t-inbox">Buat Memo Baru</a></li>
                                    <li><a href="{{ route('internalmemo.mylistmengetahui') }}" data-key="t-inbox">Daftar Untuk Diketahui</a></li>
                                    <li><a href="{{ route('internalmemo.mylistmenyetujui') }}" data-key="t-inbox">Daftar Untuk Disetujui</a></li>
                                    <li><a href="{{ route('internalmemo.mylistforme') }}" data-key="t-inbox">Dinformasikan Untuk Saya</a></li>
                                </ul>
                        </li>
                    </li>
                    @if ( Auth::user()->jabatan_id == '1')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="users"></i>
                            <span data-key="t-contacts">User</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('user.list') }}" data-key="t-user-list">Daftar User</a></li>
                        </ul>
                    </li>
                    @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
