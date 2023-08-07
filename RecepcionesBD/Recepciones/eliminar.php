<script type="text/javascript">
for(let i=0 ;i < Cantidad_Datos ; i++){
	const btnEliminar = document.getElementById(`${i}`);
	btnEliminar.addEventListener("click",()=>{

		const Dato = btnEliminar.parentNode;

		if(confirm(`Borrar ${Dato.getElementsByTagName("td")[3].children[0].value}?`)){

			Dato.remove();
			/*Dato.getElementsByTagName("td")[3].children[0].name="";
			Dato.style.display="none";*/
		}


	})
}






</script>