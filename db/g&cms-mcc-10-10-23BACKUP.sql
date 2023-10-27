-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2023 at 12:13 AM
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
  `appointment_time` time DEFAULT NULL,
  `appointment_status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `apmnttype`, `apmntMessage`, `appointment_date`, `appointment_time`, `appointment_status`, `CreationDate`) VALUES
(12, '19216821', 'Counseling', 'Pagda ug madafakin studyload', '2023-10-25', '07:53:00', NULL, '2023-10-07 09:53:53'),
(14, '19216821', 'Testing', 'Work na giatay\r\n', '2023-10-12', '12:31:00', NULL, '2023-10-07 10:16:30'),
(15, '19216821', 'Counseling', 'Appointment Status ', '2023-10-11', '08:19:00', 'In Progress', '2023-10-08 09:19:56'),
(17, '256314588', 'Counseling', 'Makajsbwksjsns', '2023-10-10', '17:11:00', 'Pending', '2023-10-09 04:11:56'),
(18, '19216821', 'Counseling', 'asdasdasdasdgegehehe', '2023-10-24', '12:31:00', 'Pending', '2023-10-09 04:15:32'),
(19, '19216821', 'Counseling', 'Please bring your ID hehe', '2023-10-12', '20:31:00', 'Pending', '2023-10-09 22:35:09');

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
(1, 'aboutus', 'About use', '<p style=\"text-align: justify;\"><font color=\"#7b8898\" face=\"helvetica\" size=\"5\">The web-based guidance and counseling management system for Mandaue City College is a product of collaborative efforts of our team of developers and researchers. Our aim is to make the guidance office\'s processes more efficient and effective, ensuring that students receive the support they need to achieve their academic and personal goals. Our system is designed with the needs of the students and guidance office staff in mind, providing a user-friendly platform that can help staff manage and monitor the services offered. We believe that our system has the potential to significantly improve the quality of guidance and counseling services offered by Mandaue City College, and we welcome feedback and suggestions to further enhance our platform.</font></p>', NULL, NULL, NULL),
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
(3, 'System Under Construction', 'This GCMS of MCC is under construction.', '2023-04-06 03:46:30');

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
(21, 'Remy', 'Carcuevass', 'Camiguel', 'Rem / Rems / Mimi', 'remy.camiguel2@gmail.com', '12', 'Male', 'First', '2001-10-21', 'B. Suico St,. Tabok Rd, Tingub Mandaue City', 'Nagcasunog, Bindoy, Negros, Oriental', '19216821', 'Felix Jr Camiguel', 'Marivic Gwapa', 9463330110, 9063068463, 'B.suico St.Tabok Rd Tingub Mandaue City', 'remrem', 'fd16e8cb273b3d77635e416fb300c4a2', 'd5adb6ad5c3245a3b68afd113b8c326f1688181393.jpg', '2023-07-01 03:16:33'),
(22, 'Mary Mae', 'Dionzon', 'Paran', 'Mimi', 'marymae@gmail.com', '13', 'Female', '2', '2023-07-22', 'B. Suico St,. Tabok Rd, Tingub Mandaue City', 'B. Suico St,. Tabok Rd, Tingub Mandaue City', '143-2121-23', 'Roger That', 'Malyn ', 906635984, 9069068310, 'B. Suico St,. Tabok Rd, Tingub Mandaue City', 'marymae', 'fd16e8cb273b3d77635e416fb300c4a2', 'c7f9be4c8654fd0ac5e477f2608dce661688797754.jpg', '2023-07-08 06:29:14'),
(23, 'Pablo', 'The', 'Great', 'ulk', 'pablo@gmail.com', '17', 'Male', '1', '2023-07-09', 'tingub', 'india dapit ila mado', '256314588', 'alma', 'allan', 9463330110, 906306843, 'tingub', 'Ashura', '31adec86c0fea47e18138c8ee74fc57c', 'd5adb6ad5c3245a3b68afd113b8c326f1688874912.jpg', '2023-07-09 03:55:12'),
(24, 'Riza', 'G', 'Alivio', 'Riz', 'riza@gmail.com', '17', 'Female', '2nd', '2001-10-23', 'B. Suico St,. Tabok Rd, Tingub Mandaue City', 'B. Suico St,. Tabok Rd, Tingub Mandaue City', '112-345-21', 'Roger That', 'Marivic Camiguel', 906635984, 954656565, 'B. Suico St,. Tabok Rd, Tingub Mandaue City', 'riza22', '8041fcaa002f024b5648b2e7e6e15680', '8d6ea6c80eb6e5b2274aa40d403b03921695699890.jpg', '2023-09-26 03:44:50');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblstudentnotice`
--
ALTER TABLE `tblstudentnotice`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
