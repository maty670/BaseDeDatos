<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>


<script>
	
	const btnDatosConvocatoria = document.getElementById("btnDatosConvocatoria");

	btnDatosConvocatoria.addEventListener("click",()=>{
		

			const numero_rubros = document.getElementById("numero_rubros").value;
			

			document.cookie = `numero_rubros=${numero_rubros}`;


			const fragment = document.createDocumentFragment();
			let contenedor_rubros = document.querySelector(".contenedor_rubros");


			for(let i=1;i<=numero_rubros;i++){
					let rubro = document.createElement("div");
					rubro.classList.add("rubro");
					rubro.innerHTML = `<div class='divRubro'>
									   <p>Rubro #${i}</p>
									   <input type="text" name="rubro${i}" id="rubro${i}">
									   </div>
									   <div class='divANR'>
									   <p>ANR</p>
									   <input type="number" name="anr${i}" id="anr${i}" class="ANR" value="100">%
									   </div>`;
					fragment.appendChild(rubro);
			};

			contenedor_rubros.innerHTML="";
			const btnCrearConvocatoria = document.createElement("div");
			btnCrearConvocatoria.innerHTML = `<input type="submit" name="btnCrearConvocatoria" id="btnCrearConvocatoria" value="Crear Convocatoria">`


			contenedor_rubros.appendChild(fragment);
			contenedor_rubros.appendChild(btnCrearConvocatoria);



			for(let i=1;i<=numero_rubros;i++){
				let rubros = document.getElementById(`rubro${i}`);
				let anr = document.getElementById(`anr${i}`);
				rubros.addEventListener("change",()=>{
					document.cookie = `rubro${i}=${rubros.value}`;
					document.cookie = `anr${i}=${anr.value}`;
				})

				anr.addEventListener("change",()=>{
					document.cookie = `rubro${i}=${rubros.value}`;
					document.cookie = `anr${i}=${anr.value}`;
				})
			}










			<?php 		

				if(isset($_POST['btnCrearConvocatoria'])){

				$nombre_convocatoria=$_POST['nombre_convocatoria'];
				$n=$_COOKIE['numero_rubros'];

				include("conexion.php");




				for($i=1;$i<=$n;$i++){
					$rubro = "rubro" . $i;
					$anr = "anr" . $i;

					$dato = "('" . $nombre_convocatoria . "','" . $_COOKIE[$rubro] . "','" . $_COOKIE[$anr] . "');" ;

					$datos_convocatoria = "INSERT INTO convocatorias VALUES
					$dato
					";

					mysqli_query($conexion, $datos_convocatoria);
					

				}

					mysqli_close($conexion);
					header("Location:/BD/Rendiciones/");
				
				}
			?>



	})



</script>









</body>


</html>