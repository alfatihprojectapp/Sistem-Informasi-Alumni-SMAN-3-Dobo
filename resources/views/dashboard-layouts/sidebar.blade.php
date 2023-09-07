<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="text-center mt-3 mb-3">
        <img src="/assets/img/logo.png" alt="Logo" class="brand-text" style="width: 100px;">
        <div class="brand-text mt-2">
            <h6 class="text-light">SIA SMAN 3 DOBO</h6>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" style="margin-top: -10px;">

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item nav-active">
                    <a href="/dashboard/beranda"
                        class="nav-link {{ Request::is('dashboard/beranda') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                        <i class="nav-icon bi bi-house"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                @can('admin')
                    <li class="nav-item nav-active">
                        <a href="/dashboard/tahun-angkatan"
                            class="nav-link {{ Request::is('dashboard/tahun-angkatan') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                            <i class="nav-icon bi bi-table"></i>
                            <p>
                                Tahun Angkatan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item nav-active">
                        <a href="/dashboard/daftar-ketua-angkatan"
                            class="nav-link {{ Request::is('dashboard/daftar-ketua-angkatan') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                            <i class="nav-icon bi bi-people"></i>
                            <p>
                                Daftar Ketua Angkatan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item nav-active">
                        <a href="/dashboard/daftar-alumni"
                            class="nav-link {{ Request::is('dashboard/daftar-alumni') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                            <i class="nav-icon bi bi-people"></i>
                            <p>
                                Daftar Alumni
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/admin"
                            class="nav-link {{ Request::is('dashboard/admin*') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                            <i class="nav-icon bi bi-person-check"></i>
                            <p>
                                Admin
                            </p>
                        </a>
                    </li>
                @endcan
                @can('ketua_angkatan')
                @php
                    $user = auth()->user();
                @endphp
                    <li class="nav-item nav-active">
                        <a href="/dashboard/daftar-alumni/{{ $user->tahun->id_tahun }}"
                            class="nav-link {{ Request::is('dashboard/daftar-alumni*') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                            <i class="nav-icon bi bi-people"></i>
                            <p>
                                Daftar Alumni {{ $user->tahun->tahun }}
                            </p>
                        </a>
                    </li>
                @endcan

            </ul>
        </nav>

    </div>
</aside>
