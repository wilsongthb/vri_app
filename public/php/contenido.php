<?php
require('Clases/Convertir.php');
exit(json_encode([
    'string' => Convertir::TXTaSTRING($_GET['ruta'])
]));