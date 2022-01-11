<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Update Permintaan</title>
    <link rel="icon" href="{{asset('loginn/logo/ekas.png')}}" type="image/ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/fontawesome-free/css/all.min.css')}}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css')}}" />
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <!-- Preloader -->
        @include('gudang.layout.navbar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Update Permintaan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Update Permintaan</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">


                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="/update/{{$permintaan->id}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="kodebarang">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control"
                                            value="{{$permintaan->tanggal}}" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label for="namabaarang"> Kode Permintaan</label>
                                        <input type="text" name="kode_permintaan" class="form-control"
                                            value="{{$permintaan->kode_permintaan}}" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label for="kodebarang">Nama Pegawai</label>
                                        <input type="text" name="user_id" class="form-control"
                                            value="{{$permintaan->user_id}}" readonly hidden />
                                        <input type="text" class="form-control" value="{{$permintaan->user->name}}"
                                            readonly />
                                    </div>
                                    <div class="form-group">
                                        <label for="namabaarang"> Total Permintaan </label>
                                        <input type="text" name="total_permintaan" class="form-control"
                                            value="{{$permintaan->total_permintaan}}" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status</label>
                                        <select class="form-control" name="role_id" id="select2">
                                            @foreach($role as $r)
                                            <option value="{{$r->id}}"
                                                {{$r->id== $permintaan->role_id ? 'selected' : ' '}}> {{$r->keterangan}}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm"> Simpan</button>
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
</body>

</html>