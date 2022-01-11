<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Detailproduksi;
use App\Produksi;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;

class ProduksiController extends Controller
{
    public function index()
    {
        $user = Auth::User()->id;
        $produksi = Produksi::where('user_id', $user)->get();
        return view('pegawai.produksi.index', compact('produksi'));
    }
    public function tambahproduksi()
    {
        $product = Barang::all();
        return view('pegawai.produksi.tambah', compact('product'));
    }
    public function simpan(Request $request)
    {
        $user = Auth::User()->id;
        $kode_produksi = IdGenerator::generate(['table' => 'produksis', 'field' => 'kode_produksi', 'length' => 10, 'prefix' => 'P-']);
        $tanggal = time();
        $tanggal1 = date('Y-m-d', $tanggal);
        Produksi::create([
            'tanggal' => $tanggal1,
            'kode_produksi' => $kode_produksi,
            'user_id' => $user,
            'jenis_produksi' => $request->jenisproduksi,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/simpanproduksi');
    }
    public function laporan()
    {
        return view('pegawai.produksi.laporan');
    }
    public function cetaklaporanproduksi(Request $request)
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
        $produksi = Produksi::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->where('user_id', $tampilkan)->get();
        return view('pegawai.produksi.laporanproduksi', compact('tanggalawal1', 'tanggalahir1', 'produksi'));
    }


    public function indexgudang()
    {
        $produksi = Produksi::all();
        return view('gudang.produksi.index', compact('produksi'));
    }
    public function laporangudang()
    {
        return view('gudang.produksi.laporan');
    }
    public function cetaklaporanproduksipegawai(Request $request)
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
        $produksi = Produksi::whereBetween('tanggal', [$tanggalawal, $tanggalahir])->get();
        return view('gudang.produksi.laporanproduksi', compact('tanggalawal1', 'tanggalahir1', 'produksi'));
    }
    public function mencoba(Request $request)
    {
        $user = Auth::User()->id;
        $kode_produksi = IdGenerator::generate(['table' => 'produksis', 'field' => 'kode_produksi', 'length' => 10, 'prefix' => 'KP-']);
        $tanggal = time();

        $produksi = new Produksi();
        $produksi->tanggal = date('Y-m-d', $tanggal);
        $produksi->kode_produksi = $kode_produksi;
        $produksi->user_id = $user;
        $produksi->jenis_produksi = $request->jenisproduksi;
        $produksi->keterangan = $request->keterangan;
        $produksi->total_kebutuhan_peralatan = $request->totalQty;

        $produksi->save();

        if (count($request->namabarang) > 0) {
            foreach ($request->namabarang as $item => $value) {
                $data = [
                    'tanggal' => date('Y-m-d', $tanggal),
                    'produksi_id' => $produksi->id,
                    'user_id' => $user,
                    'barang_id' => $request->namabarang[$item],
                    'jumlah' => $request->jumlah[$item],
                    'total_kebutuhan_peralatan' => $request->totalQty

                ];
                Detailproduksi::create($data);
                $minta = Produksi::with('detailproduksi')->where('id', $data['produksi_id'])->first();
            }
        }




        return redirect('/simpanproduksi');
    }
    public function detailproduksi($id)
    {
        $detail = Produksi::with('Detailproduksi')->where('id', $id)->first();
        return view('pegawai.produksi.detailproduksi', compact('detail'));
    }

    public function detailproduksipegawai($id)
    {
        $detail = Produksi::with('Detailproduksi')->where('id', $id)->first();
        return view('gudang.produksi.detailproduksi', compact('detail'));
    }
}