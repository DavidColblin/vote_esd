-- Adminer 3.1.0 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `esd_local_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `esd_local_db`;

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `e_id` int(7) NOT NULL,
  `e_startDate` datetime NOT NULL,
  `e_stopDate` datetime NOT NULL,
  PRIMARY KEY  (`e_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `events` (`e_id`, `e_startDate`, `e_stopDate`) VALUES
(1,    '2010-11-20 21:44:04',    '2010-11-28 21:44:23');

DROP TABLE IF EXISTS `keys`;
CREATE TABLE `keys` (
  `e_id` int(7) NOT NULL,
  `e_key` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `keys` (`e_id`, `e_key`) VALUES
(1,    'tHeLoCalKey1');

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `mem_id` smallint(6) NOT NULL auto_increment,
  `mem_email` varchar(90) NOT NULL,
  `mem_password` varchar(32) NOT NULL,
  `mem_voted` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`mem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `members` (`mem_id`, `mem_email`, `mem_password`, `mem_voted`) VALUES
(1,    'chris@geeksphere.co.cc',    'b5850c839fa32d482ebae214b48b7d26',    1),
(2,    'christophe_kun@yahoo.fr',    '912ec803b2ce49e4a541068d495ab570',    1),
(3,    'david@mail.com',    '202cb962ac59075b964b07152d234b70',    1),
(4,    'test@mail.com',    'b83a886a5c437ccd9ac15473fd6f1788',    0);

DROP TABLE IF EXISTS `results`;
CREATE TABLE `results` (
  `p_id` int(11) NOT NULL,
  `p_voteCount` int(11) NOT NULL default '1',
  UNIQUE KEY `p_id` (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `results` (`p_id`, `p_voteCount`) VALUES
(2,    3),
(3,    10),
(4,    4),
(5,    4),
(1,    4);

CREATE DATABASE `esd_main_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `esd_main_db`;

DROP TABLE IF EXISTS `event_participants`;
CREATE TABLE `event_participants` (
  `e_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `event_participants` (`e_id`, `p_id`) VALUES
(1,    1),
(1,    2),
(1,    3),
(1,    4),
(1,    5);

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `e_id` int(11) NOT NULL auto_increment,
  `e_startDate` datetime NOT NULL,
  `e_stopDate` datetime NOT NULL,
  `e_status` varchar(9) NOT NULL default 'upcoming',
  PRIMARY KEY  (`e_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `events` (`e_id`, `e_startDate`, `e_stopDate`, `e_status`) VALUES
(1,    '2010-11-20 21:44:04',    '2010-11-29 21:44:23',    'upcoming');

DROP TABLE IF EXISTS `localservers`;
CREATE TABLE `localservers` (
  `ls_idHash` varchar(32) NOT NULL,
  `ls_key` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `localservers` (`ls_idHash`, `ls_key`) VALUES
('b0a63081f3aa5f36e11f5e1177a20251',    'tHeLoCalKey1'),
('0376f2a0cb39814edaee1d3b20e48e4f',    'PhiloLateral9433');

DROP TABLE IF EXISTS `participants`;
CREATE TABLE `participants` (
  `p_id` int(11) NOT NULL auto_increment,
  `p_name` varchar(30) NOT NULL,
  PRIMARY KEY  (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `participants` (`p_id`, `p_name`) VALUES
(1,    'Pingpong'),
(2,    'Swish'),
(3,    'buzz'),
(4,    'iDog'),
(5,    'capp'),
(6,    'fifisipak'),
(7,    'Groboulish'),
(8,    'Rexxar'),
(9,    'Baribie'),
(10,    'Solistnet');

DROP TABLE IF EXISTS `results`;
CREATE TABLE `results` (
  `e_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_voteCount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `results` (`e_id`, `p_id`, `p_voteCount`) VALUES
(0,    5,    3),
(0,    4,    1),
(0,    1,    2),
(0,    2,    1),
(0,    3,    1);

DROP VIEW IF EXISTS `view_voteresults`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_voteresults` AS select `results`.`p_id` AS `p_id`,`participants`.`p_name` AS `p_name`,`results`.`p_voteCount` AS `p_voteCount` from (`participants` join `results` on((`results`.`p_id` = `participants`.`p_id`))) order by `results`.`p_voteCount`;

-- 2010-11-29 00:34:35
