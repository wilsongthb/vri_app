<?php
require('Clases/Archivos.php');

echo utf8_encode(file_get_contents(Archivos::lista('src')['archivos'][1]['direccion']));