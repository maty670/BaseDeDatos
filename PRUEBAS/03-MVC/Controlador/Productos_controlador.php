<?php

	require_once("Modelo/Productos_modelo.php");

	$producto = new Productos_modelo();
	$matriz_productos = $producto->get_productos();










	require_once("Vista/Productos_view.php");





?>