<?php
/*
    recibe dos rutas de archivos txt que luego compara y guarda los resultados en un txt
*/

//print_r($argv);
if(isset($argv[1]) AND isset($argv[2])){
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

    //analisis con similar_text
    $resultados_similartext = -1;
    $porcentaje_similartext = -1;
    if(array_search('similartext', $argv)){
        $resultados_similartext = similar_text($texto_1,$texto_2,$porcentaje_similartext);
    }

    //analizar con comparacion()
    $resultados_comparar = comparacion($texto_1, $texto_2, 20);

    $resultados_analisis = [
        'archivos comparados' => [
            [
                'nombre' => utf8_encode($argv[1]),
                'contenido' => utf8_encode($texto_1)
            ],
            [
                'nombre' => utf8_encode($argv[2]),
                'contenido' => utf8_encode($texto_2)
            ]
        ],
        'similar_text' => [
            $resultados_similartext,
            $porcentaje_similartext . "%"
        ],
        'comparacion' => $resultados_comparar
    ];

    $file = fopen("prueba.json", "w");
    fwrite($file, json_encode($resultados_analisis));
    fclose($file);

}else{
    echo "<pre>Este script no da respuesta web!";
}