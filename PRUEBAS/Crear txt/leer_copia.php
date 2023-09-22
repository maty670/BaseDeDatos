<?php 
if(isset($_POST['leer'])){
	$nombre_fichero = "archivos_copia/2023-1-29__20-6-13.txt";
	$gestor = fopen($nombre_fichero, "r");
	$contenido = fread($gestor, filesize($nombre_fichero));
	echo $contenido;
}

?>