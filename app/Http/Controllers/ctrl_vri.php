<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ctrl_vri extends Controller
{
    function comparar(){
        return view('vri.comparar');
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
}
