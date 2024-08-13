-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 05:20 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `d_reservations`
--

CREATE TABLE `d_reservations` (
  `id` int(11) NOT NULL,
  `id_detail` varchar(20) NOT NULL,
  `id_paid` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `Dealer_Name` varchar(250) DEFAULT 'NOT NULL',
  `Branch` varchar(50) DEFAULT 'NOT NULL',
  `Facility` varchar(50) DEFAULT 'NOT NULL',
  `Sales_ID` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `Salesman_Name` varchar(50) DEFAULT 'NOT NULL',
  `Position` varchar(50) DEFAULT NULL,
  `Supervision` varchar(50) DEFAULT NULL,
  `Jenis_kelamin` varchar(50) DEFAULT NULL,
  `Ukuran_Kaos` varchar(5) DEFAULT NULL,
  `Sales_Category` varchar(20) DEFAULT NULL,
  `Divisi` varchar(25) DEFAULT NULL,
  `Entry_Date` date DEFAULT NULL,
  `Ref.Date` varchar(15) DEFAULT NULL,
  `Total_Man_Hours` varchar(10) DEFAULT NULL,
  `Level` varchar(30) DEFAULT NULL,
  `No_HP` varchar(20) DEFAULT NULL,
  `Alamat_Email` varchar(50) DEFAULT NULL,
  `Date_of_Birth` varchar(15) DEFAULT NULL,
  `Nomor_Ktp` varchar(50) DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `Nomor_NPWP` varchar(30) DEFAULT NULL,
  `Bank` varchar(30) DEFAULT NULL,
  `No_Rekening` varchar(30) DEFAULT NULL,
  `NIK` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `Dealer_Name`, `Branch`, `Facility`, `Sales_ID`, `Salesman_Name`, `Position`, `Supervision`, `Jenis_kelamin`, `Ukuran_Kaos`, `Sales_Category`, `Divisi`, `Entry_Date`, `Ref.Date`, `Total_Man_Hours`, `Level`, `No_HP`, `Alamat_Email`, `Date_of_Birth`, `Nomor_Ktp`, `Alamat`, `Nomor_NPWP`, `Bank`, `No_Rekening`, `NIK`, `password`) VALUES
(65, 'PT Hino Motors Sales Indonesia', 'Jatake', '3 S', 'adminhmsi321', 'Admin Nia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, 'admin1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '', '4dm1nhmsi'),
(70, 'PT Hino Motors Sales Indonesia', 'Jatake', '', 'VHMSI1010300010', 'Muklis', '', '', '', '', '', 'IDT', '0000-00-00', '', '', 'User', '', 'User@gmail.com', '', '', '', '', '', '', '', 'VHMSI1010300010'),
(71, 'PT Hino Motors Sales Indonesia', 'Jatake', '', 'adminhmsi2', 'Admin Sella', '', '', '', '', '', 'Ts Pyramid', '0000-00-00', '', '', 'Admin', '', 'Admin2@gmail.com', '', '', '', '', '', '', '', '4dm1nhms12'),
(72, 'PT Hino Motors Sales Indonesia', 'Jatake', '', 'adminhmsi3', 'Admin Grandiest', '', '', '', '', '', 'Ts Pyramid', '0000-00-00', '', '', 'Admin', '', 'Admin3@gmail.com', '', '', '', '', '', '', '', '4dm1nhms13'),
(73, 'PT Hino Motors Sales Indonesia', 'Jatake', '', 'adminhmsi4', 'Admin Bu Teti', '', '', '', '', '', 'Ts Pyramid', '0000-00-00', '', '', 'Admin', '', 'Admin4@gmail.com', '', '', '', '', '', '', '', '4dm1nro0m'),
(75, 'PT Hino Motors Sales Indonesia', 'Jatake', '', '38166', 'Rio Dwi Aryanto', '', '', '', '', '', 'TSP HTD', '0000-00-00', '', '', 'User', '', 'rio.aryanto@hino.co.id', '', '', '', '', '', '', '', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `paid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `capacity`, `status`) VALUES
(2, 'ClassRoom A', 1, 'Ready'),
(5, 'Classroom B', 1, 'Ready'),
(6, 'Classroom F', 1, 'Ready'),
(7, 'Classroom G', 1, 'Ready'),
(8, 'Classroom H', 1, 'Ready'),
(9, 'Classroom M', 1, 'Ready'),
(10, 'Classroom KL', 1, 'Ready'),
(11, 'Classroom J', 1, 'Ready'),
(12, 'Dojo Spare Part', 1, 'Ready'),
(13, 'Auditorium Jumbo', 1, 'Ready'),
(14, 'Lab Computer', 1, 'Ready');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d_reservations`
--
ALTER TABLE `d_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d_reservations`
--
ALTER TABLE `d_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
