-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2020 at 08:59 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db4`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `pjno` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL,
  `amount` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `pjno`, `text`, `indate`, `amount`) VALUES
(17, '石油', 'IJ539573984', '5XXXXXXXXJJJJPPPUUUUU', '2020-12-06 17:47:14', 95735),
(18, '食品', 'I598739573', 'NNNNNNNNNNNNNNNNNMMMMMM', '2020-12-06 17:47:20', 3453),
(19, '飲料', 'U4025432975', 'JJJJJJJJJJJJJJJJJ', '2020-12-06 16:39:25', 3759345),
(20, '海運', 'U923842', 'jfowroiqutorutiqp', '2020-12-06 16:39:33', 79374),
(21, '農業', 'JI43953593', 'ierogue', '2020-12-06 17:47:29', 539503945),
(22, '什器', 'Pf432942397', 'jjglajgflajfl', '2020-12-06 17:41:08', 429342),
(23, '航空機', 'P458093851', 'fJOUOUOU', '2020-12-06 17:45:36', 2147483647),
(24, '金属', 'O95739', 'oeroq jo', '2020-12-06 17:48:12', 2147483647),
(25, '家具', '85038543', 'jgjortoitu', '2020-12-06 17:50:14', 850);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
