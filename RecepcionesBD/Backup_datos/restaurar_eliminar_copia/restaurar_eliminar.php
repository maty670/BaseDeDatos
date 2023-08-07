<?php 
	



	if(isset($_POST["confirmar"])){
		include ("../conexion2.php");
		$id = $_GET["id"];
		$accion = $_GET["accion"];

		if($accion=="restaurar"){
			$conexion = $base->query("SELECT `nombre_archivo` FROM `registros_backups` WHERE `id`='$id' ");
			$registro_nombre_archivo = $conexion->fetchAll(PDO::FETCH_OBJ);
			$nombre_archivo = $registro_nombre_archivo[0]->nombre_archivo;

			$ruta_archivo = "../archivos/" . $nombre_archivo . ".txt";
			$gestor = fopen($ruta_archivo, "r");
			$registros_copia = fread($gestor, filesize($ruta_archivo));

			try{
				$borrarDatosPruebas=$base->query("DELETE FROM `pruebas`");
				if($base->query("INSERT INTO `pruebas` VALUES $registros_copia")){

					$base->query("DELETE FROM `recepciones`");
					$base->query("DELETE FROM `uvt`");
					$insertarDatos=$base->query("INSERT INTO `recepciones` VALUES $registros_copia");

					header("location: ../index.php");
				}
			}catch(Exception $e){
				
			}
		}else if($accion=="eliminar"){

			$conexion = $base->query("SELECT `nombre_archivo` FROM `registros_backups` WHERE `id`='$id' ");
			$registro_nombre_archivo = $conexion->fetchAll(PDO::FETCH_OBJ);

			try{

				$nombre_archivo = $registro_nombre_archivo[0]->nombre_archivo;
				$status=unlink('../archivos/' . $nombre_archivo . ".txt");

				if($status){
					$base->query("DELETE FROM `registros_backups` WHERE `id`='$id' ");
				}

				header("location: ../index.php");
			}catch(Exception $e){

			}

		}



		
		

			

	}





?>