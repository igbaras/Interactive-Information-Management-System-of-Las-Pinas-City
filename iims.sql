-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 01:38 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iims`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ads_id` int(11) NOT NULL,
  `ads_title` varchar(255) NOT NULL,
  `ads_image` text NOT NULL,
  `ads_link` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_image` text NOT NULL,
  `cat_date` datetime NOT NULL,
  `cat_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `img_id` int(11) NOT NULL,
  `img_title` varchar(255) NOT NULL,
  `img_image` text NOT NULL,
  `img_status` varchar(255) NOT NULL,
  `img_date` datetime NOT NULL,
  `img_desc` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lifestyles`
--

CREATE TABLE `lifestyles` (
  `ls_id` int(11) NOT NULL,
  `ls_title` varchar(255) DEFAULT NULL,
  `ls_image` text DEFAULT NULL,
  `ls_status` varchar(255) NOT NULL,
  `ls_date` datetime DEFAULT NULL,
  `ls_tags` varchar(255) DEFAULT NULL,
  `ls_comment_count` int(11) NOT NULL DEFAULT 0,
  `ls_description` longtext DEFAULT NULL,
  `ls_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lifestyle_comments`
--

CREATE TABLE `lifestyle_comments` (
  `lf_comment_id` int(11) NOT NULL,
  `lf_comment_post_id` int(11) NOT NULL,
  `lf_comment_author` varchar(255) NOT NULL,
  `lf_comment_email` varchar(255) NOT NULL,
  `lf_comment_content` text NOT NULL,
  `lf_comment_status` varchar(255) NOT NULL,
  `lf_comment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lf_comment_user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `post_image` text NOT NULL,
  `post_content` longtext NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL DEFAULT 0,
  `post_status` varchar(255) NOT NULL,
  `post_desc` varchar(255) DEFAULT NULL,
  `post_notes` varchar(255) DEFAULT NULL,
  `post_views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_user_image` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `public_users`
--

CREATE TABLE `public_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_fname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_lname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_avatar` text CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `joindate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `public_users`
--

INSERT INTO `public_users` (`user_id`, `username`, `user_fname`, `user_lname`, `user_avatar`, `user_email`, `user_password`, `joindate`) VALUES
(1, 'test', 'test', 'test', 'https://res.cloudinary.com/sarabgi/image/upload/v1668445863/l2iz3nnqnqacpkdp4scx.png', 'teswt@tset', '$2y$10$dqe52LXnSLQYTJvurezp8eCEyvnkkFvbdpAASdy78QfYQbEG3.kbC', '2022-12-14 22:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_image`, `user_role`, `user_date`) VALUES
(2, 'customer_service', 'service', 'cs', 'cs@cs.com', 'test', '', 'customer service', NULL),
(3, 'writer_editor', 'editor', 'writer', 'editor@writer.com', 'test', '', 'writer', NULL),
(5, '', 'Igbaras', '', 'test@test', '$2y$12$453DzYQbXlJYA5IkSY4Rpu3IXYcxNTdKTVsjJQQAog6HbAbUxlGp.', '', '', '2022-11-12 00:50:10'),
(6, 'asdf', 'Christians', 'Igbaras', 'asdf@asdf', '$2y$12$sHUBSlF.yGp7dYyr8MAsLOBBPxZR.CVv/FHs1HG24zr6kMXNW.5kW', '2022-11-08 18_47_23-Summary - Quizizz.png', 'admin', '2022-11-12 12:00:34'),
(8, 'test', 'Christian', 'Igbaras', 'test@test', 'test', 'bg.jpg', '', '2022-11-12 12:18:26'),
(10, '', 'tian', '', 'tian@tian', '$2y$12$TKPAQomCTRaZ.Hc4NTrSReCtCcdV8vmGD8mrxk48h9TOqjPnHMlXK', '', '', '2022-11-12 12:47:28'),
(11, 'kiel', 'kiel', 'lavapiez', 'kiel@buto.com', '$2y$12$5doTuLPqmqtgr2QJzUWcqO/qshm8.izSuBbZEG.sztudutvVotPYi', 'tiansing.jpg', 'admin', '2022-11-12 18:46:10'),
(12, 'admin', 'asdf', 'asdf', 'asdf@asdf', '$2y$12$47ZYHVCvy4n7X/58yWwuyOfnOl9L7h1biEvweGJuyg3nBOSwNxg2S', 'xlarge_58978-223813c432e3c9981b4d3537c11aea4a.png', 'admin', '2022-11-12 19:06:54'),
(13, 'writer', 'test', 'test', 'test@tset', '$2y$12$ljsOQLplQkD43ZquaSBIpOug6pWM9slzDWwYQatAFYLi2004WDmmS', 'https://res.cloudinary.com/sarabgi/image/upload/v1669086373/sq6o2l4jisghhoxptftc.jpg', 'writer', '2022-11-22 10:19:18'),
(14, 'chat', 'test', 'test', 'test@test', '$2y$12$t2SZeHtGAcMh7YWqfWTZP.M7CfyHpl6T6tStG.6zVR7ls9Pj/mMtO', 'boy-bawang-cornick-snacks.jpg', 'chat service', '2022-11-22 11:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `virtualspots`
--

CREATE TABLE `virtualspots` (
  `vs_id` int(11) NOT NULL,
  `vs_vt_id` int(11) NOT NULL,
  `vs_spot` longtext NOT NULL,
  `vs_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `virtualtour`
--

CREATE TABLE `virtualtour` (
  `vt_id` int(11) NOT NULL,
  `vt_title` varchar(255) NOT NULL,
  `vt_image` text NOT NULL,
  `vt_status` varchar(255) NOT NULL,
  `vt_date` datetime NOT NULL,
  `vt_tags` varchar(255) NOT NULL,
  `vt_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ads_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `lifestyles`
--
ALTER TABLE `lifestyles`
  ADD PRIMARY KEY (`ls_id`);

--
-- Indexes for table `lifestyle_comments`
--
ALTER TABLE `lifestyle_comments`
  ADD PRIMARY KEY (`lf_comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `public_users`
--
ALTER TABLE `public_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `virtualspots`
--
ALTER TABLE `virtualspots`
  ADD PRIMARY KEY (`vs_id`);

--
-- Indexes for table `virtualtour`
--
ALTER TABLE `virtualtour`
  ADD PRIMARY KEY (`vt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lifestyles`
--
ALTER TABLE `lifestyles`
  MODIFY `ls_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lifestyle_comments`
--
ALTER TABLE `lifestyle_comments`
  MODIFY `lf_comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_users`
--
ALTER TABLE `public_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `virtualspots`
--
ALTER TABLE `virtualspots`
  MODIFY `vs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `virtualtour`
--
ALTER TABLE `virtualtour`
  MODIFY `vt_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
