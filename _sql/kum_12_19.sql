-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 27. Dez 2019 um 19:44
-- Server-Version: 5.7.26
-- PHP-Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kum_12_19`
--
CREATE DATABASE IF NOT EXISTS `kum_12_19` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kum_12_19`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `urlaub`
--

DROP TABLE IF EXISTS `urlaub`;
CREATE TABLE IF NOT EXISTS `urlaub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime_radnika` varchar(255) NOT NULL,
  `2017` int(11) NOT NULL DEFAULT '0',
  `2018` int(11) NOT NULL DEFAULT '22',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `urlaub`
--

INSERT INTO `urlaub` (`id`, `ime_radnika`, `2017`, `2018`) VALUES
(1, 'Markovic Marko', 5, 22),
(2, 'Petrovic Petar', 9, 22);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
