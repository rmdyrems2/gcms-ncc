-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2023 at 02:58 AM
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
(12, 'BSIT - INFO TECH', '3rd', '2023-05-14 11:01:26'),
(13, 'Education (EDUC)', '2nd', '2023-05-21 09:06:19'),
(14, 'BEE - General Education', '2nd', '2023-06-22 03:11:01'),
(15, 'BSBA', '3rd', '2023-06-29 05:31:40');

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
(8, 'System Under Construction', 17, 'dfg', '2023-05-21 10:53:07'),
(9, 'Test21123', 12, 'mamamoupdate', '2023-06-19 05:59:21');

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
(1, 'aboutus', 'About Us', '<div style=\"text-align: start;\"><font color=\"#7b8898\"><span style=\"font-size: 26px;\">The web-based guidance and counseling management system for Mandaue City College is a product of collaborative efforts of our team of developers and researchers. Our aim is to make the guidance office\'s processes more efficient and effective, ensuring that students receive the support they need to achieve their academic and personal goals. Our system is designed with the needs of the students and guidance office staff in mind, providing a user-friendly platform that can help staff manage and monitor the services offered. We believe that our system has the potential to significantly improve the quality of guidance and counseling services offered by Mandaue City College, and we welcome feedback and suggestions to further enhance our platform.</span></font><br></div>', NULL, NULL, NULL),
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
  `StudentName` varchar(200) DEFAULT NULL,
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

INSERT INTO `tblstudent` (`ID`, `StudentName`, `NickName`, `StudentEmail`, `StudentClass`, `Gender`, `BirthOrder`, `DOB`, `POB`, `CurrentAdd`, `StuID`, `FatherName`, `MotherName`, `ContactNumber`, `AltenateNumber`, `Address`, `UserName`, `Password`, `Image`, `DateofAdmission`) VALUES
(16, 'Remy C. Camiguel', 'Rem / Rems / Mimi', 'ccamiguel2@gmail.com', '12', 'Male', 'First', '2023-05-10', 'B. Suico St,. Tabok Rd, Tingub Mandaue City', 'Nagcasunog, Bindoy, Negros, Oriental', '2143-2121', 'Felix', 'Marivic21', 9463330110, 9463330110, 'tanignasd', 'realjoker2', 'fd16e8cb273b3d77635e416fb300c4a2', 'b8e8f69833ef4b48dc6d7e0661cfe3531684661296.jpg', '2023-05-21 09:28:16'),
(20, 'Riza Mae Alivio', 'Riza', 'riza@gmail.com', '12', 'Female', 'First', '3123-02-21', 'B. Suico St,. Tabok Rd, Tingub Mandaue City', 'Nagcasunog, Bindoy, Negros, Oriental', '12345678', 'Felix Jr Camiguel', 'Marivic Gwapa', 906635984, 9063068463, 'kjahdjkasdjakds', 'riza23', '98ee5c0cdbd5b9af5c157e8161c5de1e', '8d6ea6c80eb6e5b2274aa40d403b03921687163982.jpg', '2023-06-19 08:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentnotice`
--

CREATE TABLE `tblstudentnotice` (
  `ID` int NOT NULL,
  `NoticeTitle` mediumtext COLLATE utf8mb4_general_ci,
  `ClassName` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NoticeMessage` mediumtext COLLATE utf8mb4_general_ci,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `StudentName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudentnotice`
--

INSERT INTO `tblstudentnotice` (`ID`, `NoticeTitle`, `ClassName`, `NoticeMessage`, `CreationDate`, `StudentName`) VALUES
(1, 'test title', '', 'Test Message', '2023-05-05 10:34:14', ''),
(2, 'asewaeq', '', 'qweqwe', '2023-05-05 10:34:14', 'Stydebasda'),
(3, 'test title', '', 'Test Message', '2023-05-05 10:34:53', ''),
(4, 'asewaeq', '', 'qweqwe', '2023-05-05 10:34:53', 'Stydebasda');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblcounseling`
--
ALTER TABLE `tblcounseling`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblstudentnotice`
--
ALTER TABLE `tblstudentnotice`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
