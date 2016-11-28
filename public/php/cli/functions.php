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
    /*
    for ($i=0; $i < strlen($text1); $i++) { 
        //echo $text1[$i] . "...";
        
        while(stripos($text2, $buscado) !== false){
            $ultimo_encontrado = $buscado;
            //echo "se encontro $buscado\n";
            //$ultimo_encontrado .= $buscado;
            $buscado .= $text1[$i]; 
        }
    }
    echo "Ultimo encontrado: $ultimo_encontrado\n";*/
    for ($i=0; $i < strlen($text1); $i++) {
        $buscado .=  $text1[$i];
        $posicion = stripos($text2, $buscado);
        if($posicion !== false){
            //echo "s";
            $ultimo_encontrado = $buscado;
        }else{
            //echo "n";
            if(strlen($ultimo_encontrado) > $minimo){
                $encontrados[] = $ultimo_encontrado;
            }
            $buscado = "";
        }
    }
    $orden = [];
    foreach ($encontrados as $key => $value) {
        $orden[$key] = strlen($value);
    }
    asort($orden);
    $mayor_coincidencia = $encontrados[array_keys($orden, max($orden))[0]];
    return [
        'encontrados' => $encontrados,
        'mayor coincidnecia' => $mayor_coincidencia
    ];
}