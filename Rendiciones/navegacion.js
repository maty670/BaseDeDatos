const nueva_convocatoria = document.querySelector(".nueva_convocatoria");
	nueva_convocatoria.addEventListener("click",()=>{
		window.location.href = "/BD/Rendiciones/Nueva_Convocatoria/";
})




	const btnNueva = document.getElementsByClassName("nueva_rendicion");
	for (let i = 0; i < btnNueva.length; i++) {
	  btnNueva[i].addEventListener("click",()=>{
	  	let Titulo_Convocatoria = btnNueva[i].parentNode.previousElementSibling.textContent;
	  	document.cookie = `Titulo_Convocatoria=${Titulo_Convocatoria}`;
	  	window.location.href = "/BD/Rendiciones/Nueva_Rendicion/";
	  })
	}