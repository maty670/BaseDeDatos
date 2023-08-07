<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.js"></script>



<?php
header('Content-Type: text/html; charset=UTF-8');

		include("../conexion2.php");



		//--------------------------------------------------------------------------------------------------------------------------------------------------//
		if(isset($_GET["UVT"])){
			$UVT=$_GET["UVT"];
		}
		if (isset($_GET["Conv"])) {

			$convocatoria = preg_split ("/[\s,]+/", $_GET['Conv']);
			$nombre_convocatoria="";

			for($i=0;$i<count($convocatoria)-1;$i++){

				if($i==0){
					$nombre_convocatoria = $convocatoria[$i];
				}elseif($i>0){
					$nombre_convocatoria = $nombre_convocatoria . " " . $convocatoria[$i];
				}
					
			}

			$año_convocatoria = $convocatoria[count($convocatoria)-1];
			//$convocatoria = $nombre_convocatoria . " " . $año_convocatoria;

		}
		if (isset($_GET["Est"])) {
			if($_GET["Est"]=="Cualquier estado"){
				$Estado="";
			}else if($_GET['Est']=="INICIAL" || $_GET['Est']=="DE AVANCE" || $_GET['Est']=="FINAL" || $_GET['Est']=="RENUNCIO"){
				$Estado= " AND `Presento_Final` LIKE '" . $_GET['Est'] . "' ";
			}else if ($_GET['Est']=="INTIMAR") {
				$Estado = "AND (`Inicio` IS NOT NULL)
						   AND(`Presento_Final`IS NULL OR `Presento_Final`='INICIAL' OR `Presento_Final`='DE AVANCE')
						   AND(
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 0 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R1` IS NULL AND `I1`=0) OR
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 3 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R2` IS NULL AND `I2`=0) OR
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 6 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R3` IS NULL AND `I3`=0) OR
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 9 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R4` IS NULL AND `I4`=0) OR
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 12 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R5` IS NULL AND `I5`=0) OR
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 15 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R6` IS NULL AND `I6`=0) OR 
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 18 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R7` IS NULL AND `I7`=0) OR 
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 21 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R8` IS NULL AND `I8`=0) OR
						   (DATEDIFF(DATE_ADD(DATE_ADD(`Inicio`, INTERVAL 24 MONTH),INTERVAL 21 DAY),CURRENT_TIMESTAMP) <0 AND `R9` IS NULL AND `I9`=0) 
							)";
			}
			
		}

    if(isset($_GET["Des"])){
      $fechaDesde = $_GET["Des"];
    }
    if(isset($_GET["Has"])){
      $fechaHasta = $_GET["Has"];
    }


		//--------------------------------------------------------------------------------------------------------------------------------------------------//
		//--------------------------------------------------------------------------------------------------------------------------------------------------//
		if(isset($_GET["Col"])){
			$columna = $_GET["Col"];
		}
		if(isset($_GET["Pal"])){
			$palabra = $_GET["Pal"];
		}
		//--------------------------------------------------------------------------------------------------------------------------------------------------//
	


























		//--------------------------------------------------------------------------------------------------------------------------------------------------//
		  if(isset($_GET["UVT"])){
	          $consulta=$base->query("SELECT UVT,Convocatoria,Año,Codigo,Director,Monto_Otorgado,
                               DATE_FORMAT(`Fecha_Pago`,'%d/%m/%Y') AS 'Fecha_Pago',
                               DATE_FORMAT(`Fecha_Vencimiento`,'%d/%m/%Y') AS 'Fecha_Vencimiento',Duracion,
                               DATE_FORMAT(`Inicio`,'%d/%m/%Y') AS 'Inicio',
                               DATE_FORMAT(`R1`,'%d/%m/%Y') AS 'R1',DATE_FORMAT(`R2`,'%d/%m/%Y') AS 'R2',
                               DATE_FORMAT(`R3`,'%d/%m/%Y') AS 'R3',DATE_FORMAT(`R4`,'%d/%m/%Y') AS 'R4',
                               DATE_FORMAT(`R5`,'%d/%m/%Y') AS 'R5',DATE_FORMAT(`R6`,'%d/%m/%Y') AS 'R6',
                               DATE_FORMAT(`R7`,'%d/%m/%Y') AS 'R7',DATE_FORMAT(`R8`,'%d/%m/%Y') AS 'R8',
                               DATE_FORMAT(`R9`,'%d/%m/%Y') AS 'R9',Fecha_Intimacion,Observacion,
                               Presento_Final,Periodo,Expte_Pago,Resol_Pago, 
                               Expte_Rend,DATE_FORMAT(`Pase_DGA`,'%d/%m/%Y') AS 'Pase_DGA'

	          						  FROM `recepciones` 

									  WHERE `Convocatoria` LIKE '%$nombre_convocatoria%' AND `Año` LIKE '%$año_convocatoria%' AND `Año` >= $fechaDesde AND `Año` <= $fechaHasta
									  AND `UVT` LIKE '%$UVT%'"
									  . $Estado .

									  "ORDER BY `UVT`,`Convocatoria`,`Año`");


	          $registros=$consulta->fetchAll(PDO::FETCH_OBJ);


           }else if(isset($_GET["Col"])){

           		$consulta=$base->query("SELECT UVT,Convocatoria,Año,Codigo,Director,Monto_Otorgado,
                               DATE_FORMAT(`Fecha_Pago`,'%d/%m/%Y') AS 'Fecha_Pago',
                               DATE_FORMAT(`Fecha_Vencimiento`,'%d/%m/%Y') AS 'Fecha_Vencimiento',Duracion,
                               DATE_FORMAT(`Inicio`,'%d/%m/%Y') AS 'Inicio',
                               DATE_FORMAT(`R1`,'%d/%m/%Y') AS 'R1',DATE_FORMAT(`R2`,'%d/%m/%Y') AS 'R2',
                               DATE_FORMAT(`R3`,'%d/%m/%Y') AS 'R3',DATE_FORMAT(`R4`,'%d/%m/%Y') AS 'R4',
                               DATE_FORMAT(`R5`,'%d/%m/%Y') AS 'R5',DATE_FORMAT(`R6`,'%d/%m/%Y') AS 'R6',
                               DATE_FORMAT(`R7`,'%d/%m/%Y') AS 'R7',DATE_FORMAT(`R8`,'%d/%m/%Y') AS 'R8',
                               DATE_FORMAT(`R9`,'%d/%m/%Y') AS 'R9',Fecha_Intimacion,Observacion,
                               Presento_Final,Periodo,Expte_Pago,Resol_Pago, 
                               Expte_Rend,DATE_FORMAT(`Pase_DGA`,'%d/%m/%Y') AS 'Pase_DGA'

						          		FROM `recepciones` 

										WHERE `$columna` LIKE '%$palabra%' 

									    ORDER BY `UVT`,`Convocatoria`,`Año`");


         		 $registros=$consulta->fetchAll(PDO::FETCH_OBJ);
           }

           ?>






<script type="text/javascript">
	

        
        var columns = ["UVT", "Convocatoria","Codigo" ,"Director","Monto", "Fecha Pago","Vencimiento", "Duración", "Inicio","R1", "R2", "R3", "R4", "R5", "R6", "R7", "R8", "R9", "Fecha      Intimacion", "Observacion","Estado", "Período","Expte Pago", "Resol Pago","Expte Rend","Pase DGA"];


        var jsonString = JSON.stringify(<?php echo json_encode($registros);?>).replace(/null/g,'""');

        var registros = JSON.parse(jsonString);

        var fila = [];
        var registro= [];
        for(let i=0;i<registros.length;i++){
          fila.push(registros[i].UVT);
          fila.push(registros[i].Convocatoria + " " + registros[i].Año);
          fila.push(registros[i].Codigo);
          fila.push(registros[i].Director);
          fila.push(registros[i].Monto_Otorgado);
          fila.push(registros[i].Fecha_Pago);
          fila.push(registros[i].Fecha_Vencimiento);
          fila.push(registros[i].Duracion);
          fila.push(registros[i].Inicio);
          fila.push(registros[i].R1);
          fila.push(registros[i].R2);
          fila.push(registros[i].R3);
          fila.push(registros[i].R4);
          fila.push(registros[i].R5);
          fila.push(registros[i].R6);
          fila.push(registros[i].R7);
          fila.push(registros[i].R8);
          fila.push(registros[i].R9);
          fila.push(registros[i].Fecha_Intimacion);
          fila.push(registros[i].Observacion);
          fila.push(registros[i].Presento_Final);
          fila.push(registros[i].Periodo);
          fila.push(registros[i].Expte_Pago);
          fila.push(registros[i].Resol_Pago);
          fila.push(registros[i].Expte_Rend);
          fila.push(registros[i].Pase_DGA);
          console.log(registros[i]);
          registro.push(fila);
          fila=[];

        }




        var doc = new jsPDF('l', 'pt');
        doc.autoTable(columns, registro,{

        columnStyles: {

          0: {columnWidth: 35},  //UVT
          1: {columnWidth: 54},  //Convocatoria
          2: {columnWidth: 38},  //Codigo
          3: {columnWidth: 36},  //Director
          4: {columnWidth: 42},  //Monto
          5: {columnWidth: 31},  //Fecha Pago
          6: {columnWidth: 52},  //Vencimiento
          7: {columnWidth: 40},  //Duracion
          8: {columnWidth: 28},  //Inicio

          9: {columnWidth: 23},  //R1
          10: {columnWidth: 23}, //R2
          11: {columnWidth: 23}, //R3
          12: {columnWidth: 23}, //R4
          13: {columnWidth: 23}, //R5
          14: {columnWidth: 23}, //R6
          15: {columnWidth: 23}, //R7
          16: {columnWidth: 23}, //R8
          17: {columnWidth: 23}, //R9

          18: {columnWidth: 45}, // Fecha Intimacion
          19: {columnWidth: 52}, // Observacion
          20: {columnWidth: 33}, // Estado
          21: {columnWidth: 35}, // Periodo
          22: {columnWidth: 28}, // Expte Pago
          23: {columnWidth: 28}, // Resol Pago
          24: {columnWidth: 28}, // Expte Rend
          25: {columnWidth: 26}  // Pase DGA
        },
        bodyStyles: {
          overflow: 'linebreak',
          fillColor: [255, 255, 255],
          textColor: 0,
          fontSize:5,
          //showHeader: 'everyPage',
          cellPadding: [2,2,2,2],
          lineColor: [100, 100, 100],
          valign:"middle",
          halign:"center"
        },
          addPageContent: function(data) {
            //doc.text("Resultados de la búsqueda", 40, 30);
          },
          headerStyles: {
            fillColor: [50, 50, 50],
            overflow: 'linebreak',
            fontSize:6
          },
          alternateRowStyles: {
            fillColor : [234, 239, 250],
          },
          margin: { left:2,top: 5 ,bottom:5,right:0},
           theme: 'grid',

         });


        doc.save('Datos.pdf');


    /*
    {
    cellPadding: 5, // a number, array or object (see margin below)
      fontSize: 10,
      font: "helvetica", // helvetica, times, courier
      lineColor: 200,
      lineWidth: 0,
      fontStyle: 'normal', // normal, bold, italic, bolditalic
      overflow: 'ellipsize', // visible, hidden, ellipsize or linebreak
      fillColor: false, // false for transparent or a color as described below
      textColor: 20,
      halign: 'left', // left, center, right
      valign: 'middle', // top, middle, bottom
      columnWidth: 'auto' // 'auto', 'wrap' or a number
    }
    */

    window.open('','_self').close();

</script>