<?php

namespace App\Http\Controllers;

use App\Barangkeluar;
use App\Barangmasuk;
use App\Permintaan;
use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    public function index()
    {
        $barangkeluar = Barangkeluar::all();
        return view('gudang.barangkeluar.index', compact('barangkeluar'));
    }
    public function detail($id)
    {
        $minta = Permintaan::with('detailPermintaan')->where('id', $id)->first();
        return view('gudang.barangkeluar.detail', compact('minta'));
    }

    public function laporan()
    {
        return view('gudang.barangkeluar.laporan');
    }
    public function cetaklaporanbarangkeluar(Request $request)
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
        return view('gudang.barangkeluar.detaillaporan', compact('tawal', 'tahir', 'barangkeluar', 'totalbarangkeluar'));
    }
}