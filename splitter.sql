-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 25, 2022 at 03:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `splitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `badrifriend`
--

CREATE TABLE `badrifriend` (
  `FNAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `badrifriend`
--

INSERT INTO `badrifriend` (`FNAME`) VALUES
('divyesh'),
('unkn0wnp');

-- --------------------------------------------------------

--
-- Table structure for table `badrihistory`
--

CREATE TABLE `badrihistory` (
  `DESCRIPTION` varchar(200) NOT NULL,
  `TIME` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `badrihistory`
--

INSERT INTO `badrihistory` (`DESCRIPTION`, `TIME`) VALUES
('You get back 250 from unkn0wnp for Movie.', '2022-04-23'),
('You owe 100 to divyesh for lunch.', '2022-04-23'),
('You owe 250 to unkn0wnp for dinner.', '2022-04-23'),
('You get back 250 from divyesh for lunch.', '2022-04-23'),
('You owe 250 to unkn0wnP for Movie.', '2022-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `badrirecord`
--

CREATE TABLE `badrirecord` (
  `FNAME` varchar(20) NOT NULL,
  `AMOUNT` int(10) NOT NULL,
  `DATE` date NOT NULL,
  `DISCRIPTION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `badrirecord`
--

INSERT INTO `badrirecord` (`FNAME`, `AMOUNT`, `DATE`, `DISCRIPTION`) VALUES
('unkn0wnp', 250, '2022-04-10', 'Movie'),
('divyesh', -100, '2022-04-22', 'lunch'),
('unkn0wnp', -250, '2022-04-14', 'dinner'),
('divyesh', 250, '2022-04-16', 'lunch'),
('unkn0wnP', -250, '2022-04-23', 'Movie');

-- --------------------------------------------------------

--
-- Table structure for table `dhruvitfriend`
--

CREATE TABLE `dhruvitfriend` (
  `FNAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dhruvitfriend`
--

INSERT INTO `dhruvitfriend` (`FNAME`) VALUES
('divyesh'),
('unkn0wnP');

-- --------------------------------------------------------

--
-- Table structure for table `dhruvithistory`
--

CREATE TABLE `dhruvithistory` (
  `DESCRIPTION` varchar(200) NOT NULL,
  `TIME` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dhruvithistory`
--

INSERT INTO `dhruvithistory` (`DESCRIPTION`, `TIME`) VALUES
('You owe 50 to unkn0wnP for lunch.', '2022-04-23'),
('You get back 200 from unkn0wnP for lunch.', '2022-04-23'),
('You owe 500 to unkn0wnP for dinner.', '2022-04-23'),
('You get back 50 from unkn0wnP for lunch.', '2022-04-23'),
('You get back 250 from divyesh for lunch.', '2022-04-23'),
('You owe 100 to unkn0wnP for lunch.', '2022-04-23'),
('You get back 100 from unkn0wnp for lunch.', '2022-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `dhruvitrecord`
--

CREATE TABLE `dhruvitrecord` (
  `FNAME` varchar(20) NOT NULL,
  `AMOUNT` int(10) NOT NULL,
  `DATE` date NOT NULL,
  `DISCRIPTION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dhruvitrecord`
--

INSERT INTO `dhruvitrecord` (`FNAME`, `AMOUNT`, `DATE`, `DISCRIPTION`) VALUES
('unkn0wnP', -50, '2022-04-20', 'lunch'),
('unkn0wnP', 200, '2022-04-21', 'lunch'),
('unkn0wnP', -500, '2022-04-07', 'dinner'),
('unkn0wnP', 50, '2022-04-01', 'lunch'),
('divyesh', 250, '2022-04-05', 'lunch'),
('unkn0wnP', -100, '2022-04-22', 'lunch'),
('unkn0wnp', 100, '2022-04-22', 'lunch');

-- --------------------------------------------------------

--
-- Table structure for table `divyeshfriend`
--

CREATE TABLE `divyeshfriend` (
  `FNAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divyeshfriend`
--

INSERT INTO `divyeshfriend` (`FNAME`) VALUES
('badri'),
('dhruvit'),
('unkn0wnp');

-- --------------------------------------------------------

--
-- Table structure for table `divyeshhistory`
--

CREATE TABLE `divyeshhistory` (
  `DESCRIPTION` varchar(200) NOT NULL,
  `TIME` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divyeshhistory`
--

INSERT INTO `divyeshhistory` (`DESCRIPTION`, `TIME`) VALUES
('You get back 100 from unkn0wnp for lunch.', '2022-04-23'),
('You owe 250 to dhruvit for lunch.', '2022-04-23'),
('You get back 100 from badri for lunch.', '2022-04-23'),
('You owe 250 to badri for lunch.', '2022-04-23'),
('You owe 250 to unkn0wnP for dinner.', '2022-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `divyeshrecord`
--

CREATE TABLE `divyeshrecord` (
  `FNAME` varchar(20) NOT NULL,
  `AMOUNT` int(10) NOT NULL,
  `DATE` date NOT NULL,
  `DISCRIPTION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divyeshrecord`
--

INSERT INTO `divyeshrecord` (`FNAME`, `AMOUNT`, `DATE`, `DISCRIPTION`) VALUES
('unkn0wnp', 100, '2022-04-06', 'lunch'),
('dhruvit', -250, '2022-04-05', 'lunch'),
('badri', 100, '2022-04-22', 'lunch'),
('badri', -250, '2022-04-16', 'lunch'),
('unkn0wnP', -250, '2022-04-08', 'dinner');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `UNAME` varchar(20) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `MOBILE` int(10) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`UNAME`, `NAME`, `EMAIL`, `MOBILE`, `PASSWORD`) VALUES
('badri', 'Badrish Davra', '19bce045@nirmauni.ac.in', 2147483647, 'badri123'),
('Dhruvit', 'Dhruvit Ramani', '19bcl108@nirmauni.ac.in', 1234567890, 'dhruvit123'),
('divyesh', 'Divyesh Devmurari', '19bce049@nirmauni.ac.in', 2147483647, 'divyesh123'),
('unkn0wnP', 'Prince Gadhiya', '19bce057@nirmauni.ac.in', 2147483647, 'prince123');

-- --------------------------------------------------------

--
-- Table structure for table `unkn0wnpfriend`
--

CREATE TABLE `unkn0wnpfriend` (
  `FNAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unkn0wnpfriend`
--

INSERT INTO `unkn0wnpfriend` (`FNAME`) VALUES
('badri'),
('dhruvit'),
('divyesh');

-- --------------------------------------------------------

--
-- Table structure for table `unkn0wnphistory`
--

CREATE TABLE `unkn0wnphistory` (
  `DESCRIPTION` varchar(200) NOT NULL,
  `TIME` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unkn0wnphistory`
--

INSERT INTO `unkn0wnphistory` (`DESCRIPTION`, `TIME`) VALUES
('You get back 50 from dhruvit for lunch.', '2022-04-23'),
('You owe 200 to dhruvit for lunch.', '2022-04-23'),
('You get back 500 from dhruvit for dinner.', '2022-04-23'),
('You owe 50 to dhruvit for lunch.', '2022-04-23'),
('You owe 100 to divyesh for lunch.', '2022-04-23'),
('You owe 250 to badri for Movie.', '2022-04-23'),
('You get back 250 from badri for dinner.', '2022-04-23'),
('You get back 100 from dhruvit for lunch.', '2022-04-23'),
('You owe 100 to Dhruvit for lunch.', '2022-04-23'),
('You get back 250 from badri for Movie.', '2022-04-24'),
('You get back 250 from divyesh for dinner.', '2022-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `unkn0wnprecord`
--

CREATE TABLE `unkn0wnprecord` (
  `FNAME` varchar(20) NOT NULL,
  `AMOUNT` int(10) NOT NULL,
  `DATE` date NOT NULL,
  `DISCRIPTION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unkn0wnprecord`
--

INSERT INTO `unkn0wnprecord` (`FNAME`, `AMOUNT`, `DATE`, `DISCRIPTION`) VALUES
('dhruvit', 50, '2022-04-20', 'lunch'),
('dhruvit', -200, '2022-04-21', 'lunch'),
('dhruvit', 500, '2022-04-07', 'dinner'),
('dhruvit', -50, '2022-04-01', 'lunch'),
('divyesh', -100, '2022-04-06', 'lunch'),
('badri', -250, '2022-04-10', 'Movie'),
('badri', 250, '2022-04-14', 'dinner'),
('dhruvit', 100, '2022-04-22', 'lunch'),
('Dhruvit', -100, '2022-04-22', 'lunch'),
('badri', 250, '2022-04-23', 'Movie'),
('divyesh', 250, '2022-04-08', 'dinner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badrifriend`
--
ALTER TABLE `badrifriend`
  ADD PRIMARY KEY (`FNAME`);

--
-- Indexes for table `dhruvitfriend`
--
ALTER TABLE `dhruvitfriend`
  ADD PRIMARY KEY (`FNAME`);

--
-- Indexes for table `divyeshfriend`
--
ALTER TABLE `divyeshfriend`
  ADD PRIMARY KEY (`FNAME`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`UNAME`);

--
-- Indexes for table `unkn0wnpfriend`
--
ALTER TABLE `unkn0wnpfriend`
  ADD PRIMARY KEY (`FNAME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
