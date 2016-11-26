<?php

/*

Este script php convierte todos los archivos php de la carpeta ../PDFs
en archivos txt y los mueve a la carpeta ../TXTs

no crear dos instancias de este proceso porque surgiran problemas de concurrencia
con los archivos creados

aun no se ha creado un metodo para abortar el proceso

guarda los resultados en:
 - respuesta.txt
 - error.txt

los datos escritos en estos archivos no se sobreescriben, se apilan

*/

include('../Clases/Convertir.php');
include('../Clases/Archivos.php');
system("php cli_convertir_todo_pdf.php ../PDFs ../TXTs >>respuesta.txt 2>>error.txt &");