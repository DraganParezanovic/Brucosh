-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 12:21 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hakatonprojekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `blockeduser`
--

CREATE TABLE `blockeduser` (
  `UserID` int(11) NOT NULL,
  `BlockedUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DiscusionID` int(11) NOT NULL,
  `Body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `UserID`, `DiscusionID`, `Body`) VALUES
(4, 7, 1, 'Mjdfnjdf');

-- --------------------------------------------------------

--
-- Table structure for table `discusion`
--

CREATE TABLE `discusion` (
  `DiscusionID` int(11) NOT NULL,
  `Title` varchar(40) NOT NULL,
  `Body` text NOT NULL,
  `UserID` int(11) NOT NULL,
  `Datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discusion`
--

INSERT INTO `discusion` (`DiscusionID`, `Title`, `Body`, `UserID`, `Datum`) VALUES
(1, 'Diskusija1', 'Fakultet Fakultet Fakultet Fakultet Fakultet Fakultet Fakultetvv  vFakultetv  Fakultet v vFakultetvvvvFakultet Fakultet v v vv Fakultetv Fakultet Fakultet vFakultetFakultetFakultetFakultetFakultetFakultetvvvFakultet FakultetFakultet vvvvv Fakultet vFakultetvvFakultet', 6, '2020-11-11'),
(2, 'Diskusija2', 'Profesori', 7, '2020-11-11'),
(21, 'Pitanje', 'mascmcas', 6, '2020-11-11'),
(22, 'Pitanje', 'Kako ste?', 6, '2020-11-11'),
(23, 'Pitanje', 'Kako ste?', 6, '2020-11-11'),
(24, 'Pitanje', 'Gde ste?', 7, '2020-11-11'),
(25, 'Pitanje', '', 7, '2020-11-11'),
(26, 'Pitanjce', 'Ovo je neko pitanje', 7, '2020-11-11'),
(27, 'Pitanje', 'kdMYkydMkdy', 7, '2020-11-11'),
(28, 'Pitanje', 'jnjnjn', 7, '2020-11-11'),
(29, 'Pitanje pre kupovine', 'jnjnjn', 7, '2020-11-11'),
(30, 'Pitanje', 'm ', 7, '2020-11-11'),
(31, 'NTP', 'STa se radi bracooo?', 7, '2020-11-11'),
(33, 'Pitanje', 'dskcnsdj', 7, '2022-11-19'),
(34, 'sdgfislv', 'kdsnvnjz ,mmadnl', 7, '2022-11-19'),
(35, 'Pitanje pre kupovine', '', 7, '2022-11-19'),
(36, 'Vrati se...', 'Volim te i nedostaješ mi najdraža moja razmišljam o tebi svai dan.', 7, '2022-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `discusion_topic`
--

CREATE TABLE `discusion_topic` (
  `DiscusionID` int(11) NOT NULL,
  `TopicID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discusion_topic`
--

INSERT INTO `discusion_topic` (`DiscusionID`, `TopicID`) VALUES
(1, 4),
(1, 7),
(2, 5),
(2, 19),
(21, 5),
(22, 4),
(23, 7),
(23, 4),
(24, 6),
(24, 11),
(25, 6),
(25, 11),
(25, 10),
(26, 5),
(27, 4),
(28, 4),
(29, 9),
(30, 9),
(31, 4),
(33, 5),
(34, 3),
(34, 4),
(35, 5),
(36, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reportedcomment`
--

CREATE TABLE `reportedcomment` (
  `ReporterID` int(11) NOT NULL,
  `ReportedID` int(11) NOT NULL,
  `CommentID` int(11) NOT NULL,
  `ReportedCommentID` int(11) NOT NULL,
  `Valid` varchar(10) NOT NULL,
  `Explanation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reportedpost`
--

CREATE TABLE `reportedpost` (
  `ReporterID` int(11) NOT NULL,
  `ReportedID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `ReportedPostID` int(11) NOT NULL,
  `Valid` varchar(10) NOT NULL,
  `Explanation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `TopicID` int(11) NOT NULL,
  `TopicName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`TopicID`, `TopicName`) VALUES
(2, 'Beograd'),
(3, 'Nis'),
(4, 'Novi Sad'),
(5, 'Cacak'),
(6, 'Matematika'),
(7, 'Bor'),
(8, 'FTN'),
(9, 'Zrenjanin'),
(10, 'Kragujevac'),
(11, 'Kosovska Mitrovica'),
(12, 'Novi Pazar'),
(15, 'Programiranje'),
(16, 'Mehatronika'),
(17, 'Elektronika'),
(18, 'Energetika'),
(19, 'Elektrotehnika'),
(20, 'Fizika'),
(21, 'Mehanika'),
(22, 'IT'),
(23, 'Telekomunikacije'),
(24, 'Pitanja'),
(25, 'Upis'),
(26, 'Stipendije'),
(27, 'Dom'),
(28, 'Literatura'),
(34, 'Projekti'),
(35, 'Preporuke'),
(36, 'Restorani'),
(37, 'Teretane'),
(38, 'Kafici'),
(39, 'Zurke'),
(40, 'Stanovi'),
(41, 'Takmicenja'),
(42, 'Drustvo'),
(43, 'Oprema'),
(45, 'Profesori'),
(46, 'Biblioteke'),
(48, 'ETF'),
(49, 'Ispiti'),
(50, 'Prakse'),
(51, 'Hobiji'),
(52, 'Muzeji'),
(53, 'Koncerti');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` text NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `Role`) VALUES
(6, 'lukabujosevic@gmail.', '$2y$10$Muo9bZMf94rsssi0ZGlNION73nrTipumVdbAo7q9TgSCfsL5uKpIa', 'lukabujosevic@gmail.com', 'user'),
(7, 'jerotije', '$2y$10$JTNmkcxrPps8zjzBZjkboemmxS4QoXXobm36mdnlSNMxXfaUkqpfi', 'jerotijevic.veljko3@gmail.com', 'user'),
(8, 'pr-2022-288', '$2y$10$bqv3VcFx/RiWXFD4yt32KuBpnAc48jBeeFin.PZcCm8MpHUqe7XS.', 'olgadukic@gmail.com', 'user'),
(9, 'jerota', '$2y$10$HLUR/E48.95b4unmICATPOEQlCMr.l34iMTEeFytloBru1IkFp4yS', 'veljko.jerotijevic@gmail.com', 'user'),
(10, 'jerotijeee', '$2y$10$TUGcKio7Y1uOgbL.d82Is.VlUGLQzGUrOva0tO11h.ZCp9feH1yI6', 'gfjkesnlvaxvla@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blockeduser`
--
ALTER TABLE `blockeduser`
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BlockedUserID` (`BlockedUserID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `DiscusionID` (`DiscusionID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `discusion`
--
ALTER TABLE `discusion`
  ADD PRIMARY KEY (`DiscusionID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `discusion_topic`
--
ALTER TABLE `discusion_topic`
  ADD KEY `DiscusionID` (`DiscusionID`),
  ADD KEY `TopicID` (`TopicID`);

--
-- Indexes for table `reportedcomment`
--
ALTER TABLE `reportedcomment`
  ADD PRIMARY KEY (`ReportedCommentID`),
  ADD KEY `ReportedID` (`ReportedID`),
  ADD KEY `ReporterID` (`ReporterID`);

--
-- Indexes for table `reportedpost`
--
ALTER TABLE `reportedpost`
  ADD PRIMARY KEY (`ReportedPostID`),
  ADD KEY `ReporterID` (`ReporterID`),
  ADD KEY `ReportedID` (`ReportedID`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`TopicID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discusion`
--
ALTER TABLE `discusion`
  MODIFY `DiscusionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `reportedcomment`
--
ALTER TABLE `reportedcomment`
  MODIFY `ReportedCommentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportedpost`
--
ALTER TABLE `reportedpost`
  MODIFY `ReportedPostID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `TopicID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blockeduser`
--
ALTER TABLE `blockeduser`
  ADD CONSTRAINT `blockeduser_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `blockeduser_ibfk_2` FOREIGN KEY (`BlockedUserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`DiscusionID`) REFERENCES `discusion` (`DiscusionID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `discusion`
--
ALTER TABLE `discusion`
  ADD CONSTRAINT `discusion_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `discusion_topic`
--
ALTER TABLE `discusion_topic`
  ADD CONSTRAINT `discusion_topic_ibfk_1` FOREIGN KEY (`DiscusionID`) REFERENCES `discusion` (`DiscusionID`),
  ADD CONSTRAINT `discusion_topic_ibfk_2` FOREIGN KEY (`TopicID`) REFERENCES `topics` (`TopicID`);

--
-- Constraints for table `reportedcomment`
--
ALTER TABLE `reportedcomment`
  ADD CONSTRAINT `reportedcomment_ibfk_1` FOREIGN KEY (`ReportedID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `reportedcomment_ibfk_2` FOREIGN KEY (`ReporterID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `reportedpost`
--
ALTER TABLE `reportedpost`
  ADD CONSTRAINT `reportedpost_ibfk_1` FOREIGN KEY (`ReporterID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `reportedpost_ibfk_2` FOREIGN KEY (`ReportedID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
