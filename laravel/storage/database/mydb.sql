-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2012 at 05:47 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `link` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attachment_problem`
--

CREATE TABLE IF NOT EXISTS `attachment_problem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attachment_id` int(11) NOT NULL,
  `problem_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attachment_solution`
--

CREATE TABLE IF NOT EXISTS `attachment_solution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attachment_id` int(11) NOT NULL,
  `solution_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext,
  `created_at` datetime DEFAULT NULL,
  `updted_at` datetime DEFAULT NULL,
  `problem_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`problem_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `laravel_migrations`
--

CREATE TABLE IF NOT EXISTS `laravel_migrations` (
  `bundle` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`bundle`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `problemformats`
--

CREATE TABLE IF NOT EXISTS `problemformats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `format` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `problemformats`
--

INSERT INTO `problemformats` (`id`, `format`, `created_at`, `updated_at`) VALUES
(1, 'multiple choice', '2012-06-08 03:34:54', '2012-06-08 03:34:54'),
(2, 'true/false', '2012-06-08 03:34:54', '2012-06-08 03:34:54'),
(3, 'free response', '2012-06-08 03:34:54', '2012-06-08 03:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `problemlevels`
--

CREATE TABLE IF NOT EXISTS `problemlevels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `problemlevels`
--

INSERT INTO `problemlevels` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'physical science', '2012-06-08 03:38:46', '2012-06-08 03:38:46'),
(2, 'conceptual physics', '2012-06-08 03:38:46', '2012-06-08 03:38:46'),
(3, 'AP physics', '2012-06-08 03:38:46', '2012-06-08 03:38:46'),
(4, 'calc-based', '2012-06-08 03:38:46', '2012-06-08 03:38:46'),
(5, 'upper division', '2012-06-08 03:38:46', '2012-06-08 03:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE IF NOT EXISTS `problems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `question` longtext,
  `problem_type_id` int(11) NOT NULL,
  `problem_format_id` int(11) NOT NULL,
  `problem_level_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `citation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`,`problem_type_id`,`problem_format_id`,`problem_level_id`),
  UNIQUE KEY `creation_date_UNIQUE` (`created_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `user_id`, `title`, `question`, `problem_type_id`, `problem_format_id`, `problem_level_id`, `created_at`, `updated_at`, `citation`) VALUES
(4, 2, 'first problem', 'this is the text of the first problem', 1, 2, 5, '2012-06-10 21:52:17', '2012-06-10 21:52:17', NULL),
(5, 2, 'second problem', 'this is the text of the second problem', 2, 3, 3, '2012-06-10 21:53:55', '2012-06-10 21:53:55', NULL),
(6, 2, '3rd problem', 'this is the text of the third problem', 1, 1, 1, '2012-06-10 21:57:36', '2012-06-10 21:57:36', NULL),
(7, 2, 'fourth problem', 'this is the text of the fourth problem.', 1, 1, 1, '2012-06-10 22:01:32', '2012-06-10 22:01:32', NULL),
(8, 1, 'Andy''s first problem', 'Here''s the text for my first problem', 2, 2, 4, '2012-06-11 01:27:34', '2012-06-11 01:27:34', NULL),
(9, 1, 'Andy''s second problem', 'here''s some text for my second problem.', 2, 2, 2, '2012-06-11 01:42:56', '2012-06-11 01:42:56', NULL),
(10, 1, 'Andy''s third problem', 'Andy''s third problem text', 1, 2, 5, '2012-06-11 01:44:57', '2012-06-11 01:44:57', NULL),
(11, 1, 'Andy''s fourth problem', 'Andy''s fourth problem text', 2, 2, 5, '2012-06-11 01:46:23', '2012-06-11 01:46:23', NULL),
(12, 2, 'lkfjklsfjdskl', 'slfj dsklfj dslkjf skldjf dskljf kldsj fkldsj fkljds klfj dsklfj kdslj fkldsj fkldsj flksjd', 1, 1, 1, '2012-06-14 02:35:40', '2012-06-14 02:35:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `problemtypes`
--

CREATE TABLE IF NOT EXISTS `problemtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `problemtypes`
--

INSERT INTO `problemtypes` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'numerical', '2012-06-08 03:37:09', '2012-06-08 03:37:09'),
(2, 'conceptual', '2012-06-08 03:37:09', '2012-06-08 03:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `problem_tag`
--

CREATE TABLE IF NOT EXISTS `problem_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `problem_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `problem_tag`
--

INSERT INTO `problem_tag` (`id`, `problem_id`, `tag_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 4, 5, NULL, '2012-06-10 21:52:17', '2012-06-10 21:52:17'),
(4, 4, 6, NULL, '2012-06-10 21:52:17', '2012-06-10 21:52:17'),
(5, 5, 7, NULL, '2012-06-10 21:53:55', '2012-06-10 21:53:55'),
(7, 6, 8, NULL, '2012-06-10 21:57:36', '2012-06-10 21:57:36'),
(9, 7, 9, NULL, '2012-06-10 22:01:32', '2012-06-10 22:01:32'),
(10, 7, 5, NULL, '2012-06-10 22:01:33', '2012-06-10 22:01:33'),
(11, 8, 10, NULL, '2012-06-11 01:27:34', '2012-06-11 01:27:34'),
(12, 9, 6, NULL, '2012-06-11 01:42:56', '2012-06-11 01:42:56'),
(13, 9, 10, NULL, '2012-06-11 01:42:56', '2012-06-11 01:42:56'),
(14, 10, 8, NULL, '2012-06-11 01:44:57', '2012-06-11 01:44:57'),
(15, 11, 11, NULL, '2012-06-11 01:46:24', '2012-06-11 01:46:24'),
(16, 11, 9, NULL, '2012-06-11 01:46:24', '2012-06-11 01:46:24'),
(17, 11, 10, NULL, '2012-06-11 01:46:24', '2012-06-11 01:46:24'),
(18, 12, 12, NULL, '2012-06-14 02:35:40', '2012-06-14 02:35:40'),
(19, 12, 13, NULL, '2012-06-14 02:35:40', '2012-06-14 02:35:40'),
(20, 12, 5, NULL, '2012-06-14 02:35:40', '2012-06-14 02:35:40'),
(21, 12, 9, NULL, '2012-06-14 02:35:40', '2012-06-14 02:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `solutioncomments`
--

CREATE TABLE IF NOT EXISTS `solutioncomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext,
  `user_id` int(11) NOT NULL,
  `solutions_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`,`solutions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE IF NOT EXISTS `solutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext,
  `problem_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`problem_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(45) DEFAULT NULL,
  `is_canonical` tinyint(1) DEFAULT NULL,
  `description` text,
  `is_standard` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `is_canonical`, `description`, `is_standard`, `created_at`, `updated_at`, `user_id`) VALUES
(5, 'energy', NULL, NULL, NULL, '2012-06-10 21:52:17', '2012-06-10 21:52:17', 2),
(6, 'momentum', NULL, NULL, NULL, '2012-06-10 21:52:17', '2012-06-10 21:52:17', 2),
(8, 'angular momentum', NULL, NULL, NULL, '2012-06-10 21:57:36', '2012-06-10 21:57:36', 2),
(9, 'heat', NULL, NULL, NULL, '2012-06-10 22:01:32', '2012-06-10 22:01:32', 2),
(10, 'Andy''s first tag', NULL, NULL, NULL, '2012-06-11 01:27:34', '2012-06-11 01:27:34', 1),
(11, 'Andy''s second tag', NULL, NULL, NULL, '2012-06-11 01:46:23', '2012-06-11 01:46:23', 1),
(12, 'fsjd lfj dsk', NULL, NULL, NULL, '2012-06-14 02:35:40', '2012-06-14 02:35:40', 2),
(13, ' sjf sdfj dkslf ', NULL, NULL, NULL, '2012-06-14 02:35:40', '2012-06-14 02:35:40', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `address2` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `institution`, `address`, `address2`, `city`, `state`, `zip`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'arundquist', '$2a$08$bGIxbzJjR2YyVnZHalplSOtwr3lhVogpzrZLNy2jLaVeFEp.lO8HG', 'Andy', 'Rundquist', 'andy.rundquist@gmail.com', 'Hamline University', '1536 Hewitt Ave', '', 'Saint Paul', 'MN', '55114', 'US', NULL, '2012-06-07 20:19:41', '2012-06-07 20:19:41'),
(2, 'test', '$2a$08$R3VzZFFFNDM0T2hCeGI2NO9UuhX0IEB5oUkBb7oqLHWFjeznE7n62', 'Test', 'Testerson', 'test@test.com', 'Test Institution', 'test', '', 'Test', 'TE', '55555', 'US', NULL, '2012-06-10 00:43:09', '2012-06-10 00:43:09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
