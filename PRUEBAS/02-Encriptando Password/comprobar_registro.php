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

		$pass_cifrado = password_hash($psw,PASSWORD_DEFAULT,array("cost"=>5));  //Por defecto el costo es de 10


		$base->query("INSERT INTO `login` VALUES (NULL,'$usr','$pass_cifrado')");



	


	}catch(Exception $e){

		die("Error: " . $e->getMessage());

	}




?>


</body>
</html>