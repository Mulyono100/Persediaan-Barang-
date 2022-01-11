<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{

    protected $fillable = ['id', 'keterangan'];

    public function Permintaan()
    {
        return $this->hasMany('App\Permintaan');
    }
}