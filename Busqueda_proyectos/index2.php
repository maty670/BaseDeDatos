<!DOCTYPE html>
<html>
<head>
    <title>BD</title>
	<meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="paginacion/paginacion.css">
    <link rel="stylesheet" type="text/css" href="../nav.css">
    <link rel="stylesheet" type="text/css" href="estilo2.css">
    <link rel="stylesheet" type="text/css" href="./tabla_resultados/tabla_resultados.css">
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
        </body>
    </div>

    <form action="" method="post" name="form" id="form">
        <table class="busqueda">
            <tr><th colspan="2">Filtros</th></tr>
            <?php for($i=0;$i<5;$i++){?>
                <?php 
                    if($i==0)
                        $op = $op1;
                    if($i==1)
                        $op = $op2;
                    if($i==2)
                        $op = $op3;
                    if($i==3)
                        $op = $op4;
                    if($i==4)
                        $op = $op5;

                

                ?>
            <tr><td class="space"></td></tr>
            <tr class="parametros">
                <td><input size="" type="text" class="input_text" autocomplete="off" name="busqueda<?php echo $i+1?>"></td>
                <td>	
                    <label for="operacion<?php echo $i+1?>"> </label>

                    <select name="operacion<?php echo $i+1?>" id="operacion<?php echo $i+1?>">	
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
            <?php }?>

        <tr>
            <td class="modo_busqueda" colspan="1">Modo de Búsqueda
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

        <tr><td>Entre
            <label for="aMin"></label>
	        <input type="number" class="select" name="aMin" id="number" min="2000" max="2100" step="1" value="<?php echo isset($_POST['aMin']) ?$_POST['aMin'] : '2019' ?>" />
            Y
        </td></tr>

        <tr>
            <td><input class="btn" type="submit" name="buscar" id="buscar" value="Buscar"></td>
        </tr>
        </table>
    </form>
<script type="text/javascript" src="load/load.js"></script>
<script type="text/javascript" src="paginacion/paginacion.js"></script>
</html>