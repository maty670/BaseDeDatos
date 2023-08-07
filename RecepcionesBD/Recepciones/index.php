<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script src="https://kit.fontawesome.com/8e82b560a5.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="Smooth_Scrolling.js"></script>
	<title>Recepciones</title>
</head>
<body>





<?php 
	//----------------------------------------------------------------------------------------//
	include("../conexion2.php");
	include("../resaltar_texto.php");



	$UVT = $_GET['UVT'];
	$CONV = "";
	if(isset($_GET['CONV'])){
		$CONV =  preg_replace('/[#$%^&*()_+=\-\[\]\';,.\/{}|":<>?~\\\\ ]/','', eliminar_acentos($_GET['CONV']));
		
	}
	

	
	$j=0;

	
	
	$conexion=$base->query("SELECT * FROM `recepciones` WHERE `UVT` LIKE '$UVT' ORDER BY `Año`,`Convocatoria`,`Codigo`");
	$resultados2=$conexion->fetchAll(PDO::FETCH_OBJ);


	$conexion=$base->query("SELECT `UVT`,`Convocatoria`,`Año`,`Visible`,
	DATE_FORMAT(`Inicio`, '%d/%m/%Y') AS INICIO,
	DATE_FORMAT(DATE_ADD(`Inicio`, INTERVAL 3 MONTH), '%d/%m/%Y') AS DIF1,
	DATE_FORMAT(DATE_ADD(`Inicio`, INTERVAL 6 MONTH), '%d/%m/%Y') AS DIF2,
	DATE_FORMAT(DATE_ADD(`Inicio`, INTERVAL 9 MONTH), '%d/%m/%Y') AS DIF3,
	DATE_FORMAT(DATE_ADD(`Inicio`, INTERVAL 12 MONTH), '%d/%m/%Y') AS DIF4,
	DATE_FORMAT(DATE_ADD(`Inicio`, INTERVAL 15 MONTH), '%d/%m/%Y') AS DIF5,
	DATE_FORMAT(DATE_ADD(`Inicio`, INTERVAL 18 MONTH), '%d/%m/%Y') AS DIF6,
	DATE_FORMAT(DATE_ADD(`Inicio`, INTERVAL 21 MONTH), '%d/%m/%Y') AS DIF7,
	DATE_FORMAT(DATE_ADD(`Inicio`, INTERVAL 24 MONTH), '%d/%m/%Y') AS DIF8
	FROM `recepciones` 
	WHERE `UVT` LIKE '%$UVT%' 
	GROUP BY `UVT`,`Convocatoria`,`Año`
	ORDER BY `Año`,`Convocatoria`,`Codigo`");
	$titulos=$conexion->fetchAll(PDO::FETCH_OBJ);


	$conexion=$base->query("SELECT `Año` FROM `recepciones` WHERE `UVT` LIKE '$UVT' GROUP BY `Año` ORDER BY `Año`");
	$resultados_AÑOS=$conexion->fetchAll(PDO::FETCH_OBJ);
	$arr = array();
	foreach ($resultados_AÑOS as $r):
		array_unshift($arr , $r->Año);
	endforeach;

	$arr = array_reverse($arr);
	

	


	//----------------------------------------------------------------------------------------//
	?>


	<div class="contenedor_Tituto_UVT">
		<h1 class="Titulo_UVT"><?php echo $UVT?></h1>
		<form action="" method="post" name="" id="">
			<div class="contenedor_botones_GuardarVolver">

				<div class="btnGuardar">
					<input type="submit" name="Actualizar" id="Actualizar" value="Guardar">
				</div>

				<div class="btnVolver">
					<input type="button" value="Volver">
				</div>

			</div>
	</div>


	



		<?php foreach ($titulos as $t): ?>


			<div class="indice_convocatoria" id="<?php echo eliminar_acentos(preg_replace('/[#$%^&*()_+=\-\[\]\';,.\/{}|":<>?~\\\\ ]/', '', eliminar_acentos($t->Convocatoria . $t->Año))); ?>"></div>

			<?php 
			if(count($arr)>0){
				if($arr[0]==$t->Año){
					echo "</div>";
					echo "<div class='contenedor_convocatorias_años'>";
					echo "<div class='separador_año'>" . $arr[0] . "</div>";

				}
			}
				
			?>

			

			<div class="tabla">

				<table class="<?php echo str_replace(' ', '', $t->Convocatoria . $t->Año); ?>" 
						id="<?php echo 'tt' . preg_replace('/[#$%^&*()_+=\-\[\]\';,.\/{}|":<>?~\\\\ ]/','', $t->Convocatoria . $t->Año); 

				

				?>">
			<tr>
				<td></td>
				<td colspan="6" class="Titulo_convocatoria" <?php if($t->Visible=='0') echo 'style="left:30px"'?>>
					<?php echo $t->Convocatoria . "  " . $t->Año; ?>
					</td>






				<td <?php if($t->Visible=='1'){echo 'class="visibilidad visible"';}else{echo "class='visibilidad no_visible'";}?>>
					<img 
						<?php if ($t->Visible=='1'){
								echo 'src="./iconos/eye-solid.svg"';
								}else{
									echo 'src="./iconos/eye-slash-solid.svg"';
								}
						?>>
				</td>






			</tr>

			<tr class="Titulos_columnas titulos" <?php if ($t->Visible=='0') echo 'style="display: none"' ?>>
				<td></td>
				<td class="Celda" rowspan="3">Convocatoria</td>
				<td class="Celda" rowspan="3">Año</td>
				<td class="Celda" rowspan="3">Código Proyecto</td>
				<td class="Celda" rowspan="3">Director</td>
				<td class="Celda" rowspan="3">Monto Otorgado</td>
				<td class="Celda" rowspan="3">Fecha Pago</td>
				<td class="Celda" rowspan="3">Fecha Vencimiento</td>
				<td class="Celda" rowspan="3">Duración</td>
				<td class="Celda rendicion" rowspan="3">Inicio Rendición</td>
				<td class="Celda Rendiciones_presentadas" colspan="18">Rendiciones presentadas</td>
				<td class="Celda" rowspan="3">Fechas Intimaciones</td>
				<td class="Celda" rowspan="3">Observación</td>
				<td class="Celda" rowspan="3">Estado</td>
				<td class="Celda" rowspan="3">Período informado</td>
				<td class="Celda" rowspan="3">EXPTE DE PAGO</td>
				<td class="Celda" rowspan="3">RESOL DE PAGO</td>
				<td class="Celda" rowspan="3">EXPTE DE RENDICIÓN</td>
				<td class="Celda" rowspan="3">Pase DGA</td>
			</tr>

			<tr class="Titulos_columnas titulos_rendiciones" <?php if ($t->Visible=='0') echo 'style="display: none"' ?>>
				<td></td>
				<td class="Celda">R1</td>
				<td class="Celda">I1</td>
				<td class="Celda">R2</td>
				<td class="Celda">I2</td>
				<td class="Celda">R3</td>
				<td class="Celda">I3</td>
				<td class="Celda">R4</td>
				<td class="Celda">I4</td>
				<td class="Celda">R5</td>
				<td class="Celda">I5</td>
				<td class="Celda">R6</td>
				<td class="Celda">I6</td>
				<td class="Celda">R7</td>
				<td class="Celda">I7</td>
				<td class="Celda">R8</td>
				<td class="Celda">I8</td>
				<td class="Celda">R9</td>
				<td class="Celda">I9</td>
			</tr>

			<tr class="Titulos_columnas titulos_rendiciones_fechas" <?php if ($t->Visible=='0')echo'style="display: none"' ?>>
				<td></td>
				<td class="Celda R"><?php echo $t->INICIO?></td>
				<td class="Celda I"></td>
				<td class="Celda R"><?php echo $t->DIF1?></td>
				<td class="Celda I"></td>
				<td class="Celda R"><?php echo $t->DIF2?></td>
				<td class="Celda I"></td>
				<td class="Celda R"><?php echo $t->DIF3?></td>
				<td class="Celda I"></td>
				<td class="Celda R"><?php echo $t->DIF4?></td>
				<td class="Celda I"></td>
				<td class="Celda R"><?php echo $t->DIF5?></td>
				<td class="Celda I"></td>
				<td class="Celda R"><?php echo $t->DIF6?></td>
				<td class="Celda I"></td>
				<td class="Celda R"><?php echo $t->DIF7?></td>
				<td class="Celda I"></td>
				<td class="Celda R"><?php echo $t->DIF8?></td>
				<td class="Celda I"></td>
			</tr>


			<?php foreach ($resultados2 as $r): 
				$color="";
				if($r->Presento_Final=="RENUNCIO"){
					$color = "ROJO";
				}
				if($r->Presento_Final=="FINAL"){
					$color = "VERDE";
				}
				if($r->Presento_Final=="FINAL" && $r->Pase_DGA!=""){
					$color = "CELESTE";
				}

				

				if(strcasecmp($t->Convocatoria,$r->Convocatoria)==0 && strcasecmp($t->Año,$r->Año)==0){
					
					?>


			<tr class="Datos" <?php if ($t->Visible=='0')echo'style="display: none"' ?>>

				<td class="btnEliminar" id="<?php echo $j?>"></td>

				<td class="Celda Convocatoria <?php echo $color?> "><input required class="input_convocatoria" type="text" name="<?php echo 'Convocatoria' . $j?>" value="<?php echo $r->Convocatoria?>"></td>

				<td class="Celda <?php echo $color?> "><input required type="number" name="<?php echo 'Año' . $j?>" value="<?php echo $r->Año?>"></td>
				<td class="Celda <?php echo $color?> "><input class="Codigo" type="text" name="<?php echo 'Codigo' . $j?>" value="<?php echo $r->Codigo?>"></td>
				<td class="Celda <?php echo $color?> "><input class="Director" type="text" name="<?php echo 'Director' . $j?>" value="<?php echo $r->Director?>"></td>
				<td class="Celda <?php echo $color?> "><input class="Monto" type="text" name="<?php echo 'Monto' . $j?>" value="<?php echo $r->Monto_Otorgado?>"></td>	
				<td class="Celda <?php echo $color?> "><input type="date" name="<?php echo 'FechaP' . $j?>" value="<?php echo $r->Fecha_Pago?>"></td>
				<td class="Celda <?php echo $color?> "><input type="date" name="<?php echo 'FechaV' . $j?>" value="<?php echo $r->Fecha_Vencimiento?>"></td>
				<td class="Celda <?php echo $color?> "><input type="number" name="<?php echo 'Duracion' . $j?>" value="<?php echo $r->Duracion?>"></td>

				<td class="Celda rendicion inicioR <?php echo $color?> "><input type="date" name="<?php echo 'Inicio' . $j?>" value="<?php echo $r->Inicio?>"></td>

				<td class="Celda rendicion <?php echo $color?> "><input type="date" name="<?php echo 'R1' . $j?>" value="<?php echo $r->R1?>"></td>
				<td class="Celda intimacion <?php echo $color?> "><input type="checkbox" name="<?php echo 'I1' . $j?>" <?php if($r->I1=='1'){echo 'checked';}?> ></td>

				<td class="Celda rendicion <?php echo $color?> "><input type="date" name="<?php echo 'R2' . $j?>" value="<?php echo $r->R2?>"></td>
				<td class="Celda intimacion <?php echo $color?> "><input type="checkbox" name="<?php echo 'I2' . $j?>" <?php if($r->I2=='1'){echo 'checked';}?> ></td>

				<td class="Celda rendicion <?php echo $color?> "><input type="date" name="<?php echo 'R3' . $j?>" value="<?php echo $r->R3?>"></td>
				<td class="Celda intimacion <?php echo $color?> "><input type="checkbox" name="<?php echo 'I3' . $j?>" <?php if($r->I3=='1'){echo 'checked';}?> ></td>

				<td class="Celda rendicion <?php echo $color?> "><input type="date" name="<?php echo 'R4' . $j?>" value="<?php echo $r->R4?>"></td>
				<td class="Celda intimacion <?php echo $color?> "><input type="checkbox" name="<?php echo 'I4' . $j?>" <?php if($r->I4=='1'){echo 'checked';}?> ></td>

				<td class="Celda rendicion <?php echo $color?> "><input type="date" name="<?php echo 'R5' . $j?>" value="<?php echo $r->R5?>"></td>
				<td class="Celda intimacion <?php echo $color?> "><input type="checkbox" name="<?php echo 'I5' . $j?>" <?php if($r->I5=='1'){echo 'checked';}?> ></td>

				<td class="Celda rendicion <?php echo $color?> "><input type="date" name="<?php echo 'R6' . $j?>" value="<?php echo $r->R6?>"></td>
				<td class="Celda intimacion <?php echo $color?> "><input type="checkbox" name="<?php echo 'I6' . $j?>" <?php if($r->I6=='1'){echo 'checked';}?> ></td>

				<td class="Celda rendicion <?php echo $color?> "><input type="date" name="<?php echo 'R7' . $j?>" value="<?php echo $r->R7?>"></td>
				<td class="Celda intimacion <?php echo $color?> "><input type="checkbox" name="<?php echo 'I7' . $j?>" <?php if($r->I7=='1'){echo 'checked';}?> ></td>

				<td class="Celda rendicion <?php echo $color?> "><input type="date" name="<?php echo 'R8' . $j?>" value="<?php echo $r->R8?>"></td>
				<td class="Celda intimacion <?php echo $color?> "><input type="checkbox" name="<?php echo 'I8' . $j?>" <?php if($r->I8=='1'){echo 'checked';}?> ></td>

				<td class="Celda rendicion <?php echo $color?> "><input type="date" name="<?php echo 'R9' . $j?>" value="<?php echo $r->R9?>"></td>
				<td class="Celda intimacion <?php echo $color?> "><input type="checkbox" name="<?php echo 'I9' . $j?>" <?php if($r->I9=='1'){echo 'checked';}?> ></td>
				
				

				<td class="Celda <?php echo $color?> "><textarea name="<?php echo 'FechasInt' . $j?>"><?php echo $r->Fecha_Intimacion?></textarea></td>
				<td class="Celda <?php echo $color?> "><textarea name="<?php echo 'Observacion' . $j?>"><?php echo $r->Observacion?></textarea></td>
				

				<td class="Celda <?php echo $color?> "><select type="text" class="input" name="<?php echo 'Presento' . $j?>">
									<option <?php if($r->Presento_Final==""){echo "selected";} ?> > </option>
									<option <?php if($r->Presento_Final=="INICIAL"){echo "selected";} ?> >INICIAL</option>
									<option <?php if($r->Presento_Final=="DE AVANCE"){echo "selected";} ?> >DE AVANCE</option>
									<option <?php if($r->Presento_Final=="FINAL"){echo "selected";} ?> >FINAL</option>
									<option <?php if($r->Presento_Final=="RENUNCIO"){echo "selected";} ?> >RENUNCIO</option>
								  </select></td>

				<td class="Celda <?php echo $color?> "><input name="<?php echo 'Periodo' . $j?>" value="<?php echo $r->Periodo?>"></td>
				<td class="Celda <?php echo $color?> "><input name="<?php echo 'ExpteP' . $j?>" value="<?php echo $r->Expte_Pago?>"></td>
				<td class="Celda <?php echo $color?> "><input name="<?php echo 'ResolP' . $j?>" value="<?php echo $r->Resol_Pago?>"></td>
				<td class="Celda <?php echo $color?> "><input name="<?php echo 'ExpteR' . $j?>" value="<?php echo $r->Expte_Rend?>"></td>
				<td class="Celda <?php echo $color?> "><input type="date" name="<?php echo 'PaseDGA' . $j?>" value="<?php echo $r->Pase_DGA?>"></td>
				
				<td style="visibility: hidden"><input name="<?php echo 'Visible' . $j?>" value="<?php if($r->Visible=='0'){echo 'false';}else{echo 'true';} ?>"></td>
				
			</tr>

				

				<?php
				$j=$j+1;
				}
				endforeach;
				?>

		</table>
		<div class="btnNuevo" id="<?php echo $t->Convocatoria . $t->Año?>" <?php if ($t->Visible=='0') echo'style="display: none"' ?>>
			<div><input type="button" value="Nuevo Dato"></div>
		</div>
	</div>

		<?php 

			if(count($arr)>0){
				if($arr[0]==$t->Año){
					array_shift($arr);
				}
			}elseif(count($arr)==0){
				
			}

		endforeach; ?>

		<?php echo "</div>"; ?>

		<div class="mensajeAlerta">
		<img src="./iconos/check.svg">
		<span>Los datos se actualizaron correctamente</span>
	</div>


	</form>


























		<?php 
			include("completarDirector.php");
			include("Actualizar.php");
			include("Nuevo_Dato.php");
			include("eliminar.php");

		?>

		<a href="#<?php echo $CONV?>" class="href_codigo"></a>


		<script type="text/javascript" src="validarFormatos.js"></script>
		<script type="text/javascript" src="formatoMontos.js"></script>
		<script type="text/javascript" src="visibilidad.js"></script>
		<script type="text/javascript">

			setTimeout(function () {
				const href = document.querySelector(".href_codigo");
				href.click();
			}, 500);


			
		</script>




	</body>
</html>
