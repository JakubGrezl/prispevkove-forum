-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 28, 2023 at 02:26 PM
-- Server version: 10.10.2-MariaDB
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prispevkove-forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `ID_user` int(11) NOT NULL,
  `ID_post` int(11) NOT NULL,
  `ID_comment` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`ID_comment`),
  KEY `ID_post` (`ID_post`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=cp1250 COLLATE=cp1250_czech_cs;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `ID_post` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` int(11) DEFAULT NULL,
  `title` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`ID_post`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=cp1250 COLLATE=cp1250_czech_cs;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `question` varchar(20) NOT NULL,
  `answer` varchar(20) NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=cp1250 COLLATE=cp1250_czech_cs;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_user`, `name`, `surname`, `username`, `email`, `question`, `answer`, `note`, `password`) VALUES
(2, 'root', 'root', 'root', 'root@root.cz', 'root', 'root', '', '63a9f0ea7bb98050796b649e85481845');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`ID_post`) REFERENCES `post` (`ID_post`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
