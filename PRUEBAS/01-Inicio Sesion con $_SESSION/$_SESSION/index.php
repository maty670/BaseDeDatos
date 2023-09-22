<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title></title>
</head>
<body>


<form action="comprobar_login" method="post">
	
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
				<input type="submit" name="enviar" value="LOGIN">
			</td>
		</tr>


	</table>

</form>


</body>
</html>