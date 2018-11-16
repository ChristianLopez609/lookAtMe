-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2018 a las 22:20:45
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lockatme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8_bin NOT NULL,
  `userId` int(11) NOT NULL,
  `videoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE `playlist` (
  `playlistId` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_bin NOT NULL,
  `description` varchar(200) COLLATE utf8_bin NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlistvideo`
--

CREATE TABLE `playlistvideo` (
  `playlistId` int(11) NOT NULL,
  `videoId` int(11) NOT NULL,
  `orderVideo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typeuser`
--

CREATE TABLE `typeuser` (
  `typeId` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `typeuser`
--

INSERT INTO `typeuser` (`typeId`, `type`) VALUES
(1, 'usuario'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typevideo`
--

CREATE TABLE `typevideo` (
  `typeVideoId` int(11) NOT NULL,
  `typeVideo` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(15) COLLATE utf8_bin NOT NULL,
  `confirm` varchar(15) COLLATE utf8_bin NOT NULL,
  `typeUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `password`, `confirm`, `typeUser`) VALUES
(1, 'Christian Lopez', 'christianlopez1605@gmail.com', '123456', '123456', 1),
(4, 'Christian Lopez', 'christianlopez1605@gmail.com', '123456', '123456', 2),
(21, 'Christian', 'clopez@gmail.com', '123456', '123456', 1),
(22, 'clopez', 'clopez@gmail.com', '1234', '1234', 1),
(23, 'javier', 'javier@hotmail.com', '12345', '12345', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `videoId` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_bin NOT NULL,
  `description` varchar(200) COLLATE utf8_bin NOT NULL,
  `urlFile` varchar(200) COLLATE utf8_bin NOT NULL,
  `type` varchar(200) COLLATE utf8_bin NOT NULL,
  `size` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `videoTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `videoId` (`videoId`),
  ADD KEY `userId` (`userId`) USING BTREE;

--
-- Indices de la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`playlistId`);

--
-- Indices de la tabla `playlistvideo`
--
ALTER TABLE `playlistvideo`
  ADD KEY `playlistId` (`playlistId`),
  ADD KEY `videoId` (`videoId`);

--
-- Indices de la tabla `typeuser`
--
ALTER TABLE `typeuser`
  ADD PRIMARY KEY (`typeId`);

--
-- Indices de la tabla `typevideo`
--
ALTER TABLE `typevideo`
  ADD PRIMARY KEY (`typeVideoId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `typeUser` (`typeUser`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videoId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `videoTypeId` (`videoTypeId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `playlist`
--
ALTER TABLE `playlist`
  MODIFY `playlistId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `typeuser`
--
ALTER TABLE `typeuser`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `typevideo`
--
ALTER TABLE `typevideo`
  MODIFY `typeVideoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `videoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `videos` (`userId`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`videoId`) REFERENCES `videos` (`videoId`);

--
-- Filtros para la tabla `playlistvideo`
--
ALTER TABLE `playlistvideo`
  ADD CONSTRAINT `playlistvideo_ibfk_1` FOREIGN KEY (`playlistId`) REFERENCES `playlist` (`playlistId`),
  ADD CONSTRAINT `playlistvideo_ibfk_2` FOREIGN KEY (`videoId`) REFERENCES `videos` (`videoId`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`typeUser`) REFERENCES `typeuser` (`typeId`);

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `videos_ibfk_2` FOREIGN KEY (`videoTypeId`) REFERENCES `typevideo` (`typeVideoId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
