<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ruta para redirigir al login
Route::get('/', function () {
    return redirect('/login');
});
// llamo al archivo auth.php
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usuarios','HomeController@usuarios');
Route::get('/listarMunicipios','UserController@listarMunicipios');
Route::get('/listarDepartamentos','UserController@listarDepartamentos');
Route::get('/listarPaises','UserController@listarPaises');
