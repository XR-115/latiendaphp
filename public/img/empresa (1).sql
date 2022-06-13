-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2022 a las 04:33:03
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID_CAT` int(20) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID_CAT`, `Descripcion`) VALUES
(1, 'Mayor de Edad'),
(2, 'Tercera Edad'),
(3, 'Mayor de Edad'),
(4, 'MUJER'),
(5, 'Discapacitada'),
(6, 'Miujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_CLIENT` int(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_CLIENT`, `Nombre`, `Direccion`, `Telefono`) VALUES
(1, 'Felipe', 'Callel 20 No 23-24 B/ Santande', '2483476'),
(2, 'Felipe', 'Cra 13 No 45-98 B/ Floresta', '3110783949'),
(3, 'Felipe', 'Cra 76 No 27-89- B/ Floresta', '3103547843'),
(4, 'Felipe', 'Calle 24 No 98-27 B/ Normal', '3128475757'),
(5, 'Felipe', 'Cra 34 No 12-23 B/  Bosque', '3127845672'),
(6, 'Felipe', 'Cra 45 No 56-23 B/  Bosque', '3002345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `ID_FACT` int(20) NOT NULL,
  `Fecha` date NOT NULL,
  `ID_CLIENT` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`ID_FACT`, `Fecha`, `ID_CLIENT`) VALUES
(1234, '2021-05-18', 2),
(4326, '2022-02-14', 3),
(5364, '2022-02-21', 1),
(5678, '2022-01-21', 3),
(9875, '2022-03-07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_PROD` int(20) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Precio` int(20) NOT NULL,
  `ID_CAT` int(20) NOT NULL,
  `Id_Proveedor` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_PROD`, `Descripcion`, `Precio`, `ID_CAT`, `Id_Proveedor`) VALUES
(1723, 'ASEO', 12000, 2, 123),
(12345, 'Perecedero', 100000, 1, 12334),
(12654, 'jugueteria', 5, 644, 845);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `ID_PROV` int(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Telefono` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ID_PROV`, `Nombre`, `Direccion`, `Telefono`) VALUES
(273, 'Sardina', 'Cra 20 No 12-89', 53536373),
(283, 'Carlos Fernando', 'Calle 24 No 89-57 B/ Tunjuelit', 2483476),
(54637, 'Espaguetis', 'Callel 20 No 23-24 B/ Santande', 318983744);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID_Venta` int(20) NOT NULL,
  `ID_FACT` int(20) NOT NULL,
  `ID_PROD` int(20) NOT NULL,
  `Cantidad` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID_Venta`, `ID_FACT`, `ID_PROD`, `Cantidad`) VALUES
(3393, 2374, 388383, 12),
(6364, 3831, 3844, 12),
(39344, 344, 8374, 23),
(74754, 234, 1368, 78);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_CAT`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_CLIENT`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`ID_FACT`),
  ADD KEY `ID_ClIENT` (`ID_CLIENT`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_PROD`),
  ADD KEY `Id_Categoria` (`ID_CAT`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ID_PROV`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID_Venta`),
  ADD KEY `Id_Producto` (`ID_PROD`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID_CLIENT` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `ID_FACT` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9876;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_PROD` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12655;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ID_PROV` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54638;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID_Venta` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74755;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
