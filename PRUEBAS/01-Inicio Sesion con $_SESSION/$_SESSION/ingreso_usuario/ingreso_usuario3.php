<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>


<?php 

	session_start();


	if(!isset($_SESSION["usuario"])){

		header("location:../index.php");

	}

?>


<h2>Pagina Nº 3</h2>

<p>Bienvenido Usuario: <?php echo $_SESSION["usuario"]  ?></p>

<a href="ingreso_usuario.php">Volver</a>


</body>
</html>