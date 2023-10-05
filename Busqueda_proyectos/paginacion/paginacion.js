const espacio_paginas = document.querySelector(".espacio_paginacion")
const array_celdas_id = document.querySelectorAll(".id")
const cantidad_registros = document.querySelector(".tabla_resultados").id
const cantidad_paginas = Math.ceil(cantidad_registros / 100)


if(cantidad_paginas<=30){
    espacio_paginas.style.justifyContent="center"
}else{
    espacio_paginas.style.justifyContent="left"
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
        repintar_tabla(pagina.textContent)
        repintar_paginas(pagina)
    })
    espacio_paginas.appendChild(pagina)
}

array_paginas = document.querySelectorAll(".pagina")
repintar_tabla(1)
repintar_paginas(1)


