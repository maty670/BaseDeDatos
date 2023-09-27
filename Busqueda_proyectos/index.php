<!doctype html>

<link rel="stylesheet" type="text/css" href="paginacion/paginacion.css">
<link rel="stylesheet" type="text/css" href="../nav.css">
<link rel="stylesheet" type="text/css" href="estilo.css">
<link rel="stylesheet" type="text/css" href="tabla_resultados.css">
<link rel="stylesheet" type="text/css" href="./graficas/graficas.css">
<link rel="stylesheet" type="text/css" href="reload.css">
<script src="https://kit.fontawesome.com/8e82b560a5.js" crossorigin="anonymous"></script>






<meta charset="utf-8">
<title>BD</title>

<style>


<?php
    $op1 = $_POST['operacion1'];
	$op2 = $_POST['operacion2'];
	$op3 = $_POST['operacion3'];
	$op4 = $_POST['operacion4'];
	$op5 = $_POST['operacion5'];
	$f = $_POST['financiacion'];
	$a = $_POST['admisibilidad'];
	$m = $_POST['modalidad'];
	$mod = $_POST['modo_busqueda'];
	$actual = $_POST['actual'];
	$registros_por_pagina = $_POST['registros_por_pagina'];
	
?>


</style>

	
<div class="body-container">
<body background='../Recursos/fondo.jpg' >

<?php include ("../nav.php")?>


<div class="reload-container">
	<div class="reload-animation">
		<div class="loader"></div>
	</div>
</div>




<form action="" method="post" name="" id="">
  <table class='busqueda' align="center" ;>  
	
<th>Filtros</th>


	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>


	<tr>
      <td> <center> 
      <label for="busqueda1"></label>
      <input size="25" type="text" class="textbox" autocomplete="off" name="busqueda1" value="<?php echo isset($_POST['busqueda1']) ?$_POST['busqueda1'] : '' ?>" />
	


	<label for="operacion1"> </label>
	<select name="operacion1" class="select" id="operacion1" style="text-align:left">	
		<option <?php if($op1 == 'Codigo'| $op1 ==''){echo("selected");}?> > Codigo </option>
		<option <?php if($op1 == 'Titulo'){echo("selected");}?>> Titulo </option>
		<option <?php if($op1 == 'Beneficiario'){echo("selected");}?>> Beneficiario </option>
		<option <?php if($op1 == 'Beneficiario_Departamento'){echo("selected");}?>> Beneficiario_Departamento </option>
		<option <?php if($op1 == 'Beneficiario_Localidad'){echo("selected");}?>> Beneficiario_Localidad </option>
		<option <?php if($op1 == 'Director'){echo("selected");}?>> Director </option>
		<option <?php if($op1 == 'Organizacion_Vinculante'){echo("selected");}?>> Organizacion_Vinculante </option>
		<option <?php if($op1 == 'Convocatoria'){echo("selected");}?>> Convocatoria </option>
	</select></center>
	</td>
	</tr> 
	
	
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	
	
	<tr>
      <td> <center> 
      <label for="busqueda2"></label>
      <input size="25" type="text" class="textbox" autocomplete="off" name="busqueda2" value="<?php echo isset($_POST['busqueda2']) ?$_POST['busqueda2'] : '' ?>" />
	


	<label for="operacion2"> </label>
	<select name="operacion2" class="select" id="operacion2" style="text-align:left">	
		<option <?php if($op2 == 'Codigo'){echo("selected");}?> > Codigo </option>
		<option <?php if($op2 == 'Titulo'){echo("selected");}?>> Titulo </option>
		<option <?php if($op2 == 'Beneficiario'| $op2 ==''){echo("selected");}?>> Beneficiario </option>
		<option <?php if($op2 == 'Beneficiario_Departamento'){echo("selected");}?>> Beneficiario_Departamento </option>
		<option <?php if($op2 == 'Beneficiario_Localidad'){echo("selected");}?>> Beneficiario_Localidad </option>
		<option <?php if($op2 == 'Director'){echo("selected");}?>> Director </option>
		<option <?php if($op2 == 'Organizacion_Vinculante'){echo("selected");}?>> Organizacion_Vinculante </option>
		<option <?php if($op2 == 'Convocatoria'){echo("selected");}?>> Convocatoria </option>
	</select></center>
	</td>
	</tr> 

	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>	
	
	<tr>
      <td> <center> 
      <label for="busqueda3"></label>
      <input size="25" type="text" class="textbox" autocomplete="off" name="busqueda3" value="<?php echo isset($_POST['busqueda3']) ?$_POST['busqueda3'] : '' ?>" />
	


	<label for="operacion3"> </label>
	<select name="operacion3" class="select" id="operacion3" style="text-align:left">	
		<option <?php if($op3 == 'Codigo'){echo("selected");}?> > Codigo </option>
		<option <?php if($op3 == 'Titulo'){echo("selected");}?>> Titulo </option>
		<option <?php if($op3 == 'Beneficiario'){echo("selected");}?>> Beneficiario </option>
		<option <?php if($op3 == 'Beneficiario_Departamento'){echo("selected");}?>> Beneficiario_Departamento </option>
		<option <?php if($op3 == 'Beneficiario_Localidad'){echo("selected");}?>> Beneficiario_Localidad </option>
		<option <?php if($op3 == 'Director'| $op3 ==''){echo("selected");}?>> Director </option>
		<option <?php if($op3 == 'Organizacion_Vinculante'){echo("selected");}?>> Organizacion_Vinculante </option>
		<option <?php if($op3 == 'Convocatoria'){echo("selected");}?>> Convocatoria </option>
	</select></center>
	</td>
	</tr> 


	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>	
	
	
	
	<tr>
      <td> <center> 
      <label for="busqueda4"></label>
      <input size="25" type="text" class="textbox" autocomplete="off" name="busqueda4" value="<?php echo isset($_POST['busqueda4']) ?$_POST['busqueda4'] : '' ?>" />
	


	<label for="operacion4"> </label>
	<select name="operacion4" class="select" id="operacion4" style="text-align:left">	
		<option <?php if($op4 == 'Codigo'){echo("selected");}?> > Codigo </option>
		<option <?php if($op4 == 'Titulo'){echo("selected");}?>> Titulo </option>
		<option <?php if($op4 == 'Beneficiario'){echo("selected");}?>> Beneficiario </option>
		<option <?php if($op4 == 'Beneficiario_Departamento'){echo("selected");}?>> Beneficiario_Departamento </option>
		<option <?php if($op4 == 'Beneficiario_Localidad'){echo("selected");}?>> Beneficiario_Localidad </option>
		<option <?php if($op4 == 'Director'){echo("selected");}?>> Director </option>
		<option <?php if($op4 == 'Organizacion_Vinculante'| $op4 ==''){echo("selected");}?>> Organizacion_Vinculante </option>
		<option <?php if($op4 == 'Convocatoria'){echo("selected");}?>> Convocatoria </option>
	</select></center>
	</td>
	</tr> 
	
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	
	
	
	
	<tr>
      <td> <center> 
      <label for="busqueda5"></label>
      <input size="25" type="text" class="textbox" autocomplete="off" name="busqueda5" value="<?php echo isset($_POST['busqueda5']) ?$_POST['busqueda5'] : '' ?>" />
	


	<label for="operacion5"> </label>
	<select name="operacion5" class="select" id="operacion5" style="text-align:left">	
		<option <?php if($op5 == 'Codigo'){echo("selected");}?> > Codigo </option>
		<option <?php if($op5 == 'Titulo'){echo("selected");}?>> Titulo </option>
		<option <?php if($op5 == 'Beneficiario'){echo("selected");}?>> Beneficiario </option>
		<option <?php if($op5 == 'Beneficiario_Departamento'){echo("selected");}?>> Beneficiario_Departamento </option>
		<option <?php if($op5 == 'Beneficiario_Localidad'){echo("selected");}?>> Beneficiario_Localidad </option>
		<option <?php if($op5 == 'Director'){echo("selected");}?>> Director </option>
		<option <?php if($op5 == 'Organizacion_Vinculante'){echo("selected");}?>> Organizacion_Vinculante </option>
		<option <?php if($op5 == 'Convocatoria'| $op5 ==''){echo("selected");}?>> Convocatoria </option>
	</select></center>
	</td>
	</tr> 
	
		
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	





	
	<td class="modo_busq">Modo de búsqueda:
		 
		<label class="switch">
		<input type="checkbox" <?php if($mod=='on'){echo ("checked");} if($mod==''){echo ("");}?> name='modo_busqueda' id='modo_busqueda'>
		<span class="slider"></span>
		</label>
	



    <a href="/BD/Recursos/ayuda.php" target="_blank">          
	
		 <input class="btnInt" type="button" value="?">
		 
		 </a>


</td>
	

	
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	
	
	
	
	
	
	

	<th>Período</th>
	  
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>

	  <tr>
      <td><center>Entre
      <label for="aMin"></label>
	  <input type="number" class="select" name="aMin" id="number" min="2000" max="2100" step="1" value="<?php echo isset($_POST['aMin']) ?$_POST['aMin'] : '2019' ?>" />
	  
	  y
	 
      <label for="aMax"></label>
      <input type="number"  class="select" name="aMax" id="number" min="2000" max="2100" step="1" value="<?php echo isset($_POST['aMax']) ?$_POST['aMax'] : '2021' ?>" />
      
	  </center></td>
	  </tr> 



	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>

	<th>Financiación</th>
	
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	
    <tr><td><center>
	<label for="financiacion"> </label>
	<select name="financiacion" class="select" id="financiacion">	
		<option <?php if($f == 'Todos'| $f ==''){echo("selected");}?> > Todos </option>
		<option <?php if($f == 'Financiado'){echo("selected");}?> > Financiado </option>
		<option <?php if($f == 'No Financiado'){echo("selected");}?>> No Financiado </option>
	</select>
	
	  </center></td></tr>
	  
	  
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>  
	
	<th>Admisibilidad</th>
	
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr> 
	
	<tr><td><center>
	<label for="admisibilidad"> </label>
	<select name="admisibilidad" class="select" id="admisibilidad">	
		<option <?php if($a == 'Todos'| $a ==''){echo("selected");}?> > Todos </option>
		<option <?php if($a == 'Admitido'){echo("selected");}?> > Admitido </option>
		<option <?php if($a == 'No Admitido'){echo("selected");}?>> No Admitido </option>
	</select>
	
	  </center></td></tr>
	   
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr> 



	<th>Modalidad</th>
	
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr> 
	
	<tr><td><center>
	<label for="modalidad"> </label>
	<select name="modalidad" class="select" id="modalidad">	
		<option <?php if($m == 'Todas'| $m ==''){echo("selected");}?> > Todas </option>
		<option <?php if($m == 'A'){echo("selected");}?> > A </option>
		<option <?php if($m == 'B'){echo("selected");}?>> B</option>
	</select>
	
	  </center></td></tr>
	   
	<td><hr></hr></td>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>	
	
	  <tr>

		<td><center><input class="btn" type="submit" name="buscar" id="buscar" value="Buscar">
					<input class="btn" type="submit" name="limpiar" id="limpiar" value="Limpiar"> </center>
		
		

		
		</td>
	  
	  </tr> 
	  
	  
	  
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>	
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr> 



	 

	  

	  
  </table>
 


<br>






<?php	
	if(isset($_POST['limpiar'])){
	echo("<meta http-equiv='refresh' content='0'>");
	} 
	if(isset($_POST['buscar'])){

		if($_POST['aMin']=="" OR $_POST['aMax']==""){
		echo '<th><font color="red"><center>Campos de años incorrectos</center></font></th>';
		}elseif($_POST['aMin']>$_POST['aMax']){
		echo '<th><font color="red"><center>El año inicial debe ser menor o igual al año final</center></font></th>';
		}else{
		include("consulta.php");
		include("tabla_resultados.php");
		}
	}
	
?>



</body>
</div>
<script type="text/javascript" src="js/load.js"></script>
<script type="text/javascript" src="paginacion/paginacion.js"></script>



