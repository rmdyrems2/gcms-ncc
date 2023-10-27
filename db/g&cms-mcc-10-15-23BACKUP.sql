-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2023 at 07:34 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g&cms-mcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int NOT NULL,
  `user_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apmnttype` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apmntMessage` varchar(2000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `appointment_date` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `appointment_time` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `appointment_status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `apmnttype`, `apmntMessage`, `appointment_date`, `appointment_time`, `appointment_status`, `CreationDate`) VALUES
(1, '19216821', 'Testing', 'TEst', '0231-03-21', '12:31', 'Pending', '2023-10-14 16:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int NOT NULL,
  `sender_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `receiver_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `message_text` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time_stamp` timestamp NOT NULL,
  `dateTimeCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Remy C. Camiguel', 'admin', 9463330110, 'admin@gmail.com', 'fd16e8cb273b3d77635e416fb300c4a2', '2023-05-05 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `ID` int NOT NULL,
  `ClassName` varchar(50) DEFAULT NULL,
  `Section` varchar(20) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`ID`, `ClassName`, `Section`, `CreationDate`) VALUES
(12, 'BS - INFO TECH', '3rd', '2023-05-14 11:01:26'),
(13, 'Education (EDUC)', '2nd', '2023-05-21 09:06:19'),
(14, 'BEE - General Education', '2nd', '2023-06-22 03:11:01'),
(15, 'BSBA', '3rd', '2023-06-29 05:31:40'),
(17, 'Inum BSITAGAY', '1st', '2023-07-08 03:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblcounseling`
--

CREATE TABLE `tblcounseling` (
  `ID` int NOT NULL,
  `StudentName` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `CounselingReason` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `CounselingDate` date DEFAULT NULL,
  `CounselingNotes` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PupilCommitment` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CreationDate` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcounseling`
--

INSERT INTO `tblcounseling` (`ID`, `StudentName`, `CounselingReason`, `CounselingDate`, `CounselingNotes`, `PupilCommitment`, `CreationDate`) VALUES
(1, 'Remy C. Camiguel', 'Walay sud sud classe', '2023-05-09', 'Imong mama way sud2', 'Di nako mo sud', '2023-05-11 04:50:02.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `ID` int NOT NULL,
  `NoticeTitle` mediumtext,
  `ClassId` int DEFAULT NULL,
  `NoticeMsg` mediumtext,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`ID`, `NoticeTitle`, `ClassId`, `NoticeMsg`, `CreationDate`) VALUES
(8, 'Tagay Salvo ugma', 12, 'pagda ug 50', '2023-05-21 10:53:07'),
(9, 'Test21123', 12, 'mamamoupdate', '2023-06-19 05:59:21'),
(11, 'Test 23', 12, 'This is a test', '2023-10-05 02:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext,
  `PageDescription` mediumtext,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<p style=\"text-align: justify;\"><font color=\"#7b8898\" face=\"helvetica\" size=\"4\">\"Step into the vibrant world of innovation at Mandaue City College, where dreams and technology unite to transform the landscape of student support. We are the creative minds behind the Guidance and Counseling Management System, a revolutionary initiative designed to empower students on their academic journey. Our vision is clear: to provide every student with accessible, efficient, and personalized support that paves the way for academic and personal growth.</font></p><p style=\"text-align: justify;\"><font color=\"#7b8898\" face=\"helvetica\" size=\"4\">In this digital era, we believe in harnessing the power of technology to revolutionize the way guidance services are delivered. With our system, we aim to break barriers, making student support available at your fingertips. Gone are the days of cumbersome administrative processes; instead, we offer a streamlined, user-friendly platform that fosters a sense of belonging, connection, and achievement.</font></p><p style=\"text-align: justify;\"><font color=\"#7b8898\" face=\"helvetica\" size=\"4\">At the heart of our mission is a commitment to shaping a future where every student is equipped with the guidance and tools to unlock their full potential. We invite you to be part of this transformative journey, where every click, interaction, and moment brings us closer to a brighter, more successful academic future. Join us in redefining the narrative of student success, one digital step at a time.\"</font></p>', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', 'Mandaue City College Sports Complex', 'mcc@outlook.com', 906306663, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpublicnotice`
--

CREATE TABLE `tblpublicnotice` (
  `ID` int NOT NULL,
  `NoticeTitle` varchar(200) DEFAULT NULL,
  `NoticeMessage` mediumtext,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpublicnotice`
--

INSERT INTO `tblpublicnotice` (`ID`, `NoticeTitle`, `NoticeMessage`, `CreationDate`) VALUES
(3, 'System Under Construction', 'This GCMS of MCC is under construction.', '2023-04-06 03:46:30'),
(4, 'I\'m so handsome, shet!', 'Imong mama handsome', '2023-10-11 15:21:43'),
(5, 'Information Technology Night', 'Please bring your partner', '2023-10-11 15:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `ID` int NOT NULL,
  `FirstName` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `MiddleName` varchar(250) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `NickName` varchar(20) NOT NULL,
  `StudentEmail` varchar(200) DEFAULT NULL,
  `StudentClass` varchar(100) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `BirthOrder` varchar(15) NOT NULL,
  `DOB` date DEFAULT NULL,
  `POB` varchar(200) NOT NULL,
  `CurrentAdd` varchar(200) NOT NULL,
  `StuID` varchar(200) DEFAULT NULL,
  `FatherName` mediumtext,
  `MotherName` mediumtext,
  `ContactNumber` bigint DEFAULT NULL,
  `AltenateNumber` bigint DEFAULT NULL,
  `Address` mediumtext,
  `UserName` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `DateofAdmission` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`ID`, `FirstName`, `MiddleName`, `LastName`, `NickName`, `StudentEmail`, `StudentClass`, `Gender`, `BirthOrder`, `DOB`, `POB`, `CurrentAdd`, `StuID`, `FatherName`, `MotherName`, `ContactNumber`, `AltenateNumber`, `Address`, `UserName`, `Password`, `Image`, `DateofAdmission`) VALUES
(21, 'Remy', 'Carcuevass', 'Camiguel', 'Rems', 'remy.camiguel2@gmail.com', '12', 'Male', 'First', '2001-10-21', 'B. Suico St,. Tabok Rd, Tingub Mandaue City', 'Nagcasunog, Bindoy, Negros, Oriental', '19216821', 'Felix Jr Camiguel', 'Marivic Gwapa', 9463330110, 9063068463, 'B.suico St.Tabok Rd Tingub Mandaue City', 'remrem', '98b393532299ed043abca8567da08d74', 'd5adb6ad5c3245a3b68afd113b8c326f1688181393.jpg', '2023-07-01 03:16:33'),
(31, 'Mary Mae', 'Dionzon', 'Paran', 'Mae', 'marymae@gmail.com', '14', 'Female', '3rd', '2001-02-10', 'Nagcasunog, Bindoy, Negros, Orientall', 'Nagcasunog, Bindoy, Negros, Oriental', 'MCC1245-67', 'Roger That', 'Marivic Gwapa', 946656565, 945544566, 'Nagcasunog, Bindoy, Negros, Orientall', 'marymae-mcc', '1252160b3e8f43f2fe2d23001d5152c8', '2eff6b0c646aa1ab06b64ba3d5818a741697353185.png', '2023-10-15 06:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentnotice`
--

CREATE TABLE `tblstudentnotice` (
  `ID` int NOT NULL,
  `NoticeTitle` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `ClassName` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `StudentName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NoticeMessage` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudentnotice`
--

INSERT INTO `tblstudentnotice` (`ID`, `NoticeTitle`, `ClassName`, `StudentName`, `NoticeMessage`, `CreationDate`) VALUES
(1, 'test title', '', '', 'Test Message', '2023-05-05 10:34:14'),
(2, 'asewaeq', '', 'Stydebasda', 'qweqwe', '2023-05-05 10:34:14'),
(3, 'test title', '', '', 'Test Message', '2023-05-05 10:34:53'),
(4, 'asewaeq', '', 'Stydebasda', 'qweqwe', '2023-05-05 10:34:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcounseling`
--
ALTER TABLE `tblcounseling`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnotice`
--
ALTER TABLE `tblnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpublicnotice`
--
ALTER TABLE `tblpublicnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstudentnotice`
--
ALTER TABLE `tblstudentnotice`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblcounseling`
--
ALTER TABLE `tblcounseling`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpublicnotice`
--
ALTER TABLE `tblpublicnotice`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblstudentnotice`
--
ALTER TABLE `tblstudentnotice`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
