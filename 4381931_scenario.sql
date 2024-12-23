-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: pdb1037.biz.ht
-- Generation Time: Nov 12, 2024 at 07:44 AM
-- Server version: 8.0.32
-- PHP Version: 8.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4381931_scenario`
--

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

CREATE TABLE `experts` (
  `expertid` varchar(4) NOT NULL,
  `criteria` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`expertid`, `criteria`) VALUES
('E1', 'YYYYYYY'),
('E10', 'YYNNNYN'),
('E11', 'YYYYNNN'),
('E12', 'YNYNYNN'),
('E13', 'YYYNYNN'),
('E14', 'YYYNNNN'),
('E15', 'YYYNYNN'),
('E16', 'YNNNYNN'),
('E17', 'YYYYYYN'),
('E18', 'YYYYNNN'),
('E19', 'YNNYYYN'),
('E2', 'YYYYNYY'),
('E20', 'YYYNNYN'),
('E21', 'YYYNYYN'),
('E22', 'YYYNYNN'),
('E23', 'YYYYNNN'),
('E24', 'YNNYNNN'),
('E25', 'YNNYNNN'),
('E26', 'YNYYNYY'),
('E27', 'YYYNYYN'),
('E28', 'YNYNNYN'),
('E29', ''),
('E3', 'YYYYNYN'),
('E30', 'YYYYYYN'),
('E31', 'YYYYYYY'),
('E32', 'YYNNNNN'),
('E4', 'YYYYNNN'),
('E5', 'YYYYNNY'),
('E6', 'YNYYNNN'),
('E7', 'YYYNNNN'),
('E8', 'YYYYNNN'),
('E9', 'YNYYNNN');

-- --------------------------------------------------------

--
-- Table structure for table `factors_energy`
--

CREATE TABLE `factors_energy` (
  `factor` varchar(3) NOT NULL,
  `f_desc` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `f_explain` varchar(400) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factors_energy`
--

INSERT INTO `factors_energy` (`factor`, `f_desc`, `f_explain`) VALUES
('1', 'expectancy in terms of the performance of renewable energy systems', 'The extent to which individuals believe that renewable energy technologies or systems can enhance their performance or achievements.'),
('2', 'expectancy in terms of user friendliness', 'An individual’s perception of the expected level of difficulty associated with using a tool or technology.'),
('3', 'level of pressure from society regarding renewable energy technology', 'The societal influence or the pressure to engage in or refrain from a certain behaviour that relates to renewable energy.'),
('4', 'level of renewable energy awareness', 'The extent to which individuals understand renewable energy technology, including its benefits and drawbacks, and to some extent how it works and what problems it can solve.'),
('5', 'expectancy in terms of value for money of renewable technologies', 'An individual\'s expectations of the expenses associated with acquiring, using, or maintaining a product, service or technology versus the benefits and value it provides.'),
('6', 'expectancy in terms of the amount of support available for renewable energy technologies', 'The extent to which an individual believes that resources, technical support, and organizational readiness are available to help them achieve their renewable energy usage goals.'),
('7', 'level of environmental awareness that people have', 'The extent of an individual’s awareness and concern regarding the resolution of issues that relate to the environment.');

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `H_relationship` varchar(900) NOT NULL,
  `L_relationship` varchar(900) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`H_relationship`, `L_relationship`) VALUES
('0,-2,+2,+2,+2,+2,-2,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0', '0,-2,-2,-2,-2,-2,+2,-2,0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,-2,-2,0'),
('0,+2,+2,+2,+2,+2,+1,+1,0,+1,0,0,+1,+1,+2,+2,0,+2,0,+1,+2,+1,+2,+2,0,+1,+2,+2,+1,+1,+1,+1,0,+1,0,+1,+2,0,+1,+1,0,0,+1,0,+2,+2,+1,+1,0', '0,-1,0,-1,-1,-1,0,0,0,0,0,-1,-1,0,-1,0,0,-1,0,-1,-1,-1,-1,-2,0,-1,-1,-2,-1,-1,-1,-1,0,-1,0,-1,-1,0,-1,-1,0,0,-1,0,-2,-2,-1,-1,0'),
('0,+1,+2,+1,0,+1,+1,0,0,0,+1,0,+1,+1,+1,+1,0,+1,0,+1,+1,0,+1,+1,0,0,+1,+1,0,+1,0,0,0,+1,+1,0,+1,+1,+1,0,0,+1,0,+1,+1,+2,0,+1,0', '0,-1,-2,-2,0,-1,-1,-1,0,-1,-1,0,-1,-1,-1,-1,0,-1,0,-1,-1,0,-1,-1,0,0,-1,-1,0,-1,0,0,0,-1,-1,0,-1,-1,-1,0,0,-1,0,-1,-1,-2,0,-1,0'),
('0,+2,+2,+2,+2,0,+2,+2,0,+2,0,+2,+2,+2,0,+1,0,+2,+1,+1,+1,0,0,+2,0,0,+1,0,+2,+1,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+1,0', '0,-1,-1,+1,+1,+1,-1,+1,0,+1,+1,+1,-1,0,+1,0,0,+1,+1,+1,0,0,0,+1,0,0,0,+1,+1,0,0,0,0,+1,0,+1,+1,0,+1,0,0,0,0,+1,0,0,+1,0,0'),
('0,+1,+2,+1,0,+2,0,+1,0,+1,+1,+2,+2,0,0,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+1,+2,+2,+1,+1,+1,0,0,+2,+1,+2,+1,+2,+1,0,+2,0,+1,+2,+1,+1,+2,0', '0,-1,-2,-1,0,0,0,-1,0,-1,-1,0,-1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'),
('0,+2,+2,+2,+2,+2,+1,+2,0,+2,+1,+1,+1,0,+2,+2,0,+2,+1,+2,+1,+1,0,+1,0,0,+2,+2,+2,+1,0,+1,0,+2,+1,+2,+2,+2,+2,+2,0,+2,+1,0,+1,+1,0,+1,0', '0,-2,-2,-2,-2,-2,-1,-2,0,-2,-1,-1,-1,0,-2,-2,0,-2,-1,-2,-1,-1,0,0,0,0,-1,0,-1,0,0,0,0,-1,-1,-2,-1,-1,-2,-2,0,-2,-1,0,-1,-1,0,-1,0'),
('0,0,0,0,0,0,0,0,0,0,0,0,0,0,+1,+1,0,0,+1,+2,0,0,0,+1,0,+1,+1,+2,+2,+2,+2,+2,0,+1,+1,+1,+1,0,+2,+2,0,+2,+2,+1,+1,+1,+1,+2,0', '0,+1,+1,+1,+1,-1,-1,-1,0,-1,-1,-1,-1,-1,-1,-1,0,0,-1,-1,0,0,-1,0,0,-1,-1,-1,-1,-1,-1,0,0,-1,-1,-1,-1,-1,-1,-1,0,-1,-1,-1,-1,-1,-1,0,0'),
('0,+2,+2,+2,+2,+2,+2,+2,0,+2,0,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,0,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0', '0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,0,-2,0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,-2,-2,0'),
('0,+2,+1,+2,+2,+2,+2,+2,0,+1,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+1,+1,0,+2,+1,+2,+2,+2,+1,+2,0,+1,+2,+2,+1,+2,+2,+2,0,+2,+1,+1,+1,+2,+2,+2,0', '0,+1,0,+1,+1,+1,+1,+1,0,0,+1,+1,+1,+1,+1,+1,0,+1,+1,+1,+1,+1,0,0,0,+1,0,+1,+1,+1,0,+1,0,0,+1,+1,0,+1,+1,+1,0,+1,0,0,0,+1,+1,+1,0'),
('0,+1,0,+1,+2,+2,+1,+2,0,+2,+2,+1,+2,+2,0,-1,0,+1,0,+1,+1,+2,+2,+1,0,+2,+1,+2,+2,0,+2,+2,0,+2,+1,-1,-1,0,+1,+1,0,+2,+1,+1,0,+2,0,+1,0', '0,-1,0,-2,-1,-2,-2,-2,0,-2,-2,-1,-1,-2,0,+1,0,0,0,-1,0,-1,-1,0,0,-2,-2,-1,-2,-1,-2,-2,0,-2,0,+1,0,0,0,0,0,-1,-1,0,-1,-1,-1,-1,0'),
('0,+1,+1,+1,+1,+2,-1,+1,0,-1,+1,-1,+2,0,+1,+1,0,+1,+1,0,+1,+1,+1,+1,0,+1,+1,+1,+1,0,+1,+1,0,+1,+1,+1,+1,+1,+1,+1,0,+1,+1,+1,+1,+1,+1,+1,0', '0,+1,+1,+1,+1,+2,-1,-1,0,+1,-1,+1,-1,0,-1,+2,0,-1,-1,0,-1,-1,-1,-1,0,-1,-1,-1,-1,-1,-1,-1,0,-1,-1,-1,-1,-1,-1,-1,0,-1,-1,-1,-1,-1,-1,-1,0'),
('0,+2,0,+2,+2,+2,+2,+2,0,+2,0,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+1,0,+2,+1,+2,+1,+2,+2,0,0,+2,+2,+2,+2,+2,+2,+2,0', '0,+1,0,+1,+1,-2,+1,+1,0,+1,0,0,+1,0,+1,+1,0,+1,+1,+1,+1,+1,+1,+1,0,+1,+1,+1,+1,+1,+2,+2,0,+2,+2,+1,+2,+1,+1,0,0,-1,0,0,-1,+2,+1,-1,0'),
('0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0,+2,+2,+2,+2,+2,+2,+2,0', '0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,-2,-2,0,-2,-2,-2,-2,-2,-2,-2,0'),
('0,+1,0,+1,+2,+1,+2,+1,0,+2,+1,+1,+2,+1,0,+1,0,+1,+2,+2,+2,0,0,+1,0,0,+1,+1,+2,+1,+2,+1,0,+2,+2,+1,0,+1,+1,+1,0,+1,+1,0,+1,+1,+1,+1,0', '0,0,0,-1,-1,-2,-1,-2,0,0,-1,0,0,0,0,-2,0,0,+1,-1,0,0,0,0,0,-1,-1,0,-2,-2,-2,-1,0,-2,-2,-1,0,-1,-2,0,0,-1,-1,-1,-1,-2,-2,-1,0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experts`
--
ALTER TABLE `experts`
  ADD PRIMARY KEY (`expertid`);

--
-- Indexes for table `factors_energy`
--
ALTER TABLE `factors_energy`
  ADD PRIMARY KEY (`factor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
