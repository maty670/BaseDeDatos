<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Evaluadores</title>
	<link rel="stylesheet" type="text/css" href="evaluadoresss.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<script src="https://kit.fontawesome.com/8e82b560a5.js" crossorigin="anonymous"></script>
	<?php



		function resaltar_frase($string, $frase, $taga = '<b style="color:#E2F516; background-color:red">', $tagb = '</b>')
		{
		return ($string !== '' && $frase !== '')
		? preg_replace('/('.preg_quote($frase, '/').')/i'.('true' ? 'u' : ''), $taga.'\\1'.$tagb, $string)
		: $string;
		}



		function eliminar_acentos($cadena){
		
		//Reemplazamos la A y a
		$cadena = str_replace(
		array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
		array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
		$cadena
		);

		//Reemplazamos la E y e
		$cadena = str_replace(
		array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
		array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
		$cadena );

		//Reemplazamos la I y i
		$cadena = str_replace(
		array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
		array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
		$cadena );

		//Reemplazamos la O y o
		$cadena = str_replace(
		array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
		array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
		$cadena );

		//Reemplazamos la U y u
		$cadena = str_replace(
		array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
		array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
		$cadena );

		
		return $cadena;
	}


		if(isset($_GET['orden'])){
			$orden=$_GET['orden'];
		}else{
			$orden='Order by `Id`';
		}


		if(isset($_GET['palabra'])){
			$palabra=$_GET['palabra'];
		}else{
			$palabra='';
		}

		if(isset($_GET['f1'])){
			$f1=$_GET['f1'];
		}else{
			$f1='Nombre';
		}


		if(isset($_GET['f2'])){
			$f2=$_GET['f2'];
		}else{
			$f2='CUIL';
		}

		if(isset($_GET['f3'])){
			$f3=$_GET['f3'];
		}else{
			$f3='Ciudad_Provincia';
		}

		if(isset($_GET['f4'])){
			$f4=$_GET['f4'];
		}else{
			$f4='Perfil_Especialidad';
		}





		include("conexion.php");

		$conexion=$base->query("SELECT * FROM evaluadores WHERE $f1 like '%$palabra%' OR $f2 like '%$palabra%' OR $f3 like '%$palabra%' OR $f4 like '%$palabra%' $orden");


		$registros=$conexion->fetchAll(PDO::FETCH_OBJ);
	?>

	


<div class="navegador">
        <ul id="menu">
          <li><a href="../../Busqueda_proyectos/">Busqueda de Proyectos</a></li>
          <li><a href="">Evaluadores AGENCIA</a>
            <ul>
              <li><a href="../../evaluadores/evaluaciones/">Evaluaciones</a></li>
              <li><a href="../../evaluadores/evaluadores/">Banco de Evaluadores</a></li>
            </ul>  
          </li>
        </ul>
      </div>



</head>
<body background='/BD/Recursos/fondo.jpg'>


	<div id='sup'></div>


	



	
	<a href='#inf' title="Bajar" class="subir_bajar sup"><i class="fa-solid fa-circle-chevron-down"></i></a>







	<div class="Titulo_Principal"><h1>Banco de Evaluadores</h1></div>












			<div class="Busqueda">
				<form method="post" action="">
				<p>Buscar por palabra clave</p>
				<input class="input_busqueda" type="text" autocomplete="off" name="busqueda" value="<?php echo $palabra?>" placeholder="Nombre, Cuil ,Especialidad o Ciudad/Provincia">
				<input class="btn_buscar" type="submit" name="btn_busqueda" value="Buscar">

				<?php 
				if(isset($_POST['btn_busqueda'])){
					$busqueda=$_POST["busqueda"];
					header("Location:index.php ?palabra=$busqueda");
				}else{
					$busqueda="";
				}
				?>
				
				</form>
			</div>




<div class="filtros-activos">
	<table>
	<th colspan="2">Filtros activos</th>
	<tr><td>Palabra clave</td><td><?php echo $palabra;?></td><td class="btn_filtros"><a href="index.php" class="fa-solid fa-rotate"><span>Reiniciar Filtro de Palabra</span></a></td></tr>
	</table>
</div>


		
	
	<div class="tabla-evaluadores">
		<form class="form-evaluadores" method="post" action="">
		<table align="center">

			<tr>
				<td class="btn_filtros">
					<a href="index.php ?orden=Order by `Id` Asc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>" class="fas fa-sort-numeric-down"></a>
					<a href="index.php ?orden=Order by `Id` Desc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>" class="fas fa-sort-numeric-down-alt"></a>
				</td>
				<td class="btn_filtros">
					<a href="index.php ?orden=Order by `Nombre` Asc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>" class="fas fa-sort-alpha-down"></a>
					<a href="index.php ?orden=Order by `Nombre` Desc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>" class="fas fa-sort-alpha-down-alt"></a>
				</td>
				<td class="btn_filtros">
					<a href="index.php ?orden=Order by `CUIL` Asc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>" class="fas fa-sort-numeric-down"></a>
					<a href="index.php ?orden=Order by `CUIL` Desc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>" class="fas fa-sort-numeric-down-alt"></a>	
				</td>
				<td class="btn_filtros">

				</td>
				<td class="btn_filtros">

				</td>
				<td class="btn_filtros">

				</td>
					<td class="btn_filtros">
					<a href="index.php ?orden=Order by `Ciudad_Provincia` Asc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>" class="fas fa-sort-alpha-down"></a>
					<a href="index.php ?orden=Order by `Ciudad_Provincia` Desc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>" class="fas fa-sort-alpha-down-alt"></a>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>



			</tr>
















			<tr>
				<td class="titulos">Id</td>
				<td class="titulos titulo-fijo">Nombre</td>
				<td class="titulos">CUIL</td>
				<td class="titulos">MAIL</td>
				<td class="titulos">Telefono</td>
				<td class="titulos">Institucion</td>
				<td class="titulos">Ciudad/Provincia</td>
				<td class="titulos">Perfil/Especialidad</td>
				<td class="titulos">Minibio</td>
				<td class="titulos">CV</td>
				<td class="titulos">CV Online</td>
			</tr>

















			<?php
			/*-----Actualizacion y borrado de datos-----*/
			foreach($registros as $persona):

			if($palabra==''){
				$Nombre=$persona->Nombre;
				$CUIL=$persona->CUIL;
				$Ciudad_Provincia=$persona->Ciudad_Provincia;
				$Perfil_Especialidad=$persona->Perfil_Especialidad;
			}else{
				$Nombre=eliminar_acentos($persona->Nombre);
				$CUIL=eliminar_acentos($persona->CUIL);
				$Ciudad_Provincia=eliminar_acentos($persona->Ciudad_Provincia);
				$Perfil_Especialidad=eliminar_acentos($persona->Perfil_Especialidad);
			}


			?>

			

			<tr tabindex="3">
				<td><div class="filas fila-id"><?php echo $persona->Id?></div></td>
				<td><div class="filas columna-fija"><?php echo resaltar_frase($Nombre,$palabra)?></div></td>
				<td><div class="filas filas_cuil"><a href="/BaseDeDatos/evaluadores/evaluaciones/index.php ?f1=CUIL &palabra=<?php echo $persona->CUIL?>" target="_blank"><?php echo resaltar_frase($CUIL,$palabra)?></a></div></td>
				<td><div class="filas fila-mail"><?php echo $persona->MAIL?></div></td>
				<td><div class="filas"><?php echo $persona->Telefono?></div></td>
				<td><div class="filas"><?php echo $persona->Institucion?></div></td>
				<td><div class="filas"><?php echo resaltar_frase($Ciudad_Provincia,$palabra)?></div></td>
				<td><div class="filas fila-perfil"><?php echo resaltar_frase($Perfil_Especialidad,$palabra)?></div></td>
				<td><div class="filas"><?php echo $persona->MiniBio?></div></td>
				<td><div class="filas filas_cuil"><a href="/BaseDeDatos/evaluadores/CVs/<?php echo $persona->CV?>" target="_blank"><?php echo $persona->CV?></a></div></td>
				<td><div class="filas filas_cuil"><a href="<?php echo $persona->CV_Online?>" target="_blank"><?php echo $persona->CV_Online?></a></div></td>



      			<td>
      				<div class="boton-td">
	      			<a class="boton_actualizar" title="Editar" href="actualizar.php?Id=<?php echo $persona->Id?>&orden=<?php echo $orden?>&f1=<?php echo $f1?> &palabra=<?php echo $palabra?>">
	      			<i class="fa-regular fa-pen-to-square"></i></a>



					<a class="boton_borrar" title="Borrar" href="borrar.php?Id=<?php echo $persona->Id?>&Nombre=<?php echo $persona->Nombre?>&orden=<?php echo $orden ?>&f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&CUIL=<?php echo $persona->CUIL?>" onclick="return  confirm('ELIMINAR AL EVALUADOR: <?php echo $persona->Nombre?>?')">
					<i class="far fa-trash-alt"></i></a>
					</div>
				</td>
			</tr>



			<?php
			endforeach;
			?>






















			<tr>
				<td class="filas fila-id"></td>
			    <td class="filas"><textarea class="input" type='text' name='nombre'></textarea></td>
			    <td class="filas"><textarea class="input" type='text' name='cuil' minlength="13" maxlength="13" required></textarea></td>
     		    <td class="filas fila-mail"><textarea class="input" type='text' name='mail'></textarea></td>
     		    <td class="filas"><textarea class="input" type='text' name='telefono'></textarea></td>
			    <td class="filas"><textarea class="input" type='text' name='institucion'></textarea></td>
				<td class="filas"><textarea class="input" type='text' name='ciudad_provincia'></textarea></td>
				<td class="filas"><textarea class="input" type='text' name='perfil_especialidad'></textarea></td>
				<td class="filas"><textarea class="input" type='text' name='minibio'></textarea></td>
				<td class="filas"><textarea class="input" type='text' name='CV'></textarea></td>
				<td class="filas"><textarea class="input" type='text' name='CV_online'></textarea></td>

			    <td><input class="insert" type='submit' name='insertar' id='insertar' value='Insertar'></td> 
			</tr>


		</table>
	</form>
</div>
	

	<a href="#sup" title="Subir" class="subir_bajar inf"><i class="fa-solid fa-circle-chevron-up"></i></a>
	<div id="inf"></div>

			<?php
		
				include("conexion.php");

				if(isset($_POST['insertar'])){
					$Nombre=$_POST["nombre"];
					$MAIL=$_POST["mail"];
					$Telefono=$_POST["telefono"];
					$CUIL=$_POST["cuil"];
					$Institucion=$_POST["institucion"];
					$Ciudad_Provincia=$_POST["ciudad_provincia"];
					$Perfil_Especialidad=$_POST["perfil_especialidad"];
					$MiniBio=$_POST["minibio"];
					$CV=$_POST["CV"];
					$CV_Online=$_POST["CV_online"];






					/*Consultar si ya existe un CUIL igual cargado al momento de insertar*/
					/*Retorna una tabla con una fila igual a 1 si es verdadero y 0 si es falso*/
					/*
					+------------+   +-------------+   
					|      S     |   |      S      | 
					+------------+   +-------------+
					|  	   1 	 |   |  	0	   | 
					+------------+   +-------------+
					*/


					$conexion=$base->query("SELECT EXISTS(
									         SELECT *
									         FROM `evaluadores`
									         WHERE `CUIL` =  '$CUIL') AS S");
					
					$registros=$conexion->fetchAll(PDO::FETCH_OBJ);

					foreach($registros as $persona):
					endforeach;


					if ($persona->S==1 && $CUIL!='') {

						echo '<script>
	  						  alert("Ya existe un evaluador con ese cuil")
	 						  </script>';

	 					/*Scroll hasta el final de la pagina luego de insertar un elemento*/	  
	 					echo '<script type="text/JavaScript">
						 window.location = "index.php#inf";
						</script>';

					}else{

					/*Realizar la consulta en la BD*/
					$base->query("INSERT INTO `evaluadores`(`Id`, `Nombre`, `CUIL`, `MAIL`, `Telefono`, `Institucion`, `Ciudad_Provincia`, `Perfil_Especialidad`, `MiniBio`, `CV`, `CV_Online`) VALUES (NULL,'$Nombre','$CUIL','$MAIL','$Telefono','$Institucion','$Ciudad_Provincia','$Perfil_Especialidad','$MiniBio','$CV','$CV_Online')");

					/*Actualizar la pagina*/
					echo "<meta http-equiv='refresh' content='0'>";

					}

					
					/*Scroll hasta el final de la pagina luego de insertar un elemento*/
					echo '<script type="text/JavaScript">
						 window.location = "index.php#inf";
						</script>';
				}
			?>



</body>
</html>