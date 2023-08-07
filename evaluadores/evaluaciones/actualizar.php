<!DOCTYPE html>
<html>
<head>
	<title>Actualizar</title>
	<link rel="stylesheet" type="text/css" href="evaluaciones.css">
	<script src="https://kit.fontawesome.com/8e82b560a5.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
</head>
<body background='/BD/Recursos/fondo.jpg' >


<?php

	$orden=$_GET['orden'];
	$f1=$_GET['f1'];
	$palabra=$_GET['palabra'];
	$filtro_conv=$_GET['filtro_conv'];


	if(isset($_POST['bot_cancelar'])){
	header("Location:index.php ?orden=$orden &f1=$f1 &palabra=$palabra&filtro_conv=$filtro_conv");
	}

	include("conexion.php");
	if(!isset($_POST['bot_actualizar'])){

	$Id=$_GET["Id"];



	include("conexion.php");
	$conexion=$base->query("SELECT * FROM evaluaciones WHERE `Id` like $Id");
	$registros=$conexion->fetchAll(PDO::FETCH_OBJ);

	foreach($registros as $evaluacion):
		$Nombre=$evaluacion->Nombre;
		$CUIL=$evaluacion->CUIL;
		$Convocatoria=$evaluacion->Convocatoria;
		$Comision=$evaluacion->Comision;
		$ID_Proyectos=$evaluacion->ID_Proyectos;
		$Evaluacion=$evaluacion->Evaluacion;
		$Comentario=$evaluacion->Comentario;
	endforeach;

	}else{
	$Id=$_POST["id"];
	$Nombre=$_POST["nom"];
	$CUIL=$_POST["cui"];
	$Convocatoria=$_POST["conv"];
	$Comision=$_POST["com"];
	$ID_Proyectos=$_POST["id_proyectos"];
	$Evaluacion=$_POST["eva"];
	$Comentario=$_POST["com1"];


	$base->query("UPDATE evaluaciones SET Nombre='$Nombre',
										 CUIL='$CUIL',
										 Convocatoria='$Convocatoria',
										 Comision='$Comision',
										 ID_Proyectos='$ID_Proyectos',
										 Evaluacion='$Evaluacion',
										 Comentario='$Comentario'
										 WHERE Id='$Id'");

	header("Location:index.php ?orden=$orden &f1=$f1 &palabra=$palabra&filtro_conv=$filtro_conv");
	}
?>




	<div class="tabla-evaluaciones">
		<form name="form1" method="post" action="">
			<table align="center">
				<tr>
					<td class="titulos">Id</td>
					<td class="titulos">Nombre</td>
					<td class="titulos">CUIL</td>
					<td class="titulos">Convocatoria</td>
					<td class="titulos">Comision</td>
					<td class="titulos">ID Proyectos</td>
					<td class="titulos">Evaluacion</td>
					<td class="titulos">Comentario</td>
				</tr>

				<tr>
					<td class="filas-actualizar"><textarea class="input" type="text" readonly name="id"><?php echo $Id;?></textarea></td>
					<td class="filas-actualizar"><textarea class="input" type="text" name="nom"><?php echo $Nombre;?></textarea></td>
					<td class="filas-actualizar"><textarea class="input" type="text" name="cui"><?php echo $CUIL;?></textarea></td>
					<td class="filas-actualizar"><textarea class="input" type="text" name="conv"><?php echo $Convocatoria;?></textarea></td>
					<td class="filas-actualizar"><textarea class="input" type="text" name="com"><?php echo $Comision;?></textarea></td>
					<td class="filas-actualizar"><textarea class="input" type="text" name="id_proyectos"><?php echo $ID_Proyectos;?></textarea></td>

					<td class="filas-actualizar"><select class="input" type="text" name="eva"?php echo $Evaluacion;?>"
									<option <?php if($Evaluacion == 'Muy buena'){echo("selected");}?> >Muy buena</option>
									<option <?php if($Evaluacion == 'Regular'){echo("selected");}?> >Regular</option>
									<option <?php if($Evaluacion == 'Mala'){echo("selected");}?> >Mala</option>
									<option <?php if($Evaluacion == ''){echo("selected");}?> ></option>
									</select></td>

					<td class="filas-actualizar"><textarea class="input" type="text" name="com1"><?php echo $Comentario;?></textarea></td>





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