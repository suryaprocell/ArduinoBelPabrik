-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2016 at 05:24 AM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bel_otomatis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_seq_bel`
--

CREATE TABLE IF NOT EXISTS `tabel_seq_bel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jam` time DEFAULT NULL,
  `senin` tinyint(1) NOT NULL,
  `selasa` tinyint(1) NOT NULL,
  `rabu` tinyint(1) NOT NULL,
  `kamis` tinyint(1) NOT NULL,
  `jumat` tinyint(1) NOT NULL,
  `sabtu` tinyint(1) NOT NULL,
  `minggu` tinyint(1) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=496 ;

--
-- Dumping data for table `tabel_seq_bel`
--

INSERT INTO `tabel_seq_bel` (`id`, `jam`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `sabtu`, `minggu`, `keterangan`) VALUES
(3, '01:00:00', 1, 1, 1, 1, 1, 1, 1, 'cutting2, jahit2, Toyota2 istirahat'),
(10, '01:35:00', 1, 1, 1, 1, 1, 1, 1, 'cutting2, jahit2, Toyota2 persiapan masuk'),
(17, '01:40:00', 1, 1, 1, 1, 1, 1, 1, 'cutting2, jahit2, Toyota2 masuk'),
(31, '05:45:00', 1, 1, 1, 1, 1, 1, 1, 'toyota2 Pulang'),
(38, '05:55:00', 1, 1, 1, 1, 1, 1, 1, 'Cutting1, jahit1 Persiapan masuk'),
(45, '06:00:00', 1, 1, 1, 1, 1, 1, 1, 'cutting1, jahit1 masuk'),
(52, '06:10:00', 1, 1, 1, 1, 1, 1, 1, 'toyota1 persiapan masuk'),
(59, '06:15:00', 1, 1, 1, 1, 1, 1, 1, 'toyota1 masuk'),
(66, '06:50:00', 1, 1, 1, 1, 1, 1, 1, 'office persiapan masuk'),
(73, '07:00:00', 1, 1, 1, 1, 1, 1, 1, 'office masuk'),
(80, '09:30:00', 1, 1, 1, 1, 1, 1, 1, 'cutting1, jahit1, office istirahat'),
(87, '09:35:00', 1, 1, 1, 1, 1, 1, 1, 'cutting1, jahit1, office persiapan masuk'),
(94, '09:40:00', 1, 1, 1, 1, 1, 1, 1, 'cutting1, jahit1, office masuk. toyota1 istirahat'),
(101, '09:45:00', 1, 1, 1, 1, 1, 1, 1, 'toyota1 persiapan masuk'),
(108, '09:49:00', 1, 1, 1, 1, 1, 1, 1, 'toyota1 masuk'),
(121, '12:00:00', 1, 1, 1, 1, 0, 1, 1, 'cutting1, jahit1, office istirahat'),
(127, '13:00:00', 1, 1, 1, 1, 0, 1, 1, 'toyota1 persiapan masuk'),
(133, '13:04:00', 1, 1, 1, 1, 0, 1, 1, 'toyota1 masuk'),
(139, '12:45:00', 1, 1, 1, 1, 0, 1, 1, 'cutting1, jahit1, office persiapan masuk'),
(145, '12:49:00', 1, 1, 1, 1, 0, 1, 1, 'cutting1, jahit1, office masuk'),
(151, '15:00:00', 1, 1, 1, 1, 1, 1, 1, 'cutting1, jahit1, pulang'),
(158, '15:15:00', 1, 1, 1, 1, 1, 1, 1, 'toyota1, pulang'),
(165, '16:00:00', 1, 1, 1, 1, 1, 1, 1, 'office, pulang'),
(179, '20:40:00', 1, 1, 1, 1, 1, 1, 1, 'toyota2 masuk'),
(186, '20:35:00', 1, 1, 1, 1, 1, 1, 1, 'toyota2 persiapan masuk'),
(200, '17:00:00', 1, 1, 1, 1, 1, 1, 1, 'Cutting1, jahit1, pulang lembur'),
(207, '15:20:00', 1, 1, 1, 1, 1, 1, 1, 'toyota 1 persiapan masuk lembur'),
(214, '15:24:00', 1, 1, 1, 1, 1, 1, 1, 'toyota 1 masuk lembur'),
(244, '18:20:00', 1, 1, 1, 1, 1, 1, 1, 'Cutting2, Jahit2, persiapan masuk lembur'),
(258, '18:40:00', 1, 1, 1, 1, 1, 1, 1, 'Toyota2 masuk lembur'),
(259, '22:00:00', 1, 1, 1, 1, 1, 1, 1, 'jahit2, toyota2, cutting2 istirahat'),
(266, '22:05:00', 1, 1, 1, 1, 1, 1, 1, 'jahit2, toyota2, cutting2 persiapan masuk'),
(273, '22:09:00', 1, 1, 1, 1, 1, 1, 1, 'jahit2, toyota2, cutting2 masuk'),
(280, '17:25:00', 1, 1, 1, 1, 1, 1, 1, 'Toyota1 pulang lembur'),
(495, '18:35:00', 1, 1, 1, 1, 1, 1, 1, 'toyota2 persiapan masuk lembur'),
(494, '20:25:00', 1, 1, 1, 1, 1, 1, 1, 'cutting2, jahit2 masuk'),
(493, '20:20:00', 1, 1, 1, 1, 1, 1, 1, 'cutting2, jahit2 persiapan masuk'),
(491, '18:25:00', 1, 1, 1, 1, 1, 1, 1, 'cutting2, jahit2 masuk lembur'),
(489, '05:30:00', 1, 1, 1, 1, 1, 1, 1, 'cutting2, jahit2 pulang'),
(490, '12:15:00', 1, 1, 1, 1, 0, 1, 1, 'toyota1 istirahat');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
