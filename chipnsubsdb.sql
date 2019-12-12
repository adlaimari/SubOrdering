-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 07:00 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chipnsubsdb`
--
CREATE DATABASE IF NOT EXISTS `chipnsubsdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chipnsubsdb`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `type`, `price`) VALUES
(1, 'Whole Wheat', 'Bread', 25),
(2, 'Italian Herb', 'Bread', 35),
(3, 'Jalapeno Parmesan', 'Bread', 35),
(4, 'American', 'Cheese', 20),
(5, 'Swiss', 'Cheese', 25),
(6, 'Pepperjack', 'Cheese', 30),
(7, 'Mayo', 'Sauce', 10),
(8, 'Mustard', 'Sauce', 10),
(9, 'Honey Mustard', 'Sauce', 15),
(10, 'Spicy Mayo', 'Sauce', 15),
(11, 'Cucumber', 'Veggies', 15),
(12, 'Lettuce', 'Veggies', 15),
(13, 'Peppers - Banana', 'Veggies', 15),
(14, 'Peppers - Jalapeno', 'Veggies', 15),
(15, 'Peppers - Green and Red', 'Veggies', 15),
(16, 'Pickles', 'Veggies', 15),
(17, 'Spinach', 'Veggies', 15),
(18, 'Tomato', 'Veggies', 10),
(19, 'Olives', 'Veggies', 20),
(20, 'Onions', 'Veggies', 10),
(21, 'Turkey Bacon Club', 'Sandwich Type', 60),
(22, 'Oven Roasted Turkey', 'Sandwich Type', 60),
(23, 'Savory Ham', 'Sandwich Type', 50),
(24, 'Italian (Salami, Ham & Pepperoni)', 'Sandwich Type', 70),
(25, 'Meatball', 'Sandwich Type', 50);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `phoneno` varchar(15) DEFAULT NULL,
  `orderdetails` varchar(100) DEFAULT NULL,
  `totalprice` int(11) NOT NULL,
  `ordertime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
