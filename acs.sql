-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 12:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acs`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `date` date NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `date`, `image`) VALUES
(1, 'sachin', 'patel', 'Myth', 'sachin1234@gmail.com', '$2y$04$MVukMDZzmi5vEcoAmvhQReA4bJsjHlr2mQMaGEJPH8gMkUb8bDEiW', '2023-03-19', NULL),
(9, 'asd', 'dsa', 'asddsa', 'asd@gmail.com', '$2y$04$9HjGkSvWMisaHaRUb8VWweZpmnvr1sCltv911C0HTfPMdqCYiXvSm', '2023-04-01', NULL),
(10, 'harsa', 'maheta', 'meta', 'meta@gmail.com', '$2y$04$T8yFfWtw/DvU8YWuiIc5RuqOCNMYW1ANgESbncOLbuqT9DlnDaiWe', '2023-04-01', NULL),
(11, 'harsaug', 'mahetajk', 'metahj', 'metajk@gmail.com', '$2y$04$Jw6bdES0qu21pFcJHP0SI.MnDgfOWibio.UQr7tFEK/GQPHYrVG7y', '2023-04-01', NULL),
(12, 'harsaugkjfs', 'mahetajkdf', 'metahjfd', 'metajkff@gmail.com', '$2y$04$xvIiBjWQRYhJtNmaH8EJXe8g3FnChwEeLQLCaid9OBDj86kBO56cS', '2023-04-01', NULL),
(13, 'wergh', 'weqwerty', 'sedfghj', 'sdfgh@sdfgh.dfg', '$2y$04$EB.1X1imfYPzXc1PtfIEwOiAWkLfDFITjh7udCt/puzNF5ULawBki', '2023-04-01', NULL),
(14, 'harsa', 'gupta', 'harsa', 'sachin@ismt.edu.np', '$2y$04$AA/rwOCuU8EM7g61IqUKWu0VjJsiEi/YMaiFPvBvJqlboxMyLdGJu', '2023-04-01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
