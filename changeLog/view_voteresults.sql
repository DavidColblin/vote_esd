-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2010 at 08:12 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esd_main_db`
--

-- --------------------------------------------------------

--
-- Structure for view `view_voteresults`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_voteresults` AS select `results`.`p_id` AS `p_id`,`participants`.`p_name` AS `p_name`,`results`.`p_voteCount` AS `p_voteCount` from (`participants` join `results` on((`results`.`p_id` = `participants`.`p_id`))) order by `results`.`p_voteCount`;

--
-- VIEW  `view_voteresults`
-- Data: None
--

