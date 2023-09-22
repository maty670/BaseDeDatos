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


<h2>Pagina principal</h2>

<h3>Bienvenido Usuario: <?php echo $_SESSION['usuario']  ?></h3>
<h3>Fecha de inicio de sesion: <?php echo $_SESSION['id']?></h3>


<a href="ingreso_usuario2">Pagina2</a><br><br>
<a href="ingreso_usuario3">Pagina3</a>

<br><br><br><br><br><br>

<a href="../cerrar_sesion.php">Cerrar Sesion</a>


</body>
</html>