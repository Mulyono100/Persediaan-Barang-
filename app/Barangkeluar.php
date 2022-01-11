<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    protected $fillable = ['id', 'tanggal', 'kode_keluar', 'permintaan_id', 'user_id', 'total_barang_keluar'];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Detail_barangmasuk()
    {
        return $this->hasMany('App\Detail_barangmasuk');
    }
    public function Barang()
    {
        return $this->belongsTo('App\Barang');
    }
    public function Permintaan()
    {
        return $this->belongsTo('App\Permintaan');
    }
}