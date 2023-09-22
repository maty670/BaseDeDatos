<?php 
	foreach ($registros_cantidad as $proyectos_cantidad):
	$cantidad=$proyectos_cantidad->Cantidad;
	endforeach;

	foreach ($registros_monto as $proyectos_monto):
	if($proyectos_monto->monto==NULL){$monto_acumulado=0;}else{
	$monto_acumulado=$proyectos_monto->monto;}
	endforeach;


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


<div class="contenedor_tabla">
	<table class='tabla_resultados'>
				<tr>
					<td class="titulo">#</td>
					<td class="titulo w1">Codigo</td>
					<td class="titulo w1">Modalidad</td>
					<td class="titulo w3"><textarea>Titulo</textarea></td>
					<td class="titulo w3"><textarea>Beneficiario</textarea></td>
					<td class="titulo w1">Correo Beneficiario</td>
					<td class="titulo w3">Departamento Beneficiario</td>
					<td class="titulo w3">Localidad Beneficiario</td>
					<td class="titulo w2">Director</td>
					<td class="titulo w1">Correo Director</td>
					<td class="titulo w3">Organizacion Vinculante</td>
					<td class="titulo w1">Correo Organizacion Vinculante</td>
					<td class="titulo w2">Monto ANR</td>
					<td class="titulo w2">Convocatoria</td>
					<td class="titulo w1">Año</td>
					<td class="titulo w2">Admisibilidad</td>
					<td class="titulo w2">Financiacion</td>
					<td class="titulo w1">Puntaje</td>
				</tr>
	</table>
</div>