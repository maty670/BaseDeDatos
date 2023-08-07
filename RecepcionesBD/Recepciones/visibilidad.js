const btn_visibilidad = document.getElementsByClassName("visibilidad");

for(let i=0; i<btn_visibilidad.length;i++){

	btn_visibilidad[i].addEventListener("click",()=>{

		childrens_cant = btn_visibilidad[i].parentNode.parentNode.childElementCount;

		
		if(btn_visibilidad[i].parentNode.parentNode.children[4].lastElementChild.children[0].value=='true'){
			btn_visibilidad[i].children[0].src='./iconos/eye-slash-solid.svg';
			btn_visibilidad[i].style.left="28px";
			btn_visibilidad[i].previousElementSibling.style.left="28px";
		}else{
			btn_visibilidad[i].children[0].src='./iconos/eye-solid.svg';
			btn_visibilidad[i].style.left="0px";
			btn_visibilidad[i].previousElementSibling.style.left="-1px";
		}


		for (let j=0 ; j < childrens_cant ; j++){
	
			fila = btn_visibilidad[i].parentNode.parentNode.children[j];

			

			if(j>=1 && j<=3){
				if (fila.style.display==""){
					fila.style.display='none';
				}else{
					fila.style.display="";
				}
			}


			if(j>3){
				 visible_value = fila.lastElementChild.children[0].value;
				if(visible_value=="true"){
					fila.lastElementChild.children[0].setAttribute("value","false");
					fila.style.display = "none";

				}else{
					fila.lastElementChild.children[0].setAttribute("value","true");
					fila.style.display = "table-row";
				}
				
			}
			
		}

		btn_nuevo = btn_visibilidad[i].parentNode.parentNode.parentNode.nextElementSibling;
		if (visible_value=="true") {
			btn_nuevo.style.display = "none";
		}else{
			btn_nuevo.style.display = "";
		}
		




	})
}


