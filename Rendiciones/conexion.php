<?php 

try{
	$servername = "localhost";
	$database = "rend";
	$username = "root";
	$password = "";
	// Create connection
	$conexion = mysqli_connect($servername, $username, $password, $database);
	$conexion->set_charset('utf8');
// Check connection
}catch(Exception $e){
	echo "Linea del error" . $e->getline();
}
?>