-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Kas 2021, 13:27:15
-- Sunucu sürümü: 10.4.20-MariaDB
-- PHP Sürümü: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `test`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testsurvey_voters`
--

CREATE TABLE `testsurvey_voters` (
  `Id` int(10) UNSIGNED NOT NULL,
  `SurveyId` int(10) UNSIGNED NOT NULL,
  `Ipaddress` varchar(15) NOT NULL,
  `VoteDate` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `testsurvey_voters`
--

INSERT INTO `testsurvey_voters` (`Id`, `SurveyId`, `Ipaddress`, `VoteDate`) VALUES
(1, 1, '127.0.0.1', 1636968638),
(2, 1, '127.0.0.1', 1636968643),
(3, 2, '127.0.0.1', 1636968648),
(4, 2, '127.0.0.1', 1636969141);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `testsurvey_voters`
--
ALTER TABLE `testsurvey_voters`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `SurveyId` (`SurveyId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `testsurvey_voters`
--
ALTER TABLE `testsurvey_voters`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `testsurvey_voters`
--
ALTER TABLE `testsurvey_voters`
  ADD CONSTRAINT `testsurvey_voters_ibfk_1` FOREIGN KEY (`SurveyId`) REFERENCES `testsurvey` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
