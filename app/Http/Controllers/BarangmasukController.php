<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Barangkeluar;
use App\Barangmasuk;
use App\Detail_barangkeluar;
use App\Detail_barangmasuk;
use App\DetailPermintaan;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;

class BarangmasukController extends Controller
{
    public function index()
    {
        $barangmasuk = Barangmasuk::all();
        return view('gudang.barangmasuk.index', compact('barangmasuk'));
    }
    public function hapus($id)
    {
        $barangmasuk = Barangmasuk::find($id);
        $barangmasuk->delete();
        return redirect('/barangmasuk')->with('hapus', 'Data berhasil di hapus');
    }
    public function tambahbarangmasuk()
    {
        $product = Barang::all();
        return view('gudang.barangmasuk.tambah', compact('product'));
    }
    public function tambahmasuk(Request $request)
    {
        $barangmasuk = $request->all();
        $kode_masuk = IdGenerator::generate(['table' => 'barangmasuks', 'field' => 'kode_masuk', 'length' => 10, 'prefix' => 'BM-']);
        $tanggal = time();
        $user = Auth::User()->id;

        $barangmasuk1 = new Barangmasuk;
        $barangmasuk1->tanggal = date('Y-m-d', $tanggal);
        $barangmasuk1->kode_masuk = $kode_masuk;
        $barangmasuk1->user_id = $user;
        $barangmasuk1->total_barang_masuk = $barangmasuk['totalQty'];
        $barangmasuk1->save();

        if (count($barangmasuk['namabarang']) > 0) {
            foreach ($barangmasuk['namabarang'] as $item => $value) {
                $data = [
                    'tanggal' => date('Y-m-d', $tanggal),
                    'barangmasuk_id' => $barangmasuk1->id,
                    'user_id' => $user,
                    'barang_id' => $barangmasuk['namabarang'][$item],
                    'jumlah' => $barangmasuk['jumlah'][$item]
                ];
                Detail_barangmasuk::create($data);
            }
        }

        return redirect('/barangmasuk')->with('sukses', 'Data berhasil ditambah');
    }
    public function detail($id)
    {
        $detail = Barangmasuk::with('detail_barangmasuk')->where('id', $id)->first();
        return view('gudang.barangmasuk.detail', compact('detail'));
    }
    // laporan
    public function laporan()
    {
        return view('gudang.barangmasuk.laporan');
    }
    public function cetaklaporan(Request $request)
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

        return view('gudang.barangmasuk.laporanbarangmasuk', compact('tawal', 'tahir', 'barangmasuk', 'totalbarangmasuk'));
    }
}