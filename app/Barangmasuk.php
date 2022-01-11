<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{

    protected $fillable = ['id', 'tanggal', 'kode_masuk', 'user_id', 'total_barang_masuk'];

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
}