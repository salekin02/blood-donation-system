-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 05:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`) VALUES
('', 'admin', 'cse301');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donationid` varchar(20) NOT NULL,
  `dname` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `bgroup` varchar(5) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donationid`, `dname`, `pname`, `bgroup`, `date`) VALUES
('5c9ce0b1d1e43', 'Abir', 'Pranto', 'A+', '2019-03-28'),
('5c9f3c40ae7ec', 'Proma', 'Proma', 'B+', '2019-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` varchar(20) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `bgroup` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `number` varchar(11) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `name`, `bgroup`, `gender`, `age`, `weight`, `date`, `number`, `address`) VALUES
('5c9dff4e2b7e5', 'Abir', 'A+', 'Male', 22, 70, '2018-12-12', '01521434639', 'Banasree'),
('5c9dff98d3dff', 'Pranto', 'A+', 'Male', 23, 90, '2018-11-06', '01761479338', 'Badda'),
('5c9e0b6d3caaa', 'Robin', 'A+', 'Male', 22, 90, '2018-12-01', '1234124', 'Gazipur'),
('5c9e0c2f7cdd0', 'Nahid', 'B+', 'Male', 21, 60, '2018-12-12', '01927904143', 'Sylhet'),
('5c9e1637cb0b6', 'Fahim', 'A+', 'Male', 21, 70, '2019-01-01', '124523', 'Badda,Dhaka'),
('5c9e24cecca5a', 'Serajus Salekin', 'A+', 'Male', 21, 60, '2018-12-14', '01927904143', 'Uttara');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` varchar(20) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `latitude`, `longitude`) VALUES
('5c9dfa1543a9c', 23.750099901815364, 90.41303873062134),
('5c9dff4e2b7e5', 23.76112383798476, 90.43087059703623),
('5c9dff98d3dff', 23.76872261552801, 90.42447566986084),
('5c9e0b6d3caaa', 23.995662767654704, 90.4216106082763),
('5c9e0c2f7cdd0', 24.863125750641714, 91.87596439494973),
('5c9e15e83cab4', 23.712214475602426, 90.42884018159839),
('5c9e1637cb0b6', 23.771511380441645, 90.42544986940356),
('5c9e24cecca5a', 23.87447553687034, 90.37977973230181);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `bgroup` varchar(5) NOT NULL,
  `gender` text NOT NULL,
  `age` int(5) NOT NULL,
  `weight` float NOT NULL,
  `number` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `bgroup`, `gender`, `age`, `weight`, `number`, `address`) VALUES
('5c9dfb59400e2', 'Proma', 'B+', 'Female', 22, 100, '0129112784128', 'Puran Dhaka'),
('5c9e199469ee5', 'Shams', 'A+', 'Male', 21, 30, '3265234643', 'Gazipur'),
('5c9f919f9f1fc', 'Tanvir', 'B+', 'Male', 21, 70, '0192477124', 'Jatrabari, Dhaka'),
('5c9f91fd7b75a', 'Ekram', 'B+', 'Male', 22, 60, '0124125325', 'Banani, Dhaka'),
('5c9f92e49b9d8', 'Fahim', 'B+', 'Male', 22, 65, '124532151', 'Motijheel, Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donationid`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
