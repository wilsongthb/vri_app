<?php
require('Clases/Archivos.php');
$lista = new Archivos($_GET['src']);
echo json_encode($lista->lista);