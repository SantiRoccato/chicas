-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-11-2024 a las 00:20:05
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `canchaalmen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `telefono` int UNSIGNED DEFAULT NULL,
  `usuario_idusuario` int NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `fk_cliente_usuario1_idx` (`usuario_idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_no_laborales`
--

DROP TABLE IF EXISTS `dias_no_laborales`;
CREATE TABLE IF NOT EXISTS `dias_no_laborales` (
  `iddias_no_laborales` date NOT NULL,
  PRIMARY KEY (`iddias_no_laborales`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `idestados` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idestados`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

DROP TABLE IF EXISTS `fecha`;
CREATE TABLE IF NOT EXISTS `fecha` (
  `idfecha` int NOT NULL AUTO_INCREMENT,
  `fechaN` date DEFAULT NULL,
  PRIMARY KEY (`idfecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora`
--

DROP TABLE IF EXISTS `hora`;
CREATE TABLE IF NOT EXISTS `hora` (
  `idhora` int NOT NULL AUTO_INCREMENT,
  `tipo` int DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `tipo_turno_idtipo_turno` int NOT NULL,
  PRIMARY KEY (`idhora`),
  KEY `fk_hora_tipo_turno1_idx` (`tipo_turno_idtipo_turno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idroles` int NOT NULL,
  `estado` int DEFAULT NULL,
  PRIMARY KEY (`idroles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_turno`
--

DROP TABLE IF EXISTS `tipo_turno`;
CREATE TABLE IF NOT EXISTS `tipo_turno` (
  `idtipo_turno` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`idtipo_turno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos_dados`
--

DROP TABLE IF EXISTS `turnos_dados`;
CREATE TABLE IF NOT EXISTS `turnos_dados` (
  `idTurnos_Dados` int NOT NULL AUTO_INCREMENT,
  `fecha_idfecha` int NOT NULL,
  `hora_idhora` int NOT NULL,
  `cliente_idcliente` int NOT NULL,
  PRIMARY KEY (`idTurnos_Dados`),
  KEY `fk_Turnos_Dados_fecha_idx` (`fecha_idfecha`),
  KEY `fk_Turnos_Dados_hora1_idx` (`hora_idhora`),
  KEY `fk_Turnos_Dados_cliente1_idx` (`cliente_idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `nomusuario` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `roles_idroles` int NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_roles1_idx` (`roles_idroles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
