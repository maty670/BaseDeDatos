<script type="text/javascript">

	let Cantidad_Datos = document.getElementsByClassName("Datos").length;
	document.cookie = `Cantidad_Datos=${Cantidad_Datos}`;



	if (performance.navigation.type == performance.navigation.TYPE_RELOAD && sessionStorage.getItem("actualizacion") == 'true') {

		sessionStorage.removeItem("actualizacion");

		const mensaje = document.querySelector(".mensajeAlerta");

		mensaje.style.display = "block";


		setInterval(function () {
			mensaje.style.display = "none";
		}, 3000);
	
	}else if (performance.navigation.type == performance.navigation.TYPE_RELOAD && sessionStorage.getItem("actualizacion") == 'false') {

		alert("Error al guardar los datos");
	
	}

</script>













<?php
	if(isset($_POST['Actualizar'])){


		$Cantidad_Datos=$_COOKIE['Cantidad_Datos'];
		$UVT = "'" . $UVT . "'";


		
		$Datos="";
		for($i=0;$i<$Cantidad_Datos;$i++){
				if(isset($_POST['Convocatoria' . $i]) && isset($_POST['Año' . $i])){
					if($_POST['Convocatoria' . $i]==''){$Convocatoria='NULL';}else{$Convocatoria = "'" . $_POST['Convocatoria' . $i] . "'";}
					if($_POST['Año' . $i]==''){$Año='NULL';}else{$Año = $_POST['Año' . $i];}
					if($_POST['Codigo' . $i]==''){$Codigo="'" . "" . "'";}else{$Codigo = "'" . $_POST['Codigo' . $i] . "'";}
					if($_POST['Director' . $i]==''){$Director="'" . "" . "'";}else{$Director = "'" . $_POST['Director' . $i] . "'";}
					if($_POST['Monto' . $i]==''){$Monto='NULL';}else{$Monto = "'" . $_POST['Monto' . $i] . "'";}
					if($_POST['FechaP' . $i]==''){$FechaP='NULL';}else{$FechaP = "STR_TO_DATE('" . $_POST['FechaP' . $i] . "','%Y-%m-%d')";}
					if($_POST['FechaV' . $i]==''){$FechaV='NULL';}else{$FechaV = "STR_TO_DATE('" . $_POST['FechaV' . $i] . "','%Y-%m-%d')";}
					if($_POST['Duracion' . $i]==''){$Duracion='NULL';}else{$Duracion =$_POST['Duracion' . $i];}







					if($_POST['Inicio' . $i]==''){$Inicio='NULL';}else{$Inicio = "STR_TO_DATE('" . $_POST['Inicio' . $i] . "','%Y-%m-%d')";}

					if($_POST['R1' . $i]==''){$R1='NULL';}else{$R1 = "STR_TO_DATE('" . $_POST['R1' . $i] . "','%Y-%m-%d')";}
					if($_POST['R2' . $i]==''){$R2='NULL';}else{$R2 = "STR_TO_DATE('" . $_POST['R2' . $i] . "','%Y-%m-%d')";}
					if($_POST['R3' . $i]==''){$R3='NULL';}else{$R3 = "STR_TO_DATE('" . $_POST['R3' . $i] . "','%Y-%m-%d')";}
					if($_POST['R4' . $i]==''){$R4='NULL';}else{$R4 = "STR_TO_DATE('" . $_POST['R4' . $i] . "','%Y-%m-%d')";}
					if($_POST['R5' . $i]==''){$R5='NULL';}else{$R5 = "STR_TO_DATE('" . $_POST['R5' . $i] . "','%Y-%m-%d')";}
					if($_POST['R6' . $i]==''){$R6='NULL';}else{$R6 = "STR_TO_DATE('" . $_POST['R6' . $i] . "','%Y-%m-%d')";}
					if($_POST['R7' . $i]==''){$R7='NULL';}else{$R7 = "STR_TO_DATE('" . $_POST['R7' . $i] . "','%Y-%m-%d')";}
					if($_POST['R8' . $i]==''){$R8='NULL';}else{$R8 = "STR_TO_DATE('" . $_POST['R8' . $i] . "','%Y-%m-%d')";}
					if($_POST['R9' . $i]==''){$R9='NULL';}else{$R9 = "STR_TO_DATE('" . $_POST['R9' . $i] . "','%Y-%m-%d')";}

					if(isset($_POST['I1' . $i])){$I1='true';}else{$I1='false';}
					if(isset($_POST['I2' . $i])){$I2='true';}else{$I2='false';}
					if(isset($_POST['I3' . $i])){$I3='true';}else{$I3='false';}
					if(isset($_POST['I4' . $i])){$I4='true';}else{$I4='false';}
					if(isset($_POST['I5' . $i])){$I5='true';}else{$I5='false';}
					if(isset($_POST['I6' . $i])){$I6='true';}else{$I6='false';}
					if(isset($_POST['I7' . $i])){$I7='true';}else{$I7='false';}
					if(isset($_POST['I8' . $i])){$I8='true';}else{$I8='false';}
					if(isset($_POST['I9' . $i])){$I9='true';}else{$I9='false';}







					if($_POST['FechasInt' . $i]==''){$FechasInt="'" . "" . "'";}else{$FechasInt = "'" . $_POST['FechasInt' . $i] . "'";}
					if($_POST['Observacion' . $i]==''){$Observacion="'" . "" . "'";}else{$Observacion = "'" . $_POST['Observacion' . $i] . "'";}
					if($_POST['Presento' . $i]==''){$Presento='NULL';}else{$Presento = "'" . $_POST['Presento' . $i] . "'";}
					if($_POST['Periodo' . $i]==''){$Periodo="'" . "" . "'";}else{$Periodo = "'" . $_POST['Periodo' . $i] . "'";}
					if($_POST['ExpteP' . $i]==''){$ExpteP="'" . "" . "'";}else{$ExpteP = "'" . $_POST['ExpteP' . $i] . "'";}
					if($_POST['ResolP' . $i]==''){$ResolP="'" . "" . "'";}else{$ResolP = "'" . $_POST['ResolP' . $i] . "'";}
					if($_POST['ExpteR' . $i]==''){$ExpteR="'" . "" . "'";}else{$ExpteR = "'" . $_POST['ExpteR' . $i] . "'";}
					if($_POST['PaseDGA' . $i]==''){$PaseDGA='NULL';}else{$PaseDGA = "STR_TO_DATE('" . $_POST['PaseDGA' . $i] . "','%Y-%m-%d')";}


					if($_POST['Visible' . $i]=='false'){$Visible='false';}else{$Visible = "true";}




						if($Datos!=""){$Datos = $Datos . ",";}
				
					$dato = "(" . $UVT . "," . $Convocatoria . "," . $Año . "," . $Codigo . "," . $Director . ",". $Monto . "," . $FechaP . "," . $FechaV . "," . $Duracion . "," 
								. $Inicio . "," . $R1 . "," . $I1 ."," . $R2 . "," . $I2 ."," . $R3 . "," . $I3 ."," . $R4 . "," . $I4 ."," . $R5 . "," . $I5 ."," . $R6 . "," . $I6 ."," . $R7 . "," . $I7 ."," . $R8 . "," . $I8 ."," . $R9 . "," . $I9 .","
								. $FechasInt . "," . $Observacion . "," . $Presento . "," . $Periodo . "," . $ExpteP . "," . $ResolP . "," . $ExpteR . "," . $PaseDGA . "," . $Visible .  ")";

						$Datos = $Datos . $dato;

				}
		
		}

		try{
			$borrarDatosPruebas=$base->query("DELETE FROM `pruebas` WHERE `UVT` LIKE $UVT");
			if($base->query("INSERT INTO `pruebas` VALUES $Datos")){

				//echo "Los datos se actualizaron";

				$borrarDatos=$base->query("DELETE FROM `recepciones` WHERE `UVT` LIKE $UVT");

				$insertarDatos=$base->query("INSERT INTO `recepciones` VALUES $Datos");

				echo '<script>sessionStorage.setItem("actualizacion",true);</script>';

				echo("<meta http-equiv='refresh' content='0'>");

			}else{
				echo '<script>sessionStorage.setItem("actualizacion",false);</script>';
			}	
		}catch(Exception $e){
			echo '<th><font color="red"><center>Ocurrio un ERROR de formato. No se actualizaron los datos</center></font></th>';
		}

		

	}
	
?>


<script type="text/javascript">
	
	btn_volver = document.querySelector(".btnVolver");

	btn_volver.addEventListener("click",()=>{
		location.href="../";
	})


</script>