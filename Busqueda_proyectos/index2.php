<!DOCTYPE html>
<html>
<head>
    <title>BD</title>
	<meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="paginacion/paginacion.css">
    <link rel="stylesheet" type="text/css" href="../nav.css">
    <link rel="stylesheet" type="text/css" href="estilo2.css">
    <link rel="stylesheet" type="text/css" href="tabla_resultados/tabla_resultados.css">
    <link rel="stylesheet" type="text/css" href="./graficas/graficas.css">
    <link rel="stylesheet" type="text/css" href="load/load.css">
    <script src="https://kit.fontawesome.com/8e82b560a5.js" crossorigin="anonymous"></script>

</head>
<style>
<?php
if(isset($_POST['buscar'])){ 
    $op1 = $_POST['operacion1'];
	$op2 = $_POST['operacion2'];
	$op3 = $_POST['operacion3'];
	$op4 = $_POST['operacion4'];
	$op5 = $_POST['operacion5'];
	$f = $_POST['financiacion'];
	$a = $_POST['admisibilidad'];
	$m = $_POST['modalidad'];
	$mod = $_POST['modo_busqueda'];
}else{
    $op1 = "";
	$op2 = "";
	$op3 = "";
	$op4 = "";
	$op5 = "";
	$f = "";
	$a = "";
	$m = "";
	$mod = "";
}

echo $op1;
?>
</style>


<div class="body-container">
<body>

<?php include ("../nav.php")?>


    <div class="reload-container">
        <div class="reload-animation">
            <div class="loader"></div>
        </div>
    </div>

    <form action="" method="post" name="form" id="form">
        <table class="busqueda">
            <tr><th colspan="2">Filtros</th></tr>
            <?php for($i=0;$i<5;$i++){?>
                <?php 
                    if($i==0){
                        $op = $op1;
                        $busqueda = "busqueda1";
                        $operacion = "operacion1";
                    }
                    if($i==1){
                        $op = $op2;
                        $busqueda = "busqueda2";
                        $operacion = "operacion2";
                    }
                    if($i==2){
                        $op = $op3;
                        $busqueda = "busqueda3";
                        $operacion = "operacion3";
                    }
                    if($i==3){
                        $op = $op4;
                        $busqueda = "busqueda4";
                        $operacion = "operacion4";
                    }
                    if($i==4){
                        $op = $op5;
                        $busqueda = "busqueda5";
                        $operacion = "operacion5";
                    }
                

                ?>
            <tr><td class="space"></td></tr>
            <tr class="parametros">
                <td><input type="text" class="input_text" autocomplete="off" name="<?php echo $busqueda?>" value="<?php echo isset($_POST[$busqueda]) ?$_POST[$busqueda] : '' ?>"></td>
                <td>	
                    <label for="<?php echo $operacion?>"> </label>

                    <select name="<?php echo $operacion?>" class="select">	
                    <option <?php if($op == 'Codigo' || ($op=="" AND $i==0)){echo("selected");}?> > Codigo </option>
                    <option <?php if($op == 'Titulo' || ($op=="" AND $i==1)){echo("selected");}?>> Titulo </option>
                    <option <?php if($op == 'Beneficiario' || ($op=="" AND $i==2)){echo("selected");}?>> Beneficiario </option>
                    <option value="Beneficiario_Departamento"<?php if($op == 'Beneficiario_Departamento'){echo("selected");}?>> Beneficiario Departamento </option>
                    <option value="Beneficiario_Localidad"<?php if($op == 'Beneficiario_Localidad'){echo("selected");}?>> Beneficiario Localidad </option>
                    <option <?php if($op == 'Director' || ($op=="" AND $i==3)){echo("selected");}?>> Director </option>
                    <option value="Organizacion_Vinculante"<?php if($op == 'Organizacion_Vinculante'){echo("selected");}?>> Organizacion Vinculante </option>
                    <option <?php if($op == 'Convocatoria' || ($op=="" AND $i==4)){echo("selected");}?>> Convocatoria </option>
                    </select>
                </td>
            </tr>
            <tr><td class="space"></td></tr>
            <?php } //Fin del for para los parametros?>

        <tr>
            <td class="modo_busqueda" colspan="1"><p>Modo de Búsqueda</p>
                <label class="switch">
                    <input type="checkbox" <?php if($mod=='on'){echo ("checked");} if($mod==''){echo ("");}?> name='modo_busqueda' id='modo_busqueda'>
                    <span class="slider"></span>
                </label>
            </td>
            <td>
                <a href="../Recursos/ayuda.php" target="_blank">          
                <input class="btnInt" type="button" value="?">
                </a>
            </td>
        </tr>

        <tr><td class="space"></td></tr>

        <tr><th colspan="2">Período</th></tr>

        <tr><td class="space"></td></tr>

        <tr>
            <td colspan="2"><p>Entre</p>
                <label for="aMin"></label>
                <input type="number" class="input_anios" name="aMin" min="2000" max="2100" step="1" value="<?php echo isset($_POST['aMin']) ?$_POST['aMin'] : '2020' ?>" />
                <p>y</p>
                <label for="aMax"></label>
                <input type="number" class="input_anios" name="aMax" min="2000" max="2100" step="1" value="<?php echo isset($_POST['aMax']) ?$_POST['aMax'] : '2022' ?>" />
            </td>
        </tr>

        <tr><td class="space"></td></tr>
        <tr><th colspan="2">Modalidad</th></tr>
        <tr><td class="space"></td></tr>

        <tr>
            <td colspan="2">
                <label for="modalidad"> </label>
                <select name="modalidad" class="select select2">	
                    <option <?php if($m == 'Todas'| $m ==''){echo("selected");}?> > Todas </option>
                    <option <?php if($m == 'A'){echo("selected");}?>>A</option>
                    <option <?php if($m == 'B'){echo("selected");}?>>B</option>
                    <option <?php if($m == 'C'){echo("selected");}?>>C</option>
                </select>
            </td>
        </tr>

        <tr><td class="space"></td></tr>
        <tr><th colspan="2">Admisibilidad</th></tr>
        <tr><td class="space"></td></tr>

        <tr>
            <td colspan="2">
                <label for="admisibilidad"> </label>
                <select name="admisibilidad" class="select select2">	
                    <option <?php if($a == 'Todos'| $a ==''){echo("selected");}?> > Todos </option>
                    <option <?php if($a == 'Admitido'){echo("selected");}?> > Admitido </option>
                    <option <?php if($a == 'No Admitido'){echo("selected");}?>> No Admitido </option>
                </select>
            </td>
        </tr>


        <tr><td class="space"></td></tr>
        <tr><th colspan="2">Financiacion</th></tr>
        <tr><td class="space"></td></tr>

        <tr>
            <td colspan="2">
                <label for="financiacion"> </label>
                <select name="financiacion" class="select select2">	
                    <option <?php if($f == 'Todos'| $f ==''){echo("selected");}?> > Todos </option>
                    <option <?php if($f == 'Financiado'){echo("selected");}?> > Financiado </option>
                    <option <?php if($f == 'No Financiado'){echo("selected");}?>> No Financiado </option>
                </select>
            </td>
        </tr>

        <tr><td class="space"></td></tr>

        <tr class="tr_botones">
            <td class="td_buscar"><input class="btn" type="submit" name="buscar" value="Buscar"></td>
            <td class="td_limpiar"><input class="btn" type="submit" name="limpiar" value="Limpiar"></td>
        </tr>


        </table>

    </form>




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
		include("tabla_resultados/tabla_resultados.php");
		}
	}
	
?>

</body>
</div>

<script type="text/javascript" src="load/load.js"></script>
<script type="text/javascript" src="paginacion/paginacion.js"></script>
</html>