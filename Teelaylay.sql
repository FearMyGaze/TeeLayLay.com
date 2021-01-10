-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2021 at 08:50 PM
-- Server version: 10.2.36-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loliakos077669_Shatty`
--

-- --------------------------------------------------------

--
-- Table structure for table `Follows`
--

CREATE TABLE `Follows` (
  `ID` int(10) UNSIGNED NOT NULL,
  `USER1` int(10) UNSIGNED NOT NULL,
  `USER2` int(10) UNSIGNED NOT NULL,
  `Following` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LoginCredentials`
--

CREATE TABLE `LoginCredentials` (
  `ID` int(10) UNSIGNED NOT NULL,
  `PASSWD` varchar(500) NOT NULL,
  `Username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `ID` int(15) UNSIGNED NOT NULL,
  `FromUser` int(10) UNSIGNED NOT NULL,
  `ToUser` int(10) UNSIGNED NOT NULL,
  `Message` varchar(5000) NOT NULL,
  `DateSent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE `Posts` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Content` varchar(2500) NOT NULL,
  `UserID` int(10) UNSIGNED NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PwdReset`
--

CREATE TABLE `PwdReset` (
  `ID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PwdResetSelector` text NOT NULL,
  `PwdResetToken` longtext NOT NULL,
  `PwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PwdReset`
--

INSERT INTO `PwdReset` (`ID`, `Email`, `PwdResetSelector`, `PwdResetToken`, `PwdResetExpires`) VALUES
(50, 'fearmygaze@outlook.com', '647f3f65a3e66816', '$2y$10$.idv6nRcCCoROW8pOfkC1ugj2p686rjC34BShowu6sUWiJpwDoX/a', '1610291652');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `BirthDay` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `UsersContactDetails`
--

CREATE TABLE `UsersContactDetails` (
  `EMAIL` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Follows`
--
ALTER TABLE `Follows`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_USER1` (`USER1`),
  ADD KEY `FK_USER2` (`USER2`);

--
-- Indexes for table `LoginCredentials`
--
ALTER TABLE `LoginCredentials`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `FK_Users_Credentials` (`ID`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKFrom` (`FromUser`),
  ADD KEY `FKTo` (`ToUser`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_PostsXUsers` (`UserID`);

--
-- Indexes for table `PwdReset`
--
ALTER TABLE `PwdReset`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `UsersContactDetails`
--
ALTER TABLE `UsersContactDetails`
  ADD PRIMARY KEY (`EMAIL`),
  ADD KEY `FKID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Follows`
--
ALTER TABLE `Follows`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `ID` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PwdReset`
--
ALTER TABLE `PwdReset`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Follows`
--
ALTER TABLE `Follows`
  ADD CONSTRAINT `FK_USER1` FOREIGN KEY (`USER1`) REFERENCES `Users` (`ID`),
  ADD CONSTRAINT `FK_USER2` FOREIGN KEY (`USER2`) REFERENCES `Users` (`ID`);

--
-- Constraints for table `LoginCredentials`
--
ALTER TABLE `LoginCredentials`
  ADD CONSTRAINT `FK_Users_Credentials` FOREIGN KEY (`ID`) REFERENCES `Users` (`ID`);

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `FKFrom` FOREIGN KEY (`FromUser`) REFERENCES `Users` (`ID`),
  ADD CONSTRAINT `FKTo` FOREIGN KEY (`ToUser`) REFERENCES `Users` (`ID`);

--
-- Constraints for table `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `FK_PostsXUsers` FOREIGN KEY (`UserID`) REFERENCES `Users` (`ID`);

--
-- Constraints for table `UsersContactDetails`
--
ALTER TABLE `UsersContactDetails`
  ADD CONSTRAINT `FKID` FOREIGN KEY (`ID`) REFERENCES `Users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
