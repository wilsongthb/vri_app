MANUAL CLI - VRI DETECCION PLAGIO EN TESIS UNAP
===============================================

***RECOMENDACION: ESTE ARCHIVO ES UN MANUAL PARA EL DESARROLLADOR, DEBE OMITIR ESTE ARCHIVO CUANDO LA APLICACION PASE A SER DE PRODUCCION*** 

COMANDOS
========
    php cli_convertir_todo_pdf.php "ruta" "destino"

Convierte todos los archivos PDF de la carpeta <ruta> a TXT y los mueve a la carpeta <destino>
estas rutas se resuelven desde la ubicacion de la carpeta actual
USADO PARA CCONVERTIR TODOS LOS ARCHIVOS PDF DE LA CARPETA PDFs A TXT
/opt/lampp/bin/php convertir "../PDFs" "../TXTs" >>convertir.txt 2>>error.txt &
la primera parte es la ruta absoluta del binario de php, reemplazar de ser necesario con php o /usr/bin/php



    php cli_file.php "ruta" "numero"

devuelve la ruta de un archivo o carpeta que este en la carpeta "ruta" segun el "numero" de orden

    php cli_analisis.php "ruta" "carpeta"

"ruta" de un archivo txt
"carpeta" con varios txts

El primer argumento de este script es la ruta de un archivo de texto que se analizara
con todos los txt de la carpeta referida del segundo argumento "ruta"
al final muestra un array con una lista de los indices con mayor semejansa al archivo txt

    php cli_comparacion.php "ruta1" "ruta2" int_tolerancia [... argumentos adicionales ...]

int_tolerancia : es la longitud minima de la porcion que sera considerada como copia para ser registrado en los resultados ejm: si pones como valor 1, se guardaran como minimo frases de longitud 1 como letras individuales

Este script permite compara dos archivos de texto caracter por caracter para encontrar la cadena plagiada
tiene agumentos adicionales como:
 - sanear : eliminar caracteres especiales de los textos antes de ser comparados
 - similartext : incluye la comparacion con similartext implementado en el estandar de php, para obtener el porcentaje de parecido
 - sc : (sincomodines) elimina espacios, saltos de linea y tabulaciones de los textos antes de ser comparados
 - no-contenido : no devuelve el contenido de los strings evaluados con comparar()
 - utf-8 : codificar los textos en utf-8, nota: al finalizar predeterminadamente codifica los textos para poder convertirlos a formato json

los cambios hechos antes de comparar no se guardan en los archivos de texto, pero si se incluyen en la respuesta del script

los resultados se guardan en prueba.json

RESULTADOS
==========

    todos los valores devueltos de los scripts ejecutados en cli se guardan en respuesta.txt
    todos los errores del cli se guardan en error.txt