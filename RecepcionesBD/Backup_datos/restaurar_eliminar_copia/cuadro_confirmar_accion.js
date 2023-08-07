const contenedor_pagina = document.body;
contenedor_confirmar = document.getElementById("contenedor_confirmar");
botones_dropdown = document.getElementsByClassName("dropdown-content")


function bloquear_btn_dropdown(array_btn){
	for(i=0; i<array_btn.length;i++){
		array_btn[i].id+="@";
	}
}

function desbloquear_btn_dropdown(array_btn){
	for(i=0; i<array_btn.length;i++){
		array_btn[i].id=array_btn[i].id.replace("@","");
	}
}




function mostrar_cuadro_confirmar(id,accion,fecha){
	contenedor_pagina.style.background ="#666";

	contenedor_confirmar.style.display="block"; 

	titulo_backup = document.getElementById('titulo_backup');
	titulo_backup.style.background="#666";

	bloquear_btn_dropdown(botones_dropdown);
	
	
	texto_mensaje_confirmar = document.getElementById("texto_confirmacion_mensaje");
	texto_fecha_confirmar = document.getElementById("texto_confirmacion_fecha");

	if(accion=="restaurar"){
		
		texto_mensaje_confirmar.textContent = `Si restaura esta copia de seguridad, los datos actuales se reemplazarán`;
		texto_fecha_confirmar.textContent = `Fecha de la copia: ${fecha}`;
	}else if(accion=="eliminar"){
		texto_mensaje_confirmar.textContent = "¿Esta seguro que desea eliminar esta copia?";
		texto_fecha_confirmar.textContent = `Fecha de la copia: ${fecha}`;
	}
	

	form_confirmar = document.getElementById("form_confirmar");
	form_confirmar.action = `restaurar_eliminar_copia/restaurar_eliminar.php?id=${id}&accion=${accion}`;

	btn_cancelar = document.getElementById("btn_cancelar");
	btn_cancelar.addEventListener("click",()=>{
		contenedor_pagina.style.background = "#dee1e6";
		contenedor_confirmar.style.display="none"; 

		titulo_backup.style.background="#cdcdcd";
		desbloquear_btn_dropdown(botones_dropdown);
	})
}






btn_restaurar = document.getElementsByClassName("btn_restaurar");
for(let i = 0 ; i < btn_restaurar.length; i++){
	btn_restaurar[i].addEventListener("click",()=>{
		const id = btn_restaurar[i].id;

		fila_datos = btn_restaurar[i].parentNode.parentNode.parentNode.parentNode;
		arra_fila_datos = fila_datos.childNodes;
		for(let i = 0; i < arra_fila_datos.length;i++){
			if(arra_fila_datos[i].nodeName=="TD" && arra_fila_datos[i].classList.contains("dato_fecha")){
				fecha_restaurar = arra_fila_datos[i].textContent;
			}

		}

		mostrar_cuadro_confirmar(id,"restaurar",fecha_restaurar);      
			
	})
}




btn_eliminar = document.getElementsByClassName("btn_eliminar");
for(let i = 0 ; i < btn_eliminar.length; i++){
	btn_eliminar[i].addEventListener("click",()=>{
		const id = btn_eliminar[i].id;

		fila_datos = btn_restaurar[i].parentNode.parentNode.parentNode.parentNode;
		arra_fila_datos = fila_datos.childNodes;
		for(let i = 0; i < arra_fila_datos.length;i++){
			if(arra_fila_datos[i].nodeName=="TD" && arra_fila_datos[i].classList.contains("dato_fecha")){
				fecha_eliminar = arra_fila_datos[i].textContent;
			}

		}

		mostrar_cuadro_confirmar(id,"eliminar",fecha_eliminar);
	})
}










img_cancel = document.querySelector(".img_cancel");
img_cancel.addEventListener("click",()=>{
		contenedor_pagina.style.background = "#dee1e6";
		contenedor_confirmar.style.display="none"; 

		titulo_backup.style.background="#cdcdcd";
		desbloquear_btn_dropdown(botones_dropdown);
})









