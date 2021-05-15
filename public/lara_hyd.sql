-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 06:46 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_hyd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_fileupload`
--

CREATE TABLE `admin_fileupload` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `committee_id` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_path` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) UNSIGNED NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `award` varchar(200) DEFAULT NULL,
  `document_name` varchar(200) DEFAULT NULL,
  `document_path` varchar(300) DEFAULT NULL,
  `notice_name` varchar(200) DEFAULT NULL,
  `notice_path` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `event_id`, `award`, `document_name`, `document_path`, `notice_name`, `notice_path`, `created_at`, `updated_at`) VALUES
(1, NULL, 'hghdfgwdyuv uyud', NULL, NULL, NULL, NULL, '2018-01-28 05:45:54', '2018-01-28 05:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `admin_upload`
--

CREATE TABLE `admin_upload` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_upload`
--

INSERT INTO `admin_upload` (`id`, `event_id`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(4, 0, 'Brac.png', 'uploads/app/2018/02/14/Brac15186124191.png', '2018-02-14 06:46:59', '2018-02-14 06:46:59'),
(5, 0, 'Brac.png', 'uploads/app/2018/02/14/Brac151861258515.png', '2018-02-14 06:49:45', '2018-02-14 06:49:45'),
(6, 0, '4-dimensions.png', 'uploads/app/2018/02/14/4-dimensions151861275218.png', '2018-02-14 06:52:32', '2018-02-14 06:52:32'),
(7, NULL, 'Agendum.GIF', 'uploads/app/2018/02/14/Agendum151861324915.GIF', '2018-02-14 07:00:49', '2018-02-14 07:00:49'),
(8, NULL, '4-dimensions.png', 'uploads/app/2018/02/15/4-dimensions1518669798.png', '2018-02-14 22:43:18', '2018-02-14 22:43:18'),
(9, NULL, '4-dimensions.png', 'uploads/app/2018/02/15/4-dimensions1518671984.png', '2018-02-14 23:19:44', '2018-02-14 23:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) UNSIGNED NOT NULL,
  `club_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `created_at`, `updated_at`) VALUES
(5, 'India', '2018-02-04 05:21:11', '2018-02-04 05:21:11'),
(6, 'Canada', '2018-02-04 05:21:18', '2018-02-04 05:21:18'),
(7, 'Indonesia', '2018-02-04 22:16:42', '2018-02-04 22:16:42'),
(17, 'Nigeria', '2018-02-07 03:28:30', '2018-02-07 03:28:30'),
(19, 'Uganda', '2018-02-07 03:28:57', '2018-02-07 03:28:57'),
(20, 'Japan', '2018-02-08 03:00:47', '2018-02-08 03:00:47'),
(21, 'Tunisia', '2018-02-08 03:00:59', '2018-02-08 03:00:59'),
(23, 'Sweden', '2018-02-08 05:47:16', '2018-02-08 05:47:16'),
(25, 'England', '2018-02-08 05:47:33', '2018-02-08 05:47:33'),
(26, 'Switzerland', '2018-02-19 23:12:21', '2018-02-19 23:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `id` int(11) UNSIGNED NOT NULL,
  `committee_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`id`, `committee_name`, `created_at`, `updated_at`) VALUES
(16, 'Country-Matrix', '2018-02-07 06:28:50', '2018-02-07 06:28:50'),
(17, 'IP', '2018-02-07 06:29:03', '2018-02-07 06:29:03'),
(18, 'MV-2', '2018-02-07 06:29:10', '2018-02-07 06:29:10'),
(19, 'NATO', '2018-02-07 06:29:14', '2018-02-07 06:29:14'),
(20, 'Call of Duty', '2018-02-08 02:59:38', '2018-02-08 02:59:38'),
(21, 'NFS', '2018-02-08 02:59:50', '2018-02-08 02:59:50'),
(22, 'NARUTOO', '2018-02-08 05:46:44', '2018-02-08 05:46:44'),
(23, 'Most Wanted', '2018-02-19 23:11:29', '2018-02-19 23:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `comm_n_club`
--

CREATE TABLE `comm_n_club` (
  `id` int(11) UNSIGNED NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `committee_id` int(11) DEFAULT NULL,
  `club_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comm_n_club`
--

INSERT INTO `comm_n_club` (`id`, `event_id`, `committee_id`, `club_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 3, '2018-02-04 22:28:24', '2018-02-04 22:28:24'),
(2, 1, 5, 5, '2018-02-04 22:28:24', '2018-02-04 22:28:24'),
(3, 1, 5, 6, '2018-02-05 00:10:57', '2018-02-05 00:10:57'),
(4, 1, 5, 7, '2018-02-05 00:10:57', '2018-02-05 00:10:57'),
(5, 1, 6, 3, '2018-02-05 00:11:22', '2018-02-05 00:11:22'),
(6, 1, 6, 7, '2018-02-05 00:11:22', '2018-02-05 00:11:22'),
(7, 2, 7, 5, '2018-02-06 00:50:13', '2018-02-06 00:50:13'),
(8, 2, 7, 6, '2018-02-06 00:50:40', '2018-02-06 00:50:40'),
(9, 2, 7, 7, '2018-02-06 00:50:40', '2018-02-06 00:50:40'),
(10, 2, 7, 3, '2018-02-06 00:50:51', '2018-02-06 00:50:51'),
(11, 2, 8, 3, '2018-02-06 00:54:44', '2018-02-06 00:54:44'),
(12, 2, 8, 6, '2018-02-06 00:54:45', '2018-02-06 00:54:45'),
(13, 2, 8, 8, '2018-02-06 00:54:45', '2018-02-06 00:54:45'),
(14, 1, 8, 3, '2018-02-06 04:16:47', '2018-02-06 04:16:47'),
(15, 1, 8, 6, '2018-02-06 04:16:47', '2018-02-06 04:16:47'),
(16, 1, 8, 5, '2018-02-06 04:16:47', '2018-02-06 04:16:47'),
(17, 1, 8, 7, '2018-02-06 04:16:47', '2018-02-06 04:16:47'),
(18, 1, 8, 8, '2018-02-06 04:17:14', '2018-02-06 04:17:14'),
(19, 1, 15, 14, '2018-02-07 03:30:33', '2018-02-07 03:30:33'),
(20, 1, 15, 5, '2018-02-07 03:30:33', '2018-02-07 03:30:33'),
(21, 1, 15, 19, '2018-02-07 03:30:33', '2018-02-07 03:30:33'),
(22, 2, 6, 17, '2018-02-07 03:34:28', '2018-02-07 03:34:28'),
(23, 2, 6, 12, '2018-02-07 03:34:28', '2018-02-07 03:34:28'),
(24, 2, 6, 11, '2018-02-07 03:34:28', '2018-02-07 03:34:28'),
(25, 1, 16, 5, '2018-02-07 06:30:58', '2018-02-07 06:30:58'),
(26, 1, 16, 7, '2018-02-07 06:30:58', '2018-02-07 06:30:58'),
(27, 1, 16, 17, '2018-02-07 06:30:58', '2018-02-07 06:30:58'),
(28, 1, 17, 5, '2018-02-07 06:32:09', '2018-02-07 06:32:09'),
(29, 1, 17, 17, '2018-02-07 06:32:09', '2018-02-07 06:32:09'),
(30, 2, 17, 5, '2018-02-08 00:39:53', '2018-02-08 00:39:53'),
(31, 2, 17, 17, '2018-02-08 00:39:53', '2018-02-08 00:39:53'),
(32, 2, 18, 5, '2018-02-08 00:40:11', '2018-02-08 00:40:11'),
(33, 2, 18, 7, '2018-02-08 00:40:11', '2018-02-08 00:40:11'),
(34, 1, 17, 7, '2018-02-08 02:40:23', '2018-02-08 02:40:23'),
(35, 1, 19, 5, '2018-02-08 02:43:25', '2018-02-08 02:43:25'),
(36, 1, 21, 5, '2018-02-08 03:01:43', '2018-02-08 03:01:43'),
(37, 1, 21, 20, '2018-02-08 03:01:44', '2018-02-08 03:01:44'),
(38, 1, 21, 21, '2018-02-08 03:01:44', '2018-02-08 03:01:44'),
(39, 2, 22, 25, '2018-02-08 05:49:05', '2018-02-08 05:49:05'),
(40, 2, 22, 20, '2018-02-08 05:49:05', '2018-02-08 05:49:05'),
(41, 2, 22, 17, '2018-02-08 05:49:05', '2018-02-08 05:49:05'),
(42, 1, 16, 25, '2018-02-10 02:50:14', '2018-02-10 02:50:14'),
(43, 1, 23, 20, '2018-02-19 23:13:00', '2018-02-19 23:13:00'),
(44, 1, 23, 21, '2018-02-19 23:13:00', '2018-02-19 23:13:00'),
(45, 1, 23, 19, '2018-02-19 23:13:00', '2018-02-19 23:13:00'),
(46, 2, 23, 25, '2018-02-19 23:13:31', '2018-02-19 23:13:31'),
(47, 2, 23, 17, '2018-02-19 23:13:31', '2018-02-19 23:13:31'),
(48, 2, 23, 26, '2018-02-19 23:13:31', '2018-02-19 23:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'LORD MUN DHAKA-2018', NULL, NULL),
(2, 'SDG MUN INDIA-2018', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_registration`
--

CREATE TABLE `event_registration` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `committee_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `previous_experience` text,
  `accommodation` int(11) NOT NULL,
  `food` text NOT NULL,
  `visa_requirement` int(1) DEFAULT NULL,
  `passport_name` varchar(30) DEFAULT NULL,
  `passport_no` varchar(20) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `willingness_to_perform` int(1) NOT NULL,
  `performance_name` varchar(100) DEFAULT NULL,
  `payment_status` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_registration`
--

INSERT INTO `event_registration` (`id`, `user_id`, `event_id`, `committee_id`, `club_id`, `previous_experience`, `accommodation`, `food`, `visa_requirement`, `passport_name`, `passport_no`, `expiry_date`, `dob`, `willingness_to_perform`, `performance_name`, `payment_status`, `created_at`, `updated_at`) VALUES
(7, 8, 2, 8, 8, 'rt', 1, '1', 0, NULL, NULL, NULL, NULL, 1, NULL, 'Unpaid', '2018-02-07 02:30:38', '2018-02-07 02:30:38'),
(8, 11, 2, 6, 12, 'No', 1, '1', 0, NULL, NULL, NULL, NULL, 0, NULL, 'Unpaid', '2018-02-07 03:36:58', '2018-02-07 03:36:58'),
(9, 11, 1, 5, 7, 'Yes', 1, '1', 1, NULL, 'CF215487', NULL, '2018-02-15', 0, NULL, 'Unpaid', '2018-02-07 03:38:54', '2018-02-07 03:38:54'),
(19, 1, 1, 16, 7, 'Yes.. Nice', 0, '0', 0, NULL, NULL, NULL, NULL, 1, 'Running', 'Unpaid', '2018-02-07 06:40:51', '2018-02-07 06:40:51'),
(26, 17, 1, 21, 21, 'Yes', 1, '0', 1, 'selim', 'selim898969', '2019-02-12', '1994-02-08', 0, NULL, 'Unpaid', '2018-02-08 03:05:36', '2018-02-08 03:05:36'),
(27, 18, 2, 22, 25, 'jghr', 0, '0', 1, 'Mr. Zahid', 'KJ54567956', '2018-02-08', '2018-02-09', 0, NULL, 'Paid', '2018-02-08 05:55:35', '2018-02-08 05:55:35'),
(28, 8, 1, 17, 17, 'fewghe', 0, '0', 0, NULL, NULL, NULL, NULL, 1, 'efef', NULL, '2018-02-10 02:59:50', '2018-02-10 02:59:50'),
(29, 19, 1, 21, 20, 'kji', 0, '0', 1, 'Dolon123', NULL, NULL, NULL, 1, 'Walking', NULL, '2018-02-11 03:13:08', '2018-02-11 03:13:08'),
(30, 20, 1, 21, 5, 'SEO Expert', 1, '0', 1, 'NUR-E-ALAM', 'JN521478', '2018-02-20', '2018-02-28', 1, 'SEO', NULL, '2018-02-11 03:26:38', '2018-02-11 03:26:38'),
(31, 15, 1, 19, 5, NULL, 1, '0', 1, 'Md. Khalid Ahmed', 'ef0562', '2018-02-08', '2018-02-16', 1, 'Swimming', 'Paid', '2018-02-11 23:28:09', '2018-02-11 23:28:09'),
(33, 18, 1, 17, 7, 'Very exciting', 0, '0', 0, NULL, NULL, NULL, NULL, 1, 'Cycling', 'Unpaid', '2018-02-17 02:30:48', '2018-02-17 02:30:48'),
(34, 21, 1, 16, 5, 'Very Nice', 0, '0', 0, NULL, NULL, NULL, NULL, 1, 'Swimming', NULL, '2018-02-19 23:06:53', '2018-02-19 23:06:53'),
(35, 22, 1, 16, 25, 'Very Nice', 0, '0', 0, NULL, NULL, NULL, NULL, 1, 'Running', NULL, '2018-02-19 23:09:03', '2018-02-19 23:09:03'),
(36, 22, 2, 23, 26, NULL, 1, '0', 0, NULL, NULL, NULL, NULL, 1, 'Running', NULL, '2018-02-19 23:15:30', '2018-02-19 23:15:30'),
(42, 1, 2, 22, 17, 'No experiejnce', 1, '0', 1, 'Md. Mamdudur Rahman', 'CF215487', '2018-02-14', '2018-02-23', 1, 'Swimming', NULL, '2018-02-21 22:27:03', '2018-02-21 22:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice_upload`
--

CREATE TABLE `notice_upload` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `committee_id` int(100) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice_upload`
--

INSERT INTO `notice_upload` (`id`, `event_id`, `committee_id`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(34, 1, 16, 'user-pdfview (1).pdf', 'uploads/app/2018/02/20/user-pdfview (1)1519122461.pdf', '2018-02-20 04:27:41', '2018-02-20 04:27:41'),
(36, 2, 22, 'Test Report -2.docx', 'uploads/app/2018/02/22/Test Report -21519275574.docx', '2018-02-21 22:59:34', '2018-02-21 22:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mamdudur.rahman@pridesys.com', '$2y$10$oyiGwo9BS3uHbzskTMEbLu60kdN8kiaW6ijDRR9ZS1jkC45suvIE.', '2018-01-09 00:17:05'),
('dolon1090@gmail.com', '$2y$10$GI8hLbI83/KJXtyZ4GnynePpBWa93oQl8FqdDsN25Bh3WyHL.ilsi', '2018-01-09 02:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `registration_fees`
--

CREATE TABLE `registration_fees` (
  `id` int(11) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `currency` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_name` varchar(200) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `residence_address` varchar(200) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `contact_person_name` varchar(100) NOT NULL,
  `contact_person_phone_no` varchar(20) NOT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `passport_no` varchar(50) DEFAULT NULL,
  `facebook_profile` varchar(300) DEFAULT NULL,
  `academic_qualification` text,
  `university_name` text,
  `university_address` text,
  `study_field` text,
  `current_semester` text,
  `medical_condition` text,
  `allergies_preference` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`id`, `user_id`, `img_name`, `img_path`, `full_name`, `gender`, `dob`, `country`, `nationality`, `residence_address`, `user_email`, `phone_no`, `contact_person_name`, `contact_person_phone_no`, `relationship`, `passport_no`, `facebook_profile`, `academic_qualification`, `university_name`, `university_address`, `study_field`, `current_semester`, `medical_condition`, `allergies_preference`, `created_at`, `updated_at`) VALUES
(1, 1, 'about-Us.png', 'uploads/app/2018/02/15/about-Us15186719451.png', 'Md. Mamdudur Rahman', 'Male', '2018-01-02', 'India', 'sfcdsghvfwjsdrfw', 'wdwd', 'mamdudur.rahman@pridesys.com', '0125455', 'mkmkd', '021566', 'Uncle', '0121+62697856102354', 'HttoP:ojfjchedj', 'B.Sc. Engineering, Computer Science & Engineering', 'Bangladesh University Of Engineering & Technology', 'Polashi, BUET, Dhaka', 'History', '4th year 1st semester', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-01-17 02:53:48', '2018-02-14 23:19:05'),
(4, 4, '', '', 'Kawser Mobin Hridoy', 'Male', '2016-01-05', 'Bangladesh', 'Bangladeshi', 'Maymensingh', 'kawsar.mobin@gmail.com.com', '01258745', 'Md. Morshedul Alam', '+8802541785', 'Uncle', 'OP524178', 'http:facebook.com/kawsar.mobin', '', '', '', '', '', '', '', '2018-01-17 03:21:42', '2018-01-17 03:21:42'),
(11, 2, 'img_Rishab.JPG', 'uploads/app/2018/01/25/img_Rishab15168703482.JPG', 'Ridoy', 'Male', '2018-01-02', 'Nepal', 'wdwdd', 'ylhg 1ioweuj1o', 'dolon1090@gmail.com', '0125455', 'mkmkd', '021566', 'Cousin', 'BE245456wfj', 'http:facebook.com/kawsar', NULL, NULL, NULL, NULL, NULL, '455', NULL, '2018-01-17 03:56:24', '2018-01-25 02:52:28'),
(18, 4, '', '', 'Kawser Mobin', 'Male', '2016-01-05', 'Bangladesh', 'Bangladeshi', 'Maymensingh', 'kawsar.mobin@gmail.com.com', '01258745', 'Md. Morshedul Alam', '+8802541785', 'Uncle', 'OP524178', 'http:facebook.com/kawsar.mobin', '', '', '', '', '', '', '', '2018-01-18 03:31:28', '2018-01-18 03:31:28'),
(30, 2, '', '', 'Ridoy', 'Male', '2018-01-02', 'Nepal', 'wdwdd', 'ylhg 1ioweuj1o', 'dolon1090@gmail.com', '0125455', 'mkmkd', '021566', 'Cousin', 'BE245456wfj', 'http:facebook.com/kawsar', 'B.Sc. Engineering, Computer Science & Engineering', 'Bangladesh University Of Engineering & Technology', 'Polashi, BUET, Dhaka', 'Software, Hardware & Networking', '3rd year 2nd semester', 'B.P.-Normal, P.R.-Normal, Weight- 73 kg , Ag(ve-), No infectious diseases.', 'No food allergy but Halal foods only.', '2018-01-19 23:50:37', '2018-01-19 23:50:37'),
(34, 2, '', '', 'Ridoy', 'Male', '2018-01-02', 'Nepal', 'wdwdd', 'ylhg 1ioweuj1o', 'dolon1090@gmail.com', '0125455', 'mkmkd', '021566', 'Cousin', 'BE245456wfj', 'http:facebook.com/kawsar', 'B.Sc. Engineering, Computer Science & Engineering', 'Bangladesh University Of Engineering & Technology', 'Polashi, BUET, Dhaka', NULL, NULL, NULL, NULL, '2018-01-20 00:08:27', '2018-01-20 00:08:27'),
(38, 2, '', '', 'Ridoy', 'Male', '2018-01-16', 'Afghanistan', 'wdwdd', 'ylhg 1ioweuj1o', 'dolon1090@gmail.com', '0125455', 'kljhkef', '021566', 'Cousin', 'BE245456wfj', 'http:facebook.com/kawsar', 'M.Sc, Dhaka University', 'Bangladesh University Of Engineering & Technology', '21, Shahbag, Dhaka', 'History', '4th year 1st semester', 'dhfue fyeufhrughr', 'efuiufr rggur8g', '2018-01-23 03:11:35', '2018-01-23 03:11:35'),
(59, 9, '', '', 'Kamrul Hasan Rajib', 'Male', NULL, 'Afghanistan', 'Indian', '15, Kabul Street', 'kamrul@yahoo.com', '012587452245', 'rashed', '+91 021548542', NULL, NULL, NULL, 'M.Sc, Dhaka University', 'Bangladesh University Of Engineering & Technology', '21, Shahbag, Dhaka', NULL, NULL, NULL, NULL, '2018-01-24 03:24:52', '2018-01-24 06:23:37'),
(60, 10, 'img_Fernando.JPG', 'uploads/app/2018/01/25/img_Fernando151687248510.JPG', 'Khirul Islam', 'Male', NULL, 'Bangladesh', NULL, '12/13, Bandra Worli, Mumbai.', 'khirul@pridesys.com', '012587452245', 'Shariful Islam', '+91 021548542', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-25 03:28:05', '2018-01-25 03:50:13'),
(61, 11, 'img_Rishab.JPG', 'uploads/app/2018/02/07/img_Rishab151799636711.JPG', 'kawsar Mobin', 'Male', '2018-01-01', 'Bangladesh', 'Bangladeshi', 'Faridabad, Dhaka', 'kawsar@gmail.com', '025145875', 'Ansary Rafiquzzaman', '0112588965', 'Father', 'LK526478', 'http:facebook.com/tawfiw', 'B.sc. in Mathematics', 'Kabi Nazrul College', 'Sadarghat, Dhaka', 'Functions, Geometry etc.', 'Passed', 'B/P: Normal; Pulse Rate: 72 ps. No contagious diseases.', 'Halal foods only. No haram foods.', '2018-01-27 23:01:54', '2018-02-07 03:39:27'),
(62, 12, 'img_Fernando.JPG', 'uploads/app/2018/01/29/img_Fernando151720705312.JPG', 'Md. Rafat', 'Male', NULL, 'Bangladesh', 'wdwdd', 'wdwd', 'rafat@gmail.com', '012587452245', 'pkoekf', '021566', 'Cousin', 'LK526478', 'http:facebook.com/kawsar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-29 00:24:13', '2018-01-29 05:29:43'),
(63, 21, 'img_Fernando.JPG', 'uploads/app/2018/02/03/img_Fernando151765535121.JPG', 'Md. Ataur Rahman', 'Male', '2018-02-07', 'Nepal', 'Nepali', '12/13, Bandra Worli, Mumbai.', 'ataur@gmail.com', '+658587441', 'Shariful Islam', '+91 021548542', 'Uncle', 'KJ254789', 'http:facebook.com/kawsar', 'B.Sc. Engineering, Computer Science & Engineering', 'Bangladesh University Of Engineering & Technology', 'Polashi, BUET, Dhaka', 'Software, Hardware & Networking', '3rd year 2nd semester', 'As U wish...', 'As U wish...', '2018-02-03 04:55:51', '2018-02-03 04:55:51'),
(64, 8, 'img_Rishab.JPG', 'uploads/app/2018/02/07/img_Rishab15179923108.JPG', 'Feroz Ahmed', 'Male', '2018-02-14', 'Afghanistan', 'Afghani', '12/13, Bandra Worli, Mumbai.', 'feroz@pridesys.com', '012587452245', 'pkoekf', '258963', 'Cousin', 'LK526478', 'http:facebook.com/kawsar', 'M.Sc, Dhaka University', 'Bangladesh University Of Engineering & Technology', 'Polashi, BUET, Dhaka', 'Software, Hardware & Networking', '3rd year 2nd semester', 'jhgyhgy', 'gvgfgjh', '2018-02-07 02:31:50', '2018-02-07 02:31:50'),
(65, 14, 'img_Rishab.JPG', 'uploads/app/2018/02/07/img_Rishab151800005914.JPG', 'Kamrul Hasan', 'Male', NULL, 'Bangladesh', 'Bangladeshi', '12/13, Bandra Worli, Mumbai.', 'kamrul@gmail.com', '01522', 'mkmkd', '+8802541785', 'Cousin', 'LK526478', 'http:facebook.com/kawsar.mobin', 'B.Sc. Engineering, Computer Science & Engineering', 'Bangladesh University Of Engineering & Technology', 'Polashi, BUET, Dhaka', 'Software, Hardware & Networking', '3rd year 2nd semester', NULL, NULL, '2018-02-07 04:38:38', '2018-02-07 04:40:59'),
(66, 15, 'img_Rishab.JPG', 'uploads/app/2018/02/07/img_Rishab151800248015.JPG', 'khalid Hossain', 'Male', NULL, 'Argentina', 'Argentine', '63,/ Mohammadpur, Dhaka', 'khalid@gamail.com', '0251478596', '022154545', '+91 021548542', 'Uncle', 'KJ254789', 'http:facebook.com/Khalid.Ahmed', 'M.Sc, Dhaka University', 'Kabi Nazrul College', '21, Shahbag, Dhaka', 'Software, Hardware & Networking', '4th year 1st semester', NULL, NULL, '2018-02-07 05:21:20', '2018-02-07 05:21:20'),
(67, 17, 'img_Rishab.JPG', 'uploads/app/2018/02/08/img_Rishab151808030517.JPG', 'Selim Ahmed', 'Male', '1971-01-05', 'Bangladesh', 'Bangladeshi', 'Vhaluka, Dhaka', 'selim@gmail.com', '01550000012', 'Kamir Ahmed', '01702545698', 'Father', 'selim989869', 'facebook.com/selim.me', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-08 02:58:25', '2018-02-08 02:58:25'),
(68, 18, 'img_Fernando.JPG', 'uploads/app/2018/02/08/img_Fernando151809081018.JPG', 'Md. Zahid Hassan', 'Male', '2018-02-13', 'Bangladesh', 'Bangladeshi', '12/13, Bandra Worli, Mumbai.', 'zahid@gmail.com', '012587452245', 'Md. Morshedul Alam', '0112588965', 'Brother', 'LK526478', 'http:facebook.com/kawsar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-08 05:53:30', '2018-02-08 05:53:30'),
(69, 22, 'about-Us.png', 'uploads/app/2018/02/20/about-Us151910338122.png', 'Ahmed Fahad', 'Male', '2018-02-07', 'Bangladesh', NULL, '12/13, Bandra Worli, Mumbai.', 'fahad@gmail.com', '012587452245', 'mkmkd', '021566', NULL, 'LK526478', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-19 23:09:41', '2018-02-19 23:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Mamdudur Rahman', 'mamdudur.rahman@pridesys.com', '$2y$10$IdoNcpc3LznMxP5q5loUwuEVwn9SHaC8qexEfMd3dg3TLdDE6BlvW', NULL, 'Y0e5BGgcn1NhevZ0DJXb4QWy2y8HyjIEWT9oMkJztHgKtSdnincXZiaKMjMY', '2018-01-08 23:58:32', '2018-01-08 23:58:32'),
(5, 'Md. Mamdudur Rahman', 'dolon1858@gmail.com', '$2y$10$usRRzRsL9JVEhRxrlhbNe.SPfnb1ilxba.ZcZ2qiPx/fPcEY9Q4Lq', NULL, 'c7C1AzfeSswZ3dNXKzbyLsab4R1XYq5BALeNgCuz1V676wa8K2S3AM8ZYdeG', '2018-01-17 22:05:17', '2018-01-17 22:05:17'),
(8, 'Feroz Ahmed', 'feroz@pridesys.com', '$2y$10$FP8wh.qaERSGvuoPzTd1gOjXLWe8oOHjlXsmTQkDEyaukhY2kzaSK', NULL, 'TrARvCQgj8UEJS5M2mgVij9ENDO6zs2LsAAPuiPKWJIbjsMmzhvVPHAPBlHF', '2018-01-22 22:42:39', '2018-01-22 22:42:39'),
(9, 'Md. Mamdudur Rahman', 'dolon1090@gmail.com', '$2y$10$x39UkiF2PPK7A/5g68Fkr.3LY7mdi6t8tWPxHptEOlwihsQJM1b3K', 'User Admin', 'jwbo6d8YE2aaJiCag0ciB9BVRtl291Czg4jiug5u5Jm1r1vezbfUK24dOEcg', '2018-02-06 22:46:52', '2018-02-06 22:46:52'),
(11, 'kawsar Mobin', 'kawsar@gmail.com', '$2y$10$O74V9Aw9WOIDpBPcidExcupXuR3KLJ33yqk6oD2pXuknA5.xA0BeK', NULL, 'UcZCLQBayEPayQiyB1S7fGE8UhDGGxWNcPWDLu6KqQC9mj9nftXuNT3PmrCD', '2018-02-07 02:28:11', '2018-02-07 02:28:11'),
(12, 'Salman Khan', 'salman@gmail.com', '$2y$10$pcGt9VhBdZIWeLSm3a4Bn.1OwYoxn4CDSLgE7w.ASG6rrcIN5JBfG', NULL, 'nyEUqenwyY2o8DA4npTOj0I3OoTxpuYHsMNy7VmFDFYE8lEnYrzuibKG3b2h', '2018-02-07 03:22:17', '2018-02-07 03:22:17'),
(13, 'Khirul Islam', 'khirul@gmail.com', '$2y$10$Dapgb4tGm9330DKWjLULU.pbQUgklbGT88iyOWwExvDApiXj99B9S', NULL, 'S4ibdsKKgmad5BbDsyIpJ8xjrdoKshmSwOrJ9F0oSQX3GqhZc4r0saNAmBVv', '2018-02-07 03:55:08', '2018-02-07 03:55:08'),
(14, 'Kamrul Hasan', 'kamrul@gmail.com', '$2y$10$HY580/onUwd1VY/qzOI8EOae2esb9scqE8gNqs24jxEhX5n5cCGDm', NULL, 'Qhj3Fg2zOytDnMFXMcIFXM3XEtt2i6nhrn7vVkaXIXXoN1SHwAdcCITfioGc', '2018-02-07 04:04:05', '2018-02-07 04:04:05'),
(15, 'khalid Hossain', 'khalid@gamail.com', '$2y$10$R9hrOJX8N5gUVPOXr.nbEObJGP2v7OaeKVNlvMMCLJIXBzt1xfmQO', NULL, 'tWZPelkYfxRKemgOEw9S0OoKpP6rSCnrOD7IXpL8lSbtH2yCQO03eOcihGQJ', '2018-02-07 05:19:01', '2018-02-07 05:19:01'),
(16, 'Md. Asif Rahman', 'asif@yahoo.com', '$2y$10$wa8VFQ9HP0uuuIGFDjiDmu6..ijmzpn1lITG7nLjjPbj0P.vBvsbO', NULL, 'tMtgGUMSDR3lCCdXrOBa1APclC4qe7pI88j1C6cHD7HcyS6Q3VWybPkBIxD5', '2018-02-08 02:29:52', '2018-02-08 02:29:52'),
(17, 'Selim Ahmed', 'selim@gmail.com', '$2y$10$CaCYLKXimW4c9Puv.6hxk.ysPt4SNnPnLM7YiIjGCSbLGCXb7TrpS', NULL, '35PY41MUdDNfQsIfFsFGN5mRMoofyvGZJVeNG82Io7yd7X5E4njhr2fUQbdz', '2018-02-08 02:54:09', '2018-02-08 02:54:09'),
(18, 'Md. Zahid Hassan', 'zahid@gmail.com', '$2y$10$oHkvl6Puts9TDaXe0RSDw.IFmCHdP8rNXTxFmKwHpDBAfawyt3pdG', NULL, NULL, '2018-02-08 05:52:04', '2018-02-08 05:52:04'),
(19, 'Tuhin Mia', 'tuhin@yahoo.com', '$2y$10$GC8VRTHUbw/v3xEQfH6VXe5ccq8Ur/vUcutAPCBSQmqRTacCFRQJm', NULL, 'FqRSqcb64WIZjXsiHiGbCPR9CaJmSzjAitxRSob8V8Muqkq35MbJcPWdQcuo', '2018-02-11 03:12:04', '2018-02-11 03:12:04'),
(20, 'Md. Nur Alam', 'nur@yahoo.com', '$2y$10$AOywley6nZRCeViDdvuvD.AQe8lIQnfNisYLBjCVU6jhhDhrlfnmS', NULL, NULL, '2018-02-11 03:25:14', '2018-02-11 03:25:14'),
(21, 'Md. Yasin', 'yasin@gmail.com', '$2y$10$bYCBrjPatY1aKILy5RQ5nuoUOUuF1bBEw4/yAYlJbQLK2tpqarIEq', NULL, 'KEe7OtzDsfTpLYxzCimFeba4bZzVmSjy9E7J31lBWllrUrLk6LZCC7G5W3yk', '2018-02-19 23:05:10', '2018-02-19 23:05:10'),
(22, 'Ahmed Fahad', 'fahad@gmail.com', '$2y$10$HAES8MTO6NsNGxb01ri/9OU4miTbRLMfGSMt3BWHCaWo2Wx9j/L8.', NULL, 'AeugNOikczv965wrZqf5LWx7qwsntFc9vu8tggv93cr8BI4EK3Zhd99jpHjU', '2018-02-19 23:08:24', '2018-02-19 23:08:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_fileupload`
--
ALTER TABLE `admin_fileupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_upload`
--
ALTER TABLE `admin_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `club_name` (`club_name`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comm_n_club`
--
ALTER TABLE `comm_n_club`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_registration`
--
ALTER TABLE `event_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_upload`
--
ALTER TABLE `notice_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `registration_fees`
--
ALTER TABLE `registration_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_fileupload`
--
ALTER TABLE `admin_fileupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_upload`
--
ALTER TABLE `admin_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `comm_n_club`
--
ALTER TABLE `comm_n_club`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event_registration`
--
ALTER TABLE `event_registration`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notice_upload`
--
ALTER TABLE `notice_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `registration_fees`
--
ALTER TABLE `registration_fees`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
