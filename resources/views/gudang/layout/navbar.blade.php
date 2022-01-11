<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('adminlte3/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60"
        width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item ">

            <a class="nav-link text-center" style="border-bottom: 1px solid black;"
                href="/prosespermintaan">Permintaan</a>

        </li>
        <li class="nav-item dropdown">

            <a class="nav-link" data-toggle="dropdown" href="#">
                Selamat Datang,
                <span>{{Auth()->user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <div class="dropdown-divider"></div>
                <a href="/login" class="dropdown-item">Logout

                </a>

            </div>
        </li>



    </ul>

    <!-- Right navbar links -->

</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('adminlte3/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" hidden
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><br></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- SidebarSearch Form -->
        <div class="form-inline" hidden>
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item ">
                    <a href="/DashboardGudang" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="/barang" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporanbarang" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Laporan Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/permintaan" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Permintaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporanpermintaangudang" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Laporan Permintaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kelolaproduksi" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Kelola Produksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporanproduksi" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Laporan Produksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kelolapemesanan" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Kelola Pemesanan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporanpemesanan" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Laporan Pemesanan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/barangmasuk" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Barang Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporanbarangmasuk" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Laporan barang Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/barangkeluar" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Barang Keluar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporanbarangkeluar" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Laporan Barang Keluar
                        </p>
                    </a>
                </li>





            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>