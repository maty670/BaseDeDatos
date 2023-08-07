<?php

$datosMontosLocalidades1 = array();

//Consulta de proyectos agrupados por localidad
$consulta_Loc="SELECT COUNT(*) AS `Cantidad`,`Beneficiario_Localidad` AS `Localidad`,
				 	 SUM(Monto_ANR)AS `SUMA_ANR`
					 FROM (SELECT * FROM `Proyectos`
					WHERE ($columna1 LIKE '%$palabra1%' $modo $columna2 LIKE '%$palabra2%' $modo $columna3 LIKE '%$palabra3%' $modo $columna4 LIKE '%$palabra4%' $modo $columna5 LIKE '%$palabra5%')
					AND (Año >= $aMin  AND Año <= $aMax)
					AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%'))AS A 
		   		    GROUP BY `Beneficiario_Localidad`
		   		    ORDER BY `SUMA_ANR`";

		$consulta_por_Loc=$base->query($consulta_Loc);
		$registros_Loc=$consulta_por_Loc->fetchAll(PDO::FETCH_OBJ);

	foreach ($registros_Loc as $proyectos_MontosLoc) {
		$SUMA_ANR;
		if($proyectos_MontosLoc->SUMA_ANR==NULL){
			$SUMA_ANR=0;
		}else{
			$SUMA_ANR = $proyectos_MontosLoc->SUMA_ANR;
		}

   		 $reg = array("y" => $SUMA_ANR,"label" => $proyectos_MontosLoc->Localidad );
   		 array_unshift($datosMontosLocalidades1, $reg);
	}









$datosCantidadLocalidades1 = array();
		
		foreach ($registros_Loc as $proyectos_CantLoc) {
   		 	$reg = array("y" => $proyectos_CantLoc->Cantidad,"label" => $proyectos_CantLoc->Localidad );
   		 	array_unshift($datosCantidadLocalidades1, $reg);
		}






/*------------------------------------------------------------------------------------------------------------------------------*/


$datosMontosLocalidades2 = array();

//Consulta de proyectos agrupados por localidad
$consulta_Loc="SELECT COUNT(*) AS `Cantidad`,`Beneficiario_Localidad` AS `Localidad`,
				 	 SUM(Monto_ANR)AS `SUMA_ANR`
					 FROM (SELECT * FROM `Proyectos`
					WHERE ($columna1 LIKE '%$palabra1%' $modo $columna2 LIKE '%$palabra2%' $modo $columna3 LIKE '%$palabra3%' $modo $columna4 LIKE '%$palabra4%' $modo $columna5 LIKE '%$palabra5%')
					AND (Año >= $aMin  AND Año <= $aMax)
					AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%'))AS A 
		   		    GROUP BY `Beneficiario_Localidad`
		   		    ORDER BY `Cantidad`";

		$consulta_por_Loc=$base->query($consulta_Loc);
		$registros_Loc=$consulta_por_Loc->fetchAll(PDO::FETCH_OBJ);

	foreach ($registros_Loc as $proyectos_MontosLoc) {
		$SUMA_ANR;
		if($proyectos_MontosLoc->SUMA_ANR==NULL){
			$SUMA_ANR=0;
		}else{
			$SUMA_ANR = $proyectos_MontosLoc->SUMA_ANR;
		}

   		 $reg = array("y" => $SUMA_ANR,"label" => $proyectos_MontosLoc->Localidad );
   		 array_unshift($datosMontosLocalidades2, $reg);
	}









$datosCantidadLocalidades2 = array();
		
		foreach ($registros_Loc as $proyectos_CantLoc) {
   		 	$reg = array("y" => $proyectos_CantLoc->Cantidad,"label" => $proyectos_CantLoc->Localidad );
   		 	array_unshift($datosCantidadLocalidades2, $reg);
		}





	?>