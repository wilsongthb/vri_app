<?php
//print_r($argv);
if(isset($argv[1]) AND isset($argv[2])){
    require('../Clases/Archivos.php');
    echo Archivos::lista_c($argv[1])['archivos'][$argv[2]]['direccion'] . PHP_EOL;
}else{
    echo "<pre>Este script no da respuesta web!";
}