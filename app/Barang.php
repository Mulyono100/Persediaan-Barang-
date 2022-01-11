<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['id', 'kode_barang', 'nama_barang', 'stock'];

    public function Permintaan()
    {
        return $this->hasMany('App\Permintaan');
    }
    public function DetailPermintaan()
    {
        return $this->hasMany('App\DetailPermintaan');
    }
    public function Detail_barangmasuk()
    {
        return $this->hasMany('App\Detail_barangmasuk');
    }
    public function Detail_barangkeluar()
    {
        return $this->hasMany('App\Barangkeluar');
    }
    public function Barangkeluar()
    {
        return $this->hasMany('App\Barangkeluar');
    }
    public function Detailproduksi()
    {
        return $this->hasMany('App\Detailpemesanan');
    }
}