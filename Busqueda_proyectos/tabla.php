	<?php 

	foreach ($registros_cantidad as $proyectos_cantidad):
	$cantidad=$proyectos_cantidad->Cantidad;
	endforeach;

	foreach ($registros_monto as $proyectos_monto):
	if($proyectos_monto->monto==NULL){$monto_acumulado=0;}else{
	$monto_acumulado=$proyectos_monto->monto;}
	endforeach;



	function resaltar_frase($string, $frase, $taga = '<b style="color:yellow; background-color:red">', $tagb = '</b>')
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

	?>

		


		


<div class="espacio_tablas_y_graficas">


	<div class="espacio_btn_graficas">
		<div id="btnTablaConv" class="btnMas">
			<i class="fa-solid fa-table-cells"></i>
			Tabla Convocatorias
			<i class="fa-regular fa-eye"></i>
		</div>
		<div id="btnGraficasConv" class="btnMas">
			<i class="fa-solid fa-chart-simple"></i> 
			Gráficas Convocatorias
			<i class="fa-regular fa-eye"></i>
		</div>
	</div>


		<table class='resultados_conv_hidden'>
			<tr>
				<th>Convocatoria</th>
				<th>Año</th>
				<th>Cantidad</th>
				<th>Monto ANR</th>
			</tr>
		
			
			<?php foreach ($registros_convocatoria as $proyectos_convocatoria):?>

				<tr>
					<td><?php echo $proyectos_convocatoria->Convocatoria?></td>
					<td><?php echo $proyectos_convocatoria->Año?></td>
					<td><?php echo $proyectos_convocatoria->Cantidad?></td>
					<td>$<?php if($proyectos_convocatoria->SUMA_ANR==NULL){echo 0;}else{echo $proyectos_convocatoria->SUMA_ANR;}?></td>
				</tr>
			<?php endforeach; ?>
			
			
				<tr>
					<td></td>
					<td></td>
					<td>Total: <?php echo $cantidad ?></td>
					<td>Acumulado: $<?php echo $monto_acumulado?></td>
				</tr>
		</table>

		

		

		<?php include('./graficas/renderizar_graficas.php');?>
		<?php include('./graficas/Espacio_Graficas_Convocatorias.php');?>

</div>










<div class="espacio_tablas_y_graficas">

	<div class="espacio_btn_graficas">
		<div id="btnTablaDep" class="btnMas">
			<i class="fa-solid fa-table-cells"></i>
			Tabla Departamentos
			<i class="fa-regular fa-eye"></i>
		</div>

		<div id="btnGraficasDep" class="btnMas">
			<i class="fa-solid fa-chart-simple"></i> 
			Gráficas Departamentos
			<i class="fa-regular fa-eye"></i>
		</div>

	</div>

	

	<table class='resultados_dep_hidden'>
		<tr>
			<th>Departamento</th>
			<th>Cantidad</th>
			<th>Monto ANR</th>
		<tr>
		
			
			<?php foreach ($registros_departamento as $proyectos_departamento):?>

				<tr>
					<td><?php echo $proyectos_departamento->Departamento?></td>
					<td><?php echo $proyectos_departamento->Cantidad?></td>
					<td>$<?php if($proyectos_departamento->SUMA_ANR==NULL){echo 0;}else{echo $proyectos_departamento->SUMA_ANR;}?></td>
				</tr>
			<?php endforeach; ?>
			
			
				<tr>
					<td></td>
					<td>Total: <?php echo $cantidad ?></td>
					<td>Acumulado: $<?php echo $monto_acumulado?></td>
				</tr>
		</table>

	<?php include('./graficas/Espacio_Graficas_Departamentos.php');?>

</div>












<div class="espacio_tablas_y_graficas">

	<div class="espacio_btn_graficas">
		<div id="btnTablaLoc" class="btnMas">
			<i class="fa-solid fa-table-cells"></i>
			Tabla Localidades
			<i class="fa-regular fa-eye"></i>
		</div>

		<div id="btnGraficasLoc" class="btnMas">
			<i class="fa-solid fa-chart-simple"></i> 
			Gráficas Localidades
			<i class="fa-regular fa-eye"></i>
		</div>

	</div>

	

	<table class='resultados_loc_hidden'>
		<tr>
			<th>Localidad</th>
			<th>Cantidad</th>
			<th>Monto ANR</th>
		<tr>
		
			
			<?php foreach ($registros_localidad as $proyectos_localidad):?>

				<tr>
					<td><?php echo $proyectos_localidad->Localidad?></td>
					<td><?php echo $proyectos_localidad->Cantidad?></td>
					<td>$<?php if($proyectos_localidad->SUMA_ANR==NULL){echo 0;}else{echo $proyectos_localidad->SUMA_ANR;}?></td>
				</tr>
			<?php endforeach; ?>
			
			
				<tr>
					<td></td>
					<td>Total: <?php echo $cantidad ?></td>
					<td>Acumulado: $<?php echo $monto_acumulado?></td>
				</tr>
		</table>

	<?php include('./graficas/Espacio_Graficas_Localidades.php');?>

</div>








	<table class='resultadosFiltrados'>
  			<tr>
  				<td class="titulos">#</td>
				<td class="titulos">Codigo</td>
				<td class="titulos">Modalidad</td>
				<td class="titulos titulo-fijo">Titulo</td>
				<td class="titulos">Beneficiario</td>
				<td class="titulos">Correo Beneficiario</td>
				<td class="titulos">Departamento Beneficiario</td>
				<td class="titulos">Localidad Beneficiario</td>
				<td class="titulos">Director</td>
				<td class="titulos">Correo Director</td>
				<td class="titulos">Organizacion Vinculante</td>
				<td class="titulos">Correo Organizacion Vinculante</td>
				<td class="titulos">Monto ANR</td>
				<td class="titulos">Convocatoria</td>
				<td class="titulos">Año</td>
				<td class="titulos">Admisibilidad</td>
				<td class="titulos">Financiacion</td>
				<td class="titulos">Puntaje</td>
			</tr>

  


<?php
	$i=1;
		foreach($registros as $proyecto):
		include("resaltar_textos.php");

		
		
		


		if($registros_por_pagina>0){
			$cant_por_pag = $registros_por_pagina;
		}else{
			$cant_por_pag = 20;
		}
		
			


		$cantidad;
		$ultima_pag = ceil($cantidad/$cant_por_pag);
		$pagina;


		if(isset($_POST['buscar'])&&!($_POST['buscar']=='Buscar')){
			if($_POST['buscar']=='›'){
				$pagina = $actual+1;
				}
			if($_POST['buscar']=='‹'){
				$pagina = $actual-1;
				}
			if($_POST['buscar']=='››'){
				$pagina = $ultima_pag;
				}

			if($_POST['buscar']=='‹‹'){
				$pagina = 1;
				}

			if($_POST['buscar']>0 && !(strpos($_POST['buscar'], ".")!==false)){
				$pagina = $_POST['buscar'];
				}

			if((strpos($_POST['buscar'], ".")!==false)){
				$pagina = 1;
				$cant_por_pag = substr($_POST['buscar'],0,-7);
			}


		}elseif($_POST['buscar']=='Buscar'){
			$pagina=1;
		}

		
	



			
			
			$inf = ((($pagina-1)*$cant_por_pag))+1;
			if($pagina*$cant_por_pag<$cantidad){
				$sup = ($pagina*$cant_por_pag);
			}else{
				$sup = $cantidad;
			}
			
			
			if($i>=$inf && $i<=$sup){
			?>



		<tr tabindex="2">
			<td class="filas"><?php echo $i;?></td>
			<td class="filas"><?php echo $Codigo;?></td>
			<td class="filas"><?php echo $Modalidad?></td>
			<td class="filas"><?php echo $Titulo?></td>
			<td class="filas"><?php echo $Beneficiario?></td>
			<td class="filas"><?php echo $proyecto->Beneficiario_Correo?></td>
			<td class="filas"><?php echo $Departamento?></td>
			<td class="filas"><?php echo $Localidad?></td>
			<td class="filas"><?php echo $Director?></td>
			<td class="filas"><?php echo $proyecto->Director_Correo?></td>
			<td class="filas"><?php echo $Organizacion_Vinculante?></td>
			<td class="filas"><?php echo $proyecto->Organizacion_Vinculante_Correo?></td>
			<td class="filas"><?php if($proyecto->Monto_ANR!=NULL){echo "$";}?><?php echo $proyecto->Monto_ANR?></td>
			<td class="filas"><?php echo $Convocatoria?></td>
			<td class="filas"><?php echo $proyecto->Año?></td>
			<td class="filas"><?php echo $Admisibilidad?></td>
			<td class="filas"><?php echo $Financiacion?></td>
			<td class="filas"><?php echo $proyecto->Puntaje?></td>
		</tr>
		<?php
		 	}
			$i=$i+1;
		?>
	
	<?php
	endforeach;	
	?>
	


</table>

	<div class="btn_excel">
			<i class="fa-solid fa-file-excel"></i>
              <a href="export-Excel.php" target="_BLANK"> Descargar Excel </a>


</div>


	




	<?php if ($cantidad>0){ ?>


	<div class="contenedor_paginacion">

		<?php if($pagina>1){?>
		<input class="pagina" type="submit" name="buscar" value="‹‹">
		<input class="pagina" type="submit" name="buscar" value="‹">
			<?php if($pagina-2>=1){?>
				<input class="pagina" type="submit" readonly name="buscar" value="<?php echo $pagina-2;?>"/>
			<?php }?>
		<input class="pagina" type="submit" readonly name="buscar" value="<?php echo $pagina-1;?>"/>
		<?php }?>

		
		
		<input class="pagina" type="text" readonly name="actual" value="<?php echo $pagina;?>" />
		


		<?php if($pagina<$ultima_pag){?>
		<input class="pagina" type="submit" readonly name="buscar" value="<?php echo $pagina+1;?>"/>
			<?php if($pagina+2<=$ultima_pag){?>
				<input class="pagina" type="submit" readonly name="buscar" value="<?php echo $pagina+2;?>"/>
			<?php }?>
		<input class="pagina" type="submit" name="buscar" value="›">
		<input class="pagina" type="submit" name="buscar" value="››"> 


		<?php } ?>

				<div class="tabla_menu_cant_pag">
					<div class="texto_reg_hoja">Registros por hoja:</div>
		        <ul id="menu_cant_pag">
		          <li><input class="cant_pag" type="text" readonly name="registros_por_pagina" value="<?php echo $cant_por_pag?>"/>
		            <ul>
		              <li><input class="cant_pag" type="submit" readonly name="buscar" value=" 20      ."/></li>
		              <li><input class="cant_pag" type="submit" readonly name="buscar" value=" 50      ."/></li>
		              <li><input class="cant_pag" type="submit" readonly name="buscar" value="100      ."/></li>
		              <li><input class="cant_pag" type="submit" readonly name="buscar" value="500      ."/></li>
		            </ul>
		          </li>
		        </ul>
		      </div>

	</div>	


	<?php } ?>

			



	</form>





<br><br><br><br><br><br><br><br><br> <br><br><br>

    
<script>

	<?php 

	$palabra1 =  str_replace("+","&mas&",$palabra1);
	$palabra2 =  str_replace("+","&mas&",$palabra2);
	$palabra3 =  str_replace("+","&mas&",$palabra3);
	$palabra4 =  str_replace("+","&mas&",$palabra4);
	$palabra5 =  str_replace("+","&mas&",$palabra5);

	?>

	document.cookie = "palabra1=<?php echo $palabra1;?>";
	document.cookie = "palabra2=<?php echo $palabra2;?>";
	document.cookie = "palabra3=<?php echo $palabra3;?>";
	document.cookie = "palabra4=<?php echo $palabra4;?>";
	document.cookie = "palabra5=<?php echo $palabra5;?>";
	document.cookie = "columna1=<?php echo $columna1;?>";
	document.cookie = "columna2=<?php echo $columna2;?>";
	document.cookie = "columna3=<?php echo $columna3;?>";
	document.cookie = "columna4=<?php echo $columna4;?>";
	document.cookie = "columna5=<?php echo $columna5;?>";

	document.cookie = "a=<?php echo $a; ?>";
	document.cookie = "f=<?php echo $f; ?>";
	document.cookie = "m=<?php echo $m; ?>";

	document.cookie = "aMin=<?php echo $aMin; ?>";
	document.cookie = "aMax=<?php echo $aMax; ?>";

	document.cookie = "modo=<?php echo $modo; ?>";
</script>