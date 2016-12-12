<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ctrl_vri extends Controller
{
    function comparar(){
        return view('vri.comparar');
    }
}
