<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('adminlte3/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60"
        width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav ml-auto">

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
                    <a href="/DashboardPegawai" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    <!-- Button trigger modal -->

                </li>

                <li class="nav-item">
                    <a href="/PermintaanPegawai" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Permintaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporanpermintaan" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Laporan Permintaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/simpanproduksi" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simpan Produksi
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="/laporanpegawai" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Laporan Simpan Produksi
                        </p>
                    </a>
                </li>





            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>