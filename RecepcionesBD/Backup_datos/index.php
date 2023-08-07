
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" type="text/css" href="box_confirmar_eliminar.css">
	<link rel="stylesheet" type="text/css" href="loader.css">
	<title></title>
</head>

<body>

		<div class="contenedor_titulo_general">
			<div class="titulo">Copia y Restauración de datos</div>
			<div class="texto"></div>
		</div>


		<div class="contenedorCuadros_GuardarRestaurar">
				<div class="cuadro_guardar">
					<fieldset>
						<legend class="subtitulo">Guardar copia de seguridad de los datos actuales</legend>
							<fieldset class="fieldset_form_guardar">
							    <legend>Título de la copia</legend>
							    <input type="text"   id="titulo_backup" placeholder="Ingrese un titulo (opcional)" class="titulo_backup">
							    <input type="button" class="btn_guardar" value="Guardar"> 
							</fieldset>
					</fieldset>
				</div>
				


					<?php 

						require("../conexion2.php");
						$conexion = $base->query("SELECT *,DATE_FORMAT(`fecha`, '%d %M %Y - %k:%i:%s') AS fecha_format FROM `registros_backups` ORDER BY `fecha` DESC");
						$registros = $conexion->fetchAll(PDO::FETCH_OBJ);

						function parse_fecha($fecha){
							
							//Reemplazamos la A y a
							$fecha = str_replace(
							array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
							array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Nomviembre', 'Diciembre'),
							$fecha
							);

							return $fecha;
						}

					?>

				<div class="cuadro_restaurar">
					<fieldset>
						<legend class="subtitulo">Restaurar copia de seguridad</legend>
						<div class="tabla_copias">
							<table>
								<tr class="subtitulo_tabla">
									<td></td>
									<td>Fecha de creación</td>
									<td>Datos de la copia</td>
									<td>Título de la copia</td>
									<td></td>
								</tr>

								<?php foreach($registros as $r):?>
								<tr class="datos_tabla">
									<td><img src="iconos/circle-solid.svg"></td>
									<td class="dato dato_fecha"><?php echo parse_fecha($r->fecha_format);?></td>
									<td class="dato"><?php 
												echo "<b>Uvt: </b>" . count(explode( ',', $r->lista_uvt )) . ", ";
												echo "<b>Convocatorias: </b>" . count(explode( ',', $r->lista_convocatorias )) . ", ";
												echo "<b>Proyectos: </b>" . $r->cantidad_proyectos;  
										?>
									</td>
									<td class="dato"><?php echo $r->titulo_backup?></td>
									<td class="dato_dropdown">
											<div class="dropdown">
											  <input type="button" onclick="myFunction(<?php echo $r->id?>)" class="dropbtn" value="">
											  <div id="<?php echo "myDropdown" . $r->id?>" class="dropdown-content">
											    <input type="button" name="restaurar" value="Restaurar" class="btn_restaurar" id="<?php echo $r->id?>">
												<input type="button" name="eliminar" value="Eliminar" class="btn_eliminar" id="<?php echo $r->id?>">
												<input type="button" name="vermas" value="Ver mas detalles" class="btn_vermas" id="<?php echo $r->id?>">
											  </div>
											</div>
									</td>
								</tr>
								<?php endforeach;?>	
								
							</table>
						</div>
					</fieldset>
				</div>	
				
		</div>


		



			<?php 
			//include ("guardar_copia.php");

			?>

		<div class="contenedor" id="contenedor_confirmar">
			<div class="contenedor_cuadro">
				<div class="cabecera">
					<img src="iconos/x_cancel.svg" class="img_cancel">
					<div class="texto">¡Atención!</div>
				</div>
				<div class="texto_confirmacion_mensaje" id="texto_confirmacion_mensaje"></div>
				<div class="texto_confirmacion_fecha" id="texto_confirmacion_fecha"></div>
				<div class="contenedor_botones">
					<form method="post" action="" id="form_confirmar">
						<input type="submit" name="confirmar" class="confirmar" value="Confirmar">
					</form>
					<input type="button" name="cancelar" class="cancelar" value="Cancelar" id="btn_cancelar">
				</div>
			</div>
		</div>




	

	

<script type="text/javascript" src="restaurar_eliminar_copia/cuadro_confirmar_accion.js"></script>
<script type="text/javascript" src="guardar_copia/guardar_copia.js"></script>
<script type="text/javascript">
function myFunction(id) {
  document.getElementById(`myDropdown${id}`).classList.toggle("show");
}


/*window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}*/

window.onclick = function(event) {

	var dropdowns = document.getElementsByClassName("dropdown-content");
	 for (i = 0; i < dropdowns.length; i++) {
	 	var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
	 }
	 myFunction(event.target.nextElementSibling.firstElementChild.id);
}


</script>







</body>
</html>



