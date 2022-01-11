<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailpemesanan extends Model
{
    protected $fillable = ['id', 'tanggal', 'pemesanan_id', 'user_id', 'nama_suplier', 'nama_barang', 'harga_barang', 'jumlah_beli', 'total', 'total_harga'];
    public function Pemesanan()
    {
        return $this->belongsTo('App\Pemesanan');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}