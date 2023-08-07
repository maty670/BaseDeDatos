<?php
	include("conexion.php");

	//Boorrar todas las cookies previas
	if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}


	$consulta = "SELECT `Convocatoria` FROM `convocatorias` GROUP BY `Convocatoria`";
	$resultados = mysqli_query($conexion,$consulta);
	
	$convocatorias=array();
	while(($fila = mysqli_fetch_row($resultados))==true){
		array_push($convocatorias,$fila[0]);
	}
	mysqli_close($conexion);







?>

<script type="text/javascript">

		const listado_convocatorias = [].concat(<?php echo json_encode($convocatorias); ?>);
		
		const contenedor_convocatorias = document.querySelector(".contenedor_convocatorias");
		const fragment = document.createDocumentFragment();

		for(let i=0;i<listado_convocatorias.length;i++){
			let convocatoria = document.createElement("div");
			convocatoria.classList.add("convocatoria");

			convocatoria.innerHTML = `<div class="titulo">${listado_convocatorias[i]}</div>
									  <div class="operaciones">
										  <div class="nueva_rendicion">Nueva Rendicion</div>
										  <div class="modificar">Modificar datos</div>
										  <div class="rendiciones">Listado rendiciones</div>
										  <div class="eliminar">Eliminar convocatoria</div>
									  </div>`;
			fragment.appendChild(convocatoria);
		}

		contenedor_convocatorias.appendChild(fragment);

</script>