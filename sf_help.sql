-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 09:56 PM
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
  `blog_title` varchar(100) NOT NULL,
  `content` text,
  `date_posted` varchar(30) DEFAULT NULL,
  `date_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `blog_title`, `content`, `date_posted`, `date_timestamp`) VALUES
(1, 'Unleash Your Passion & Power and Build Your Ideal Business or Career on Your Terms', 'You are a smart, driven individual. \r\nYou have done well for yourself. You are a higher performer and \r\naccomplished in your field. Yet, right now, youâ€™ve hit a plateau or find\r\n yourself at a crossroads or in a situation that requires outside \r\nperspective to help you choose the best pathway to move forward.Perhaps your once ideal career is no \r\nlonger fulfilling you. Or your small business is not growing as fast as \r\nit once was. Or your successful path is not as lucid as it seemed a few \r\nyears ago.Â I have been in every one of these situations once.You have come to realize that what got\r\n you here wonâ€™t get you to your ultimate goals, that it wonâ€™t help you \r\nmake the necessary leap you need to make right now, and you are finally \r\nin a place where you donâ€™t want to do it all by yourself. I came to that\r\n moment in my life 11 years ago.You are in a stage of life that \r\nrequires a pause, a change of course in direction and strategy, a shift \r\nin mindset, and you are wondering if you could use some help along the \r\nway.\r\nGOOD! This happens to every driven \r\nsmart and successful high performer on the journey. Every. Single One. \r\nItâ€™s what you do about it that tells the rest of the story.', 'Jan. 26, 2020', '2019-11-13 02:05:00'),
(2, 'Weekend Open Thread', 'I started hunting for something for the weekend thread to wear for a \r\nValentineâ€™s Day date, but this almost strikes me as a better first or \r\nsecond date top â€” itâ€™s fuzzy and touchable but not overtly S-E-X-Y â€” and\r\n still on trend with the slight crop and square neck. (The crop is \r\nsubtler than I think it looks here â€” with some of the other colors you \r\ncan barely notice the crop.) If youâ€™re into crop tops, I like it! Itâ€™s \r\ngetting pretty good ratings, has is marked from $59 to $24, and comes in\r\n seven colors. Fuzzy Crop Sweater(Accordingly,\r\n two Qs of the day: what is the best first date outfit, for those of you\r\n who are looking? Secondly, for those of you who are coupled, do you \r\nhave plans for Valentineâ€™s Day â€” and what are you wearing? And, I \r\nsuppose, a third question â€” what are your feelings about the cropped \r\ntops that are everywhere now?)Looking for something similar but in plus sizes? This blouse is more on the va-va-va-voom side of things, but itâ€™s lovely, and comes in size 0-26.Â This\r\n post contains affiliate links and CorporetteÂ® may earn commissions for \r\npurchases made through links in this post. For more details see here. Thank you so much for your support!', 'Jan. 26, 2020', '2020-01-26 02:40:45'),
(3, '4 Skincare Routines', 'Thereâ€™s nothing like the cold, harsh \r\nweather of winter to dry out your skin fast. The good news is, with the \r\nright skincare routine, any skin type can look hydrated and glowing all \r\nwinter long. But, choosing the right routine is crucial to getting the \r\nresults youâ€™re going for. Are\r\n you ready to banish dry, itchy, lifeless winter skin for good? Here are\r\n four great skincare routines to try this winter! I have provided links \r\nthat take you further in depth for each routine.1. A Korean Skincare RoutineKorean\r\n women are recognized across the globe for their smooth, glowing skin \r\nthat never seems to age. Skincare is a top priority in Korea, and boys \r\nand girls are taught how to care for their skin properly starting when \r\nthey are very young.', 'Jan. 27, 2020', '2020-01-26 02:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `img_path` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `blog_id`, `img_path`) VALUES
(1, 1, 'Farnoosh_Brock_profile_2018.jpg'),
(2, 2, 'sexy-but-cool-valentines-day.png'),
(3, 3, 'Image-01-25-20-at-8.43-AM-768x512.jpg');

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

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_pushline`, `comapany_overview`) VALUES
(1, 'John', NULL, NULL),
(2, 'N/A', NULL, NULL),
(3, 'arstrdf', NULL, NULL);

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

--
-- Dumping data for table `company_emails`
--

INSERT INTO `company_emails` (`id`, `company_id`, `email_add`, `email_status`) VALUES
(1, 1, 'johns@gmail.com', 1),
(2, 2, 'support@gmail.com', 1),
(3, 3, 'f@g.co', 1);

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

--
-- Dumping data for table `company_phone`
--

INSERT INTO `company_phone` (`id`, `comp_id`, `phone_number`) VALUES
(1, 1, '324421'),
(2, 2, '8768566578'),
(3, 3, '65453');

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

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `user_id`, `job_category`, `job_title`, `job_description`, `job_requirement`, `deadline`, `tags`, `job_type`, `featured`, `salary`, `job_status`, `job_visibility`, `timestamp`) VALUES
(1, 1, 2, 2, 'Pipe Cleaning', 'I need someone to clean my Water pipe tomorrow.', 'Piping experience', '2020-01-27', 'Plumbing, Cleaning', 'Freelance', 0, 2000, 1, 0, '2020-01-27 05:34:09'),
(2, 1, 2, 3, 'Taking care of my Dog', 'I&#39;ll be gone for a week and I need someone to take good care of my Dog.', 'N/A', '2020-01-30', 'Dog, Care', 'Part Time', 0, 3000, 1, 1, '2020-01-26 05:30:47'),
(3, 2, 10, 6, 'Floor Cleaning', 'I&#39;ll be gone for a week and I need someone to take good care of my Dog.', 'N/A', '2020-01-28', 'House, Clean, Household', 'Part Time', 0, 0, 1, 1, '2020-01-26 10:22:24'),
(4, 1, 2, 6, 'Photographer', 'I need someone to clean my Water pipe tomorrow.', 'N/A', '2020-01-30', 'photography, freelance, asap', 'Part Time', 0, 3500, 1, 1, '2020-01-27 05:30:27');

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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `age` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `location` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `education` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_biddings`
--

INSERT INTO `job_biddings` (`id`, `job_id`, `user_id`, `bidd_status`, `timestamp`, `fname`, `lname`, `age`, `gender`, `location`, `address`, `education`) VALUES
(1, 1, 4, 0, '2020-01-25 22:25:07', '', '', '', '', '', '', ''),
(3, 1, 8, 0, '2020-01-26 04:12:49', '', '', '', '', '', '', ''),
(4, 1, 9, 0, '2020-01-26 04:32:25', '', '', '', '', '', '', ''),
(10, 2, 8, 0, '2020-01-26 07:19:08', '', '', '', '', '', '', ''),
(11, 3, 8, 0, '2020-01-26 10:22:51', '', '', '', '', '', '', ''),
(12, 1, 12, 0, '2020-01-27 06:57:23', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `category_name`, `image`) VALUES
(1, 'Carpentry', 'helmet.png'),
(2, 'Plumbing', 'leak.png'),
(3, 'Caring', 'boy.png'),
(4, 'Grocery', 'check.png'),
(5, 'Farming', 'plant.png'),
(6, 'Other', 'helmet.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_receiver_id` int(11) DEFAULT NULL,
  `user_sender_id` int(11) DEFAULT NULL,
  `msg_content` text,
  `msg_time` varchar(50) NOT NULL,
  `msg_date` varchar(50) DEFAULT NULL,
  `delivered_status` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_receiver_id`, `user_sender_id`, `msg_content`, `msg_time`, `msg_date`, `delivered_status`, `timestamp`) VALUES
(1, 2, 4, 'Hello there', '', NULL, 0, '2020-01-26 03:12:56'),
(2, 4, 2, 'Good morning!', '', NULL, 0, '2020-01-26 03:12:56'),
(3, 4, 2, 'Your good?', '11:39 am', 'Jan. 26, 2020', 0, '2020-01-26 03:39:21'),
(5, 2, 4, 'dd', '11:42 am', 'Jan. 26, 2020', 0, '2020-01-26 03:42:48'),
(7, 2, 4, 'ss', '11:50 am', 'Jan. 26, 2020', 0, '2020-01-26 03:50:21'),
(8, 4, 2, 'Hello', '11:50 am', 'Jan. 26, 2020', 0, '2020-01-26 03:50:48'),
(9, 4, 2, 'May you be available?', '11:52 am', 'Jan. 26, 2020', 0, '2020-01-26 03:52:10'),
(10, 2, 4, 'sds', '11:53 am', 'Jan. 26, 2020', 0, '2020-01-26 03:53:57'),
(11, 0, 2, 'Hello', '12:13 pm', 'Jan. 26, 2020', 0, '2020-01-26 04:13:58'),
(12, 4, 2, 'ddd', '12:21 pm', 'Jan. 26, 2020', 0, '2020-01-26 04:21:32'),
(13, 8, 2, 'Hello?', '12:21 pm', 'Jan. 26, 2020', 0, '2020-01-26 04:21:58'),
(14, 2, 8, 'Hi', '12:22 pm', 'Jan. 26, 2020', 0, '2020-01-26 04:22:25'),
(15, 9, 2, 'Rich?', '12:32 pm', 'Jan. 26, 2020', 0, '2020-01-26 04:32:47'),
(16, 2, 8, 'dsds', '', 'Jan. 26, 2020', 0, '2020-01-26 10:14:20'),
(17, 2, 8, 'jjjj', '', 'Jan. 26, 2020', 0, '2020-01-26 10:14:32'),
(18, 8, 10, 'Hello Jona', '06:23 pm', 'Jan. 26, 2020', 0, '2020-01-26 10:23:19'),
(19, 2, 8, 'nnkk', '', 'Jan. 26, 2020', 0, '2020-01-26 10:23:52'),
(20, 10, 8, 'hi', '', 'Jan. 26, 2020', 0, '2020-01-26 10:30:16'),
(21, 10, 8, '', '', 'Jan. 26, 2020', 0, '2020-01-26 10:33:00'),
(22, 10, 8, 'jjjk', '', 'Jan. 26, 2020', 0, '2020-01-26 10:33:05'),
(23, 10, 8, 'cc', '', 'Jan. 26, 2020', 0, '2020-01-26 10:35:11'),
(25, 2, 4, 'kuhgjh', '12:34 pm', 'Jan. 27, 2020', 0, '2020-01-27 04:34:32'),
(30, 2, 8, 'dd', '03:04 pm', 'Jan. 27, 2020', 0, '2020-01-27 07:04:54'),
(31, 4, 2, 'mljkhgjhvbnm', '03:06 pm', 'Jan. 27, 2020', 0, '2020-01-27 07:06:16'),
(33, 2, 4, 'lkjh', '03:10 pm', 'Jan. 27, 2020', 0, '2020-01-27 07:10:56');

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

--
-- Dumping data for table `sf_logo`
--

INSERT INTO `sf_logo` (`id`, `site_fk`, `path`, `status`) VALUES
(1, 1, 'black-logo.png', 1);

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

--
-- Dumping data for table `sf_site`
--

INSERT INTO `sf_site` (`id`, `site_name`, `site_logo`, `timestamp`) VALUES
(1, 'Docus', NULL, '2019-11-11 14:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_emails`
--

CREATE TABLE `subscribe_emails` (
  `id` int(11) NOT NULL,
  `email_add` varchar(30) DEFAULT NULL,
  `date_subscribe` varchar(30) DEFAULT NULL,
  `sub_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `user_pass`, `user_type`, `is_admin`, `user_availability`) VALUES
(1, 'root', NULL, NULL, '$2y$10$WgIJaE1aH5Y2q0BLkYgYJ.HYcpKJDqfMvPoB8r9JwIP0We77a6mei', 1, 1, 0),
(2, 'johnSnow', 'John', 'Snow', '$2y$10$Q.kdIZabC0A/vFo8lJHl3.BWETuAcWhCOLfN9tANdN0iljJ8rMHYW', 1, 0, 0),
(3, 'richie', 'Richard', 'Yap', '$2y$10$ktKCzF/2W4mwgoZZYevIUuOj7.2Db3HlHBz1ql/Z3Gp4p0m/c7GCK', 0, 0, 0),
(4, 'mike', 'Mike', 'Sumalian', '$2y$10$XURrSQVbci/uVEmEeR9VeOcViBDq18vXiZ3g5uks027HIcKaiLiOC', 0, 0, 0),
(5, 'sdsdf', 'a', 'a', '$2y$10$UhLL1wRPeJg6gnzlMOr7UeVicbqHfhB2vbJcIBBgIZnp6oNjyMU2m', 0, 0, 0),
(6, 'mj', 'MJ', 'Esconde', '$2y$10$5FZQCl.y9D5qXqDp0Or50.w0kEX.25dQrAv7hers4YuRXKqy6O4oS', 0, 0, 0),
(7, 'sdfsd', 's', 'asd', '$2y$10$TlNwpdo6ngrJp1iBO23paeS8bCfigrKjMQsZhW3hpSUNfLyVD5CMa', 0, 0, 0),
(8, 'jona', 'jona', 'jon', '$2y$10$WgIJaE1aH5Y2q0BLkYgYJ.HYcpKJDqfMvPoB8r9JwIP0We77a6mei', 0, 0, 0),
(9, 'rich', 'Richars', 'Andersion', '$2y$10$.Zq2BfukDmtUEjNMP0gZxuJ6DrdUIwGohdJ3hA6e4HOA/09Sbmizm', 0, 0, 0),
(10, 'rey', 'Reymart', 'Cabusog', '$2y$10$/yP2bL7Lj6xCSVDKM9eD5OcM1uB/ZRndRAecFI7PAQytxEBNdQlZe', 1, 0, 0),
(11, 'asdfg', 'retrtu', 'fggh', '$2y$10$cthx5eJM10mpGOdS7XeLMuoj55d2aj2d0yuJMXxbW4keqEuYLRVcy', 1, 0, 0),
(12, 'vince', 'vince', 'suma', '$2y$10$6veJTk9ShnCAV1mNjj/WLeyQrpBDLjo2czyJ/0poJQDxkrdDpgljK', 0, 0, 0);

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

--
-- Dumping data for table `user_company_members`
--

INSERT INTO `user_company_members` (`id`, `company_id`, `user_id`, `user_position`) VALUES
(1, 1, 2, 'Dumaguete'),
(2, 2, 10, 'HR'),
(3, 3, 11, 'fets');

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

--
-- Dumping data for table `user_email`
--

INSERT INTO `user_email` (`id`, `user_id`, `email_add`, `email_status`) VALUES
(1, 1, 'root@gmail.com', 1),
(2, 2, 'john@gmail.com', 1),
(3, 3, 'rich@gmail.com', 1),
(4, 4, 'mike@gmail.com', 1),
(5, 5, 'abuevaj1835@student.laccd.edu', 1),
(6, 6, 'mj@gmail.com', 1),
(7, 7, 'sad@c.com', 1),
(8, 8, 'jona@gmail.com', 1),
(9, 9, 'ricsh@gmail.com', 1),
(10, 10, 'rey@gmail.com', 1),
(11, 11, 'superlee@yahoo.com', 1),
(12, 12, 'vince@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_location`
--

CREATE TABLE `user_location` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_location`
--

INSERT INTO `user_location` (`id`, `user_id`, `address`) VALUES
(1, 2, 'Taclobo'),
(2, 3, 'Valencia'),
(3, 4, 'Samar'),
(4, 5, 'sd'),
(5, 6, 'Dumaguete'),
(6, 7, 'sdfsdf'),
(7, 8, 'Taclobo'),
(8, 9, 'Tacloban'),
(9, 10, 'Mabinay'),
(10, 11, 'sdfyguutr'),
(11, 12, 'amlan, negros oriental');

-- --------------------------------------------------------

--
-- Table structure for table `user_phone`
--

CREATE TABLE `user_phone` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone_number` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_phone`
--

INSERT INTO `user_phone` (`id`, `user_id`, `phone_number`) VALUES
(1, 2, 2147483647),
(2, 3, 935892352),
(3, 4, 239847),
(4, 5, 2323),
(5, 6, 2333),
(6, 7, 2434),
(7, 8, 232366),
(8, 9, 2413432),
(9, 10, 8976789),
(10, 11, 96854),
(11, 12, 2147483647);

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

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `img_path`, `profile_status`) VALUES
(1, 6, 'ai-faces-01.jpg', 1),
(2, 4, 'Moganasundaram_001-750x0-c-default.jpg', 1),
(3, 2, 'Image-01-25-20-at-8.43-AM-768x512.jpg', 0),
(4, 2, 'Farnoosh_Brock_profile_2018.jpg', 0),
(5, 2, 'sexy-but-cool-valentines-day.png', 0),
(6, 2, 'Farnoosh_Brock_profile_2018.jpg', 0),
(7, 8, '096df0eb195b8f0d9475924f9a1e9425.jpg', 1),
(8, 2, 'sexy-but-cool-valentines-day.png', 1);

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
  `wall_status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_wall`
--

INSERT INTO `user_wall` (`id`, `user_id`, `img_path`, `wall_status`) VALUES
(1, 6, 'background-9120.jpg', 1),
(2, 4, 'background-9120.jpg', 1),
(3, 2, 'Image-01-25-20-at-8.43-AM-768x512.jpg', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_emails`
--
ALTER TABLE `company_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_location`
--
ALTER TABLE `company_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_phone`
--
ALTER TABLE `company_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs_on_progress`
--
ALTER TABLE `jobs_on_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_biddings`
--
ALTER TABLE `job_biddings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sf_site`
--
ALTER TABLE `sf_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_company_members`
--
ALTER TABLE `user_company_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_email`
--
ALTER TABLE `user_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_location`
--
ALTER TABLE `user_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_phone`
--
ALTER TABLE `user_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_rating`
--
ALTER TABLE `user_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_wall`
--
ALTER TABLE `user_wall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
