<pre>
<?php

$php = "/opt/lampp/bin/php";
//$comando = "$php convertir.php ../PDFs ../TXTs >>respuesta.txt 2>>error.txt &";
//$comando = "$php convertir.php";
//$comando = "$php -v";
$comando = "pdftotext -v >>respuesta.txt 2>>error.txt";

system($comando);

//echo "comando realizado";

//system('/opt/lampp/bin/php convertir "../PDFs" "../TXTs" >> r/s 2>> r/e &');