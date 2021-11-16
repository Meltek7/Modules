-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Kas 2021, 13:27:08
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
-- Tablo için tablo yapısı `testsurvey`
--

CREATE TABLE `testsurvey` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Question` text NOT NULL,
  `AnswerOne` text NOT NULL,
  `AnswerTwo` text NOT NULL,
  `AnswerThree` text NOT NULL,
  `VoteNumberAnswerOne` int(10) NOT NULL,
  `VoteNumberAnswerTwo` int(10) NOT NULL,
  `VoteNumberAnswerThree` int(10) NOT NULL,
  `TotalVoters` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `testsurvey`
--

INSERT INTO `testsurvey` (`Id`, `Question`, `AnswerOne`, `AnswerTwo`, `AnswerThree`, `VoteNumberAnswerOne`, `VoteNumberAnswerTwo`, `VoteNumberAnswerThree`, `TotalVoters`) VALUES
(1, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium quibusdam blanditiis voluptate ea quo beatae sit quia officia vel? Laborum.', 'Lorem', 'Ipsum', 'Dolor', 2, 2, 7, 11),
(2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ducimus quasi fugit, eveniet corrupti non laborum doloremque velit neque animi iste sequi rem fuga consectetur exercitationem reprehenderit necessitatibus vitae similique?', 'Sit', 'Amet', 'Consectetur ', 2, 2, 11, 15);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `testsurvey`
--
ALTER TABLE `testsurvey`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `testsurvey`
--
ALTER TABLE `testsurvey`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
