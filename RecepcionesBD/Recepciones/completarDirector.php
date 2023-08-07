<?php

	include("../conexion2.php");
	

	$conexion=$baseProyectos->query("SELECT `Codigo`,`Director` FROM `proyectos`");
	$resultados=$conexion->fetchAll(PDO::FETCH_OBJ);
	


?>


<script>

	var old = JSON.stringify(<?php echo json_encode($resultados);?>).replace(/null/g,'""');
    var registros = JSON.parse(old);

	const codigos = document.getElementsByClassName("Codigo");


	for(let i=0;i<codigos.length;i++){
		
	  codigos[i].addEventListener("blur",()=>{
	  		for(let j=0;j<registros.length;j++){

	  			codigo_ingresado = codigos[i];
	  			campo_director = codigos[i].parentNode.nextElementSibling.children[0];

	  			if(codigo_ingresado.value.toLowerCase()==registros[j].Codigo.toLowerCase()){
	  				

	  				campo_director.value = registros[j].Director;

	  				codigo_ingresado.value = registros[j].Codigo;

					campo_director.style.background="#6699ff";
					campo_director.parentNode.style.background="#6699ff";

					j=registros.length;

					setTimeout(function () {
						campo_director.style.background=null;
						campo_director.parentNode.style.background=null;
					}, 600);

	  			}else{
	  				campo_director.value='';
	  				campo_director.style.background=null;
					campo_director.parentNode.style.background=null;
	  			}


	  			codigos[i].parentNode.style.background=null;
				codigos[i].style.background=null;
				codigos[i].style.color=null;



	  			
	  		}
	  })

	  codigos[i].addEventListener("click",()=>{
	  		codigos[i].style.color="#000";
			codigos[i].parentNode.style.background="#ff0";
			codigos[i].style.background="#ff0";
		})

	}


</script>