-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2022 at 05:54 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_desc` text NOT NULL,
  `time` datetime NOT NULL,
  `blog_info` text NOT NULL,
  `Vote` int(31) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `user_id`, `blog_title`, `blog_desc`, `time`, `blog_info`, `Vote`) VALUES
(6, 1, 'learn about c++', 'In this blog we are going to learn about C++', '2022-02-09 11:13:14', 'The C++ language has two main components: a direct mapping of hardware features provided primarily by the C subset, and zero-overhead abstractions based on those mappings. Stroustrup describes C++ as a light-weight abstraction programming language for building and using efficient and elegant abstractions and offering both hardware access and abstraction is the basis of C++. Doing it efficiently is what distinguishes it from other languages', 4),
(7, 1, 'python', 'In this blog we are going to learn about python', '2022-02-09 11:13:34', 'Python is a general-purpose interpreted, interactive, object-oriented, and high-level programming language. It was created by Guido van Rossum during 1985- 1990. Like Perl, Python source code is also available under the GNU General Public License (GPL). This tutorial gives enough understanding on Python programming language.', 2),
(8, 1, 'Learn about java', 'In this blog we are going to learn about java', '2022-02-09 11:13:56', 'Java is a programming language and a platform. Java is a high level, robust, object-oriented and secure programming language. Java was developed by Sun Microsystems (which is now the subsidiary of Oracle) in the year 1995. James Gosling is known as the father of Java. Before Java, its name was Oak. Since Oak was already a registered company, so James Gosling and his team changed the name from Oak to Java.', 1),
(11, 4, 'lear about c ', 'in this blog we are going to learn about c ', '2022-02-10 15:37:19', 'C language Tutorial with programming approach for beginners and professionals, helps you to understand the C language tutorial easily. Our C tutorial explains each topic with programs.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(12) NOT NULL,
  `blog_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `comment` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `vote` int(12) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `blog_id`, `user_id`, `comment`, `time`, `vote`) VALUES
(1, 7, 4, 'nice blog', '2022-02-10 16:00:19', 0),
(2, 7, 4, 'very good writing skills', '2022-02-10 16:01:18', 0),
(3, 7, 1, 'I love reading your blogs', '2022-02-10 18:39:01', 0),
(4, 6, 1, 'Nice blog', '2022-02-10 18:41:59', 0),
(5, 11, 2, 'nice blog', '2022-02-10 18:46:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment_voted`
--

CREATE TABLE `comment_voted` (
  `cid` int(12) NOT NULL,
  `comment_id` int(12) NOT NULL,
  `blog_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(12) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `doj` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `doj`) VALUES
(1, 'saurabh', 'saurabh@gmail.com', '1234', '2022-02-08 23:13:51'),
(2, 'vector', 'vector@vector', '123', '2022-02-09 02:08:35'),
(3, 'seetu', 'seetu@seetu', '123', '2022-02-10 15:17:09'),
(4, 'shweta', 'ss@ss', '123', '2022-02-10 15:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `voted_users`
--

CREATE TABLE `voted_users` (
  `voted_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voted_users`
--

INSERT INTO `voted_users` (`voted_id`, `blog_id`, `user_id`, `time`) VALUES
(3, 6, 1, '2022-02-10 15:05:39'),
(4, 6, 2, '2022-02-10 15:08:46'),
(6, 6, 3, '2022-02-10 15:19:49'),
(7, 7, 3, '2022-02-10 15:20:10'),
(9, 8, 3, '2022-02-10 15:22:06'),
(10, 6, 4, '2022-02-10 15:25:06'),
(11, 7, 4, '2022-02-10 15:25:16'),
(12, 8, 4, '2022-02-10 15:25:25'),
(13, 11, 4, '2022-02-10 15:37:26'),
(14, 11, 1, '2022-02-10 18:03:21'),
(15, 11, 2, '2022-02-13 22:14:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comment_voted`
--
ALTER TABLE `comment_voted`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `voted_users`
--
ALTER TABLE `voted_users`
  ADD PRIMARY KEY (`voted_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment_voted`
--
ALTER TABLE `comment_voted`
  MODIFY `cid` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `voted_users`
--
ALTER TABLE `voted_users`
  MODIFY `voted_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
