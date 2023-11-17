<?php

$datosMontosDepartamentos1 = array();

//Consulta de proyectos agrupados por localidad
$consulta_Dep="SELECT COUNT(*) AS `Cantidad`,`Radicacion_Departamento` AS `Departamento`,
				 	 SUM(Monto_ANR)AS `SUMA_ANR`
					 FROM (SELECT * FROM `Proyectos`
					WHERE ($columna1 LIKE '%$palabra1%' $modo $columna2 LIKE '%$palabra2%' $modo $columna3 LIKE '%$palabra3%' $modo $columna4 LIKE '%$palabra4%' $modo $columna5 LIKE '%$palabra5%')
					AND (Año >= $aMin  AND Año <= $aMax)
					AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%'))AS A 
		   		    GROUP BY `Radicacion_Departamento`
		   		    ORDER BY `SUMA_ANR`";

		$consulta_por_Dep=$base->query($consulta_Dep);
		$registros_Dep=$consulta_por_Dep->fetchAll(PDO::FETCH_OBJ);

	foreach ($registros_Dep as $proyectos_MontosDep) {
		$SUMA_ANR;
		if($proyectos_MontosDep->SUMA_ANR==NULL){
			$SUMA_ANR=0;
		}else{
			$SUMA_ANR = $proyectos_MontosDep->SUMA_ANR;
		}

   		 $reg = array("y" => $SUMA_ANR,"label" => $proyectos_MontosDep->Departamento );
   		 array_unshift($datosMontosDepartamentos1, $reg);
	}









$datosCantidadDepartamentos1 = array();
		
		foreach ($registros_Dep as $proyectos_CantDep) {
   		 	$reg = array("y" => $proyectos_CantDep->Cantidad,"label" => $proyectos_CantDep->Departamento );
   		 	array_unshift($datosCantidadDepartamentos1, $reg);
		}




/*----------------------------------------------------------------------------------------------------------------------------------*/









$datosMontosDepartamentos2 = array();

//Consulta de proyectos agrupados por localidad
$consulta_Dep="SELECT COUNT(*) AS `Cantidad`,`Radicacion_Departamento` AS `Departamento`,
				 	 SUM(Monto_ANR)AS `SUMA_ANR`
					 FROM (SELECT * FROM `Proyectos`
					WHERE ($columna1 LIKE '%$palabra1%' $modo $columna2 LIKE '%$palabra2%' $modo $columna3 LIKE '%$palabra3%' $modo $columna4 LIKE '%$palabra4%' $modo $columna5 LIKE '%$palabra5%')
					AND (Año >= $aMin  AND Año <= $aMax)
					AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%'))AS A 
		   		    GROUP BY `Radicacion_Departamento`
		   		    ORDER BY `Cantidad`";

		$consulta_por_Dep=$base->query($consulta_Dep);
		$registros_Dep=$consulta_por_Dep->fetchAll(PDO::FETCH_OBJ);

	foreach ($registros_Dep as $proyectos_MontosDep) {
		$SUMA_ANR;
		if($proyectos_MontosDep->SUMA_ANR==NULL){
			$SUMA_ANR=0;
		}else{
			$SUMA_ANR = $proyectos_MontosDep->SUMA_ANR;
		}

   		 $reg = array("y" => $SUMA_ANR,"label" => $proyectos_MontosDep->Departamento );
   		 array_unshift($datosMontosDepartamentos2, $reg);
	}









$datosCantidadDepartamentos2 = array();
		
		foreach ($registros_Dep as $proyectos_CantDep) {
   		 	$reg = array("y" => $proyectos_CantDep->Cantidad,"label" => $proyectos_CantDep->Departamento );
   		 	array_unshift($datosCantidadDepartamentos2, $reg);
		}



	?>