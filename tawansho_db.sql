-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2015 at 10:50 AM
-- Server version: 5.5.31
-- PHP Version: 5.4.41

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tawansho_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_address` varchar(100) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`a_id`, `a_address`, `m_id`) VALUES
(4, '31/5 ม.1 ต.สะพานหิน อ.หนองมะโมง จ.ชัยนาท 17120', 3),
(5, '31/5 ม.1 ต.ท่าเสา อ.ไทรโยค จ.กาญจนบุรี 71150', 4),
(6, '111 ม.12 ต.ป่าไผ่ อ.สันทราย จ.เชียงใหม่ 50210', 5),
(7, '77 ต.พระบาท อ.เมือง จ.ลำปาง 52000', 6),
(9, '11/1  หมู่ 2  ถนนหิรัญนคร ต.แม่จัน อ.แม่จัน จ.เชียงราย 57110', 7),
(10, '277 หมู่ 5   ต.หนองหาร อ.สันทราย จ.เชียงใหม่ 50210', 7);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'เมคอัพ'),
(2, 'สกินแคร์'),
(3, 'ดูแลผิวหน้า'),
(4, 'ดูแลผิวกาย'),
(5, 'อาหารเสริม'),
(6, 'อื่นๆ'),
(7, 'สินค้าขายดี'),
(8, 'สินค้าแนะนำ');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(50) DEFAULT NULL,
  `m_lastname` varchar(50) DEFAULT NULL,
  `m_tel` varchar(50) DEFAULT NULL,
  `m_email` varchar(50) DEFAULT NULL,
  `m_password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_name`, `m_lastname`, `m_tel`, `m_email`, `m_password`) VALUES
(1, 'พงศธร', 'มหาชัย', '0874445558', 'skyline@gmail.com', '123456'),
(2, 'มหาชัย', 'ใจมหา', '0899998875', 'doo@gmail.com', '123456'),
(3, 'ปรินทร', 'สงวนพงษ์', '0811001110', 'eee@gmail.com', '123456'),
(4, 'สมถึก', 'บึกบึน', '0899998875', 'test@gmail.com', '123456'),
(5, 'ปรินทร', 'สงวนพงษ์', '0852158759', 'parintorn1902@gmail.com', '123456'),
(6, 'weeta', 'swerrtyy', '0834443333', 'llcherrybarowll@windowslive.com', 'cherry1991'),
(7, 'นายกฤตพจน์', 'แสงโชติ', '0982365962', 'kritapot54@gmail.com', 'bank053771702');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `od_id` int(11) NOT NULL AUTO_INCREMENT,
  `od_pname` varchar(50) DEFAULT NULL,
  `od_pprice` varchar(50) DEFAULT NULL,
  `od_pamount` varchar(50) DEFAULT NULL,
  `od_psum` varchar(50) DEFAULT NULL,
  `o_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`od_id`),
  KEY `FK_orderdetail` (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`od_id`, `od_pname`, `od_pprice`, `od_pamount`, `od_psum`, `o_id`) VALUES
(13, 'Candy Lotion Beauty Violet', '450', '10', '4500', 5),
(14, 'Candy Lotion Sweety Blue', '450', '3', '1350', 6),
(15, 'GG Skincare booster Night Cream', '280', '5', '1400', 6),
(16, 'pineapple lotion aha80%', '240', '1', '240', 6),
(17, 'Candy Lotion Lovely Pink', '450', '1', '450', 6),
(18, '88 Bounce Up Pact', '380', '5', '1900', 7),
(19, 'GG Skincare booster Night Cream', '280', '3', '840', 7),
(20, '88 Bounce Up Pact', '380', '5', '1900', 8),
(21, 'Candy Lotion Lovely Pink', '450', '15', '6750', 8),
(22, 'Candy Lotion Sweety Blue', '450', '3', '1350', 9),
(23, 'GG Skincare booster Night Cream', '280', '5', '1400', 9),
(24, 'Candy Lotion Sweety Blue', '450', '10', '4500', 10),
(25, 'rimmel stay matte pressed power', '250', '1', '250', 11),
(26, '88 Bounce Up Pact', '380', '1', '380', 11),
(27, 'Candy Lotion Sweety Blue', '450', '1', '450', 12),
(28, 'Princess Prim Pheromone', '400', '2', '800', 12),
(29, 'rimmel stay matte pressed power', '250', '2', '500', 13),
(30, 'Candy Lotion Beauty Violet', '450', '2', '900', 14),
(31, 'Candy Lotion Lovely Pink', '450', '4', '1800', 15),
(32, 'rimmel stay matte pressed power', '250', '6', '1500', 15),
(33, 'GG Skincare booster Night Cream', '280', '2', '560', 16),
(34, 'Candy Lotion Sweety Blue', '450', '2', '900', 16),
(35, 'GG Skincare booster Night Cream', '280', '1', '280', 17),
(36, 'Candy Lotion Beauty Violet', '450', '5', '2250', 18),
(37, 'Candy Lotion Beauty Violet', '450', '1', '450', 19),
(38, 'Iya  Freshy sleeping mask', '220', '1', '220', 19),
(39, 'อะเชโรลา  เชอร์รี่ 1000 mg.', '160', '1', '160', 19),
(40, 'pineapple lotion aha80%', '240', '1', '240', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_code` varchar(50) DEFAULT NULL,
  `o_date` varchar(50) DEFAULT NULL,
  `o_status` varchar(50) DEFAULT NULL,
  `o_address` varchar(100) DEFAULT NULL,
  `o_sendcode` varchar(50) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_code`, `o_date`, `o_status`, `o_address`, `o_sendcode`, `m_id`) VALUES
(5, 'TW513273', '05-07-2015 17:14:19', 'จัดส่งสินค้าเรียบร้อย', '31/5 ม.1 ต.เหล่าใหญ่ อ.กุฉินารายณ์ จ.กาฬสินธุ์ 46110', 'EN578541224TH', 1),
(6, 'TW271450', '05-07-2015 17:47:24', 'จัดส่งสินค้าเรียบร้อย', '31/5 ม.1 ต.เหล่าใหญ่ อ.กุฉินารายณ์ จ.กาฬสินธุ์ 46110', 'EH123456789TH', 1),
(7, 'TW830635', '07-07-2015 17:36:15', 'รอการชำระเงิน', '31/5 ม.1 ต.ท่าเสา อ.ไทรโยค จ.กาญจนบุรี 71150', '', 4),
(8, 'TW805431', '07-07-2015 17:38:29', 'จัดส่งสินค้าเรียบร้อย', '31/5 ม.1 ต.ท่าเสา อ.ไทรโยค จ.กาญจนบุรี 71150', 'EH587452145TH', 4),
(9, 'TW828737', '07-07-2015 23:28:33', 'จัดส่งสินค้าเรียบร้อย', '111 ม.12 ต.ป่าไผ่ อ.สันทราย จ.เชียงใหม่ 50210', 'EH123456789TH', 5),
(10, 'TW103750', '07-07-2015 23:30:19', 'จัดส่งสินค้าเรียบร้อย', '111 ม.12 ต.ป่าไผ่ อ.สันทราย จ.เชียงใหม่ 50210', 'EH224975120TH', 5),
(11, 'TW171367', '08-07-2015 00:04:37', 'รอการชำระเงิน', '77 ต.พระบาท อ.เมือง จ.ลำปาง 52000', '', 6),
(12, 'TW165334', '08-07-2015 02:31:09', 'จัดส่งสินค้าเรียบร้อย', '11/1  หมู่ 2  ถนนหิรัญนคร ต.แม่จัน อ.แม่จัน จ.เชียงราย 57110', 'EH123457789TH', 7),
(13, 'TW758330', '08-07-2015 12:26:26', 'จัดส่งสินค้าเรียบร้อย', '277 หมู่ 5   ต.หนองหาร อ.สันทราย จ.เชียงใหม่ 50210', 'EH123496789TH', 7),
(14, 'TW388975', '08-07-2015 13:27:28', 'รอการชำระเงิน', '277 หมู่ 5   ต.หนองหาร อ.สันทราย จ.เชียงใหม่ 50210', '', 7),
(15, 'TW445756', '08-07-2015 15:40:20', 'จัดส่งสินค้าเรียบร้อย', '277 หมู่ 5   ต.หนองหาร อ.สันทราย จ.เชียงใหม่ 50210', 'EH123456789TH', 7),
(16, 'TW553932', '09-07-2015 05:03:04', 'จัดส่งสินค้าเรียบร้อย', '111 ม.12 ต.ป่าไผ่ อ.สันทราย จ.เชียงใหม่ 50210', 'EH788542117TH', 5),
(17, 'TW907740', '09-07-2015 05:15:06', 'จัดส่งสินค้าเรียบร้อย', '111 ม.12 ต.ป่าไผ่ อ.สันทราย จ.เชียงใหม่ 50210', 'EH485214521TH', 5),
(18, 'TW506719', '09-07-2015 12:53:05', 'จัดส่งสินค้าเรียบร้อย', '277 หมู่ 5   ต.หนองหาร อ.สันทราย จ.เชียงใหม่ 50210', 'EH123456789TH', 7),
(19, 'TW295881', '16-07-2015 21:45:58', 'รอการชำระเงิน', '111 ม.12 ต.ป่าไผ่ อ.สันทราย จ.เชียงใหม่ 50210', '', 5),
(20, 'TW705753', '19-07-2015 01:08:21', 'รอการจัดส่งสินค้า', '11/1  หมู่ 2  ถนนหิรัญนคร ต.แม่จัน อ.แม่จัน จ.เชียงราย 57110', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(50) DEFAULT NULL,
  `p_price` varchar(50) DEFAULT NULL,
  `p_detail` varchar(255) DEFAULT NULL,
  `p_weight` varchar(50) DEFAULT NULL,
  `p_pic` varchar(100) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_price`, `p_detail`, `p_weight`, `p_pic`, `cate_id`) VALUES
(3, 'Candy Lotion Beauty Violet', '450', 'Candy Lotion กลิ่น Beauty Violet กลิ่นหอมหวาน อ่อนโยน น่ารักสุดๆ หัวน้ำหอมนำเข้าจากอังกฤษ', '750 ml.', 'c-violet-1.jpg', 4),
(8, 'pineapple lotion aha80%', '240', 'โลชั่นสัปปะรด AHA 80%+วิตามิน C+E ขาวกระจ่างใส สารสกัดจากสับปะรดมีคุณค่าในการบำรุงรักษา ดูแลผิวพรรณใ', '500 ml.', 'plotion.jpg', 4),
(12, 'ครีมทาผิว ดินน้ำมัน ber.88 ', '370', 'ผิวขาว  เปล่งปลั่ง  กระจ่างใส  จนคุณสังเกตุได้', '-', '130715_131642.jpg', 8),
(15, 'สบู่ Pure soap  หัวเชื้อผิวขาว 100%', '150', 'Jelly Soap สบู่เจลลี่ ช่วยเร่งการผลัดเซลล์ผิวที่เสื่อมสภาพให้หลุดไวขึ้น ปรับสีผิวให้สม่ำเสมอ\r\n\r\n', '100 กรัม', '150715_121959.jpg', 7),
(16, 'สครับกาแฟขัดผิว', '59', 'สครับกาแฟขัดผิว ช่วยผิวขาว นุ่ม เนียนกระจ่างใส ช่วยกระชับผิว ', '50 กรัม', '150715_122541.jpg', 7),
(18, 'สครับกาแฟสูตรน้ำนม 100%', '59', 'สครับกาแฟสูตรน้ำนม 100% เมล็ดกาแฟคัดเกรดบดละเอียด กลิ่นหอมจากน้ำนมเข้มข้น สครัปกาแฟสูตรน้ำนม ', '-', '150715_122931.jpg', 4),
(19, 'SNP ANIMAL MASK', '29', 'มาร์คหน้ารูปสัตว์ น่ารัก ฟรุ้งฟริ้งง มีหลายลายให้เลือกจ้า แต่ละลายมีคุณสมบัติ แตกต่างกันไป', '-', '150715_123300.jpg', 3),
(20, 'Grape Cream Belleza', '120', 'Belleza Grape Cream ผลิตจากสารสกัดจากเนื้อองุ่น และเม็ดองุ่น มีวิตามินเข้มข้น ', '7 กรัม', '130715_133840.jpg', 3),
(21, 'Smooth sunscreen cream  กันแดดเนื้อซิลิโคน  SPF 50', '250', 'กันแดดเนื้อซิลิโคน  SPF 50 PA+++  ป้องกันแสงแดดสูงสุด  50 เท่า', '-', '150715_124624.jpg', 3),
(22, 'Princess Skin Care  ครีมหน้าขาว  เงา  เด็ก', '590', 'สุดยอดครีมหน้าใส กล้าโชว์หน้าสด ผิวเนียนละเอียด ฉ่ำวาวอิ่มน้ำ บอกลาหน้าเสีย สิว ผิวหมองคล้ำ ', '10 กรัม', '150715_124416.jpg', 3),
(23, 'กันแดดอ๊อกซิเจน by Ezziz lab skin', '120', 'กันแดดอ๊อกซิเจน SPF60+\r\nOxigen Sunscreen', '15 กรัม', '150715_125344.jpg', 3),
(24, 'Iya  Freshy sleeping mask', '220', '-', '-', '130715_134616.jpg', 8),
(25, 'Mille Rose Aura Collagen', '389', '-', '-', '130715_134828.jpg', 1),
(26, 'Mille 3D Brow Mascara', '249', '-', '-', '150715_130244.jpg', 1),
(28, 'ครีมบำรุงผิวหน้า  Sha-Ke8', '690', 'Ska-Ke8 ซาเกะ8 ครีมรกปลา(Salmon Placenta Cream) ครีมหน้าเด้ง ที่เหล่าดาราหลงรัก', '-', '150715_130548.jpg', 8),
(29, 'Aloe vera soothing gel', '195', 'เจลบำรุงผิว  มีส่วนผสมของว่านหางจระเข้  98%', '-', '150715_134919.jpg', 4),
(30, 'Gluta with Berry ', '430', '-', '-', '130715_135435.jpg', 5),
(31, 'อะเชโรลา  เชอร์รี่ 1000 mg.', '160', '-', '-', '150715_130904.jpg', 5),
(33, 'Underarm cupcake cream', '190', 'little baby underarm cupcake cream  ครีมรักแร้ขาว', '-', '150715_131402.jpg', 4),
(34, 'B SHAPE COFFEE', '160', '-', '-', '150715_132024.jpg', 5),
(35, 'เเป้งดินน้ำมัน  เเป้งโฟโต้ช๊อป  แป้งเยลลี่  ver.88', '420', '-', '12 กรัม', '150715_132149.jpg', 1),
(36, '4G Beauti Shot', '490', '-', '-', '150715_132340.jpg', 5),
(37, 'BB White Premium', '570', '-', '120 เม็ด', '150715_132518.jpg', 5),
(38, 'C แอล WHITE', '690', '-', '-', '150715_132632.jpg', 3),
(39, 'เซตผิวขาว  ออร่า', '230', '-', '-', '150715_132740.jpg', 4),
(40, 'ONE STOP CREAM', '260', '-', '-', '150715_132836.jpg', 3),
(41, 'เเป้งพัฟฟ์เค้กทูเวย์  Babalah', '570', '-', '-', '150715_132936.jpg', 1),
(42, 'Acorbic C 1000 mg.', '160', '-', '-', '150715_133051.jpg', 5),
(44, 'แป้ง STAY MATTE ', '290', '-', '-', '150715_133312.jpg', 1),
(45, 'Gg Skincare ครีมไอติม', '270', '-', '-', '150715_133403.jpg', 3),
(46, 'DD ทาตัวขาว สารสกัดจากพิเทร่า', '250', '-', '-', '150715_133554.jpg', 4),
(47, 'โกลด์โซฟ สบู่เร่งขายติดสปีด', '100', '-', '50 กรัม', '150715_134801.jpg', 4),
(48, 'PIBU นมผึ้ง  ผลิตภัฑณ์เสริมอาหาร', '390', '-', '-', '150715_135155.jpg', 5),
(49, 'น้ำมะเม่าผสม Chia Seed', '290', '-', '165', '150715_135352.jpg', 5),
(50, 'Sweet Candy หอมละมุน ผิวกระจ่างใส', '390', '-', '-', '150715_135454.jpg', 4),
(51, 'Bellaza มุกส้ม', '120', '-', '-', '150715_135632.jpg', 3),
(52, 'Bellaza แอปเปิ้ลสาหร่าย', '-', '-', '-', '150715_135714.jpg', 3),
(53, 'Nano  Collagen', '690', '-', '-', '150715_135923.jpg', 5),
(54, 'Pineapple serum  เซรั่มสัปปะรด ', '180', '-', '-', '150715_140023.jpg', 2),
(55, 'ครีมกันแดด พรนภา', '230', '-', '-', '150715_140118.jpg', 3),
(56, 'กันแดด ดี๊ดี  spf 130 pa++', '159', '-', '-', '150715_141039.jpg', 4),
(57, 'ครีมสมุนไพรสาหร่าย เหมยหยง', '250', '-', '-', '150715_142415.jpg', 3),
(58, 'Over White neon', '290', '-', '-', '150715_142458.jpg', 4),
(59, 'Mille Super Whitening Rose Pact SPF 48 PA++', '389', '-', '-', '150715_142619.jpg', 1),
(60, 'Magic Milk ', '190', '-', '-', '150715_142734.jpg', 3),
(61, 'AHA TWIN', '150', '-', '-', '150715_142845.jpg', 4),
(62, 'ครีมกันแดด ผิวใส สูตรติดแอร์', '190', '-', '-', '150715_142926.jpg', 4),
(63, 'Magic Serum', '139', '-', '-', '150715_143015.jpg', 2),
(64, 'Colly Acerola ', '390', '-', '-', '150715_143230.jpg', 5),
(65, 'Color change blemish balm', '380', '-', '-', '150715_143348.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transfermoney`
--

CREATE TABLE IF NOT EXISTS `transfermoney` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_image` varchar(100) DEFAULT NULL,
  `o_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `transfermoney`
--

INSERT INTO `transfermoney` (`t_id`, `t_image`, `o_code`) VALUES
(1, '060715_173044.jpg', 'TW271450'),
(2, '070715_131922.png', 'TW513273'),
(3, '070715_174306.PNG', 'TW805431'),
(4, '080715_023423.gif', 'TW165334'),
(5, '080715_025826.jpg', 'TW828737'),
(6, '080715_122859.jpg', 'TW758330'),
(7, '080715_154121.jpg', 'TW445756'),
(8, '090715_050448.jpg', 'TW553932'),
(9, '090715_050721.JPG', 'TW103750'),
(10, '090715_051533.png', 'TW907740'),
(11, '090715_125451.jpg', 'TW506719'),
(12, '190715_124213.PNG', 'TW705753');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_orderdetail` FOREIGN KEY (`o_id`) REFERENCES `orders` (`o_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
