-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2017 a las 04:32:53
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `BD_Elearnig`
--
CREATE DATABASE IF NOT EXISTS `BD_Elearnig` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `BD_Elearnig`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_Colaboracion`
--

CREATE TABLE IF NOT EXISTS `tb_Colaboracion` (
  `Id_Colaboracion` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Tipo_Colaboracion` int(11) NOT NULL,
  `Id_Tarea` int(11) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Fecha_Modificacion` date NOT NULL,
  `Contenido` varchar(45) NOT NULL,
  `Colaboracion_Padre` varchar(45) NOT NULL,
  `Visible` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Colaboracion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_Genero`
--

CREATE TABLE IF NOT EXISTS `tb_Genero` (
  `Id_Genero` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Genero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_Matricula`
--

CREATE TABLE IF NOT EXISTS `tb_Matricula` (
  `Id_Matricula` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Curso` int(11) NOT NULL,
  `Anio` varchar(45) NOT NULL,
  `Fecha_Matricula` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_Tipo_Colaboracion`
--

CREATE TABLE IF NOT EXISTS `tb_Tipo_Colaboracion` (
  `Id_Tipo_Colaboracion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Tipo_Colaboracion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_Usuario`
--

CREATE TABLE IF NOT EXISTS `tb_Usuario` (
  `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Identificacion` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Clave` varchar(45) NOT NULL,
  `Primer_Apellido` varchar(45) NOT NULL,
  `Segundo_Apellido` varchar(45) NOT NULL,
  `Id_Genero` int(11) NOT NULL,
  `Pais` varchar(45) NOT NULL,
  `Fecha_Ultimo_Ingreso` date NOT NULL,
  `Direccion_IP` varchar(45) NOT NULL,
  `Sistema_Operativo` varchar(45) NOT NULL,
  `Navegador` varchar(45) NOT NULL,
  `Lenguaje` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_Curso`
--

CREATE TABLE IF NOT EXISTS `tb_Curso`
(
`Id_Curso` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(45) NOT NULL,
`Duracion` int NOT NULL,
`Fecha_Inicio` Date NOT NULL,
`Fecha_Final` Date NOT NULL,
CONSTRAINT pk_Curso PRIMARY KEY (Id_Curso)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_Tarea`
--

CREATE TABLE IF NOT EXISTS `tb_Tarea`
(
`Id_Tarea` int NOT NULL AUTO_INCREMENT,
`Id_Curso` int NOT NULL,
`Descripcion` varchar(300) NOT NULL,
`Calificacion` int NOT NULL,
`Fecha_Creacion` Date NOT NULL,
`Fecha_Entrega` Date NOT NULL,
`Puntaje` int NOT NULL,
CONSTRAINT pk_Tarea PRIMARY KEY (Id_Tarea),
CONSTRAINT fk_Tarea_Curso FOREIGN KEY (Id_Curso) REFERENCES tb_Curso (Id_Curso)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_Semana`
--

CREATE TABLE IF NOT EXISTS `tb_Semana`
(
`Id_Semana` int NOT NULL AUTO_INCREMENT,
`Id_Curso` int NOT NULL,
`Fecha_Inicio` Date NOT NULL,
`Fecha_Final` Date NOT NULL,
CONSTRAINT pk_Semana PRIMARY KEY (Id_Semana),
CONSTRAINT fk_Semana_Curso FOREIGN KEY (Id_Curso) REFERENCES tb_Curso (Id_Curso)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_Recurso`
--

CREATE TABLE IF NOT EXISTS `tb_Recurso`
(
`Id_Recurso` int NOT NULL AUTO_INCREMENT,
`Id_Tipo_Recurso` int NOT NULL,
`Recurso_Padre` int NOT NULL,
`Nombre` varchar(30) NOT NULL,
`Url` varchar(50) NOT NULL,
`Visible` bit NOT NULL,
`Secuencia` int NOT NULL,
`Notas` float NOT NULL,
`Estado` bit NOT NULL,
`Semana` int NOT NULL,
CONSTRAINT pk_Recurso PRIMARY KEY (Id_Recurso),
CONSTRAINT fk_Recurso_Tipo_Recurso FOREIGN KEY (Id_Tipo_Recurso) REFERENCES tb_Tipo_Recurso (Id_Tipo_Recurso),
CONSTRAINT fk_Recurso_Padre FOREIGN KEY (Recurso_Padre) REFERENCES tb_Recurso (Id_Recurso)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
