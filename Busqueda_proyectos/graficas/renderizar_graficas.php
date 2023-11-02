<?php

include("consulta_convocatoria.php");

include("consulta_localidades.php");

include("consulta_departamentos.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<script>

window.onload = function() {

let ejeY = "12";
let ejeX = "12";


//-----------------------------------------------------------------------------------------------------------------//
//------------------------------------------- Graficas de Convocatorias -------------------------------------------//
//-----------------------------------------------------------------------------------------------------------------//

	CanvasJS.addColorSet("colores",
        [
            'Thistle',
			'DarkCyan',
			'Coral',
			'Indigo',
			'DarkSlateGray',
			'RosyBrown',
			'DodgerBlue',
			'Crimson',
			'Pink',
			'CadetBlue',
			'Gold',
			'Olive',
			'PaleVioletRed',
			'DarkOrange',
			'SlateBlue',
			'IndianRed',
			'SeaGreen',
			'Peru',
			'Salmon',
			'Maroon',
			'DarkKhaki',
			'OliveDrab',
			'YellowGreen',
			'Chocolate',
			'SteelBlue',
			'CornflowerBlue',
			'DarkRed',
			'Orange',
			'PaleGreen',
			'DarkOliveGreen',
			'LightCoral',
			'MediumSeaGreen',
			'Navy',
			'DarkSeaGreen',
			'Khaki',
			'LimeGreen'
	]);


	var chartMontos = new CanvasJS.Chart("Montos_Convocatoria", {

		colorSet: "colores",
		animationEnabled: true,
		backgroundColor: "transparent",
		exportEnabled: true,
		exportFileName: "Doughnut Chart",
		title:{
			text: "Monto ANR otorgado por cada convocatoria: Total $" + <?php echo json_encode($monto_acumulado, JSON_NUMERIC_CHECK); ?>,
			fontSize:"15",
			fontFamily: "Helvetica",
			fontWeight: "bolder",
		},
		axisY: {
			title: "",
			prefix: "$",
			labelFontSize: ejeY,
			interlacedColor: "rgba(1,77,101,.2)",
			gridColor: "rgba(1,77,101,.1)",
			labelAngle: 0,
		},
		axisX: {
			 labelFontSize: ejeX,
			 interval:1,
			 labelAngle: 0,

		},


		data: [{
			type: "bar",
			innerRadius: 90,
			yValueFormatString: "$#,##0",
			indexLabel: "{y}",
			indexLabelPlacement: "outside",
			indexLabelFontWeight: "bolder",
			indexLabelFontColor: "black",
			indexLabelFontSize: "12",
			dataPoints: <?php echo json_encode($datosMontosConvocatoria1, JSON_NUMERIC_CHECK); ?>
		}]
	});



	var chartProyectos = new CanvasJS.Chart("Proyectos_Convocatoria", {
		colorSet: "colores",
		animationEnabled: false,
		backgroundColor: "transparent",
		exportFileName: "Doughnut Chart",
		exportEnabled: true,
		title:{
			text: "Cantidad de proyectos agrupados por convocatoria: Total " + <?php echo json_encode($cantidad, JSON_NUMERIC_CHECK); ?>,
			fontSize:"15",
			fontFamily: "Helvetica",
			fontWeight: "bolder",
		},
		axisY: {
			title: "",
			prefix: "",
			labelFontSize: ejeY,
			interlacedColor: "rgba(1,77,101,.2)",
			gridColor: "rgba(1,77,101,.1)",
			labelAngle: 0,
		},
		axisX: {
			 labelFontSize: ejeX,
			 interval:1,
			 labelAngle: 0,

		},

		data: [{
			type: "bar",
			innerRadius: 90,
			indexLabel: "{y}",
			indexLabelPlacement: "outside",
			indexLabelFontWeight: "bolder",
			indexLabelFontColor: "black",
			indexLabelFontSize: "12",
			dataPoints: <?php echo json_encode($datosProyectosConvocatoria1, JSON_NUMERIC_CHECK); ?>
		}]
	});



	var chartMontosPorCant = new CanvasJS.Chart("Montos_Por_Cant", {
		colorSet: "colores",
		animationEnabled: true,
		backgroundColor: "transparent",
		exportFileName: "Doughnut Chart",
		exportEnabled: true,
		title:{
			text: "ANR promedio total otorgado a cada proyecto por convocatoria: Total $" + <?php echo json_encode($monto_acumulado, JSON_NUMERIC_CHECK); ?>,
			fontSize:"15",
			fontFamily: "Helvetica",
			fontWeight: "bolder",
		},
		axisY: {
			title: "",
			prefix: "$",
			 labelFontSize: ejeY,
			interlacedColor: "rgba(1,77,101,.2)",
			gridColor: "rgba(1,77,101,.1)",
			labelAngle: 0,
		},
		axisX: {
			 labelFontSize: ejeX,
			 interval:1,
			 labelAngle: 0,

		},

		data: [{
			type: "bar",
			innerRadius: 90,
			yValueFormatString: "$#,##0",
			indexLabel: "{y}",
			indexLabelPlacement: "outside",
			indexLabelFontWeight: "bolder",
			indexLabelFontColor: "black",
			indexLabelFontSize: "12",
			dataPoints: <?php echo json_encode($datosMontosPorCantidad1, JSON_NUMERIC_CHECK); ?>
		}]
	});

//---------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//








//---------------------------------------------------------------------------------------------------------------//
//------------------------------------------- Graficas de Departamentos -------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//



	var chartMontosDep = new CanvasJS.Chart("Montos_Departamento", {
		colorSet: "colores",
		animationEnabled: true,
		backgroundColor: "transparent",
		exportFileName: "Doughnut Chart",
		exportEnabled: true,
		title:{
			text: "Monto ANR total otorgado a cada departamento: Total $" + <?php echo json_encode($monto_acumulado, JSON_NUMERIC_CHECK); ?>,
			fontSize:"15",
			fontFamily: "Helvetica",
			fontWeight: "bolder",
		},
		axisY: {
			title: "",
			prefix: "$",
			 labelFontSize: ejeY,
			interlacedColor: "rgba(1,77,101,.2)",
			gridColor: "rgba(1,77,101,.1)",
			labelAngle: 0,
		},
		axisX: {
			 labelFontSize: ejeX,
			 interval:1,
			 labelAngle: 0,

		},

		data: [{
			type: "bar",
			innerRadius: 90,
			yValueFormatString: "$#,##0",
			indexLabel: "{y}",
			indexLabelPlacement: "outside",
			indexLabelFontWeight: "bolder",
			indexLabelFontColor: "black",
			indexLabelFontSize: "12",
			dataPoints: <?php echo json_encode($datosMontosDepartamentos1, JSON_NUMERIC_CHECK); ?>//*****//
		}]
	});



	var chartCantidadDep = new CanvasJS.Chart("Cantidad_Departamento", {
		colorSet: "colores",
		animationEnabled: false,
		backgroundColor: "transparent",
		exportFileName: "Doughnut Chart",
		exportEnabled: true,
		title:{
			text: "Cantidad de proyectos por departamento: Total " + <?php echo json_encode($cantidad, JSON_NUMERIC_CHECK); ?>,
			fontSize:"15",
			fontFamily: "Helvetica",
			fontWeight: "bolder",
		},
		axisY: {
			title: "",
			prefix: "",
			labelFontSize: ejeY,
			interlacedColor: "rgba(1,77,101,.2)",
			gridColor: "rgba(1,77,101,.1)",
			labelAngle: 0,
		},
		axisX: {
			 labelFontSize: ejeX,
			 interval:1,
			 labelAngle: 0,

		},

		data: [{
			type: "bar",
			innerRadius: 90,
			indexLabel: "{y}",
			indexLabelPlacement: "outside",
			indexLabelFontWeight: "bolder",
			indexLabelFontColor: "black",
			indexLabelFontSize: "12",
			dataPoints: <?php echo json_encode($datosCantidadDepartamentos1, JSON_NUMERIC_CHECK); ?>
		}]
	});

//---------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//











//---------------------------------------------------------------------------------------------------------------//
//------------------------------------------- Graficas de Localidades -------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//

	var chartMontosLoc = new CanvasJS.Chart("Montos_Localidad", {
		colorSet: "colores",
		animationEnabled: true,
		backgroundColor: "transparent",
		exportFileName: "Doughnut Chart",
		exportEnabled: true,
		title:{
			text: "Monto ANR total otorgado por cada localidad: Total $" + <?php echo json_encode($monto_acumulado, JSON_NUMERIC_CHECK); ?>,
			fontSize:"15",
			fontFamily: "Helvetica",
			fontWeight: "bolder",
		},
		axisY: {
			title: "",
			prefix: "$",
			 labelFontSize: ejeY,
			interlacedColor: "rgba(1,77,101,.2)",
			gridColor: "rgba(1,77,101,.1)",
			labelAngle: 0,
		},
		axisX: {
			 labelFontSize: ejeX,
			 interval:1,
			 labelAngle: 0,

		},

		data: [{
			type: "bar",
			innerRadius: 90,
			yValueFormatString: "$#,##0",
			indexLabel: "{y}",
			indexLabelPlacement: "outside",
			indexLabelFontWeight: "bolder",
			indexLabelFontColor: "black",
			indexLabelFontSize: "12",
			dataPoints: <?php echo json_encode($datosMontosLocalidades1, JSON_NUMERIC_CHECK); ?>//*****//
		}]
	});



	var chartCantidadLoc = new CanvasJS.Chart("Cantidad_Localidad", {
		colorSet: "colores",
		animationEnabled: false,
		backgroundColor: "transparent",
		exportFileName: "Doughnut Chart",
		exportEnabled: true,
		title:{
			text: "Cantidad de proyectos por localidad: Total " + <?php echo json_encode($cantidad, JSON_NUMERIC_CHECK); ?>,
			fontSize:"15",
			fontFamily: "Helvetica",
			fontWeight: "bolder",
		},
		axisY: {
			title: "",
			prefix: "",
			labelFontSize: ejeY,
			interlacedColor: "rgba(1,77,101,.2)",
			gridColor: "rgba(1,77,101,.1)",
			labelAngle: 0,
		},
		axisX: {
			 labelFontSize: ejeX,
			 interval:1,
			 labelAngle: 0,

		},

		data: [{
			type: "bar",
			innerRadius: 90,
			indexLabel: "{y}",
			indexLabelPlacement: "outside",
			indexLabelFontWeight: "bolder",
			indexLabelFontColor: "black",
			indexLabelFontSize: "12",
			dataPoints: <?php echo json_encode($datosCantidadLocalidades1, JSON_NUMERIC_CHECK); ?>
		}]
	});

//---------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//









//-----------------------------------------------------------------------------------------------------------------//
//------------------------------------------- Botones Graficas de Convocatorias -----------------------------------//
//-----------------------------------------------------------------------------------------------------------------//


		const btnTablaConv = document.getElementById("btnTablaConv");
		const tablaConvocatorias = document.querySelector(".resultados_conv_hidden");
		const btnGraficasConv = document.getElementById("btnGraficasConv");


		const tipoConvocatoria = document.getElementById('tipo_grafica_Convocatoria');
		const orden_Convocatoria = document.getElementById("orden_Convocatoria");
		const width_Convocatoria = document.getElementById("width_Convocatoria");
		const height_Convocatoria = document.getElementById("height_Convocatoria");
		const fuente_Convocatoria = document.getElementById("fuente_Convocatoria");

		const graficaMontos = document.getElementById("Montos_Convocatoria");
		const graficaProyectos = document.getElementById("Proyectos_Convocatoria");
		const graficaMontosPorCant = document.getElementById("Montos_Por_Cant");






		btnTablaConv.addEventListener("click",()=>{
			if (tablaConvocatorias.className == "resultados_conv_hidden") {
				tablaConvocatorias.className = "resultados_conv resultados";
				btnTablaConv.innerHTML = `<i class="fa-solid fa-table-cells"></i>
										  Tabla Convocatorias
										  <i class="fa-regular fa-eye-slash"></i>`
			}else{
				tablaConvocatorias.className = "resultados_conv_hidden";
				btnTablaConv.innerHTML = `<i class="fa-solid fa-table-cells"></i>
										  Tabla Convocatorias
										  <i class="fa-regular fa-eye"></i>`;
			}
		});
		btnGraficasConv.addEventListener("click",()=>{
			if(graficaProyectos.className == "graficasVisible") {

				btnGraficasConv.innerHTML = `<i class="fa-solid fa-chart-simple"></i> 
											 Gráficas Convocatorias
											 <i class="fa-regular fa-eye"></i>`

				graficaProyectos.className = "graficasHidden";
				graficaMontos.className = "graficasHidden";
				graficaMontosPorCant.className = "graficasHidden";

				
				document.getElementById("opciones_Convocatorias").className = "opcionesGraficasHidden";

			}else{

				btnGraficasConv.innerHTML = `<i class="fa-solid fa-chart-simple"></i> 
											 Gráficas Convocatorias
											 <i class="fa-regular fa-eye-slash"></i>`

				graficaProyectos.className = "graficasVisible";
				graficaMontos.className = "graficasVisible";
				graficaMontosPorCant.className = "graficasVisible";

				document.getElementById("opciones_Convocatorias").className = "opcionesGraficasVisible";

				chartProyectos.render();
				chartMontos.render();
				chartMontosPorCant.render();
			}
		});
			

			
						

			
				tipoConvocatoria.addEventListener( "change",  function(){
				  chartProyectos.options.data[0].type = tipoConvocatoria.options[tipoConvocatoria.selectedIndex].value;
				  chartMontos.options.data[0].type = tipoConvocatoria.options[tipoConvocatoria.selectedIndex].value;
				  chartMontosPorCant.options.data[0].type = tipoConvocatoria.options[tipoConvocatoria.selectedIndex].value;

				  if(tipoConvocatoria.options[tipoConvocatoria.selectedIndex].value=="pie"
				  || tipoConvocatoria.options[tipoConvocatoria.selectedIndex].value=="doughnut")
				  {
				  	chartProyectos.options.data[0].indexLabel = "{label} - {y}";
				    chartMontos.options.data[0].indexLabel = "{label} - {y}";
				    chartMontosPorCant.options.data[0].indexLabel = "{label} - {y}";
				  }else{
				  	chartProyectos.options.data[0].indexLabel = "{y}";
				    chartMontos.options.data[0].indexLabel = "{y}";
				    chartMontosPorCant.options.data[0].indexLabel = "{y}";
				  }
				  chartProyectos.render();
				  chartMontos.render();
				  chartMontosPorCant.render();
			});




			
				orden_Convocatoria.addEventListener("change",function(){
					if(orden_Convocatoria.options[orden_Convocatoria.selectedIndex].value=="Monto"){
						chartMontos.options.data[0].dataPoints = <?php echo json_encode($datosMontosConvocatoria1, JSON_NUMERIC_CHECK); ?>;
						chartProyectos.options.data[0].dataPoints = <?php echo json_encode($datosProyectosConvocatoria1, JSON_NUMERIC_CHECK); ?>;
						chartMontosPorCant.options.data[0].dataPoints = <?php echo json_encode($datosMontosPorCantidad1, JSON_NUMERIC_CHECK); ?>;
						
					}else if(orden_Convocatoria.options[orden_Convocatoria.selectedIndex].value=="Cantidad"){
						chartMontos.options.data[0].dataPoints = <?php echo json_encode($datosMontosConvocatoria2, JSON_NUMERIC_CHECK); ?>;
						chartProyectos.options.data[0].dataPoints = <?php echo json_encode($datosProyectosConvocatoria2, JSON_NUMERIC_CHECK); ?>;
						chartMontosPorCant.options.data[0].dataPoints = <?php echo json_encode($datosMontosPorCantidad2, JSON_NUMERIC_CHECK); ?>;
					}

				  chartProyectos.render();
				  chartMontos.render();
				  chartMontosPorCant.render();

				})



			width_Convocatoria.addEventListener("change",function(){

				  graficaProyectos.style.width = width_Convocatoria.options[width_Convocatoria.selectedIndex].value;
				  graficaMontos.style.width = width_Convocatoria.options[width_Convocatoria.selectedIndex].value;
				  graficaMontosPorCant.style.width = width_Convocatoria.options[width_Convocatoria.selectedIndex].value;

				  

				  chartProyectos.render();
				  chartMontos.render();
				  chartMontosPorCant.render();

				})

			height_Convocatoria.addEventListener("change",function(){

				  graficaProyectos.style.height = height_Convocatoria.options[height_Convocatoria.selectedIndex].value;
				  graficaMontos.style.height = height_Convocatoria.options[height_Convocatoria.selectedIndex].value;
				  graficaMontosPorCant.style.height = height_Convocatoria.options[height_Convocatoria.selectedIndex].value;

				  

				  chartProyectos.render();
				  chartMontos.render();
				  chartMontosPorCant.render();

				})



			fuente_Convocatoria.addEventListener("change",function(){

				  chartMontos.options.axisX.labelFontSize = fuente_Convocatoria.options[fuente_Convocatoria.selectedIndex].value;
				  chartProyectos.options.axisX.labelFontSize = fuente_Convocatoria.options[fuente_Convocatoria.selectedIndex].value;
				  chartMontosPorCant.options.axisX.labelFontSize = fuente_Convocatoria.options[fuente_Convocatoria.selectedIndex].value;

				  chartMontos.options.axisY.labelFontSize = fuente_Convocatoria.options[fuente_Convocatoria.selectedIndex].value;
				  chartProyectos.options.axisY.labelFontSize = fuente_Convocatoria.options[fuente_Convocatoria.selectedIndex].value;
				  chartMontosPorCant.options.axisY.labelFontSize = fuente_Convocatoria.options[fuente_Convocatoria.selectedIndex].value;

				  chartMontos.options.data[0].indexLabelFontSize = fuente_Convocatoria.options[fuente_Convocatoria.selectedIndex].value;
				  chartProyectos.options.data[0].indexLabelFontSize = fuente_Convocatoria.options[fuente_Convocatoria.selectedIndex].value;
				  chartMontosPorCant.options.data[0].indexLabelFontSize = fuente_Convocatoria.options[fuente_Convocatoria.selectedIndex].value;
				  

				  chartProyectos.render();
				  chartMontos.render();
				  chartMontosPorCant.render();

				})



				btnTablaConv.click()


//---------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//








//-----------------------------------------------------------------------------------------------------------------//
//------------------------------------------- Botones Graficas de Departamentos -------------------------------------//
//-----------------------------------------------------------------------------------------------------------------//

		const btnTablaDep = document.getElementById("btnTablaDep");
		const tablaDepartamentos = document.querySelector(".resultados_dep_hidden");
		const btnGraficasDep = document.getElementById("btnGraficasDep");


		const tipoDepartamento = document.getElementById('tipo_grafica_Departamento');
		const orden_Departamento = document.getElementById("orden_Departamento");
		const width_Departamentos = document.getElementById("width_Departamentos");
		const height_Departamentos = document.getElementById("height_Departamentos");
		const fuente_Departamentos = document.getElementById("fuente_Departamentos");


		const graficaCantidadDepartamentos = document.getElementById("Cantidad_Departamento");
		const graficaMontosDepartamentos = document.getElementById("Montos_Departamento");



						

		btnTablaDep.addEventListener("click",()=>{
			if (tablaDepartamentos.className == "resultados_dep_hidden") {
				tablaDepartamentos.className = "resultados_dep resultados";
				btnTablaDep.innerHTML = `<i class="fa-solid fa-table-cells"></i>
										  Tabla Departamentos
										  <i class="fa-regular fa-eye-slash"></i>`
			}else{
				tablaDepartamentos.className = "resultados_dep_hidden";
				btnTablaDep.innerHTML = `<i class="fa-solid fa-table-cells"></i>
										  Tabla Departamentos
										  <i class="fa-regular fa-eye"></i>`
				
			}
		})

		btnGraficasDep.addEventListener("click",()=>{
			if(graficaMontosDepartamentos.className == "graficasVisible") {

				btnGraficasDep.innerHTML = `<i class="fa-solid fa-chart-simple"></i> 
											 Gráficas Departamentos
											 <i class="fa-regular fa-eye"></i>`;

				graficaMontosDepartamentos.className = "graficasHidden";
				graficaCantidadDepartamentos.className = "graficasHidden";

				document.getElementById("opciones_Departamentos").className = "opcionesGraficasHidden";
			}else{

				btnGraficasDep.innerHTML = `<i class="fa-solid fa-chart-simple"></i> 
											 Gráficas Departamentos
											 <i class="fa-regular fa-eye-slash"></i>`;

				graficaMontosDepartamentos.className = "graficasVisible";
				graficaCantidadDepartamentos.className = "graficasVisible";

				document.getElementById("opciones_Departamentos").className = "opcionesGraficasVisible";

				chartMontosDep.render();
				chartCantidadDep.render();
			}
		});


		
				tipoDepartamento.addEventListener( "change",  function(){
				  chartCantidadDep.options.data[0].type = tipoDepartamento.options[tipoDepartamento.selectedIndex].value;
				  chartMontosDep.options.data[0].type = tipoDepartamento.options[tipoDepartamento.selectedIndex].value;


				  if(tipoDepartamento.options[tipoDepartamento.selectedIndex].value=="pie"
				  || tipoDepartamento.options[tipoDepartamento.selectedIndex].value=="doughnut")
				  {
				  	chartCantidadDep.options.data[0].indexLabel = "{label} - {y}";
				    chartMontosDep.options.data[0].indexLabel = "{label} - {y}";

				  }else{
				  	chartCantidadDep.options.data[0].indexLabel = "{y}";
				    chartMontosDep.options.data[0].indexLabel = "{y}";

				  }
				  chartCantidadDep.render();
				  chartMontosDep.render();

			});




			
				orden_Departamento.addEventListener("change",function(){
					if(orden_Departamento.options[orden_Departamento.selectedIndex].value=="Monto"){
						chartCantidadDep.options.data[0].dataPoints = <?php echo json_encode($datosCantidadDepartamentos1, JSON_NUMERIC_CHECK); ?>;
						chartMontosDep.options.data[0].dataPoints = <?php echo json_encode($datosMontosDepartamentos1, JSON_NUMERIC_CHECK); ?>;
						
					}else if(orden_Departamento.options[orden_Departamento.selectedIndex].value=="Cantidad"){
						chartCantidadDep.options.data[0].dataPoints = <?php echo json_encode($datosCantidadDepartamentos2, JSON_NUMERIC_CHECK); ?>;
						chartMontosDep.options.data[0].dataPoints = <?php echo json_encode($datosMontosDepartamentos2, JSON_NUMERIC_CHECK); ?>;
					}

				  chartCantidadDep.render();
				  chartMontosDep.render();

				})


				width_Departamentos.addEventListener("change",function(){

				  graficaMontosDepartamentos.style.width = width_Departamentos.options[width_Departamentos.selectedIndex].value;
				  graficaCantidadDepartamentos.style.width = width_Departamentos.options[width_Departamentos.selectedIndex].value;

				  chartMontosDep.render();
				  chartCantidadDep.render();


				})

				height_Departamentos.addEventListener("change",function(){

				  graficaMontosDepartamentos.style.height = height_Departamentos.options[height_Departamentos.selectedIndex].value;
				  graficaCantidadDepartamentos.style.height = height_Departamentos.options[height_Departamentos.selectedIndex].value;			  

				  chartMontosDep.render();
				  chartCantidadDep.render();


				})


				fuente_Departamentos.addEventListener("change",function(){

				  chartCantidadDep.options.axisX.labelFontSize = fuente_Departamentos.options[fuente_Departamentos.selectedIndex].value;
				  chartMontosDep.options.axisX.labelFontSize = fuente_Departamentos.options[fuente_Departamentos.selectedIndex].value;
				 

				  chartCantidadDep.options.axisY.labelFontSize = fuente_Departamentos.options[fuente_Departamentos.selectedIndex].value;
				  chartMontosDep.options.axisY.labelFontSize = fuente_Departamentos.options[fuente_Departamentos.selectedIndex].value;
				  

				  chartCantidadDep.options.data[0].indexLabelFontSize = fuente_Departamentos.options[fuente_Departamentos.selectedIndex].value;
				  chartMontosDep.options.data[0].indexLabelFontSize = fuente_Departamentos.options[fuente_Departamentos.selectedIndex].value;
				  
				  

				  chartMontosDep.render();
				  chartCantidadDep.render();


				})





//---------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//











//-----------------------------------------------------------------------------------------------------------------//
//------------------------------------------- Botones Graficas de Localidades -------------------------------------//
//-----------------------------------------------------------------------------------------------------------------//

		const btnTablaLoc = document.getElementById("btnTablaLoc");
		const tablaLocalidades = document.querySelector(".resultados_loc_hidden");
		const btnGraficasLoc = document.getElementById("btnGraficasLoc");


		const tipoLocalidad = document.getElementById('tipo_grafica_Localidad');
		const orden_Localidad = document.getElementById("orden_Localidad");
		const width_Localidades = document.getElementById("width_Localidades");
		const height_Localidades = document.getElementById("height_Localidades");
		const fuente_Localidades = document.getElementById("fuente_Localidades");

		const graficaCantidadLocalidades = document.getElementById("Cantidad_Localidad");
		const graficaMontosLocalidades = document.getElementById("Montos_Localidad");




						

		btnTablaLoc.addEventListener("click",()=>{
			if (tablaLocalidades.className == "resultados_loc_hidden") {
				tablaLocalidades.className = "resultados_loc resultados";
				btnTablaLoc.innerHTML = `<i class="fa-solid fa-table-cells"></i>
										  Tabla Localidades
										  <i class="fa-regular fa-eye-slash"></i>`
			}else{
				tablaLocalidades.className = "resultados_loc_hidden";
				btnTablaLoc.innerHTML = `<i class="fa-solid fa-table-cells"></i>
										  Tabla Localidades
										  <i class="fa-regular fa-eye"></i>`
				
			}
		})

		btnGraficasLoc.addEventListener("click",()=>{
			if(graficaMontosLocalidades.className == "graficasVisible") {

				btnGraficasLoc.innerHTML = `<i class="fa-solid fa-chart-simple"></i> 
											 Gráficas Localidades
											 <i class="fa-regular fa-eye"></i>`;

				graficaMontosLocalidades.className = "graficasHidden";
				graficaCantidadLocalidades.className = "graficasHidden";

				document.getElementById("opciones_Localidades").className = "opcionesGraficasHidden";

			}else{

				btnGraficasLoc.innerHTML = `<i class="fa-solid fa-chart-simple"></i> 
											 Gráficas Localidades
											 <i class="fa-regular fa-eye-slash"></i>`;

				graficaMontosLocalidades.className = "graficasVisible";
				graficaCantidadLocalidades.className = "graficasVisible";

				document.getElementById("opciones_Localidades").className = "opcionesGraficasVisible";

				chartMontosLoc.render();
				chartCantidadLoc.render();
			}
		});


		
				tipoLocalidad.addEventListener( "change",  function(){
				  chartCantidadLoc.options.data[0].type = tipoLocalidad.options[tipoLocalidad.selectedIndex].value;
				  chartMontosLoc.options.data[0].type = tipoLocalidad.options[tipoLocalidad.selectedIndex].value;


				  if(tipoLocalidad.options[tipoLocalidad.selectedIndex].value=="pie"
				  || tipoLocalidad.options[tipoLocalidad.selectedIndex].value=="doughnut")
				  {
				  	chartCantidadLoc.options.data[0].indexLabel = "{label} - {y}";
				    chartMontosLoc.options.data[0].indexLabel = "{label} - {y}";

				  }else{
				  	chartCantidadLoc.options.data[0].indexLabel = "{y}";
				    chartMontosLoc.options.data[0].indexLabel = "{y}";

				  }
				  chartCantidadLoc.render();
				  chartMontosLoc.render();

			});



			
				orden_Localidad.addEventListener("change",function(){
					if(orden_Localidad.options[orden_Localidad.selectedIndex].value=="Monto"){
						chartCantidadLoc.options.data[0].dataPoints = <?php echo json_encode($datosCantidadLocalidades1, JSON_NUMERIC_CHECK); ?>;
						chartMontosLoc.options.data[0].dataPoints = <?php echo json_encode($datosMontosLocalidades1, JSON_NUMERIC_CHECK); ?>;
						
					}else if(orden_Localidad.options[orden_Localidad.selectedIndex].value=="Cantidad"){
						chartCantidadLoc.options.data[0].dataPoints = <?php echo json_encode($datosCantidadLocalidades2, JSON_NUMERIC_CHECK); ?>;
						chartMontosLoc.options.data[0].dataPoints = <?php echo json_encode($datosMontosLocalidades2, JSON_NUMERIC_CHECK); ?>;
					}

				  chartCantidadLoc.render();
				  chartMontosLoc.render();

				})

				width_Localidades.addEventListener("change",function(){

				  graficaMontosLocalidades.style.width = width_Localidades.options[width_Localidades.selectedIndex].value;
				  graficaCantidadLocalidades.style.width = width_Localidades.options[width_Localidades.selectedIndex].value;

				  chartMontosLoc.render();
				  chartCantidadLoc.render();


				})

				height_Localidades.addEventListener("change",function(){

				  graficaMontosLocalidades.style.height = height_Localidades.options[height_Localidades.selectedIndex].value;
				  graficaCantidadLocalidades.style.height = height_Localidades.options[height_Localidades.selectedIndex].value;

				  chartMontosLoc.render();
				  chartCantidadLoc.render();


				})

				fuente_Localidades.addEventListener("change",function(){

				  chartCantidadLoc.options.axisX.labelFontSize = fuente_Localidades.options[fuente_Localidades.selectedIndex].value;
				  chartMontosLoc.options.axisX.labelFontSize = fuente_Localidades.options[fuente_Localidades.selectedIndex].value;
				 

				  chartCantidadLoc.options.axisY.labelFontSize = fuente_Localidades.options[fuente_Localidades.selectedIndex].value;
				  chartMontosLoc.options.axisY.labelFontSize = fuente_Localidades.options[fuente_Localidades.selectedIndex].value;
				  

				  chartCantidadLoc.options.data[0].indexLabelFontSize = fuente_Localidades.options[fuente_Localidades.selectedIndex].value;
				  chartMontosLoc.options.data[0].indexLabelFontSize = fuente_Localidades.options[fuente_Localidades.selectedIndex].value;
				  
				  

				  chartMontosLoc.render();
				  chartCantidadLoc.render();


				})


}
//---------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------//


</script>
</head>
<body>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>