<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //datos que van a ser llenados por el cliente
    protected $fillable = [
        'name', 'email', 'password','municipio_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //funcion de eloquent para llamar la tabla de municipios
    public function municipios(){
        return $this->belongsTo('App\Municipio','municipio_id','id');
    }
}
