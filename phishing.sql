-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 12:58 PM
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
  `datum` datetime NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datum_klika`
--

INSERT INTO `datum_klika` (`id_p`, `id_g`, `datum`, `id`) VALUES
(8, 20, '2024-04-30 07:44:49', 4),
(8, 10, '2024-04-30 07:44:52', 5),
(10, 10, '2024-04-30 07:46:48', 6),
(10, 20, '2024-04-30 07:47:21', 7),
(10, 40, '2024-04-30 07:47:26', 8),
(8, 40, '2024-04-30 07:49:57', 9),
(8, 10, '2024-04-30 08:00:31', 10),
(8, 10, '2024-04-30 08:04:49', 11),
(8, 10, '2024-04-30 08:10:37', 12),
(8, 1, '2024-04-30 08:10:38', 13),
(8, 20, '2024-04-30 08:10:47', 14),
(8, 2, '2024-04-30 08:10:48', 15),
(8, 20, '2024-04-30 08:16:49', 16),
(8, 10, '2024-04-30 08:20:27', 17),
(8, 1, '2024-04-30 08:20:29', 18),
(8, 10, '2024-04-30 09:25:57', 19),
(8, 1, '2024-04-30 09:25:58', 20),
(8, 10, '2024-04-30 09:35:25', 21),
(8, 1, '2024-04-30 09:35:26', 22),
(8, 20, '2024-04-30 09:35:33', 23),
(8, 2, '2024-04-30 09:35:34', 24),
(8, 20, '2024-04-30 09:35:35', 25),
(8, 2, '2024-04-30 09:35:36', 26),
(8, 10, '2024-04-30 09:36:18', 27),
(8, 1, '2024-04-30 09:36:20', 28),
(8, 10, '2024-04-30 09:40:12', 29),
(8, 1, '2024-04-30 09:40:13', 30),
(8, 10, '2024-04-30 09:40:34', 31),
(8, 1, '2024-04-30 09:40:35', 32),
(8, 10, '2024-04-30 09:41:06', 33),
(8, 1, '2024-04-30 09:41:07', 34),
(8, 10, '2024-04-30 09:47:07', 35),
(8, 1, '2024-04-30 09:47:08', 36),
(8, 20, '2024-04-30 09:51:36', 37),
(8, 1, '2024-04-30 09:51:37', 38),
(8, 30, '2024-04-30 09:51:50', 39),
(8, 1, '2024-04-30 09:51:51', 40),
(8, 40, '2024-04-30 09:51:52', 41),
(8, 1, '2024-04-30 09:51:53', 42),
(8, 10, '2024-04-30 10:12:40', 43),
(8, 1, '2024-04-30 10:12:41', 44);

-- --------------------------------------------------------

--
-- Table structure for table `gumb`
--

CREATE TABLE `gumb` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `namen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gumb`
--

INSERT INTO `gumb` (`id`, `ime`, `namen`) VALUES
(1, 'potrdi', ' Potrdi prikaz emaila'),
(2, 'zavrni', ' Zavrni prikaz emaila'),
(10, 'odpri', 'Poskus odprtja prvega emaila'),
(20, 'odpri', 'Poskus odprtja drugega emaila'),
(30, 'odpri', 'Poskus odprtja tretjega emaila'),
(40, 'odpri', 'Poskus odprtja četrtega emaila');

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
(6, '2024-04-29 13:46:58', NULL, '::1'),
(7, '2024-04-30 06:48:24', NULL, '::1'),
(8, '2024-04-30 07:22:50', NULL, '::1'),
(9, '2024-04-30 07:46:30', NULL, '10.1.40.91'),
(10, '2024-04-30 07:46:44', NULL, '10.1.40.91');

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
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT for table `datum_klika`
--
ALTER TABLE `datum_klika`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `gumb`
--
ALTER TABLE `gumb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `poskus`
--
ALTER TABLE `poskus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
