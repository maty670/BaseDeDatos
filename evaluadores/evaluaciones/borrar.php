<?php
	include("conexion.php");
	$Id=$_GET["Id"];
	$orden=$_GET["orden"];
	$f1=$_GET["f1"];
	$palabra=$_GET["palabra"];
	$filtro_conv=$_GET["filtro_conv"];


	$base->query("DELETE FROM evaluaciones WHERE Id='$Id'");
	header("Location:index.php ?orden=$orden &f1=$f1 &palabra=$palabra&filtro_conv=$filtro_conv&c1=Convocatoria");
?>




