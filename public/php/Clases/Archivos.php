<?php
/**
 * Escanea los archivos y probee acceso a ellos
 */
class Archivos
{
    public $lista = [];
    function __construct($ruta = '.')
    {
        $this->lista = $this->lista($ruta);
    }
    public static function lista_c($ruta = '.'){
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
    public static function lista($ruta = '.'){
        /*
            - esta funcion construye una lista de archivos y carpetas dentro de una ruta,
            - omite los puntos de la ruta, para que no se acceda a una carpeta superior
            - omite las carpetas . y ..
        */
        $ruta = strtr($ruta, ".", " ");
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
                if($archivo != "." && $archivo != ".."){
                    $carpetas[] = [
                        'nombre' => $archivo,
                        'direccion' => $t_ruta
                    ];
                }
            }
        }
        return [
            'archivos' => $archivos,
            'carpetas' => $carpetas
        ];
    }
    public static function lista_archivos_f($ruta, $filtro='.txt')
    {
        $lista_de_archivos = scandir($ruta);
        $archivos = [];
        foreach($lista_de_archivos as $archivo){
            $t_ruta = $ruta . '/' . $archivo;
            if(!is_dir($t_ruta)){
                if(strrchr($t_ruta,'.') == $filtro){
                    $archivos[] = [
                        'nombre' => $archivo,
                        'direccion' => $t_ruta
                    ];
                }
            }
        }
        return $archivos;
    }
}