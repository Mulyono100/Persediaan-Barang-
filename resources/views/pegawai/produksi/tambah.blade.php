<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah produksi</title>
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
        @include('pegawai.layout.navbar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tambah Produksi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Produksi</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form action="/produksi/tambah/mencoba" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Produksi</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">


                                    <div class="form-group">
                                        <label for="kodebarang">Jenis Produksi</label>
                                        <input type="text" name="jenisproduksi" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="namabaarang">Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" required />
                                    </div>




                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Kebutuhan Peralatan</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="item-row">
                                                    <th>Nama Barang</th>
                                                    <th>jumlah</th>
                                                    <th></th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{csrf_field()}}

                                                <tr class="item-row">
                                                    <td colspan="">

                                                        <select class="form-control productname" required
                                                            name="namabarang[]" id="select3" style="width: 100%;">

                                                            <option selected="selected" disabled="true">-Pilih Barang-
                                                            </option>
                                                            @foreach($product as $b)
                                                            <option value="{{$b->id}}">{{$b->nama_barang}}</option>
                                                            @endforeach
                                                        </select>

                                                    </td>

                                                    <td>
                                                        <input class="form-control qty" name="jumlah[]" type="number">
                                                    </td>
                                                    <td colspan="">
                                                        <a id="addRow" href="javascript:;" title="Add a row"
                                                            class="btn btn-primary">Tambah</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right;" colspan="">
                                                        <strong>Total Quantity: </strong>
                                                    </td>

                                                    <td colspan="">
                                                        <div class="form-group">
                                                            <input id="totalQty" name="totalQty" readonly
                                                                class="form-control">
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="" style="text-align:right;"><button type="submit"
                                                            id="submit"
                                                            class="form control btn btn-success mencoba">Simpan</button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>


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
    <script src="">

    </script>
    <script>
    /**
 * jQuery Invoice Plugin v1.0             
 *	                                           
 * Version 1.0, January - 2016	           
 * Author: Firoz Ahmad Likhon <likh.deshi@gmail.com>               
 * Website: http://github.com/firoz-ahmad-likhon
 *                                            
 * Copyright (c) 2016 Firoz Ahmad         
 * Released under the MIT license
      ___            ___  ___    __    ___      ___  ___________  ___      ___
     /  /           /  / /  /  _/ /   /  /     /  / / _______  / /   \    /  /
    /  /           /  / /  /_ / /    /  /_____/  / / /      / / /     \  /  /
   /  /           /  / /   __|      /   _____   / / /      / / /  / \  \/  /
  /  /_ _ _ _ _  /  / /  /   \ \   /  /     /  / / /______/ / /  /   \    /
 /____________/ /__/ /__/     \_\ /__/     /__/ /__________/ /__/     /__/
 Likhon the hackman, who claims himself as a hacker but really he isn't.
 */

    (function(jQuery) {

        $.opt = {}; // jQuery Object

        jQuery.fn.invoice = function(options) {
            var ops = jQuery.extend({}, jQuery.fn.invoice.defaults, options);
            $.opt = ops;

            var inv = new Invoice();
            inv.init();

            jQuery('body').on('click', function(e) {
                var cur = e.target.id || e.target.className;

                if (cur == $.opt.addRow.substring(1))
                    inv.newRow();

                if (cur == $.opt.delete.substring(1))
                    inv.deleteRow(e.target);

                inv.init();
            });

            jQuery('body').on('keyup', function(e) {
                inv.init();
            });

            return this;
        };
    }(jQuery));

    function Invoice() {
        self = this;
    }

    Invoice.prototype = {
        constructor: Invoice,

        init: function() {
            this.calcTotal();
            this.calcTotalQty();
            this.calcSubtotal();
            this.calcGrandTotal();
        },

        /**
         * Calculate total price of an item.
         *
         * @returns {number}
         */
        calcTotal: function() {
            jQuery($.opt.parentClass).each(function(i) {
                var row = jQuery(this);
                var total = row.find($.opt.price).val() * row.find($.opt.qty).val();

                total = self.roundNumber(total, 2);

                row.find($.opt.total).val(total);
            });

            return 1;
        },

        /***
         * Calculate total quantity of an order.
         *
         * @returns {number}
         */
        calcTotalQty: function() {
            var totalQty = 0;
            jQuery($.opt.qty).each(function(i) {
                var qty = jQuery(this).val();
                if (!isNaN(qty)) totalQty += Number(qty);
            });

            totalQty = (totalQty);

            jQuery($.opt.totalQty).val(totalQty);

            return 1;
        },

        /***
         * Calculate subtotal of an order.
         *
         * @returns {number}
         */
        calcSubtotal: function() {
            var subtotal = 0;
            jQuery($.opt.total).each(function(i) {
                var total = jQuery(this).val();
                if (!isNaN(total)) subtotal += Number(total);
            });

            subtotal = self.roundNumber(subtotal, 2);

            jQuery($.opt.subtotal).val(subtotal);

            return 1;
        },

        /**
         * Calculate grand total of an order.
         *
         * @returns {number}
         */
        calcGrandTotal: function() {
            var grandTotal = Number(jQuery($.opt.discount).val()) - Number(jQuery($.opt.subtotal).val());


            grandTotal = self.roundNumber(grandTotal, 2);

            jQuery($.opt.grandTotal).val(grandTotal);

            return 1;
        },

        /**
         * Add a row.
         *
         * @returns {number}
         */
        newRow: function() {
            jQuery(".item-row:last").after(
                '<tr class="item-row"><td colspan=""><select class = "form-control productname" required name="namabarang[] "id = "select3" style = "width: 100%;"><option selected = "selected" disabled = "true" > -Pilih Barang -</option>@foreach($product as $b) <option value = "{{$b->id}}" > {{$b-> nama_barang}} </option>@endforeach </select></td><td><input class = "form-control qty" name = "jumlah[]"type = "number" ></td><td><a class=' +
                $.opt.delete.substring(1) +
                ' href="javascript:;" title="Remove row">Hapus</a></td></tr>');
            $('.select1').select2()
            if (jQuery($.opt.delete).length > 0) {
                jQuery($.opt.delete).show();
            }

            return 1;
        },

        /**
         * Delete a row.
         *
         * @param elem   current element
         * @returns {number}
         */
        deleteRow: function(elem) {
            jQuery(elem).parents($.opt.parentClass).remove();

            if (jQuery($.opt.delete).length < 1) {
                jQuery($.opt.delete).hide();
            }

            return 1;
        },

        /**
         * Round a number.
         * Using: http://www.mediacollege.com/internet/javascript/number/round.html
         *
         * @param number
         * @param decimals
         * @returns {*}
         */
        roundNumber: function(number, decimals) {
            var newString; // The new rounded number
            decimals = Number(decimals);

            if (decimals < 1) {
                newString = (Math.round(number)).toString();
            } else {
                var numString = number.toString();

                if (numString.lastIndexOf(".") == -1) { // If there is no decimal point
                    numString += "."; // give it one at the end
                }

                var cutoff = numString.lastIndexOf(".") + decimals; // The point at which to truncate the number
                var d1 = Number(numString.substring(cutoff, cutoff +
                    1)); // The value of the last decimal place that we'll end up with
                var d2 = Number(numString.substring(cutoff + 1, cutoff +
                    2)); // The next decimal, after the last one we want

                if (d2 >= 5) { // Do we need to round up at all? If not, the string will just be truncated
                    if (d1 == 9 && cutoff > 0) { // If the last digit is 9, find a new cutoff point
                        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
                            if (d1 != ".") {
                                cutoff -= 1;
                                d1 = Number(numString.substring(cutoff, cutoff + 1));
                            } else {
                                cutoff -= 1;
                            }
                        }
                    }

                    d1 += 1;
                }

                if (d1 == 10) {
                    numString = numString.substring(0, numString.lastIndexOf("."));
                    var roundedNum = Number(numString) + 1;
                    newString = roundedNum.toString() + '.';
                } else {
                    newString = numString.substring(0, cutoff) + d1.toString();
                }
            }

            if (newString.lastIndexOf(".") == -1) { // Do this again, to the new string
                newString += ".";
            }

            var decs = (newString.substring(newString.lastIndexOf(".") + 1)).length;

            for (var i = 0; i < decimals - decs; i++)
                newString += "0";
            //var newNumber = Number(newString);// make it a number if you like

            return newString; // Output the result to the form field (change for your purposes)
        }
    };

    /**
     *  Publicly accessible defaults.
     */
    jQuery.fn.invoice.defaults = {
        addRow: "#addRow",
        delete: ".delete",
        parentClass: ".item-row",

        price: ".price",
        qty: ".qty",
        total: ".total",
        totalQty: "#totalQty",

        subtotal: "#subtotal",
        discount: "#discount",
        shipping: "#shipping",
        grandTotal: "#grandTotal"
    };


    jQuery().invoice({
        addRow: "#addRow",
        delete: ".delete",
        parentClass: ".item-row",

        price: ".price",
        qty: ".qty",
        total: ".total",
        totalQty: "#totalQty",

        subtotal: "#subtotal",
        discount: "#discount",
        shipping: "#shipping",
        grandTotal: "#grandTotal",
    });
    </script>
</body>

</html>