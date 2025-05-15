-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2025 a las 21:36:14
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `skyvault`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despliegues`
--

CREATE TABLE `despliegues` (
  `id_despliegue` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_proyecto` varchar(100) NOT NULL,
  `url_repositorio` varchar(255) NOT NULL,
  `ruta_vps` varchar(255) NOT NULL,
  `puerto` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `url_publica` varchar(255) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `despliegues`
--

INSERT INTO `despliegues` (`id_despliegue`, `id_usuario`, `nombre_proyecto`, `url_repositorio`, `ruta_vps`, `puerto`, `estado`, `url_publica`, `fecha_creacion`) VALUES
(1, 1, 'forolol', 'test', 'test', 111, 1, 'test', '2025-05-07 22:55:49'),
(2, 1, 'test', 'test', 'test', 111, 1, 'test', '2025-05-07 23:12:07'),
(3, 1, 'Forolol', 'https://github.com/GabrielCB04/Forolol', '../repos/1/Forolol', 80, 1, 'test', '2025-05-15 19:54:29'),
(4, 1, 'Forolol', 'https://github.com/GabrielCB04/Forolol', '../repos/1/Forolol', 80, 1, 'test', '2025-05-15 21:06:57'),
(5, 1, 'Forolol', 'https://github.com/GabrielCB04/Forolol', '../repos/1/Forolol', 80, 1, 'test', '2025-05-15 21:12:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `correo`, `passwd`, `fecha_registro`) VALUES
(1, 'gabriel@gmail.com', '$2y$10$VJJgglK.LR086sGO1C1He.LhgmOkRYHuiTGjYxlmE2yvLcJMy6YLK', '2025-05-06 14:46:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `despliegues`
--
ALTER TABLE `despliegues`
  ADD PRIMARY KEY (`id_despliegue`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `despliegues`
--
ALTER TABLE `despliegues`
  MODIFY `id_despliegue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `despliegues`
--
ALTER TABLE `despliegues`
  ADD CONSTRAINT `despliegues_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
