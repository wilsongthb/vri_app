<?php
/*
    GET_CONTENT

    Devuelve el contenido de un archivo en un response
    NOTA: no se ha verificado su confiabilidad

    Seguridad: aun no se ha verificado la seguridad de esta aplicacion
    v: 0.0.5
*/
class Convertir
{
    function __construct()
    {
        # code...
    }
    public static function TXTaSTRING($ruta){
        /*
            - pasa un txt a un string linea a linea
            - puede usar alternativamente file_get_contents()
        */
        $respuesta = '';
        $archivo_txt = fopen($ruta,'r');
        if($archivo_txt){
            while (($bufer = fgets($archivo_txt, 4096)) !== false) {
                // 4096 representa el bufer de entrada, este esta configurado en el archivo php.ini
                $respuesta .= utf8_encode($bufer);
            }
            if (!feof($archivo_txt)) {
                return "Error: fallo inesperado de fgets()";
            }
            fclose($archivo_txt);
        }
        return $respuesta;
    }
    public static function TodoPDFaTXT($ruta, $destino, $argumentos = "", $devolver=false){
        /*
            - requiere de el programa pdftotext del conjunto de herramientas xpdf
                - version con la que se hizo las pruebas pdftotext version 0.41.0 en Ubuntu 16.04
                - puede instalarlo con el comando "sudo apt install xpdf" o "sudo apt install pdftotext"
            - esta funcion convierte todos los archivos PDF a TXT de la $ruta
            - esta funcion esta hecha para ser usada en cli porque puede
              tomar mucho tiempo procesar los archivos
            - esta funcion esta diseñada para su uso en cli(linea de comandos de linux)
            - para guardar las respuesta mostradas en un string agrege un tercer
              parametro con el valor true
            - el tercer parametro es un string en donde se inserta los argumentos que se incluiran en la ejecucion de pdftotext ejm "-layout"
        */
        $r = "";
        function encapsulado($cadena){
            $r .= $cadena;
        }
        $funcion = 'printf';
        if($devolver){
            $funcion = 'encapsulado';
        }


        $funcion( '--- TODO PDF A TXT - CLI ---' . PHP_EOL );
        $funcion( 'requiere de xpdf' . PHP_EOL );
        require('Archivos.php');
        $lista_de_PDFs = Archivos::lista_archivos_f($ruta,'.pdf');

        $ocurrencias = [];

        foreach ($lista_de_PDFs as $clave => $pdf) {
            $mensaje_de_error = "0";
            $funcion( $clave+1 . '_' . count($lista_de_PDFs) . PHP_EOL );
            $sentencia = 'pdftotext '.$argumentos.' "' . $pdf['direccion'] . '"';
            $mensajes_adicionales = "";
            $respuesta = system($sentencia, $mensajes_adicionales);

            $nombre_txt = substr($pdf['nombre'], 0, strrpos($pdf['nombre'], '.')) . '.txt';

            if($respuesta == 0){
                $tmp = "";
                system('mv "' . $ruta . '/' . $nombre_txt . '" "' . $destino . '"', $tmp);
                $mensajes_adicionales .= PHP_EOL . $tmp . PHP_EOL;
            }else{
                switch ($respuesta) {
                    case 1:
                        $mensaje_de_error = 'Error abriendo el archivo PDF';
                        break;
                    case 2:
                        $mensaje_de_error = 'Error abriendo un output';
                        break;
                    case 3:
                        $mensaje_de_error = 'Error en permisos del PDF';
                        break;
                    
                    default:
                        $mensaje_de_error = 'Error desconocido';
                        break;
                }
            }
            $ocurrencias[] = [
                'clave' => $clave,
                'pdf' => $pdf,
                'error' => $mensaje_de_error,
                'notas' => $mensajes_adicionales
            ];
        }
        foreach ($ocurrencias as $ocurrencia) {
            if($ocurrencia['error'] != '0'){
                $funcion( print_r($ocurrencia, true) . PHP_EOL );
            }
        }
        return [
            'respuestas' => $r,
            'ocurrencias' => $ocurrencias
        ];
    }
    public static function PDFaTXT($pdf, $destino = '.', $argumentos = '', $detalle = false){
        /*
            Se encarga de transformar un archivo pdf y moverlo a la carpeta destino
            basta con indicarle la ruta del pdf, el archivo se guardara en la misma carpeta
            esta funcion no es segura!
        */

        $convertir = 'pdftotext '.$argumentos.' "' . $pdf . '" >>respuesta.txt 2>>error.txt';
        $ruta_txt = substr($pdf, 0, strrpos($pdf, '.')) . '.txt';
        $mover = 'mv "' . $ruta_txt . '" "' . $destino . '" >>respuesta.txt 2>>error.txt';

        if($detalle){
            echo "<pre>";
            echo getcwd()."\n";
            echo "$convertir\n";
            echo "$mover\n";
        }

        system($convertir);
        if($destino != '.'){
            // si el destino es la misma carpeta o no se paso el argumento, no lo mueve
            system($mover);
        }

        // devuelve la ruta archivo txt
        return $destino . substr(substr($pdf, 0, strrpos($pdf, '/')), -4) . '.txt';
    }
}
