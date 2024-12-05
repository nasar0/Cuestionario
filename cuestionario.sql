-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2024 a las 13:15:30
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
-- Base de datos: `cuestionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `respuesta` varchar(100) NOT NULL,
  `norespuestas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `respuesta`, `norespuestas`) VALUES
(1, '¿Cuántos planetas tiene el sistema solar?', '8', '9,10,7'),
(2, '¿Quién escribió \"Cien años de soledad\"?', 'Gabriel García Márquez', 'Mario Vargas Llosa,Jorge Luis Borges,Carlos Fuentes'),
(3, '¿En qué año llegó el hombre a la Luna?', '1969', '1958,1970,1968'),
(4, '¿Cuál es el idioma oficial de Brasil?', 'Portugués', 'Español,Inglés,Francés'),
(5, '¿Qué tipos de seres vivos existen en el océano? (elige tres)', 'mamíferos,plantas,peces', 'aves,reptiles,insectos'),
(6, '¿Quién pintó la Mona Lisa?', 'Leonardo da Vinci', 'Pablo Picasso,Michelangelo,Vincent van Gogh'),
(7, '¿Cuántos océanos hay en la Tierra?', '5', '4,6,7'),
(8, '¿Qué país tiene como capital a Tokio?', 'Japón', 'China,Corea del Sur,Tailandia'),
(9, '¿Cuántos años tiene un siglo?', '100', '50,200,500'),
(10, '¿Quién es conocido como el padre de la teoría de la relatividad?', 'Albert Einstein', 'Isaac Newton,Galileo Galilei,Nikola Tesla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `user` varchar(40) NOT NULL,
  `tiempo_inicio` timestamp NOT NULL DEFAULT current_timestamp(),
  `tiempo_final` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
