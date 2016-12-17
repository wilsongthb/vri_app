<?php
//require('Clases/Archivos.php');
require('Clases/Convertir.php');

$ruta = $_GET['ruta'];
$nombre = $last = substr(strrchr($ruta, '/'), 1 );

$txt = addslashes(Convertir::TXTaSTRING($ruta));
//$txt = file_get_contents($ruta);

$sql = "INSERT INTO `homestead`.`archivo` (`nombre`, `ruta`, `contenido`, `grupo_id`, `created_at`, `updated_at`) VALUES (
	'$nombre', 
	'$ruta', 
	'$txt', 
	1, 
	'2016-12-13 23:03:05', 
	'2016-12-13 23:03:05');";

$cn = new mysqli('localhost', 'root', 'root', 'homestead');
$cn->query($sql);
echo json_encode([
	'error' => $cn->error,
	'sql' => utf8_encode($sql)
]);