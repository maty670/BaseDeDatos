<?php
	$UVT = $_GET["UVT"];
	include("conexion2.php");


	$borrarUVT=$base->query("DELETE FROM `recepciones` WHERE `UVT` LIKE '$UVT'");
	$borrarUVT2=$base->query("DELETE FROM `uvt` WHERE `uvt` LIKE '$UVT'");





	echo '<script>';
    echo 'window.location.href="index.php";';
    echo '</script>';
    
?>