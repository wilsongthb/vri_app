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

    devuelve la ruta de un archivo o carpeta que este en la carpeta <ruta>
    segun el <numero> de orden

    php cli_analisis.php "ruta" "carpeta"

    "ruta" de un archivo txt
    "carpeta" con varios txts

    el primer argumento de este script es la ruta de un archivo de texto que se analizara
    con todos los txt de la carpeta referida del segundo argumento "ruta"
    al final muestra un array con una lista de los indices con mayor semejansa al archivo txt


RESULTADOS
==========

    todos los valores devueltos de los scripts ejecutados en cli se guardan en respuesta.txt
    todos los errores del cli se guardan en error.txt