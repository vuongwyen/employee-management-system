-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2024 lúc 03:35 PM
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

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`emp_ID`, `fname`, `lname`, `gender`, `age`, `contact_add`, `emp_email`, `emp_pass`) VALUES
(1, 'Banh', 'Da Cu', 'Male', 22, 113, 'banhdacua@gmail.com', '12345'),
(2, 'An', 'Tey', 'Female', 27, 113, 'antey@gmail.com', '12345'),
(3, 'Nguyen', 'Van A', 'Male', 30, 123, 'nguyenvana@gmail.com', '12345'),
(4, 'Tran', 'Thi B', 'Female', 25, 456, 'tranthib@gmail.com', '12345'),
(5, 'Le', 'Hoang C', 'Male', 28, 789, 'lehoangc@gmail.com', '12345'),
(6, 'Pham', 'Thi D', 'Female', 32, 321, 'phamthid@gmail.com', '12345'),
(8, 'Tong', 'Na', 'Female', 22, 15322, 'natong@gmail.com', '12345');

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

--
-- Đang đổ dữ liệu cho bảng `job_department`
--

INSERT INTO `job_department` (`job_ID`, `job_dept`, `name`, `description`, `salary_range`) VALUES
(1, 'IT', 'Software Developer', 'Develop and maintain software ', '6000-7000'),
(2, 'HR', 'HR Manager', 'Manage HR-related tasks and te', '4000-6000'),
(3, 'Finance', 'Accountant', 'Handle company financial recor', '4500-6500'),
(4, 'Marketing', 'Digital Marketer', 'Create and execute digital mar', '4000-5500'),
(5, 'IT', 'Software Engineer', ' Software Engineer is a skille', '9000-10000');

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

--
-- Đang đổ dữ liệu cho bảng `payroll`
--

INSERT INTO `payroll` (`payroll_ID`, `emp_ID`, `job_ID`, `salary_ID`, `leave_ID`, `date`, `report`, `total_amount`) VALUES
(1, 3, 1, 1, NULL, '2024-10-01', 'Monthly salary', 6500),
(2, 4, 2, 2, NULL, '2024-10-01', 'Monthly salary', 5000),
(3, 5, 3, 3, NULL, '2024-10-01', 'Monthly salary', 5500),
(4, 6, 4, 4, NULL, '2024-10-01', 'Monthly salary', 4800);

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

--
-- Đang đổ dữ liệu cho bảng `qualification`
--

INSERT INTO `qualification` (`qual_ID`, `emp_ID`, `position`, `requirements`, `date_in`) VALUES
(1, 3, 'Senior Developer', '5 years experience, Python, Ja', '2020-01-01'),
(2, 4, 'HR Assistant', '2 years experience, communicat', '2021-06-15'),
(3, 5, 'Financial Analyst', '3 years experience, Excel, SAP', '2022-03-10'),
(4, 6, 'SEO Specialist', '2 years experience, Google Ana', '2023-05-20'),
(5, 1, 'Software Engineer', '10 years experience,C#,.NET', '2024-10-10');

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

--
-- Đang đổ dữ liệu cho bảng `salary_bonus`
--

INSERT INTO `salary_bonus` (`salary_ID`, `job_ID`, `amount`, `annual`, `bonus`) VALUES
(1, 1, 6500, '2024-12-31', '2024-11-15'),
(2, 2, 5000, '2024-12-31', '2024-11-15'),
(3, 3, 5500, '2024-12-31', '2024-11-15'),
(4, 4, 4800, '2024-12-31', '2024-11-15');

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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`admin_ID`, `fname`, `lname`, `gender`, `age`, `contact_add`, `admin_email`, `admin_pass`) VALUES
(1, 'Banh', 'Da Cua', 'Male', 22, 113, 'banhdacua@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `vemployeedetails`
-- (See below for the actual view)
--
CREATE TABLE `vemployeedetails` (
`emp_ID` int(11)
,`first_name` varchar(255)
,`last_name` varchar(255)
,`gender` varchar(11)
,`age` int(11)
,`contact_address` int(11)
,`email` varchar(255)
,`position` varchar(30)
,`requirements` varchar(30)
,`qualification_date` date
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `vemployeedetails`
--
DROP TABLE IF EXISTS `vemployeedetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vemployeedetails`  AS SELECT `e`.`emp_ID` AS `emp_ID`, `e`.`fname` AS `first_name`, `e`.`lname` AS `last_name`, `e`.`gender` AS `gender`, `e`.`age` AS `age`, `e`.`contact_add` AS `contact_address`, `e`.`emp_email` AS `email`, `q`.`position` AS `position`, `q`.`requirements` AS `requirements`, `q`.`date_in` AS `qualification_date` FROM (`employee` `e` left join `qualification` `q` on(`e`.`emp_ID` = `q`.`emp_ID`)) ;

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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `job_department`
--
ALTER TABLE `job_department`
  MODIFY `job_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `payroll`
--
ALTER TABLE `payroll`
  MODIFY `payroll_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `qualification`
--
ALTER TABLE `qualification`
  MODIFY `qual_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `salary_bonus`
--
ALTER TABLE `salary_bonus`
  MODIFY `salary_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
