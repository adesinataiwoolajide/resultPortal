-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 08:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpos_result`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `act_id` int(255) NOT NULL,
  `action` text NOT NULL,
  `user_details` varchar(255) NOT NULL,
  `time_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `action`, `user_details`, `time_added`) VALUES
(1, 'Logged In', 'tolajide74@gmail.com', '2019-09-22 14:51:17'),
(2, 'Logged Out', 'tolajide74@gmail.com', '2019-09-22 14:53:19'),
(3, 'Logged In', 'tolajide74@gmail.com', '2019-09-22 14:53:36'),
(4, 'Logged Out', 'tolajide74@gmail.com', '2019-09-22 15:05:57'),
(5, 'Logged In', 'tolajide74@gmail.com', '2019-09-22 15:06:13'),
(6, 'Changed The User Email From  to folakeade@gmail.com', 'tolajide74@gmail.com', '2019-09-23 06:29:21'),
(7, 'Added tolajide7d4@gmail.com Details to the User List', 'tolajide74@gmail.com', '2019-09-23 06:31:42'),
(8, 'Added folake@gmail.com Details to the User List', 'tolajide74@gmail.com', '2019-09-23 06:32:44'),
(9, 'Logged Out', 'tolajide74@gmail.com', '2019-09-23 06:34:13'),
(10, 'Logged Out', 'tolajide74@gmail.com', '2019-09-23 14:39:43'),
(11, 'Added adenike@gmail.com Details to the User List', 'tolajide74@gmail.com', '2019-09-24 20:39:36'),
(12, 'Added samson@gmail.com Details to the User List', 'tolajide74@gmail.com', '2019-09-24 20:40:02'),
(13, 'Added olajumoke@gmail.com Details to the User List', 'tolajide74@gmail.com', '2019-09-24 20:41:56'),
(14, 'Added tolajide740@gmail.com Details to the User List', 'tolajide74@gmail.com', '2019-09-24 20:44:19'),
(15, 'Added hammed@gmail.com Details to the User List', 'tolajide74@gmail.com', '2019-09-24 20:52:06'),
(16, 'Added dayo@gmail.com Details to the User List', 'tolajide74@gmail.com', '2019-09-24 20:54:15'),
(17, 'Updated samson@gmail.com Details', 'tolajide74@gmail.com', '2019-09-24 21:26:06'),
(18, 'Updated samson@gmail.com Details', 'tolajide74@gmail.com', '2019-09-24 21:26:32'),
(19, 'Updated samsonajibade@gmail.com Details', 'tolajide74@gmail.com', '2019-09-24 21:28:01'),
(20, 'Deleted 2774-2019 Details', 'tolajide74@gmail.com', '2019-09-24 21:36:21'),
(21, 'Logged Out', 'tolajide74@gmail.com', '2019-09-24 22:28:24'),
(22, 'Deleted 1203 Details', 'tolajide74@gmail.com', '2019-09-25 05:58:33'),
(23, 'Logged Out', 'tolajide74@gmail.com', '2019-09-25 06:10:41'),
(24, 'Logged Out', 'olajumoke@gmail.com', '2019-09-25 06:11:31'),
(25, 'Logged Out', 'kemi@gmail.com', '2019-09-25 06:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`user_id`, `name`, `email`, `password`, `role`, `time_registered`) VALUES
(1, 'Adesina Taiwo Olajumoke', 'tolajide74@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 'Admin', '2019-09-22 13:48:22'),
(5, 'Adesina Taiwo Olajide', 'tolajide75@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 'Lecturer', '2019-09-22 13:48:30'),
(6, 'Adenike', 'adenike@gmail.com', '349a21c00149fe1d1ba070eed920a359f23cb9e2', 'Lecturer', '2019-09-24 20:43:55'),
(8, 'Olajumoke Goke', 'olajumoke@gmail.com', '56ff85face1f3e561e8d2a40a61e331632919b1a', 'Lecturer', '2019-09-24 20:41:55'),
(9, 'Sule Lamido', 'sule@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 'Lecturer', '2019-09-24 20:45:58'),
(10, 'Adedokun Hammed', 'hammed@gmail.com', '0579e2a6de211a65b5f54e77cfe803190f9568df', 'Lecturer', '2019-09-24 20:52:06'),
(11, 'Aderemi Dayo', 'dayo@gmail.com', 'a664a0ec39af3b2d40638256ac6bb9c3ee4d4ea2', 'Lecturer', '2019-09-24 20:54:15'),
(20, 'Kolasope', 'kolasope@gmail.com', '1f680346f204138807e0209fb2e2377dcd5caeee', 'Student', '2019-09-25 05:59:53'),
(21, 'Deborah', 'deborah@gmail.com', '7a173610d1d24e3651e6fc25386b723875154ae7', 'Student', '2019-09-25 05:59:54'),
(22, 'Kemi', 'kemi@gmail.com', '0553ced5e059720b5cb5600f9b364e5f6230753b', 'Student', '2019-09-25 05:59:54'),
(23, 'Opeyemi', 'opeyemi@gmail.com', '85ebd7c3d7a3390ae75b8b410eb9acb82df6b720', 'Student', '2019-09-25 05:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `course_code`, `course_unit`, `course_status`, `created_at`) VALUES
(2, 'Structured Programming', 'CSC 219', '3', 'Elective', NULL),
(3, 'Programming In High Level Languages', 'MFX 220', '3', 'Elective', '2019-09-22 16:19:26'),
(4, 'Introduction to Computer', 'CSC 101', '4', 'Core', '2019-09-24 20:18:35'),
(5, 'Cobol Programming', 'COL 222', '5', 'Core', '2019-09-24 20:20:44'),
(6, 'FORTRAN Language', 'CSC 328', '4', 'Required', '2019-09-24 20:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `course_allocations`
--

CREATE TABLE `course_allocations` (
  `allocation_id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `staff_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `staff_name`, `staff_email`, `staff_number`, `phone_number`, `created_at`) VALUES
(1, 'Adenike', 'adenike@gmail.com', '8236-2019', '08084645466', '2019-09-24 21:37:34'),
(3, 'Olajumoke Goke', 'olajumoke@gmail.com', 'CSC-25-2019', '07097497353', '2019-09-24 21:37:34'),
(4, 'Sule Lamido', 'sule@gmail.com', 'CSC-5-2019', '09072281204', '2019-09-24 21:37:34'),
(5, 'Adedokun Hammed', 'hammed@gmail.com', 'CSC-33-2019', '08152472522', '2019-09-24 21:37:34'),
(6, 'Aderemi Dayo', 'dayo@gmail.com', 'CSC-010-2019', '08164353733', '2019-09-24 21:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `student_email`, `matric_number`, `phone_number`, `level`, `program`, `created_at`) VALUES
(1, 'Kolasope', 'kolasope@gmail.com', '1203', '903833113', 'OND 1', 'Full Time', NULL),
(2, 'Deborah', 'deborah@gmail.com', '1294', '903833333', 'OND 2', 'Full Time', NULL),
(3, 'Kemi', 'kemi@gmail.com', '1225', '9038338103', 'HND 1', 'Part Time', NULL),
(4, 'Opeyemi', 'opeyemi@gmail.com', '1236', '90383382243', 'HND2', 'Part Time', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_allocations`
--
ALTER TABLE `course_allocations`
  ADD PRIMARY KEY (`allocation_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `act_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_allocations`
--
ALTER TABLE `course_allocations`
  MODIFY `allocation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
