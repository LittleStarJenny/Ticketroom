-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 16 apr 2019 kl 15:50
-- Serverversion: 10.1.35-MariaDB
-- PHP-version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `ticketroom`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `admindata`
--

CREATE TABLE `admindata` (
  `idAdmin` int(10) UNSIGNED NOT NULL,
  `Name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `Password` varchar(45) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `admindata`
--

INSERT INTO `admindata` (`idAdmin`, `Name`, `Password`) VALUES
(1, 'Jenny', 'Jenny86');

-- --------------------------------------------------------

--
-- Tabellstruktur `events`
--

CREATE TABLE `events` (
  `idEvent` int(10) NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Img` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `events`
--

INSERT INTO `events` (`idEvent`, `Title`, `Description`, `Price`, `Date`, `Img`) VALUES
(1, 'A night to remember', 'Förbered dig för en kväll att minnas med världshits framförda av välkända artister ackompanjerat av Robert Wells med orkester.', 659, '2019-06-28 00:00:00', 'img/anight.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `tickets`
--

CREATE TABLE `tickets` (
  `idtickets` int(11) NOT NULL,
  `eventId` int(10) NOT NULL,
  `firstname` varchar(56) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `tickets`
--

INSERT INTO `tickets` (`idtickets`, `eventId`, `firstname`, `quantity`) VALUES
(1, 1, '1', 0),
(8, 0, '0', 0),
(9, 0, '0', 0),
(10, 0, '0', 0),
(11, 0, '0', 0),
(12, 0, '0', 0),
(13, 5, '0', 0),
(14, 0, '0', 0),
(15, 1, '0', 0),
(16, 1, '0', 0),
(17, 1, '0', 0),
(18, 1, '1', 0),
(20, 1, 'Fadak', 0),
(21, 1, 'Henry', 0),
(22, 1, 'Niklas', 0),
(23, 1, 'Marcus', 0),
(24, 1, 'Fjodor', 0),
(25, 1, 'Stannis', 0),
(26, 1, 'Jenny', 0),
(27, 1, 'Jan', 0),
(28, 1, 'Jenny', 0),
(29, 1, 'Jennifer', 0),
(30, 1, 'Olle', 0),
(31, 1, 'Felix', 0),
(32, 1, 'Test', 0),
(33, 1, 'Mårten', 0),
(34, 1, 'Molly', 0),
(35, 0, 'Konrad', 0),
(36, 0, 'Hopp', 4);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `admindata`
--
ALTER TABLE `admindata`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index för tabell `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`idEvent`);

--
-- Index för tabell `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`idtickets`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `admindata`
--
ALTER TABLE `admindata`
  MODIFY `idAdmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `events`
--
ALTER TABLE `events`
  MODIFY `idEvent` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `tickets`
--
ALTER TABLE `tickets`
  MODIFY `idtickets` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
