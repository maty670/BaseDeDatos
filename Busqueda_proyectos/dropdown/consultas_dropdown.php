<?php

include("conexion.php");

$consulta="SELECT Director FROM proyectos GROUP BY Director ORDER BY TRIM(Director) ASC";
$resultados=$base->query($consulta);
$listado_Directores=$resultados->fetchAll(PDO::FETCH_OBJ);

$consulta="SELECT Convocatoria FROM proyectos GROUP BY Convocatoria";
$resultados=$base->query($consulta);
$listado_Convocatorias=$resultados->fetchAll(PDO::FETCH_OBJ);


?>