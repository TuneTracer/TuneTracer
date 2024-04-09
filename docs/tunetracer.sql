-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Ápr 09. 18:39
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `tunetracer`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ajanlasok`
--

CREATE TABLE `ajanlasok` (
  `SongID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `artist`
--

CREATE TABLE `artist` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `profile_img` mediumblob DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=40960 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `audio`
--

CREATE TABLE `audio` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Author` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `cover_art_path` mediumblob DEFAULT NULL,
  `isAd` tinyint(1) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=1851392 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `playlistnames`
--

CREATE TABLE `playlistnames` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `playlists`
--

CREATE TABLE `playlists` (
  `SongID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `PlaylistID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `subscriptions`
--

CREATE TABLE `subscriptions` (
  `ID` int(11) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `RenewalDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `RealName` varchar(255) DEFAULT NULL,
  `BDay` date DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `ajanlasok`
--
ALTER TABLE `ajanlasok`
  ADD KEY `FK_ajanlasok_SongID` (`SongID`),
  ADD KEY `FK_ajanlasok_UserID` (`UserID`);

--
-- A tábla indexei `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_audio_Author` (`Author`);

--
-- A tábla indexei `playlistnames`
--
ALTER TABLE `playlistnames`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `playlists`
--
ALTER TABLE `playlists`
  ADD KEY `FK_Playlists_PlaylistID` (`PlaylistID`),
  ADD KEY `FK_Playlists_SongID` (`SongID`),
  ADD KEY `FK_Playlists_UserID` (`UserID`);

--
-- A tábla indexei `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD KEY `FK_Subscriptions_ID` (`ID`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `artist`
--
ALTER TABLE `artist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `audio`
--
ALTER TABLE `audio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `ajanlasok`
--
ALTER TABLE `ajanlasok`
  ADD CONSTRAINT `FK_ajanlasok_SongID` FOREIGN KEY (`SongID`) REFERENCES `audio` (`ID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_ajanlasok_UserID` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION;

--
-- Megkötések a táblához `audio`
--
ALTER TABLE `audio`
  ADD CONSTRAINT `FK_audio_Author` FOREIGN KEY (`Author`) REFERENCES `artist` (`ID`) ON DELETE NO ACTION;

--
-- Megkötések a táblához `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `FK_Playlists_PlaylistID` FOREIGN KEY (`PlaylistID`) REFERENCES `playlistnames` (`ID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_Playlists_SongID` FOREIGN KEY (`SongID`) REFERENCES `audio` (`ID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_Playlists_UserID` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION;

--
-- Megkötések a táblához `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `FK_Subscriptions_ID` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
