-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 04:51 AM
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
-- Database: `informatics_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assessment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `result` enum('passed','failed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `instructor` varchar(128) NOT NULL,
  `status` enum('scheduled','open','closed','canceled','waitlisted','in progress','completed','suspended') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `name`, `description`, `instructor`, `status`) VALUES
(1, 'MEW1', 'Mewing', 'This course is about mewing', 'Mr. Mew', 'closed'),
(2, 'C02', 'Carbon Dioxide', 'Breathing', 'Mister Swave', 'in progress'),
(3, 'ASDA', 'sad', 'asdasd', 'asdas', 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `enrollment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_admin`
--

CREATE TABLE `student_admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `position` varchar(32) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_applications`
--

CREATE TABLE `student_applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('approved','rejected','processing') NOT NULL,
  `approved_by` varchar(128) DEFAULT NULL,
  `noted_by` varchar(128) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `student_num` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `1x1_picture` tinyblob DEFAULT NULL,
  `year_level` varchar(150) NOT NULL,
  `first_choice_program` varchar(32) DEFAULT NULL,
  `second_choice_program` varchar(32) DEFAULT NULL,
  `previous_school` varchar(64) DEFAULT NULL,
  `name_prefix` varchar(8) DEFAULT NULL,
  `first_name` varchar(128) DEFAULT NULL,
  `middle_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `name_suffix` varchar(8) DEFAULT NULL,
  `birth_date` timestamp NULL DEFAULT NULL,
  `physical address` varchar(512) DEFAULT NULL,
  `contact_number` varchar(24) DEFAULT NULL,
  `citizenship` varchar(64) DEFAULT NULL,
  `sex` enum('male','female','other') NOT NULL,
  `civil_status` enum('single','married','divorced','annuled','widowed','other') NOT NULL,
  `father_name` varchar(128) DEFAULT NULL,
  `father_contact` varchar(24) DEFAULT NULL,
  `mother_name` varchar(128) DEFAULT NULL,
  `mother_contact` varchar(24) DEFAULT NULL,
  `guardian_name` varchar(128) DEFAULT NULL,
  `guardian_contact` varchar(24) DEFAULT NULL,
  `guardian_address` varchar(512) DEFAULT NULL,
  `guardian_email` varchar(128) DEFAULT NULL,
  `form137` blob DEFAULT NULL,
  `form138` blob DEFAULT NULL,
  `birth_cert` blob DEFAULT NULL,
  `baranggay_cert` blob DEFAULT NULL,
  `diploma` blob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`id`, `user_id`, `student_num`, `course_id`, `1x1_picture`, `year_level`, `first_choice_program`, `second_choice_program`, `previous_school`, `name_prefix`, `first_name`, `middle_name`, `last_name`, `name_suffix`, `birth_date`, `physical address`, `contact_number`, `citizenship`, `sex`, `civil_status`, `father_name`, `father_contact`, `mother_name`, `mother_contact`, `guardian_name`, `guardian_contact`, `guardian_address`, `guardian_email`, `form137`, `form138`, `birth_cert`, `baranggay_cert`, `diploma`, `created_at`, `updated_at`) VALUES
(1, 17, 324234, 1, NULL, '1st', 'Matulog', 'Kumain', 'Bahay', 'Dr.', 'Juan', 'Luna', 'Amorsolo', 'Ltd.', '2003-06-13 00:31:12', 'earth', '09212312123', 'filipinx', 'male', '', 'asdasd', '09212312124', 'dasdsa', '09212312125', 'qweqwe', NULL, 'tyutyu', 'ghjghj@gmail.com', NULL, NULL, NULL, NULL, NULL, '2024-01-20 00:30:13', '2024-01-20 00:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `type` enum('student','admin','registrar') NOT NULL DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','disabled') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `type`, `created_at`, `status`) VALUES
(14, 'asd', 'asd@gmail.com', '$2y$10$GztjctOwWIs4pvDIO1zEbOSroOVrwKEdXoqmX/jaA2E7A.QK.D1oO', 'admin', '2024-01-16 22:28:17', 'active'),
(15, 'asd2', 'asd2@gmail.com', '$2y$10$Fk5rdBpFlR51jtNXM0RZ2uMyrN1YKKWctb5bLXfcUc5G7hjxeI3Ru', 'registrar', '2024-01-16 22:30:17', 'active'),
(17, 'asd3', 'asd12@gmail.com', '$2y$10$zJSHJ7SpvNJwSTTit6W2JuAs39WlU4FVbt41.Ms6tiPm2rjQpeuwW', 'student', '2024-01-17 00:15:03', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`course_id`);

--
-- Indexes for table `student_admin`
--
ALTER TABLE `student_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `student_applications`
--
ALTER TABLE `student_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_num`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `student_id_2` (`student_num`),
  ADD UNIQUE KEY `student_num` (`student_num`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_num_2` (`student_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_admin`
--
ALTER TABLE `student_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_applications`
--
ALTER TABLE `student_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_information`
--
ALTER TABLE `student_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
