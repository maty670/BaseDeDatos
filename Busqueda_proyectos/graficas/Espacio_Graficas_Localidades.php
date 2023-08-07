<!DOCTYPE HTML>
<html>
<body>

	<div class="opcionesGraficasHidden" id="opciones_Localidades">
			<div class="btnGrafica">Tipo:
				<select class="btnTipografica" id="tipo_grafica_Localidad">
	  			  	<option value="bar">Barras</option>
	    			<option value="column">Columnas</option>
	    			<option value="pie">Circular</option>
	   				<option value="doughnut">Anillo</option>
  				</select>  
  			</div>

  			<div class="btnGrafica">Ordenar por:
				<select class="btnTipografica" id="orden_Localidad">
	  			  	<option value="Monto">Monto</option>
	    			<option value="Cantidad">Cantidad</option>
  				</select>  
  			</div>

  			<div class="btnGrafica">Ancho:
				<select class="btnTipografica" id="width_Localidades">
					<option value="25vw">25%</option>
	    			<option value="50vw">50%</option>
	    			<option value="75vw" selected>75%</option>
	    			<option value="95vw">100%</option>
  				</select>
  			</div>

  			<div class="btnGrafica">Alto:
				<select class="btnTipografica" id="height_Localidades">
					<option value="25vh">25%</option>
	    			<option value="50vh" selected>50%</option>
	    			<option value="75vh">75%</option>
	    			<option value="100vh">100%</option>
  				</select>
  			</div>

  			<div class="btnGrafica">Tamaño Fuente:
				<select class="btnTipografica" id="fuente_Localidades">
					<option value="6">6</option>
	  			  	<option value="8">8</option>
	    			<option value="10">10</option>
	    			<option value="12" selected>12</option>
	    			<option value="14">14</option>
	    			<option value="16">16</option>
	    			<option value="18">18</option>
  				</select>
  			</div>
  	</div>

	<div id="Cantidad_Localidad" class="graficasHidden"></div>
	<div id="Montos_Localidad" class="graficasHidden"></div>


</body>
</html>