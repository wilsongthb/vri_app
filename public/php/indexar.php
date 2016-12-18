<?php
require('cli/sanear_string.php');

if(isset($_POST['direccion']) AND isset($_POST['nombre'])){
	$ruta = $_POST['direccion'];
	$nombre = $_POST['nombre'];
	if(substr($ruta,-3) === "txt"){
		$txt = file_get_contents($ruta);
		$txt = sanear_string($txt);
		$txt = utf8_encode($txt);
		$ruta = '/php/'.$ruta;
		$sql = "INSERT INTO `homestead`.`archivo` (`nombre`, `ruta`, `contenido`, `grupo_id`, `created_at`, `updated_at`)
				VALUES ('$nombre','$ruta','$txt',1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";

		$cn = new mysqli('localhost', 'root', 'root', 'homestead');
		$cn->query($sql);
		echo json_encode([
			'params' => $_POST,
			'error' => $cn->error,
			// 'sql' => utf8_encode($sql)
		]);
	}else{
		echo json_encode(['error' => 'No se puede indexar este archivo!']);
	}
}