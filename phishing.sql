-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 12:45 PM
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
  `id` int(11) NOT NULL,
  `extra` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datum_klika`
--

INSERT INTO `datum_klika` (`id_p`, `id_g`, `datum`, `id`, `extra`) VALUES
(8, 20, '2024-04-30 07:44:49', 4, NULL),
(8, 10, '2024-04-30 07:44:52', 5, NULL),
(10, 10, '2024-04-30 07:46:48', 6, NULL),
(10, 20, '2024-04-30 07:47:21', 7, NULL),
(10, 40, '2024-04-30 07:47:26', 8, NULL),
(8, 40, '2024-04-30 07:49:57', 9, NULL),
(8, 10, '2024-04-30 08:00:31', 10, NULL),
(8, 10, '2024-04-30 08:04:49', 11, NULL),
(8, 10, '2024-04-30 08:10:37', 12, NULL),
(8, 1, '2024-04-30 08:10:38', 13, NULL),
(8, 20, '2024-04-30 08:10:47', 14, NULL),
(8, 2, '2024-04-30 08:10:48', 15, NULL),
(8, 20, '2024-04-30 08:16:49', 16, NULL),
(8, 10, '2024-04-30 08:20:27', 17, NULL),
(8, 1, '2024-04-30 08:20:29', 18, NULL),
(8, 10, '2024-04-30 09:25:57', 19, NULL),
(8, 1, '2024-04-30 09:25:58', 20, NULL),
(8, 10, '2024-04-30 09:35:25', 21, NULL),
(8, 1, '2024-04-30 09:35:26', 22, NULL),
(8, 20, '2024-04-30 09:35:33', 23, NULL),
(8, 2, '2024-04-30 09:35:34', 24, NULL),
(8, 20, '2024-04-30 09:35:35', 25, NULL),
(8, 2, '2024-04-30 09:35:36', 26, NULL),
(8, 10, '2024-04-30 09:36:18', 27, NULL),
(8, 1, '2024-04-30 09:36:20', 28, NULL),
(8, 10, '2024-04-30 09:40:12', 29, NULL),
(8, 1, '2024-04-30 09:40:13', 30, NULL),
(8, 10, '2024-04-30 09:40:34', 31, NULL),
(8, 1, '2024-04-30 09:40:35', 32, NULL),
(8, 10, '2024-04-30 09:41:06', 33, NULL),
(8, 1, '2024-04-30 09:41:07', 34, NULL),
(8, 10, '2024-04-30 09:47:07', 35, NULL),
(8, 1, '2024-04-30 09:47:08', 36, NULL),
(8, 20, '2024-04-30 09:51:36', 37, NULL),
(8, 1, '2024-04-30 09:51:37', 38, NULL),
(8, 30, '2024-04-30 09:51:50', 39, NULL),
(8, 1, '2024-04-30 09:51:51', 40, NULL),
(8, 40, '2024-04-30 09:51:52', 41, NULL),
(8, 1, '2024-04-30 09:51:53', 42, NULL),
(8, 10, '2024-04-30 10:12:40', 43, NULL),
(8, 1, '2024-04-30 10:12:41', 44, NULL),
(8, 20, '2024-05-06 06:45:38', 45, NULL),
(8, 1, '2024-05-06 06:45:40', 46, NULL),
(8, 30, '2024-05-06 06:46:12', 47, NULL),
(8, 1, '2024-05-06 06:46:15', 48, NULL),
(8, 30, '2024-05-06 06:51:18', 49, NULL),
(8, 1, '2024-05-06 06:51:19', 50, NULL),
(8, 40, '2024-05-06 06:52:37', 51, NULL),
(8, 2, '2024-05-06 06:52:39', 52, NULL),
(8, 10, '2024-05-06 07:23:09', 53, NULL),
(8, 1, '2024-05-06 07:23:10', 54, NULL),
(8, 40, '2024-05-06 07:28:20', 55, NULL),
(8, 1, '2024-05-06 07:28:21', 56, NULL),
(8, 20, '2024-05-06 07:40:56', 57, NULL),
(8, 2, '2024-05-06 07:40:58', 58, NULL),
(8, 10, '2024-05-06 07:56:57', 59, NULL),
(8, 2, '2024-05-06 09:39:48', 60, NULL),
(8, 10, '2024-05-06 09:41:53', 61, NULL),
(8, 2, '2024-05-06 09:41:55', 62, NULL),
(8, 10, '2024-05-06 09:41:58', 63, NULL),
(8, 1, '2024-05-06 09:41:59', 64, NULL),
(8, 20, '2024-05-06 09:55:19', 65, NULL),
(8, 1, '2024-05-06 09:55:23', 66, NULL),
(8, 30, '2024-05-06 09:59:04', 67, NULL),
(8, 1, '2024-05-06 09:59:05', 68, NULL),
(8, 10, '2024-05-06 10:01:18', 69, NULL),
(8, 1, '2024-05-06 10:01:19', 70, NULL),
(8, 20, '2024-05-06 10:01:31', 71, NULL),
(8, 1, '2024-05-06 10:01:32', 72, NULL),
(8, 10, '2024-05-06 10:03:22', 73, NULL),
(8, 1, '2024-05-06 10:03:23', 74, NULL),
(8, 20, '2024-05-06 10:36:53', 75, NULL),
(8, 1, '2024-05-06 10:36:54', 76, NULL),
(8, 10, '2024-05-06 10:37:08', 77, NULL),
(8, 1, '2024-05-06 10:37:09', 78, NULL),
(8, 3, '2024-05-06 10:40:22', 79, NULL),
(8, 20, '2024-05-06 10:40:26', 80, NULL),
(8, 1, '2024-05-06 10:40:27', 81, NULL),
(8, 4, '2024-05-06 10:40:28', 82, NULL),
(8, 10, '2024-05-06 10:40:36', 83, NULL),
(8, 1, '2024-05-06 10:40:36', 84, NULL),
(8, 20, '2024-05-06 12:07:13', 87, NULL),
(8, 1, '2024-05-06 12:07:14', 88, NULL),
(8, 3, '2024-05-06 12:09:19', 91, 'prva'),
(8, 20, '2024-05-06 12:09:22', 92, 'undefined'),
(8, 1, '2024-05-06 12:09:23', 93, 'undefined'),
(8, 4, '2024-05-06 12:09:23', 94, 'druga'),
(8, 3, '2024-05-06 12:16:27', 95, 'cetrta'),
(8, 10, '2024-05-06 12:26:55', 96, 'undefined'),
(8, 1, '2024-05-06 12:26:57', 97, 'undefined');

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
(3, 'sumljivo', 'Email neodprt, sumljiv'),
(4, 'sumljivo', 'Email odprt, sumljiv'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

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
