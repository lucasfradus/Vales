-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2018 a las 12:55:38
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
  `num_articulo` varchar(50) NOT NULL,
  `codigo_jde` int(40) NOT NULL,
  `descripcion1` char(255) NOT NULL,
  `descripcion2` char(255) NOT NULL,
  `id_un_med1` int(2) NOT NULL,
  `id_un_med2` int(2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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
(1, 1, 1, 1, 0),
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
(14, 3, 3, 0, 3),
(16, 1, 3, 0, 2),
(16, 2, 2, 1, 0),
(16, 3, 3, 1, 0),
(17, 1, 1, 1, 0),
(18, 1, 1, 1, 0),
(19, 1, 1, 1, 0),
(19, 2, 2, 1, 0),
(20, 1, 1, 1, 0),
(21, 1, 1, 1, 0),
(22, 2, 1, 1, 0),
(23, 1, 2, 1, 0),
(24, 1, 1, 0, 1),
(25, 1, 1, 0, 1),
(25, 2, 2, 0, 2),
(25, 3, 22, 0, 20),
(26, 1, 1, 1, 0),
(27, 1, 1, 1, 0),
(28, 1, 2, 1, 0),
(29, 1, 1, 1, 0),
(30, 1, 2, 1, 0),
(30, 2, 123, 1, 0),
(30, 3, 2222, 1, 0),
(31, 1, 1, 1, 0),
(32, 1, 1, 1, 0),
(33, 1, 1, 1, 0),
(34, 1, 1, 1, 0),
(34, 2, 10, 1, 0),
(35, 1, 1, 1, 0),
(36, 1, 1, 1, 0),
(37, 1, 1, 1, 0),
(38, 1, 1, 1, 0),
(39, 1, 1, 1, 0),
(40, 1, 1, 1, 0),
(41, 1, 1, 1, 0),
(42, 1, 1, 1, 0),
(43, 1, 1, 1, 0),
(45, 1, 3, 1, 0),
(45, 4, 1, 1, 0),
(46, 1, 3, 1, 0),
(46, 4, 1, 1, 0),
(47, 1, 3, 1, 0),
(47, 4, 1, 1, 0),
(48, 1, 3, 1, 0),
(48, 4, 1, 1, 0),
(49, 1, 1, 1, 0),
(49, 4, 2, 1, 0),
(52, 1, 1, 1, 0),
(53, 1, 1, 1, 0),
(54, 1, 1, 1, 0),
(56, 1, 1, 1, 0),
(57, 1, 1, 1, 0),
(58, 1, 1, 1, 0),
(60, 1, 1, 1, 0),
(60, 2, 2, 1, 0),
(60, 3, 33, 1, 0),
(60, 4, 44, 1, 0),
(60, 5, 55, 1, 0),
(60, 6, 66, 1, 0),
(60, 7, 77, 1, 0),
(61, 1, 1, 1, 0),
(62, 1, 1, 1, 0),
(63, 1, 1, 0, 1),
(63, 2, 2, 0, 2),
(63, 5, 44, 0, 3),
(64, 1, 1, 0, 1),
(64, 5, 56, 0, 1),
(65, 1, 1, 1, 0),
(66, 1, 1, 1, 0),
(67, 1, 1, 1, 0),
(68, 1, 1, 0, 1),
(69, 1, 1, 1, 0),
(70, 1, 1, 1, 0),
(71, 1, 1, 1, 0),
(72, 1, 1, 1, 0),
(72, 4, 2, 1, 0),
(73, 1, 1, 1, 0),
(73, 3, 2, 1, 0),
(73, 5, 3, 1, 0),
(74, 2, 1, 1, 0),
(74, 6, 3, 1, 0),
(74, 7, 44, 1, 0),
(75, 3, 2, 1, 0),
(75, 5, 3, 1, 0),
(75, 6, 33, 1, 0),
(76, 3, 2, 1, 0),
(76, 5, 3, 1, 0),
(77, 4, 1, 1, 0),
(77, 6, 2, 1, 0),
(78, 4, 3, 1, 0),
(78, 6, 2, 1, 0),
(79, 1, 1, 1, 0),
(79, 4, 2, 1, 0),
(79, 6, 3, 1, 0),
(80, 2, 2, 1, 0),
(80, 6, 3, 1, 0),
(80, 7, 3, 1, 0),
(81, 1, 1, 1, 0),
(81, 2, 333, 1, 0),
(81, 5, 44, 1, 0),
(82, 1, 1, 1, 0),
(82, 2, 2, 1, 0),
(82, 4, 3, 1, 0),
(83, 1, 1, 1, 0),
(83, 2, 2, 1, 0),
(84, 3, 1, 1, 0),
(84, 5, 3, 1, 0),
(85, 3, 2, 1, 0),
(85, 5, 3, 1, 0),
(86, 1, 2, 1, 0),
(86, 3, 3, 1, 0),
(87, 1, 1, 1, 0),
(87, 2, 2, 1, 0),
(87, 5, 3, 1, 0),
(88, 1, 1, 1, 0),
(88, 3, 2, 1, 0),
(89, 1, 1, 1, 0),
(89, 2, 2, 1, 0),
(89, 5, 3, 1, 0),
(90, 1, 1, 1, 0),
(90, 2, 2, 1, 0),
(90, 3, 3, 1, 0),
(90, 4, 4444, 1, 0),
(90, 5, 2, 1, 0),
(90, 6, 44, 1, 0),
(90, 7, 555, 1, 0),
(91, 1, 1, 1, 0),
(92, 1, 1, 1, 0),
(93, 1, 1, 1, 0),
(93, 3, 2, 1, 0),
(94, 1, 1, 1, 0),
(94, 4, 2, 1, 0),
(95, 2, 1, 1, 0),
(95, 3, 2, 1, 0),
(95, 6, 3, 1, 0),
(96, 1, 1, 1, 0),
(97, 1, 1, 1, 0),
(97, 2, 2, 1, 0),
(97, 5, 3, 1, 0),
(98, 1, 1, 1, 0),
(98, 3, 2, 1, 0),
(98, 6, 3, 1, 0),
(99, 1, 12, 1, 0),
(99, 5, 2, 1, 0),
(99, 7, 44, 1, 0),
(99, 6, 22, 1, 0),
(99, 3, 55, 1, 0),
(99, 4, 22, 1, 0),
(100, 1, 1, 1, 0),
(101, 1, 1, 1, 0),
(101, 2, 2, 1, 0),
(101, 5, 3, 1, 0),
(102, 1, 1, 0, 1),
(102, 2, 2, 0, 2),
(102, 4, 3, 1, 0),
(102, 6, 4, 1, 0),
(102, 7, 5, 1, 0),
(103, 2, 1, 1, 0),
(104, 1, 1, 1, 0),
(105, 1, 1, 1, 0),
(106, 1, 1, 1, 0),
(107, 1, 1, 1, 0),
(108, 1, 1, 1, 0),
(109, 1, 1, 1, 0),
(110, 1, 1, 1, 0),
(111, 2, 1, 1, 0),
(112, 2, 2, 1, 0),
(113, 1, 1, 1, 0),
(114, 1, 1, 1, 0),
(115, 1, 1, 1, 0),
(116, 1, 1, 1, 0),
(117, 1, 1, 1, 0),
(117, 4, 1, 1, 0),
(118, 2, 1, 1, 0),
(119, 7, 1, 1, 0),
(119, 6, 55, 1, 0),
(119, 2, 100, 1, 0),
(120, 1, 1, 1, 0),
(120, 2, 2, 1, 0),
(120, 5, 3, 1, 0),
(121, 1, 2, 1, 0),
(121, 4, 2, 1, 0),
(122, 1, 1, 1, 0),
(122, 2, 2, 1, 0),
(123, 1, 1, 1, 0),
(123, 6, 2, 1, 0),
(124, 1, 1, 1, 0),
(124, 4, 2, 1, 0),
(125, 1, 1, 1, 0),
(125, 6, 2, 1, 0),
(125, 3, 3, 1, 0),
(126, 3, 3, 1, 0),
(126, 1, 3, 1, 0),
(127, 1, 1, 1, 0),
(127, 4, 2, 1, 0),
(128, 1, 1, 1, 0),
(129, 1, 1, 1, 0),
(129, 2, 2, 1, 0),
(130, 1, 1, 1, 0),
(130, 4, 2, 1, 0),
(131, 4, 1, 1, 0),
(131, 6, 3, 1, 0),
(132, 1, 1, 1, 0),
(132, 2, 2, 1, 0),
(132, 4, 3, 1, 0),
(133, 1, 1, 1, 0),
(133, 3, 2, 1, 0),
(134, 1, 1, 0, 1),
(134, 4, 2, 0, 2),
(135, 5, 4, 0, 4),
(135, 2, 2, 0, 2),
(135, 7, 44, 0, 40),
(136, 4037, 222, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_queue`
--

CREATE TABLE `email_queue` (
  `id` int(11) NOT NULL,
  `to` varchar(255) NOT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `bcc` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `status` enum('pending','sending','sent','failed') DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `headers` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `email_queue`
--

INSERT INTO `email_queue` (`id`, `to`, `cc`, `bcc`, `message`, `status`, `date`, `headers`) VALUES
(53, 'admin@admin.com', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th {\r\n\r\n          border: 1px solid black;\r\n          height: 40px;\r\n          border-collapse: collapse;\r\n          vertical-align: bottom;\r\n          padding: 15px;\r\n          text-align: left;\r\n\r\n      }\r\n      tr:hover {background-color: #f5f5f5;}\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n		<h3>Vale de consumo creado satisfactoriamente.</h3>\r\n		<p>Se ha creado correctamente el vale de consumo numero #136. El mismo debe ser aprobado por el responsable del sector para que pueda ser preparado.</p><br>\r\n    <p>Requeridor: Admin, Admin</p><br>\r\n    <p>Sector Aprobador:SELECCIÓN</p><br>\r\n      <table>\r\n          <tread>\r\n            <tr>\r\n              <th>Código Articulo</th>\r\n              <th>Descripción 1</th>\r\n              <th>Cantidad Solicitada</th>\r\n            </tr>\r\n          </tread>\r\n          <tbody>\r\n                            <tr>\r\n                   <th>4037</th>\r\n                   <th>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Undefined index: descripcion</p>\n<p>Filename: email/new.php</p>\n<p>Line Number: 37</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\new.php<br />\n			Line: 37<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 80<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 476<br />\n			Function: Notify_owner			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div></th>\r\n                   <th>222</th>\r\n                <tr>\r\n                        </tbody>\r\n      </table>\r\n  </body><br>\r\n  Puede realizar un seguimiento del mismo <a href=\"http://localhost/Vales/vales_consumo/view/136\"> ACA </a>\r\n</html>\r\n', 'pending', '2018-03-20 16:18:44', '[Sistema de Vales #136]Nuevo Vale de Consumo #136'),
(47, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th {\r\n\r\n          border: 1px solid black;\r\n          height: 40px;\r\n          border-collapse: collapse;\r\n          vertical-align: bottom;\r\n          padding: 15px;\r\n          text-align: left;\r\n\r\n      }\r\n      tr:hover {background-color: #f5f5f5;}\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n    \r\n		<h3>[Sistema de Vales #53] Su vale ya esta listo para ser retirado</h3>\r\n    <p><strong>Comentarios añadidos:</strong> hola!!!!!!!!!!!!!!!!!!</p>\r\n    <p><strong>Responsable:</strong>Lucas a, Fradusco</p>\r\n    <p><strong>Fecha de Creación:</strong> 02/05/2018 14:46:21</p>\r\n  <p>Su vale de consumo puede ser pasado a retirar por Pañol. <br> <strong>Detalle de Articulos a Entregar</strong><table>\r\n              <thead>\r\n                <tr>\r\n                  <th>Código Articulo</th>\r\n                  <th>Descripción 1</th>\r\n                  <th>Cantidad Solicitada</th>\r\n                  <th>Cantidad a Entregar</th>\r\n                </tr>\r\n              </thead>\r\n              <tbody>\r\n                \r\n                    <tr>\r\n                       <th>1</th>\r\n                       <th>Item de Prueba 1</th>\r\n                       <th>1</th>\r\n                       <th>0</th>\r\n                    <tr></tbody>\r\n                                </table></p>\r\n\r\n</body>\r\n</html>\r\n', 'sent', '2018-03-15 16:18:40', '[Sistema de Vales #53] Su vale ya esta listo para ser retirado'),
(48, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th {\r\n\r\n          border: 1px solid black;\r\n          height: 40px;\r\n          border-collapse: collapse;\r\n          vertical-align: bottom;\r\n          padding: 15px;\r\n          text-align: left;\r\n\r\n      }\r\n      tr:hover {background-color: #f5f5f5;}\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n    \r\n		<h3>[Sistema de Vales #49] Su vale ya esta listo para ser retirado</h3>\r\n    <p><strong>Comentarios añadidos:</strong> faltan los ganchos nada mas.</p>\r\n    <p><strong>Responsable:</strong>Lucas a, Fradusco</p>\r\n    <p><strong>Fecha de Creación:</strong> 02/05/2018 13:39:40</p>\r\n  <p>Su vale de consumo puede ser pasado a retirar por Pañol. <br> <strong>Detalle de Articulos a Entregar</strong><table>\r\n              <thead>\r\n                <tr>\r\n                  <th>Código Articulo</th>\r\n                  <th>Descripción 1</th>\r\n                  <th>Cantidad Solicitada</th>\r\n                  <th>Cantidad a Entregar</th>\r\n                </tr>\r\n              </thead>\r\n              <tbody>\r\n                \r\n                    <tr>\r\n                       <th>1</th>\r\n                       <th>Item de Prueba 1</th>\r\n                       <th>1</th>\r\n                       <th>0</th>\r\n                    <tr>\r\n                    <tr>\r\n                       <th>4</th>\r\n                       <th>Articulo de Prueba 4</th>\r\n                       <th>2</th>\r\n                       <th>0</th>\r\n                    <tr></tbody>\r\n                                </table></p>\r\n\r\n</body>\r\n</html>\r\n', 'sent', '2018-03-15 16:20:17', '[Sistema de Vales #49] Su vale ya esta listo para ser retirado'),
(49, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th {\r\n\r\n          border: 1px solid black;\r\n          height: 40px;\r\n          border-collapse: collapse;\r\n          vertical-align: bottom;\r\n          padding: 15px;\r\n          text-align: left;\r\n\r\n      }\r\n      tr:hover {background-color: #f5f5f5;}\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n    \r\n		<h3>[Sistema de Vales #57] Su vale ha sido Rechazado por falta de stock</h3>\r\n    <p><strong>Comentarios añadidos:</strong> no hay stock, carga de nuevo en una semana.\n</p>\r\n    <p><strong>Responsable:</strong>Lucas a, Fradusco</p>\r\n    <p><strong>Fecha de Creación:</strong> 02/06/2018 09:21:44</p>\r\n  <p>eeeee</p>\r\n\r\n</body>\r\n</html>\r\n', 'sent', '2018-03-15 16:20:22', '[Sistema de Vales #57] Su vale ha sido Rechazado por falta de stock'),
(50, 'admin@admin.com', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th {\r\n\r\n          border: 1px solid black;\r\n          height: 40px;\r\n          border-collapse: collapse;\r\n          vertical-align: bottom;\r\n          padding: 15px;\r\n          text-align: left;\r\n\r\n      }\r\n      tr:hover {background-color: #f5f5f5;}\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n    \r\n		<h3>[Sistema de Vales #30] Su vale ha sido retirado</h3>\r\n    <p><strong>Comentarios añadidos:</strong> gracias.\n</p>\r\n    <p><strong>Responsable:</strong>Lucas a, Fradusco</p>\r\n    <p><strong>Fecha de Creación:</strong> 01/29/2018 17:29:41</p>\r\n  <p>eeeee</p>\r\n\r\n</body>\r\n</html>\r\n', 'sent', '2018-03-15 16:22:19', '[Sistema de Vales #30] Su vale ha sido retirado'),
(51, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th {\r\n\r\n          border: 1px solid black;\r\n          height: 40px;\r\n          border-collapse: collapse;\r\n          vertical-align: bottom;\r\n          padding: 15px;\r\n          text-align: left;\r\n\r\n      }\r\n      tr:hover {background-color: #f5f5f5;}\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n    \r\n		<h3>[Sistema de Vales #35] Su vale ha sido retirado</h3>\r\n    <p><strong>Comentarios añadidos:</strong> grs</p>\r\n    <p><strong>Responsable:</strong>Lucas a, Fradusco</p>\r\n    <p><strong>Fecha de Creación:</strong> 01/30/2018 09:40:08</p>\r\n  <p>eeeee</p>\r\n\r\n</body>\r\n</html>\r\n', 'sent', '2018-03-15 16:23:24', '[Sistema de Vales #35] Su vale ha sido retirado'),
(52, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th {\r\n\r\n          border: 1px solid black;\r\n          height: 40px;\r\n          border-collapse: collapse;\r\n          vertical-align: bottom;\r\n          padding: 15px;\r\n          text-align: left;\r\n\r\n      }\r\n      tr:hover {background-color: #f5f5f5;}\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n    \r\n		<h3>[Sistema de Vales #49] Su vale ha sido Rechazado por falta de stock</h3>\r\n    <p><strong>Comentarios añadidos:</strong> no hay stock papu</p>\r\n    <p><strong>Responsable:</strong>Lucas a, Fradusco</p>\r\n    <p><strong>Fecha de Creación:</strong> 05/02/2018 13:39:40</p>\r\n  <p>Por Cualquier inconveniente comuniquese con pañol</p>\r\n\r\n</body>\r\n</html>\r\n', 'sent', '2018-03-15 16:43:57', '[Sistema de Vales #49] Su vale ha sido Rechazado por falta de stock'),
(42, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th, tr {\r\n          border: 1px solid black;\r\n          border-collapse: collapse;\r\n      }\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n		<h3>Su Vale ha sido Aprobado</h3>\r\n    <p>Comentarios: todo ok.</p><br>\r\n    <p>Responsable:Lucas a, Fradusco</p><br>\r\n\r\n  </body><br>\r\n      <p>Una vez que este listo para ser retirado recibirá una notificación indicando esto.\r\n    </p>\r\n    \r\n\r\n</html>\r\n', 'sent', '2018-03-15 15:55:38', '[Sistema de Vales #135] Su vale ha sido Aprobado'),
(43, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th, tr {\r\n          border: 1px solid black;\r\n          border-collapse: collapse;\r\n      }\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n		<h3>Su Vale ha sido Aprobado</h3>\r\n    <p>Comentarios: </p><br>\r\n    <p>Responsable:Lucas a, Fradusco</p><br>\r\n\r\n  </body><br>\r\n      <p>Una vez que este listo para ser retirado recibirá una notificación indicando esto.\r\n    </p>\r\n    \r\n\r\n</html>\r\n', 'sent', '2018-03-15 15:55:43', '[Sistema de Vales #134] Su vale ha sido Aprobado'),
(44, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th, tr {\r\n          border: 1px solid black;\r\n          border-collapse: collapse;\r\n      }\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n		<h3>Su Vale ha sido Aprobado</h3>\r\n    <p>Comentarios: </p><br>\r\n    <p>Responsable:Lucas a, Fradusco</p><br>\r\n\r\n  </body><br>\r\n      <p>Una vez que este listo para ser retirado recibirá una notificación indicando esto.\r\n    </p>\r\n    \r\n\r\n</html>\r\n', 'sent', '2018-03-15 15:55:48', '[Sistema de Vales #68] Su vale ha sido Aprobado'),
(45, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th {\r\n\r\n          border: 1px solid black;\r\n          height: 40px;\r\n          border-collapse: collapse;\r\n          vertical-align: bottom;\r\n          padding: 15px;\r\n          text-align: left;\r\n\r\n      }\r\n      tr:hover {background-color: #f5f5f5;}\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n    \r\n		<h3>[Sistema de Vales #135] Su vale ya esta listo para ser retirado</h3>\r\n    <p><strong>Comentarios añadidos:</strong> hola que tal</p>\r\n    <p><strong>Responsable:</strong>Lucas a, Fradusco</p>\r\n    <p><strong>Fecha de Creación:</strong> 03/15/2018 15:46:31</p>\r\n  <p>Su vale de consumo puede ser pasado a retirar por Pañol. <br> <strong>Detalle de Articulos a Entregar</strong><table>\r\n              <thead>\r\n                <tr>\r\n                  <th>Código Articulo</th>\r\n                  <th>Descripción 1</th>\r\n                  <th>Cantidad Solicitada</th>\r\n                  <th>Cantidad a Entregar</th>\r\n                </tr>\r\n              </thead>\r\n              <tbody>\r\n                \r\n                    <tr>\r\n                       <th>5</th>\r\n                       <th>Articulo de Prueba 5</th>\r\n                       <th>4</th>\r\n                       <th>4</th>\r\n                    <tr>\r\n                    <tr>\r\n                       <th>2</th>\r\n                       <th>Item de Prueba 2</th>\r\n                       <th>2</th>\r\n                       <th>2</th>\r\n                    <tr>\r\n                    <tr>\r\n                       <th>7</th>\r\n                       <th>Articulo de Prueba 7</th>\r\n                       <th>44</th>\r\n                       <th>40</th>\r\n                    <tr></tbody>\r\n                                </table></p>\r\n\r\n</body>\r\n</html>\r\n', 'sent', '2018-03-15 15:57:19', '[Sistema de Vales #135] Su vale ya esta listo para ser retirado'),
(46, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th {\r\n\r\n          border: 1px solid black;\r\n          height: 40px;\r\n          border-collapse: collapse;\r\n          vertical-align: bottom;\r\n          padding: 15px;\r\n          text-align: left;\r\n\r\n      }\r\n      tr:hover {background-color: #f5f5f5;}\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n    \r\n		<h3>[Sistema de Vales #135] Su vale ya esta listo para ser retirado</h3>\r\n    <p><strong>Comentarios añadidos:</strong> hola que tal</p>\r\n    <p><strong>Responsable:</strong>Lucas a, Fradusco</p>\r\n    <p><strong>Fecha de Creación:</strong> 03/15/2018 15:46:31</p>\r\n  <p>Su vale de consumo puede ser pasado a retirar por Pañol. <br> <strong>Detalle de Articulos a Entregar</strong><table>\r\n              <thead>\r\n                <tr>\r\n                  <th>Código Articulo</th>\r\n                  <th>Descripción 1</th>\r\n                  <th>Cantidad Solicitada</th>\r\n                  <th>Cantidad a Entregar</th>\r\n                </tr>\r\n              </thead>\r\n              <tbody>\r\n                \r\n                    <tr>\r\n                       <th>5</th>\r\n                       <th>Articulo de Prueba 5</th>\r\n                       <th>4</th>\r\n                       <th>4</th>\r\n                    <tr>\r\n                    <tr>\r\n                       <th>2</th>\r\n                       <th>Item de Prueba 2</th>\r\n                       <th>2</th>\r\n                       <th>2</th>\r\n                    <tr>\r\n                    <tr>\r\n                       <th>7</th>\r\n                       <th>Articulo de Prueba 7</th>\r\n                       <th>44</th>\r\n                       <th>40</th>\r\n                    <tr></tbody>\r\n                                </table></p>\r\n\r\n</body>\r\n</html>\r\n', 'sent', '2018-03-15 16:12:11', '[Sistema de Vales #135] Su vale ya esta listo para ser retirado'),
(38, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th, tr {\r\n          border: 1px solid black;\r\n          border-collapse: collapse;\r\n      }\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n    \r\n		<h3>[Sistema de Vales #30] Su vale ya esta listo para ser retirado</h3>\r\n    <p>Comentarios: hola que tal</p><br>\r\n\r\n    <p>Responsable:Lucas a, Fradusco</p><br>\r\n\r\n  </body><br>\r\n  <p></p>\r\n\r\n\r\n</html>\r\n', 'sent', '2018-03-15 10:48:26', '[Sistema de Vales #30] Su vale ya esta listo para ser retirado'),
(39, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th {\r\n\r\n          border: 1px solid black;\r\n          height: 40px;\r\n          border-collapse: collapse;\r\n          vertical-align: bottom;\r\n          padding: 15px;\r\n          text-align: left;\r\n\r\n      }\r\n      tr:hover {background-color: #f5f5f5;}\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n		<h3>Vale de consumo creado satisfactoriamente.</h3>\r\n		<p>Se ha creado correctamente el vale de consumo numero #135. El mismo debe ser aprobado por el responsable del sector para que pueda ser preparado.</p><br>\r\n    <p>Requeridor: Fradusco, Lucas a</p><br>\r\n    <p>Sector Aprobador:MOLINO DISCONTINUO</p><br>\r\n      <table>\r\n          <tread>\r\n            <tr>\r\n              <th>Código Articulo</th>\r\n              <th>Descripción 1</th>\r\n              <th>Cantidad Solicitada</th>\r\n            </tr>\r\n          </tread>\r\n          <tbody>\r\n                            <tr>\r\n                   <th>5</th>\r\n                   <th> Articulo de Prueba 5 </th>\r\n                   <th>4</th>\r\n                <tr>\r\n                              <tr>\r\n                   <th>2</th>\r\n                   <th> Item de Prueba 2 </th>\r\n                   <th>2</th>\r\n                <tr>\r\n                              <tr>\r\n                   <th>7</th>\r\n                   <th> Articulo de Prueba 7 </th>\r\n                   <th>44</th>\r\n                <tr>\r\n                        </tbody>\r\n      </table>\r\n  </body><br>\r\n  Puede realizar un seguimiento del mismo <a href=\"http://localhost/Vales/vales_consumo/view/135\"> ACA </a>\r\n</html>\r\n', 'sent', '2018-03-15 15:46:42', '[Sistema de Vales #135]Nuevo Vale de Consumo #135'),
(40, 'rvarios@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th {\r\n\r\n          border: 1px solid black;\r\n          height: 40px;\r\n          border-collapse: collapse;\r\n          vertical-align: bottom;\r\n          padding: 15px;\r\n          text-align: left;\r\n\r\n      }\r\n      tr:hover {background-color: #f5f5f5;}\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n		<h3>Hay un nuevo vale aguardando aprobación.</h3>\r\n    <p>Requeridor: Fradusco, Lucas a</p><br>\r\n    <p>Sector Aprobador:MOLINO DISCONTINUO</p><br>\r\n      <table>\r\n          <tread>\r\n            <tr>\r\n              <th>Código Articulo</th>\r\n              <th>Descripción 1</th>\r\n              <th>Cantidad Solicitada</th>\r\n            </tr>\r\n          </tread>\r\n          <tbody>\r\n                            <tr>\r\n                   <th>5</th>\r\n                   <th> Articulo de Prueba 5 </th>\r\n                   <th>4</th>\r\n                <tr>\r\n                              <tr>\r\n                   <th>2</th>\r\n                   <th> Item de Prueba 2 </th>\r\n                   <th>2</th>\r\n                <tr>\r\n                              <tr>\r\n                   <th>7</th>\r\n                   <th> Articulo de Prueba 7 </th>\r\n                   <th>44</th>\r\n                <tr>\r\n                        </tbody>\r\n      </table>\r\n  </body><br>\r\n  Puede realizar un seguimiento del mismo <a href=\"http://localhost/Vales/vales_consumo/view/135\"> ACA </a>\r\n  <br>\r\n  Acciones Rápidas:\r\n <a href=\"http://localhost/Vales/vales_consumo/view/135\"> Aprobar</a>|<a href=\"http://localhost/Vales/vales_consumo/view/135\"> Rechazar</a>\r\n</html>\r\n', 'sent', '2018-03-15 15:46:47', 'Nuevo Vale para Aprobar. #135'),
(41, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th, tr {\r\n          border: 1px solid black;\r\n          border-collapse: collapse;\r\n      }\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n		<h3>Su Vale ha sido Aprobado</h3>\r\n    <p>Comentarios: todo ok.</p><br>\r\n    <p>Responsable:Lucas a, Fradusco</p><br>\r\n\r\n  </body><br>\r\n      <p>Una vez que este listo para ser retirado recibirá una notificación indicando esto.\r\n    </p>\r\n    \r\n\r\n</html>\r\n', 'sent', '2018-03-15 15:52:10', '[Sistema de Vales #67] Su vale ha sido Aprobado'),
(37, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th, tr {\r\n          border: 1px solid black;\r\n          border-collapse: collapse;\r\n      }\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n    \n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Undefined property: stdClass::$id_item</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 38</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 38<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 129<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 482<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Undefined property: stdClass::$id_item</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 38</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 38<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 129<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 482<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Undefined property: stdClass::$id_item</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 38</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 38<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 129<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 482<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\r\n		<h3>[Sistema de Vales #30] Su vale ya esta listo para ser retirado</h3>\r\n    <p>Comentarios: hola que tal</p><br>\r\n\r\n    <p>Responsable:Lucas a, Fradusco</p><br>\r\n\r\n  </body><br>\r\n  <p></p>\r\n\r\n\r\n</html>\r\n', 'sent', '2018-03-15 10:46:44', '[Sistema de Vales #30] Su vale ya esta listo para ser retirado'),
(36, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th, tr {\r\n          border: 1px solid black;\r\n          border-collapse: collapse;\r\n      }\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n    \n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Warning</p>\n<p>Message:  A non-numeric value encountered</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 24</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 24<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 129<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 482<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Warning</p>\n<p>Message:  A non-numeric value encountered</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 24</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 24<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 129<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 482<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Undefined property: stdClass::$id_item</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 38</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 38<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 129<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 482<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Warning</p>\n<p>Message:  A non-numeric value encountered</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 41</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 41<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 129<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 482<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Undefined property: stdClass::$id_item</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 38</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 38<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 129<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 482<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Warning</p>\n<p>Message:  A non-numeric value encountered</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 41</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 41<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 129<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 482<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Undefined property: stdClass::$id_item</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 38</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 38<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 129<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 482<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Warning</p>\n<p>Message:  A non-numeric value encountered</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 41</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 41<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 129<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 482<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Warning</p>\n<p>Message:  A non-numeric value encountered</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 44</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 44<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 129<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 482<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\r\n		<h3>[Sistema de Vales #30] Su vale ya esta listo para ser retirado</h3>\r\n    <p>Comentarios: hola que tal</p><br>\r\n\r\n    <p>Responsable:Lucas a, Fradusco</p><br>\r\n\r\n  </body><br>\r\n  <p></p>\r\n\r\n\r\n</html>\r\n', 'sent', '2018-03-15 10:43:26', '[Sistema de Vales #30] Su vale ya esta listo para ser retirado'),
(35, 'lfradusco@ilva.com.ar', NULL, NULL, '<!doctype html>\r\n<html>\r\n  <head>\r\n    <meta charset=\"UTF-8\">\r\n    <style>\r\n      th, tr {\r\n          border: 1px solid black;\r\n          border-collapse: collapse;\r\n      }\r\n</style>\r\n    <link href=\"http://getbootstrap.com/dist/css/bootstrap.min.css\" rel=\"stylesheet\" />\r\n  </head>\r\n  <body>\r\n    \n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Object of class stdClass could not be converted to int</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 15</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 15<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 133<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 476<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Object of class stdClass could not be converted to int</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 19</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 19<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 133<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 476<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Object of class stdClass could not be converted to int</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 23</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 23<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 133<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 476<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Object of class stdClass could not be converted to int</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 27</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 27<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 133<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 476<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\r\n		<h3>\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Undefined variable: inicio</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 34</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 34<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 133<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 476<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div></h3>\r\n    <p>Comentarios: hola que tal</p><br>\r\n\r\n    <p>Responsable:Lucas a, Fradusco</p><br>\r\n\r\n  </body><br>\r\n  \n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was encountered</h4>\n\n<p>Severity: Notice</p>\n<p>Message:  Undefined variable: id_estado_aprobacion</p>\n<p>Filename: email/update_status.php</p>\n<p>Line Number: 40</p>\n\n\n	<p>Backtrace:</p>\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\views\\email\\update_status.php<br />\n			Line: 40<br />\n			Function: _error_handler			</p>\n\n		\n	\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\libraries\\generales.php<br />\n			Line: 133<br />\n			Function: view			</p>\n\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\application\\controllers\\Vales_consumo.php<br />\n			Line: 476<br />\n			Function: Notify_owner_ready			</p>\n\n		\n	\n		\n	\n		\n			<p style=\"margin-left:10px\">\n			File: C:\\xampp\\htdocs\\Vales\\index.php<br />\n			Line: 315<br />\n			Function: require_once			</p>\n\n		\n	\n\n</div>\r\n\r\n</html>\r\n', 'sent', '2018-03-15 10:08:06', '[Sistema de Vales #30] Su vale ya esta listo para ser retirado');

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
(6, 'Rechazado por falta de Stock'),
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
(14, 2, 1514578731, 1, 'todo ok. proceder.\r\n'),
(13, 3, 1514902526, 1, ''),
(16, 1, 1515081093, 1, ''),
(16, 2, 1515081132, 1, 'a'),
(18, 1, 1515095089, 2, ''),
(18, 2, 1515095113, 1, ''),
(19, 1, 1515682114, 1, ''),
(19, 2, 1515682174, 1, ''),
(20, 1, 1515701448, 1, ''),
(20, 2, 1515701456, 1, ''),
(22, 1, 1515781103, 1, ''),
(22, 1, 1515781135, 1, ''),
(22, 1, 1515781152, 1, ''),
(22, 1, 1515782154, 1, ''),
(22, 1, 1515782163, 1, ''),
(22, 1, 1515782182, 1, ''),
(22, 1, 1515782230, 1, ''),
(23, 1, 1515782257, 1, ''),
(23, 1, 1515782283, 1, ''),
(23, 1, 1515782285, 1, ''),
(23, 1, 1515782380, 1, ''),
(23, 1, 1515782425, 1, ''),
(23, 1, 1515782436, 1, ''),
(24, 1, 1516381688, 1, ''),
(24, 2, 1516381717, 1, ''),
(25, 1, 1516388277, 1, ''),
(25, 2, 1516388312, 2, 'Todo OK, avanzar'),
(26, 1, 1516812718, 1, ''),
(27, 1, 1516995079, 2, ''),
(28, 1, 1516995086, 2, ''),
(29, 1, 1516997593, 2, ''),
(29, 2, 1516997612, 2, ''),
(30, 1, 1517257798, 1, ''),
(35, 1, 1517316011, 2, ''),
(49, 2, 1517848799, 2, 'todo ok'),
(60, 1, 1517921037, 2, ''),
(61, 1, 1517925582, 2, ''),
(62, 1, 1517925615, 2, ''),
(63, 1, 1517936038, 2, ''),
(63, 2, 1517936242, 2, 'todo en orden.'),
(64, 1, 1519228377, 2, ''),
(54, 2, 1519228415, 2, 'gil'),
(64, 2, 1519228427, 2, ''),
(65, 1, 1520347538, 2, ''),
(66, 1, 1520347664, 2, ''),
(67, 1, 1520347746, 2, ''),
(68, 1, 1520347808, 2, ''),
(69, 1, 1520347828, 2, ''),
(70, 1, 1520347858, 2, ''),
(71, 1, 1520347924, 2, ''),
(72, 1, 1520348188, 2, ''),
(73, 1, 1520348234, 2, ''),
(74, 1, 1520350934, 2, ''),
(75, 1, 1520351189, 2, ''),
(76, 1, 1520354441, 2, ''),
(77, 1, 1520354478, 2, ''),
(78, 1, 1520354514, 2, ''),
(79, 1, 1520354585, 2, ''),
(80, 1, 1520354637, 2, ''),
(81, 1, 1520354684, 2, ''),
(82, 1, 1520354928, 2, ''),
(83, 1, 1520355031, 2, ''),
(84, 1, 1520355875, 2, ''),
(85, 1, 1520356520, 2, ''),
(86, 1, 1520356583, 2, ''),
(87, 1, 1520356637, 2, ''),
(88, 1, 1520356747, 2, ''),
(89, 1, 1520356972, 2, ''),
(90, 1, 1520357037, 2, ''),
(91, 1, 1520357311, 2, ''),
(92, 1, 1520358669, 2, ''),
(93, 1, 1520358855, 2, ''),
(94, 1, 1520365575, 2, ''),
(95, 1, 1520365875, 2, ''),
(96, 1, 1520365960, 2, ''),
(97, 1, 1520366095, 2, ''),
(98, 1, 1520366304, 2, ''),
(99, 1, 1520366754, 2, ''),
(100, 1, 1520367683, 2, ''),
(101, 1, 1520367920, 2, ''),
(22, 2, 1520427164, 2, ''),
(27, 2, 1520427172, 2, ''),
(102, 1, 1520427215, 2, ''),
(102, 2, 1520427274, 2, ''),
(103, 1, 1520451920, 2, ''),
(104, 1, 1520452100, 2, ''),
(105, 1, 1520511618, 2, ''),
(106, 1, 1520511662, 2, ''),
(107, 1, 1520511682, 2, ''),
(108, 1, 1520511775, 2, ''),
(109, 1, 1520511917, 2, ''),
(110, 1, 1520512218, 2, ''),
(111, 1, 1520520466, 2, ''),
(112, 1, 1520520496, 2, ''),
(113, 1, 1520529172, 2, ''),
(114, 1, 1520529214, 2, ''),
(115, 1, 1520529245, 2, ''),
(116, 1, 1520529267, 2, ''),
(117, 1, 1520624855, 1, ''),
(118, 1, 1520626903, 1, ''),
(119, 1, 1520627037, 2, ''),
(120, 1, 1520869073, 8, ''),
(121, 1, 1520881199, 8, ''),
(122, 1, 1520881326, 8, ''),
(123, 1, 1520881524, 8, ''),
(124, 1, 1520881647, 8, ''),
(125, 1, 1520881748, 8, ''),
(126, 1, 1520881794, 8, ''),
(127, 1, 1520881842, 8, ''),
(128, 1, 1520881945, 8, ''),
(129, 1, 1520882339, 8, ''),
(130, 1, 1520942239, 2, ''),
(131, 1, 1520944296, 2, ''),
(132, 1, 1520944437, 2, ''),
(133, 1, 1521041866, 2, ''),
(134, 1, 1521045227, 2, ''),
(23, 2, 1521047499, 2, ''),
(26, 2, 1521047550, 2, ''),
(28, 2, 1521047571, 2, ''),
(30, 2, 1521047638, 2, ''),
(35, 2, 1521050423, 2, 'GILLLL'),
(35, 2, 1521050451, 2, 'GILLLL'),
(52, 3, 1521050487, 2, 'NADIE TE VA A APROBAR ESO GIL'),
(53, 2, 1521050558, 2, 'muy bien.\r\n'),
(56, 3, 1521050567, 2, 'no cuple con lo solicitado.\r\n'),
(57, 2, 1521050674, 2, ''),
(58, 3, 1521050678, 2, 'asfdsafa'),
(60, 2, 1521050682, 2, 'sadasda'),
(65, 3, 1521050686, 2, 'asdasa'),
(61, 2, 1521050783, 2, 'asdas'),
(62, 2, 1521050786, 2, ''),
(66, 2, 1521050997, 2, ''),
(135, 1, 1521139591, 2, ''),
(67, 2, 1521139917, 2, 'todo ok.'),
(135, 2, 1521139955, 2, 'todo ok.'),
(134, 2, 1521140090, 2, ''),
(68, 2, 1521140107, 2, ''),
(136, 1, 1521573524, 1, '');

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
(14, 5, 1514578952, 2, ''),
(13, 9, 1514902526, 1, ''),
(11, 4, 1515075526, 1, ''),
(11, 5, 1515076292, 1, 'todo flama'),
(6, 4, 1515076396, 1, 'venite a verlo.\n'),
(6, 5, 1515076446, 1, ''),
(6, 5, 1515076457, 1, 'todo ok'),
(2, 5, 1515076464, 1, 'todo ok.\n'),
(15, 1, 1515076982, 1, ''),
(1, 5, 1515077306, 1, ''),
(1, 4, 1515077325, 1, ''),
(1, 5, 1515077430, 1, ''),
(1, 4, 1515077447, 1, ''),
(1, 5, 1515077654, 1, ''),
(16, 1, 1515081083, 1, ''),
(16, 2, 1515081093, 1, ''),
(17, 1, 1515081098, 1, ''),
(16, 3, 1515081132, 1, ''),
(16, 4, 1515083541, 2, ''),
(16, 5, 1515095062, 2, ''),
(16, 5, 1515095075, 2, 'ok'),
(18, 1, 1515095088, 2, ''),
(18, 2, 1515095089, 2, ''),
(18, 3, 1515095113, 1, ''),
(18, 4, 1515095121, 1, ''),
(18, 3, 1515095302, 1, ''),
(18, 4, 1515095313, 1, ''),
(18, 3, 1515095428, 1, ''),
(18, 4, 1515095539, 1, ''),
(18, 3, 1515095549, 1, ''),
(18, 4, 1515095574, 1, ''),
(18, 3, 1515095604, 1, ''),
(18, 4, 1515095669, 1, ''),
(18, 3, 1515095881, 1, ''),
(18, 3, 1515096401, 1, ''),
(18, 3, 1515096427, 1, ''),
(18, 3, 1515096448, 1, ''),
(18, 3, 1515096454, 1, ''),
(18, 3, 1515096501, 1, ''),
(18, 4, 1515096526, 1, ''),
(18, 3, 1515096535, 1, ''),
(18, 4, 1515096579, 1, ''),
(18, 5, 1515096591, 1, ''),
(19, 1, 1515682109, 1, ''),
(19, 2, 1515682114, 1, ''),
(19, 3, 1515682174, 1, ''),
(19, 4, 1515682282, 1, ''),
(19, 5, 1515682296, 1, ''),
(20, 1, 1515701447, 1, ''),
(20, 2, 1515701448, 1, ''),
(20, 3, 1515701456, 1, ''),
(20, 4, 1515701494, 1, ''),
(20, 4, 1515701507, 1, ''),
(20, 5, 1515701512, 1, ''),
(20, 5, 1515701537, 1, 'asdasfafsdf'),
(21, 1, 1515777708, 1, ''),
(22, 1, 1515781102, 1, ''),
(22, 2, 1515781103, 1, ''),
(22, 2, 1515781135, 1, ''),
(22, 2, 1515781152, 1, ''),
(22, 2, 1515782154, 1, ''),
(22, 2, 1515782163, 1, ''),
(22, 2, 1515782182, 1, ''),
(22, 2, 1515782230, 1, ''),
(23, 1, 1515782256, 1, ''),
(23, 2, 1515782257, 1, ''),
(23, 2, 1515782283, 1, ''),
(23, 2, 1515782285, 1, ''),
(23, 2, 1515782380, 1, ''),
(23, 2, 1515782425, 1, ''),
(23, 2, 1515782436, 1, ''),
(24, 1, 1516381687, 1, ''),
(24, 2, 1516381688, 1, ''),
(24, 3, 1516381717, 1, ''),
(25, 1, 1516388270, 1, ''),
(25, 2, 1516388277, 1, ''),
(25, 3, 1516388312, 2, ''),
(25, 4, 1516621510, 2, 'ya esta todo.\n'),
(24, 4, 1516649893, 2, ''),
(26, 1, 1516812716, 1, ''),
(26, 2, 1516812718, 1, ''),
(27, 1, 1516995077, 2, ''),
(27, 2, 1516995079, 2, ''),
(28, 1, 1516995085, 2, ''),
(28, 2, 1516995086, 2, ''),
(29, 1, 1516997592, 2, ''),
(29, 2, 1516997593, 2, ''),
(29, 3, 1516997612, 2, ''),
(30, 1, 1517257781, 1, ''),
(30, 2, 1517257798, 1, ''),
(31, 1, 1517313560, 2, ''),
(32, 1, 1517313644, 2, ''),
(33, 1, 1517313746, 2, ''),
(33, 9, 1517313749, 2, ''),
(34, 1, 1517313753, 2, ''),
(35, 1, 1517316008, 2, ''),
(35, 2, 1517316011, 2, ''),
(36, 1, 1517316174, 2, ''),
(36, 9, 1517316205, 2, ''),
(37, 1, 1517316221, 2, ''),
(38, 1, 1517316246, 2, ''),
(39, 1, 1517316547, 2, ''),
(40, 1, 1517316580, 2, ''),
(41, 1, 1517316631, 2, ''),
(42, 1, 1517316712, 2, ''),
(43, 1, 1517316740, 2, ''),
(43, 9, 1517316741, 2, ''),
(44, 2, 1517845174, 2, ''),
(45, 2, 1517845651, 2, ''),
(46, 2, 1517845676, 2, ''),
(47, 2, 1517845678, 2, ''),
(48, 2, 1517845679, 2, ''),
(49, 2, 1517848780, 2, ''),
(49, 3, 1517848799, 2, ''),
(50, 2, 1517852229, 2, ''),
(51, 2, 1517852233, 2, ''),
(52, 2, 1517852716, 2, ''),
(53, 2, 1517852781, 2, ''),
(54, 2, 1517856714, 2, ''),
(55, 2, 1517919151, 2, ''),
(56, 2, 1517919364, 2, ''),
(57, 2, 1517919704, 2, ''),
(58, 2, 1517920881, 2, ''),
(60, 2, 1517921037, 2, ''),
(61, 2, 1517925582, 2, ''),
(62, 2, 1517925615, 2, ''),
(63, 2, 1517936038, 2, ''),
(63, 3, 1517936242, 2, ''),
(63, 4, 1517936315, 2, 'podes pasar a retirarlo ya.'),
(64, 2, 1519228377, 2, ''),
(54, 3, 1519228415, 2, ''),
(64, 3, 1519228427, 2, ''),
(64, 4, 1519228501, 2, ''),
(24, 5, 1519228527, 2, ''),
(25, 5, 1519228536, 2, ''),
(64, 5, 1519228553, 2, 'ff'),
(54, 5, 1519228580, 2, ''),
(65, 2, 1520347538, 2, ''),
(66, 2, 1520347664, 2, ''),
(67, 2, 1520347746, 2, ''),
(68, 2, 1520347808, 2, ''),
(69, 2, 1520347828, 2, ''),
(70, 2, 1520347858, 2, ''),
(71, 2, 1520347924, 2, ''),
(72, 2, 1520348188, 2, ''),
(73, 2, 1520348234, 2, ''),
(74, 2, 1520350934, 2, ''),
(75, 2, 1520351189, 2, ''),
(76, 2, 1520354441, 2, ''),
(77, 2, 1520354478, 2, ''),
(78, 2, 1520354514, 2, ''),
(79, 2, 1520354585, 2, ''),
(80, 2, 1520354637, 2, ''),
(81, 2, 1520354684, 2, ''),
(82, 2, 1520354928, 2, ''),
(83, 2, 1520355031, 2, ''),
(84, 2, 1520355875, 2, ''),
(85, 2, 1520356520, 2, ''),
(86, 2, 1520356583, 2, ''),
(87, 2, 1520356637, 2, ''),
(88, 2, 1520356747, 2, ''),
(89, 2, 1520356972, 2, ''),
(90, 2, 1520357037, 2, ''),
(91, 2, 1520357311, 2, ''),
(92, 2, 1520358669, 2, ''),
(93, 2, 1520358855, 2, ''),
(94, 2, 1520365575, 2, ''),
(95, 2, 1520365875, 2, ''),
(96, 2, 1520365960, 2, ''),
(97, 2, 1520366095, 2, ''),
(98, 2, 1520366304, 2, ''),
(99, 2, 1520366754, 2, ''),
(100, 2, 1520367683, 2, ''),
(101, 2, 1520367920, 2, ''),
(22, 3, 1520427164, 2, ''),
(27, 3, 1520427172, 2, ''),
(102, 2, 1520427215, 2, ''),
(102, 3, 1520427274, 2, ''),
(102, 4, 1520427354, 2, ''),
(22, 5, 1520427520, 2, ''),
(103, 2, 1520451920, 2, ''),
(104, 2, 1520452100, 2, ''),
(105, 2, 1520511618, 2, ''),
(106, 2, 1520511662, 2, ''),
(107, 2, 1520511682, 2, ''),
(108, 2, 1520511775, 2, ''),
(109, 2, 1520511917, 2, ''),
(110, 2, 1520512218, 2, ''),
(111, 2, 1520520466, 2, ''),
(112, 2, 1520520496, 2, ''),
(113, 2, 1520529172, 2, ''),
(114, 2, 1520529214, 2, ''),
(115, 2, 1520529245, 2, ''),
(116, 2, 1520529267, 2, ''),
(117, 2, 1520624855, 1, ''),
(118, 2, 1520626903, 1, ''),
(119, 2, 1520627037, 2, ''),
(120, 2, 1520869073, 8, ''),
(121, 2, 1520881199, 8, ''),
(122, 2, 1520881326, 8, ''),
(123, 2, 1520881524, 8, ''),
(124, 2, 1520881647, 8, ''),
(125, 2, 1520881748, 8, ''),
(126, 2, 1520881794, 8, ''),
(127, 2, 1520881842, 8, ''),
(128, 2, 1520881945, 8, ''),
(129, 2, 1520882339, 8, ''),
(130, 2, 1520942239, 2, ''),
(131, 2, 1520944296, 2, ''),
(132, 2, 1520944437, 2, ''),
(133, 2, 1521041866, 2, ''),
(134, 2, 1521045227, 2, ''),
(23, 3, 1521047499, 2, ''),
(26, 3, 1521047550, 2, ''),
(28, 3, 1521047571, 2, ''),
(30, 3, 1521047638, 2, ''),
(35, 3, 1521050423, 2, ''),
(35, 3, 1521050451, 2, ''),
(52, 9, 1521050487, 2, ''),
(53, 3, 1521050558, 2, ''),
(56, 9, 1521050567, 2, ''),
(57, 3, 1521050674, 2, ''),
(58, 9, 1521050678, 2, ''),
(60, 3, 1521050682, 2, ''),
(65, 9, 1521050686, 2, ''),
(61, 3, 1521050783, 2, ''),
(62, 3, 1521050786, 2, ''),
(66, 3, 1521050997, 2, ''),
(23, 4, 1521057165, 2, 'venite.\n'),
(23, 3, 1521057315, 2, ''),
(23, 4, 1521057354, 2, 'a'),
(23, 3, 1521057444, 2, ''),
(23, 6, 1521057468, 2, ''),
(26, 4, 1521057524, 2, ''),
(26, 5, 1521057586, 2, ''),
(27, 6, 1521057605, 2, ''),
(28, 4, 1521057647, 2, ''),
(28, 5, 1521057834, 2, ''),
(29, 4, 1521057901, 2, ''),
(29, 3, 1521058002, 2, ''),
(29, 4, 1521058016, 2, ''),
(29, 3, 1521058046, 2, ''),
(29, 4, 1521058079, 2, ''),
(29, 3, 1521058682, 2, ''),
(29, 3, 1521058761, 2, ''),
(29, 3, 1521058788, 2, ''),
(29, 3, 1521058808, 2, ''),
(29, 3, 1521058840, 2, ''),
(29, 3, 1521058847, 2, ''),
(29, 6, 1521115926, 2, ''),
(30, 4, 1521115966, 2, ''),
(30, 3, 1521115991, 2, ''),
(30, 3, 1521116265, 2, ''),
(30, 3, 1521116298, 2, ''),
(30, 4, 1521116313, 2, ''),
(30, 3, 1521116399, 2, ''),
(30, 3, 1521116424, 2, ''),
(30, 3, 1521116493, 2, ''),
(30, 3, 1521116509, 2, ''),
(30, 3, 1521116513, 2, ''),
(30, 4, 1521116535, 2, ''),
(30, 3, 1521116590, 2, ''),
(30, 3, 1521116606, 2, ''),
(30, 3, 1521117417, 2, ''),
(30, 3, 1521117436, 2, ''),
(30, 4, 1521117483, 2, ''),
(35, 4, 1521117502, 2, ''),
(30, 3, 1521117908, 2, ''),
(30, 4, 1521117974, 2, ''),
(135, 2, 1521139591, 2, ''),
(67, 3, 1521139917, 2, ''),
(135, 3, 1521139955, 2, ''),
(134, 3, 1521140090, 2, ''),
(68, 3, 1521140107, 2, ''),
(134, 4, 1521140351, 2, ''),
(68, 4, 1521140431, 2, ''),
(53, 4, 1521141442, 2, 'hola!!!!!!!!!!!!!!!!!!'),
(53, 4, 1521141509, 2, 'hola!!!!!!!!!!!!!!!!!!'),
(49, 4, 1521141589, 2, 'faltan los ganchos nada mas.'),
(57, 6, 1521141604, 2, 'no hay stock, carga de nuevo en una semana.\n'),
(30, 5, 1521141722, 2, 'gracias.\n'),
(35, 5, 1521141786, 2, 'grs'),
(49, 6, 1521143024, 2, 'no hay stock papu'),
(136, 2, 1521573524, 1, '');

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
(2, 'UN', 'Unidad'),
(3, 'M2', 'Metro Cuadrado'),
(4, 'MT', 'Metro'),
(5, 'RL', 'Rollo'),
(6, 'LT', 'Litro'),
(7, 'BC', ''),
(8, 'BD', ''),
(9, 'BK', ''),
(10, 'BL', ''),
(11, 'BT', ''),
(12, 'BO', ''),
(13, 'BX', ''),
(14, 'GA', ''),
(15, 'C3', ''),
(16, 'CJ', ''),
(17, 'PA', ''),
(18, 'PL', ''),
(19, 'M3', 'Metro Cubico'),
(20, 'RM', ''),
(21, 'TI', ''),
(22, 'TN', 'Tonelada'),
(23, 'KI', ''),
(24, 'LA', ''),
(25, 'SUN', 'Sin UN');

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
(334, 2, 2, 7),
(345, 2, 2, 18),
(347, 2, 2, 20),
(348, 2, 2, 26),
(349, 3, 3, 7),
(352, 3, 3, 8),
(353, 3, 3, 9),
(354, 3, 3, 10),
(356, 4, 4, 26),
(357, 4, 4, 25),
(358, 4, 4, 24),
(359, 4, 4, 23),
(360, 4, 4, 22),
(361, 5, 5, 26),
(362, 5, 5, 25),
(363, 5, 5, 24),
(364, 6, 6, 25),
(365, 6, 6, 24),
(373, 1, 1, 17),
(375, 1, 1, 19),
(376, 1, 1, 20),
(377, 1, 1, 21),
(378, 1, 1, 22),
(379, 1, 1, 23),
(380, 8, 8, 26),
(381, 8, 8, 25),
(382, 8, 8, 24),
(383, 8, 8, 23),
(384, 8, 8, 22),
(385, 8, 8, 21),
(386, 8, 8, 20),
(387, 8, 8, 19),
(388, 8, 8, 18),
(389, 8, 8, 17),
(390, 8, 8, 16),
(391, 8, 8, 15),
(392, 8, 8, 14),
(393, 8, 8, 13),
(394, 8, 8, 12),
(395, 8, 8, 11),
(396, 8, 8, 10),
(397, 8, 8, 9),
(398, 8, 8, 8),
(399, 8, 8, 7),
(400, 9, 9, 26),
(401, 9, 9, 25),
(402, 9, 9, 24),
(403, 9, 9, 23),
(404, 9, 9, 22),
(405, 9, 9, 21),
(406, 9, 9, 20),
(407, 9, 9, 19),
(408, 9, 9, 18),
(409, 9, 9, 17),
(410, 9, 9, 16),
(411, 9, 9, 15),
(412, 9, 9, 14),
(413, 9, 9, 13),
(414, 9, 9, 12),
(415, 9, 9, 11),
(416, 9, 9, 10),
(417, 9, 9, 9),
(418, 9, 9, 8),
(419, 9, 9, 7),
(420, 10, 10, 26),
(421, 10, 10, 25),
(422, 10, 10, 24),
(423, 10, 10, 23),
(424, 10, 10, 22),
(425, 10, 10, 21),
(426, 10, 10, 20),
(427, 10, 10, 19),
(428, 10, 10, 18),
(429, 10, 10, 17),
(430, 10, 10, 16),
(431, 10, 10, 15),
(432, 10, 10, 14),
(433, 10, 10, 13),
(434, 10, 10, 12),
(435, 10, 10, 11),
(436, 10, 10, 10),
(437, 10, 10, 9),
(438, 10, 10, 8),
(439, 10, 10, 7),
(440, 11, 11, 26),
(441, 11, 11, 25),
(442, 11, 11, 24),
(443, 11, 11, 23),
(444, 11, 11, 22),
(445, 11, 11, 21),
(446, 11, 11, 20),
(447, 11, 11, 19),
(448, 11, 11, 18),
(449, 11, 11, 17),
(450, 11, 11, 16),
(451, 11, 11, 15),
(452, 11, 11, 14),
(453, 11, 11, 13),
(454, 11, 11, 12),
(455, 11, 11, 11),
(456, 11, 11, 10),
(457, 11, 11, 9),
(458, 11, 11, 8),
(459, 11, 11, 7),
(460, 12, 12, 26),
(461, 12, 12, 25),
(462, 12, 12, 24),
(463, 12, 12, 23),
(464, 12, 12, 22),
(465, 12, 12, 21),
(466, 12, 12, 20),
(467, 12, 12, 19),
(468, 12, 12, 18),
(469, 12, 12, 17),
(470, 12, 12, 16),
(471, 12, 12, 15),
(472, 12, 12, 14),
(473, 12, 12, 13),
(474, 12, 12, 12),
(475, 12, 12, 11),
(476, 12, 12, 10),
(477, 12, 12, 9),
(478, 12, 12, 8),
(479, 12, 12, 7),
(480, 13, 13, 26),
(481, 13, 13, 25),
(482, 13, 13, 24),
(483, 13, 13, 23),
(484, 13, 13, 22),
(485, 13, 13, 21),
(486, 13, 13, 20),
(487, 13, 13, 19),
(488, 13, 13, 18),
(489, 13, 13, 17),
(490, 13, 13, 16),
(491, 13, 13, 15),
(492, 13, 13, 14),
(493, 13, 13, 13),
(494, 13, 13, 12),
(495, 13, 13, 11),
(496, 13, 13, 10),
(497, 13, 13, 9),
(498, 13, 13, 8),
(499, 13, 13, 7);

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
-- Estructura de tabla para la tabla `notificaciones_users`
--

CREATE TABLE `notificaciones_users` (
  `id_notificaciones_users` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vale_nuevo` tinyint(1) NOT NULL,
  `vale_aprobado` tinyint(1) NOT NULL,
  `vale_listo` tinyint(1) NOT NULL,
  `vale_retirado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones_users`
--

INSERT INTO `notificaciones_users` (`id_notificaciones_users`, `user_id`, `vale_nuevo`, `vale_aprobado`, `vale_listo`, `vale_retirado`) VALUES
(2, 3, 1, 1, 1, 1),
(6, 6, 1, 1, 1, 1),
(7, 1, 1, 1, 1, 1),
(8, 2, 1, 1, 1, 0),
(9, 8, 1, 1, 1, 1),
(11, 9, 1, 1, 1, 1),
(12, 10, 1, 1, 1, 1),
(13, 11, 1, 1, 1, 1),
(14, 12, 1, 1, 1, 1),
(15, 13, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` text NOT NULL,
  `descripcion_rol` text NOT NULL,
  `status_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `descripcion_rol`, `status_roles`) VALUES
(1, 'VerArticulos', 'VerArticulos', 0),
(2, 'AdministrarRoles', 'AdministrarRoles', 0),
(3, 'AdministrarRoles', 'AdministrarRoles', 0),
(4, 'EditarArticulos', 'EditarArticulos', 0),
(5, 'AltaArticulos', 'AltaArticulos', 0),
(6, 'AdministrarUsuarios', 'AdministrarUsuarios', 0),
(7, 'VerArticulos', 'VerArticulos', 0),
(8, 'VerVales', 'VerVales', 0),
(9, 'NuevoVale', 'NuevoVale', 0),
(10, 'VerVale', 'VerVale', 0),
(11, 'AprobarVales', 'AprobarVales', 0),
(12, 'ArmadoDeVales', 'ArmadoDeVales', 0),
(13, 'Aprobar Vales', 'Aprobar Vales', 0),
(14, 'Ver Dashboard', 'Ver Dashboard', 0),
(15, 'Preparar Vale', 'Preparar Vale', 0),
(17, 'Administrar Sectores', 'Permite al usuario hacer ABM de Sectores para ser imputados en los vales de consumo.', 0),
(18, 'Administrar Roles Por Usuario', 'Permite al usuario hacer ABM sobre los roles que tiene otro usuario.', 0);

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
(17, 2, 1),
(34, 3, 1),
(35, 3, 2),
(36, 3, 3),
(37, 3, 4),
(38, 3, 5),
(39, 3, 6),
(40, 3, 7),
(41, 3, 8),
(42, 3, 9),
(43, 3, 10),
(44, 3, 11),
(45, 3, 12),
(46, 3, 13),
(47, 3, 14),
(48, 3, 15),
(110, 1, 1),
(111, 1, 2),
(112, 1, 3),
(113, 1, 4),
(114, 1, 5),
(115, 1, 6),
(116, 1, 7),
(117, 1, 8),
(118, 1, 9),
(119, 1, 10),
(120, 1, 11),
(121, 1, 12),
(122, 1, 13),
(123, 1, 14),
(124, 1, 15),
(125, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector_req`
--

CREATE TABLE `sector_req` (
  `id_sector_req` int(11) NOT NULL,
  `nombre_sector` text NOT NULL,
  `FASE` varchar(10) NOT NULL,
  `status_sector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sector_req`
--

INSERT INTO `sector_req` (`id_sector_req`, `nombre_sector`, `FASE`, `status_sector`) VALUES
(7, 'MOLINO DISCONTINUO', 'MD ', 1),
(8, 'MOLINO CONTINUO', 'MC ', 1),
(9, 'PRENSA ', 'PRE ', 1),
(10, 'ESMALTERIA', 'ESM ', 1),
(11, 'HORNO', 'HOR ', 1),
(12, 'MOLINO ESMALTE', 'MES ', 1),
(13, 'LAB.TECNICO', 'LTEC ', 1),
(14, 'LAB.DESARROLLO', 'LDES ', 1),
(15, 'LAB.SERIGRAFICO', 'LSER ', 1),
(16, 'PULIDORA', 'PUL ', 1),
(17, 'SELECCIÓN', 'SEL ', 1),
(18, 'CORTE', 'COR ', 1),
(19, 'MANT.ELECTRICO', 'MELE ', 1),
(20, 'MANT.MECANICO', 'MMEC ', 1),
(21, 'MERCADO .INTERNO (MKT) PANELES', 'MINT ', 1),
(22, 'GERRENCIA (TODO ADMINISTRACION)', 'GER ', 1),
(23, 'MANT. EDIFICIO ', 'MEDI ', 1),
(24, 'LOGISTICA Y PROGRAMACION', 'LYP ', 1),
(25, 'MOLDES Y MATRICERIA ', 'MYM', 1),
(26, 'GERRENCIA PRODUCCION', 'GPRO', 1);

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
(1, '127.0.0.1', 'administrator', '$2y$08$DpJI3IonwpkwYK2qUpQYFu9xgdosO1JuC9qFkUa//hb8xFXGXx0vK', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1521226882, 1, 'Admin', 'Admin', NULL, NULL),
(2, '::1', 'lfradusco', '$2y$08$31FHIl5cP53eqXAUmD6mQ.kjfec7pwk30jrUJ5X2TE1IOdH2Lzxvi', NULL, 'lfradusco@ilva.com.ar', NULL, NULL, NULL, 'zmpj.Tf77I/bl8ahTj25TO', 1514471610, 1521226646, 1, 'Lucas', 'Fradusco', NULL, NULL),
(3, '::1', 'rvarios', '$2y$08$.y2equUI8P615lwIjAswh.9QumsXBi36Usqr2fCZxbHptHl1c9UtG', NULL, 'rvarios@ilva.com.ar', NULL, NULL, NULL, NULL, 1514483307, NULL, 1, 'Requeridor', 'Sectores Varios', NULL, NULL),
(6, '::1', 'resmalteria', '$2y$08$olTzKz3KdLDa8cXK/rBnQuB/8a9bcQmuxyWl.iQH0I3BeDeU3yruu', NULL, 'sistemas@ilva.com.ar', NULL, 'AS1BDg6bVDDbdYZCpPMeZu1adf53a4f700e30f83', 1520423485, NULL, 1514918652, NULL, 1, 'Requeridor', 'Esmalteria', NULL, NULL),
(8, '::1', 'lamoedo', '$2y$08$Vg6jMmyKxwpHRh7eZUJ7Yuf8fRR6nMTfMfgPoArgktskRjhP70t76', NULL, 'lamoedo@ilva.com.ar', NULL, NULL, NULL, NULL, 1520618472, 1521209163, 1, 'Leandro ', 'Amoedo', NULL, NULL),
(9, '::1', 'jguevara', '$2y$08$lqtkVvlP366mHANSZ8rfJuv65vEW6wSfREUpWz6U3l/hdmmN7zuoS', NULL, 'panol@ilva.com.ar', NULL, NULL, NULL, NULL, 1521226975, NULL, 1, 'Javier', 'Guevara', NULL, NULL),
(10, '::1', 'dperez', '$2y$08$FqpXoRB.dnN/FBYtwded0extm2GfBt8w8HZptp7U0.Wn.qgIsNHzi', NULL, 'panol@ilva.com.ar', NULL, NULL, NULL, NULL, 1521227019, NULL, 1, 'Daniel', 'Perez', NULL, NULL),
(11, '::1', 'malegre', '$2y$08$vejNM.mmfF8kwNpNbyghNOcOjWcUFDbxeI8HbL.9Lnigip2436Nnm', NULL, 'panol@ilva.com.ar', NULL, NULL, NULL, NULL, 1521227094, NULL, 1, 'Miguel', 'Alegre', NULL, NULL),
(12, '::1', 'ecastaño', '$2y$08$gfHYkxNQZkEq8zwd0.5iju8Zz7S41fs6U.DYtzwixZnE/l9pb/F9a', NULL, 'panol@ilva.com.ar', NULL, NULL, NULL, NULL, 1521227336, NULL, 1, 'Esteban', 'Castaño', NULL, NULL),
(13, '::1', 'frivarola', '$2y$08$0Tv77Fx.pu/2Dh/u1RBTBecb9k1CAp15b23.qAeasikwROzgbf6fK', NULL, 'frivarola@ilva.com.ar', NULL, NULL, NULL, NULL, 1521227533, NULL, 1, 'Fernando', 'Rivarola', NULL, NULL);

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
(14, 1, 1),
(5, 2, 4),
(10, 3, 3),
(9, 6, 2),
(22, 8, 4),
(18, 9, 4),
(19, 10, 4),
(20, 11, 4),
(21, 12, 4),
(23, 13, 4);

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
(1, 1, 18, 5, 2, 1513885412),
(2, 1, 18, 5, 2, 1513950196),
(3, 1, 18, 5, 2, 1514309127),
(4, 1, 18, 5, 2, 1514380018),
(5, 1, 18, 5, 2, 1514396319),
(6, 1, 18, 5, 2, 1514403565),
(7, 1, 18, 1, 0, 1514406423),
(8, 1, 18, 1, 0, 1514406627),
(9, 1, 18, 1, 0, 1514466491),
(10, 1, 18, 1, 0, 1514466520),
(11, 1, 18, 5, 2, 1514466536),
(12, 1, 18, 5, 2, 1514482091),
(13, 1, 11, 9, 3, 1514575481),
(14, 2, 25, 5, 2, 1514578666),
(15, 1, 7, 1, 0, 1515076982),
(16, 1, 7, 5, 2, 1515081083),
(17, 1, 7, 1, 0, 1515081098),
(18, 2, 7, 5, 2, 1515095088),
(19, 1, 7, 5, 2, 1515682109),
(20, 1, 7, 5, 2, 1515701447),
(21, 1, 7, 1, 0, 1515777707),
(22, 1, 7, 5, 2, 1515781102),
(23, 1, 7, 6, 2, 1515782255),
(24, 1, 17, 5, 2, 1516381687),
(25, 1, 17, 5, 2, 1516388270),
(26, 1, 17, 5, 2, 1516812716),
(27, 2, 7, 6, 2, 1516995077),
(28, 2, 7, 5, 2, 1516995085),
(29, 2, 7, 6, 2, 1516997592),
(30, 1, 17, 5, 2, 1517257781),
(31, 2, 7, 1, 0, 1517313560),
(32, 2, 7, 1, 0, 1517313644),
(33, 2, 7, 9, 0, 1517313746),
(34, 2, 7, 1, 0, 1517313753),
(35, 2, 7, 5, 2, 1517316008),
(36, 2, 7, 9, 0, 1517316174),
(37, 2, 7, 1, 0, 1517316221),
(38, 2, 7, 1, 0, 1517316246),
(39, 2, 7, 1, 0, 1517316547),
(40, 2, 7, 1, 0, 1517316580),
(41, 2, 7, 1, 0, 1517316631),
(42, 2, 7, 1, 0, 1517316712),
(43, 2, 7, 9, 0, 1517316740),
(44, 2, 7, 2, 0, 1517845174),
(45, 2, 7, 2, 0, 1517845651),
(46, 2, 7, 2, 0, 1517845676),
(47, 2, 7, 2, 0, 1517845678),
(48, 2, 7, 2, 0, 1517845679),
(49, 2, 7, 6, 2, 1517848780),
(50, 2, 7, 2, 1, 1517852229),
(51, 2, 7, 2, 1, 1517852233),
(52, 2, 7, 9, 3, 1517852716),
(53, 2, 7, 4, 2, 1517852781),
(54, 2, 7, 5, 2, 1517856714),
(55, 2, 7, 2, 1, 1517919151),
(56, 2, 7, 9, 3, 1517919364),
(57, 2, 7, 6, 2, 1517919704),
(58, 2, 7, 9, 3, 1517920881),
(59, 2, 7, 2, 1, 1517920945),
(60, 2, 7, 3, 2, 1517921037),
(61, 2, 7, 3, 2, 1517925582),
(62, 2, 7, 3, 2, 1517925615),
(63, 2, 7, 4, 2, 1517936038),
(64, 2, 7, 5, 2, 1519228377),
(65, 2, 7, 9, 3, 1520347538),
(66, 2, 7, 3, 2, 1520347664),
(67, 2, 7, 3, 2, 1520347746),
(68, 2, 7, 4, 2, 1520347808),
(69, 2, 7, 2, 1, 1520347828),
(70, 2, 7, 2, 1, 1520347858),
(71, 2, 7, 2, 1, 1520347924),
(72, 2, 7, 2, 1, 1520348188),
(73, 2, 7, 2, 1, 1520348234),
(74, 2, 7, 2, 1, 1520350934),
(75, 2, 7, 2, 1, 1520351189),
(76, 2, 7, 2, 1, 1520354441),
(77, 2, 7, 2, 1, 1520354478),
(78, 2, 7, 2, 1, 1520354514),
(79, 2, 7, 2, 1, 1520354585),
(80, 2, 7, 2, 1, 1520354637),
(81, 2, 7, 2, 1, 1520354684),
(82, 2, 7, 2, 1, 1520354927),
(83, 2, 7, 2, 1, 1520355031),
(84, 2, 7, 2, 1, 1520355875),
(85, 2, 7, 2, 1, 1520356520),
(86, 2, 7, 2, 1, 1520356583),
(87, 2, 7, 2, 1, 1520356637),
(88, 2, 7, 2, 1, 1520356747),
(89, 2, 7, 2, 1, 1520356972),
(90, 2, 7, 2, 1, 1520357037),
(91, 2, 7, 2, 1, 1520357311),
(92, 2, 7, 2, 1, 1520358669),
(93, 2, 7, 2, 1, 1520358855),
(94, 2, 7, 2, 1, 1520365575),
(95, 2, 7, 2, 1, 1520365875),
(96, 2, 7, 2, 1, 1520365960),
(97, 2, 7, 2, 1, 1520366095),
(98, 2, 7, 2, 1, 1520366304),
(99, 2, 7, 2, 1, 1520366754),
(100, 2, 7, 2, 1, 1520367683),
(101, 2, 7, 2, 1, 1520367920),
(102, 2, 7, 4, 2, 1520427215),
(103, 2, 7, 2, 1, 1520451920),
(104, 2, 7, 2, 1, 1520452100),
(105, 2, 7, 2, 1, 1520511618),
(106, 2, 7, 2, 1, 1520511662),
(107, 2, 7, 2, 1, 1520511682),
(108, 2, 7, 2, 1, 1520511775),
(109, 2, 7, 2, 1, 1520511917),
(110, 2, 7, 2, 1, 1520512218),
(111, 2, 7, 2, 1, 1520520466),
(112, 2, 7, 2, 1, 1520520496),
(113, 2, 7, 2, 1, 1520529172),
(114, 2, 7, 2, 1, 1520529214),
(115, 2, 7, 2, 1, 1520529245),
(116, 2, 7, 2, 1, 1520529267),
(117, 1, 17, 2, 1, 1520624855),
(118, 1, 17, 2, 1, 1520626903),
(119, 2, 7, 2, 1, 1520627037),
(120, 8, 7, 2, 1, 1520869073),
(121, 8, 7, 2, 1, 1520881199),
(122, 8, 7, 2, 1, 1520881326),
(123, 8, 7, 2, 1, 1520881524),
(124, 8, 7, 2, 1, 1520881646),
(125, 8, 7, 2, 1, 1520881748),
(126, 8, 7, 2, 1, 1520881794),
(127, 8, 7, 2, 1, 1520881842),
(128, 8, 7, 2, 1, 1520881945),
(129, 8, 7, 2, 1, 1520882339),
(130, 2, 7, 2, 1, 1520942239),
(131, 2, 7, 2, 1, 1520944296),
(132, 2, 7, 2, 1, 1520944437),
(133, 2, 7, 2, 1, 1521041866),
(134, 2, 7, 4, 2, 1521045227),
(135, 2, 7, 3, 2, 1521139591),
(136, 1, 17, 2, 1, 1521573524);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `email_queue`
--
ALTER TABLE `email_queue`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `notificaciones_users`
--
ALTER TABLE `notificaciones_users`
  ADD PRIMARY KEY (`id_notificaciones_users`);

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
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34900;

--
-- AUTO_INCREMENT de la tabla `email_queue`
--
ALTER TABLE `email_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `estado_entrega`
--
ALTER TABLE `estado_entrega`
  MODIFY `id_estado_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `fk_un_med`
--
ALTER TABLE `fk_un_med`
  MODIFY `id_un_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jerarquias`
--
ALTER TABLE `jerarquias`
  MODIFY `id_jerarquia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500;

--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones_users`
--
ALTER TABLE `notificaciones_users`
  MODIFY `id_notificaciones_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `roles_groups`
--
ALTER TABLE `roles_groups`
  MODIFY `id_rol_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `sector_req`
--
ALTER TABLE `sector_req`
  MODIFY `id_sector_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `vales_consumo`
--
ALTER TABLE `vales_consumo`
  MODIFY `id_vale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

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
