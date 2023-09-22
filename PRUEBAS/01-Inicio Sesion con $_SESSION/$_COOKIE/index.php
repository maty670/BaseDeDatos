<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	

	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
	
	<title></title>
</head>
<body>


	
	<?php 
		$recordar=false;

		if (isset($_COOKIE['usuario'])){
			$recordar=true;
			$usuario_r = $_COOKIE['usuario'];
			$contraseña_r = $_COOKIE['contraseña'];
		}
	?>

<form method="post" action="comprobar_login.php">
<div class="tabla_container">	
	<table>
		<tr>
			<th colspan="2">Inicio de Sesion</th>
		</tr>
		<tr class="fila_usuario">
			<td class="td_span"><span>Usuario</span></td><td><input required type="text" name="usuario" value=<?php if($recordar) echo $usuario_r ?> ></td>
		</tr>
		<tr class="fila_contraseña">
			<td class="td_span"><span>Contraseña</span></td><td><input required type="password" name="contraseña" value=<?php if($recordar) echo $contraseña_r ?> ></td>
		</tr>
		<tr class="fila_recordar">
			<td class="td_span"><span>Recordar</span></td><td><input type="checkbox" name="recordar" <?php if($recordar) echo "checked"?>></td>
		</tr>
		<tr class="fila_aceptar">
			<td colspan="3"><input type="submit" name="aceptar"></td>
		</tr>
	</table>
</div>
</form>



<?php 





?>

</body>
</html>