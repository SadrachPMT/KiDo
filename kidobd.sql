-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2021 a las 04:13:54
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kidobd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopcion`
--

CREATE TABLE `adopcion` (
  `idAdopcion` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `DescripcionExtra` varchar(300) NOT NULL,
  `idDepartamento` int(11) DEFAULT NULL,
  `idMascota` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `adopcion`
--

INSERT INTO `adopcion` (`idAdopcion`, `Fecha`, `Direccion`, `DescripcionExtra`, `idDepartamento`, `idMascota`, `idUsuario`) VALUES
(1, '2021-11-29', 'De los billares pio-pio, 6 andenes al norte, 100mts al este', 'En adopción por guapo y elegante', 12, 1, 1),
(2, '2021-11-29', 'De los billares pio-pio, 6 andenes al norte, 100mts al este', 'Chilla solamente para llamar la atención\r\nNo caza ni come ratones\r\nDe repente come comida para perros, solo para encajar con Riley', 12, 2, 1),
(3, '2021-11-29', 'Villa Miguel Gutiérrez, de los billares pio-pio, 6 andenes al norte, 100mts al este', 'Necesita más espacio por su tamaño', 12, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracter`
--

CREATE TABLE `caracter` (
  `idCaracter` int(11) NOT NULL,
  `Nombre` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `caracter`
--

INSERT INTO `caracter` (`idCaracter`, `Nombre`) VALUES
(1, 'Tímido'),
(2, 'Agresivo'),
(3, 'Alegre'),
(4, 'Cariñoso'),
(5, 'Amigable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `Nombre` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `Nombre`) VALUES
(1, 'Perros'),
(2, 'Gatos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departameto`
--

CREATE TABLE `departameto` (
  `idDepartamento` int(11) NOT NULL,
  `Nombre` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departameto`
--

INSERT INTO `departameto` (`idDepartamento`, `Nombre`) VALUES
(1, 'Boaco'),
(2, 'Carazo'),
(3, 'Chinandega'),
(4, 'Chontales'),
(5, 'Costa Caribe Norte'),
(6, 'Costa Caribe Sur'),
(7, 'Estelí'),
(8, 'Granada'),
(9, 'Jinotega'),
(10, 'León'),
(11, 'Madriz'),
(12, 'Managua'),
(13, 'Masaya'),
(14, 'Matagalpa'),
(15, 'Nueva Segovia'),
(16, 'Río San Juan'),
(17, 'Rivas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `Nombre` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `Nombre`) VALUES
(1, 'Macho'),
(2, 'Hembra'),
(3, 'Desconocido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idMascota` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Color` varchar(10) DEFAULT NULL,
  `Descripcion` varchar(250) DEFAULT NULL,
  `Foto` varchar(200) NOT NULL,
  `idGenero` int(11) DEFAULT NULL,
  `idCaracter` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `idTamaño` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`idMascota`, `Nombre`, `Edad`, `Color`, `Descripcion`, `Foto`, `idGenero`, `idCaracter`, `idCategoria`, `idTamaño`, `idUsuario`) VALUES
(1, 'Riley', 36, 'Negro', 'Le teme a la pirotecnia...', '1638180973_0903c9cdd05827985d16.jpg', 1, 5, 1, 2, 1),
(2, 'Lucero', 4, 'Gris', 'Comelona', '1638182321_472179ff9f288169a1f9.jpg', 2, 4, 2, 3, 1),
(3, 'Lucho', 48, 'Blanco', 'Padece de un tipo de alergia', '1638222551_a5a8d9cf2b5e0d124fcc.jpg', 1, 5, 1, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamaño`
--

CREATE TABLE `tamaño` (
  `idTamaño` int(11) NOT NULL,
  `Nombre` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tamaño`
--

INSERT INTO `tamaño` (`idTamaño`, `Nombre`) VALUES
(1, 'Enano'),
(2, 'Pequeño'),
(3, 'Mediano'),
(4, 'Grande'),
(5, 'Muy grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `Nombre`) VALUES
(1, 'Persona'),
(2, 'Organización'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(40) DEFAULT NULL,
  `Telefono` decimal(8,0) NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `Contraseña` varchar(500) NOT NULL,
  `idTipoUsuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nombres`, `Apellidos`, `Telefono`, `Correo`, `Contraseña`, `idTipoUsuario`) VALUES
(1, 'Sadrach Patricio', 'Manzanarez Talavera', '89957329', 'sadrachpatriciomt@gmail.com', '$2y$10$45sSB1VVcT0Sv9dbu9BQmu9icluACnY2CMa.EGzrnrb2lvQ78zZam', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD PRIMARY KEY (`idAdopcion`),
  ADD KEY `RefDepartameto12` (`idDepartamento`),
  ADD KEY `RefMascota13` (`idMascota`),
  ADD KEY `RefUsuario14` (`idUsuario`);

--
-- Indices de la tabla `caracter`
--
ALTER TABLE `caracter`
  ADD PRIMARY KEY (`idCaracter`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `departameto`
--
ALTER TABLE `departameto`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idMascota`),
  ADD KEY `RefGenero5` (`idGenero`),
  ADD KEY `RefCaracter6` (`idCaracter`),
  ADD KEY `RefCategoria7` (`idCategoria`),
  ADD KEY `RefTamaño8` (`idTamaño`),
  ADD KEY `RefUsuario9` (`idUsuario`);

--
-- Indices de la tabla `tamaño`
--
ALTER TABLE `tamaño`
  ADD PRIMARY KEY (`idTamaño`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `RefTipoUsuario11` (`idTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adopcion`
--
ALTER TABLE `adopcion`
  MODIFY `idAdopcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `caracter`
--
ALTER TABLE `caracter`
  MODIFY `idCaracter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departameto`
--
ALTER TABLE `departameto`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idMascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tamaño`
--
ALTER TABLE `tamaño`
  MODIFY `idTamaño` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
