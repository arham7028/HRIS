-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 01:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `sharp_emp`
--

CREATE TABLE `sharp_emp` (
  `id` int(11) NOT NULL,
  `employee_id` text DEFAULT NULL,
  `first_name` text NOT NULL,
  `middle_name` text DEFAULT NULL,
  `last_name` text NOT NULL,
  `phone` int(11) NOT NULL,
  `employee_image` text NOT NULL,
  `id_type` text NOT NULL,
  `id_number` text NOT NULL,
  `id_card_image` text NOT NULL,
  `residence_address` text NOT NULL,
  `residence_location` text NOT NULL,
  `residence_direction` text NOT NULL,
  `residence_gps` text NOT NULL,
  `next_of_kin` text NOT NULL,
  `relationship` text NOT NULL,
  `phone_of_kin` text NOT NULL,
  `kin_residence` text NOT NULL,
  `kin_residence_direction` text NOT NULL,
  `date_employed` date NOT NULL,
  `job_type` text NOT NULL,
  `status` text NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sharp_emp`
--

INSERT INTO `sharp_emp` (`id`, `employee_id`, `first_name`, `middle_name`, `last_name`, `phone`, `employee_image`, `id_type`, `id_number`, `id_card_image`, `residence_address`, `residence_location`, `residence_direction`, `residence_gps`, `next_of_kin`, `relationship`, `phone_of_kin`, `kin_residence`, `kin_residence_direction`, `date_employed`, `job_type`, `status`, `password`) VALUES
(1, '1', 'Syed', 'Arham', 'Abbas', 2147483647, 'PRCaN8KLwJv7zgS_pic.jpg', 'Voter\'s', 'IN356753227', 'Zl4QWat0pHfFxgP_sign.jpg', 'Somwarpet, Akolibess, Barshitakli', '20.575126, 77.064225', 'near India Medical', '444401 Barshitakli', 'Kin data ', 'need to know', '1234567890', 'not required', 'will be given soon', '2024-03-28', 'Developer', 'employee', ''),
(2, '2', 'Shikar', '', 'Dhawan', 2147483647, '95Z2D46zSNqClHa_IMG_3801.JPG', 'NHIS', 'PJ542786573', 'HzAxmG6N8iX1lLs_IMG_4057.JPG', 'Panjab', '20.697516, 77.005021', 'NH 2', '7770 08', 'Syed Arham Abbas', 'Friend', '07028566601', 'Somwarpet, Akolibess, Barshitakli', 'Akola', '1900-10-27', 'Cricketer', 'employee', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `accounttype` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `accounttype`) VALUES
(1, 'Maxwell', 'Morrison', 'xxx2xy', '10a55271c201e41913764ff95b33248b', 'Admin'),
(3, 'Maxwell', 'Morrison', 'admins', '$2y$10$o9cuEOVMzBniaayx4jewR.3Clv3sdvRwngvrQJNuDPbQdlqH0IPP.', 'Admin'),
(4, 'Arham', 'Abbas', 'arham2211', 'b2141c891f8e6170db1d1430d70bd517', 'Admin'),
(5, 'Harshal', 'Rabade', 'harshal', 'e718da95fcbf01b577f1b19c0135ce79', 'Employee'),
(6, 'Harshal', 'Rabade', 'harshal123', '3b67db5f6fd53aa0348c055e84484ad4', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sharp_emp`
--
ALTER TABLE `sharp_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sharp_emp`
--
ALTER TABLE `sharp_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
