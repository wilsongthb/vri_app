<?php
/*
    compara dos archivos de texto
    guarda el resultado en json
*/
//print_r($argv);
if(isset($argv[1]) AND isset($argv[2])){
    //se requiere el script functions.php desde antes para evitar 
    //redundancia en la creacion de clases usadas para este script

    require_once('functions.php');
    require_once('sanear_string.php');

    $texto_1 = file_get_contents($argv[1]);
    $texto_2 = file_get_contents($argv[2]);

    if(array_search('sc', $argv)){
        $texto_1 = str_replace([' ', chr(10), chr(96)], '', $texto_1);
        $texto_2 = str_replace([' ', chr(10), chr(96)], '', $texto_2);
    }
    if(array_search('sanear', $argv)){
        $texto_1 = sanear_string($texto_1);
        $texto_2 = sanear_string($texto_2);
    }

    print_r(comparacion_v3($texto_1, $texto_2, 100, true, true));
}else{
    echo "<pre>Este script no da respuesta web!";
}