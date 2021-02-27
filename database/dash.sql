-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 04:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dash`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123@');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logins`
--

CREATE TABLE `admin_logins` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `logins` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_logins`
--

INSERT INTO `admin_logins` (`id`, `admin_id`, `logins`) VALUES
(8, 1, 'b34faf726b7d5ce99fb9ad9027bba1a808225043');

-- --------------------------------------------------------

--
-- Table structure for table `classgrp`
--

CREATE TABLE `classgrp` (
  `id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `schl_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `schl_id`, `name`) VALUES
(4, 4, 'Software Development'),
(5, 4, 'L4 Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_numb` text NOT NULL,
  `std_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `handed_in`
--

CREATE TABLE `handed_in` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `file` text NOT NULL,
  `sub_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `schl_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `posted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `schl_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `schl_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `sub_id`, `schl_id`, `dep_id`, `file`) VALUES
(4, 7, 4, 4, 'L5_SOD_DATABASE DEVELOPMENT.pdf'),
(5, 8, 4, 4, 'Why small businesses fail.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notify` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `schl_id` int(11) NOT NULL,
  `posted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notify`, `type`, `schl_id`, `posted_at`) VALUES
(1, 'dflkflndkfnasldnfksla=', 'teachers', 4, '2020-10-14 01:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(110) NOT NULL,
  `schl_id` int(110) NOT NULL,
  `subject` text NOT NULL,
  `type` text NOT NULL,
  `posted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `schl_id`, `subject`, `type`, `posted_at`) VALUES
(1, 4, 'ALL studentss need to pay school fees by this coming week thank you', 'all', '2021-01-26 09:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `district` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `email`, `district`, `sector`, `type`, `province`, `password`) VALUES
(4, 'Muhabira integrated polytechnic college', 'muhabura@gmail.com', 'Musanze', 'Muhoza', 'TVET', 'North', '$2y$10$AuYyrwmfJ8UbXPH56q.DGuHhKL.UTjNiL6kyf9SchhIMQbq4nvO4y');

-- --------------------------------------------------------

--
-- Table structure for table `school_logins`
--

CREATE TABLE `school_logins` (
  `id` int(11) NOT NULL,
  `schl_id` int(11) NOT NULL,
  `logins` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `dep_id` int(11) NOT NULL,
  `schl_id` int(11) NOT NULL,
  `profile` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `district`, `province`, `gender`, `dep_id`, `schl_id`, `profile`, `email`, `password`, `status`) VALUES
(9, 'Ishimwe', 'Delice', 'Musanze', 'North', 'Female', 4, 4, 'team-4.jpg', 'IshimweDelice@mutware.ac', '$2y$10$3YH.eWRDOxm7eXUIaNWQ..oCQw6bbzm1AtBHaZ9C6Bgc0sWPxgyNq', 0),
(10, 'Niyindagiye', 'abeltony', 'Nyarugenge', 'Kigali City', 'Male', 4, 4, 'IMG-20190727-WA0041.jpg', 'Niyindagiyeabeltony@mutware.ac', '$2y$10$m6/ZmsCQ1XpDd.InT2h7denSv3B3SRPnV3/nXe9YcM9weROgpw1JK', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `schl_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `schl_id`, `department_id`, `subject`) VALUES
(7, 4, 4, 'SAD'),
(8, 4, 4, 'C++');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `schl_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `profile` varchar(355) NOT NULL,
  `number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `schl_id`, `department_id`, `name`, `email`, `role`, `gender`, `password`, `profile`, `number`) VALUES
(15, 4, 4, 'Floridah', 'froridah@gmail.com', 'teacher', 'female', '$2y$10$6.JVtocfgJT87GoGnCYTfeJUiil/bbyLl8PxH1olfA0Xv0c7Y9FAa', 'Capture.PNG', '+250783332000'),
(16, 4, 4, 'Rutwe', 'rutwe@gmail.com', 'Head of class', 'male', '$2y$10$N4nYIwtEWLUOOjC0MyCI.u3SvHY0Q0S6rUptwm/jN9RgVBd2/3cGG', 'cheerful-teenager-pointing-left_23-2147669008.jpg', '+250783332000'),
(17, 4, 5, 'Max', 'max@gmail.com', 'Head of class', 'male', '$2y$10$cD9Cmn1sg1mj/09T8e3w.OhNyx4BaLWm2Fy8Zu3Jl9HYFckkL7Fl6', 'default.png', '+250783332000'),
(18, 4, 5, 'jababa', 'jababa@gmail.com', 'teacher', 'male', '$2y$10$p2yKgae6yoc1Bqgm0oDfsOFLL0VG2.qRQH8RrFjiwx3REhqGLja.S', 'default.png', '+250783332000'),
(19, 4, 0, 'james', 'james@gmail.com', 'teacher', 'male', '$2y$10$wV9bDm2nTwq.0n0JVKl8GePTvEzvLZSkQ77twm8It15HX7Rp.xtLu', '1.jpg', '39092974024');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_logins`
--

CREATE TABLE `teacher_logins` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `schl_id` int(11) NOT NULL,
  `token` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_logins`
--

INSERT INTO `teacher_logins` (`id`, `teacher_id`, `schl_id`, `token`, `status`) VALUES
(55, 16, 4, 'e71d9949f718963b72c76482b3825b22fe42c3ca', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `schl_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `file` text NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `sub_id`, `schl_id`, `dep_id`, `file`, `deadline`) VALUES
(2, 7, 4, 4, 'L5_SOD_Develop Backend Application.pdf', '2020-10-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `classgrp`
--
ALTER TABLE `classgrp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_id` (`dep_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `classgrp_ibfk_3` (`teacher_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schl_id` (`schl_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_id` (`dep_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `handed_in`
--
ALTER TABLE `handed_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_id` (`dep_id`),
  ADD KEY `schl_id` (`schl_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `work_id` (`work_id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schl_id` (`schl_id`),
  ADD KEY `logins_ibfk_2` (`std_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schl_id` (`schl_id`),
  ADD KEY `dep_id` (`dep_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schl_id` (`schl_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_logins`
--
ALTER TABLE `school_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schl_id` (`schl_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_id` (`dep_id`),
  ADD KEY `schl_id` (`schl_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schl_id` (`schl_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_logins`
--
ALTER TABLE `teacher_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `schl_id` (`schl_id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_id` (`dep_id`),
  ADD KEY `schl_id` (`schl_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_logins`
--
ALTER TABLE `admin_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classgrp`
--
ALTER TABLE `classgrp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `handed_in`
--
ALTER TABLE `handed_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_logins`
--
ALTER TABLE `school_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teacher_logins`
--
ALTER TABLE `teacher_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD CONSTRAINT `admin_logins_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `classgrp`
--
ALTER TABLE `classgrp`
  ADD CONSTRAINT `classgrp_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `classgrp_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `classgrp_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`schl_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `groups_ibfk_2` FOREIGN KEY (`std_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `groups_ibfk_3` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `handed_in`
--
ALTER TABLE `handed_in`
  ADD CONSTRAINT `handed_in_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `handed_in_ibfk_2` FOREIGN KEY (`schl_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `handed_in_ibfk_3` FOREIGN KEY (`std_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `handed_in_ibfk_4` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `handed_in_ibfk_5` FOREIGN KEY (`work_id`) REFERENCES `work` (`id`);

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`schl_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `logins_ibfk_2` FOREIGN KEY (`std_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `logins_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`schl_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`dep_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `notes_ibfk_3` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`schl_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `school_logins`
--
ALTER TABLE `school_logins`
  ADD CONSTRAINT `school_logins_ibfk_1` FOREIGN KEY (`schl_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`schl_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`schl_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `subjects_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Constraints for table `teacher_logins`
--
ALTER TABLE `teacher_logins`
  ADD CONSTRAINT `teacher_logins_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `teacher_logins_ibfk_2` FOREIGN KEY (`schl_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `work_ibfk_2` FOREIGN KEY (`schl_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `work_ibfk_3` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
