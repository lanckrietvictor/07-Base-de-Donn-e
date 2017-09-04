-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2017 at 04:13 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facturation`
--

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `id_facture` int(11) NOT NULL,
  `numero_facture` int(11) DEFAULT NULL,
  `date_facture` date DEFAULT NULL,
  `id_personne` int(11) NOT NULL,
  `id_societe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factures`
--

INSERT INTO `factures` (`id_facture`, `numero_facture`, `date_facture`, `id_personne`, `id_societe`) VALUES
(1, 12345, '2017-05-09', 1, 1),
(2, 12346, '2017-08-16', 2, 1),
(6, 23456, '2017-08-24', 3, 2),
(7, 25456, '2017-08-31', 4, 3),
(8, 23533, '2017-09-01', 5, 4),
(12, 67845, '2017-09-01', 1, 1),
(15, 35436, '2017-09-03', 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `personnes`
--

CREATE TABLE `personnes` (
  `id_personne` int(11) NOT NULL,
  `nom_personne` varchar(255) NOT NULL,
  `prenom_personne` varchar(255) NOT NULL,
  `tel_personne` varchar(255) NOT NULL,
  `email_personne` varchar(255) NOT NULL,
  `id_societe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personnes`
--

INSERT INTO `personnes` (`id_personne`, `nom_personne`, `prenom_personne`, `tel_personne`, `email_personne`, `id_societe`) VALUES
(1, 'Jos', 'Vernimme', '0496 39 42 70', 'JesseGroenink@dayrep.com', 1),
(2, 'van Esch', 'Hamzah', '\r\n0496 21 84 35', 'HamzahvanEsch@rhyta.com', 1),
(3, 'Melkert', 'Elbert', '0485 74 96 69', '\r\nElbertMelkert@jourrapide.com', 2),
(4, 'van Zelst', 'Seb', '\r\n0477 93 10 54', 'SebvanZelst@teleworm.us', 3),
(5, 'Philippi', 'Dyantha', '0475 68 63 87', 'DyanthaPhilippi@armyspy.com', 4),
(6, 'Puister', 'Brenna', '0494 75 12 53', 'BrennaPuister@rhyta.com', 5),
(7, 'Puister', 'Brenna', '0494 75 12 53', 'BrennaPuister@rhyta.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `societes`
--

CREATE TABLE `societes` (
  `id_societe` int(11) NOT NULL,
  `nom_societe` varchar(255) NOT NULL,
  `adresse_societe` varchar(255) NOT NULL,
  `tel_societe` varchar(255) NOT NULL,
  `tva_societe` varchar(255) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `societes`
--

INSERT INTO `societes` (`id_societe`, `nom_societe`, `adresse_societe`, `tel_societe`, `tva_societe`, `id_type`) VALUES
(1, 'Dayrep', 'Nieuwe Baan 155\r\n4257 Berloz', '0488 27 02 31', '664802168', 1),
(2, 'Jourrapide', 'Industriestraat 276\r\n9470 Denderleeuw', '0498 17 97 20', '412637406', 2),
(3, 'Teleworm', 'Rue Bois des Fosses 182\r\n9931 Oostwinkel', '0481 40 89 71', '453685826', 3),
(4, 'Armyspy', 'Perksesteenweg 102\r\n7911 Moustier', '0483 49 75 38', '899810107', 4),
(5, 'Rhyta', 'Rue de Birmingham 138\r\n3290 Diest', '0494 75 12 53', '449261339', 2);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id_facture`),
  ADD KEY `id_personne` (`id_personne`),
  ADD KEY `id_societe` (`id_societe`);

--
-- Indexes for table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id_personne`),
  ADD KEY `id_societe` (`id_societe`);

--
-- Indexes for table `societes`
--
ALTER TABLE `societes`
  ADD PRIMARY KEY (`id_societe`),
  ADD KEY `id_type` (`id_type`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `factures`
--
ALTER TABLE `factures`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `societes`
--
ALTER TABLE `societes`
  MODIFY `id_societe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
