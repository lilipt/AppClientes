-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2014 a las 20:04:49
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `test`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `telefono` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `estado_id`, `nombre`, `apellidos`, `telefono`, `email`) VALUES
(1, 12, 'Cristian', 'Bernal Ramírez', '9841201755', 'crisbera@gmail.com'),
(2, 23, 'Kenia', 'Bernal Celis', '9841093938', 'kenia@bera.com.mx'),
(3, 0, 'Cintia Cristal', 'Celis', 'May', 'cristal.celis@hmail.com'),
(5, 0, 'Luis', 'Gonzalez Gomez', '9847582356', 'luis@hotmail.com'),
(6, 5, 'Alberto', 'Bernal Ramírez', '9841201754', 'albera@hotmail.com'),
(7, 0, 'Luis', 'Bernal', '9841027895', 'luis@hotmail.com'),
(9, 0, 'Pedro', 'Rendón', '9845124788', 'pedro@hotmail.com'),
(10, 5, 'Lucia', 'Bernal', '984157888', 'lucia@gmailc.com'),
(11, 0, 'Ingrid', 'Datica', '984587899', 'ingrid@akumal.com'),
(12, 0, 'Esteba', 'Salomon', '9841501755', 'esteban@hotmail.com'),
(13, 0, 'Cliente prueba', 'Prueba', '9845445', 'clien@hoamil.com'),
(14, 32, 'Luis', 'Miguel', '984 158 6899', 'luis@hotmail.com'),
(15, 12, 'Cristal', 'Celis May', '984 568 8999', 'cristal.celis@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Chiapas'),
(6, 'Chihuahua'),
(7, 'Coahuila'),
(8, 'Colima'),
(9, 'Distrito Federal'),
(10, 'Durango'),
(11, 'Guanajuato'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jalisco'),
(15, 'Mexico'),
(16, 'Michoacan'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo Leon'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Queretaro'),
(23, 'Quintana Roo'),
(24, 'San Luis Potosi'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz'),
(31, 'Yucatan'),
(32, 'Zacatecas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id`), ADD KEY `estado_id` (`estado_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
