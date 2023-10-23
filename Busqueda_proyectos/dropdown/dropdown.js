
listado_Convocatorias = ["PEIC I+D", "INNOVAR", "PEIC-A", "DEMES", "CDAT", "DTT", "EBT"]

function actualizar_dropdown(input,dropdown,event,option){

    if(event=="focus" && input.value!=""){
        //  focus dropdown
        dropdown.classList.add("active");
    }else if(event=="blur"){
        //  dropdown lost focus
        dropdown.classList.remove("active");
    }else if(event=="keyup" || (event=="focus" && input.value=="") ){
        // Al presionar una tecla O SI se hace focus y el campo input esta vacio

        // Borrar todos los elementos <a> del dropdown
        let dropdown_content = dropdown.lastElementChild
        dropdown_content.innerHTML=""

        // Recorrer el listado de elementos con los elementos y colocarlos en el dropdown
        if(option=="Convocatoria"){
            listado = listado_Convocatorias
        }
        for (elemento of listado){
            //normalize("NFD") separa las tildes de los caracteres acentuados
            //replace(/[\u0300-\u036f]/g, '') los elimina (los remplaza con '')
            let input_normalize = input.value.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, '');
            let elemento_normalize = elemento.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, '');
            if(elemento_normalize.includes(input_normalize)){
                let item = document.createElement("a")
                item.textContent=elemento
                dropdown_content.append(item)
            }
        }

        dropdown.classList.add("active");
    }
}





let array_select = document.getElementsByClassName("select_operacion")
let array_dropdown = document.querySelectorAll(".dropdown");
let array_inputText = document.querySelectorAll(".input_text")

function actualizar_select(option){
    for(let i=0;i<array_inputText.length;i++){
        function focusEventListener(evt){
            actualizar_dropdown(array_inputText[i],array_dropdown[i],evt,option);
        };
        function blurEventListener(evt){
            actualizar_dropdown(array_inputText[i],array_dropdown[i],evt,option);
        };
        function keyupEventListener(evt){
            actualizar_dropdown(array_inputText[i],array_dropdown[i],evt,option);
        };
        


        array_inputText[i].addEventListener("focus",function(e){
            if(array_select[i].value==option){
                focusEventListener(e.type);
            }
            if(array_select[i].value!=option){
                this.removeEventListener('focus', arguments.callee);
            }
            
        });
        array_inputText[i].addEventListener("blur",function(e){
            if(array_select[i].value==option){
                blurEventListener(e.type);
            }
            if(array_select[i].value!=option){
                this.removeEventListener('blur', arguments.callee);
            }
            
        });
        array_inputText[i].addEventListener("keyup",function(e){
            if(array_select[i].value==option){
                keyupEventListener(e.type);
            }
            if(array_select[i].value!=option){
                this.removeEventListener('keyup', arguments.callee);
            }
            
        });
    } 
}

for(let j=0;j<array_select.length;j++){

    array_select[j].addEventListener("change",()=>{
        actualizar_select("Convocatoria")
    })
}

actualizar_select("Convocatoria")





