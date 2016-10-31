<?php
/**
 * Escanea los archivos y probee acceso a ellos
 */
class Archivos
{
    public $lista = [];
    function __construct($ruta='files')
    {
        $lista_de_archivos = scandir($ruta);
        $archivos = [];
        $carpetas = [];
        foreach($lista_de_archivos as $archivo){
            $t_ruta = $ruta . '/' . $archivo;
            if(!is_dir($t_ruta)){
                $archivos[] = [
                    'nombre' => $archivo,
                    'direccion' => $t_ruta
                ];
            }else{
                $carpetas[] = [
                    'nombre' => $archivo,
                    'direccion' => $t_ruta
                ];
            }
        }
        $this->lista = [
            'archivos' => $archivos,
            'carpetas' => $carpetas
        ];
    }
    public static function lista($ruta = '.'){
        $lista_de_archivos = scandir($ruta);
        $archivos = [];
        $carpetas = [];
        foreach($lista_de_archivos as $archivo){
            $t_ruta = $ruta . '/' . $archivo;
            if(!is_dir($t_ruta)){
                $archivos[] = [
                    'nombre' => $archivo,
                    'direccion' => $t_ruta
                ];
            }else{
                $carpetas[] = [
                    'nombre' => $archivo,
                    'direccion' => $t_ruta
                ];
            }
        }
        return [
            'archivos' => $archivos,
            'carpetas' => $carpetas
        ];
    }
}