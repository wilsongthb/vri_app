<?php
//require('Clases/Archivos.php');
require('Clases/Convertir.php');

$ruta = $_GET['ruta'];
$nombre = $last = substr(strrchr($ruta, '/'), 1 );

$txt = addslashes(Convertir::TXTaSTRING($ruta));
//$txt = file_get_contents($ruta);

$sql = "INSERT INTO `5_3`.`archivo` (`nombre`, `ruta`, `contenido`, `grupo_id`, `created_at`, `updated_at`) VALUES (
	'$nombre', 
	'$ruta', 
	'$txt', 
	1, 
	'SYSDATE()', 
	'SYSDATE()');";

$cn = new mysqli('localhost', 'root', '', '5_3');
$cn->query($sql);
echo json_encode([
	'error' => $cn->error
]);