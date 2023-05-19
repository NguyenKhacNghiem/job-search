-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 06:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vnjobfind`
--

-- --------------------------------------------------------

--
-- Table structure for table `applyhistory`
--

CREATE DATABASE vnjobfind;
USE vnjobfind;

CREATE TABLE `applyhistory` (
  `email` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `feedback` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applyhistory`
--

INSERT INTO `applyhistory` (`email`, `id`, `result`, `feedback`) VALUES
('nghiem7755@gmail.com', 1, 0, ''),
('nghiem7755@gmail.com', 2, 0, ''),
('thuan@gmail.com', 6, 0, ''),
('thuan@gmail.com', 13, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `email` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`email`, `id`, `deleted`) VALUES
('nghiem7755@gmail.com', 1, 0),
('nghiem7755@gmail.com', 2, 0),
('nghiem7755@gmail.com', 4, 0),
('nghiem7755@gmail.com', 5, 0),
('thuan@gmail.com', 11, 0),
('thuan@gmail.com', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `email` varchar(100) NOT NULL,
  `academicLevel` varchar(100) NOT NULL,
  `dateOfBirth` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`email`, `academicLevel`, `dateOfBirth`) VALUES
('nghiem7755@gmail.com', 'Đại học', '2002-08-07'),
('thuan@gmail.com', 'Đại học', '2002-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `email` varchar(100) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `website` varchar(300) NOT NULL,
  `area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`email`, `companyName`, `address`, `website`, `area`) VALUES
('linh@gmail.com', 'Công TY MTV Linh Nguyễn', 'Hà Nội', 'https://linh.com', 'Miền bắc'),
('nghiem782002@gmail.com', 'Công ty TNHH NKN', 'Hồ Chí Minh, Việt Nam', 'https://fb.com', 'Miền nam');

-- --------------------------------------------------------

--
-- Table structure for table `recruitmentnews`
--

CREATE TABLE `recruitmentnews` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `requirement` varchar(500) NOT NULL,
  `benefit` varchar(500) NOT NULL,
  `position` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `salary` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recruitmentnews`
--

INSERT INTO `recruitmentnews` (`id`, `email`, `title`, `description`, `requirement`, `benefit`, `position`, `date`, `salary`, `deleted`) VALUES
(1, 'nghiem782002@gmail.com', 'TUYỂN DỤNG LẬP TRÌNH VIÊN WEB FRONT-END', '- Công việc liên quan đến việc xây dựng phần giao diện cho các trang web của công ty yêu cầu.\r\n- Giao tiếp tiếng anh 50%', '- Thành thạo HTML5, CSS3, Javascript ES6, Bootstrap 4, JQuery\r\n- Tiếng anh: TOEIC 600', '- Làm việc trong môi trường năng động\r\n- Bảo hiểm xã hội\r\n- Thưởng lương tháng 13', 'Nhân viên', '04/04/2023', 5000000, 0),
(2, 'nghiem782002@gmail.com', 'TUYỂN DỤNG LẬP TRÌNH VIÊN ANDROID', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\n- Tiếng anh: IELTS 6.5\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\n- Thưởng du lịch', 'Thực tập', '04/05/2023', 3000000, 0),
(4, 'nghiem782002@gmail.com', 'TUYỂN DỤNG LẬP TRÌNH VIÊN JAVA', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Nhân viên', '15/04/2023', 45000000, 0),
(5, 'nghiem782002@gmail.com', 'TUYỂN DỤNG LẬP TRÌNH VIÊN C', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Quản lý', '04/04/2023', 55000000, 0),
(6, 'nghiem782002@gmail.com', 'TUYỂN DỤNG LẬP TRÌNH VIÊN C++', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Trưởng phòng', '08/04/2023', 25000000, 0),
(7, 'nghiem782002@gmail.com', 'TUYỂN DỤNG LẬP TRÌNH VIÊN PYTHON', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Trưởng phòng', '08/07/2022', 25000000, 0),
(8, 'nghiem782002@gmail.com', 'TUYỂN DỤNG LẬP TRÌNH VIÊN GAME', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Quản lý', '09/02/2023', 25000000, 0),
(9, 'nghiem782002@gmail.com', 'TUYỂN DỤNG LẬP TRÌNH VIÊN C#', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Trưởng phòng', '10/05/2022', 65000000, 0),
(10, 'nghiem782002@gmail.com', 'TUYỂN DỤNG LẬP TRÌNH VIÊN R', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Thực tập', '11/07/2022', 8000000, 0),
(11, 'linh@gmail.com', 'TUYỂN DỤNG NHÂN VIÊN MARKETING', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Nhân viên', '04/08/2022', 25000000, 0),
(12, 'linh@gmail.com', 'TUYỂN DỤNG TRƯỞNG PHÒNG MARKETING', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Trưởng phòng', '04/04/2022', 25000000, 0),
(13, 'linh@gmail.com', 'TUYỂN DỤNG QUẢN LÝ KẾ TOÁN', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Quản lý', '04/04/2023', 25000000, 0),
(14, 'linh@gmail.com', 'TUYỂN DỤNG KẾ TOÁN TRƯỞNG', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Trưởng phòng', '04/04/2023', 25000000, 0),
(15, 'linh@gmail.com', 'TUYỂN DỤNG HƯỚNG DẪN VIÊN DU LỊCH', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Nhân viên', '04/04/2023', 25000000, 0),
(16, 'linh@gmail.com', 'TUYỂN DỤNG TRƯỞNG PHÒNG DU LỊCH', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Trưởng phòng', '04/04/2023', 25000000, 0),
(17, 'linh@gmail.com', 'TUYỂN DỤNG QUẢN LÝ XÂY DỰNG ĐÔ THỊ', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Quản lý', '04/04/2023', 25000000, 0),
(18, 'linh@gmail.com', 'TUYỂN DỤNG NHÂN VIÊN XÂY DỰNG CẦU', '- Công việc liên quan đến việc xây dựng, tạo ra các ứng dụng điện thoại chạy trên hệ điều hành Android\r\n- Môi trường giao tiếp 100% tiếng anh', '- Thành thạo Java, Flutter, Kotlin\r\n- Tiếng anh: IELTS 6.5\r\n- Biết tiếng Nhật là 1 lợi thế', '- Môi trường làm việc năng động\r\n- Có nhiều buổi giao lưu, sinh hoạt giữa các phòng ban\r\n- Thưởng du lịch', 'Nhân viên', '04/04/2023', 25000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `imageName` varchar(100) NOT NULL,
  `blocked` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `fullname`, `gender`, `phone`, `imageName`, `blocked`, `type`) VALUES
('admin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '', '', '', 0, 'Admin'),
('linh@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Nguyễn Thị Linh', 'Nữ', '0909555555', 'defaultImage.png', 0, 'Công ty'),
('nghiem7755@gmail.com', '2e8fcaf5ee98c8eed15fb449d900142048ca92937ea64d8863f88c9a63ccabe1', 'Nguyễn Khắc Nghiêm', 'Nam', '0703149783', 'defaultImage.png', 0, 'Người tìm việc'),
('nghiem782002@gmail.com', '5022bc08a901fdef58fadae94af721c26f045d16e2323f61eb50d57672cc6c5a', 'Nguyễn Khắc Nghiêm', 'Nam', '0703149783', 'defaultImage.png', 0, 'Công ty'),
('thuan@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Võ Minh Thuận', 'Nam', '0932111541', 'defaultImage.png', 0, 'Người tìm việc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applyhistory`
--
ALTER TABLE `applyhistory`
  ADD PRIMARY KEY (`email`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`email`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `recruitmentnews`
--
ALTER TABLE `recruitmentnews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recruitmentnews`
--
ALTER TABLE `recruitmentnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applyhistory`
--
ALTER TABLE `applyhistory`
  ADD CONSTRAINT `applyhistory_ibfk_2` FOREIGN KEY (`email`) REFERENCES `client` (`email`),
  ADD CONSTRAINT `applyhistory_ibfk_3` FOREIGN KEY (`id`) REFERENCES `recruitmentnews` (`id`);

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`email`) REFERENCES `client` (`email`),
  ADD CONSTRAINT `bookmarks_ibfk_2` FOREIGN KEY (`id`) REFERENCES `recruitmentnews` (`id`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `recruitmentnews`
--
ALTER TABLE `recruitmentnews`
  ADD CONSTRAINT `recruitmentnews_ibfk_1` FOREIGN KEY (`email`) REFERENCES `company` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
