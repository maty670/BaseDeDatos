var convocatorias = document.getElementsByClassName("input_convocatoria");
var btn_actualizar = document.getElementById("Actualizar");


const btn_Nuevo = document.getElementsByClassName("btnNuevo");
for(let i=0; i< btn_Nuevo.length;i++){
  btn_Nuevo[i].addEventListener("click",()=>{
  convocatorias = document.getElementsByClassName("input_convocatoria");
  btn_actualizar = document.getElementById("Actualizar");
  });
}



//https://feathericons.com/

function esTextoPermitido(input)
  {
   var texto = /^[a-zA-Z\u00C0-\u017F-_\s\/+]+$/;
   if(input.match(texto))
     {
      return true;
     }
   else
     {
     return false;
     }
  }


  function agregarImagenAlerta(elemento){
  	elemento.style.background="url('iconos/icono_alerta.svg') no-repeat scroll 0 0 transparent";
  	elemento.parentElement.style.background="#660066";
  	elemento.style.color="#fff";
  }

  function limpiarImagenesAlerta(elemento){
  		elemento.parentNode.style.background="";
  		elemento.style.background="";
      elemento.style.color="#000";
  }

  function validarTextoConvocatorias(evt,campos){

    let error=false;
	
      	for(let i = 0; i < campos.length;i++){

      	limpiarImagenesAlerta(campos[i]);

      		if(!esTextoPermitido(campos[i].value)){
      			evt.preventDefault();
      			agregarImagenAlerta(campos[i]);
      			error=true;
      		}else if(campos[i].value.includes("  ")){
      			evt.preventDefault();
            agregarImagenAlerta(campos[i]);
      			error=true;
      		}

      	}

      	return error;
  }


btn_actualizar.addEventListener("click",function(evt){

	if(validarTextoConvocatorias(evt,convocatorias)){
			alert("ERROR, los nombre de las convocatorias solo pueden incluir letras minúsculas, mayúsculas y los simbolos - _ / +");
	}

	
})
