<?php



	include("conexion2.php");

	$conexion=$base->query("SELECT * FROM `uvt` GROUP BY `UVT` ORDER BY `Fecha_Creacion` ");
	$titulos_UVT=$conexion->fetchAll(PDO::FETCH_OBJ);

	$UVT=array();
	foreach ($titulos_UVT as $t):
		array_push($UVT,$t->uvt);
	endforeach;




?>

<script type="text/javascript">

		const listado_UVT = [].concat(<?php echo json_encode($UVT); ?>);
		
		const contenedor_UVT = document.querySelector(".contenedor_UVT");
		const fragment = document.createDocumentFragment();

		for(let i=0;i<listado_UVT.length;i++){
			let UVT = document.createElement("div");
			UVT.classList.add("UVT");

			UVT.innerHTML = `<div class="editUVT"><img src="./iconos/pencil-solid.svg" class="img_editUVT"></div>
								<div class="titulo">${listado_UVT[i]}</div>
									  <div class="operaciones">
										  <a href="./Recepciones/?UVT=${encodeURIComponent(listado_UVT[i])}" class="operaciones_recepciones">
										  <img src="./exportar_archivos/file-contract-solid.svg">
										  <p>Listado Recepciones</p>
										  </a>

										  <a href="./exportar_archivos/export_excel.php?UVT=${encodeURIComponent(listado_UVT[i])}&Conv=&Est=Cualquier estado&Des=0&Has=9999" class="operaciones_excel" target='_BLANK'>
										  <img src="./exportar_archivos/excel_file_icon.svg">
										  <p>Exportar datos a Excel</p>
										  </a>

										 <a href="./exportar_archivos/export_pdf.php?UVT=${encodeURIComponent(listado_UVT[i])}&Conv=&Est=Cualquier estado&Des=0&Has=9999" class="operaciones_pdf" target='_BLANK'>
										 <img src="./exportar_archivos/PDF_file_icon.svg">
										 <p>Exportar datos a PDF</p>
										 </a>

										  <a href="eliminarUVT.php?UVT=${encodeURIComponent(listado_UVT[i])}" onclick="return  confirm('BORRAR UVT: ${listado_UVT[i]}?')" class="operaciones_eliminar">
										  <img src="./exportar_archivos/trash-can-solid.svg">
										  <p>Eliminar UVT</p>
										  </a>
									  </div>

							`;
			fragment.appendChild(UVT);
		}

		contenedor_UVT.appendChild(fragment);

</script>
















<?php 
	// Agregar la nueva UVT a la Base de Datos

		if(isset($_POST["btn_Agregar_UVT"])){

			$duplicado = false;

			include("conexion2.php");
			$Nueva_UVT = $_POST["texto_Nueva_UVT"];
			$pattern = "/^[a-zA-Z0-9-_\s\/+áÁéÉíÍóÓúÚñÑ]+$/";




			if(!preg_match($pattern, $Nueva_UVT)){
				echo '<th><font color="red"><center>El titulo de la UVT solo puede incluir letras minusculas y mayusculas, numeros y simbolos - _ / +</center></font></th>';
			}elseif(strstr($Nueva_UVT, "\n") || strstr($Nueva_UVT, "\t") || strstr($Nueva_UVT, "\r") || strstr($Nueva_UVT, "  ")) {
				echo '<th><font color="red"><center>El titulo de la UVT no puede incluir saltos de líneas(tecla intro), tabulaciones o texto con mas de dos espacios en blanco consecutivos</center></font></th>';
			}else{
				try{

					$base->query("INSERT INTO `recepciones` 
					VALUES ('$Nueva_UVT','CONVOCATORIA',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1)");

					$base->query("INSERT INTO `uvt` VALUES ('$Nueva_UVT',CURRENT_TIMESTAMP())");

					echo("<meta http-equiv='refresh' content='0'>");
				}catch(Exception $e){
					if($e->getCode()=='23000'){
						echo '<th><font color="red"><center>Ya existe una UVT con ese nombre</center></font></th>';

					}elseif($e->getCode()=='42000'){	
						echo '<th><font color="red"><center>El titulo de la UVT contiene simbolos o caracteres no permitidos</center></font></th>';
					}
				}


			}

			
		}


?>