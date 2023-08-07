btn_guardar_copia = document.querySelector(".btn_guardar");
btn_guardar_copia.addEventListener("click",function(e){
	btn_guardar_copia.style.display = "none";
	
	const contenedor_btn_guardando = document.createElement("div");
	contenedor_btn_guardando.classList.add("contenedor_btn_guardando");

	const fieldset_form_guardar = document.querySelector(".fieldset_form_guardar");

	const nuevo_form = document.createElement("form");
	let titulo_backup = document.getElementById("titulo_backup").value;
	nuevo_form.setAttribute('method','post');
	nuevo_form.action = `guardar_copia/guardar_copia.php?t=${titulo_backup}`;
	document.body.appendChild(nuevo_form);


		setTimeout(() => {
		  nuevo_form.submit();
		},"2000");

		


	contenedor_btn_guardando.innerHTML+=`
										<div class="loader"></div>
										<div class="texto">Guardando...</div>`;
	fieldset_form_guardar.appendChild(contenedor_btn_guardando);

})