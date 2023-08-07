<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" type="text/css" href="estiloBusquedas.css">
	<link rel="stylesheet" type="text/css" href="exportar_archivos/btn_exportar.css">
	<script src="https://kit.fontawesome.com/8e82b560a5.js" crossorigin="anonymous"></script>
	<title>Recepciones</title>
</head>
<body background='../Recursos/fondo.jpg' id="body">



	<div class="contenedor_UVT">
		<div class="UVT nueva_UVT">
			<div class="icono" >+</div>
			<div class="formulario">
				<form action="" method="post" name="" id="">
					<textarea name="texto_Nueva_UVT" class="texto_Nueva_UVT" required></textarea> 
					<input type="submit" name="btn_Agregar_UVT" class="btn_Agregar_UVT" value="Agregar">
					<input type="button" class="btn_Cancelar_UVT" value="Cancelar">
				</form>
			</div>
		</div>
	</div>

	

	<?php include ("listar_UVTs.php")?>
	<?php include ("renombrar_uvt.php")?>
	<hr>
	<?php include ("busquedas.php")?>
	


	 
	

<script type="text/javascript" src="animacionNuevaUVT.js"></script>


</body>
</html>