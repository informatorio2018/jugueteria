<?php

use App\Documento;
use App\Tratamiento;
use App\Cliente;
use App\Articulo;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('clientes','ClientesController');

Route::get('listar', function () {
    return $clientes = Cliente::all();
});

Route::get('cliente/{id}', function ($id) {
    return $cliente = Cliente::find($id);
});

Route::resource('articulos','ArticulosController');
Route::resource('facturas','FacturasController');
// Route::get('clientes','ClientesController@index');

// Route::get('cliente','ClientesController@listar');
// Route::resource('tratamientos','TratamientosController');
Route::get('tratamientos',function(){
    return $tratamientos=Tratamiento::all();
});
Route::get('documentos',function(){
    return $documentos=Documento::all();
});

Route::get('/articulo/{id}',function($id){
    return $articulo=Articulo::find($id);
});