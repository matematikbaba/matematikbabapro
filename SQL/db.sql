-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 08 Eki 2012, 15:26:59
-- Sunucu sürümü: 5.5.16
-- PHP Sürümü: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `defterim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE IF NOT EXISTS `ayarlar` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `lmt` int(11) NOT NULL,
  `tema` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `lmt`, `tema`) VALUES
(1, 10, 'main.css');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banned`
--

CREATE TABLE IF NOT EXISTS `banned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `defter`
--

CREATE TABLE IF NOT EXISTS `defter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(63) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `ip` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `isim` varchar(35) COLLATE utf8_turkish_ci NOT NULL,
  `onay` int(11) NOT NULL,
  `cevap` int(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `likes` int(11) DEFAULT NULL,
  `ip` text NOT NULL,
  `dislikes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetim`
--

CREATE TABLE IF NOT EXISTS `yonetim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(35) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  `songiris` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `yonetim`
--

INSERT INTO `yonetim` (`id`, `isim`, `mail`, `songiris`, `sifre`) VALUES
(1, 'admin', 'admin', '10 October 2012 Sunday , Saat  10:32', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
