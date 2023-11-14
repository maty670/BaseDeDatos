<script>

    function quitarAcentos(cadena){
        const acentos = {
            'á':'a', 'à':'a', 'ä':'a', 'â':'a', 'ª':'a',
            'é':'e', 'è':'e', 'ë':'e', 'ê':'e',
            'í':'i', 'ì':'i', 'ï':'i', 'î':'i',
            'ó':'o', 'ò':'o', 'ö':'o', 'ô':'o',
            'ú':'u', 'ù':'u', 'ü':'u', 'û':'u',
            'Á':'A', 'À':'A', 'Ä':'A', 'Â':'A',
            'É':'E', 'È':'E', 'Ë':'E', 'Ê':'E',
            'Í':'I', 'Ì':'I', 'Ï':'I', 'Î':'I',
            'Ó':'O', 'Ò':'O', 'Ö':'O', 'Ô':'O',
            'Ú':'U', 'Ù':'U', 'Ü':'U', 'Û':'U'
        };
        return cadena.split('').map( letra => acentos[letra] || letra).join('').toString();	 
    }

    function resaltarFrase(string,nombre_columna) {

        var ap = JSON.stringify(<?php echo json_encode($array_palabras);?>).replace(/null/g,'""');
        var array_palabras = JSON.parse(ap);
		
        var ac = JSON.stringify(<?php echo json_encode($array_columnas);?>).replace(/null/g,'""');
        var array_columnas = JSON.parse(ac);
        var am = JSON.stringify(<?php echo json_encode($array_modalidad);?>).replace(/null/g,'""');
        var array_modalidad = JSON.parse(am);
        
        var aa = JSON.stringify(<?php echo json_encode($array_admisibilidad);?>).replace(/null/g,'""');
        var array_admisibilidad = JSON.parse(aa);

        var af = JSON.stringify(<?php echo json_encode($array_financiacion);?>).replace(/null/g,'""');
        var array_financiacion = JSON.parse(af);


        /* Quitar los acentos a todas las palabras del array*/
        new_array_palabras=[]
        for(let i =0;i<array_palabras.length;i++){
            frase = quitarAcentos(array_palabras[i])
            new_array_palabras.push(frase)
            
        }
        


        /* Agregarle a cada coincidencias de las palabras, una etiqueta div*/
        string = quitarAcentos(string)
        

        if(nombre_columna=="Modalidad"){
            if(array_modalidad[0]!=""){
                const regex = new RegExp('(' + string.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&') + ')', 'gi');
                string = string.replace(regex, "<div class='texto_resaltado'>" + '$1' + '</div>');
            }

        }else if(nombre_columna=="Admisibilidad"){
            if(array_admisibilidad[0]!=""){
                const regex = new RegExp('(' + string.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&') + ')', 'gi');
                string = string.replace(regex, "<div class='texto_resaltado'>" + '$1' + '</div>');
            }  
        }else if(nombre_columna=="Financiacion"){
            if(array_financiacion[0]!=""){
                const regex = new RegExp('(' + string.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&') + ')', 'gi');
                string = string.replace(regex, "<div class='texto_resaltado'>" + '$1' + '</div>');
            }
        }else{
            for (i=0;i<array_palabras.length;i++){
                if(array_palabras[i]!="" && array_columnas[i]==nombre_columna){
                    palabra = quitarAcentos(array_palabras[i])
                    const regex = new RegExp('(' + palabra.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&') + ')', 'gi');
                    string = string.replace(regex, "<div class='texto_resaltado'>" + '$1' + '</div>');
                }
            }
        }
        


        
        return string

    }
    
</script>













<script>

    var old = JSON.stringify(<?php echo json_encode($registros);?>).replace(/null/g,'""');
    var registros = JSON.parse(old);

    var am = JSON.stringify(<?php echo json_encode($array_modalidad);?>).replace(/null/g,'""');
    var array_modalidad = JSON.parse(am);

    var aa = JSON.stringify(<?php echo json_encode($array_admisibilidad);?>).replace(/null/g,'""');
    var array_admisibilidad = JSON.parse(aa)

    var af = JSON.stringify(<?php echo json_encode($array_financiacion);?>).replace(/null/g,'""');
    var array_financiacion = JSON.parse(af)


    const tabla_resultados = document.querySelector(".tabla_resultados")

    function borrar_filas_tr(){
        filas_tr = document.querySelectorAll(".tr_celda");

        for(let i=0; i<filas_tr.length;i++){
            filas_tr[i].remove()
        }
    }

    function repintar_tabla(pag){
        inicio = (pag*100) - 100
        limite = pag*100
        if(limite>registros.length){
            limite = registros.length;
        }
        borrar_filas_tr()
        for (let i=inicio; i<limite; i++){
            const NuevaFila = document.createElement("tr");

            let Codigo = resaltarFrase(registros[i].Codigo,"Codigo")
            let Modalidad = resaltarFrase(registros[i].Modalidad,"Modalidad")
            let Titulo = resaltarFrase(registros[i].Titulo,"Titulo")
            let Beneficiario = resaltarFrase(registros[i].Beneficiario,"Beneficiario")
            let Departamento = resaltarFrase(registros[i].Beneficiario_Departamento,"Beneficiario_Departamento")
            let Localidad = resaltarFrase(registros[i].Beneficiario_Localidad,"Beneficiario_Localidad")
            let Director = resaltarFrase(registros[i].Director,"Director")
            let Organizacion_Vinculante = resaltarFrase(registros[i].Organizacion_Vinculante,"Organizacion_Vinculante")
            let Palabras_Claves = resaltarFrase(registros[i].Palabras_Claves,"Palabras_Claves")
            let Convocatoria = resaltarFrase(registros[i].Convocatoria,"Convocatoria")
            let Admisibilidad = resaltarFrase(registros[i].Admisibilidad,"Admisibilidad")
            let Financiacion = resaltarFrase(registros[i].Financiacion,"Financiacion")

            let Monto_ANR;
            if(registros[i].Monto_ANR==""){
                Monto_ANR = ""
            }else{
                Monto_ANR = "$ " + registros[i].Monto_ANR
            }

            NuevaFila.setAttribute("class","tr_celda")
            NuevaFila.setAttribute("tabindex","1")
            NuevaFila.innerHTML+=`<td class="celda id">${i+1}</td>
            <td class="celda l1 codigo">${Codigo}</td>
            <td class="celda center">${Modalidad}</td>
            <td class="celda l1">${Titulo}</td>
            <td class="celda l2">${Beneficiario}</td>
            <td class="celda l2">${registros[i].Beneficiario_Correo}</td>
            <td class="celda l2">${Departamento}</td>
			<td class="celda l2">${Localidad}</td>
            <td class="celda l2">${Director}</td>
			<td class="celda l1">${registros[i].Director_Correo}</td>
            <td class="celda l1">${Organizacion_Vinculante}</td>
			<td class="celda l2">${registros[i].Organizacion_Vinculante_Correo}</td>
            <td class="celda l2">${Palabras_Claves}</td>
            <td class="celda center">${Monto_ANR}</td>
            <td class="celda l1">${Convocatoria}</td>
            <td class="celda center">${registros[i].Año}</td>
            <td class="celda l1">${Admisibilidad}</td>
            <td class="celda l1">${Financiacion}</td>
            <td class="celda l2">${registros[i].Puntaje}</td>`;
            tabla_resultados.append(NuevaFila)
        }
    }

    
</script>