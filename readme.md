/readme.md

APLICACION DEL VRI DETECCIÓN DE PLAGIO EN TESIS DE LA UNIVERSIDAD NACIONAL DEL ALTIPLANO
------------------------------------------------------------------------

**Tecnologias usadas**
- laravel
 - Vue JS 2
 - Angular - No confirmado -
 - MySQL


**Requisitos**
- PHP 5.6 ^
- MySQL o MariaDB
- navegador compatible con ECMAScript5 ^
- composer (para los componentes de laravel)
- npm (para gulp)
- gulp (para empaquetar los sass y js)

**Descripcion**
La aplicacion tiene dos partes fundamentales, la parte de indexacion y la de busqueda/reportes

- Indexacion
La parte de indexacion consierne a todo el proceso que se hace para que las fuentes de informacion (paginas web, PDFs, TXTs, y otros) puedan ser revisados por la aplicacion de manera rapida y uniforme, para que la busqueda y craecion de reportes sea mas sencilla.

- Busqueda/Reportes
Esta parte se encarga de buscar las coincidencias y posibles partes plagiadas de un documento (tesis, informe, otro tipo de documento), y crear un reporte detallado de los posibles documentos plagiados.

**las rutas para la aplicacion son**

    /vri
    /vri/indexacion
    /vri/busqueda
para mas detalles revise `/routes/web.php`