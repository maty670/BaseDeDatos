<!DOCTYPE html>
<html>
<head>
	<title></title>
	

</head>
<body>
	<div class="contenedor_botones">

		

			<div class="contenedor_excel">
				<div class="contenedor_img_excel">
					<?php if(isset($_POST["btn_buscar_criterios"])){ ?>

					<a href="./exportar_archivos/export_excel.php?UVT=<?php echo $UVT?>&Conv=<?php echo $convocatoria?>&Est=<?php echo $opt_estado?>&Des=<?php echo $fechaDesde?>&Has=<?php echo $fechaHasta?>"  
						target="_BLANK">
						<img src="./exportar_archivos/excel_file_icon.svg">
						<p>Exportar resultados en Excel</p>
					</a>

					<?php }else if(isset($_POST["btn_buscar_palabra"])){?>

					<a href="./exportar_archivos/export_excel.php?Col=<?php echo $columna?>&Pal=<?php echo $palabra_clave?>" target="_BLANK">
						<img src="./exportar_archivos/excel_file_icon.svg">
						<p>Exportar resultados en Excel</p>
					</a>

					<?php }?>

				</div>
			</div>
		</a>




		



		<div class="contenedor_pdf">
			<div class="contenedor_img_pdf">
				
				<?php if(isset($_POST["btn_buscar_criterios"])){ ?>

					<a href="./exportar_archivos/export_pdf.php?UVT=<?php echo $UVT?>&Conv=<?php echo $convocatoria?>&Est=<?php echo $opt_estado?>&Des=<?php echo $fechaDesde?>&Has=<?php echo $fechaHasta?>" target="_BLANK">
						<img src="./exportar_archivos/PDF_file_icon.svg">
						<p>Exportar resultados en PDF</p>

					</a>
					<?php }else if(isset($_POST["btn_buscar_palabra"])){?>

					<a href="./exportar_archivos/export_pdf.php?Col=<?php echo $columna?>&Pal=<?php echo $palabra_clave?>" target="_BLANK">
						<img src="./exportar_archivos/PDF_file_icon.svg">
						<p>Exportar resultados en PDF</p>
					</a>

					<?php }?>
			</div>
		</div>


	</div>



</body>
</html>