-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 12:52 PM
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
-- Database: `intranet_voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `ID` bigint(20) NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PhotoURL` varchar(200) NOT NULL,
  `PositionID` int(11) NOT NULL,
  `PartyID` int(11) NOT NULL,
  `Vote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`ID`, `Name`, `PhotoURL`, `PositionID`, `PartyID`, `Vote`) VALUES
(10, 'Aly Mama', 'IntranetVotingSystem/Image/Candidate/Untitled-1.png', 1, 21, 0),
(11, 'Rowena Alpha', 'IntranetVotingSystem/Image/Candidate/Untitled-2.png', 1, 22, 0),
(12, 'Zamree Karama', 'IntranetVotingSystem/Image/Candidate/Untitled-3.png', 9, 22, 0),
(13, 'Mijie Sayadi', 'IntranetVotingSystem/Image/Candidate/Untitled-4.png', 9, 21, 0),
(14, 'Rey Villarin', 'IntranetVotingSystem/Image/Candidate/Untitled-5.png', 24, 21, 0),
(15, 'Micho Robledo', 'IntranetVotingSystem/Image/Candidate/Untitled-1.png', 24, 22, 0),
(16, 'Charisa Llema', 'IntranetVotingSystem/Image/Candidate/Untitled-2.png', 25, 21, 0),
(17, 'Nerico Mingoc', 'IntranetVotingSystem/Image/Candidate/Untitled-3.png', 25, 22, 0),
(18, 'Joseph Andas', 'IntranetVotingSystem/Image/Candidate/Untitled-3.png', 5, 21, 0),
(19, 'Irene Bakili', 'IntranetVotingSystem/Image/Candidate/Untitled-1.png', 5, 22, 0),
(20, 'Asis Tiblan', 'IntranetVotingSystem/Image/Candidate/Untitled-2.png', 6, 21, 0),
(21, 'Rahmat Hailaya', 'IntranetVotingSystem/Image/Candidate/Untitled-3.png', 6, 22, 0),
(22, 'Aly Mama', 'IntranetVotingSystem/Image/Candidate/Untitled-1.png', 26, 21, 0),
(23, 'Rowena Alpha', 'IntranetVotingSystem/Image/Candidate/Untitled-2.png', 26, 22, 0),
(24, 'Zamree Karama', 'IntranetVotingSystem/Image/Candidate/Untitled-3.png', 27, 22, 0),
(25, 'Mijie Sayadi', 'IntranetVotingSystem/Image/Candidate/Untitled-4.png', 27, 21, 0),
(26, 'Rey Villarin', 'IntranetVotingSystem/Image/Candidate/Untitled-5.png', 27, 21, 0),
(27, 'Micho Robledo', 'IntranetVotingSystem/Image/Candidate/Untitled-1.png', 27, 22, 0),
(28, 'Wonder Woman', 'IntranetVotingSystem/Image/Candidate/Untitled-2.png', 9, 21, 0),
(29, 'Black Widow', 'IntranetVotingSystem/Image/Candidate/Untitled-3.png', 9, 22, 0),
(30, 'Bat Man', 'IntranetVotingSystem/Image/Candidate/Untitled-3.png', 9, 21, 0),
(31, 'Irene Bakili', 'IntranetVotingSystem/Image/Candidate/Untitled-1.png', 9, 22, 0),
(32, 'Asis Tiblan', 'IntranetVotingSystem/Image/Candidate/Untitled-2.png', 9, 21, 0),
(33, 'Rahmat Hailaya', 'IntranetVotingSystem/Image/Candidate/Untitled-3.png', 9, 22, 0),
(34, 'Aly Mama', 'IntranetVotingSystem/Image/Candidate/Untitled-1.png', 9, 21, 0),
(35, 'Rowena Alpha', 'IntranetVotingSystem/Image/Candidate/Untitled-2.png', 9, 22, 0),
(36, 'Zamree Karama', 'IntranetVotingSystem/Image/Candidate/Untitled-3.png', 2, 22, 0),
(37, 'Mijie Sayadi', 'IntranetVotingSystem/Image/Candidate/Untitled-4.png', 2, 21, 0),
(38, 'Rey Villarin', 'IntranetVotingSystem/Image/Candidate/Untitled-5.png', 9, 21, 0),
(39, 'Micho Robledo', 'IntranetVotingSystem/Image/Candidate/Untitled-1.png', 9, 22, 0),
(40, 'Charisa Llema', 'IntranetVotingSystem/Image/Candidate/Untitled-2.png', 9, 21, 0),
(41, 'Nerico Mingoc', 'IntranetVotingSystem/Image/Candidate/Untitled-3.png', 9, 22, 0),
(42, 'Joseph Andas', 'IntranetVotingSystem/Image/Candidate/Untitled-3.png', 9, 21, 0),
(43, 'Green Lantern', 'IntranetVotingSystem/Image/Candidate/Untitled-1.png', 9, 22, 0),
(44, 'Super Man', 'IntranetVotingSystem/Image/Candidate/Untitled-2.png', 9, 21, 0),
(45, 'Iron Man', 'IntranetVotingSystem/Image/Candidate/Untitled-3.png', 9, 22, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `candidateview`
-- (See below for the actual view)
--
CREATE TABLE `candidateview` (
`ID` bigint(20)
,`Name` varchar(100)
,`PhotoURL` varchar(200)
,`PositionID` int(11)
,`PartyID` int(11)
,`Vote` int(11)
,`Decree` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `participantview`
-- (See below for the actual view)
--
CREATE TABLE `participantview` (
`VoterCount` bigint(21)
,`NonVoterCount` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `ID` bigint(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `LogoURL` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`ID`, `Name`, `LogoURL`) VALUES
(20, 'Independent', 'IntranetVotingSystem/Image/Logo/no-party.jpg'),
(21, 'VOICES', 'IntranetVotingSystem/Image/Logo/chris-kursikowski-ze5wHM9kplc-unsplash.jpg'),
(22, 'SSC', 'IntranetVotingSystem/Image/Logo/damian-barczak-U9E423m3Hd8-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `ID` bigint(20) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Decree` int(11) NOT NULL,
  `Count` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`ID`, `Name`, `Decree`, `Count`) VALUES
(1, 'President', 1, 1),
(2, 'Vice-President', 2, 1),
(5, 'Auditor', 5, 1),
(6, 'P.I.O', 6, 1),
(9, 'Board Of Directors', 9, 8),
(24, 'Secretary', 3, 1),
(25, 'Treasurer', 4, 1),
(26, 'Business Manager', 7, 1),
(27, 'Sergeant at Arms', 8, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tablestotalrowcountview`
-- (See below for the actual view)
--
CREATE TABLE `tablestotalrowcountview` (
`PositionCount` bigint(21)
,`PartyCount` bigint(21)
,`CandidateCount` bigint(21)
,`VoterCount` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` bigint(20) NOT NULL,
  `FirstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Surname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `FirstName`, `Surname`, `Username`, `Password`) VALUES
(1, 'Aly', 'Mama', 'admin', '123'),
(3, 'Alyzayn Raeese', 'Mama', 'cyberaly27', '321');

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `ID` bigint(20) NOT NULL,
  `IDNumber` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `HasVoted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`ID`, `IDNumber`, `Name`, `Password`, `HasVoted`) VALUES
(9, '15-24681', 'Aly Mama', '123', 0),
(10, '12-22535', 'Rowena Alpha', '123', 0);

-- --------------------------------------------------------

--
-- Structure for view `candidateview`
--
DROP TABLE IF EXISTS `candidateview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `candidateview`  AS SELECT `candidate`.`ID` AS `ID`, `candidate`.`Name` AS `Name`, `candidate`.`PhotoURL` AS `PhotoURL`, `candidate`.`PositionID` AS `PositionID`, `candidate`.`PartyID` AS `PartyID`, `candidate`.`Vote` AS `Vote`, `position`.`Decree` AS `Decree` FROM (`candidate` join `position` on(`candidate`.`PositionID` = `position`.`ID`)) ORDER BY `position`.`Decree` ASC, `candidate`.`Name` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `participantview`
--
DROP TABLE IF EXISTS `participantview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `participantview`  AS SELECT (select count(0) from `voter` where `voter`.`HasVoted` = 1) AS `VoterCount`, (select count(0) from `voter` where `voter`.`HasVoted` = 0) AS `NonVoterCount` ;

-- --------------------------------------------------------

--
-- Structure for view `tablestotalrowcountview`
--
DROP TABLE IF EXISTS `tablestotalrowcountview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tablestotalrowcountview`  AS SELECT (select count(0) from `position`) AS `PositionCount`, (select count(0) from `party`) AS `PartyCount`, (select count(0) from `candidate`) AS `CandidateCount`, (select count(0) from `voter`) AS `VoterCount` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
