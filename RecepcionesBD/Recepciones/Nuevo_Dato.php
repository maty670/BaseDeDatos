<script>
const btn_Nuevos = document.getElementsByClassName("btnNuevo");


		for(let i=0; i< btn_Nuevos.length;i++){
				btn_Nuevos[i].addEventListener("click",()=>{

				nombreTabla = btn_Nuevos[i].id.replace("+","");
				const Tabla = document.getElementById(`tt${nombreTabla.replace(/[.*+\-?_^${}()|[\]\\ ]/g,'')}`);

				const NuevaFila = document.createElement("tr");
				NuevaFila.classList.add(`Datos`);
				NuevaFila.classList.add(`${Cantidad_Datos}`);
				NuevaFila.innerHTML+=`
										<td class="btnEliminar Nuevo"></td>
										<td class="Celda"><input class="input_convocatoria" type="text" required name="Convocatoria${Cantidad_Datos}" value=""></td>
										<td class="Celda"><input type="number" required type="number" name="Año${Cantidad_Datos}" value=""></td>
										<td class="Celda"><input class="Codigo" type="text" name="Codigo${Cantidad_Datos}" value=""></td>
										<td class="Celda"><input class="Director" type="text" name="Director${Cantidad_Datos}" value=""></td>
										<td class="Celda"><input class="Monto" type="text" name="Monto${Cantidad_Datos}" value=""></td>	
										<td class="Celda"><input type="date" name="FechaP${Cantidad_Datos}" value=""></td>
										<td class="Celda"><input type="date" name="FechaV${Cantidad_Datos}" value=""></td>
										<td class="Celda"><input type="number" name="Duracion${Cantidad_Datos}" value=""></td>

										<td class="Celda rendicion inicioR"><input type="date" name="Inicio${Cantidad_Datos}" value=""></td>
										<td class="Celda rendicion"><input type="date" name="R1${Cantidad_Datos}" value=""></td>
										<td class="Celda intimacion"><input type="checkbox" name="I1${Cantidad_Datos}"></td>
										<td class="Celda rendicion"><input type="date" name="R2${Cantidad_Datos}" value=""></td>
										<td class="Celda intimacion"><input type="checkbox" name="I2${Cantidad_Datos}"></td>
										<td class="Celda rendicion"><input type="date" name="R3${Cantidad_Datos}" value=""></td>
										<td class="Celda intimacion"><input type="checkbox" name="I3${Cantidad_Datos}"></td>
										<td class="Celda rendicion"><input type="date" name="R4${Cantidad_Datos}" value=""></td>
										<td class="Celda intimacion"><input type="checkbox" name="I4${Cantidad_Datos}"></td>
										<td class="Celda rendicion"><input type="date" name="R5${Cantidad_Datos}" value=""></td>
										<td class="Celda intimacion"><input type="checkbox" name="I5${Cantidad_Datos}"></td>
										<td class="Celda rendicion"><input type="date" name="R6${Cantidad_Datos}" value=""></td>
										<td class="Celda intimacion"><input type="checkbox" name="I6${Cantidad_Datos}"></td>
										<td class="Celda rendicion"><input type="date" name="R7${Cantidad_Datos}" value=""></td>
										<td class="Celda intimacion"><input type="checkbox" name="I7${Cantidad_Datos}"></td>
										<td class="Celda rendicion"><input type="date" name="R8${Cantidad_Datos}" value=""></td>
										<td class="Celda intimacion"><input type="checkbox" name="I8${Cantidad_Datos}"></td>
										<td class="Celda rendicion"><input type="date" name="R9${Cantidad_Datos}" value=""></td>
										<td class="Celda intimacion"><input type="checkbox" name="I9${Cantidad_Datos}"></td>


										<td class="Celda"><textarea name="FechasInt${Cantidad_Datos}"></textarea></td>
										<td class="Celda"><textarea name="Observacion${Cantidad_Datos}"></textarea></td>

										<td class="Celda"><select type="text" class="input" name="Presento${Cantidad_Datos}">
												<option> </option>
												<option>INICIAL</option>
												<option>DE AVANCE</option>
												<option>FINAL</option>
												<option>RENUNCIO</option>
								 		 </select></td>





										<td class="Celda"><input name="Periodo${Cantidad_Datos}" value=""></td>
										<td class="Celda"><input name="ExpteP${Cantidad_Datos}" value=""></td>
										<td class="Celda"><input name="ResolP${Cantidad_Datos}" value=""></td>
										<td class="Celda"><input name="ExpteR${Cantidad_Datos}" value=""></td>
										<td class="Celda"><input type="date" name="PaseDGA${Cantidad_Datos}" value=""></td>
										<td style="visibility: hidden"><input name="Visible${Cantidad_Datos}" value=""></td>`;


				Tabla.appendChild(NuevaFila);
				Cantidad_Datos = Cantidad_Datos+1;
				document.cookie = `Cantidad_Datos=${Cantidad_Datos}`;

				

				NuevaFila.children[0].addEventListener("click",()=>{
					NuevaFila.remove();
				});

				convertir(NuevaFila.children[5].children[0],'de-DE');







				//-------------------------------------------------------------------------------------------------------------------------------------------------
					var old = JSON.stringify(<?php echo json_encode($resultados);?>).replace(/null/g,'""');
				    var registros = JSON.parse(old);

					const codigos_nuevaFila = NuevaFila.children[3].children[0];
					codigos_nuevaFila.addEventListener("blur",()=>{

						for(let j=0;j<registros.length;j++){
				  			if(codigos_nuevaFila.value==registros[j].Codigo){
				  				codigos_nuevaFila.parentNode.nextElementSibling.children[0].value=registros[j].Director;
				  				j=registros.length;

				  				

								codigos_nuevaFila.parentNode.nextElementSibling.children[0].style.background="#b3ccff";
								codigos_nuevaFila.parentNode.nextElementSibling.style.background="#b3ccff";

								setTimeout(function () {
									codigos_nuevaFila.parentNode.nextElementSibling.children[0].style.background=null;
									codigos_nuevaFila.parentNode.nextElementSibling.style.background=null;
								}, 400);

				  			}else{
				  				codigos_nuevaFila.parentNode.nextElementSibling.children[0].value='';
				  				codigos_nuevaFila.parentNode.nextElementSibling.children[0].style.background=null;
								codigos_nuevaFila.parentNode.nextElementSibling.style.background=null;
				  			}

				  			codigos_nuevaFila.parentNode.style.background=null;
							codigos_nuevaFila.style.background=null;
				  		}
					})

					codigos_nuevaFila.addEventListener("click",()=>{
						codigos_nuevaFila.parentNode.style.background="#ff0";
						codigos_nuevaFila.style.background="#ff0";
					})

				//-------------------------------------------------------------------------------------------------------------------------------------------------



				//-------------------------------------------------------------------------------------------------------------------------------------------------

				//-------------------------------------------------------------------------------------------------------------------------------------------------



	})
}







































</script>