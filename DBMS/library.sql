-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 08:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contract` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `firstname`, `lastname`, `username`, `password`, `contract`, `email`, `photo`) VALUES
(1, 'Ahad', 'pathan', 'ahadPathan$', '852', 184392010, 'ahadcseuits@gmail.com', 'ahad.png0ac0b3573c.png');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `author`, `edition`, `status`, `quantity`, `department`) VALUES
(1, 'The Digital signal', 'MD Ahad Pathan', '5th', 'Available', 2, 'EEE'),
(2, 'Computer Signal', 'Md Shohag Gazi', '10th', 'Available', 1, 'CSE'),
(3, 'Phaysics', 'Bappy', '10th', 'Available', 2, 'EEE'),
(4, 'English', 'Mahmud', '12th', 'Available', 5, 'English\r\n'),
(6, 'Java', 'Hoston', '1st', 'Available', 5, 'cse'),
(10, 'C', 'Kabir', '5th', 'Available', 4, 'cse'),
(11, 'Web development', 'Mahmuz', '1st', 'Available', 5, 'cse');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `feedback`, `type`) VALUES
(1, 'Ahad', 'hi....', 'admin'),
(2, 'Kadir', 'hello', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `username` varchar(100) NOT NULL,
  `bid` int(11) NOT NULL,
  `returned` varchar(100) NOT NULL,
  `roll` varchar(10) NOT NULL,
  `ammount` varchar(100) NOT NULL,
  `days_left` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`username`, `bid`, `returned`, `roll`, `ammount`, `days_left`, `status`) VALUES
('Asma', 2, '2020-03-30', '1734251015', '0', '0', 'Paid'),
('jhuma', 1, '2020-03-30', '1734251004', '3', '1', 'Paid'),
('jhuma', 2, '2020-03-30', '1734251004', '3', '1', 'Paid'),
('jhuma', 2, '2020-03-30', '1734251004', '', '', 'Paid'),
('jhuma', 2, '2020-03-30', '1734251004', '0', '0', 'Paid'),
('jhuma', 2, '2020-03-30', '1734251004', '0', '0', 'Paid'),
('Asma', 1, '2020-03-30', '1734251015', '0', '0', 'Not Paid'),
('jhuma', 3, '2020-03-31', '1734251004', '6', '2', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `username` varchar(100) NOT NULL,
  `rolls` int(100) NOT NULL,
  `bid` int(11) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issueDate` varchar(100) NOT NULL,
  `returnDate` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `expand_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`username`, `rolls`, `bid`, `approve`, `issueDate`, `returnDate`, `status`, `expand_date`) VALUES
('jhuma', 1734251004, 2, 'Returned', '2020-03-28', '2020-03-29', '', ''),
('Asma', 1734251015, 1, 'Yeas', '2020-04-02', '2020-04-08', 'accepted', ''),
('jhuma', 1734251004, 3, 'Returned', '2020-03-25', '2020-03-28', '', ''),
('jhuma', 1734251004, 10, 'Yeas', '2020-03-27', '2020-04-05', 'accepted', ''),
('Asma', 1734251015, 1, 'Yeas', '2020-04-02', '2020-04-08', 'accepted', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `roll` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `photo` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `firstname`, `lastname`, `username`, `password`, `roll`, `email`, `photo`) VALUES
(1, 'Asma', 'Khatun', 'AsmaKhatun123$', 'ahadPathan5$', 1734251015, 'asma@gmail.com', 'ahad.png03e9da2341.png'),
(2, 'jhuma', 'akter', 'jhumakter123@', 'ahadPathan5$', 1734251004, 'jhumaakter@gmail.com', 'ahad1.pngc562698796.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
