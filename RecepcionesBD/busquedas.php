<?php 

	include("conexion2.php");

	$conexion=$base->query("SELECT `Convocatoria`,`Año` FROM `recepciones` GROUP BY `Convocatoria`,`Año` ORDER BY `Convocatoria`,`Año`");
	$resultados_convocatorias=$conexion->fetchAll(PDO::FETCH_OBJ);

	$conexion=$base->query("SELECT `UVT` FROM `recepciones` GROUP BY `UVT` ORDER BY `UVT`");
	$resultados_UVT=$conexion->fetchAll(PDO::FETCH_OBJ);


	$conexion=$base->query("SELECT `UVT`,GROUP_CONCAT( DISTINCT `Convocatoria`,'&',`Año` ORDER BY `Convocatoria`,`Año` ASC) AS Convocatorias
							FROM `recepciones`
							GROUP BY `UVT`");
	$resultados_convocatorias_por_uvt=$conexion->fetchAll(PDO::FETCH_OBJ);

	



	//Busqueda por criterios
	$opt_estado = "";
	if(isset($_POST['estado'])){
		$opt_estado = $_POST['estado']; 
	}

	$opt_convocatoria = "";
	if(isset($_POST['nombre_convocatoria'])){
		$opt_convocatoria = $_POST['nombre_convocatoria']; 
	}

	$opt_UVT = "";
	if(isset($_POST['nombre_uvt'])){
		$opt_UVT = $_POST['nombre_uvt']; 
	}







	//Busqueda por palabra clave
	$palabra_clave = "";
	if(isset($_POST['palabra_clave'])){
		$palabra_clave = $_POST['palabra_clave'];
	}

	$columna = "";
	if(isset($_POST['columna_palabra'])){
		$columna = $_POST['columna_palabra'];
	}








	

?>


<div class="contenedor_Busquedas">
	<div class="titulo_busqueda">
		<h3 id="criterios" class="criterios">BÚSQUEDA GENERAL</h3>
		<h3 id="palabra">BÚSQUEDA POR PALABRA CLAVE</h3>
	</div>
	<div class="contenedor_Convocatorias">
		<form method="post" id="form_criterios">

			<div class="contenedor_select">
				<select name="nombre_uvt" id="nombre_uvt" onfocus='this.size=7;'onblur='this.size=1;' onchange='this.size=1;this.blur()'>
					<option class="opcion_todas">Todas las UVT</option>
					<?php 
							foreach ($resultados_UVT as $r):
								if($opt_UVT == $r->UVT){
									echo '<option selected>' . $r->UVT .  '</option>';
								}else{
									echo '<option>' . $r->UVT .  '</option>';
								}
							endforeach;	
					?>
				</select>
			</div>


			<div class="contenedor_select contenedor_fechas">
				<div>
					<label for="fechaDesde">Desde</label>
					<input type="number" name="fechaDesde" class="fechaDesde" id="fechaDesde" min="2000" max="2100" step="1" value="<?php echo isset($_POST['fechaDesde']) ?$_POST['fechaDesde'] : '2020' ?>">
				</div>
				<div>
					<label for="fechaHasta">Hasta</label>
					<input type="number" name="fechaHasta" class="fechaHasta" id="fechaHasta" min="2000" max="2100" step="1" value="<?php echo isset($_POST['fechaHasta']) ?$_POST['fechaHasta'] : '2023' ?>">
				</div>
				
			</div>



			<div class="contenedor_select" id="contenedor_nombre_convocatoria">
				<select id="nombre_convocatoria" name="nombre_convocatoria" onfocus='this.size=7;'onblur='this.size=1;' onchange='this.size=1; this.blur()'>
					<option>Todas las convocatorias</option>
				</select>
			</div>

			<script type="text/javascript">
				uvt_seleccionada = document.getElementById("nombre_uvt");
				fechaDesde = document.getElementById("fechaDesde");
				fechaHasta = document.getElementById("fechaHasta");


				registros_convocatorias = JSON.stringify(<?php echo json_encode($resultados_convocatorias);?>).replace(/null/g,'""');
				registros_convocatorias = JSON.parse(registros_convocatorias);

				registros_convocatorias_por_uvt = JSON.stringify(<?php echo json_encode($resultados_convocatorias_por_uvt);?>).replace(/null/g,'""');
				registros_convocatorias_por_uvt = JSON.parse(registros_convocatorias_por_uvt);






				async function actualizar(fechaD,fechaH,uvt) {

					eliminar_opciones = new Promise((resolve, reject) => {
						select = document.getElementById("nombre_convocatoria");
						select.remove();
						resolve("resolved");
					});


					agregar_opciones = new Promise((resolve,reject)=>{

						const nuevo_select = document.createElement('select');
						nuevo_select.id="nombre_convocatoria";
						nuevo_select.name="nombre_convocatoria";

						nuevo_select.setAttribute("onfocus", "this.size=7");
						nuevo_select.setAttribute("onblur", "this.size=1");
						nuevo_select.setAttribute("onchange", "this.size=1,this.blur()");

						opt = document.createElement('option');
						opt.value =  "Todas las convocatorias";
						opt.innerHTML = "Todas las convocatorias";
						nuevo_select.appendChild(opt);


						if(uvt=='Todas las UVT'){
							for(i=0;i<registros_convocatorias.length;i++){
									if(registros_convocatorias[i].Año >= fechaD && registros_convocatorias[i].Año <= fechaH){
										opt = document.createElement('option');
										opt.value =  registros_convocatorias[i].Convocatoria + " " + registros_convocatorias[i].Año;
										opt.innerHTML = registros_convocatorias[i].Convocatoria + " " + registros_convocatorias[i].Año;

										opt_convocatoria = JSON.stringify(<?php echo json_encode($opt_convocatoria);?>).replace(/null/g,'""');
										opt_convocatoria = JSON.parse(opt_convocatoria);
										if(opt.value == opt_convocatoria){
											opt.selected="true";
										}
										
										nuevo_select.appendChild(opt);		
									}
							}
						}else{
							for(i=0;i<registros_convocatorias_por_uvt.length;i++){
								if(registros_convocatorias_por_uvt[i].UVT==uvt){
									Convocatorias = registros_convocatorias_por_uvt[i].Convocatorias.split(",");
									for(j=0;j<Convocatorias.length;j++){
										convocatoria = Convocatorias[j].split("&");
										año = convocatoria[(convocatoria.length) - 1];
										if(año>=fechaD && año <= fechaH){

											opt = document.createElement('option');
											opt.value =  convocatoria[0] + " " + convocatoria[1];
											opt.innerHTML = convocatoria[0] + " " + convocatoria[1];

											opt_convocatoria = JSON.stringify(<?php echo json_encode($opt_convocatoria);?>).replace(/null/g,'""');
											opt_convocatoria = JSON.parse(opt_convocatoria);
											if(opt.value==opt_convocatoria){
												opt.selected="true";
											}

											nuevo_select.appendChild(opt);
										}
									}
								}
							}
						}












						const contenedor_select = document.getElementById("contenedor_nombre_convocatoria");
						contenedor_select.appendChild(nuevo_select);
						resolve("resolved");



					});


					let eliminar = await eliminar_opciones;
					let agregar = await agregar_opciones;

						
				}







				actualizar(fechaDesde.value,fechaHasta.value,uvt_seleccionada.value);







				uvt_seleccionada.addEventListener("change",()=>{
					uvt_seleccionada = document.getElementById("nombre_uvt");
					fechaDesde = document.getElementById("fechaDesde");
					fechaHasta = document.getElementById("fechaHasta");
					actualizar(fechaDesde.value,fechaHasta.value,uvt_seleccionada.value);

					select = document.getElementById("nombre_convocatoria");
					select.style.backgroundColor="#cce";
					setTimeout(function () {
						select.style.backgroundColor=null;
					}, 200);

				})



				fechaDesde.addEventListener("change",()=>{
					uvt_seleccionada = document.getElementById("nombre_uvt");
					fechaDesde = document.getElementById("fechaDesde");
					fechaHasta = document.getElementById("fechaHasta");
					actualizar(fechaDesde.value,fechaHasta.value,uvt_seleccionada.value);

					select = document.getElementById("nombre_convocatoria");
					select.style.backgroundColor="#cce";
					setTimeout(function () {
						select.style.backgroundColor=null;
					}, 200);

				})

				fechaHasta.addEventListener("change",()=>{
					uvt_seleccionada = document.getElementById("nombre_uvt");
					fechaDesde = document.getElementById("fechaDesde");
					fechaHasta = document.getElementById("fechaHasta");
					actualizar(fechaDesde.value,fechaHasta.value,uvt_seleccionada.value);

					select = document.getElementById("nombre_convocatoria");
					select.style.backgroundColor="#cce";
					setTimeout(function () {
						select.style.backgroundColor=null;
					}, 200);
				})
				


				

			</script>

			


			

			<div class="contenedor_select">
				<select name="estado" id="estado">
					<option <?php if($opt_estado == 'Cualquier estado' || $opt_estado == ''){echo("selected");}?>>Cualquier estado</option>
					<option <?php if($opt_estado == 'INICIAL'){echo("selected");}?>>INICIAL</option>
					<option <?php if($opt_estado == 'DE AVANCE'){echo("selected");}?>>DE AVANCE</option>
					<option <?php if($opt_estado == 'RENUNCIO'){echo("selected");}?>>RENUNCIO</option>
					<option <?php if($opt_estado == 'FINAL'){echo("selected");}?>>FINAL</option>
					<option <?php if($opt_estado == 'INTIMAR'){echo("selected");}?>>INTIMAR</option>
					<option <?php if($opt_estado == 'VENCIDOS'){echo("selected");}?>>VENCIDOS</option>
				</select>
			</div>

			<div class="contenedor_input">
				<input type="submit" name="btn_buscar_criterios" value="Buscar">
			</div>
		</form>






		<form method="post" id="form_palabra">
			<div class="input_palabra_clave"> 
				<input type="text" autocomplete="off" name="palabra_clave" placeholder="Palabra a buscar" value=<?php echo $palabra_clave;?>>
				<select name="columna_palabra" id="columna_palabra">
					<option <?php if($columna == 'Codigo' || $opt_estado == ''){echo("selected");}?> value="Codigo">Código</option>
					<option <?php if($columna == 'Director'){echo("selected");}?> value="Director">Director</option>
					<option <?php if($columna == 'Expte_Pago'){echo("selected");}?> value="Expte_Pago">Expediente Pago</option>
					<option <?php if($columna == 'Resol_Pago'){echo("selected");}?> value="Resol_Pago">Resolución Pago</option>
					<option <?php if($columna == 'Expte_Rend'){echo("selected");}?> value="Expte_Rend">Expediente Rend</option>
					<option <?php if($columna == 'Observacion'){echo("selected");}?> value="Observacion">Observación</option>
					<option <?php if($columna == 'Pase_DGA'){echo("selected");}?> value="Pase_DGA">Pase DGA</option>
				</select>
			</div>
			<div class="contenedor_input">
				<input type="submit" name="btn_buscar_palabra" value="Buscar">
			</div>
			
		</form>







	</div>
</div>





<?php
	if(isset($_POST["btn_buscar_criterios"])){



		if($_POST['nombre_uvt']=="Todas las UVT"){
			$UVT = "";
		}else{
			$UVT = $_POST['nombre_uvt'];
		}

		$fechaDesde = $_POST["fechaDesde"];
		$fechaHasta = $_POST["fechaHasta"];




		if($_POST['nombre_convocatoria']=="Todas las convocatorias"){
			$nombre_convocatoria="";
			$año_convocatoria = "";
			$convocatoria = "";
		}else{

			$convocatoria = preg_split ("/[\s,]+/", $_POST['nombre_convocatoria']);
			$nombre_convocatoria="";

			for($i=0;$i<count($convocatoria)-1;$i++){

				if($i==0){
					$nombre_convocatoria = $convocatoria[$i];
				}elseif($i>0){
					$nombre_convocatoria = $nombre_convocatoria . " " . $convocatoria[$i];
				}
					
			}

			$año_convocatoria = $convocatoria[count($convocatoria)-1];
			$convocatoria = $nombre_convocatoria . " " . $año_convocatoria;


		}

			if($_POST['estado']=="Cualquier estado"){
				$estado = "";
			}else if($_POST['estado']=="INICIAL" || $_POST['estado']=="DE AVANCE" || $_POST['estado']=="FINAL" || $_POST['estado']=="RENUNCIO"){
				$estado = " AND `Presento_Final` LIKE '" . $_POST['estado'] . "' ";
			}else if($_POST['estado']=="INTIMAR"){
				$estado = "AND (`Inicio` IS NOT NULL)
						   AND(`Presento_Final`IS NULL OR `Presento_Final`='INICIAL' OR `Presento_Final`='DE AVANCE')
						   AND(
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 0 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R1` IS NULL AND `I1`=0) OR
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 3 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R2` IS NULL AND `I2`=0) OR
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 6 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R3` IS NULL AND `I3`=0) OR
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 9 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R4` IS NULL AND `I4`=0) OR
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 12 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R5` IS NULL AND `I5`=0) OR
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 15 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R6` IS NULL AND `I6`=0) OR 
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 18 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R7` IS NULL AND `I7`=0) OR 
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 21 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R8` IS NULL AND `I8`=0) OR
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 24 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R9` IS NULL AND `I9`=0) 
							)";
			}else if($_POST['estado']=="VENCIDOS"){
				$estado = "AND (DATEDIFF(`Fecha_Vencimiento`, CURRENT_TIMESTAMP) > 0)";
			}

		
			include("conexion2.php");
			$conexion=$base->query("SELECT *,DATEDIFF(`Fecha_Vencimiento`,CURRENT_TIMESTAMP) AS Vencido,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 0 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF1,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 3 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF2,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 6 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF3,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 9 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF4,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 12 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF5,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 15 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF6,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 18 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF7,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 21 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF8,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 24 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF9

						FROM `recepciones` 

						WHERE `Convocatoria` LIKE '%$nombre_convocatoria%' AND `Año` LIKE '%$año_convocatoria%' AND `Año` >= $fechaDesde AND `Año` <= $fechaHasta
						AND `UVT` LIKE '%$UVT%'"
						. $estado .

						"ORDER BY `UVT`,`Convocatoria`,`Año`");



			$registros=$conexion->fetchAll(PDO::FETCH_OBJ);

			include("resaltar_texto.php"); 
			include ("exportar_archivos/btn_exportar.php");


				
				?>
				<div class="tabla_resultados" id="tabla_resultados">
					<table>
						<tr>
							<th colspan="11">RESULTADOS DE LA BUSQUEDA</th>
						</tr>

						<tr class="titulos_filas">
							<td>UVT</td>
							<td>Convocatoria</td>
							<td>Código</td>
							<td>Director</td>
							<td>Estado</td>
							<td>Fecha Vencimiento</td>
							<td>Rendiciones a Intimar</td>
							<td>Link al proyecto</td>								
						</tr>

						<?php 
						foreach($registros as $r):



							$listado_rend_intimar = "";

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R1=="" &&
									$r->I1==0 &&
									$r->DIF1=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R1 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R2=="" &&
									$r->I2==0 &&
									$r->DIF2=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R2 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R3=="" &&
									$r->I3==0 &&
									$r->DIF3=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R3 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R4=="" &&
									$r->I4==0 &&
									$r->DIF4=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R4 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R5=="" &&
									$r->I5==0 &&
									$r->DIF5=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R5 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R6=="" &&
									$r->I6==0 &&
									$r->DIF6=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R6 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R7=="" &&
									$r->I7==0 &&
									$r->DIF7=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R7 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R8=="" &&
									$r->I8==0 &&
									$r->DIF8=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R8 ";
								}

								

								 

						?>
						<tr class="filas" tabindex="2">
							<td id="UVT"><?php
							if($UVT!=""){
								echo resaltar_frase($r->UVT,$opt_UVT);
							}else{
								echo $r->UVT;
							}
							?></td>
							<td id="Convocatoria"><?php
							if($convocatoria!=""){
								echo resaltar_frase($nombre_convocatoria,$nombre_convocatoria) . resaltar_frase(" "," ") . resaltar_frase($año_convocatoria,$año_convocatoria);
							}else{
								echo $r->Convocatoria . " " . $r->Año;
							}
							?></td>
							<td id="Codigo"><?php echo $r->Codigo;?></td>
							<td id="Director"><?php echo $r->Director;?></td>
							<td id="Estado" class="<?php

							if ($r->Presento_Final=='INICIAL') {
								echo 'colorInicial';
							}elseif ($r->Presento_Final=='DE AVANCE') {
								echo 'colorDeAvance';
							}elseif ($r->Presento_Final=='FINAL') {
								echo 'colorFinal';
							}elseif ($r->Presento_Final=='RENUNCIO') {
								echo 'colorRenuncio';
							}


							?>">

							<?php
								echo $r->Presento_Final;
							?>
							

							</td>

							<td id="Fecha_Vencimiento" class=<?php if($r->Vencido<=0) echo "colorVencido"?> ><?php echo $r->Fecha_Vencimiento ?></td>


							<td id="Intimar"><?php echo $listado_rend_intimar;?></td>



							<td id="link">
								<a href="./Recepciones/?UVT=<?php echo $r->UVT?>&CONV=<?php echo str_replace(' ', '', $r->Convocatoria . $r->Año)?>">
									<img src="./iconos/arrow-right-circle.svg" class="link">
								</a>
							</td>

						</tr>

						<?php endforeach; ?>

					</table>
				</div>


				<?php include("conexion2.php"); 

				$conexion=$base->query("SELECT  COUNT(`UVT`) AS T,
												COUNT(CASE WHEN `Presento_Final` IS NULL THEN 1
										             ELSE NULL
										             END) AS N,
												COUNT(CASE WHEN `Presento_Final` = 'INICIAL' THEN 1
										             ELSE NULL
										             END) AS I,
										        COUNT(CASE WHEN `Presento_Final` = 'DE AVANCE' THEN 1
										             ELSE NULL
										             END) AS DA,
												COUNT(CASE WHEN `Presento_Final` = 'FINAL' THEN 1
										             ELSE NULL
										             END) AS F,
										        COUNT(CASE WHEN `Presento_Final` = 'RENUNCIO' THEN 1
										             ELSE NULL
										             END) AS R,
										        COUNT(CASE WHEN DATEDIFF(`Fecha_Vencimiento`, CURRENT_TIMESTAMP) <= 0 THEN 1
										             ELSE NULL
										             END) AS V
										FROM `recepciones`
										WHERE `Convocatoria` LIKE '%$nombre_convocatoria%' 
										AND `Año` LIKE '%$año_convocatoria%' AND `Año` >= $fechaDesde AND `Año` <= $fechaHasta
										AND `UVT` LIKE '%$UVT%' $estado");

				$registros_filtroEstado=$conexion->fetchAll(PDO::FETCH_OBJ);






				$conexion=$base->query("SELECT
										COUNT(CASE WHEN DATEDIFF(`Fecha_Vencimiento`, CURRENT_TIMESTAMP) <= 0 THEN 1
										ELSE NULL
										END) AS T,
										COUNT(CASE WHEN `Presento_Final` IS NULL AND DATEDIFF(`Fecha_Vencimiento`, CURRENT_TIMESTAMP) <= 0 THEN 1
										ELSE NULL
										END) AS N,
										COUNT(CASE WHEN `Presento_Final` = 'INICIAL' AND DATEDIFF(`Fecha_Vencimiento`, CURRENT_TIMESTAMP) <= 0 THEN 1
										ELSE NULL
										END) AS I,
										COUNT(CASE WHEN `Presento_Final` = 'DE AVANCE' AND DATEDIFF(`Fecha_Vencimiento`, CURRENT_TIMESTAMP) <= 0 THEN 1
										ELSE NULL
										END) AS DA,
										COUNT(CASE WHEN `Presento_Final` = 'FINAL' AND DATEDIFF(`Fecha_Vencimiento`, CURRENT_TIMESTAMP) <= 0 THEN 1
										ELSE NULL
										END) AS F,
										COUNT(CASE WHEN `Presento_Final` = 'RENUNCIO' AND DATEDIFF(`Fecha_Vencimiento`, CURRENT_TIMESTAMP) <= 0 THEN 1
										ELSE NULL
										END) AS R
										FROM `recepciones`
										WHERE `Convocatoria` LIKE '%$nombre_convocatoria%' 
										AND `Año` LIKE '%$año_convocatoria%' AND `Año` >= $fechaDesde AND `Año` <= $fechaHasta
										AND `UVT` LIKE '%$UVT%' $estado");

				$registros_proyectos_vencidos=$conexion->fetchAll(PDO::FETCH_OBJ);





				
				?>

				<div class="tabla_cantidades">
					<table>

						<?php foreach ($registros_filtroEstado as $r_filtro): ?>
						<tr class="fila_estados_totales">
							<td><div class="titulo_total_resultados">Total resultados encontrados: <?php echo $r_filtro->T; ?></div></td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_blanco">Sin estado: <?php echo $r_filtro->N; ?> </td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_morado">INICIAL: <?php echo $r_filtro->I; ?></td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_amarillo">DE AVANCE: <?php echo $r_filtro->DA; ?></td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_verde">FINAL: <?php echo $r_filtro->F; ?></td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_rojo">RENUNCIO: <?php echo $r_filtro->R; ?></td>
						</tr>
						<?php endforeach;?>

						<?php foreach ($registros_proyectos_vencidos as $r_vencidos): ?>
						<tr class="fila_vencidos">
							<td><div class="titulo_total_vencidos">Total vencidos: <?php echo $r_vencidos->T; ?> </div></td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_blanco"> Vencidos: <?php echo $r_vencidos->N; ?> </td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_morado"> Vencidos: <?php echo $r_vencidos->I; ?></td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_amarillo"> Vencidos: <?php echo $r_vencidos->DA; ?></td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_verde"> Vencidos: <?php echo $r_vencidos->F; ?></td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_rojo"> Vencidos: <?php echo $r_vencidos->R; ?></td>
						</tr>
						<?php endforeach;?>

					</table>
				</div>
						


				
				


										
	<?php } ?>


































<?php
	if(isset($_POST["btn_buscar_palabra"])){

		



		
		include("conexion2.php");
		$conexion=$base->query("SELECT *,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 0 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF1,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 3 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF2,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 6 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF3,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 9 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF4,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 12 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF5,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 15 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF6,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 18 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF7,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 21 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF8,
						DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 24 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AS DIF9
					FROM `recepciones` 
					WHERE `$columna` LIKE '%$palabra_clave%' 
					ORDER BY `Convocatoria`,`Año`");


		$registros=$conexion->fetchAll(PDO::FETCH_OBJ);
		include("resaltar_texto.php");
		include ("exportar_archivos/btn_exportar.php");

				
				?>
				<div class="tabla_resultados" >
					<table>
						<tr>
							<th colspan="13">RESULTADOS DE LA BUSQUEDA</th>
						</tr>

						<tr class="titulos_filas">
							<td>UVT</td>
							<td>Convocatoria</td>
							<td>Código</td>
							<td>Director</td>
							<td>Estado</td>
							<td>Expte Pago</td>
							<td>Resol Pago</td>
							<td>Expte Rend</td>
							<td>Pase DGA</td>
							<td>Rendiciones a Intimar</td>
							<td>Observaciones</td>	
							<td>Link al proyecto</td>								
						</tr>

						<?php 
						foreach($registros as $r): 

							$listado_rend_intimar = "";

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R1=="" &&
									$r->I1==0 &&
									$r->DIF1=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R1 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R2=="" &&
									$r->I2==0 &&
									$r->DIF2=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R2 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R3=="" &&
									$r->I3==0 &&
									$r->DIF3=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R3 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R4=="" &&
									$r->I4==0 &&
									$r->DIF4=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R4 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R5=="" &&
									$r->I5==0 &&
									$r->DIF5=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R5 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R6=="" &&
									$r->I6==0 &&
									$r->DIF6=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R6 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R7=="" &&
									$r->I7==0 &&
									$r->DIF7=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R7 ";
								}

								if ($r->Presento_Final!="FINAL" && 
									$r->Presento_Final!="RENUNCIO" &&
									$r->R8=="" &&
									$r->I8==0 &&
									$r->DIF8=="1"){
									$listado_rend_intimar= $listado_rend_intimar . "R8 ";
								}

								

								

						?>
						<tr class="filas" tabindex="2">
							<td id="UVT"><?php echo $r->UVT;?></td>
							<td id="Convocatoria"><?php echo $r->Convocatoria . " " . $r->Año;?></td>
							<td id="Codigo">
								<?php if($columna=="Codigo"){
									echo resaltar_frase(eliminar_acentos($r->Codigo),$palabra_clave);
								}else{
									echo $r->Codigo;
								}
								?>
							</td>
							<td id="Director">
								<?php if($columna=="Director"){
									echo resaltar_frase(eliminar_acentos($r->Director),$palabra_clave);
								}else{
									echo $r->Director;
								}
								?>
							</td>
							<td id="Estado"><?php echo $r->Presento_Final;?></td>							
							
							<td id="Expte_Pago">
								<?php if($columna=="Expte_Pago"){
									echo resaltar_frase(eliminar_acentos($r->Expte_Pago),$palabra_clave);
								}else{
									echo $r->Expte_Pago;
								}
								?>
							</td>

							<td id="Resol_Pago">
								<?php if($columna=="Resol_Pago"){
									echo resaltar_frase(eliminar_acentos($r->Resol_Pago),$palabra_clave);
								}else{
									echo $r->Resol_Pago;
								}
								?>
							</td>
							<td id="Expte_Rend">
								<?php if($columna=="Expte_Rend"){
									echo resaltar_frase(eliminar_acentos($r->Expte_Rend),$palabra_clave);
								}else{
									echo $r->Expte_Rend;
								}
								?>
							</td>
							<td id="Pase_DGA">
								<?php if($r->Pase_DGA!=NULL){
										$fecha_pase = DateTime::createFromFormat("Y-m-d", $r->Pase_DGA);

    									if($columna=="Pase_DGA"){
    										echo resaltar_frase(eliminar_acentos($fecha_pase->format("d-m-Y"), "\n"),$palabra_clave);
    									}else{
    										echo $fecha_pase->format("d-m-Y"), "\n";
    									}
    							}?>
    						</td>

							<td id="Intimar"><?php echo $listado_rend_intimar;?></td>
							
							<td id="Observacion">
								<?php if($columna=="Observacion"){
									echo resaltar_frase(eliminar_acentos($r->Observacion),$palabra_clave);
								}else{
									echo $r->Observacion;
								}
								?>
							</td>
							<td id="link">
								<a href="./Recepciones/?UVT=<?php echo $r->UVT?>&CONV=<?php echo str_replace(' ', '', $r->Convocatoria . $r->Año)?>">
									<img src="./iconos/arrow-right-circle.svg" class="link">
								</a>
							</td>

						</tr>

						<?php endforeach; ?>

					</table>
				</div>


				<?php include("conexion2.php"); 

				$conexion=$base->query("SELECT  COUNT(`UVT`) AS T,
												COUNT(CASE WHEN `Presento_Final` IS NULL THEN 1
										             ELSE NULL
										             END) AS N,
												COUNT(CASE WHEN `Presento_Final` = 'INICIAL' THEN 1
										             ELSE NULL
										             END) AS I,
										        COUNT(CASE WHEN `Presento_Final` = 'DE AVANCE' THEN 1
										             ELSE NULL
										             END) AS DA,
												COUNT(CASE WHEN `Presento_Final` = 'FINAL' THEN 1
										             ELSE NULL
										             END) AS F,
										             COUNT(CASE WHEN `Presento_Final` = 'RENUNCIO' THEN 1
										             ELSE NULL
										             END) AS R
										FROM `recepciones`
										WHERE `$columna` LIKE '%$palabra_clave%'");

				$registros=$conexion->fetchAll(PDO::FETCH_OBJ);
				foreach ($registros as $r ):
				?>

				<div class="tabla_cantidades">
					<table>
						<tr>
							<td>Resultados encontrados: <?php echo $r->T; ?> </td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_blanco">Sin estado: <?php echo $r->N; ?> </td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_morado">INICIAL: <?php echo $r->I; ?></td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_amarillo">DE AVANCE: <?php echo $r->DA; ?></td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_verde">FINAL: <?php echo $r->F; ?></td>
							<td><img src="./iconos/circle-dot-solid.svg" class="circulo filtro_rojo">RENUNCIO: <?php echo $r->R; ?></td>
						</tr>
					</table>
				</div>

				<?php endforeach;?>
						
	<?php } ?>
