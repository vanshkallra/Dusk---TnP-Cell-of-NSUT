-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2024 at 11:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `clogin`
--

CREATE TABLE `clogin` (
  `id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `USN` varchar(15) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clogin`
--

INSERT INTO `clogin` (`id`, `Name`, `USN`, `PASSWORD`, `Email`, `Question`, `Answer`) VALUES
(24, 'Techno Solutions', 'technosol', '1234', 'technosolutions@gmail.com', 'What is your fav spot?', 'vansh'),
(25, 'Kanik Tech', 'kaniktech', '1234', 'kaniktech@gmail.com', 'What is your fav spot?', 'NSUT');

-- --------------------------------------------------------

--
-- Table structure for table `hlogin`
--

CREATE TABLE `hlogin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL,
  `Branch` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hlogin`
--

INSERT INTO `hlogin` (`Id`, `Name`, `Username`, `Password`, `Email`, `Question`, `Answer`, `Branch`) VALUES
(1, 'Nagaraj P', 'Nagaraj', '123456', 'fastnag@gmail.com', 'What is your fav spot?', 'Bangalore', 'ISE'),
(2, 'Anand Gupta', 'anandgupta', '12345', 'anand.gupta@nsut.ac.in', 'What is your fav spot?', 'Delhi', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `plogin`
--

CREATE TABLE `plogin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `plogin`
--

INSERT INTO `plogin` (`Id`, `Name`, `Username`, `Password`, `Email`, `Question`, `Answer`) VALUES
(1, 'Rohini', 'rohini', 'rohini', 'rh@gmail.com', 'What is your fav spot?', 'mangalore');

-- --------------------------------------------------------

--
-- Table structure for table `prilogin`
--

CREATE TABLE `prilogin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prilogin`
--

INSERT INTO `prilogin` (`Id`, `Name`, `Username`, `Password`, `Email`, `Question`, `Answer`) VALUES
(1, 'Suresh', 'suresh', '123456', 'suresh@gmail.com', 'What is your fav spot?', 'madikeri');

-- --------------------------------------------------------

--
-- Table structure for table `slogin`
--

CREATE TABLE `slogin` (
  `id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `USN` varchar(15) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `slogin`
--

INSERT INTO `slogin` (`id`, `Name`, `USN`, `PASSWORD`, `Email`, `Question`, `Answer`) VALUES
(1, 'veda', '1cg13is401', '123', 'veda', 'What is your fav spot?', 'circket'),
(2, 'Veda', '1cg12is096', 'veda', 'v@gmil.com', 'what is your fav spot?', 'mysore'),
(3, 'rama', '1cg12cs001', 'rama', 'rama@gmail.com', 'What is your fav dish?', 'chicken'),
(4, 'Vishruth Harithsa', '1cg12is094', 'CUTESTAR22', 'har', 'What is your nickname?', ''),
(5, 'Armstrong', '1cg12is000', 'asdfg', 'armstrong@neil.com', 'What is your fav spot?', 'New York'),
(8, 'Harry', '1cg12is007', 'asdfg', 'asdfg@gmail.com', 'What is your fav spot?', 'Manali'),
(9, '', '', '', '', '', ''),
(10, 'Harithsa', '1cg12is009', 'qwerty', 'harithsa@aol.com', 'What is your nickname?', 'Gunda'),
(11, 'Vishruth Harithsa', '1cg12is011', 'qwerty', 'astroman225@gmail.com', 'What is your fav spot?', 'Manali'),
(12, 'Vansh Kalra', '1cg13is402', '$2y$10$EQFgYBwtZ4xVZpzQHRrXXOGtCbZZrSfYobUFl64TxWtF13g8m7Q6q', 'vanshkalra@gmail.com', 'What is your nickname?', 'vansh'),
(13, 'Vansh Kalra', '1cg13is403', '$2y$10$HU8CvFWbgxmzKs6SN45BW.C2QeVLRaJ3zwgUdIZTv1u9E3OroQFsK', 'vansh@gmail.com', 'What is your nickname?', 'vanshkalra'),
(14, 'hello', '1cg13is404', '$2y$10$oloJXDm1cXTlDrOYDd0fUenstTSjmdDQbJ59rNS898y878IRvoF8q', 'hello@gmail.com', 'What is your nickname?', 'hello'),
(15, 'Vansh Kalra', '1cg13is405', '123123', 'vans@gmail.com', 'What is your nickname?', 'vanshy'),
(16, 'Govind P', '1cg13is406', '121212', 'govind@gmail.com', 'What is your fav spot?', 'nsut'),
(17, 'Vansh Kalra', '1cg13is4', '1212', 'govind@gmail.com', 'What is your nickname?', 'shivam'),
(18, 'Vansh Kalra', '2023UCM2372', '1234', 'vanshkalra@gmail.com', 'What is your enemy name?', 'shivam'),
(19, 'Shivam Mishra', '2023UCM23', '1234', 'shivam@gmail.com', 'What is your nickname?', 'vansh'),
(20, 'Vansh', '2023UCM2313', '123', 'vanshkalra@gmail.com', 'What is your nickname?', 'vansh'),
(21, 'Govind P', '2023UCM2319', '1234', 'vanshkalra@gmail.com', 'What is your nickname?', 'playboy'),
(22, 'Ram', '2023UCM2399', '12345', 'ram@gmail.com', 'What is your nickname?', 'Shyam'),
(23, 'Swarit Varshney', '2023UCM23452', '1234', 'swarit@gmail.com', 'What is your nickname?', 'swarit'),
(24, 'Shivam Mishra', '2023UCM2370', '1111', 'shivammishra@gmail.com', 'What is your nickname?', 'Mishri'),
(25, 'Lakshay Gupta', '2023UCM2357', '1234', 'lakshay@gmail.com', 'What is your nickname?', 'lakku'),
(26, 'Vansh Kalra', '2023UCM2311', '1234', 'vanshkalra@gmail.com', 'What is your nickname?', 'vansh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clogin`
--
ALTER TABLE `clogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `USN` (`USN`,`Email`);

--
-- Indexes for table `hlogin`
--
ALTER TABLE `hlogin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`,`Email`);

--
-- Indexes for table `plogin`
--
ALTER TABLE `plogin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`,`Email`);

--
-- Indexes for table `prilogin`
--
ALTER TABLE `prilogin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`,`Email`);

--
-- Indexes for table `slogin`
--
ALTER TABLE `slogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `USN` (`USN`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clogin`
--
ALTER TABLE `clogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hlogin`
--
ALTER TABLE `hlogin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plogin`
--
ALTER TABLE `plogin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prilogin`
--
ALTER TABLE `prilogin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slogin`
--
ALTER TABLE `slogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
