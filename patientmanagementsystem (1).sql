-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 10:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patientmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` varchar(9) NOT NULL,
  `patient_id` varchar(5) NOT NULL,
  `appointment_description` varchar(100) NOT NULL,
  `duration_in` int(3) NOT NULL,
  `appointment_datetime` datetime NOT NULL,
  `diagnosis` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `email` varchar(50) NOT NULL,
  `medical_title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `treatment_provided` text NOT NULL,
  `workplace` varchar(60) NOT NULL,
  `experience_in_years` int(2) DEFAULT NULL,
  `credentials` text DEFAULT NULL,
  `counseling_hours` varchar(12) NOT NULL,
  `counseling_days` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `email` varchar(50) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `gender` char(1) NOT NULL,
  `blood_group` varchar(7) NOT NULL,
  `allergies` tinytext DEFAULT NULL,
  `medical_hIstory` text DEFAULT NULL,
  `nic` varchar(20) NOT NULL
) ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`email`, `patient_id`, `date_of_birth`, `weight`, `height`, `gender`, `blood_group`, `allergies`, `medical_hIstory`, `nic`) VALUES
('ivi@gmail.com', 6, '2023-04-04', 55, 174, 'f', 'a', 'none', 'none', 'N15151551545124'),
('test12@gmail.com', 9, '2023-03-11', 55, 189, 'f', 'o negat', 'none', 'none', 'N15151551545154'),
('bon@gmail.com', 10, '2023-03-10', 98, 198, 'm', 'o posit', 'none', 'none', 'N15151551545124'),
('test16@gmail.com', 13, '2023-03-03', 55, 175, 'm', 'o posit', 'none', 'none', 'N15151551545124');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` varchar(9) NOT NULL,
  `patient_id` varchar(6) NOT NULL,
  `due_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction_details` int(11) NOT NULL,
  `payment_status` varchar(7) NOT NULL,
  `payment_by_patient` int(11) NOT NULL,
  `appointment_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `treatment_details` tinytext NOT NULL,
  `treatment_start_date` date NOT NULL,
  `treatment_finish_date` date NOT NULL,
  `prescriptions` text NOT NULL,
  `patient_being_treated` varchar(5) NOT NULL,
  `appointment_id` varchar(9) NOT NULL,
  `patient_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL CHECK (`email` like '%@%.%'),
  `password` varchar(80) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL
) ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `first_name`, `last_name`, `phone_no`, `picture`, `address`) VALUES
('bon@gmail.com', '$2y$10$vflEg..uRWVXxMvQD6JESOxJtRGpW.b//e1kTg679gjlDxolLeh6y', 'Bob', 'marley', 666666, 'jk', 'kaya'),
('ivi@gmail.com', '$2y$10$L3/dUg3w/qhGyFnzahf.7e.Mj6/M8SDiNbpHCvalDiEn0x5/nMszC', 'ivi', 'chang', 554446565, 'aaaaaaaaa', 'aaaaaaaa'),
('neetye@gmail.com', '$2y$10$adpV/wNG4LtDQx520Bwf2.bneixRSzqh4qJZUN3bNG7y1uO7RujgK', '', '', 0, NULL, ''),
('patient@gmail.com', '$2y$10$h7nej2qcSBtkoVD7rVeZtetob.2d1koLwl/UHwgsKLJH1kjs7kJMK', '', '', 0, NULL, ''),
('ree@gmai.com', '$2y$10$Mgsc7wo51AWCaSWvHX7FceaWWvPU4GM5mxXpDWrat3/GKClfjlOeG', '', '', 0, NULL, ''),
('reeerg@gmai.com', '$2y$10$oYkDVbLZmh10KRTtmfuCguQLCfc1H/ye0Z7m4ufDwBXR.I6AyUXZO', '', '', 0, NULL, ''),
('reerg@gmai.com', '$2y$10$GxFuF7lyvKh8pUfbWXTanOVa28J4T/Nfdk2pzHjgBd.J6sUtYuj..', '', '', 0, NULL, ''),
('simran@gmail.com', '$2y$10$L5niasqKlcNZAUoOKw/iE.0YxrjMfkwbyLt3bmOOdPF5UCggnwlqK', '', '', 0, NULL, ''),
('sssf@gmail.com', '$2y$10$.JBNPGatGHa23p40IHP0Xun8QbajHAc1PJCzDU6gvAfZ4xQs6zSnS', '', '', 0, NULL, ''),
('test12@gmail.com', '$2y$10$g7EFEIs5z/aGAPyRQneU0elKLofzh.d8xVQnAv2iGEbeyf2J/2Vm2', 'shawn', 'booluck', 59106595, 'ssssssssssss', '54,melrose,lasile'),
('test16@gmail.com', '$2y$10$hPqCbQroMJhGDF5YzlExfuNb3g.JBBLKJrKJ5uRwiFUoE4pg3MMdS', 'kalim', 'auckbaraullee', 59146625, 'ssssssssssss', 'curepipe'),
('test4@gmail.com', '$2y$10$7d5CoHQVaUdYAdkeHCpFDerSz/8cEAxO5LeijBLxWJozODmqMTiTu', '', '', 0, NULL, ''),
('test5@gmail.com', '$2y$10$KItpPsVnRu5c9Ji/SyYdQOOS9TFb6fTsJvgnlRP.9DZ7GLfPZuwYi', '', '', 0, NULL, ''),
('test7@gmail.com', '$2y$10$/k26v7hFfkZ1IiXQB.BQ3OTrQ2Vgr2xsIdlG7v32vV/r/bzgnzn6C', '', '', 0, NULL, ''),
('test8@gmail.com', '$2y$10$1a15hYn2ynD/7YfAMtgEP.EaROxHVlZbmvlattxB3ATOZLS4DwLQO', 'sssss', 'ssss', 66665651, 'sgggggggggggggg', 'ssssssssssss'),
('test@gmail.com', '$2y$10$w6qQT4wUGNg4i0D.EAo6q.dpzUjLjzO5CFm5iUP9w5R4twwvtMV2K', '', '', 0, NULL, ''),
('testpatient@gmail.com', '$2y$10$2QDFra8OtjBGnxDaYjCsvu1R2BNGcj/LD381IswaYNZsQa/F8m5qO', '', '', 0, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD KEY `email` (`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
