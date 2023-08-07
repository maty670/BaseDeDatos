<?php 
	$datosMontosConvocatoria1 = array();

	$consulta_convocatoria="SELECT COUNT(*) AS `Cantidad`,concat(`Convocatoria`,' ',`Año`)As Convocatoria,
							SUM(Monto_ANR) AS `SUMA_ANR`
							FROM(SELECT * FROM `Proyectos`
								WHERE ($columna1 LIKE '%$palabra1%' $modo $columna2 LIKE '%$palabra2%' $modo $columna3 LIKE '%$palabra3%' $modo $columna4 LIKE '%$palabra4%' $modo $columna5 LIKE '%$palabra5%')
								AND (Año >= $aMin  AND Año <= $aMax)
								AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%'))AS I 
							GROUP BY `Convocatoria`,`Año`
							ORDER BY `SUMA_ANR`";


	$consulta_por_convocatoria=$base->query($consulta_convocatoria);
	$registros_convocatoria=$consulta_por_convocatoria->fetchAll(PDO::FETCH_OBJ);


	foreach ($registros_convocatoria as $proyectos_convocatoria) {
		$SUMA_ANR_CONV;
		if($proyectos_convocatoria->SUMA_ANR==NULL){
			$SUMA_ANR_CONV = 0;
		}else{
			$SUMA_ANR_CONV = $proyectos_convocatoria->SUMA_ANR;
		}
	    $reg = array("y" => $SUMA_ANR_CONV,"label" => $proyectos_convocatoria->Convocatoria );
	    array_unshift($datosMontosConvocatoria1, $reg);
	}










	$datosProyectosConvocatoria1 = array();

	foreach ($registros_convocatoria as $proyectos_convocatoria) {
		$reg = array("y" => $proyectos_convocatoria->Cantidad,"label" => $proyectos_convocatoria->Convocatoria );
		array_unshift($datosProyectosConvocatoria1, $reg);
	}

















	$datosMontosPorCantidad1 = array();

	foreach ($registros_convocatoria as $proyectos_convocatoria) {
		$reg = array("y" => ($proyectos_convocatoria->SUMA_ANR/$proyectos_convocatoria->Cantidad),"label" => $proyectos_convocatoria->Convocatoria );
		array_unshift($datosMontosPorCantidad1, $reg);
	}









/*------------------------------------------------------------------------------------------------------------------------------------------*/



	$datosMontosConvocatoria2 = array();

	$consulta_convocatoria="SELECT COUNT(*) AS `Cantidad`,concat(`Convocatoria`,' ',`Año`)As Convocatoria,
							SUM(Monto_ANR) AS `SUMA_ANR`
							FROM(SELECT * FROM `Proyectos`
								WHERE ($columna1 LIKE '%$palabra1%' $modo $columna2 LIKE '%$palabra2%' $modo $columna3 LIKE '%$palabra3%' $modo $columna4 LIKE '%$palabra4%' $modo $columna5 LIKE '%$palabra5%')
								AND (Año >= $aMin  AND Año <= $aMax)
								AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%'))AS I 
							GROUP BY `Convocatoria`,`Año`
							ORDER BY `Cantidad`";


	$consulta_por_convocatoria=$base->query($consulta_convocatoria);
	$registros_convocatoria=$consulta_por_convocatoria->fetchAll(PDO::FETCH_OBJ);


	foreach ($registros_convocatoria as $proyectos_convocatoria) {
		$SUMA_ANR_CONV;
		if($proyectos_convocatoria->SUMA_ANR==NULL){
			$SUMA_ANR_CONV = 0;
		}else{
			$SUMA_ANR_CONV = $proyectos_convocatoria->SUMA_ANR;
		}
	    $reg = array("y" => $SUMA_ANR_CONV,"label" => $proyectos_convocatoria->Convocatoria );
	    array_unshift($datosMontosConvocatoria2, $reg);
	}










	$datosProyectosConvocatoria2 = array();

	foreach ($registros_convocatoria as $proyectos_convocatoria) {
		$reg = array("y" => $proyectos_convocatoria->Cantidad,"label" => $proyectos_convocatoria->Convocatoria );
		array_unshift($datosProyectosConvocatoria2, $reg);
	}

















	$datosMontosPorCantidad2 = array();

	foreach ($registros_convocatoria as $proyectos_convocatoria) {
		$reg = array("y" => ($proyectos_convocatoria->SUMA_ANR/$proyectos_convocatoria->Cantidad),"label" => $proyectos_convocatoria->Convocatoria );
		array_unshift($datosMontosPorCantidad2, $reg);
	}


	




?>