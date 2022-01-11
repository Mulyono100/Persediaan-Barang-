<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_barangmasuk extends Model
{
    protected  $fillable = ['id', 'tanggal', 'barangmasuk_id', 'user_id', 'barang_id', 'jumlah'];

    public function Barangmasuk()
    {
        return $this->belongsTo('App\Barangmasuk');
    }
    public function Barang()
    {
        return $this->belongsTo('App\Barang');
    }
}