-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2020 a las 23:44:09
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soft-g`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ruta`
--

CREATE TABLE `detalle_ruta` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ltn` double NOT NULL,
  `lng` double NOT NULL,
  `idruta` int(11) NOT NULL,
  `codigo` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_ruta`
--

INSERT INTO `detalle_ruta` (`id`, `title`, `ltn`, `lng`, `idruta`, `codigo`) VALUES
(1, 'Casa del mono', 10.922934963806583, -74.79313656844246, 1, 'R9VUSU2'),
(2, 'Casa de cinthia', 10.921588890578136, -74.7930530812473, 1, 'R83828'),
(4, 'CASA DE FABY', 10.921647415474274, -74.79147874936281, 1, 'R37273'),
(10, 'Casa del mono', 10.922934963806583, -74.79313656844246, 63, 'R9VUSU2'),
(11, 'Casa de cinthia', 10.921588890578136, -74.7930530812473, 63, 'R83828'),
(12, 'CASA DE FABY', 10.921647415474274, -74.79147874936281, 63, 'R37273'),
(13, 'Nueva ruta', 10.921717645720145, -74.78868788926266, 63, 'R210704'),
(14, 'punto nuevo', 10.923929883372075, -74.79127738401544, 63, 'R222534'),
(15, 'Casa del mono', 10.922934963806583, -74.79313656844246, 64, 'R9VUSU2'),
(16, 'Casa de cinthia', 10.921588890578136, -74.7930530812473, 64, 'R83828'),
(17, 'Nueva ruta', 10.921717645720145, -74.78868788926266, 64, 'R210704'),
(18, 'punto nuevo', 10.923929883372075, -74.79127738401544, 64, 'R222534'),
(19, 'marcaodr nuevo', 10.922741799999999, -74.79220889999999, 65, 'R551229'),
(20, 'Segundo marcador', 10.92202197562928, -74.79508062914691, 65, 'R198169'),
(21, 'marcaodr nuevo', 10.920943943813771, -74.79277996338166, 66, 'R551229'),
(22, 'Segundo marcador', 10.922616588548905, -74.79477271233819, 66, 'R198169'),
(23, 'nuevo marker', 10.921108984805388, -74.79533109073239, 66, 'R165883'),
(24, 'Casa del mono', 10.922934963806583, -74.79313656844246, 67, 'R9VUSU2'),
(25, 'Casa de cinthia', 10.921588890578136, -74.7930530812473, 67, 'R83828'),
(26, 'CASA DE FABY', 10.921171021488865, -74.79072653321332, 67, 'R37273'),
(27, 'marca prueba', 10.9233329316471, -74.78994019850033, 67, 'R812057');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id`, `descripcion`) VALUES
(1, 'Ruta del sol'),
(63, 'Ruta del sol II'),
(64, 'asi pruyeba'),
(65, 'ruta nueva'),
(66, 'pruebas 392'),
(67, 'pruenba con esta marca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(12, 'ffreytte@gmail.com', '$2y$10$X8aWG7cmpcWmS0KmcxIbneYM5PkoHlH/RhL5Y9dlOKhfbkA9uyRJ.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_ruta`
--
ALTER TABLE `detalle_ruta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idruta` (`idruta`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_ruta`
--
ALTER TABLE `detalle_ruta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_ruta`
--
ALTER TABLE `detalle_ruta`
  ADD CONSTRAINT `detalle_ruta_ibfk_1` FOREIGN KEY (`idruta`) REFERENCES `ruta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
