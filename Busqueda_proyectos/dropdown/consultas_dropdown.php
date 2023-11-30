<?php

include("conexion.php");

$consulta="SELECT Director FROM proyectos GROUP BY Director ORDER BY TRIM(Director) ASC";
$resultados=$base->query($consulta);
$listado_Directores=$resultados->fetchAll(PDO::FETCH_OBJ);

$consulta="SELECT Beneficiario_Localidad FROM proyectos GROUP BY Beneficiario_Localidad";
$resultados=$base->query($consulta);
$listado_Beneficiario_Localidad=$resultados->fetchAll(PDO::FETCH_OBJ);

$consulta="SELECT Convocatoria FROM proyectos GROUP BY Convocatoria";
$resultados=$base->query($consulta);
$listado_Convocatorias=$resultados->fetchAll(PDO::FETCH_OBJ);

$consulta="SELECT Area_Estrategica FROM proyectos GROUP BY Area_Estrategica";
$resultados=$base->query($consulta);
$listado_Area=$resultados->fetchAll(PDO::FETCH_OBJ);





include("datos_area_estrategica.php");
include("datos_beneficiario_localidad.php");





?>