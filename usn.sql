-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 04:52 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usn`
--

-- --------------------------------------------------------

--
-- Table structure for table `demo_database_admin`
--

CREATE TABLE `demo_database_admin` (
  `demo_id` int(11) NOT NULL,
  `demo_var_id` varchar(255) NOT NULL,
  `demo_title` varchar(255) NOT NULL,
  `demo_email` varchar(255) NOT NULL,
  `demo_mobile` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo_database_admin`
--

INSERT INTO `demo_database_admin` (`demo_id`, `demo_var_id`, `demo_title`, `demo_email`, `demo_mobile`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '151382315', 'Mohammad Nazib -ul- Islam', 'nazibsazib@yahoo.com', '01677382277 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '151382316', 'Sourab, Alid Hasan', '', '0173-140-7943', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '151382317', 'Sultana, Sarmin', '', '0175-149-7872 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '151382318', 'Sizan, Md. Oliullah', '', '0184-639-2965 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '151382319', 'Islam, Md. Didarul', '', '0191-325-3622 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '151382320', 'raton, Rayhanul Hasan', '', '0173-833-4358 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '151382321', 'Al-Amin, Md.', '', '0177-678-8816 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '151382322', 'Mallik, Nripen', '', '0184-818-9288', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '151382323', 'Anik, S0limollah', '', '0167-004-0893 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '151382324', 'Islam, Din', '', '0194-429-5048', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '151382325', 'Hossain, Shamim', '', '0191-875-2925 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `demo_database_student`
--

CREATE TABLE `demo_database_student` (
  `demo_id` int(11) NOT NULL,
  `demo_var_id` varchar(255) NOT NULL,
  `demo_title` varchar(255) NOT NULL,
  `demo_email` varchar(255) NOT NULL,
  `demo_mobile` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo_database_student`
--

INSERT INTO `demo_database_student` (`demo_id`, `demo_var_id`, `demo_title`, `demo_email`, `demo_mobile`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '151382315', 'Mohammad Nazib -ul- Islam', 'nazibsazib@yahoo.com', '01677382277 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '151382316', 'Sourab, Alid Hasan', '', '0173-140-7943', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '151382317', 'Sultana, Sarmin', '', '0175-149-7872 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '151382318', 'Sizan, Md. Oliullah', '', '0184-639-2965 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '151382319', 'Islam, Md. Didarul', '', '0191-325-3622 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '151382320', 'raton, Rayhanul Hasan', '', '0173-833-4358 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '151382321', 'Al-Amin, Md.', '', '0177-678-8816 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '151382322', 'Mallik, Nripen', '', '0184-818-9288', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '151382323', 'Anik, S0limollah', '', '0167-004-0893 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '151382324', 'Islam, Din', '', '0194-429-5048', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '151382325', 'Hossain, Shamim', '', '0191-875-2925 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `demo_database_teacher`
--

CREATE TABLE `demo_database_teacher` (
  `demo_id` int(11) NOT NULL,
  `demo_var_id` varchar(255) NOT NULL,
  `demo_title` varchar(255) NOT NULL,
  `demo_email` varchar(255) NOT NULL,
  `demo_mobile` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo_database_teacher`
--

INSERT INTO `demo_database_teacher` (`demo_id`, `demo_var_id`, `demo_title`, `demo_email`, `demo_mobile`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '151382315', 'Mohammad Nazib -ul- Islam', 'nazibsazib@yahoo.com', '01677382277 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '151382316', 'Sourab, Alid Hasan', '', '0173-140-7943', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '151382317', 'Sultana, Sarmin', '', '0175-149-7872 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '151382318', 'Sizan, Md. Oliullah', '', '0184-639-2965 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '151382319', 'Islam, Md. Didarul', '', '0191-325-3622 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '151382320', 'raton, Rayhanul Hasan', '', '0173-833-4358 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '151382321', 'Al-Amin, Md.', '', '0177-678-8816 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '151382322', 'Mallik, Nripen', '', '0184-818-9288', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '151382323', 'Anik, S0limollah', '', '0167-004-0893 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '151382324', 'Islam, Din', '', '0194-429-5048', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '151382325', 'Hossain, Shamim', '', '0191-875-2925 SMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usn_chat_details`
--

CREATE TABLE `usn_chat_details` (
  `chat_id` int(11) NOT NULL,
  `chat_from` varchar(255) NOT NULL,
  `chat_to` varchar(255) NOT NULL,
  `chat_data_type` varchar(255) NOT NULL,
  `chat_data_details` text NOT NULL,
  `chat_utc_time` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usn_chat_details`
--

INSERT INTO `usn_chat_details` (`chat_id`, `chat_from`, `chat_to`, `chat_data_type`, `chat_data_details`, `chat_utc_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sourab', 's.sarmin', 'text', 'hey sarmin', '2018-06-21T22:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 's.sarmin', 'sourab', 'text', 'hey sourab', '2018-06-22T10:20:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'sourab', 's.sarmin', 'text', 'is there anything you want for tomorrow.', '2018-06-22T10:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 's.sarmin', 'sourab', 'text', 'nothing. I am fine.', '2018-06-22T11:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 's.sarmin', 'sourab', 'text', 'why did you ask?', '2018-06-22T12:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'sourab', 's.sarmin', 'text', 'nothing special.', '2018-06-22T13:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'nazibsazib', 's.sarmin', 'text', 'hey...what are you doing?', '2018-06-22T14:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'sourab', 's.sarmin', 'text', 'hey sarmin', '2018-06-22T15:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 's.sarmin', 'sourab', 'text', 'hey sourab', '2018-06-22T16:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'sourab', 's.sarmin', 'text', 'is there anything you <br/>want for tomorrow.', '2018-06-22T17:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 's.sarmin', 'sourab', 'text', 'nothing. I am fine.', '2018-06-22T18:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 's.sarmin', 'sourab', 'text', 'why did you ask?', '2018-06-22T19:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'sourab', 's.sarmin', 'text', 'nothing special.', '2018-06-22T20:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 's.sarmin', 'sourab', 'text', 'hello bhaia...first haat e dea pathano...:p', '2018-06-22T21:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 's.sarmin', 'sourab', 'text', 'second', '2018-06-22T22:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 's.sarmin', 'sourab', 'text', 'ei bar asholei date jabe', '2018-06-23T22:25:36.070Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 's.sarmin', 'sourab', 'text', 'text plus image pathacchi...', '2018-06-23T22:33:22.936Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 's.sarmin', 'sourab', 'image', 'o021.jpg', '2018-06-23T22:33:22.936Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 's.sarmin', 'sourab', 'text', 'lil change in source', '2018-06-23T22:53:37.104Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 's.sarmin', 'sourab', 'image', 'Screenshot-2017-10-22 How to Check Your Motherboard Model Number on Your Windows PC.png', '2018-06-23T22:53:37.104Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 's.sarmin', 'sourab', 'text', 'check', '2018-06-24T09:12:33.398Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 's.sarmin', 'sourab', 'text', 'see?', '2018-06-24T09:12:33.398Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 's.sarmin', 'sourab', 'image', '1519686000_5f53bda38c899d819a8350dd061d8fb6c3bb015d.jpg', '2018-06-24T09:12:33.398Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 's.sarmin', 'sourab', 'text', 'oi oi oi\r\nsee see see', '2018-06-24T09:17:46.474Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 's.sarmin', 'sourab', 'text', 'browser merging check...', '2018-06-24T12:58:01.844Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 's.sarmin', 'sourab', 'image', 'Screenshot_2017-11-26-19-44-15-754_com.google.android.youtube.png', '2018-06-24T12:58:01.844Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 's.sarmin', 'sourab', 'image', 'o021.jpg', '2018-06-24T12:58:01.844Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 's.sarmin', 'sourab', 'image', 'o021.jpg', '2018-06-24T13:00:51.242Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 's.sarmin', 'sourab', 'text', 'nazib check the chat...', '2018-06-24T13:28:40.106Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 's.sarmin', 'sourab', 'image', 'Screenshot_2017-11-26-19-44-15-754_com.google.android.youtube.png', '2018-06-24T13:30:43.322Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 's.sarmin', 'sourab', 'image', 'Screenshot_2017-11-26-19-44-15-754_com.google.android.youtube.png', '2018-06-24T13:31:55.668Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 's.sarmin', 'sourab', 'text', 'ssss', '2018-06-24T13:31:55.668Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 's.sarmin', 'sourab', 'text', '???', '2018-06-24T13:36:13.682Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 's.sarmin', 'sourab', 'text', 'okay', '2018-06-24T20:18:16.696Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 's.sarmin', 'nazibsazib', 'text', 'did you see that?', '2018-06-24T20:18:16.696Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 's.sarmin', 'nazibsazib', 'text', 'any update?', '2018-06-24T20:23:04.220Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 's.sarmin', 'nazibsazib', 'text', 'say', '2018-06-24T20:23:04.220Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 's.sarmin', 'nazibsazib', 'text', 'nope', '2018-06-24T20:35:06.782Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 's.sarmin', 'kabir', 'text', 'daijobu?', '2018-06-24T20:39:19.284Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 's.sarmin', 'kabir', 'text', 'uhu', '2018-06-24T20:52:59.434Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 's.sarmin', 'kabir', 'text', 'no', '2018-06-24T21:05:34.122Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 's.sarmin', 'sourab', 'text', 'tired', '2018-06-24T21:19:21.132Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 's.sarmin', 'kabir', 'text', 'any change?', '2018-06-24T21:43:00.116Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 's.sarmin', 'kabir', 'text', 'messed up code.', '2018-06-24T21:46:07.560Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 's.sarmin', 'kabir', 'text', 'vallage na', '2018-06-24T21:48:03.862Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 's.sarmin', 'kabir', 'text', '-_-', '2018-06-24T21:49:42.050Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 's.sarmin', 'nazibsazib', 'text', 'see that?', '2018-06-24T21:49:42.050Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 's.sarmin', 'nazibsazib', 'text', '...........', '2018-06-24T22:06:06.444Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 's.sarmin', 'nazibsazib', 'image', 'IMG_20171108_170103.jpg', '2018-06-24T22:06:06.444Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 's.sarmin', 'nazibsazib', 'text', '-_-', '2018-06-24T22:21:16.198Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 's.sarmin', 'sourab', 'text', 'is the time right?', '2018-06-24T22:36:42.198Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 's.sarmin', 'sourab', 'text', 'yeah correct.', '2018-06-24T22:36:42.198Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 's.sarmin', 'sourab', 'image', 'world_cup_2019.png', '2018-06-24T22:36:42.198Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 's.sarmin', 'nazibsazib', 'text', 'shoot!', '2018-06-24T22:50:54.620Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 's.sarmin', 'nazibsazib', 'image', '2560x1440-the_handgun_trilogy_part_1___the_original_by_paul_shanghai-d6qex18.jpg', '2018-06-24T22:50:54.620Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 's.sarmin', 'nazibsazib', 'text', 'shoot again...', '2018-06-24T22:56:16.338Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 's.sarmin', 'nazibsazib', 'image', '2560x1440-the_handgun_trilogy_part_1___the_original_by_paul_shanghai-d6qex18.jpg', '2018-06-24T22:56:16.338Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'kabir', 's.sarmin', 'text', 'what?', '2018-06-24T22:58:13.451Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 's.sarmin', 'kabir', 'text', 'you there?', '2018-06-24T22:56:16.338Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'kabir', 's.sarmin', 'text', '..', '2018-06-24T22:58:13.451Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 's.sarmin', 'kabir', 'text', '..', '2018-06-24T22:56:16.338Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 's.sarmin', 'kabir', 'text', 'server delay...', '2018-06-24T22:56:16.338Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 's.sarmin', 'kabir', 'text', 'look at me', '2018-06-24T23:20:14.442Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 's.sarmin', 'kabir', 'image', '1529882458_c9fdac64fcf171509615f6f8d8b91616cff25ea9.jpg', '2018-06-24T23:20:14.442Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 's.sarmin', 'kabir', 'text', 'these images are big!', '2018-06-25T22:34:52.034Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 's.sarmin', 'kabir', 'text', 'there is a problem', '2018-06-25T22:36:11.916Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 's.sarmin', 'nazibsazib', 'text', 'fishy', '2018-06-25T22:38:41.794Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 's.sarmin', 'nazibsazib', 'text', 'yep', '2018-06-25T22:40:28.478Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 's.sarmin', 'kabir', 'text', 'now see', '2018-06-25T22:43:50.080Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 's.sarmin', 'nazibsazib', 'text', 'still?', '2018-06-25T22:44:59.876Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 's.sarmin', 'kabir', 'text', 'rolled back', '2018-06-25T22:46:57.676Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 's.sarmin', 'nazibsazib', 'text', 'now?', '2018-06-25T22:51:22.546Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 's.sarmin', 'kabir', 'text', 'code modified', '2018-06-25T22:55:17.418Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usn_password_recovery`
--

CREATE TABLE `usn_password_recovery` (
  `id` int(11) NOT NULL,
  `var_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `recovery_code` varchar(255) NOT NULL,
  `recovery_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usn_reg_verify`
--

CREATE TABLE `usn_reg_verify` (
  `id` int(11) NOT NULL,
  `var_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `verified` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usn_reg_verify`
--

INSERT INTO `usn_reg_verify` (`id`, `var_id`, `username`, `email`, `verification_code`, `verified`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '151382316', 'sourab', 'sourab@gmail.com', 'sourab740750', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '151382317', 's.sarmin', 's.sarmin@gmail.com', 's.sarmin901974', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '151382315', 'nazibsazib', 'nazibsazib@gmail.com', 'nazibsazib622619', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '151382318', 'sizan', 'sizan@gmail.com', 'sizan616659', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usn_users_comment`
--

CREATE TABLE `usn_users_comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `comment_username` varchar(255) NOT NULL,
  `comment_details` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usn_users_connection`
--

CREATE TABLE `usn_users_connection` (
  `connection_id` int(11) NOT NULL,
  `send_username` varchar(255) NOT NULL,
  `reci_username` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usn_users_connection`
--

INSERT INTO `usn_users_connection` (`connection_id`, `send_username`, `reci_username`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(33, 'kabir', 's.sarmin', 'true', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'sourab', 's.sarmin', 'true', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 's.sarmin', 'nazibsazib', 'true', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'ata', 'nazibsazib', 'true', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 's.sarmin', 'ata', 'true', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'no', 's.sarmin', 'true', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'yes', 's.sarmin', 'true', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'nazibsazib', 'sizan', 'false', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'ata', 'sourab', 'true', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usn_users_institute`
--

CREATE TABLE `usn_users_institute` (
  `usn_id` int(11) NOT NULL,
  `var_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `certification` varchar(255) NOT NULL,
  `inst_name` text NOT NULL,
  `department` varchar(255) NOT NULL,
  `pass_year` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usn_users_login`
--

CREATE TABLE `usn_users_login` (
  `log_id` int(11) NOT NULL,
  `var_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `verified` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usn_users_login`
--

INSERT INTO `usn_users_login` (`log_id`, `var_id`, `username`, `email`, `password`, `mobile`, `is_active`, `verified`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '151382316', 'sourab', 'sourab@gmail.com', '$2y$10$4YwDFGi1YI4owIWxgd0uzOTbqCh15ulp7ioR.K6GP42S0DM6yQbm2', '01731407943', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '151382317', 's.sarmin', 's.sarmin@gmail.com', '$2y$10$9k8OpVxZk2bw2Ov767oebOUF.rFFkYQWGB1YCN15ZFieAI3ukARki', '01751497872', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '111222', 'ata', 'abab@gmail.com', '$2y$10$9k8OpVxZk2bw2Ov767oebOUF.rFFkYQWGB1YCN15ZFieAI3ukARki', '01843906686', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '111333', 'kabir', 'aislam69@yahoo.com', '$2y$10$9k8OpVxZk2bw2Ov767oebOUF.rFFkYQWGB1YCN15ZFieAI3ukARki', '0111111111111', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '151382315', 'nazibsazib', 'nazibsazib@gmail.com', '$2y$10$1wLQSUtsiWS62l6VLk/ZW.5QVfLlWvPQhPKO7YRrQGdITFEok.nhK', '01677382277', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '151382318', 'sizan', 'sizan@gmail.com', '$2y$10$22AD5tdJSTdBNwyYyJ80PO1rZADzPdDakFgd39Kecbt9JD.dyrFDK', '01846392965', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '111', 'no', '', '$2y$10$9k8OpVxZk2bw2Ov767oebOUF.rFFkYQWGB1YCN15ZFieAI3ukARki', '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '112', 'yes', '', '$2y$10$9k8OpVxZk2bw2Ov767oebOUF.rFFkYQWGB1YCN15ZFieAI3ukARki', '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usn_users_post`
--

CREATE TABLE `usn_users_post` (
  `post_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_details` text NOT NULL,
  `post_photo` text NOT NULL,
  `post_file` text NOT NULL,
  `access_type` varchar(255) NOT NULL,
  `post_utc_time` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usn_users_post`
--

INSERT INTO `usn_users_post` (`post_id`, `username`, `post_details`, `post_photo`, `post_file`, `access_type`, `post_utc_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1519599600_d1c1c41f693568c596f55623268ce319aa23ff51', 'ata', 'First post ever!!!(JK!!!)', '', '', '', '2018-06-18T19:47:41.538Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1519678812_d1c1c41f693568c596f55623268ce319aa23ff51', 's.sarmin', 'Sarmin is checking different types of post...', '1519678812_d1c1c41f693568c596f55623268ce319aa23ff51.jpg', '', '', '2018-06-20T19:47:41.538Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1519678838_d1c1c41f693568c596f55623268ce319aa23ff51', 's.sarmin', 'Checking file segment...', '', '1519678838_d1c1c41f693568c596f55623268ce319aa23ff51.pdf', '', '2018-06-20T19:47:41.538Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1519679305_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', 'sarmin''s first post', '', '', '', '2018-06-20T19:47:41.538Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1519679627_7352a6c43f01fc92f87ade301ca73915fcf1ed95', 'sourab', 'sourab''s first post', '', '', '', '2018-06-20T19:47:41.538Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1519679696_7352a6c43f01fc92f87ade301ca73915fcf1ed95', 'sourab', 'ferrari...<3', '1519679696_7352a6c43f01fc92f87ade301ca73915fcf1ed95.jpg', '', '', '2018-06-18T19:47:41.538Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1519803500_7352a6c43f01fc92f87ade301ca73915fcf1ed95', 'sourab', 'hello', '', '', '', '2018-06-20T19:47:41.538Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1519808214_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', 'hello...', '', '', '', '2018-06-20T19:47:41.538Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1519808235_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', '', '', '1519808235_c9fdac64fcf171509615f6f8d8b91616cff25ea9.xlsx', '', '2018-06-20T19:47:41.538Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1527199529_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', 'Food issues...', '', '1527199529_c9fdac64fcf171509615f6f8d8b91616cff25ea9.pdf', '', '2018-06-20T19:47:41.538Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529524075_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', 'dedicated to see utc', '', '', '', '2018-06-18T19:47:41.538Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529574984_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', 'something does not seem right', '', '', '', '2018-06-21T09:56:03.372Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529613050_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', 'what is going on?', '', '', '', '2018-06-21T20:30:43.232Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529614767_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', 'adding garbage', '', '', '', '2018-06-21T20:56:56.320Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529614808_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', 'yet all posts are here', '1529614808_c9fdac64fcf171509615f6f8d8b91616cff25ea9.jpg', '', '', '2018-06-21T20:59:29.072Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529614843_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', 'no effect has shown by feed.', '', '', '', '2018-06-21T21:00:09.678Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529614997_fe3c03e01bab2b280e93f1ddd42256ab77670518', 'ata', 'so...they are not facing any problems...:)', '', '', '', '2018-06-21T21:02:11.106Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529845485_fe3c03e01bab2b280e93f1ddd42256ab77670518', 'ata', 'modified date check...', '', '', '', '2018-06-24T13:04:29.996Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529845894_fe3c03e01bab2b280e93f1ddd42256ab77670518', 'ata', 'another version of modified date check...', '', '', '', '2018-06-24T13:11:26.134Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529931245_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', '...', '', '', '', '2018-06-25T12:53:57.738Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529931317_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', 'prob', '', '', '', '2018-06-25T12:55:09.982Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529931339_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', 'seems okay', '', '', '', '2018-06-25T12:55:19.680Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1529964723_c9fdac64fcf171509615f6f8d8b91616cff25ea9', 's.sarmin', 'are we getting date?', '', '', '', '2018-06-25T22:10:08.358Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1530017107_d1c1c41f693568c596f55623268ce319aa23ff51', 'nazibsazib', 'Hi!...This is Nazib', '', '', '', '2018-06-26T12:44:26.016Z', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usn_users_reg`
--

CREATE TABLE `usn_users_reg` (
  `usn_id` int(11) NOT NULL,
  `var_id` varchar(255) NOT NULL,
  `user_pic` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `skills` text NOT NULL,
  `blood_type` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usn_users_reg`
--

INSERT INTO `usn_users_reg` (`usn_id`, `var_id`, `user_pic`, `username`, `first_name`, `last_name`, `father_name`, `mother_name`, `email`, `mobile`, `sex`, `marital_status`, `birth_date`, `user_status`, `department`, `skills`, `blood_type`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, '151382316', '1519599600_b06d34647a5201b9e256af2175fd0a0ea0f4964a.jpg', 'sourab', 'Alid Hasan', 'Sourab', 'Father Hasan', 'Mother Hasan', 'sourab@gmail.com', '01731407943', 'Male', 'Unmarried', '1991-01-01', 'Student', 'Bachelor of Computer Science and Engineering', 'Useless', 'A(+Ve)', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '151382317', '1519599600_b015e9a6bbba428f24f6bb6f142fb2f6e672d6d7.jpg', 's.sarmin', 'Sarmin', 'Sultana', 'Father Shaheb', 'Mother Shaheb', 's.sarmin@gmail.com', '01751497872', 'Female', 'Unmarried', '1991-01-01', 'Student', 'Bachelor of Computer Science and Engineering', 'Contestant, Volunteer', 'B(+Ve)', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '111222', 'abab.jpg', 'ata', 'Md Ataullah', 'Bhuiyan', '', '', 'abab@gmail.com', '01843906686', 'Male', 'Married', '0000-00-00', 'Teacher', '', 'Web Based', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '111333', 'bcbc.jpg', 'kabir', 'Md Kabirul', 'Islam', '', '', 'aislam69@yahoo.com', '0111111111111', 'Male', 'Married', '0000-00-00', 'Administration', '', 'Librarian', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '151382315', '1519932945_d1c1c41f693568c596f55623268ce319aa23ff51.jpg', 'nazibsazib', 'Mohammad Nazib', '-ul- Islam', 'Nazrul Islam', 'Razia Khanom', 'nazibsazib@gmail.com', '01677382277', 'Male', 'Unmarried', '1988-06-30', 'Student', 'Bachelor of Computer Science and Engineering', 'Web Dev.', 'O(+Ve)', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '111', 'placeholder.jpg', 'no', 'no', 'name', '', '', '', '', '', '', '0000-00-00', 'Student', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '112', 'placeholder.jpg', 'yes', 'yes', 'name', '', '', '', '', '', '', '0000-00-00', 'Teacher', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '151382318', '1527807332_1bf391b59e3dea88f2dd0b64f462df5c2b0a8daf.jpg', 'sizan', 'Md. Oliullah', 'Sizan', 'Md. Aliullah', 'Mrs Aliullah', 'sizan@gmail.com', '01846392965', 'Male', 'Unmarried', '1993-04-15', 'Student', 'Bachelor of Computer Science and Engineering', 'Learner', 'A(+Ve)', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demo_database_admin`
--
ALTER TABLE `demo_database_admin`
  ADD PRIMARY KEY (`demo_id`),
  ADD KEY `var_id` (`demo_var_id`);

--
-- Indexes for table `demo_database_student`
--
ALTER TABLE `demo_database_student`
  ADD PRIMARY KEY (`demo_id`),
  ADD KEY `var_id` (`demo_var_id`);

--
-- Indexes for table `demo_database_teacher`
--
ALTER TABLE `demo_database_teacher`
  ADD PRIMARY KEY (`demo_id`),
  ADD KEY `var_id` (`demo_var_id`);

--
-- Indexes for table `usn_chat_details`
--
ALTER TABLE `usn_chat_details`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `chat_from` (`chat_from`),
  ADD KEY `chat_to` (`chat_to`);

--
-- Indexes for table `usn_password_recovery`
--
ALTER TABLE `usn_password_recovery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `var_id` (`var_id`),
  ADD KEY `var_id_2` (`var_id`),
  ADD KEY `email` (`email`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `usn_reg_verify`
--
ALTER TABLE `usn_reg_verify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `var_id` (`var_id`),
  ADD KEY `var_id_2` (`var_id`),
  ADD KEY `email` (`email`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `usn_users_comment`
--
ALTER TABLE `usn_users_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `comment_username` (`comment_username`),
  ADD KEY `post_id_2` (`post_id`);

--
-- Indexes for table `usn_users_connection`
--
ALTER TABLE `usn_users_connection`
  ADD PRIMARY KEY (`connection_id`),
  ADD KEY `send_username` (`send_username`),
  ADD KEY `reci_username` (`reci_username`);

--
-- Indexes for table `usn_users_institute`
--
ALTER TABLE `usn_users_institute`
  ADD PRIMARY KEY (`usn_id`),
  ADD KEY `var_id` (`var_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `usn_users_login`
--
ALTER TABLE `usn_users_login`
  ADD PRIMARY KEY (`log_id`),
  ADD UNIQUE KEY `var_id` (`var_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `usn_users_post`
--
ALTER TABLE `usn_users_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `usn_users_reg`
--
ALTER TABLE `usn_users_reg`
  ADD PRIMARY KEY (`usn_id`),
  ADD UNIQUE KEY `var_id` (`var_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demo_database_admin`
--
ALTER TABLE `demo_database_admin`
  MODIFY `demo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `demo_database_student`
--
ALTER TABLE `demo_database_student`
  MODIFY `demo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `demo_database_teacher`
--
ALTER TABLE `demo_database_teacher`
  MODIFY `demo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `usn_chat_details`
--
ALTER TABLE `usn_chat_details`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `usn_password_recovery`
--
ALTER TABLE `usn_password_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usn_reg_verify`
--
ALTER TABLE `usn_reg_verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `usn_users_comment`
--
ALTER TABLE `usn_users_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usn_users_connection`
--
ALTER TABLE `usn_users_connection`
  MODIFY `connection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `usn_users_institute`
--
ALTER TABLE `usn_users_institute`
  MODIFY `usn_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usn_users_login`
--
ALTER TABLE `usn_users_login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `usn_users_reg`
--
ALTER TABLE `usn_users_reg`
  MODIFY `usn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `usn_chat_details`
--
ALTER TABLE `usn_chat_details`
  ADD CONSTRAINT `usn_chat_details_ibfk_1` FOREIGN KEY (`chat_from`) REFERENCES `usn_users_reg` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usn_chat_details_ibfk_2` FOREIGN KEY (`chat_to`) REFERENCES `usn_users_reg` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usn_reg_verify`
--
ALTER TABLE `usn_reg_verify`
  ADD CONSTRAINT `usn_reg_verify_ibfk_1` FOREIGN KEY (`var_id`) REFERENCES `usn_users_reg` (`var_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usn_reg_verify_ibfk_2` FOREIGN KEY (`email`) REFERENCES `usn_users_reg` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usn_reg_verify_ibfk_3` FOREIGN KEY (`username`) REFERENCES `usn_users_reg` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usn_users_comment`
--
ALTER TABLE `usn_users_comment`
  ADD CONSTRAINT `usn_users_comment_ibfk_1` FOREIGN KEY (`comment_username`) REFERENCES `usn_users_reg` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usn_users_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `usn_users_post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usn_users_connection`
--
ALTER TABLE `usn_users_connection`
  ADD CONSTRAINT `usn_users_connection_ibfk_1` FOREIGN KEY (`send_username`) REFERENCES `usn_users_reg` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usn_users_connection_ibfk_2` FOREIGN KEY (`reci_username`) REFERENCES `usn_users_reg` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usn_users_institute`
--
ALTER TABLE `usn_users_institute`
  ADD CONSTRAINT `usn_users_institute_ibfk_1` FOREIGN KEY (`var_id`) REFERENCES `usn_users_reg` (`var_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usn_users_institute_ibfk_2` FOREIGN KEY (`username`) REFERENCES `usn_users_reg` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usn_users_login`
--
ALTER TABLE `usn_users_login`
  ADD CONSTRAINT `usn_users_login_ibfk_1` FOREIGN KEY (`var_id`) REFERENCES `usn_users_reg` (`var_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usn_users_login_ibfk_2` FOREIGN KEY (`username`) REFERENCES `usn_users_reg` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usn_users_login_ibfk_3` FOREIGN KEY (`email`) REFERENCES `usn_users_reg` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usn_users_post`
--
ALTER TABLE `usn_users_post`
  ADD CONSTRAINT `usn_users_post_ibfk_1` FOREIGN KEY (`username`) REFERENCES `usn_users_reg` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
