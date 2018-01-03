-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-01-2018 a las 13:18:38
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vales_consumo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobador_x_sector`
--

CREATE TABLE `aprobador_x_sector` (
  `id_sector` int(11) NOT NULL,
  `id_aprobador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `num_articulo` int(40) NOT NULL,
  `descripcion1` char(255) NOT NULL,
  `descripcion2` char(255) NOT NULL,
  `id_un_med1` int(2) NOT NULL,
  `id_un_med2` int(2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `num_articulo`, `descripcion1`, `descripcion2`, `id_un_med1`, `id_un_med2`, `status`) VALUES
(1, 1, 'Item de Prueba 1', 'Item de Prueba 1', 1, 1, 1),
(2, 2, 'Item de Prueba 2', 'Item de Prueba 2', 1, 1, 1),
(3, 3, 'Item de Prueba 3', 'Item de Prueba 3', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_x_vale`
--

CREATE TABLE `articulos_x_vale` (
  `id_vale_articulos` int(11) NOT NULL,
  `id_articulo_por_vale` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado_entrega_item` int(11) NOT NULL,
  `cantidad_entregada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos_x_vale`
--

INSERT INTO `articulos_x_vale` (`id_vale_articulos`, `id_articulo_por_vale`, `cantidad`, `estado_entrega_item`, `cantidad_entregada`) VALUES
(1, 1, 1, 0, 1),
(2, 1, 1, 0, 1),
(2, 2, 2, 0, 2),
(2, 3, 3, 0, 2),
(3, 1, 144, 0, 144),
(3, 2, 222, 1, 0),
(3, 3, 113, 1, 0),
(4, 1, 1, 1, 0),
(5, 1, 2353, 0, 500),
(5, 2, 1231, 0, 1231),
(5, 3, 444, 0, 1),
(6, 1, 1, 1, 0),
(7, 1, 1, 1, 0),
(9, 1, 1, 1, 0),
(10, 1, 1, 1, 0),
(11, 1, 3, 0, 3),
(11, 3, 333, 0, 333),
(12, 1, 1, 0, 1),
(12, 2, 2, 1, 0),
(12, 3, 3, 1, 0),
(13, 1, 1, 1, 0),
(14, 1, 1, 0, 1),
(14, 2, 2, 0, 2),
(14, 3, 3, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_x_vale_entregado`
--

CREATE TABLE `articulos_x_vale_entregado` (
  `id_vale` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_aprobacion`
--

CREATE TABLE `estado_aprobacion` (
  `id_estado_aprobacion_fk` int(11) NOT NULL,
  `nombre_estado_aprobacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_aprobacion`
--

INSERT INTO `estado_aprobacion` (`id_estado_aprobacion_fk`, `nombre_estado_aprobacion`) VALUES
(1, 'Pendiente'),
(2, 'Aprobado'),
(3, 'Rechazado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_entrega`
--

CREATE TABLE `estado_entrega` (
  `id_estado_entrega` int(11) NOT NULL,
  `nombre_estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_entrega`
--

INSERT INTO `estado_entrega` (`id_estado_entrega`, `nombre_estado`) VALUES
(1, 'En Proceso De Carga'),
(2, 'Pendiente De Aprobacion'),
(3, 'En Proceso De Armado'),
(4, 'Listo Para Retirar'),
(5, 'Retirado'),
(9, 'Deshabilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evolucion_aprobacion`
--

CREATE TABLE `evolucion_aprobacion` (
  `id_vale_aprobacion` int(11) NOT NULL,
  `id_estado_aprobacion` int(11) NOT NULL,
  `fecha_aprobacion` int(11) NOT NULL,
  `id_responsable_aprobacion` int(11) NOT NULL,
  `comentarios_aprobacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evolucion_aprobacion`
--

INSERT INTO `evolucion_aprobacion` (`id_vale_aprobacion`, `id_estado_aprobacion`, `fecha_aprobacion`, `id_responsable_aprobacion`, `comentarios_aprobacion`) VALUES
(1, 1, 1513885414, 1, ''),
(1, 2, 1513885423, 1, ''),
(2, 1, 1513950202, 1, ''),
(2, 2, 1513950210, 1, ''),
(3, 1, 1514309148, 1, ''),
(3, 2, 1514309615, 1, ''),
(4, 1, 1514380019, 1, ''),
(4, 2, 1514380025, 1, ''),
(5, 1, 1514396348, 1, ''),
(5, 2, 1514396378, 1, 'todo ok\r\n'),
(6, 1, 1514403571, 1, ''),
(11, 1, 1514466554, 1, ''),
(11, 2, 1514466782, 1, ''),
(6, 2, 1514482077, 1, ''),
(12, 1, 1514482097, 1, ''),
(12, 2, 1514482111, 1, ''),
(13, 1, 1514575482, 1, ''),
(14, 1, 1514578673, 2, ''),
(14, 2, 1514578731, 1, 'todo ok. proceder.\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evolucion_vale`
--

CREATE TABLE `evolucion_vale` (
  `id_vale_evolucion` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `observacion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evolucion_vale`
--

INSERT INTO `evolucion_vale` (`id_vale_evolucion`, `id_estado`, `fecha`, `id_responsable`, `observacion`) VALUES
(1, 1, 1513885412, 1, ''),
(1, 2, 1513885414, 1, ''),
(1, 3, 1513885423, 1, ''),
(2, 1, 1513950196, 1, ''),
(2, 2, 1513950202, 1, ''),
(2, 3, 1513950210, 1, ''),
(3, 1, 1514309127, 1, ''),
(3, 2, 1514309148, 1, ''),
(3, 3, 1514309615, 1, ''),
(3, 5, 1514317152, 1, '333'),
(3, 4, 1514317210, 1, '333'),
(3, 5, 1514317230, 1, 'cambio a retirado'),
(2, 4, 1514317307, 1, 'falta el item N, el resto ok.\n'),
(3, 4, 1514317700, 1, ''),
(3, 5, 1514319665, 1, ''),
(3, 5, 1514319770, 1, ''),
(3, 4, 1514320116, 1, ''),
(3, 5, 1514320128, 1, ''),
(3, 5, 1514320192, 1, 'aaa'),
(3, 4, 1514320228, 1, 'aaa'),
(3, 5, 1514320241, 1, 'aaa'),
(3, 5, 1514320252, 1, ''),
(3, 4, 1514379013, 1, '1'),
(3, 5, 1514379043, 1, '1'),
(3, 4, 1514379153, 1, '1'),
(3, 5, 1514379182, 1, 'asdasd'),
(3, 4, 1514379320, 1, '2'),
(3, 5, 1514379643, 1, 'a'),
(3, 4, 1514379948, 1, ''),
(4, 1, 1514380018, 1, ''),
(4, 2, 1514380019, 1, ''),
(4, 3, 1514380025, 1, ''),
(2, 5, 1514380036, 1, ''),
(2, 5, 1514394194, 1, ''),
(1, 4, 1514394347, 1, ''),
(1, 4, 1514394475, 1, ''),
(1, 5, 1514394493, 1, ''),
(1, 4, 1514394660, 1, ''),
(1, 4, 1514394668, 1, ''),
(1, 5, 1514394740, 1, ''),
(1, 4, 1514395097, 1, ''),
(5, 1, 1514396319, 1, ''),
(5, 2, 1514396348, 1, ''),
(5, 3, 1514396378, 1, ''),
(5, 4, 1514396447, 1, 'no teniamos las cantidades necesarias.\n'),
(5, 5, 1514396458, 1, ''),
(3, 5, 1514402995, 1, ''),
(3, 4, 1514403257, 1, 'aaa'),
(3, 5, 1514403294, 1, 'aa'),
(3, 4, 1514403384, 1, 'a'),
(3, 5, 1514403405, 1, 'a'),
(3, 4, 1514403436, 1, '<a'),
(3, 5, 1514403457, 1, 'a'),
(3, 4, 1514403479, 1, 'a'),
(3, 4, 1514403493, 1, 'd'),
(3, 5, 1514403510, 1, 'ta esta perro'),
(3, 5, 1514403532, 1, 'ta esta perro'),
(3, 4, 1514403545, 1, 'no esta loco'),
(6, 1, 1514403565, 1, ''),
(6, 2, 1514403571, 1, ''),
(3, 5, 1514403686, 1, 'a'),
(3, 4, 1514403730, 1, 'a'),
(3, 5, 1514406347, 1, ''),
(7, 1, 1514406423, 1, ''),
(8, 1, 1514406627, 1, ''),
(9, 1, 1514466491, 1, ''),
(10, 1, 1514466520, 1, ''),
(11, 1, 1514466536, 1, ''),
(11, 2, 1514466554, 1, ''),
(11, 3, 1514466782, 1, ''),
(3, 5, 1514481956, 1, 'jjjj'),
(6, 3, 1514482077, 1, ''),
(12, 1, 1514482091, 1, ''),
(12, 2, 1514482097, 1, ''),
(12, 3, 1514482111, 1, ''),
(12, 5, 1514482123, 1, ''),
(13, 1, 1514575481, 1, ''),
(13, 2, 1514575482, 1, ''),
(2, 4, 1514578622, 2, 'todo ok'),
(14, 1, 1514578666, 2, ''),
(14, 2, 1514578673, 2, ''),
(14, 3, 1514578731, 1, ''),
(14, 4, 1514578930, 2, 'podes pasar.\n'),
(14, 5, 1514578952, 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fk_un_med`
--

CREATE TABLE `fk_un_med` (
  `id_un_medida` int(11) NOT NULL,
  `un_medida` varchar(12) NOT NULL,
  `nombre_un_medida` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fk_un_med`
--

INSERT INTO `fk_un_med` (`id_un_medida`, `un_medida`, `nombre_un_medida`) VALUES
(1, 'KG', 'Kilogramo'),
(2, 'UN', 'Unidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'Requeridor', 'Requeridor'),
(3, 'Aprobador', 'Aprobador'),
(4, 'Pañolero', 'Pañolero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jerarquias`
--

CREATE TABLE `jerarquias` (
  `id_jerarquia` int(11) NOT NULL,
  `id_user_padre` int(11) NOT NULL,
  `id_user_hijo` int(11) NOT NULL,
  `id_sector_jerarquia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jerarquias`
--

INSERT INTO `jerarquias` (`id_jerarquia`, `id_user_padre`, `id_user_hijo`, `id_sector_jerarquia`) VALUES
(6, 2, 2, 25),
(7, 2, 2, 24),
(8, 2, 2, 23),
(9, 2, 2, 22),
(10, 2, 2, 21),
(333, 1, 1, 11),
(334, 2, 2, 7),
(335, 2, 2, 8),
(336, 2, 2, 9),
(337, 2, 2, 10),
(338, 2, 2, 11),
(339, 2, 2, 12),
(340, 2, 2, 13),
(341, 2, 2, 14),
(342, 2, 2, 15),
(343, 2, 2, 16),
(344, 2, 2, 17),
(345, 2, 2, 18),
(346, 2, 2, 19),
(347, 2, 2, 20),
(348, 2, 2, 26),
(349, 3, 3, 7),
(350, 1, 1, 7),
(351, 1, 1, 8),
(352, 3, 3, 8),
(353, 3, 3, 9),
(354, 3, 3, 10),
(355, 1, 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` text NOT NULL,
  `descripcion_rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `descripcion_rol`) VALUES
(1, 'VerArticulos', 'VerArticulos'),
(2, 'AdministrarRoles', 'AdministrarRoles'),
(3, 'AdministrarRoles', 'AdministrarRoles'),
(4, 'EditarArticulos', 'EditarArticulos'),
(5, 'AltaArticulos', 'AltaArticulos'),
(6, 'AdministrarUsuarios', 'AdministrarUsuarios'),
(7, 'VerArticulos', 'VerArticulos'),
(8, 'VerVales', 'VerVales'),
(9, 'NuevoVale', 'NuevoVale'),
(10, 'VerVale', 'VerVale'),
(11, 'AprobarVales', 'AprobarVales'),
(12, 'ArmadoDeVales', 'ArmadoDeVales'),
(13, 'AprobarVales', 'AprobarVales'),
(14, 'VerDashboard', 'VerDashboard'),
(15, 'PrepararVale', 'PrepararVale');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_groups`
--

CREATE TABLE `roles_groups` (
  `id_rol_` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles_groups`
--

INSERT INTO `roles_groups` (`id_rol_`, `user_id`, `role_id`) VALUES
(2, 1, 1),
(3, 1, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 1, 6),
(8, 1, 7),
(9, 1, 8),
(10, 1, 9),
(11, 1, 10),
(12, 1, 11),
(13, 1, 12),
(14, 1, 13),
(15, 1, 14),
(16, 1, 15),
(17, 2, 1),
(18, 3, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector_req`
--

CREATE TABLE `sector_req` (
  `id_sector_req` int(11) NOT NULL,
  `nombre_sector` text NOT NULL,
  `FASE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sector_req`
--

INSERT INTO `sector_req` (`id_sector_req`, `nombre_sector`, `FASE`) VALUES
(7, 'MOLINO DISCONTINUO', 'MD '),
(8, 'MOLINO CONTINUO', 'MC '),
(9, 'PRENSA ', 'PRE '),
(10, 'ESMALTERIA', 'ESM '),
(11, 'HORNO', 'HOR '),
(12, 'MOLINO ESMALTE', 'MES '),
(13, 'LAB.TECNICO', 'LTEC '),
(14, 'LAB.DESARROLLO', 'LDES '),
(15, 'LAB.SERIGRAFICO', 'LSER '),
(16, 'PULIDORA', 'PUL '),
(17, 'SELECCIÓN', 'SEL '),
(18, 'CORTE', 'COR '),
(19, 'MANT.ELECTRICO', 'MELE '),
(20, 'MANT.MECANICO', 'MMEC '),
(21, 'MERCADO .INTERNO (MKT) PANELES', 'MINT '),
(22, 'GERRENCIA (TODO ADMINISTRACION)', 'GER '),
(23, 'MANT. EDIFICIO ', 'MEDI '),
(24, 'LOGISTICA Y PROGRAMACION', 'LYP '),
(25, 'MOLDES Y MATRICERIA ', 'MYM'),
(26, 'GERRENCIA PRODUCCION ', 'GPRO ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1514895373, 1, 'Admin', 'istrator', NULL, NULL),
(2, '::1', 'lfradusco', '$2y$08$yQQ9.4mQ9J5mp5f4PXHcG.vbP0Tu2cP4cewPWurrQchvefJ9AUH46', NULL, 'lfradusco@ilva.com.ar', NULL, NULL, NULL, NULL, 1514471610, 1514578746, 1, 'Lucas', 'Fradusco', NULL, NULL),
(3, '::1', 'rvarios', '$2y$08$.y2equUI8P615lwIjAswh.9QumsXBi36Usqr2fCZxbHptHl1c9UtG', NULL, 'rvarios@ilva.com.ar', NULL, NULL, NULL, NULL, 1514483307, NULL, 1, 'Requeridor', 'Sectores Varios', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(5, 2, 4),
(6, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vales_consumo`
--

CREATE TABLE `vales_consumo` (
  `id_vale` int(11) NOT NULL,
  `id_requeridor` int(11) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_aprobacion` int(11) NOT NULL,
  `fecha_creado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vales_consumo`
--

INSERT INTO `vales_consumo` (`id_vale`, `id_requeridor`, `id_sector`, `id_estado`, `id_aprobacion`, `fecha_creado`) VALUES
(1, 1, 18, 4, 2, 1513885412),
(2, 1, 18, 4, 2, 1513950196),
(3, 1, 18, 5, 2, 1514309127),
(4, 1, 18, 5, 2, 1514380018),
(5, 1, 18, 5, 2, 1514396319),
(6, 1, 18, 3, 2, 1514403565),
(7, 1, 18, 1, 0, 1514406423),
(8, 1, 18, 1, 0, 1514406627),
(9, 1, 18, 1, 0, 1514466491),
(10, 1, 18, 1, 0, 1514466520),
(11, 1, 18, 3, 2, 1514466536),
(12, 1, 18, 5, 2, 1514482091),
(13, 1, 11, 2, 1, 1514575481),
(14, 2, 25, 5, 2, 1514578666);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `estado_entrega`
--
ALTER TABLE `estado_entrega`
  ADD PRIMARY KEY (`id_estado_entrega`);

--
-- Indices de la tabla `fk_un_med`
--
ALTER TABLE `fk_un_med`
  ADD PRIMARY KEY (`id_un_medida`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jerarquias`
--
ALTER TABLE `jerarquias`
  ADD PRIMARY KEY (`id_jerarquia`),
  ADD KEY `id_sector_jerarquia` (`id_sector_jerarquia`);

--
-- Indices de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `roles_groups`
--
ALTER TABLE `roles_groups`
  ADD PRIMARY KEY (`id_rol_`),
  ADD KEY `role_id` (`role_id`);

--
-- Indices de la tabla `sector_req`
--
ALTER TABLE `sector_req`
  ADD PRIMARY KEY (`id_sector_req`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indices de la tabla `vales_consumo`
--
ALTER TABLE `vales_consumo`
  ADD PRIMARY KEY (`id_vale`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_entrega`
--
ALTER TABLE `estado_entrega`
  MODIFY `id_estado_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `fk_un_med`
--
ALTER TABLE `fk_un_med`
  MODIFY `id_un_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jerarquias`
--
ALTER TABLE `jerarquias`
  MODIFY `id_jerarquia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `roles_groups`
--
ALTER TABLE `roles_groups`
  MODIFY `id_rol_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `sector_req`
--
ALTER TABLE `sector_req`
  MODIFY `id_sector_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vales_consumo`
--
ALTER TABLE `vales_consumo`
  MODIFY `id_vale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jerarquias`
--
ALTER TABLE `jerarquias`
  ADD CONSTRAINT `jerarquias_ibfk_1` FOREIGN KEY (`id_sector_jerarquia`) REFERENCES `sector_req` (`id_sector_req`);

--
-- Filtros para la tabla `roles_groups`
--
ALTER TABLE `roles_groups`
  ADD CONSTRAINT `roles_groups_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
