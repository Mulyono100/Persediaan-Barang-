<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Barangkeluar;
use App\Barangmasuk;
use App\Pemesanan;
use App\Permintaan;
use App\Produksi;
use Illuminate\Http\Request;

class ManajerController extends Controller
{
    public function index()
    {
        $produksi = Produksi::count('id');
        $permintaan = Permintaan::where('role_id', 3)->count();
        $barang = Barang::sum('stock');
        $pemesanan = Pemesanan::sum('total_biaya');
        $barangmasuk = Barangmasuk::sum('total_barang_masuk');
        $barangkeluar = Barangkeluar::sum('total_barang_keluar');
        return view('manajer.index', compact('produksi', 'permintaan', 'barang', 'pemesanan', 'barangmasuk', 'barangkeluar'));
    }
    public function laporanbarang()
    {
        $barang = Barang::all();
        $totalkeseluruhan = Barang::sum('stock');
        return view('manajer.laporan.barang', compact('barang', 'totalkeseluruhan'));
    }
    public function laporanpermintaan()
    {
        return view('manajer.laporan.laporanpermintaan');
    }
    public function laporanpermintaandetail(Request $request)
    {
        $this->validate($request, [
            'tgl_awal' => 'required',
            'tgl_ahir' => 'required'
        ], [
            'tgl_awal.required' => 'Tanggal Awal Wajib di isi',
            'tgl_ahir.required' => 'Tanggal Ahir Wajib di isi'
        ]);
        $tanggalawal = $request->tgl_awal;
        $tanggalahir = $request->tgl_ahir;
        $tawal = date('d M Y', strtotime($tanggalawal));
        $tahir = date('d M Y', strtotime($tanggalahir));
        $permintaan = Permintaan::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->get();

        $total = Permintaan::where('role_id', '3')->sum('total_permintaan');
        return view('manajer.laporan.laporanpermintaandetail', compact('permintaan', 'total', 'tawal', 'tahir'));
    }

    public function laporanproduksi()
    {
        return view('manajer.laporan.laporanproduksi');
    }
    public function laporanproduksidetail(Request $request)
    {
        $this->validate($request, [
            'tgl_awal' => 'required',
            'tgl_ahir' => 'required'
        ], [
            'tgl_awal.required' => 'Tanggal Awal Wajib di isi',
            'tgl_ahir.required' => 'Tanggal Ahir Wajib di isi'
        ]);
        $tanggalawal = $request->tgl_awal;
        $tanggalahir = $request->tgl_ahir;
        $tanggalawal1 = date(' d M Y', strtotime($tanggalawal));
        $tanggalahir1 = date(' d M Y', strtotime($tanggalahir));
        $produksi = Produksi::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->get();
        return view('manajer.laporan.laporanproduksidetail', compact('tanggalawal1', 'tanggalahir1', 'produksi'));
    }
    public function laporanpemesanan()
    {
        return view('manajer.laporan.laporanpemesanan');
    }
    public function laporanpemesanandetail(Request $request)
    {
        $this->validate($request, [
            'tgl_awal' => 'required',
            'tgl_ahir' => 'required'
        ], [
            'tgl_awal.required' => 'Tanggal Awal Wajib di isi',
            'tgl_ahir.required' => 'Tanggal Ahir Wajib di isi'
        ]);
        $tanggalawal = $request->tgl_awal;
        $tanggalahir = $request->tgl_ahir;
        $tawal = date('d M Y', strtotime($tanggalawal));
        $tahir = date('d M Y', strtotime($tanggalahir));
        $pemesanan = Pemesanan::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->get();
        $totalbarangpemesanan = Pemesanan::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->sum('total_barang_pesanan');
        $totalbiayapemesanan = Pemesanan::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->sum('total_biaya');
        return view('manajer.laporan.laporanpemesanandetail', compact('tawal', 'tahir', 'pemesanan', 'totalbarangpemesanan', 'totalbiayapemesanan'));
    }
    public function laporanbarangmasuk()
    {
        return view('manajer.laporan.laporanbarangmasuk');
    }
    public function laporanbarangmasukdetail(Request $request)
    {
        $this->validate($request, [
            'tgl_awal' => 'required',
            'tgl_ahir' => 'required'
        ], [
            'tgl_awal.required' => 'Tanggal Awal Wajib di isi',
            'tgl_ahir.required' => 'Tanggal Ahir Wajib di isi'
        ]);
        $tanggalawal = $request->tgl_awal;
        $tanggalahir = $request->tgl_ahir;
        $tawal = date('d M Y', strtotime($tanggalawal));
        $tahir = date('d M Y', strtotime($tanggalahir));
        $barangmasuk = Barangmasuk::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->get();
        $totalbarangmasuk = Barangmasuk::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->sum('total_barang_masuk');
        return view('manajer.laporan.laporanbarangmasukdetail', compact('tawal', 'tahir', 'barangmasuk', 'totalbarangmasuk'));
    }
    public function laporanbarangkeluar()
    {
        return view('manajer.laporan.laporanbarangkeluar');
    }
    public function laporanbarangkeluardetail(Request $request)
    {
        $this->validate($request, [
            'tgl_awal' => 'required',
            'tgl_ahir' => 'required'
        ], [
            'tgl_awal.required' => 'Tanggal Awal Wajib di isi',
            'tgl_ahir.required' => 'Tanggal Ahir Wajib di isi'
        ]);
        $tanggalawal = $request->tgl_awal;
        $tanggalahir = $request->tgl_ahir;
        $tawal = date('d M Y', strtotime($tanggalawal));
        $tahir = date('d M Y', strtotime($tanggalahir));
        $barangkeluar = Barangkeluar::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->get();
        $totalbarangkeluar = Barangkeluar::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->sum('total_barang_keluar');
        return view('manajer.laporan.laporanbarangkeluardetail', compact('tawal', 'tahir', 'barangkeluar', 'totalbarangkeluar'));
    }
}