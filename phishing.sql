-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 02:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phishing`
--

-- --------------------------------------------------------

--
-- Table structure for table `datum_klika`
--

CREATE TABLE `datum_klika` (
  `id_p` int(11) NOT NULL,
  `id_g` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gumb`
--

CREATE TABLE `gumb` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `namen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poskus`
--

CREATE TABLE `poskus` (
  `id` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `datum_konca` date DEFAULT NULL,
  `zaposleni_fk` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poskus`
--

INSERT INTO `poskus` (`id`, `datum`, `datum_konca`, `zaposleni_fk`) VALUES
(6, '2024-04-29 13:46:58', NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

CREATE TABLE `zaposleni` (
  `IP` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`IP`) VALUES
('10.1.40.91'),
('::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datum_klika`
--
ALTER TABLE `datum_klika`
  ADD KEY `id_p` (`id_p`),
  ADD KEY `id_g` (`id_g`) USING BTREE;

--
-- Indexes for table `gumb`
--
ALTER TABLE `gumb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poskus`
--
ALTER TABLE `poskus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zaposleni_fk` (`zaposleni_fk`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`IP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gumb`
--
ALTER TABLE `gumb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poskus`
--
ALTER TABLE `poskus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datum_klika`
--
ALTER TABLE `datum_klika`
  ADD CONSTRAINT `datum_klika_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `poskus` (`id`),
  ADD CONSTRAINT `datum_klika_ibfk_2` FOREIGN KEY (`id_g`) REFERENCES `gumb` (`id`);

--
-- Constraints for table `poskus`
--
ALTER TABLE `poskus`
  ADD CONSTRAINT `poskus_ibfk_1` FOREIGN KEY (`zaposleni_fk`) REFERENCES `zaposleni` (`IP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
