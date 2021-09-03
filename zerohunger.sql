-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 12:14 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zerohunger`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phnno` int(10) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `phnno`, `rating`, `feedback`) VALUES
('Brinda', 'saibrinda.23@gmail.com', 1234567890, 'Very Good', 'GOOD JOB!!!');

-- --------------------------------------------------------

--
-- Table structure for table `fooddetails`
--

CREATE TABLE `fooddetails` (
  `name` varchar(50) NOT NULL,
  `phnno` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `food` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fooddetails`
--

INSERT INTO `fooddetails` (`name`, `phnno`, `email`, `food`, `date`, `quantity`, `address`) VALUES
('Brinda', 2147483647, 'saibrinda.23@gmail.com', 'rice and dal', '03/09/2021', 50, 'chittoor,ap'),
('jyoshna', 1987654321, 'jyoshna@gmail.com', 'chapathi and kurma', '03/09/2021', 25, 'ananthapur');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phnno` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `phnno` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `address` varchar(100) NOT NULL,
  `var` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `phnno`, `email`, `password`, `address`, `var`) VALUES
('sai', 1234567890, 'brindasai.23@gmail.com', 'sai', 'TN', 'Recipient'),
('jyoshna', 1987654321, 'jyoshna@gmail.com', 'jyo', 'Kn', 'Donor'),
('nithya', 2147483647, 'nithya@gmail.com', 'nithya', 'tanakalu', 'Recipient'),
('Brinda', 2147483647, 'saibrinda.23@gmail.com', 'honey', 'ap', 'Donor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
