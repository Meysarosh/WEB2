-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 06:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feladat`
--
CREATE DATABASE IF NOT EXISTS feladat DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE feladat;
-- --------------------------------------------------------

--
-- Table structure for table `helyseg`
--

CREATE TABLE `helyseg` (
  `az` int(11) NOT NULL,
  `nev` varchar(255) DEFAULT NULL,
  `orszag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `helyseg`
--

INSERT INTO `helyseg` (`az`, `nev`, `orszag`) VALUES
(1, 'Sousse', 'Tunézia'),
(2, 'Djerba', 'Tunézia'),
(3, 'Sharm El Sheikh', 'Egyiptom'),
(4, 'Hurghada', 'Egyiptom');

-- --------------------------------------------------------

--
-- Table structure for table `szalloda`
--

CREATE TABLE `szalloda` (
  `az` varchar(255) NOT NULL,
  `nev` varchar(255) DEFAULT NULL,
  `besorolas` int(11) NOT NULL CHECK (`besorolas` between 1 and 5),
  `helyseg_az` int(11) NOT NULL,
  `tengerpart_tav` int(11) NOT NULL,
  `repter_tav` int(11) NOT NULL,
  `felpanzio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `szalloda`
--

INSERT INTO `szalloda` (`az`, `nev`, `besorolas`, `helyseg_az`, `tengerpart_tav`, `repter_tav`, `felpanzio`) VALUES
('BS', 'Baron Resort', 5, 3, 0, 15, 1),
('CL', 'Charm Life', 3, 4, 0, 33, 0),
('CP', 'Cesar Palace', 5, 2, 250, 27, 1),
('CW', 'Caribbean World Soma Bay', 5, 4, 0, 55, 0),
('CZ', 'Crowne Plaza', 4, 3, 400, 9, 1),
('FJ', 'Festival Le Jardin Resort', 4, 4, 0, 17, 0),
('HB', 'Lti Holiday Beach Resort', 4, 2, 100, 20, 1),
('JR', 'Jinene Resort', 4, 1, 50, 25, 1),
('MB', 'Marhaba', 3, 1, 0, 25, 1),
('MD', 'Miramar Djerba', 3, 2, 300, 22, 1),
('MP', 'El Mouradi Palace', 5, 1, 0, 35, 1),
('TA', 'Tropicana Azur', 4, 3, 400, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tavasz`
--

CREATE TABLE `tavasz` (
  `sorszam` int(11) NOT NULL,
  `szalloda_az` varchar(255) DEFAULT NULL,
  `indulas` varchar(255) DEFAULT NULL,
  `idotartam` int(11) NOT NULL,
  `ar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tavasz`
--

INSERT INTO `tavasz` (`sorszam`, `szalloda_az`, `indulas`, `idotartam`, `ar`) VALUES
(1, 'BS', '2011.01.05', 8, 244900),
(2, 'BS', '2011.01.05', 15, 358900),
(3, 'BS', '2011.01.12', 8, 157900),
(4, 'BS', '2011.01.12', 15, 265900),
(5, 'BS', '2011.01.19', 8, 157900),
(6, 'BS', '2011.01.19', 15, 265900),
(7, 'BS', '2011.01.26', 8, 157900),
(8, 'BS', '2011.01.26', 15, 265900),
(9, 'BS', '2011.02.02', 8, 157900),
(10, 'BS', '2011.02.02', 15, 265900),
(11, 'BS', '2011.02.09', 8, 157900),
(12, 'BS', '2011.02.09', 15, 289900),
(13, 'BS', '2011.02.16', 8, 176900),
(14, 'BS', '2011.02.16', 15, 303900),
(15, 'BS', '2011.02.23', 8, 176900),
(16, 'BS', '2011.02.23', 15, 303900),
(17, 'BS', '2011.03.02', 8, 176900),
(18, 'BS', '2011.03.02', 15, 303900),
(19, 'BS', '2011.03.09', 8, 188900),
(20, 'BS', '2011.03.09', 15, 322900),
(21, 'BS', '2011.03.16', 8, 188900),
(22, 'BS', '2011.03.16', 15, 322900),
(23, 'BS', '2011.03.23', 8, 188900),
(24, 'BS', '2011.03.23', 15, 358900),
(25, 'BS', '2011.03.30', 8, 230900),
(26, 'BS', '2011.03.30', 15, 394900),
(27, 'BS', '2011.04.06', 8, 230900),
(28, 'BS', '2011.04.06', 15, 394900),
(29, 'BS', '2011.04.13', 8, 230900),
(30, 'BS', '2011.04.13', 15, 406900),
(31, 'BS', '2011.04.20', 8, 230900),
(32, 'BS', '2011.04.20', 15, 445900),
(33, 'BS', '2011.04.27', 8, 268900),
(34, 'CL', '2011.01.02', 8, 59900),
(35, 'CL', '2011.01.02', 15, 99900),
(36, 'CL', '2011.01.09', 8, 83900),
(37, 'CL', '2011.01.09', 15, 124900),
(38, 'CL', '2011.01.16', 8, 91900),
(39, 'CL', '2011.01.16', 15, 144900),
(40, 'CL', '2011.01.23', 8, 91900),
(41, 'CL', '2011.01.23', 15, 144900),
(42, 'CL', '2011.01.30', 8, 91900),
(43, 'CL', '2011.01.30', 15, 144900),
(44, 'CL', '2011.02.06', 8, 98900),
(45, 'CL', '2011.02.06', 15, 144900),
(46, 'CL', '2011.02.13', 8, 98900),
(47, 'CL', '2011.02.13', 15, 144900),
(48, 'CL', '2011.02.20', 8, 98900),
(49, 'CL', '2011.02.20', 15, 147900),
(50, 'CL', '2011.02.27', 8, 98900),
(51, 'CL', '2011.02.27', 15, 147900),
(52, 'CL', '2011.03.06', 8, 106900),
(53, 'CL', '2011.03.06', 15, 157900),
(54, 'CL', '2011.03.10', 11, 128900),
(55, 'CL', '2011.03.13', 8, 106900),
(56, 'CL', '2011.03.13', 12, 135900),
(57, 'CL', '2011.03.13', 15, 157900),
(58, 'CL', '2011.03.17', 8, 105900),
(59, 'CL', '2011.03.17', 11, 128900),
(60, 'CL', '2011.03.17', 15, 157900),
(61, 'CL', '2011.03.20', 8, 106900),
(62, 'CL', '2011.03.20', 12, 135900),
(63, 'CL', '2011.03.20', 15, 157900),
(64, 'CL', '2011.03.24', 8, 105900),
(65, 'CL', '2011.03.24', 11, 128900),
(66, 'CL', '2011.03.24', 15, 157900),
(67, 'CL', '2011.03.27', 8, 106900),
(68, 'CL', '2011.03.27', 12, 135900),
(69, 'CL', '2011.03.27', 15, 157900),
(70, 'CL', '2011.03.31', 8, 105900),
(71, 'CL', '2011.03.31', 11, 128900),
(72, 'CL', '2011.03.31', 15, 157900),
(73, 'CL', '2011.04.03', 8, 106900),
(74, 'CL', '2011.04.03', 12, 135900),
(75, 'CL', '2011.04.03', 15, 166900),
(76, 'CL', '2011.04.07', 8, 105900),
(77, 'CL', '2011.04.07', 11, 136900),
(78, 'CL', '2011.04.07', 15, 180900),
(79, 'CL', '2011.04.10', 8, 114900),
(80, 'CL', '2011.04.10', 12, 155900),
(81, 'CL', '2011.04.10', 15, 181900),
(82, 'CL', '2011.04.14', 8, 125900),
(83, 'CL', '2011.04.14', 11, 150900),
(84, 'CL', '2011.04.14', 15, 180900),
(85, 'CL', '2011.04.17', 8, 122900),
(86, 'CL', '2011.04.17', 12, 149900),
(87, 'CL', '2011.04.17', 15, 172900),
(88, 'CL', '2011.04.21', 8, 108900),
(89, 'CL', '2011.04.21', 11, 130900),
(90, 'CL', '2011.04.21', 15, 160900),
(91, 'CL', '2011.04.24', 8, 106900),
(92, 'CL', '2011.04.28', 8, 105900),
(93, 'CP', '2011.01.23', 8, 97900),
(94, 'CP', '2011.01.23', 15, 143900),
(95, 'CP', '2011.01.30', 8, 97900),
(96, 'CP', '2011.01.30', 15, 143900),
(97, 'CP', '2011.02.06', 8, 97900),
(98, 'CP', '2011.02.06', 15, 143900),
(99, 'CP', '2011.02.13', 8, 97900),
(100, 'CP', '2011.02.13', 15, 143900),
(101, 'CP', '2011.02.20', 8, 97900),
(102, 'CP', '2011.02.20', 15, 143900),
(103, 'CP', '2011.02.27', 8, 97900),
(104, 'CP', '2011.02.27', 15, 143900),
(105, 'CP', '2011.03.06', 8, 97900),
(106, 'CP', '2011.03.06', 15, 143900),
(107, 'CP', '2011.03.13', 8, 97900),
(108, 'CP', '2011.03.13', 15, 143900),
(109, 'CP', '2011.03.20', 8, 97900),
(110, 'CP', '2011.03.20', 15, 143900),
(111, 'CP', '2011.03.27', 8, 97900),
(112, 'CP', '2011.03.27', 15, 143900),
(113, 'CP', '2011.04.03', 8, 97900),
(114, 'CP', '2011.04.03', 15, 154900),
(115, 'CP', '2011.04.10', 8, 104900),
(116, 'CP', '2011.04.10', 15, 154900),
(117, 'CP', '2011.04.17', 8, 97900),
(118, 'CP', '2011.04.17', 15, 143900),
(119, 'CP', '2011.04.24', 8, 97900),
(120, 'CW', '2011.01.02', 8, 79900),
(121, 'CW', '2011.01.02', 15, 119900),
(122, 'CW', '2011.01.09', 8, 93900),
(123, 'CW', '2011.01.09', 15, 142900),
(124, 'CW', '2011.01.16', 8, 112900),
(125, 'CW', '2011.01.16', 15, 178900),
(126, 'CW', '2011.01.23', 8, 112900),
(127, 'CW', '2011.01.23', 15, 178900),
(128, 'CW', '2011.01.30', 8, 112900),
(129, 'CW', '2011.01.30', 15, 178900),
(130, 'CW', '2011.02.06', 8, 119900),
(131, 'CW', '2011.02.06', 15, 188900),
(132, 'CW', '2011.02.13', 8, 119900),
(133, 'CW', '2011.02.13', 15, 188900),
(134, 'CW', '2011.02.20', 8, 119900),
(135, 'CW', '2011.02.20', 15, 188900),
(136, 'CW', '2011.02.27', 8, 119900),
(137, 'CW', '2011.02.27', 15, 188900),
(138, 'CW', '2011.03.06', 8, 128900),
(139, 'CW', '2011.03.06', 15, 200900),
(140, 'CW', '2011.03.10', 11, 158900),
(141, 'CW', '2011.03.13', 8, 128900),
(142, 'CW', '2011.03.13', 12, 169900),
(143, 'CW', '2011.03.13', 15, 200900),
(144, 'CW', '2011.03.17', 8, 127900),
(145, 'CW', '2011.03.17', 11, 158900),
(146, 'CW', '2011.03.17', 15, 200900),
(147, 'CW', '2011.03.20', 8, 128900),
(148, 'CW', '2011.03.20', 12, 169900),
(149, 'CW', '2011.03.20', 15, 200900),
(150, 'CW', '2011.03.24', 8, 127900),
(151, 'CW', '2011.03.24', 11, 158900),
(152, 'CW', '2011.03.24', 15, 200900),
(153, 'CW', '2011.03.27', 8, 128900),
(154, 'CW', '2011.03.27', 12, 169900),
(155, 'CW', '2011.03.27', 15, 205900),
(156, 'CW', '2011.03.31', 8, 127900),
(157, 'CW', '2011.03.31', 11, 163900),
(158, 'CW', '2011.03.31', 15, 226900),
(159, 'CW', '2011.04.03', 8, 132900),
(160, 'CW', '2011.04.03', 12, 194900),
(161, 'CW', '2011.04.03', 15, 241900),
(162, 'CW', '2011.04.07', 8, 152900),
(163, 'CW', '2011.04.07', 11, 199900),
(164, 'CW', '2011.04.07', 15, 241900),
(165, 'CW', '2011.04.10', 8, 163900),
(166, 'CW', '2011.04.10', 12, 205900),
(167, 'CW', '2011.04.10', 15, 236900),
(168, 'CW', '2011.04.14', 8, 142900),
(169, 'CW', '2011.04.14', 11, 174900),
(170, 'CW', '2011.04.14', 15, 216900),
(171, 'CW', '2011.04.17', 8, 128900),
(172, 'CW', '2011.04.17', 12, 169900),
(173, 'CW', '2011.04.17', 15, 200900),
(174, 'CW', '2011.04.21', 8, 127900),
(175, 'CW', '2011.04.21', 11, 158900),
(176, 'CW', '2011.04.21', 15, 200900),
(177, 'CW', '2011.04.24', 8, 128900),
(178, 'CW', '2011.04.28', 8, 127900),
(179, 'CZ', '2011.01.05', 8, 59900),
(180, 'CZ', '2011.01.05', 15, 99900),
(181, 'CZ', '2011.01.12', 8, 86900),
(182, 'CZ', '2011.01.12', 15, 130900),
(183, 'CZ', '2011.01.19', 8, 94900),
(184, 'CZ', '2011.01.19', 15, 142900),
(185, 'CZ', '2011.01.26', 8, 94900),
(186, 'CZ', '2011.01.26', 15, 142900),
(187, 'CZ', '2011.02.02', 8, 102900),
(188, 'CZ', '2011.02.02', 15, 151900),
(189, 'CZ', '2011.02.09', 8, 102900),
(190, 'CZ', '2011.02.09', 15, 151900),
(191, 'CZ', '2011.02.16', 8, 102900),
(192, 'CZ', '2011.02.16', 15, 151900),
(193, 'CZ', '2011.02.23', 8, 102900),
(194, 'CZ', '2011.02.23', 15, 157900),
(195, 'CZ', '2011.03.02', 8, 102900),
(196, 'CZ', '2011.03.02', 15, 157900),
(197, 'CZ', '2011.03.09', 8, 109900),
(198, 'CZ', '2011.03.09', 15, 164900),
(199, 'CZ', '2011.03.16', 8, 109900),
(200, 'CZ', '2011.03.16', 15, 164900),
(201, 'CZ', '2011.03.23', 8, 109900),
(202, 'CZ', '2011.03.23', 15, 164900),
(203, 'CZ', '2011.03.30', 8, 109900),
(204, 'CZ', '2011.03.30', 15, 189900),
(205, 'CZ', '2011.04.06', 8, 133900),
(206, 'CZ', '2011.04.06', 15, 207900),
(207, 'CZ', '2011.04.13', 8, 127900),
(208, 'CZ', '2011.04.13', 15, 183900),
(209, 'CZ', '2011.04.20', 8, 109900),
(210, 'CZ', '2011.04.20', 15, 164900),
(211, 'CZ', '2011.04.27', 8, 109900),
(212, 'FJ', '2011.01.02', 8, 69900),
(213, 'FJ', '2011.01.02', 15, 89900),
(214, 'FJ', '2011.01.09', 8, 88900),
(215, 'FJ', '2011.01.09', 15, 122900),
(216, 'FJ', '2011.01.16', 8, 96900),
(217, 'FJ', '2011.01.16', 15, 133900),
(218, 'FJ', '2011.01.23', 8, 96900),
(219, 'FJ', '2011.01.23', 15, 133900),
(220, 'FJ', '2011.01.30', 8, 96900),
(221, 'FJ', '2011.01.30', 15, 133900),
(222, 'FJ', '2011.02.06', 8, 100900),
(223, 'FJ', '2011.02.06', 15, 150900),
(224, 'FJ', '2011.02.13', 8, 100900),
(225, 'FJ', '2011.02.13', 15, 150900),
(226, 'FJ', '2011.02.20', 8, 100900),
(227, 'FJ', '2011.02.20', 15, 154900),
(228, 'FJ', '2011.02.27', 8, 102900),
(229, 'FJ', '2011.02.27', 15, 154900),
(230, 'FJ', '2011.03.06', 8, 109900),
(231, 'FJ', '2011.03.06', 15, 165900),
(232, 'FJ', '2011.03.10', 11, 133900),
(233, 'FJ', '2011.03.13', 8, 109900),
(234, 'FJ', '2011.03.13', 12, 143900),
(235, 'FJ', '2011.03.13', 15, 165900),
(236, 'FJ', '2011.03.17', 8, 109900),
(237, 'FJ', '2011.03.17', 11, 133900),
(238, 'FJ', '2011.03.17', 15, 165900),
(239, 'FJ', '2011.03.20', 8, 109900),
(240, 'FJ', '2011.03.20', 12, 143900),
(241, 'FJ', '2011.03.20', 15, 165900),
(242, 'FJ', '2011.03.24', 8, 109900),
(243, 'FJ', '2011.03.24', 11, 133900),
(244, 'FJ', '2011.03.24', 15, 165900),
(245, 'FJ', '2011.03.27', 8, 109900),
(246, 'FJ', '2011.03.27', 12, 143900),
(247, 'FJ', '2011.03.27', 15, 165900),
(248, 'FJ', '2011.03.31', 8, 109900),
(249, 'FJ', '2011.03.31', 11, 133900),
(250, 'FJ', '2011.03.31', 15, 167900),
(251, 'FJ', '2011.04.03', 8, 109900),
(252, 'FJ', '2011.04.03', 12, 143900),
(253, 'FJ', '2011.04.03', 15, 172900),
(254, 'FJ', '2011.04.07', 8, 111900),
(255, 'FJ', '2011.04.07', 11, 140900),
(256, 'FJ', '2011.04.07', 15, 178900),
(257, 'FJ', '2011.04.10', 8, 119900),
(258, 'FJ', '2011.04.10', 12, 154900),
(259, 'FJ', '2011.04.10', 15, 178900),
(260, 'FJ', '2011.04.14', 8, 121900),
(261, 'FJ', '2011.04.14', 11, 145900),
(262, 'FJ', '2011.04.14', 15, 178900),
(263, 'FJ', '2011.04.17', 8, 119900),
(264, 'FJ', '2011.04.17', 12, 148900),
(265, 'FJ', '2011.04.17', 15, 172900),
(266, 'FJ', '2011.04.21', 8, 109900),
(267, 'FJ', '2011.04.21', 11, 133900),
(268, 'FJ', '2011.04.21', 15, 165900),
(269, 'FJ', '2011.04.24', 8, 109900),
(270, 'FJ', '2011.04.28', 8, 109900),
(271, 'HB', '2011.01.23', 8, 84900),
(272, 'HB', '2011.01.23', 15, 116900),
(273, 'HB', '2011.01.30', 8, 84900),
(274, 'HB', '2011.01.30', 15, 116900),
(275, 'HB', '2011.02.06', 8, 84900),
(276, 'HB', '2011.02.06', 15, 116900),
(277, 'HB', '2011.02.13', 8, 84900),
(278, 'HB', '2011.02.13', 15, 116900),
(279, 'HB', '2011.02.20', 8, 84900),
(280, 'HB', '2011.02.20', 15, 116900),
(281, 'HB', '2011.02.27', 8, 84900),
(282, 'HB', '2011.02.27', 15, 116900),
(283, 'HB', '2011.03.06', 8, 84900),
(284, 'HB', '2011.03.06', 15, 116900),
(285, 'HB', '2011.03.13', 8, 84900),
(286, 'HB', '2011.03.13', 15, 116900),
(287, 'HB', '2011.03.20', 8, 84900),
(288, 'HB', '2011.03.20', 15, 116900),
(289, 'HB', '2011.03.27', 8, 84900),
(290, 'HB', '2011.03.27', 15, 116900),
(291, 'HB', '2011.04.03', 8, 84900),
(292, 'HB', '2011.04.03', 15, 126900),
(293, 'HB', '2011.04.10', 8, 90900),
(294, 'HB', '2011.04.10', 15, 126900),
(295, 'HB', '2011.04.17', 8, 84900),
(296, 'HB', '2011.04.17', 15, 116900),
(297, 'HB', '2011.04.24', 8, 84900),
(298, 'JR', '2011.01.02', 8, 38900),
(299, 'JR', '2011.01.02', 15, 53900),
(300, 'JR', '2011.01.09', 8, 37900),
(301, 'JR', '2011.01.09', 15, 53900),
(302, 'JR', '2011.01.16', 8, 37900),
(303, 'JR', '2011.01.16', 15, 53900),
(304, 'JR', '2011.01.23', 8, 37900),
(305, 'JR', '2011.01.23', 15, 53900),
(306, 'JR', '2011.01.30', 8, 37900),
(307, 'JR', '2011.01.30', 15, 53900),
(308, 'JR', '2011.02.06', 8, 37900),
(309, 'JR', '2011.02.06', 15, 53900),
(310, 'JR', '2011.02.13', 8, 37900),
(311, 'JR', '2011.02.13', 15, 53900),
(312, 'JR', '2011.02.20', 8, 37900),
(313, 'JR', '2011.02.20', 15, 53900),
(314, 'JR', '2011.02.27', 8, 37900),
(315, 'JR', '2011.02.27', 15, 53900),
(316, 'JR', '2011.03.06', 8, 70900),
(317, 'JR', '2011.03.06', 15, 90900),
(318, 'JR', '2011.03.13', 8, 70900),
(319, 'JR', '2011.03.13', 15, 90900),
(320, 'JR', '2011.03.20', 8, 70900),
(321, 'JR', '2011.03.20', 15, 90900),
(322, 'JR', '2011.03.27', 8, 70900),
(323, 'JR', '2011.03.27', 15, 90900),
(324, 'JR', '2011.04.03', 8, 70900),
(325, 'JR', '2011.04.03', 15, 97900),
(326, 'JR', '2011.04.10', 8, 76900),
(327, 'JR', '2011.04.10', 15, 97900),
(328, 'JR', '2011.04.17', 8, 70900),
(329, 'JR', '2011.04.17', 15, 90900),
(330, 'JR', '2011.04.24', 8, 70900),
(331, 'MB', '2011.01.02', 8, 70900),
(332, 'MB', '2011.01.02', 15, 89900),
(333, 'MB', '2011.01.09', 8, 37900),
(334, 'MB', '2011.01.09', 15, 53900),
(335, 'MB', '2011.01.16', 8, 37900),
(336, 'MB', '2011.01.16', 15, 53900),
(337, 'MB', '2011.01.23', 8, 37900),
(338, 'MB', '2011.01.23', 15, 53900),
(339, 'MB', '2011.01.30', 8, 37900),
(340, 'MB', '2011.01.30', 15, 53900),
(341, 'MB', '2011.02.06', 8, 37900),
(342, 'MB', '2011.02.06', 15, 53900),
(343, 'MB', '2011.02.13', 8, 37900),
(344, 'MB', '2011.02.13', 15, 53900),
(345, 'MB', '2011.02.20', 8, 37900),
(346, 'MB', '2011.02.20', 15, 53900),
(347, 'MB', '2011.02.27', 8, 37900),
(348, 'MB', '2011.02.27', 15, 53900),
(349, 'MB', '2011.03.06', 8, 69900),
(350, 'MB', '2011.03.06', 15, 88900),
(351, 'MB', '2011.03.13', 8, 69900),
(352, 'MB', '2011.03.13', 15, 88900),
(353, 'MB', '2011.03.20', 8, 69900),
(354, 'MB', '2011.03.20', 15, 88900),
(355, 'MB', '2011.03.27', 8, 69900),
(356, 'MB', '2011.03.27', 15, 88900),
(357, 'MB', '2011.04.03', 8, 69900),
(358, 'MB', '2011.04.03', 15, 95900),
(359, 'MB', '2011.04.10', 8, 75900),
(360, 'MB', '2011.04.10', 15, 95900),
(361, 'MB', '2011.04.17', 8, 69900),
(362, 'MB', '2011.04.17', 15, 88900),
(363, 'MB', '2011.04.24', 8, 69900),
(364, 'MD', '2011.01.23', 8, 70900),
(365, 'MD', '2011.01.23', 15, 90900),
(366, 'MD', '2011.01.30', 8, 70900),
(367, 'MD', '2011.01.30', 15, 90900),
(368, 'MD', '2011.02.06', 8, 70900),
(369, 'MD', '2011.02.06', 15, 90900),
(370, 'MD', '2011.02.13', 8, 70900),
(371, 'MD', '2011.02.13', 15, 90900),
(372, 'MD', '2011.02.20', 8, 70900),
(373, 'MD', '2011.02.20', 15, 90900),
(374, 'MD', '2011.02.27', 8, 70900),
(375, 'MD', '2011.02.27', 15, 90900),
(376, 'MD', '2011.03.06', 8, 70900),
(377, 'MD', '2011.03.06', 15, 90900),
(378, 'MD', '2011.03.13', 8, 70900),
(379, 'MD', '2011.03.13', 15, 90900),
(380, 'MD', '2011.03.20', 8, 70900),
(381, 'MD', '2011.03.20', 15, 90900),
(382, 'MD', '2011.03.27', 8, 70900),
(383, 'MD', '2011.03.27', 15, 90900),
(384, 'MD', '2011.04.03', 8, 70900),
(385, 'MD', '2011.04.03', 15, 97900),
(386, 'MD', '2011.04.10', 8, 76900),
(387, 'MD', '2011.04.10', 15, 97900),
(388, 'MD', '2011.04.17', 8, 70900),
(389, 'MD', '2011.04.17', 15, 90900),
(390, 'MD', '2011.04.24', 8, 70900),
(391, 'MP', '2011.01.02', 8, 83900),
(392, 'MP', '2011.01.02', 15, 115900),
(393, 'MP', '2011.01.09', 8, 83900),
(394, 'MP', '2011.01.09', 15, 115900),
(395, 'MP', '2011.01.16', 8, 83900),
(396, 'MP', '2011.01.16', 15, 115900),
(397, 'MP', '2011.01.23', 8, 83900),
(398, 'MP', '2011.01.23', 15, 115900),
(399, 'MP', '2011.01.30', 8, 83900),
(400, 'MP', '2011.01.30', 15, 115900),
(401, 'MP', '2011.02.06', 8, 83900),
(402, 'MP', '2011.02.06', 15, 115900),
(403, 'MP', '2011.02.13', 8, 83900),
(404, 'MP', '2011.02.13', 15, 115900),
(405, 'MP', '2011.02.20', 8, 83900),
(406, 'MP', '2011.02.20', 15, 122900),
(407, 'MP', '2011.02.27', 8, 90900),
(408, 'MP', '2011.02.27', 15, 139900),
(409, 'MP', '2011.03.06', 8, 99900),
(410, 'MP', '2011.03.06', 15, 148900),
(411, 'MP', '2011.03.13', 8, 99900),
(412, 'MP', '2011.03.13', 15, 148900),
(413, 'MP', '2011.03.20', 8, 99900),
(414, 'MP', '2011.03.20', 15, 148900),
(415, 'MP', '2011.03.27', 8, 99900),
(416, 'MP', '2011.03.27', 15, 157900),
(417, 'MP', '2011.04.03', 8, 109900),
(418, 'MP', '2011.04.03', 15, 184900),
(419, 'MP', '2011.04.10', 8, 121900),
(420, 'MP', '2011.04.10', 15, 188900),
(421, 'MP', '2011.04.17', 8, 112900),
(422, 'MP', '2011.04.17', 15, 174900),
(423, 'MP', '2011.04.24', 8, 112900),
(424, 'TA', '2011.01.05', 8, 69900),
(425, 'TA', '2011.01.05', 15, 119900),
(426, 'TA', '2011.01.12', 8, 97900),
(427, 'TA', '2011.01.12', 15, 147900),
(428, 'TA', '2011.01.19', 8, 100900),
(429, 'TA', '2011.01.19', 15, 155900),
(430, 'TA', '2011.01.26', 8, 100900),
(431, 'TA', '2011.01.26', 15, 155900),
(432, 'TA', '2011.02.02', 8, 107900),
(433, 'TA', '2011.02.02', 15, 164900),
(434, 'TA', '2011.02.09', 8, 107900),
(435, 'TA', '2011.02.09', 15, 164900),
(436, 'TA', '2011.02.16', 8, 107900),
(437, 'TA', '2011.02.16', 15, 164900),
(438, 'TA', '2011.02.23', 8, 107900),
(439, 'TA', '2011.02.23', 15, 164900),
(440, 'TA', '2011.03.02', 8, 107900),
(441, 'TA', '2011.03.02', 15, 171900),
(442, 'TA', '2011.03.09', 8, 125900),
(443, 'TA', '2011.03.09', 15, 194900),
(444, 'TA', '2011.03.16', 8, 125900),
(445, 'TA', '2011.03.16', 15, 200900),
(446, 'TA', '2011.03.23', 8, 129900),
(447, 'TA', '2011.03.23', 15, 209900),
(448, 'TA', '2011.03.30', 8, 134900),
(449, 'TA', '2011.03.30', 15, 230900),
(450, 'TA', '2011.04.06', 8, 149900),
(451, 'TA', '2011.04.06', 15, 253900),
(452, 'TA', '2011.04.13', 8, 157900),
(453, 'TA', '2011.04.13', 15, 230900),
(454, 'TA', '2011.04.20', 8, 125900),
(455, 'TA', '2011.04.20', 15, 200900),
(456, 'TA', '2011.04.27', 8, 125900);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2a$10$QEaf3I.eLiZC4F4pDnqmC.sTysFlJ59wgROmw3ATxceFs/wgg0LvK', 'ROLE_ADMIN'),
(2, 'User', 'user@gmail.com', '$2a$10$exVjZOnYQ3oFdNTFP7qVHOoL8K2XhKpWXY3r8duw8v9pTNxmC0qbm', 'ROLE_USER'),


--
-- Indexes for dumped tables
--

--
-- Indexes for table `helyseg`
--
ALTER TABLE `helyseg`
  ADD PRIMARY KEY (`az`);

--
-- Indexes for table `szalloda`
--
ALTER TABLE `szalloda`
  ADD PRIMARY KEY (`az`),
  ADD KEY `helyseg_az` (`helyseg_az`);

--
-- Indexes for table `tavasz`
--
ALTER TABLE `tavasz`
  ADD PRIMARY KEY (`sorszam`),
  ADD KEY `szalloda_az` (`szalloda_az`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tavasz`
--
ALTER TABLE `tavasz`
  MODIFY `sorszam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `szalloda`
--
ALTER TABLE `szalloda`
  ADD CONSTRAINT `szalloda_ibfk_1` FOREIGN KEY (`helyseg_az`) REFERENCES `helyseg` (`az`);

--
-- Constraints for table `tavasz`
--
ALTER TABLE `tavasz`
  ADD CONSTRAINT `tavasz_ibfk_1` FOREIGN KEY (`szalloda_az`) REFERENCES `szalloda` (`az`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
