-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 09. Mrz 2016 um 21:25
-- Server-Version: 5.6.24
-- PHP-Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `dw283_sp3db1`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mod_wbanner_stats`
--

DROP TABLE IF EXISTS `mod_wbanner_stats`;
CREATE TABLE IF NOT EXISTS `mod_wbanner_stats` (
  `id` int(11) NOT NULL,
  `month` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `display_count` int(11) NOT NULL DEFAULT '0',
  `click_count` int(11) NOT NULL DEFAULT '0',
  `last` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mod_wbstats_day`
--

DROP TABLE IF EXISTS `mod_wbstats_day`;
CREATE TABLE IF NOT EXISTS `mod_wbstats_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user` int(10) NOT NULL DEFAULT '0',
  `view` int(10) NOT NULL DEFAULT '0',
  `bots` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `day` (`day`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mod_wbstats_ips`
--

DROP TABLE IF EXISTS `mod_wbstats_ips`;
CREATE TABLE IF NOT EXISTS `mod_wbstats_ips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `session` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `time` int(20) NOT NULL DEFAULT '0',
  `online` int(20) NOT NULL DEFAULT '0',
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `loggedin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mod_wbstats_keywords`
--

DROP TABLE IF EXISTS `mod_wbstats_keywords`;
CREATE TABLE IF NOT EXISTS `mod_wbstats_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `view` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mod_wbstats_lang`
--

DROP TABLE IF EXISTS `mod_wbstats_lang`;
CREATE TABLE IF NOT EXISTS `mod_wbstats_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `language` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `view` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mod_wbstats_pages`
--

DROP TABLE IF EXISTS `mod_wbstats_pages`;
CREATE TABLE IF NOT EXISTS `mod_wbstats_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `view` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mod_wbstats_ref`
--

DROP TABLE IF EXISTS `mod_wbstats_ref`;
CREATE TABLE IF NOT EXISTS `mod_wbstats_ref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `referer` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `view` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
