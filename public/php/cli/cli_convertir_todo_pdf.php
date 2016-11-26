<?php
//print_r($argv);
if(isset($argv[1]) AND isset($argv[2])){
    include('../Clases/Convertir.php');
    $ruta = $argv[1];
    $destino = $argv[2];
    Convertir::TodoPDFaTXT($ruta, $destino);
}else{
    echo "<pre>Este script no da respuesta web!";
}