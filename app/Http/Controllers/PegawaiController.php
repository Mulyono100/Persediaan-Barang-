<?php

namespace App\Http\Controllers;

use App\Barang;
use App\DetailPermintaan;
use App\Permintaan;
use App\Produksi;
use App\User;
use Illuminate\Http\Request;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        $tampilkan_data = Auth::User()->id;
        $permintaan = Permintaan::where('user_id', $tampilkan_data)->count();
        $produksi = Produksi::where('user_id', $tampilkan_data)->count();
        return view('pegawai.index', compact('permintaan', 'produksi'));
    }
    // temukan barang
    public function temukan(Request $request)
    {
        $barang = Barang::select('stock')->where('id', $request->id)->first();
        return response()->json($barang);
    }

    // Permintaan
    public function permintaan()
    {
        $tampilkan = Auth::User()->id;
        $permintaan = Permintaan::where('user_id', $tampilkan)->get();
        return view('pegawai.permintaan', compact('permintaan'));
    }
    public function tambahpermintaan()
    {
        $barang = Barang::all();
        return view("pegawai.tambahpermintaan", compact('barang'));
    }
    public function tambah(Request $request)
    {
        $barang = $request->all();
        $user = Auth::User()->id;
        $kode_permintaan = IdGenerator::generate(['table' => 'permintaans', 'field' => 'kode_permintaan', 'length' => 10, 'prefix' => 'PM-']);
        $tanggal = time();

        if ($barang['jumlah'] > $barang['stock']) {
            return redirect('/PermintaanPegawai')->with('kurang', 'Jumlah permintaan barang melebihi stock barang yang tersedia, Silahkan Ulangi Kembali');
        } else {

            $permintaan = new Permintaan;
            $permintaan->tanggal = date('Y-m-d', $tanggal);
            $permintaan->kode_permintaan = $kode_permintaan;
            $permintaan->user_id = $user;
            $permintaan->total_permintaan = $request->totalQty;
            $permintaan->role_id = 1;
            $permintaan->save();

            if (count($request->namabarang) > 0) {
                foreach ($request->namabarang as $item => $value) {
                    $data = [
                        'tanggal' => date('Y-m-d', $tanggal),
                        'permintaan_id' => $permintaan->id,
                        'user_id' => $user,
                        'barang_id' => $request->namabarang[$item],
                        'jumlah_permintaan' => $request->jumlah[$item]

                    ];
                    DetailPermintaan::create($data);
                    $minta = Permintaan::with('detailPermintaan')->where('id', $data['permintaan_id'])->first();
                }
            }

            return redirect('/PermintaanPegawai')->with('success', 'Data Berhasil Ditambahkan');
        }
    }
    // detail permintaan
    public function detail($id)
    {
        $gudang = User::where('status_id', 2)->get();
        $minta = Permintaan::with('detailPermintaan')->where('id', $id)->first();

        return view('pegawai.detailpermintaan', compact('minta', 'gudang'));
    }

    // laporan
    public function laporanpermintaan()
    {
        return view('pegawai.laporanpermintaan');
    }

    // cetak laporan
    public function cetaklaporan(Request $request)
    {
        $this->validate($request, [
            'tgl_awal' => 'required',
            'tgl_ahir' => 'required'
        ], [
            'tgl_awal.required' => 'Tanggal Awal Wajib di isi',
            'tgl_ahir.required' => 'Tanggal Ahir Wajib di isi'
        ]);
        $tampilkan = Auth::User()->id;
        $tanggalawal = $request->tgl_awal;
        $tanggalahir = $request->tgl_ahir;
        $tanggalawal1 = date(' d M Y', strtotime($tanggalawal));
        $tanggalahir1 = date(' d M Y', strtotime($tanggalahir));
        $permintaan = permintaan::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->where('user_id', $tampilkan)->get();
        return view('pegawai.laporandetail', compact('permintaan', 'tanggalawal1', 'tanggalahir1'));
    }


    public function simpanproduksi()
    {
        return view('pegawai.simpanbarangproduksi');
    }
    public function tambahsimpanbarangproduksi()
    {
        return view('pegawai.tambahsimpanbarangproduksi');
    }
}