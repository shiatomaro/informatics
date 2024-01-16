-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 12:30 PM
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
-- Database: `informatics_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_course_tbl`
--

CREATE TABLE `assign_course_tbl` (
  `id` int(11) NOT NULL,
  `course_name` varchar(150) NOT NULL,
  `year_level` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_background_tbl`
--

CREATE TABLE `e_background_tbl` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `primary_info` varchar(255) NOT NULL,
  `secondary_info` varchar(255) NOT NULL,
  `vocational_info` varchar(255) NOT NULL,
  `tertiary_info` varchar(255) NOT NULL,
  `post_graduate_info` varchar(255) NOT NULL,
  `last_school_attended` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_information_tbl`
--

CREATE TABLE `p_information_tbl` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `1x1_picture` varchar(200) NOT NULL,
  `yr_lvl` varchar(100) NOT NULL,
  `preferred_courses` varchar(255) NOT NULL,
  `awareness` varchar(100) NOT NULL,
  `school` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `birth_date` date NOT NULL,
  `age` varchar(20) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `civil_status` enum('Single','Married','Widow/er','Separated') NOT NULL,
  `father_Info` varchar(255) NOT NULL,
  `mother_Info` varchar(255) NOT NULL,
  `guardian_Info` varchar(255) NOT NULL,
  `their_address` varchar(255) NOT NULL,
  `their_contact_no` varchar(20) NOT NULL,
  `their_email_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_administration_tbl`
--

CREATE TABLE `student_administration_tbl` (
  `id` int(11) NOT NULL,
  `student_administration_name` varchar(100) NOT NULL,
  `position` enum('Student Admin','Registrar') NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_requirements_tbl`
--

CREATE TABLE `student_requirements_tbl` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `form_137` varchar(200) NOT NULL,
  `form_138` varchar(200) NOT NULL,
  `birth_certificate` varchar(200) NOT NULL,
  `barangay_clearance` varchar(200) NOT NULL,
  `good_moral_certificate` varchar(200) NOT NULL,
  `diploma` varchar(200) NOT NULL,
  `id_picture` varchar(155) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_applicant_evaluation_tbl`
--

CREATE TABLE `s_applicant_evaluation_tbl` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `approval_status` enum('Pending','Accepted','Not Accepted') NOT NULL,
  `student_index_number` varchar(200) NOT NULL,
  `approved_by` varchar(100) NOT NULL,
  `noted_by` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('Admin','Registrar','User') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `user_id`, `username`, `email_address`, `password`, `user_type`, `created_at`, `status`) VALUES
(1, '000000', 'admin', 'admin@info.edu.ph', 'admin', 'Admin', '2023-07-18 10:29:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `yearlevel_tbl`
--

CREATE TABLE `yearlevel_tbl` (
  `id` int(11) NOT NULL,
  `year_level` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_course_tbl`
--
ALTER TABLE `assign_course_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_background_tbl`
--
ALTER TABLE `e_background_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_information_tbl`
--
ALTER TABLE `p_information_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_administration_tbl`
--
ALTER TABLE `student_administration_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_requirements_tbl`
--
ALTER TABLE `student_requirements_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_applicant_evaluation_tbl`
--
ALTER TABLE `s_applicant_evaluation_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yearlevel_tbl`
--
ALTER TABLE `yearlevel_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_course_tbl`
--
ALTER TABLE `assign_course_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_background_tbl`
--
ALTER TABLE `e_background_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_information_tbl`
--
ALTER TABLE `p_information_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_administration_tbl`
--
ALTER TABLE `student_administration_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_requirements_tbl`
--
ALTER TABLE `student_requirements_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_applicant_evaluation_tbl`
--
ALTER TABLE `s_applicant_evaluation_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `yearlevel_tbl`
--
ALTER TABLE `yearlevel_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
