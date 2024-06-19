-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2024 a las 12:27:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_gestion_hotelero`
--
CREATE DATABASE IF NOT EXISTS `sistema_gestion_hotelero` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sistema_gestion_hotelero`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nro_dni` int(11) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `esBaja` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nro_dni`, `apellido`, `nombre`, `fecha_nacimiento`, `telefono`, `esBaja`) VALUES
(1, 111111111, 'Juarez', 'Maria', '1990-06-26', '123456789', 0),
(2, 12345679, 'Grillo', 'Pepe', '1995-05-15', '2147483647', 0),
(3, 12312312, 'Fernandez', 'Pablo', '1996-12-16', '3794568212', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_conceptos`
--

CREATE TABLE `detalle_conceptos` (
  `id_detalleConceptos` int(11) NOT NULL,
  `monto_aplicado` float(10,2) NOT NULL,
  `fecha_aplicacion` date NOT NULL,
  `id_pago` int(11) NOT NULL,
  `id_ofertaRecargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_servicios`
--

CREATE TABLE `detalle_servicios` (
  `id_detalleServicios` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_final` float(10,2) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `id_registro` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre`) VALUES
(1, 'Libre'),
(2, 'Ocupado'),
(3, 'Deshabilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id_habitacion` int(11) NOT NULL,
  `nro_habitacion` int(11) NOT NULL,
  `cantidad_camas` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `id_estado` int(11) NOT NULL DEFAULT 1,
  `id_tipoHab` int(11) NOT NULL,
  `id_piso` int(11) NOT NULL,
  `id_tipoCama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id_habitacion`, `nro_habitacion`, `cantidad_camas`, `precio`, `id_estado`, `id_tipoHab`, `id_piso`, `id_tipoCama`) VALUES
(7, 1, 1, 3500.00, 2, 1, 1, 2),
(8, 2, 2, 4500.00, 2, 1, 1, 1),
(9, 3, 1, 5500.00, 1, 2, 1, 3),
(10, 4, 2, 3500.00, 3, 1, 1, 1),
(11, 1, 1, 2500.00, 2, 1, 2, 1),
(12, 2, 2, 3500.00, 2, 1, 2, 1),
(13, 3, 1, 5500.00, 2, 2, 2, 3),
(14, 4, 1, 7500.00, 3, 3, 2, 4),
(15, 5, 1, 7500.00, 3, 3, 1, 4),
(16, 6, 1, 5500.00, 3, 2, 1, 3),
(17, 5, 2, 14500.00, 3, 4, 2, 5),
(18, 1, 2, 3500.00, 1, 1, 3, 1),
(19, 2, 1, 5500.00, 1, 2, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios_de_pago`
--

CREATE TABLE `medios_de_pago` (
  `id_medioPago` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `esBaja` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medios_de_pago`
--

INSERT INTO `medios_de_pago` (`id_medioPago`, `tipo`, `esBaja`) VALUES
(1, 'Efectivo', 0),
(2, 'Tarjeta de Crédito', 0),
(3, 'Tarjeta de Débito', 0),
(4, 'QR', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta_recargo`
--

CREATE TABLE `oferta_recargo` (
  `id_ofertaRecargo` int(11) NOT NULL,
  `nombre_ofertaRecargo` varchar(100) NOT NULL,
  `fechaDesde` date NOT NULL,
  `fechaHasta` date NOT NULL,
  `porcentaje` float(10,2) NOT NULL,
  `esOferta` int(11) NOT NULL,
  `esBaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `monto_subtotal` float(10,2) NOT NULL,
  `monto_total` float(10,2) NOT NULL,
  `fecha_pago` date NOT NULL,
  `esBaja` tinyint(4) NOT NULL DEFAULT 0,
  `id_registro` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_medioPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `monto_subtotal`, `monto_total`, `fecha_pago`, `esBaja`, `id_registro`, `id_usuario`, `id_medioPago`) VALUES
(1, 3500.00, 3500.00, '2024-06-18', 0, 2, 2, 1),
(2, 4500.00, 4500.00, '2024-06-18', 0, 3, 2, 2),
(3, 5500.00, 5500.00, '2024-06-19', 0, 4, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piso`
--

CREATE TABLE `piso` (
  `id_piso` int(11) NOT NULL,
  `nombre_piso` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `piso`
--

INSERT INTO `piso` (`id_piso`, `nombre_piso`) VALUES
(1, 'Primer Piso'),
(2, 'Segundo Piso'),
(3, 'Tercer Piso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `esReserva` tinyint(2) DEFAULT 0,
  `esBaja` tinyint(2) DEFAULT 0,
  `id_cliente` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id_registro`, `fecha_ingreso`, `fecha_salida`, `esReserva`, `esBaja`, `id_cliente`, `id_habitacion`, `id_usuario`) VALUES
(2, '2024-06-17 19:00:00', '2024-06-20 19:00:00', 0, 0, 2, 7, 2),
(3, '2024-06-17 19:00:00', '2024-06-19 19:00:00', 0, 0, 1, 8, 2),
(4, '2024-06-17 21:00:00', '2024-06-20 21:00:00', 0, 0, 2, 9, 2),
(5, '2024-06-18 17:00:00', '2024-06-20 17:00:00', 0, 0, 3, 11, 2),
(6, '2024-06-18 22:30:00', '2024-06-21 22:30:00', 0, 0, 1, 8, 2),
(7, '2024-06-18 22:00:00', '2024-06-19 22:00:00', 0, 0, 2, 12, 1),
(8, '2024-06-18 22:00:00', '2024-06-20 22:00:00', 0, 0, 1, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_adicionales`
--

CREATE TABLE `servicios_adicionales` (
  `id_servicio` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `esBaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cama`
--

CREATE TABLE `tipo_cama` (
  `id_tipoCama` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_cama`
--

INSERT INTO `tipo_cama` (`id_tipoCama`, `descripcion`, `precio`) VALUES
(1, '1 Plaza', 1000.00),
(2, '1 1/2 Plaza', 2000.00),
(3, '2 Plazas', 3000.00),
(4, 'King Size', 4000.00),
(5, 'Queen Size', 5000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habitacion`
--

CREATE TABLE `tipo_habitacion` (
  `id_tipoHab` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`id_tipoHab`, `nombre`, `precio`) VALUES
(1, 'Simple', 1500.00),
(2, 'Doble', 2500.00),
(3, 'Ejecutiva', 3500.00),
(4, 'Presidencial', 4500.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_perfil`
--

CREATE TABLE `tipo_perfil` (
  `id_perfil` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `esBaja` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_perfil`
--

INSERT INTO `tipo_perfil` (`id_perfil`, `nombre`, `esBaja`) VALUES
(1, 'Administrador', 0),
(2, 'Recepcionista', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `nro_documento` int(11) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `esBaja` tinyint(4) NOT NULL DEFAULT 0,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `fecha_nac`, `nro_documento`, `telefono`, `nombre_usuario`, `password`, `esBaja`, `id_perfil`) VALUES
(1, 'Fulanito', 'Muchogusto', '1990-11-12', 32132132, '3794841235', 'admin', '$2y$10$.oX9/1XiTRe67mBPYlBnxuIvnbvGTR9gMbGZCkgHfFWHE9JYH/q5y', 0, 1),
(2, 'Juan', 'Perez', '1990-05-25', 38569352, '3794856231', 'JuanPerez', '$2y$10$vR7W5SGkKUlGDpg7SY/glOPszKTLt/TMKzJKq7Jjd.jCZTf4RhW6u', 0, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle_conceptos`
--
ALTER TABLE `detalle_conceptos`
  ADD PRIMARY KEY (`id_detalleConceptos`),
  ADD KEY `FK_id_pagoDC` (`id_pago`),
  ADD KEY `FK_id_ofertaRecargoDC` (`id_ofertaRecargo`);

--
-- Indices de la tabla `detalle_servicios`
--
ALTER TABLE `detalle_servicios`
  ADD PRIMARY KEY (`id_detalleServicios`),
  ADD KEY `FK_id_registro_servicios` (`id_registro`),
  ADD KEY `FK_id_servicio_servicios` (`id_servicio`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id_habitacion`),
  ADD KEY `FK_id_estado` (`id_estado`),
  ADD KEY `FK_id_tipoHab` (`id_tipoHab`),
  ADD KEY `FK_id_piso` (`id_piso`),
  ADD KEY `FK_id_tipoCama` (`id_tipoCama`);

--
-- Indices de la tabla `medios_de_pago`
--
ALTER TABLE `medios_de_pago`
  ADD PRIMARY KEY (`id_medioPago`);

--
-- Indices de la tabla `oferta_recargo`
--
ALTER TABLE `oferta_recargo`
  ADD PRIMARY KEY (`id_ofertaRecargo`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `FK_id_registro_pago` (`id_registro`),
  ADD KEY `FK_id_usuario_pago` (`id_usuario`),
  ADD KEY `FK_id_medioPago_pago` (`id_medioPago`);

--
-- Indices de la tabla `piso`
--
ALTER TABLE `piso`
  ADD PRIMARY KEY (`id_piso`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `FK_id_cliente` (`id_cliente`),
  ADD KEY `FK_id_habitacion` (`id_habitacion`),
  ADD KEY `FK_id_usuario` (`id_usuario`);

--
-- Indices de la tabla `servicios_adicionales`
--
ALTER TABLE `servicios_adicionales`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `tipo_cama`
--
ALTER TABLE `tipo_cama`
  ADD PRIMARY KEY (`id_tipoCama`);

--
-- Indices de la tabla `tipo_habitacion`
--
ALTER TABLE `tipo_habitacion`
  ADD PRIMARY KEY (`id_tipoHab`);

--
-- Indices de la tabla `tipo_perfil`
--
ALTER TABLE `tipo_perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `FK_id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_conceptos`
--
ALTER TABLE `detalle_conceptos`
  MODIFY `id_detalleConceptos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_servicios`
--
ALTER TABLE `detalle_servicios`
  MODIFY `id_detalleServicios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `id_habitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `medios_de_pago`
--
ALTER TABLE `medios_de_pago`
  MODIFY `id_medioPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `oferta_recargo`
--
ALTER TABLE `oferta_recargo`
  MODIFY `id_ofertaRecargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `piso`
--
ALTER TABLE `piso`
  MODIFY `id_piso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `servicios_adicionales`
--
ALTER TABLE `servicios_adicionales`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_cama`
--
ALTER TABLE `tipo_cama`
  MODIFY `id_tipoCama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_habitacion`
--
ALTER TABLE `tipo_habitacion`
  MODIFY `id_tipoHab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_perfil`
--
ALTER TABLE `tipo_perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_conceptos`
--
ALTER TABLE `detalle_conceptos`
  ADD CONSTRAINT `FK_id_ofertaRecargoDC` FOREIGN KEY (`id_ofertaRecargo`) REFERENCES `oferta_recargo` (`id_ofertaRecargo`),
  ADD CONSTRAINT `FK_id_pagoDC` FOREIGN KEY (`id_pago`) REFERENCES `pago` (`id_pago`);

--
-- Filtros para la tabla `detalle_servicios`
--
ALTER TABLE `detalle_servicios`
  ADD CONSTRAINT `FK_id_registro_servicios` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id_registro`),
  ADD CONSTRAINT `FK_id_servicio_servicios` FOREIGN KEY (`id_servicio`) REFERENCES `servicios_adicionales` (`id_servicio`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `FK_id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `FK_id_piso` FOREIGN KEY (`id_piso`) REFERENCES `piso` (`id_piso`),
  ADD CONSTRAINT `FK_id_tipoCama` FOREIGN KEY (`id_tipoCama`) REFERENCES `tipo_cama` (`id_tipoCama`),
  ADD CONSTRAINT `FK_id_tipoHab` FOREIGN KEY (`id_tipoHab`) REFERENCES `tipo_habitacion` (`id_tipoHab`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `FK_id_medioPago_pago` FOREIGN KEY (`id_medioPago`) REFERENCES `medios_de_pago` (`id_medioPago`),
  ADD CONSTRAINT `FK_id_registro_pago` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id_registro`),
  ADD CONSTRAINT `FK_id_usuario_pago` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `FK_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `FK_id_habitacion` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id_habitacion`),
  ADD CONSTRAINT `FK_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_id_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `tipo_perfil` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
