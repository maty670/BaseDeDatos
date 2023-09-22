<?php

	try{

		$base = new PDO("mysql:host=localhost;dbname=pruebas" , "root","");
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET UTF8");




		$usr = $_POST['usuario_login'];
		$psw = $_POST['password_login'];

		$pass_cifrado = password_hash($psw,PASSWORD_DEFAULT,array("cost"=>5));  //Por defecto el costo es de 10


		$conexion=$base->query("SELECT `usuario`,`password` 
								FROM `login` WHERE `usuario` = '$usr'");
		$resultado=$conexion->fetchAll(PDO::FETCH_OBJ);

		$login = false;

		foreach ($resultado as $r):

			$password_verificada = password_verify($psw,$r->password);  //(campo contraseña introducido por el usuario, campo contraseña cifrado en la base de datos)

			if(strcmp($r->usuario,$usr)==0 && $password_verificada){
				$login = true;
			}

		endforeach;	

		if($login){
			echo "Bienvenido usuario: " . $r->usuario;
		}else{
			echo "Usuario y/o contraseña incorrectos";
		}

	


	}catch(Exception $e){

		die("Error: " . $e->getMessage());

	}




?>