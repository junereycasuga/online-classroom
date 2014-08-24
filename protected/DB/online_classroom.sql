-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2014 at 07:43 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classroom_id` int(11) NOT NULL,
  `assignment_title` varchar(255) NOT NULL,
  `assignment_body` longtext NOT NULL,
  `assignment_deadline` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `classroom_id`, `assignment_title`, `assignment_body`, `assignment_deadline`) VALUES
(1, 1, 'Assignment #1', 'Develop a web application that aggregates data about a certain area', '2014-11-30 06:23:22'),
(2, 0, '', '', '0000-00-00 00:00:00'),
(3, 0, '', '', '0000-00-00 00:00:00'),
(4, 0, '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_replies`
--

CREATE TABLE IF NOT EXISTS `assignment_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_reply` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `assignment_replies`
--

INSERT INTO `assignment_replies` (`id`, `assignment_id`, `student_id`, `assignment_reply`) VALUES
(1, 1, 2014001, 'Test reply');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classroom_name` varchar(255) NOT NULL,
  `classroom_subject` int(11) NOT NULL,
  `classroom_teacher` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `classroom_name` (`classroom_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `classroom_name`, `classroom_subject`, `classroom_teacher`) VALUES
(1, 'COM1 - Mang Jose', 1, 123);

-- --------------------------------------------------------

--
-- Table structure for table `handouts`
--

CREATE TABLE IF NOT EXISTS `handouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classroom_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `handouts`
--

INSERT INTO `handouts` (`id`, `classroom_id`, `file`) VALUES
(1, 1, 'online_classroom.sql'),
(2, 1, '10621682_10203593165784032_1901170586_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_title` varchar(255) NOT NULL,
  `quiz_body` longtext NOT NULL,
  `quiz_deadline` datetime NOT NULL,
  `classroom_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `quiz_title`, `quiz_body`, `quiz_deadline`, `classroom_id`) VALUES
(1, 'Quiz #1', 'Create an app', '2014-08-23 05:27:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_replies`
--

CREATE TABLE IF NOT EXISTS `quiz_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `quiz_reply` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `quiz_replies`
--

INSERT INTO `quiz_replies` (`id`, `quiz_id`, `student_id`, `quiz_reply`) VALUES
(1, 1, 2014001, 'Okay');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_firstname` varchar(255) NOT NULL,
  `student_lastname` varchar(255) NOT NULL,
  `student_year_level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2014004 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_firstname`, `student_lastname`, `student_year_level`) VALUES
(2014001, 'Totoy', 'Brown', 1),
(2014002, 'Neneng', 'Brown', 2),
(2014003, 'Hephep', 'Hooray', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_classroom`
--

CREATE TABLE IF NOT EXISTS `student_classroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student_classroom`
--

INSERT INTO `student_classroom` (`id`, `student_id`, `classroom_id`) VALUES
(1, 2014001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_shortcode` varchar(255) NOT NULL,
  `subject_longname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_shortcode`, `subject_longname`) VALUES
(1, 'COM1', 'Computer 1'),
(2, 'MATH1', 'Algebra');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_firstname` varchar(255) NOT NULL,
  `teacher_lastname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_firstname`, `teacher_lastname`) VALUES
(123, 'Mang', 'Jose'),
(124, 'Aling', 'Nena');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1=teacher; 2=student',
  `id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_type`, `id`) VALUES
(1, 'mangjose', '0655a949c0826968e2daa324026f7b2dcccd94ac882ba5a4d5cec0fbc1fc0ff545a1a3b77560b7ead1704ca9f41b73a91c7d238f946f723e66fa96a17f1c3558', 1, 123),
(2, 'totoybrown', '0655a949c0826968e2daa324026f7b2dcccd94ac882ba5a4d5cec0fbc1fc0ff545a1a3b77560b7ead1704ca9f41b73a91c7d238f946f723e66fa96a17f1c3558', 2, 2014001),
(3, 'alingnena', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1, 124),
(4, 'hephephooray', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 2, 2014003);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
