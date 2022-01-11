<?php

namespace App\Http\Controllers;

use App\Detailpemesanan;
use App\Pemesanan;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index()
    {
        $pesanan = Pemesanan::all();
        return view('gudang.pemesanan.index', compact('pesanan'));
    }
    public function tambah()
    {
        return view('gudang.pemesanan.tambah');
    }
    public function tambahpemesanan(Request $request)
    {


        $tanggal = time();
        $user = Auth::User()->id;
        $gambar = $request->buktipembayaran;
        $file = $gambar->getClientOriginalName();
        $tanggalsekarang = date('Y-m-d', $tanggal);
        $kode_pemesanan = IdGenerator::generate(['table' => 'barangmasuks', 'field' => 'kode_masuk', 'length' => 10, 'prefix' => 'PM-']);
        $pemesanan = new Pemesanan();
        $pemesanan->tanggal = date('Y-m-d', $tanggal);
        $pemesanan->kode_pemesanan = $kode_pemesanan;
        $pemesanan->user_id = $user;
        $pemesanan->nama_suplier = $request->namasuplier;
        $pemesanan->total_barang_pesanan = $request->totalbarang;
        $pemesanan->total_biaya = $request->totalharga;
        $pemesanan->buktipembayaran = $file;

        $gambar->move(public_path() . '/buktipembayaran', $file);
        $pemesanan->save();

        if (count($request->nama) > 0) {
            foreach ($request->nama as $item => $value) {
                $data = [
                    'tanggal' => date('Y-m-d', $tanggal),
                    'pemesanan_id' => $pemesanan->id,
                    'user_id' => $user,
                    'nama_suplier' => $request->namasuplier,
                    'nama_barang' => $request->nama[$item],
                    'harga_barang' => $request->harga[$item],
                    'jumlah_beli' => $request->jumlah[$item],
                    'total' => $request->total[$item],
                    'total_harga' => $request->totalharga
                ];
                Detailpemesanan::create($data);
            }
        }

        return redirect('/kelolapemesanan');
    }
    public function hapus($id)
    {
        $pemesanan = Pemesanan::find($id);
        $pemesanan->delete();
        return redirect('/kelolapemesanan')->with('hapus', 'Data Berhasil di hapus');
    }
    public function detail($id)
    {
        $detail = Pemesanan::with('Detailpemesanan')->where('id', $id)->first();
        return view('gudang.pemesanan.detail', compact('detail'));
    }
    public function ubah($id)
    {
        $ubah = Pemesanan::find($id);
        return view('gudang.pemesanan.ubah', compact('ubah'));
    }


    public function laporan()
    {
        return view('gudang.pemesanan.laporan');
    }
    public function laporanpemesanan(Request $request)
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
        return view('gudang.pemesanan.laporanpemesanan', compact('tawal', 'tahir', 'pemesanan', 'totalbarangpemesanan', 'totalbiayapemesanan'));
    }
}