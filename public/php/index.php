<pre>
<?php
if(!isset($_GET['ruta'])){
	$_GET['ruta'] = '.';
}
$ruta = $_GET['ruta'];
$list = scandir($ruta);

//paginacion
$total = count($list);
$por_pagina = 200;
$total_paginas = (int) ($total / $por_pagina);
if(!isset($_GET['page'])){
	$_GET['page'] = 0;
}
$pagina_actual = $_GET['page'];
$inicia_en = $pagina_actual * $por_pagina;

echo '----- F-_-SCANER : por Wilson Pilco Nuñez -------' . PHP_EOL;
echo PHP_EOL;
echo "<a href='?ruta=$ruta/..'>".htmlspecialchars("<-")."</a> | <a href='$ruta'>index</a> | <a href='$ruta/index.html'>html</a> | <a href='$ruta/index.php'>php</a>" . PHP_EOL;
echo PHP_EOL;
echo "total 			$total" . PHP_EOL;
echo "por pagina 		$por_pagina" . PHP_EOL;
echo "total paginas 		$total_paginas" . PHP_EOL;
echo "pagina actual 		$pagina_actual" . PHP_EOL;
echo "inicia en 		$inicia_en" . PHP_EOL;
echo PHP_EOL;
$n_a = [];

for($i = $inicia_en; $i < $por_pagina+$inicia_en; $i++){
	if(isset($list[$i]))
		$n_a[] = $list[$i];
}
$paginacion = [];
for($pagina = 0; $pagina < $total_paginas; $pagina++){
	$t_a = $pagina+1;
	$paginacion[] = "<a href='?ruta=$ruta&page=$pagina'>$t_a</a>";
}
$list = $n_a;
$links = [];
$carpetas = [];
$archivos = [];
foreach ($list as $item) {
	$n_ruta = $ruta . '/' . $item;
	if(is_dir($n_ruta)){
		$carpetas[] = [
			'ruta' => '?ruta=' . urlencode($n_ruta),
			'nombre' => '<span style="background-color: yellow">[c] ' . $item . '</span>'
		];
	}else{
		$archivos[] = [
			'ruta' => $n_ruta,
			'nombre' => '[a] ' . $item
		];
	}
}
$links = array_merge($carpetas, $archivos);
foreach ($links as $link) {
	$style = '';
	if($link['nombre'] == "[a] index.php" or $link['nombre'] == "[a] index.html"){
		$style = 'color:red';
	}
	echo "<a style='$style' href='$link[ruta]'>$link[nombre]</a>" . PHP_EOL; 
}
echo PHP_EOL;
$t_a = $pagina_actual+1;
echo "total: $total    $t_a de $total_paginas" . PHP_EOL;
foreach ($paginacion as $p) {
	echo "$p,";
}