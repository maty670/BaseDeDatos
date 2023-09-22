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


	<table>
		<tr>
			<td><h3>Nombre del Artículo<h3></td>

	<?php

		foreach($matriz_productos as $registro){
			echo "<tr><td>" . $registro["NOMBREARTÍCULO"] . "</td></tr>";
		}

	?>

	</table>

</body>
</html>