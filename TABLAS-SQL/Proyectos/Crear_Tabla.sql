CREATE TABLE IF NOT EXISTS Proyectos (
    `Codigo` TEXT CHARACTER SET utf8,
	`Modalidad` TEXT CHARACTER SET utf8,
    `Titulo` TEXT CHARACTER SET utf8,
    `Beneficiario` TEXT CHARACTER SET utf8,
    `Beneficiario_Correo` TEXT CHARACTER SET utf8,
	`Beneficiario_Departamento` TEXT CHARACTER SET utf8,
    `Beneficiario_Localidad` TEXT CHARACTER SET utf8,
    `Director` TEXT CHARACTER SET utf8,
    `Director_Correo` TEXT CHARACTER SET utf8,
    `Organizacion_Vinculante` TEXT CHARACTER SET utf8,
	`Organizacion_Vinculante_Correo` TEXT CHARACTER SET utf8,
    `Monto_ANR` DECIMAL(15,2),
    `Convocatoria` TEXT CHARACTER SET utf8,
    `Año` INT,
    `Admisibilidad` TEXT CHARACTER SET utf8,
    `Financiacion` TEXT CHARACTER SET utf8,
    `Puntaje` TEXT CHARACTER SET utf8
);