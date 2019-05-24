<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('NoCache');//middleware para borrar cache cuando realizo un cierre de sesion
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    // funcion que me sirve para redirigir a la ruta de usuarios
    public function usuarios(){
        return view('backend.cliente.cliente-user');
    }
}
