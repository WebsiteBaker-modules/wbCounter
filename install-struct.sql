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
--
-- Datenbank: `dw283_sp3db1`
--
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_wbanner_stats`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_wbanner_stats`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_wbanner_stats` (
  `id` int(11) NOT NULL,
  `month` varchar(32){FIELD_COLLATION} NOT NULL,
  `display_count` int(11) NOT NULL DEFAULT '0',
  `click_count` int(11) NOT NULL DEFAULT '0',
  `last` bigint(20) NOT NULL DEFAULT '0'
){TABLE_ENGINE};
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_counter_day`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_counter_day`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_counter_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(8){FIELD_COLLATION} NOT NULL DEFAULT '',
  `user` int(10) NOT NULL DEFAULT '0',
  `view` int(10) NOT NULL DEFAULT '0',
  `bots` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `day` (`day`)
){TABLE_ENGINE};
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_counter_ips`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_counter_ips`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_counter_ips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15){FIELD_COLLATION} NOT NULL DEFAULT '',
  `session` varchar(64){FIELD_COLLATION} NOT NULL DEFAULT '',
  `time` int(20) NOT NULL DEFAULT '0',
  `online` int(20) NOT NULL DEFAULT '0',
  `page` varchar(255){FIELD_COLLATION} NOT NULL DEFAULT '',
  `loggedin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
){TABLE_ENGINE};
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_counter_keywords`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_counter_keywords`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_counter_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(8){FIELD_COLLATION} NOT NULL DEFAULT '',
  `keyword` varchar(255){FIELD_COLLATION} NOT NULL DEFAULT '',
  `view` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
){TABLE_ENGINE};
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_counter_lang`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_counter_lang`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_counter_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(8){FIELD_COLLATION} NOT NULL DEFAULT '',
  `language` varchar(2){FIELD_COLLATION} NOT NULL DEFAULT '',
  `view` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
){TABLE_ENGINE};
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_counter_pages`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_counter_pages`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_counter_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(8){FIELD_COLLATION} NOT NULL DEFAULT '',
  `page` varchar(255){FIELD_COLLATION} NOT NULL DEFAULT '',
  `view` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
){TABLE_ENGINE};
-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `mod_counter_ref`
--
DROP TABLE IF EXISTS `{TABLE_PREFIX}mod_counter_ref`;
CREATE TABLE IF NOT EXISTS `{TABLE_PREFIX}mod_counter_ref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(8){FIELD_COLLATION} NOT NULL DEFAULT '',
  `referer` varchar(255){FIELD_COLLATION} NOT NULL DEFAULT '',
  `view` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
){TABLE_ENGINE};

