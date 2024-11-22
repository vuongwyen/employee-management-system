-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2024 lúc 08:57 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `employeemanagementsystem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `emp_ID` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `contact_add` int(11) DEFAULT NULL,
  `emp_email` varchar(255) DEFAULT NULL,
  `emp_pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_department`
--

CREATE TABLE `job_department` (
  `job_ID` int(11) NOT NULL,
  `job_dept` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(30) DEFAULT NULL,
  `salary_range` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payroll`
--

CREATE TABLE `payroll` (
  `payroll_ID` int(11) NOT NULL,
  `emp_ID` int(11) DEFAULT NULL,
  `job_ID` int(11) DEFAULT NULL,
  `salary_ID` int(11) DEFAULT NULL,
  `leave_ID` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `report` text DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qualification`
--

CREATE TABLE `qualification` (
  `qual_ID` int(11) NOT NULL,
  `emp_ID` int(11) DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `requirements` varchar(30) DEFAULT NULL,
  `date_in` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `salary_bonus`
--

CREATE TABLE `salary_bonus` (
  `salary_ID` int(11) NOT NULL,
  `job_ID` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `annual` date DEFAULT NULL,
  `bonus` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `admin_ID` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `contact_add` int(11) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_ID`);

--
-- Chỉ mục cho bảng `job_department`
--
ALTER TABLE `job_department`
  ADD PRIMARY KEY (`job_ID`);

--
-- Chỉ mục cho bảng `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`payroll_ID`),
  ADD KEY `emp_ID` (`emp_ID`),
  ADD KEY `job_ID` (`job_ID`),
  ADD KEY `salary_ID` (`salary_ID`);

--
-- Chỉ mục cho bảng `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`qual_ID`),
  ADD KEY `emp_ID` (`emp_ID`);

--
-- Chỉ mục cho bảng `salary_bonus`
--
ALTER TABLE `salary_bonus`
  ADD PRIMARY KEY (`salary_ID`),
  ADD KEY `job_ID` (`job_ID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`),
  ADD CONSTRAINT `payroll_ibfk_2` FOREIGN KEY (`job_ID`) REFERENCES `job_department` (`job_ID`),
  ADD CONSTRAINT `payroll_ibfk_3` FOREIGN KEY (`salary_ID`) REFERENCES `salary_bonus` (`salary_ID`);

--
-- Các ràng buộc cho bảng `qualification`
--
ALTER TABLE `qualification`
  ADD CONSTRAINT `qualification_ibfk_1` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`);

--
-- Các ràng buộc cho bảng `salary_bonus`
--
ALTER TABLE `salary_bonus`
  ADD CONSTRAINT `salary_bonus_ibfk_1` FOREIGN KEY (`job_ID`) REFERENCES `job_department` (`job_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
