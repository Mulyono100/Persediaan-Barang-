<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        // untuk menampilkan data keseluruh
        $barang = Barang::all();
        $minimum_stok = 5;
        // tetapi ketika ada barang dengan stock dibawah minumum muncul badges masing-masing
        // saya masih bingung. mohon bantuannya 
        $stock = DB::table('barang')
            ->where('stock', '<', $minimum_stok)
            ->get();

        return view('gudang.barang.index', compact('barang', 'stock'));
    }

    public function tambahbarang()
    {
        return view('gudang.barang.tambahbarang');
    }
    public function tambah(Request $request)
    {

        $this->validate(
            $request,
            [
                'kode' => 'required|min:2|max:10',
                'nama' => 'required|min:2|max:50',
            ],
            [
                'kode.min' => 'Minimal 2 huruf',
                'kode.max' => 'Maksimal 10 huruf',
                'kode.required' => 'Kode Barang harus diisi',
                'nama.min' => 'minimal 2 huruf',
                'nama.max' => 'Maksimal 50 huruf',
                'nama.required' => 'Nama Barang Harus Di isi',
            ]

        );
        if (Barang::where('kode_barang', $request->kode)->exists()) {
            return redirect('/barang')->with('gagal', 'Kode barang sudah ada');
        } else {
            Barang::create([
                'kode_barang' => $request->kode,
                'nama_barang' => $request->nama,
                'stock' => 0

            ]);



            return redirect('/barang')->with('sukses', 'Data Berhasil Ditambahkan');
        }
    }

    public function ubah($id)
    {
        $barang = Barang::find($id);
        return view('gudang.barang.ubah', compact('barang'));
    }
    public function ubahbarang(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang->update([
            'kode_barang' => $request->kode,
            'nama_barang' => $request->nama
        ]);
        return redirect('/barang')->with('update', 'Data berhasil diubah');
    }
    public function hapus($id)
    {
        $hapus = Barang::find($id);
        $hapus->delete();
        return redirect('/barang')->with('hapus', 'Data berhasil di hapus');
    }
    public function laporan()
    {
        $barang = Barang::all();
        $totalkeseluruhan = Barang::sum('stock');
        return view('gudang.barang.laporan', compact('barang', 'totalkeseluruhan'));
    }
}