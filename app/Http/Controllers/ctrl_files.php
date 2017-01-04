<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ctrl_files extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function listar(Request $request){
        // print "<pre>".print_r(Storage::files('/files'),true);
    }
    function convertir_index(){
        return view('vri.convertir');
    }
}
