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
function comparacion($text1, $text2, $minimo = 10){
    /*
        compara dos strings, devuelve una cadena con las partes iguales
    */

    $ultimo_encontrado = "";
    $encontrados = [];
    $buscado = "";

    $longitud_text1 = strlen($text1);
    echo 'longitud: ' . $longitud_text1 . PHP_EOL;

    $i = 0;
    for ($i ; $i < $longitud_text1; $i++) {
        $buscado .=  $text1[$i];
        $posicion = stripos($text2, $buscado);
        if($posicion !== false){
            //echo "+";
            $ultimo_encontrado = $buscado;
        }else{
            //echo ">";
            if(strlen($ultimo_encontrado) > $minimo){
                if(!array_search(utf8_encode($ultimo_encontrado), $encontrados)){
                    $encontrados[] = utf8_encode($ultimo_encontrado);
                    echo $i+1 . '_' . $longitud_text1 . '_' . (int)((($i+1)*100)/$longitud_text1) . '%' . PHP_EOL;
                }
            }
            $buscado = "";
        }
    }
    echo $i+1 . '_' . $longitud_text1 . '_' . (int)((($i+1)*100)/$longitud_text1) . '%' . PHP_EOL;
    $orden = [];
    foreach ($encontrados as $key => $value) {
        $orden[$key] = strlen($value);
    }
    asort($orden);
    $mayor_coincidencia = utf8_encode($encontrados[array_keys($orden, max($orden))[0]]);
    return [
        'encontrados' => $encontrados,
        'mayor coincidencia' => $mayor_coincidencia
    ];
}