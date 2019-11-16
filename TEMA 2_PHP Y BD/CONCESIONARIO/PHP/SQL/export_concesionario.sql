-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-11-2019 a las 11:19:35
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concesionario`
--
CREATE DATABASE IF NOT EXISTS `concesionario` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `concesionario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `vendedor_id` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `gastado` float(50,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientes_ibfk_1` (`vendedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `vendedor_id`, `nombre`, `ciudad`, `gastado`) VALUES
(1, 3, 'Gema Rodríguez Pérez', 'Cádiz', 36000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coche`
--

DROP TABLE IF EXISTS `coche`;
CREATE TABLE IF NOT EXISTS `coche` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(20) NOT NULL,
  `stock` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `coche`
--

INSERT INTO `coche` (`id`, `modelo`, `marca`, `precio`, `stock`) VALUES
(10, 'Seat Ibiza', 'Seat', 15000, 5),
(14, 'Opel Corsa', 'Opel', 17000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargos`
--

DROP TABLE IF EXISTS `encargos`;
CREATE TABLE IF NOT EXISTS `encargos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(10) DEFAULT NULL,
  `coche_id` int(10) DEFAULT NULL,
  `cantidad` int(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `encargos_ibfk_1` (`cliente_id`),
  KEY `encargos_ibfk_2` (`coche_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `encargos`
--

INSERT INTO `encargos` (`id`, `cliente_id`, `coche_id`, `cantidad`, `fecha`) VALUES
(1, 1, 10, 2, '2019-11-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `nombre`, `ciudad`) VALUES
(1, 'Seat', 'Cádiz'),
(2, 'Mazda', 'Madrid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(2) DEFAULT NULL,
  `contrasena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dirección` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`correo`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellidos`, `correo`, `edad`, `contrasena`, `dirección`) VALUES
('Carmen', 'Morales', 'carmen@hotmail.com', 24, '$2y$04$Ej.vBLfuZ2wJfjwRW82cPehg0pjkNmlMW5KXhz3S1snM.3BgDqbVi', 'Calle Falsa 123'),
('Usuario', 'Usuario', 'usuario@usuario.com', 30, '$2y$04$5YuursUNmFrmloZcttoWvOHwAZlOr2q8AWZCrDEIChxMnveMs4QfS', 'Calle Falsa 123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE IF NOT EXISTS `vendedores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(10) NOT NULL,
  `jefe` int(10) DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `sueldo` float(20,2) DEFAULT NULL,
  `comision` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grupo_id` (`grupo_id`),
  KEY `jefe` (`jefe`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`id`, `grupo_id`, `jefe`, `nombre`, `apellidos`, `cargo`, `fecha`, `sueldo`, `comision`) VALUES
(1, 1, 1, 'Federico', 'González Sánchez', 'Jefe', NULL, 35000.00, 200.00),
(2, 2, 2, 'Andrea ', 'Sáinz Gómez', 'Jefa', '2019-11-11', 35600.00, 300.00),
(3, 1, NULL, 'Carlos', 'Pérez Pérez', 'Vendedor', '2019-11-11', 25000.00, 520.00);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`vendedor_id`) REFERENCES `vendedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `encargos`
--
ALTER TABLE `encargos`
  ADD CONSTRAINT `encargos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `encargos_ibfk_2` FOREIGN KEY (`coche_id`) REFERENCES `coche` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD CONSTRAINT `vendedores_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`),
  ADD CONSTRAINT `vendedores_ibfk_2` FOREIGN KEY (`jefe`) REFERENCES `vendedores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
