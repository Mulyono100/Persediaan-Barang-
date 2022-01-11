<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Permintaan Pegawai</title>
    <link rel="icon" href="{{asset('loginn/logo/ekas.png')}}" type="image/ico">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('gudang.layout.navbar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1> Laporan Barang Keluar</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                                <li class="breadcrumb-item active">Laporan Barang Keluar</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="demo">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div>
                                                    <h2 class="text-center">LAPORAN BARANG KELUAR</h2>
                                                    <p class="text-center">Periode {{$tawal}} - {{$tahir}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-12">
                                                <hr />

                                                <div class="row">
                                                    <div class="col-xs-6 col-md-6">
                                                        <address>



                                                        </address>
                                                    </div>


                                                </div>
                                            </div>




                                        </div>
                                        <table id="" class="table table-bordered table-hover">

                                            <thead>
                                                <tr>
                                                    <th>TANGGAL</th>
                                                    <th>KODE KELUAR</th>
                                                    <th>TOTAL BARANG</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($barangkeluar as $b)
                                                <tr>
                                                    <td>{{$b->tanggal}}</td>
                                                    <td>{{$b->kode_keluar}}</td>
                                                    <td>{{$b->total_barang_keluar}}</td>
                                                </tr>

                                                @endforeach
                                                <tr>
                                                    <td colspan="2" class="text-right"><strong> TOTAL KESELURUHAN
                                                            BARANG</strong></td>
                                                    <td>{{$totalbarangkeluar}}</td>
                                                </tr>
                                            </tbody>

                                        </table>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-xs-2 col-md-2"></div>
                                                    <div class="col-xs-4 col-md-4"></div>
                                                    <div class="col-xs-2 col-md-2"></div>
                                                    <div class="col-xs-4 col-md-4"><b> MENGETAHUI</b><br><br><br><br>(
                                                        {{auth()->user()->name}} )
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" id="basic" class="btn btn-success btn-sm">PRINT</a>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
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
    <!-- DataTables  & Plugins -->
    <script src="{{asset('adminlte3/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte3/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('adminlte3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte3/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('adminlte3/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('adminlte3/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('adminlte3/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('adminlte3/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('adminlte3/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('adminlte3/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('adminlte3/dist/js/demo.js')}}"></script>
    <!-- Page specific script -->
    <script src="{{asset('js/print.js')}}"></script>
    <script>
    $("#basic").on("click", function() {

        $(".demo").printThis({});
    });
    </script>
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>

</body>

</html>