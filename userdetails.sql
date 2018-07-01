-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2018 at 07:59 AM
-- Server version: 5.5.60-0+deb8u1
-- PHP Version: 5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `userdetails`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
`ID` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `chapter` int(11) NOT NULL,
  `question` varchar(80) NOT NULL,
  `option1` varchar(80) NOT NULL,
  `option2` varchar(80) NOT NULL,
  `option3` varchar(80) NOT NULL,
  `option4` varchar(80) NOT NULL,
  `correctoption` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`ID`, `section`, `chapter`, `question`, `option1`, `option2`, `option3`, `option4`, `correctoption`) VALUES
(1, 2, 1, 'How old is the little girl?', '5', '7', '6', '9', '9'),
(2, 2, 2, 'What is the little girl'' name?', 'Lily', 'Riri', 'Amanda', 'Sarah', 'Riri'),
(3, 2, 3, 'What does Docter Doom think about introducing himself to Iron Man?', 'He presumes he doesn''t have to', 'He presumes he needs to', 'He thinks he shoulds''t tell him his name', 'He doesn''t want to introduce himself', 'He presumes he doesn''t have to'),
(4, 1, 4, 'What did Goku eat earlier today?', 'Tiger', 'Bear', 'Chicken', 'Duck', 'Bear'),
(5, 1, 1, 'What can Goku do despite how quite the town is?', 'Sense people', 'Hear people', 'Talk to people', 'Smell people', 'Sense people'),
(6, 1, 2, 'What did Goku think the girl tried to do?', 'Steal his catch', 'Run him over', 'Steal his money', 'Catch him', 'Steal his catch'),
(7, 1, 3, 'Why was Goku surprised', 'He thought the girl turned into a turtle', 'He doesn''t like turtles', 'He had never seen such a slow turtle', 'He thought the girl was ugly', 'He thought the girl turned into a turtle'),
(8, 2, 4, 'What did Howard Stark do to the company?', 'He made it successful ', 'He ran it into the ground', 'He ran for president of the company', 'He sold it', 'He ran it into the ground'),
(9, 3, 1, 'Where does Barry visit his father?', 'At his father father''s home', 'At prison', 'At the hospital', 'At church', 'At prison'),
(10, 3, 2, 'What news does Darryl tell Barry?', 'He got a new car', 'He is now a captain', 'it is his birthday', 'He wants to sleep', 'He is now a captain'),
(11, 3, 3, 'What does Barry want from the bookshop?', 'A new phone', 'A comic', 'Some candy', 'A newspaper', 'A comic'),
(12, 3, 4, 'How does Barry feel in the park?', 'He feels like the luckiest man alive', 'He feels hungry', 'He feels tired', 'He feels like a superhero', 'He feels like the luckiest man alive'),
(57, 4, 1, '', '1', '2', '3', '4', '2'),
(58, 4, 2, '1', '2', '3', '4', '5', '2'),
(59, 4, 3, '1', '2', '3', '4', '5', '2'),
(60, 4, 4, '1', '2', '3', '4', '5', '2');

-- --------------------------------------------------------

--
-- Table structure for table `Sectiondetails`
--

CREATE TABLE IF NOT EXISTS `Sectiondetails` (
`ID` int(11) NOT NULL,
  `Section_name` varchar(80) NOT NULL,
  `Section_description` varchar(80) NOT NULL,
  `Section_icon_src` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sectiondetails`
--

INSERT INTO `Sectiondetails` (`ID`, `Section_name`, `Section_description`, `Section_icon_src`) VALUES
(1, 'Section 1', 'Follow Goku in his adventure.', 'dragonballdude.gif'),
(2, 'Section 2', 'Ironman suits up to save the world.', 'ironman.gif'),
(3, 'Section 3', 'This time, the Flash has to run faster than he ever has.', 'flash.gif'),
(17, 'Section Tas', 'vsuyfd8yuogdiyudfuytd', 'flash.gif');

-- --------------------------------------------------------

--
-- Table structure for table `usagelog`
--

CREATE TABLE IF NOT EXISTS `usagelog` (
`ID` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chapter` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `option-picked` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usagelog`
--

INSERT INTO `usagelog` (`ID`, `User`, `Time`, `chapter`, `section`, `option-picked`) VALUES
(1, 'syufytsdf', '2018-06-20 18:15:32', 1, 1, 'this one'),
(2, 'teststshjsvyihdh', '2018-06-20 18:16:11', 1, 1, 'this one'),
(3, 'teststshjsvyihdh', '2018-06-20 18:35:19', 2, 1, ''),
(4, 'teststshjsvyihdh', '2018-06-20 18:39:15', 3, 1, 'He thought the girl turned into a turtle'),
(5, 'teststshjsvyihdh', '2018-06-20 19:03:18', 4, 1, 'Bear'),
(6, '11111', '2018-06-20 20:23:13', 1, 1, 'Sense people'),
(7, '11111', '2018-06-20 20:27:00', 2, 1, 'Steal his catch'),
(8, '11111', '2018-06-20 20:29:50', 3, 1, 'He had never seen such a slow turtle'),
(9, '11111', '2018-06-20 20:30:33', 3, 1, 'He thought the girl turned into a turtle'),
(10, '11111', '2018-06-20 20:30:33', 3, 1, 'He thought the girl turned into a turtle'),
(11, '11111', '2018-06-20 20:31:32', 4, 1, 'Tiger'),
(12, '11111', '2018-06-20 20:31:48', 4, 1, 'Bear'),
(13, '11111', '2018-06-20 20:45:32', 1, 2, '9'),
(14, '11111', '2018-06-20 20:47:00', 2, 2, 'Riri'),
(15, '11111', '2018-06-20 21:38:53', 1, 2, '9'),
(16, '11111', '2018-06-20 21:45:28', 3, 3, 'A comic'),
(17, '11111', '2018-06-20 21:47:11', 1, 3, 'At prison'),
(18, 'gfhghdthdrt', '2018-06-21 00:22:59', 1, 4, '5'),
(19, 'gfhghdthdrt', '2018-06-21 00:23:06', 1, 4, '3'),
(20, 'gfhghdthdrt', '2018-06-21 00:23:13', 1, 4, '2'),
(21, 'gfhghdthdrt', '2018-06-21 00:26:28', 1, 5, '2'),
(22, 'testlog', '2018-06-21 00:28:03', 1, 1, 'Sense people'),
(23, 'testlog', '2018-06-21 00:31:22', 1, 4, '2'),
(24, 'testlog', '2018-06-21 00:31:39', 1, 4, '3'),
(25, 'jgyfsyf', '2018-06-21 00:36:01', 1, 4, '2'),
(26, 'jgyfsyf', '2018-06-21 00:42:31', 2, 4, '2'),
(27, 'dmn327', '2018-06-21 01:44:23', 4, 1, 'Bear'),
(28, 'dmn327', '2018-06-21 01:44:36', 1, 2, '9'),
(29, 'dmn327', '2018-06-21 01:44:43', 2, 2, 'Riri');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `score` int(11) NOT NULL,
  `score2` int(11) NOT NULL,
  `score3` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `score`, `score2`, `score3`) VALUES
(1, 'TEST', 3, 1, 0),
(2, 'guusje123', 99, 0, 0),
(3, 'Tas', 3, 3, 0),
(4, 'NIp', 2, 3, 0),
(5, 'haha', 1, 0, 0),
(6, 'oioi', 0, 0, 0),
(7, 'ytyt', 0, 0, 0),
(8, 'yuttdersrt', 0, 0, 0),
(9, 'byfvtc', 0, 0, 0),
(10, 'nip', 0, 0, 0),
(11, 'ccycyj', 0, 0, 0),
(12, 'random123', 0, 0, 0),
(13, 'testtest', 1, 2, 0),
(14, 'dmn327', 6, 0, 0),
(15, 'TASSS123', 2, 0, 0),
(16, 'boob', 3, 0, 0),
(17, 'heyhey', 3, 0, 0),
(18, 'allardo', 3, 0, 0),
(19, 'gu', 2, 0, 0),
(20, 'allard', 3, 0, 0),
(21, 'asd', 0, 0, 0),
(22, '', 0, 0, 0),
(23, 'huy', 0, 0, 0),
(24, 'hihihihihi', 0, 0, 0),
(25, 'uyuy', 0, 0, 0),
(26, '1', 1, 0, 0),
(27, 'Guusje12', 3, 3, 0),
(28, 'hsujiguiyfdf', 3, 0, 0),
(29, 'Linh', 2, 3, 0),
(30, 'Nippl3', 3, 3, 0),
(31, 'John', 0, 0, 0),
(32, '653', 3, 0, 0),
(33, 'Hey', 0, 0, 0),
(34, 'juy', 0, 0, 0),
(35, 'heroshiroo', 0, 0, 0),
(36, 'esya', 1, 2, 0),
(37, 'Goforit', 3, 3, 0),
(38, 'Danial', 3, 3, 0),
(39, 'aliya', 3, 1, 0),
(40, 'qib', 3, 2, 0),
(41, 'aniq', 3, 0, 0),
(42, 'aqil', 3, 0, 0),
(43, 'nur monalisa', 3, 3, 0),
(44, 'Andre', 3, 3, 0),
(45, 'nor hatiza', 3, 3, 0),
(46, 'Irfan', 2, 0, 0),
(47, 'boboy', 1, 0, 0),
(48, 'eyy', 0, 0, 0),
(49, 'yvsdgtyufd', 0, 0, 0),
(50, 'newnewb', 0, 0, 0),
(51, 'nip2', 2, 0, 0),
(52, 'testingtesting', 4, 4, 3),
(53, 'guusjeeee', 4, 4, 0),
(54, 'kasadaakje', 4, 2, 4),
(55, 'koffieee', 0, 4, 0),
(56, 'Hajsihdbd', 0, 4, 1),
(57, 'syufytsdf', 1, 0, 0),
(58, 'Bsudidndbdjd', 4, 4, 0),
(59, 'teststshjsvyihdh', 4, 0, 0),
(60, '11111', 9, 0, 0),
(61, 'hfytsdyt', 0, 0, 0),
(62, 'gfhghdthdrt', 17, 0, 0),
(63, 'testlog', 13, 0, 0),
(64, 'jgyfsyf', 14, 0, 0),
(65, 'gfgf', 0, 0, 0),
(66, 'testing', 0, 0, 0),
(67, 'Ndjd', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Sectiondetails`
--
ALTER TABLE `Sectiondetails`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usagelog`
--
ALTER TABLE `usagelog`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `Sectiondetails`
--
ALTER TABLE `Sectiondetails`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `usagelog`
--
ALTER TABLE `usagelog`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
