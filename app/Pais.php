<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    public $table="paises"; //a que tabla voy a dirigir en base de datos
    //funcion para relacionar la tabla municipios-users
    public function departamentos(){
        return $this->hasMany('App\Departamento','pais_id','id');
    }
    
}
