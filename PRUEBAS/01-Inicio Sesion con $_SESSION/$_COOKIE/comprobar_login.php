
	<?php

		include("conexion.php");

		$conexion=$base->query("SELECT `usuario`,`password` FROM `login`");
		$resultados=$conexion->fetchAll(PDO::FETCH_OBJ);

		$campo_usuario = $_POST['usuario'];
		$campo_contraseña = $_POST['contraseña'];


		foreach ($resultados as $r):
			if(strcmp($r->usuario,$campo_usuario)==0 && strcmp($r->password,$campo_contraseña)==0){

				if (isset($_POST['recordar'])) {

				$duracion = time() + ((86400 * 30)*365);  // 86400 = 1 dia
		

				setcookie("usuario",$campo_usuario,$duracion);	
				setcookie("contraseña",$campo_contraseña,$duracion);

				}else{
					setcookie("usuario", "", time() - 3600);
					setcookie("contraseña", "", time() - 3600);
				}


				header("location:./pagina_principal.php");
				
			}else{
				header("location:index.php");
			}	
		endforeach;

	?>
