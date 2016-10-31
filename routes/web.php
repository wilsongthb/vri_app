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
//use DB;

//pagina de bienvenida
Route::get('/', function () {
    return view('welcome');
});

//grupo de rutas de desarrollo y practicas
Route::group(['prefix' => 'dev'], function(){
    Route::get('vue', function(){
        return view('vue.prueba',[
            //'dev' => 1
        ]);
    });
    Route::get('vue_crud', function(){
        return view('vue.crud');
    });
});

//rutas de modelo, conexion a la base de datos
Route::group(['prefix' => 'models'], function(){
    Route::get('estudiantes', function(){
        $estudiantes = DB::table('estudiante')->orderBy('paterno','asc')->paginate(10);
        return response()->json($estudiantes);
    });
});

//grupo de rutas de la plicacion del VRI
Route::group(['prefix' => 'vri'], function(){
    Route::group(['prefix' => 'indexacion'], function(){
        Route::get('', function(){
            return view('vri.indexacion.index');
        });
    });
    Route::group(['prefix' => 'busqueda'], function(){
        Route::get('', function(){
            return view('vri.busqueda.index');
        });
    });
    Route::get('archivosycarpetas', function(){
        return view('vri.ayc');
    });
});

//otros
Auth::routes();
Route::get('/home', 'HomeController@index');