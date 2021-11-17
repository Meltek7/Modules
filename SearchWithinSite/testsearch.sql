-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Kas 2021, 14:47:42
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
-- Tablo için tablo yapısı `testsearch`
--

CREATE TABLE `testsearch` (
  `id` int(10) UNSIGNED NOT NULL,
  `productName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `testsearch`
--

INSERT INTO `testsearch` (`id`, `productName`) VALUES
(1, 'Watch'),
(2, 'Chair'),
(3, 'Clock'),
(4, 'Coffee table'),
(5, 'Mouse'),
(6, 'Computer'),
(7, 'Telephone'),
(8, 'Fridge'),
(9, 'Oven'),
(10, 'Carpet'),
(11, 'Curtain'),
(12, 'Wardrope'),
(13, 'Console'),
(14, 'Map'),
(15, 'Bed'),
(16, 'Blanket');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `testsearch`
--
ALTER TABLE `testsearch`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `testsearch`
--
ALTER TABLE `testsearch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
