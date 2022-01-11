<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = ['id', 'tanggal', 'user_id', 'kode_pemesanan', 'nama_suplier', 'total_barang_pesanan', 'total_biaya', 'buktipembayaran'];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Detailpemesanan()
    {
        return $this->hasMany('App\Detailpemesanan');
    }
}