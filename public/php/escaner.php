<?php
require('Clases/Archivos.php');

if(isset($_GET['rutas'])){
    $lista = new Archivos($_GET['src']);
    $ruta = "";$rutas = [];$src = explode("/", $_GET['src']);
    foreach ($src as $carpeta) {
        if(strlen($carpeta) != '0'){
            $ruta .= $carpeta . "/";
            $rutas[] = [
                'nombre' => $carpeta,
                'direccion' => $ruta
            ];
        }
    }
    exit(json_encode([
        'archivos' => $lista->lista['archivos'],
        'carpetas' => $lista->lista['carpetas'],
        'rutas' => $rutas
    ]));
}


$lista = new Archivos($_GET['src']);
echo json_encode($lista->lista);