<?php
/*
    Este script realiza un analisis del arhivo de texto
    referido con $argv[1]
    con todos los archivos de los $argv[n] que representan carpetas
*/
//print_r($argv);
if(isset($argv[1]) AND isset($argv[2])){

    //se requiere el script functions.php desde antes para evitar 
    //redundancia en la creacion de clases usadas para este script
    require_once('functions.php');

    //creando repositorio
    $repositorios = [
        Archivos::lista_archivos_f($argv[2],'.txt')
    ];
    $ruta_archivo_verificar = $argv[1];

    $resultados = [];

    $tiempo_inicio = microtime(true);
    $resultados_p = buscar($repositorios,$ruta_archivo_verificar, $resultados);
    $tiempo_fin = microtime(true);
    //$tiempo = bcsub($tiempo_fin, $tiempo_inicio, 4);
    $tiempo = intval($tiempo_fin - $tiempo_inicio);
    imprimir("Tiempo empleado: " . ($tiempo) . "s");

    print_r($resultados_p);
}else{
    echo "<pre>Este script no da respuesta web!";
}