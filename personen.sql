-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 nov 2017 om 16:47
-- Serverversie: 10.1.28-MariaDB
-- PHP-versie: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpersonen`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personen`
--

CREATE TABLE `personen` (
  `naam` varchar(30) NOT NULL,
  `ww` varchar(30) DEFAULT NULL,
  `adres` varchar(30) DEFAULT NULL,
  `woonplaats` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `objectPersoon` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `personen`
--

INSERT INTO `personen` (`naam`, `ww`, `adres`, `woonplaats`, `gender`, `objectPersoon`) VALUES
('klaar', 'lmbbs', '', '', 'male', 0x4f3a373a22706572736f6f6e223a343a7b733a343a226e61616d223b4e3b733a353a226164726573223b4e3b733a31303a22776f6f6e706c61617473223b4e3b733a363a2267656e646572223b4e3b7d);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `personen`
--
ALTER TABLE `personen`
  ADD PRIMARY KEY (`naam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
