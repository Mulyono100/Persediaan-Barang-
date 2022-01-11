<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailproduksi extends Model
{

    protected $fillable = ['id', 'tanggal', 'produksi_id', 'user_id', 'barang_id', 'jumlah', 'total_kebutuhan_peralatan'];

    public function Produksi()
    {
        return $this->belongsTo('App\Produksi');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Barang()
    {
        return $this->belongsTo('App\Barang');
    }
}