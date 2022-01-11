<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $table = 'permintaans';
    protected $fillable = ['id', 'tanggal', 'kode_permintaan', 'user_id', 'total_permintaan', 'role_id'];

    public function DetailPermintaan()
    {
        return $this->hasMany('App\DetailPermintaan');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Role()
    {
        return $this->belongsTo('App\role');
    }
    public function Barang()
    {
        return $this->belongsTo('App\Barang');
    }
    public function Barangkeluar()
    {
        return $this->hasMany('App\Barangkeluar');
    }
}