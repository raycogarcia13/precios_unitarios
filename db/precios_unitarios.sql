-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-08-2018 a las 07:54:15
-- Versión del servidor: 10.1.29-MariaDB-6+b1
-- Versión de PHP: 7.2.4-1+b2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `precios_unitarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `actividad` varchar(255) NOT NULL,
  `id_unidm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `id_grupo`, `codigo`, `actividad`, `id_unidm`) VALUES
(1, 1, 'AC878', 'Prueba', 4),
(2, 5, 'C567', 'Paco Alcacer', 1),
(3, 8, 'A87', 'Jardin de dayris', 4),
(4, 8, '3sdsd', 'Paco', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion`
--

CREATE TABLE `descripcion` (
  `id` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_renglon` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `rendimiento` double NOT NULL,
  `precio_unitario` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `descripcion`
--

INSERT INTO `descripcion` (`id`, `id_actividad`, `descripcion`, `id_renglon`, `id_unidad`, `rendimiento`, `precio_unitario`, `total`) VALUES
(1, 1, 'Carbón', 1, 6, 12, 12, 23),
(2, 1, 'Asistente', 2, 2, 1, 12, 23),
(3, 1, 'Ayudante', 2, 6, 12, 12, 12),
(4, 2, '123', 3, 1, 12, 1, 12),
(5, 3, 'Buldozer', 3, 2, 1, 23, 12),
(7, 3, 'Albañil', 2, 2, 1, 1, 12),
(8, 3, 'Cemento', 1, 6, 100, 1, 2),
(11, 3, 'Ayudante', 2, 2, 12, 12, 12),
(12, 4, 'Carlos Reyes', 3, 2, 2, 23, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `grupo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `grupo`) VALUES
(1, 'Trabajos Preliminares'),
(2, 'Movimiento de Tierras'),
(3, 'Obra Fina'),
(4, 'Instalaciones Hidrosanitarias'),
(5, 'Instalaciones Eléctricas'),
(6, 'Obra Gruesa'),
(7, 'Trabajos Acabados'),
(8, 'Jardines y Exteriores'),
(9, 'Vía y Accesos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renglones`
--

CREATE TABLE `renglones` (
  `id` int(11) NOT NULL,
  `renglon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `renglones`
--

INSERT INTO `renglones` (`id`, `renglon`) VALUES
(1, 'Materiales'),
(2, 'Mano de Obra'),
(3, 'Herramientas y Equipos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_m`
--

CREATE TABLE `unidad_m` (
  `id` int(11) NOT NULL,
  `unidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad_m`
--

INSERT INTO `unidad_m` (`id`, `unidad`) VALUES
(1, '%'),
(2, 'Hr'),
(3, 'm'),
(4, 'm3'),
(5, 'Pza'),
(6, 'Kg'),
(10, 'g');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nombre`, `id_rol`) VALUES
(1, 'day', '6fc98ba78ffa6179ed13db5a60270ae7699fcf05', 'Dayris', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_unidm` (`id_unidm`);

--
-- Indices de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_renglon` (`id_renglon`),
  ADD KEY `id_unidad` (`id_unidad`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `renglones`
--
ALTER TABLE `renglones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad_m`
--
ALTER TABLE `unidad_m`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `renglones`
--
ALTER TABLE `renglones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `unidad_m`
--
ALTER TABLE `unidad_m`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `actividad_ibfk_2` FOREIGN KEY (`id_unidm`) REFERENCES `unidad_m` (`id`);

--
-- Filtros para la tabla `descripcion`
--
ALTER TABLE `descripcion`
  ADD CONSTRAINT `descripcion_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id`),
  ADD CONSTRAINT `descripcion_ibfk_2` FOREIGN KEY (`id_renglon`) REFERENCES `renglones` (`id`),
  ADD CONSTRAINT `descripcion_ibfk_3` FOREIGN KEY (`id_unidad`) REFERENCES `unidad_m` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
