<?php

use App\Documento;
use App\Tratamiento;
use App\Cliente;
use App\Articulo;
use Illuminate\Support\Facades\Route;

Route::get('/buscar/{buscar}','ClientesController@buscar');
Route::get('/codArticulo/{codigo}','ArticulosController@buscarCodigo');
Route::get('/articulo/{articulo}','ArticulosController@buscarArticulo');
Route::get('/art/{articulo}','ArticulosController@traerArticulo');


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



Route::get('/search/{search}', 'ClientesController@search');

Route::get('lista','ArticulosController@lista')->name('lista');
Route::post('import', 'ArticulosController@importarLista');

Route::get('alertas','ArticulosController@alertas')->name('alertas');

Route::resource('categorias','CategoriasController');
Route::resource('marcas','MarcasController');
Route::get('/facturas/pdf','FacturasController@pdf')->name('pdf');