-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 19, 2019 at 07:11 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staffpromotion`
--
CREATE DATABASE IF NOT EXISTS `staffpromotion` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `staffpromotion`;

-- --------------------------------------------------------

--
-- Table structure for table `academic_qualifications`
--

DROP TABLE IF EXISTS `academic_qualifications`;
CREATE TABLE IF NOT EXISTS `academic_qualifications` (
  `sid` varchar(45) NOT NULL,
  `qualification` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `awarding_institution` varchar(45) DEFAULT NULL,
  `start_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  KEY `academic_qualifications_staff_sid_fk` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_qualifications`
--

INSERT INTO `academic_qualifications` (`sid`, `qualification`, `level`, `class`, `finish_date`, `awarding_institution`, `start_date`, `created_at`, `updated_at`) VALUES
('P397', 'Bsc Accounting', 'FD', 'FC', '2016-10-22', 'Benue State University, Makurdi', '2012-01-02', '2019-03-07 23:27:59', '2019-03-08 10:55:43'),
('P397', 'Msc Accounting', 'MD', 'FC', '2018-11-19', 'Obafemi Awolowo University, Ile-Ife', '2017-01-02', '2019-03-07 23:32:58', '2019-03-08 10:55:43'),
('P205', 'Bsc Mathematics', 'FD', 'SCU', '2008-08-25', 'University of Lagos, Ikeja', '2005-01-03', '2019-03-08 09:10:39', '2019-03-08 10:55:43'),
('P205', 'Msc Pythagoras illustration', 'MD', 'FC', '2013-05-13', 'University of Nigeria, Nsukka', '2011-01-03', '2019-03-08 09:10:39', '2019-03-08 10:55:43'),
('P205', 'Chomsky Principles', 'DD', 'FC', '2018-07-16', 'University of Illorin, Kwara', '2015-02-09', '2019-03-08 09:10:39', '2019-03-08 10:55:43'),
('P860', 'Bsc. Economics', 'FD', 'FC', '1997-10-27', 'Benue State University, Makurdi', '1993-01-04', '2019-03-17 04:18:53', '2019-03-17 04:18:53'),
('P860', 'Msc. Egonometrics', 'MD', 'FC', '2005-03-07', 'University of Lagos, Ikeja', '2003-01-06', '2019-03-17 04:18:53', '2019-03-17 05:44:38'),
('P860', 'Recreational Economics', 'DD', 'FC', '2012-03-05', 'Leeds University, OK', '2009-03-09', '2019-03-17 04:18:53', '2019-03-17 05:44:38'),
('P822', 'B.sc Computer Science', 'FD', 'FC', '2006-07-04', 'Obafemi Awolowo University, Ile-Ife', '2002-09-03', '2019-06-29 00:22:08', '2019-06-29 00:22:08'),
('P822', 'M.sc Distributed Systems', 'MD', 'FC', '2013-05-07', 'Obafemi Awolowo University, Ile-Ife', '2009-12-29', '2019-06-29 00:22:08', '2019-06-29 00:22:08'),
('P822', 'Phd Cloud Computing', 'DD', 'FC', '2017-12-05', 'University of Lagos, Ikeja', '2015-01-06', '2019-06-29 00:24:05', '2019-06-29 00:24:05'),
('P511', 'Bsc. Computer Science', 'FD', 'FC', '2009-12-05', 'Benue State University, Makurdi', '2005-09-01', '2019-07-04 19:00:55', '2019-07-04 19:00:55'),
('P511', 'Msc. Computer Science', 'MD', 'FC', '2014-05-03', 'Benue State University, Makurdi', '2011-06-03', '2019-07-04 19:00:55', '2019-07-04 19:00:55'),
('P511', 'Msc. Software Engineering', 'MD', 'FC', '2017-09-03', 'University of Lagos, Ikeja', '2015-04-03', '2019-07-04 19:06:41', '2019-07-04 19:06:41'),
('P913', 'Bsc. Computer Science', 'FD', 'FC', '1990-03-31', 'University of Benin, Edo State', '1988-10-04', '2019-07-05 21:10:02', '2019-07-05 21:10:02'),
('P913', 'Msc. Computer Science', 'MD', 'FC', '1997-11-27', 'University of Nigeria, Nsukka', '1994-01-01', '2019-07-05 21:10:02', '2019-07-05 21:10:02'),
('P913', 'Phd. Computer Engineering', 'DD', 'FC', '2003-10-16', 'Leeds University, California', '2000-01-02', '2019-07-05 21:10:02', '2019-07-05 21:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `aper_complex_comments`
--

DROP TABLE IF EXISTS `aper_complex_comments`;
CREATE TABLE IF NOT EXISTS `aper_complex_comments` (
  `aper_id` varchar(45) NOT NULL,
  `comment` text NOT NULL,
  `sid` varchar(45) NOT NULL,
  `chairman_id` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`aper_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='complex comments on staff';

--
-- Dumping data for table `aper_complex_comments`
--

INSERT INTO `aper_complex_comments` (`aper_id`, `comment`, `sid`, `chairman_id`, `created_at`, `updated_at`) VALUES
('AP2998', 'qwerty....', 'P205', 'P205', '2019-03-25 01:51:58', '2019-03-25 01:51:58'),
('AP4860', 'Approved, a very passionate and hardworking staff', 'P822', 'P205', '2019-06-29 01:16:06', '2019-06-29 01:16:06'),
('AP9056', 'Evaluated and Approved', 'P913', 'P205', '2019-07-05 21:20:15', '2019-07-05 21:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `aper_faculty_comments`
--

DROP TABLE IF EXISTS `aper_faculty_comments`;
CREATE TABLE IF NOT EXISTS `aper_faculty_comments` (
  `aper_id` varchar(45) NOT NULL,
  `comment` text NOT NULL,
  `sid` varchar(45) NOT NULL,
  `dean_id` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`aper_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Faculty comments on staff';

--
-- Dumping data for table `aper_faculty_comments`
--

INSERT INTO `aper_faculty_comments` (`aper_id`, `comment`, `sid`, `dean_id`, `created_at`, `updated_at`) VALUES
('AP2998', 'qwerty yes!', 'P205', 'P205', '2019-03-24 07:10:32', '2019-03-24 07:10:32'),
('AP4860', 'Approved, but please check your recent publications', 'P822', 'P205', '2019-06-29 01:14:53', '2019-06-29 01:14:53'),
('AP7634', 'cool bro', 'P397', 'P205', '2019-03-24 07:25:02', '2019-03-24 07:25:02'),
('AP9056', 'good work', 'P913', 'P205', '2019-07-05 21:19:33', '2019-07-05 21:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `aper_form`
--

DROP TABLE IF EXISTS `aper_form`;
CREATE TABLE IF NOT EXISTS `aper_form` (
  `sid` varchar(11) NOT NULL,
  `application_no` varchar(45) DEFAULT NULL,
  `session` varchar(45) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `rank` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(45) NOT NULL,
  `date_of_first_appointment` date NOT NULL,
  `date_of_confirmation_of_appointment` date NOT NULL,
  `date_of_last_promotion` date NOT NULL,
  `last_promotion_rank` varchar(45) NOT NULL,
  `present_salary` varchar(45) NOT NULL COMMENT 'CONUASS',
  `staff_qualifications` text,
  `present_responsibilities` text NOT NULL,
  `staff_comments` text NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `sid` (`sid`),
  UNIQUE KEY `application_no` (`application_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Annual Performance Evaluation Report Form For Academic Staff';

--
-- Dumping data for table `aper_form`
--

INSERT INTO `aper_form` (`sid`, `application_no`, `session`, `full_name`, `rank`, `dob`, `department`, `date_of_first_appointment`, `date_of_confirmation_of_appointment`, `date_of_last_promotion`, `last_promotion_rank`, `present_salary`, `staff_qualifications`, `present_responsibilities`, `staff_comments`, `status`, `created_at`, `updated_at`) VALUES
('P205', 'AP2998', '2018/2019', 'Benaiah Bem Yusuf', 'L2', '1990-10-29', 'Computer Science', '2013-03-04', '2015-03-02', '2015-01-04', 'L2', '200,000', NULL, 'CodeBox coordinator BSU Chapter', 'Am fully qualified for this promotion..more details in bio', 0, '2019-03-08 09:47:15', '2019-07-04 21:29:00'),
('P397', 'AP7634', '2018/2019', 'Amanda Nandoo Justin', 'GA', '1988-06-14', 'Accounting', '2014-11-24', '2015-05-25', '2017-06-14', 'GA', '300,000', NULL, 'GST coordinator, EPS lecturer', 'other important information can be found on my profile thanks', 0, '2019-03-07 17:49:46', '2019-07-11 20:40:48'),
('P511', 'AP5117', '2017/2018', 'Omaji Adegbe Francis', 'AL', '1990-04-13', 'Computer Science', '2014-08-01', '2015-05-03', '2016-09-03', 'AL', '150,000', NULL, 'Sport Coordinator', 'More info in my profile', 0, '2019-07-04 19:06:41', '2019-07-04 19:06:41'),
('P822', 'AP4860', '2017/2018', 'Adekunle Ade Adeyelu', 'SL', '1970-06-09', 'Computer Science', '2007-06-05', '2008-06-10', '2016-10-11', 'SL', '300000', NULL, 'Deputy Dean, Faculty of Science', 'More details in my profile', 0, '2019-06-29 00:58:48', '2019-06-29 00:58:48'),
('P860', 'AP9774', '2018/2019', 'Musa Joseph Egahi', 'L1', '1982-03-30', 'Economics', '1998-04-20', '2000-03-06', '2016-11-21', 'L1', '350,000', NULL, 'HOD Economics, Faculty EPS coordinator', 'Having met the requirements, i am fully qualified for this promotion', 0, '2019-03-17 04:18:53', '2019-06-27 20:05:10'),
('P913', 'AP9056', '2017/2018', 'Jika Samuel Terseer', 'AP', '1991-06-24', 'Computer Science', '1995-05-14', '1997-04-02', '2017-06-04', 'AP', '600000', NULL, 'Deputy Vice Chancellor', 'Filled and verify by myself', 0, '2019-07-05 21:10:02', '2019-07-06 23:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `complex_approved`
--

DROP TABLE IF EXISTS `complex_approved`;
CREATE TABLE IF NOT EXISTS `complex_approved` (
  `aper_id` varchar(45) NOT NULL,
  `sid` varchar(45) NOT NULL,
  `approved_by` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`aper_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complex_approved`
--

INSERT INTO `complex_approved` (`aper_id`, `sid`, `approved_by`, `created_at`, `updated_at`) VALUES
('AP2998', 'P205', NULL, '2019-03-20 22:29:16', '2019-03-20 22:29:16'),
('AP4860', 'P822', 'P205', '2019-06-29 01:15:30', '2019-06-29 01:15:30'),
('AP5117', 'P511', 'P205', '2019-07-04 19:12:13', '2019-07-04 19:12:13'),
('AP7634', 'P397', NULL, '2019-03-21 05:42:36', '2019-03-21 05:42:36'),
('AP9056', 'P913', 'P205', '2019-07-05 21:20:24', '2019-07-05 21:20:24'),
('AP9774', 'P860', 'P205', '2019-06-03 03:08:07', '2019-06-03 03:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

DROP TABLE IF EXISTS `degree`;
CREATE TABLE IF NOT EXISTS `degree` (
  `id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated _at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  KEY `degree_academic_qualifications_qualification_fk` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`id`, `name`, `created_at`, `updated _at`) VALUES
('FD', 'First Degree', '2019-03-07 18:35:34', '2019-03-07 18:35:34'),
('MD', 'Masters Degree', '2019-03-07 18:35:34', '2019-03-07 18:35:34'),
('DD', 'Doctorate Degree', '2019-03-07 18:35:34', '2019-03-07 18:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `degree_class`
--

DROP TABLE IF EXISTS `degree_class`;
CREATE TABLE IF NOT EXISTS `degree_class` (
  `id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated _at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  KEY `degree_class_academic_qualifications_class_fk` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree_class`
--

INSERT INTO `degree_class` (`id`, `name`, `created_at`, `updated _at`) VALUES
('FC', 'First Class', '2019-03-07 18:40:02', '2019-03-07 18:40:02'),
('SCU', 'Second Class Upper', '2019-03-07 18:40:02', '2019-03-07 18:40:02'),
('SCL', 'Second Class Lower', '2019-03-07 18:40:02', '2019-03-07 18:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated _at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `department_faculty_id_fk` (`faculty_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `faculty_id`, `created_at`, `updated _at`) VALUES
(1, 'Computer Science', 1, '2019-03-06 18:26:00', '2019-03-06 18:31:38'),
(2, 'Physics', 1, '2019-03-06 18:26:02', '2019-03-06 18:31:38'),
(3, 'Mathematics', 1, '2019-03-06 18:22:30', '2019-03-06 18:31:38'),
(4, 'Chemistry', 1, '2019-03-06 18:22:47', '2019-03-06 18:31:38'),
(5, 'Biology', 1, '2019-03-06 18:23:20', '2019-03-06 18:31:38'),
(6, 'Mbbs', 5, '2019-03-06 18:24:20', '2019-03-06 18:31:56'),
(7, 'Sociology', 2, '2019-03-06 18:24:44', '2019-03-06 18:31:56'),
(8, 'Economics', 2, '2019-03-06 18:25:15', '2019-03-06 18:31:56'),
(9, 'Accounting', 3, '2019-03-06 18:25:26', '2019-03-06 18:31:56'),
(10, 'History', 4, '2019-03-06 18:25:51', '2019-03-06 18:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated _at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `created_at`, `updated _at`) VALUES
(1, 'Science', '2019-03-06 18:29:36', '2019-03-06 18:29:39'),
(2, 'Social Science', '2019-03-06 18:29:51', '2019-03-06 18:29:51'),
(3, 'Management Science', '2019-03-06 18:30:05', '2019-03-06 18:30:06'),
(4, 'Art', '2019-03-06 18:30:15', '2019-03-06 18:30:16'),
(5, 'Health Science', '2019-03-06 18:30:32', '2019-03-06 18:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `facultyapproved`
--

DROP TABLE IF EXISTS `facultyapproved`;
CREATE TABLE IF NOT EXISTS `facultyapproved` (
  `aper_id` varchar(45) NOT NULL,
  `sid` varchar(45) NOT NULL,
  `approved_by` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`aper_id`),
  KEY `facultyapproved_aper_form_application_no_fk` (`aper_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultyapproved`
--

INSERT INTO `facultyapproved` (`aper_id`, `sid`, `approved_by`, `created_at`, `updated_at`) VALUES
('AP7634', 'P397', NULL, '2019-03-20 22:27:20', '2019-03-20 22:27:20'),
('AP2998', 'P205', 'P205', '2019-07-04 10:49:46', '2019-07-04 10:49:46'),
('AP9774', 'P860', NULL, '2019-03-20 19:17:04', '2019-03-20 19:17:04'),
('AP4860', 'P822', 'P205', '2019-06-29 01:15:19', '2019-06-29 01:15:19'),
('AP5117', 'P511', 'P205', '2019-07-04 19:12:06', '2019-07-04 19:12:06'),
('AP9056', 'P913', 'P205', '2019-07-05 21:19:15', '2019-07-05 21:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `hodapproved`
--

DROP TABLE IF EXISTS `hodapproved`;
CREATE TABLE IF NOT EXISTS `hodapproved` (
  `aper_id` varchar(45) NOT NULL,
  `sid` varchar(45) DEFAULT NULL,
  `approved_by` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  KEY `hodapproved_aper_form_application_no_fk` (`aper_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hodapproved`
--

INSERT INTO `hodapproved` (`aper_id`, `sid`, `approved_by`, `created_at`, `updated_at`) VALUES
('AP9774', 'P860', NULL, '2019-03-19 22:21:30', '2019-03-19 22:21:30'),
('AP2998', 'P205', 'P205', '2019-04-12 03:07:16', '2019-04-12 03:07:16'),
('AP4860', 'P822', 'P205', '2019-06-29 01:14:07', '2019-06-29 01:14:07'),
('AP5117', 'P511', 'P205', '2019-07-04 19:11:58', '2019-07-04 19:11:58'),
('AP7634', 'P397', 'P205', '2019-07-04 19:27:13', '2019-07-04 19:27:13'),
('AP9056', 'P913', 'P205', '2019-07-05 21:19:06', '2019-07-05 21:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `hod_comments`
--

DROP TABLE IF EXISTS `hod_comments`;
CREATE TABLE IF NOT EXISTS `hod_comments` (
  `aper_id` varchar(45) NOT NULL,
  `sid` varchar(45) NOT NULL,
  `comment` text NOT NULL,
  `hid` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  KEY `hod_comments_aper_form_application_no_fk` (`aper_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Hod recommendations and comments on staff';

--
-- Dumping data for table `hod_comments`
--

INSERT INTO `hod_comments` (`aper_id`, `sid`, `comment`, `hid`, `created_at`, `updated_at`) VALUES
('AP2998', 'P205', 'bhblbjlbjlbjlbjlbjlbjljbjljlbjbjlbljbjbjlb', 'P205', '2019-03-24 06:11:20', '2019-03-24 06:11:20'),
('AP9774', 'P860', 'cool! more publications is a plus', 'P205', '2019-03-25 01:00:26', '2019-03-25 01:00:26'),
('AP7634', 'P397', 'didn\'t know not commenting wound throw an error :(', 'P205', '2019-04-12 04:11:43', '2019-04-12 04:11:43'),
('AP4860', 'P822', 'Verified and Approved!', 'P205', '2019-06-29 01:14:00', '2019-06-29 01:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_01_15_114412_create_role_user_table', 1),
(2, '2016_01_26_115523_create_permission_role_table', 2),
(3, '2016_02_09_132439_create_permission_user_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

DROP TABLE IF EXISTS `rank`;
CREATE TABLE IF NOT EXISTS `rank` (
  `id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated _at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  KEY `rank_aper_form_rank_fk` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`id`, `name`, `created_at`, `updated _at`) VALUES
('GA', 'Graduate Assistant', '2019-03-07 17:21:49', '2019-03-07 17:21:49'),
('AL', 'Assistant Lecturer', '2019-03-07 17:21:49', '2019-03-07 17:21:49'),
('L2', 'Lecturer II', '2019-03-07 17:21:49', '2019-03-07 17:21:49'),
('L1', 'Lecturer I', '2019-03-07 17:21:49', '2019-03-07 17:21:49'),
('SL', 'Senior Lecturer', '2019-03-07 17:21:49', '2019-03-07 17:21:49'),
('AP', 'Associate Professor', '2019-03-07 17:21:49', '2019-03-07 17:21:49'),
('P', 'Professor', '2019-03-07 17:21:49', '2019-03-07 17:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scoring_system`
--

DROP TABLE IF EXISTS `scoring_system`;
CREATE TABLE IF NOT EXISTS `scoring_system` (
  `appno` varchar(11) NOT NULL,
  `sid` varchar(45) NOT NULL,
  `rank` varchar(45) NOT NULL,
  `qualification` int(11) DEFAULT NULL,
  `publication` int(11) DEFAULT NULL,
  `teaching_experience` int(11) DEFAULT NULL,
  `professional_activities` int(11) DEFAULT NULL,
  `academic_leadership` int(11) DEFAULT NULL,
  `community_service` int(11) DEFAULT NULL,
  `interview` int(11) DEFAULT NULL,
  `referee_report` int(11) DEFAULT NULL,
  `student_assessment` int(11) DEFAULT NULL,
  `total_score` int(11) DEFAULT NULL,
  `percent` double DEFAULT NULL,
  `totalmin_qualifying_score` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`appno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoring_system`
--

INSERT INTO `scoring_system` (`appno`, `sid`, `rank`, `qualification`, `publication`, `teaching_experience`, `professional_activities`, `academic_leadership`, `community_service`, `interview`, `referee_report`, `student_assessment`, `total_score`, `percent`, `totalmin_qualifying_score`, `updated_at`, `created_at`) VALUES
('AP2998', 'P205', 'L2', 5, 8, 6, NULL, 1, 2, 17, 3, 6, 48, 73.84615384615385, 65, '2019-07-04 10:50:25', '2019-07-04 10:50:25'),
('AP4860', 'P822', 'SL', 8, 2, 9, 6, 2, 2, 17, 3, 6, 55, 84.61538461538461, 65, '2019-06-29 01:16:19', '2019-06-29 01:16:19'),
('AP5117', 'P511', 'AL', 4, 2, 3, NULL, NULL, NULL, 17, 3, NULL, 29, 44.61538461538462, 65, '2019-07-04 19:12:24', '2019-07-04 19:12:24'),
('AP7634', 'P397', 'GA', 4, NULL, NULL, NULL, NULL, NULL, 17, 3, NULL, 24, 36.92307692307693, 65, '2019-07-04 10:48:42', '2019-07-04 10:48:42'),
('AP9056', 'P913', 'AP', 8, 12, 15, 6, 2, 2, 17, 3, 6, 71, 109.23076923076923, 70, '2019-07-07 23:01:00', '2019-07-05 21:21:36'),
('AP9774', 'P860', 'L1', 8, 3, 9, 6, 2, 2, 17, 3, 6, 56, 86.15384615384616, 65, '2019-07-04 10:41:22', '2019-07-04 10:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `sid` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `post` varchar(45) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `pob` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `lga` varchar(45) DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL,
  `perm_home_address` text,
  `current_postal_position` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `marital_status` varchar(45) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `rank` varchar(45) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `appointment_confirmation` date DEFAULT NULL,
  `passport` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `faculty_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='staff information table';

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sid`, `first_name`, `last_name`, `middle_name`, `post`, `department_id`, `pob`, `dob`, `state`, `lga`, `nationality`, `perm_home_address`, `current_postal_position`, `phone_number`, `email`, `marital_status`, `sex`, `appointment_date`, `rank`, `status`, `appointment_confirmation`, `passport`, `password`, `verified`, `faculty_id`, `role_id`, `isAdmin`, `religion`, `updated_at`, `created_at`, `remember_token`) VALUES
('P205', 'Benaiah', 'Yusuf', 'Bem', 'HOD', 1, 'Jos', '1990-10-29', 'Benue State', 'Makurdi', 'Nigerian', 'Saints Avenue, Cra-City, Abuja', 'PMB 101', '08147323591', 'yusufbenaiah@gmail.com', 'Single', 'Male', '2015-10-26', 'L2', 0, '1970-01-01', '1551902263.jpg', '$2y$10$P1r.q/nur8ZWWTcPZuy3U.n78asHbJ9EI4Wj3Ns/2JsluKL.x4ONq', 1, 1, 3, 1, 'Christianity', '2019-07-07 23:18:20', '2019-03-06 17:53:31', 'x7Y11no811Pg5XwgVm9vWfldhya6HdEVZc7HWFtjiXvA0qKJfralh0Rndind'),
('P397', 'Amanda', 'Justin', 'Nandoo', 'Exam Officer', 9, 'Makurdi', '1988-06-14', NULL, 'Gboko', 'Nigerian', 'Block 2b Bsu Staff Quaters Makurdi', 'PMB 1011', '08100699589', 'amandajusin@gmail.com', 'Married', 'Female', '2012-07-23', 'GA', 0, '2014-05-26', '1551940551.jpg', '$2y$10$IKxVg618j5KL7y52UbPRT.UtuY3wwq03a037w3cmGpG9lxghfs53q', 1, 3, 3, 0, 'Christianity', '2019-03-15 22:24:58', '2019-03-07 16:11:03', 'YJgHtHBiBULY2Guh4zbdmenA0Gh74PkWvunG9wb2LSDkpYkUmLStKzdfXJrR'),
('P511', 'Omaji', 'Francis', 'Adegbe', 'Sports Coordinator', 1, 'Kaduna', '1990-04-13', 'Benue State', 'Agatu', 'Nigerian', 'Army Barrack, Kaduna', '000', '08067890022', 'omajifrancis@bsum.edu.ng', 'Single', 'Male', '2014-08-01', 'AL', 0, '2015-05-03', '1562230661.jpg', '$2y$10$ZxR6.wExDPUm6MDW/jMngOBv4/OJtxLXOQMHzVY1SC1xuBIma15ma', 1, 1, NULL, NULL, 'Christianity', '2019-07-04 20:13:09', '2019-07-04 11:16:17', '4EKSTU71w6I8hdlgDXHnmbXDasSADklFkN9Xq55rm9Ucv91XJCwMUvGQD9mu'),
('P609', 'Oche', 'Randy', NULL, NULL, NULL, NULL, '1993-08-03', NULL, NULL, NULL, NULL, NULL, NULL, 'randyoche@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, '$2y$10$Cqgsd1Acsfuq7.TvxQSV1.eGwLvUQMiyVwPfLHY/oCqjQ2zuS4nbS', 1, NULL, NULL, NULL, NULL, '2019-07-04 19:50:58', '2019-07-04 11:12:37', 'pkydlOhtbN7Wo07xRvGtHMlBBUYO7fvt38NTnWIXkkIEmzi6diUOlojMAVRj'),
('P822', 'Adekunle', 'Adeyelu', 'Ade', 'DEAN', 1, 'Ondo State', '1970-06-09', 'Ondo State', 'Akure', 'Nigerian', 'High Level, Makurdi', 'P.O Box 1133', '08145523112', 'adekunlea@bsum.edu.ng', 'Married', 'Male', '2007-06-05', 'SL', 0, '2008-06-10', '1561732256.png', '$2y$10$KviVZqSnyklsK9WqUuwj.OeMscR7I74gLerGLGtFZ6YCcL67JrxXu', 1, 1, NULL, 0, 'Christianity', '2019-07-07 22:53:15', '2019-06-27 18:21:47', 'r7iNRrJeLDgPMZuudMFGHeXt99G1iTqwQY4iLbgWrlzTUdD6agMprr20EXxU'),
('P860', 'Musa', 'Egahi', 'Joseph', 'DEAN', 8, 'Mubi', '1982-03-30', 'Adamawa State', 'Mubi', 'Nigerian', 'No 12 BSU staff quarters Makurdi', 'p. o box 1234', '08094875111', 'megahi@gmail.com', 'Married', 'Male', '1998-04-13', 'L1', 0, '2000-03-13', '1552759600.jpg', '$2y$10$D.SRxlqMFjJ6vTfyS1RJxOw5E.5FCKB0DydtK7xqwJy9K79H7KUDu', 1, 2, 3, 0, 'Christianity', '2019-06-27 20:04:43', '2019-03-15 20:08:41', '5B2eaCA1UdlnxSyholSoCRcBQdC6S24p3AJxNGtP3dVXg2ADk6ZVvCotjQWA'),
('P868', 'Onojah', 'Joy', NULL, NULL, NULL, NULL, '1995-12-27', NULL, NULL, NULL, NULL, NULL, NULL, 'joyo@bsum.edu.ng', NULL, NULL, NULL, NULL, 0, NULL, NULL, '$2y$10$rEivbyvwz7JghDHzq.6vFu8.Oc1f7WR.itosVukCGqoTNTSo7O8Z2', 1, NULL, NULL, NULL, NULL, '2019-07-04 19:51:04', '2019-07-04 11:14:18', '2A7zZW5fhHtr9EpIfpaioq1spYINFuRvFx5L9rh46FeWJygexV8WLRnaj2IN'),
('P913', 'Jika', 'Terseer', 'Samuel', 'DVC', 1, 'Naka', '1991-06-24', 'Bauchi State', 'Gwer-West', 'Nigerian', 'Naka, Benue State', 'P.O Box 1100', '09023346671', 'jikaterseer@bsum.edu.ng', 'Single', 'Male', '1995-05-14', 'AP', 0, '1997-04-02', '1562324392.jpg', '$2y$10$Hk6v0tmF8qpCO1zDqbZI3uciODdXJYGKWfRB.gr.kzrhQufjUGV5i', 1, 1, NULL, NULL, 'Christianity', '2019-07-05 21:03:11', '2019-07-04 11:11:21', 'ElX3GLfdMZwLDz2mjvAihLEAPGes1rPsRqMpzGmLT47pPISxBWpCiLr0TBW3');

-- --------------------------------------------------------

--
-- Table structure for table `staff_children`
--

DROP TABLE IF EXISTS `staff_children`;
CREATE TABLE IF NOT EXISTS `staff_children` (
  `sid` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_children`
--

INSERT INTO `staff_children` (`sid`, `name`, `position`, `age`, `created_at`, `updated_at`) VALUES
('p236', 'Amanda', 1, 16, '2018-12-18 08:54:47', '2018-12-18 08:54:47'),
('p236', 'Paul', 2, 13, '2018-12-18 08:54:47', '2018-12-18 08:54:47'),
('p236', 'Hendrick', 3, 10, '2018-12-18 08:54:47', '2018-12-18 08:54:47'),
('P994', 'Moses', 1, 8, '2018-12-30 21:23:14', '2018-12-30 21:23:14'),
('P994', 'Josphine', 2, 5, '2018-12-30 21:23:14', '2018-12-30 21:23:14'),
('ST-110', 'Andreas', 1, 20, '2019-03-04 00:18:55', '2019-03-04 00:18:55'),
('ST-110', 'Staggerer', 2, 19, '2019-03-04 00:18:55', '2019-03-04 00:18:55'),
('ST-110', 'Frank', 3, 18, '2019-03-04 00:18:55', '2019-03-04 00:18:55'),
('ST-110', 'Donald', 4, 15, '2019-03-04 00:18:55', '2019-03-04 00:18:55'),
('P205', 'Jika', 1, 24, '2019-03-06 20:21:55', '2019-03-06 20:21:55'),
('P205', 'Randy', 2, 22, '2019-03-06 20:21:55', '2019-03-06 20:21:55'),
('P205', 'Gbenge', 3, 20, '2019-03-06 20:21:55', '2019-03-06 20:21:55'),
('P397', 'Doose', 1, 23, '2019-03-08 09:19:15', '2019-03-08 09:19:15'),
('P397', 'Aondona', 2, 19, '2019-03-08 09:19:16', '2019-03-08 09:19:16'),
('P397', 'Emmy', 3, 15, '2019-03-08 09:19:16', '2019-03-08 09:19:16'),
('P860', 'Terseer', 1, 25, '2019-03-17 05:27:42', '2019-03-17 05:27:42'),
('P860', 'Franklin', 2, 22, '2019-03-17 05:27:42', '2019-03-17 05:27:42'),
('P860', 'Randy', 3, 20, '2019-03-17 05:27:42', '2019-03-17 05:27:42'),
('P822', 'Oluyemi', 1, 23, '2019-06-29 00:16:43', '2019-06-29 00:16:43'),
('P822', 'Tunde', 2, 19, '2019-06-29 00:16:43', '2019-06-29 00:16:43'),
('P822', 'tobi', 3, 17, '2019-06-29 00:16:44', '2019-06-29 00:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `staff_publications`
--

DROP TABLE IF EXISTS `staff_publications`;
CREATE TABLE IF NOT EXISTS `staff_publications` (
  `sid` varchar(45) NOT NULL,
  `details` varchar(255) NOT NULL,
  `url` varchar(200) NOT NULL,
  `type` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_publications`
--

INSERT INTO `staff_publications` (`sid`, `details`, `url`, `type`, `date`, `created_at`, `updated_at`) VALUES
('ST-110', 'Impact of Artificial Intelligence in Health sector', 'https://www.ehealthjournal.com', 'Journal', '2019-03-11', '2019-03-03 23:30:32', '2019-03-03 23:30:32'),
('ST-110', 'uggjukgkjvhvj', 'https://www.ehealthjournal.com', 'ebook', '2019-02-24', '2019-03-03 23:30:33', '2019-03-03 23:30:33'),
('ST-110', 'hcajuhiehijewhihwq', 'www.google.com', 'ebook', '2019-03-05', '2019-03-03 23:43:06', '2019-03-03 23:43:06'),
('ST-110', 'khgkhghhgkhj uogugogougo', 'www.google.com/khghghg', 'bookreview', '2019-03-06', '2019-03-04 18:35:30', '2019-03-04 18:35:30'),
('ST-110', 'hihiliihihihihiphihj', 'http://hbvhbvhk.com/jhjjhl', 'bljkjbjbll', '2019-03-14', '2019-03-04 18:35:30', '2019-03-04 18:35:30'),
('P205', 'qwerty werto', 'www.google.com/qwerty', 'bookreview', '2019-03-04', '2019-03-06 19:55:44', '2019-03-06 19:55:44'),
('P205', 'njbjbjlnjnjn', 'easdfvgbhjkl', 'monograph', '2019-03-19', '2019-03-06 19:56:19', '2019-03-06 19:56:19'),
('P205', 'kmnknknknm nm,bmmnm', 'http://hbvhbvhk.com/jhjjhl', 'researchreport', '2019-03-12', '2019-03-06 19:56:20', '2019-03-06 19:56:20'),
('P397', 'Effects of cloud computing on data storage', 'https://cranium.ng/publications', 'researchreport', '2016-02-01', '2019-03-07 13:18:11', '2019-03-07 13:18:11'),
('P397', 'Laravel for College Students', 'https://ebookonline.com/lfcs', 'ebook', '2018-06-11', '2019-03-07 13:18:11', '2019-03-07 13:18:11'),
('P860', 'Economics of education', 'http://bsujournals.com', 'journal', '2017-02-06', '2019-03-16 19:18:37', '2019-03-16 19:18:37'),
('P860', 'Economics and ergonometrics', 'https://newyorktimes.com', 'bookreview', '2018-05-15', '2019-03-16 19:18:37', '2019-03-16 19:18:37'),
('P205', 'ss', 'ssss', 'researchreport', '2019-06-18', '2019-06-01 12:40:58', '2019-06-01 12:40:58'),
('P205', 'jnn', 'jnn', 'creativework', '2019-06-10', '2019-06-01 12:41:29', '2019-06-01 12:41:29'),
('P822', 'Cloud Computing', 'https://csc.org/aaa/cloud_computing', 'journal', '2015-09-08', '2019-06-28 15:05:09', '2019-06-28 15:05:09'),
('P822', 'internetofpeople', 'https://csc.org/aaa/iop', 'researchreport', '2013-04-01', '2019-07-01 09:38:05', '2019-07-01 09:38:05'),
('P205', 'my journey in computing', 'https://mit.gov/by/myjourney', 'journal', '2017-05-30', '2019-07-04 00:47:29', '2019-07-04 00:47:29'),
('P511', 'computer and information secuirty', 'http://www.researchgate.com/cci', 'researchreport', '2017-08-08', '2019-07-04 09:08:48', '2019-07-04 09:08:48'),
('P913', 'introduction to computer science', 'http://www.researchgate.com/6464564', 'ebook', '1998-05-04', '2019-07-05 11:16:48', '2019-07-05 11:16:48'),
('P913', 'Algorithms and Data Structure', 'http://rearchmarket.com/77778', 'ebook', '2001-03-30', '2019-07-05 11:16:48', '2019-07-05 11:16:48'),
('P913', 'wireless storage services', 'http://mit.com/345678', 'journal', '2004-04-22', '2019-07-05 11:16:48', '2019-07-05 11:16:48'),
('P913', 'IOT is the future', 'http://computerresearch.com/9889899', 'researchreport', '2008-02-17', '2019-07-05 11:16:48', '2019-07-05 11:16:48'),
('P913', 'NO SQL', 'http://databases.com/687878', 'creativework', '2007-12-25', '2019-07-05 11:16:48', '2019-07-05 11:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

DROP TABLE IF EXISTS `vacancies`;
CREATE TABLE IF NOT EXISTS `vacancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(70) NOT NULL,
  `department` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_qualifications`
--
ALTER TABLE `academic_qualifications`
  ADD CONSTRAINT `academic_qualifications_staff_sid_fk` FOREIGN KEY (`sid`) REFERENCES `staff` (`sid`);

--
-- Constraints for table `aper_complex_comments`
--
ALTER TABLE `aper_complex_comments`
  ADD CONSTRAINT `aper_complex_comments_aper_form_application_no_fk` FOREIGN KEY (`aper_id`) REFERENCES `aper_form` (`application_no`);

--
-- Constraints for table `aper_faculty_comments`
--
ALTER TABLE `aper_faculty_comments`
  ADD CONSTRAINT `aper_faculty_comments_aper_form_application_no_fk` FOREIGN KEY (`aper_id`) REFERENCES `aper_form` (`application_no`);

--
-- Constraints for table `complex_approved`
--
ALTER TABLE `complex_approved`
  ADD CONSTRAINT `complex_approved_aper_form_application_no_fk` FOREIGN KEY (`aper_id`) REFERENCES `aper_form` (`application_no`);

--
-- Constraints for table `hod_comments`
--
ALTER TABLE `hod_comments`
  ADD CONSTRAINT `hod_comments_aper_form_application_no_fk` FOREIGN KEY (`aper_id`) REFERENCES `aper_form` (`application_no`);

--
-- Constraints for table `scoring_system`
--
ALTER TABLE `scoring_system`
  ADD CONSTRAINT `scoring_system_aper_form_application_no_fk` FOREIGN KEY (`appno`) REFERENCES `aper_form` (`application_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
