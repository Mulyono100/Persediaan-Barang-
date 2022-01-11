<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Barangkeluar;
use App\Barangmasuk;
use App\Pemesanan;
use App\Permintaan;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function index()
    {
        $barang = Barang::sum('stock');
        $permintaan = Permintaan::count('id');
        $barangmasuk = Barangmasuk::sum('total_barang_masuk');
        $barangkeluar = Barangkeluar::sum('total_barang_keluar');
        $permintaan1 = Permintaan::where('role_id', '3')->count();
        $pemesanan = Pemesanan::sum('total_biaya');
        $biaya = number_format($pemesanan, 2);
        $totalbarangpemesanan = Pemesanan::sum('total_barang_pesanan');

        return view("gudang.index", compact('barang', 'permintaan', 'barangmasuk', 'barangkeluar', 'permintaan1', 'pemesanan', 'totalbarangpemesanan', 'biaya'));
    }
}