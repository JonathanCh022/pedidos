-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2016 a las 23:27:53
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `basepedidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_cedula` varchar(15) NOT NULL,
  `ven_codigo` varchar(5) NOT NULL,
  `cli_nombre` varchar(60) NOT NULL,
  `cli_negocio` varchar(60) NOT NULL,
  `cli_direccion` varchar(60) NOT NULL,
  `cli_email` varchar(60) NOT NULL,
  `cli_telefono` varchar(60) NOT NULL,
  `cli_latitud` float NOT NULL,
  `cli_longitud` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ven_codigo` (`ven_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `cli_cedula`, `ven_codigo`, `cli_nombre`, `cli_negocio`, `cli_direccion`, `cli_email`, `cli_telefono`, `cli_latitud`, `cli_longitud`) VALUES
(1, '1098744', '1', 'carlos vega', 'bodytech', 'calle 213', 'aasd@gmail.com', '6785494', 0, 0),
(2, '1098456', '1', 'cindy acosta', 'éxito', 'carrera 123', 'aldaff@gmail.com', '6785687', 0, 0),
(3, '1097586', '1', 'camilo soto', 'jumbo', 'diagonal 123', 'adsfdfo@gmail.com', '6764564', 0, 0),
(4, '1098632', '2', 'tony duran', 'cadena1', 'transversal 123', 'asaso@gmail.com', '6458564', 0, 0),
(5, '1098642', '2', 'diana arevalo', 'ecopetrol', 'calle 563', 'sdfdsf@mml.com', '6896552', 0, 0),
(6, '1098562', '3', 'carolina diaz', 'cardio1', 'carrera 568', 'asdd@asd.com', '6789541', 0, 0),
(7, '1098741', '4', 'marcela rojas', 'tienda34', 'calle 896', 'rewr@htomsl.com', '6895412', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_nit` varchar(15) NOT NULL,
  `emp_raz_soc` varchar(120) NOT NULL,
  `emp_email` varchar(60) NOT NULL,
  `emp_telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `emp_nit`, `emp_raz_soc`, `emp_email`, `emp_telefono`) VALUES
(1, '102458', 'Buscamos enriquecernos de forma rapida y segura.', 'solucionesjch@gmail.com', '6785941');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_referencia` varchar(20) NOT NULL,
  `inv_descripcion` varchar(100) NOT NULL,
  `inv_porc_iva` int(2) NOT NULL,
  `inv_precio_vta` float NOT NULL,
  `inv_existencias` float NOT NULL,
  `inv_pedidas` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `inv_referencia`, `inv_descripcion`, `inv_porc_iva`, `inv_precio_vta`, `inv_existencias`, `inv_pedidas`) VALUES
(1, 'rt7854', 'colcafe ', 2, 7000, 300, 0),
(2, 'rt8965', 'cerveza aguila', 2, 9000, 1000, 0),
(3, 'rt3624', 'galletas ducales', 4, 10000, 5000, 0),
(4, 'rt8745', 'mayonesa fruco', 5, 25000, 10000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_articulos`
--

CREATE TABLE IF NOT EXISTS `pedido_articulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pda_numero` int(10) NOT NULL,
  `pda_referencia` varchar(20) NOT NULL,
  `pda_descuento` float NOT NULL,
  `pda_cantidad_ped` float NOT NULL,
  `pda_cantidad_apro` float NOT NULL,
  `pda_cantidad_factu` float NOT NULL,
  `pda_estado` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pda_numero` (`pda_numero`),
  KEY `pda_referencia` (`pda_referencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `pedido_articulos`
--

INSERT INTO `pedido_articulos` (`id`, `pda_numero`, `pda_referencia`, `pda_descuento`, `pda_cantidad_ped`, `pda_cantidad_apro`, `pda_cantidad_factu`, `pda_estado`) VALUES
(1, 1, 'huevos', 2, 10, 8, 10, '0'),
(2, 1, 'leche', 1, 10, 5, 10, '1'),
(3, 2, 'huevos', 0, 5, 5, 5, '1'),
(4, 3, 'leche', 2, 15, 15, 15, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_general`
--

CREATE TABLE IF NOT EXISTS `pedido_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdg_numero` int(10) NOT NULL,
  `pdg_fecha` date NOT NULL,
  `pdg_cliente` varchar(15) NOT NULL,
  `pdg_estado` varchar(2) NOT NULL,
  `pdg_vendedor` varchar(5) NOT NULL,
  `pdg_hora` time NOT NULL,
  `pdg_latitud` float NOT NULL,
  `pdg_longitud` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pdg_vendedor` (`pdg_vendedor`),
  KEY `pdg_cliente` (`pdg_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pedido_general`
--

INSERT INTO `pedido_general` (`id`, `pdg_numero`, `pdg_fecha`, `pdg_cliente`, `pdg_estado`, `pdg_vendedor`, `pdg_hora`, `pdg_latitud`, `pdg_longitud`) VALUES
(1, 1, '2016-07-04', '1', '3', '1', '03:00:00', 2, 2),
(2, 2, '2016-07-05', '2', '1', '1', '00:19:00', 2, 2),
(3, 3, '2016-07-11', '3', '1', '2', '05:00:00', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutero`
--

CREATE TABLE IF NOT EXISTS `rutero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut_vendedor` varchar(5) NOT NULL,
  `rut_dia` varchar(2) NOT NULL,
  `rut_cliente` varchar(15) NOT NULL,
  `rut_orden` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `rutero`
--

INSERT INTO `rutero` (`id`, `rut_vendedor`, `rut_dia`, `rut_cliente`, `rut_orden`) VALUES
(1, '1', '8', '1098744', '1'),
(2, '1', '9', '1097586', '2'),
(3, '1', '12', '1098456', '3'),
(4, '2', '15', '1098632', '4'),
(5, '2', '14', '1098642', '5'),
(6, '3', '21', '1098562', '6'),
(7, '4', '29', '1098741', '7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nit` varchar(15) NOT NULL,
  `usu_nombre` varchar(60) NOT NULL,
  `usu_clave` varchar(15) NOT NULL,
  `usu_rol` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usu_nit`, `usu_nombre`, `usu_clave`, `usu_rol`) VALUES
(1, '1001', 'javier', '1345', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE IF NOT EXISTS `vendedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ven_codigo` varchar(5) NOT NULL,
  `ven_nombre` varchar(40) NOT NULL,
  `ven_email` varchar(40) NOT NULL,
  `ven_telefono` varchar(15) NOT NULL,
  `usu_nit` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usu_nit` (`usu_nit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`id`, `ven_codigo`, `ven_nombre`, `ven_email`, `ven_telefono`, `usu_nit`) VALUES
(1, '1', 'alejandro sanchez', 'alojoasd@gmail.com', '6785494', '0'),
(2, '2', 'javier sanchez', 'alojasdo@gmail.com', '6785687', '0'),
(3, '3', 'alejandro castro', 'alojo@gmail.com', '6764564', '1001'),
(4, '4', 'carolina suarez', 'aasdlojo@gmail.com', '6458564', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
