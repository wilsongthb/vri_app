<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ctrl_files extends Controller
{
    function listar(Request $request){
        // print "<pre>".print_r(Storage::files('/files'),true);
    }
}
