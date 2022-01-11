<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Produksi</title>
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
        <!-- Navbar -->
        @include('pegawai.layout.navbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Detail Produksi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                                <li class="breadcrumb-item active">Detail Produksi</li>
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

                                            <div class="col-6">
                                                <p><strong>NAMA PEGAWAI : </strong>{{$detail->user->name}}</p>
                                            </div>

                                            <div class="col-6">
                                                <p><strong>KODE PRODUKSI : </strong> {{$detail->kode_produksi}} </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <p><strong>JENIS PRODUKSI : </strong> {{$detail->jenis_produksi}}</p>
                                            </div>
                                            <div class="col-6">
                                                <p><strong>KETERANGAN : </strong>{{$detail->keterangan}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p><strong>TANGGAL :
                                                    </strong>{{date('d M Y',strtotime($detail->tanggal))}}</p>
                                            </div>
                                        </div><br><br>

                                        <h3 class="text-center">KEBUTUHAN
                                            PERALATAN</h3>
                                        <br><br>
                                        <table id="" class="table table-bordered table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NAMA BARANG</th>
                                                    <th>JUMLAH BARANG</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($detail->Detailproduksi as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->barang->nama_barang}}</td>
                                                    <td>{{$d->jumlah}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tr>
                                                <td colspan="2">Total Keseluruhan Barang</td>
                                                <td>{{$detail->total_kebutuhan_peralatan}}</td>
                                            </tr>





                                        </table><br><br>

                                    </div>
                                    <a href="#" id="basic" class="btn btn-success btn-sm">PRINT</a>
                                </div>
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