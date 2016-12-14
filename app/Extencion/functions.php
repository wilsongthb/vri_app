<?php
/*
    Estas funcions estan definidas solo para la aplicacion class_implements
    no estan preparadas para ser usadas para la web

    aun no se a comprobado la seguridad de las funciones
    aun no se ha comprobado errores de las funciones
*/
function comparacion_v3($texto1, $texto2, $minimo = 10, $detalles = false, $salto = false){
    /*
        compara dos strings, devuelve una cadena con las partes iguales
    */
    $resultados = [];
    $longitud_texto1 = strlen($texto1);

    for ($i=0; $i < $longitud_texto1-$minimo; $i++) {

        $contador = $i+$minimo;
        $buscado = substr($texto1, $i, $minimo);
        $posicion_coincidencia = stripos($texto2, $buscado);

        if($posicion_coincidencia === false){
            continue;
        }

        if($detalles){
            echo "$i de $longitud_texto1 // encontrados : ".count($resultados)." //\nbuscado: $buscado // ";var_dump($posicion_coincidencia);
        }

        while($posicion_coincidencia !== false and $contador < $longitud_texto1){
            $ultimo_encontrado = $buscado;
            $buscado .= $texto1[$contador];
            $posicion_coincidencia = stripos($texto2, $buscado);
            $contador++;
        }

        if(isset($ultimo_encontrado)){
            $longitud_resultados = count($resultados);
            if($longitud_resultados > 0){
                if(stripos($resultados[$longitud_resultados-1], $ultimo_encontrado) === false){
                    $resultados[] = $ultimo_encontrado;
                }
            }else
                $resultados[] = $ultimo_encontrado;
        }
        if($salto) $i = $contador;
    }
    return $resultados;
}