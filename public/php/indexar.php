<?php
require('cli/sanear_string.php');
require('cli/nce.php');

if(isset($_POST['direccion']) AND isset($_POST['nombre'])){
	$ruta = $_POST['direccion'];
	$nombre = $_POST['nombre'];
	if(substr($ruta,-3) === "txt"){
		$txt = file_get_contents($ruta);
		
		// $txt = sanear_string($txt);
		// $txt = sanear_string($txt);
		// $txt = limpiarString($txt);
		// $txt = mb_convert_encoding($txt, 'UTF-8');
		$txt = addslashes($txt);
		// $txt = utf8_encode($txt);


		$ruta = utf8_encode('/php/'.$ruta);
		$nombre = utf8_encode($nombre);

		$sql = "INSERT INTO `homestead`.`archivo` (`nombre`, `ruta`, `contenido`, `created_at`, `updated_at`) VALUES ('$nombre','$ruta','$txt', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";

		require('cn.php');
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