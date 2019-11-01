-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 06:29 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `msg_content` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `reciever_id`, `msg_content`, `status`, `time`) VALUES
(49, 2, 3, 'hello', '0', '2019-10-29 19:38:13'),
(50, 3, 2, 'hi', '0', '2019-10-29 19:39:24'),
(51, 3, 2, 'hell', '0', '2019-10-29 20:01:09'),
(52, 2, 3, 'hi\n', '0', '2019-10-29 20:07:43'),
(53, 2, 3, 'hello Alex\n', '0', '2019-10-29 20:08:21'),
(54, 3, 2, 'hello ashik', '0', '2019-10-29 20:08:34'),
(55, 3, 2, 'hiashik', '0', '2019-10-29 20:11:02'),
(56, 2, 3, 'hell Alex', '0', '2019-10-29 20:11:32'),
(57, 2, 3, 'hello Alex', '0', '2019-10-29 20:11:42'),
(58, 2, 3, 'how are u?\n', '0', '2019-10-29 21:17:24'),
(59, 3, 2, 'fine and u?\n', '0', '2019-10-29 21:17:36'),
(60, 2, 3, 'i am fine', '0', '2019-10-29 21:21:11'),
(61, 2, 3, 'what are you doing now?', '0', '2019-10-29 21:29:23'),
(62, 3, 2, 'nothing', '0', '2019-10-29 21:29:38'),
(63, 2, 3, 'jjjj', '0', '2019-10-29 21:30:03'),
(64, 2, 3, 'hmmm', '0', '2019-10-29 21:31:39'),
(65, 3, 2, 'ooo', '0', '2019-10-29 21:31:48'),
(66, 3, 2, 'jdjdjjd', '0', '2019-10-29 21:31:54'),
(67, 3, 2, 'jdjjd', '0', '2019-10-29 21:32:05'),
(68, 2, 3, 'nice working', '0', '2019-10-29 21:32:16'),
(69, 2, 3, 'thanks', '0', '2019-10-29 21:32:32'),
(70, 3, 2, 'mention not', '0', '2019-10-29 21:32:42'),
(71, 2, 3, 'hurrah', '0', '2019-10-29 21:33:39'),
(72, 3, 2, 'what?', '0', '2019-10-29 21:33:46'),
(73, 2, 3, 'nothing', '0', '2019-10-29 21:33:55'),
(74, 3, 2, 'what nothing', '0', '2019-10-29 21:34:04'),
(75, 2, 3, 'bye', '0', '2019-10-29 21:34:17'),
(76, 4, 3, 'hello alex', '0', '2019-10-29 21:36:02'),
(77, 2, 4, 'hello sohel', '0', '2019-10-29 21:36:38'),
(78, 4, 2, 'hello ', '0', '2019-10-29 21:36:47'),
(79, 3, 4, 'hi', '0', '2019-10-29 21:37:11'),
(80, 3, 2, 'okk', '0', '2019-10-29 21:50:44'),
(81, 2, 3, 'dear alex', '0', '2019-10-29 22:16:52'),
(82, 3, 2, 'yes', '0', '2019-10-29 22:18:11'),
(83, 3, 2, 'say something', '0', '2019-10-29 22:19:09'),
(84, 4, 2, 'hi ashikur Rahman', '0', '2019-10-29 22:23:30'),
(85, 2, 4, 'heloo', '0', '2019-10-29 22:24:06'),
(86, 2, 4, 'hll\n', '0', '2019-10-29 22:24:21'),
(87, 2, 3, '456', '0', '2019-10-29 22:25:45'),
(88, 3, 2, '?', '0', '2019-10-29 22:26:01'),
(89, 3, 2, '?', '0', '2019-10-29 22:26:12'),
(90, 3, 2, '?', '0', '2019-10-29 22:26:25'),
(91, 2, 3, 'number', '0', '2019-10-29 22:26:42'),
(92, 2, 3, 'its a number', '0', '2019-10-29 22:27:37'),
(93, 3, 2, 'oooo', '0', '2019-10-29 22:27:48'),
(94, 2, 3, 'thanks', '0', '2019-10-29 22:28:05'),
(95, 2, 3, 'hhh', '0', '2019-10-29 22:29:47'),
(96, 3, 2, 'oooo', '0', '2019-10-29 23:53:19'),
(97, 3, 2, 'good Evening', '0', '2019-10-29 23:57:56'),
(98, 3, 2, 'Hey Can You Help me?', '0', '2019-10-29 23:58:46'),
(99, 2, 3, 'How Can I help You?', '0', '2019-10-29 23:59:10'),
(100, 2, 3, 'tell me about your problem?', '0', '2019-10-29 23:59:24'),
(101, 5, 3, 'Good Evening Alex', '0', '2019-10-31 00:03:23'),
(102, 3, 5, 'ooh thanks', '0', '2019-10-31 00:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `forgotten_password` datetime NOT NULL,
  `log_in` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `country`, `gender`, `forgotten_password`, `log_in`) VALUES
(2, 'mdashikurrahman', 'mdashikurrahman598619@gmail.com', '12345678', 'Bangladesh', 'Male', '2019-10-31 11:20:18', 'Offline'),
(3, 'Alex', 'alex@gmail.com', '12345678', 'Afganistan', 'Male', '0000-00-00 00:00:00', 'Offline'),
(4, 'Sohel', 'sohel@gmail.com', '12345678', 'Bangladesh', 'Male', '0000-00-00 00:00:00', 'Offline'),
(5, 'Md Ashikur Rahman', 'mdashikurrahman18@gmail.com', '12345678', 'Bangladesh', 'Male', '2019-10-31 11:21:54', 'Offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
