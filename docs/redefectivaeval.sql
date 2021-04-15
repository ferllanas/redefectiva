-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 15, 2021 at 07:16 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redefectivaeval`
--
CREATE DATABASE IF NOT EXISTS `redefectivaeval` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `redefectivaeval`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `deletealumnos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletealumnos` (IN `idIN` BIGINT(20))  BEGIN
DECLARE exit handler for SQLEXCEPTION
 BEGIN
  GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
   @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
  SET @full_error = CONCAT("ERROR ", @errno, " (", @sqlstate, "): ", @text);
  SELECT @full_error;
 END;
 
	UPDATE alumnos SET estatus=90 , fdel=NOW() WHERE id = idIN;
    
    SELECT * FROM alumnos WHERE id = idIN;
END$$

DROP PROCEDURE IF EXISTS `getgeneros`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getgeneros` ()  BEGIN
SELECT * FROM generos;
END$$

DROP PROCEDURE IF EXISTS `savealumnos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `savealumnos` (IN `idIn` BIGINT(20), IN `nombreIN` VARCHAR(255), IN `appatIN` VARCHAR(255), IN `apmatIN` VARCHAR(255), IN `fnacIN` DATE, IN `generoIN` INT, IN `gradoaingresarIN` INT, IN `matriculaIN` VARCHAR(45))  BEGIN

DECLARE exit handler for SQLEXCEPTION
 BEGIN
  GET DIAGNOSTICS CONDITION 1 @sqlstate = RETURNED_SQLSTATE, 
   @errno = MYSQL_ERRNO, @text = MESSAGE_TEXT;
  SET @full_error = CONCAT("ERROR ", @errno, " (", @sqlstate, "): ", @text);
  SELECT @full_error as error;
 END;
START TRANSACTION;
IF idIn=0 THEN
	-- Registro nuevo de alumno 
    SET idIn = (SELECT ID FROM alumnos WHERE matricula=matriculaIN);
    IF idIn>0 THEN
		-- Significa que ya existe un usuario con esta matricula
		SELECT 56 as error, idIn as idalumno;
    else
    
		INSERT INTO alumnos(nombre, appat, apmat, fnac, generos_id, grado_ingresar, estatus, falta, fmod, matricula) 
			VALUES(nombreIN, appatIN, apmatIN, fnacIN, generoIN, gradoaingresarIN,0, NOW(), NOW(), matriculaIN);
		SET idIn =  LAST_INSERT_ID();
        COMMIT;
		SELECT idIn as idalumno;
	END IF;
ELSE
	-- modificacion de alumnos
    UPDATE alumnos SET matricula=matriculaIN, nombre=nombreIN, appat=appatIN, apmat=apmatIN, fnac=fnacIN, generos_id=generoIN, grado_ingresar=gradoaingresarIN , estatus=0, fmod=NOW() WHERE  id=idIn;
    COMMIT;
	SELECT idIn as idalumno;
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) NOT NULL DEFAULT '' COMMENT 'Nombre alumno',
  `appat` varchar(255) NOT NULL DEFAULT '' COMMENT 'Apellido paterno',
  `apmat` varchar(255) NOT NULL DEFAULT '' COMMENT 'Apellido materno',
  `fnac` date DEFAULT NULL COMMENT 'Fecha de nacimiento',
  `grado_ingresar` int(11) NOT NULL DEFAULT '0' COMMENT 'Grado a ingresar',
  `estatus` int(11) NOT NULL DEFAULT '0' COMMENT 'Estado de alumno <90 alumno dado de baja.',
  `generos_id` int(11) NOT NULL,
  `falta` datetime DEFAULT NULL,
  `fmod` datetime DEFAULT NULL,
  `fdel` datetime DEFAULT NULL,
  `matricula` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `appat`, `apmat`, `fnac`, `grado_ingresar`, `estatus`, `generos_id`, `falta`, `fmod`, `fdel`, `matricula`) VALUES
(1, 'Juana Ma.', 'Rodríguez', 'Garcia', '1969-11-13', 6, 0, 1, '2021-04-13 03:32:33', '2021-04-14 00:03:55', NULL, '12324'),
(2, 'Juan', 'Llanas', 'Chairez', '1955-07-25', 6, 0, 2, '2021-04-13 03:56:14', '2021-04-14 00:04:36', NULL, '3546564'),
(3, 'dsaasd', 'Llanas', 'Chairez', '2021-04-14', 1, 90, 1, '2021-04-13 03:56:55', '2021-04-13 03:56:55', '2021-04-13 23:29:21', '8978'),
(4, 'Diana', 'Lopez', 'Sepulveda', '1987-04-14', 1, 0, 1, '2021-04-13 03:58:01', '2021-04-14 00:05:39', NULL, '4567'),
(5, 'Maribel', 'Lozano', 'Cardenas', '1980-04-13', 4, 0, 1, '2021-04-13 03:58:23', '2021-04-14 00:05:11', NULL, '432165');

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

DROP TABLE IF EXISTS `generos`;
CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL COMMENT 'Nombre',
  `descripcion` longtext COMMENT 'Descripción'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Femenino', 'Mujer'),
(2, 'Masculino', 'Hombre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alumnos_generos_idx` (`generos_id`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_alumnos_generos` FOREIGN KEY (`generos_id`) REFERENCES `generos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
