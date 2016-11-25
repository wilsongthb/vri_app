<?php
include('../Clases/Convertir.php');
include('../Clases/Archivos.php');

/*
echo "<pre>";
echo system("ls");
*/
system("php convertir_todo_pdf ../PDFs ../TXTs >>respuesta.txt 2>>error.txt &");
/*
Convertir::PDFaTXT(
	Archivos::lista_archivos_f('../PDFs','.pdf')[2]['direccion'],
	'../TXTs'
);*/