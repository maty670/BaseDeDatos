<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
<style type="text/css">
	
	td{
		border:1px solid #FF0000;
	}

</style>

</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
	<table width="50%" border="0" align="center">
		<tr>
			<td class="primera_fila">Id</td>
			<td class="primera_fila">Nombre</td>
			<td class="primera_fila">Apellido</td>
			<td class="primera_fila">Direccion</td>
			<td class="sin">&nbsp</td>
			<td class="sin">&nbsp</td>
			<td class="sin">&nbsp</td>
		</tr>

		<?php foreach($matriz_personas as $persona):?>

				<tr>
					<td><?php echo $persona["id"]?></td>
					<td><?php echo $persona["nombre"]?></td>
					<td><?php echo $persona["apellido"]?></td>
					<td><?php echo $persona["direccion"]?></td>
				</tr>
		
		<?php endforeach;?>

		<tr>
			<td></td>
			<td><input type="text" name="Nom" size="10" class="centrado"></td>
			<td><input type="text" name="Ape" size="10" class="centrado"></td>
			<td><input type="text" name="Dir" size="10" class="centrado"></td>
			<td class="bot"><input type="submit" name="cr" id="cr" value="Insertar"></td>
		</tr>


	</table>
</form>


</body>
</html>