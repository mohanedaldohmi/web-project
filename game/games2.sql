-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2018 at 05:51 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `games`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `GAMES_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `TPYE` varchar(255) NOT NULL,
  `IMG` varchar(255) NOT NULL,
  `DETAILS` text NOT NULL,
  PRIMARY KEY (`GAMES_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

DROP TABLE IF EXISTS `match`;
CREATE TABLE IF NOT EXISTS `match` (
  `MATCH_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `TM_ID` int(10) UNSIGNED NOT NULL,
  `GM_ID` int(10) UNSIGNED NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`MATCH_ID`),
  KEY `TM_ID` (`TM_ID`),
  KEY `GM_ID` (`GM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `PLAYER_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASS` varchar(255) NOT NULL,
  `FULL_NAME` varchar(255) NOT NULL,
  `IMG` varchar(255) NOT NULL,
  `SATUES` varchar(255) NOT NULL,
  `CON_ID` int(11) NOT NULL DEFAULT '0',
  `COUNTRY` varchar(255) NOT NULL DEFAULT 'YEMEN',
  PRIMARY KEY (`PLAYER_ID`),
  UNIQUE KEY `USERNAME` (`USERNAME`,`EMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

DROP TABLE IF EXISTS `relation`;
CREATE TABLE IF NOT EXISTS `relation` (
  `G_ID` int(10) UNSIGNED NOT NULL,
  `P_ID` int(10) UNSIGNED NOT NULL,
  `LEVEL` varchar(255) NOT NULL,
  KEY `GAMES_ID` (`G_ID`,`P_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `SCORE_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `SG_ID` int(10) UNSIGNED NOT NULL,
  `SM_ID` int(10) UNSIGNED NOT NULL,
  `SCORE_DETAILS` text NOT NULL,
  PRIMARY KEY (`SCORE_ID`),
  KEY `SG_ID` (`SG_ID`),
  KEY `SM_ID` (`SM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `TEAM_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `TP_ID` int(10) UNSIGNED NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `POWER` varchar(255) NOT NULL,
  `CAPTION` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TEAM_ID`),
  KEY `TP_ID` (`TP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `match_ibfk_1` FOREIGN KEY (`TM_ID`) REFERENCES `team` (`TEAM_ID`),
  ADD CONSTRAINT `match_ibfk_2` FOREIGN KEY (`GM_ID`) REFERENCES `games` (`GAMES_ID`);

--
-- Constraints for table `relation`
--
ALTER TABLE `relation`
  ADD CONSTRAINT `relation_ibfk_1` FOREIGN KEY (`G_ID`) REFERENCES `players` (`PLAYER_ID`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`SG_ID`) REFERENCES `games` (`GAMES_ID`),
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`SM_ID`) REFERENCES `match` (`MATCH_ID`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`TP_ID`) REFERENCES `players` (`PLAYER_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
