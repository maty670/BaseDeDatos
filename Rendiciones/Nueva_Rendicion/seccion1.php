<?php 
$Titulo_Convocatoria=$_COOKIE['Titulo_Convocatoria'];
?>

<script type="text/javascript">
	const pagina1 = document.getElementById("pagina1");
	const Titulo_Convocatoria = document.createElement("div");
	Titulo_Convocatoria.innerHTML = `<div style="font-size: 80px;">
	${<?php echo json_encode($Titulo_Convocatoria); ?>}</div`;

	pagina1.appendChild(Titulo_Convocatoria);
</script>