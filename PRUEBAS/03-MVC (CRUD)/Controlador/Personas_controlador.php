<?php

	require_once("Modelo/Personas_modelo.php");

	$personas = new Personas_modelo();
	$matriz_personas = $personas->get_personas();










	require_once("Vista/Personas_view.php");





?>