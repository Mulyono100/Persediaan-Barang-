<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'username', 'password', 'nik', 'email', 'status_id', 'email_verified_at', 'remember_token', 'created_at', 'updated_at'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Status()
    {
        return $this->belongsTo('App\Status');
    }
    public function Permintaan()
    {
        return $this->hasMany('App\Permintaan');
    }
    public function DetailPermintaan()
    {
        return $this->hasMany('App\DetailPermintaan');
    }
    public function Produksi()
    {
        return $this->hasMany('App\Produksi');
    }
    public function Detailproduksi()
    {
        return $this->hasMany('App\Detailproduksi');
    }
}