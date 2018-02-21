-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generaci√≥n: 23-07-2017 a las 23:56:38
-- Versi√≥n del servidor: 10.1.22-MariaDB
-- Versi√≥n de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wardondb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admi` int(11) NOT NULL,
  `nombre_admi` varchar(35) NOT NULL,
  `email_admi` varchar(30) NOT NULL,
  `contrasena_admi` varchar(15) NOT NULL,
  `numero_admi` varchar(12) NOT NULL,
  `ubicacion` point NOT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `perfil_admi` longblob NOT NULL,
  `tipo_imgadmi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admi`, `nombre_admi`, `email_admi`, `contrasena_admi`, `numero_admi`, `ubicacion`, `cargo`, `perfil_admi`, `tipo_imgadmi`) VALUES
(1, 'Admin', 'admin@gmail.com', 'sena', '321312323', '', 'Policia', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `id_zona` int(11) NOT NULL,
  `nombre_zona` varchar(40) DEFAULT NULL,
  `rate_zona` int(11) DEFAULT NULL,
  `descripcion_zona` varchar(50) DEFAULT NULL,
  `ubicacion` point DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_city` int(11) NOT NULL,
  `nombre_city` varchar(30) DEFAULT NULL,
  `ubicacion` point DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_city`, `nombre_city`, `ubicacion`, `descripcion`, `calificacion`) VALUES
(1, 'Medellin', '\0\0\0\0\0\0\0`ê°≤√LA@P„8é„0M¿', 'Ciudad calida de Colombia, la segunda ciudad pricipal del pais', 2),
(2, 'Pitalito', NULL, 'Ciudad del Huila de clima calido conocido por sus valles verdes y constante crec', 2),
(3, 'Canberra', '', 'Ciudad principal de Australia de clima caluroso, Inseguridades: Prescecia de esp', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comm` int(11) NOT NULL,
  `comentario` varchar(100) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `id_zona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL,
  `foto_new` longblob,
  `tipo_foto` varchar(255) DEFAULT NULL,
  `id_zona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `nombre_user` varchar(35) NOT NULL,
  `email_user` varchar(40) NOT NULL,
  `numero_user` varchar(12) DEFAULT NULL,
  `contrasena_user` varchar(15) NOT NULL,
  `ubicacion` point DEFAULT NULL,
  `perfil_user` longblob,
  `photo` varchar(200) DEFAULT NULL,
  `id_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `nombre_user`, `email_user`, `numero_user`, `contrasena_user`, `ubicacion`, `perfil_user`, `photo`, `id_city`) VALUES
(1, 'sergio', 'sergio@gmail.com', '424234', 'sofia', NULL, NULL, '../profiles/photo/polar bear white.jpg', 2),
(4, 'manuel', 'manuel.h.3@hotmail.com', '232323243', 'sena', NULL, NULL, NULL, 1),
(6, 'Pedro Gonzalez', 'jd81@misena.edu.co', '3223882399', 'sena1', NULL, NULL, NULL, 1),
(7, 'jhon', 'jhonramirezmoreno@gmail.com', '123', 'qwerty', NULL, NULL, NULL, 1),
(8, 'Louisa', 'luisa@gmial.com', '3154152361', 'sena', NULL, NULL, NULL, 2),
(9, 'sneider', 'neider@gmail.com', '3213213', 'sena', NULL, NULL, NULL, 2),
(10, 'sneider', 'neider@gmail.com', '3213213', 'sena', NULL, NULL, NULL, 2),
(11, 'sneider', 'neider@gmail.com', '3213213', 'sena', NULL, NULL, NULL, 2),
(12, 'sneider', 'neider@gmail.com', '3213213', 'sena', NULL, NULL, NULL, 1),
(13, 'sneider', 'neider@gmail.com', '3213213', 'sena', NULL, NULL, NULL, 1),
(14, 'sneider', 'neider@gmail.com', '3154152361', 'sena', NULL, NULL, NULL, 2),
(15, 'sneider', 'neider@gmail.com', '3154152361', 'sena', NULL, NULL, NULL, 2),
(16, 'sneider', 'neider@gmail.com', '3154152361', 'sena', NULL, NULL, NULL, 2),
(17, 'John Smith', 'john@gmail.com', '313213', 'sena', NULL, NULL, '../profiles/photo/balloon.png', 2),
(18, 'John Smith', 'john@gmail.com', '313213', 'sena', NULL, NULL, '../profiles/photo/camera photo (2).png', 2),
(19, 'Mario Chumlee', 'rick@gmail.com', '3213132', 'sena', NULL, NULL, '../profiles/photo/11224012_694284420674024_8879140457929509242_n.jpg', 1),
(20, 'hp', 'hp@gmail.com', '342342', 'sena', NULL, NULL, '../profiles/photo/11224012_694284420674024_8879140457929509242_n.jpg', 2);

--
-- √çndices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admi`);

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`id_zona`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_city` (`id_city`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_city`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comm`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_city` (`id_city`),
  ADD KEY `id_zona` (`id_zona`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_zona` (`id_zona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_city` (`id_city`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `id_zona` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD CONSTRAINT `barrios_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`),
  ADD CONSTRAINT `barrios_ibfk_2` FOREIGN KEY (`id_city`) REFERENCES `ciudad` (`id_city`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_city`) REFERENCES `ciudad` (`id_city`),
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`id_zona`) REFERENCES `barrios` (`id_zona`);

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `barrios` (`id_zona`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `ciudad` (`id_city`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
