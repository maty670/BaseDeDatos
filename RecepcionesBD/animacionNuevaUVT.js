	const nueva_UVT = document.querySelector(".icono");
	nueva_UVT.addEventListener("click",function(e){
		const icono = document.querySelector(".icono");
		const formulario = document.querySelector(".formulario");
			icono.style.display="none";
			formulario.style.display="block";
		
	})


	const btn_Cancelar_UVT = document.querySelector(".btn_Cancelar_UVT");
	btn_Cancelar_UVT.addEventListener("click",function(e){
		const icono = document.querySelector(".icono");
		const formulario = document.querySelector(".formulario");
			icono.style.display="block";
			formulario.style.display="none";		
	})


	


















const titulo_criterios = document.getElementById("criterios");
	const form_criterios = document.getElementById("form_criterios");
	titulo_criterios.addEventListener("click",()=>{

		sessionStorage.setItem("Tipo_busqueda", "criterios");

		const form_palabra = document.getElementById("form_palabra");
			titulo_palabra.style.backgroundImage="linear-gradient(to bottom, #ddd, #bbb)";
			form_palabra.style.display="none";

		
			titulo_criterios.style.backgroundImage  ="linear-gradient(to bottom, #d9e3f2, #b4c7e4)";
			form_criterios.style.display="block";

	})



	const titulo_palabra = document.getElementById("palabra");
	const form_palabra = document.getElementById("form_palabra");
	titulo_palabra.addEventListener("click",()=>{

		sessionStorage.setItem("Tipo_busqueda", "palabra");


		const form_criterios = document.getElementById("form_criterios");
			titulo_criterios.style.backgroundImage="linear-gradient(to bottom, #ddd, #bbb)";
			form_criterios.style.display="none";

		
			titulo_palabra.style.backgroundImage  ="linear-gradient(to bottom, #d9e3f2, #b4c7e4)";
			form_palabra.style.display="block";

	})




Tipo_busqueda = sessionStorage.getItem("Tipo_busqueda");

	if(Tipo_busqueda=="palabra"){
		sessionStorage.setItem("Tipo_busqueda", "palabra");


		const form_criterios = document.getElementById("form_criterios");
			titulo_criterios.style.backgroundImage="linear-gradient(to bottom, #ddd, #bbb)";
			form_criterios.style.display="none";

			
			titulo_palabra.style.backgroundImage  ="linear-gradient(to bottom, #d9e3f2, #b4c7e4)";
			form_palabra.style.display="block";
	}else if(Tipo_busqueda=="criterios" || Tipo_busqueda==null){
		sessionStorage.setItem("Tipo_busqueda", "criterios");

		const form_palabra = document.getElementById("form_palabra");
			titulo_palabra.style.backgroundImage="linear-gradient(to bottom, #ddd, #bbb)";
			form_palabra.style.display="none";

		
			titulo_criterios.style.backgroundImage  ="linear-gradient(to bottom, #d9e3f2, #b4c7e4)";
			form_criterios.style.display="block";
	}

























