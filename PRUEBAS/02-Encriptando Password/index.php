<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title></title>
</head>
<body>


<form action="comprobar_registro" method="post">
	
	<h2>Registro de Usuario</h2>

	<table>
		<tr>
			<td class="usuario">
				<input type="text" autocomplete="off" name="usuario" placeholder="Usuario">
			</td>
		</tr>
		<tr>
			<td class="contraseña">
				<input type="password" name="password" placeholder="Contraseña">
			</td>
		</tr>
		<tr>
			<td class="enviar" colspan="2">
				<input type="submit" name="enviar" value="REGISTRAR">
			</td>
		</tr>
	</table>

	

</form>

<form action="comprobar_login" method="post">
	
	<h2>Login de usuario</h2>

	<table>
		<tr>
			<td class="usuario">
				<input type="text" autocomplete="off" name="usuario_login" placeholder="Usuario">
			</td>
		</tr>
		<tr>
			<td class="contraseña">
				<input type="password" name="password_login" placeholder="Contraseña">
			</td>
		</tr>
		<tr>
			<td class="enviar" colspan="2">
				<input type="submit" name="LOGIN" value="LOGIN">
			</td>
		</tr>
	</table>

</form>


</body>
</html>