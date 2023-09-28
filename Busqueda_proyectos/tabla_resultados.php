<?php 
	foreach ($registros_cantidad as $proyectos_cantidad):
	$cantidad=$proyectos_cantidad->Cantidad;
	endforeach;

	foreach ($registros_monto as $proyectos_monto):
	if($proyectos_monto->monto==NULL){$monto_acumulado=0;}else{
	$monto_acumulado=$proyectos_monto->monto;}
	endforeach;


?>


<?php $i=1; ?>
<?php include("EspacioTablasGraficas.php");?>

<div class="btn_excel">
	<i class="fa-solid fa-file-excel"></i>
    <a href="export-Excel.php" target="_BLANK"> Descargar Excel </a>
</div>

<div class="contenedor_tabla">
	
	<table class='tabla_resultados'>
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
<?php foreach($registros as $r):	
	include("resaltar_textos.php");?>
		<tr class="tr_celda" tabindex="2">
			<td class="celda id"><?php echo $i;?></td>
			<td class="celda l3"><?php echo $Codigo?></td>
			<td class="celda center"><?php echo $r->Modalidad?></td>
			<td class="celda l1"><?php echo $Titulo?></td>
			<td class="celda l3"><?php echo $Beneficiario?></td>
			<td class="celda l2"><?php echo $r->Beneficiario_Correo?></td>
			<td class="celda l4"><?php echo $Departamento?></td>
			<td class="celda l4"><?php echo $Localidad?></td>
			<td class="celda l3"><?php echo $Director?></td>
			<td class="celda l1"><?php echo $r->Director_Correo?></td>
			<td class="celda l1"><?php echo $Organizacion_Vinculante?></td>
			<td class="celda l2"><?php echo $r->Organizacion_Vinculante_Correo?></td>
			<td class="celda center"><?php if($r->Monto_ANR!=NULL){echo "$";} echo $r->Monto_ANR?></td>
			<td class="celda l3"><?php echo $Convocatoria?></td>
			<td class="celda center"><?php echo $r->Año?></td>
			<td class="celda l4"><?php echo $Admisibilidad?></td>
			<td class="celda l4"><?php echo $Financiacion?></td>
			<td class="celda l4"><?php echo $r->Puntaje?></td>
		</tr>
	<?php $i++; ?>
<?php endforeach; ?>



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