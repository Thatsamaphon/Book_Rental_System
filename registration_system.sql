-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 04:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(100) NOT NULL,
  `author_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`) VALUES
(1, 'Ken Mogi'),
(2, 'Jim Collins'),
(3, 'Virginia Woolf'),
(4, 'Albert Einstein'),
(5, 'H P Lovecraft , François Baranger'),
(6, 'G. Willow Wilson'),
(7, 'G. Willow Wilson'),
(8, 'Paul Theroux'),
(9, 'อาจารย์ฆฤณ ชินประสาทศักดิ์'),
(10, 'นทธี ศศิวิมล'),
(11, 'ดร. รื่นฤทัย สัจจพันธุ์\r\n'),
(12, 'พระบาทสมเด็จพระพุทธเลิศหล้านภาลัย');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(100) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_img` varchar(255) NOT NULL,
  `book_lan` varchar(2) NOT NULL,
  `author_id` int(100) NOT NULL,
  `type_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_img`, `book_lan`, `author_id`, `type_id`) VALUES
(1, 'The little book', 'assets/books/1.jpg', 'EN', 1, 1),
(2, 'Good to Great:', 'assets/books/2.jpg', 'EN', 1, 1),
(3, 'The World As I See It', 'assets/books/3.jpg', 'EN', 3, 4),
(4, 'Mrs. Dalloway', 'assets/books/4.jpg', 'EN', 4, 6),
(5, 'The Call of Cthulhu', 'assets/books/5.jpg', 'EN', 1, 1),
(6, 'Ms. Marvel Volume 1: No Normal', 'assets/books/6.jpg', 'EN', 1, 1),
(7, 'From Hell', 'assets/books/7.jpg', 'EN', 7, 5),
(8, 'Dark Star Safari: Overland from Cairo to Cape Town', 'assets/books/8.jpg', 'EN', 1, 1),
(11, 'ตะลุยโจทย์ Python 500 ข้อ', 'assets/books/28866055.jpg', 'TH', 9, 3),
(12, 'ผีไทย : ชุด เรื่องผี ๆ รอบโลก', 'assets/books/636351795.jpg', 'TH', 10, 7),
(24, 'AAAAAA', 'assets/books/2025846134.png', 'TH', 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `rental_id` int(100) NOT NULL,
  `id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `book_id` int(20) NOT NULL,
  `rental_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `days` int(50) NOT NULL,
  `returned` date DEFAULT NULL,
  `return_status` varchar(10) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`rental_id`, `id`, `firstname`, `lastname`, `book_id`, `rental_date`, `return_date`, `days`, `returned`, `return_status`) VALUES
(18, 7, 'alex', 'sander', 1, '2022-12-14', '2022-12-28', 14, NULL, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(100) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type`) VALUES
(1, 'Live'),
(2, 'adventure'),
(3, 'Knowledge'),
(4, 'Science'),
(5, 'Horror'),
(6, 'Novel'),
(7, 'Comic'),
(8, 'Travel'),
(9, 'Cooking'),
(10, 'Travel'),
(11, 'Literature');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone`, `email`, `password`, `urole`, `create_at`) VALUES
(1, 'a', 'a', 933173221, 'Magargamez@gmail.com', '$2y$10$3jqUqpjOIdW/6LJfJ.oIWOr/ljd/VPjw545yd2.GuJqiB8NnniwnG', 'user', '2022-10-30 06:37:39'),
(2, 'Magar', 'Thai', 972247631, 'magargame@gmail.com', '$2y$10$Nrq8JoJR046pQGXaNIKBiecP5Vw74qn5IUj/7iRJWoa1wRI8c4UnK', 'admin', '2022-10-30 13:18:04'),
(6, 'admin', 'admin', 0, 'admintest@gmail.com', '$2y$10$prcI5tBE/WVOeG3mBkXQZOe6ThVTNiIkjTZbWemtbo0cvR/bZLaWa', 'admin', '2022-12-14 06:53:54'),
(7, 'alex', 'sander', 12568912, 'alexsander@gmail.com', '$2y$10$Y1022eEJsOMROb9RF71/8OT6pICUxGfdse8BObnyzcyhTYZScUyxS', 'user', '2022-12-14 06:56:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rental_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `rental_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
