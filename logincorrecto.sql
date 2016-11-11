-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2014 at 04:03 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `logincorrecto`
--
CREATE DATABASE IF NOT EXISTS `logincorrecto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `logincorrecto`;

-- --------------------------------------------------------

--
-- Table structure for table `amigos`
--

CREATE TABLE IF NOT EXISTS `amigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `amigos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `amigos`
--

INSERT INTO `amigos` (`id`, `usuario`, `amigos`) VALUES
(133, 6, 2),
(134, 2, 6),
(135, 10, 6),
(136, 6, 10),
(137, 10, 2),
(138, 2, 10),
(139, 10, 3),
(140, 3, 10),
(141, 2, 3),
(142, 3, 2),
(143, 9, 2),
(144, 2, 9),
(147, 5, 9),
(148, 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `amigoscomunes`
--

CREATE TABLE IF NOT EXISTS `amigoscomunes` (
  `id_amigocomun` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `amigo` int(11) NOT NULL,
  `amigoencomun` int(11) NOT NULL,
  PRIMARY KEY (`id_amigocomun`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=475 ;

--
-- Dumping data for table `amigoscomunes`
--

INSERT INTO `amigoscomunes` (`id_amigocomun`, `usuario`, `amigo`, `amigoencomun`) VALUES
(459, 10, 2, 6),
(460, 2, 10, 6),
(461, 10, 6, 2),
(462, 6, 10, 2),
(463, 2, 3, 10),
(464, 3, 2, 10),
(465, 2, 10, 3),
(466, 10, 2, 3),
(467, 2, 6, 10),
(468, 6, 2, 10),
(469, 9, 5, 2),
(470, 5, 9, 2),
(473, 2, 5, 9),
(474, 5, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `fsexos`
--

CREATE TABLE IF NOT EXISTS `fsexos` (
  `id_fotosexo` int(11) NOT NULL AUTO_INCREMENT,
  `fotosex` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fotosexo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fsexos`
--

INSERT INTO `fsexos` (`id_fotosexo`, `fotosex`, `sexo`) VALUES
(1, '../fotos/hombre.jpg', 'Masculino'),
(2, '../fotos/mujer.jpg', 'Femenino');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE IF NOT EXISTS `newsfeed` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `evento` varchar(255) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `codigoevento` int(11) DEFAULT NULL,
  `recipient` int(11) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=217 ;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`id_news`, `evento`, `usuario`, `hora`, `fecha`, `codigoevento`, `recipient`) VALUES
(66, 'envio', 3, '16:34:00', '2014-06-08', NULL, 1),
(67, 'envio', 3, '16:35:00', '2014-06-08', NULL, 2),
(68, 'aceptado', 2, '17:08:00', '2014-06-08', 27, 0),
(69, 'envio', 2, '17:26:00', '2014-06-08', NULL, 3),
(70, 'envio', 3, '17:29:00', '2014-06-08', NULL, 4),
(71, 'aceptado', 4, '17:29:00', '2014-06-08', 29, 0),
(72, 'envio', 4, '17:47:00', '2014-06-08', NULL, 2),
(73, 'aceptado', 2, '17:49:00', '2014-06-08', 31, 0),
(74, 'envio', 2, '17:49:00', '2014-06-08', NULL, 4),
(75, 'aceptado', 4, '17:50:00', '2014-06-08', 33, 0),
(76, 'envio', 2, '17:58:00', '2014-06-08', NULL, 3),
(77, 'envio', 4, '20:00:00', '2014-06-08', NULL, 2),
(78, 'aceptado', 2, '20:00:00', '2014-06-08', 34, 0),
(79, 'aceptado', 2, '20:00:00', '2014-06-08', 35, 0),
(80, 'envio', 2, '00:15:00', '2014-07-23', NULL, 5),
(81, 'aceptado', 5, '00:15:00', '2014-07-23', 35, 0),
(82, 'envio', 5, '00:15:00', '2014-07-23', NULL, 4),
(83, 'aceptado', 4, '00:16:00', '2014-07-23', 37, 0),
(84, 'envio', 2, '00:24:00', '2014-07-23', NULL, 6),
(85, 'aceptado', 6, '00:24:00', '2014-07-23', 39, 0),
(86, 'envio', 5, '00:34:00', '2014-07-23', NULL, 6),
(87, 'envio', 5, '00:34:00', '2014-07-23', NULL, 3),
(88, 'aceptado', 3, '00:34:00', '2014-07-23', 41, 0),
(89, 'aceptado', 6, '00:34:00', '2014-07-23', 43, 0),
(90, 'envio', 2, '11:48:00', '2014-07-23', NULL, 6),
(91, 'aceptado', 6, '11:48:00', '2014-07-23', 45, 0),
(92, 'envio', 4, '16:32:00', '2014-07-24', NULL, 8),
(93, 'aceptado', 8, '16:33:00', '2014-07-24', 47, 0),
(94, 'envio', 8, '16:41:00', '2014-07-24', NULL, 6),
(95, 'aceptado', 6, '16:41:00', '2014-07-24', 49, 0),
(96, 'envio', 8, '16:45:00', '2014-07-24', NULL, 2),
(97, 'aceptado', 2, '16:47:00', '2014-07-24', 51, 0),
(98, 'envio', 8, '19:42:00', '2014-07-24', NULL, 5),
(99, 'aceptado', 5, '19:42:00', '2014-07-24', 53, 0),
(100, 'envio', 8, '19:48:00', '2014-07-24', NULL, 1),
(101, 'envio', 8, '19:48:00', '2014-07-24', NULL, 7),
(102, 'aceptado', 7, '19:49:00', '2014-07-24', 55, 0),
(103, 'envio', 2, '21:48:00', '2014-07-24', NULL, 7),
(104, 'aceptado', 7, '21:48:00', '2014-07-24', 57, 0),
(105, 'envio', 2, '14:17:00', '2014-07-25', NULL, 9),
(106, 'aceptado', 9, '14:17:00', '2014-07-25', 59, 0),
(107, 'envio', 7, '18:12:00', '2014-07-27', NULL, 10),
(108, 'aceptado', 10, '18:12:00', '2014-07-27', 61, 0),
(109, 'envio', 2, '18:14:00', '2014-07-27', NULL, 10),
(110, 'aceptado', 10, '18:14:00', '2014-07-27', 63, 0),
(111, 'envio', 10, '21:11:00', '2014-07-27', NULL, 6),
(112, 'aceptado', 6, '21:11:00', '2014-07-27', 65, 0),
(113, 'envio', 2, '23:12:00', '2014-07-27', NULL, 11),
(114, 'aceptado', 11, '23:13:00', '2014-07-27', 67, 0),
(115, 'envio', 5, '23:13:00', '2014-07-27', NULL, 11),
(116, 'aceptado', 11, '23:13:00', '2014-07-27', 69, 0),
(117, 'envio', 2, '11:21:00', '2014-07-28', NULL, 12),
(118, 'envio', 2, '11:21:00', '2014-07-28', NULL, 13),
(119, 'aceptado', 12, '11:21:00', '2014-07-28', 71, 0),
(120, 'aceptado', 13, '11:21:00', '2014-07-28', 73, 0),
(121, 'envio', 11, '11:21:00', '2014-07-28', NULL, 12),
(122, 'envio', 11, '11:21:00', '2014-07-28', NULL, 13),
(123, 'aceptado', 12, '11:22:00', '2014-07-28', 75, 0),
(124, 'aceptado', 13, '11:22:00', '2014-07-28', 77, 0),
(125, 'envio', 12, '11:27:00', '2014-07-28', NULL, 3),
(126, 'envio', 12, '11:27:00', '2014-07-28', NULL, 7),
(127, 'envio', 12, '11:27:00', '2014-07-28', NULL, 8),
(128, 'aceptado', 3, '11:28:00', '2014-07-28', 79, 0),
(129, 'aceptado', 7, '11:28:00', '2014-07-28', 81, 0),
(130, 'aceptado', 8, '11:28:00', '2014-07-28', 83, 0),
(131, 'envio', 2, '21:56:00', '2014-07-29', NULL, 9),
(132, 'aceptado', 9, '21:58:00', '2014-07-29', 85, 0),
(133, 'envio', 2, '21:59:00', '2014-07-29', NULL, 9),
(134, 'aceptado', 9, '22:00:00', '2014-07-29', 87, 0),
(135, 'envio', 9, '22:01:00', '2014-07-29', NULL, 7),
(136, 'envio', 9, '22:04:00', '2014-07-29', NULL, 2),
(137, 'envio', 9, '22:04:00', '2014-07-29', NULL, 5),
(138, 'envio', 9, '09:01:00', '2014-07-30', NULL, 4),
(139, 'envio', 9, '09:04:00', '2014-07-30', NULL, 3),
(140, 'envio', 9, '09:04:00', '2014-07-30', NULL, 12),
(141, 'envio', 9, '09:10:00', '2014-07-30', NULL, 8),
(142, 'envio', 9, '09:16:00', '2014-07-30', NULL, 6),
(143, 'envio', 9, '09:53:00', '2014-07-30', NULL, 6),
(144, 'envio', 9, '09:57:00', '2014-07-30', NULL, 10),
(145, 'envio', 2, '16:32:00', '2014-07-30', NULL, 10),
(146, 'envio', 2, '16:32:00', '2014-07-30', NULL, 7),
(147, 'aceptado', 3, '16:33:00', '2014-07-30', 89, 0),
(148, 'aceptado', 10, '16:33:00', '2014-07-30', 91, 0),
(149, 'aceptado', 10, '16:33:00', '2014-07-30', 93, 0),
(150, 'aceptado', 7, '16:33:00', '2014-07-30', 95, 0),
(151, 'envio', 2, '17:10:00', '2014-07-30', NULL, 7),
(152, 'envio', 2, '17:10:00', '2014-07-30', NULL, 10),
(153, 'aceptado', 10, '17:12:00', '2014-07-30', 97, 0),
(154, 'aceptado', 7, '17:13:00', '2014-07-30', 99, 0),
(155, 'envio', 2, '17:52:00', '2014-07-30', NULL, 10),
(156, 'envio', 2, '17:52:00', '2014-07-30', NULL, 7),
(157, 'aceptado', 7, '17:52:00', '2014-07-30', 101, 0),
(158, 'aceptado', 10, '17:53:00', '2014-07-30', 103, 0),
(159, 'envio', 2, '18:02:00', '2014-07-30', NULL, 7),
(160, 'aceptado', 7, '18:02:00', '2014-07-30', 105, 0),
(161, 'envio', 2, '18:05:00', '2014-07-30', NULL, 10),
(162, 'aceptado', 10, '18:05:00', '2014-07-30', 107, 0),
(163, 'envio', 2, '18:28:00', '2014-07-30', NULL, 7),
(164, 'aceptado', 7, '18:29:00', '2014-07-30', 109, 0),
(165, 'envio', 2, '18:51:00', '2014-07-30', NULL, 7),
(166, 'aceptado', 7, '18:51:00', '2014-07-30', 111, 0),
(167, 'envio', 2, '19:01:00', '2014-07-30', NULL, 7),
(168, 'aceptado', 7, '19:01:00', '2014-07-30', 113, 0),
(169, 'envio', 2, '19:13:00', '2014-07-30', NULL, 7),
(170, 'aceptado', 7, '19:13:00', '2014-07-30', 115, 0),
(171, 'envio', 2, '19:19:00', '2014-07-30', NULL, 7),
(172, 'aceptado', 7, '19:20:00', '2014-07-30', 117, 0),
(173, 'envio', 2, '19:31:00', '2014-07-30', NULL, 7),
(174, 'aceptado', 7, '19:31:00', '2014-07-30', 119, 0),
(175, 'envio', 2, '19:38:00', '2014-07-30', NULL, 7),
(176, 'envio', 2, '19:38:00', '2014-07-30', NULL, 9),
(177, 'aceptado', 7, '19:39:00', '2014-07-30', 121, 0),
(178, 'aceptado', 9, '19:39:00', '2014-07-30', 123, 0),
(179, 'envio', 2, '22:10:00', '2014-07-30', NULL, 7),
(180, 'envio', 2, '22:10:00', '2014-07-30', NULL, 12),
(181, 'aceptado', 7, '22:11:00', '2014-07-30', 125, 0),
(182, 'aceptado', 12, '22:11:00', '2014-07-30', 127, 0),
(183, 'envio', 2, '11:52:00', '2014-07-31', NULL, 3),
(184, 'aceptado', 3, '20:00:00', '2014-07-31', 129, 0),
(185, 'envio', 2, '10:58:00', '2014-08-01', NULL, 6),
(186, 'aceptado', 6, '10:59:00', '2014-08-01', 131, 0),
(187, 'envio', 2, '11:06:00', '2014-08-01', NULL, 6),
(188, 'aceptado', 6, '11:07:00', '2014-08-01', 133, 0),
(189, 'envio', 6, '11:07:00', '2014-08-01', NULL, 10),
(190, 'aceptado', 10, '11:07:00', '2014-08-01', 135, 0),
(191, 'envio', 2, '11:09:00', '2014-08-01', NULL, 10),
(192, 'aceptado', 10, '11:09:00', '2014-08-01', 137, 0),
(193, 'envio', 3, '11:09:00', '2014-08-01', NULL, 2),
(194, 'envio', 3, '11:10:00', '2014-08-01', NULL, 10),
(195, 'aceptado', 10, '11:10:00', '2014-08-01', 139, 0),
(196, 'aceptado', 2, '11:10:00', '2014-08-01', 141, 0),
(197, 'envio', 2, '11:11:00', '2014-08-01', NULL, 5),
(198, 'envio', 2, '11:11:00', '2014-08-01', NULL, 9),
(199, 'aceptado', 9, '11:12:00', '2014-08-01', 143, 0),
(200, 'aceptado', 5, '11:12:00', '2014-08-01', 145, 0),
(201, 'envio', 9, '11:13:00', '2014-08-01', NULL, 5),
(202, 'aceptado', 5, '11:13:00', '2014-08-01', 147, 0),
(203, 'envio', 2, '11:00:00', '2014-08-04', NULL, 4),
(204, 'envio', 2, '11:11:00', '2014-08-04', NULL, 4),
(205, 'envio', 2, '11:18:00', '2014-08-04', NULL, 4),
(206, 'envio', 2, '11:21:00', '2014-08-04', NULL, 4),
(207, 'envio', 2, '11:30:00', '2014-08-04', NULL, 4),
(208, 'envio', 2, '11:32:00', '2014-08-04', NULL, 4),
(209, 'envio', 2, '11:34:00', '2014-08-04', NULL, 4),
(210, 'envio', 2, '11:36:00', '2014-08-04', NULL, 4),
(211, 'envio', 2, '11:39:00', '2014-08-04', NULL, 4),
(212, 'envio', 2, '11:51:00', '2014-08-04', NULL, 4),
(213, 'envio', 2, '11:56:00', '2014-08-04', NULL, 4),
(214, 'envio', 2, '11:58:00', '2014-08-04', NULL, 4),
(215, 'envio', 2, '12:00:00', '2014-08-04', NULL, 4),
(216, 'envio', 2, '12:02:00', '2014-08-04', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes`
--

CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `emisor` int(11) NOT NULL,
  `receptor` int(11) NOT NULL,
  PRIMARY KEY (`id_solicitud`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `solicitudes`
--

INSERT INTO `solicitudes` (`id_solicitud`, `emisor`, `receptor`) VALUES
(14, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `nivel` varchar(255) NOT NULL,
  `fotoperfil` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `correo`, `sexo`, `clave`, `nivel`, `fotoperfil`) VALUES
(1, 'David', 'Aristizabal', 'deivy@hotmail.com', 'Masculino', 'admin', 'Admin', ''),
(2, 'Falcao', 'Garcia', 'falcao@hotmail.com', 'Masculino', '123', 'cliente', '../fotos/1.jpg'),
(3, 'Jean Carlo ', 'Cardona', 'Jean@hotmail.com', 'Masculino', '123', 'cliente', ''),
(4, 'Tatiana', 'Moreno', 'tatis@hotmail.com', 'Femenino', '123', 'cliente', '../fotos/2.jpg'),
(5, 'yeison', 'cardona', 'yeison@hotmail.com', 'masculino', '123', 'cliente', ''),
(6, 'damian', 'ortega', 'damian@hotmail.com', 'masculino', '123', 'cliente', ''),
(7, 'michael', 'guzman', 'michael@hotmail.com', 'masculino', '123', 'cliente', ''),
(8, 'Jorge', 'vanegas', 'jorge@hotmail.com', 'masculino', '123', 'cliente', ''),
(9, 'javier', 'ramirez', 'javier@hotmail.com', 'masculino', '123', 'cliente', ''),
(10, 'diana', 'gonzalez', 'diana@hotmail.com', 'femenino', '123', 'cliente', ''),
(11, 'victor ', 'urrego', 'victor@hotmail.com', 'masculino', '123', 'cliente', ''),
(12, 'Teresa', 'echeverri', 'teresa@hotmail.com', 'femenino', '123', 'cliente', ''),
(13, 'Paula', 'Gonzalez', 'paula@hotmail.com', 'femenino', '123', 'cliente', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
