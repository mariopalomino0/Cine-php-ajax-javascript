-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2013 a las 02:28:55
-- Versión del servidor: 5.5.23
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `a9704078_cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE IF NOT EXISTS `peliculas` (
  `idpeliculas` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text COLLATE latin1_general_ci,
  `foto` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `link` text COLLATE latin1_general_ci NOT NULL,
  `descripcion` text COLLATE latin1_general_ci,
  PRIMARY KEY (`idpeliculas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`idpeliculas`, `titulo`, `foto`, `link`, `descripcion`) VALUES
(19, 'G.I. Joe: La venganza', 'MV5BNzk5ODM0OTQ0N15BMl5BanBnXkFtZTcwODg2ODE4OA@@._V1_SX214_.jpg', 'http://www.imdb.com/title/tt1583421/', 'En “G.I. Joe: La venganza”, los G.I. Joe no sólo tendrán que luchar contra su enemigo mortal, la organización criminal COBRA, sino que además se verán obligados a lidiar con las amenazas y traiciones dentro de su propio gobierno que ponen en peligro su propia existencia.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poblacion`
--

CREATE TABLE IF NOT EXISTS `poblacion` (
  `idpoblacion` int(11) NOT NULL AUTO_INCREMENT,
  `nompoblacion` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`idpoblacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `poblacion`
--

INSERT INTO `poblacion` (`idpoblacion`, `nompoblacion`) VALUES
(1, 'barcelona'),
(2, 'zaragoza'),
(3, 'albacete'),
(4, 'almeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `idreservas` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `butaca` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `hora` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `idpeliculas` int(11) NOT NULL,
  PRIMARY KEY (`idreservas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=138 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE IF NOT EXISTS `sesiones` (
  `idsesiones` int(11) NOT NULL AUTO_INCREMENT,
  `diainicio` date NOT NULL DEFAULT '0000-00-00',
  `diafin` date NOT NULL DEFAULT '0000-00-00',
  `hora` time NOT NULL DEFAULT '00:00:00',
  `idpeliculas` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsesiones`,`diainicio`,`diafin`,`hora`),
  UNIQUE KEY `idsesiones` (`idsesiones`),
  KEY `fk_sesiones_peliculas` (`idpeliculas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1100 ;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`idsesiones`, `diainicio`, `diafin`, `hora`, `idpeliculas`) VALUES
(1099, '2013-04-21', '2013-04-21', '18:00:00', 24),
(1098, '2013-04-21', '2013-04-21', '16:00:00', 24),
(1097, '2013-04-19', '2013-04-19', '18:00:00', 24),
(1096, '2013-04-19', '2013-04-19', '16:00:00', 24),
(1095, '2013-04-18', '2013-04-18', '18:00:00', 24),
(1094, '2013-04-17', '2013-04-17', '18:00:00', 24),
(1093, '2013-04-18', '2013-04-18', '16:00:00', 24),
(1092, '2013-04-17', '2013-04-17', '16:00:00', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `apellido` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `genero` char(1) COLLATE latin1_general_ci DEFAULT NULL,
  `login` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `poblacion` int(11) DEFAULT NULL,
  `useradmin` int(11) DEFAULT '0',
  PRIMARY KEY (`idusuario`),
  KEY `poblacion` (`poblacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `anio`, `genero`, `login`, `password`, `poblacion`, `useradmin`) VALUES
(55, 'mario', 'palomino', 1987, 'H', 'martinpc20', '0659c7992e268962384eb17fafe88364', 1, 1),
(56, 'mario', 'palomino', 1994, 'H', 'martinpc', '0659c7992e268962384eb17fafe88364', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
