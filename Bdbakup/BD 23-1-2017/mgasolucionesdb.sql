-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2017 a las 16:02:37
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mgasolucionesdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbadministrador`
--

CREATE TABLE IF NOT EXISTS `tbadministrador` (
  `idAdministrador` int(11) NOT NULL,
  `NombreAdmin` varchar(30) NOT NULL,
  `ApellidoPAdmin` varchar(30) NOT NULL,
  `ApellidoSAdmin` varchar(30) NOT NULL,
  `EmailAdmin` varchar(100) NOT NULL,
  `UsuarioAdmin` varchar(39) NOT NULL,
  `ContrasenaAdmin` varchar(30) NOT NULL,
  `idTienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbbusqueda`
--

CREATE TABLE IF NOT EXISTS `tbbusqueda` (
  `idBusqueda` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbbusqueda`
--

INSERT INTO `tbbusqueda` (`idBusqueda`, `idProducto`, `idCliente`) VALUES
(1, 3, 1),
(2, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcanton`
--

CREATE TABLE IF NOT EXISTS `tbcanton` (
  `idCanton` int(11) NOT NULL,
  `NombreCanton` varchar(50) NOT NULL,
  `idProvincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcliente`
--

CREATE TABLE IF NOT EXISTS `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `NombreCliente` varchar(30) NOT NULL,
  `ApellidoPCliente` varchar(30) NOT NULL,
  `ApellidoSCliente` varchar(30) NOT NULL,
  `EmailCliente` varchar(40) NOT NULL,
  `UsuarioCliente` varchar(40) NOT NULL,
  `ContrasenaCliente` varchar(40) NOT NULL,
  `DireccionCliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `NombreCliente`, `ApellidoPCliente`, `ApellidoSCliente`, `EmailCliente`, `UsuarioCliente`, `ContrasenaCliente`, `DireccionCliente`) VALUES
(1, 'Gustavo', 'Najera', 'Najera', 'tavo.nn.20@hotmail.es', 'tavin', '1234', 'Alto de Varas'),
(2, 'Andres', 'Najera', 'Pereira', 'tavinchi.com@gmail.com', 'AndresUser', '12345', 'Cartago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcomentario`
--

CREATE TABLE IF NOT EXISTS `tbcomentario` (
`id` int(11) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `tipoProducto` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `tbcomentario`
--

INSERT INTO `tbcomentario` (`id`, `comentario`, `tipoProducto`) VALUES
(13, 'muro genreal ', 'general'),
(14, 'muro compu', 'computadora'),
(15, 'muro compu', 'computadora'),
(16, 'muro celulares', 'celular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcompras`
--

CREATE TABLE IF NOT EXISTS `tbcompras` (
  `idCompra` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `FechaCompra` date NOT NULL,
  `DescripcionCompra` varchar(200) NOT NULL,
  `Productos` varchar(100) NOT NULL,
  `TotalCompra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcuenta`
--

CREATE TABLE IF NOT EXISTS `tbcuenta` (
  `idCuenta` int(11) NOT NULL,
  `TipoCuenta` varchar(40) NOT NULL,
  `NumeroTarjeta` varchar(20) NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `CSC` varchar(5) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcuenta`
--

INSERT INTO `tbcuenta` (`idCuenta`, `TipoCuenta`, `NumeroTarjeta`, `FechaVencimiento`, `CSC`, `idCliente`) VALUES
(1, 'tipocuenta', '234', '2017-01-01', 'csc', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdistrito`
--

CREATE TABLE IF NOT EXISTS `tbdistrito` (
  `idDistrito` int(11) NOT NULL,
  `NombreDistrito` int(11) NOT NULL,
  `idCanton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbimagenproducto`
--

CREATE TABLE IF NOT EXISTS `tbimagenproducto` (
`idImagen` int(11) NOT NULL,
  `RutaImagen` varchar(100) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tbimagenproducto`
--

INSERT INTO `tbimagenproducto` (`idImagen`, `RutaImagen`, `idProducto`) VALUES
(1, '../images/1.jpg', 1),
(2, '../images/59.jpg', 1),
(3, '../images/300_wallpaper.jpg', 1),
(4, '../images/3543818.jpg', 1),
(5, '../images/arbustos.jpg', 1),
(6, '../images/Birdman.jpg', 1),
(7, '../images/faunaF.jpg', 5),
(8, '../images/flor12.jpg', 5),
(9, '../images/jirafa-en-la-sabana.jpg', 5),
(10, '../images/ItFollows.jpg', 5),
(11, '../images/imagen.JPG', 5),
(12, '../images/300_wallpaper.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tboferta`
--

CREATE TABLE IF NOT EXISTS `tboferta` (
  `idOferta` int(11) NOT NULL,
  `descripcionOferta` varchar(100) NOT NULL,
  `PorcentajeDescuento` int(11) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFinal` date NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproducto`
--

CREATE TABLE IF NOT EXISTS `tbproducto` (
  `idProducto` int(11) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Precio` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `idTienda` int(11) NOT NULL DEFAULT '1',
  `idTipoProducto` int(11) DEFAULT NULL,
  `color` varchar(20) NOT NULL,
  `nombreProducto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproducto`
--

INSERT INTO `tbproducto` (`idProducto`, `Marca`, `Modelo`, `Precio`, `descripcion`, `idTienda`, `idTipoProducto`, `color`, `nombreProducto`) VALUES
(1, 'Huawei', 'P8', 11111, 'Descripcion1', 1, 1, 'Negro', 'Celular Nuevo'),
(2, 'Samsung', 'S7', 1280000, 'Descripcion5', 1, 1, 'Gris', 'Celular Nuevo'),
(3, 'Iphone', '6s', 3000000, 'Descripcion3', 1, 1, 'Dorado', 'Celular Nuevo'),
(4, 'LG', 'LG1', 30000, 'Descripcion4', 1, 1, 'verde', 'Celular Nuevo'),
(5, 'Huawei', 'P9', 345552, 'Descripcion2', 1, 1, 'Negro', 'Celular Nuevo'),
(10, 'Toshiba', 'satellite', 1234, 'wertyuiop', 1, 2, 'gris', 'Computadora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproveedor`
--

CREATE TABLE IF NOT EXISTS `tbproveedor` (
  `idProveedor` int(11) NOT NULL,
  `NombreProveedor` varchar(40) NOT NULL,
  `EmailProveedor` varchar(100) NOT NULL,
  `TelefonoProveedor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproveedortipoproducto`
--

CREATE TABLE IF NOT EXISTS `tbproveedortipoproducto` (
  `idTipoProducto` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproveedorxproducto`
--

CREATE TABLE IF NOT EXISTS `tbproveedorxproducto` (
  `idProveedor` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbprovincia`
--

CREATE TABLE IF NOT EXISTS `tbprovincia` (
  `idProvincia` int(11) NOT NULL,
  `NombreProvincia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpueblo`
--

CREATE TABLE IF NOT EXISTS `tbpueblo` (
  `idPueblo` int(11) NOT NULL,
  `NombrePueblo` varchar(50) NOT NULL,
  `idDistrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtienda`
--

CREATE TABLE IF NOT EXISTS `tbtienda` (
  `idTienda` int(11) NOT NULL,
  `NombreTienda` varchar(40) NOT NULL,
  `TelefonoTienda` varchar(30) NOT NULL,
  `EmailTienda` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtienda`
--

INSERT INTO `tbtienda` (`idTienda`, `NombreTienda`, `TelefonoTienda`, `EmailTienda`) VALUES
(1, 'MGASoluciones', '25342314', 'mgs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipoproducto`
--

CREATE TABLE IF NOT EXISTS `tbtipoproducto` (
  `idTipoProducto` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipoproducto`
--

INSERT INTO `tbtipoproducto` (`idTipoProducto`, `Nombre`) VALUES
(1, 'Celulares'),
(2, 'Computadoras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbventas`
--

CREATE TABLE IF NOT EXISTS `tbventas` (
  `idVenta` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `productosVenta` varchar(200) NOT NULL,
  `FechaVenta` date NOT NULL,
  `totalVenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbadministrador`
--
ALTER TABLE `tbadministrador`
 ADD PRIMARY KEY (`idAdministrador`), ADD UNIQUE KEY `idAdministrador` (`idAdministrador`), ADD KEY `idTienda` (`idTienda`);

--
-- Indices de la tabla `tbbusqueda`
--
ALTER TABLE `tbbusqueda`
 ADD PRIMARY KEY (`idBusqueda`), ADD KEY `foraneaBusquedaProducto` (`idProducto`), ADD KEY `foraneaBusquedaCliente` (`idCliente`);

--
-- Indices de la tabla `tbcanton`
--
ALTER TABLE `tbcanton`
 ADD PRIMARY KEY (`idCanton`), ADD KEY `idProvincia` (`idProvincia`);

--
-- Indices de la tabla `tbcliente`
--
ALTER TABLE `tbcliente`
 ADD PRIMARY KEY (`idCliente`), ADD UNIQUE KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `tbcomentario`
--
ALTER TABLE `tbcomentario`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbcompras`
--
ALTER TABLE `tbcompras`
 ADD PRIMARY KEY (`idCompra`);

--
-- Indices de la tabla `tbcuenta`
--
ALTER TABLE `tbcuenta`
 ADD PRIMARY KEY (`idCuenta`), ADD UNIQUE KEY `idCuenta` (`idCuenta`), ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `tbdistrito`
--
ALTER TABLE `tbdistrito`
 ADD PRIMARY KEY (`idDistrito`), ADD KEY `idCanton` (`idCanton`);

--
-- Indices de la tabla `tbimagenproducto`
--
ALTER TABLE `tbimagenproducto`
 ADD PRIMARY KEY (`idImagen`), ADD UNIQUE KEY `idImagen` (`idImagen`), ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `tboferta`
--
ALTER TABLE `tboferta`
 ADD PRIMARY KEY (`idOferta`), ADD UNIQUE KEY `idOferta` (`idOferta`), ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
 ADD PRIMARY KEY (`idProducto`), ADD KEY `idTienda` (`idTienda`), ADD KEY `tbproducto_ibfk_2` (`idTipoProducto`);

--
-- Indices de la tabla `tbproveedor`
--
ALTER TABLE `tbproveedor`
 ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `tbproveedortipoproducto`
--
ALTER TABLE `tbproveedortipoproducto`
 ADD PRIMARY KEY (`idTipoProducto`,`idProveedor`);

--
-- Indices de la tabla `tbproveedorxproducto`
--
ALTER TABLE `tbproveedorxproducto`
 ADD PRIMARY KEY (`idProveedor`,`idProducto`), ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `tbprovincia`
--
ALTER TABLE `tbprovincia`
 ADD PRIMARY KEY (`idProvincia`), ADD UNIQUE KEY `idProvincia` (`idProvincia`);

--
-- Indices de la tabla `tbpueblo`
--
ALTER TABLE `tbpueblo`
 ADD PRIMARY KEY (`idPueblo`), ADD UNIQUE KEY `idPueblo` (`idPueblo`), ADD KEY `idDistrito` (`idDistrito`);

--
-- Indices de la tabla `tbtienda`
--
ALTER TABLE `tbtienda`
 ADD PRIMARY KEY (`idTienda`), ADD UNIQUE KEY `idTienda` (`idTienda`);

--
-- Indices de la tabla `tbtipoproducto`
--
ALTER TABLE `tbtipoproducto`
 ADD PRIMARY KEY (`idTipoProducto`);

--
-- Indices de la tabla `tbventas`
--
ALTER TABLE `tbventas`
 ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbcomentario`
--
ALTER TABLE `tbcomentario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tbimagenproducto`
--
ALTER TABLE `tbimagenproducto`
MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbadministrador`
--
ALTER TABLE `tbadministrador`
ADD CONSTRAINT `tbadministrador_ibfk_1` FOREIGN KEY (`idTienda`) REFERENCES `tbtienda` (`idTienda`);

--
-- Filtros para la tabla `tbbusqueda`
--
ALTER TABLE `tbbusqueda`
ADD CONSTRAINT `foraneaBusquedaCliente` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `foraneaBusquedaProducto` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbcanton`
--
ALTER TABLE `tbcanton`
ADD CONSTRAINT `tbcanton_ibfk_1` FOREIGN KEY (`idProvincia`) REFERENCES `tbprovincia` (`idProvincia`);

--
-- Filtros para la tabla `tbcuenta`
--
ALTER TABLE `tbcuenta`
ADD CONSTRAINT `tbcuenta_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`);

--
-- Filtros para la tabla `tbdistrito`
--
ALTER TABLE `tbdistrito`
ADD CONSTRAINT `tbdistrito_ibfk_1` FOREIGN KEY (`idCanton`) REFERENCES `tbcanton` (`idCanton`);

--
-- Filtros para la tabla `tbimagenproducto`
--
ALTER TABLE `tbimagenproducto`
ADD CONSTRAINT `tbimagenproducto_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`);

--
-- Filtros para la tabla `tboferta`
--
ALTER TABLE `tboferta`
ADD CONSTRAINT `tboferta_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`);

--
-- Filtros para la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
ADD CONSTRAINT `tbproducto_ibfk_1` FOREIGN KEY (`idTienda`) REFERENCES `tbtienda` (`idTienda`),
ADD CONSTRAINT `tbproducto_ibfk_2` FOREIGN KEY (`idTipoProducto`) REFERENCES `tbtipoproducto` (`idTipoProducto`);

--
-- Filtros para la tabla `tbproveedorxproducto`
--
ALTER TABLE `tbproveedorxproducto`
ADD CONSTRAINT `tbproveedorxproducto_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`);

--
-- Filtros para la tabla `tbpueblo`
--
ALTER TABLE `tbpueblo`
ADD CONSTRAINT `tbpueblo_ibfk_1` FOREIGN KEY (`idDistrito`) REFERENCES `tbdistrito` (`idDistrito`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
