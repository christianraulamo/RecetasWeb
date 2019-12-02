-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2019 a las 10:26:26
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `receta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros`
--

CREATE TABLE `otros` (
  `IdOtros` int(11) NOT NULL,
  `Otros` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `otros`
--

INSERT INTO `otros` (`IdOtros`, `Otros`) VALUES
(1, 'q'),
(2, 'a'),
(3, 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `IdRec` int(11) NOT NULL,
  `NomRec` varchar(300) NOT NULL,
  `Receta` varchar(300) NOT NULL,
  `Tiempo` int(11) NOT NULL,
  `Raciones` int(11) NOT NULL,
  `Temporada` varchar(200) DEFAULT NULL,
  `IngredientePrincipal` varchar(300) NOT NULL,
  `Posicion` varchar(300) NOT NULL,
  `Clase` varchar(300) NOT NULL,
  `Tipo` varchar(300) NOT NULL,
  `Uso` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`IdRec`, `NomRec`, `Receta`, `Tiempo`, `Raciones`, `Temporada`, `IngredientePrincipal`, `Posicion`, `Clase`, `Tipo`, `Uso`) VALUES
(1, 'p', 'p', 8, 8, 'Verano', 'p', '', '', '', ''),
(5, 'a', 'a', 8, 8, 'Otoño', 'a', '', '', '', ''),
(6, 'q', 'q', 9, 9, 'Invierno', 'q', '', '', '', ''),
(7, 'a', 'a', 8, 8, 'Primavera', 'a', '', '', '', ''),
(8, 'a', 'a', 7, 7, '', 'a', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsu` int(11) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `NomUsu` varchar(100) NOT NULL,
  `ApeUsu` varchar(100) NOT NULL,
  `Contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsu`, `Correo`, `NomUsu`, `ApeUsu`, `Contraseña`) VALUES
(1, 'prueba@gmail.com', 'prueba', 'prueba', 'c893bad68927b457dbed39460e6afd62'),
(2, 'davidgmz.deepbox@gmail.com', 'David', 'Gómez Parra', 'dc78298261719c5922b2f7f9258e3448'),
(6, 'ejemplo@gmail.com', 'Christian', 'Amo Olsson', '2f1767dc31e7a8dc68b2c21bf07984ff');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `otros`
--
ALTER TABLE `otros`
  ADD PRIMARY KEY (`IdOtros`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`IdRec`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `otros`
--
ALTER TABLE `otros`
  MODIFY `IdOtros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `IdRec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
