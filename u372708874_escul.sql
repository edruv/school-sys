
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2017 at 11:03 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u372708874_escul`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_emp` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  UNIQUE KEY `mail` (`email`),
  KEY `id_emp` (`id_emp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_emp`, `email`) VALUES
(11, 'oliver.nino-campos@gmail.com'),
(12, 'adam.carbajal-alcala@yahoo.es'),
(13, 'cristina.luis-deleon@yahoo.es'),
(14, 'luis.armas-mares@yahoo.com'),
(15, 'aitana.arreola-puga@gmail.com'),
(16, 'javier.rodarte-rojo@latinmail.com'),
(17, 'alexia.munguia-escudero@yahoo.es');

-- --------------------------------------------------------

--
-- Table structure for table `aula`
--

CREATE TABLE IF NOT EXISTS `aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `edif` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `edau` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `edau_UNIQUE` (`edau`),
  KEY `edif` (`edif`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `aula`
--

INSERT INTO `aula` (`id`, `edif`, `num`, `edau`) VALUES
(1, 1, 1, 'a-1'),
(2, 1, 2, 'a-2'),
(3, 1, 3, 'a-3'),
(4, 1, 4, 'a-4'),
(5, 1, 5, 'a-5'),
(6, 2, 1, 'b-1'),
(7, 2, 2, 'b-2'),
(8, 2, 3, 'b-3'),
(9, 2, 4, 'b-4'),
(10, 2, 5, 'b-5'),
(11, 3, 1, 'c-1'),
(12, 3, 2, 'c-2'),
(13, 3, 3, 'c-3'),
(14, 3, 4, 'c-4'),
(15, 3, 5, 'c-5'),
(16, 4, 1, 'd-1'),
(17, 4, 2, 'd-2'),
(18, 4, 3, 'd-3'),
(19, 4, 4, 'd-4'),
(20, 4, 5, 'd-5'),
(21, 5, 1, 'e-1'),
(22, 5, 2, 'e-2'),
(23, 5, 3, 'e-3'),
(24, 5, 4, 'e-4'),
(25, 5, 5, 'e-5'),
(26, 6, 1, 'f-1'),
(27, 6, 2, 'f-2'),
(28, 6, 3, 'f-3'),
(29, 6, 4, 'f-4'),
(30, 6, 5, 'f-5'),
(31, 7, 1, 'g-1'),
(32, 7, 2, 'g-2'),
(33, 7, 3, 'g-3'),
(34, 7, 4, 'g-4'),
(35, 7, 5, 'g-5'),
(36, 8, 1, 'h-1'),
(37, 8, 2, 'h-2'),
(38, 8, 3, 'h-3'),
(39, 8, 4, 'h-4'),
(40, 8, 5, 'h-5'),
(41, 9, 1, 'i-1'),
(42, 9, 2, 'i-2'),
(43, 9, 3, 'i-3'),
(44, 9, 4, 'i-4'),
(45, 9, 5, 'i-5'),
(46, 10, 1, 'j-1'),
(47, 10, 2, 'j-2'),
(48, 10, 3, 'j-3'),
(49, 10, 4, 'j-4'),
(50, 10, 5, 'j-5'),
(51, 11, 1, 'k-1'),
(52, 11, 2, 'k-2'),
(53, 11, 3, 'k-3'),
(54, 11, 4, 'k-4'),
(55, 11, 5, 'k-5'),
(56, 12, 1, 'l-1'),
(57, 12, 2, 'l-2'),
(58, 12, 3, 'l-3'),
(59, 12, 4, 'l-4'),
(60, 12, 5, 'l-5'),
(61, 13, 1, 'm-1'),
(62, 13, 2, 'm-2'),
(63, 13, 3, 'm-3'),
(64, 13, 4, 'm-4'),
(65, 13, 5, 'm-5'),
(66, 14, 1, 'n-1'),
(67, 14, 2, 'n-2'),
(68, 14, 3, 'n-3'),
(69, 14, 4, 'n-4'),
(70, 14, 5, 'n-5'),
(71, 15, 1, 'o-1'),
(72, 15, 2, 'o-2'),
(73, 15, 3, 'o-3'),
(74, 15, 4, 'o-4'),
(75, 15, 5, 'o-5'),
(76, 16, 1, 'p-1'),
(77, 16, 2, 'p-2'),
(78, 16, 3, 'p-3'),
(79, 16, 4, 'p-4'),
(80, 16, 5, 'p-5'),
(81, 17, 1, 'q-1'),
(82, 17, 2, 'q-2'),
(83, 17, 3, 'q-3'),
(84, 17, 4, 'q-4'),
(85, 17, 5, 'q-5'),
(86, 18, 1, 'r-1'),
(87, 18, 2, 'r-2'),
(88, 18, 3, 'r-3'),
(89, 18, 4, 'r-4'),
(90, 18, 5, 'r-5'),
(91, 19, 1, 's-1'),
(92, 19, 2, 's-2'),
(93, 19, 3, 's-3'),
(94, 19, 4, 's-4'),
(95, 19, 5, 's-5'),
(96, 20, 1, 't-1'),
(97, 20, 2, 't-2'),
(98, 20, 3, 't-3'),
(99, 20, 4, 't-4'),
(100, 20, 5, 't-5'),
(101, 21, 1, 'u-1'),
(102, 21, 2, 'u-2'),
(103, 21, 3, 'u-3'),
(104, 21, 4, 'u-4'),
(105, 21, 5, 'u-5'),
(106, 22, 1, 'v-1'),
(107, 22, 2, 'v-2'),
(108, 22, 3, 'v-3'),
(109, 22, 4, 'v-4'),
(110, 22, 5, 'v-5'),
(111, 23, 1, 'w-1'),
(112, 23, 2, 'w-2'),
(113, 23, 3, 'w-3'),
(114, 23, 4, 'w-4'),
(115, 23, 5, 'w-5'),
(116, 24, 1, 'x-1'),
(117, 24, 2, 'x-2'),
(118, 24, 3, 'x-3'),
(119, 24, 4, 'x-4'),
(120, 24, 5, 'x-5'),
(121, 25, 1, 'y-1'),
(122, 25, 2, 'y-2'),
(123, 25, 3, 'y-3'),
(124, 25, 4, 'y-4'),
(125, 25, 5, 'y-5'),
(126, 26, 1, 'z-1'),
(127, 26, 2, 'z-2'),
(128, 26, 3, 'z-3'),
(129, 26, 4, 'z-4'),
(130, 26, 5, 'z-5'),
(131, 26, 6, 'z-6'),
(132, 25, 6, 'y-6');

-- --------------------------------------------------------

--
-- Table structure for table `calif`
--

CREATE TABLE IF NOT EXISTS `calif` (
  `id_est` int(11) NOT NULL,
  `id_sec` int(11) NOT NULL,
  `calif` float DEFAULT NULL,
  KEY `id_est` (`id_est`),
  KEY `id_sec` (`id_sec`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carrera` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `carrera`
--

INSERT INTO `carrera` (`id`, `carrera`) VALUES
(1, 'Ing. Industrial'),
(2, 'Ing. En Computacion'),
(3, 'Ing. Informatica'),
(4, 'Ing. Biomedica'),
(5, 'Ing. En Comunicaciones Y Electronica'),
(6, 'Ing. Mecanica Electrica'),
(7, 'Ing. Robotica');

-- --------------------------------------------------------

--
-- Table structure for table `edif`
--

CREATE TABLE IF NOT EXISTS `edif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `edif`
--

INSERT INTO `edif` (`id`, `nombre`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'c'),
(4, 'd'),
(5, 'e'),
(6, 'f'),
(7, 'g'),
(8, 'h'),
(9, 'i'),
(10, 'j'),
(11, 'k'),
(12, 'l'),
(13, 'm'),
(14, 'n'),
(15, 'o'),
(16, 'p'),
(17, 'q'),
(18, 'r'),
(19, 's'),
(20, 't'),
(21, 'u'),
(22, 'v'),
(23, 'w'),
(24, 'x'),
(25, 'y'),
(26, 'z');

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`id`, `id_user`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37);

-- --------------------------------------------------------

--
-- Table structure for table `maestro`
--

CREATE TABLE IF NOT EXISTS `maestro` (
  `id_emp` int(11) NOT NULL,
  PRIMARY KEY (`id_emp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maestro`
--

INSERT INTO `maestro` (`id_emp`) VALUES
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37);

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `creditos` int(11) NOT NULL,
  `hrs_teor` int(11) NOT NULL,
  `hrs_prac` int(11) NOT NULL,
  `carrera` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `carrera` (`carrera`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`id`, `nombre`, `creditos`, `hrs_teor`, `hrs_prac`, `carrera`) VALUES
(1, 'programacion', 8, 51, 17, 3),
(2, 'seminario de programacion', 5, 0, 68, 3),
(3, 'base de datos', 8, 51, 17, 3),
(4, 'hipermedia', 8, 51, 17, 3),
(5, 'algoritmia', 8, 51, 17, 3),
(6, 'programacion', 8, 51, 17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE IF NOT EXISTS `pass` (
  `id_us` int(11) NOT NULL,
  `pass` varchar(64) NOT NULL,
  KEY `id_us` (`id_us`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pass`
--

INSERT INTO `pass` (`id_us`, `pass`) VALUES
(1, '9@8.ui'),
(2, '75@k8_.jwh'),
(3, 'Z@%z%.qggi'),
(4, '79@%p.ixjb'),
(5, 'MS8@1sics.ncj'),
(6, 'YI@4%.ilv'),
(7, 'WLYE@hrr.nhjo'),
(8, 'IB@im0.lul'),
(9, 'HD@nl4.gf'),
(10, '15NU@xds3e.xmpp'),
(11, 'F%H1D@%ao05f2.qa'),
(12, 'S2FCU%S@dvko-.omvd'),
(13, 'UIVKR@ckp.lp'),
(14, 'Z-JKR%@cixk-n.xgue'),
(15, '0DGZ_T@dxaxxy.bu'),
(16, '4BLWDY_%P@jatc.liqo'),
(17, '&KQ@c3e8jd.qlfh'),
(18, '%FOJ9@1yk.yy'),
(19, 'S@y%.meig'),
(20, 'S436@%qt.hfkn'),
(21, 'Y1PEW@_ku.kxb'),
(22, 'S@s%lqs%8t1.ye'),
(23, 'v1@u3.uoea'),
(24, 'EWD0@u.rjk'),
(25, 'YD%M9_W@u.hxyj'),
(26, '0-CDEXHP@m-6zt0%.cx'),
(27, 'MJM@d.awi'),
(28, 'R@0.pauz'),
(29, 'C@zh9hqs.nmz'),
(30, 'N8@wu.kx'),
(1, 'HM%VRY@5z_.nyg'),
(2, '1D@ea1.cjs'),
(3, '8@3.sbo'),
(4, '%AB7@gg4_kk.bcwx'),
(5, 'V47@df.vlj'),
(6, 'I2R@a.mlot'),
(7, 'T_1%S3@6un6brH.mf'),
(8, 'KX%@U8g.bubf'),
(9, 'BGT_@ox.nay'),
(10, '8@9.cz'),
(11, 'O@t.ips'),
(12, 'K_@-c.wz'),
(13, 'PA7@zf_2.cbw'),
(14, 'OEN4@i5d.lwap'),
(15, '8@b.tksb'),
(16, 'I-AD@6-.cr'),
(17, 'CGVYC@2k7n.kjb'),
(18, 'W@b0.byy'),
(19, 'JCU@fzblk.db'),
(20, '61@c.xgz'),
(21, '%%K%4GSC@8vcf.mny'),
(22, 'R5@f.xrp'),
(23, '%D@8k6w%r.fgla'),
(24, '1@-7.xko'),
(25, 'DN@ep%~.rdvr'),
(26, '4U@61r.jpum'),
(27, 'DE@9.tyj'),
(28, '5K@hc.zsbv'),
(29, '5HJZ@l.ky'),
(30, 'D@idd%3.zk'),
(31, 'PUEP@dx6f-%.tqx'),
(32, 'T76PZO@_i3q%.sw'),
(33, 'YOP@0-0jbkl.zqf'),
(34, '-PT3@cd2b.dxr'),
(35, 'N@e.iau'),
(36, '4@9j%8wk.svk'),
(37, '6_3%_C7@d.ackd'),
(38, 'K@u.uqiq'),
(39, 'J@ufb.tso'),
(40, '_@y.yp'),
(41, 'P@ju%.dmpo'),
(42, 'Y3@h4w.wolb'),
(43, 'UYDG3Z3@h%.rie'),
(44, '%L@hioy.boo'),
(45, 'TRDKN@lxo.oy'),
(46, '8@u.gtz'),
(47, '1XHL8R-U%@cngx6.rw'),
(48, 'X@3.lo'),
(49, 'PYH@%pcr_.cr'),
(50, 'SEQER3AR%@kv5e90.vr'),
(51, '8@kuxw7z%.qwi'),
(52, 'IA0L86Z%6@84ckiu%.dnx'),
(53, '0@azn9.bbvd'),
(54, '_J%%B@xop5n8d.kjz'),
(55, 'K4FEP%FL@8ltw5mlj.dzk'),
(56, 'H@tz5v9.gq'),
(57, 'XSD@5.dhya'),
(58, 'Z@0zjk.xyz'),
(59, '%5L%@tx-.gmh'),
(60, '9@4@gvpl3.tzla'),
(61, '5@n.lyg'),
(62, 'F8@hh.vtxv'),
(63, '3@5.lsy'),
(64, 'AV@1sz1f.ecf'),
(65, '_@4v.pyop'),
(66, '%@%.umwb'),
(67, 'F@g.yc'),
(68, 'M@5.kkh'),
(69, 'PKFE%M66@2vtq.xwls'),
(70, '73DBSE@66y.srh'),
(71, 'Q9JF%@43.jh'),
(72, 'B@ox_5j7.qa'),
(73, '59@f.qfms'),
(74, 'B@m.bg'),
(75, '_OAC@-o72%.cnx'),
(76, 'V1@f5cq73o.tpt'),
(77, '-H7F@4uur5.mx'),
(78, 'pp123'),
(79, 'denis123');

-- --------------------------------------------------------

--
-- Table structure for table `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namsec` varchar(10) NOT NULL,
  `materia` int(11) NOT NULL,
  `cupo` int(11) NOT NULL,
  `disp` int(11) NOT NULL,
  `dias` varchar(10) NOT NULL,
  `aula` varchar(64) NOT NULL,
  `hra_ini` time NOT NULL,
  `hra_fin` time NOT NULL,
  `f_ini` date NOT NULL,
  `f_fin` date NOT NULL,
  `maestro` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materia` (`materia`),
  KEY `aula` (`aula`),
  KEY `maestro` (`maestro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `seccion`
--

INSERT INTO `seccion` (`id`, `namsec`, `materia`, `cupo`, `disp`, `dias`, `aula`, `hra_ini`, `hra_fin`, `f_ini`, `f_fin`, `maestro`) VALUES
(1, 'SD01', 1, 40, 40, 'lu,mi', 'a-1', '09:00:00', '10:55:00', '2017-01-16', '2017-06-02', 21),
(2, 'SD01', 2, 20, 20, 'lu,mi', 'a-1', '11:00:00', '12:55:00', '2017-01-16', '2017-06-02', 22),
(3, 'SD01', 3, 20, 20, 'lu,mi', 'a-1', '07:00:00', '08:55:00', '2017-01-16', '2017-06-02', 29),
(4, 'SD01', 6, 20, 20, 'ma,ju', 'a-1', '07:00:00', '08:55:00', '2017-01-16', '2017-06-02', 20),
(5, 'SD02', 1, 20, 20, 'ma,ju', 'a-2', '07:00:00', '08:55:00', '2017-01-16', '2017-06-02', 24);

-- --------------------------------------------------------

--
-- Table structure for table `seccion2`
--

CREATE TABLE IF NOT EXISTS `seccion2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namsec` varchar(10) NOT NULL,
  `materia` int(11) NOT NULL,
  `cupo` int(11) NOT NULL,
  `lu` varchar(3) DEFAULT NULL,
  `ma` varchar(3) DEFAULT NULL,
  `mi` varchar(3) DEFAULT NULL,
  `ju` varchar(3) DEFAULT NULL,
  `vi` varchar(3) DEFAULT NULL,
  `sa` varchar(3) DEFAULT NULL,
  `aula` varchar(64) NOT NULL,
  `hra_ini` varchar(8) NOT NULL,
  `hra_fin` varchar(8) NOT NULL,
  `f_ini` date NOT NULL,
  `f_fin` date NOT NULL,
  `maestro` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materia` (`materia`),
  KEY `aula` (`aula`),
  KEY `maestro` (`maestro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `secre`
--

CREATE TABLE IF NOT EXISTS `secre` (
  `id_emp` int(11) NOT NULL,
  KEY `id_emp` (`id_emp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `secre`
--

INSERT INTO `secre` (`id_emp`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'activo'),
(2, 'alumno en articulo 34'),
(3, 'baja administrativa'),
(4, 'baja'),
(5, 'baja voluntaria');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carrera` int(11) NOT NULL,
  `admition` char(3) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `carrera`, `admition`, `user`) VALUES
(1, 7, '17B', 38),
(2, 2, '13B', 39),
(3, 5, '11B', 40),
(4, 2, '13A', 41),
(5, 7, '10A', 42),
(6, 6, '13B', 43),
(7, 3, '15B', 44),
(8, 3, '17A', 45),
(9, 2, '10B', 46),
(10, 5, '16A', 47),
(11, 5, '17B', 48),
(12, 2, '14B', 49),
(13, 7, '13A', 50),
(14, 1, '13B', 51),
(15, 5, '09B', 52),
(16, 6, '09A', 53),
(17, 3, '10B', 54),
(18, 4, '16B', 55),
(19, 3, '14B', 56),
(20, 4, '09B', 57),
(21, 4, '15A', 58),
(22, 3, '15B', 59),
(23, 5, '11A', 60),
(24, 7, '11B', 61),
(25, 1, '16B', 62),
(26, 4, '10B', 63),
(27, 5, '12A', 64),
(28, 6, '11A', 65),
(29, 1, '15B', 66),
(30, 7, '15B', 67),
(31, 4, '12B', 68),
(32, 7, '17A', 69),
(33, 5, '10A', 70),
(34, 5, '14B', 71),
(35, 1, '17A', 72),
(36, 6, '11A', 73),
(37, 5, '13B', 74),
(38, 3, '15A', 75),
(39, 7, '09A', 76),
(40, 5, '13B', 77),
(41, 3, '17A', 78),
(42, 3, '17A', 79);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'estudiante'),
(2, 'profesor'),
(3, 'secretaria'),
(4, 'administrador');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(48) CHARACTER SET utf8 NOT NULL,
  `ap1` varchar(32) CHARACTER SET utf8 NOT NULL,
  `ap2` varchar(32) CHARACTER SET utf8 NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `email_acad` varchar(64) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(64) CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_acad` (`email_acad`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_acad_2` (`email_acad`),
  KEY `type` (`type`),
  KEY `user_ibfk_2_idx` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=80 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nombre`, `ap1`, `ap2`, `email`, `email_acad`, `pass`, `type`, `status`) VALUES
(1, 'paola', 'aranda', 'barajas', 'paola.aranda-barajas@hotmail.es', 'paola.aranda@administrativo.schoolduck.com', '2f5cb8fb494bfeb7a10a8c318b1f6d2f435376f9', 3, 1),
(2, 'malak', 'lucero', 'báez', 'malak.lucero-baez@latinmail.com', 'malak.lucero@administrativo.schoolduck.com', 'f46be4367a27e9cc9721c084ba53dae3867993da', 3, 1),
(3, 'paola', 'caldera', 'rodríguez', 'paola.caldera-rodriguez@yahoo.com', 'paola.caldera@administrativo.schoolduck.com', '812834d78edfd225fa2813be7a5ed5507aca9d1e', 3, 1),
(4, 'sara', 'dávila', 'ordoñez', 'sara.davila-ordonez@yahoo.com', 'sara.davila@administrativo.schoolduck.com', '37385362118e812ce1fac5b2b80caae8bbd166d6', 3, 1),
(5, 'abril', 'perea', 'preciado', 'abril.perea-preciado@yahoo.es', 'abril.perea@administrativo.schoolduck.com', 'e651eb009c46abffdcf7e54a2f6133548cc648c9', 3, 1),
(6, 'valentina', 'aguilar', 'ulloa', 'valentina.aguilar-ulloa@hotmail.es', 'valentina.aguilar@administrativo.schoolduck.com', '158936c3a5949e847ac8f46fb0c90e3120494979', 3, 3),
(7, 'nil', 'chacón', 'mireles', 'nil.chacon-mireles@terra.com', 'nil.chacon@administrativo.schoolduck.com', '2f4a6df6b3bfa58b61250e41f108f62dd72de8f1', 3, 3),
(8, 'natalia', 'torres', 'chávez', 'natalia.torres-chavez@live.com', 'natalia.torres@administrativo.schoolduck.com', '5b1c51db5ed5ec565a3072e3f072fd5f39c3b259', 3, 1),
(9, 'mar', 'saucedo', 'zayas', 'mar.saucedo-zayas@live.com', 'mar.saucedo@administrativo.schoolduck.com', 'f34d780eeb0e76c906baa876efdfad728c101056', 3, 1),
(10, 'ariadna', 'rodarte', 'toro', 'ariadna.rodarte-toro@hispavista.com', 'ariadna.rodarte@administrativo.schoolduck.com', '5f2f5ff5518b41bf89ff20f774dbd772106167b8', 3, 4),
(11, 'oliver', 'niño', 'campos', 'oliver.nino-campos@gmail.com', 'oliver.nino@admin.schoolduck.com', '29a2f8f07d8a7c45bc847a3d8fd1e1c47c1cfbfb', 4, 1),
(12, 'adam', 'carbajal', 'alcala', 'adam.carbajal-alcala@yahoo.es', 'adam.carbajal@admin.schoolduck.com', 'dbd60366d2e8dc56a2548b1716297fd17551c8bf', 4, 1),
(13, 'cristina', 'luis', 'deleón', 'cristina.luis-deleon@yahoo.es', 'cristina.luis@admin.schoolduck.com', '968101179bab860164821c4bcc9c997e27c5b172', 4, 1),
(14, 'luis', 'armas', 'mares', 'luis.armas-mares@yahoo.com', 'luis.armas@admin.schoolduck.com', '7941c0c5eb85cb21f21b5f52a5976656db4e48e4', 4, 1),
(15, 'aitana', 'arreola', 'puga', 'aitana.arreola-puga@gmail.com', 'aitana.arreola@admin.schoolduck.com', 'ba85f3922bb7ccec8b025cea8b21c07bec6115e0', 4, 1),
(16, 'javier', 'rodarte', 'rojo', 'javier.rodarte-rojo@latinmail.com', 'javier.rodarte@admin.schoolduck.com', 'd379990a02a8506188cd757ada7b4b76ba1cedec', 4, 3),
(17, 'alexia', 'munguía', 'escudero', 'alexia.munguia-escudero@yahoo.es', 'alexia.munguia@admin.schoolduck.com', '9e14a5881c1f4f6942e9e7c98f9d4d075a6673aa', 4, 4),
(18, 'martina', 'ponce', 'santiago', 'martina.ponce-santiago@yahoo.com', 'martina.ponce@docentes.schoolduck.com', '74d36268d9d39c02c82cb90c4bbc71623d17478e', 2, 1),
(19, 'bruno', 'almanza', 'montez', 'bruno.almanza-montez@live.com', 'bruno.almanza@docentes.schoolduck.com', '6974daf6b0514952f97b3615369cff21b11d6cd2', 2, 1),
(20, 'arnau', 'rentería', 'amador', 'arnau.renteria-amador@terra.com', 'arnau.renteria@docentes.schoolduck.com', 'ecfdeaa9b44c282a9b01194b34eefacabdd2a673', 2, 1),
(21, 'cristian', 'arguello', 'rodríguez', 'cristian.arguello-rodriguez@gmail.com', 'cristian.arguello@docentes.schoolduck.com', '1dece5947769fe75bd3a3639ecd3fa41da015ad3', 2, 1),
(22, 'oriol', 'chávez', 'benavídez', 'oriol.chavez-benavidez@latinmail.com', 'oriol.chavez@docentes.schoolduck.com', '302ed77e9c67f4be4d192a20b1daf4737e4d1759', 2, 1),
(23, 'elena', 'medina', 'villanueva', 'elena.medina-villanueva@hotmail.es', 'elena.medina@docentes.schoolduck.com', 'f902e69d571f7df72e9f7f133b627c4824882ffc', 2, 1),
(24, 'paula', 'espinal', 'vanegas', 'paula.espinal-vanegas@terra.com', 'paula.espinal@docentes.schoolduck.com', '09b5d9ede2529381ffcc2984c725143363b483e8', 2, 1),
(25, 'oscar', 'alva', 'aguilar', 'oscar.alva-aguilar@live.com', 'oscar.alva@docentes.schoolduck.com', '6094918bd57250ef2f66438293ebca3449a69b57', 2, 1),
(26, 'joan', 'castellano', 'moran', 'joan.castellano-moran@hotmail.com', 'joan.castellano@docentes.schoolduck.com', '28bc87a8c7ebf3b8312b50a88b1f8d7ecd1b13eb', 2, 1),
(27, 'aitor', 'dueñas', 'cordero', 'aitor.duenas-cordero@live.com', 'aitor.duenas@docentes.schoolduck.com', 'e3c99d51c57ab2f79b5447507561fe387ed54656', 2, 1),
(28, 'gerard', 'pineda', 'villegas', 'gerard.pineda-villegas@hotmail.com', 'gerard.pineda@docentes.schoolduck.com', 'c52c701aef96320b59d42097b94f8b500b21f049', 2, 1),
(29, 'ruben', 'valencia', 'páez', 'ruben.valencia-paez@hispavista.com', 'ruben.valencia@docentes.schoolduck.com', '4bc4b875c365235ff9dfb3adeae6987fa0252c09', 2, 1),
(30, 'mohamed', 'vergara', 'sisneros', 'mohamed.vergara-sisneros@terra.com', 'mohamed.vergara@docentes.schoolduck.com', 'dee9cc91414832527da39fb0cf22042c9e595899', 2, 1),
(31, 'miriam', 'molina', 'tejada', 'miriam.molina-tejada@hotmail.com', 'miriam.molina@docentes.schoolduck.com', '31782a4264baf0aeb88feae5d72e721f6b868243', 2, 1),
(32, 'marcos', 'bernal', 'millán', 'marcos.bernal-millan@terra.com', 'marcos.bernal@docentes.schoolduck.com', 'cbaea18293d502c64934888e5bcba806525536d1', 2, 1),
(33, 'pedro', 'mas', 'olivas', 'pedro.mas-olivas@hotmail.es', 'pedro.mas@docentes.schoolduck.com', '21fa3e3d220f2e2070437a6f04ffeb3c560a4016', 2, 1),
(34, 'izan', 'mejía', 'cardenas', 'izan.mejia-cardenas@latinmail.com', 'izan.mejia@docentes.schoolduck.com', '7fad47b22884b478a9bd0aa76162477de1a56567', 2, 1),
(35, 'aitor', 'balderas', 'salazar', 'aitor.balderas-salazar@hispavista.com', 'aitor.balderas@docentes.schoolduck.com', '4a6ebfb2abb023421e53f9d7c61ddc5bfcee1531', 2, 3),
(36, 'mohamed', 'godínez', 'acuña', 'mohamed.godinez-acuna@hotmail.com', 'mohamed.godinez@docentes.schoolduck.com', '3e1650f1a532b88ac429c91f3b20c40d6a1bc6c8', 2, 4),
(37, 'raquel', 'tijerina', 'posada', 'raquel.tijerina-posada@gmail.com', 'raquel.tijerina@docentes.schoolduck.com', '0d9438226a3026d7b18e97de9418f0ae45d436ec', 2, 3),
(38, 'alex', 'ruelas', 'salcedo', 'alex.ruelas-salcedo@yahoo.es', 'alex.ruelas@alumnos.schoolduck.com', '0690cf96361d750d3e7e851427a8fe20cd9c9ba0', 1, 1),
(39, 'celia', 'balderas', 'rangel', 'celia.balderas-rangel@live.com', 'celia.balderas@alumnos.schoolduck.com', '972bade0369b7f49cd833542c01df538a3481b65', 1, 1),
(40, 'alejandra', 'alicea', 'arribas', 'alejandra.alicea-arribas@latinmail.com', 'alejandra.alicea@alumnos.schoolduck.com', 'f002902f27943f03a506e0758a7a96d4e6cb7267', 1, 1),
(41, 'aleix', 'conde', 'valladares', 'aleix.conde-valladares@hotmail.es', 'aleix.conde@alumnos.schoolduck.com', '8f77fd98f1a95e297819bcb56b6c2e81bfff4ae3', 1, 1),
(42, 'arnau', 'solano', 'valle', 'arnau.solano-valle@yahoo.com', 'arnau.solano@alumnos.schoolduck.com', '69b4ed73ec342afe41dba4e7a2795923d08c174f', 1, 1),
(43, 'arnau', 'arias', 'pineda', 'arnau.arias-pineda@latinmail.com', 'arnau.arias@alumnos.schoolduck.com', '14b1ed65599d5fedd56f21fe704301047550de6c', 1, 1),
(44, 'patricia', 'puga', 'frías', 'patricia.puga-frias@yahoo.es', 'patricia.puga@alumnos.schoolduck.com', '3e30c09c9c33e1b8e5262b62724106858a310440', 1, 1),
(45, 'valeria', 'vega', 'montaño', 'valeria.vega-montano@latinmail.com', 'valeria.vega@alumnos.schoolduck.com', 'e0dbdabb5f1206f1a6c2488bded658078302619b', 1, 1),
(46, 'guillermo', 'osorio', 'correa', 'guillermo.osorio-correa@yahoo.es', 'guillermo.osorio@alumnos.schoolduck.com', 'b3842cd8209cea87de8c953666870b23780f128d', 1, 1),
(47, 'nuria', 'luevano', 'juárez', 'nuria.luevano-juarez@yahoo.com', 'nuria.luevano@alumnos.schoolduck.com', '6fadd8cd9c8b8f2e6e63d925c1984fb7bc0d2e5e', 1, 1),
(48, 'africa', 'castellano', 'leal', 'africa.castellano-leal@hispavista.com', 'africa.castellano@alumnos.schoolduck.com', '21af6c0dfaf5c8687a8c8710ab3df0a6c4ff8805', 1, 1),
(49, 'erika', 'vallejo', 'lerma', 'erika.vallejo-lerma@yahoo.com', 'erika.vallejo@alumnos.schoolduck.com', '3aa60d47422573fad62ed45a547693e227627fe1', 1, 1),
(50, 'bruno', 'moran', 'garza', 'bruno.moran-garza@terra.com', 'bruno.moran@alumnos.schoolduck.com', 'a6a2176106fec88eabed59e7990f41558088e971', 1, 1),
(51, 'nora', 'ojeda', 'posada', 'nora.ojeda-posada@yahoo.es', 'nora.ojeda@alumnos.schoolduck.com', '186cf08a4e11a9b8f7104de7d4d81eb8425a9f5b', 1, 1),
(52, 'eduardo', 'pardo', 'bustamante', 'eduardo.pardo-bustamante@hotmail.com', 'eduardo.pardo@alumnos.schoolduck.com', '7bf05fa85291dc40c350d99ba9c34996ce6835da', 1, 1),
(53, 'naiara', 'garza', 'valdivia', 'naiara.garza-valdivia@hotmail.com', 'naiara.garza@alumnos.schoolduck.com', '0bd663da28ad76011b5893d01744e61310832747', 1, 1),
(54, 'oscar', 'zúñiga', 'arriaga', 'oscar.zuniga-arriaga@hotmail.com', 'oscar.zuniga@alumnos.schoolduck.com', '2f468658c02a00efdc33dc888597ce1fc9f5b903', 1, 1),
(55, 'arnau', 'ocampo', 'de la cruz', 'arnau.ocampo-de_la_cruz@hotmail.com', 'arnau.ocampo@alumnos.schoolduck.com', '265cc17e5a952a0d9ebe1144b9cb809478fd88c7', 1, 1),
(56, 'valentina', 'miguel', 'solorio', 'valentina.miguel-solorio@yahoo.com', 'valentina.miguel@alumnos.schoolduck.com', '8f49410a5cc59ba0c8b4bf2199c7f52a77db0f45', 1, 1),
(57, 'cristina', 'quintero', 'sedillo', 'cristina.quintero-sedillo@live.com', 'cristina.quintero@alumnos.schoolduck.com', 'f7dea983ddc8b5ae147a1d848941f4f83c61ad4a', 1, 1),
(58, 'carlos', 'montenegro', 'santacruz', 'carlos.montenegro-santacruz@hotmail.com', 'carlos.montenegro@alumnos.schoolduck.com', 'b1ce5b2cda37f6a14fb9becd351f59bf998fd029', 1, 1),
(59, 'santiago', 'hernádez', 'carrasco', 'santiago.hernadez-carrasco@yahoo.es', 'santiago.hernadez@alumnos.schoolduck.com', 'd85d239d97f47deb65330541a82330a7be88f3a0', 1, 1),
(60, 'aaron', 'hidalgo', 'bravo', 'aaron.hidalgo-bravo@hispavista.com', 'aaron.hidalgo@alumnos.schoolduck.com', 'a18f103912b2da63fc7d12d59c0ca1b44f0f57b7', 1, 1),
(61, 'mara', 'zapata', 'peláez', 'mara.zapata-pelaez@hotmail.es', 'mara.zapata@alumnos.schoolduck.com', '001d763edfb638e2a10a3c5b69bdce6a12ddd5ef', 1, 1),
(62, 'emma', 'jáquez', 'negrón', 'emma.jaquez-negron@yahoo.com', 'emma.jaquez@alumnos.schoolduck.com', 'ffdd8527574345abed04bf37010c39c3b38c4b0e', 1, 1),
(63, 'aina', 'ruíz', 'collado', 'aina.ruiz-collado@terra.com', 'aina.ruiz@alumnos.schoolduck.com', 'd157326f14b15eba8f5b85cce8006570407ffc08', 1, 1),
(64, 'olivia', 'olmos', 'sola', 'olivia.olmos-sola@hotmail.es', 'olivia.olmos@alumnos.schoolduck.com', 'bc67da3ba805ebb5c0d106ca9e8e062506aecc57', 1, 1),
(65, 'carla', 'urrutia', 'sepúlveda', 'carla.urrutia-sepulveda@yahoo.com', 'carla.urrutia@alumnos.schoolduck.com', '8d163509dcbaa3904c69eaf0f265a0e0454fb1f0', 1, 1),
(66, 'ines', 'prieto', 'ferrer', 'ines.prieto-ferrer@yahoo.com', 'ines.prieto@alumnos.schoolduck.com', '468f263c5e42597918115c637aef9c62df398235', 1, 1),
(67, 'jon', 'soto', 'ulibarri', 'jon.soto-ulibarri@live.com', 'jon.soto@alumnos.schoolduck.com', '64006738246006dc6b7d4ec7314d578fea056f93', 1, 1),
(68, 'africa', 'asensio', 'rosa', 'africa.asensio-rosa@yahoo.com', 'africa.asensio@alumnos.schoolduck.com', 'b02f47f4b2d36f85a525d13875e838862c41170d', 1, 5),
(69, 'gonzalo', 'beltrán', 'ruelas', 'gonzalo.beltran-ruelas@yahoo.com', 'gonzalo.beltran@alumnos.schoolduck.com', 'f96cd546601de2e365a0e7b416c6f1ded10ebcf1', 1, 2),
(70, 'jimena', 'llorente', 'moran', 'jimena.llorente-moran@hotmail.es', 'jimena.llorente@alumnos.schoolduck.com', '189b651f4c95ec483dadd54f430add3e67402093', 1, 1),
(71, 'joel', 'negrete', 'barrios', 'joel.negrete-barrios@hispavista.com', 'joel.negrete@alumnos.schoolduck.com', '69620238e463051e2238f9e095491f3e2997c1d5', 1, 5),
(72, 'ona', 'guardado', 'orosco', 'ona.guardado-orosco@yahoo.es', 'ona.guardado@alumnos.schoolduck.com', 'f2022a98ca90da52084e6291f34d125281dfa301', 1, 2),
(73, 'omar', 'delao', 'lucio', 'omar.delao-lucio@hispavista.com', 'omar.delao@alumnos.schoolduck.com', 'e74d3faa2eff0b9b2328cdaea3fe680a06151536', 1, 3),
(74, 'pol', 'orellana', 'bueno', 'pol.orellana-bueno@live.com', 'pol.orellana@alumnos.schoolduck.com', 'ebd54f0f913fb14ed47767f076d735a4c9b3c986', 1, 4),
(75, 'adriana', 'arredondo', 'lorenzo', 'adriana.arredondo-lorenzo@gmail.com', 'adriana.arredondo@alumnos.schoolduck.com', '868b2b78b9108eac3491466f145dea84c6f84ee6', 1, 1),
(76, 'gabriela', 'benavides', 'ayala', 'gabriela.benavides-ayala@hispavista.com', 'gabriela.benavides@alumnos.schoolduck.com', '24455d86d5ed41fcc573d78ae3d24af0594ae42a', 1, 1),
(77, 'jon', 'marcos', 'prado', 'jon.marcos-prado@hotmail.com', 'jon.marcos@alumnos.schoolduck.com', 'b6c06f6e01ce9db455d25b9c2e8bd01d926c889d', 1, 2),
(78, 'jose antonio', 'lopez', 'gonzales', 'pp_lopez@hotmail.com', 'jose_antonio.lopez@alumnos.schoolduck.com', 'f450f3d376f7120e2e25a3665a5ae46fdb1a8ea8', 1, 1),
(79, 'denis', 'gaona', 'bojorquez', 'denissita@gmail.com', 'denis.gaona@alumnos.schoolduck.com', 'c491589d4b21143f31b072ec7d031052c6834642', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
