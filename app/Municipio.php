<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    public $table="municipios"; //a que tabla voy a dirigir en base de datos
    //funcion para relacionar la tabla municipios-users
    public function usuarios(){
        return $this->hasMany('App\User','municipio_id','id');
    }
    //funcion para relacionar la tabla departamentos-municipios
    public function departamentos(){
        return $this->belongsTo('App\Departamento','departamento_id','id');
    }
}
