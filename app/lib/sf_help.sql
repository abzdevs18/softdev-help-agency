-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2019 at 01:38 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sf_help`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `content` text,
  `date_posted` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `img_path` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `company_pushline` varchar(50) DEFAULT NULL,
  `comapany_overview` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_emails`
--

CREATE TABLE `company_emails` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `email_add` varchar(50) DEFAULT NULL,
  `email_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_location`
--

CREATE TABLE `company_location` (
  `id` int(11) NOT NULL,
  `com_id` int(11) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_phone`
--

CREATE TABLE `company_phone` (
  `id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` int(11) NOT NULL,
  `comp_id` int(11) DEFAULT NULL,
  `img_path` varchar(250) DEFAULT NULL,
  `profile_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_ratings`
--

CREATE TABLE `company_ratings` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `com_wall`
--

CREATE TABLE `com_wall` (
  `id` int(11) NOT NULL,
  `comp_id` int(11) DEFAULT NULL,
  `img_path` varchar(250) DEFAULT NULL,
  `wall_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_jobs`
--

CREATE TABLE `favorite_jobs` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

CREATE TABLE `invites` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `invite_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `job_category` int(11) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `job_description` text,
  `job_requirement` varchar(100) DEFAULT NULL,
  `deadline` varchar(20) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `job_type` varchar(30) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT '0',
  `salary` int(7) DEFAULT NULL,
  `job_status` tinyint(1) DEFAULT '1',
  `job_visibility` tinyint(1) DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_on_progress`
--

CREATE TABLE `jobs_on_progress` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `jop_status` tinyint(1) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_biddings`
--

CREATE TABLE `job_biddings` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bidd_status` int(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_receiver_id` int(11) DEFAULT NULL,
  `user_sender_id` int(11) DEFAULT NULL,
  `msg_content` text,
  `msg_date` varchar(50) DEFAULT NULL,
  `delivered_status` tinyint(1) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `past_jobs`
--

CREATE TABLE `past_jobs` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `save_company`
--

CREATE TABLE `save_company` (
  `id` int(11) NOT NULL,
  `save_company` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `save_job`
--

CREATE TABLE `save_job` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sf_logo`
--

CREATE TABLE `sf_logo` (
  `id` int(11) NOT NULL,
  `site_fk` int(11) NOT NULL,
  `path` varchar(250) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sf_site`
--

CREATE TABLE `sf_site` (
  `id` int(11) NOT NULL,
  `site_name` varchar(30) NOT NULL,
  `site_logo` varchar(250) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_emails`
--

CREATE TABLE `subscribe_emails` (
  `id` int(11) NOT NULL,
  `email_add` varchar(30) DEFAULT NULL,
  `date_subscribe` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `testimonial_content` varchar(250) DEFAULT NULL,
  `data_posted` varchar(30) DEFAULT NULL,
  `time_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `user_pass` varchar(250) DEFAULT NULL,
  `user_type` tinyint(1) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `user_availability` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_company_members`
--

CREATE TABLE `user_company_members` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_email`
--

CREATE TABLE `user_email` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email_add` varchar(50) DEFAULT NULL,
  `email_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_location`
--

CREATE TABLE `user_location` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_phone`
--

CREATE TABLE `user_phone` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone_number` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `img_path` varchar(250) DEFAULT NULL,
  `profile_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_rating`
--

CREATE TABLE `user_rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_wall`
--

CREATE TABLE `user_wall` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `img_path` varchar(250) DEFAULT NULL,
  `wall_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worker_reviews`
--

CREATE TABLE `worker_reviews` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`blog_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_emails`
--
ALTER TABLE `company_emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`company_id`);

--
-- Indexes for table `company_location`
--
ALTER TABLE `company_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`com_id`);

--
-- Indexes for table `company_phone`
--
ALTER TABLE `company_phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`comp_id`);

--
-- Indexes for table `company_ratings`
--
ALTER TABLE `company_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`company_id`);

--
-- Indexes for table `com_wall`
--
ALTER TABLE `com_wall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`comp_id`);

--
-- Indexes for table `favorite_jobs`
--
ALTER TABLE `favorite_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`job_id`,`user_id`);

--
-- Indexes for table `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`job_id`,`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_category` (`job_category`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `jobs_on_progress`
--
ALTER TABLE `jobs_on_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`job_id`,`user_id`);

--
-- Indexes for table `job_biddings`
--
ALTER TABLE `job_biddings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`job_id`,`user_id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`category_name`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `past_jobs`
--
ALTER TABLE `past_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`job_id`,`user_id`);

--
-- Indexes for table `save_company`
--
ALTER TABLE `save_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`save_company`);

--
-- Indexes for table `save_job`
--
ALTER TABLE `save_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`job_id`);

--
-- Indexes for table `sf_logo`
--
ALTER TABLE `sf_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_site`
--
ALTER TABLE `sf_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe_emails`
--
ALTER TABLE `subscribe_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_company_members`
--
ALTER TABLE `user_company_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`company_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_email`
--
ALTER TABLE `user_email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `user_location`
--
ALTER TABLE `user_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `user_phone`
--
ALTER TABLE `user_phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `user_rating`
--
ALTER TABLE `user_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `user_wall`
--
ALTER TABLE `user_wall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `worker_reviews`
--
ALTER TABLE `worker_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`job_id`,`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_emails`
--
ALTER TABLE `company_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_location`
--
ALTER TABLE `company_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_phone`
--
ALTER TABLE `company_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_ratings`
--
ALTER TABLE `company_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `com_wall`
--
ALTER TABLE `com_wall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs_on_progress`
--
ALTER TABLE `jobs_on_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_biddings`
--
ALTER TABLE `job_biddings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `past_jobs`
--
ALTER TABLE `past_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `save_company`
--
ALTER TABLE `save_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `save_job`
--
ALTER TABLE `save_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sf_logo`
--
ALTER TABLE `sf_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sf_site`
--
ALTER TABLE `sf_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribe_emails`
--
ALTER TABLE `subscribe_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_company_members`
--
ALTER TABLE `user_company_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_email`
--
ALTER TABLE `user_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_location`
--
ALTER TABLE `user_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_phone`
--
ALTER TABLE `user_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_rating`
--
ALTER TABLE `user_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_wall`
--
ALTER TABLE `user_wall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `worker_reviews`
--
ALTER TABLE `worker_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`job_category`) REFERENCES `job_categories` (`id`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `user_company_members`
--
ALTER TABLE `user_company_members`
  ADD CONSTRAINT `user_company_members_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `user_company_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
