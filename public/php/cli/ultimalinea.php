<?php
/*devuelve un response html que muestra la ultima linea escrita en respuesta.txt*/

$fichero = "respuesta.txt";
$filas = file($fichero);
$ultima_linea = count($filas);
$ultima_linea_escritura = $filas[$ultima_linea-1];
echo "Aqui esta:<br>";
echo "$ultima_linea_escritura";
?>