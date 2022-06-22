-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 11:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
(1, 'UN81-AL06-59EM', 'Sonya Lewis', '851', 'Watch', 'Doloribus deleniti r', '609', '73', 'Free', 'UN81-AL06-59EM.png'),
(2, 'WM92-OT45-33WB', 'Maggy Reynolds', '168', 'Device', 'Sit voluptatem nost', '228', '97', '50', 'WM92-OT45-33WB.jpeg'),
(3, 'ZY64-GX02-02XY', 'Regan Santiago', '460', 'Aci', 'Voluptas quasi inven', '874', '78', 'Free', 'ZY64-GX02-02XY.jpg'),
(4, 'DU68-DM34-04ND', 'Sophia Rogers', '615', 'Device', 'Aliquip at ipsa ad ', '301', '14', '50', 'DU68-DM34-04ND.jpg'),
(5, 'NA99-SL36-98RG', 'Kelsey Miller', '754', 'Device', 'Ut excepteur dolore ', '540', '48', '20', 'NA99-SL36-98RG.png'),
(6, 'ZB65-ST42-18PD', 'Hashim Ford', '902', 'Select Category', 'Et quidem consequat', '291', '68', '20', 'ZB65-ST42-18PD.jpg'),
(7, 'JQ15-QK65-41QZ', 'Gemma Mayo', '933', 'Aci', 'Irure aspernatur est', '334', '64', '50', 'JQ15-QK65-41QZ.jpg'),
(8, 'DT30-MI60-83OB', 'Portia Fowler', '492', 'Select Category', 'Excepturi cupidatat ', '516', '66', '35', 'DT30-MI60-83OB.jpg'),
(9, 'ND80-RB73-32ZO', 'Ebony Cummings', '769', 'Aci', 'Excepturi lorem dolo', '539', '22', '50', 'ND80-RB73-32ZO.jpg');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `user`, `pass`, `email`, `profile_photo`) VALUES
(1, 'Shishir Bhuiyan', 'admin', 'admin@gmail.com', '1.jpg');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
