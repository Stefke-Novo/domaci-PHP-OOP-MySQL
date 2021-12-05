-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 05:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domaci_php_oop_mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE `korisnik` (
  `korisnikID` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sifra` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikID`, `ime`, `prezime`, `email`, `sifra`) VALUES
(31, 'neko', 'nesto', 'neko@gmail.com', 'neko');

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

DROP TABLE IF EXISTS `korpa`;
CREATE TABLE `korpa` (
  `korisnikID` int(11) NOT NULL,
  `imeKorpe` varchar(30) NOT NULL,
  `datum` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `korpaproizvoda`
--

DROP TABLE IF EXISTS `korpaproizvoda`;
CREATE TABLE `korpaproizvoda` (
  `korisnikID` int(11) NOT NULL,
  `imeKorpe` varchar(30) NOT NULL,
  `proizvodID` int(11) NOT NULL,
  `kolicina` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

DROP TABLE IF EXISTS `proizvod`;
CREATE TABLE `proizvod` (
  `proizvodID` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `cena` int(11) NOT NULL,
  `popust` int(11) NOT NULL,
  `opis` varchar(1500) NOT NULL,
  `merna_jeidnica` varchar(30) NOT NULL,
  `slika` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`proizvodID`, `ime`, `cena`, `popust`, `opis`, `merna_jeidnica`, `slika`) VALUES
(2, 'banana', 150, 75, 'velika ponuda', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/h13/hd1/8834679603230.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(3, 'krompir ', 80, 70, 'za vas', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/h87/h2e/8821266087966.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(4, 'limun mayer ', 130, 115, 'jedinstvena ponuda', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/h52/h1f/8835526918174.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(5, 'šargarepa domaća', 60, 50, 'jedinstvena ponuda', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/h30/hc3/8828678045726.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(6, 'luk crni domaći', 50, 45, 'samo za vas', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/h64/h31/8825912754206.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(7, 'jabuka ajdared domaća', 100, 80, 'posebna ponuda', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/had/hbe/8817909202974.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(8, 'krompir crveni opran', 80, 60, 'posebno za vas', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/h9a/he7/8826798800926.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(9, 'jabuka Viljamovka domaca', 190, 150, 'specijalna ponuda', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/h18/hf7/8819596853278.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(10, 'jabuka Greni Smit domaca', 120, 80, 'super ponuda', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/hf0/hf3/8829045506078.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(11, 'tikvica', 190, 110, 'specijalno za vas', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/hca/hac/8821588295710.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(12, 'karfiol', 180, 150, 'uvek sveže', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/h57/hab/8830849777694.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(13, 'kupus domaći', 70, 60, 'specijalna ponuda', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/h68/h10/8824860639262.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(14, 'luk crveni', 70, 40, 'hit ponuda', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/h31/hc6/8822903930910.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(15, 'brokoli domaći', 180, 130, 'hit ponuda', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/h10/h34/8821054275614.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700'),
(16, 'cvekla domaća', 70, 50, 'samo najbolje za vas', 'kg', 'https://d3el976p2k4mvu.cloudfront.net/medias/sys_master/h75/h28/8819625754654.png?buildNumber=61e31e2ae38f8b62be4419800a19c56cc7f8d3c92b97c13370eb53cbc6d17700');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikID`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`korisnikID`,`imeKorpe`);

--
-- Indexes for table `korpaproizvoda`
--
ALTER TABLE `korpaproizvoda`
  ADD PRIMARY KEY (`korisnikID`,`imeKorpe`,`proizvodID`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`proizvodID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `proizvodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korpa`
--
ALTER TABLE `korpa`
  ADD CONSTRAINT `korisnikIDspoljasnji` FOREIGN KEY (`korisnikID`) REFERENCES `korisnik` (`korisnikID`);

--
-- Constraints for table `korpaproizvoda`
--
ALTER TABLE `korpaproizvoda`
  ADD CONSTRAINT `korpaproizvoda_ibfk_2` FOREIGN KEY (`proizvodID`) REFERENCES `proizvod` (`proizvodID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
