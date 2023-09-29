<script>
    var old = JSON.stringify(<?php echo json_encode($registros);?>).replace(/null/g,'""');
    var registros = JSON.parse(old);
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
            if(registros[i].Monto_ANR!=""){
                Monto = '$' + registros[i].Monto_ANR
            }else{
                Monto = registros[i].Monto_ANR
            }
            NuevaFila.setAttribute("class","tr_celda")
            NuevaFila.setAttribute("tabindex","1")
            NuevaFila.innerHTML+=`<td class="celda id">${i+1}</td>
            <td class="celda l3">${registros[i].Codigo}</td>
            <td class="celda center">${registros[i].Modalidad}</td>
            <td class="celda l1">${registros[i].Titulo}</td>
            <td class="celda l3">${registros[i].Beneficiario}</td>
            <td class="celda l2">${registros[i].Beneficiario_Correo}</td>
            <td class="celda l4">${registros[i].Beneficiario_Departamento}</td>
			<td class="celda l4">${registros[i].Beneficiario_Localidad}</td>
            <td class="celda l3">${registros[i].Director}</td>
			<td class="celda l1">${registros[i].Director_Correo}</td>
            <td class="celda l1">${registros[i].Organizacion_Vinculante}</td>
			<td class="celda l2">${registros[i].Organizacion_Vinculante_Correo}</td>
            <td class="celda center">${registros[i].Monto_ANR}</td>
            <td class="celda l3">${registros[i].Convocatoria}</td>
            <td class="celda center">${registros[i].Año}</td>
            <td class="celda l4">${registros[i].Admisibilidad}</td>
            <td class="celda l4">${registros[i].Financiacion}</td>
            <td class="celda l4">${registros[i].Puntaje}</td>`;
            tabla_resultados.append(NuevaFila)
            registros[i].Codigo
        }
    }

    
</script>