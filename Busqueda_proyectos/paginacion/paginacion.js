const espacio_paginas = document.querySelector(".espacio_paginacion")
const array_celdas_id = document.querySelectorAll(".id")
const cantidad_celdas_id = array_celdas_id.length
const cantidad_paginas = Math.ceil(cantidad_celdas_id / 100)

if(cantidad_paginas<=30){
    espacio_paginas.style.justifyContent="center"
}else{
    espacio_paginas.style.justifyContent="left"
}

function actualizar_tabla(numPag){
    inicio = (numPag *100) - 99
    final = numPag*100
    for(let i=0; i<array_celdas_id.length; i++){
        if(array_celdas_id[i].textContent>=inicio && array_celdas_id[i].textContent <=final){
            array_celdas_id[i].parentElement.style.display=""
        }else{
            array_celdas_id[i].parentElement.style.display="none"
        }
    }
}

function repintar_paginas(pag){
    array_paginas = document.querySelectorAll(".pagina")
    for(let i=0;i<array_paginas.length;i++){
        if(array_paginas[i].textContent == pag.textContent){
            array_paginas[i].classList.add("paginaSeleccionada")
        }else{
            array_paginas[i].classList.remove("paginaSeleccionada")
        }
    }
}

for(i=1;i<=cantidad_paginas;i++){
    let pagina = document.createElement("DIV")
    pagina.innerHTML=`${i}`
    pagina.setAttribute("class", "pagina");
    pagina.addEventListener("click",()=>{
        actualizar_tabla(pagina.textContent)
        repintar_paginas(pagina)
    })
    espacio_paginas.appendChild(pagina)
}


array_paginas = document.querySelectorAll(".pagina")
actualizar_tabla(1)
repintar_paginas(array_paginas[0])