<?php
	include("conexion.php");
	$Id=$_GET["Id"];
	$Nombre=$_GET["Nombre"];
	$CUIL=$_GET["CUIL"];
	$orden=$_GET["orden"];
	$f1=$_GET["f1"];
	$palabra=$_GET["palabra"];



	$base->query("DELETE FROM evaluadores WHERE Id='$Id'");
	

	?>


<script type="text/javascript">
var CUIL = <?php echo json_encode($CUIL); ?>;
var Nombre = <?php echo json_encode($Nombre); ?>;
var orden = <?php echo json_encode($orden); ?>; 
var f1 = <?php echo json_encode($f1); ?>; 
var palabra = <?php echo json_encode($palabra); ?>;  


	var retVal = confirm("Borrar todas las evaluaciones hechas por el evaluador: " + Nombre + "?");
	if(retVal){
		alert("Se borro al evaluador " + Nombre + " y todas sus evaluaciones");
		window.location.href = "borrar_evaluaciones.php?CUIL="+CUIL+
								"&orden="+orden+
								"&f1="+f1+
								"&palabra="+palabra;
	}else{
		alert("Se borro al evaluador " + Nombre);
		window.location.href = "index.php?orden="+orden+
								"&f1="+f1+
								"&palabra="+palabra;
	}  

</script>



