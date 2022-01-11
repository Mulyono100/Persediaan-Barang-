<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AdminLTE 3 | Project Add</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/fontawesome-free/css/all.min.css')}}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css')}}" />
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <!-- Preloader -->
        @include('Pegawai.layout.navbar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tambah Permintaan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Permintaan</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="/produksitambah" method="POST">

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="item-row">
                                                    <th colspan="2">Jenis Produksi</th>
                                                    <th>Keterangan</th>
                                                    <th>Jumlah Permintaan</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{csrf_field()}}

                                                <tr class="item-row">
                                                    <td colspan="2">

                                                        <select class="form-control namabarang select3"
                                                            name="namabarang[]">

                                                            <option value=""></option>

                                                        </select>

                                                    </td>
                                                    <td>
                                                        <input class="form-control stock" readonly name="stock[]"
                                                            type="number">
                                                    </td>
                                                    <td>
                                                        <input class="form-control qty" name="jumlah[]" type="number">
                                                    </td>
                                                    <td colspan="4">
                                                        <a id="addRow" href="javascript:;" title="Add a row"
                                                            class="btn btn-primary">Tambah</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;" colspan="3">
                                                        <strong>Total Quantity: </strong>
                                                    </td>
                                                    <td colspan="1">
                                                        <div class="form-group">
                                                            <input id="totalQty" name="totalQty" readonly
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <td colspan="4" style="text-align:right;"><button type="submit"
                                                        id="submit"
                                                        class="form control btn btn-success mencoba">Simpan</button>
                                                </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('adminlte3/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('adminlte3/dist/js/demo.js')}}"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



</body>

</html>