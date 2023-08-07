<script src="https://cdn.jsdelivr.net/alasql/0.3/alasql.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.12/xlsx.core.min.js"></script>
<?php

            include("conexion.php");

            $palabra1=$_COOKIE['palabra1'];
            $palabra2=$_COOKIE['palabra2'];
            $palabra3=$_COOKIE['palabra3'];
            $palabra4=$_COOKIE['palabra4'];
            $palabra5=$_COOKIE['palabra5'];

            $palabra1 =  str_replace("&mas&","+",$palabra1);
            $palabra2 =  str_replace("&mas&","+",$palabra2);
            $palabra3 =  str_replace("&mas&","+",$palabra3);
            $palabra4 =  str_replace("&mas&","+",$palabra4);
            $palabra5 =  str_replace("&mas&","+",$palabra5);

            $columna1=$_COOKIE['columna1'];
            $columna2=$_COOKIE['columna2'];
            $columna3=$_COOKIE['columna3'];
            $columna4=$_COOKIE['columna4'];
            $columna5=$_COOKIE['columna5'];



            $a=$_COOKIE['a'];
            $f=$_COOKIE['f'];
            $m=$_COOKIE['m'];

            $aMin=$_COOKIE['aMin'];
            $aMax=$_COOKIE['aMax'];

            $modo=$_COOKIE['modo'];


            $consulta="SELECT `Codigo`,`Modalidad`,`Titulo`,`Beneficiario`,`Beneficiario_Correo`,`Beneficiario_Departamento`,`Beneficiario_Localidad`,`Director`,
                              `Director_Correo`,`Organizacion_Vinculante`,`Organizacion_Vinculante_Correo`,
                              replace(replace(replace(format(`Monto_ANR`,2),'.','-'),',','.'),'-',',') AS `Monto_ANR`,
                              `Convocatoria`,`Año`,`Admisibilidad`,`Financiacion`,`Puntaje`
                              FROM `Proyectos`
                              WHERE ($columna1 LIKE '%$palabra1%' $modo $columna2 LIKE '%$palabra2%' $modo $columna3 LIKE '%$palabra3%' $modo $columna4 LIKE '%$palabra4%'   $modo $columna5 LIKE '%$palabra5%')
                              AND (Año >= $aMin  AND Año <= $aMax)
                              AND (Financiacion LIKE '$f%' AND Admisibilidad LIKE '$a%' AND Modalidad LIKE '%$m%')";

            function reemplazar($cadena){
                    
                    
                    $cadena = str_replace(
                    array('"','“','”'),
                    array('','',''),
                    $cadena
                    );

                    return $cadena;
                }


            $consulta_general=$base->query($consulta);
            $registros=$consulta_general->fetchAll(PDO::FETCH_OBJ);

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
        






