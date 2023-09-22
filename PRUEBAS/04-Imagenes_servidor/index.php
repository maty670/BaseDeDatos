<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

<style type="text/css">
	
	table{
		width: 450px;
		border: 1px dotted #FF0000;
		position: absolute;
		top: 45%;
		left: 38%;
	}

</style>

</head>
<body>


	<form action="datosImagen.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label for="imagen">Imagen:</label></td>
				<td><input type="file" name="imagen" size="20"></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center;">
					<input type="submit" value="Enviar Imagen">
				</td>
			</tr>
		</table>
	</form>

</body>
</html>