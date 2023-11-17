CREATE TABLE IF NOT EXISTS Proyectos (
    `Codigo` VARCHAR(255) DEFAULT '-',
	`Modalidad` VARCHAR(255) DEFAULT '-',
    `Titulo` VARCHAR(255) DEFAULT '-',
    `Beneficiario` VARCHAR(255) DEFAULT '-',
    `Beneficiario_Correo` VARCHAR(255) DEFAULT '-',
	`Beneficiario_Localidad` VARCHAR(255) DEFAULT '-',
	`Radicacion_Departamento` VARCHAR(255) DEFAULT '-',
    `Radicacion_Localidad` VARCHAR(255) DEFAULT '-',
    `Director` VARCHAR(255) DEFAULT '-',
    `Director_Correo` VARCHAR(255) DEFAULT '-',
    `Organizacion_Vinculante` VARCHAR(255) DEFAULT '-' ,
	`Organizacion_Vinculante_Correo` VARCHAR(255) DEFAULT '-',
	`Palabras_Claves` VARCHAR(255) DEFAULT '-',
    `Monto_ANR` DECIMAL(15,2),
    `Convocatoria` VARCHAR(255) DEFAULT '-',
    `Año` INT,
    `Admisibilidad` VARCHAR(255) DEFAULT '-',
    `Financiacion` VARCHAR(255) DEFAULT '-',
    `Puntaje` VARCHAR(255) DEFAULT '-'
)ENGINE=InnoDB DEFAULT CHARSET=UTF8;

-- Definir el valor por defecto
ALTER TABLE Proyectos
MODIFY COLUMN Codigo TEXT,
MODIFY COLUMN Modalidad TEXT,
MODIFY COLUMN Titulo TEXT,
MODIFY COLUMN Beneficiario TEXT,
MODIFY COLUMN Beneficiario_Correo TEXT,
MODIFY COLUMN Beneficiario_Localidad TEXT,
MODIFY COLUMN Radicacion_Departamento TEXT,
MODIFY COLUMN Radicacion_Localidad TEXT,
MODIFY COLUMN Director TEXT,
MODIFY COLUMN Director_Correo TEXT,
MODIFY COLUMN Organizacion_Vinculante TEXT,
MODIFY COLUMN Organizacion_Vinculante_Correo TEXT,
MODIFY COLUMN Palabras_Claves TEXT,
MODIFY COLUMN Convocatoria TEXT,
MODIFY COLUMN Admisibilidad TEXT,
MODIFY COLUMN Financiacion TEXT,
MODIFY COLUMN Puntaje TEXT;

DELIMITER //
CREATE TRIGGER before_insert_Proyectos
BEFORE INSERT ON Proyectos
FOR EACH ROW
BEGIN

    IF NEW.Codigo IS NULL THEN
        SET NEW.Codigo = '-';
    END IF;
	
	IF NEW.Modalidad IS NULL THEN
        SET NEW.Modalidad = '-';
    END IF;
	
	IF NEW.Titulo IS NULL THEN
        SET NEW.Titulo = '-';
    END IF;
	
	IF NEW.Beneficiario IS NULL THEN
        SET NEW.Beneficiario = '-';
    END IF;
	
	IF NEW.Beneficiario_Correo IS NULL THEN
        SET NEW.Beneficiario_Correo = '-';
    END IF;
	
	IF NEW.Beneficiario_Localidad IS NULL THEN
        SET NEW.Beneficiario_Localidad = '-';
    END IF;
	
	IF NEW.Radicacion_Departamento IS NULL THEN
        SET NEW.Radicacion_Departamento = '-';
    END IF;
	
	IF NEW.Radicacion_Localidad IS NULL THEN
        SET NEW.Radicacion_Localidad = '-';
    END IF;
	
	IF NEW.Director IS NULL THEN
        SET NEW.Director = '-';
    END IF;
	
	IF NEW.Director_Correo IS NULL THEN
        SET NEW.Director_Correo = '-';
    END IF;
	
	IF NEW.Organizacion_Vinculante IS NULL THEN
        SET NEW.Organizacion_Vinculante = '-';
    END IF;
	
	IF NEW.Organizacion_Vinculante_Correo IS NULL THEN
        SET NEW.Organizacion_Vinculante_Correo = '-';
    END IF;
	
	IF NEW.Palabras_Claves IS NULL THEN
        SET NEW.Palabras_Claves = '-';
    END IF;
	
	IF NEW.Convocatoria IS NULL THEN
        SET NEW.Convocatoria = '-';
    END IF;
	
	IF NEW.Admisibilidad IS NULL THEN
        SET NEW.Admisibilidad = '-';
    END IF;
	
	IF NEW.Financiacion IS NULL THEN
        SET NEW.Financiacion = '-';
    END IF;
	
	IF NEW.Puntaje IS NULL THEN
        SET NEW.Puntaje = '-';
    END IF;
	

    SET NEW.Director = REPLACE(NEW.Director, ',', '');
	
END;
//
-- Si algun valor es NULL, sera reemplazado por defecto por -
-- Eliminar en la columna Director todas las comas
DELIMITER ;