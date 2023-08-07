<script src="https://cdn.jsdelivr.net/alasql/0.3/alasql.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.12/xlsx.core.min.js"></script>

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
	          $consulta=$base->query("SELECT UVT,Convocatoria,Año,Codigo,Director,Monto_Otorgado AS 'Monto Otorgado',
           									 DATE_FORMAT(`Fecha_Pago`,'%d/%m/%Y') AS 'Fecha Pago',
	          								 DATE_FORMAT(`Fecha_Vencimiento`,'%d/%m/%Y') AS 'Fecha Vencimiento',Duracion,
	          								 DATE_FORMAT(`Inicio`,'%d/%m/%Y') AS 'Inicio',
	          								 DATE_FORMAT(`R1`,'%d/%m/%Y') AS 'R1',DATE_FORMAT(`R2`,'%d/%m/%Y') AS 'R2',
	          								 DATE_FORMAT(`R3`,'%d/%m/%Y') AS 'R3',DATE_FORMAT(`R4`,'%d/%m/%Y') AS 'R4',
	          								 DATE_FORMAT(`R5`,'%d/%m/%Y') AS 'R5',DATE_FORMAT(`R6`,'%d/%m/%Y') AS 'R6',
	          								 DATE_FORMAT(`R7`,'%d/%m/%Y') AS 'R7',DATE_FORMAT(`R8`,'%d/%m/%Y') AS 'R8',
	          								 DATE_FORMAT(`R9`,'%d/%m/%Y') AS 'R9',Fecha_Intimacion,Observacion,
	          								 Presento_Final AS 'Estado',Periodo,Expte_Pago AS 'Expte Pago',Resol_Pago AS 'Resol Pago', 
	          								 Expte_Rend as 'Expte Rend',DATE_FORMAT(`Pase_DGA`,'%d/%m/%Y') AS 'Pase DGA'

	          						  FROM `recepciones` 

									  WHERE `Convocatoria` LIKE '%$nombre_convocatoria%' 
									  AND `Año` LIKE '%$año_convocatoria%' AND `Año` >= $fechaDesde AND `Año` <= $fechaHasta
									  AND `UVT` LIKE '%$UVT%'"
									  . $Estado .

									  "ORDER BY `UVT`,`Convocatoria`,`Año`");


	          $registros=$consulta->fetchAll(PDO::FETCH_OBJ);


           }else if(isset($_GET["Col"])){

           		$consulta=$base->query("SELECT UVT,Convocatoria,Año,Codigo,Director,Monto_Otorgado AS 'Monto Otorgado',
           									   DATE_FORMAT(`Fecha_Pago`,'%d/%m/%Y') AS 'Fecha Pago',
	          								   DATE_FORMAT(`Fecha_Vencimiento`,'%d/%m/%Y') AS 'Fecha Vencimiento',Duracion,
	          								   DATE_FORMAT(`Inicio`,'%d/%m/%Y') AS 'Inicio',
	          								   DATE_FORMAT(`R1`,'%d/%m/%Y') AS 'R1',DATE_FORMAT(`R2`,'%d/%m/%Y') AS 'R2',
	          								   DATE_FORMAT(`R3`,'%d/%m/%Y') AS 'R3',DATE_FORMAT(`R4`,'%d/%m/%Y') AS 'R4',
	          								   DATE_FORMAT(`R5`,'%d/%m/%Y') AS 'R5',DATE_FORMAT(`R6`,'%d/%m/%Y') AS 'R6',
	          								   DATE_FORMAT(`R7`,'%d/%m/%Y') AS 'R7',DATE_FORMAT(`R8`,'%d/%m/%Y') AS 'R8',
	          								   DATE_FORMAT(`R9`,'%d/%m/%Y') AS 'R9',Fecha_Intimacion,Observacion,
	          								   Presento_Final AS 'Estado',Periodo,Expte_Pago AS 'Expte Pago',Resol_Pago AS 'Resol Pago', 
	          								   Expte_Rend as 'Expte Rend',DATE_FORMAT(`Pase_DGA`,'%d/%m/%Y') AS 'Pase DGA'

						          		FROM `recepciones` 

										WHERE `$columna` LIKE '%$palabra%' 

									    ORDER BY `UVT`,`Convocatoria`,`Año`");


         		 $registros=$consulta->fetchAll(PDO::FETCH_OBJ);



           }









        //--------------------------------------------------------------------------------------------------------------------------------------------------//    
            


?>


        <script type="text/javascript">

           var old = JSON.stringify(<?php echo json_encode($registros);?>).replace(/null/g,'""');
           var registros = JSON.parse(old);


            let hoja = "Hoja 1";

            var opts = [{sheetid:hoja,header:true}];
            var result = alasql('SELECT * INTO XLSX("Datos.xlsx",?) FROM ?', 
                                                [opts,[registros]]);

            window.open('','_self').close();

        </script>