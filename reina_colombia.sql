-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-02-2013 a las 17:55:56
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `reina_colombia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adver_pages`
--

CREATE TABLE IF NOT EXISTS `adver_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number_pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `adver_pages`
--

INSERT INTO `adver_pages` (`id`, `page`, `number_pos`) VALUES
(1, 'Inicio', 2),
(2, 'Noticias', 2),
(3, 'Revista', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adver_positions`
--

CREATE TABLE IF NOT EXISTS `adver_positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_adver_pages` int(11) NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_adver_pages` (`id_adver_pages`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `adver_positions`
--

INSERT INTO `adver_positions` (`id`, `id_adver_pages`, `url`, `position`, `type`) VALUES
(1, 1, '1', 'right', 'bann_hor'),
(2, 1, '2_imagenes-naturaleza-g.jpg', 'bottom', 'bann_hor'),
(3, 2, '3', 'right', 'bann_hor'),
(4, 2, '4_naturaleza01.jpg', 'bottom', 'bann_hor'),
(5, 3, '5_naturaleza01.jpg', 'right', 'bann_hor'),
(6, 3, '6_imagenes-naturaleza-g.jpg', 'bottom', 'bann_hor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `magazine`
--

CREATE TABLE IF NOT EXISTS `magazine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pages` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `magazine`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `preview` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `picture` tinyint(255) NOT NULL,
  `dateAdd` datetime NOT NULL,
  `dateUpd` datetime NOT NULL,
  `state` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `title`, `subtitle`, `preview`, `text`, `picture`, `dateAdd`, `dateUpd`, `state`) VALUES
(1, 'An all-around better Lorem Ipsum experience.', 'An all-around better Lorem Ipsum experience.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.\r\n\r\nSed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.\r\n\r\nMorbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, vulputate vel, nisl.\r\n\r\nSuspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem. Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue vel, arcu. Ut scelerisque hendrerit tellus. Integer sagittis. Vivamus a mauris eget arcu gravida tristique. Nunc iaculis mi in ante. Vivamus imperdiet nibh feugiat est.\r\n\r\nUt convallis, sem sit amet interdum consectetuer, odio augue aliquam leo, nec dapibus tortor nibh sed augue. Integer eu magna sit amet metus fermentum posuere. Morbi sit amet nulla sed dolor elementum imperdiet. Quisque fermentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque adipiscing eros ut libero. Ut condimentum mi vel tellus. Suspendisse laoreet. Fusce ut est sed dolor gravida convallis. Morbi vitae ante. Vivamus ultrices luctus nunc. Suspendisse et dolor. Etiam dignissim. Proin malesuada adipiscing lacus. Donec metus. Curabitur gravida.\r\n', 0, '2013-02-02 14:43:02', '2013-02-03 07:29:55', 1),
(2, 'Testing 2', 'Testing 2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.', '<div style="display: block;" class="content" id="long-para">\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus \r\nhendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet \r\nvel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin \r\nlaoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu \r\nnibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>\r\n\r\n<p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae \r\nluctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, \r\ncommodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit \r\ntortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices\r\n sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. \r\nPhasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>\r\n\r\n<p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a\r\n ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero\r\n dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, \r\nadipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam \r\npellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida \r\nvitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, \r\nvulputate vel, nisl.</p>\r\n\r\n<p>Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam \r\nsit amet mi ullamcorper vehicula. Integer adipiscing risus a sem. Nullam\r\n quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan \r\nquis, faucibus non, congue vel, arcu. Ut scelerisque hendrerit tellus. \r\nInteger sagittis. Vivamus a mauris eget arcu gravida tristique. Nunc \r\niaculis mi in ante. Vivamus imperdiet nibh feugiat est.</p>\r\n\r\n<p>Ut convallis, sem sit amet interdum consectetuer, odio augue aliquam \r\nleo, nec dapibus tortor nibh sed augue. Integer eu magna sit amet metus \r\nfermentum posuere. Morbi sit amet nulla sed dolor elementum imperdiet. \r\nQuisque fermentum. Cum sociis natoque penatibus et magnis dis parturient\r\n montes, nascetur ridiculus mus. Pellentesque adipiscing eros ut libero.\r\n Ut condimentum mi vel tellus. Suspendisse laoreet. Fusce ut est sed \r\ndolor gravida convallis. Morbi vitae ante. Vivamus ultrices luctus nunc.\r\n Suspendisse et dolor. Etiam dignissim. Proin malesuada adipiscing \r\nlacus. Donec metus. Curabitur gravida.</p>\r\n \r\n</div>', 0, '2013-02-03 12:12:42', '2013-02-03 06:03:49', 0),
(3, 'testting 3', 'testting 3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\r\n\r\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.\r\n Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. \r\nSuspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>\r\n\r\n<p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.\r\n Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. \r\nSuspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>\r\n\r\n<p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.\r\n Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. \r\nSuspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>\r\n\r\n<p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.\r\n Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. \r\nSuspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>\r\n\r\n<p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>', 1, '2013-02-03 07:31:11', '2013-02-03 07:58:40', 1),
(4, 'An all-around better Lorem Ipsum experience 4.', 'An all-around better Lorem Ipsum experience 4.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.\r\n\r\nDonec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', '<div class="content" id="short-para">\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.\r\n Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. \r\nSuspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>\r\n\r\n<p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>\r\n\r\n<p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, \r\neuismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.</p>\r\n\r\n<p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas \r\naugue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui \r\nmi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>\r\n\r\n<p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec \r\nconsectetuer ligula vulputate sem tristique cursus. Nam nulla quam, \r\ngravida non, commodo a, sodales sit amet, nisi.</p>\r\n\r\n<p>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum vulputate, nunc.</p>\r\n\r\n<p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet, \r\nsagittis vel, euismod vel, velit. Pellentesque egestas sem. Suspendisse \r\ncommodo ullamcorper magna.</p>\r\n\r\n</div>', 1, '2013-02-03 09:06:06', '2013-02-03 09:06:07', 1),
(5, 'La Reina de Colombia', 'la reina del atalntico', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.<br />\nPhasellus hendrerit. Pellentesque aliquet nibh nec urna. In<br />\nnisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed<br />\npretium, ligula sollicitudin laoreet viverra, tortor libero<br />\n', '<p><br /></p>\r\n<img src="http://www.revistasumma.com/media/images/width/800/5951-iphone-5.jpg" />\r\n<p><br /></p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus \r\nhendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet \r\nvel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin \r\nlaoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu \r\nnibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>\r\n<p><br /></p>\r\n\r\n<p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae \r\nluctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, \r\ncommodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit \r\ntortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices\r\n sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. \r\nPhasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>', 1, '2013-02-06 04:14:57', '2013-02-06 05:06:15', 0),
(6, 'An all-around better Lorem Ipsum experience 6', '', 'Lorem ipsum dolor sit amet, consectetuer<br />\nadipiscing elit. Phasellus hendrerit. Pellentesque<br />\naliquet nibh nec urna. In nisi neque, aliquet vel,<br />\ndapibus id, mattis vel, nisi. Sed pretium, ligula<br />\n', '<div style="display: block;" class="content" id="long-para">\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus \r\nhendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet \r\nvel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin \r\nlaoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu \r\nnibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>\r\n\r\n<p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae \r\nluctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, \r\ncommodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit \r\ntortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices\r\n sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. \r\nPhasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>\r\n\r\n<p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a\r\n ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero\r\n dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, \r\nadipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam \r\npellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida \r\nvitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, \r\nvulputate vel, nisl.</p>\r\n\r\n<p>Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam \r\nsit amet mi ullamcorper vehicula. Integer adipiscing risus a sem. Nullam\r\n quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan \r\nquis, faucibus non, congue vel, arcu. Ut scelerisque hendrerit tellus. \r\nInteger sagittis. Vivamus a mauris eget arcu gravida tristique. Nunc \r\niaculis mi in ante. Vivamus imperdiet nibh feugiat est.</p>\r\n\r\n<p>Ut convallis, sem sit amet interdum consectetuer, odio augue aliquam \r\nleo, nec dapibus tortor nibh sed augue. Integer eu magna sit amet metus \r\nfermentum posuere. Morbi sit amet nulla sed dolor elementum imperdiet. \r\nQuisque fermentum. Cum sociis natoque penatibus et magnis dis parturient\r\n montes, nascetur ridiculus mus. Pellentesque adipiscing eros ut libero.\r\n Ut condimentum mi vel tellus. Suspendisse laoreet. Fusce ut est sed \r\ndolor gravida convallis. Morbi vitae ante. Vivamus ultrices luctus nunc.\r\n Suspendisse et dolor. Etiam dignissim. Proin malesuada adipiscing \r\nlacus. Donec metus. Curabitur gravida.</p>\r\n \r\n</div>', 0, '2013-02-06 04:54:24', '2013-02-06 05:06:12', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagesmagazine`
--

CREATE TABLE IF NOT EXISTS `pagesmagazine` (
  `id_magazine` int(11) NOT NULL,
  `path` tinytext NOT NULL,
  KEY `id_magazine` (`id_magazine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `pagesmagazine`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `roleName` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `roleName`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `role`) VALUES
(1, 'admin', '12345', 1);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `pagesmagazine`
--
ALTER TABLE `pagesmagazine`
  ADD CONSTRAINT `pagesmagazine_ibfk_1` FOREIGN KEY (`id_magazine`) REFERENCES `magazine` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
