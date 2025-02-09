-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Mar 2013, 11:07:23
-- Sunucu sürümü: 5.5.27-log
-- PHP Sürümü: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: ``
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ziyaretcidefteri`
--

CREATE TABLE IF NOT EXISTS `ziyaretcidefteri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mesaj` varchar(500) NOT NULL,
  `onay` int(2) NOT NULL,
  `tarih` varchar(255) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Tablo döküm verisi `ziyaretcidefteri`
--

INSERT INTO `ziyaretcidefteri` (`id`, `nick`, `email`, `mesaj`, `onay`, `tarih`, `avatar`) VALUES
(5, 'RedToweR', 'root@kaancelik.net', 'Masaya doÄŸru ÅŸafak gazete de cezbelendi gazete bilgisayarÄ± masanÄ±n mÄ±knatÄ±slÄ± okuma sayfasÄ± beÄŸendim layÄ±kÄ±yla telefonu telefonu ÅŸafak. Masaya doÄŸru ÅŸafak gazete de cezbelendi gazete bilgisayarÄ± masanÄ±n mÄ±knatÄ±slÄ± okuma sayfasÄ± beÄŸendim layÄ±kÄ±yla telefonu telefonu ÅŸafak. Masaya doÄŸru ÅŸafak gazete de cezbelendi gazete bilgisayarÄ±', 1, '24/03/2013', 'resim/erkek.png'),
(6, 'NazlÄ±', 'cankocyigit-2000@hotmail.com', 'Masaya doÄŸru ÅŸafak gazete de cezbelendi gazete bilgisayarÄ± masanÄ±n mÄ±knatÄ±slÄ± okuma sayfasÄ± beÄŸendim layÄ±kÄ±yla telefonu telefonu ÅŸafak. Masaya doÄŸru ÅŸafak gazete de cezbelendi gazete bilgisayarÄ± masanÄ±n mÄ±knatÄ±slÄ± okuma sayfasÄ± beÄŸendim layÄ±kÄ±yla telefonu telefonu ÅŸafak. Masaya doÄŸru ÅŸafak gazete de cezbelendi gazete bilgisayarÄ±', 1, '24/03/2013', 'resim/bayan.png'),
(7, 'Kaan', 'root@kaancelik.net', 'Merhaba bu bir deneme yorumudur deneme yorumu yapmayÄ± Ã§ok seviyorum Ã§Ã¼nkÃ¼ denemek gÃ¼zeldir.', 1, '24/03/2013', 'resim/erkek.png'),
(22, 'Genel Mesaj', 'zd@ziyaretcidefteri.com', 'Lorem ipsum dolor sit amet lo lo Lorem ipsum dolor sit amet lo lo Lorem ipsum dolor sit amet lo lo\r\nLorem ipsum dolor sit amet lo lo', 0, '29/03/2013', 'resim/erkek.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
