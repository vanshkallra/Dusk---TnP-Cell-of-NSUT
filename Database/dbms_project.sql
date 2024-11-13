-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2024 at 11:29 AM
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
-- Database: `dbms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `student_id`, `job_id`, `application_date`, `status`) VALUES
(1, 1, 1, '2024-10-01', 'Applied'),
(2, 2, 2, '2024-10-02', 'Interview Scheduled'),
(3, 3, 3, '2024-10-03', 'Rejected'),
(4, 4, 4, '2024-10-04', 'Accepted'),
(5, 5, 5, '2024-10-05', 'Applied'),
(6, 1, 6, '2024-10-06', 'Interview Scheduled'),
(7, 2, 7, '2024-10-07', 'Rejected'),
(8, 3, 8, '2024-10-08', 'Accepted'),
(9, 4, 9, '2024-10-09', 'Applied'),
(10, 5, 10, '2024-10-10', 'Interview Scheduled'),
(12, 16, 1, '2024-11-07', 'Pending'),
(15, 16, 2, '2024-11-07', 'Pending'),
(16, 17, 3, '2024-11-07', 'Pending'),
(17, 18, 8, '2024-11-07', 'Pending'),
(18, 20, 4, '2024-11-07', 'Pending'),
(19, 16, 8, '2024-11-08', 'Pending'),
(20, 16, 5, '2024-11-08', 'Pending'),
(21, 16, 14, '2024-11-08', 'Accepted'),
(22, 17, 14, '2024-11-08', 'Pending'),
(23, 20, 14, '2024-11-08', 'Pending'),
(24, 18, 14, '2024-11-08', 'Accepted'),
(25, 21, 14, '2024-11-08', 'Accepted'),
(26, 16, 15, '2024-11-08', 'Pending'),
(27, 22, 8, '2024-11-08', 'Pending'),
(28, 22, 4, '2024-11-08', 'Pending'),
(29, 22, 5, '2024-11-08', 'Pending'),
(30, 22, 14, '2024-11-08', 'Pending'),
(31, 16, 16, '2024-11-08', 'Accepted'),
(32, 23, 1, '2024-11-08', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `Apply`
--

CREATE TABLE `Apply` (
  `student_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Apply`
--

INSERT INTO `Apply` (`student_id`, `job_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 1),
(7, 2),
(8, 3),
(9, 4),
(10, 5),
(16, 1),
(16, 2),
(16, 5),
(16, 8),
(16, 14),
(16, 15),
(16, 16),
(17, 3),
(17, 14),
(18, 8),
(18, 14),
(20, 4),
(20, 14),
(21, 14),
(22, 4),
(22, 5),
(22, 8),
(22, 14),
(23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

CREATE TABLE `Company` (
  `company_id` int(11) NOT NULL,
  `USN` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `industry` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Company`
--

INSERT INTO `Company` (`company_id`, `USN`, `company_name`, `email`, `industry`, `location`, `contact_person`) VALUES
(1, 'techsolutions', 'Tech Solutions', 'contact@techsolutions.com', 'IT', 'New York', 'Alice Brown'),
(2, 'innovate_corp', 'Innovate Corp', 'info@innovatecorp.com', 'Manufacturing', 'San Francisco', 'Bob Smith'),
(3, 'health', 'Health Inc.', 'support@healthinc.com', 'Healthcare', 'Chicago', 'Charlie Green'),
(4, 'edutech', 'EduTech', 'info@edutech.com', 'Education', 'Austin', 'Diana White'),
(5, 'financeplus', 'Finance Plus', 'contact@financeplus.com', 'Finance', 'Miami', 'Eve Black'),
(6, 'autoworks', 'AutoWorks', 'info@autoworks.com', 'Automotive', 'Detroit', 'Frank Castle'),
(7, 'greentech', 'GreenTech', 'contact@greentech.com', 'Renewable Energy', 'Seattle', 'Grace Lee'),
(8, 'buildit', 'BuildIt', 'info@buildit.com', 'Construction', 'Los Angeles', 'Hank Jones'),
(9, 'foodco', 'FoodCo', 'support@foodco.com', 'Food Industry', 'Boston', 'Ivy Chen'),
(10, 'smartdev', 'SmartDevices', 'contact@smartdevices.com', 'Electronics', 'San Diego', 'Jack Sparrow'),
(11, 'technosol', 'Techno Solutions', 'technosolutions@gmail.com', 'IT', 'Dwarka', 'Vansh'),
(12, 'kaniktech', 'Kanik Tech', 'kaniktech@gmail.com', 'IT', 'Dwarka', 'Kanik');

-- --------------------------------------------------------

--
-- Table structure for table `Job`
--

CREATE TABLE `Job` (
  `job_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `job_description` text DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `requirements` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Job`
--

INSERT INTO `Job` (`job_id`, `company_id`, `job_title`, `job_description`, `salary`, `location`, `requirements`) VALUES
(1, 1, 'Software Engineer', 'Develop software applications', 70000.00, 'New York', 'BSc in Computer Science'),
(2, 2, 'Production Engineer', 'Oversee manufacturing processes', 65000.00, 'San Francisco', 'BEng in Mechanical Engineering'),
(3, 3, 'Data Analyst', 'Analyze data to improve business decisions', 60000.00, 'Chicago', 'BSc in Data Science'),
(4, 4, 'Project Manager', 'Manage educational projects', 75000.00, 'Austin', 'MBA or equivalent'),
(5, 5, 'Financial Analyst', 'Analyze financial data', 80000.00, 'Miami', 'BSc in Finance'),
(6, 6, 'Automotive Engineer', 'Design and test vehicles', 70000.00, 'Detroit', 'BEng in Automotive Engineering'),
(7, 7, 'Sustainability Consultant', 'Advise on green practices', 90000.00, 'Seattle', 'BSc in Environmental Science'),
(8, 8, 'Construction Manager', 'Oversee construction projects', 85000.00, 'Los Angeles', 'BSc in Civil Engineering'),
(9, 9, 'Quality Assurance Analyst', 'Ensure product quality', 55000.00, 'Boston', 'BSc in Quality Management'),
(10, 10, 'Embedded Systems Engineer', 'Develop embedded systems', 72000.00, 'San Diego', 'BEng in Electrical Engineering'),
(11, 10, 'AI Engineer', 'Develop AI systems', 72000.00, 'San Diego', 'BTech in Computer Engineering'),
(12, 9, 'food engineer', 'food solutions technician', 25000.00, NULL, '0'),
(13, 6, 'Mechanical Technician', 'Robotics Mechanical Team', 30000.00, 'Bangalore', 'BE in Mechanical Engineering'),
(14, 11, 'Technical Assistant', 'Technical assistant for our core teams', 15000.00, 'Gurgaon', 'Bachelor of Technology in any branch'),
(15, 11, 'SDE', 'Software Developer', 75000.00, 'New Jersey', 'BE in CSE'),
(16, 12, 'SDE', 'Software Developer', 100000.00, 'Dwarka', 'BE in CSE');

-- --------------------------------------------------------

--
-- Table structure for table `Offer`
--

CREATE TABLE `Offer` (
  `offer_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `offer_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Offer`
--

INSERT INTO `Offer` (`offer_id`, `job_id`, `student_id`, `offer_date`) VALUES
(1, 1, 1, '2024-10-15'),
(2, 2, 2, '2024-10-16'),
(3, 3, 3, '2024-10-17'),
(4, 4, 4, '2024-10-18'),
(5, 5, 5, '2024-10-19'),
(6, 6, 1, '2024-10-20'),
(7, 7, 2, '2024-10-21'),
(8, 8, 3, '2024-10-22'),
(9, 9, 4, '2024-10-23'),
(10, 10, 5, '2024-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `Placed`
--

CREATE TABLE `Placed` (
  `placed_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `placement_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Placed`
--

INSERT INTO `Placed` (`placed_id`, `student_id`, `job_id`, `placement_date`) VALUES
(1, 1, 1, '2024-10-30'),
(2, 2, 2, '2024-10-31'),
(3, 3, 3, '2024-11-01'),
(4, 4, 4, '2024-11-02'),
(5, 5, 5, '2024-11-03'),
(6, 6, 1, '2024-11-04'),
(7, 7, 2, '2024-11-05'),
(8, 8, 3, '2024-11-06'),
(9, 9, 4, '2024-11-07'),
(10, 10, 5, '2024-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `student_id` int(11) NOT NULL,
  `FirstName` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `LastName` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `USN` varchar(15) NOT NULL,
  `Mobile` bigint(11) DEFAULT NULL,
  `DOB` date NOT NULL,
  `Sem` int(11) NOT NULL,
  `Email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Branch` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `SSLC` float NOT NULL,
  `PU/Dip` float NOT NULL,
  `BE` float NOT NULL,
  `Backlogs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`student_id`, `FirstName`, `LastName`, `USN`, `Mobile`, `DOB`, `Sem`, `Email`, `Branch`, `SSLC`, `PU/Dip`, `BE`, `Backlogs`) VALUES
(1, 'Alice Smith', '', '', 1234567890, '0000-00-00', 0, 'alice@example.com', 'Computer Science', 0, 0, 0, 0),
(2, 'Bob Johnson', '', '', 2345678901, '0000-00-00', 0, 'bob@example.com', 'Electrical Engineering', 0, 0, 0, 0),
(3, 'Charlie Brown', '', '', 3456789012, '0000-00-00', 0, 'charlie@example.com', 'Mechanical Engineering', 0, 0, 0, 0),
(4, 'Diana Prince', '', '', 4567890123, '0000-00-00', 0, 'diana@example.com', 'Civil Engineering', 0, 0, 0, 0),
(5, 'Eve Adams', '', '', 5678901234, '0000-00-00', 0, 'eve@example.com', 'Information Technology', 0, 0, 0, 0),
(6, 'Frank Castle', '', '', 6789012345, '0000-00-00', 0, 'frank@example.com', 'Computer Science', 0, 0, 0, 0),
(7, 'Grace Lee', '', '', 7890123456, '0000-00-00', 0, 'grace@example.com', 'Information Technology', 0, 0, 0, 0),
(8, 'Harry Potter', '', '', 8901234567, '0000-00-00', 0, 'harry@example.com', 'Mechanical Engineering', 0, 0, 0, 0),
(9, 'Ivy Chen', '', '', 9012345678, '0000-00-00', 0, 'ivy@example.com', 'Civil Engineering', 0, 0, 0, 0),
(10, 'Jack Sparrow', '', '', 123456789, '0000-00-00', 0, 'jack@example.com', 'Electrical Engineering', 0, 0, 0, 0),
(11, 'Lily Collins', '', '', 1234567890, '0000-00-00', 0, 'lily@example.com', 'Business Administration', 0, 0, 0, 0),
(12, 'Mason Gray', '', '', 2345678901, '0000-00-00', 0, 'mason@example.com', 'Computer Science', 0, 0, 0, 0),
(13, 'Nina Williams', '', '', 3456789012, '0000-00-00', 0, 'nina@example.com', 'Civil Engineering', 0, 0, 0, 0),
(14, 'Oscar Wilde', '', '', 4567890123, '0000-00-00', 0, 'oscar@example.com', 'Mechanical Engineering', 0, 0, 0, 0),
(15, 'Paula Patton', '', '', 5678901234, '0000-00-00', 0, 'paula@example.com', 'Information Technology', 0, 0, 0, 0),
(16, 'Vansh', 'Kalra', '2023UCM2372', 8368651240, '2005-03-16', 1, 'vanshkalra@gmail.com', 'BScience', 96, 95, 8.2, 0),
(17, 'Govind', 'P', '2023UCM2319', 3838233233, '2003-01-11', 3, 'govind@gmail.com', 'CSE', 96, 95, 8.5, 0),
(18, 'Ram', 'Shyam', '2023UCM2399', 8368651240, '2003-11-11', 2, 'ram@gmail.com', 'CSE', 96, 95, 8.2, 0),
(19, 'Ram', 'Shyam', '2023UCM2399', 8368651240, '2003-11-11', 2, 'ram@gmail.com', 'CSE', 96, 95, 8.2, 0),
(20, 'Swarit', 'kumar', '2023UCM23452', 1234567890, '2003-02-11', 3, 'vanshkalra@gmail.com', 'BScience', 100, 95, 9.2, 8),
(21, 'Shivam', 'Mishra', '2023UCM2370', 8368651242, '2004-11-03', 3, 'shivammishra@gmail.com', 'BScience', 96, 95, 8.5, 0),
(22, 'Lakshay', 'Gupta', '2023UCM2357', 32323233, '2000-11-11', 1, 'lakshay@gmail.com', 'select', 96, 95, 8.2, 0),
(23, 'Vansh', 'Kalra', '2023UCM2311', 8282828222, '2005-03-16', 1, 'vanshkalra@gmail.com', 'BScience', 96, 95, 9.2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `application_ibfk_2` (`student_id`),
  ADD KEY `application_ibfk_1` (`job_id`);

--
-- Indexes for table `Apply`
--
ALTER TABLE `Apply`
  ADD PRIMARY KEY (`student_id`,`job_id`),
  ADD KEY `apply_ibfk_2` (`job_id`);

--
-- Indexes for table `Company`
--
ALTER TABLE `Company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `Job`
--
ALTER TABLE `Job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `job_ibfk_1` (`company_id`);

--
-- Indexes for table `Offer`
--
ALTER TABLE `Offer`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `offer_ibfk_2` (`student_id`),
  ADD KEY `offer_ibfk_1` (`job_id`);

--
-- Indexes for table `Placed`
--
ALTER TABLE `Placed`
  ADD PRIMARY KEY (`placed_id`),
  ADD KEY `placed_ibfk_1` (`student_id`),
  ADD KEY `placed_ibfk_2` (`job_id`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Company`
--
ALTER TABLE `Company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Job`
--
ALTER TABLE `Job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `Student` (`student_id`);

--
-- Constraints for table `Apply`
--
ALTER TABLE `Apply`
  ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `Student` (`student_id`),
  ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

--
-- Constraints for table `Job`
--
ALTER TABLE `Job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `Company` (`company_id`);

--
-- Constraints for table `Offer`
--
ALTER TABLE `Offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `Student` (`student_id`);

--
-- Constraints for table `Placed`
--
ALTER TABLE `Placed`
  ADD CONSTRAINT `placed_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `Student` (`student_id`),
  ADD CONSTRAINT `placed_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
