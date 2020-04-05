-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 04:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(25) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'คอนโดมิเนียม', 'https://cdn-images.prod.thinkofliving.com/wp-content/uploads/1/2014/06/Perspective02.jpg'),
(2, 'อพาร์ทเมนท์', 'https://m.thaiware.com/upload_misc/software/2016_03/thumbnails/9445_161026115715vR_81.png'),
(3, 'แมนชั่น', 'https://f.ptcdn.info/720/003/000/1364796517-pic3D-o.jpg'),
(4, 'หอพัก', 'data:image/jpeg;base64,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');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL DEFAULT current_timestamp(),
  `comment_time` time NOT NULL DEFAULT current_timestamp(),
  `comment_score` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_content`, `comment_date`, `comment_time`, `comment_score`) VALUES
(1, 'ดีมากเลยครับ', '2020-03-01', '05:22:14', 5),
(2, 'แอร์เย็นไปนิดนึงค่ะ', '2020-03-04', '14:12:12', 4),
(3, 'ห้องเล็กมากกก', '2020-03-03', '13:07:00', 3),
(4, 'วิวสวยมากครับ', '2020-03-11', '10:14:06', 5),
(5, 'บรรยากาศดี ข้างๆมีร้านอาหารด้วยอะ', '2020-03-10', '15:34:05', 5),
(6, 'น่ากลัว นึกว่ามีผี T^T', '2020-03-04', '10:07:14', 3),
(7, ' Wifi ช้ามากคร้าบ', '2020-03-17', '06:33:11', 4),
(8, 'ขนาดห้องพอดี ทุกอย่างโอเค \r\n', '2020-03-04', '14:48:45', 5),
(9, 'สวัสดีครับ', '2020-03-31', '11:27:35', 5),
(10, 'สวยงามครับ', '2020-03-31', '11:30:12', 4),
(19, 'ถือว่าผ่านค่ะ', '2020-03-31', '11:45:56', 5),
(20, 'ถือว่าผ่านค่ะ', '2020-03-31', '11:45:59', 5),
(21, 'จัดจ้านในญ่านนี้', '2020-03-31', '11:46:56', 5),
(22, 'โอเคครับผม', '2020-03-31', '11:50:21', 5),
(23, 'จัดจ้าน', '2020-03-31', '11:54:03', 5),
(25, 'ราคาถูกดี', '2020-03-31', '12:00:00', 5),
(26, 'อยู่ได้', '2020-03-31', '12:14:46', 4);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `pic_id` int(255) NOT NULL,
  `picture` text NOT NULL,
  `rentalroom_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`pic_id`, `picture`, `rentalroom_id`) VALUES
(1, 'https://r-cf.bstatic.com/images/hotel/max1024x768/705/70548233.jpg', 1),
(2, 'https://cdn.renthub.in.th/images/uploaded/201806/20180615/apartment_pictures/normal/3c31d742a419a789035964be59df05cc.jpg?1529064046', 2),
(3, 'https://res.cloudinary.com/baanfinder/image/private/t_project_gallery_size/fsnmmbsmqro4njjdhwuk.jpg', 3),
(4, 'https://res.cloudinary.com/baanfinder/image/private/t_project_gallery_size/s0uxbcselghrluncaszc.jpg', 4),
(5, 'https://4.bp.blogspot.com/-P2EAjZCCec8/VyLh5ri5BrI/AAAAAAAABpQ/iYbUUHpbicYVUww3xtfUhjDxCMNKDPZkgCLcB/s400/PP-Mansion-Songkhla.jpg', 5),
(6, 'https://lh3.googleusercontent.com/proxy/UNPrHADzIsp0pPhlOMc2VNuwulF7n_RP_wcsQEkWmgaBduwnSomo9LTpCVF_KPFf-ZoJIt9QTwffZqmgGvZ1PPRdwcQ0HPOnyY_9RJEymNrJ9qOgiEYqmy6rSGk4eYqWkLkL3Gc', 6),
(7, 'data:image/jpeg;base64,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', 7),
(8, 'https://f.hongpak.in.th/media/rooms/thbs3x/18/0621/071635_4534.png', 8);

-- --------------------------------------------------------

--
-- Table structure for table `rentalroom`
--

CREATE TABLE `rentalroom` (
  `rentalroom_id` int(255) NOT NULL,
  `rentalroom_name` varchar(255) NOT NULL,
  `rentalroom_price` int(10) NOT NULL,
  `rentalroom_name_location` varchar(255) NOT NULL,
  `rentalroom_latitude` text DEFAULT NULL,
  `rentalroom_longitude` text DEFAULT NULL,
  `rentalroom_phone` varchar(25) NOT NULL,
  `rentalroom_limitedroom_sex` varchar(25) NOT NULL,
  `rentalroom_approve` int(1) DEFAULT NULL,
  `rentalroom_facilities` text NOT NULL,
  `category_id` int(25) NOT NULL,
  `rentalroom_img` varchar(255) DEFAULT NULL,
  `rentalroom_star` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentalroom`
--

INSERT INTO `rentalroom` (`rentalroom_id`, `rentalroom_name`, `rentalroom_price`, `rentalroom_name_location`, `rentalroom_latitude`, `rentalroom_longitude`, `rentalroom_phone`, `rentalroom_limitedroom_sex`, `rentalroom_approve`, `rentalroom_facilities`, `category_id`, `rentalroom_img`, `rentalroom_star`) VALUES
(1, 'Tanatip Apartment', 4000, '91/52 ถนน กาญจนวนิช ตำบล เขารูปช้าง อำเภอเมืองสงขลา สงขลา 90000', '7.15965', '100.6050207', '086 461 5176', 'หอรวม', 1, 'รายเดือน', 2, 'https://r-cf.bstatic.com/images/hotel/max1024x768/705/70548233.jpg', 5),
(2, 'ลายจันทร์ อพาร์ทเมนท์', 350, '91/117 หมู่ที่ 10 ถนน กาญจนวนิช ซอย 25 ตำบล เขารูปช้าง อำเภอเมืองสงขลา สงขลา 90000', '7.1606551', '100.6043782', '081 766 2400', 'หอรวม', 1, 'รายวัน', 2, 'https://cdn.renthub.in.th/images/uploaded/201806/20180615/apartment_pictures/normal/3c31d742a419a789035964be59df05cc.jpg?1529064046', 4),
(3, 'พลัสคอนโด', 65000, '682 ถ.เพชรเกษม หาดใหญ่ สงขลา 90110', '7.0380776', '100.4609588', '098 453 5659', 'หอรวม', 1, 'รายเดือน', 1, 'https://res.cloudinary.com/baanfinder/image/private/t_project_gallery_size/fsnmmbsmqro4njjdhwuk.jpg', 5),
(4, 'หงส์ฟ้าคอนโดเทล', 35000, '19 ถนน เพชรเกษม ซอย 2 ตำบล คอหงส์ อำเภอหาดใหญ่ สงขลา 90110', '7.0216201', '100.4866327', '081 990 1554', 'หอหญิง', 1, 'รายเดือน', 1, 'https://res.cloudinary.com/baanfinder/image/private/t_project_gallery_size/s0uxbcselghrluncaszc.jpg', 4),
(5, 'พีพี แมนชั่น', 4500, 'ถนน กาญจนวนิช ซอย 13 ตำบล เขารูปช้าง อำเภอเมืองสงขลา สงขลา 90000', '7.1700333', '100.6083436', '093 576 2980', 'หอรวม', 2, 'รายเดือน', 3, 'https://4.bp.blogspot.com/-P2EAjZCCec8/VyLh5ri5BrI/AAAAAAAABpQ/iYbUUHpbicYVUww3xtfUhjDxCMNKDPZkgCLcB/s400/PP-Mansion-Songkhla.jpg', 3),
(6, 'วชิรวิชญ์ แมนชั่น', 3500, 'ถนน กาญจนวนิช ซอย 5 ตำบล เขารูปช้าง อำเภอเมืองสงขลา สงขลา 90000', '7.1749998', '100.6053005', '094 526 3359', 'หอชาย', 2, 'รายเดือน', 3, 'https://s3-ap-southeast-1.amazonaws.com/builk3storage/project/20161028_122650_project_2045817_big.jpg', 5),
(7, 'หอพักสตรอิ่มอุ่น', 2500, 'เยื้อง ม ราชภัฏ, สงขลา', '7.1750177', '100.6053005', '091 983 2698', 'หอหญิง', 1, 'รายเดือน', 4, 'https://hor2u.com/upload_hotel_img/_upload/25788_20170411.jpg', 5),
(8, 'หอพักหญิงโมกข์-มุข', 3500, 'ตำบล เขารูปช้าง อำเภอเมืองสงขลา สงขลา 90000', '7.1700097', '100.6086354', '0640323350', 'หอหญิง', 1, 'รายเดือน', 4, 'https://f.hongpak.in.th/media/rooms/thbs3x/18/0621/071635_4534.png', 4),
(1, 'ธนาทิพย์ อพาร์ทเม้นท์', 3000, '91/52ถนนกาญจนวนิช ตำบล เขารูปช้าง อำเภอเมืองสงขลา สงขลา90000', NULL, NULL, '086 461 5176', 'ไม่จำกัด', NULL, '', 0, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `scorerentalroom`
--

CREATE TABLE `scorerentalroom` (
  `score_id` int(255) NOT NULL,
  `score` int(5) NOT NULL,
  `rentalroom_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scorerentalroom`
--

INSERT INTO `scorerentalroom` (`score_id`, `score`, `rentalroom_id`) VALUES
(1, 4, 1),
(2, 5, 2),
(3, 5, 3),
(4, 4, 4),
(5, 5, 5),
(6, 4, 6),
(7, 5, 7),
(8, 4, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `rentalroom_id` (`rentalroom_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
