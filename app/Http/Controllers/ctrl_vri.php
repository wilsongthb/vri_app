<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ctrl_vri extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index(){
        return view('vri.index');
    }
    function comparar(){
        return view('vri.comparar');
        // return view('vri.compararv2');
    }
    function indexacion(){
        return view('vri.indexacion');
    }
    function ayc(){
        return view('vri.ayc');
    }
    function busqueda(){
        return view('vri.busqueda');
    }
    function cola(){
        return "En proceso...";
    }
    function resultados(){
        return view('vri.resultados');
    }
    function status(){
        return view('vri.status');
    }
    function resultado(Request $request, $id){
        $ruta0 = $request->input('ruta0');
        $ruta1 = $request->input('ruta1');
        $sentencia = 'php php/cli/cli_comparacionv2.php "php/'.$ruta0.'" "php/'.$ruta1.'" sc sanear>>log/'.$id.' 2>>log/error.txt &';
        system($sentencia);
        return "<pre><a href='".url('/')."/log/$id'>link</a>\n".print_r([$id,$ruta0,$ruta1,$sentencia],true);
    }
}


