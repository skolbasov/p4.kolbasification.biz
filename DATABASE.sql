-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 24, 2013 at 12:03 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `kolbasif_p4_kolbasification_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `urgency` tinyint(1) NOT NULL,
  `importance` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `googleEventId` varchar(255) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `name`, `user_id`, `startTime`, `endTime`, `urgency`, `importance`, `description`, `googleEventId`) VALUES
(6, 'Коньки Лиза', 1, '2013-12-25 19:30:00', '2013-12-25 23:00:00', 0, 1, '', 'heiuipkvo5e58ddov593o0p8p8'),
(7, 'Выбрать Кино на воскр', 1, '2013-12-24 17:00:00', '2013-12-24 18:00:00', 1, 0, 'выбрать хорошее кино на воскр', 'aff53vqikk9lm4m7qnlcnjl2k8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone_name` varchar(50) NOT NULL,
  `timezone_value` varchar(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_activated` tinyint(1) DEFAULT NULL,
  `activation_key` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `activation_key` (`activation_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone_name`, `timezone_value`, `first_name`, `last_name`, `email`, `is_activated`, `activation_key`) VALUES
(1, 1387836425, 1387836425, 'b40820743f7a5b6708cbc55a876ccf74dd67cab7', '769fe036bdc52dbd01abd5e6732756275c3c2f23', 1387836490, 'Europe/Moscow', '+0400', 'Sergey', 'Kolbasov', 'skolbasov@gmail.com', 1, '637f62e65c5d252bca1db9d0fb0d53736c7e2273');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
