-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Jan 01, 2012, 05:51 AM
-- 伺服器版本: 5.0.67
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 資料庫: `listenet`
--
CREATE DATABASE `listenet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `listenet`;

-- --------------------------------------------------------

--
-- 資料表格式： `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL auto_increment,
  `time` varchar(20) collate utf8_unicode_ci NOT NULL,
  `message` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 列出以下資料庫的數據： `message`
--

INSERT INTO `message` (`id`, `message`, `time`) VALUES