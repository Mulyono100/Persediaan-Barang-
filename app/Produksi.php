<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $fillable = ['id', 'tanggal', 'kode_produksi', 'user_id', 'jenis_produksi', 'keterangan', 'total_kebutuhan_peralatan'];
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Detailpemesanan()
    {
        return $this->hasMany('App\Detailpemesanan');
    }
    public function Detailproduksi()
    {
        return $this->hasMany('App\Detailproduksi');
    }
}