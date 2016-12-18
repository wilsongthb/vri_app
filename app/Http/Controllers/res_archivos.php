<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class res_archivos extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function lista(Request $request){
        if($request->input('search')){
            $lista = \DB::table('archivo')
                ->select('id','nombre','ruta')
                ->where('contenido', 'LIKE', '%'.$request->input('search').'%')
                ->paginate(5);
            // $lista = $request->all();
        }else{
            $lista = \DB::table('archivo')
                ->select('id','nombre','ruta')
                ->paginate(5);
        }
        
        return response($lista);
    }
    function contenido($id){
        $item = \DB::table('archivo')
                ->select('contenido')
                ->where('id', $id)
                ->get();
        // return "<pre>".print_r($item, true);
        return "<pre>".$item[0]->contenido;
    }
}
