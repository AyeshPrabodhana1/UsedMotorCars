-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 06:44 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `date`) VALUES
(5, 'surenanthonyvithanage@gmail.com', '$2y$12$QhZPjfSiaPcMcQJp2DQ.4.cH1rNJi6xVnKFTTyc4Ie.vNMLvY7jZG', '2020-04-26 09:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `blogid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `blogid`, `date`) VALUES
(1, 'Jaden', 'Awesome post guys!!', 6, '2018-07-28 00:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `names` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `names`, `email`, `message`, `date`) VALUES
(1, 'Ethredah', 'ethredah@gmail.com', 'Hello there Ushauri team.', '2018-07-27 16:57:59'),
(2, 'Chao', 'chao@gmail.com', 'Hi there!!', '2018-07-27 16:57:59'),
(4, 'James Mlamba', 'jaymo@gmail.com', 'I am interested in a meeting.', '2018-07-28 01:38:22'),
(5, 'James Mlamba', 'ethredah@gmail.com', 'hi', '2018-07-31 19:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `code`, `name`, `created_time`, `updated_time`) VALUES
(1, 'NLU', 'Neon lights under', '2020-04-30 04:35:14', '2020-04-30 04:35:14'),
(2, 'BRK', 'ABS brakes', '2020-04-30 04:35:26', '2020-04-30 04:35:26'),
(3, 'ESP', 'ESP', '2020-04-30 04:35:35', '2020-04-30 04:35:35'),
(4, 'ESD', 'ESD', '2020-04-30 04:35:42', '2020-04-30 04:35:42'),
(5, 'ATH', 'Anti-th', '2020-04-30 04:35:51', '2020-04-30 04:35:51'),
(6, 'TIN', 'Tined glass', '2020-04-30 04:36:01', '2020-04-30 04:36:01'),
(7, 'ALA', 'Alarm', '2020-04-30 04:36:11', '2020-04-30 04:36:11'),
(8, 'PRO', 'Protection framework', '2020-04-30 04:36:23', '2020-04-30 04:36:23'),
(9, 'PAR', 'Parking sensor', '2020-04-30 04:36:33', '2020-04-30 04:36:33'),
(10, 'ELE', 'Electric windows', '2020-04-30 04:36:45', '2020-04-30 04:36:45'),
(11, 'ELM', 'Electric mirrors', '2020-04-30 04:36:55', '2020-04-30 04:36:55'),
(12, 'XEN', 'Xenon', '2020-04-30 04:37:03', '2020-04-30 04:37:03'),
(13, 'DSP', 'Designed spoiler', '2020-04-30 04:37:18', '2020-04-30 04:37:18'),
(14, 'SWC', 'Steering wheels control', '2020-04-30 04:37:32', '2020-04-30 04:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `fueltype`
--

CREATE TABLE `fueltype` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fueltype`
--

INSERT INTO `fueltype` (`id`, `code`, `name`, `created_time`, `updated_time`) VALUES
(2, 'PRT', 'PETROL', '2020-04-29 09:40:50', '2020-04-29 09:40:50'),
(3, 'DIE', 'Diesel', '2020-04-30 04:33:17', '2020-04-30 04:33:17'),
(4, 'OTH', 'Other', '2020-04-30 04:33:27', '2020-04-30 04:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `extension` varchar(200) NOT NULL,
  `post_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `extension`, `post_id`) VALUES
(1, 'type4.jpg', 'jpg', 8),
(2, 'type5.jpg', 'jpg', 8),
(3, 'type6.jpg', 'jpg', 8),
(4, 'type1.jpg', 'jpg', 9),
(5, 'type2.jpg', 'jpg', 9),
(6, 'type3.jpg', 'jpg', 9),
(7, 'type1.jpg', 'jpg', 10),
(8, 'type2.jpg', 'jpg', 10),
(9, '01022020024343_v1320f.jpg', 'jpg', 1),
(10, '01022020024322_v1320d.jpg', 'jpg', 1),
(11, '01022020024312_v1320c.jpg', 'jpg', 1),
(12, '01022020024300_v1320b.jpg', 'jpg', 1),
(13, '01022020023815_v1306e.jpg', 'jpg', 2),
(14, '01022020023747_v1306d.jpg', 'jpg', 2),
(15, '01022020023739_v1306c.jpg', 'jpg', 2),
(16, '01022020023732_v1306b.jpg', 'jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `ref_no` varchar(200) NOT NULL,
  `title` varchar(400) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `chassis` varchar(200) NOT NULL,
  `distance` varchar(200) NOT NULL,
  `transmissionId` varchar(200) NOT NULL,
  `doors` varchar(200) NOT NULL,
  `typeId` varchar(200) NOT NULL,
  `brandId` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `engineSize` varchar(200) NOT NULL,
  `steering` varchar(200) NOT NULL,
  `seats` varchar(200) NOT NULL,
  `vehicleYear` varchar(200) NOT NULL,
  `fuelId` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `speed` varchar(200) NOT NULL,
  `moreDescription` varchar(200) NOT NULL,
  `contactInfo` varchar(200) NOT NULL,
  `contactMobile` varchar(200) NOT NULL,
  `contactEmail` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `ref_no`, `title`, `description`, `amount`, `chassis`, `distance`, `transmissionId`, `doors`, `typeId`, `brandId`, `model`, `engineSize`, `steering`, `seats`, `vehicleYear`, `fuelId`, `color`, `speed`, `moreDescription`, `contactInfo`, `contactMobile`, `contactEmail`, `date`) VALUES
(1, 'V1320', 'TOYOTA Noah', 'Toyota Noah was released for sale in November 2001 as the successor to the Toyota Townace Noah. Keyword for Noah was Cubic Creator. The car has both new style and comfortable ride at high level. It is', '5,000', 'ZRR75W', '149,000 kms', '3', '	5', '7', '3', 'Noah SI 4WD', '2000 cc	', 'Right', '7', '2012', '2', 'Pearl white', '200', 'Comparing to Townace Noah, platform was changed from FR to FF type, with 2 liter D-4 engine. Townace Noah was made very similar to its brother models, but when it was renewed with its new name Noah, i', 'For further details contact through sales@used-motorcars.com', '0769391251', 'surenanthonyvithanage@gmail.com', '2020-05-01 22:15:04'),
(2, 'V1306', 'TOYOTA RAV', 'Refined and individual, the New RAV4 range fuses true SUV character with style and technology. A unique combination of high torque and low emissions makes the RAV4 the â€˜go anywhereâ€™ vehicle, perfe', '9,200', 'ACA36W', '5,000 kms', '3', '4', '9', '3', 'RAV 4 Style package 2WD', '2400 cc', 'Right', '5', '2015', '2', 'Silver', '200', 'Refined and individual, the New RAV4 range fuses true SUV character with style and technology. A unique combination of high torque and low emissions makes the RAV4 the â€˜go anywhereâ€™ vehicle, perfe', 'Contact using the following email: sales@used-motorcars.com for further information      ', '0769391251', 'surenanthonyvithanage@gmail.com', '2020-05-01 22:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `date`) VALUES
(3, 'ethredah@gmail.com', '2018-07-27 18:21:30'),
(4, 'james@hack3.io', '2018-07-27 18:21:30'),
(6, 'admin@pikash.sales', '2018-07-28 01:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `transmissiontype`
--

CREATE TABLE `transmissiontype` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transmissiontype`
--

INSERT INTO `transmissiontype` (`id`, `code`, `name`, `created_time`, `updated_time`) VALUES
(2, 'MNL', 'Manual', '2020-04-29 09:39:22', '2020-04-29 09:39:22'),
(3, 'AUT', 'Automatic', '2020-04-30 04:32:53', '2020-04-30 04:32:53'),
(4, 'OTH', 'OTHER', '2020-04-30 04:33:01', '2020-04-30 04:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_brand`
--

CREATE TABLE `vehicle_brand` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vehicle_brand`
--

INSERT INTO `vehicle_brand` (`id`, `code`, `name`, `image`, `created_time`, `updated_time`) VALUES
(3, 'BMW', 'BMW', 'make-4.png', '2020-04-30 04:26:55', '2020-04-30 04:26:55'),
(4, 'CHL', 'Chevrolet', 'make-6.png', '2020-04-30 04:27:29', '2020-04-30 04:27:29'),
(5, 'AUD', 'Audi', 'make-3.png', '2020-04-30 04:27:57', '2020-04-30 04:27:57'),
(7, 'FIT', 'Fiat', 'make-7.png', '2020-04-30 04:28:24', '2020-04-30 04:28:24'),
(8, 'FRD', 'Ford', 'make-8.png', '2020-04-30 04:28:39', '2020-04-30 04:28:39'),
(9, 'Dod', 'Dodge', 'make-5.png', '2020-04-30 04:29:09', '2020-04-30 04:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`id`, `code`, `name`, `image`, `created_time`, `updated_time`) VALUES
(7, 'CRT', 'Convertible', 'type1.jpg', '2020-04-30 04:29:37', '2020-04-30 04:29:37'),
(9, 'HTB', 'Hatchback', 'type3.jpg', '2020-04-30 04:30:21', '2020-04-30 04:30:21'),
(10, 'MVN', 'Minivan', 'type4.jpg', '2020-04-30 04:30:42', '2020-04-30 04:30:42'),
(11, 'PKU', 'Pickups', 'type5.jpg', '2020-04-30 04:31:09', '2020-04-30 04:31:09'),
(12, 'SDN', 'Sedan', 'type6.jpg', '2020-04-30 04:31:25', '2020-04-30 04:31:25'),
(13, 'SPC', 'Sport Cars', 'type6.jpg', '2020-04-30 04:31:46', '2020-04-30 04:31:46'),
(14, 'SUV', 'SUV', 'type7.jpg', '2020-04-30 04:31:59', '2020-04-30 04:31:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogid` (`blogid`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fueltype`
--
ALTER TABLE `fueltype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transmissiontype`
--
ALTER TABLE `transmissiontype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_brand`
--
ALTER TABLE `vehicle_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fueltype`
--
ALTER TABLE `fueltype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transmissiontype`
--
ALTER TABLE `transmissiontype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_brand`
--
ALTER TABLE `vehicle_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
