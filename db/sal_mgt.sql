-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 03:20 PM
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
-- Database: `sal_mgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `uname` varchar(225) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`uname`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `allowance`
--

CREATE TABLE `allowance` (
  `allowance_id` int(11) NOT NULL,
  `hra` int(11) NOT NULL,
  `da` int(11) NOT NULL,
  `ta` int(11) NOT NULL,
  `ma` int(11) NOT NULL,
  `oa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowance`
--

INSERT INTO `allowance` (`allowance_id`, `hra`, `da`, `ta`, `ma`, `oa`) VALUES
(1, 20, 20, 20, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `attendence_form`
--

CREATE TABLE `attendence_form` (
  `id` int(11) NOT NULL,
  `empid` varchar(255) NOT NULL,
  `timein` time(6) NOT NULL,
  `timeout` time(6) NOT NULL,
  `date` text NOT NULL,
  `month` text NOT NULL,
  `year` text NOT NULL,
  `present` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence_form`
--

INSERT INTO `attendence_form` (`id`, `empid`, `timein`, `timeout`, `date`, `month`, `year`, `present`) VALUES
(1, 'EMP53', '09:00:00.000000', '17:00:00.000000', '1', 'May', '2020', 'YES'),
(6, 'EMP71', '05:02:00.000000', '13:01:00.000000', '11', 'January', '2020', 'YES'),
(5, 'EMP71', '05:02:00.000000', '13:01:00.000000', '10', 'January', '2020', 'YES'),
(7, 'EMP22', '04:02:00.000000', '17:04:00.000000', '10', 'January', '2020', 'YES'),
(8, 'EMP22', '05:04:00.000000', '20:02:00.000000', '11', 'January', '2020', 'YES'),
(9, 'EMP71', '01:00:00.000000', '01:00:00.000000', '1', 'January', '2000', ''),
(10, 'EMP71', '01:00:00.000000', '02:00:00.000000', '2', 'January', '2000', ''),
(11, 'EMP71', '03:00:00.000000', '15:01:00.000000', '3', 'January', '2000', '');

-- --------------------------------------------------------

--
-- Table structure for table `bonus_form`
--

CREATE TABLE `bonus_form` (
  `id` int(10) NOT NULL,
  `empid` varchar(10) NOT NULL,
  `month` text NOT NULL,
  `rate` int(10) DEFAULT NULL,
  `year` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonus_form`
--

INSERT INTO `bonus_form` (`id`, `empid`, `month`, `rate`, `year`) VALUES
(1, 'EMP11', 'May', 5, '2020'),
(2, 'EMP22', 'May', 5, '2020'),
(3, 'EMP37', 'May', 4, '2020'),
(4, 'EMP48', 'May', 4, '2020'),
(5, 'EMP53', 'May', 3, '2020'),
(6, 'EMP11', 'June', 10, '2020'),
(7, 'EMP71', 'January', 5, '2020'),
(11, 'EMP22', 'June', 5, '2023'),
(10, 'EMP71', 'June', 5, '2023');

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `id` int(5) NOT NULL,
  `date` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`id`, `date`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31);

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `deduc_id` int(10) NOT NULL,
  `pf` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`deduc_id`, `pf`) VALUES
(1, '15');

-- --------------------------------------------------------

--
-- Table structure for table `desig`
--

CREATE TABLE `desig` (
  `did` int(255) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `lrange` int(10) NOT NULL,
  `urange` int(10) NOT NULL,
  `Basic_salary` int(30) NOT NULL,
  `tax` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desig`
--

INSERT INTO `desig` (`did`, `dname`, `lrange`, `urange`, `Basic_salary`, `tax`) VALUES
(1, 'Manager', 70000, 50000, 50000, 6),
(2, 'Software Developer', 35000, 60000, 42000, 5),
(3, 'Assistant Manager', 45000, 65000, 45000, 5),
(5, 'Database Administrator', 50000, 80000, 60000, 7),
(6, 'Debugger', 25000, 35000, 25000, 4),
(7, 'Website Designer', 15000, 30000, 20000, 2),
(8, 'System Administrator', 15000, 30000, 22000, 2),
(9, 'System Analyst', 50000, 80000, 60000, 5),
(10, 'Marketing Head', 60000, 90000, 66000, 6),
(11, 'Analyst', 15000, 20000, 17000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(10) NOT NULL,
  `empid` varchar(10) DEFAULT NULL,
  `did` varchar(255) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `add` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cont` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `desig` varchar(255) DEFAULT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `empid`, `did`, `fname`, `add`, `gender`, `email`, `cont`, `dob`, `doj`, `desig`, `pass`) VALUES
(1, 'EMP71', '1', 'Subir Karmakar', 'Siliguri', 'Male', 'subir07@gmail.com', '6296593318', '1989-03-08', '2015-04-04', 'Manager', 'subir123a'),
(2, 'EMP22', '8', 'Rituparna Bhattacharya', 'Kolkata', 'FEMALE', 'rituparna@gmail.com', '988765544', '1990-04-30', '2014-05-06', 'System Administrator', 'ritu123'),
(3, 'EMP37', '7', 'Pritam Paul', 'Siliguri', 'MALE', 'pritam@gmail.com', '8987565778', '1990-06-14', '2011-08-11', 'Website Designer', 'pritam123'),
(4, 'EMP48', '8', 'Rohit Saha', 'Darjeeling', 'MALE', 'rohit@gamil.com', '778868989', '1996-05-07', '2017-04-15', 'System Administrator', 'rohit123'),
(6, 'EMP65', '5', 'Siddharth Banerjee', 'Jalpaiguri', 'MALE', 'sid@gmail.com', '7887655788', '1994-06-15', '2015-08-12', 'Database Administrator', 'sid123'),
(7, 'EMP72', '1', 'Pratiksha K', 'Siliguri', '', 'abc@gmail.com', '7679003933', '2020-07-10', '2020-07-09', 'Manager', 'p1234'),
(8, 'EMP81', '1', 'Asha', 'ashighar', 'Male', 'aadas', '4567987466', '2020-07-11', '2020-07-11', 'Manager', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `fixed_bonus`
--

CREATE TABLE `fixed_bonus` (
  `id` int(10) NOT NULL,
  `month` text NOT NULL,
  `year` int(11) NOT NULL,
  `rate` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixed_bonus`
--

INSERT INTO `fixed_bonus` (`id`, `month`, `year`, `rate`) VALUES
(1, 'April', 2020, 20),
(2, 'October', 2020, 25),
(4, 'July', 2020, 19),
(6, 'June', 2023, 10);

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `month_id` int(11) NOT NULL,
  `month_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`month_id`, `month_name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `sal_id` int(10) NOT NULL,
  `empid` varchar(10) DEFAULT NULL,
  `month` text NOT NULL,
  `year` text NOT NULL,
  `hra_amt` int(10) DEFAULT NULL,
  `ta_amt` int(10) DEFAULT NULL,
  `da_amt` int(10) DEFAULT NULL,
  `ma_amt` int(10) DEFAULT NULL,
  `oa_amt` int(10) DEFAULT NULL,
  `bonus` int(10) NOT NULL,
  `desig` varchar(255) DEFAULT NULL,
  `basic_sal` int(10) DEFAULT NULL,
  `total_bas_sal` int(10) DEFAULT NULL,
  `gross_sal` int(10) DEFAULT NULL,
  `pf_amt` int(10) DEFAULT NULL,
  `tax_amt` int(10) DEFAULT NULL,
  `absent` int(10) DEFAULT NULL,
  `total_deduc` int(10) DEFAULT NULL,
  `net_sal` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`sal_id`, `empid`, `month`, `year`, `hra_amt`, `ta_amt`, `da_amt`, `ma_amt`, `oa_amt`, `bonus`, `desig`, `basic_sal`, `total_bas_sal`, `gross_sal`, `pf_amt`, `tax_amt`, `absent`, `total_deduc`, `net_sal`) VALUES
(1, 'EMP71', 'January', '2020', 10000, 10000, 10000, 10000, 10000, 2500, 'Manager', 50000, 3226, 39226, 6000, 3000, 29, 9000, 30226),
(2, 'EMP22', 'January', '2020', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 1419, 17259, 2640, 440, 29, 3080, 14179),
(3, 'EMP37', 'January', '2020', 4000, 4000, 4000, 4000, 4000, 0, 'Website Designer', 20000, 0, 14400, 2400, 400, 31, 2800, 11600),
(4, 'EMP48', 'January', '2020', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 15840, 2640, 440, 31, 3080, 12760),
(5, 'EMP65', 'January', '2020', 12000, 12000, 12000, 12000, 12000, 0, 'Database Administrator', 60000, 0, 43200, 7200, 4200, 31, 11400, 31800),
(6, 'EMP72', 'January', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 36000, 6000, 3000, 31, 9000, 27000),
(7, 'EMP81', 'January', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 36000, 6000, 3000, 31, 9000, 27000),
(8, 'EMP71', 'January', '2020', 10000, 10000, 10000, 10000, 10000, 2500, 'Manager', 50000, 3226, 39226, 6000, 3000, 29, 9000, 30226),
(9, 'EMP22', 'January', '2020', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 1419, 17259, 2640, 440, 29, 3080, 14179),
(10, 'EMP37', 'January', '2020', 4000, 4000, 4000, 4000, 4000, 0, 'Website Designer', 20000, 0, 14400, 2400, 400, 31, 2800, 11600),
(11, 'EMP48', 'January', '2020', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 15840, 2640, 440, 31, 3080, 12760),
(12, 'EMP65', 'January', '2020', 12000, 12000, 12000, 12000, 12000, 0, 'Database Administrator', 60000, 0, 43200, 7200, 4200, 31, 11400, 31800),
(13, 'EMP72', 'January', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 36000, 6000, 3000, 31, 9000, 27000),
(14, 'EMP81', 'January', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 36000, 6000, 3000, 31, 9000, 27000),
(15, 'EMP71', 'January', '2020', 10000, 10000, 10000, 10000, 10000, 2500, 'Manager', 50000, 3226, 39226, 6000, 3000, 29, 9000, 30226),
(16, 'EMP22', 'January', '2020', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 1419, 17259, 2640, 440, 29, 3080, 14179),
(17, 'EMP37', 'January', '2020', 4000, 4000, 4000, 4000, 4000, 0, 'Website Designer', 20000, 0, 14400, 2400, 400, 31, 2800, 11600),
(18, 'EMP48', 'January', '2020', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 15840, 2640, 440, 31, 3080, 12760),
(19, 'EMP65', 'January', '2020', 12000, 12000, 12000, 12000, 12000, 0, 'Database Administrator', 60000, 0, 43200, 7200, 4200, 31, 11400, 31800),
(20, 'EMP72', 'January', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 36000, 6000, 3000, 31, 9000, 27000),
(21, 'EMP81', 'January', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 36000, 6000, 3000, 31, 9000, 27000),
(22, 'EMP71', 'January', '2020', 10000, 10000, 10000, 10000, 10000, 2500, 'Manager', 50000, 3226, 39226, 6000, 3000, 29, 9000, 30226),
(23, 'EMP22', 'January', '2020', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 1419, 17259, 2640, 440, 29, 3080, 14179),
(24, 'EMP37', 'January', '2020', 4000, 4000, 4000, 4000, 4000, 0, 'Website Designer', 20000, 0, 14400, 2400, 400, 31, 2800, 11600),
(25, 'EMP48', 'January', '2020', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 15840, 2640, 440, 31, 3080, 12760),
(26, 'EMP65', 'January', '2020', 12000, 12000, 12000, 12000, 12000, 0, 'Database Administrator', 60000, 0, 43200, 7200, 4200, 31, 11400, 31800),
(27, 'EMP72', 'January', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 36000, 6000, 3000, 31, 9000, 27000),
(28, 'EMP81', 'January', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 36000, 6000, 3000, 31, 9000, 27000),
(29, 'EMP71', 'February', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 29, 10500, 39500),
(30, 'EMP22', 'February', '2020', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 22000, 3300, 440, 29, 3740, 18260),
(31, 'EMP37', 'February', '2020', 4000, 4000, 4000, 4000, 4000, 0, 'Website Designer', 20000, 0, 20000, 3000, 400, 29, 3400, 16600),
(32, 'EMP48', 'February', '2020', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 22000, 3300, 440, 29, 3740, 18260),
(33, 'EMP65', 'February', '2020', 12000, 12000, 12000, 12000, 12000, 0, 'Database Administrator', 60000, 0, 60000, 9000, 4200, 29, 13200, 46800),
(34, 'EMP72', 'February', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 29, 10500, 39500),
(35, 'EMP81', 'February', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 29, 10500, 39500),
(36, 'EMP71', 'March', '2000', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 31, 10500, 39500),
(37, 'EMP22', 'March', '2000', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 22000, 3300, 440, 31, 3740, 18260),
(38, 'EMP37', 'March', '2000', 4000, 4000, 4000, 4000, 4000, 0, 'Website Designer', 20000, 0, 20000, 3000, 400, 31, 3400, 16600),
(39, 'EMP48', 'March', '2000', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 22000, 3300, 440, 31, 3740, 18260),
(40, 'EMP65', 'March', '2000', 12000, 12000, 12000, 12000, 12000, 0, 'Database Administrator', 60000, 0, 60000, 9000, 4200, 31, 13200, 46800),
(41, 'EMP72', 'March', '2000', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 31, 10500, 39500),
(42, 'EMP81', 'March', '2000', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 31, 10500, 39500),
(43, 'EMP71', 'June', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 30, 10500, 39500),
(44, 'EMP22', 'June', '2020', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 22000, 3300, 440, 30, 3740, 18260),
(45, 'EMP37', 'June', '2020', 4000, 4000, 4000, 4000, 4000, 0, 'Website Designer', 20000, 0, 20000, 3000, 400, 30, 3400, 16600),
(46, 'EMP48', 'June', '2020', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 22000, 3300, 440, 30, 3740, 18260),
(47, 'EMP65', 'June', '2020', 12000, 12000, 12000, 12000, 12000, 0, 'Database Administrator', 60000, 0, 60000, 9000, 4200, 30, 13200, 46800),
(48, 'EMP72', 'June', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 30, 10500, 39500),
(49, 'EMP81', 'June', '2020', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 30, 10500, 39500),
(50, 'EMP71', 'January', '2000', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 31, 10500, 39500),
(51, 'EMP22', 'January', '2000', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 22000, 3300, 440, 31, 3740, 18260),
(52, 'EMP37', 'January', '2000', 4000, 4000, 4000, 4000, 4000, 0, 'Website Designer', 20000, 0, 20000, 3000, 400, 31, 3400, 16600),
(53, 'EMP48', 'January', '2000', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 22000, 3300, 440, 31, 3740, 18260),
(54, 'EMP65', 'January', '2000', 12000, 12000, 12000, 12000, 12000, 0, 'Database Administrator', 60000, 0, 60000, 9000, 4200, 31, 13200, 46800),
(55, 'EMP72', 'January', '2000', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 31, 10500, 39500),
(56, 'EMP81', 'January', '2000', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 31, 10500, 39500),
(57, 'EMP71', 'October', '2021', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 31, 10500, 39500),
(58, 'EMP22', 'October', '2021', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 22000, 3300, 440, 31, 3740, 18260),
(59, 'EMP37', 'October', '2021', 4000, 4000, 4000, 4000, 4000, 0, 'Website Designer', 20000, 0, 20000, 3000, 400, 31, 3400, 16600),
(60, 'EMP48', 'October', '2021', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 22000, 3300, 440, 31, 3740, 18260),
(61, 'EMP65', 'October', '2021', 12000, 12000, 12000, 12000, 12000, 0, 'Database Administrator', 60000, 0, 60000, 9000, 4200, 31, 13200, 46800),
(62, 'EMP72', 'October', '2021', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 31, 10500, 39500),
(63, 'EMP81', 'October', '2021', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 31, 10500, 39500),
(64, 'EMP71', 'October', '2022', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 31, 10500, 39500),
(65, 'EMP22', 'October', '2022', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 22000, 3300, 440, 31, 3740, 18260),
(66, 'EMP37', 'October', '2022', 4000, 4000, 4000, 4000, 4000, 0, 'Website Designer', 20000, 0, 20000, 3000, 400, 31, 3400, 16600),
(67, 'EMP48', 'October', '2022', 4400, 4400, 4400, 4400, 4400, 0, 'System Administrator', 22000, 0, 22000, 3300, 440, 31, 3740, 18260),
(68, 'EMP65', 'October', '2022', 12000, 12000, 12000, 12000, 12000, 0, 'Database Administrator', 60000, 0, 60000, 9000, 4200, 31, 13200, 46800),
(69, 'EMP72', 'October', '2022', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 31, 10500, 39500),
(70, 'EMP81', 'October', '2022', 10000, 10000, 10000, 10000, 10000, 0, 'Manager', 50000, 0, 50000, 7500, 3000, 31, 10500, 39500),
(71, 'EMP71', 'June', '2023', 10000, 10000, 10000, 10000, 10000, 7500, 'Manager', 50000, 0, 50000, 7500, 3000, 30, 10500, 39500),
(72, 'EMP22', 'June', '2023', 4400, 4400, 4400, 4400, 4400, 3300, 'System Administrator', 22000, 0, 22000, 3300, 440, 30, 3740, 18260),
(73, 'EMP37', 'June', '2023', 4000, 4000, 4000, 4000, 4000, 2000, 'Website Designer', 20000, 0, 20000, 3000, 400, 30, 3400, 16600),
(74, 'EMP48', 'June', '2023', 4400, 4400, 4400, 4400, 4400, 2200, 'System Administrator', 22000, 0, 22000, 3300, 440, 30, 3740, 18260),
(75, 'EMP65', 'June', '2023', 12000, 12000, 12000, 12000, 12000, 6000, 'Database Administrator', 60000, 0, 60000, 9000, 4200, 30, 13200, 46800),
(76, 'EMP72', 'June', '2023', 10000, 10000, 10000, 10000, 10000, 5000, 'Manager', 50000, 0, 50000, 7500, 3000, 30, 10500, 39500),
(77, 'EMP81', 'June', '2023', 10000, 10000, 10000, 10000, 10000, 5000, 'Manager', 50000, 0, 50000, 7500, 3000, 30, 10500, 39500);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(11) NOT NULL,
  `year_name` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year_id`, `year_name`) VALUES
(2, 2000),
(3, 2001),
(4, 2001),
(5, 2002),
(6, 2003),
(7, 2004),
(8, 2005),
(9, 2006),
(10, 2007),
(11, 2008),
(12, 2009),
(13, 2010),
(14, 2011),
(15, 2012),
(16, 2013),
(17, 2014),
(18, 2015),
(19, 2016),
(20, 2017),
(21, 2018),
(22, 2019),
(27, 2020),
(29, 2021),
(30, 2022),
(31, 2022),
(32, 2023),
(33, 2024),
(34, 2025);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowance`
--
ALTER TABLE `allowance`
  ADD PRIMARY KEY (`allowance_id`);

--
-- Indexes for table `attendence_form`
--
ALTER TABLE `attendence_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_form`
--
ALTER TABLE `bonus_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`deduc_id`);

--
-- Indexes for table `desig`
--
ALTER TABLE `desig`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixed_bonus`
--
ALTER TABLE `fixed_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`month_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`sal_id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowance`
--
ALTER TABLE `allowance`
  MODIFY `allowance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendence_form`
--
ALTER TABLE `attendence_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bonus_form`
--
ALTER TABLE `bonus_form`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `deduc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `desig`
--
ALTER TABLE `desig`
  MODIFY `did` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fixed_bonus`
--
ALTER TABLE `fixed_bonus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `month_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `sal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
