-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2022 a las 16:33:43
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE IF NOT EXISTS `evaluaciones` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` text CHARACTER SET utf8,
  `CUIL` text CHARACTER SET utf8,
  `Convocatoria` text CHARACTER SET utf8,
  `Comision` text CHARACTER SET utf8,
  `ID_Proyectos` text CHARACTER SET utf8,
  `Evaluacion` text CHARACTER SET utf8,
  `Comentario` text CHARACTER SET utf8,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`Id`, `Nombre`, `CUIL`, `Convocatoria`, `Comision`, `ID_Proyectos`, `Evaluacion`, `Comentario`) VALUES
(1, 'Dra. Natalia Szerman', '27-24940299-6', 'INNOVAR 2020', 'Alimentos', 'INNOVAR-2020-002\r\nINNOVAR-2020-032\r\nINNOVAR-2020-033', NULL, NULL),
(2, 'Monica Chavez', '27-16734900-0', 'INNOVAR 2020', 'Alimentos', 'INNOVAR-2020-036\r\nINNOVAR-2020-053', NULL, NULL),
(3, 'Maria Veronica Aimar', '27-17627048-4', 'INNOVAR 2020', 'Agricultura/Ganadería', 'INNOVAR-2020-025\r\nINNOVAR-2020-034', NULL, NULL),
(4, 'Kirschbaum, Daniel Santiago', '20-16811513-0', 'INNOVAR 2020', 'Agricultura/Ganadería', 'INNOVAR-2020-031\r\nINNOVAR-2020-039\r\nINNOVAR-2020-045', NULL, NULL),
(5, 'Laura Beatriz GURINI', '27-06666402-9', 'INNOVAR 2020', 'Agricultura/Ganadería', 'INNOVAR-2020-048\r\nINNOVAR-2020-049', NULL, NULL),
(6, 'Braidot Nestor Bruno', '20-14013893-3', 'INNOVAR 2020', 'Ingeniería Química', 'INNOVAR-2020-004\r\nINNOVAR-2020-006\r\nINNOVAR-2020-023', 'Muy buena', ''),
(7, 'EIMER, GRISELDA ALEJANDRA', '27-20783681-3', 'INNOVAR 2020', 'Ingeniería Química', 'INNOVAR-2020-061\r\nINNOVAR-2020-072\r\nINNOVAR-2020-073', NULL, NULL),
(8, 'Soledad Renzini', '27-26727601-9', 'INNOVAR 2020', 'Ingeniería Química', 'INNOVAR-2020-024\r\nINNOVAR-2020-057\r\nINNOVAR-2020-071', NULL, NULL),
(9, 'Gustavo pablo Romanelli', '20-17798511-3', 'INNOVAR 2020', 'Ingeniería Química', 'INNOVAR-2020-054\r\nINNOVAR-2020-058\r\nINNOVAR-2020-059', NULL, NULL),
(10, 'Castro Guillermo Raúl', '23-12291201-9', 'INNOVAR 2020', 'Biotecnología', 'INNOVAR-2020-010\r\nINNOVAR-2020-060', NULL, NULL),
(11, 'Eleonora Campos', '27-21496000-7', 'INNOVAR 2020', 'Biotecnología', 'INNOVAR-2020-018\r\nINNOVAR-2020-028', NULL, NULL),
(12, 'Fabian Nigro ', '20-17106471-7', 'INNOVAR 2020', 'Biotecnología', 'INNOVAR-2020-020\r\nINNOVAR-2020-052', NULL, NULL),
(13, 'Marisa Farber', '27-17722851-1', 'INNOVAR 2020', 'Biotecnología', 'INNOVAR-2020-021\r\nINNOVAR-2020-051\r\nINNOVAR-2020-062', NULL, NULL),
(14, 'Fillottrani Pablo', '23-18398899-9', 'INNOVAR 2020', 'TICs', 'INNOVAR-2020-003\r\nINNOVAR-2020-016\r\nINNOVAR-2020-019', '', ''),
(15, 'Natalia Revollo Sarmiento', '27-27727430-8', 'INNOVAR 2020', 'TICs', 'INNOVAR-2020-003\r\nINNOVAR-2020-016\r\nINNOVAR-2020-019', NULL, NULL),
(16, 'Alejandra Garrido ', '27-22851108-6', 'INNOVAR 2020', 'TICs', 'INNOVAR-2020-030\r\nINNOVAR-2020-043\r\nINNOVAR-2020-044', NULL, NULL),
(17, 'Marcelo Marciszack', '20-16838467-0', 'INNOVAR 2020', 'TICs', 'INNOVAR-2020-050\r\nINNOVAR-2020-056\r\nINNOVAR-2020-066', NULL, NULL),
(18, 'Hugo Guillermo Castro', '20-26267177-2', 'INNOVAR 2020', 'TICs', 'INNOVAR-2020-007\r\nINNOVAR-2020-037\r\nINNOVAR-2020-046\r\n', NULL, NULL),
(19, 'Javier Luis Mroginski ', '20-26680210-3', 'INNOVAR 2020', 'TICs', 'INNOVAR-2020-009\r\nINNOVAR-2020-012\r\nINNOVAR-2020-015', NULL, NULL),
(20, 'MATEOS DIAZ CRISTIAN MAXIMILIANO\r\n', '24-26261113-9', 'INNOVAR 2020', 'TICs', 'INNOVAR-2020-069\r\nINNOVAR-2020-074\r\n', NULL, NULL),
(21, 'Gregorio Fernando Hugo', '20-23289306-1', 'INNOVAR 2020', 'Ingeniería Electrónica/Informática', 'INNOVAR-2020-001\r\nINNOVAR-2020-013\r\nINNOVAR-2020-014\r\nINNOVAR-2020-017', NULL, NULL),
(22, 'ROSSOMANDO FRANCISCO GUIDO', '20-20953107-1', 'INNOVAR 2020', 'Ingeniería Electrónica/Informática', 'INNOVAR-2020-026\r\nINNOVAR-2020-041\r\nINNOVAR-2020-070\r\nINNOVAR-2020-075', NULL, NULL),
(23, 'Bruhl Sonia Patricia', '27-18112732-0', 'INNOVAR 2020', 'Ingeniería Mecánica', 'INNOVAR-2020-005\r\nINNOVAR-2020-055\r\nINNOVAR-2020-064', NULL, NULL),
(24, 'Ivan Sorba', '20-23926987-8', 'INNOVAR 2020', 'Ingeniería Mecánica', 'INNOVAR-2020-038\r\nINNOVAR-2020-042\r\nINNOVAR-2020-047', NULL, NULL),
(25, 'Hector Alcar', '20-18305021-5', 'INNOVAR 2021', 'TICs Y ELECTRONICA ', 'INNOVAR-2021-040\r\nINNOVAR-2021-060\r\nINNOVAR-2021-063', NULL, NULL),
(26, 'Leandro Ezequiel Mocchegiani', '20-27032536-0', 'INNOVAR 2021', 'TICs Y ELECTRONICA ', 'INNOVAR-2021-025\r\nINNOVAR-2021-044', NULL, NULL),
(27, 'Pablo Fillottrani', '23-18398899-9', 'INNOVAR 2021', 'TICs Y ELECTRONICA ', 'INNOVAR-2021-062\r\nINNOVAR-2021-070\r\nINNOVAR-2021-073', NULL, NULL),
(28, 'María Soledad Renzini', '27-26727601-9', 'INNOVAR 2021', 'QUIMICA Y MECÁNICA', 'INNOVAR-2021-033\r\nINNOVAR-2021-055\r\nINNOVAR-2021-064', NULL, NULL),
(29, 'Noemí Zaritzky', '27-06517229-7', 'INNOVAR 2021', 'QUIMICA Y MECÁNICA', 'INNOVAR-2021-050\r\nINNOVAR-2021-066\r\nINNOVAR-2021-074', NULL, NULL),
(30, 'Pablo Bianchi', '20-22386378-8', 'INNOVAR 2021', 'QUIMICA Y MECÁNICA', 'INNOVAR-2021-004\r\nINNOVAR-2021-058', NULL, NULL),
(31, 'Carmen Solis', '27-31727575-2', 'INNOVAR 2021', 'Alimentos y Bio', 'INNOVAR-2021-042\r\nINNOVAR-2021-052', NULL, NULL),
(32, 'Diego Genovese', '20-22053882-7', 'INNOVAR 2021', 'Alimentos y Bio', 'INNOVAR-2021-037\r\nINNOVAR-2021-046\r\nINNOVAR-2021-072', NULL, NULL),
(33, 'Silvina Salinas', '27-30465323-5', 'INNOVAR 2021', 'Alimentos y Bio', 'INNOVAR-2021-047', NULL, NULL),
(34, 'SANS FERRAMOLA, María Isabel', '27-11310625-0', 'INNOVAR 2021', 'Dra. en Bioquímica. ', 'INNOVAR-2021-005\r\nINNOVAR-2021-006', NULL, NULL),
(35, 'BARBOSA, Silvia\r\nElena', '27-16924371-4', 'INNOVAR 2021', 'Doctora en Ingeniería Química - Ingenieria y Tecnologia de Materiales\r\n', 'INNOVAR-2021-013\r\nINNOVAR-2021-009', NULL, NULL),
(36, 'DÍAZ PACE, Jorge\r\nAndrés', '20-24339497-0', 'INNOVAR 2021', 'Doctor en Ciencias de la Computación\r\n', 'INNOVAR-2021-012', NULL, NULL),
(37, 'RAYA TONETTI, Gabriel', '20-20418958-8', 'INNOVAR 2021', 'Doctor en Ingeniería Química', '-', NULL, NULL),
(38, 'BASSO Lorenzo Ricardo', '20-10650546-3', 'DTT-2021', 'Agropecuaria - Alimenticia - Energía Renovables - Láctea - Química - Transportes', 'DTT-2021-038\r\nDTT-2021-043\r\nDTT-2021-049\r\nDTT-2021-050\r\nDTT-2021-061\r\nDTT-2021-065', NULL, 'Vinculador Tecnológico'),
(39, 'BELAICH Mariano Nicolas', '20-24882285-7', 'DTT-2021', 'Biotecnología - Nanotecnología', 'DTT-2021-072\r\nDTT-2021-073\r\nDTT-2021-078', NULL, 'Evaluador Experto'),
(40, 'CASTELLS Cecilia Beatríz', '20-17114863-5', 'DTT-2021', 'Biotecnología - Nanotecnología', 'DTT-2021-067\r\nDTT-2021-079', NULL, 'Evaluador Experto'),
(41, 'GENOVESE Diego Bautista', '20-22053882-7', 'DTT-2021', 'Agropecuaria - Alimenticia - Energía Renovables - Láctea - Química - Transportes', 'DTT-2021-038\r\nDTT-2021-043\r\nDTT-2021-049\r\nDTT-2021-050\r\nDTT-2021-061\r\nDTT-2021-065', NULL, 'Evaluador Experto'),
(42, 'GUTIERREZ Victoria Soledad', '27-28664934-9', 'DTT-2021', 'Agropecuaria - Alimenticia - Energía Renovables - Láctea - Química - Transportes', 'DTT-2021-034\r\nDTT-2021-057\r\nDTT-2021-074', 'Muy buena', 'Evaluador Experto'),
(43, 'MAFFIA, Paulo', '20-25407481-1', 'DTT-2021', 'Biotecnología - Nanotecnología', 'DTT-2021-013\r\nDTT-2021-021\r\nDTT-2021-023\r\nDTT-2021-036\r\nDTT-2021-037', NULL, 'Evaluador Experto'),
(44, 'MANCUSO Walter', '20-14674027-9', 'DTT-2021', 'Agropecuaria - Alimenticia - Energía Renovables - Láctea - Química - Transportes', 'DTT-2021-038\r\nDTT-2021-043\r\nDTT-2021-049\r\nDTT-2021-050\r\nDTT-2021-061\r\nDTT-2021-065', NULL, 'Evaluador Experto'),
(45, 'MARTINEZ Alejandra', '27-17458412-0', 'DTT-2021', 'Biotecnología - Nanotecnología', 'DTT-2021-014\r\nDTT-2021-063\r\nDTT-2021-069', NULL, 'Evaluador Experto'),
(46, 'MOSIEWICKI Mirna Alejandra', '23-22915645-4', 'DTT-2021', 'Agropecuaria - Alimenticia - Energía Renovables - Láctea - Química - Transportes', 'DTT-2021-006\r\nDTT-2021-028\r\nDTT-2021-055', 'Muy buena', 'Evaluador Experto'),
(47, 'QUILES Angel', '20-31466791-4', 'DTT-2021', 'Agropecuaria - Alimenticia - Energía Renovables - Láctea - Química - Transportes', 'DTT-2021-006\r\nDTT-2021-028\r\nDTT-2021-033\r\nDTT-2021-034\r\nDTT-2021-055\r\nDTT-2021-057\r\nDTT-2021-062\r\nDTT-2021-068\r\nDTT-2021-074', 'Muy buena', 'Vinculador Tecnológico'),
(48, 'SAMPER Mauricio Eduardo ', '23-26135885-9', 'DTT-2021', 'Agropecuaria - Alimenticia - Energía Renovables - Láctea - Química - Transportes', 'DTT-2021-033\r\nDTT-2021-062\r\nDTT-2021-068', 'Muy buena', 'Evaluador Experto'),
(49, 'SARTORI Ignacio', '23-29800652-9', 'DTT-2021', 'Biotecnología - Nanotecnología', 'DTT-2021-013\r\nDTT-2021-021\r\nDTT-2021-023\r\nDTT-2021-036\r\nDTT-2021-037\r\nDTT-2021-067\r\nDTT-2021-079', NULL, 'Vinculador Tecnológico'),
(50, 'VEGA Marcela', 'DNI: 22.414.758', 'DTT-2021', 'Biotecnología - Nanotecnología', 'DTT-2021-014\r\nDTT-2021-063\r\nDTT-2021-069\r\nDTT-2021-072\r\nDTT-2021-073\r\nDTT-2021-078', NULL, 'Vinculador Tecnológico'),
(51, 'Graciela Ciccia', '27-12009426-8', 'CDAT 2021', 'Agrotecnología, Agroalimentos', 'CDAT-2021-021\r\nCDAT-2021-023', NULL, NULL),
(52, 'Laura Loizeau', '27-22500045-5', 'CDAT 2021', 'Agronegocios', 'CDAT-2021-011', NULL, NULL),
(53, 'Hernán Braude', '20-29636062-8', 'CDAT 2021', 'Experto en Desarrolo de Políticas CTI . Vinculación y TICs ', 'CDAT-2021-007\r\nCDAT-2021-010', NULL, NULL),
(54, 'Federico Marque ', '20-27225672-2', 'CDAT 2021', 'Agrotecnología, Agroalimentos', 'CDAT-2021-001\r\nCDAT-2021-022', NULL, NULL),
(55, 'Javier Viqueira', '20-13492829-9', 'CDAT 2021', 'General', 'CDAT-2021-009\r\nCDAT-2021-014', NULL, NULL),
(56, 'Clara De Hertelendy', '27-30742286-2', 'CDAT 2021', 'Agrotecnología, Agroalimentos', 'CDAT-2021-003\r\nCDAT-2021-017', NULL, NULL),
(57, 'José María Rodriguez', '24-25343041-5', 'CDAT 2021', 'Experto en Desarrolo de Políticas CTI . Vinculación CTI e Innovación', 'CDAT-2021-019\r\nCDAT-2021-024', NULL, NULL),
(58, 'Nicolás Grosman', '20-29392696-5', 'CDAT 2021', 'Experto en Desarrolo de Políticas CTI . Vinculación CTI e Innovación', 'CDAT-2021-002\r\nCDAT-2021-027', NULL, NULL),
(59, 'Garrido, Alejandra', '27-22851108-6', 'EBT 2021', 'TICS/Electrónica', 'EBT-2021-057\r\nEBT-2021-090\r\nEBT-2021-056', NULL, NULL),
(60, 'Gregorio, Fernando Hugo', '20-23289306-1', 'EBT 2021', 'TICS/Electrónica', 'EBT-2021-015\r\nEBT-2021-034', NULL, NULL),
(61, 'TACCA, HERNAN EMILIO ', '20-11406209-0', 'EBT 2021', 'TICS/Electrónica', 'EBT-2021-013\r\nEBT-2021-049', NULL, NULL),
(62, 'FILLOTTRANI, PABLO', '23-18398899-9', 'EBT 2021', 'TICS/Electrónica', 'EBT-2021-055\r\nEBT-2021-069', 'Muy buena', ''),
(63, 'Gastón Schlotthauer', '20-24034555-3', 'EBT 2021', 'TICS/Electrónica', 'EBT-2021-035\r\nEBT-2021-083', NULL, NULL),
(64, 'Victor Luis Caballini', '20-07699112-0', 'EBT 2021', 'TICS/Electrónica', 'EBT-2021-032\r\nEBT-2021-065', NULL, NULL),
(65, 'Victoria Guadalupe Sanchez', '27-28003218-8', 'EBT 2021', 'Biotecnología', 'EBT-2021-006\r\nEBT-2021-050', 'Muy buena', ''),
(66, 'Laura Machuca', '27-29803034-4', 'EBT 2021', 'Biotecnología', 'EBT-2021-047\r\nEBT-2021-041', 'Muy buena', ''),
(67, 'TELLEZ MARIA TERESA', '27-03912460-8', 'EBT 2021', 'Biotecnología', 'EBT-2021-023\r\nEBT-2021-079', 'Muy buena', ''),
(68, 'RAMIREZ MARIA ROSANA', '27-21520406-0', 'EBT 2021', 'Biotecnología', 'EBT-2021-025\r\nEBT-2021-027\r\nEBT-2021-093', 'Mala', ''),
(69, 'COPELLO GUILLERMO JAVIER ', '20-27938318-5', 'EBT 2021', 'Biotecnología', 'EBT-2021-077\r\nEBT-2021-101', 'Muy buena', ''),
(70, 'FABIO GRIGORJEV', '20-20874290-7', 'EBT 2021', 'TICS/Electrónica', 'EBT-2021-004\r\nEBT-2021-124', 'Muy buena', ''),
(71, 'Iris Gastañaga      ', '23-20073232-4', 'EBT 2021', 'TICS/Electrónica', 'EBT-2021-114\r\nEBT-2021-132', NULL, NULL),
(72, 'Eduardo Campazzo', '20-22443057-5', 'EBT 2021', 'TICS/Electrónica', 'EBT-2021-129\r\nEBT-2021-131', 'Muy buena', ''),
(73, 'Nicolás Rigoli', '20-27835335-5', 'EBT 2021', 'Biotecnología', 'EBT-2021-081\r\nEBT-2021-127', NULL, NULL),
(74, 'Adriana Descalzo', '-', 'EBT 2021', 'Biotecnología', 'EBT-2021-130\r\nEBT-2021-134', NULL, NULL),
(75, 'Mariano Javier Cao', '20-29542971-3', 'EBT 2021', 'Biotecnología', 'EBT-2021-133', NULL, NULL),
(76, 'DONOLO PABLO DANIEL', '20-29347644-7', 'EBT 2021', 'Comisión Única ', 'EBT-2021-139\r\nEBT-2021-147', NULL, NULL),
(77, 'EIMER GRISELDA ALEJANDRA', '27-20783681-3', 'EBT 2021', 'Comisión Única ', 'EBT-2021-146\r\nEBT-2021-149', NULL, NULL),
(78, 'NUSBLAT ALEJANDRO DAVID', '20-24662690-2', 'EBT 2021', 'Comisión Única ', 'EBT-2021-148\r\nEBT-2021-152\r\nEBT-2021-156', NULL, NULL),
(79, 'QUILES Angel', '20-31466791-4', 'EBT 2021', 'Comisión Única ', 'EBT-2021-139\r\nEBT-2021-147\r\nEBT-2021-146\r\nEBT-2021-149\r\nEBT-2021-148\r\nEBT-2021-152\r\nEBT-2021-156', NULL, 'Vinculador Tecnológico'),
(80, 'Ivan Nahuel Ares Rossi', '23-31264013-9', 'POES+I 2021', 'Comisión Única ', 'POESI-2021-014\r\nPOESI-2021-023\r\nPOESI-2021-029\r\nPOESI-2021-030\r\n', NULL, NULL),
(81, 'Oscar Galante', '20-08499821-5', 'POES+I 2021', 'Comisión Única ', 'POESI-2021-019\r\nPOESI-2021-020\r\nPOESI-2021-031', NULL, NULL),
(82, 'Juan Erreguerena', '20-20478457-5', 'POES+I 2021', 'Comisión Única ', 'POESI-2021-021\r\nPOESI-2021-022\r\nPOESI-2021-035\r\n', NULL, NULL),
(83, 'Palazolo Gonzalo Gastón', '20-24239407-1', 'PEIC EQUIPAMIENTO 2021', 'Biotecnológicos', 'PEICE-2021-017\r\nPEICE-2021-024\r\nPEICE-2021-037', NULL, NULL),
(84, 'Rojas, Natalia Lorena', '27-27692209-8', 'PEIC EQUIPAMIENTO 2021', 'Biotecnológicos', 'PEICE-2021-006\r\nPEICE-2021-010\r\nPEICE-2021-013', NULL, NULL),
(85, 'BATTAGLINI FERNANDO', '20-14026340-1', 'PEIC EQUIPAMIENTO 2021', 'Química, Bioquímica y Biotecnología', 'PEICE-2021-011\r\nPEICE-2021-020\r\nPEICE-2021-044', NULL, NULL),
(86, 'GONZALEZ SILVIA NELINA', '27-11708433-2', 'PEIC EQUIPAMIENTO 2021', 'Química, Bioquímica y Biotecnología', 'PEICE-2021-009\r\nPEICE-2021-026', NULL, NULL),
(87, 'Bacigalupe Alejandro,', '20-30762727-3', 'PEIC EQUIPAMIENTO 2021', 'Física Materiales', 'PEICE-2021-001\r\nPEICE-2021-003', NULL, NULL),
(88, 'Donolo Pablo Daniel', '20-29347644-7', 'PEIC EQUIPAMIENTO 2021', 'Física Materiales', 'PEICE-2021-015\r\nPEICE-2021-022', NULL, NULL),
(89, 'Garbarini Roxana', '27-23104503-7', 'PEIC EQUIPAMIENTO 2021', 'Física Materiales', 'PEICE-2021-036\r\nPEICE-2021-045', NULL, NULL),
(90, 'María Julia Yañez', '27-13744358-4', 'PEIC EQUIPAMIENTO 2021', 'Física y TICs', 'PEICE-2021-021\r\nPEICE-2021-025\r\nPEICE-2021-028', NULL, NULL),
(91, 'Cristian Mateos', '24-26261113-9', 'PEIC EQUIPAMIENTO 2021', 'Física y TICs', 'PEICE-2021-007\r\nPEICE-2021-014', NULL, NULL),
(92, 'de la Barrera Pablo Martín', '20-26925712-2', 'PEIC EQUIPAMIENTO 2021', 'Física y TICs', 'PEICE-2021-038', NULL, NULL),
(93, 'GALLO JUAN EDUARDO', '20-13588476-7', 'PEIC EQUIPAMIENTO 2021', 'Vet y Salud Humana', 'PEICE-2021-035\r\nPEICE-2021-042', NULL, NULL),
(94, 'HOZBOR DANIELA FLAVIA', '27-1657278-5', 'PEIC EQUIPAMIENTO 2021', 'Vet y Salud Humana', 'PEICE-2021-008\r\nPEICE-2021-012', NULL, NULL),
(95, 'CARRANZA ALICIA ISABEL', '23-17733950-4', 'PEIC EQUIPAMIENTO 2021', 'Vet y Salud Humana', 'PEICE-2021-002\r\nPEICE-2021-043', NULL, NULL),
(96, 'Carla E. Di Bella', '27-31422150-3', 'PEIC EQUIPAMIENTO 2021', 'Agro', 'PEICE-2021-032\r\nPEICE-2021-039', NULL, NULL),
(97, 'Facundo Aguilera', '20-31518354-6', 'PEIC EQUIPAMIENTO 2021', 'Agro', 'PEICE-2021-033\r\nPEICE-2021-041', NULL, NULL),
(98, 'Wannaz, Eduardo Daniel', '20-23841528-5', 'PEIC EQUIPAMIENTO 2021', 'Agro', 'PEICE-2021-019\r\nPEICE-2021-031', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
