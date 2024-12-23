-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 01:13 PM
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
-- Database: `hris`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin_mail` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `admin_mail`, `password`, `profilePic`, `type`) VALUES
(13, 'Syed Abbas', 'abbas.sa@gmail.com', '$2y$10$JaT3sB7qqdKT7n..zJiFeu9G2BZXFcI8WWoZBtTBJaUhYvIIiDQfq', '65e9348ed2cd4.jpg', 'no'),
(14, 'Harshal Rabade', 'harshal1@gmail.com', '$2y$10$yIdLHURNe3Y9E21d.StWE.ilDe.94ESS42OMWpRk4ohyfIhp/htZm', '65edcc9494669.png', 'yes'),
(15, 'Rohit Wankhede', 'rohit1@gmail.com', '$2y$10$s.XGIS29q1dmSMmaIoQteuF3RKMxR101f47YQY4OK06bg0S89NNVq', '65edce86df35d.jpg', 'no'),
(16, 'Roshan Tajne', 'roshan1@gmail.com', '$2y$10$33v4GyOwxscMlu8OclNVke5lgkrdx4vz2C7427X32NkE7duTqkNrW', '65edd5bba277c.jpg', 'no'),
(18, 'Maddy', 'maddy@gmail.com', '$2y$10$o9cuEOVMzBniaayx4jewR.3Clv3sdvRwngvrQJNuDPbQdlqH0IPP.', '660553f4b4801.jpg', 'yes'),
(19, 'Tejas TAyade', 'tejas@gmail.com', '$2y$10$6dPvOq1WwM0aWTKUazJgkO4g9o3oWTfu3xs2XbCz.FUZt/bhnMNSS', '6642270f19fc9.jpg', 'no'),
(20, 'Dhiraj Sharma', 'dhiraj@gmail.com', '$2y$10$qVvXNDb0ZdGn2XejYPMZrOd7DXqSIbho96gfzHBSQiKMCtQJeY4fW', '66575e07acaf4.jpg', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `postContent` text NOT NULL,
  `postDate` varchar(20) NOT NULL,
  `admin` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `postContent`, `postDate`, `admin`, `title`, `status`, `post`) VALUES
(11, 'HRIS is a website which lets you submit an article which upon approval will be up on our website and you can get a good amount of reached from here!', '2024-03-09', 16, 'My First Blog', 'video', 'https://www.youtube.com/embed/GAHaSS28tTw?si=os7vNHvPZo2VsgiB'),
(12, 'In communications and information processing, code is a system of rules to convert information—such as a letter, word, sound, image, or gesture—into another form, sometimes shortened or secret, for communication through a communication channel or storage in a storage medium. An early example is the invention of language, which enabled a person, through speech, to communicate what they thought, saw, heard or felt to others. But speech limits the range of communication to the distance a voice can carry, and limits the audience to those present when the speech is uttered . The invention of writing, which converted spoken language into visual symbols, extended the range of communication across space and time. The process of encoding converts information from a source into symbols for communication or storage. Decoding is the reverse process, converting code symbols back into a form that the recipient understands, such as English or/and Spanish. One reason for coding is to enable communication in places where ordinary plain language, spoken or written, is difficult or impossible. For example, semaphore, where the configuration of flags held by a signaler or the arms of a semaphore tower encodes parts of the message, typically individual letters and numbers. Another person standing a great distance away can interpret the flags and reproduce the words sent.\n\nIn communications and information processing, code is a system of rules to convert information—such as a letter, word, sound, image, or gesture—into another form, sometimes shortened or secret, for communication through a communication channel or storage in a storage medium. An early example is the invention of language, which enabled a person, through speech, to communicate what they thought, saw, heard or felt to others. ', '2024-04-06', 13, 'HRIS is a website which lets you submit an article.', 'status', 'https://www.youtube.com/embed/Ut2jlLOGKkg?si=TFDE-fsWQs8uVUhLhttps://www.youtube.com/embed/Ut2jlLOGKkg?si=TFDE-fsWQs8uVUhL'),
(13, 'But speech limits the range of communication to the distance a voice can carry, and limits the audience to those present when the speech is uttered . The invention of writing, which converted spoken language into visual symbols, extended the range of communication across space and time. The process of encoding converts information from a source into symbols for communication or storage. Decoding is the reverse process, converting code symbols back into a form that the recipient understands, such as English or/and Spanish. One reason for coding is to enable communication in places where ordinary plain language, spoken or written, is difficult or impossible. For example, semaphore, where the configuration of flags held by a signaler or the arms of a semaphore tower encodes parts of the message, typically individual letters and numbers. Another person standing a great distance away can interpret the flags and reproduce the words sent.\n\nIn communications and information processing, code is a system of rules to convert information—such as a letter, word, sound, image, or gesture—into another form, sometimes shortened or secret, for communication through a communication channel or storage in a storage medium. An early example is the invention of language, which enabled a person, through speech, to communicate what they thought, saw, heard or felt to others. But speech limits the range of communication to the distance a voice can carry, and limits the audience to those present when the speech is uttered . The invention of writing, which converted spoken language into visual symbols, extended the range of communication across space and time. The process of encoding converts information from a source into symbols for communication or storage. Decoding is the reverse process, converting code symbols back into a form that the recipient understands, such as English or/and Spanish. One reason for coding is to enable communication in places where ordinary plain language, spoken or written, is difficult or impossible. For example, semaphore, where the configuration of flags held by a signaler or the arms of a semaphore tower encodes parts of the message, typically individual letters and numbers. Another person standing a great distance away can interpret the flags and reproduce the words sent.', '2024-12-12', 14, 'Direct post', 'status', 'https://www.youtube.com/embed/AHZpyENo7k4?si=lGwELAKBYCqvwQe5'),
(14, 'In communications and information processing, code is a system of rules to convert information—such as a letter, word, sound, image, or gesture—into another form, sometimes shortened or secret, for communication through a communication channel or storage in a storage medium. An early example is the invention of language, which enabled a person, through speech, to communicate what they thought, saw, heard or felt to others. But speech limits the range of communication to the distance a voice can carry, and limits the audience to those present when the speech is uttered . The invention of writing, which converted spoken language into visual symbols, extended the range of communication across space and time. The process of encoding converts information from a source into symbols for communication or storage. Decoding is the reverse process, converting code symbols back into a form that the recipient understands, such as English or/and Spanish. One reason for coding is to enable communication in places where ordinary plain language, spoken or written, is difficult or impossible. For example, semaphore, where the configuration of flags held by a signaler or the arms of a semaphore tower encodes parts of the message, typically individual letters and numbers. Another person standing a great distance away can interpret the flags and reproduce the words sent.', '2024-02-18', 15, 'Itachi', 'status', 'https://www.youtube.com/embed/mMK06bxzcVs?si=CY-ImskccEB146-t');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categorie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categorie`) VALUES
(2, 'Plumbing'),
(6, 'Electric'),
(8, 'Welding'),
(9, 'Agriculture'),
(10, 'Computer'),
(11, 'Local');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `courseId` int(11) NOT NULL,
  `lectureName` text NOT NULL,
  `cover` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `content`, `courseId`, `lectureName`, `cover`) VALUES
(1, '<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube.com/embed/nDAjmLcyiIc\" title=\"YouTube video player\" width=\"560\"></iframe></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:24px\"><span style=\"color:#4e5f70\">Need To Know In Mind Part 1</span></span></p>\r\n\r\n<p>Student Management System | Student Registration System in Java Complete Project Complete student registration system. In this project you will learn how to create a project in short time period. How to insert, retrieve, delete, update and search data in java. How to make connection with SQL XAMPP in java? Facebook: https://www.facebook.com/ExceptionalProgrammer.</p>\r\n', 2, 'Basic Structure Of The Building', '6651c95682675.jpg'),
(2, '<p>content insert.</p>\r\n', 4, 'Lecture 1', '65f6a06a175cf.jpg'),
(3, '<p><iframe align=\"top\" frameborder=\"0\" height=\"70\" name=\"Learner\" scrolling=\"no\" src=\"https://www.youtube.com/embed/AHZpyENo7k4?si=lGwELAKBYCqvwQe5\" width=\"70\"></iframe>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">This is a title</p>\r\n\r\n<p>Hello this is my content</p>\r\n', 2, 'Lecture 2', '65f2b625cb1b7.jpg'),
(4, '<p><iframe align=\"right\" frameborder=\"0\" height=\"1000\" name=\"Sample\" scrolling=\"no\" src=\"https://www.youtube.com/embed/Ut2jlLOGKkg?si=TFDE-fsWQs8uVUhLhttps://www.youtube.com/embed/Ut2jlLOGKkg?si=TFDE-fsWQs8uVUhL\" width=\"1000\"></iframe></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">Title: Nothing</p>\r\n\r\n<p>Student Management System | Student Registration System in Java Complete Project Complete student registration system. In this project you will learn how to create a project in short time period. How to insert, retrieve, delete, update and search data in java. How to make connection with SQL XAMPP in java? Facebook: https://www.facebook.com/ExceptionalProgrammers</p>\r\n', 4, 'Lecture 4', '65f2b809d484a.jpg'),
(5, '<p><iframe align=\"top\" frameborder=\"0\" height=\"100\" scrolling=\"no\" src=\"https://www.youtube.com/embed/GAHaSS28tTw?si=os7vNHvPZo2VsgiB\" width=\"100\"></iframe></p>\n\n<p style=\"text-align:center\">Title</p>\n\n<p style=\"text-align:justify\">asdfg sdf sdfgh</p>\n', 2, 'Lecture 3', '65f6a00641e9f.jpg'),
(6, '<p><iframe align=\"top\" frameborder=\"0\" height=\"100\" scrolling=\"no\" src=\"https://www.youtube.com/embed/GAHaSS28tTw?si=os7vNHvPZo2VsgiB\" width=\"100\"></iframe></p>\r\n\r\n<p style=\"text-align:center\">Title</p>\r\n\r\n<p style=\"text-align:justify\">update</p>\r\n', 4, 'Lecture 4', '65f6a02ebc234.jpg'),
(7, '<p><iframe align=\"top\" frameborder=\"0\" height=\"100\" scrolling=\"no\" src=\"https://www.youtube.com/embed/GAHaSS28tTw?si=os7vNHvPZo2VsgiB\" width=\"100\"></iframe></p>\n\n<p style=\"text-align:center\">Title</p>\n\n<p style=\"text-align:justify\">asdfg sdf sdfgh</p>\n', 7, 'Lecture: 1', '65f6a0ee8520c.jpg'),
(8, '<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>Milk Processing</strong></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p><a href=\"https://www.istockphoto.com/photo/yogurt-production-line-gm1203394519-345860830?utm_source=pixabay&amp;utm_medium=affiliate&amp;utm_campaign=SRP_image_sponsored&amp;utm_content=https%3A%2F%2Fpixabay.com%2Fimages%2Fsearch%2Fdairy%2520milk%2520processing%2F&amp;utm_term=dairy+milk+processing\"><img alt=\"Not load\" longdesc=\"https://www.istockphoto.com/photo/yogurt-production-line-gm1203394519-345860830?utm_source=pixabay&amp;utm_medium=affiliate&amp;utm_campaign=SRP_image_sponsored&amp;utm_content=https%3A%2F%2Fpixabay.com%2Fimages%2Fsearch%2Fdairy%2520milk%2520processing%2F&amp;utm_term=dairy+milk+processing\" src=\"https://media.istockphoto.com/id/1203394519/photo/yogurt-production-line.jpg?s=1024x1024&amp;w=is&amp;k=20&amp;c=doqnKlixkmii0t_G0vrJ3GJh570brzrj_wnhAIPNW8Y=\" style=\"float:left; height:200px; margin:10px 50px; width:200px\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Milk is considered one of the most nutritious foods that are consumed by people worldwide. The milk undergoes processing to increase the variety of nutrients. The processing of milk includes various operations ranging from collecting milk from the farm, storing milk in tanks, separating, pasteurizing and homogenizing to improve the quality of the milk.The milk processing equipment typically consists of milk tanks that are used to store all kinds of milk raw, skimmed or cream, pasteurizers where the bacteria in the milk are killed and enzymatic activity is reduced, separators which prevent the entry of destructive air after pasteurization to ensure product quality and homogenizers that improve the taste, texture and other organoleptic properties of the milk.</p>\r\n\r\n<p><iframe align=\"middle\" frameborder=\"0\" height=\"400\" scrolling=\"no\" src=\"https://www.youtube.com/embed/7TMtA8Eh9uE?si=fumi8l7LrD9m_65p\" width=\"600\"></iframe></p>\r\n\r\n<h2><strong>Steps involved in milk processing</strong></h2>\r\n\r\n<p>Steps involved in milk processing are:</p>\r\n\r\n<ul>\r\n	<li>Milking is done twice a day, the process is mechanical in big farms. Temperature and taste of the milk is checked at this stage</li>\r\n	<li>The milk is transferred to large refrigerated tanks in which it is transported to the processing units through huge trucks</li>\r\n	<li>Separation and clarification of the milk takes place in separators to separate milk from germs and useless remains</li>\r\n	<li>Fortification of milk with minerals and vitamins takes place after separation and clarification</li>\r\n	<li>Pasteurization of the milk takes place which involves heating the milk to kill harmful microorganisms</li>\r\n	<li>Homogenization removes fat from the milk</li>\r\n	<li>Milk is then packed in cartons or plastic covers. Labelling is done with the expiry date and the packs are distributed to different states</li>\r\n</ul>\r\n\r\n<h3><strong>Pasteurization</strong></h3>\r\n\r\n<p>Pasteurization refers to the process of heating a liquid to below the boiling point to destroy microorganisms. The process was named after its developer, Louis Pasteur who implied it initially to improve the keeping quality of the wine. Commercial pasteurization of milk gained its importance in the late 1880s in Europe and the early 1900s in the USA. Common milk-borne diseases such as typhoid, scarlet fever, septic sore throat, diphtheria and diarrhoea can be virtually eliminated by implementing pasteurization.</p>\r\n\r\n<p>The main motto behind pasteurization was to control tuberculosis causing bacteria, which is no longer a concern as cows are tested for TB annually and removed from herds and treated if shown positive. However, the need for pasteurization persists as milk acts as a rich medium for the growth of various pathogenic bacteria such as&nbsp;<em>Salmonella</em>&nbsp;spp.,&nbsp;<em>Escherichia coli&nbsp;</em>and&nbsp;<em>Listeria monocytogens.</em>&nbsp;The PasLite test is universally accepted by dairy industries and food manufacturers to confirm if the milk products are properly pasteurized. This test detects the presence of alkaline phosphatase, an enzyme that is naturally present in the milk and destroyed by the heat and holding period of pasteurization.</p>\r\n\r\n<h3><strong>Pasteurization conditions</strong></h3>\r\n\r\n<p>Pasteurization can be a batch or continuous process. The pasteurization conditions that are in use today are&nbsp;62.8C&nbsp;for 30 minutes for a batch process or&nbsp;71.7C for 15 seconds for a continuous process. However, different milk products have different conditions for pasteurization. Continuous high-temperature Short Time (HTST), Continuous Higher Heat Shorter Time (HHST), continuous ultra-pasteurization and aseptic Ultra High Temperature (UHT) are various types of pasteurization. Canned products are usually sterilized at 115.6C for 20 mins.</p>\r\n', 9, 'Milk Processing', '65fbee4181a55.jpg'),
(9, '<p>Heading</p>\r\n', 12, 'Lecture 1', '6622129023729.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `cover` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categorieId` int(11) NOT NULL,
  `instructorId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `cover`, `description`, `categorieId`, `instructorId`, `bookId`) VALUES
(2, 'Plumbing in big construction', '789056.jpeg', 'Plumbing is a vital part of any construction project, from residential homes to commercial office buildings. Plumbing work includes everything from installing pipes and fixtures to troubleshooting leaks and repairing broken pipes.', 2, 1, 1),
(5, 'Plumbing in Hotel', '345123.webp', 'Its a course for the beginners which provide the expertise in the plumbing from the very basic level!!!', 2, 1, 2),
(7, 'Machine Binding', '894567.webp', 'All machine binding from zero level', 6, 3, 2),
(12, 'DSA with Java', '5555678.png', 'Description Plumbing is a vital part of any construction project, from residential homes to commercial office buildings. Plumbing work includes everything from installing pipes and fixtures to troubleshooting leaks and repairing broken pipes.', 10, 5, 2),
(13, 'Plumbing  Systems', '66409472c3ee5.jpg', 'Plumbing is a vital part of any construction project, from residential homes to commercial office buildings.', 2, 1, 0),
(14, 'Plumbing Fixtures', '664094e8156cf.jpg', 'Plumbing work includes everything from installing pipes and fixtures to troubleshooting leaks and repairing broken pipes.', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_review`
--

CREATE TABLE `emp_review` (
  `review_id` int(99) NOT NULL,
  `emp_id` int(99) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_rating` varchar(20) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_review`
--

INSERT INTO `emp_review` (`review_id`, `emp_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(1, 2, 'Arham', '4', 'Nice', '2024-05-23'),
(2, 4, 'Vedant', '2', 'worst management of time', '2024-05-23'),
(3, 2, 'Harshal', '3', 'Nice', '2024-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(5) NOT NULL,
  `jobtitle` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `location` varchar(30) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `jobduration` varchar(20) NOT NULL,
  `contactNo` varchar(10) NOT NULL,
  `jobdetail` varchar(100) NOT NULL,
  `budget` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `posted_by` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `jobtitle`, `address`, `location`, `profession`, `jobduration`, `contactNo`, `jobdetail`, `budget`, `date`, `posted_by`) VALUES
(1, 'Plumber needed ', '1, GMC Quarters, Sindhi Colony, Akola, Maharashtra', '20.697516, 77.005021', '2', '1-2 Days', '2147483647', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ', '500', '2024-04-25', '1'),
(4, 'Plumber needed ', 'bhopal', '20.576345, 77.062320', '2', '1-2 Days', '545454545', 'hgjg', '500', '2024-04-25', '1'),
(6, 'Plumber needed ', 'bhopal', '20.576345, 77.062320', '2', '2 Days', '5454545787', 'aa', '5454', '2024-04-25', '1'),
(8, 'Plumber needed ', 'saket nagar bhopal', '20.576345, 77.062320', '2', '8hr', '9561213123', 'Small leakage repairing in bathroom.', '800', '2024-04-25', '3'),
(10, 'Wall putti', 'Naringe nagar,Yavatmal', '20.576345, 77.062320', '11', '1 Week', '8239237564', 'wall putti in 4 rooms', '10,000', '2024-04-25', '3'),
(11, 'Cleaning', 'Naringe nagar,Yavatmal', '', '11', '2 days', '8937284573', 'On a wedding occasion.', '600', '2024-04-25', '3'),
(12, 'Car repairing', 'Main road akola', '', '11', '8hrs /day', '9380284728', 'A experienced mechanic is required who must have the experienced in the big vehicles like truck, bus', '10,000 per month', '2024-04-25', '3'),
(13, 'Cunstruction', 'Yavatmal', '', '11', '1 month', '7893656890', 'asdf', '50000', '2024-04-25', '3'),
(19, 'Bathroom Leakag', 'Main road akola', '123456543,12345676543', '2', '1 day', '7180851788', 'Floor is leak in bathroom ,it is a medium size bathroom. As ad  and we have know better and id leak ', '1000', '2024-04-20', '6'),
(21, 'Bathroom Leakag', 'Main road akola', '123456543,12345676543', '2', '1 day', '7180851781', 'Floor is leak in bathroom ,it is a medium size bathroom. As ad  and we have know better and id leak ', '1000', '2024-04-20', '6'),
(23, 'Seed Roping', 'Yavatmal', '20.576345, 77.062320', '9', '2 days', '5892348952', '10000 sq. ft. field.', '2000', '2024-05-14', '2'),
(24, 'Harvesting', 'Akola', '20.576345, 77.062320', '9', '1 days', '5892348952', '3 hector', '2000', '2024-05-14', '2'),
(25, 'Seed Roping', 'Yavatmal', '20.576345, 77.062320', '9', '2 days', '5892348952', '10000 sq. ft. field of flowers.', '2000', '2024-05-14', '2'),
(26, 'Field Destroy.', 'Yavatmal', '20.576345, 77.062320', '9', '3 days', '5892348952', '10000 sq. ft. field of flowers.', '2000', '2024-05-14', '2'),
(27, 'Web development', 'Akola', '20.576345, 77.062320', '10', '1 week', '6784563495', 'afg vaguvv guag gayg t yt ', '10000', '2024-05-13', '2'),
(28, 'Web development', 'Yavatmal', '20.576345, 77.062320', '10', '1 week', '6784563495', 'afg vaguvv guag gayg t yt ', '10000', '2024-05-13', '2'),
(29, 'Seed Roping', 'Yavatmal', '20.576345, 77.062320', '9', '2 days', '5892348952', '10000 sq. ft. field of flowers.', '2000', '2024-05-14', '2'),
(30, 'App development', 'Akola', '20.576345, 77.062320', '10', '1 week', '6784563495', 'afg vaguvv guag gayg t yt ', '10000', '2024-05-13', '2'),
(31, 'Frame welding', 'Nafees Bagh, Dahigaon Gawande, Akola, Maharashtra ', '20.688008, 76.987130', '8', '6 months', '8739278388', 'NA', '1500', '2024-05-21', '3'),
(32, 'Frame welding', 'Nafees Bagh, Dahigaon Gawande, Akola, Maharashtra ', '20.688008, 76.987130', '8', '6 months', '8739278388', 'NA', '1500', '2024-05-21', '3'),
(33, 'Frame welding', 'Nafees Bagh, Dahigaon Gawande, Akola, Maharashtra ', '20.688008, 76.987130', '8', '6 months', '8739278388', 'NA', '1500', '2024-05-21', '1'),
(34, 'Frame welding', 'Nafees Bagh, Dahigaon Gawande, Akola, Maharashtra ', '20.688008, 76.987130', '8', '6 months', '8739278388', 'NA', '1500', '2024-05-21', '1'),
(35, 'Gas welding', 'Naringe nagar, Yavatmal', '20.576345, 77.062320', '8', '1 day', '9293847285', 'Simple work.', '1000', '2024-05-23', '3'),
(36, 'Decoration', 'Nafees Bagh, Dahigaon Gawande, Akola, Maharashtra ', '20.688008, 76.987130', '11', '5 hr', '8594098234', 'Decoration for birthday party.', '2000', '2024-05-14', '3'),
(38, 'Web Development', 'Government College of engineering yavatmal', '20.413264486976935, 78.1355092', '10', '3 Week', '7499095929', 'efdwtyujh', '30000', '2024-05-30', '3'),
(39, 'Web Development', 'Naringe Nagar, Yavatmal', '20.413093550569304, 78.1355414', '10', '1 Month', '9728936298', 'Just a basic web development.', '40000', '2024-06-01', '3');

-- --------------------------------------------------------

--
-- Table structure for table `jobapplication`
--

CREATE TABLE `jobapplication` (
  `app_id` int(11) NOT NULL,
  `u_id` int(5) NOT NULL,
  `job_id` int(5) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `est_budget` varchar(20) NOT NULL,
  `owndetail` varchar(100) NOT NULL,
  `phoneNo` varchar(11) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobapplication`
--

INSERT INTO `jobapplication` (`app_id`, `u_id`, `job_id`, `firstname`, `lastname`, `email`, `est_budget`, `owndetail`, `phoneNo`, `Status`) VALUES
(1, 2, 12, 'Syed Arham', 'Abbas', 'abbas.sa@gmail.com', '1000', 'jkl', '07028566601', 'rejected'),
(3, 10, 10, 'Aman', 'Dhatarwal', 'aman112@gmail.com', '', 'plumber ', '', 'pending'),
(4, 0, 3, 'Aman', 'Kumar', 'aman12@gmail.com', '1500', 'i,m aman kumar a carpainter looking for job', '9874563210', 'Job is over'),
(7, 2, 10, 'Abbas', '', 'arham@gmail.com', '1000', 'I  can solve your problem in 1 week.', '07028566601', 'pending'),
(8, 4, 1, 'Ghanshyam', 'Prajapati', 'fgg12@gmail.com', '1500', 'wkshnj', '', 'pending'),
(9, 4, 10, 'Ghanshyam', 'Prajapati', 'gh12@gmail.com', '1500', 'car', '', 'pending'),
(11, 4, 8, 'Manav', 'singh', 'manav12@gmail.com', '1500', 'electrician', '', 'rejected'),
(12, 4, 10, 'Mohit', 'modi', 'mohit@1245@gmail.com', '1500', 'Carpainter', '', 'pending'),
(15, 2, 38, 'Harshal', 'Rabade', 'harshalrabade2019@gmail.com', '30000', 'I can complete this task within the month.', '7499095929', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categorieId` int(11) NOT NULL,
  `description` text NOT NULL,
  `book` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `name`, `categorieId`, `description`, `book`, `image`) VALUES
(2, '3n+1 problem', 1, 'If you are a programmer then take the challenge to solve it.', '1234567865.pdf', '1625230555.png');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(99) NOT NULL,
  `instructorId` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_rating` int(50) NOT NULL,
  `user_review` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `instructorId`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(1, 5, 'Harshal Rabade', 3, 'Good', '2024-05-11 06:19:33'),
(2, 5, 'Yash', 5, 'Nice', '2024-05-11 02:49:59'),
(3, 5, 'RAju', 0, 'xcvbnm,./', '2024-05-11 04:12:24'),
(4, 1, 'Arham', 3, 'Nice', '2024-05-12 07:16:00'),
(5, 1, 'Arham', 3, 'Pretty good\n', '2024-05-12 07:19:20'),
(6, 1, 'Yash', 5, 'What a wonderful man, nice man!!!', '2024-05-12 07:22:22'),
(7, 1, 'Vedant', 4, 'Your content is one of the best. ', '2024-05-12 07:49:13'),
(8, 1, 'Virat', 2, 'not bad', '2024-05-12 08:10:45'),
(9, 3, 'Harshal', 5, 'Excellent', '2024-05-12 08:11:41'),
(10, 3, 'Yash', 0, 'dsca 6tsa  ts7a a s fy t7a st', '2024-05-12 08:13:01'),
(11, 3, 'Vedant', 3, 'Hyga yagsysv sgys', '2024-05-12 08:20:51'),
(12, 3, 'Virat', 3, 'asdf', '2024-05-12 08:23:03'),
(13, 3, 'sd', 3, 'asdx', '2024-05-12 08:28:37'),
(14, 1, 'New', 4, 'Review', '2024-05-12 08:55:30'),
(15, 5, 'Rohit', 4, 'Nice skills.', '2024-05-12 08:57:21'),
(16, 1, 'gcoey', 5, 'good', '2024-05-13 07:07:50'),
(17, 1, 'Tejas', 4, 'Best in the galaxy', '2024-05-22 05:05:12'),
(18, 2, 'tejas', 3, 'nice', '2024-05-22 05:46:53'),
(19, 2, 'nayan', 4, 'nice', '2024-05-22 05:47:10'),
(20, 3, 'Harshal Rabade', 5, 'Nice', '2024-05-29 13:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `mail`, `phone`, `image`, `qualification`, `description`) VALUES
(1, 'Sahil Gudape', 'sahil12@gmail.com', '0300-1234567', '7654365465.jpg', 'B.Tech', 'I am software engineer with passion for teaching as well as security specialist. I have a passion for anything digital technology related, enjoy programing and challenge of successful digital experience.'),
(2, 'Vedant Nawale', 'ved@gmail.com', '9823198734', '91344589.jpg', 'Master in Plumber', '10 year work experience in UAE'),
(3, 'Dhiraj Chaudhary', 'dhiraj@gmail.com', '+917028566601', '3275432128765.jpg', 'B.Tech', 'Have a experience to work with the world government and have multiple experiment on the void century and linkage factor or various living organism.'),
(5, 'Ujwal Chinche', 'vegapunk@gmail.com', '9281038193', '1234567654321.jpg', 'ITI', 'Have a experience to work with the world government and have multiple experiment on the void century and linkage factor or various living organism.'),
(12, 'Siddhant Jagtap', 'sid2019@gmail.com', '7499095929', '4534579765.jpg', 'M.Tech', 'Just teaching for fun.'),
(14, 'Rahul Akhare', 'rahulakh@gmail.com', '7499095929', '7865423456.jpg', 'M.Tech', 'Just teaching for fun.');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `image`, `qualification`) VALUES
(1, 'Syed Arham Abbas', '987675438.jpg', 'B.Tech'),
(2, 'Rohit Wankhede', '243566.jpg', 'B.Tech'),
(3, 'Tejas Tayade', '987624.jpg', 'B.Tech'),
(4, 'Harsal Rabade', '9876543.jpg', 'B.Tech');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(5) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `field` varchar(30) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `profilePic` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `firstname`, `lastname`, `field`, `dob`, `gender`, `email`, `phonenumber`, `address`, `usertype`, `profilePic`, `password`) VALUES
(1, 'Vedant', 'Navale', '', '12/09/2003', 'm', 'vedant@gmail.com', '9874466312', 'Amravati Maharashtra', '3', '665180e0856be.jpg', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(2, 'Syed Arham', 'Abbas', 'Electric and plumbing.', '2024-05-07', 'M', 'arhamabbas7028@gmail.com', '7028566602', 'Naringe nagar,Yavatmal,  MH IN', '2', '66575c81dd2f5.jpg', '$2y$10$qof4WVuWwhMNSc7i..VM.ON8z.BGHUXEx6SSyzm3lmMA9YWuBtz8a'),
(3, 'Harshal', 'Rabade', '', '2002-05-08', 'M', 'harshal12@gmail.com', '8594098234', 'Kamti Chowk , Buldhana', '3', '66575807edd0b.jpg', '$2y$10$iE.VW3VM8EoBs39zTh7lr.kgKcqSTnx/zW.bdGgtzqjc7BG.R1o5e'),
(4, 'Ghanshyam', 'Prajapati', '', '2000-01-10', 'M', 'vishwaka13@gmail.com', '2147483647', 'Naringe nagar,Yavatmal,  MH IN', '2', '', '$2y$10$JaT3sB7qqdKT7n..zJiFeu9G2BZXFcI8WWoZBtTBJaUhYvIIiDQfq$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(5, 'Ghanshyam', 'Prajapati', '', '12/09/2001', 'op', 'jhgjhjhgj@gmail.com', '2147483647', 'Naringe nagar,Yavatmal,  MH IN', '2', '', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(6, 'Ankit', 'Vishwakarma', '', '12/09/2001', 'M', 'ankit12@gmail.com', '2147483647', '', '3', '', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(7, 'Aiman', 'Asif', '', '12/09/2004', 'F', 'aiamtopeer123@gmail.com', '9988774455', 'Naringe nagar,Yavatmal,  MH IN', '2', '', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(8, 'Geeta', 'jali', '', '12/09/2001', 'F', 'geeta12@gmail.com', '1478523698', '', 'Job-seeker', '', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(9, 'Ankit', 'Vishwakarma', '', '23/03/2001', 'M', 'vishwaka1234@gmail.com', '9874563211', '', 'Job-provider', '', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(11, 'Ankit', 'Vishwakarma', '', '12/09/2001', 'M', 'ankit1223@gmail.com', '9874466314', '', 'Job-provider', '', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(12, 'Ghanshyam', 'Prajapati', '', '02/09/2000', 'M', 'ghan@gmail.com', '7878878777', '', 'Job-seeker', '', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(13, 'Ghanshyam', 'Prajapati', '', '12/09/2001', 'op', 'jhgjhjhgj@gmail.com', '2147483647', 'Naringe nagar,Yavatmal,  MH IN', '2', '', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(14, 'Ankit', 'akas', '', '12/09/2001', 'M', 'ak122@gmail.com', '4563217895', '', 'Job-provider', '', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(15, 'Aman', 'Kumar', '', '01/01/2000', 'M', 'aman12@gmail.com', '9874563210', '', 'Job-seeker', '', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(16, 'Amit', 'Singh', '', '01/02/2001', 'M', 'amit12@gmail.com', '9632587410', 'Naringe nagar undefined MH IN', 'Job-provider', '', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(17, 'Syed', 'Arham Abbas', '', '22/01/2001', 'ma', 'abbas7028@gmail.com', '7588327270', 'Barshitakli', 'user', '', '$2y$10$FJUGZApBzfmvNnhVvgDBiuQxKEWAOOaItPdQtjjUNaWSwKeunyYd2'),
(19, 'Syed Arham', 'Abbas', '', '2024-05-13', 'ma', 'arhamabbas70@gmail.com', '07028566601', 'Naringe nagar,Yavatmal,  MH IN', '2', '', '$2y$10$PJmDdMJ6SmfIOZj0sz0QU.tO04/MnLb12o6sF9LX.Av.OhQYDjhE6'),
(21, 'Cherry', 'R', '', '2002-05-08', 'M', 'harshal7499095929@gmail.com', '7449907365', 'Naringe nagar,Yavatmal,  MH IN', '2', '', '$2y$10$OFg1EL/us1V/bTVCWqjz/u10cxVECc3K/gQjy3DVMsO0JgHN3sEi2'),
(22, 'Tejas', 'Tayade', '', '2024-05-22', 'M', 'tayadetejas59@gmail.com', '7745056583', 'Naringe nagar,Yavatmal,  MH IN', '2', '', '$2y$10$CoFT.9nQyrYqVKJZ354rfuUji1MyrNXgnm9zGSK346D1JAaE9K.3m'),
(23, 'Harshal', 'Rabade', '', '1998-05-14', 'M', 'arhamabbas728@gmail.com', '7499095929', 'Yavatmal undefined MH IN', '2', '', '$2y$10$/GCNh1v0sx/AicsveHsM7ud2RMuqxkjHSE.FIp2Dy.5AFon2o0dIy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_mail` (`admin_mail`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_review`
--
ALTER TABLE `emp_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `job_id` (`job_id`);

--
-- Indexes for table `jobapplication`
--
ALTER TABLE `jobapplication`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `emp_review`
--
ALTER TABLE `emp_review`
  MODIFY `review_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `jobapplication`
--
ALTER TABLE `jobapplication`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
