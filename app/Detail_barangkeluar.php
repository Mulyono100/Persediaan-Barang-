<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_barangkeluar extends Model
{

    protected  $fillable = ['id', 'tanggal', 'barangkeluar_id', 'user_id', 'barang_id', 'jumlah'];

    public function Barangkeluar()
    {
        return $this->belongsTo('App\Barangkeluar');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function barang()
    {
        return $this->belongsTo('App\Barang');
    }
}