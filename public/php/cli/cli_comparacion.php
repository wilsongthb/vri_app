<?php
/*
    recibe dos rutas de archivos txt que luego compara y guarda los resultados en un txt
*/

print_r($argv);
if(isset($argv[1]) AND isset($argv[2])){
    require_once('functions.php');

    $texto_1 = file_get_contents($argv[1]);
    $texto_2 = file_get_contents($argv[2]);
    
    //analisis con similar_text
    echo $resultados_similartext = similar_text($texto_1,$texto_2,$porcentaje_similartext);
    echo $resultados_levenshtein = levenshtein($texto_1,$texto_2);



    print_r([
        'similar_text' => [
            $resultados_similartext,
            $porcentaje_similartext . "%"
        ],
        'levenshtein' => [
            $resultados_levenshtein
        ]
    ]);
}else{
    echo "<pre>Este script no da respuesta web!";
}