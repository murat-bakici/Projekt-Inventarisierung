-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Jan 2024 um 13:51
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `inventur`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_inventur`
--

CREATE TABLE `tbl_inventur` (
  `id` int(11) NOT NULL,
  `katTyp` varchar(15) DEFAULT NULL,
  `hersteller` varchar(20) NOT NULL,
  `modell` varchar(30) DEFAULT NULL,
  `SNr` varchar(50) DEFAULT NULL,
  `kDat` date DEFAULT NULL,
  `pDat` date DEFAULT NULL,
  `Standort` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Daten für Tabelle `tbl_inventur`
--

INSERT INTO `tbl_inventur` (`id`, `katTyp`, `hersteller`, `modell`, `SNr`, `kDat`, `pDat`, `Standort`) VALUES
(2, 'Drucker', 'Brother', 'MFC-9281CDW', 'BR546486465465', '2005-11-29', NULL, 'BÃ¼ro'),
(4, 'Laptop', 'Apple', 'MacBook Air', 'MBA754646468', NULL, NULL, 'Internat'),
(15, 'Boot', 'Bfw Cruises', 'MS Wollgast', 'U77', '1996-12-31', NULL, 'auf Grund'),
(16, 'Auto', 'VW', 'Caddy', 'vwds456131515', '2022-02-02', '2024-01-25', 'Parkplatz'),
(23, 'Laptop', 'Dell', 'Latitude', 'MD-481861', '2023-11-27', '0000-00-00', 'mobil'),
(62, 'Auto', 'Simson', 'S51', 'ohne', '1983-04-20', NULL, 'Garage'),
(65, 'Test', 'BÃ¤ckerei Bakici', 'Kartoffelbrot', '', '0000-00-00', NULL, 'Auslage'),
(66, 'Test', 'Test Hersteller', 'Test Unit', 'test Nummer', '0000-00-00', NULL, 'Testumgebung'),
(70, 'Auto', 'Skoda', 'Favorit', 'wrwerfdgerzsdf', '1990-12-20', '2023-12-06', 'P9'),
(72, 'Bekleidung', 'hogwarts clothes', 'DobbyÂ´s Socke', 'Freiheit', '0000-00-00', NULL, 'bei Dobby'),
(73, 'Drucker', 'Triumph Adler', 'TA P2040DN', 'VP17507265', '0000-00-00', NULL, 'O.1.01.02'),
(74, 'Test', 'Acer', 'Aspire G45', 'ohne', '2024-01-17', '2024-01-17', 'Keller');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_inventur`
--
ALTER TABLE `tbl_inventur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_inventur`
--
ALTER TABLE `tbl_inventur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
