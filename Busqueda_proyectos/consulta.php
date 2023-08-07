<?php
	
	if(isset($_POST['modo_busqueda'])){
	$modo='OR';
	}else{
	$modo='AND';
	}


	$palabra1=$_POST["busqueda1"];
	$columna1=$_POST["operacion1"];
	$palabra2=$_POST["busqueda2"];
	$columna2=$_POST["operacion2"];
	$palabra3=$_POST["busqueda3"];
	$columna3=$_POST["operacion3"];
	$palabra4=$_POST["busqueda4"];
	$columna4=$_POST["operacion4"];
	$palabra5=$_POST["busqueda5"];
	$columna5=$_POST["operacion5"];


	
	$tabla_completa='';
	

	
	$aMin=$_POST["aMin"];
	$aMax=$_POST["aMax"];
	$f=$_POST["financiacion"];
	$a=$_POST["admisibilidad"];
	$m=$_POST["modalidad"];
	
	
	if($f=='Todos') $f='';
	if($a=='Todos') $a='';
	if($m=='Todas') $m='';
	
	
	
	
	if($palabra1=='' AND $palabra2=='' AND $palabra3=='' AND $palabra4=='' AND $palabra5=='' ){
			$tabla_completa='SI';	
		}
	

	if($modo=="OR" AND $palabra1=="" AND $palabra2=="" AND $palabra3=="" AND $palabra4=="" AND $palabra5==""){
		
	
	}else{
	if($modo=="OR" AND $palabra1==""){
	$palabra1="wxww";}
	if($modo=="OR" AND $palabra2==""){
	$palabra2="wxww";}
	if($modo=="OR" AND $palabra3==""){
	$palabra3="wxww";}
	if($modo=="OR" AND $palabra4==""){
	$palabra4="wxww";}
	if($modo=="OR" AND $palabra5==""){
	$palabra5="wxww";}

	
	}

	
	
    //Consulta para filtrar 
	if($tabla_completa=='SI'){
	$consulta="  SELECT `Codigo`,`Titulo`,`Beneficiario`,`Beneficiario_Correo`,`Beneficiario_Departamento`,`Beneficiario_Localidad`,`Director`,
				`Director_Correo`,`Organizacion_Vinculante`,
				`Organizacion_Vinculante_Correo`,
				replace(replace(replace(format(`Monto_ANR`,2),'.','-'),',','.'),'-',',') AS `Monto_ANR`,
				`Convocatoria`,`Año`,`Admisibilidad`,`Financiacion`,`Puntaje`,`Modalidad`
				 FROM  `Proyectos`
				 WHERE (Año >= $aMin  AND Año <= $aMax)
				 AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%')";
	}else{
	$consulta=" SELECT `Codigo`,`Titulo`,`Beneficiario`,`Beneficiario_Correo`,`Beneficiario_Departamento`,`Beneficiario_Localidad`,`Director`,
				`Director_Correo`,`Organizacion_Vinculante`,`Organizacion_Vinculante_Correo`,
				replace(replace(replace(format(`Monto_ANR`,2),'.','-'),',','.'),'-',',') AS `Monto_ANR`,
				`Convocatoria`,`Año`,`Admisibilidad`,`Financiacion`,`Puntaje`,`Modalidad`
				FROM `Proyectos`
				WHERE ($columna1 LIKE '%$palabra1%' $modo $columna2 LIKE '%$palabra2%' $modo $columna3 LIKE '%$palabra3%' $modo $columna4 LIKE '%$palabra4%' $modo $columna5 LIKE '%$palabra5%')
				AND (Año >= $aMin  AND Año <= $aMax)
				AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%')";
	}
	
	//Consulta de la cantidad de filas despues de filtrar
	$consulta_cantidad="SELECT COUNT(*) AS `Cantidad` FROM ($consulta)AS N";
	
	//Consulta del monto total acumulado de la busqueda filtrada
	$consulta_monto="SELECT replace(replace(replace(format(SUM(T.Monto_ANR),2),'.','-'),',','.'),'-',',') AS `monto`
		
					 FROM (SELECT * FROM `Proyectos`
							WHERE ($columna1 LIKE '%$palabra1%' $modo $columna2 LIKE '%$palabra2%' $modo $columna3 LIKE '%$palabra3%' $modo $columna4 LIKE '%$palabra4%' $modo $columna5 LIKE '%$palabra5%')
							AND (Año >= $aMin  AND Año <= $aMax)
							AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%'))AS T";
	
	//Consulta del monto total para cada Convocatoria 
	$consulta_convocatoria="SELECT COUNT(*) AS `Cantidad`,`Convocatoria`,`Año`,
							replace(replace(replace(format(SUM(Monto_ANR),2),'.','-'),',','.'),'-',',') AS `SUMA_ANR`
							FROM(SELECT * FROM `Proyectos`
								WHERE ($columna1 LIKE '%$palabra1%' $modo $columna2 LIKE '%$palabra2%' $modo $columna3 LIKE '%$palabra3%' $modo $columna4 LIKE '%$palabra4%' $modo $columna5 LIKE '%$palabra5%')
								AND (Año >= $aMin  AND Año <= $aMax)
								AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%'))AS I 
							GROUP BY `Convocatoria`,`Año`
							ORDER BY `Año`";




	//Consulta de proyectos agrupados por departamento
	$consulta_departamento="SELECT COUNT(*) AS `Cantidad`,`Beneficiario_Departamento` AS `Departamento`,
				  replace(replace(replace(format(SUM(Monto_ANR),2),'.','-'),',','.'),'-',',') AS `SUMA_ANR`
	FROM 	(SELECT * FROM `Proyectos`
			WHERE ($columna1 LIKE '%$palabra1%' $modo $columna2 LIKE '%$palabra2%' $modo $columna3 LIKE '%$palabra3%' $modo $columna4 LIKE '%$palabra4%' $modo $columna5 LIKE '%$palabra5%')
			AND (Año >= $aMin  AND Año <= $aMax)
			AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%'))AS A 
		  GROUP BY `Beneficiario_Departamento`";				



	


	//Consulta de proyectos agrupados por localidad
	$consulta_localidad="SELECT COUNT(*) AS `Cantidad`,`Beneficiario_Localidad` AS `Localidad`,
				  replace(replace(replace(format(SUM(Monto_ANR),2),'.','-'),',','.'),'-',',') AS `SUMA_ANR`
	FROM 	(SELECT * FROM `Proyectos`
			WHERE ($columna1 LIKE '%$palabra1%' $modo $columna2 LIKE '%$palabra2%' $modo $columna3 LIKE '%$palabra3%' $modo $columna4 LIKE '%$palabra4%' $modo $columna5 LIKE '%$palabra5%')
			AND (Año >= $aMin  AND Año <= $aMax)
			AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%'))AS A 
		  GROUP BY `Beneficiario_Localidad`";

	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
		include("conexion.php");	
		$consulta_general=$base->query($consulta);
		$registros=$consulta_general->fetchAll(PDO::FETCH_OBJ);

		$consulta_cantidad=$base->query($consulta_cantidad);
		$registros_cantidad=$consulta_cantidad->fetchAll(PDO::FETCH_OBJ);

		$consulta_por_monto=$base->query($consulta_monto);
		$registros_monto=$consulta_por_monto->fetchAll(PDO::FETCH_OBJ);
		
		$consulta_por_convocatoria=$base->query($consulta_convocatoria);
		$registros_convocatoria=$consulta_por_convocatoria->fetchAll(PDO::FETCH_OBJ);

		$consulta_por_departamento=$base->query($consulta_departamento);
		$registros_departamento=$consulta_por_departamento->fetchAll(PDO::FETCH_OBJ);

		$consulta_por_localidad=$base->query($consulta_localidad);
		$registros_localidad=$consulta_por_localidad->fetchAll(PDO::FETCH_OBJ);
		
	
	
	
	
	
	
	
	
	include("tabla.php");     //Generar tabla con la consulta
	
	
		
	
		


	
	
?>