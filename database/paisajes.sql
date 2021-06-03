-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 04-06-2021 a las 01:30:07
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `crudpaisajes-phpvue`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paisajes`
--

CREATE TABLE `paisajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paisajes`
--

INSERT INTO `paisajes` (`id`, `nombre`, `descripcion`, `foto`) VALUES
(1, 'Manizales', 'Manizales del alma', 'manizales.jpeg'),
(4, 'prueba3', 'prueba33', 'jonanv.png'),
(16, 'prueba55', 'prueba55', 'sasuke.jpeg'),
(17, 'rwerwer', 'fsdf', 'sasuke.jpeg'),
(20, 'saduke', 'saduke', 'sasuke.jpeg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paisajes`
--
ALTER TABLE `paisajes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paisajes`
--
ALTER TABLE `paisajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
