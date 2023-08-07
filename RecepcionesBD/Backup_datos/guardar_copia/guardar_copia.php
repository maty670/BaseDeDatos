
<script type="text/javascript">

	function agregar_cero_fecha(dato){
		if (dato<=9 && dato >=1){
			return "0" + dato;
		}else{
			return dato;
		}

	}
	
	var date = new Date();

	var fecha_actual_archivo = agregar_cero_fecha(date.getDate()) + "-" + agregar_cero_fecha(date.getMonth()+1) + "-" + agregar_cero_fecha(date.getFullYear()) + ' ' +
			   agregar_cero_fecha(date.getHours()) + ":" + agregar_cero_fecha(date.getMinutes()) + ":" + agregar_cero_fecha(date.getSeconds());

	var fecha_actual_mysql = agregar_cero_fecha(date.getFullYear()) + "-" + agregar_cero_fecha(date.getMonth()+1) + "-" + agregar_cero_fecha(date.getDate()) + ' ' +
			   agregar_cero_fecha(date.getHours()) + ":" + agregar_cero_fecha(date.getMinutes()) + ":" + agregar_cero_fecha(date.getSeconds());



	document.cookie = "fecha_actual_archivo = " + fecha_actual_archivo;
	document.cookie = "fecha_actual_mysql = " + fecha_actual_mysql;

	
	
</script>







<?php

//********************************************************************************************************************************************
function getRecepciones(){
	require("../conexion2.php");
	$conexion=$base->query("SELECT * FROM `recepciones`");
	$registros=$conexion->fetchAll(PDO::FETCH_OBJ);

	$cantidad_registros = count($registros);
	$contador=1;
	$texto="";
	foreach ($registros as $reg):

		if($reg->UVT==""){$UVT = 'NULL';}else{$UVT = "'" . $reg->UVT . "'";}
		if($reg->Convocatoria==""){$Convocatoria = 'NULL';}else{$Convocatoria = "'" . $reg->Convocatoria . "'";}
		if($reg->Año==""){$Año = 'NULL';}else{$Año = $reg->Año;}
		if($reg->Codigo==""){$Codigo = 'NULL';}else{$Codigo = "'" . $reg->Codigo . "'";}
		if($reg->Director==""){$Director = 'NULL';}else{$Director = "'" . $reg->Director . "'";}
		if($reg->Monto_Otorgado==""){$Monto_Otorgado = 'NULL';}else{$Monto_Otorgado = "'" . $reg->Monto_Otorgado . "'";}
		if($reg->Fecha_Pago==""){$Fecha_Pago = 'NULL';}else{$Fecha_Pago = "'" . $reg->Fecha_Pago . "'";}
		if($reg->Fecha_Vencimiento==""){$Fecha_Vencimiento = 'NULL';}else{$Fecha_Vencimiento = "'" . $reg->Fecha_Vencimiento . "'";}
		if($reg->Duracion==""){$Duracion = 'NULL';}else{$Duracion = $reg->Duracion;}
		if($reg->Inicio==""){$Inicio = 'NULL';}else{$Inicio = "'" . $reg->Inicio . "'";}

		if($reg->R1==""){$R1 = 'NULL';}else{$R1 = "'" . $reg->R1 . "'";}
		if($reg->R2==""){$R2 = 'NULL';}else{$R2 = "'" . $reg->R2 . "'";}
		if($reg->R3==""){$R3 = 'NULL';}else{$R3 = "'" . $reg->R3 . "'";}
		if($reg->R4==""){$R4 = 'NULL';}else{$R4 = "'" . $reg->R4 . "'";}
		if($reg->R5==""){$R5 = 'NULL';}else{$R5 = "'" . $reg->R5 . "'";}
		if($reg->R6==""){$R6 = 'NULL';}else{$R6 = "'" . $reg->R6 . "'";}
		if($reg->R7==""){$R7 = 'NULL';}else{$R7 = "'" . $reg->R7 . "'";}
		if($reg->R8==""){$R8 = 'NULL';}else{$R8 = "'" . $reg->R8 . "'";}
		if($reg->R9==""){$R9 = 'NULL';}else{$R9 = "'" . $reg->R9 . "'";}
		if($reg->I1==""){$I1 = 'NULL';}else{$I1 = $reg->I1;}
		if($reg->I2==""){$I2 = 'NULL';}else{$I2 = $reg->I2;}
		if($reg->I3==""){$I3 = 'NULL';}else{$I3 = $reg->I3;}
		if($reg->I4==""){$I4 = 'NULL';}else{$I4 = $reg->I4;}
		if($reg->I5==""){$I5 = 'NULL';}else{$I5 = $reg->I5;}
		if($reg->I6==""){$I6 = 'NULL';}else{$I6 = $reg->I6;}
		if($reg->I7==""){$I7 = 'NULL';}else{$I7 = $reg->I7;}
		if($reg->I8==""){$I8 = 'NULL';}else{$I8 = $reg->I8;}
		if($reg->I9==""){$I9 = 'NULL';}else{$I9 = $reg->I9;}

		
		if($reg->Fecha_Intimacion==""){$Fecha_Intimacion = 'NULL';}else{$Fecha_Intimacion = "'" . $reg->Fecha_Intimacion . "'";}
		if($reg->Observacion==""){$Observacion = 'NULL';}else{$Observacion = "'" . $reg->Observacion . "'";}
		if($reg->Presento_Final==""){$Presento_Final = 'NULL';}else{$Presento_Final = "'" . $reg->Presento_Final . "'";}
		if($reg->Periodo==""){$Periodo = 'NULL';}else{$Periodo = "'" . $reg->Periodo . "'";}
		if($reg->Expte_Pago==""){$Expte_Pago = 'NULL';}else{$Expte_Pago = "'" . $reg->Expte_Pago . "'";}
		if($reg->Resol_Pago==""){$Resol_Pago = 'NULL';}else{$Resol_Pago = "'" . $reg->Resol_Pago . "'";}
		if($reg->Expte_Rend==""){$Expte_Rend = 'NULL';}else{$Expte_Rend = "'" . $reg->Expte_Rend . "'";}
		if($reg->Pase_DGA==""){$Pase_DGA = 'NULL';}else{$Pase_DGA = "'" . $reg->Pase_DGA . "'";}
		if($reg->Visible==""){$Visible = 'NULL';}else{$Visible = $reg->Visible;}

		$texto_linea = "(". $UVT . "," .
				 $Convocatoria . "," .
				 $Año . "," .
				 $Codigo . "," .
				 $Director . "," .
				 $Monto_Otorgado . "," .
				 $Fecha_Pago . "," .
				 $Fecha_Vencimiento . "," .
				 $Duracion . "," .
				 $Inicio . "," .

				 $R1 . "," .
				 $I1 . "," .
				 $R2 . "," .
				 $I2 . "," .
				 $R3 . "," .
				 $I3 . "," .
				 $R4 . "," .
				 $I4 . "," .
				 $R5 . "," .
				 $I5 . "," .
				 $R6 . "," .
				 $I6 . "," .
				 $R7 . "," .
				 $I7 . "," .
				 $R8 . "," .
				 $I8 . "," .
				 $R9 . "," .
				 $I9 . "," .

				 $Fecha_Intimacion . "," .
				 $Observacion . "," .
				 $Presento_Final . "," .
				 $Periodo . "," .
				 $Expte_Pago . "," .
				 $Resol_Pago . "," .
				 $Expte_Rend . "," .
				 $Pase_DGA . "," .
				 $Visible . ")";

		
		

		if($contador<$cantidad_registros){
			$contador++;
			$texto = $texto . $texto_linea . ",";
		}else{
			$texto = $texto . $texto_linea . ";";	//Ultima fila del INSERT
			$contador=1;
		}		

		$texto_linea="";
		
	endforeach;

	return $texto;
}
//********************************************************************************************************************************************







//********************************************************************************************************************************************
function getUVTs(){

	require("../conexion2.php");
	$conexion=$base->query("SELECT * FROM `uvt`");
	$registros=$conexion->fetchAll(PDO::FETCH_OBJ);

	$cantidad_registros = count($registros);
	$contador=1;
	$texto="INSERT INTO `uvt` VALUES";
	foreach ($registros as $reg):

		if($reg->uvt==""){$UVT = 'NULL';}else{$UVT = "'" . $reg->uvt . "'";}
		if($reg->Fecha_Creacion==""){$Fecha_Creacion = 'NULL';}else{$Fecha_Creacion = "'" . $reg->Fecha_Creacion . "'";}

		$texto_linea = "(". $UVT . "," .
				 			$Fecha_Creacion . ")";

		if($contador<$cantidad_registros){
			$contador++;
			$texto = $texto . $texto_linea . ",";
		}else{
			$texto = $texto . $texto_linea . ";";
			$contador=1;
		}		

		$texto_linea="";


	endforeach;

	return $texto;
}

//********************************************************************************************************************************************





	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$fecha_actual_archivo = date("d-m-Y__h-i-s", strtotime('+1 hours'));
	$fecha_actual_mysql = date("Y-m-d h:i:s", strtotime('+1 hours'));


	$titulo_backup = $_GET['t'];





	include($_SERVER["DOCUMENT_ROOT"] . "/BaseDeDatos/RecepcionesBD/conexion2.php");
	$conexion_UVT = $base->query("SELECT `uvt` from `uvt` ORDER BY `uvt`");
	$conexion_convocatorias = $base->query("SELECT `Convocatoria`,`Año` FROM `recepciones`GROUP BY `Convocatoria`,`Año` ORDER BY `Convocatoria`,`Año`");
	$conexion_cantidad_proyectos = $base->query("SELECT COUNT(*) AS cantidad_proyectos FROM `recepciones`");

	//require("../conexion2.php");
	
	


	



	$registros_UVT = $conexion_UVT->fetchAll(PDO::FETCH_OBJ);
	$registros_convocatorias = $conexion_convocatorias->fetchAll(PDO::FETCH_OBJ);
	$registros_cantidad_proyectos = $conexion_cantidad_proyectos->fetchAll(PDO::FETCH_OBJ);

	$str_UVT="";
	foreach ($registros_UVT as $r):
		if($str_UVT==""){
			$str_UVT =  $r->uvt;
		}else{
			$str_UVT = $str_UVT . "," . $r->uvt;
		}
	endforeach;

	$str_convocatorias="";
	foreach ($registros_convocatorias as $r):
		if($str_convocatorias==""){
			$str_convocatorias =  $r->Convocatoria . " " . $r->Año;
		}else{
			$str_convocatorias = $str_convocatorias . "," . $r->Convocatoria . " " . $r->Año;
		}
	endforeach;


	$cantidad_proyectos = $registros_cantidad_proyectos[0]->cantidad_proyectos;


	$conexion = $base->query("INSERT INTO `registros_backups` VALUES (NULL,'$fecha_actual_archivo','$str_UVT','$str_convocatorias','$cantidad_proyectos','$titulo_backup','$fecha_actual_mysql')");




	

	$datos_recepciones = getRecepciones();
	$datos_uvts = getUVTs();

	$myfile = fopen("../archivos/" . $fecha_actual_archivo .  ".txt", "w") or die("Unable to open file!");
	fwrite($myfile, $datos_recepciones);
	fwrite($myfile, $datos_uvts);
	fclose($myfile);

	header("location: ../index.php");


?>


