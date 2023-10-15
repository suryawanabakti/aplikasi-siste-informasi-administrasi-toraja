    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="#" class="app-brand-link">

                <span class="app-brand-text demo menu-text fw-bolder ms-2">SIA toraja</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
            @role('admin')
                <li class="menu-item {{ Request::is('admin/dashboard') ? 'active open' : '' }}">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <li class="menu-header small text-uppercase"><span class="menu-header-text">Main Menu</span></li>
                <li class="menu-item {{ Request::is('admin/pendaftar*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pendaftar.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-registered"></i>
                        <div data-i18n="users">Pendaftar</div>
                    </a>
                </li>

                <li class="menu-item {{ Request::is('admin/master-data/users*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div data-i18n="users">Users</div>
                    </a>
                </li>

                <li class="menu-item {{ Request::is('admin/masyarakat*') ? 'active' : '' }}">
                    <a href="{{ route('admin.masyarakat.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div data-i18n="users">Masyarakat</div>
                    </a>
                </li>


                <li class="menu-item {{ Request::is('admin/pengajuan-surat*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle ">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div class="text-truncate" data-i18n="Layouts">Daftar Pengajuan</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ Request::is('admin/pengajuan-surat-skk*') ? 'active' : '' }}">
                            <a href="{{ route('admin.pengajuan-surat-skk.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Collapsed menu">SKTM</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Request::is('admin/pengajuan-surat-spp*') ? 'active' : '' }}">
                            <a href="{{ route('admin.pengajuan-surat-spp.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Collapsed menu">SPP</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endrole
            @role('masyarakat')

                <li class="menu-item {{ Request::is('masyarakat/dashboard') ? 'active open' : '' }}">
                    <a href="{{ route('dashboard.masyarakat') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>
                @if (auth()->user()->masyarakat->status === 'diterima')
                    <li class="menu-item {{ Request::is('masyarakat/pengajuan-surat*') ? 'active open' : '' }}">
                        <a href="/masyarakat/pengajuan-surat" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-envelope"></i>
                            <div data-i18n="Analytics">Pengajuan Surat</div>
                        </a>
                    </li>
                @endif
            @endrole

            @role('kepala desa')
                <li class="menu-item {{ Request::is('kepaladesa/dashboard') ? 'active open' : '' }}">
                    <a href="{{ route('dashboard.kepaladesa') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('kepaladesa/pengajuan-surat*') ? 'active open' : '' }}">
                    <a href="/kepaladesa/pengajuan-surat" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-envelope"></i>
                        <div data-i18n="Analytics">Pengajuan Surat</div>
                    </a>
                </li>
            @endrole

        </ul>
    </aside>
