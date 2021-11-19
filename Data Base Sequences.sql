-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-11-2021 a las 22:12:54
-- Versión del servidor: 10.5.12-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17714241_cartilla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_pacientes`
--

CREATE TABLE `datos_pacientes` (
  `DatoID` int(11) NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Altura` int(11) NOT NULL,
  `EspecialidadID_FK` int(11) DEFAULT NULL,
  `LocalidadID_FK` int(11) DEFAULT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `datos_pacientes`
--

INSERT INTO `datos_pacientes` (`DatoID`, `Direccion`, `Altura`, `EspecialidadID_FK`, `LocalidadID_FK`, `Fecha`) VALUES
(1, 'Betharram', 1285, 3, 1, '2021-11-12 17:03:42'),
(2, 'Betharram', 5685, 1, 1, '2021-11-12 17:17:23'),
(3, 'Murialdo', 4567, 1, 1, '2021-11-12 17:20:41'),
(4, 'Bonifacini', 3333, 1, 1, '2021-11-14 02:12:07'),
(5, 'Ascasubi', 5423, 1, 1, '2021-11-14 02:12:07'),
(7, 'Martin Fierro', 2645, 5, 1, '2021-11-14 02:12:07'),
(8, 'Bradley', 8462, 5, 4, '2021-11-14 02:12:07'),
(11, 'Santos Vega', 1100, 6, 1, '2021-11-15 21:24:50'),
(12, 'Murialdo', 1234, 1, 1, '2021-11-15 22:04:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `EspecialidadID` int(11) NOT NULL,
  `Tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`EspecialidadID`, `Tipo`) VALUES
(1, 'Pediatría'),
(2, 'Ginecología'),
(3, 'Oftalmología'),
(4, 'Oncología'),
(5, 'Otorrinolaringologo'),
(6, 'Geriatría'),
(7, 'Psiquiatría');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Localidad`
--

CREATE TABLE `Localidad` (
  `LocalidadID` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Partido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Provincia` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Localidad`
--

INSERT INTO `Localidad` (`LocalidadID`, `Nombre`, `Partido`, `Provincia`) VALUES
(1, 'Villa Bosch', 'Tres de Febrero', 'Buenos Aires'),
(2, 'Caseros', 'Tres de Febrero', 'Buenos Aires'),
(3, 'Loma Hermosa', 'Tres de Febrero', 'Buenos Aires'),
(4, 'Ciudad Jardín', 'Tres de Febrero', 'Buenos Aires'),
(5, 'Martín Coronado', 'Tres de Febrero', 'Buenos Aires');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_pacientes`
--
ALTER TABLE `datos_pacientes`
  ADD PRIMARY KEY (`DatoID`),
  ADD KEY `EspecialidadID` (`EspecialidadID_FK`),
  ADD KEY `LocalidadID` (`LocalidadID_FK`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`EspecialidadID`);

--
-- Indices de la tabla `Localidad`
--
ALTER TABLE `Localidad`
  ADD PRIMARY KEY (`LocalidadID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_pacientes`
--
ALTER TABLE `datos_pacientes`
  MODIFY `DatoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `EspecialidadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `Localidad`
--
ALTER TABLE `Localidad`
  MODIFY `LocalidadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos_pacientes`
--
ALTER TABLE `datos_pacientes`
  ADD CONSTRAINT `datos_pacientes_ibfk_1` FOREIGN KEY (`EspecialidadID_FK`) REFERENCES `especialidades` (`EspecialidadID`),
  ADD CONSTRAINT `datos_pacientes_ibfk_2` FOREIGN KEY (`LocalidadID_FK`) REFERENCES `Localidad` (`LocalidadID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
