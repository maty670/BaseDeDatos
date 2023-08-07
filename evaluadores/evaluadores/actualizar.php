<!DOCTYPE html>
<html>
<head>
	<title>Actualizar</title>
	<link rel="stylesheet" type="text/css" href="evaluadores.css">
	<script src="https://kit.fontawesome.com/8e82b560a5.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
</head>
<body background='/BD/Recursos/fondo.jpg' >


<?php

	$orden=$_GET['orden'];
	$f1=$_GET['f1'];
	$palabra=$_GET['palabra'];


	if(isset($_POST['bot_cancelar'])){
	header("Location:index.php ?orden=$orden &f1=$f1 &palabra=$palabra");
	}

	

	if(!isset($_POST['bot_actualizar'])){
		include("conexion.php");
		$Id=$_GET["Id"];

		$conexion=$base->query("SELECT * FROM evaluadores WHERE `Id` like $Id");
		$registros=$conexion->fetchAll(PDO::FETCH_OBJ);



		foreach($registros as $evaluacion):
			$Nombre=$evaluacion->Nombre;
			$MAIL=$evaluacion->MAIL;
			$CUIL=$evaluacion->CUIL;
			$Telefono=$evaluacion->Telefono;
			$Institucion=$evaluacion->Institucion;
			$Ciudad_Provincia=$evaluacion->Ciudad_Provincia;
			$Perfil_Especialidad=$evaluacion->Perfil_Especialidad;
			$MiniBio=$evaluacion->MiniBio;
			$CV=$evaluacion->CV;
			$CV_Online=$evaluacion->CV_Online;


			$CUIL_ANT=$CUIL;  /*CUIL ANTIGUO PARA ACTUALIZAR EN TODAS LAS EVALUACIONES*/
			endforeach;

	}else{	
	$Id=$_POST["id"];
	$Nombre=$_POST["nombre"];
	$CUIL=$_POST["cuil"];
	$MAIL=$_POST["mail"];
	$Telefono=$_POST["telefono"];
	$Institucion=$_POST["institucion"];
	$Ciudad_Provincia=$_POST["ciudad_provincia"];
	$Perfil_Especialidad=$_POST["perfil_especialidad"];
	$MiniBio=$_POST["minibio"];
	$CV=$_POST["CV"];
	$CV_Online=$_POST["CV_online"];

	
	include("conexion.php");
	/*Consultar si ya existe un CUIL cargado al momento de insertar*/
	$conexion=$base->query("SELECT EXISTS(
							SELECT *
							FROM `evaluadores`
							WHERE `CUIL` =  '$CUIL' AND NOT `Id` =  '$Id') AS S");
	$registros=$conexion->fetchAll(PDO::FETCH_OBJ);

	foreach($registros as $persona):
	endforeach;


	if ($persona->S==1) {
		echo '<script>
		alert("No se puede actualizar debido a que ya existe un evaluador con ese cuil")
		</script>';
	}else{
		$base->query("UPDATE evaluadores SET Nombre='$Nombre',
											 MAIL='$MAIL',
											 Telefono='$Telefono',
											 CUIL='$CUIL',
											 Institucion='$Institucion',
											 Ciudad_Provincia='$Ciudad_Provincia',
											 Perfil_Especialidad='$Perfil_Especialidad',
											 MiniBio='$MiniBio',
											 CV='$CV',
											 CV_Online='$CV_Online'
											 WHERE Id='$Id'");

		/*Se actualiza tambien el nombre y cuil del evaluador en todas las evaluaciones que aparece ese cuil*/
		$base->query("UPDATE evaluaciones SET Nombre='$Nombre',
											 CUIL='$CUIL'
											 WHERE CUIL='$CUIL_ANT'");

		header("Location:index.php ?orden=$orden &f1=$f1 &palabra=$palabra");
	}
}
?>




	<div class="tabla-evaluadores">
		<form name="form1" method="post" action="">
			<table align="center">
				<tr>
				<td class="titulos">Id</td>
				<td class="titulos">Nombre</td>
				<td class="titulos">CUIL</td>
				<td class="titulos">MAIL</td>
				<td class="titulos">Telefono</td>
				<td class="titulos">Institucion</td>
				<td class="titulos">Ciudad/Provincia</td>
				<td class="titulos">Perfil/Especialidad</td>
				<td class="titulos">Minibio</td>
				<td class="titulos">CV</td>
				<td class="titulos">CV_Online</td>
				</tr>

				<tr>
					
					<td class="filas-actualizar"><textarea class="input" type="text" readonly name="id"><?php echo $Id;?></textarea></td>
				    <td class="filas-actualizar"><textarea class="input" type='text' name='nombre'><?php echo $Nombre;?></textarea></td>
				    <td class="filas-actualizar"><textarea class="input" type='text' name='cuil'><?php echo $CUIL;?></textarea></td>
	     		    <td class="filas-actualizar"><textarea class="input" type='text' name='mail'><?php echo $MAIL;?></textarea></td>
	     		    <td class="filas-actualizar"><textarea class="input" type='text' name='telefono'><?php echo $Telefono;?></textarea></td>
				    <td class="filas-actualizar"><textarea class="input" type='text' name='institucion'><?php echo $Institucion;?></textarea></td>
					<td class="filas-actualizar"><textarea class="input" type='text' name='ciudad_provincia'><?php echo $Ciudad_Provincia;?></textarea></td>
					<td class="filas-actualizar"><textarea class="input" type='text' name='perfil_especialidad'><?php echo $Perfil_Especialidad;?></textarea></td>
					<td class="filas-actualizar"><textarea class="input" type='text' name='minibio'><?php echo $MiniBio;?></textarea></td>
					<td class="filas-actualizar"><textarea class="input" type='text' name='CV'><?php echo $CV;?></textarea></td>
					<td class="filas-actualizar"><textarea class="input" type='text' name='CV_online'><?php echo $CV_Online;?></textarea></td>




				</tr>
			</table>
					<div class="actualizar-cancelar">
				    <input type="submit" class="boton_actualizar-cancelar" name="bot_actualizar" id="bot_actualizar" value="Actualizar">
	      			<input type="submit" class="boton_actualizar-cancelar" name="bot_cancelar" id="bot_cancelar" value="Cancelar">
	      			</div>

		</form>
	</div>




</body>
</html>