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

	<div class='resultados_conv_hidden'>
		<table>
			<tr tabindex="1" class="tr_titulo">
				<th>Convocatoria</th>
				<th>Año</th>
				<th>Cantidad</th>
				<th>Monto ANR</th>
			</tr>


			<?php foreach ($registros_convocatoria as $proyectos_convocatoria) : ?>

				<tr>
					<td><?php echo $proyectos_convocatoria->Convocatoria ?></td>
					<td><?php echo $proyectos_convocatoria->Año ?></td>
					<td><?php echo $proyectos_convocatoria->Cantidad ?></td>
					<td>$<?php if ($proyectos_convocatoria->SUMA_ANR == NULL) {
								echo 0;
							} else {
								echo $proyectos_convocatoria->SUMA_ANR;
							} ?></td>
				</tr>
			<?php endforeach; ?>


			<tr>
				<td></td>
				<td></td>
				<td>Total: <?php echo $cantidad ?></td>
				<td>Acumulado: $<?php echo $monto_acumulado ?></td>
			</tr>
		</table>
	</div>





	<?php include('./graficas/renderizar_graficas.php'); ?>
	<?php include('./graficas/Espacio_Graficas_Convocatorias.php'); ?>

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


	<div class='resultados_dep_hidden'>
		<table>
			<tr tabindex="1" class="tr_titulo">
				<th>Departamento</th>
				<th>Cantidad</th>
				<th>Monto ANR</th>
			<tr>


				<?php foreach ($registros_departamento as $proyectos_departamento) : ?>

			<tr>
				<td><?php echo $proyectos_departamento->Departamento ?></td>
				<td><?php echo $proyectos_departamento->Cantidad ?></td>
				<td>$<?php if ($proyectos_departamento->SUMA_ANR == NULL) {
							echo 0;
						} else {
							echo $proyectos_departamento->SUMA_ANR;
						} ?></td>
			</tr>
		<?php endforeach; ?>


		<tr>
			<td></td>
			<td>Total: <?php echo $cantidad ?></td>
			<td>Acumulado: $<?php echo $monto_acumulado ?></td>
		</tr>
		</table>
	</div>

	<?php include('./graficas/Espacio_Graficas_Departamentos.php'); ?>

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


	<div class='resultados_loc_hidden'>
		<table>
			<tr tabindex="1" class="tr_titulo">
				<th>Localidad</th>
				<th>Cantidad</th>
				<th>Monto ANR</th>
			<tr>


				<?php foreach ($registros_localidad as $proyectos_localidad) : ?>

			<tr>
				<td><?php echo $proyectos_localidad->Localidad ?></td>
				<td><?php echo $proyectos_localidad->Cantidad ?></td>
				<td>$<?php if ($proyectos_localidad->SUMA_ANR == NULL) {
							echo 0;
						} else {
							echo $proyectos_localidad->SUMA_ANR;
						} ?></td>
			</tr>
		<?php endforeach; ?>


		<tr>
			<td></td>
			<td>Total: <?php echo $cantidad ?></td>
			<td>Acumulado: $<?php echo $monto_acumulado ?></td>
		</tr>
		</table>
	</div>

	<?php include('./graficas/Espacio_Graficas_Localidades.php'); ?>

</div>