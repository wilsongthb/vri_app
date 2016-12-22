<?php
/*
    Estas funcions estan definidas solo para la aplicacion class_implements
    no estan preparadas para ser usadas para la web

    aun no se a comprobado la seguridad de las funciones
    aun no se ha comprobado casos especiales en las funciones
*/

// require('../Clases/Archivos.php');
// require('../Clases/Convertir.php');

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
function comparacion_v1($text1, $text2, $minimo = 10, $detalles = false){
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
                if(array_search($ultimo_encontrado, $encontrados) === false){
                    $encontrados[] = $ultimo_encontrado;
                    if($detalles) echo $i+1 . '_' . $longitud_text1 . '_' . (int)((($i+1)*100)/$longitud_text1) . '%' . PHP_EOL;
                }
            }
            $buscado = "";
        }
    }
    return $encontrados;
}

function comparacion_v2($texto1, $texto2, $minimo = 10, $detalles = false){
    /*
        compara dos strings, devuelve un array con las partes iguales
    */
    $vars = [
        'respuesta' => [],
        'longitud_texto1' => strlen($texto1)
    ];

    for ($i=0; $i < $vars['longitud_texto1']; $i++) {
        $vars['contador'] = $i+$minimo;
        $vars['buscado'] = substr($texto1, $i, $minimo);

        $vars['posicion_coincidencia'] = stripos($texto2, $vars['buscado']);

        if($vars['posicion_coincidencia'] === false){
            continue;
        }

        if($detalles){
            echo $i . "\tde\t" . $vars['longitud_texto1'] . PHP_EOL;  
        }

        while($vars['posicion_coincidencia'] !== false){
            $vars['ultimo_encuentro'] = $vars['buscado'];
            $vars['contador']++;
            if($vars['contador'] < $vars['longitud_texto1']){
                // $vars['buscado'] .= substr($texto1, $vars['contador'], $minimo);
                $vars['buscado'] .= $texto1[$vars['contador']];
            }else{
                break;
            }
            $vars['posicion_coincidencia'] = stripos($texto2, $vars['buscado']);
        }
        
        # minimo
        if(isset($vars['ultimo_encuentro'])){
            if(array_search($vars['ultimo_encuentro'], $vars['respuesta']) === false){
                if(strlen($vars['ultimo_encuentro'])+1 > $minimo){
                    $longitud_respuesta = count($vars['respuesta']);
                    if($longitud_respuesta > 0){
                        if(stripos($vars['respuesta'][$longitud_respuesta-1], $vars['ultimo_encuentro']) === false){
                            $vars['respuesta'][] = $vars['ultimo_encuentro'];
                        }
                    }else{
                        // la primera vez solo se inserta la primera frase encontrada
                        $vars['respuesta'][] = $vars['ultimo_encuentro'];
                    }
                }
            }

        }
    }

    return $vars['respuesta'];
}
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