<script>
const elementos_editarUVT = document.getElementsByClassName("img_editUVT");

for(let i=0;i<elementos_editarUVT.length;i++){
	elementos_editarUVT[i].addEventListener("click",function(e){

		elementos_editarUVT[i].parentNode.style.display="none";

		const elemento_titulo =  elementos_editarUVT[i].parentNode.nextElementSibling
		elemento_titulo.style.display='none';
		const tituloUVT = elemento_titulo.innerHTML;

		const elemento_operaciones = elementos_editarUVT[i].parentNode.parentNode.children[2];
		elemento_operaciones.style.display='none';

		elemento_contenedorUVT = elementos_editarUVT[i].parentNode.parentNode;


		const div_formEditUVT = document.createElement("div");
		div_formEditUVT.setAttribute('id',`form_${tituloUVT}`);

		const form = document.createElement('form');
		form.setAttribute('class', 'form_editUVT');
		form.setAttribute('method','post');
		form.setAttribute('action','');

		const textArea = document.createElement('TEXTAREA');
	    textArea.setAttribute('class', 'textArea_editUVT');
	    textArea.setAttribute('name', 'textArea_editUVT');
	    textArea.required = "true";
	    textArea.innerHTML += tituloUVT;

	    const titulo_previo = document.createElement('TEXTAREA');
	    titulo_previo.style.display='none';
	    titulo_previo.setAttribute('name',"titulo_previo");
	    titulo_previo.innerHTML += tituloUVT;

	    const btn_editUVT = document.createElement('input');
	    btn_editUVT.setAttribute('class','btn_editUVT');
	    btn_editUVT.setAttribute('name','btn_editUVT');
	    btn_editUVT.setAttribute('type','submit');
	    btn_editUVT.setAttribute('value','Renombrar');

	    const btn_cancelarEdit = document.createElement('input');
	    btn_cancelarEdit.setAttribute('class','btn_cancelarEdit');
	    btn_cancelarEdit.setAttribute('type','button');
	    btn_cancelarEdit.setAttribute('value','Cancelar');

	    
	    form.appendChild(textArea);
	    form.appendChild(btn_editUVT);
	    form.appendChild(btn_cancelarEdit);
	    form.appendChild(titulo_previo);

	    div_formEditUVT.appendChild(form);

	    elemento_contenedorUVT.appendChild(div_formEditUVT);



	    btn_cancelarEdit.addEventListener("click",()=>{

	    	const div_contenedor = btn_cancelarEdit.parentNode.parentNode;
	    	div_contenedor.style.display = "none";


	    	elemento_titulo.style.display='flex';
	    	elemento_operaciones.style.display='block';
	    	elementos_editarUVT[i].parentNode.style.display="block";
	    })







	})
}
</script>

<?php 
	if(isset($_POST["btn_editUVT"])){
		include("conexion2.php");

		$titulo_editUVT = $_POST["textArea_editUVT"];
		$titulo_previo = $_POST["titulo_previo"];
		$pattern = "/^[a-zA-Z0-9-_\s\/+áÁéÉíÍóÓúÚñÑ]+$/";




		if(!preg_match($pattern, $titulo_editUVT)){
				echo '<th><font color="red"><center>El titulo de la UVT solo puede incluir letras minusculas y mayusculas, numeros y simbolos - _ / +</center></font></th>';
			}elseif(strstr($titulo_editUVT, "\n") || strstr($titulo_editUVT, "\t") || strstr($titulo_editUVT, "\r") || strstr($titulo_editUVT, "  ")) {
				echo '<th><font color="red"><center>El titulo de la UVT no puede incluir saltos de líneas(tecla intro), tabulaciones o texto con mas de dos espacios en blanco consecutivos</center></font></th>';
			}else{
				try{

					$base->query("UPDATE `recepciones` SET `UVT`= '$titulo_editUVT' WHERE `UVT` = '$titulo_previo'");
					$base->query("UPDATE `uvt` SET `uvt`= '$titulo_editUVT' WHERE `UVT` = '$titulo_previo'");

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

