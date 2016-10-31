<?php
/*
GET_CONTENT

Devuelve el contenido de un archivo en un response
NOTA: no se ha verificado su confiabilidad

Seguridad: 0
v: 0.0.1
*/

/**
* 
*/
class Convertir
{
    function __construct()
    {
        # code...
    }
    public static function TXTaSTRING($ruta){
        $respuesta = '';
        $archivo_txt = fopen($ruta,'r');
        if($archivo_txt){
            while (($bufer = fgets($archivo_txt, 4096)) !== false) {
                $respuesta .= utf8_encode($bufer);
            }
            if (!feof($archivo_txt)) {
                return "Error: fallo inesperado de fgets()";
                /*
                echo "Error: fallo inesperado de fgets()\n";
                return FALSE;*/
            }
            fclose($archivo_txt);
        }
        return $respuesta;
    }
}
