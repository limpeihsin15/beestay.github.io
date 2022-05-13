-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 09:47 AM
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
-- Database: `event_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_form`
--

CREATE TABLE `comment_form` (
  `id` int(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_form`
--

INSERT INTO `comment_form` (`id`, `name`, `email`, `topic`, `comment`, `datetime`) VALUES
(1, 'Siew Mee', 'Siewmee@example.com', 'plastics', 'what plastics can be recycle in malaysia?', 1561702115),
(2, 'Nicky', 'nickyisme@gmail.com', 'recycle', 'Where can I recycle my old bicycle?', 1561702162),
(3, 'Haiky', 'haikyhey@gmail.com', 'recycle', 'How does recycling work?', 1561702170),
(4, 'PirateKing', 'pirateisthebest@example.com', 'Recycling', 'Why do we have to sort our recyclables?', 1561702285),
(5, 'Donald Duck', 'quackquackquack@gmail.com', 'Food', 'I heard someone said eat meat will lead to pollution. is this correct? I feel like my friend is cheating me because I like meat like chicken.', 1561707335);

-- --------------------------------------------------------

--
-- Table structure for table `event_form`
--

CREATE TABLE `event_form` (
  `id` int(6) UNSIGNED NOT NULL,
  `companyname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `eventemail` varchar(50) NOT NULL,
  `eventname` varchar(30) NOT NULL,
  `eventdate` date NOT NULL,
  `eventtime` time NOT NULL,
  `venue` varchar(500) NOT NULL,
  `detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_form`
--

INSERT INTO `event_form` (`id`, `companyname`, `firstname`, `lastname`, `phone`, `eventemail`, `eventname`, `eventdate`, `eventtime`, `venue`, `detail`) VALUES
(1, 'World Vision', 'Wei Wei', 'Chin', '0145896226', 'weiwei.01@hotmail.com', '30-Hour Famine 2019 ', '2019-07-20', '08:00:00', 'Stadium Malawati, Shah Alam', 'Improve health through nutrition knowledge\r\nSet up Village Saving and Loan Associations\r\nImprove access to quality healthcare services\r\nImprove community child protection services\r\nGive children the opportunity to participate in their community'),
(2, 'UKM', 'Ahmad', 'Muthahd', '0178564236', 'akuahmad@example.com', 'Sustainable way', '2019-11-25', '01:00:00', 'Universiti Kebangssan Malaysia main campus in Bangi', 'UKM has outlined many activities that not only benefit the campus and students but also help achieve universal sustainability. One emphasis is to make recycling a way of life.'),
(3, 'iCYCLE', 'QiWen', 'Tang', '0175689236', 'qiwen.recycle@example.com', 'COME RECYCLE!', '2019-10-15', '15:00:00', 'iCYCLE Carbon Store', 'Items accepted for reuse, recycling and safe disposal:\r\n\r\nBooks\r\nVinyl Records\r\nBread Tags');

-- --------------------------------------------------------

--
-- Table structure for table `event_registration`
--

CREATE TABLE `event_registration` (
  `id` int(6) UNSIGNED NOT NULL,
  `eventname` varchar(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `countrycode` int(4) NOT NULL,
  `mobile` int(13) NOT NULL,
  `addressline1` varchar(30) NOT NULL,
  `addressline2` varchar(30) NOT NULL,
  `postcode` int(5) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `purpose` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_registration`
--

INSERT INTO `event_registration` (`id`, `eventname`, `firstname`, `lastname`, `email`, `countrycode`, `mobile`, `addressline1`, `addressline2`, `postcode`, `state`, `country`, `purpose`) VALUES
(1, 'Paper & Plastic Recycling Conference', ' Johnson', 'Vuiton', ' js@example.com', 60, 123456789, ' 1, Jalan 1', ' Kuala Lumpur', 56000, ' Kuala Lumpur', ' malaysia', ' Testing 1'),
(2, 'Paper & Plastic Recycling Conference', ' Louis', 'Vuiton', ' ls@example.com', 60, 199999999, ' 2, Jalan 2', ' Cheras', 56000, ' Kuala Lumpur', ' malaysia', ' Record 2'),
(3, 'Earth Warrior 2019', ' Brandon', 'Tan', ' bt@example.com', 60, 165567777, ' 3, Jalan 3', ' Taman Jaya', 56000, ' Selangor', ' malaysia', ' Record 3'),
(4, 'Earth Warrior 2019', ' Chris', 'Yap', ' cy@example.com', 60, 134456666, ' 4, Jalan 4', ' Cheras Batu 9', 43200, ' Selangor', ' malaysia', ' Record 4'),
(5, 'Earth Warrior 2019', ' Christine', 'Lim', ' cl@example.com', 60, 134456689, ' 5, Jalan 5', ' Cheras Batu 9', 43200, ' Selangor', ' malaysia', ' Record 5'),
(6, 'Where Plastics Recycling Moves Forward', ' John', 'Wong', ' jw@example.com', 60, 134456566, ' 6, Jalan 6', ' Cheras Batu 9', 43200, ' Selangor', ' malaysia', ' Record 6'),
(7, 'Paper & Plastic Recycling Conference', ' LIM', 'HSIN', ' shuennylim@gmail.com', 60, 0, ' C-18-03, ANGKASA CONDOMINIUM', ' 5, JALAN PUNCAK GADING, TAMAN', 56000, ' WILAYAH PERSEKUTUAN', ' afganistan', ' hcochwe'),
(8, 'Paper & Plastic Recycling Conference', ' LIM', 'HSIN', ' shuennylim@gmail.com', 60, 0, ' C-18-03, ANGKASA CONDOMINIUM', ' 5, JALAN PUNCAK GADING, TAMAN', 56000, ' WILAYAH PERSEKUTUAN', ' afganistan', ' hcochwe'),
(9, 'Paper & Plastic Recycling Conference', ' LIM', 'HSIN', ' shuennylim@gmail.com', 60, 0, ' C-18-03, ANGKASA CONDOMINIUM', ' 5, JALAN PUNCAK GADING, TAMAN', 56000, ' WILAYAH PERSEKUTUAN', ' afganistan', ' hcochwe'),
(10, 'Paper & Plastic Recycling Conference', ' LIM', 'HSIN', ' shuennylim@gmail.com', 60, 199999999, ' C-18-03, ANGKASA CONDOMINIUM', ' 5, JALAN PUNCAK GADING, TAMAN', 56000, ' WILAYAH PERSEKUTUAN', ' malaysia', ' testing again'),
(11, 'Paper & Plastic Recycling Conference', ' LIM', 'HSIN', ' shuennylim@gmail.com', 60, 199999999, ' C-18-03, ANGKASA CONDOMINIUM', ' 5, JALAN PUNCAK GADING, TAMAN', 56000, ' WILAYAH PERSEKUTUAN', ' afganistan', ' testing again');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_form`
--

CREATE TABLE `feedback_form` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feedback` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_form`
--

INSERT INTO `feedback_form` (`id`, `firstname`, `lastname`, `email`, `feedback`) VALUES
(1, 'sada', 'mimi', 'vsfv@example.com', '-thumb up'),
(2, 'Josh', 'adam', 'adam9876@gmail.com', 'still ok la'),
(3, 'food', 'monster', 'foodmonster@example.com', 'can talk about food waste also'),
(4, 'Euniss', 'Eng', 'eunisseng@example.com', 'Can put the concept of recycle?'),
(5, 'Ooi Wei', 'Chiew', 'chiewweeee@gmail.com', 'I think the website is very good. I like this!'),
(6, 'Jingle', 'Beelle', 'jinglebell@hotmail.com', 'Thank you for create this page! Let me know the importance of recycle.'),
(7, 'Minnie', 'Mouse', 'ilovemickey@gmail.com', 'After reading the information had been provided, I feel happy that not only me care about recycle! Fight for our earth!!!!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_form`
--
ALTER TABLE `comment_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_form`
--
ALTER TABLE `event_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_registration`
--
ALTER TABLE `event_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_form`
--
ALTER TABLE `feedback_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_form`
--
ALTER TABLE `comment_form`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_form`
--
ALTER TABLE `event_form`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_registration`
--
ALTER TABLE `event_registration`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback_form`
--
ALTER TABLE `feedback_form`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
