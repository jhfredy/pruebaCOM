<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamo a la instancia de los modelos
use App\Municipio;
use App\Departamento;
use App\Pais;
use App\User;
use DB;
//llqmo a la instancia de los validadores
use  App\Http\Requests\UserStoreRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //si hay busqueda
        $search=$request->search;
        if ($search=='') {
            $user=User::with('municipios')->orderBy('id','desc')->paginate(3);
        }else{
            $user=User::with('municipios')->where('name','like','%'.$search.'%')
            ->orWhere('email','like','%'.$search.'%')
            ->orderBy('id','desc')->paginate(3);
        }
        //paginacion manual de laravel
        return[
            'pagination'=>[
                'total'=>$user->total(),
                'current_page'=>$user->currentPage(),
                'per_page'=>$user->perPage(),
                'last_page'=>$user->lastPage(),
                'from'=>$user->firstItem(),
                'to'=>$user->lastItem(),
            ],
            //retorno la variable $user con la paginacion
            'user'=>$user
        ];
    }
    // funcion que me permite listar paises
    public function listarPaises(){
        //me trae todos los paises
        return DB::table('paises')->get();
    }
    // funcion que me permite listar departamentos
    public function listarDepartamentos(Request $request){
        //si envio una peticion por vue en el multiselect me filtra por el pais que escogi
        if(isset($request->id)){
            return DB::table('departamentos')->where('pais_id',$request->id)->get();
            //si no me lista todos los departamentos
        }else{
            return DB::table('departamentos')->get();
        }
    }
    // funcion que me permite listar municipios
    public function listarMunicipios(Request $request){
        //si envio una peticion por vue en el multiselect me filtra por el departamento que escogi
        if(isset($request->id)){
            return DB::table('municipios')->where('departamento_id',$request->id)->get();
            //si no me lista todos los departamentos
        }else{
            return DB::table('municipios')->get();
        }
    }
    

    public function store(UserStoreRequest $request)
    {
        $user=New User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->municipio_id=$request->municipio_id;
        $user->save();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->municipio_id=$request->municipio_id;
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user=User::find($request->id);
        $user->delete();
    }
}
