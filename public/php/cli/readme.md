MANUAL CLI - VRI DETECCION PLAGIO EN TESIS UNAP
===============================================

COMANDOS
========
    php convertir_todo_pdf <ruta> <destino>

    Convierte todos los archivos PDF de la carpeta <ruta> a TXT y los mueve a la carpeta <destino>
    estas rutas se resuelven desde la ubicacion de la carpeta actual
    USADO PARA CCONVERTIR TODOS LOS ARCHIVOS PDF DE LA CARPETA PDFs A TXT
    /opt/lampp/bin/php convertir "../PDFs" "../TXTs" >>convertir.txt 2>>error.txt &
    la primera parte es la ruta absoluta del binario de php, reemplazar de ser necesario con php o /usr/bin/php



    php file <ruta> <numero>

    devuelve la ruta de un archivo o carpeta que este en la carpeta <ruta>
    segun el <numero> de orden
