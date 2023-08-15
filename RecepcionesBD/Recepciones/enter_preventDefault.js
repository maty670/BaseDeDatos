// Al presionar enter sobre cualquier celda, evitar que se haga un POST sobre el formulario
// para que solo se guarde si se presiona sobre GUARDAR

inputs = document.getElementsByTagName('input')

for (input of inputs){
	input.addEventListener("keydown",function(event){
		if(event.key==="Enter"){
			event.preventDefault();
		}
	})
}
