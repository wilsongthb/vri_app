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

//pagina de bienvenida
Route::get('/', function () {
    return view('welcome');
});

//grupo de rutas de la aplicacion del VRI
Route::group(['prefix' => 'vri'], function(){
    Route::get('indexacion', 'ctrl_vri@indexacion');
    Route::get('busqueda', 'ctrl_vri@busqueda');
    Route::get('comparar', 'ctrl_vri@comparar');
    Route::get('cola', 'ctrl_vri@cola');
    Route::get('archivosycarpetas', 'ctrl_vri@ayc');

    // Route::get('', function(){
    //     return view('vri.index');
    // });
    // Route::group(['prefix' => 'indexacion'], function(){
    //     Route::get('', function(){
    //         return view('vri.indexacion.index');
    //     });
    // });
    // Route::group(['prefix' => 'busqueda'], function(){
    //     Route::get('', function(){
    //         return view('vri.busqueda.index');
    //     });
    // });
    // Route::get('archivosycarpetas', function(){
    //     return view('vri.ayc');
    // });
});

//otros
Auth::routes();
Route::get('/home', 'HomeController@index');