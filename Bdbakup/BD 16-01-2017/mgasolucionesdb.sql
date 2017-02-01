-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-01-2017 a las 23:12:32
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mgasolucionesdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbadministrador`
--

CREATE TABLE `tbadministrador` (
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
-- Estructura de tabla para la tabla `tbcanton`
--

CREATE TABLE `tbcanton` (
  `idCanton` int(11) NOT NULL,
  `NombreCanton` varchar(50) NOT NULL,
  `idProvincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbclient`
--

CREATE TABLE `tbclient` (
  `idClient` int(11) NOT NULL,
  `nameClient` varchar(30) NOT NULL,
  `lastNameFClient` varchar(30) NOT NULL,
  `lastNameSClient` varchar(30) NOT NULL,
  `emailClient` varchar(40) NOT NULL,
  `userClient` varchar(40) NOT NULL,
  `passwordClient` varchar(40) NOT NULL,
  `addressClient` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `tbclient`
--

INSERT INTO `tbclient` (
`idClient`,
 `nameClient`, 
 `lastNameFClient`,
 `lastNameSClient`, 
 `emailClient`,
 `userClient`,
 `passwordClient`, 
 `addressClient`) 
 VALUES ('1', 'Alberth', 'Calderon', 'Alvarado', 
 'alberth5@hotmail.com', 'alberth5', '12345',7
 'Cartago,Turrialba,Turrialba,Turrialba'), 
 ('2', 'Gabriel', 'Gutierrez', 'Brenes', 
 'gabgb@hotmail.com', 'gabgb', '456', 
 'Cartago,Turrrialba,Turrrialba,Turrrialba');


--
-- Estructura de tabla para la tabla `tbcuenta`
--

CREATE TABLE `tbcuenta` (
  `idCuenta` int(11) NOT NULL,
  `TipoCuenta` varchar(40) NOT NULL,
  `NumeroTarjeta` varchar(20) NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `CSC` varchar(5) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdistrito`
--

CREATE TABLE `tbdistrito` (
  `idDistrito` int(11) NOT NULL,
  `NombreDistrito` int(11) NOT NULL,
  `idCanton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbimagenproducto`
--

CREATE TABLE `tbimagenproducto` (
  `idImagen` int(11) NOT NULL,
  `RutaImagen` int(11) NOT NULL,
  `DescripcionImagen` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tboferta`
--

CREATE TABLE `tboferta` (
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

CREATE TABLE `tbproducto` (
  `idProducto` int(11) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Precio` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `idTienda` int(11) NOT NULL DEFAULT '1',
  `idTipoProducto` int(11) DEFAULT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproducto`
--

INSERT INTO `tbproducto` (`idProducto`, `Marca`, `Modelo`, `Precio`, `descripcion`, `idTienda`, `idTipoProducto`, `color`) VALUES
(1, 'Huawei', 'P8', 129000, 'Descripcion1', 1, 1, 'Negro'),
(2, 'Samsung', 'S7', 1280000, 'Descripcion5', 1, 1, 'Gris'),
(3, 'Iphone', '6s', 3000000, 'Descripcion3', 1, 1, 'Dorado'),
(4, 'LG', 'LG1', 30000, 'Descripcion4', 1, 1, 'verde'),
(5, 'Huawei', 'P9', 345552, 'Descripcion2', 1, 1, 'Negro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproveedor`
--

CREATE TABLE `tbproveedor` (
  `idProveedor` int(11) NOT NULL,
  `NombreProveedor` varchar(40) NOT NULL,
  `EmailProveedor` varchar(100) NOT NULL,
  `TelefonoProveedor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproveedorxproducto`
--

CREATE TABLE `tbproveedorxproducto` (
  `idProveedor` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbprovincia`
--

CREATE TABLE `tbprovincia` (
  `idProvincia` int(11) NOT NULL,
  `NombreProvincia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpueblo`
--

CREATE TABLE `tbpueblo` (
  `idPueblo` int(11) NOT NULL,
  `NombrePueblo` varchar(50) NOT NULL,
  `idDistrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtienda`
--

CREATE TABLE `tbtienda` (
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
-- Estructura de tabla para la tabla `tbtypeproduct`
--

CREATE TABLE `tbtypeproduct` (
  `idTypeProduct` int(11) NOT NULL,
  `nameTypeProduct` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtypeproduct`
--

INSERT INTO `tbtypeproduct` (`idTypeProduct`, `nameTypeProduct`) VALUES
(1, 'Celulares'),
(2, 'Computadoras')
(3, 'Pantallas'),
(4, 'Consola Juegos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbadministrador`
--
ALTER TABLE `tbadministrador`
  ADD PRIMARY KEY (`idAdministrador`),
  ADD UNIQUE KEY `idAdministrador` (`idAdministrador`),
  ADD KEY `idTienda` (`idTienda`);

--
-- Indices de la tabla `tbcanton`
--
ALTER TABLE `tbcanton`
  ADD PRIMARY KEY (`idCanton`),
  ADD KEY `idProvincia` (`idProvincia`);


--
-- Indices de la tabla `tbclient`
--
ALTER TABLE `tbclient`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `idClient` (`idClient`);

--
-- Indices de la tabla `tbcuenta`
--
ALTER TABLE `tbcuenta`
  ADD PRIMARY KEY (`idCuenta`),
  ADD UNIQUE KEY `idCuenta` (`idCuenta`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `tbdistrito`
--
ALTER TABLE `tbdistrito`
  ADD PRIMARY KEY (`idDistrito`),
  ADD KEY `idCanton` (`idCanton`);

--
-- Indices de la tabla `tbimagenproducto`
--
ALTER TABLE `tbimagenproducto`
  ADD PRIMARY KEY (`idImagen`),
  ADD UNIQUE KEY `idImagen` (`idImagen`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `tboferta`
--
ALTER TABLE `tboferta`
  ADD PRIMARY KEY (`idOferta`),
  ADD UNIQUE KEY `idOferta` (`idOferta`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idTienda` (`idTienda`),
  ADD KEY `tbproducto_ibfk_2` (`idTipoProducto`);

--
-- Indices de la tabla `tbproveedor`
--
ALTER TABLE `tbproveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `tbproveedorxproducto`
--
ALTER TABLE `tbproveedorxproducto`
  ADD PRIMARY KEY (`idProveedor`,`idProducto`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `tbprovincia`
--
ALTER TABLE `tbprovincia`
  ADD PRIMARY KEY (`idProvincia`),
  ADD UNIQUE KEY `idProvincia` (`idProvincia`);

--
-- Indices de la tabla `tbpueblo`
--
ALTER TABLE `tbpueblo`
  ADD PRIMARY KEY (`idPueblo`),
  ADD UNIQUE KEY `idPueblo` (`idPueblo`),
  ADD KEY `idDistrito` (`idDistrito`);

--
-- Indices de la tabla `tbtienda`
--
ALTER TABLE `tbtienda`
  ADD PRIMARY KEY (`idTienda`),
  ADD UNIQUE KEY `idTienda` (`idTienda`);
  
--
-- Indices de la tabla `tbTypeProduct`
--
ALTER TABLE `tbtypeproduct`
  ADD PRIMARY KEY (`idTypeProduct`);


--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbadministrador`
--
ALTER TABLE `tbadministrador`
  ADD CONSTRAINT `tbadministrador_ibfk_1` FOREIGN KEY (`idTienda`) REFERENCES `tbtienda` (`idTienda`);

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
