-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2017-11-18 12:01:31
-- 伺服器版本: 10.1.14-MariaDB
-- PHP 版本： 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `portfolio`
--

-- --------------------------------------------------------

--
-- 資料表結構 `image_table`
--

CREATE TABLE `image_table` (
  `image_id` int(10) NOT NULL COMMENT '照片編號',
  `imagedata` longblob NOT NULL COMMENT '照片資料',
  `imageintro` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '照片描述',
  `user_id` int(10) NOT NULL COMMENT '使用者編號',
  `port_id` int(10) NOT NULL COMMENT '作品集編號'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `image_table`
--

-- --------------------------------------------------------

--
-- 資料表結構 `portfolio_table`
--

CREATE TABLE `portfolio_table` (
  `port_id` int(10) NOT NULL COMMENT '作品集編號',
  `portname` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '作品集名稱',
  `porttime` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '作品集時間',
  `portclass` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '作品集類型',
  `portintro` text COLLATE utf8_unicode_ci NOT NULL COMMENT '作品集描述',
  `likes` int(10) NOT NULL DEFAULT '0' COMMENT '按讚數',
  `user_id` int(10) NOT NULL COMMENT '使用者編號'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `portfolio_table`
--

-- --------------------------------------------------------

--
-- 資料表結構 `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(10) NOT NULL COMMENT '使用者編號',
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '使用者名稱',
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '使用者email',
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '使用者密碼',
  `work` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Your Work' COMMENT '使用者工作',
  `experience` text COLLATE utf8_unicode_ci NOT NULL COMMENT '使用者經歷',
  `userpic` longblob NOT NULL COMMENT '使用者頭像'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user_table`
--

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `image_table`
--
ALTER TABLE `image_table`
  ADD PRIMARY KEY (`image_id`);

--
-- 資料表索引 `portfolio_table`
--
ALTER TABLE `portfolio_table`
  ADD PRIMARY KEY (`port_id`);

--
-- 資料表索引 `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `image_table`
--
ALTER TABLE `image_table`
  MODIFY `image_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '照片編號', AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `portfolio_table`
--
ALTER TABLE `portfolio_table`
  MODIFY `port_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '作品集編號', AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '使用者編號', AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
