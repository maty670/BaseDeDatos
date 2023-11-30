<?php

	function eliminar_datos_mayusculas($texto){


		// Verificar si el texto esta TODO en mayuscula
		if ($texto === strtoupper($texto)) {
	    	// Convertir todo el texto a minúsculas
			$texto = mb_strtolower($texto, 'UTF-8');

			// La primera letra en mayuscula
			$texto = ucfirst($texto);
		}

		return $texto;
	}

	$array_Benef_Loc = [];
	foreach ($listado_Beneficiario_Localidad as $k) {
		$lineas = preg_split("/[\/,-]/", $k->Beneficiario_Localidad);

		

		foreach ($lineas as $l) {

			// Eliminar espacios en blanco solo al principio
			$texto = ltrim($l);

			// Eliminar espacios en blanco solo al final
			$texto = rtrim($texto);

			// Eliminar puntos solo al principio
			$texto = ltrim($texto, '.');

			// Eliminar puntos solo al final
			$texto = rtrim($texto, '.');

			$texto = eliminar_datos_mayusculas($texto);
					
			array_push($array_Benef_Loc, $texto);

			}


		// Eliminar del array los datos duplicados
		$array_Benef_Loc = array_unique($array_Benef_Loc);

		// Ordenar alfabéticamente
		sort($array_Benef_Loc);

	}


?>