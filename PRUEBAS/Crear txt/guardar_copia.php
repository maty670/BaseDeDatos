

<script type="text/javascript">
	
	var today = new Date();
	var time = 	today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+'__'+
				today.getHours() + "-" + today.getMinutes() + "-" + today.getSeconds();
	document.cookie = "fecha_actual=" + time;
</script>


<?php

if(isset($_POST['guardar'])){

	require_once("conexion2.php");
	$conexion=$base->query("SELECT * FROM `recepciones`");
	$registros=$conexion->fetchAll(PDO::FETCH_OBJ);


	$cantidad_registros = count($registros);
	$contador=1;
	$texto="INSERT INTO `recepciones` VALUES";
	foreach ($registros as $reg):
		$texto_linea = "('". $reg->UVT . "','" .
				 $reg->Convocatoria . "','" .
				 $reg->Año . "','" .
				 $reg->Codigo . "')";

		
		

		if($contador<$cantidad_registros){
			$contador++;
			$texto = $texto . $texto_linea . ",";
		}else{
			$texto = $texto . $texto_linea;
			$contador=1;
		}		

		$texto_linea="";
		
	endforeach;


	$fecha_actual = $_COOKIE["fecha_actual"];


	$myfile = fopen("archivos_copia/" . $fecha_actual .  ".txt", "w") or die("Unable to open file!");
	fwrite($myfile, $texto);
	fclose($myfile);
}
?>


