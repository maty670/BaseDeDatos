<?php   

	$Codigo=$proyecto->Codigo;
	$Titulo=$proyecto->Titulo;
	$Beneficiario=$proyecto->Beneficiario;
	$Departamento=$proyecto->Beneficiario_Departamento;
	$Localidad=$proyecto->Beneficiario_Localidad;
	$Director=$proyecto->Director;
	$Organizacion_Vinculante=$proyecto->Organizacion_Vinculante;
	$Convocatoria=$proyecto->Convocatoria;
	$Financiacion=$proyecto->Financiacion;
	$Admisibilidad=$proyecto->Admisibilidad;
	$Modalidad=$proyecto->Modalidad;
	
	
	if($columna1=="Codigo" AND $palabra1!=""){
		$Codigo=resaltar_frase(eliminar_acentos($Codigo),$palabra1);
	}
	if($columna2=="Codigo" AND $palabra2!=""){
		$Codigo=resaltar_frase(eliminar_acentos($Codigo),$palabra2);
	}
	if($columna3=="Codigo" AND $palabra3!=""){
		$Codigo=resaltar_frase(eliminar_acentos($Codigo),$palabra3);
	}
	if($columna4=="Codigo" AND $palabra4!=""){
		$Codigo=resaltar_frase(eliminar_acentos($Codigo),$palabra4);
	}
	if($columna5=="Codigo" AND $palabra5!=""){
		$Codigo=resaltar_frase(eliminar_acentos($Codigo),$palabra5);
	}
	
	
	
	
	if($columna1=="Titulo" AND $palabra1!=""){
		$Titulo=resaltar_frase(eliminar_acentos($Titulo),$palabra1);
	}
	if($columna2=="Titulo" AND $palabra2!=""){
		$Titulo=resaltar_frase(eliminar_acentos($Titulo),$palabra2);
	}
	if($columna3=="Titulo" AND $palabra3!=""){
		$Titulo=resaltar_frase(eliminar_acentos($Titulo),$palabra3);
	}
	if($columna4=="Titulo" AND $palabra4!=""){
		$Titulo=resaltar_frase(eliminar_acentos($Titulo),$palabra4);
	}
	if($columna5=="Titulo" AND $palabra5!=""){
		$Titulo=resaltar_frase(eliminar_acentos($Titulo),$palabra5);
	}
	
	
	
	
	if($columna1=="Beneficiario" AND $palabra1!=""){
		$Beneficiario=resaltar_frase(eliminar_acentos($Beneficiario),$palabra1);
	}
	if($columna2=="Beneficiario" AND $palabra2!=""){
		$Beneficiario=resaltar_frase(eliminar_acentos($Beneficiario),$palabra2);
	}
	if($columna3=="Beneficiario" AND $palabra3!=""){
		$Beneficiario=resaltar_frase(eliminar_acentos($Beneficiario),$palabra3);
	}
	if($columna4=="Beneficiario" AND $palabra4!=""){
		$Beneficiario=resaltar_frase(eliminar_acentos($Beneficiario),$palabra4);
	}
	if($columna5=="Beneficiario" AND $palabra5!=""){
		$Beneficiario=resaltar_frase(eliminar_acentos($Beneficiario),$palabra5);
	}
	
	
	


	if($columna1=="Beneficiario_Departamento" AND $palabra1!=""){
		$Departamento=resaltar_frase(eliminar_acentos($Departamento),$palabra1);
	}
	if($columna2=="Beneficiario_Departamento" AND $palabra2!=""){
		$Departamento=resaltar_frase(eliminar_acentos($Departamento),$palabra2);
	}
	if($columna3=="Beneficiario_Departamento" AND $palabra3!=""){
		$Departamento=resaltar_frase(eliminar_acentos($Departamento),$palabra3);
	}
	if($columna4=="Beneficiario_Departamento" AND $palabra4!=""){
		$Departamento=resaltar_frase(eliminar_acentos($Departamento),$palabra4);
	}
	if($columna5=="Beneficiario_Departamento" AND $palabra5!=""){
		$Departamento=resaltar_frase(eliminar_acentos($Departamento),$palabra5);
	}



	
	
	
	if($columna1=="Beneficiario_Localidad" AND $palabra1!=""){
		$Localidad=resaltar_frase(eliminar_acentos($Localidad),$palabra1);
	}
	if($columna2=="Beneficiario_Localidad" AND $palabra2!=""){
		$Localidad=resaltar_frase(eliminar_acentos($Localidad),$palabra2);
	}
	if($columna3=="Beneficiario_Localidad" AND $palabra3!=""){
		$Localidad=resaltar_frase(eliminar_acentos($Localidad),$palabra3);
	}
	if($columna4=="Beneficiario_Localidad" AND $palabra4!=""){
		$Localidad=resaltar_frase(eliminar_acentos($Localidad),$palabra4);
	}
	if($columna5=="Beneficiario_Localidad" AND $palabra5!=""){
		$Localidad=resaltar_frase(eliminar_acentos($Localidad),$palabra5);
	}
	
	
	
	
	
	
	if($columna1=="Director" AND $palabra1!=""){
		$Director=resaltar_frase(eliminar_acentos($Director),$palabra1);
	}
	if($columna2=="Director" AND $palabra2!=""){
		$Director=resaltar_frase(eliminar_acentos($Director),$palabra2);
	}
	if($columna3=="Director" AND $palabra3!=""){
		$Director=resaltar_frase(eliminar_acentos($Director),$palabra3);
	}
	if($columna4=="Director" AND $palabra4!=""){
		$Director=resaltar_frase(eliminar_acentos($Director),$palabra4);
	}
	if($columna5=="Director" AND $palabra5!=""){
		$Director=resaltar_frase(eliminar_acentos($Director),$palabra5);
	}
	
	
	
	
	
	
	
	if($columna1=="Organizacion_Vinculante" AND $palabra1!=""){
		$Organizacion_Vinculante=resaltar_frase(eliminar_acentos($Organizacion_Vinculante),$palabra1);
	}
	if($columna2=="Organizacion_Vinculante" AND $palabra2!=""){
		$Organizacion_Vinculante=resaltar_frase(eliminar_acentos($Organizacion_Vinculante),$palabra2);
	}
	if($columna3=="Organizacion_Vinculante" AND $palabra3!=""){
		$Organizacion_Vinculante=resaltar_frase(eliminar_acentos($Organizacion_Vinculante),$palabra3);
	}
	if($columna4=="Organizacion_Vinculante" AND $palabra4!=""){
		$Organizacion_Vinculante=resaltar_frase(eliminar_acentos($Organizacion_Vinculante),$palabra4);
	}
	if($columna5=="Organizacion_Vinculante" AND $palabra5!=""){
		$Organizacion_Vinculante=resaltar_frase(eliminar_acentos($Organizacion_Vinculante),$palabra5);
	}




	if($columna1=="Convocatoria" AND $palabra1!=""){
		$Convocatoria=resaltar_frase(eliminar_acentos($Convocatoria),$palabra1);
	}
	if($columna2=="Convocatoria" AND $palabra2!=""){
		$Convocatoria=resaltar_frase(eliminar_acentos($Convocatoria),$palabra2);
	}
	if($columna3=="Convocatoria" AND $palabra3!=""){
		$Convocatoria=resaltar_frase(eliminar_acentos($Convocatoria),$palabra3);
	}
	if($columna4=="Convocatoria" AND $palabra4!=""){
		$Convocatoria=resaltar_frase(eliminar_acentos($Convocatoria),$palabra4);
	}
	if($columna5=="Convocatoria" AND $palabra5!=""){
		$Convocatoria=resaltar_frase(eliminar_acentos($Convocatoria),$palabra5);
	}
	
	
	
	
	
	
	if($f!="Todos"){
		$Financiacion=resaltar_frase(eliminar_acentos($Financiacion),$f);
	}
	
	
	
	if($a!="Todos"){
		$Admisibilidad=resaltar_frase(eliminar_acentos($Admisibilidad),$a);
	}
	
	if($m!="Todas" & $Modalidad!='-'){
		$Modalidad=resaltar_frase(eliminar_acentos($Modalidad),$m);
	}

?>