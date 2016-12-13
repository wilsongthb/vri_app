<?php
function comparacion_v2($texto1, $texto2, $minimo = 10){
    /*
        compara dos strings, devuelve una cadena con las partes iguales
    */
    $vars = [
        'respuesta' => [],
        'longitud_texto1' => strlen($texto1)
    ];

    for ($i=0; $i < $vars['longitud_texto1']; $i++) {

        $vars['contador'] = $i;
        $vars['buscado'] = $texto1[$vars['contador']];

        $vars['posicion_coincidencia'] = stripos($texto2, $vars['buscado']);
        // $vars['ultimo_encuentro'] = $vars['buscado'];
        while($vars['posicion_coincidencia']){
            $vars['ultimo_encuentro'] = $vars['buscado'];
            $vars['contador']++;
            if($vars['contador'] < $vars['longitud_texto1']){
                $vars['buscado'] .= $texto1[$vars['contador']];
            }else{
                break;
            }
            $vars['posicion_coincidencia'] = stripos($texto2, $vars['buscado']);
        }
        
        # minimo
        if(isset($vars['ultimo_encuentro'])){
            if(strlen($vars['ultimo_encuentro'])+1 > $minimo){
                $longitud_respuesta = count($vars['respuesta']);
                if($longitud_respuesta > 0){
                    if(!stripos($vars['respuesta'][$longitud_respuesta-1], $vars['ultimo_encuentro'])){
                        $vars['respuesta'][] = $vars['ultimo_encuentro'];
                    }
                }else{
                    // la primera vez solo se inserta la primera frase encontrada
                    $vars['respuesta'][] = $vars['ultimo_encuentro'];
                }
            }
        }
    }

    return $vars['respuesta'];
}
print_r(comparacion_v2("hola mundo esternocleidomastoideo", "gola facundo esternocleidomastoideo", 1));