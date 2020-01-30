-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2020 at 03:37 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `task_project`
--

CREATE TABLE `task_project` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_project`
--

INSERT INTO `task_project` (`id`, `code`, `title`) VALUES
(1, 1, 'HRIS'),
(2, 2, 'BPLS / BPCO / Rate My Service'),
(3, 3, 'GAD-PBMS'),
(4, 4, 'ECLIP'),
(5, 5, 'RSSA'),
(6, 6, 'Other Matters');

-- --------------------------------------------------------

--
-- Table structure for table `task_record`
--

CREATE TABLE `task_record` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `task_name` varchar(250) DEFAULT NULL,
  `task_description` text,
  `date_raised` date DEFAULT NULL,
  `time_raised` varchar(10) DEFAULT NULL,
  `date_done` date DEFAULT NULL,
  `time_done` varchar(10) DEFAULT NULL,
  `date_target` date DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `is_read` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_record`
--

INSERT INTO `task_record` (`id`, `category_id`, `task_name`, `task_description`, `date_raised`, `time_raised`, `date_done`, `time_done`, `date_target`, `status_id`, `is_active`, `is_read`) VALUES
(1, 4, 'Disabled ECLIP IS', 'Para daw di makapag encode ung mga PSWDO - Joseph Talavera', '2020-01-27', NULL, '2020-01-28', NULL, '2020-01-28', 7, 1, 0),
(2, 4, 'Create letter of statement the reason why migration in ECLIP is pending', '', '2020-01-27', NULL, NULL, NULL, NULL, 7, 1, 0),
(3, 2, 'Test BPLS for TOT on January 30', '', '2020-01-28', NULL, NULL, NULL, NULL, 3, 1, 0),
(4, 3, 'Consult BLGD about C/MLGOO role in GAD-PBMS', 'Sa ngayon kase viewing of transactions ang nagagawa lang ni C/MLGOO', '2020-01-27', NULL, NULL, NULL, '2020-01-28', 8, 0, 0),
(5, 3, 'Project Proposal Template of GAD-PBMS', '', '2020-01-28', NULL, NULL, NULL, NULL, 2, 0, 0),
(6, 5, 'Pull Project from GITLAB', 'Install database, Composer update', '2020-01-28', NULL, NULL, NULL, '2020-01-28', 9, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`id`, `code`, `title`) VALUES
(1, 1, 'Immediate Changes to the System'),
(2, 2, 'Kailangang Iparating kay Boss'),
(3, 3, 'Needs Immediate Response/Action'),
(4, 4, 'On-Going'),
(5, 5, 'Accomplished'),
(6, 6, 'Responded'),
(7, 7, 'Forwarded to Boss'),
(8, 8, 'Kailangang Iparating sa OPR'),
(9, 9, 'Kailangan ng SIMULAN'),
(10, 10, 'Task Accomplished');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task_project`
--
ALTER TABLE `task_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_record`
--
ALTER TABLE `task_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task_project`
--
ALTER TABLE `task_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `task_record`
--
ALTER TABLE `task_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `task_status`
--
ALTER TABLE `task_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
