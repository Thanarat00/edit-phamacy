-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 11:56 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_ctm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`b_id`, `b_name`) VALUES
(1, 'ยาแก้ปวดหัว'),
(2, 'ยาแก้ไข');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `c_id` int(11) NOT NULL,
  `c_status` int(2) DEFAULT NULL,
  `c_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `c_surname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `c_phone` varchar(11) NOT NULL,
  `c_username` varchar(50) NOT NULL,
  `c_password` varchar(50) NOT NULL,
  `c_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`c_id`, `c_status`, `c_name`, `c_surname`, `c_phone`, `c_username`, `c_password`, `c_img`) VALUES
(1, 2, 'ลูกค้าหน้าร้าน', 'ลูกค้าหน้าร้าน', '123456789', 'erdsflkghjdslrfgjdflkjgdlkfgjlk', '62ef6b21d39a1b64421b6491cd71b24a2fdb5c2f', ''),
(2, 1, 'ธรรณรัตน์ ', 'แสนรัมย์', '0951252898', '0951252898', '0505bf97aaa38217999fa409491f72a2e36fa083', '144226251720230331_190418.png'),
(6, 1, 'ธรรณรัตน์ ', 'asfdsf', '09512528981', '09512528981', '38c65883d3649763e9d135545ab8639e2b96c73f', '60633310120230331_191417.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `mem_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `ref_l_id` int(11) NOT NULL,
  `mem_name` varchar(50) NOT NULL,
  `mem_username` varchar(20) NOT NULL,
  `mem_password` varchar(100) NOT NULL,
  `mem_status` varchar(50) NOT NULL,
  `mem_img` varchar(200) NOT NULL,
  `dateinsert` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mem_id`, `ref_l_id`, `mem_name`, `mem_username`, `mem_password`, `mem_status`, `mem_img`, `dateinsert`) VALUES
(001, 1, 'FFF', '1', '356a192b7913b04c54574d18c28d46e6395428ab', '1', '92335717620230330_221557.png', '2019-09-04 03:40:46'),
(029, 3, 'ธรรณรัตน์ แสนรัมย์', '44', '98fbc42faedc02492397cb5962ea3a3ffc0a9243', '1', '196547429520230321_203126.png', '2023-03-21 13:31:26'),
(032, 2, 'MM', '10', 'b1d5781111d84f7b3fe45a0852e59758cd7a87e5', '1', '98609390920230329_171138.jpg', '2023-03-29 10:11:38'),
(036, 3, 'lll', '77', 'd321d6f7ccf98b51540ec9d933f20898af3bd71e', '1', '133978697220230329_171637.png', '2023-03-29 10:16:37'),
(043, 2, 'dfgdfgdf', '22', '12c6fc06c99a462375eeb3f43dfd832b08ca9e17', '1', '24108692620230329_173533.png', '2023-03-29 10:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `mem_id` int(11) NOT NULL,
  `c_id` int(5) NOT NULL COMMENT 'FK tbl_customer',
  `receive_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผู้รับ',
  `order_status` int(1) NOT NULL,
  `pay_amount` int(11) DEFAULT NULL,
  `pay_amount2` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `mem_id`, `c_id`, `receive_name`, `order_status`, `pay_amount`, `pay_amount2`, `order_date`) VALUES
(0001, 1, 1, 'ลูกค้าหน้าร้าน', 4, 50, 50, '2023-03-31 23:16:39'),
(0002, 1, 2, 'ลูกค้าหน้าร้าน', 4, 50, 100, '2023-03-31 23:16:57'),
(0003, 1, 1, 'ลูกค้าหน้าร้าน', 4, 5000, 10000, '2023-03-31 23:17:39'),
(0004, 1, 1, 'ลูกค้าหน้าร้าน', 4, 5000, 5000, '2023-03-31 23:28:05'),
(0005, 1, 2, 'ลูกค้าหน้าร้าน', 4, 5000, 5000, '2023-03-31 23:31:18'),
(0006, 1, 2, 'ลูกค้าหน้าร้าน', 4, 500, 1000, '2023-03-31 23:32:49'),
(0007, 1, 1, 'ลูกค้าหน้าร้าน', 4, 100, 100, '2023-04-01 00:06:43'),
(0008, 1, 1, 'ลูกค้าหน้าร้าน', 4, 100, 100, '2023-04-03 15:30:03'),
(0009, 1, 1, 'ลูกค้าหน้าร้าน', 4, 100000, 100000, '2023-04-04 14:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `d_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_c_qty` int(11) NOT NULL,
  `total` int(111) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`d_id`, `order_id`, `p_id`, `p_c_qty`, `total`) VALUES
(1, 1, 1, 1, 50),
(2, 2, 1, 1, 50),
(3, 3, 1, 1, 5000),
(4, 4, 1, 1, 5000),
(5, 5, 1, 1, 5000),
(6, 6, 1, 5, 500),
(7, 7, 1, 1, 100),
(8, 8, 1, 1, 100),
(9, 9, 1, 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `t_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `p_barcode` varchar(25) NOT NULL COMMENT 'Barcode',
  `p_name` varchar(200) NOT NULL,
  `p_detail` varchar(255) NOT NULL,
  `p_detailmore` varchar(255) NOT NULL,
  `p_license` int(3) DEFAULT NULL COMMENT '9=ข.ย.9, 10=ข.ย.10, 11=ข.ย.11\r\n',
  `p_dateMFD` date NOT NULL COMMENT 'วันที่ผลิต',
  `p_dateEXD` date NOT NULL COMMENT 'วันที่หมดอายุ',
  `p_lot` varchar(50) NOT NULL,
  `s_id` int(11) NOT NULL COMMENT 'รายละเอียดผู้ผลิต',
  `p_price` int(11) NOT NULL,
  `p_img` varchar(200) NOT NULL,
  `p_qty` int(11) DEFAULT 0,
  `date_save` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `t_id`, `b_id`, `p_barcode`, `p_name`, `p_detail`, `p_detailmore`, `p_license`, `p_dateMFD`, `p_dateEXD`, `p_lot`, `s_id`, `p_price`, `p_img`, `p_qty`, `date_save`) VALUES
(002, 1, 1, 'A00112854', 'sdfdsfds', 'sdfdssdfsdfdsf', 'วิธีการทานยาพาราเซตามอลให้เหมาะสมกับน้ำหนักตัว  \r\nยาน้ำสำหรับเด็ก มีความเข้มข้นต่างๆ ดังนี้\r\nน้ำหนักตัวไม่ถึง 10 กก.  ทานครั้งละ 60มก./0.6 มล. หรือ 80 มก./0.8 มล.\r\nน้ำหนักตัว 12 – 15 กก. ทานครั้งละ 120, 125มก./ช้อนชา\r\nน้ำหนักตัว 16 – 24 กก. ทานครั้งละ 160', 9, '2023-04-07', '2023-04-15', 'sdfdssdgfdsg1231132', 1, 50, '106129705320230405_234006.jpg', 10, '2023-04-05 16:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`s_id`, `s_name`) VALUES
(1, 'ห้างหุ้นส่น');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`t_id`, `t_name`) VALUES
(1, 'ยาแก้ปวด');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `mem_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
