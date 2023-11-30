<?php

	function eliminarNumerosConPuntos($texto) {

	    // Define el patrón de búsqueda usando expresiones regulares
	    $patron = '/^\d+(\.\d+)*\s*-?\s*/';

	    // Eliminar patron 
	    $texto = preg_replace($patron, '', $texto);

		// Eliminar espacios en blanco solo al principio
		$texto = ltrim($texto);

		// Eliminar espacios en blanco solo al final
		$texto = rtrim($texto);

		// Eliminar puntos solo al principio
		$texto = ltrim($texto, '.');

		// Eliminar puntos solo al final
		$texto = rtrim($texto, '.');

		// Eliminar espacios en blanco solo al principio
		$texto = ltrim($texto);

		// Eliminar espacios en blanco solo al final
		$texto = rtrim($texto);


		// Convertir todo el texto a minúsculas
		$texto = mb_strtolower($texto, 'UTF-8');

		// La primera letra en mayuscula
		$texto = ucfirst($texto);

	    return $texto;
	}


	$array_listadoArea = [];
	foreach ($listado_Area as $k) {
		$lineas = explode("\n", $k->Area_Estrategica);
		

		foreach ($lineas as $l) {
			$resultado = eliminarNumerosConPuntos($l);
			if($resultado == ''  || $resultado == '-'){
				// No agregar nada
			}else{
				array_push($array_listadoArea, $resultado);
			}
	    	
		}

		// Eliminar del array los datos duplicados
		$array_listadoArea = array_unique($array_listadoArea);

		// Ordenar alfabéticamente
		sort($array_listadoArea);

	}
?>