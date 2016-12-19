<?php
$aviso = '';
$cn = new mysqli('localhost', 'root', 'root', 'homestead');
/* verificar la conexión */
if (cn_connect_errno()) {
    $aviso .= '\tFalló la conexión: '. cn_connect_error();
    exit();
}
$aviso .= '\tConjunto de caracteres inicial: '. $cn->character_set_name();

/* cambiar el conjunto de caracteres a utf8 */
if (!$cn->set_charset("utf8")) {
    $aviso .= '\tError cargando el conjunto de caracteres utf8: '. $cn->error;
    exit();
} else {
    $aviso .= '\tConjunto de caracteres actual: '. $cn->character_set_name();
}