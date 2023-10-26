
<script>

    function actualizar_dropdown(input,dropdown,event,listado){

        if(event.type=="focus" && input.value!=""){
            //  focus dropdown
            dropdown.classList.add("active");
        }else if(event=="itemClick"){
            dropdown.classList.remove("active");
        
        }else if(event.type=="keyup" || (event.type=="focus" && input.value=="") ){
            // Al presionar una tecla O SI se hace focus y el campo input esta vacio

            // Borrar todos los elementos <a> del dropdown
            let dropdown_content = dropdown.lastElementChild
            dropdown_content.innerHTML=""

            for (elemento of listado){
                //normalize("NFD") separa las tildes de los caracteres acentuados
                //replace(/[\u0300-\u036f]/g, '') los elimina (los remplaza con '')
                let input_normalize = input.value.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, '');
                let elemento_normalize = elemento.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, '');
                if(elemento_normalize.includes(input_normalize)){
                    let item = document.createElement("div")
                    item.setAttribute("class","dropdown_item")
                    item.textContent=elemento
                    dropdown_content.append(item)
                }
            }

            dropdown.classList.add("active");
 
        }
    }





    

    function actualizar_select(option,listado){
        for(let i=0;i<array_inputText.length;i++){

            function focusEventListener(evt){

                actualizar_dropdown(array_inputText[i],array_dropdown[i],evt,listado);

                array_items = array_dropdown[i].children[1].children
                for(let j=0;j<array_items.length;j++){
                    array_items[j].addEventListener("click",()=>{
                        if(array_inputText[i].parentElement.classList.contains("active")){
                            array_inputText[i].value = array_items[j].textContent
                            actualizar_dropdown(array_inputText[i],array_dropdown[i],"itemClick",listado)
                        }
                        
                    })
                }

            };

            function keyupEventListener(evt){

                actualizar_dropdown(array_inputText[i],array_dropdown[i],evt,listado);

                array_items = array_dropdown[i].children[1].children
                for(let j=0;j<array_items.length;j++){
                    array_items[j].addEventListener("click",()=>{
                        if(array_inputText[i].parentElement.classList.contains("active")){
                            
                            array_inputText[i].value = array_items[j].textContent
                            actualizar_dropdown(array_inputText[i],array_dropdown[i],"itemClick",listado)
                        }
                    })
                }

            };
            


            array_inputText[i].addEventListener("focus",function(e){
                if(array_select[i].value==option){
                    focusEventListener(e);
                }
                if(array_select[i].value!=option){
                    this.removeEventListener('focus', arguments.callee);
                }
                
            });

            
            array_inputText[i].addEventListener("keyup",function(e){
                if(array_select[i].value==option){
                    keyupEventListener(e);
                }
                if(array_select[i].value!=option){
                    this.removeEventListener('keyup', arguments.callee);
                }
                
            });
        } 


    }







    let array_select = document.getElementsByClassName("select_operacion")
    let array_dropdown = document.querySelectorAll(".dropdown");
    let array_inputText = document.querySelectorAll(".input_text")

    
    function iniciar_actionListener(option,listado){
        actualizar_select(option,listado)

        // actionListener de los select cada vez que cambian sus valores
        for(let j=0;j<array_select.length;j++){
            array_select[j].addEventListener("change",()=>{
                actualizar_select(option,listado)
            })
        }
    
    }

    // Cerrar todos los dropdown abierto
    function cerrar_dropdown(){
        window.addEventListener("click",(e)=>{
            if(! ((e.target.classList.contains("dropdown_item")) || (e.target.classList.contains("input_text")))){
                for(let i=0;i<array_dropdown.length;i++){
                    array_dropdown[i].classList.remove("active");
                }
            }
        })
    }
    



    
    //////// Obtener desde PHP los listados de 'consultas_dropdown.php' ////////
    var ld = JSON.parse(JSON.stringify(<?php echo json_encode($listado_Directores);?>).replace(/null/g,'""'));
    var lc = JSON.parse(JSON.stringify(<?php echo json_encode($listado_Convocatorias);?>).replace(/null/g,'""'));
    
    
    
    listado_Directores=[];
    for (x of ld){  listado_Directores.push(x.Director)};

    listado_Convocatorias=[];
    for (x of lc){  listado_Convocatorias.push(x.Convocatoria)};

    iniciar_actionListener("Director",listado_Directores);
    iniciar_actionListener("Convocatoria",listado_Convocatorias);
    cerrar_dropdown();

    
    

    
</script>





