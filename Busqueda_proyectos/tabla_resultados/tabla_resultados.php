<?php 
	foreach ($registros_cantidad as $proyectos_cantidad):
	$cantidad=$proyectos_cantidad->Cantidad;
	endforeach;

	foreach ($registros_monto as $proyectos_monto):
	if($proyectos_monto->monto==NULL){$monto_acumulado=0;}else{
	$monto_acumulado=$proyectos_monto->monto;}
	endforeach;


?>

<?php include("EspacioTablasGraficas.php");?>

<div class="btn_excel">
	<i class="fa-solid fa-file-excel"></i>
    <a href="export-Excel.php" target="_BLANK"> Descargar Excel </a>
</div>

<div class="contenedor_tabla">
	
	<table class='tabla_resultados' id="<?php echo $cantidad?>">
		<tr class="tr_titulo" tabindex="1">
			<td class="titulo">#</td>
			<td class="titulo w2"><textarea readonly>Codigo</textarea></td>
			<td class="titulo w1"><textarea readonly>Modalidad</textarea></td>
			<td class="titulo w2"><textarea readonly>Titulo</textarea></td>
			<td class="titulo w2"><textarea readonly>Beneficiario</textarea></td>
			<td class="titulo w3"><textarea readonly>Correo Beneficiario</textarea></td>
			<td class="titulo w3"><textarea readonly>Departamento Beneficiario</textarea></td>
			<td class="titulo w3"><textarea readonly>Localidad Beneficiario</textarea></td>
			<td class="titulo w2"><textarea readonly>Director</textarea></td>
			<td class="titulo w2"><textarea readonly>Correo Director</textarea></td>
			<td class="titulo w3"><textarea readonly>Organización Vinculante</textarea></td>
			<td class="titulo w3"><textarea readonly>Correo Organizacion Vinculante</textarea></td>
			<td class="titulo w2"><textarea readonly>Monto ANR</textarea></td>
			<td class="titulo w2"><textarea readonly>Convocatoria</textarea></td>
			<td class="titulo w1"><textarea readonly>Año</textarea></td>
			<td class="titulo w2"><textarea readonly>Admisibilidad</textarea></td>
			<td class="titulo w2"><textarea readonly>Financiacion</textarea></td>
			<td class="titulo w2"><textarea readonly>Puntaje</textarea></td>		
		</tr>


	<?php include("resaltar_frase.php") ?>
	<?php include("generar_tabla_resultados.php")?>

	</table>
</div>


<div class="espacio_paginacion" id="espacio_paginacion"></div>


<script>
	// Al momento de exportar a excel, el caracter '+' genera un error y es necesario
	// reemplazarlo por la frase mas
	<?php 
	$palabra1 =  str_replace("+","&mas&",$palabra1);
	$palabra2 =  str_replace("+","&mas&",$palabra2);
	$palabra3 =  str_replace("+","&mas&",$palabra3);
	$palabra4 =  str_replace("+","&mas&",$palabra4);
	$palabra5 =  str_replace("+","&mas&",$palabra5);

	?>

	document.cookie = "palabra1=<?php echo $palabra1;?>";
	document.cookie = "palabra2=<?php echo $palabra2;?>";
	document.cookie = "palabra3=<?php echo $palabra3;?>";
	document.cookie = "palabra4=<?php echo $palabra4;?>";
	document.cookie = "palabra5=<?php echo $palabra5;?>";
	document.cookie = "columna1=<?php echo $columna1;?>";
	document.cookie = "columna2=<?php echo $columna2;?>";
	document.cookie = "columna3=<?php echo $columna3;?>";
	document.cookie = "columna4=<?php echo $columna4;?>";
	document.cookie = "columna5=<?php echo $columna5;?>";

	document.cookie = "a=<?php echo $a; ?>";
	document.cookie = "f=<?php echo $f; ?>";
	document.cookie = "m=<?php echo $m; ?>";

	document.cookie = "aMin=<?php echo $aMin; ?>";
	document.cookie = "aMax=<?php echo $aMax; ?>";

	document.cookie = "modo=<?php echo $modo; ?>";
</script>