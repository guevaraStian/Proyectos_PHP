-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-12-2021 a las 19:00:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ticket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenciaarea`
--

CREATE TABLE `agenciaarea` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `coor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agenciaarea`
--

INSERT INTO `agenciaarea` (`id`, `name`, `description`, `coor_id`) VALUES
(0, 'Ninguna', 'Cuando la persona no tiene agencia por el momento queda con esta opcion.', 1),
(1000, 'Talento humano', 'direccion', 2),
(1110, 'Coordinacion 1', 'direccion', 2),
(1120, 'Coordinacion 2', 'direccion', 3),
(1130, 'Coordinacion 3', 'direccion', 1),
(1140, 'Coordinacion 4', 'direccion', 1),
(1150, 'Coordinacion 5', 'direccion', 2),
(1160, 'Coordinacion 6', 'direccion', 1),
(1900, 'Sistemas', 'Este es el área de sistemas', 3),
(2300, 'Seguros', 'direccion', 1),
(2800, 'Gerencia', 'Este es el area de gerencia', 2),
(3100, 'Cali ', 'Queda en la ciudad de cali', 2),
(8000, 'Medellin ', 'Direccion', 3),
(9000, 'Bogota Centro', 'Direccion', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambiosticket`
--

CREATE TABLE `cambiosticket` (
  `idcambio` int(11) NOT NULL,
  `fechacambio` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `pedido_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `asigned_id` int(15) NOT NULL,
  `agenciaarea_id` int(15) NOT NULL,
  `agenciadestino_id` int(15) NOT NULL,
  `trabajador_id` int(15) NOT NULL,
  `priority_id` int(15) NOT NULL,
  `status_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `uploaded_on` varchar(35) NOT NULL,
  `idticket` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `name`) VALUES
(1, 'Ticket'),
(2, 'Bug'),
(3, 'Sugerencia'),
(4, 'Caracteristica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `priority`
--

INSERT INTO `priority` (`id`, `name`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrole` int(11) NOT NULL,
  `namerole` varchar(25) NOT NULL,
  `descriprole` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrole`, `namerole`, `descriprole`) VALUES
(1, 'Administrador(a)', 'Es la persona que tiene todos los privilegios del software.'),
(2, 'Coordinador(a)', 'Es la persona encargada de coordinar diferentes agencias'),
(3, 'Usuari@', 'Es la persona que radica los tickets.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Pendiente'),
(2, 'En Desarrollo'),
(3, 'Terminado'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `pedido_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `asigned_id` int(11) DEFAULT NULL,
  `agenciaarea_id` int(11) DEFAULT NULL,
  `agenciadestino_id` int(15) NOT NULL,
  `trabajador_id` int(11) DEFAULT NULL,
  `priority_id` int(11) NOT NULL DEFAULT 1,
  `status_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id`, `title`, `description`, `updated_at`, `created_at`, `pedido_id`, `user_id`, `asigned_id`, `agenciaarea_id`, `agenciadestino_id`, `trabajador_id`, `priority_id`, `status_id`) VALUES
(218, '12', 'dasdasdasdasd', '2021-12-27 11:41:16', '2021-12-27 11:36:18', 1, 1, NULL, 2800, 1900, 1900, 3, 3),
(219, '6', 'asdasdasd', '2021-12-27 11:41:18', '2021-12-27 11:36:55', 1, 2, NULL, 1110, 1900, 1900, 3, 3),
(220, '12', 'asdasdasd', '2021-12-27 11:41:21', '2021-12-27 11:37:10', 1, 2, NULL, 1110, 1900, 1900, 3, 1),
(221, '26', 'asdasdasd', '2021-12-27 11:41:26', '2021-12-27 11:37:40', 1, 2, NULL, 1110, 1900, 1900, 3, 3),
(222, '26', 'asdasdas', NULL, '2021-12-27 11:38:10', 1, 10, NULL, 1000, 1900, NULL, 3, 1),
(223, '12', 'asdasdas', '2021-12-27 11:41:31', '2021-12-27 11:38:19', 1, 10, NULL, 1000, 1900, 1900, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tituloticket`
--

CREATE TABLE `tituloticket` (
  `idtitu` int(11) NOT NULL,
  `nomtitu` varchar(255) NOT NULL,
  `destitu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tituloticket`
--

INSERT INTO `tituloticket` (`idtitu`, `nomtitu`, `destitu`) VALUES
(1, 'Problemas con la biometria', 'Problemas con la biometria'),
(2, 'Problemas con el computador', 'Problemas con el computador'),
(3, 'Problemas con la impresora', 'Problemas con la impresora'),
(4, 'Problemas con la linea telefonica', 'Problemas con la linea telefonica'),
(5, 'Problemas con el internet', 'Problemas con el internet'),
(6, 'Problemas con una plataforma', 'Problemas con una plataforma'),
(7, 'Problema con query de excel', 'Problema con query de excel'),
(8, 'Problemas con un certificado', 'Problemas con un certificado'),
(9, 'Problemas con el registro de los juegos virtuales\r\n', 'Problemas con el registro de los juegos virtuales\r\n'),
(10, 'Problemas con un bono', 'Problemas con un bono'),
(11, 'Habilitar liquidacion', 'Habilitar liquidacion'),
(12, 'Habilitar usuario', 'Habilitar usuario'),
(13, 'Configurar impresora', 'Configurar impresora'),
(14, 'Configurar query de excel', 'Configurar query de excel'),
(16, 'Instalacion de algo', 'Instalacion de algo'),
(17, 'Cambio de informacion en un recibo', 'Cambio de informacion en un recibo'),
(18, 'Modificar un recibo', 'Modificar un recibo'),
(19, 'Editar informacion de una cuenta ', 'Editar informacion de una cuenta '),
(20, 'Corregir liquidacion', 'Corregir fecha de liquidacion'),
(21, 'Reportar caida de canal', 'Reportar caida de canal'),
(22, 'Reimprimir recibo de caja', 'Reimprimir recibo de caja'),
(23, 'Modificar timbre o GGG', 'Modificar timbre o GGG'),
(24, 'No aparece acta de credito en intranet', 'No aparece acta de credito en intranet'),
(25, 'Revertir un recibo ', 'Revertir un recibo '),
(26, 'Consulta', 'Consulta'),
(27, 'Habilitar analisis', 'asdasd'),
(28, 'Habilitar opcion\r\n', 'asdasdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `name`) VALUES
(1, 'Ninguno'),
(2, 'Jhonny'),
(3, 'Mauricio'),
(4, 'Alex'),
(5, 'Joshimar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trazabilidad`
--

CREATE TABLE `trazabilidad` (
  `traza_id` int(11) NOT NULL,
  `descriptraza` varchar(350) DEFAULT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trazabilidad`
--

INSERT INTO `trazabilidad` (`traza_id`, `descriptraza`, `ticket_id`, `user_id`, `created_at`) VALUES
(76, ' asdasdas', 223, 81, '2021-12-27 12:50:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `pedido` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `rol` varchar(25) NOT NULL,
  `agenciauser` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `cedula`, `password`, `profile_pic`, `is_active`, `pedido`, `created_at`, `rol`, `agenciauser`) VALUES
(1, 'admin', 'Administrado', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'logo.png', 1, 1, '2017-07-15 12:05:45', '1', 2800),
(2, NULL, 'Coordinador(a) 1', '1110', '6dcc47f2458cb631cfa14bf8530ff39d68f8f11c', 'logo.png', 1, 1, '2021-04-20 17:04:44', '2', 1110),
(3, NULL, 'Coordinador(a) 2', '1120', 'b8396944cf2e84603f585fe966f2ab7c20fdc72b', 'logo.png', 1, 1, '2021-04-20 17:27:15', '2', 1120),
(4, NULL, 'Coordinador(a) 3', '1130', '7deb6d06e94fc50dba8020d34926f2ffb2ca4f8a', 'logo.png', 1, 1, '2021-04-22 16:14:22', '2', 1130),
(5, NULL, 'Coordinador(a) 4', '1140', '8980974da929afb12ffcab278ec771740c4c6b65', 'logo.png', 1, 1, '2021-04-22 16:14:58', '2', 1140),
(6, NULL, 'Coordinador(a) 5', '1150', '67f4667a806ec7525c03b56ae8f94915edfac649', 'logo.png', 1, 1, '2021-04-22 16:15:19', '2', 1150),
(7, NULL, 'Coordinador(a) 6', '1150', '67f4667a806ec7525c03b56ae8f94915edfac649', 'logo.png', 1, 1, '2021-04-22 16:16:32', '2', 1160),
(10, NULL, 'Talento Humano', '1000', '3e5d3a109e73c650fe573f78f3d0d2f7099901b8', 'logo.png', 1, 1, '2021-04-22 16:30:14', '2', 1000),
(15, NULL, 'Sebastian Guevara Sanchez', '111', '3be0ff98032936bc7f9df51c5685ee5f2dd6ccee', 'logo.png', 1, 1, '2021-04-24 18:06:24', '2', 1900),
(31, NULL, 'Seguros', '2300', '87ffe9b1d52a982a8e0dd41522713a16a03aa8c1', 'logo.png', 1, 1, '2021-09-20 17:03:14', '2', 2300),
(39, NULL, 'Cali i', '3100', '99c8c8678c129911c59aa6e9132f9ccf69c9a82b', 'logo.png', 1, 1, '2021-09-20 17:21:16', '2', 3100),
(61, NULL, 'Medellin a', '8000', 'f90a9ce26a210ad502e14c2b9611ae0b0a4bd9a9', 'logo.png', 1, 1, '2021-09-20 17:41:48', '2', 8000),
(71, NULL, 'Bogota Centro', '9000', 'fd6c0b256b06460055bf3816e3c0b7195ccafa68', 'logo.png', 1, 1, '2021-09-20 17:45:29', '2', 9000),
(81, NULL, 'Sistemas s', '1900', 'e766d0df42a46ae12a4c3d36dfe2d251bedc3416', 'logo.png', 1, 1, '2021-12-27 18:09:39', '2', 1900);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenciaarea`
--
ALTER TABLE `agenciaarea`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cambiosticket`
--
ALTER TABLE `cambiosticket`
  ADD PRIMARY KEY (`idcambio`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrole`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priority_id` (`priority_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `trabajador_id` (`trabajador_id`),
  ADD KEY `agenciaarea_id` (`agenciaarea_id`);

--
-- Indices de la tabla `tituloticket`
--
ALTER TABLE `tituloticket`
  ADD PRIMARY KEY (`idtitu`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  ADD PRIMARY KEY (`traza_id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenciaarea`
--
ALTER TABLE `agenciaarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9802;

--
-- AUTO_INCREMENT de la tabla `cambiosticket`
--
ALTER TABLE `cambiosticket`
  MODIFY `idcambio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT de la tabla `tituloticket`
--
ALTER TABLE `tituloticket`
  MODIFY `idtitu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `trazabilidad`
--
ALTER TABLE `trazabilidad`
  MODIFY `traza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`priority_id`) REFERENCES `priority` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `ticket_ibfk_6` FOREIGN KEY (`agenciaarea_id`) REFERENCES `agenciaarea` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
