
function convertir(input,locale){

  var valoresPermitidos="0123456789,";




  valor = input.value;

    let temp = valor.replace(/[$.]/g, "");
    let temp2 = temp.replace(/[,]/g, ".");

    if(temp2==''){
      input.value = '';
    }else{
      input.value = `$ ${Number(temp2).toLocaleString('de-DE')}`;
    }





  //Evento al perder el foco del input
  input.addEventListener('blur', e => {
    valor = e.target.value;

    let temp = valor.replace(/[$.]/g, "");                             // Reemplazar los . por nada
    let temp2 = temp.replace(/[,]/g, ".");                            // Reemplazar las , por puntos (para poder codificar la parte decimal)

    if(temp2==''){
      e.target.value = '';                                            // Si no se ingreso nada, no se hace la conversion
    }else{
      e.target.value = `$ ${Number(temp2).toLocaleString('de-DE')}`;    // Se hace la conversion al sistema de-DE
    }

    
  });


  // Evento al hacer focus al input
  input.addEventListener("focus",e=>{
    valor = e.target.value;
    let temp = valor.replace(/[.$]/g, "");                       

    e.target.value = temp;                                      

  })



  // Evento al presionar una tecla
  input.addEventListener("keypress",e=>{
    valor = e.target.value;

    var count = (valor.match(/,/g) || []).length;               // Contar cuantas , hay

    if(e.key==',' && count==1){                                 // Si ya hay una coma no acepta la nueva entrada
      e.preventDefault();
      return;
    }


    if(-1==valoresPermitidos.indexOf(e.key)){                    // indexOf da la posicion de la entrada en el string de valores permitidos (-1 => no se encontro la posicion)
      e.preventDefault();
      return;
    }
  })
}










const numeros = document.getElementsByClassName("Monto");
for(let i=0;i<numeros.length;i++){
  convertir(numeros[i],'de-DE');
}



