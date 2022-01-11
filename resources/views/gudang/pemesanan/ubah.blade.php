<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Pemesanan</title>
    <link rel="icon" href="{{asset('loginn/logo/ekas.png')}}" type="image/ico">
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
        @include('gudang.layout.navbar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Ubah Pemesanan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Ubah Pesanan</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <form action="/pemesananubah/{{$ubah->id}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="inputName">Nama Suplier</label>
                                        <input type="text" id="inputName" value="{{$ubah->namasuplier}}"
                                            name="namasuplier" class="form-control">
                                        @error('nama_suplier')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Bukti Pembayaran</label>
                                        <input type="file" name="buktipembayaran" class="form-control">
                                        @error('bukti_pembayaran')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">


                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="item-row">
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah Beli</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- Here should be the item row -->
                                                <tr class="item-row">
                                                    <td>
                                                        <input class="form-control item" name="nama[]"
                                                            placeholder="Nama Barang" type="text">
                                                        @error('nama')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input class="form-control price" name="harga[]"
                                                            placeholder="Harga" type="text">
                                                        @error('harga')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input class="form-control qty" name="jumlah[]"
                                                            placeholder="Jumlah beli" type="text">
                                                        @error('tgl_awal')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input class="form-control total" name="total[]" type="number"
                                                            readonly>
                                                    </td>
                                                    <td>
                                                        <a id="addRow" href="javascript:;" title="Add a row"
                                                            class="btn btn-primary">Tambah</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right"><strong>Sub Total</strong></td>
                                                    <td><input type="number" name="totalharga" readonly
                                                            class="form-control" id="subtotal"></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total Barang</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="totalbarang"
                                                            id="totalQty" readonly>
                                                    </td>

                                                    <td>
                                                    <td>
                                                        <!-- <strong>Total Quantity: </strong><span id="totalQty"
                                                            style="color: red; font-weight: bold">0</span> Units -->
                                                    </td>
                                                    <td></td>


                                                </tr>



                                            </tbody>
                                        </table>
                                        <button type="sumbit" class="btn btn-success">Tambah
                                            Pemesanan</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
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

    <script>
    $(document).ready(function() {



        $(document).on('change', '.namabarang', function() {
            var barang_id = $(this).val();
            var a = $(this).parent().parent();
            console.log(barang_id);
            var op = "";
            $.ajax({
                type: 'get',
                url: '/temukanbarang',
                data: {
                    'id': barang_id
                },
                dataType: 'json',
                success: function(data) {
                    console.log('succes');

                    a.find('.stock').val(data.stock);


                },
                error: function() {

                }
            });

        });
    });
    </script>
    <script>
    /**
 * jQuery Invoice Plugin v1.0             
 *	                                           
 * Version 1.0, January - 2016	           
 * Author: Firoz Ahmad Likhon <likh.deshi@gmail.com>               
 * Website: https://github.com/likhonlikh 
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

                total = (total);

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

            subtotal = (subtotal);

            jQuery($.opt.subtotal).val(subtotal);

            return 1;
        },
        /**
         * Calculate grand total of an order.
         *
         * @returns {number}
         */
        calcGrandTotal: function() {
            var grandTotal = Number(jQuery($.opt.subtotal).html()) +
                Number(jQuery($.opt.shipping).val()) -
                Number(jQuery($.opt.discount).val());
            grandTotal = (grandTotal);

            jQuery($.opt.grandTotal).html(grandTotal);

            return 1;
        },

        /**
         * Add a row.
         *
         * @returns {number}
         */
        newRow: function() {
            jQuery(".item-row:last").after(
                '<tr class="item-row"><td class="item-name"><div class="delete-btn"><input type="text" class="form-control item" name="nama[]" placeholder="Item" type="text"></div></td><td><input class="form-control price" name="harga[]" placeholder="Price" type="text"> </td><td><input class="form-control qty" name="jumlah[]" placeholder="Quantity" type="text"></td><td><input class="form-control total" name="total[]" type="number" readonly></td><td><a class=' +
                $.opt.delete.substring(1) +
                ' href="javascript:;" title="Remove row">Hapus</a></td></tr>'
            );

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