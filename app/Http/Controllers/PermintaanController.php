<?php

namespace App\Http\Controllers;

use App\Barangkeluar;
use App\Barangmasuk;
use App\Detail_barangkeluar;
use App\DetailPermintaan;
use App\Detailproduksi;
use App\Permintaan;
use App\role;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PermintaanController extends Controller
{
    public function index()
    {
        $permintaan = Permintaan::all();
        return view('gudang.permintaan.index', compact('permintaan'));
    }
    public function update($id)
    {
        $permintaan = Permintaan::find($id);
        $role = role::all();
        return view('gudang.permintaan.update', compact('permintaan', 'role'));
    }
    public function ubah(Request $request, $id)
    {
        $permintaan = Permintaan::find($id);
        $permintaan1 = $permintaan['id'];
        $detail = DetailPermintaan::where('permintaan_id', $permintaan1)->get();
        $data1 = [
            'tanggal' => $request->tanggal,
            'kode_permintaan' => $request->kode_permintaan,
            'user_id' => $request->user_id,
            'total_permintaan' => $request->total_permintaan,
            'role_id' => $request->role_id
        ];
        $kode_keluar = IdGenerator::generate(['table' => 'barangkeluars', 'field' => 'kode_keluar', 'length' => 10, 'prefix' => 'BK-']);
        $permintaan->update($data1);
        if ($request->role_id == 3) {
            $barangkeluar = new Barangkeluar();
            $barangkeluar->tanggal = $request->tanggal;
            $barangkeluar->kode_keluar = $kode_keluar;
            $barangkeluar->permintaan_id = $permintaan['id'];
            $barangkeluar->user_id = $request->user_id;
            $barangkeluar->total_barang_keluar = $request->total_permintaan;
            $barangkeluar->save();
            if (count($detail) > 0) {
                foreach ($detail as $p => $value) {

                    $data = [
                        'tanggal' => $barangkeluar['tanggal'],
                        'barangkeluar_id' => $barangkeluar['id'],
                        'user_id' => $request->user_id,
                        'barang_id' => $detail[$p]->barang_id,
                        'jumlah' => $detail[$p]->jumlah_permintaan
                    ];
                    Detail_barangkeluar::create($data);
                }
            }
        }

        return redirect('/permintaan');
    }

    public function permintaannavbar()
    {
        $permintaan = Permintaan::where('role_id', '9')->count();
        $jumlahpermintaan = Permintaan::where('role_id', '1')->count();
        return view('gudang.layout.navbar', compact('permintaan', 'jumlahpermintaan'));
    }

    public function laporanpermintaangudang()
    {
        return view('gudang.permintaan.laporan');
    }

    public function cetaklaporanbarangpermintaangudang(Request $request)
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
        $total = Permintaan::sum('total_permintaan');
        return view('gudang.permintaan.detaillaporan', compact('tawal', 'tahir', 'permintaan', 'total'));
    }

    public function prosespermintaan()
    {
        $proses = Permintaan::where('role_id', '1')->get();

        return view('gudang.permintaan.prosespermintaan', compact('proses'));
    }

    public function detailpermintaanpegawai($id)
    {
        $detail = Permintaan::with('detailPermintaan')->where('id', $id)->first();
        return view('gudang.permintaan.detailpermintaan', compact('detail'));
    }
}