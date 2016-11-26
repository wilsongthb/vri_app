<?php
/*
    Estas funcions estan definidas solo para la aplicacion class_implements
    no estan preparadas para ser usadas para la web

    aun no se a comprobado la seguridad de las funciones
    aun no se ha comprobado errores de las funciones
*/


require('../Clases/Archivos.php');
require('../Clases/Convertir.php');


function imprimir($frase){
    echo $frase . PHP_EOL;
}
function buscar($repositorios, $ruta_archivo_verificar, &$resultados){
    $resultados_p = [];

    $archivo_verificar = file_get_contents($ruta_archivo_verificar);

    foreach ($repositorios as $repositorio) {
        foreach ($repositorio as $clave => $archivo) {
            $archivo_string = file_get_contents($archivo['direccion']);

            $similitud = 0;
            $resultados_p[] = similar_text($archivo_verificar, $archivo_string, $similitud);

            $resultados[] = [
                'ruta' => $archivo['direccion'],
                'coincidencias' => $resultados_p,
                'similitud' => $similitud
            ];
            
            imprimir($clave+1 . "\tde " . count($repositorio));
        }
    }
    arsort($resultados_p);
    return $resultados_p;
}
function comparacion($text1, $text2){
    /*
        compara dos strings, devuelve una cadena con las partes iguales
    */

}