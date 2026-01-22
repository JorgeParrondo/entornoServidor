-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-01-2026 a las 19:42:48
-- Versión del servidor: 10.6.22-MariaDB-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `HotelesDB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Hoteles`
--

CREATE TABLE `Hoteles` (
  `cod_hotel` varchar(8) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `categoria` int(11) NOT NULL,
  `precio_noche` float NOT NULL,
  `habitaciones_disponibles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Hoteles`
--

INSERT INTO `Hoteles` (`cod_hotel`, `ciudad`, `nombre`, `categoria`, `precio_noche`, `habitaciones_disponibles`) VALUES
('MAD001', 'Madrid', 'Ritz-Carlton Heritage', 5, 520.5, 8),
('MAD002', 'Madrid', 'Gran Vía Royal Palace', 5, 380, 12),
('MAD003', 'Madrid', 'Castellana Boutique Hotel', 4, 195, 25),
('MAD004', 'Madrid', 'The Prado Collection', 5, 410, 5),
('MAD005', 'Madrid', 'Retiro Garden Suites', 4, 165, 0),
('SEV001', 'Sevilla', 'Alfonso XIII Premium', 5, 490, 4),
('SEV002', 'Sevilla', 'Giralda Views Luxury', 5, 320, 10),
('SEV003', 'Sevilla', 'Torre del Oro Boutique', 4, 145.5, 18),
('SEV004', 'Sevilla', 'Santa Cruz Palace', 5, 280, 7),
('VAL001', 'Valencia', 'City of Arts Grand Hotel', 5, 310, 0),
('VAL002', 'Valencia', 'Malvarrosa Beach Resort', 4, 185, 0),
('VAL003', 'Valencia', 'Turia Garden Exclusive', 5, 275, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
