-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2024 at 08:23 PM
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
-- Database: `newbwf`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcamps`
--

CREATE TABLE `tblcamps` (
  `campID` int NOT NULL,
  `campName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `campType` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `campDate` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `doctorId` int DEFAULT NULL,
  `mmuId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcamps`
--

INSERT INTO `tblcamps` (`campID`, `campName`, `campType`, `campDate`, `location`, `doctorId`, `mmuId`) VALUES
(1, 'Camp1', 'type1', '2024-02-24', 'Pune', 1, 1),
(2, 'Camp2', 'type2', '2024-02-25', 'Mumbai', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE `tblcity` (
  `cityID` int NOT NULL,
  `userID` int DEFAULT NULL,
  `cityName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`cityID`, `userID`, `cityName`, `phone`, `email`, `password`) VALUES
(1, 1, 'Pune', NULL, NULL, NULL);

--
-- Triggers `tblcity`
--
DELIMITER $$
CREATE TRIGGER `after_insert_city` AFTER INSERT ON `tblcity` FOR EACH ROW INSERT INTO tblUser (email, phone, password, userTypeID)
VALUES (NEW.email, NEW.phone, NEW.password, 6)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctor`
--

CREATE TABLE `tbldoctor` (
  `doctorID` int NOT NULL,
  `imgURL` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profile` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mmuID` int DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `userID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldoctor`
--

INSERT INTO `tbldoctor` (`doctorID`, `imgURL`, `name`, `email`, `address`, `phone`, `department`, `profile`, `mmuID`, `password`, `userID`) VALUES
(1, 'zom.png', 'Dr.Pratik', 'pratik@bwf.com', 'Mahanagar', '5645676545', 'Surgery', 'Doctor', NULL, '12345', NULL),
(2, 'you.png', 'Shubham', 'shu@bwf.com', 'Vanaz', '4567543456', 'Medical', 'Doc', 1, '12345', NULL),
(3, NULL, 'Dr. Ajeet', 'ajeet@bwf.com', 'Gorai', '6789365245', 'Neurology ', 'Surgeon ', 1, '12345', NULL);

--
-- Triggers `tbldoctor`
--
DELIMITER $$
CREATE TRIGGER `after_insert_doctor` AFTER INSERT ON `tbldoctor` FOR EACH ROW INSERT INTO tblUser (email, phone, password, userTypeID)
VALUES (NEW.email, NEW.phone, NEW.password, 3)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbldriver`
--

CREATE TABLE `tbldriver` (
  `driverID` int NOT NULL,
  `userID` int DEFAULT NULL,
  `mmuID` int DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `tbldriver`
--
DELIMITER $$
CREATE TRIGGER `after_insert_driver` AFTER INSERT ON `tbldriver` FOR EACH ROW INSERT INTO tblUser (email, phone, password, userTypeID)
VALUES (NEW.email, NEW.phone, NEW.password, 2)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblmmu`
--

CREATE TABLE `tblmmu` (
  `mmuID` int NOT NULL,
  `cityID` int DEFAULT NULL,
  `userID` int DEFAULT NULL,
  `mmuName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mmuNumber` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `insuranceDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmmu`
--

INSERT INTO `tblmmu` (`mmuID`, `cityID`, `userID`, `mmuName`, `mmuNumber`, `insuranceDate`) VALUES
(1, 1, 1, 'Swift Desire', NULL, NULL);

--
-- Triggers `tblmmu`
--
DELIMITER $$
CREATE TRIGGER `after_insert_mmu` AFTER INSERT ON `tblmmu` FOR EACH ROW INSERT INTO tblUser (email, phone, password, userTypeID)
VALUES (NEW.email, NEW.phone, NEW.password, 4)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblmmuuser`
--

CREATE TABLE `tblmmuuser` (
  `assignmentID` int NOT NULL,
  `mmuID` int DEFAULT NULL,
  `userID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `patientID` int NOT NULL,
  `imgURL` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `doctor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sex` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthdate` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `village` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bloodgroup` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adharNo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `abhaNo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `insuranceCompany` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `userID` int DEFAULT NULL,
  `mmuID` int DEFAULT NULL,
  `addDate` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registrationTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `hospitalID` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`patientID`, `imgURL`, `name`, `email`, `doctor`, `address`, `phone`, `sex`, `birthdate`, `age`, `village`, `bloodgroup`, `adharNo`, `abhaNo`, `insuranceCompany`, `userID`, `mmuID`, `addDate`, `registrationTime`, `hospitalID`, `password`) VALUES
(1, NULL, 'NAVNATH AVHALE', 'navnath@bwf.com', NULL, NULL, '9822936268', 'M', NULL, '65', 'SAKEGAON', '', '8614 4186 4798', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(2, NULL, 'ABADAS AVHALE', 'abadas@bwf.com', NULL, NULL, '9657154821', 'M', NULL, '63', 'SAKEGAON', '', '2992 4824 8465', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(3, NULL, 'KADUBAI AVVHALE', 'kadubai@bwf.com', NULL, NULL, '9096454757', 'F', NULL, '75', 'SAKEGAON', '', '3586 8178 3248', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(4, NULL, 'RAMKURSHNA AVHALE', 'ramkurshna@bwf.com', NULL, NULL, '9975274084', 'M', NULL, '78', 'SAKEGAON', '', '8114 1697 9025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(5, NULL, 'RADHABAI KALE', 'radhabai@bwf.com', NULL, NULL, '8788998939', 'F', NULL, '50', 'SAKEGAON', '', '3730 9102 6037', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(6, NULL, 'SHIVAJI GANDE', 'shivaji@bwf.com', NULL, NULL, '9421675840', 'M', NULL, '56', 'SAKEGAON', '', '2204 9878 9257', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(7, NULL, 'RADHA AVHALE', 'radha@bwf.com', NULL, NULL, '9975274084', 'F', NULL, '34', 'SAKEGAON', '', '3944 2694 2843', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(8, NULL, 'RATAN DOKHLE', 'ratan@bwf.com', NULL, NULL, '8010406781', 'M', NULL, '41', 'SAKEGAON', '', '3975 2027 8184', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(9, NULL, 'SAVTIA GANDE', 'savtia@bwf.com', NULL, NULL, '9545112280', 'F', NULL, '44', 'SAKEGAON', '', '8270 9264 39955', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(10, NULL, 'BABUROAVHALE', 'baburao@bwf.com', NULL, NULL, '9096454757', 'M', NULL, '60', 'SAKEGAON', '', '3254 6059 8629', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(11, NULL, 'BAHURAO AVHALE', 'bahurao@bwf.com', NULL, NULL, '8600302215', 'M', NULL, '76', 'SAKEGAON', '', '6371 1035 4781', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(12, NULL, 'SHAU THORAT', 'shau@bwf.com', NULL, NULL, '7709261430', 'M', NULL, '76', 'SAKEGAON', '', '6599 4118 3582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(13, NULL, 'INDERABAI GANDE', 'inderabai@bwf.com', NULL, NULL, '9545112280', 'F', NULL, '68', 'SAKEGAON', '', '4695 6316 3958', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(14, NULL, 'ZUMBAERBAI AVHALE', 'zumbaerbai@bwf.com', NULL, NULL, '9096459462', 'F', NULL, '78', 'SAKEGAON', '', '6445 8752 8559', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(15, NULL, 'PANDAREINATH AVHALE', 'pandareinath@bwf.com', NULL, NULL, '7498056706', 'M', NULL, '77', 'SAKEGAON', '', '3134 2690 4884', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(16, NULL, 'SANTARAM AVHALE', 'santaram@bwf.com', NULL, NULL, '950386397', 'M', NULL, '66', 'SAKEGAON', '', '9663 3876 3130', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(17, NULL, 'KALYAN AVHALE', 'kalyan@bwf.com', NULL, NULL, '9373103011', 'M', NULL, '30', 'SAKEGAON', '', '2107 7303 8175', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(18, NULL, 'PANDAREINATH AVHALE', 'pandareinath2@bwf.com', NULL, NULL, '9545596179', 'M', NULL, '53', 'SAKEGAON', '', '2248 9938 0695', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(19, NULL, 'DAYNSHWER AVHALE', 'daynshwer@bwf.com', NULL, NULL, '9890620918', 'M', NULL, '27', 'SAKEGAON', '', '9489 9580 1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(20, NULL, 'BHIMABAI AVHALE', 'bhimabai@bwf.com', NULL, NULL, '9822936268', 'F', NULL, '73', 'SAKEGAON', '', '2465 4762 7043', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(21, NULL, 'KANTABAI AVHALE', 'kantabai@bwf.com', NULL, NULL, '7498056706', 'F', NULL, '70', 'SAKEGAON', '', '9473 8692 0894', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(22, NULL, 'SARTHAK AVHALE', 'sarthak@bwf.com', NULL, NULL, '9689565069', 'M', NULL, '2', 'SAKEGAON', '', '8186 6734 6837', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(23, NULL, 'SOHAM AVHALE', 'soham@bwf.com', NULL, NULL, '9673937297', 'M', NULL, '13', 'SAKEGAON', '', '3890 9964 7719', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(24, NULL, 'BAHUSHEB JADHA', 'bahusheb@bwf.com', NULL, NULL, '9130686859', 'M', NULL, '60', 'SAKEGAON', '', '8101 5254 0236', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(25, NULL, 'ADITYA PAWAR', 'aditya@bwf.com', NULL, NULL, '9325409772', 'M', NULL, '6', 'SAKEGAON', '', '8741 0358 6518', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(26, NULL, 'BAPURAO AVHALE', 'bapurao@bwf.com', NULL, NULL, '7028140557', 'M', NULL, '52', 'SAKEGAON', '', '5156 6409 8599', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(27, NULL, 'KONDIRAM AVHALE', 'kondiram@bwf.com', NULL, NULL, '9096459462', 'M', NULL, '70', 'SAKEGAON', '', '4336 2856 7369', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(28, NULL, 'KAKASHEB GANDE', 'kakasheb@bwf.com', NULL, NULL, '9545112280', 'M', NULL, '81', 'SAKEGAON', '', '7072 7418 2842', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(29, NULL, 'SHOBA AHALE', 'shoba@bwf.com', NULL, NULL, '7028140557', 'F', NULL, '27', 'SAKEGAON', '', '3433 4427 0675', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(30, NULL, 'PAREYANKA PAWAR', 'pareyanka@bwf.com', NULL, NULL, '9325409772', 'F', NULL, '8', 'SAKEGAON', '', '2445 5732 7003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(31, NULL, 'MANOJ AVADE', 'manoj@bwf.com', NULL, NULL, '9172090474', 'M', NULL, '35', 'SAKEGAON', '', '8023 4763 3409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(32, NULL, 'DIVASH AVADE', 'divash@bwf.com', NULL, NULL, '9172090474', 'M', NULL, '4', 'SAKEGAON', '', '7426 7202 7397', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(33, NULL, 'SUBHDERABAI AVHALE', 'subhderabai@bwf.com', NULL, NULL, NULL, 'F', NULL, '77', 'SAKEGAON', '', '7173 1941 1440', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(34, NULL, 'BABAN AVHALE', 'babn@bwf.com', NULL, NULL, '7499790739', 'M', NULL, NULL, 'SAKEGAON', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(35, NULL, 'PUNDLIAK PAWAR', 'pundliak@bwf.com', NULL, NULL, '9579426050', 'M', NULL, '41', 'SAKEGAON', '', '9766 0362 7705', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(36, NULL, 'SURESH PAWAR', 'suresh@bwf.com', NULL, NULL, '9604514473', 'M', NULL, '77', 'Malegaon', '', '5909 4150 6439', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(37, NULL, 'GITANJALI DHOBLE', 'gitanjali@bwf.com', NULL, NULL, '8459608740', 'F', NULL, '29', 'Malegaon', '', '9424 4244 8531', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(38, NULL, 'GAJARABAI DHOBLE', 'gajarabai@bwf.com', NULL, NULL, '8605667848', 'F', NULL, '79', 'Malegaon', '', '9669 6250 2565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(39, NULL, 'ARJUN SONAVANE', 'arjun@bwf.com', NULL, NULL, '9960521917', 'M', NULL, '56', 'Malegaon', '', '8530 1269 7565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(40, NULL, 'LALITA AUTADE', 'lalita@bwf.com', NULL, NULL, '7498009118', 'F', NULL, '30', 'Malegaon', '', '6174 0256 7052', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(41, NULL, 'DADASABEB AUTADE', 'dadasabeb@bwf.com', NULL, NULL, '7498009018', 'F', NULL, '40', 'Malegaon', '', '7271 7760 6101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(42, NULL, 'SUBHASH SHEJUL', 'subhash@bwf.com', NULL, NULL, '9637584927', 'M', NULL, '68', 'Malegaon', '', '8908 7665 2622', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(43, NULL, 'BAPURAO KALE', 'bapurao@bwf.com', NULL, NULL, '9923791753', 'M', NULL, '74', 'Malegaon', '', '5752 1326 5949', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(44, NULL, 'KOMAL SONWANE', 'komal@bwf.com', NULL, NULL, '9834663171', 'F', NULL, '13', 'Malegaon', '', '6457 0153 2433', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(45, NULL, 'ARADHY SONAWANE', 'aradhy@bwf.com', NULL, NULL, '9607449175', 'F', NULL, '8', 'Malegaon', '', '7835 8791 7061', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(46, NULL, 'PRATIKSHA KALE', 'pratiksha@bwf.com', NULL, NULL, '9359391827', 'F', NULL, '20', 'Malegaon', '', '8626 9397 5297', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(47, NULL, 'NANDAN PAWAR', 'nandan@bwf.com', NULL, NULL, '7387619295', 'M', NULL, '73', 'Malegaon', '', '5563 9975 0247', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(48, NULL, 'SUMANBAI', 'sumanbai@bwf.com', NULL, NULL, NULL, 'F', NULL, '75', 'Malegaon', '', '3795 0187 8194', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(49, NULL, 'JANVI KALE', 'janvi@bwf.com', NULL, NULL, '9529067964', 'F', NULL, '6', 'Malegaon', '', '3898 6556 3378', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(50, NULL, 'SAINATH DHOBLE', 'sainath@bwf.com', NULL, NULL, '9552387543', 'M', NULL, '27', 'Malegaon', '', '9294 1420 3587', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(51, NULL, 'SHIVAJI SONWANE', 'shivaji@bwf.com', NULL, NULL, '7498215250', 'M', NULL, '39', 'Malegaon', '', '6036 5429 2312', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(52, NULL, 'VIBHAV KALE', 'vibhav@bwf.com', NULL, NULL, '8308638930', 'M', NULL, '10', 'Malegaon', '', '7734 0501 0169', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(53, NULL, 'RUDRA TUPE', 'rudra@bwf.com', NULL, NULL, '9503886970', 'M', NULL, '6', 'Babhulgaon', '', '4610 9785 8212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(54, NULL, 'PARJAL BODKHE', 'parjal@bwf.com', NULL, NULL, '9960950518', 'F', NULL, '7', 'Babhulgaon', '', '3682 7101 5681', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(55, NULL, 'SARTHAK AHER', 'sarthak@bwf.com', NULL, NULL, '9130714080', 'M', NULL, '7', 'Babhulgaon', '', '7556 3337 0506', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(56, NULL, 'JAYSHERI AHER', 'jaysheri@bwf.com', NULL, NULL, NULL, 'F', NULL, '8', 'Babhulgaon', '', '5712 8890 8997', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(57, NULL, 'NILESH RAUT', 'nilesh@bwf.com', NULL, NULL, '992139297', 'M', NULL, '9', 'Babhulgaon', '', '7631 0827 9027', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(58, NULL, 'KUNL TUPE', 'kunl@bwf.com', NULL, NULL, '8766826221', 'F', NULL, '9', 'Babhulgaon', '', '4754 4979 1038', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(59, NULL, 'ISHARI TUPE', 'ishari@bwf.com', NULL, NULL, '9309737642', 'F', NULL, '8', 'Babhulgaon', '', '3436 6532 1847', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(60, NULL, 'SHRESH KAKDE', 'shresh@bwf.com', NULL, NULL, '9767576274', 'M', NULL, '8', 'Babhulgaon', '', '6709 7743 5512', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(61, NULL, 'SAYYAD MUNNA', 'sayyad@bwf.com', NULL, NULL, NULL, 'M', NULL, '8', 'Babhulgaon', '', '9201 5138 8068', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(62, NULL, 'KARTIK KAKUREL', 'kartik@bwf.com', NULL, NULL, '9860397553', 'M', NULL, '9', 'Babhulgaon', '', '9974 8065 3188', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(63, NULL, 'ALIA SHAIKH', 'alia@bwf.com', NULL, NULL, NULL, 'F', NULL, '9', 'Babhulgaon', '', '4498 3540 9228', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(64, NULL, 'SHIVANI KAKULKHE', 'shivani@bwf.com', NULL, NULL, NULL, 'F', NULL, '6', 'Babhulgaon', '', '3621 1787 5774', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(65, NULL, 'VAIBHAV KAKULKHE', 'vaibhav@bwf.com', NULL, NULL, '9503387593', 'M', NULL, '8', 'Babhulgaon', '', '7118 3574 2495', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(66, NULL, 'ANANYA TUPE', 'ananya@bwf.com', NULL, NULL, '9503219335', 'F', NULL, '8', 'Babhulgaon', '', '4053 5859 2117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(67, NULL, 'VEDIKA KAKDE', 'vedika@bwf.com', NULL, NULL, '9767576274', 'F', NULL, '7', 'Babhulgaon', '', '3599 1553 9527', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(68, NULL, 'VAISHNAVI TUPE', 'vaishnavi@bwf.com', NULL, NULL, '9604350360', 'F', NULL, '10', 'Babhulgaon', '', '3954 5225 7246', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(69, NULL, 'KALYANI CHAUDHARY', 'kalyani@bwf.com', NULL, NULL, '9766164140', 'F', NULL, NULL, 'Babhulgaon', '', '2457 7035 6021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(70, NULL, 'RANJANA PAWAR', 'ranjana@bwf.com', NULL, NULL, NULL, 'F', NULL, NULL, 'Babhulgaon', '', '2879 0620 9020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(71, NULL, 'YASH TUPE', 'yash@bwf.com', NULL, NULL, '9860480187', 'M', NULL, '8', 'Babhulgaon', '', '3172 0910 1654', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(72, NULL, 'ADITI TUPE', 'aditi@bwf.com', NULL, NULL, '9405771412', 'F', NULL, '7', 'Babhulgaon', '', '5552 0535 6484', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345'),
(73, NULL, 'HARISH MUNNA', 'harish@bwf.com', NULL, NULL, NULL, 'M', NULL, '7', 'Babhulgaon', '', '2431 0682 4908', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345');

--
-- Triggers `tblpatient`
--
DELIMITER $$
CREATE TRIGGER `after_insert_patient` AFTER INSERT ON `tblpatient` FOR EACH ROW INSERT INTO tblUser (email, phone, password, userTypeID)
VALUES (NEW.email, NEW.phone, NEW.password, 1)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblprescription`
--

CREATE TABLE `tblprescription` (
  `prescriptionID` int NOT NULL,
  `patientID` int DEFAULT NULL,
  `doctorID` int DEFAULT NULL,
  `symptom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `advice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `medicine` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `mmuID` int DEFAULT NULL,
  `Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblprescription`
--

INSERT INTO `tblprescription` (`prescriptionID`, `patientID`, `doctorID`, `symptom`, `advice`, `state`, `medicine`, `note`, `mmuID`, `Date`) VALUES
(1, 1, NULL, 'KNEE JOINT PAIN', NULL, NULL, 'TB CEFEXIME 200 HS, TB IBUPARA BD, SYP CITAL UTI', NULL, NULL, NULL),
(2, 2, NULL, 'ACIDITY, SORE THROAT, RUNNING NOSE, CHEST CLEAR', NULL, NULL, 'TB AZEE 500 OD, TB IBUPARA BD, TB PAN D OD', NULL, NULL, NULL),
(3, 3, NULL, 'KNEE JOINT PAIN', NULL, NULL, 'TB DICLO 50 BD, TB PAN D OD, TB SHLLCAL OD', NULL, NULL, NULL),
(4, 4, NULL, 'BLOATING OF ABDOMEN, KNEE JOINT PAIN', NULL, NULL, 'TB DICLO 50 BD, TB PAN D OD, TB SHLLCAL OD', NULL, NULL, NULL),
(5, 5, NULL, 'ITCHING TO ALL OVER BODY, BODY ACHES, BACK PAIN', NULL, NULL, 'TB ACECLO SP BD, TB PAN D OD, TB NEUROBAION FORTE, TB CETZET HS', NULL, NULL, NULL),
(6, 6, NULL, 'BODY ACHES, INJURY TO INDEX RIGHT HAND FINGER', NULL, NULL, 'TB ACECLO SP BD, TB PAN D', NULL, NULL, NULL),
(7, 7, NULL, 'PILES SWELLING ANUS', NULL, NULL, 'TB ACECLO SP BD, TB PAN D, SYP DUPHALAC HS, TB CETZET HS, LIGNO GEL', NULL, NULL, NULL),
(8, 8, NULL, 'TINEA ON BUTTOCKS', NULL, NULL, 'TB IT MAC 200 HS, TB AF 150 STAT, TB BANDY STAT, TB CETZET HS, LULICART LOTION', NULL, NULL, NULL),
(9, 9, NULL, 'BACK PAIN, ITCHING RIGHT SIDE OF FACE, TINEA', NULL, NULL, 'TB IT MAC 200 HS, TB AF 150 STAT, TB BANDY STAT, TB CETZET HS, TB ACECLO SP BD, LULICART LOTION', NULL, NULL, NULL),
(10, 10, NULL, 'KNEE JOINT PAIN', NULL, NULL, 'TB ACECLO SP BD, TB PAN D OD, TB SHLLCAL OD', NULL, NULL, NULL),
(11, 11, NULL, 'WET COUGH', NULL, NULL, 'TB CEFEXIME 200 BD, TB IBUPARA BD, SYP ASKOF LS TDS', NULL, NULL, NULL),
(12, 12, NULL, 'ECZEMA ON THIGH, DRY COUGH CHEST CLEAR', NULL, NULL, 'TB CEFEXIME 200 BD, TB IBUPARA BD, TB BANDY STAT, CLOGM CREAM', NULL, NULL, NULL),
(13, 13, NULL, 'RUNNING NOSE, SORE THROAT, KNEE JOINT PAIN', NULL, NULL, 'TB AZEE 500 OD, TB ANTICOLD, TB SHLLCAL OD', NULL, NULL, NULL),
(14, 14, NULL, 'ACIDITY, BLOCKED NOSE, KNEE JOINT PAIN', NULL, NULL, 'TB ACECLO SP BD, TB CETZET HS, TB SHLLCAL OD', NULL, NULL, NULL),
(15, 15, NULL, 'SNEEZING NOSE', NULL, NULL, 'TB ANTICOLD BD', NULL, NULL, NULL),
(16, 16, NULL, 'HYPER ACIDITY, CONSTIPATION, HEADACHE', NULL, NULL, 'TB PAN D OD, SYP DHUPHALAC HS', NULL, NULL, NULL),
(17, 17, NULL, 'TINEA ON HAND', NULL, NULL, 'TB IT MAC 200 HS, TB AF 150 STAT, TB BANDY STAT, TB CETZET HS, LULICART LOTION', NULL, NULL, NULL),
(18, 18, NULL, 'BACK PAIN, KNEE JOINT PAIN', NULL, NULL, 'TB ACECLO SP BD, TB PAN D OD, TB SHLLCAL OD', NULL, NULL, NULL),
(19, 19, NULL, 'RUNNING NOSE', NULL, NULL, 'TB ANTICOLD BD', NULL, NULL, NULL),
(20, 20, NULL, 'BACK PAIN, KNEE JOINT PAIN', NULL, NULL, 'TB ACECLO SP BD, TB PAN D OD, TB SHLLCAL OD', NULL, NULL, NULL),
(21, 21, NULL, 'BACK PAIN, NECK STIFFNESS', NULL, NULL, 'TB ACECLO SP BD, TB PAN D OD, TB NEUROBAION FORTE', NULL, NULL, NULL),
(22, 22, NULL, 'COLD CORYZA, WET COUGH', NULL, NULL, 'TB CEFEXIME 200 BD, TB ANTICOLD, SYP ASKOF LS TDS', NULL, NULL, NULL),
(23, 23, NULL, 'HEADACHE, CONSTIPATION', NULL, NULL, 'TB METRO 400 BD, TB PAN OD, TB SPAS BD', NULL, NULL, NULL),
(24, 24, NULL, 'BACK PAIN, KNEE JOINT PAIN, BLOCKED NOSE', NULL, NULL, 'TB ACECLO SP BD, TB PAN D OD, TB SHLLCAL OD', NULL, NULL, NULL),
(25, 25, NULL, 'COLD CORYZA, WET COUGH, CREPITUS +', NULL, NULL, 'TB CEFEXIME 200 BD, TB ANTICOLD, SYP ASKOF LS TDS', NULL, NULL, NULL),
(26, 26, NULL, 'DRY COUGH CHEST CLEAR', NULL, NULL, 'TB AMOX 500 BD, SYP UNICOFF DX TDS', NULL, NULL, NULL),
(27, 27, NULL, 'HEADACHE, CONSTIPATION', NULL, NULL, 'TB ACECLO SP BD, TB PAN D OD, TB GASEX 2 STAT, TB DULCOLAX 2 STAT', NULL, NULL, NULL),
(28, 28, NULL, 'KNEE JOINT PAIN', NULL, NULL, 'TB ACECLO SP BD, TB PAN D OD, TB SHLLCAL OD', NULL, NULL, NULL),
(29, 29, NULL, 'SNEEZING HEADACHE, BODY ACHES, PALLOR', NULL, NULL, 'TB ANTICOLD BD, SYP A-Z BD', NULL, NULL, NULL),
(30, 30, NULL, 'COLD CORYZA', NULL, NULL, 'TB ANTICOLD 1/2 BD', NULL, NULL, NULL),
(31, 31, NULL, 'COLD CORYZA, RUNNING NOSE, BODY ACHES', NULL, NULL, 'TB ANTICOLD 1/2 BD', NULL, NULL, NULL),
(32, 32, NULL, 'COLD CORYZA, COUGH WITH EXPECTORATION', NULL, NULL, 'TB CEFEXIME 200 BD, TB ANTICOLD, SYP ASKOF LS TDS', NULL, NULL, NULL),
(33, 33, NULL, 'ACIDITY, GENERAL WEAKNESS, KNEE JOINT PAIN', NULL, NULL, 'TB ACECLO SP BD, TB PAN D OD, TB SHLLCAL OD', NULL, NULL, NULL),
(34, 34, NULL, 'RUNNING NOSE, DRY COUGH CHEST CLEAR', NULL, NULL, 'TB AMOX 500 BD, SYP UNICOFF DX TDS', NULL, NULL, NULL),
(35, 35, NULL, 'PILES SWELLING ANUS', NULL, NULL, 'TB AMOX 500 BD, TB ACECLO SP BD, TB GASEX 2 STAT, TB DULCOLAX 2 STAT, LIGNO GEL', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsuperadmin`
--

CREATE TABLE `tblsuperadmin` (
  `superadminID` int NOT NULL,
  `userID` int DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `tblsuperadmin`
--
DELIMITER $$
CREATE TRIGGER `after_insert_superadmin` AFTER INSERT ON `tblsuperadmin` FOR EACH ROW INSERT INTO tblUser (email, phone, password, userTypeID)
VALUES (NEW.email, NEW.phone, NEW.password, 5)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userID` int NOT NULL,
  `userTypeID` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userID`, `userTypeID`, `name`, `password`, `phone`, `email`) VALUES
(1, 1, 'Hritwika', '12345', '7687654789', 'h@bwf.com'),
(2, 2, 'Driver', '12345', '6758390278', 'd@bwf.com'),
(3, 3, 'Doctor', '12345', '6785635627', 'doc@bwf.com'),
(4, 5, 'SuperAdmin', '12345', '6785635627', 'super@bwf.com'),
(5, 4, 'MMU', '12345', '6785635627', 'mmu@bwf.com'),
(6, 1, '', '12345', '7788993322', 'h@bwf.com'),
(7, 3, 'Ajeet', '12345', '6789365245', 'ajeet@bwf.com'),
(8, 1, NULL, '12345', '7857483924', 'g@bwf.com'),
(42, 1, NULL, '12345', '9822936268', 'navnath@bwf.com'),
(43, 1, NULL, '12345', '9657154821', 'abadas@bwf.com'),
(44, 1, NULL, '12345', '9096454757', 'kadubai@bwf.com'),
(45, 1, NULL, '12345', '9975274084', 'ramkurshna@bwf.com'),
(46, 1, NULL, '12345', '8788998939', 'radhabai@bwf.com'),
(47, 1, NULL, '12345', '9421675840', 'shivaji@bwf.com'),
(48, 1, NULL, '12345', '9975274084', 'radha@bwf.com'),
(49, 1, NULL, '12345', '8010406781', 'ratan@bwf.com'),
(50, 1, NULL, '12345', '9545112280', 'savtia@bwf.com'),
(51, 1, NULL, '12345', '9096454757', 'baburao@bwf.com'),
(52, 1, NULL, '12345', '8600302215', 'bahurao@bwf.com'),
(53, 1, NULL, '12345', '7709261430', 'shau@bwf.com'),
(54, 1, NULL, '12345', '9545112280', 'inderabai@bwf.com'),
(55, 1, NULL, '12345', '9096459462', 'zumbaerbai@bwf.com'),
(56, 1, NULL, '12345', '7498056706', 'pandareinath@bwf.com'),
(57, 1, NULL, '12345', '950386397', 'santaram@bwf.com'),
(58, 1, NULL, '12345', '9373103011', 'kalyan@bwf.com'),
(59, 1, NULL, '12345', '9545596179', 'pandareinath2@bwf.com'),
(60, 1, NULL, '12345', '9890620918', 'daynshwer@bwf.com'),
(61, 1, NULL, '12345', '9822936268', 'bhimabai@bwf.com'),
(62, 1, NULL, '12345', '7498056706', 'kantabai@bwf.com'),
(63, 1, NULL, '12345', '9689565069', 'sarthak@bwf.com'),
(64, 1, NULL, '12345', '9673937297', 'soham@bwf.com'),
(65, 1, NULL, '12345', '9130686859', 'bahusheb@bwf.com'),
(66, 1, NULL, '12345', '9325409772', 'aditya@bwf.com'),
(67, 1, NULL, '12345', '7028140557', 'bapurao@bwf.com'),
(68, 1, NULL, '12345', '9096459462', 'kondiram@bwf.com'),
(69, 1, NULL, '12345', '9545112280', 'kakasheb@bwf.com'),
(70, 1, NULL, '12345', '7028140557', 'shoba@bwf.com'),
(71, 1, NULL, '12345', '9325409772', 'pareyanka@bwf.com'),
(72, 1, NULL, '12345', '9172090474', 'manoj@bwf.com'),
(73, 1, NULL, '12345', '9172090474', 'divash@bwf.com'),
(74, 1, NULL, '12345', NULL, 'subhderabai@bwf.com'),
(75, 1, NULL, '12345', '7499790739', 'babn@bwf.com'),
(76, 1, NULL, '12345', '9579426050', 'pundliak@bwf.com'),
(77, 1, NULL, '12345', '9822936268', 'navnath@bwf.com'),
(78, 1, NULL, '12345', '9657154821', 'abadas@bwf.com'),
(79, 1, NULL, '12345', '9096454757', 'kadubai@bwf.com'),
(80, 1, NULL, '12345', '9975274084', 'ramkurshna@bwf.com'),
(81, 1, NULL, '12345', '8788998939', 'radhabai@bwf.com'),
(82, 1, NULL, '12345', '9421675840', 'shivaji@bwf.com'),
(83, 1, NULL, '12345', '9975274084', 'radha@bwf.com'),
(84, 1, NULL, '12345', '8010406781', 'ratan@bwf.com'),
(85, 1, NULL, '12345', '9545112280', 'savtia@bwf.com'),
(86, 1, NULL, '12345', '9096454757', 'baburao@bwf.com'),
(87, 1, NULL, '12345', '8600302215', 'bahurao@bwf.com'),
(88, 1, NULL, '12345', '7709261430', 'shau@bwf.com'),
(89, 1, NULL, '12345', '9545112280', 'inderabai@bwf.com'),
(90, 1, NULL, '12345', '9096459462', 'zumbaerbai@bwf.com'),
(91, 1, NULL, '12345', '7498056706', 'pandareinath@bwf.com'),
(92, 1, NULL, '12345', '950386397', 'santaram@bwf.com'),
(93, 1, NULL, '12345', '9373103011', 'kalyan@bwf.com'),
(94, 1, NULL, '12345', '9545596179', 'pandareinath2@bwf.com'),
(95, 1, NULL, '12345', '9890620918', 'daynshwer@bwf.com'),
(96, 1, NULL, '12345', '9822936268', 'bhimabai@bwf.com'),
(97, 1, NULL, '12345', '7498056706', 'kantabai@bwf.com'),
(98, 1, NULL, '12345', '9689565069', 'sarthak@bwf.com'),
(99, 1, NULL, '12345', '9673937297', 'soham@bwf.com'),
(100, 1, NULL, '12345', '9130686859', 'bahusheb@bwf.com'),
(101, 1, NULL, '12345', '9325409772', 'aditya@bwf.com'),
(102, 1, NULL, '12345', '7028140557', 'bapurao@bwf.com'),
(103, 1, NULL, '12345', '9096459462', 'kondiram@bwf.com'),
(104, 1, NULL, '12345', '9545112280', 'kakasheb@bwf.com'),
(105, 1, NULL, '12345', '7028140557', 'shoba@bwf.com'),
(106, 1, NULL, '12345', '9325409772', 'pareyanka@bwf.com'),
(107, 1, NULL, '12345', '9172090474', 'manoj@bwf.com'),
(108, 1, NULL, '12345', '9172090474', 'divash@bwf.com'),
(109, 1, NULL, '12345', NULL, 'subhderabai@bwf.com'),
(110, 1, NULL, '12345', '7499790739', 'babn@bwf.com'),
(111, 1, NULL, '12345', '9579426050', 'pundliak@bwf.com'),
(112, 1, NULL, '12345', '9604514473', 'suresh@bwf.com'),
(113, 1, NULL, '12345', '8459608740', 'gitanjali@bwf.com'),
(114, 1, NULL, '12345', '8605667848', 'gajarabai@bwf.com'),
(115, 1, NULL, '12345', '9960521917', 'arjun@bwf.com'),
(116, 1, NULL, '12345', '7498009118', 'lalita@bwf.com'),
(117, 1, NULL, '12345', '7498009018', 'dadasabeb@bwf.com'),
(118, 1, NULL, '12345', '9637584927', 'subhash@bwf.com'),
(119, 1, NULL, '12345', '9923791753', 'bapurao@bwf.com'),
(120, 1, NULL, '12345', '9834663171', 'komal@bwf.com'),
(121, 1, NULL, '12345', '9607449175', 'aradhy@bwf.com'),
(122, 1, NULL, '12345', '9359391827', 'pratiksha@bwf.com'),
(123, 1, NULL, '12345', '7387619295', 'nandan@bwf.com'),
(124, 1, NULL, '12345', NULL, 'sumanbai@bwf.com'),
(125, 1, NULL, '12345', '9529067964', 'janvi@bwf.com'),
(126, 1, NULL, '12345', '9552387543', 'sainath@bwf.com'),
(127, 1, NULL, '12345', '7498215250', 'shivaji@bwf.com'),
(128, 1, NULL, '12345', '8308638930', 'vibhav@bwf.com'),
(129, 1, NULL, '12345', '9503886970', 'rudra@bwf.com'),
(130, 1, NULL, '12345', '9960950518', 'parjal@bwf.com'),
(131, 1, NULL, '12345', '9130714080', 'sarthak@bwf.com'),
(132, 1, NULL, '12345', NULL, 'jaysheri@bwf.com'),
(133, 1, NULL, '12345', '992139297', 'nilesh@bwf.com'),
(134, 1, NULL, '12345', '8766826221', 'kunl@bwf.com'),
(135, 1, NULL, '12345', '9309737642', 'ishari@bwf.com'),
(136, 1, NULL, '12345', '9767576274', 'shresh@bwf.com'),
(137, 1, NULL, '12345', NULL, 'sayyad@bwf.com'),
(138, 1, NULL, '12345', '9860397553', 'kartik@bwf.com'),
(139, 1, NULL, '12345', NULL, 'alia@bwf.com'),
(140, 1, NULL, '12345', NULL, 'shivani@bwf.com'),
(141, 1, NULL, '12345', '9503387593', 'vaibhav@bwf.com'),
(142, 1, NULL, '12345', '9503219335', 'ananya@bwf.com'),
(143, 1, NULL, '12345', '9767576274', 'vedika@bwf.com'),
(144, 1, NULL, '12345', '9604350360', 'vaishnavi@bwf.com'),
(145, 1, NULL, '12345', '9766164140', 'kalyani@bwf.com'),
(146, 1, NULL, '12345', NULL, 'ranjana@bwf.com'),
(147, 1, NULL, '12345', '9860480187', 'yash@bwf.com'),
(148, 1, NULL, '12345', '9405771412', 'aditi@bwf.com'),
(149, 1, NULL, '12345', NULL, 'harish@bwf.com'),
(150, 4, NULL, '12345', '9876789765', 's@bwf.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

CREATE TABLE `tblusertype` (
  `userTypeID` int NOT NULL,
  `userType` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusertype`
--

INSERT INTO `tblusertype` (`userTypeID`, `userType`) VALUES
(1, 'Patient'),
(2, 'Driver'),
(3, 'Doctor'),
(4, 'MMU'),
(5, 'SuperAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `tblvitals`
--

CREATE TABLE `tblvitals` (
  `vitalsID` int NOT NULL,
  `patientID` int DEFAULT NULL,
  `doctorID` int DEFAULT NULL,
  `BP` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PR` int DEFAULT NULL,
  `RR` int DEFAULT NULL,
  `Spo2` int DEFAULT NULL,
  `Ht` float DEFAULT NULL,
  `Wt` float DEFAULT NULL,
  `Bmi` float DEFAULT NULL,
  `vitalsTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblvitals`
--

INSERT INTO `tblvitals` (`vitalsID`, `patientID`, `doctorID`, `BP`, `PR`, `RR`, `Spo2`, `Ht`, `Wt`, `Bmi`, `vitalsTime`) VALUES
(1, 1, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(2, 2, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(3, 3, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(4, 4, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(5, 5, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(6, 6, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(7, 7, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(8, 8, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(9, 9, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(10, 10, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(11, 11, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(12, 12, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(13, 13, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(14, 14, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(15, 15, NULL, '150/90', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(16, 16, NULL, '130/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(17, 17, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(18, 18, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(19, 19, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(20, 20, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(21, 21, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(22, 22, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(23, 23, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(24, 24, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(25, 25, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(26, 26, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(27, 27, NULL, '140/90', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(28, 28, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(29, 29, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(30, 30, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(31, 31, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(32, 32, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(33, 33, NULL, '130/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(34, 34, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(35, 35, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(36, 36, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(37, 37, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(38, 38, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(39, 39, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(40, 40, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(41, 41, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(42, 42, NULL, '130/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(43, 43, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(44, 44, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(45, 45, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(46, 46, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(47, 47, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(48, 48, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(49, 49, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(50, 50, NULL, '140/90', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(51, 51, NULL, '110/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21'),
(52, 52, NULL, '120/80', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 09:04:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcamps`
--
ALTER TABLE `tblcamps`
  ADD PRIMARY KEY (`campID`),
  ADD KEY `doctorId` (`doctorId`),
  ADD KEY `mmuId` (`mmuId`);

--
-- Indexes for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD PRIMARY KEY (`cityID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  ADD PRIMARY KEY (`doctorID`),
  ADD KEY `mmuID` (`mmuID`),
  ADD KEY `fk_tbldoctor_user` (`userID`);

--
-- Indexes for table `tbldriver`
--
ALTER TABLE `tbldriver`
  ADD PRIMARY KEY (`driverID`),
  ADD KEY `userID_mmuID` (`userID`,`mmuID`),
  ADD KEY `mmuID` (`mmuID`);

--
-- Indexes for table `tblmmu`
--
ALTER TABLE `tblmmu`
  ADD PRIMARY KEY (`mmuID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `cityID` (`cityID`);

--
-- Indexes for table `tblmmuuser`
--
ALTER TABLE `tblmmuuser`
  ADD PRIMARY KEY (`assignmentID`),
  ADD KEY `mmuID_userID` (`mmuID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`patientID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `mmuID` (`mmuID`);

--
-- Indexes for table `tblprescription`
--
ALTER TABLE `tblprescription`
  ADD PRIMARY KEY (`prescriptionID`);

--
-- Indexes for table `tblsuperadmin`
--
ALTER TABLE `tblsuperadmin`
  ADD PRIMARY KEY (`superadminID`),
  ADD KEY `fk_tblsuperadmin_user` (`userID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tblusertype`
--
ALTER TABLE `tblusertype`
  ADD PRIMARY KEY (`userTypeID`);

--
-- Indexes for table `tblvitals`
--
ALTER TABLE `tblvitals`
  ADD PRIMARY KEY (`vitalsID`),
  ADD KEY `fk_tblvitals_patient` (`patientID`),
  ADD KEY `fk_tblvitals_doctor` (`doctorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcamps`
--
ALTER TABLE `tblcamps`
  MODIFY `campID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcity`
--
ALTER TABLE `tblcity`
  MODIFY `cityID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  MODIFY `doctorID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbldriver`
--
ALTER TABLE `tbldriver`
  MODIFY `driverID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblmmu`
--
ALTER TABLE `tblmmu`
  MODIFY `mmuID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblmmuuser`
--
ALTER TABLE `tblmmuuser`
  MODIFY `assignmentID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `patientID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tblprescription`
--
ALTER TABLE `tblprescription`
  MODIFY `prescriptionID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblsuperadmin`
--
ALTER TABLE `tblsuperadmin`
  MODIFY `superadminID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tblusertype`
--
ALTER TABLE `tblusertype`
  MODIFY `userTypeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblvitals`
--
ALTER TABLE `tblvitals`
  MODIFY `vitalsID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcamps`
--
ALTER TABLE `tblcamps`
  ADD CONSTRAINT `tblcamps_ibfk_1` FOREIGN KEY (`doctorId`) REFERENCES `tbldoctor` (`doctorID`),
  ADD CONSTRAINT `tblcamps_ibfk_2` FOREIGN KEY (`mmuId`) REFERENCES `tblmmu` (`mmuID`);

--
-- Constraints for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD CONSTRAINT `fk_tblcity_user` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  ADD CONSTRAINT `fk_tbldoctor_user` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `tbldriver`
--
ALTER TABLE `tbldriver`
  ADD CONSTRAINT `fk_tbldriver_user` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `tblmmu`
--
ALTER TABLE `tblmmu`
  ADD CONSTRAINT `fk_tblmmu_user` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `tblmmuuser`
--
ALTER TABLE `tblmmuuser`
  ADD CONSTRAINT `fk_tblmmuuser_mmu` FOREIGN KEY (`mmuID`) REFERENCES `tblmmu` (`mmuID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tblmmuuser_user` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD CONSTRAINT `fk_tblpatient_user` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `tblsuperadmin`
--
ALTER TABLE `tblsuperadmin`
  ADD CONSTRAINT `fk_tblsuperadmin_user` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `tblvitals`
--
ALTER TABLE `tblvitals`
  ADD CONSTRAINT `fk_tblvitals_doctor` FOREIGN KEY (`doctorID`) REFERENCES `tbldoctor` (`doctorID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tblvitals_patient` FOREIGN KEY (`patientID`) REFERENCES `tblpatient` (`patientID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
