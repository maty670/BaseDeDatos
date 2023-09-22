<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>


<?php

	try{

		$base = new PDO("mysql:host=localhost;dbname=pruebas" , "root","");
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET UTF8");




		$usr = $_POST['usuario'];
		$psw = $_POST['password'];

		$conexion = $base->query("SELECT * FROM `login` WHERE usuario = '$usr' AND password = '$psw' ");
		$resultado = $conexion->fetchAll(PDO::FETCH_OBJ);



		if(count($resultado)==1){

			session_start();

			$_SESSION["usuario"] = $_POST['usuario'];

			$_SESSION["id"] = date("Y-m-d h:i:sa",time());

			header("location:ingreso_usuario/ingreso_usuario.php");

		}else{

			header("location:index.php");

		}




	}catch(Exception $e){

		die("Error: " . $e->getMessage());

	}




?>


</body>
</html>