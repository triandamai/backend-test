-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2022 at 10:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_checkup_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodpressure`
--

CREATE TABLE `bloodpressure` (
  `id` int(11) NOT NULL,
  `systole` float NOT NULL,
  `disatole` float NOT NULL,
  `id_checkup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodpressure`
--

INSERT INTO `bloodpressure` (`id`, `systole`, `disatole`, `id_checkup`) VALUES
(1, 120, 80, 1),
(2, 119, 80, 2),
(3, 123, 81, 10);

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_nurse` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `method` varchar(25) NOT NULL,
  `diagnosis` varchar(25) NOT NULL,
  `note` text NOT NULL,
  `mime_type` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`id`, `id_member`, `id_nurse`, `type`, `method`, `diagnosis`, `note`, `mime_type`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'bloodpressure', 'manual', 'diagnosis', 'ini adalah note', 'text', '2022-03-03 00:42:43', '0000-00-00 00:00:00'),
(2, 2, 1, 'bloodpressure', 'manual', 'diagnosis', 'ini adalah note', 'text', '2022-03-03 00:44:34', '0000-00-00 00:00:00'),
(3, 2, 1, 'sleep', 'manual', 'diagnosis', 'ini adalah note', 'text', '2022-03-03 00:47:00', '0000-00-00 00:00:00'),
(4, 2, 1, 'sleep', 'manual', 'diagnosis', 'ini adalah note', 'text', '2022-03-03 00:47:01', '0000-00-00 00:00:00'),
(5, 2, 1, 'temperature', 'manual', 'diagnosis', 'ini adalah note', 'text', '2022-03-02 15:33:11', '0000-00-00 00:00:00'),
(6, 2, 1, 'temperature', 'manual', 'diagnosis', 'ini adalah note', 'text', '2022-03-02 15:39:25', '0000-00-00 00:00:00'),
(7, 2, 1, 'temperature', 'manual', 'diagnosis', 'ini adalah note', 'text', '2022-03-02 15:41:38', '0000-00-00 00:00:00'),
(8, 1, 1, 'temperature', 'manual', 'diagnosis', 'ini adalah note', 'text', '2022-03-03 09:04:53', '0000-00-00 00:00:00'),
(9, 1, 1, 'temperature', 'manual', 'diagnosis', 'ini adalah note', 'text', '2022-03-03 09:19:23', '0000-00-00 00:00:00'),
(10, 1, 1, 'bloodpressure', 'manual', 'diagnosis', 'ini adalah note', 'text', '2022-03-03 09:28:27', '0000-00-00 00:00:00'),
(11, 1, 1, 'sleep', 'manual', 'diagnosis', 'ini adalah note', 'text', '2022-03-03 09:32:18', '0000-00-00 00:00:00'),
(12, 1, 1, 'sleep', 'manual', 'diagnosis', 'ini adalah note', 'text', '2022-03-03 09:33:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `usia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `usia`) VALUES
(1, 'Aliana', 34),
(2, 'Belva', 27);

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `nama`) VALUES
(1, 'farah');

-- --------------------------------------------------------

--
-- Table structure for table `sleep`
--

CREATE TABLE `sleep` (
  `id` int(11) NOT NULL,
  `sleep_start` timestamp NOT NULL DEFAULT current_timestamp(),
  `sleep_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deep_sleep` int(11) NOT NULL,
  `light_sleep` int(11) NOT NULL,
  `wakeTime` int(11) NOT NULL,
  `id_checkup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sleep`
--

INSERT INTO `sleep` (`id`, `sleep_start`, `sleep_end`, `deep_sleep`, `light_sleep`, `wakeTime`, `id_checkup`) VALUES
(1, '2022-03-03 00:54:25', '0000-00-00 00:00:00', 439, 328, 3, 3),
(2, '2022-03-03 00:54:30', '0000-00-00 00:00:00', 457, 391, 3, 4),
(3, '2022-03-03 13:54:25', '2022-03-02 22:54:02', 456, 388, 3, 12),
(4, '2022-03-03 13:54:25', '2022-03-02 22:54:02', 455, 390, 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `temperature`
--

CREATE TABLE `temperature` (
  `id` int(11) NOT NULL,
  `temperatur` float NOT NULL,
  `id_checkup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temperature`
--

INSERT INTO `temperature` (`id`, `temperatur`, `id_checkup`) VALUES
(1, 27, 5),
(2, 29, 7),
(3, 28, 6),
(4, 27, 8),
(5, 28, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodpressure`
--
ALTER TABLE `bloodpressure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_checkup` (`id_checkup`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_nurse` (`id_nurse`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sleep`
--
ALTER TABLE `sleep`
  ADD PRIMARY KEY (`id`,`id_checkup`),
  ADD KEY `id_checkup` (`id_checkup`);

--
-- Indexes for table `temperature`
--
ALTER TABLE `temperature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_checkup` (`id_checkup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodpressure`
--
ALTER TABLE `bloodpressure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sleep`
--
ALTER TABLE `sleep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temperature`
--
ALTER TABLE `temperature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bloodpressure`
--
ALTER TABLE `bloodpressure`
  ADD CONSTRAINT `bloodpressure_ibfk_1` FOREIGN KEY (`id_checkup`) REFERENCES `medical_record` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD CONSTRAINT `medical_record_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `medical_record_ibfk_2` FOREIGN KEY (`id_nurse`) REFERENCES `nurse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sleep`
--
ALTER TABLE `sleep`
  ADD CONSTRAINT `sleep_ibfk_1` FOREIGN KEY (`id_checkup`) REFERENCES `medical_record` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `temperature`
--
ALTER TABLE `temperature`
  ADD CONSTRAINT `temperature_ibfk_1` FOREIGN KEY (`id_checkup`) REFERENCES `medical_record` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
