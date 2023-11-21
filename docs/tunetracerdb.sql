-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 03:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tunetracerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajanlasok`
--

CREATE TABLE `ajanlasok` (
  `SongID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Author` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlistnames`
--

CREATE TABLE `playlistnames` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `SongID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `PlaylistID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `ID` int(11) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `RenewalDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `RealName` varchar(255) DEFAULT NULL,
  `BDay` date DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajanlasok`
--
ALTER TABLE `ajanlasok`
  ADD KEY `FK_ajanlasok_UserID` (`UserID`),
  ADD KEY `FK_ajanlasok_SongID` (`SongID`);

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `playlistnames`
--
ALTER TABLE `playlistnames`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD KEY `FK_Playlists_UserID` (`UserID`),
  ADD KEY `FK_Playlists_SongID` (`SongID`),
  ADD KEY `FK_Playlists_PlaylistID` (`PlaylistID`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD KEY `FK_Subscriptions_ID` (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ajanlasok`
--
ALTER TABLE `ajanlasok`
  ADD CONSTRAINT `FK_ajanlasok_SongID` FOREIGN KEY (`SongID`) REFERENCES `audio` (`ID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_ajanlasok_UserID` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION;

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `FK_Playlists_PlaylistID` FOREIGN KEY (`PlaylistID`) REFERENCES `playlistnames` (`ID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_Playlists_SongID` FOREIGN KEY (`SongID`) REFERENCES `audio` (`ID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_Playlists_UserID` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `FK_Subscriptions_ID` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
