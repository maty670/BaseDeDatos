<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Evaluaciones</title>
	<link rel="stylesheet" type="text/css" href="evaluacionesss.css">
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


		if(isset($_GET['filtro_conv'])){
			$filtro_conv=$_GET['filtro_conv'];
		}else{
			$filtro_conv='';
		}



		if(isset($_GET['f1'])){
			$f1=$_GET['f1'];
		}else{
			$f1='CUIL';
		}


		if(isset($_GET['f2'])){
			$f2=$_GET['f2'];
		}else{
			$f2='Nombre';
		}

		if(isset($_GET['f3'])){
			$f3=$_GET['f3'];
		}else{
			$f3='Comision';
		}

		if(isset($_GET['f4'])){
			$f4=$_GET['f4'];
		}else{
			$f4='Id_Proyectos';
		}



		if(isset($_GET['c1'])){
			$c1=$_GET['c1'];
		}else{
			$c1='Convocatoria';
		}






		include("conexion.php");

		$conexion=$base->query("SELECT * FROM evaluaciones WHERE 
			($f1 like '%$palabra%' OR $f2 like '%$palabra%' OR $f3 like '%$palabra%' OR $f4 like '%$palabra%') 
			AND ($c1 like '%$filtro_conv%' ) $orden");
		$conexion_conv=$base->query("SELECT `Convocatoria` FROM evaluaciones group by `Convocatoria` ");


		$registros=$conexion->fetchAll(PDO::FETCH_OBJ);
		$filtros=$conexion_conv->fetchAll(PDO::FETCH_OBJ);
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


	
<div class="Titulo_Principal"><h1>Evaluaciones</h1></div>


	<div align="center">



		<div class="tabla-filtros">
			<table>

				<th id="filtro-titulo">Convocatorias</th>
				<th></th>

					<?php foreach($filtros as $f): 
						$background_color="";
						$color="";
						if($f->Convocatoria==$filtro_conv){
							$background_color="#F8B88B";
							$color="#fff";
						}
						?>
						<tr>
						<td class="filas-filtros" style="background-color: <?php echo $background_color?>">
							<a style="color:<?php echo $color?>" href="index.php ?orden=<?php echo $orden ?>&c1=Convocatoria&filtro_conv=<?php echo $f->Convocatoria?>&f1=<?php echo $f1?>&f2=<?php echo $f2?>&f3=<?php echo $f3?>&palabra=<?php echo $palabra?>"> 
								<?php echo $f->Convocatoria;?></a></td>
						</tr>
					<?php endforeach;?>


					
					


			</table>
		</div>


		<div class="Busqueda">
			<p>Buscar por palabra clave</p>
			<form method="post" action="">
			<input type="text" autocomplete="off" name="busqueda" value="<?php echo $palabra?>" placeholder="Nombre, Cuil, Comision o Id de Proyecto">
			<input class="btn_buscar" type="submit" name="btn_busqueda" value="Buscar">

				<?php 
				if(isset($_POST['btn_busqueda'])){
					$busqueda=$_POST["busqueda"];
					header("Location:index.php ?&palabra=$busqueda&filtro_conv=$filtro_conv");
				}else{
					$busqueda="";
				}
				?>
			</form>
		</div>



</div>






<div class="filtros-activos">
	<table>
	<th colspan="2">Filtros activos</th>
	<tr><td>Palabra clave</td><td><?php echo $palabra;?></td><td class="btn_filtros"><a class="fa-solid fa-rotate" href="index.php ?&filtro_conv=<?php echo $filtro_conv?>"><span>Reiniciar Filtro de Palabra</span></a></td></tr>
	<tr><td>Convocatoria</td><td><?php echo $filtro_conv;?></td><td class="btn_filtros"><a class="fa-solid fa-rotate" href="index.php ?&palabra=<?php echo $palabra?>"><span>Reiniciar Filtro de Convocatoria</span></a></td></tr>
	</table>
</div>








		
	
	<div class="tabla-evaluaciones">
		<form class="form-evaluaciones" method="post" action="">
		<table align="center">

			<tr>
				<td class="btn_filtros">
					<a href="index.php ?orden=Order by `Id` Asc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" class="fas fa-sort-numeric-down"></a>
					<a href="index.php ?orden=Order by `Id` Desc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" class="fas fa-sort-numeric-down-alt"></a>
				</td>
				<td class="btn_filtros">
					<a href="index.php ?orden=Order by `Nombre` Asc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" class="fas fa-sort-alpha-down"></a>
					<a href="index.php ?orden=Order by `Nombre` Desc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" class="fas fa-sort-alpha-down-alt"></a>
				</td>
				<td class="btn_filtros">
					<a href="index.php ?orden=Order by `CUIL` Asc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" class="fas fa-sort-numeric-down"></a>
					<a href="index.php ?orden=Order by `CUIL` Desc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" class="fas fa-sort-numeric-down-alt"></a>					
				</td>
				<td class="btn_filtros">
					<a href="index.php ?orden=Order by `Convocatoria` Asc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" class="fas fa-sort-alpha-down"></a>
					<a href="index.php ?orden=Order by `Convocatoria` Desc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" class="fas fa-sort-alpha-down-alt"></a>
				</td>
				<td class="btn_filtros">
					<a href="index.php ?orden=Order by `Comision` Asc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" class="fas fa-sort-alpha-down"></a>
					<a href="index.php ?orden=Order by `Comision` Desc &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" class="fas fa-sort-alpha-down-alt"></a>
				</td>
				<td></td>
				<td class="btn_filtros">
					<a href="index.php ?orden=Order by field(Evaluacion,'Muy Buena','Regular','Mala','') &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" class="fa-regular fa-square-plus"></a>
					<a href="index.php ?orden=Order by field(Evaluacion,'Mala','Regular','Muy Buena','') &f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" class="fa-regular fa-square-minus"></a>
				</td>
				<td></td>
				<td></td>
				<td></td>
				
			</tr>



















			<tr>
				<td class="titulos">Id</td>
				<td class="titulos titulo-fijo">Nombre</td>
				<td class="titulos">CUIL</td>
				<td class="titulos">Convocatoria</td>
				<td class="titulos">Comision</td>
				<td class="titulos">ID Proyectos</td>
				<td class="titulos">Calidad de Evaluacion</td>
				<td class="titulos">Comentario</td>
			</tr>

















			<?php
			/*-----Actualizacion y borrado de datos-----*/
			foreach($registros as $persona):

			if($persona->Evaluacion=='Muy buena')
			$colorEvaluacion= '#00cc66';
			if($persona->Evaluacion=="Regular")
			$colorEvaluacion= '#e6e600';
			if($persona->Evaluacion=="Mala")
			$colorEvaluacion= '#e63900';
			if($persona->Evaluacion=="")
			$colorEvaluacion= '';




			if($palabra==''){
				$Nombre=$persona->Nombre;
				$CUIL=$persona->CUIL;
				$Comision=$persona->Comision;
				$ID_Proyectos=$persona->ID_Proyectos;
			}else{
				$Nombre=eliminar_acentos($persona->Nombre);
				$CUIL=eliminar_acentos($persona->CUIL);
				$Comision=eliminar_acentos($persona->Comision);
				$ID_Proyectos=eliminar_acentos($persona->ID_Proyectos);
			}


			if($c1=='Convocatoria'){
				$Convocatoria=$persona->Convocatoria;
			}else{
				$Convocatoria=eliminar_acentos($persona->Convocatoria);
			}


			?>

			

			<tr tabindex="3">
				<td class="filas"><div><?php echo $persona->Id?></div></td>
				<td class="filas columna-fija"><div><?php echo resaltar_frase($Nombre,$palabra)?></div></td>
				<td class="filas filas_cuil"><div><a href="/BaseDeDatos/evaluadores/evaluadores/index.php ?f1=CUIL &palabra=<?php echo $persona->CUIL?>" target="_blank"><?php echo resaltar_frase($CUIL,$palabra)?></a></div></td>
				<td class="filas"><div><?php echo resaltar_frase($Convocatoria,$filtro_conv)?></div></td>
				<td class="filas"><div><?php echo resaltar_frase($Comision,$palabra)?></div></td>
				<td class="filas"><div><?php echo resaltar_frase($ID_Proyectos,$palabra)?></div></td>
				<td class="filas" style="background-color:<?php echo $colorEvaluacion?>"><div><?php echo $persona->Evaluacion?></div></td>
				<td class="filas"><div><?php echo $persona->Comentario?></div></td>

      			<td>
      				<div class="boton-td">
	      			<a class="boton_actualizar" title="Editar" href="actualizar.php?Id=<?php echo $persona->Id?>&orden=<?php echo $orden?>&f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>">
	      			<i class="fa-regular fa-pen-to-square"></i></a>


	      			

					<a class="boton_borrar" title="Borrar" href="borrar.php?Id= <?php echo $persona->Id?>&orden=<?php echo $orden ?>&f1=<?php echo $f1?> &palabra=<?php echo $palabra?>&filtro_conv=<?php echo $filtro_conv?>" onclick="return  confirm('ELIMINAR <?php echo $persona->Nombre?> de la convocatoria <?php echo $persona->Convocatoria?> ?')">
					<i class="far fa-trash-alt"></i></a>
					</div>
				</td>
			</tr>



			<?php
			endforeach;
			?>






















			<tr>
				<td class="filas"></td>
			    <td class="filas"><textarea class="input" type='text' name='nombre'></textarea></td>
     		    <td class="filas"><textarea class="input" type='text' name='cuil' minlength="13" maxlength="13" required></textarea></td>
     		    <td class="filas"><textarea class="input" type='text' name='convocatoria'></textarea></td>
     		    <td class="filas"><textarea class="input" type='text' name='comision'></textarea></td>
     		    <td class="filas"><textarea class="input" type='text' name='id_proyectos'></textarea></td>
			    <td class="filas"><select class="input" type='text' name='evaluacion'>
									<option>Muy buena</option>
									<option>Regular</option>
									<option>Mala</option>
									<option selected></option>
									</select>
				<td class="filas"><textarea class="input" type='text' name='comentario'></textarea></td>

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
					$CUIL=$_POST["cuil"];
					$Convocatoria=$_POST["convocatoria"];
					$Comision=$_POST["comision"];
					$ID_Proyectos=$_POST["id_proyectos"];
					$Evaluacion=$_POST["evaluacion"];
					$Comentario=$_POST["comentario"];


						/*Realizar la consulta en la BD*/
						$base->query("INSERT INTO `evaluaciones` (`Id`, `Nombre`, `CUIL`, `Convocatoria`, `Comision`,`ID_Proyectos`,`Evaluacion`, `Comentario`) 
									VALUES (NULL,'$Nombre','$CUIL','$Convocatoria','$Comision','$ID_Proyectos','$Evaluacion','$Comentario')");






						$conexion=$base->query("SELECT EXISTS(
										         SELECT *
										         FROM `evaluadores`
										         WHERE `CUIL` =  '$CUIL') AS S");
						$registros=$conexion->fetchAll(PDO::FETCH_OBJ);

						foreach($registros as $persona):
						endforeach;


						if ($persona->S==0) {

							echo  '<script>';
		  					echo  'alert("El evaluador: '.$Nombre.' con cuil: '.$CUIL.' no se encontraba en el Banco de Evaluadores, por lo que fue agregado")';
		 					echo  '</script>';

							$base->query("INSERT INTO `evaluadores` (`Id`, `Nombre`, `MAIL`, `Telefono`, `CUIL`, `Institucion`, `Ciudad_Provincia`,			`Perfil_Especialidad`,`MiniBio`,`LinkCV`) 
									  VALUES (NULL,'$Nombre','','','$CUIL','','','','','')");

						}



					
						

						/*Actualizar la pagina*/
						echo "<meta http-equiv='refresh' content='0'>";

						/*Scroll hasta el final de la pagina luego de insertar un elemento*/
						echo '<script type="text/JavaScript">
							  window.location = "index.php#inf";
							  </script>';
						
				}
			?>


</body>
</html>