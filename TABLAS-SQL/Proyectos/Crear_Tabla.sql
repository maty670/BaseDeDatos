CREATE TABLE IF NOT EXISTS Proyectos (
    `Codigo` TEXT CHARACTER SET utf8,
	`Modalidad` TEXT CHARACTER SET utf8,
    `Titulo` TEXT CHARACTER SET utf8,
    `Beneficiario` TEXT CHARACTER SET utf8,
    `Beneficiario_Correo` TEXT CHARACTER SET utf8,
	`Beneficiario_Departamento` VARCHAR(255),
    `Beneficiario_Localidad` VARCHAR(255) DEFAULT '-',
    `Director` TEXT CHARACTER SET utf8,
    `Director_Correo` TEXT CHARACTER SET utf8,
    `Organizacion_Vinculante` TEXT CHARACTER SET utf8,
	`Organizacion_Vinculante_Correo` TEXT CHARACTER SET utf8,
	`Palabras_Claves` VARCHAR(255) DEFAULT '-',
    `Monto_ANR` DECIMAL(15,2),
    `Convocatoria` TEXT CHARACTER SET utf8,
    `Año` INT,
    `Admisibilidad` TEXT CHARACTER SET utf8,
    `Financiacion` TEXT CHARACTER SET utf8,
    `Puntaje` TEXT CHARACTER SET utf8
);

-- Definir el valor por defecto
ALTER TABLE Proyectos
MODIFY COLUMN Palabras_Claves TEXT,
MODIFY COLUMN Beneficiario_Localidad TEXT;

DELIMITER //
CREATE TRIGGER before_insert_Proyectos
BEFORE INSERT ON Proyectos
FOR EACH ROW
BEGIN
    IF NEW.Palabras_Claves IS NULL THEN
        SET NEW.Palabras_Claves = '-';
    END IF;
	
	IF NEW.Beneficiario_Departamento IS NULL THEN
        SET NEW.Beneficiario_Departamento = '-';
    END IF;
	
	IF NEW.Beneficiario_Localidad IS NULL THEN
        SET NEW.Beneficiario_Localidad = '-';
    END IF;
	
END;
//
DELIMITER ;