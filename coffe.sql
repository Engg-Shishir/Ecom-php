-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 12:13 PM
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
-- Database: `coffe`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `category` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `description`, `status`, `date_created`) VALUES
(1, 'Smart Phone', 'Smart Phone Products', 1, '2021-08-30 10:52:25'),
(2, 'Accessories', 'Phone Accessories', 1, '2021-08-30 10:52:49'),
(3, 'Mobile Hardware', 'Mobile Hardware products', 1, '2021-08-30 10:53:31'),
(4, 'External Storage', 'External Storage Products', 1, '2021-08-30 10:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `common`
--

CREATE TABLE `common` (
  `id` int(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ftext` varchar(500) NOT NULL,
  `fbLink` varchar(100) NOT NULL,
  `copyRight` varchar(100) NOT NULL,
  `slider` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jsontry`
--

CREATE TABLE `jsontry` (
  `id` int(100) NOT NULL,
  `manu` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`manu`)),
  `slder` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`slder`)),
  `footer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`footer`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `sno` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `scharge` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sno`, `name`, `price`, `category`, `details`, `quantity`, `discount`, `scharge`, `image`) VALUES
(13, 'FZ91-CW01-84UG', 'Blair Roberts', '596', 'Watch', '<p><b style=\"color: rgb(0, 255, 0);\">fdghfhfh</b></p>', '528', '60', 'Free', 'FZ91-CW01-84UG.jpg'),
(21, 'HJ35-AL16-83RQ', 'Hello', '1000', 'null', '<h1><span style=\"color: rgb(255, 156, 0);\">E-</span><span style=\"color: rgb(156, 156, 148);\">SHOPPER</span></h1><p style=\"box-sizing: inherit; padding: 0px; margin: 10px 0px 22px; font-family: Roboto, sans-serif; font-weight: 700; color: rgb(54, 52, 50); font-size: 28px; transition: all 0.4s ease 0s;\">Free E-Commerce Template</p><h6 style=\"box-sizing: inherit; padding: 0px; margin: 10px 0px 22px; font-weight: 700; color: rgb(54, 52, 50); font-size: 28px; transition: all 0.4s ease 0s;\"><span style=\"font-size: 16px; font-weight: 300; font-family: Tahoma;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etdolore magna aliqua.</span></h6>', '5', '50', '35', 'HJ35-AL16-83RQ.png'),
(22, 'TY03-BO50-15CX', 'fdsfd', '54', 'Electric', '<p><b>45654654</b></p>', '456', '54', 'Free', 'TY03-BO50-15CX.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `student_phone` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_name`, `student_phone`) VALUES
(1, 'Pauline S. Rich', '412-735-0224'),
(2, 'Sarah C. White', '320-552-9961'),
(3, 'Samuel L. Leslie', '201-324-8264'),
(4, 'Norma R. Manly', '478-322-4715'),
(5, 'Kimberly R. Castro', '479-966-6788'),
(6, 'Elaine R. Davis', '701-685-8912'),
(7, 'Concepcion S. Gardner', '607-829-8758'),
(8, 'Patricia J. White', '803-789-0429'),
(9, 'Michael M. Bothwell', '214-585-0737'),
(10, 'Ronald C. Vansickle', '630-571-4107'),
(11, 'Clarence A. Rich', '904-459-3747'),
(12, 'Elizabeth W. Peterson', '404-380-9481'),
(13, 'Renee R. Hewitt', '323-350-4973'),
(14, 'John K. Love', '337-229-1983'),
(15, 'Teresa J. Rincon', '216-394-6894'),
(16, 'Erin S. Huckaby', '503-284-8652');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `email`, `name`, `phone`, `photo`) VALUES
(1, 'admin@gmail.com', 'Shishir', '014034867219', '1.jpg'),
(2, 'paniqab@mailinator.com', 'nonimeci', '543443', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(100) NOT NULL,
  `role` varchar(500) NOT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `pass`, `role`, `token`) VALUES
(1, 'admin@gmail.com', '123', 'admin', NULL),
(2, 'paniqab@mailinator.com', '123', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common`
--
ALTER TABLE `common`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `common`
--
ALTER TABLE `common`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
