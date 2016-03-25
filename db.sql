-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 03 月 25 日 02:34
-- 服务器版本: 5.5.32
-- PHP 版本: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `1116723`
--

-- --------------------------------------------------------

--
-- 表的结构 `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `_ai` int(11) NOT NULL AUTO_INCREMENT,
  `time_id` int(11) NOT NULL,
  `user` text NOT NULL,
  `image` longblob NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`_ai`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='儲存圖片' AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `_ai` int(11) NOT NULL AUTO_INCREMENT,
  `uid` text NOT NULL,
  `upwd` text NOT NULL,
  PRIMARY KEY (`_ai`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='會員列表' AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
