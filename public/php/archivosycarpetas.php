<?php
require('Clases/Archivos.php');

exit(json_encode(Archivos::lista($_GET['ruta'])));