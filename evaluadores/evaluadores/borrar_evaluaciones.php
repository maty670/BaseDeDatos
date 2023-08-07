<?php
	include("conexion.php");
	$CUIL=$_GET["CUIL"];
	$orden=$_GET["orden"];
	$f1=$_GET["f1"];
	$palabra=$_GET["palabra"];



	$base->query("DELETE FROM evaluaciones WHERE CUIL='$CUIL'");
	
	header("Location:index.php ?orden=$orden &f1=$f1 &palabra=$palabra");
?>





