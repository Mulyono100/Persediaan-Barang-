<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table='status';
    protected $fillable=['id','nama'];

    public function User(){
        return $this->hasMany('App\User');
    }
}
