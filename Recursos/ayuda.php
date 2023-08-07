<style>
img {
  border: 0px solid #3B9C9C;
}
body {
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}



</style>
<meta charset="utf-8">
<body background='/BD/Recursos/fondo2.jpg' >

<?php
	echo "<h2><u>Filtros</h2></u>";
	echo "• Cada filtro busca una palabra o frase que coincida dentro del texto de la columna correspondiente.<br>";
	echo "• La búsqueda no distingue entre <b>mayúsculas y minúsculas</b>. Además no hace diferencia entre una palabra escrita <b>con acento</b> o <b>sin acento.</b> <b></b><br><br>";
	echo "<img src='biotecnologia.png' width='30%' height='700vh'> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
	echo "<img src='silvinadrago.png' width='30%' height='700vh'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
	echo "<img src='Universidad.png' width='30%' height='700vh'><br>";
	
	echo'<br><br><br><br>';
	echo "• Para visualizar la base de datos completa, <b>todos</b> los campos deben estar vacios.<br>";
	echo "• El orden en el que se apliquen los filtros no afecta al resultado final de búsqueda.<br>";
	echo "• Al hacer una busqueda, los campos que esten vacios seran ignorados.<br><br>";
	echo "<img src='filtros.png' width='30%' height='200vh'> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
	echo "<img src='busqueda_filtros2.png' width='60%' height='200vh'><br><br>";
	echo'<br><br><br>';
	

	echo "<h2><u>Modo de Búsqueda</h2></u>";
	echo '<img src="btnAzul.png"width="1.5%" height="1.5%"> Muestra solo los resultados que cumplan con <b>Todas</b> las condiciones (Condición1 <b>Y</b> Condición2 <b>Y</b> Condición3 .....)<br><br>';
	echo '<img src="btnVerde.png"width="1.5%" height="1.5%"> Muestra los resultados en los cuales se cumpla <b>Alguna</b> de las condiciones (Condición1 <b>O</b> Condición2 <b>O</b> Condición3 .....)<br><br>';
	
	echo '<br><br>';
	echo '• Filtra los proyectos de la localidad de <u>Rosario</u> <b>Y</b> que sean de linea <u>Innovación Productiva</u> <b>Y</b> cuya UVT sea <u>Grupo Polo Tecnológico</u>.<br><br>';
	echo '<img src="Busqueda-Y.png"width="30%" height="200vh">';
	echo "<br>";
	echo "<br><br><br>";
	echo '• Filtra los proyectos que pertenezcan a la localidades de <u>Rafaela</u> <b>O</b> <u>Casilda</u> <b>O</b> <u>San Justo</u> <b>O</b> <u>Esperanza</u> <b>O</b> <u>Reconquista</u>.<br><br>';
	echo '<img src="Busqueda-O.png"width="30%" height="200vh"><br><br><br>';

	echo "<h2><u>Período</h2></u>";
	echo "• Los campos del período funcionan buscando los años <b>mayores o iguales</b> que el año mínimo y <b>menores o iguales</b> al año máximo.<br>";
	echo "• Solo se admite el ingreso de datos <n>numéricos.</b> <br>";
	echo "• Para encontrar los resultados pertenecientes a un solo año, el año inicial y el final tienen que ser los mismos.<br>";
	echo "• <b>Siempre</b> el campo de la izquierda (año inicial) debe ser menor o igual al campo de la derecha (año final).<br>";

	
	
?>

</body>

		