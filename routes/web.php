<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// pagina de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// grupo de recursos 'resources'
Route::group(['prefix' => 'res'], function(){
     Route::post('lista_archivos', 'res_archivos@lista');
     Route::get('archivo/{id}', 'res_archivos@contenido');
});

// grupo de rutas de la aplicacion del VRI
Route::group(['prefix' => 'vri'], function(){
    Route::get('', 'ctrl_vri@index');
    Route::get('indexacion', 'ctrl_vri@indexacion');// hecho!
    Route::get('busqueda', 'ctrl_vri@busqueda');// hecho!
    Route::get('comparar', 'ctrl_vri@comparar');// hecho v1!
    Route::get('comparacion/resultados', 'ctrl_vri@resultados');
    Route::post('comparacion/resultado/{id}', 'ctrl_vri@resultado');// hecho!
    Route::get('cola', 'ctrl_vri@cola');
    Route::get('archivosycarpetas', 'ctrl_vri@ayc');// hecho!
});

//otros
Auth::routes();
Route::get('/home', 'HomeController@index');