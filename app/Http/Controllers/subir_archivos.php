<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class subir_archivos extends Controller
{
    public function formulario(){
        return view('vri.subir');
    }
    public function subir(Request $request){
        $this->validate($request, [
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'doc' => 'required|mimes:pdf|max:10240',// validacion!
        ]);

        $nombre = $request->doc->getClientOriginalName();
        $docName = time().'.'.$request->doc->getClientOriginalExtension();// asigna un nombre
        $ruta = '/php/files/pdf';
        $tipo = $request->doc->getClientMimeType();
        $tamaño = $request->doc->getClientSize();

        DB::table('fuente')->insert([
            'nombre' => $nombre,
            'nombre_archivo' => $docName,
            'ruta' => $ruta,
            'tipo' => $tipo,
            'tamaño' => $tamaño,
            'created_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        
        $request->doc->move(public_path($ruta), $docName);// guarda el archivo

        return back()
            ->with('success','You have successfully upload docs.')
            ->with('doc',$docName);
        // return '<pre>'.print_r($request->all(),true);
        // return '<pre>'.print_r([$nombre, $tipo],true);
    }
}
