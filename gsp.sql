-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2020 at 05:21 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnickarola`
--

CREATE TABLE `korisnickarola` (
  `korisnickaRolaID` int(11) NOT NULL,
  `nazivRole` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnickarola`
--

INSERT INTO `korisnickarola` (`korisnickaRolaID`, `nazivRole`) VALUES
(1, 'Korisnik'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikID` int(11) NOT NULL,
  `imePrezime` varchar(30) NOT NULL,
  `korisnickoIme` varchar(30) NOT NULL,
  `korisnickaSifra` varchar(30) NOT NULL,
  `korisnickaRolaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikID`, `imePrezime`, `korisnickoIme`, `korisnickaSifra`, `korisnickaRolaID`) VALUES
(1, 'Igor Panic', 'igor', 'igor', 2),
(3, 'Sofija Stojkovic', 'sole', 'sole', 2),
(4, 'Veljko Parezanovic', 'velja', 'velja', 1);

-- --------------------------------------------------------

--
-- Table structure for table `linija`
--

CREATE TABLE `linija` (
  `linijaID` int(11) NOT NULL,
  `brojLinije` varchar(30) NOT NULL,
  `od` varchar(30) NOT NULL,
  `do` varchar(30) NOT NULL,
  `tipLinijeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `polazak`
--

CREATE TABLE `polazak` (
  `linijaID` int(11) NOT NULL,
  `korisnikID` int(11) NOT NULL,
  `polazakID` int(11) NOT NULL,
  `sat` int(11) NOT NULL,
  `minut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tiplinije`
--

CREATE TABLE `tiplinije` (
  `tipLinijeID` int(11) NOT NULL,
  `nazivTipaLinije` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiplinije`
--

INSERT INTO `tiplinije` (`tipLinijeID`, `nazivTipaLinije`) VALUES
(1, 'Trolejbus'),
(2, 'Tramvaj'),
(3, 'Autobus'),
(4, 'Voz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnickarola`
--
ALTER TABLE `korisnickarola`
  ADD PRIMARY KEY (`korisnickaRolaID`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikID`);

--
-- Indexes for table `linija`
--
ALTER TABLE `linija`
  ADD PRIMARY KEY (`linijaID`);

--
-- Indexes for table `polazak`
--
ALTER TABLE `polazak`
  ADD PRIMARY KEY (`polazakID`);

--
-- Indexes for table `tiplinije`
--
ALTER TABLE `tiplinije`
  ADD PRIMARY KEY (`tipLinijeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnickarola`
--
ALTER TABLE `korisnickarola`
  MODIFY `korisnickaRolaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `linija`
--
ALTER TABLE `linija`
  MODIFY `linijaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polazak`
--
ALTER TABLE `polazak`
  MODIFY `polazakID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiplinije`
--
ALTER TABLE `tiplinije`
  MODIFY `tipLinijeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
