<?php

use App\Documento;
use App\Tratamiento;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('clientes','ClientesController');

// Route::get('clientes','ClientesController@index');

// Route::get('cliente','ClientesController@listar');
// Route::resource('tratamientos','TratamientosController');
Route::get('tratamientos',function(){
    return $tratamientos=Tratamiento::all();
});
Route::get('documentos',function(){
    return $documentos=Documento::all();
});

