<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="text-center mt-3 mb-3">
        <img src="/assets/img/logo.png" alt="Logo" class="brand-text" style="width: 100px;">
        <div class="brand-text mt-2">
            <h6 class="text-light">SMAN 8 BURU</h6>
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
                    <a href="/dashboard"
                        class="nav-link {{ Request::is('dashboard') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                        <i class="nav-icon bi bi-layout-text-sidebar-reverse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @can('admin')
                    <li class="nav-item has-treeview {{ Request::is('dashboard/master*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-folder2-open"></i>
                            <p>
                                Data Master
                                <i class="bi bi-chevron-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item nav-active">
                                <a href="/dashboard/master/jurusan"
                                    class="nav-link {{ Request::is('dashboard/master/jurusan*') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                                    <i class="nav-icon bi bi-arrow-return-right"></i>
                                    <p>
                                        Data Jurusan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/master/tahun-pendaftaran"
                                    class="nav-link {{ Request::is('dashboard/master/tahun-pendaftaran*') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                                    <i class="nav-icon bi bi-arrow-return-right"></i>
                                    <p>
                                        Tahun Pendaftaran
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/master/user"
                                    class="nav-link {{ Request::is('dashboard/master/user*') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                                    <i class="nav-icon bi bi-arrow-return-right"></i>
                                    <p>
                                        Daftar User
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('siswa')
                    <li class="nav-item has-treeview {{ Request::is('dashboard/lengkapi*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-person-video2"></i>
                            <p>
                                Lengkapi Data
                                <i class="bi bi-chevron-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item nav-active">
                                <a href="/dashboard/lengkapi/biodata"
                                    class="nav-link {{ Request::is('dashboard/lengkapi/biodata*') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                                    <i class="nav-icon bi bi-arrow-return-right"></i>
                                    <p>
                                        Biodata Diri
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/lengkapi/dokumen"
                                    class="nav-link {{ Request::is('dashboard/lengkapi/dokumen*') ? 'bg-secondary bg-opacity-50 active' : '' }}">
                                    <i class="nav-icon bi bi-arrow-return-right"></i>
                                    <p>
                                        Dokumen Pendaftaran
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/lengkapi/finish"
                                    class="nav-link {{ Request::is('dashboard/lengkapi/finish*') ? 'bg-secondary bg-opacity-50 active' : '' }}">
                                    <i class="nav-icon bi bi-arrow-return-right"></i>
                                    <p>
                                        Finish
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('admin')
                    <li class="nav-item">
                        <a href="/dashboard/laporan"
                            class="nav-link {{ Request::is('dashboard/laporan*') ? 'bg-secondary bg-opacity-50 active' : '' }}">
                            <i class="nav-icon bi bi-file-earmark-arrow-down"></i>
                            <p>
                                Laporan Pendaftaran
                            </p>
                        </a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a href="/dashboard/informasi"
                        class="nav-link {{ Request::is('dashboard/informasi*') ? 'bg-secondary bg-opacity-50 active' : '' }}">
                        <i class="nav-icon bi bi-info-circle"></i>
                        <p>
                            Informasi
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
</aside>
