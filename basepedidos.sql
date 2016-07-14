-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2016 a las 01:36:31
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basepedidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cli_cedula` varchar(15) NOT NULL,
  `ven_codigo` varchar(5) NOT NULL,
  `cli_nombre` varchar(60) NOT NULL,
  `cli_negocio` varchar(60) NOT NULL,
  `cli_direccion` varchar(60) NOT NULL,
  `cli_email` varchar(60) NOT NULL,
  `cli_telefono` varchar(60) NOT NULL,
  `cli_latitud` float NOT NULL,
  `cli_longitud` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cli_cedula`, `ven_codigo`, `cli_nombre`, `cli_negocio`, `cli_direccion`, `cli_email`, `cli_telefono`, `cli_latitud`, `cli_longitud`) VALUES
('1', '1', 'cliente1', 'asd', 'asd', 'asd', 'asd', 1, 1),
('2', '1', 'cliente2', 'awdsd', 'asdas', 'asd', 'asd', 2, 2),
('3', '2', 'cliente3', 'asd', 'asd', 'asd', 'asd', 3, 3),
('4', '1001', 'cliente4', 'asd', 'asd', 'ads', 'asd', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `emp_nit` varchar(15) NOT NULL,
  `emp_raz_soc` varchar(120) NOT NULL,
  `emp_email` varchar(60) NOT NULL,
  `emp_telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`emp_nit`, `emp_raz_soc`, `emp_email`, `emp_telefono`) VALUES
('102458', 'Buscamos enriquecernos de forma rapida y segura.', 'solucionesjch@gmail.com', '6785941');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `inv_referencia` varchar(20) NOT NULL,
  `inv_descripcion` varchar(100) NOT NULL,
  `inv_porc_iva` int(2) NOT NULL,
  `inv_precio_vta` float NOT NULL,
  `inv_existencias` float NOT NULL,
  `inv_pedidas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`inv_referencia`, `inv_descripcion`, `inv_porc_iva`, `inv_precio_vta`, `inv_existencias`, `inv_pedidas`) VALUES
('huevos', 'huevos', 10, 200, 100, 0),
('leche', 'leche', 0, 2000, 50, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_articulos`
--

CREATE TABLE `pedido_articulos` (
  `pda_numero` int(10) NOT NULL,
  `pda_referencia` varchar(20) NOT NULL,
  `pda_descuento` float NOT NULL,
  `pda_cantidad_ped` float NOT NULL,
  `pda_cantidad_apro` float NOT NULL,
  `pda_cantidad_factu` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido_articulos`
--

INSERT INTO `pedido_articulos` (`pda_numero`, `pda_referencia`, `pda_descuento`, `pda_cantidad_ped`, `pda_cantidad_apro`, `pda_cantidad_factu`) VALUES
(1, 'huevos', 5, 10, 10, 10),
(1, 'leche', 12, 10, 10, 10),
(2, 'huevos', 0, 5, 5, 5),
(3, 'leche', 2, 15, 15, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_general`
--

CREATE TABLE `pedido_general` (
  `pdg_numero` int(10) NOT NULL,
  `pdg_fecha` date NOT NULL,
  `pdg_cliente` varchar(15) NOT NULL,
  `pdg_estado` varchar(2) NOT NULL,
  `pdg_vendedor` varchar(5) NOT NULL,
  `pdg_hora` time NOT NULL,
  `pdg_latitud` float NOT NULL,
  `pdg_longitud` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido_general`
--

INSERT INTO `pedido_general` (`pdg_numero`, `pdg_fecha`, `pdg_cliente`, `pdg_estado`, `pdg_vendedor`, `pdg_hora`, `pdg_latitud`, `pdg_longitud`) VALUES
(1, '2016-07-04', '1', '1', '1', '03:00:00', 2, 2),
(2, '2016-07-05', '2', '1', '1', '00:19:00', 2, 2),
(3, '2016-07-11', '3', '1', '2', '05:00:00', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutero`
--

CREATE TABLE `rutero` (
  `rut_vendedor` varchar(5) NOT NULL,
  `rut_dia` varchar(2) NOT NULL,
  `rut_cliente` varchar(15) NOT NULL,
  `rut_orden` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_nit` varchar(15) NOT NULL,
  `usu_nombre` varchar(60) NOT NULL,
  `usu_clave` varchar(15) NOT NULL,
  `usu_rol` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_nit`, `usu_nombre`, `usu_clave`, `usu_rol`) VALUES
('1001', 'Javier Sanchez', '12345', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `ven_codigo` varchar(5) NOT NULL,
  `ven_nombre` varchar(40) NOT NULL,
  `ven_email` varchar(40) NOT NULL,
  `ven_telefono` varchar(15) NOT NULL,
  `usu_nit` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`ven_codigo`, `ven_nombre`, `ven_email`, `ven_telefono`, `usu_nit`) VALUES
('1', 'juan', 'asdsad', 'asasds', ''),
('1001', 'javier', 'asd', 'asd', '1001'),
('2', 'john', 'asdsad', 'asd', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_cedula`),
  ADD KEY `ven_codigo` (`ven_codigo`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`inv_referencia`);

--
-- Indices de la tabla `pedido_articulos`
--
ALTER TABLE `pedido_articulos`
  ADD KEY `pda_numero` (`pda_numero`),
  ADD KEY `pda_referencia` (`pda_referencia`);

--
-- Indices de la tabla `pedido_general`
--
ALTER TABLE `pedido_general`
  ADD PRIMARY KEY (`pdg_numero`),
  ADD KEY `pdg_vendedor` (`pdg_vendedor`),
  ADD KEY `pdg_cliente` (`pdg_cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_nit`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`ven_codigo`),
  ADD KEY `usu_nit` (`usu_nit`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`ven_codigo`) REFERENCES `vendedores` (`ven_codigo`);

--
-- Filtros para la tabla `pedido_articulos`
--
ALTER TABLE `pedido_articulos`
  ADD CONSTRAINT `pedido_articulos_ibfk_1` FOREIGN KEY (`pda_numero`) REFERENCES `pedido_general` (`pdg_numero`),
  ADD CONSTRAINT `pedido_articulos_ibfk_2` FOREIGN KEY (`pda_referencia`) REFERENCES `inventario` (`inv_referencia`);

--
-- Filtros para la tabla `pedido_general`
--
ALTER TABLE `pedido_general`
  ADD CONSTRAINT `pedido_general_ibfk_1` FOREIGN KEY (`pdg_cliente`) REFERENCES `clientes` (`cli_cedula`),
  ADD CONSTRAINT `pedido_general_ibfk_2` FOREIGN KEY (`pdg_vendedor`) REFERENCES `vendedores` (`ven_codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
