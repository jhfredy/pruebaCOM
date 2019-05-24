<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public $table="departamentos"; //a que tabla voy a dirigir en base de datos
    //funcion para relacionar la tabla municipios-users
    public function municipios(){
        return $this->hasMany('App\Municipio','municipio_id','id');
    }
    //funcion para relacionar la tabla departamentos-paises
    public function paises(){
        return $this->belongsTo('App\Pais','pais_id','id');
    }
}
