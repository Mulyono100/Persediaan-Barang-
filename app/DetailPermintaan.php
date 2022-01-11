<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPermintaan extends Model
{
    protected $table = 'detail_permintaan';
    protected $fillable = ['id', 'tanggal', 'permintaan_id', 'user_id', 'barang_id', 'jumlah_permintaan'];
    public function barang()
    {
        return $this->belongsTo('App\Barang');
    }
    public function Permintaan()
    {
        return $this->belongsTo('App\Permintaan');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}