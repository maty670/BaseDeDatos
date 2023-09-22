<?php

	//Recibe los datos de la Imagen
	$nombre_imagen = $_FILES["imagen"]["name"];
	$tipo_imagen = $_FILES["imagen"]["type"];
	$tamanio_imagen = $_FILES["imagen"]["size"];


	// 1.000.000 bytes = 1 MB
	if($tamanio_imagen<=1000000){

		if($tipo_imagen=="image/jpg" || $tipo_imagen =="image/png"){

			$fecha_actual = date('d/m/Y/h/i/s');
			list($day, $month, $year, $hour, $min, $sec) = explode("/", $fecha_actual);
			$fecha_actual_string = $day . '-' . $month . '-' . $year . '___' .
								   $hour . '-' . $min . '-' . $sec;

			// $_SERVER['DOCUMENT_ROOT'] -> Carpeta raiz del servidor 'www'
			$carpeta_destino =  $_SERVER['DOCUMENT_ROOT'] . 
								'/PRUEBAS/04-Imagenes_servidor/archivos/' . 
								$nombre_imagen . '___' .
								$fecha_actual_string;


			//Mover imagen de la carpeta temporal a la carpeta destino
			move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino);

		}else{

			echo "El formato del archivo no es jpg o png";

		}

	}else{

		echo "Tamaño de archivo excedido";

	} 

	//12:00
?>

