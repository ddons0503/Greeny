-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2025 at 03:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_greeny_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `admin_id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`admin_id`, `email`, `password`, `profile_pic`, `last_login`) VALUES
(1, 'greenyagro@gmail.com', 'e3f29dfb6600d5399f96cc49cd2ca67ff301a3f6406e4707f37bb2c4616a5cf390332d51ab7099db0ff75c79a55f313be022cb7960a4837d40018c5d37870fbe3TuWHJwMP0SyW8alXSVk9NF5AclLWv8CASqmfrLbd6U=', 'admin_assets/images/profile.jpg', '2025-09-10 11:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `banner_id` int(5) NOT NULL,
  `path` varchar(2000) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(100) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`banner_id`, `path`, `title`, `subtitle`, `status`) VALUES
(1, 'assets/banner/d0c10a45866601823dcc6112b95b9d65.jpg', 'greeny', 'Transforming the Future of Farmers', 1),
(2, 'assets/banner/2cc69240af4bf2ce5c7a0fe969531c89.jpg', 'greeny', 'Transforming the Future of Farmers', 1),
(3, 'assets/banner/17825498fb9a8bdeecc2d37ebd2aeb76.jpg', 'greeny', 'Transforming the Future of Farmers', 1),
(4, 'assets/banner/7b8272c1118275fd55bd6ac76d4f356d.jpg', 'greeny', 'Transforming the Future of Farmers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill`
--

CREATE TABLE `tbl_bill` (
  `bill_id` int(5) NOT NULL,
  `register_id` int(5) NOT NULL,
  `shipment_id` int(5) NOT NULL,
  `promocode_id` int(5) NOT NULL,
  `bill_date` date NOT NULL,
  `amount` int(5) NOT NULL,
  `pay_type` varchar(20) NOT NULL,
  `payment_id` varchar(200) NOT NULL,
  `order_id` varchar(2000) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bill`
--

INSERT INTO `tbl_bill` (`bill_id`, `register_id`, `shipment_id`, `promocode_id`, `bill_date`, `amount`, `pay_type`, `payment_id`, `order_id`, `status`) VALUES
(31, 23, 16, 1, '2025-09-24', 1698, 'cod', '', 'SI_202509241758688768', 1),
(32, 23, 16, 3, '2025-09-26', 1075, 'cod', '', 'SI_202509261758863467', 1),
(33, 23, 16, 3, '2025-09-27', 1000, 'cod', '', 'SI_202509271758951912', 1),
(34, 23, 16, 1, '2025-09-27', 2000, 'cod', '', 'SI_202509271758952095', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(5) NOT NULL,
  `register_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `image_id` int(5) NOT NULL,
  `price` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `total_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `register_id`, `product_id`, `image_id`, `price`, `qty`, `total_price`) VALUES
(29, 17, 102, 243, 900, 1, 900),
(30, 19, 101, 240, 500, 1, 500),
(31, 22, 99, 235, 499, 1, 499),
(32, 22, 98, 233, 255, 1, 255);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_id` int(5) NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `name`, `parent_id`, `label`) VALUES
(1, 'SEEDS', 0, 'main category'),
(2, 'HORTICULTURE', 1, 'sub category'),
(3, 'FIELD CROPS', 1, 'sub category'),
(4, 'FLOWER SEEDS', 2, 'peta category'),
(5, 'VEGETABLE SEEDS', 2, 'peta category'),
(6, 'FRUITS', 2, 'peta category'),
(7, 'PADDY', 3, 'peta category'),
(8, 'MUSTARD', 3, 'peta category'),
(9, 'JOWAR', 3, 'peta category'),
(10, 'SPECIAL CATEGORIES', 1, 'sub category'),
(11, 'EXOTICS', 10, 'peta category'),
(12, 'POLYHOUSE', 10, 'peta category'),
(13, 'FORAGES', 10, 'peta category'),
(15, 'CROP PROTECTION', 0, 'main category'),
(16, 'CHEMICALS', 15, 'sub category'),
(17, 'BIO ORGANICS', 15, 'sub category'),
(20, 'INSECTICIDES', 16, 'peta category'),
(21, 'FUNGICIDES', 16, 'peta category'),
(22, 'HERBICIDES', 16, 'peta category'),
(23, 'BIO INSECTICIDES', 17, 'peta category'),
(24, 'BIO FUNGICIDES', 17, 'peta category'),
(25, 'BIO NEMATICIDES', 17, 'peta category'),
(32, 'FARM IMPLEMENTS', 29, 'peta category'),
(33, 'FARM MACHINERIES', 29, 'peta category'),
(34, 'IRRIGATION KITS', 29, 'peta category'),
(35, 'SOLAR INSECT TRAPS', 30, 'peta category'),
(36, 'SOLAR LIGHT TRAPS', 30, 'peta category'),
(37, 'SOLAR DRYERS', 30, 'peta category'),
(38, 'CHAFF CUTTERS', 31, 'peta category'),
(39, 'TARPAULINS', 31, 'peta category'),
(40, 'CROP NUTRITION', 0, 'main category'),
(41, 'GROWTH PROMOTERS', 40, 'sub category'),
(42, 'BIO FERTILIZERS', 40, 'sub category'),
(50, 'PROMOTERS', 41, 'peta category'),
(51, 'FERTILIZERS', 42, 'peta category');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `contact_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`contact_id`, `name`, `email`, `mobile`, `subject`, `message`) VALUES
(1, 'Dhruvik', 'dhruvikmaru18@gmail.com', '9316082841', 'good', 'thank you'),
(2, 'Dhruvik', 'dhruvikmaru18@gmail.com', '9316082841', 'good', 'thank you');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_subscriber`
--

CREATE TABLE `tbl_email_subscriber` (
  `subscriber_id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_email_subscriber`
--

INSERT INTO `tbl_email_subscriber` (`subscriber_id`, `email`) VALUES
(1, 'dhruvikmaru18@gmail.com'),
(2, 'kunj.koladiya1972@gmail.com'),
(3, 'sunnysorathiya7@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `name`, `message`) VALUES
(1, 'Dhruvik', 'I like this site due to easy to understand and this will give us a good expeirens in the farming site and also give us a good amount of knowladge on the farming secter ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `location_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_id` int(5) NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`location_id`, `name`, `parent_id`, `label`) VALUES
(1, 'India', 0, 'country'),
(2, 'Canada', 0, 'country'),
(3, 'France', 0, 'country'),
(4, 'United State of America', 0, 'country'),
(5, 'Russia', 0, 'country'),
(6, 'China', 0, 'country'),
(7, 'Japan', 0, 'country'),
(8, 'Sri Lanka', 0, 'country'),
(9, 'Bangladesh', 0, 'country'),
(10, 'South Korean', 0, 'country'),
(11, 'Germany', 0, 'country'),
(12, 'Finland', 0, 'country'),
(13, 'Gujarat', 1, 'state'),
(15, 'Maharashtra', 1, 'state'),
(16, 'Delhi', 1, 'state'),
(17, 'Punjab', 1, 'state'),
(18, 'Madhya Pradesh', 1, 'state'),
(19, 'Vancouver', 2, 'state'),
(20, 'Columbia', 2, 'state'),
(21, 'Manitoba', 2, 'state'),
(22, 'Ontario', 2, 'state'),
(23, 'Corsica', 3, 'state'),
(24, 'Grand Est', 3, 'state'),
(25, 'Paris', 3, 'state'),
(26, ' California', 4, 'state'),
(27, ' Texas', 4, 'state'),
(28, 'Florida', 4, 'state'),
(29, 'Washington', 4, 'state'),
(30, 'Massachusetts', 4, 'state'),
(31, 'Indiana', 4, 'state'),
(32, 'Altai Territory', 5, 'state'),
(33, 'Arkhangelsk', 5, 'state'),
(34, 'Fujian', 6, 'state'),
(35, 'Sichuan', 6, 'state'),
(36, 'Zhejiang', 6, 'state'),
(37, 'Shaanxi', 6, 'state'),
(38, 'Hong Kong', 6, 'state'),
(39, 'Shanghai', 6, 'state'),
(40, 'Beijing', 6, 'state'),
(41, 'Okinawa', 7, 'state'),
(42, 'Shizuoka', 7, 'state'),
(43, 'Ampara', 8, 'state'),
(44, 'Dhaka', 9, 'state'),
(45, 'Chungcheong', 10, 'state'),
(46, 'Jeolla', 10, 'state'),
(47, 'Gyeongsang', 10, 'state'),
(48, 'Berlin', 11, 'state'),
(49, 'Bavaria', 11, 'state'),
(50, 'Saxony', 11, 'state'),
(51, 'Bremen', 11, 'state'),
(52, 'Lower Saxony', 11, 'state'),
(53, 'Lapland', 12, 'state'),
(54, 'Uttar Pradesh', 1, 'state'),
(55, 'Karnataka', 1, 'state'),
(56, 'Surat', 13, 'city'),
(57, 'Ahmedabad', 13, 'city'),
(58, 'Valsad', 13, 'city'),
(59, 'Bhavnagar', 13, 'city'),
(60, 'Navsari', 13, 'city'),
(61, 'Vapi', 13, 'city'),
(62, 'Vadodara', 13, 'city'),
(63, 'Rajkot', 13, 'city'),
(64, 'Bharuch', 13, 'city'),
(65, 'Godhra', 13, 'city'),
(66, 'Morbi', 13, 'city'),
(67, 'Mumbai', 15, 'city'),
(68, 'Ulhasnagar', 15, 'city'),
(69, 'Nashik', 15, 'city'),
(70, 'Pune', 15, 'city'),
(71, 'Nagpur', 15, 'city'),
(72, 'Aurangabad', 15, 'city'),
(73, 'Amravati', 15, 'city'),
(74, 'Siri', 16, 'city'),
(75, 'Tughlqabad', 16, 'city'),
(76, 'Firozobad', 16, 'city'),
(77, 'Shahjahanabad', 16, 'city'),
(78, 'Purana Qila', 16, 'city'),
(79, ' Amritsar', 17, 'city'),
(80, 'Ludhiana', 17, 'city'),
(81, 'Bathinda', 17, 'city'),
(82, 'Hoshiarpur', 17, 'city'),
(83, 'Patiala', 17, 'city'),
(84, 'Bhopal', 18, 'city'),
(85, ' Indore', 18, 'city'),
(86, 'Gwalior', 18, 'city'),
(87, ' Ujjain', 18, 'city'),
(88, ' Jabalpur', 18, 'city'),
(89, ' Ratlam', 18, 'city'),
(90, 'Chhindwara', 18, 'city'),
(91, 'Guna', 18, 'city'),
(92, 'Lucknow', 54, 'city'),
(93, ' Varanasi', 54, 'city'),
(94, 'Noida', 54, 'city'),
(95, 'Prayagraj', 54, 'city'),
(96, ' Kanpur', 54, 'city'),
(97, ' Rampur', 54, 'city'),
(98, 'Bengaluru', 55, 'city'),
(99, ' Davanagere', 55, 'city'),
(100, ' Vijayapura', 55, 'city'),
(101, 'Kalaburagi', 55, 'city'),
(102, ' Mangaluru', 55, 'city'),
(103, ' Belagavi', 55, 'city'),
(104, 'Ballari', 55, 'city'),
(105, ' Kolar', 55, 'city'),
(106, 'Jamnagar', 13, 'city'),
(107, ' Porbandar', 13, 'city');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer`
--

CREATE TABLE `tbl_offer` (
  `offer_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rate` int(5) NOT NULL,
  `min_price` int(5) NOT NULL,
  `max_price` int(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `category_id` int(5) NOT NULL,
  `status` int(5) NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_offer`
--

INSERT INTO `tbl_offer` (`offer_id`, `name`, `rate`, `min_price`, `max_price`, `start_date`, `end_date`, `category_id`, `status`, `label`) VALUES
(1, 'holi100', 10, 10, 1000, '2023-03-28', '2023-03-30', 18, 0, 'peta category'),
(2, 'sun', 10, 100, 1000, '2023-03-28', '2023-03-30', 2, 0, 'main category'),
(3, 'mon10', 10, 10, 100, '2023-03-29', '2023-04-05', 0, 0, 'all'),
(4, 'qwe1', 10, 100, 1000, '2023-04-10', '2023-04-14', 17, 0, 'peta category'),
(5, 'qwe1', 10, 100, 1000, '2023-04-10', '2023-04-14', 17, 0, 'peta category');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(5) NOT NULL,
  `main_id` int(5) NOT NULL,
  `sub_id` int(5) NOT NULL,
  `peta_id` int(5) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `specification` varchar(2000) NOT NULL,
  `status` int(5) NOT NULL,
  `offer_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `main_id`, `sub_id`, `peta_id`, `code`, `name`, `description`, `specification`, `status`, `offer_id`) VALUES
(15, 1, 2, 4, 'P10108', 'farmgokart |2 Packets of MARIGOLD-AFRICAN ORANGE Flower Seeds|Home & Terrace Gardening Seed (100 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>African Marigold bears flowers with double set of rows of petals in bright orange shades, making the flower wonderfully fluffy. These flowers are taller tha', '<p><strong>GENERAL</strong></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>farmgokart</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Model Name</p>\r\n			</td>\r\n			<td>\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<td>\r\n						<p>2 Packets of MARIGOLD-AFRICAN ORANGE Flower Seeds</p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<p>100 per packet</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<p>|2 Packets of MARIGOLD-AFRICAN ORANGE Flower Seeds|Home &amp; Terrace Gardening</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flowering Plant</td>\r\n			<td>\r\n			<p>Yes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<p>Outdoor</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<p>Flower</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 0),
(16, 1, 2, 5, 'P10109', 'RED JEWEL CABBAGE', '<h1><strong>Description</strong></h1>\r\n\r\n<p>Red Jewel is&nbsp;<strong>an early maturing hybrid, maturing at around 90 days from sowing</strong>. Red Jewel is a medium to big cabbage but can also be us', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Variety name</strong></td>\r\n			<td>JEWEL</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Type</strong></td>\r\n			<td><strong>&nbsp;</strong>F1 hybrid fresh market cabbage (Brassica oleracea L. convar. capitata (L.) Alef. var. capitata (L.) Alef.)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Maturity</strong></td>\r\n			<td>Medium (large heads: around 80 &ndash; 90 days from transplanting)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Head Size</strong></td>\r\n			<td>Medium large&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Head shape</strong></td>\r\n			<td>Round</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Head weight</strong></td>\r\n			<td>2.0 &ndash; 3.5 kg (could be bigger depending on spacing)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>HEAD COVER</strong></td>\r\n			<td>Very good</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Exterior colour</strong></td>\r\n			<td>Deep red</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Interior colour</strong></td>\r\n			<td>Purple, red and white</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Flavour</strong></td>\r\n			<td>Very good</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Plant size</strong></td>\r\n			<td>Medium large</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Plant habit</strong></td>\r\n			<td>Semi-erect</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Bolting reaction</strong></td>\r\n			<td>Resists premature bolting</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Field holding</strong></td>\r\n			<td>\r\n			<p>Excellent</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Yield potential</strong></td>\r\n			<td>Very good</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Suggested population</strong></td>\r\n			<td>30 000 &ndash; 55 000 plants per ha and for small 80000 and more</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Use</strong></td>\r\n			<td>Fresh market, novelty, pre-packing and shipping</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(17, 1, 2, 6, 'P101010', 'NS 295 F1 HYBRID WATERMELON SEEDS, RIND TYPE LIGHT GREEN RIND WITH DARK GREEN STRIPES', '<h1><strong>Description</strong></h1>\r\n\r\n<p>100% Organic &amp; Natural Watermelon Seeds::Benefits of Watermelon: Prevents Asthma &amp; Dehydration, Helps for Growth of all bodily tissues, including Sk', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>namdhari seeds</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hybrid type</td>\r\n			<td>Oval To Oblong Type Hybrids</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Relative days to maturity (DS)</td>\r\n			<td>80-85</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Rind Pattern</td>\r\n			<td>jubilee-light green with light green stripes</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fruit size (kg)</td>\r\n			<td>&nbsp;9-12</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fruit shape&nbsp;</td>\r\n			<td>&nbsp;oblong</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flesh texture</td>\r\n			<td>good</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sweetness TSS (%)</td>\r\n			<td>11-12</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Remarks</td>\r\n			<td>very good shipper, wide adaptability</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Recommended for</td>\r\n			<td>&nbsp;India</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Season&nbsp;&nbsp;</td>\r\n			<td>Kharif, Rabi and Summer&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(18, 1, 3, 7, 'P101011', 'Rasi hybrid paddy Rasi 333 hybrid paddy, 333 paddy, Rhr 333 hybrid paddy Seed (3 kg)Be the first to Review this product', '<h1><strong>Description</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Seed Type: Tree, Grass, Vegetable, Herb</li>\r\n	<li>Suitable For: Outdoor</li>\r\n	<li>Organic Plant Seed</li>\r\n	<li>Seed For: Rasi 33', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<p>Rasi hybrid paddy</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<p>Rhr 333</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<p>3 kg</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>common name</td>\r\n			<td>\r\n			<p>Rasi 333 hybrid paddy, 333 paddy, Rhr 333 hybrid paddy</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<p>Outdoor</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<p>Tree, Grass, Vegetable, Herb</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<p>Yes</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(19, 1, 3, 8, 'P101012', 'PIONEER 45S46 MUSTARD SEEDS', '<h1><strong>Description</strong></h1>\r\n\r\n<p><strong>Spacing, Planting depth, Seed Rate &amp; Plant Population:</strong></p>\r\n\r\n<p>Sowing at a depth of 3-5 cms adjust the depth based on the soil moistu', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Time of application</strong></td>\r\n			<td>Urea</td>\r\n			<td>DAP</td>\r\n			<td>SSP</td>\r\n			<td>MOP</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>At the time of sowing</strong></td>\r\n			<td>25</td>\r\n			<td>50</td>\r\n			<td>150</td>\r\n			<td>40</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>25 &ndash; 30 DAYS</strong></td>\r\n			<td>45</td>\r\n			<td>&nbsp; &nbsp; -</td>\r\n			<td>&nbsp; &nbsp; &nbsp;-&nbsp;&nbsp;</td>\r\n			<td>&nbsp; &nbsp; &nbsp; &nbsp;-</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Total</strong></td>\r\n			<td>70</td>\r\n			<td>50</td>\r\n			<td>150</td>\r\n			<td>40</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 0),
(20, 1, 3, 9, 'P101013', 'PRODUCER PREMIUM JOWAR SEEDS (Sorghum)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>Jowar is rich in good quality fibre which can aid digestion, manage obesity and regulate blood sugar levels. Besides it has complex carbohydrates, which tak', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<p>PRODUCER</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<p>PREMIUM JOWAR SEEDS (Sorghum), 1kg</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type</td>\r\n			<td>\r\n			<p>Sorghum</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<p>1 KG</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum Shelf Life</td>\r\n			<td>\r\n			<p>6 month</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Is Perishable</td>\r\n			<td>\r\n			<p>no</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<p>no</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Polished</td>\r\n			<td>\r\n			<p>no</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 0),
(21, 1, 10, 11, 'P101014', 'farmgokart |2 PACKETS OF CAULIFLOWER SEEDS|Quality Vegetable Seeds Pouch|Home Gardening Seed (100 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>LARGE FRAME WITH ERECT GREEN LEAVES WIDE ADAPTIBILITY FROM TROPICS TO SUBTROPICS AV WT .8-1.5 KG DEPENDING UPON SOWING TIME READY 60 65 DAYS AFTER PLANTING ', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<p>farmgokart</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<p>2 PACKETS OF CAULI FLOWER</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>2 PACKETS OF CAULIFLOWER SEEDS|Quality Vegetable Seeds Pouch|Home Gardening</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flowering Plant</td>\r\n			<td>no</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<p>Outdoor</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<p>Vegetable</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<p>Yes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sowing Method</td>\r\n			<td>\r\n			<p>TRANSPLANT</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(22, 1, 10, 12, 'P101015', 'SARPAN HYBRID SEEDS SARPAN F1 CHILLI DEEPA-10 GMS Seed', '<h1><strong>Description</strong></h1>\r\n\r\n<p>A cayenne type F1 hybrid chilli suitable for dual purpose green fresh and dry red. Plants are tall 90-100 cm compact, prolific bearer and high yielding. Fru', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<p>SARPAN HYBRID SEEDS</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<p>SARPAN F1 CHILLI DEEPA</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<p>SARPAN F1 CHILLI DEEPA-10 GMS</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flowering Plant</td>\r\n			<td>\r\n			<p>yes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<p>Outdoor</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<p>Vegetable</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<p>yes</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(23, 1, 10, 13, 'P101016', 'IAgriFarm CoFS31 Fodder Sorghum Seed', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Seed Type: Grass</li>\r\n	<li>Suitable For: Outdoor</li>\r\n	<li>Organic Plant Seed</li>\r\n	<li>Seed For: CoFS31 Fodder Sorghum</li>\r\n</ul>\r\n', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<p>IAgriFarm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<p>CoFS31 Fodder Sorghum/Jowar seeds (Multicut/Perennial) Pack of 100 grms</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<p>CoFS31 Fodder Sorghum</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<p>Outdoor</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<p>Grass</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<p>Yes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<p>500 gm</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 0),
(24, 15, 16, 20, 'P101017', 'MMR Recker Fly Killer Insect Bait 1KG Pack', '<h1><strong>Description</strong></h1>\n\n<p>These granules are highly effective for long persistent effect and fly killer repellent for home. This fly killer granules contains natural attractant and h', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<p>MMR</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<p>Recker Fly Killer Insect Bait 1KG Pack</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type</td>\r\n			<td>\r\n			<p>Bait</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<p>No</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Container Type</td>\r\n			<td>\r\n			<p>Plastic Bottle</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Protects Against</td>\r\n			<td>\r\n			<p>Flies, Cockroaches</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Effective Duration</td>\r\n			<td>12</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Usage Instruction</td>\r\n			<td>\r\n			<p>Just drop some granules on paper and sprinkle drops of water over it and see the effect.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 0),
(25, 15, 16, 21, 'P101018', 'Tata Blitox (Copper Oxychloride 50% WP) Rallis Fungicide 500gm Pack', '<h1>Description</h1>\r\n\r\n<ul>\r\n	<li>Copper Oxychloride 50% WP</li>\r\n	<li>Tata Blitox Fungicide</li>\r\n	<li>Very effective fungicide for the control of diseases on field, horticulture and plantation</li>', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>500 grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>number of items</td>\r\n			<td>1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>components included</td>\r\n			<td>Copper Oxychloride 50% WP Fungicide</td>\r\n		</tr>\r\n		<tr>\r\n			<td>part number</td>\r\n			<td>500g Pack</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand Name</td>\r\n			<td>Generic</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(26, 15, 16, 22, 'P101019', 'Arya Bio Balada Seaweed Manure Combo (100ml+250gms), Growth Promoter, (Liquid) Manure (0.3 kg, Granules)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>Plant growth promoter This is a biotechnology research product developed by us. It is manufactured by innovative process. Specific variety of seaweed extrac', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<p>Arya Bio</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<p>Balada Seaweed Manure Combo (100ml+250gms), Growth Promoter, (Liquid)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Used For</td>\r\n			<td>\r\n			<p>Garden, Soil manure, Gardening, Farm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type</td>\r\n			<td>\r\n			<p>Manure</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Form Factor</td>\r\n			<td>\r\n			<p>Granules</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Container Type</td>\r\n			<td>\r\n			<p>BAG</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 0),
(27, 1, 2, 4, 'P101020', 'Nutiva Sunflower Seeds Seed ', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Seed Type: Flower</li>\r\n	<li>Suitable For: Indoor</li>\r\n	<li>Seed For: Sunflower Seeds</li>\r\n	<li>Quantity: 1 kg</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>Nutiva</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Raw Sunflower Seeds</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>1 kg</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Sunflower Seeds</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flowering Plant</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Indoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Flower</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Family</td>\r\n			<td>\r\n			<ul>\r\n				<li>Sunflower</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 0),
(28, 1, 2, 4, 'P101021', 'Greenery Hub Lotus Seed  (20 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Seed Type: Flower</li>\r\n	<li>Suitable For: Indoor, Outdoor</li>\r\n	<li>Organic Plant Seed</li>\r\n	<li>Seed For: Lotus</li>\r\n	<li>Quantity: 20 per pack', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>Greenery Hub</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>LOTUSSEEDSS</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>20 per packet</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Lotus</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Indoor, Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Flower</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(29, 1, 2, 4, 'P101022', 'JSR Organics Kamal Seed  (20 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Real Bonsai Lotus Seeds - lets you grow your very own Lotus flowers indoors. Growing your own Lotus flowers at home or at the office brings', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>JSR Organics</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Premium Bonsai Lotus Flower Seeds</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>20 per packet</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Kamal</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flowering Plant</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Indoor, Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Flower</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(30, 1, 2, 4, 'P101023', 'VibeX Rose Seed  (30 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>PLANTING INSTRUCTIONS:Even though this Plant can tolerate light shade in warmer regions, these plants still prefer full sunlight. The best ', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>VibeX</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>UK-239-Exotic Rose Flower Seeds Combo - Black Dragon, Yellow, Green, Red</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>30 per packet</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Rose</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flowering Plant</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Indoor, Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Flower</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Soil Nutrient Requirements</td>\r\n			<td>\r\n			<ul>\r\n				<li>Ideally plant in loamy soil and try to keep the ph of your soil between the range of 6.1 and 6.5 as likes to be in mildly acidic soil</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(31, 1, 2, 5, 'P101024', 'Qualtivate ® Seeds Black Tomato F1 Hybrid Heirloom Seed  (250 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>This tomato has supreme shock value as well as a good sweet tomato flavour! The unripe green fruit becomes purple, brought on by sunlight, and will eventual', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>Qualtivate</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Seeds Black Tomato F1 Hybrid Heirloom</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>250 per packet</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>&reg; Seeds Black Tomato F1 Hybrid Heirloom</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flowering Plant</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Indoor, Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Vegetable</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Scientific Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Tomato</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Uses</td>\r\n			<td>\r\n			<ul>\r\n				<li>Vegetables</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(32, 1, 2, 5, 'P101025', 'MASHKI Hybrid American Sweet Corn Seeds For Farming At Home/Lawns/Gardens Seed  (20 g)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>MASHKI Brings to you the Best Quality of American Sweeet Corn Seeds for farming. Sweet Corn Seeds for Planting at home has germination rate upto 80%. These ', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>MASHKI</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>American Sweet Corn Seeds</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>20 g</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Hybrid American Sweet Corn Seeds For Farming At Home/Lawns/Gardens</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flowering Plant</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Indoor, Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Vegetable</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(33, 1, 2, 5, 'P101026', 'Japura Long Bottle Gourd Seeds for Home Garden Seed  (20 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Seed Type: Vegetable</li>\r\n	<li>Suitable For: Outdoor</li>\r\n	<li>Organic Plant Seed</li>\r\n	<li>Seed For: Long Bottle Gourd Seeds for Home Garden</li', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>Japura</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>bottle gourd</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>20 per packet</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Long Bottle Gourd Seeds for Home Garden</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Vegetable</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(34, 1, 2, 5, 'P101027', 'AGRO MILL PREMIUM QUALITY PEAS/PEA/MATAR SEEDS FOR KITCHEN GARDEN Seed  (25 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Green peas are used to create plant protein due to its high protein content and added nutrients that give value to the plant protein powder', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>AGRO MILL</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>NEW-51</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>25 per packet</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>PREMIUM QUALITY PEAS/PEA/MATAR SEEDS FOR KITCHEN GARDEN</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Vegetable</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(35, 1, 2, 5, 'P101028', 'WILLVINE Hybrid Cabbage Beauty Ball Seeds Seed  (200 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>PLANTING INSTRUCTIONS Start cabbage seeds indoors 6 to 8 weeks before the final spring freeze. Harden off plants over the course of a week.', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>WILLVINE</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Hybrid Cabbage Beauty Ball Seeds-200 Seeds</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>200 per packet</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Hybrid Cabbage Beauty Ball Seeds</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Indoor, Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Vegetable</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Uses</td>\r\n			<td>\r\n			<ul>\r\n				<li>Vegetable</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Soil Nutrient Requirements</td>\r\n			<td>\r\n			<ul>\r\n				<li>Nitrogen, Phosphorus, Potassium</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(36, 1, 2, 6, 'P101029', 'STOKIYA lunar f1 hybrid veriety papaya seed 200 seeds Seed', '<h1><strong>Description</strong></h1>\n\n<p>Prepare soil mixed with organic manure or compost before sowing the seeds after all frost and check soil is clean from any weed or insect open the seed pack', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>STOKIYA</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>orginal lunar f1 hybrid papaya seed 200 seeds</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>2 per packet</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>lunar f1 hybrid veriety papaya seed 200 seeds</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Fruit</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(37, 1, 2, 6, 'P101030', 'SIDDHARTH FISH FARM DRAGON FRUIT Seed  (299 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>SHIDDHARTH FISH FARM Dragon fruit may look exotic, but its flavors are similar to other fruits. Its taste has been described as a slightly sweet cross between a kiwi and a pear. Dragon fruit is a tropical fruit native to Mexico and Central America. Its taste is like a combination of a kiwi and a pear.</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>SIDDHARTH FISH FARM</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>SU00100</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>299 per packet</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>DRAGON FRUIT</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Indoor, Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Fruit</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(38, 1, 2, 6, 'P101031', 'Ravel African Mahogany 25 Gram Tree Seeds For Planting, Swetania Mahogany Tree Seed Seed  (75 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Swietenia mahagoni is evergreen to semi-evergreen tree, up to 30-35 m tall high. It has potential use for large scale timber production plantations, especially in dry areas, due to the excellent timber quality. It is also used in agroforestry, for soil improvement and as an ornamental. Pretreatment of the Seeds : Generally not necessary but germination of stored low moisture content seed may be enhanced by soaking in water for 12 hours. .Nursery technique of the seeds: The seeds are sown in a bed of light sand in 3-7 cm deep furrows or holes or directly in containers. Germinating seeds should be under shade and kept moist. Seeds will germinate in 10-21 days. The seedlings are kept under shade until out planting. The seedlings can be planted in the field when they are about 50-100 cm tall.</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>Ravel</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>African Mahogany (25 G) Tree Seeds For Planting, Swetania Mahogany Tree Seed</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>75 per packet</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>African Mahogany 25 Gram Tree Seeds For Planting, Swetania Mahogany Tree Seed</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flowering Plant</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Herb</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Uses</td>\r\n			<td>\r\n			<ul>\r\n				<li>Skyfruit is extremely bitter, so use gloves to peel.Eat half of the seed if your sugar level is below 200 and take full seed if your sugar level is above 200. Take it early morning, immediately after brushing your teeth., Must not be consumed too much in one day. In case of some major diseases must be used in consultant with your doctor., Use for Medicine - Diabetes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Soil Nutrient Requirements</td>\r\n			<td>\r\n			<ul>\r\n				<li>Mixed Fertile Soil</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sowing Method</td>\r\n			<td>\r\n			<ul>\r\n				<li>Direct Sowing</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(39, 1, 2, 6, 'P101032', 'Vrisa Green MORUS ALBA SAHTOOT Seed  (100 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Seed Type: Fruit</li>\r\n	<li>Suitable For: Indoor, Outdoor</li>\r\n	<li>Organic Plant Seed</li>\r\n	<li>Seed For: MORUS ALBA SAHTOOT</li>\r\n	<li>Quantity: 100 per packet</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>Vrisa Green</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>shtuttvrisa</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>100 per packet</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>MORUS ALBA SAHTOOT</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Indoor, Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Fruit</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(40, 1, 2, 6, 'P101033', 'SIDDHARTH FISH FARM STRAWBERRY SEEDS Seed  (151 per packet)', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Seed Type: Fruit</li>\r\n	<li>Suitable For: Outdoor</li>\r\n	<li>Organic Plant Seed</li>\r\n	<li>Seed For: STRAWBERRY SEEDS</li>\r\n	<li>Quantity: 151 per packet</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>SIDDHARTH FISH FARM</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>SAS413</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>151 per packet</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>STRAWBERRY SEEDS</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flowering Plant</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Fruit</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(41, 1, 3, 7, 'P101034', 'Sakshi Farms Pusa Basmati Sugandha 5, Rice Seeds for Sowing, Farming & Agriculture, 5 KG Seed  (5 kg)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>Pusa Sugandh 5 (Pusa 3A/ Haryana Basmati) is a semi-dwarf, high-yielding, and aromatic basmati rice variety suitable for multiple cropping systems in North India. It has extra-long grains and excellent cooking quality. It possesses tolerance to shatter while it is highly sensitive to reproductive stage salinity. HOW TO USE : - Make a cloth pouch or bag and place coated seeds in it and tie it properly. Maintain moisture of bag by sprinkling water on it when required. When seeds get germinated, they are ready for sowing. Make nursery bed and sow germinated seeds in that. After 25 days transplant seedlings. Add 1 gm stroptocycline in this mixture. Add seeds in this mixture and rest for 24 hours. Make a cloth pouch or bag and place these treated seeds in it and tie it properly.</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>Sakshi Farms</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Sugandha</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>5 kg</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Pusa Basmati Sugandha 5, Rice Seeds for Sowing, Farming &amp; Agriculture, 5 KG</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flowering Plant</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Herb</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Family</td>\r\n			<td>\r\n			<ul>\r\n				<li>Pusa Basmati Sughandha 5</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Scientific Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Paddy</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Uses</td>\r\n			<td>\r\n			<ul>\r\n				<li>Seeds</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(42, 1, 3, 7, 'P101035', 'PRO SEEDS Paddy Seed Pusa Basmati Pb 1692 Seed  (1 kg)', '<h1><strong>Description</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pusa Basmati 1692 is an early maturing Basmati rice variety with a seed to seed maturity of 110-115 days with a very high yield It possess semi-dwarf, non-lodging and non-shattering habit. Owing to its early maturity it can help timely harvest of paddy crop in the Basmati growing region, which can help providing sufficient time for after-harvest operations. Timely clearing of fields will also help in reducing the environmental pollution and help in timely sowing of the succeeding wheat crop in the Basmati GI area.</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>PRO SEEDS</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>pb16921kg</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>1 kg</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Common Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>Paddy Seed Pusa Basmati Pb 1692</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flowering Plant</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suitable For</td>\r\n			<td>\r\n			<ul>\r\n				<li>Outdoor</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Seed</td>\r\n			<td>\r\n			<ul>\r\n				<li>Vegetable</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Family</td>\r\n			<td>\r\n			<ul>\r\n				<li>BASMATI RICE</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(43, 1, 3, 7, 'P101036', 'Black Rice Rarest Manipuri Paddy Seeds - 1 kg', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Medium-duration paddy crop with a height of approx. 4-4.5 feet</li>\r\n	<li>Produces 12-15 quintal per acre on average</li>\r\n	<li>Gluten-free super food rich in fibre, vitamins and antioxidants</li>\r\n	<li>Cooked as rice or kheer</li>\r\n	<li>Value added products can be rice flour, suji, syrup, chocolate, beer, wine, cake, bread, ladoo, other sweetened food and cosmetic items.</li>\r\n</ul>\r\n\r\n<h1>&nbsp;</h1>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Apni Maati</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Gluten Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Number of Items</td>\r\n			<td>1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Units</td>\r\n			<td>1000.0 gram</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Weight</td>\r\n			<td>1 Kilograms</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(44, 1, 3, 8, 'P101037', 'MINIMALL SUPER MARKET Organic Small Mustard Seed(Rai)  ', '<h1><strong>Description</strong></h1>\r\n\r\n<p>It is pertinent to note that, actual product packaging and materials may contain more and/or different information which may include nutritional information/allergen declaration/special instruction for intended use/warning/directions etc. We recommend the consumers to always read the label carefully before using or consuming any products. Please do not solely rely on the information provided on this website. For additional information, please contact the manufacturer.</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>MINIMALL SUPER MARKET</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type</td>\r\n			<td>\r\n			<ul>\r\n				<li>Mustard Seed</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Form Factor</td>\r\n			<td>\r\n			<ul>\r\n				<li>Whole</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>500 g</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Container Type</td>\r\n			<td>\r\n			<ul>\r\n				<li>Pouch</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Gourmet</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Added Preservatives</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum Shelf Life</td>\r\n			<td>\r\n			<ul>\r\n				<li>12 Months</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>Yes</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ingredients</td>\r\n			<td>\r\n			<ul>\r\n				<li>Mustard Seed(Rai)</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nutrient Content</td>\r\n			<td>\r\n			<ul>\r\n				<li>NA</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(45, 1, 3, 8, 'P101038', 'Sk foods Mustard seed,mohari,Rai', '<h1><strong>Description</strong></h1>\r\n\r\n<p>It is pertinent to note that, actual product packaging and materials may contain more and/or different information which may include nutritional information/allergen declaration/special instruction for intended use/warning/directions etc. We recommend the consumers to always read the label carefully before using or consuming any products. Please do not solely rely on the information provided on this website. For additional information, please contact the manufacturer.</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>Sk foods</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type</td>\r\n			<td>\r\n			<ul>\r\n				<li>Mustard seed</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Form Factor</td>\r\n			<td>\r\n			<ul>\r\n				<li>Whole</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>200 g</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Container Type</td>\r\n			<td>\r\n			<ul>\r\n				<li>Pouch</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Gourmet</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Added Preservatives</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum Shelf Life</td>\r\n			<td>\r\n			<ul>\r\n				<li>3 Months</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ingredients</td>\r\n			<td>\r\n			<ul>\r\n				<li>NA</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nutrient Content</td>\r\n			<td>\r\n			<ul>\r\n				<li>Mustard seeds per 100grm Saturated fat 2 g Trans fat regulation 0 g Cholesterol 0 mg Sodium 13 mg Potassium 738 mg Total Carbohydrate 28 g Dietary fiber 12 g Sugar 7 g Protein 26 g</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ready Masala</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(46, 1, 3, 8, 'P101039', 'AGRI CLUB Sarso, Rai', '<h1><strong>Description</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Black mustard or Rai is a commonly used spice used in preparing various curries, pickles and condiments. They have a characteristic nutty flavour that releases while cooking seeds in ghee/oil. They have high amount of fatty oil, mainly oleic acid. Black mustard oil is used for the common cold, painful joints and muscles , and arthritis.</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>AGRI CLUB</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type</td>\r\n			<td>\r\n			<ul>\r\n				<li>Mustard Seed</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Form Factor</td>\r\n			<td>\r\n			<ul>\r\n				<li>Whole</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>200 g</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Container Type</td>\r\n			<td>\r\n			<ul>\r\n				<li>Pouch</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dietary Preference</td>\r\n			<td>\r\n			<ul>\r\n				<li>Gluten Free</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Gourmet</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Added Preservatives</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum Shelf Life</td>\r\n			<td>\r\n			<ul>\r\n				<li>12 Months</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cuisine</td>\r\n			<td>\r\n			<ul>\r\n				<li>Indian</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ingredients</td>\r\n			<td>\r\n			<ul>\r\n				<li>Mustard seed</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Caloric Value</td>\r\n			<td>\r\n			<ul>\r\n				<li>50 cal||kcal</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Regional Speciality</td>\r\n			<td>\r\n			<ul>\r\n				<li>Rajasthani</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Manufactured By</td>\r\n			<td>\r\n			<ul>\r\n				<li>Shri Hari Industries, F-103, Bichwal Ind. Area, Bikaner, Rajasthan, Email id-agriclub42@gmail.com</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type of Usage</td>\r\n			<td>\r\n			<ul>\r\n				<li>spice and masalas</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nutrient Content</td>\r\n			<td>\r\n			<ul>\r\n				<li>Calories- 50 kcal, Total Fat -3.5g, Sodium-0mg, Total Carbohydrate- 3 g</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Flavor</td>\r\n			<td>\r\n			<ul>\r\n				<li>No adde', 1, 0),
(47, 1, 3, 8, 'P101040', 'zoff Black Mustard/Rai', '<h1><strong>Description</strong></h1>\r\n\r\n<p>&nbsp;It is pertinent to note that, actual product packaging and materials may contain more and/or different information which may include nutritional information/allergen declaration/special instruction for intended use/warning/directions etc. We recommend the consumers to always read the label carefully before using or consuming any products. Please do not solely rely on the information provided on this website. For additional information, please contact the manufacturer.</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>zoff</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type</td>\r\n			<td>\r\n			<ul>\r\n				<li>Black Mustard</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Form Factor</td>\r\n			<td>\r\n			<ul>\r\n				<li>Whole</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>200 g</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Container Type</td>\r\n			<td>\r\n			<ul>\r\n				<li>Pouch</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Gourmet</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Added Preservatives</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum Shelf Life</td>\r\n			<td>\r\n			<ul>\r\n				<li>12 Months</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ingredients</td>\r\n			<td>\r\n			<ul>\r\n				<li>NA</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nutrient Content</td>\r\n			<td>\r\n			<ul>\r\n				<li>NA</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0);
INSERT INTO `tbl_product` (`product_id`, `main_id`, `sub_id`, `peta_id`, `code`, `name`, `description`, `specification`, `status`, `offer_id`) VALUES
(48, 1, 3, 8, 'P101041', 'Classic Mustard/Rai Small by Flipkart Grocery ', '<h1><strong>Description</strong></h1>\r\n\r\n<p>&nbsp;It is pertinent to note that, actual product packaging and materials may contain more and/or different information which may include nutritional information/allergen declaration/special instruction for intended use/warning/directions etc. We recommend the consumers to always read the label carefully before using or consuming any products. Please do not solely rely on the information provided on this website. For additional information, please contact the manufacturer.</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>Classic</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type</td>\r\n			<td>\r\n			<ul>\r\n				<li>Mustard</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Form Factor</td>\r\n			<td>\r\n			<ul>\r\n				<li>Whole</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>500 g</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Container Type</td>\r\n			<td>\r\n			<ul>\r\n				<li>Pouch</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Gourmet</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Added Preservatives</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum Shelf Life</td>\r\n			<td>\r\n			<ul>\r\n				<li>6 Months</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ingredients</td>\r\n			<td>\r\n			<ul>\r\n				<li>NA</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nutrient Content</td>\r\n			<td>\r\n			<ul>\r\n				<li>NA</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ready Masala</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(49, 1, 3, 9, 'P101042', 'PRODUCER PREMIUM JOWAR SEEDS (Sorghum), ', '<h1><strong>Description</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Jowar is rich in good quality fibre which can aid digestion, manage obesity and regulate blood sugar levels. Besides it has complex carbohydrates, which takes time to digest and release sugar in the bloodstream gradually, keeping sudden sugar spikes at bay.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>\r\n			<ul>\r\n				<li>PRODUCER</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>\r\n			<ul>\r\n				<li>PREMIUM JOWAR SEEDS (Sorghum), 1kg</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type</td>\r\n			<td>\r\n			<ul>\r\n				<li>Sorghum</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Quantity</td>\r\n			<td>\r\n			<ul>\r\n				<li>1 kg</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Maximum Shelf Life</td>\r\n			<td>\r\n			<ul>\r\n				<li>6 Months</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Is Perishable</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Organic</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Polished</td>\r\n			<td>\r\n			<ul>\r\n				<li>No</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Container Type</td>\r\n			<td>\r\n			<ul>\r\n				<li>Pouch</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(50, 1, 3, 9, 'P101043', 'MiniMall Super Market Organic Whole White Jowar Seeds', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>MiniMall Super Market Organic Whole White Jowar Seeds/Jawar Sorghum/Jowar</li>\r\n	<li>Free from Chemicals and Pesticides. Good for Nature. Safe for farmers.</li>\r\n	<li>Store in an air tight glass or stainless steel container in a cool and dry place.</li>\r\n	<li>Gluten Free, Premium Quality and Tasty Grain Calcium and other Minerals Rich</li>\r\n	<li>Easily Digestible Can Replace Wheat in Many Dishes</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>MINI MALL SUPER MARKET</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Vegetarian</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Units</td>\r\n			<td>1.00 count</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Weight</td>\r\n			<td>2 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Package Information</td>\r\n			<td>Pouc</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(51, 1, 3, 9, 'P101044', 'Neotea Sorghum Jola Jowar, Solam Whole White Jowar Seeds Jawar Sorghum Mille Grown Without Using Chemicals or Pesticides ', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>It is best eaten in its whole grain form to get the most nutrition.</li>\r\n	<li>Sorghum contains a wide variety of beneficial phytochemicals that act as antioxidants in the body</li>\r\n	<li>Controls cholesterol level thereby supporting good cholesterol levels</li>\r\n	<li>Sorghum is one of the best sources available for dietary fiber sorghum is a very versatile grain &amp; controls blood sugar level.</li>\r\n	<li>Package Content: 1 Sorghum | Jola | Jowar |</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Neotea</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Gluten Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Units</td>\r\n			<td>500.0 gram</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Weight</td>\r\n			<td>500 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Package Quantity</td>\r\n			<td>10</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(52, 1, 3, 9, 'P101045', 'B&B Organics Red Sorghum jowar seeds', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>NUTRIENT RICH : It is super-rich in protein and high in fibre, antioxidants, vitamin B6, niacin, magnesium, and phosphorus that helps boost health</li>\r\n	<li>HEALTH BENEFITS : It supports healthy digestion, keeps you full of energy, and helps strengthen your body.</li>\r\n	<li>RECIPE : Prepare upma, salad, red sorghum popcorn, and succotash.</li>\r\n	<li>CULTIVATION : Sorghum is among the top five cereal crops around the world. It is grown in the warmer season.</li>\r\n	<li>WHY B&amp;B : B&amp;B Organics Procures from authorized organic farmers so that their consumers can enjoy the pleasures of nature and cook nutritionally balanced, wholesome and chemical-free meals, which is an essential aspect of overall wellness.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>B&amp;B Organics</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Diet Type</td>\r\n			<td>Vegetarian, Gluten Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Number of Items</td>\r\n			<td>1</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(53, 1, 10, 11, 'P101046', 'City Greens Exotic Vegetables Seeds | Curly Kale | Imported Vegetable Plant Seeds', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>CityGreens Curly Kale - Are imported seeds , natural, open pollinated, NON - GMO.</li>\r\n	<li>Fertilizer requirement / Watering - Kale requires CG - NPK during germination stage. Once it starts growing give CityGreens - Greens combo as greens will give lush green leaves, Nutes will give all essential micro nutrients . Always use liquid Fertilizers as it is easily absorbed by the roots. It should be watered 2-3 times a week during cold days, and once a day during the hot sunny day. If doing Hydroponics maintain a ph of 6-6.5</li>\r\n	<li>Germination -Seeds should germinate in 7-10 days. NOTE - No seed germinates 100% CityGreens seeds germination rate is 85-90% which is highest among all as we test the seeds before packing.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Plant or Animal Product Type</td>\r\n			<td>Kale</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>City Greens</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material Feature</td>\r\n			<td>GMO Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Green</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Feature</td>\r\n			<td>High quality seeds with good germination rate</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>5 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sunlight Exposure</td>\r\n			<td>Partial Sun</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Net Quantity</td>\r\n			<td>100 count</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Moisture Needs</td>\r\n			<td>Regular Watering</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(54, 1, 10, 11, 'P101047', 'Exotic Pak Choi Seeds for Home Kitchen and Vegetable Gardening', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Best and High-Quality seeds from Seedbasket</li>\r\n	<li>Sowing Season: All Seasonal.</li>\r\n	<li>Seed Germination Time: 4 to 7 days</li>\r\n	<li>Harvesting Time: 45 to 60 Days</li>\r\n	<li>Plants Caring: Pak Choi needs at least 2 to 3 hours of Sunlight.</li>\r\n	<li>If any questions/concerns with quality of seeds, please reach out to</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Plant or Animal Product Type</td>\r\n			<td>Bok Choy</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Seed Basket</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material Feature</td>\r\n			<td>GMO Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Green</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sunlight Exposure</td>\r\n			<td>Full Sun</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Net Quantity</td>\r\n			<td>1.00 count</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Moisture Needs</td>\r\n			<td>Moderate Watering</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(55, 1, 10, 11, 'P101048', 'Seed Basket Exotic Celery Seeds For Home Gardening ', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Sowing Season: All Seasonal.</li>\r\n	<li>Soil requirements: The right type of soil is very important as nutrition&rsquo;s are required for the growth of the plant. Mix of soil requires Red soil, Vermicompost and Coco peat in respective ratios (40: 40: 20). Also add handful of Neem cake to each pot to keep the soil pest free.</li>\r\n	<li>Container Specification: Take Container/Plant Growing Trays. Preferably 12X6 inch Grow bags or even bigger as per requirement</li>\r\n	<li>Sowing: Sow your seeds 12-14 cm apart at a depth of 1&frasl;2inch (1.3 cm). Keep soil moist to speed germination and encourage quick growth. Sow the 1-2 seeds per pit. Water regularly. Seedling takes place within 7-10 days from the date of sowing.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Plant or Animal Product Type</td>\r\n			<td>Celery</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Indoor/Outdoor Usage</td>\r\n			<td>Outdoor</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Seed Basket</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material Feature</td>\r\n			<td>GMO Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Green</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sunlight Exposure</td>\r\n			<td>Full Sun</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Net Quantity</td>\r\n			<td>1.00 count</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Product Care Instructions</td>\r\n			<td>Water</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Moisture Needs</td>\r\n			<td>Regular Watering</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(56, 1, 10, 11, 'P101049', 'Omaxe Seeds Lettuce Imported Butter Head Green Exotic Seeds Kitchen Garden Packet', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>For Quick, better germination sow seeds with extra care, not fully inside-partial cover and less water always - During Summer Partial Sunlight and During Winters Morning Day sunlight is good for good germination</li>\r\n	<li>Non_GMO Seeds Best for Pots, Terrace farming and professional use</li>\r\n	<li>Easy to use and grow Picture is an indication of type only</li>\r\n	<li>Buy our seeds always from genuine seller-Go Green, Seedscare and Cloudtail Our most of the seeds varieties are untreated but sometime we have to treat seeds to maintain good germination but seeds are not harmful you can use this seeds for sowing purpose</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Plant or Animal Product Type</td>\r\n			<td>Plant</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Omaxe Seeds</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material Feature</td>\r\n			<td>GMO Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Green</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Expected Blooming Period</td>\r\n			<td>Winter, Summer</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sunlight Exposure</td>\r\n			<td>Partial Shade</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Net Quantity</td>\r\n			<td>1 count</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Expected Planting Period</td>\r\n			<td>Summer</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(57, 1, 10, 11, 'P101050', 'Omaxe Seeds Kale Tuscan Green Imported Exotic Seeds', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>For Quick, better germination sow seeds with extra care, not fully inside-partial cover and less water always - During Summer Partial Sunlight and During Winters Morning Day sunlight is good for good germination</li>\r\n	<li>Non_GMO Seeds Best for Pots, Terrace farming and professional use</li>\r\n	<li>Good Germination Best Quality Seeds Kitchen Garden Seeds-Best in Class</li>\r\n	<li>Easy to use and grow Picture is an indication of type only</li>\r\n	<li>Buy our seeds always from genuine seller-Go Green, Seedscare and Cloudtail Our most of the seeds varieties are untreated but sometime we have to treat seeds to maintain good germination but seeds are not harmful you can use this seeds for sowing purpose.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Plant or Animal Product Type</td>\r\n			<td>Plant</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Omaxe Seeds</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material Feature</td>\r\n			<td>GMO Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Green</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Expected Blooming Period</td>\r\n			<td>Winter, Summer</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sunlight Exposure</td>\r\n			<td>Partial Shade</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Net Quantity</td>\r\n			<td>1 count</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Expected Planting Period</td>\r\n			<td>Sum</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(58, 1, 10, 12, 'P101051', 'AllThatGrows Beetroot Seed', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>SOWING TIME: Beet Root Seeds Grows Well in Aug - Oct (Summer).</li>\r\n	<li>SOWING DISTANCE : Plant seeds 1/2 inch deep and 1-2 inches apart.</li>\r\n	<li>HOW TO SOW: Soil should be mixed with well rotten Cow dung. Make ridges at the distance of 1.5 feet and sow seed at the distance of 2 inches apart. Irrigate immediately and then as per requirement.</li>\r\n	<li>SEED TYPE: Superior Quality, Non-Hybrid, Pure, Open Pollinated, GMO-Free, And Heirloom (with An Unadulterated Genetic Heritage) Vegetable Seeds.</li>\r\n	<li>Tested For Germination.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Plant or Animal Product Type</td>\r\n			<td>Vegetables</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Indoor/Outdoor Usage</td>\r\n			<td>Outdoor</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>AllThatGrows</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material Feature</td>\r\n			<td>GMO Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Red,Red</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Feature</td>\r\n			<td>Extended Bloom Time</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Expected Blooming Period</td>\r\n			<td>Winter</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sunlight Exposure</td>\r\n			<td>Partial Sun</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Net Quantity</td>\r\n			<td>50 count</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Expected Planting Period</td>\r\n			<td>Summer</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(59, 1, 10, 12, 'P101052', 'AllThatGrows Lavender Blossoms Edible Medicinal Plant Flower Seeds For Gardening', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Seed Type : Non-Hybrid, Open Pollinated and Non-GMO</li>\r\n	<li>Sowing Time: Lavender Blossoms Edible Flower Medicinal Plant Seeds Grows Well in September - November</li>\r\n	<li>Flower Character: Spiky With Strong Fragrance. Colour : Purple shrubs with green foliage.</li>\r\n	<li>Specifications : Beautiful fragrant flowers hedges</li>\r\n	<li>Tested For Germination.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Plant or Animal Product Type</td>\r\n			<td>Lavender, Mint</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Indoor/Outdoor Usage</td>\r\n			<td>Outdoor</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>AllThatGrows</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material Feature</td>\r\n			<td>GMO Free</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Green,Purple</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Feature</td>\r\n			<td>Fragrant</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sunlight Exposure</td>\r\n			<td>Full Sun</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Net Quantity</td>\r\n			<td>500.0 count</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Number of Pieces</td>\r\n			<td>500</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(60, 1, 10, 12, 'P101053', 'Kraft Seeds Fresh Rocket Herbs Seeds for Home Gardening', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Quality Assured: The seeds eventually sprout and grow into Rocket Herbs. Kraft Seeds brings hand-picked, top-quality natural and fresh seeds to your home garden! The package contains 25 seeds. These seeds have a germination rate above 70%.</li>\r\n	<li>How To Germinate: 1) Take Kraft Seeds seed tray and fill it with potting soil mix. 2) Moist the soil using Kraft Seeds water sprayer. 3) Sow the seeds on the tray and place them under the sun, covered with a plastic sheet. 4) Spray the soil daily with water and allow the seeds to germinate in 2 weeks. 5) Transplant the sapling into pots and/or your garden once they sprout. The package includes a basic user manual.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Indoor/Outdoor Usage</td>\r\n			<td>Indoor</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Kraft Seeds</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material Feature</td>\r\n			<td>Organic, Natural</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Multicolour</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Feature</td>\r\n			<td>High Germination Rate</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Expected Blooming Period</td>\r\n			<td>Year Round</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>620 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sunlight Exposure</td>\r\n			<td>Full Sun</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Net Quantity</td>\r\n			<td>1 count</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Expected Planting Period</td>\r\n			<td>Autumn</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(61, 1, 10, 13, 'P101054', 'Hybrid Seeds Forage Sorghum RASEELA ', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Suitable for well drained, medium to heavy soils</li>\r\n	<li>This hybrid variety is recognised as the No.1 hybrid forage sorghum brand.</li>\r\n	<li>Tested and certified by CRRB, this multi-cut is high</li>\r\n	<li>yielding and packed with nutritious fodder.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Generic</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Multicolor</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Feature</td>\r\n			<td>High Yield</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Net Quantity</td>\r\n			<td>1.00 count</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(62, 1, 10, 13, 'P101055', 'PURE AGROVET ENTERPRISES CSV 33 MF Multicut Forage Sorghum Grass seeds for Animal Husbandry', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>CSV 33 MF is Multi-cut Forage Sorghum grass.</li>\r\n	<li>By use both GREEN &amp; DRY fodder to Animals.</li>\r\n	<li>It was developed from Tamil Nadu Agricultural University during 2016.</li>\r\n	<li>Breeding Method: EMS mutant of Co (FS) 29, Nothing but Advanced from Co (FS) 29 Crop.</li>\r\n	<li>Tall (7-11 feet), thin stem, leafy and capable for multiple harvests (cuts) up to 3 years.</li>\r\n	<li>Fast growing &amp; high tillering.</li>\r\n	<li>Harvest: first cut (60-65 days), subsequent cuts (every 30-45 days).</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>PURE AGROVET ENTERPRISES</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Black</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Net Quantity</td>\r\n			<td>1000.00 gram</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(63, 1, 10, 13, 'P101056', 'SIRA SEEDS SSH 400 FORAGE SORGHUM 1KG', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>4 to 5 cuts with an interval of 50 days each</li>\r\n	<li>High biomass and healthy fodder</li>\r\n	<li>Soft stem with soft internodes</li>\r\n	<li>Drought tolerant and highly adaptable</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Generic</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>WHITE</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Feature</td>\r\n			<td>High Germination Rate</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sunlight Exposure</td>\r\n			<td>Partial Sun</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(64, 1, 10, 13, 'P101057', 'Iagrifarm Sorghum Sudan Grass Fodder Seeds - 1 Kg - Multi Cut Fodder Seeds For Fodder Cultivation', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>1. Sorghum sudan grasses are crosses between forage-type sorghums and sundangrass.</li>\r\n	<li>2. The cows love sorghum sweet flavor and the high protein and carbohydrates enables the cows to gain weight rapidly despite the summer heat.</li>\r\n	<li>3. Sorghum sudan seed can grow from 5 to 12 feet tall, with stalks up to one half inch thick</li>\r\n	<li>4. Sorghum sudan seed can be cultivated easily between temp 15 to 40&deg;C, provided irrigation facilities. Gives upto 4-6 cuts under proper cultivated methods.</li>\r\n	<li>5. Sorghum seed Good for medium soil land</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Plant or Animal Product Type</td>\r\n			<td>Foliage</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Indoor/Outdoor Usage</td>\r\n			<td>Outdoor</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>IAgriFarm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material Feature</td>\r\n			<td>Organic</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Colour</td>\r\n			<td>Brown</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Feature</td>\r\n			<td>Pet Friendly</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Expected Blooming Period</td>\r\n			<td>Summer</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>1 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sunlight Exposure</td>\r\n			<td>Full Sun</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Expected Planting Period</td>\r\n			<td>Summer</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(65, 1, 10, 13, 'P101058', 'Farm Seeds Bermuda Grass - 1 Kg Seed', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Hybrid seed</li>\r\n	<li>It is Organic in nature</li>\r\n	<li>Bermuda Grass</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Plant or Animal Product Type</td>\r\n			<td>Herbs</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Indoor/Outdoor Usage</td>\r\n			<td>Outdoor</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Farm Seeds</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material Feature</td>\r\n			<td>Organic</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sunlight Exposure</td>\r\n			<td>Full Sun</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Net Quantity</td>\r\n			<td>1000 gram</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Product Care Instructions</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(66, 15, 16, 20, 'P101059', 'Plantocell Neem Oil Organic Spray for plants(Ready To Use)Insecticide, Fungicide And Pesticide, Home Gardening(500ML)', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>PlantOCell Neem Oil Ready Spray is Totally Organic, Herbal &amp; Highly effective pesticide which is not only Bio-Degradable to plant but also environment friendly.It also promotes plant growth,health and vigour. It brings a shine on plants and make them appear fresh and healthy.</li>\r\n	<li>No need to mix water and a separate sprayer, Makes it easy to use.</li>\r\n	<li>The main component Azadirachtin CONTROLS INSECT feeding and laying eggs. PESTS like spider mites,moth larvae,aphids,scale and whitefly will be killed by this special organic component.</li>\r\n	<li>FUNGUS Control is also one of the many benefits of this NEEM OIL SPRAY.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Oil</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>580 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>PlantOCell</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(67, 15, 16, 20, 'P101060', 'Chipku - Organic Cold Pressed, Water Soluble,Pure Neem Oil Pouch For Plant & Garden 200 Milliliters With Spray Bottle, Pack Of 1', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>FUNGUS Control is also one of the many benefits of this NEEM OIL SPRAY. Mildew,anthracnose,botrytis,black spot,leaf spot,rust,blight,scab and wilt can be easily eliminated from plants.</li>\r\n	<li>For Best results spray at 3-4 days of intervals. Can also adjust the usage by observing the affect on the plant. Spray directly on the plant preferably early in the morning or late in the evening.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Oil</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>580 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>PlantOCell</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(68, 15, 16, 20, 'P101061', 'ARBUDA® 07663 MALATHION 50% E.C. Broad Spectrum Insecticide/Insecticide Repellent/Armala (Melathion) 1ltr', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Universal pesticide</li>\r\n	<li>Is Assembly Required: False</li>\r\n	<li>Power source type: Manual</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>ARBUDA</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Scent</td>\r\n			<td>Unscented&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Volume</td>\r\n			<td>1 Litres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material Feature</td>\r\n			<td>Organic, Natural</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Liquid</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(69, 15, 16, 20, 'P101062', 'Katyayani Acetamiprid 20% SP Insecticide Pesticide for Thrips whitefly jassid aphids Leafhoppers Leafminers Scalespest Insect Killer for Gardening Pla', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Katyayani Presents K-Acepro Acetamiprid 20% WP is a Cost Effective product with best control of Sucking Pests like Thrips whitefly jassid aphids , Leafhoppers Leafminers Scales etc widely used on Vegetables Fruits Cumin Citrus Wheat Mustard Potato Tea etc</li>\r\n	<li>Katyayani Acetamiprid 20% SP K- Acepro is Suitable for all purposes for Domestic Home Garden Kitchen Terrace Nursery Gardening &amp; Agricultural Use. it is Safe &amp; Completely Water Soluble powder therefore Easy to use .</li>\r\n	<li>Acetamiprid 20% SP has systemic translaminar action. It has a novel mechanism of action on the insect nervous systems by acting as an agonist to nAch. It also exhibits triple action: ovicidal, adulticidal and larvicidal.</li>\r\n	<li>It is a new generation highly effective systemic insecticide , Katyayani K-Acepro is world renowned for Controlling Neonicotinoid group for sucking insects.</li>\r\n	<li>For Domestic Use Dosage is 1 Gram per 1 Litre Water , For Large Applications 60 to 80 gm per acre is the general dose , Foliar Spray is recommended.Detailed Instructions to use is given along with the product.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Katyayani</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(70, 15, 16, 20, 'P101064', 'Divine Tree Nicotox-D Tobacco Dust Powder Natural Insecticides for Potted Plants,Flowerbed and Lawn Grass (900 Grams) for Agriculture|Gardening Use On', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>100% Natural Product</li>\r\n	<li>Agricultural and Gardening Use only( Agriculture Grade)</li>\r\n	<li>Premium Pack of 1</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>900 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>DIVINE TREE</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(71, 15, 16, 21, 'P101065', 'OrganicDews Trichoderma Viride Powder - (2 x 10^8 CFU per Gram) Bio Fungicide', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>ABOUT TRICHODERMA VIRIDE : Trichoderma viride is a high-efficiency organic biological agent. It produces antibiotics, nutrient competition, parasitic, cell-wall degradation, enzymes, and induced plant resistance mechanisms, which have antagonism effect on a variety of plant pathogenic fungi.</li>\r\n	<li>CONTROLS SOIL FUNGUS DIEASES : Trichoderma Viridi improve the soil, break the knot, improve the soil permeability and oxygen supply of the root system.</li>\r\n	<li>IMPROVES PLANTS IMMUNITY : Trichoderma viridi activates the plant&#39;s internal defense system. Hence prevent and control root rot, cataplexy, blight, wilt, verticillium wilt, anthrax, and other soil-borne diseases.</li>\r\n	<li>INCREASES CROP YIELD : Trichoderma viridi increases the absorption of nutrients and the effective use of fertilizers by plants. Hence promote root growth, make crop growth more vigorous and increase crop yield.</li>\r\n	<li>APPLICATION :INDIVIDUAL PLANTS - Mix 5g of trichoderma viridi with 1 litre water and apply directly to plant soil. SEED TREATMENT - Mix 10 g of trichoderma viride with 1 kg of seeds. ROOT DIPPING : Mix 100 g of trichoderma viridi with 10 litres of water. POTTING SOIL : Mix 100 g of trichoderma viride with 15-20 of potting soil.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>125 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>OrganicDews</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Fungus</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(72, 15, 16, 21, 'P101067', 'Casa De Amor Copper Sulphate- Plant Fungicide Essential for Gardening and All Plants ', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Copper Sulphate is a common ingredient in several fungicides used in gardens and fields.</li>\r\n	<li>Copper Sulphate prevents damage to plants from mold and fungi.</li>\r\n	<li>Material: Technical Grade Crystal | Color: Blue</li>\r\n	<li>Use for Swimming Pool, Pond Microbes &amp; Algae removal and cleaning Clear Drainage by Killing plant roots</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>400 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Casa De Amor</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(73, 15, 16, 21, 'P101068', 'BLOOMBUDDY Organic and Control Union Certified Fungicide for plants', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>100% organic and control union certified</li>\r\n	<li>Effective in controlling a wide range of fungal diseases such as blights, blasts, leaf rusts, smuts, powdery mildew and downy mildew etc.</li>\r\n	<li>Has systemic activity and does not leave any residue on plants or soil.</li>\r\n	<li>Has excellent UV stability on crops</li>\r\n	<li>Is both fungicidal and fungi-static in nature. Excellent stability throughout the shelf life period resulting in maximum efficacy.</li>\r\n	<li>Package Contains: Pack of 1 Organic and Control Union Certified Fungicide; Capacity: 200 ml</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Oil</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>50 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>50 Millilitres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>BLOOMBUDDY</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Fungus</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(74, 15, 16, 21, 'P101069', 'Pot And Bloom Protection Spray, Neem Oil for Plant, Organic Pest Control, Pesticide Spray, Pesticides for Plants Home Garden, Neem Oil for Plants Inse', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Our protection spray bottle contains 100% pure neem oil, which is a natural and organic option for pest control in your home garden.</li>\r\n	<li>The neem oil in our spray is specially formulated to target and eliminate common garden pests like aphids, mealybugs, and mosquitoes. Incredible Organic Pest Control Solution.</li>\r\n	<li>Our neem oil spray is a highly effective and versatile option for controlling pests and diseases in your home garden, and is sure to keep your plants healthy and thriving.</li>\r\n	<li>Our neem oil spray is also effective against fungal infections, making it a versatile option for protecting your plants from a wide range of diseases.</li>\r\n	<li>The 250ml size of our spray bottle is perfect for home gardeners, as it provides enough product to treat a large area without taking up too much space in your gardening supplies.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Pot and Bloom</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Volume</td>\r\n			<td>250 Millilitres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Material Feature</td>\r\n			<td>Organic, Natural</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Spray</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Number of Items</td>\r\n			<td>1</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(75, 15, 16, 21, 'P101070', 'IFFCO Urban Gardens – Organic Pesticide & Fungicide Combo for Plants & Soil - Attack Insects, Pests, Bugs, Nematode, Fungal & Bacterial Disease - Dr N', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Doctor Neem+: Triple Action of Neem Oil, Pongamia Oil &amp; Lemongrass Oil. Natural Protection from Sucking Pests such as Mealybugs, Aphids, Leafhoppers, Thrips, Whitefly, Beetles and Mites</li>\r\n	<li>Doctor Earth: Natural biological protection from all types of soil borne diseases such as Wilt, White Mold, Root Rot, Damping off etc. Enriches soil with natural and beneficial anti-fungal, anti-bacterial and anti-nematicidal microbes</li>\r\n	<li>Doctor Green: Natural biological protection from all types of fungul and bacterial plant disease such as Powdery Mildew, Leaf/Fruit Spot, Mosaic Virus etc.</li>\r\n	<li>Usage: Can be used along with any organic or inorganic sprays and 100% Water Soluble (No additional soap required)</li>\r\n	<li>Category: Suitable for Indoor/Outdoor Plants, flowers, Kitchen Garden, Trees, Lawns etc.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Spray</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>0.71 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>0.6</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>IFFCO URBAN GARDENS</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(76, 15, 16, 22, 'P101071', 'Rooted Weed Guzzler, Ready-To-Use Liquid, Weed & Unwanted Plant Killer, Remover & Preventer, Fast Acting, Visible results in 24 Hrs, Non-Toxic, Chemic', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>KILLS WEEDS, NOT THE LAWN: Rooted&#39;s Weed Guzzler&#39;s all-natural formula kills annual and perennial weeds without harming your lawn.</li>\r\n	<li>ECO-FRIENDLY FORMULA: Weed Guzzler is non-toxic, safe &amp; completely biodegradable formula. It contains no sulphates, bleaches, dyes, chlorides or glyphosates.</li>\r\n	<li>MULTI-PURPOSE USE ACROSS VARIOUS SURFACES: Our product is very versatile, with multiple uses across driveways, sidewalks, patios, fences, foundations, curbs, retaining walls, lawn edges, as well as on decorative rock or gravel areas. Any surface where growth of weeds is an issue, Weed Guzzler is there to take the issue away!</li>\r\n	<li>EASY, SIMPLE APPLICATION &amp; FAST ACTING RESULTS: There&#39;s no need to mix or dilute with any other product or liquid. Simply add Weed Guzzler to a pump sprayer &amp; spray on existing weeds to the point of wetness to root out the issue. We also recommend spraying on weed-prone areas to prevent new weeds from growing. Our all-natural, non-toxic formula begins work immediately and weeds begin to wither &amp; die within 24 hours.</li>\r\n	<li>SAFETY GUIDELINES: Applicators must wear Personal Protection Equipment during application for safety as per International Standards. Please follow instructions as per the product label provided.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Zyax</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>2.5 Litres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Liquid</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(77, 15, 16, 22, 'P101072', 'Erwon® Herbicide, Organic Essential Powerful Liquid Herbicide for Removing Wild Herbs', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>It is a Powerful Herbicide liquid, bio organic wild herbs killer for the protection of crops.</li>\r\n	<li>Suitable for removing wild herbs from the crops and garden.</li>\r\n	<li>It can be used in water crops and other kitchen gardening crops.</li>\r\n	<li>Quick action formula and prepared as per international standard.</li>\r\n	<li>Easy to use and store, user manual is given with the product.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Erwon</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>0.1 Litres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Liquid</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(78, 15, 16, 22, 'P101073', 'Rimi Garden® Herbicide, Premium Organic Liquid Herbicide for Removing Wild Herbs', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>It is a Powerful Herbicide liquid, bio organic wild herbs killer for the protection of crops.</li>\r\n	<li>Suitable for removing wild herbs from the crops and garden.</li>\r\n	<li>It can be used in water crops and other kitchen gardening crops.</li>\r\n	<li>Quick action formula and prepared as per international standard.</li>\r\n	<li>Easy to use and store, user manual is given with the product.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Rimi Garden</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>250 Millilitres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Liquid</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(79, 15, 16, 22, 'P101074', 'Bayer Whip Super (Herbicide), 1 Litre', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>To control weeds in Soybean, Rice, Blackgram, Cotton, Onion &amp; Groundnut crops</li>\r\n	<li>Like any other Oxadiazoles, Oxadiargyl inhibits protoposphyrinogen IX oxidase, the enzyme that converts from Protox to Proto, which finally helps in the weed&#39;s necrotic action.</li>\r\n	<li>Knapsack sprayer fitted with flat fan nozzle</li>\r\n	<li>300 ml per acre</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Bayer</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>1 Litres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Liquid</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(80, 15, 16, 22, 'P101075', 'Quick Greens Plant Guard Neem Oil Spray for Plants, Gardening, Plant-Insect, Insect Control and Pest Control Organic Cold Pressed Water-Soluble Neem O', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Fertilizer/ Plant Fertilizer/ Garden Fertilizer/ Plant food/ Khaad/ Khad/ Garden Soil/ Garden Pots/ garden Tool/ Horticulture/ Vermi/ Compost/ Vermi compopst/ Plant Protector/ Insect Killer/ Seaweed based/ Plant Amino/ Root growth Product/ Plant green Plant green/ Plant Diet / Plant Guard / Elexa / Vermi Plus/ Guard plus/ Power Soil</li>\r\n	<li>Spray - in addition to being useful for ridding your garden of insects and other pests, this neem oil makes a great dormant spray to help protect your plants throughout all seasons.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Effective natural spray for gardens, indoor and outdoor plants: keep your indoor plants fresh with beautiful green shiny leaves by spraying them with neem oil. It is safe, you do not need to worry of harming your kids or household pets.</li>\r\n	<li>High quality Neem Oil spray. More effective. With Spreading agents. Advanced. Spreading agents are widely used in agriculture for spreading the spray on larger surface of plants. This spray sticks to plant and keeps working for longer time. More effective.</li>\r\n	<li>One bottle with spray- 400 ml. Spray twice a month on your plants, or as required. Suitable for all plant types.</li>\r\n</ul>\r\n', 1, 0),
(81, 15, 16, 22, 'P101076', 'Utkarsh BT (Bacillus Thuringiensis Based Bio Insecticide)', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Utkarsh BT is a Bacillus Thuringiensis species of bacteria that is an excellent bio insecticide.</li>\r\n	<li>Utkarsh BT acts by producing a protein that blocks the digestive system of the insect, effectively starving it; an infected insect will stop feeding within hours of ingestion and will die within days.</li>\r\n	<li>Utkarsh BT is toxic to a narrow range of insects and does not harm the natural enemies of insects, nor does it impair honeybees and other pollinators.</li>\r\n	<li>Utkarsh BT provides highly effective pest control.</li>\r\n	<li>Utkarsh BT is 100% organic, non-toxic bio insecticide.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Liquid</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>1.15 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>1 Litres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>UTKARSH</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(82, 15, 17, 23, 'P101077', 'OrganicDews Verticillium lecanii (1x10^8 CFU/g) Bio Insecticide (125 g) for Plants - Against Sucking Insects Like Aphids, Thrips and Whiteflies', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>ABOUT VERTICILLUM LECANII : Verticillum lecanii (fungus) helps in controlling soft bodies sucking insects like white flies, mealy bugs, thrips. Verticillium lecanii upon coming in contact with the insect, attaches to the cuticle of insect. They produce hyphae from germinating spores which penetrate the outer protective layer of the insect thereby infecting it.</li>\r\n	<li>TARGET PESTS : Verticillium lecanii helps to control soft bodies sucking insects Leaf hoppers, Scale insects, White fly, Aphids, Jassids, Thrips, Mealy bugs, Mites, Scarlet mites, Green Mosquito bug, leaf miner, Black fly, Pod flies.</li>\r\n	<li>MODE OF ACTION : Verticillium lecanii upon coming in contact with the insect, attaches to the cuticle of insect. They produce hyphae from germinating spores which penetrate the outer protective layer of the insect thereby infecting it. Gradually the internal content of the insect is destroyed and the insect dies. Further, the fungus eventually grows out through the cuticle and sporulates on the outside of the body. Infected insects will resemble to white cotton like particles.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>OrganicDews</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(83, 15, 17, 23, 'P101078', 'Atmanam Metacare Metarhizium Anisopliae 1.15% W.P. (CFU 2x10^6/gm min.) Bio Pesticides and Bio Insecticide', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Atmanam Metacare is a biological insecticide based on a selective strain of naturally-occurring entomopathogenic fungus Metarhizium anisopliae.</li>\r\n	<li>When the spore of this fungus comes in contact with the cuticle (skin) of the target insect pests, it germinates and grows directly through the spiracle cuticle in to the inner body of the host. The fungus proliferates throughout the insect&#39;s body, draining the insect of nutrients and the infected insects eventually dies.</li>\r\n	<li>Atmanam Metacare effectively controls the economically important pests of crops such as leaf hoppers, root grubs, Borers, cutworms, termites, palm weevils.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Atmanam Metacare helps to increase productivity by improving the crop health through containing the pests.Metarhoz is eco-friendly and helps to maintain the ecological balance.</li>\r\n	<li>Application Method : Soil Treatment: Mix 1-2 kg. Metacare with 100 kg. Of Well decomposed FYM / Compost/sand and broadoast in the field 1 Acre for control of white grubs, Termite and other soil inhabiting insects. Foliar Spray: Use Metacare @ 5.0 gm per liter water for spray on insect pest in standing crop. Use Sticker @ 0.5ml./liter water along with metacare for batter results</li>\r\n</ul>\r\n', 1, 0),
(84, 15, 17, 23, 'P101079', 'Katra Fertilizers Botanical Miticide Extraction of Neem & Datura Plant Azadirachtin 0.5 GM/L SL | Bio Pesticide, Agriculture Product | Insecticide pes', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Target Crops- Cereals, Millets ,Pulses, Oilseeds, Fibre Crops, Sugar Crops, Forage Crops, Plantation crops, Vegetables, Fruits, Spices, Flowers, Medicinal crops ,Aromatic Crops ,Orchards &amp; Ornamentals.</li>\r\n	<li>Dosage : 200-300ml/Acre</li>\r\n	<li>It is botanical miticide extracted from Neem and Datura</li>\r\n	<li>It contains Azadirachtin 500 ppm + Datura Extract which posses miticidal activity to controls phytophagous mites, eggs and nymphs.</li>\r\n	<li>It also controls other piercing sucking insects, including aphids, mealy bugs, scale crawlers, thrips, and whiteflies</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Liquid</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>550 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>500 Millilitres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Katra</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(85, 15, 17, 23, 'P101080', 'Atmanam Beauveria Bassiana (1x10^8 CFU/g) Bio Insecticide (900 g) for Plants - Against Aphids, Thrips and Whiteflies', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>ABOUT BEAUVERIA BASSIANA : Beauveria Bassiana is a bio insecticide containing white muscardine fungus which is widely used for control of thrips, whiteflies, aphids, caterpillars, grasshoppers, ant, beetles.</li>\r\n	<li>TARGET PESTS : Beauveria Bassiana used to control pests like caterpillars, mealy bugs, termites, grubs, white flies, jassids, thrips, aphids, beetles, mites, Leaf folder, Stem borer, Fruit borer.</li>\r\n	<li>RECOMMENDED CROPS : Suitable for all which growns in High humid places with low temperature range. Field Crops : wheat, corn, peanuts, soybeans, sweet potatoes, onions, garlic, sugarcane, coffee, tea. Vegtable Crops : potatoes, leeks, eggplant, peppers, tomatoes, chilly, brinjal, cucumbers, etc., Fruit Trees : Apples, pears, apricots, plums, cherries, pomegranates, mangoes, litchi, guava, jujube.</li>\r\n</ul>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>0.9 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Atmanam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0);
INSERT INTO `tbl_product` (`product_id`, `main_id`, `sub_id`, `peta_id`, `code`, `name`, `description`, `specification`, `status`, `offer_id`) VALUES
(86, 15, 17, 24, 'P101081', 'Utkarsh BaciSub (4 Liter) (Bacillus Subtilus Based Bio Fungicide For Plants)', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Utkarsh BaciSub is a species of bacteria - Bacillus subtilis- that can survive in the soil for long periods.</li>\r\n	<li>Utkarsh BaciSub are highly effective at colonizing plant roots and controlling plant pathogens.</li>\r\n	<li>Utkarsh BaciSub can act directly against other microbes by producing a variety of antibiotics that affect fungi or bacteria.</li>\r\n	<li>Utkarsh BaciSub can also act indirectly by stimulating the plant to activate its own defense mechanisms, so it can fend off attacking microbes.</li>\r\n	<li>Utkarsh BaciSub bacteria directly control soil-borne fungal pathogens like Rhizoctonia, Phytophthora, Fusarium, and Sclerotinia. The SAR that they induce in the plant can control foliar pathogens, such as the fungal pathogens powdery mildew, Botrytis, and Sclerotinia and the bacterial pathogens Erwinia and Xanthomonas. Utkarsh BaciSub is used on agricultural seeds of vegetables, soybeans, cotton, and peanuts and flower and ornamental seeds.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Liquid</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>4.35 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>4 Litres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>UTKARSH</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Fungus</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(87, 15, 17, 24, 'P101082', 'Holy Green - Nurture The Future Bio Fungicide Trichoderma Viride Powder (2X10^8 Cfu/G) 1 Kg For Soil, Seeds And Plants - Controls Both Seed And Soil B', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>BIO FUNGICIDE : Trichoderma Viride, an antagonistic fungus with a spore load of 2 x 10^8 CFU per gram. It is effective in controlling both seed and soil borne pathogens, causing damping-off, root rot and wilt diseases.</li>\r\n	<li>SEED GERMINATION : Trichoderma Viride protects germinating seeds and seedlings against soil and seed borne pathogens/insects. Trichoderma helps in seed germination enhancement; early and uniform establishment and growth.</li>\r\n	<li>PLANT IMMUNE BOOSTING :Trichoderma has been used as a plant immune-boosting agent in organic farming.In order for plants to develop strongly and healthily, early plant immune boosting is required. plant is well cared for and surrounded by beneficial insects and microorganisms, it not only thrive better, but can also better protect itself against attacks from pests and diseases.</li>\r\n	<li>PLANT GROWTH BOOSTER :Trichoderma Viride also produces growth hormones, so-called auxins. An important auxin is indole-3 acetic acid, which is synthesised in all plants. This has a stimulating effect on the growth of plants, especially their roots, even in the smallest quantities. These auxins are passed from Trichoderma to the plant.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Holy Green - Nurture the Future</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(88, 15, 17, 24, 'P101083', 'Agreeta Organic Bio Fungicide For Plants | Prevents Fungal and Bacterial Diseases in Plants | Controls Soil Fungus Dieases & Improves Plants Immunity ', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>? AGREETA ORGANIC BIO FUNGICIDE :- One of the key benefits of using Agreeta Organic Bio Fungicide is that it is highly effective in controlling a wide range of fungal and bacterial diseases that can harm plants. These include diseases like powdery mildew, leaf spot, blight, and damping off. By controlling these diseases, Agreeta Organic Bio Fungicide helps to improve the overall health and productivity of plants, resulting in stronger and healthier growth.</li>\r\n	<li>? IMPROVE HEALTH AND FERTILITY OF SOIL :- Agreeta Organic Bio Fungicide is also effective in controlling soil-borne fungal diseases. These diseases can be particularly harmful to plants, as they attack the roots and prevent the plant from absorbing nutrients and water from the soil. By controlling these soil-borne diseases, Agreeta Organic Bio Fungicide helps to improve the overall health and fertility of soil, which in turn benefits the plants growing in it.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>1 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>AGREETA BIO SCIENCE</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Fungus</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(89, 15, 17, 24, 'P101084', 'KAYA NAVIRA Pseudomonas Fluorscens 1% W.P Powder Fungicide', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>PSEUDOMONAS FLUORSCENS (BIO FUNGICIDE) : Pseudomonas Fluorscens is found naturally in soil, water and on plant surfaces and is effective as a seed dressing in the control of seed and soil-borne diseases.</li>\r\n	<li>CONTROLS SEED/ROOT DISEASES : Pseudomonas fluorescens bio-fungicide that effectively controls fades and root diseases of Tomato, Banana, Groundnut, Soyabean, Cotton, etc. This works by metabolites and antagonism on the fungus spores of plant pathogens. The pseudomonas fluroscens fungicide seed treatment provides a protective zone around seeds. It also controls Downy mildews &amp; Powdery mildews and other fungal diseases.</li>\r\n	<li>IMPROVES SOIL QULAITY : Biological potential and fertility of soil could be increased. Free-living soil bacteria that thrive in the rhizosphere, aggressively colonize plant roots, and facilitate plant growth. Safe to soil inhabiting beneficial organisms.</li>\r\n	<li>ENHANCES PLANT GROWTH &amp; ROOT DEVELOPMENT : Pseudomonas fluorescens increase the rate of plant growth and development, by developing more robust roots. Pseudomonas fluorescens helps in plant growth promotion through the production of growth promoting hormones like gibberelic acid, indole acetic acid and naphthaline acetic acid. They promotes seed germination and early flowering &amp; fruiting.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>KAYA NAVIRA</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Fungus</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(90, 15, 17, 24, 'P101085', 'Atmanam Nematokill Paecilomyces Lilacinus Bio Fungicide for Controlling Nematode Bio Insecticide and bio Pesticide', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Nematokill is made from an advance strain of paecilomyces lilacinus. Nematoz - P has the ability to colonize the eggs of wide range of phytopathogenic nematodes, sometimes it colonizes the female nematode also</li>\r\n	<li>Nematokill also effective over larvae of many Nematodes while remaining harmless to other beneficial insects and microflora</li>\r\n	<li>Nematokill has broad spectrum activity against Root knot Nematodes, Cyst Nematodes, Reniform Nematodes, Stunt Nematode affecting Banana, Tobacco, Vegetables and Orchards.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>It is also effective on white grubs &amp; other soil borne pathogens</li>\r\n	<li>Dosage &amp; Direction of Use: For Control of Various Plants Parasitic Nematocides, apply Nemiatokill 1 kg. with 20-25kg organic manure in 1 acre area &amp; irrigate the field Nematokill can be Applied trough drip irrigation also.</li>\r\n</ul>\r\n', 1, 0),
(91, 15, 17, 25, 'P101086', 'Sanjeevani Organics Neem Kawach 500 Ml Bottle Spray Growth Plus Liquid Bio-Fertiliser for All Crops Perfect to Use On Indoor/Outdoor Plants, Fertilize', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Purely made of Neem</li>\r\n	<li>Used for Controls eggs, larvae and adult stages of insect pests, including aphids, spider mites, and whiteflies</li>\r\n	<li>useful for indoor and outdoor plants</li>\r\n	<li>5-10 ml neem kawach with 1 litre of water</li>\r\n	<li>Only available in sanjivani Organics</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Sanjeevani Organics</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>500 Milligrams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Granules</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>0.5 Litres</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(92, 15, 17, 25, '649', 'Upcrop Trictrl - Biocontrol Agents, Bio-Insecticide, Bio-Fungicide and Bio-Nematicide', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Suitable crops : Suitable for all crops</li>\r\n	<li>Enhances soil fertility, Contains macronutrients and micronutrients</li>\r\n	<li>Stimulates plant growth &amp; Infects eggs of different genera of nematodes</li>\r\n	<li>Protects against bacterial and fungal pathogens &amp; Improves yield</li>\r\n	<li>Total organic matter : 9.1% (pH : 7.6%, Nitrogen : 0.54%, Phosphorus : 0.21%, Potassium : 22.00%, Calcium : 0.87%, Magnesium : 1.20%, Sulfur : 0.70%, Total organic matter : 9.10%, Moisture : 4.00%)</li>\r\n	<li>Dosage : Fertigation: 500 g per acre Add the recommended quantity of Upcrop TriCtrl in fertilizer tank, mix well and apply through drip irrigation systems</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Trishul Biotech</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(93, 15, 17, 25, 'P101087', 'Casa De Amor® (250 gm) Nematohit Verticillium chlamydosporium- 1.0% W.P., Nematodes Bio-Controller for Root Knot, Burrowing, Cyst & Lesion Nematodes', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Helps to increase the productivity by controlling the nematode pests.</li>\r\n	<li>Bio-Nematohit effectively controls the nematodes like root knot nematodes, burrowing nematodes, cyst nematodes, lesion nematodes etc. among wide range of crops.</li>\r\n	<li>Makes your plant healthier and more fresh and higher in growth, by controlling nematodes.</li>\r\n	<li>Also effective over larvae of many Nematodes while remaining harmless to other beneficial insects and microflora.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Nematohit Has the ability to colonize the eggs of a wide range of phytopathogenic nematodes, sometimes it colonizes the female Nematode also.</li>\r\n	<li>Method of Application &amp; Dosage Seed treatment 20 gm/Kg of seeds, properly mix it and shade dry before sowing. Nursery beds 100 gm/ per sq. meter For Drenching: 5 gm per plant For Soil Application: 1-2 kg per mix with 50-100 kg vermicompost / compost / FYM per acre through irrigation.</li>\r\n</ul>\r\n', 1, 0),
(94, 15, 17, 25, 'P101088', 'Arron Paecilomyces Lilcinus - 1 % w.p.(Bio Nematicide) 1 kg..', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Its an Nematode destroying fungi have long been considered as promising bio control agents. Among these, Paecilomyces lilacinus is an effective parasite of nematode eggs.</li>\r\n	<li>It is a talc based formulation of nematophagous fungus, Paecilomyces lilacinus, that is capable of parasitizing nematode eggs, juveniles and females, and thus reduces the plant parasitic nematode population in the soil.</li>\r\n	<li>Egg parasites are more effective in reducing the populations. It also infects juveniles and young adults of most nematode species. It is highly useful in vegetables, pulses, oil seeds, turmeric, banana, citrus, fruit crops and ornamental plants.</li>\r\n	<li>Nematodes feed damage the plant roots and reduce the water and nutrient uptake which results in reduction in yield. In addition, the infested plant becomes more vulnerable to other stress factors such as heat, water shortage, nutritional deficiencies and disease causing organisms. It is difficult to control these nematodes with common chemical pesticides.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>1 Litres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Arron</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(95, 15, 17, 25, 'P101089', 'UNIPLANT UNIMATO (A Bio - Nematicide)', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>&quot;Unimato minimizes root knots &amp; egg hatching of Phyto nematodes by disrupting their feeding and reproduction &amp; It also minimizes the effect if soil pathogens and various impediments caused from soil and climate factors.&quot;</li>\r\n	<li>&quot;Unimato targets the harmful nematodes which attack plants and serve as carries for plant viruses in crops.&quot;</li>\r\n	<li>&quot;Unimato is highly irritating to nematodes and also posses ovicidal activity against soybean cyst nematodes heteroderid glycine&#39;s sugar beet cyst nematodes Schachter, southern root-knot nematodes Meloidogyne incognita and northern root-knot nematodes Unimato is helpful to control eggs, nymps (Juvenile) and adults of nimatodes. While appling unimato sufficient moister must be require in soil.&quot;</li>\r\n	<li>&quot;While using this products add uniwet 250 ml per acre. After 3 to 4 days must be applied Unidrip 1 litre per acre to develop sufficient white roots. &quot;</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Liquid</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>UNIPLANT</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Target Species</td>\r\n			<td>Insects</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(96, 40, 41, 50, 'P101090', 'MAAJEE 908 G Plant Growth Promoter/Booster Organic Fertilizer For Plants', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Maximises Yield - A must-have for professional gardeners and hobbyists, this liquid fertiliser supports optimum development</li>\r\n	<li>Boosts Seedling Development and Fruit Quality - Every drop of this nutrient-dense garden plant food has plant-growth-promoting properties</li>\r\n	<li>Indoor use -Apply 40 gr of MAAJEE Plant Growth Promoter every month for plants up-to 9 inch pots and for bigger than 10 inch use 60 gr</li>\r\n	<li>Outdoor use- Apply 1/2 kg of MAAJEE Plant Growth Promoter to every 40 sq ft and water immediately.</li>\r\n	<li>Agricultural Use- Apply 100- 200 kg MAAJEE Plant Growth Promoter per acre to the soil after ploughing and tilling than water the field.</li>\r\n	<li>MAAJEE Plant Growth Promoter helps in faster germination of seeds and seedling growth.</li>\r\n	<li>It is also helpful in the carrying the process of Photosynthesis.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>MAAJEE</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Specific Product Use</td>\r\n			<td>Plant Growth</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(97, 40, 41, 50, 'P101091', 'IFFCO URBAN GARDENS - Sea Secret - Seaweed Extract Liquid Concentrate - Organic Fertilizer & Growth Promoter for Plants', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>ABOUT: Sea Secret is a seaweed-based organic-bio stimulant that provides over 60 naturally occurring major and minor nutrients and also is a natural source of plant development substances comprising of enzymes, amino acids, organic acids, carbohydrates, vitamins, auxins, cytokinins, and gibberellins, that provide a major boost to plant growth by accelerating the plant&rsquo;s metabolic function.</li>\r\n	<li>BENEFITS: 100% Natural &amp; Organic Growth Promoter &amp; Bio-Stimulant; Over 60 naturally occurring macro and micronutrients; Enhances nutrient uptake from the soil; Boosts Yield &amp; enhances Plant Quality; Enhances Stress Tolerance from heat, cold, wind, drought and disease; Activates soil microbial population and improves soil health.</li>\r\n	<li>HOW TO USE: Dilute 2.5 ml in 1 Litre water and mix well; Spray the dilution on the plant canopy; Repeat every 15 days for best results.</li>\r\n	<li>COMPOSITION: Seaweed, Calcium, Sulphur</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>IFFCO URBAN GARDENS</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>200 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Liquid</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>200 Millilitres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Specific Product Use</td>\r\n			<td>Enhances Stress Tolerance from heat, cold, wind, drought and disease. Promotes root growth, tillering and activates microbial population for improved soil health. Enhances nutrient uptake from the soil- Boosts Yield &amp; Enhances Plant Quality.Enhances Stress Tolerance from heat, cold, wind, drought and disease. Promotes root growth, tillering and activates microbial population for improved soil health. Enhances nutrient uptake fr</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(98, 40, 41, 50, 'P101092', 'HerbEcoFarm Organic Plant Growth Promoter with Measuring Cap ', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>NATURAL PHYTO TONIC: Organic Plant Growth Promoter is a sustainable product for Nursery &amp; home gardening use made out of derivatives of Amino acid, Vitamins &amp; Xanthine&rsquo;s that will increase overall development of plant by imparting vigor to the plants and rectifies unusual deficiencies present in the plant. It provides all essential nutrients to keep your plants healthy and happy.</li>\r\n	<li>HELP IN PHOTOSYNTHESIS: Without proper photosynthesis, plants will not grow. This process relies on the production of chlorophyll, which needs to absorb energy from the sun. Amino acids will help in the production of chlorophyll, which leads to quality photosynthesis.</li>\r\n	<li>DISEASE RESISTANCE: Boosts the immunity and resistance in plants against drought resistance, frost protection and stress recovery.</li>\r\n	<li>INCREASES CROP YIELD &amp; QUALITY: Amino acids that contributes to their faster and more efficient absorption of nutrient by the plant. It improves the taste of fruits and vegetables, increases yields and improves quality. It helps to Increases branching, flowering, fruit setting &amp; size.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>HerbEcoFarm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Liquid</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>40 Millilitres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Specific Uses For Product</td>\r\n			<td>Gardening,Plant Growth</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(99, 40, 41, 50, 'P101093', 'TrustBasket Plant Growth Promoter/Booster Organic Fertilizer', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Buy Original, sold and fulfilled by TrustBasket***</li>\r\n	<li>TrustBasket Growth Promoter helps in faster germination of seeds and seedling growth.</li>\r\n	<li>It is also helpful in the carrying the process of Photosynthesis.</li>\r\n	<li>This Growth Promoter is available in 500g packets which would be sufficient for a home garden.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>TrustBasket</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>500 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Coverage</td>\r\n			<td>Medium</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>0.5 Litres</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(100, 40, 41, 50, 'P101094', 'Exfert Super Thrive Organic Plant Growth Promoter Proteins, Auxins, Cytokinines, Chelated Micro Nutrients', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>It is a mixture of essential nutrients, vitamins &amp; Hormones. Natural occurring hormones mainly auxins and cytokinin are present in special ratio</li>\r\n	<li>It helps to control the deficiency of essential Nutrients immediately.</li>\r\n	<li>It helps to build immunity in the plant.</li>\r\n	<li>It improves luster &amp; shining of the fruits. Results in better fruiting &amp; flowering. As It Is Protein Chelated Spray One Will Get The Results On The Plant Within 24 Hours</li>\r\n	<li>Application &amp; Dose: Foliar Spray Application: 2-3 ml / Ltr of water. Drip &ndash;Soil Application: 1-2ltr / Acre. Drenching Application: 2-4ml/ Ltr of water.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>EXFERT</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Liquid</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>0.25 Litres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Specific Product Use</td>\r\n			<td>Plant Growth</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(101, 40, 42, 51, 'P101095', 'TrustBasket Organic Vermicompost Fertilizer Manure For Plants', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Buy Original, sold and fulfilled by Trust basket</li>\r\n	<li>Improves Soil Aeration</li>\r\n	<li>Enriches Soil With Micro-Organisms (Adding Enzymes Such As Phosphatase And Cellulase)</li>\r\n	<li>Microbial Activity In Worm Castings Is 10 To 20 Times Higher Than In The Soil And Organic Matter That The Worm Ingests</li>\r\n	<li>Attracts Deep-Burrowing Earthworms Already Present In The Soi</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>TrustBasket</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>5000 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>5 Litres</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(102, 40, 42, 51, 'P101096', 'Homemade Organic Fertilizer Organic Cow Dung and Compost', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Organic Ways brings you the highest quality, odour free, premium Vermicompost. It offers an effective combination of natural properties of cow dung manure and vermicomposting. Feed your plants organically rich and balanced diet, which releases essential nutrients like Nitrogen, Phosphorus and Potassium ( NPK ) slowly and as plants require.</li>\r\n	<li>This Product Is Made From Cow Dung manure, Using Red Wigglers Earth Worms, Which Are Considered Best In Vermicomposting Process, Making It The Highest Quality Natural Fertilizer. This Product Is Ideal For Your Plants In Lawns, Yards, Home Gardens, Bins, Containers, Pots, Indoor Plants And Farm Beds. It Makes An Ideal Composition Of Potting Mix Too.</li>\r\n	<li>Organic Ways Homemade Vermicompost Fertilizer Is Chemical Free. Also There Are No Pesticides. Let Your Children And Pets Play Around Plants And In Lawn Grass After Applying This. It Is Completely Safe For Them. Natural Compositions Of The Fertilizer Will Take Care Of Overall Health Of Your Plants Like Vegetables Such As Tomato, Potato, Flowers Such As Rose, Marigold, Fruits Like Strawberry, Grass And Herbs.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Homemade Organic Fertilizer</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>10 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Granules</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>10 Litres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Specific Uses For Product</td>\r\n			<td>Potting</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(103, 40, 42, 51, 'P101096', 'UTKARSH Huminoz-98 Humic Acid (98%) for Plant | Plant Fertilizer for Potted Plants | Plant Growth Enhancer, Soil Conditioner, Improves Plant Root Syst', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Utkarsh Huminoz-98 is Biologically activated Humic acid 98%. It is an organic bio-stimulant which enhances the growth of leaves, flowers, fruits and improves soil carbon content</li>\r\n	<li>Utkarsh Huminoz-98 is 100% organic and natural product. It Improves physical,chemical, and biological properties of soil</li>\r\n	<li>Utkarsh Huminoz-98 Increases aeration and water holding capacity of soil, Improves effectiveness of metallic fungicides</li>\r\n	<li>Utkarsh Huminoz-98 is a complex mixture of partially&quot; decomposed&quot; and other wise transformed organic materials along with Bio activators. Country of origin : India</li>\r\n	<li>It helps to multiply the beneficial micro-organisms in the soil by breaking down the enzymes and digest the organic matters making the soil healty and fertile. This will aerate the soil and stimulate root activity</li>\r\n	<li>Humic acids that contributes to their faster and more efficient absorption of nutrient by the plant. It improves the taste of fruits and vegetables, increases yields and improves quality</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>UTKARSH</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>915 Grams</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>0.9 Litres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Specific Product Use</td>\r\n			<td>Improves physical,chemical, and biological properties of soil, Increases aeration and water holding capacity of the soil, Improves the effectiveness of metallic fungicides.Improves physical,chemical, and biological properties of soil, Increases aeration and water holding capacity of the soil, Improves the effectiveness of metallic fungicides.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(104, 40, 42, 51, 'P101097', 'OrganicDews Organic Humic Acid 98 Fertilizer (Water Soluble) Shiny Flakes For Plants 1 Kg - Plant Growth Enhancer, Soil Conditioner, Improves Plant Ro', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>NATURAL BIOSTIMULANT : Humic acid based biostimulant is a blend of humic acids, micro nutrients and organic matter. It is an organic bio-stimulant which enhances the growth of leaves, flowers, fruits and improves soil carbon content.</li>\r\n	<li>IMPROVES SOIL STRUCTURE : It helps to multiply the beneficial micro-organisms in the soil by breaking down the enzymes and digest the organic matters making the soil healty and fertile. This will aerate the soil and stimulate root activity.</li>\r\n	<li>INCREASES CROP YIELD &amp; QUALITY : Humic acids that contributes to their faster and more efficient absorption of nutrient by the plant. It improves the taste of fruits and vegetables, increases yields and improves quality.</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>OrganicDews</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>1 Kilograms</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Powder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Liquid Volume</td>\r\n			<td>1 Litres</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Specific Product Use</td>\r\n			<td>Plant Growth,Soil Conditioner</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(105, 40, 42, 51, 'P101097', 'TrustBasket Enriched Organic Earth Magic Potting Soil Fertilizer for Plants', '<h1><strong>Description</strong></h1>\r\n\r\n<ul>\r\n	<li>Contains microbes which enhance the soil properties</li>\r\n	<li>Completely organic and does not contain any harmful chemicals</li>\r\n	<li>Contains micro and macro nutrients. Has good water holding capacity</li>\r\n	<li>Its antifungal property helps the plants to grow healthy</li>\r\n</ul>\r\n', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>TrustBasket</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Style</td>\r\n			<td>Organic</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Weight</td>\r\n			<td>5000 Grams</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image`
--

CREATE TABLE `tbl_product_image` (
  `image_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `path` text NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product_image`
--

INSERT INTO `tbl_product_image` (`image_id`, `product_id`, `unit`, `price`, `path`, `qty`) VALUES
(16, 15, '10 GMS', 210, 'assets/products/6cfcff1a9ee5603e7c46a67830006812.jpg', -1),
(17, 15, '20 GMS', 420, 'assets/products/abae3d231d89be890db1e818b2265198.jpg', 0),
(18, 15, '50 GMS', 1050, 'assets/products/f32692b9121b3926420134688c5af833.jpg', 0),
(19, 15, '100 GMS', 2100, 'assets/products/44ed09962097e37dd9ed0e7335ae9084.jpg', 20),
(20, 16, '20 GMS', 399, 'assets/products/86a0e283b754227a9d6ea8d4ea3ced11.jpg,assets/products/11bc5814b7917d041c5a60f80441a50f.jpg,assets/products/a505ae0e49ff2cf971025859dbe30559.jpg', 3),
(21, 16, '50 GMS', 999, 'assets/products/0caacdfa2aa331d7e47f8199a14bd421.jpg,assets/products/4f739a9c98c6ae6bf29f2296121d5c73.jpg,assets/products/19dbc608d0986cb35002f34e3ffaaebc.jpg', 20),
(22, 16, '100 GMS', 1999, 'assets/products/d7fb8c406bf43fccf671d4d64afb3ce3.jpg,assets/products/9c91a0ce8887c3e16007b8e1c597fd58.jpg,assets/products/776205106f72c9249b1a32d2062262dd.jpg', 30),
(23, 17, '10 GMS', 299, 'assets/products/5c45f8c1a712ca3c637f262d08042185.jpg,assets/products/4b459c7d599d8df713f7170b6e132699.jpg', 30),
(24, 17, '20 GMS', 599, 'assets/products/fd13037b601e9371d6add931512c6683.jpg,assets/products/3f263f305690cb34c6062ac34deee8ce.jpg', 30),
(25, 17, '50 GMS', 1495, 'assets/products/b514f8bf2f04d7d761630b55165e584d.jpg,assets/products/fc646da4b52225ef5d6a57d60fda5d10.jpg', 30),
(26, 18, '5 KG', 499, 'assets/products/338549c3e5bfa393767e0b3259bca633.jpg,assets/products/20d552bd968f2237a8b7da73ca7aede3.jpg,assets/products/6d4e836af908f397e2c1b7258ffe2871.jpg', 24),
(27, 18, '10 KG', 999, 'assets/products/5f346c008c382405e467cae4e66061bf.jpg,assets/products/5a63528b7db5b9a441c2d5e55cbe2bb6.jpg,assets/products/ee16db246fa004649bc17befde3f08d3.jpg', 25),
(28, 18, '20 KG', 1999, 'assets/products/3ca0fccd53c4ed425169a9ed441ee047.jpg,assets/products/c7edc0a67e80cd9796680048791a9c77.jpg,assets/products/98029e208e7442cea1465dc0537ba003.jpg', 25),
(29, 19, '250 GMS', 299, 'assets/products/b326b805a0d250df9043bd6250a58e73.jpg,assets/products/5c082cc1650d130494a00082f2c8f7fd.jpg', 26),
(30, 19, '500 GMS', 499, 'assets/products/321aceddc4762b39b83e2568e6256c53.jpg,assets/products/3f11296abc1ee22c4b6c0b3684903078.jpg', 26),
(31, 19, '1 KG', 999, 'assets/products/4cc0c5e1649ba2677fe26601587b7c36.jpg,assets/products/6f431113a06699c7ad3a24a85154c9f7.jpg', 26),
(32, 19, '5 KG', 4999, 'assets/products/5d9de114fb51b03c76b41482fb1bf56b.jpg,assets/products/cf95f1cf49835de144e5de0fcd97b618.jpg', 26),
(33, 20, '1 KG', 149, 'assets/products/ec260f670dd4028c5c9b28367b0995aa.jpg,assets/products/028b376ee5f4302a10dc164b8ce67880.jpg,assets/products/158839e962d2c09669af15167f87ae37.jpg', 24),
(34, 20, '5 KG', 749, 'assets/products/171e993dd1506c24b4cf37d4cc87170d.jpg,assets/products/9ee55fc79cf4d7d1d748ad576b0f24b6.jpg,assets/products/4c648c3ccc5e81aacc9d89cd47da7ea0.jpg', 24),
(35, 20, '10 KG', 1499, 'assets/products/3215beb23a3a4fb5d3dfd360c0823456.jpg,assets/products/e064c381c540e6c619b2df8f4ac61128.jpg,assets/products/07f7fb6dedb2d8c9bb92137c73c80389.jpg', 24),
(36, 21, '5 GMS', 199, 'assets/products/cfaf200154f8248d3b25b925c8d49b70.jpg,assets/products/422dbb8f885d8a751be3eac8bcb06089.jpg', 30),
(37, 21, '10 GMS', 399, 'assets/products/6eb2499921541e952357f7640c1e824d.jpg,assets/products/62b812bb540b93731c7199b50f50e426.jpg', 30),
(38, 21, '20 GMS', 799, 'assets/products/89e4a734aff4cda98c70a45c1f7282c4.jpg,assets/products/a226b50d8bbddb15f454cca5cf6cfaa6.jpg', 30),
(39, 21, '50 GMS', 1999, 'assets/products/71f12a08c67ecb66e594856428f5588a.jpg,assets/products/5ddb2f88c37975c459993592d8d55426.jpg', 30),
(40, 22, '5 GMS', 149, 'assets/products/db1be814c02fd94602f494f28b6a7c81.jpg,assets/products/ba6f02fc3787ffb71a2c53ed0cfa391d.jpg,assets/products/c3ecb1d214bb3441daa6278a15568d90.jpg', 40),
(41, 22, '10 GMS', 299, 'assets/products/d381340a788c637f18d9d64018f33912.jpg,assets/products/b97443dbc760d5dabfaff6444508cb0f.jpg,assets/products/3a5d7361c78c3e5406d1a745ee7c4938.jpg', 40),
(42, 22, '20 GMS', 599, 'assets/products/aafea8291347397d111adbdd8a8908be.jpg,assets/products/514d2bf9f274cfc7e74bf2907e7842f9.jpg,assets/products/f443d7a1422152ff54cf24ecc03690c8.jpg', 40),
(43, 22, '50 GMS', 1495, 'assets/products/b9013294b4c4bc531fcacaf59c7e9f32.jpg,assets/products/9ea1f25e9aae5a304374aaf565ee4939.jpg,assets/products/94a5b57c3dc7351a0cf76ce22f4e406d.jpg', 40),
(44, 23, '500 GMS', 499, 'assets/products/9d45d0d51e98bfd80fbcd8e8cfa419be.jpg,assets/products/488a206c99812eff9c571bb97875af3a.jpg', 35),
(45, 23, '1 KG', 999, 'assets/products/6bb55426e1a78676da816f7c759248c7.jpg,assets/products/20e04fd51089915a850f8bb092741ceb.jpg', 35),
(46, 23, '3 KG', 2999, 'assets/products/d46d7fdc2be4778fa6692e1c8838027b.jpg,assets/products/d30ab18707cae92bf83530868737bc4d.jpg', 30),
(47, 23, '5 KG', 4999, 'assets/products/0c505db81cf452be707aae8ff603bfe4.jpg,assets/products/e7c160967e39adb6817d8478a9f90afd.jpg', 30),
(48, 24, '1 KG', 399, 'assets/products/e4eb5a4274d2657a087dbb81f6b09a27.jpg,assets/products/65b867b7afef8346c7b1b68ce1cfc326.jpg', 26),
(49, 24, '3 KG', 1199, 'assets/products/b46ac3ae6f0a72360e81e81e272beada.jpg,assets/products/19f4be103dcc89b91e56d63fd395572c.jpg', 26),
(50, 24, '5 KG', 1999, 'assets/products/29967a22238dea577d58ad48adcc06e8.jpg,assets/products/e7573cb8c8bf2b5458ed05ca2d958841.jpg', 26),
(51, 25, '500 GMS', 499, 'assets/products/0288d442976bfe6eb1c46e1e310cf4f5.jpg,assets/products/09a39a2730d88b15a6b4f3b7174d6b05.jpg', 32),
(52, 25, '1 KG', 999, 'assets/products/c01c0eb3d590e45421f813d669f35123.jpg,assets/products/ffece9fac5b0edbaf2f753c3002db3f1.jpg', 32),
(53, 25, '3 KG', 2999, 'assets/products/e47d51781e106f24a23387514d20ba2d.jpg,assets/products/b4fc12f984ecd5b3d5ed0abeeba28d27.jpg', 32),
(54, 26, '250 ML', 499, 'assets/products/fcd7a8a8cef753f9667b6af86c5e59fc.jpg,assets/products/891574bad87e114d6e5899df3c071521.jpg', 30),
(55, 26, '500 ML', 999, 'assets/products/8a95f09427f8fdfdc14a7f3e1c4cba2f.jpg,assets/products/fe1ffa83b8c37264ec2ea9477eac4faf.jpg', 0),
(56, 26, '1 LTR', 1999, 'assets/products/3759e2a9f5c18f2f02e5c2908f62536e.jpg,assets/products/adc789411208f81604b557d01a48d5e2.jpg', 30),
(57, 27, '1 KG', 999, 'assets/products/db456f4794231ca9261b0e0b0cf27cbc.jpg,assets/products/802892b04b7871485293b02a9786c7f4.jpg', 25),
(58, 27, '3 KG', 2999, 'assets/products/0aca767fceeaa1b5e511a6761d1c5fd8.jpg,assets/products/a7f2f23ffee151468a5605dfeabdd378.jpg', 25),
(59, 27, '5 KG', 4999, 'assets/products/d0fb06c9d69520d2173ac558e246e1c3.jpg,assets/products/cbe5b8264aa54001e49ea58891f3fa92.jpg', 25),
(60, 28, '5 GMS', 75, 'assets/products/7631e92ed9ca65add857bbd04c5b880d.jpg,assets/products/e619ab9abb3f7d78ea1d8881f02e1122.jpg', 21),
(61, 28, '10 GMS', 149, 'assets/products/3592ddd013ed47ec7d33ab2c32d88e0a.jpg,assets/products/f22ea7cfc009a06613861dd380e5a2fe.jpg', 26),
(62, 28, '20 GMS', 299, 'assets/products/4f0d8dc80bb59fbf8eaa1fdfe964da87.jpg,assets/products/4e300ff6fb59fcde34c03b01d4a5173d.jpg', 26),
(63, 29, '5 GMS', 149, 'assets/products/839820b9b7e9b875ea091be810101dd2.jpg,assets/products/49871d481f00db8ed904519da8dd4077.jpg,assets/products/1a9606a8d66e6846ed7cb646d226f527.jpg', 30),
(64, 29, '10 GMS', 299, 'assets/products/1e0aa8ecae4e7a2f1a83bcc43d8050ed.jpg,assets/products/1b57d1c61e5caa6849c5db77057efb04.jpg,assets/products/cda7bd1bb50ba40a1166454c77063217.jpg', 30),
(65, 29, '20 GMS', 599, 'assets/products/f5a92549a461ddcbe5851b556cc02798.jpg,assets/products/a4e74a7577a8db20dcd86462716f4552.jpg,assets/products/a9a3aa8389f12a54ef36f88dcb9a962b.jpg', 30),
(66, 30, '5 GMS', 179, 'assets/products/541c552283ef1c647dd2c72b5eb725fa.jpg,assets/products/ebd3a0013a747916a8535443d32fe8c1.jpg,assets/products/e9af3709a09e9889dec2032c001d05dd.jpg,assets/products/cc3fd8e74f0574e9dcd90bb613029ae1.jpg', 24),
(67, 30, '10 GMS', 359, 'assets/products/f9f231511bd18bd136059ad394c962e9.jpg,assets/products/ff78ff2db5992c1eac6eff3200ffbace.jpg,assets/products/54e37d7cb881bc426bd47d8768f8aedf.jpg,assets/products/140b208aec8b405b40837b385b10297b.jpg', 25),
(68, 30, '20 GMS', 699, 'assets/products/2ca388f914f1beeff96c3cc21aa9a041.jpg,assets/products/3bdd9c5ef3470c953f892f682a904002.jpg,assets/products/036b34f30df4f4920e3a36d6fb4a69ea.jpg,assets/products/4d27ae56efa1d76fa19f35015300954b.jpg', 24),
(69, 31, '10 GMS', 99, 'assets/products/d66433e80be7d3c840e7c826582d45b3.jpg,assets/products/e0e0c0a299956ceb7d5b8e6d4e06115b.jpg', 25),
(70, 31, '20 GMS', 199, 'assets/products/148a1bc774532e612ab1e14d42667841.jpg,assets/products/ffb47dde00ba0c5f2bf515ba00c5d502.jpg', 25),
(71, 31, '50 GMS', 499, 'assets/products/6d421806e2e3a94297fa75b50ff66d77.jpg,assets/products/ab58ef728b5fef112dc976a24dcf5509.jpg', 25),
(72, 32, '20 GMS', 99, 'assets/products/cc1a0e5e7a6091c357fb40b3c4dd4ad8.jpg,assets/products/e20213727c05b496e9f083bb7bb50694.jpg,assets/products/df7a8d5d050b39b6488ae94f163b2be9.jpg', 20),
(73, 32, '50 GMS', 249, 'assets/products/07598b5535d3f941b38a85a702c7fb6f.jpg,assets/products/7f6d559fdc6ccafef797ecdad9102559.jpg,assets/products/666a19d0dba72cd466a2fd39bbd370cb.jpg', 20),
(74, 32, '100 GMS', 499, 'assets/products/a5bafc014b4bc494b5c1e1c524d800ae.jpg,assets/products/5e77d87442f5cbc2c0ab10aeb9bb815f.jpg,assets/products/697da37fb26393efd5bbf0b229b52ba8.jpg', 20),
(75, 33, '10 GMS', 125, 'assets/products/dbe48f6b23fdbb7abcc453342c608d54.jpg', 30),
(76, 33, '20 GMS', 249, 'assets/products/65d1df0f61a114f162c8175ec9a35a09.jpg', 30),
(77, 33, '50 GMS', 625, 'assets/products/232b2a59d5ee86ba66b1df62b37fa1d0.jpg', 30),
(78, 34, '10 GMS', 99, 'assets/products/fa853fe21cf1d414afbcb6391f7964c5.jpg,assets/products/4afac5c5838f86ad3065b5f7fd618715.jpg,assets/products/a9e5b4e2e8822b8c272ef299e59013f1.jpg', 20),
(79, 34, '20 GMS', 199, 'assets/products/121e3c3c7bc48ba64824f383653392d2.jpg,assets/products/d551463f550eb0bd6d61782c5f80e68d.jpg,assets/products/f317c37eed830275db7d856f42764227.jpg', 20),
(80, 34, '50 GMS', 499, 'assets/products/431b87cb12844044c551f8f253fdeb72.jpg,assets/products/81a1118aafa87dd75d42421a99b33743.jpg,assets/products/8e030ef5dd27cd5361bc5ea8ffb756e6.jpg', 20),
(81, 35, '10 GMS', 159, 'assets/products/44859bf94c8fe6d5139736a0cb1fb3c2.jpg,assets/products/cfd1f43c07193b34fc2382a2942509bd.jpg', 30),
(82, 35, '20 GMS', 219, 'assets/products/5d85f3cfd7a5e8cf2015074826b18d27.jpg,assets/products/120b7bbde8d4b8eb154de91d5696f73d.jpg', 30),
(83, 35, '50 GMS', 499, 'assets/products/e41ae641b7afde8f2bbcc06b6fecc8d2.jpg,assets/products/475d51973178186d8364a62f6f98dfa9.jpg', 29),
(84, 36, '10 GMS', 199, 'assets/products/ddb646a3b3dbca045d21ea3203fff072.jpg,assets/products/c3cec80d541dd8859b5644932db432c9.jpg', 30),
(85, 36, '20 GMS', 399, 'assets/products/9bd6940d14f0d4fb49d0f2f53ef40783.jpg,assets/products/4af6fe35a1ed04219c96bdcc65d7591e.jpg', 30),
(86, 36, '50 GMS', 999, 'assets/products/5c6ee7bea127734b2f708c1b8ecb7bf1.jpg,assets/products/e1edc75c734629010aa217c1632e0c55.jpg', 30),
(87, 37, '50 GMS', 149, 'assets/products/d9db7190a4a3e3922228ad22b56054ab.jpg,assets/products/1162456150d723056412f55126ca44ee.jpg,assets/products/cd97c62cfe52513b778c6fac447fb88a.jpg', 30),
(88, 37, '100 GMS', 299, 'assets/products/db0e18c9271203bf4216db80f3fdf9df.jpg,assets/products/4fd706a9dc52fa66b8262dcc07cef3f4.jpg,assets/products/60539793c85f96e7c270c742a0df956d.jpg', 30),
(89, 37, '250 GMS', 749, 'assets/products/d148f7317120296881f7627fa9b167cc.jpg,assets/products/d1fd9ed7cdee73f36ebd25e81123198e.jpg,assets/products/b3a32b34f04111b9922abbf6e8d1f2b3.jpg', 30),
(90, 38, '20 GMS', 155, 'assets/products/e2428ce46cfd0185db853ba211bc6c0f.jpg,assets/products/8a2d0bd48415dce3130a936649ed3683.jpg', 30),
(91, 38, '50 GMS', 349, 'assets/products/a9632d701964b19dc0a837de86f597f7.jpg,assets/products/a867ff93cfa6ebee736bddecf244a6c9.jpg', 30),
(92, 38, '100 GMS', 699, 'assets/products/a2f738ecbf35db03fbd78874184394bb.jpg,assets/products/917f9ba5395ea6f8fe3847853967fa3f.jpg', 30),
(93, 39, '50 GMS', 99, 'assets/products/97001901c231d101850423c5bf003688.jpg', 30),
(94, 39, '100 GMS', 199, 'assets/products/aff27fe517bc5180d611b6c2d45ffbd9.jpg', 30),
(95, 39, '250 GMS', 249, 'assets/products/2f9010ac32baa5f044b0913230975b9e.jpg', 30),
(96, 40, '50 GMS', 159, 'assets/products/a0fd4ebfa513c16f5029ca45235e4aec.jpg,assets/products/65aa6b8c7c46e636372bb57c6b6b2b04.jpg', 25),
(97, 40, '100 GMS', 319, 'assets/products/9f514f9d3a04c5b0228566c374f96917.jpg,assets/products/5b70a4aed81831f63a5548ce1771a269.jpg', 25),
(98, 40, '250 GMS', 649, 'assets/products/14081f110d56bc35e9bea534f96519e3.jpg,assets/products/b69dce45cc31a6fb2912b36205f99e5d.jpg', 25),
(99, 41, '5 KG', 999, 'assets/products/e39f27d3fb93fddeaf8754a868a7a4fe.jpg,assets/products/db505a26ab814e6113a68f3b56153458.jpg,assets/products/b41c35d1af38a8534d62b6a9d6443dd3.jpg', 20),
(100, 41, '10 KG', 1999, 'assets/products/dae36212534c68699e3208a63effe23c.jpg,assets/products/5c7e7a0e538ef93a3898a4db87b75469.jpg,assets/products/7b5052eb5c343722236ab12618c4d0bf.jpg', 20),
(101, 41, '20 KG', 3999, 'assets/products/6516887380f2be18d56050f36200a91f.jpg,assets/products/9d8c9585859dd326dc8bf96d318c1c7b.jpg,assets/products/221ac11a1b45479cbb98e3904895cd31.jpg', 20),
(102, 42, '1 KG', 249, 'assets/products/98d8f0017e90e71de489deec86e3ed50.jpg,assets/products/4b7d05d3962825fe5fa586e2c1e0b587.jpg', 20),
(103, 42, '3 KG', 747, 'assets/products/58f2b6a98deb8d57f31e0ae1b1bbc3ef.jpg,assets/products/146e5a74b76eaec132515e78c616a57f.jpg', 20),
(104, 43, '1 KG', 999, 'assets/products/73a7b550403cfeb80f3faeacd8a7a006.jpg,assets/products/294c9f7f292c6829668242e0dc01d2be.jpg', 31),
(105, 43, '3 KG', 2999, 'assets/products/bd49fa2a7476a0eb1d52744b2af1821f.jpg,assets/products/722defca750312b6c7b733844eb6a0d6.jpg', 32),
(106, 43, '5 KG', 4999, 'assets/products/8d50aafe9578f63c9e80b42ce8f9deba.jpg,assets/products/74a17248037c387e3cfd64c0767720be.jpg', 32),
(107, 43, '10 KG', 9999, 'assets/products/c67845c3d6051ac274986f3faccbd21f.jpg,assets/products/ab1a03d395e0f25878eb80a3251dd60d.jpg', 32),
(108, 44, '500 GMS', 249, 'assets/products/ccf4e4d8e9ed8f73c5f55b400cce2ff0.jpg,assets/products/6f69db53ad1a3353b4a78e960f1daa83.jpg,assets/products/dcdc277d448953f25f421cf958120289.jpg', 30),
(109, 44, '1 KG', 499, 'assets/products/3bf2425936fc8398bb2fed5168fb14a8.jpg,assets/products/5232d4b35947038555acbf9a4a829ed0.jpg,assets/products/6f5b26242f54f5ae15c74290c2464dfc.jpg', 30),
(110, 44, '3 KG', 749, 'assets/products/a879a5be2a8da043446e5d2afc3b63e3.jpg,assets/products/c170799b6cd2e397c124f516adec4796.jpg,assets/products/c88e9e2bdc43845e673748103b4e08f9.jpg', 30),
(111, 45, '250 GMS', 149, 'assets/products/3cde967cbe2995e00721d2e4e14f1956.jpg,assets/products/9d35f9260103ffaa06f55ded4493b9ed.jpg,assets/products/db20c83c2fbc6743764ac4611c801b1c.jpg', 20),
(112, 45, '500 GMS', 299, 'assets/products/afd1daae5b6a2462618db50b4d214e92.jpg,assets/products/9ea94ad255ca413e577f5c0498b4ec24.jpg,assets/products/d3c644a58b2be396bb928070f3f6c5aa.jpg', 20),
(113, 45, '1 KG', 599, 'assets/products/16d82d30c8fed94792a91cfd2321d7cb.jpg,assets/products/a70af8996097c1af98f0ac1da40c6c0c.jpg,assets/products/e8d2003380e61612cd4d9e586a37e0fd.jpg', 20),
(114, 46, '250 GMS', 165, 'assets/products/fc03708957e54ecba78f7bdf1754ac4a.jpg,assets/products/74bc2549b267128f225f6faf33f82488.jpg,assets/products/bd55f147f96ebdd32f9e82e331c62ac6.jpg,assets/products/8447eb4a5290d646e4928db439febe39.jpg', 20),
(115, 46, '500 GMS', 329, 'assets/products/8d6652e956eeb7812a6ce3d65d8e3803.jpg,assets/products/0014a810f39ff6356efc25bd27a33c9e.jpg,assets/products/df83c53ca30b4d4e51163f44b6f40b0f.jpg,assets/products/dc224be0ef61dd77e89df172260ef257.jpg', 20),
(116, 47, '250 GMS', 99, 'assets/products/c7db4ad1a64b1d419b89644b22a901ab.jpg,assets/products/e16ee1890c12253172a9411c5b2383bc.jpg,assets/products/be486ca8f3620c101f29031d08b6cb76.jpg', 20),
(117, 47, '500 GMS', 199, 'assets/products/0b7c6b37cca35254e8c40328713a3812.jpg,assets/products/b9e89b8b6ae3e44a24bdd87701bcf1b6.jpg,assets/products/367e6ebd4fa66bc248fb952f8469858f.jpg', 20),
(118, 47, '1 KG', 399, 'assets/products/bdb8f5759545c15d805d02c081f8fe47.jpg,assets/products/1e7fa1b425200010cb732b75fd6c9591.jpg,assets/products/8b0ada6c952bed22afb633eee24df616.jpg', 20),
(119, 48, '500 GMS', 95, 'assets/products/4d70f38bf41c0f536e4feac086799d62.jpg,assets/products/ed405c514e04d05cad2dd11e3646bfee.jpg,assets/products/a00924fb3abd1795c63552762331cc54.jpg', 20),
(120, 48, '1 KG', 190, 'assets/products/9b8856e3df224b259dac56d3a8b0fc4c.jpg,assets/products/b7176cbc178f4c0930feec80ea277e0c.jpg,assets/products/511446de9526c6145f207dc6283da349.jpg', 20),
(121, 49, '1 KG', 199, 'assets/products/9b1c20aceed53355a25723fe20b3ed91.jpg,assets/products/69108819462700465ed5c8999b9dd79f.jpg,assets/products/89338d0b37316d3ebcfedea4e9d8a867.jpg', 20),
(122, 49, '3 KG', 599, 'assets/products/d32d1f7a9c40ec0636ff857be8f6ec3f.jpg,assets/products/280552d1759a65e986abbe5ce47d1252.jpg', 20),
(123, 49, '5 KG', 999, 'assets/products/c7ef79851d3b7e4bcd23e781ec9b51b4.jpg,assets/products/ff5c697af6091e10990bb6d16da7f5cd.jpg', 20),
(124, 49, '10 KG', 1999, 'assets/products/ac55bfb50443c094114953e59f9bb8ef.jpg,assets/products/ce67628887200fc74caa6217b674935d.jpg', 20),
(125, 50, '1 KG', 299, 'assets/products/334fd135d7624ede4747b5c85334273d.jpg,assets/products/94effb5b8c2869d2a9af06d119d34465.jpg', 20),
(126, 50, '3 KG', 999, 'assets/products/3a4e7fc9555e3c24076c434d35a3dd9a.jpg,assets/products/331a80d17d1c1977b82be5534b33288c.jpg', 20),
(127, 51, '1 KG', 399, 'assets/products/a6a5ebe7abe025b535b2ce43015e6b72.jpg,assets/products/f40f49017df88144bf46b8e5a4789ee6.jpg', 30),
(128, 51, '3 KG', 799, 'assets/products/fa329930d24c70301baafb82ae0370e3.jpg,assets/products/effbfa5120bfdac73c17be610f611097.jpg', 30),
(129, 52, '5 KG', 999, 'assets/products/11995da8742eb8657a2de5ca1f4e0d3f.jpg,assets/products/566c8c82c9ab4259397eb7f8736420bb.jpg', 20),
(130, 52, '10 KG', 1999, 'assets/products/1476e4ceed9f7d57e453acd72f163349.jpg,assets/products/da4cc342b71dc947733fbc2d80f9a88a.jpg', 20),
(131, 52, '20 KG', 3999, 'assets/products/3cd303c7477bd588db4ff73db7bfd1bf.jpg,assets/products/7df7e1ed9a02262dbb113220dd2d6ddf.jpg', 20),
(132, 53, '1 KG', 270, 'assets/products/32de012da40ea9eb28192344a15dd919.jpg,assets/products/c606e87afda2b9b93f32648bc8da1769.jpg', 20),
(133, 54, '10 GMS', 90, 'assets/products/0eefec0b3913722bfde32d6dd6f82fdb.jpg,assets/products/59455bd9c00d900f3cc92aa833c2e8e4.jpg', 30),
(134, 54, '20 GMS', 180, 'assets/products/8e5a25870c5e966d80958c4011f843c1.jpg,assets/products/945687aac2d98be325af7787cd7004df.jpg', 30),
(135, 55, '10 GMS', 90, 'assets/products/d5a0c996b15222af749d2803ddf3a87f.jpg,assets/products/9fabdf15888cb6fe388647d977fc49fa.jpg', 25),
(136, 55, '20 GMS', 180, 'assets/products/7c833f0e1c53184efa1f0b532192f72d.jpg,assets/products/a9774d8b7f021c519078f83c8ae567df.jpg', 25),
(137, 56, '10 GMS', 99, 'assets/products/91aa42d3502e0cc3c49ae1cc79a8c10e.jpg', 20),
(138, 56, '20 GMS', 199, 'assets/products/1602586b7832eb3a95bb01a4ac210c4c.jpg', 20),
(139, 57, '10 GMS', 135, 'assets/products/bf1ff7c81cf2382f98570775947e2353.jpg', 20),
(140, 57, '20 GMS', 270, 'assets/products/027ce7901cf99c97bc8b38a9a218cc0b.jpg', 20),
(141, 58, '10 GMS', 60, 'assets/products/3fae67dd03f7ae6b7ab70e99da900a64.jpg,assets/products/f6810937e22e9f442105e6fe5889bb9b.jpg', 30),
(142, 58, '20 GMS', 120, 'assets/products/094315d4770126ea40d95ce22d819762.jpg,assets/products/46ca1c89c99746d40a2f55974df7e4f7.jpg', 30),
(143, 59, '50 GMS', 130, 'assets/products/179d0f927e6a8b30fe48b8468c108e08.jpg', 20),
(144, 59, '100 GMS', 260, 'assets/products/e3e788ce9c7de5ca47babcdb657a1cba.jpg', 20),
(145, 60, '20 GMS', 60, 'assets/products/ceb7bea5cc007b7ff48049ddd995b0e0.jpg,assets/products/3abcdb405942e16cdbc7a8372a7fc358.jpg', 30),
(146, 60, '50 GMS', 150, 'assets/products/91ea53938d9aa9916a36c137464159b8.jpg,assets/products/77bb67bdcca70301d9dd2133249bfe53.jpg', 30),
(147, 61, '5 KG', 799, 'assets/products/d388a7e0390a40ae393713a3ed9f424c.jpg', 20),
(148, 61, '10 KG', 1599, 'assets/products/99ce50311def11a42862c94a1120b8a8.jpg', 20),
(149, 62, '1 KG', 699, 'assets/products/15fd36c94b29fb576a7e4b146a1fc0e1.jpg,assets/products/9854da799de1e116db78c0e0b6a9e9f7.jpg,assets/products/6e663c78fbda589bb824e4ca8a8f8324.jpg', 20),
(150, 62, '3 KG', 2100, 'assets/products/8b4323f153629c0f2539541008d7b15b.jpg,assets/products/2dfb957e8ba75e2546f1ed01da6635be.jpg,assets/products/a0629dccdb6b04d143f8758f65367a1e.jpg', 20),
(151, 62, '5 KG', 3599, 'assets/products/c0cffe11bbf1f7f2e4d34aec88ecad88.jpg,assets/products/96148fca14fa1772189bb0370605e33c.jpg,assets/products/4ec39f7a278d88e07ca0cf6a935dc5c8.jpg', 20),
(152, 63, '1 KG', 250, 'assets/products/5ce365725903f822c32398f9f3d2c947.jpg', 20),
(153, 63, '3 KG', 750, 'assets/products/478967c2324e643c7ddc2bf9987a1b63.jpg', 20),
(154, 64, '1 KG', 449, 'assets/products/bcf925734efe9924b6894894a5b41854.jpg,assets/products/49197508a4a805193e9545e02ddfc730.jpg', 30),
(155, 64, '3 KG', 1349, 'assets/products/5ac19e2d177aa8e61bdbe41680650dcc.jpg,assets/products/ebef00374ee99ed9a38801e5a4b6f259.jpg', 30),
(156, 64, '5 KG', 2299, 'assets/products/1d1e7c5631290ef7375f9f5c4f9c3d6d.jpg,assets/products/f9ac803c0274ff2b5d60d04dbb755091.jpg', 30),
(157, 65, '1 KG', 1650, 'assets/products/268d6d415a6f909aa9e74838d22f3ffd.jpg,assets/products/852715e8a13901347c140392889db7c9.jpg,assets/products/54146859232a0ae14aa2aba471998bf4.jpg,assets/products/b323bef6d540c19cdf83b236756ae3db.jpg', 30),
(158, 65, '3 KG', 4950, 'assets/products/58f0e127cda50c4472e8a7be6ede286d.jpg,assets/products/3c4879df8e86022d49de2a2f536c026f.jpg,assets/products/5c9bc7ce4a9bfda3df72dd21d3dedc9e.jpg,assets/products/e5feb97af2d73f5b1acc24f9f2257595.jpg', 30),
(159, 66, '500 ML', 349, 'assets/products/e959f2bd28ad89a1adeda282cc62878f.jpg,assets/products/c739a6f59566601be20278322a3fb116.jpg', 20),
(160, 66, '1 LTR', 699, 'assets/products/29423b47dfbdbffb83b53dbe58573d8c.jpg,assets/products/9926ae5660c68bcd3e3e71becaade560.jpg', 20),
(161, 67, '200 ML', 199, 'assets/products/d1186098bd2ca397331ddd9d82ad00f5.jpg,assets/products/889309a44a0929aa250fc504ed78ff49.jpg,assets/products/9b364d7fc236368f171082702d2095bd.jpg', 20),
(162, 67, '500 ML', 499, 'assets/products/d593d376d9fb70bd62755681823284cf.jpg,assets/products/5bef84afef85dd08ea642d011b771f5c.jpg,assets/products/bd60ab6a05a934458d5b7970f52e0cd0.jpg', 20),
(163, 68, '1 LTR', 999, 'assets/products/d625c00eb9d3fba58757609c9bcfa44d.jpg,assets/products/4593a020723f60dd1ea400c35136286d.jpg', 20),
(164, 68, '3 LTR', 2999, 'assets/products/7ffbbb63a6c351b1dfb43cd18002ad12.jpg,assets/products/1362c5746ef15c4e3fff52b18a736b94.jpg', 20),
(165, 69, '250 GMS', 499, 'assets/products/ea479094e1cb92d379dfa2e2dec21b9a.jpg,assets/products/015a0770aed92a9b43872a2b99548e59.jpg,assets/products/5f399e3b3cb67853a1e113b50d68aef3.jpg,assets/products/b41275be43a4d0527d8ed6753bc1be28.jpg', 20),
(166, 69, '500 GMS', 999, 'assets/products/6bd75fa5b0a7fd1d438d82def4f94e4e.jpg,assets/products/9bed35f36b7e9d51c62568609a9c6280.jpg,assets/products/32f524dd258f7d0c34a2457f816b2f48.jpg,assets/products/aaabab1c1f86376c56c2209893c6c925.jpg', 20),
(167, 69, '1 KG', 1999, 'assets/products/aa5f989aa9cdbdd9c8490825086ebe14.jpg,assets/products/1a13cc51a7f5825af4137c5b73b6c25a.jpg,assets/products/d218b8657425eed5f0e8a0d6d1478904.jpg,assets/products/ac18fe4d7befece3ba386f0ec88e3d1e.jpg', 20),
(168, 70, '500 GMS', 399, 'assets/products/b287063af28d82345dd0fdd666220f78.jpg,assets/products/f380ce27e822d429dfaaec75e7937069.jpg', 29),
(169, 70, '1 KG', 799, 'assets/products/e09a1191f308b4beb1c42e42d35c0ca2.jpg,assets/products/88881b23c294d082edc595860e53240e.jpg', 30),
(170, 70, '3 KG', 1299, 'assets/products/142898347aa59e4257d6fa03af93b41e.jpg,assets/products/5fb339bff760ccd0b35c6ed5fff2c9ff.jpg', 30),
(171, 71, '100 GMS', 199, 'assets/products/a27ebd2e474c4b3562c45347ffdc2f78.jpg,assets/products/3e7137a8215aac72f86ccee9d627689c.jpg,assets/products/57f619db579864b00340c231c4e9de54.jpg', 30),
(172, 71, '250 GMS', 499, 'assets/products/e39b145ff1704402edc71aa1b6ae26ea.jpg,assets/products/874975f02af07afaaa94ba4ed30255b6.jpg,assets/products/ec6cbe67c226cc88ab1fe4fdb12108c2.jpg', 30),
(173, 71, '500 GMS', 999, 'assets/products/239b6d1423d103d44dec1d2dd5990ffc.jpg,assets/products/3e95d2fdfad2550ae9e16c16fbdc825e.jpg,assets/products/1c2a615763383faa9ec351473878d065.jpg', 30),
(174, 72, '250 GMS', 249, 'assets/products/3afe3a09d4be3c877f08ab7a477eed95.jpg,assets/products/31bb804fe0518d2745f490da30e2637a.jpg,assets/products/edc3198da42a9f3c5e7fcad9dfe067c6.jpg', 20),
(175, 72, '500 GMS', 499, 'assets/products/618000dc6f887e8add3bd4435396d0bd.jpg,assets/products/c8a29dec1671373566f4d1ce74a43f85.jpg,assets/products/a90fd6e372cdf16a3e8692c9431b0749.jpg', 20),
(176, 72, '1 KG', 999, 'assets/products/b95754b814a73454f4999911d6f97616.jpg,assets/products/b8065d1ed2936933c9933a51bbba8fc2.jpg,assets/products/e3a29d68aab96c616c63b031be770e9d.jpg', 20),
(177, 73, '50 ML', 250, 'assets/products/87e3db4bfded38cdd19020fda1763120.jpg,assets/products/9b21f4bcf7b53f0f032c87599382ebd2.jpg,assets/products/453812b78c75284624f174045effa8fd.jpg', 30),
(178, 73, '100 ML', 500, 'assets/products/948f7894d43e83066550b2a0ffd5144f.jpg,assets/products/451a681ffd954da623fa5409ca5a2248.jpg,assets/products/289cdf6a9346c7d6eff282bae2f5040c.jpg', 30),
(179, 73, '150 ML', 749, 'assets/products/3ea75ab9ba22217bc28a017e1e1a9f77.jpg,assets/products/c2446e8a47780bba804992c60ce9f279.jpg,assets/products/5cf98e5c32ecd774b947ddb57d41486c.jpg', 30),
(180, 74, '200 ML', 449, 'assets/products/77bdf19ba35416cc3996de56457f7986.jpg,assets/products/f66911dd6c3eaf86454878659710e5b8.jpg,assets/products/3d64ad223452a86f28d35446b1b579b0.jpg', 20),
(181, 74, '500 ML', 899, 'assets/products/9bc0ada8aeb0d4d438d24b63a43cb558.jpg,assets/products/bb1203a1b8251b5fe6e93de1527e0797.jpg,assets/products/6680abae78560c55e047ff02583a2e2c.jpg', 20),
(182, 74, '1 LTR', 1799, 'assets/products/b4f5657b46d97385b577c374df691bdd.jpg,assets/products/4296f42ccf9c57cddd63e2eaa48a6067.jpg,assets/products/97efaf1668c9c2c3f74aa9e06ae54b3d.jpg', 20),
(183, 75, '500 ML', 999, 'assets/products/e117feab9a557901780574514d7a5fd4.jpg,assets/products/011378ae2ea34f6af6b8a37def57edd9.jpg,assets/products/a28ee69aa4f8c217ec3aa35409b9e7b8.jpg', 25),
(184, 75, '1 LTR', 1999, 'assets/products/7b4bc404ec101512f5552a4923272856.jpg,assets/products/7fc6f2fb62159492c0aab25387780722.jpg,assets/products/1bcf56a70126bbbd71bfe0c5cb5df359.jpg', 25),
(185, 75, '3 LTR', 5999, 'assets/products/7b3eb886c69fac1c3276652952789fac.jpg,assets/products/0bf95da021c5a910bce83dbfac26fc76.jpg,assets/products/9bba684fe053b2129e6f435c56e5e63b.jpg', 25),
(186, 76, '3 LTR', 999, 'assets/products/95e0108b5febd00ee2dbeed14bf74a8c.jpg,assets/products/63f41bb1a6a0a176babb334d34a21975.jpg,assets/products/59f744da60c4edc2475dd863ca27bb79.jpg,assets/products/6032c5036a86fe19908635fc0744df7c.jpg', 30),
(187, 76, '5 LTR', 1899, 'assets/products/93aa7d162a56d4cbda7b990a383822e4.jpg,assets/products/fcee42765a631f719c59a83f51200c4f.jpg,assets/products/a00c51613796f9d58dfe8b782b99d91b.jpg,assets/products/c4efee035ab288ca51bcdd6cd8785bf1.jpg', 30),
(188, 77, '1 LTR', 389, 'assets/products/20396f238cf8e0914a7ee87e9c400ce5.jpg,assets/products/518bf1e6b76ad063655a2416fc390e12.jpg', 20),
(189, 77, '3 LTR', 1099, 'assets/products/a4522833dfdc6b177bce7b10f148c423.jpg,assets/products/a98e10e1836765f77be0918ae397cad5.jpg', 20),
(190, 78, '250 ML', 499, 'assets/products/65ad18026dd96afec8ccedb509ef5573.jpg,assets/products/f88cb9bbfe5ee83235af0e5c36802e4f.jpg', 30),
(191, 78, '500 ML', 999, 'assets/products/52ad1c95791bf7974909a8e633552516.jpg,assets/products/a2718f6995c5a4128e8631d578d7a84a.jpg', 30),
(192, 79, '1 LTR', 2499, 'assets/products/40a654d91c8c59ff46cddcc09563b9f9.jpg', 20),
(193, 79, '3 LTR', 7499, 'assets/products/9a594dd91905531f1b3724a380d3135d.jpg', 20),
(194, 79, '5 LTR', 12495, 'assets/products/f129d451a49d1ed250c4006a6005be52.jpg', 20),
(195, 80, '200 ML', 249, 'assets/products/36e373c5c6b9fe668c9bb0c9f12e102c.jpg,assets/products/439012ca1fd540d62584c59e5d20c464.jpg', 15),
(196, 81, '1 LTR', 659, 'assets/products/2a7b0f45775e0fbb4991050fbeebd85b.jpg,assets/products/4ab872887813128efe03b8924c000957.jpg,assets/products/4d2284e2f8eda88335768dcfc9e201c4.jpg', 20),
(197, 81, '3 LTR', 1969, 'assets/products/56e937222eac9ab7e60a58cac6fc1fa7.jpg,assets/products/5d9f33431d4aac12530d2d08908ca885.jpg,assets/products/f328454ae93d7304eb47dd5acb910006.jpg', 17),
(198, 82, '1 KG', 449, 'assets/products/82630723812f62b725eef18e32017181.jpg,assets/products/8351b3b5effc31c98ab4ccccce4eea4d.jpg,assets/products/ad3fce6484528fd1962493d82f047c52.jpg', 20),
(199, 82, '3 KG', 1349, 'assets/products/6523e62808169d42f64c02b716675958.jpg,assets/products/9e6ab87c087ff2e35c3f23a829241f69.jpg,assets/products/6ee242f61fcaf6c2240ce30e1ec62ef5.jpg', 20),
(200, 82, '5 KG', 2249, 'assets/products/4425eb493a7e558b7c6f10806c3ad69b.jpg,assets/products/b3a14741c4511ef05e984cadc80473af.jpg,assets/products/3a82b55964497bcc6d27bccdd834873e.jpg', 20),
(201, 83, '1 KG', 750, 'assets/products/204031239fe08dbf8b91f1a75403887d.jpg,assets/products/c740fe73b501860362e73afc97fb9dd5.jpg,assets/products/8b407be8aac7c34635530a77bed02081.jpg', 20),
(202, 83, '3 KG', 2250, 'assets/products/2103251092f46cbd864c61e1dd29fb0f.jpg,assets/products/b3a91a21de56794fc087dab31fdb8c18.jpg,assets/products/1150ee501a872f23d3b5f9562d378181.jpg', 20),
(203, 84, '100 ML', 349, 'assets/products/6a97bf017f1bd71a8b717e257a117870.jpg,assets/products/99956d032df1df9b11b682803c637931.jpg,assets/products/c65ff398aaf32bda31412871ea6b758d.jpg', 20),
(204, 84, '200 ML', 799, 'assets/products/b5df41e223a0fe464d6e477b7f1e4948.jpg,assets/products/1989f276574a5af5551febbff32e73aa.jpg,assets/products/525097a2765e66da41a5d66927c786e1.jpg', 20),
(205, 84, '500 ML', 1599, 'assets/products/4002413a606bbd1ba474dc624d275112.jpg,assets/products/b3856add5b512d69a4b256ce3cf94555.jpg,assets/products/0ed43d0bf49929625b11b531bcaad2be.jpg', 20),
(206, 85, '1 KG', 750, 'assets/products/62a989e51ca846cddf7beef912f97725.jpg,assets/products/6a79140efe14b815abfdf914f43467b8.jpg,assets/products/e3b011c340b2fc79e8faf7dd12b1561a.jpg,assets/products/de3a221c9e90f1c7038888a6a7d72c26.jpg', 20),
(207, 85, '3 KG', 2299, 'assets/products/4b2835052b316b815ecbd0e8300a1579.jpg,assets/products/1dd6322bc1099f548acefbeaa7074b72.jpg,assets/products/48faf82c6d30df7d1ab4ad9550127349.jpg,assets/products/ac57a9b114c83722cebda4bdc24de985.jpg', 20),
(208, 86, '1 LTR', 449, 'assets/products/583be3540d6dd710b89516b7b2e2eea7.jpg,assets/products/380e73fce89f7ebc4ec89a716160f494.jpg,assets/products/845609867d079c09b49ef66d186b249d.jpg', 20),
(209, 86, '3 LTR', 1349, 'assets/products/d4e1b686fe324db79b2821990c2810b4.jpg,assets/products/0910f6efae355522734615525e5464e6.jpg,assets/products/198838280df2f9c36646bac7c50d6a15.jpg', 20),
(210, 86, '5 LTR', 2249, 'assets/products/a67b7de4a33675c7cec110cab3dad05f.jpg,assets/products/cc8743e99b7eac31b881dadaad49c1fb.jpg,assets/products/be659fc21aa3682dcf195648792ef034.jpg', 20),
(211, 87, '1 KG', 550, 'assets/products/7cb860e1c893bc4f854a94500d0729d8.jpg,assets/products/797954ba8a1cda73fc2a7d62bcea6256.jpg,assets/products/f4b7c38f8919231603b61f20df800950.jpg', 20),
(212, 87, '3 KG', 1650, 'assets/products/bbe0f62ab2944f57cb676d08b2bd364f.jpg,assets/products/fb5c0e43433f315b5a1e9d582dee625e.jpg,assets/products/df863c772dbf9bf972ac51a924dc2fa3.jpg', 20),
(213, 88, '1 KG', 999, 'assets/products/3b22da065162b4d1cc8213fdb133b13d.jpg,assets/products/7888970d363f348dd9cb2191f084640d.jpg,assets/products/25cffd575ec4a25b701616e1cad7d86e.jpg', 19),
(214, 88, '3 KG', 2999, 'assets/products/a06fb71335c3903c9150da1bd5c57493.jpg,assets/products/4ecefe8887523117d0fa5bf9005e7f72.jpg,assets/products/adb94ec844961c19f33b52e48eb605a0.jpg', 20),
(215, 89, '1 KG', 300, 'assets/products/f5e22abb4d32f6f1b668dba355ac2d38.jpg,assets/products/2422e938c5aaed5003479dd5de709d2b.jpg,assets/products/21b76d87240f845a838e30729481cf1a.jpg', 10),
(216, 90, '1 KG', 750, 'assets/products/55abc7b9e73cd829984c47581af57458.jpg,assets/products/6a7fd9d7f0f0f3c55d500a7552a9bdcf.jpg', 20),
(217, 90, '3 KG', 2249, 'assets/products/57c6cc987aceca46d61994e14611a8ac.jpg,assets/products/1b5878119baa52275c47f609067da92e.jpg', 20),
(218, 91, '500 ML', 300, 'assets/products/ab000acc0682a9f186bcf563ef192589.jpg,assets/products/b8a883d47fd473a2c7cbb20f9cd462bf.jpg,assets/products/901dc2411e3027e276749aa344761e5f.jpg', 10),
(219, 91, '1 LTR', 600, 'assets/products/5992ab53cca74dd5b1d9d679fecb7f21.jpg,assets/products/b19b6f5077d2d3988581a7da96ec9ac3.jpg,assets/products/697f7a69d2dcc32b648492ff16afccae.jpg', 10),
(220, 92, '250 GMS', 659, 'assets/products/ce63a77e9a4983750f49768c365743a3.jpg', 20),
(221, 92, '500 GMS', 1300, 'assets/products/411de23bee583d27a2611f3db690899a.jpg', 20),
(222, 93, '250 GMS', 450, 'assets/products/e550fed2af1b775460a3aef0b51516a9.jpg,assets/products/ef6761af865ca8cf1d825119863ba2cc.jpg,assets/products/f38488a68cc04221e553c04cafeb3239.jpg', 20),
(223, 93, '500 GMS', 900, 'assets/products/3c39718a78caa7f5f5b63da8a72bb779.jpg,assets/products/88deb885b1995176fda5835936f8a922.jpg,assets/products/8f1288281f895921d34b67b09f25b0c6.jpg', 20),
(224, 94, '1 KG', 849, 'assets/products/30aa033f9c7d35947d695efefb47be98.jpg', 20),
(225, 94, '3 KG', 2400, 'assets/products/ca26faca41e5f587dbdb610f4332b76f.jpg', 20),
(226, 95, '250 ML', 1900, 'assets/products/f24a9879fc84dc64a04b7991c624eaee.jpg', 9),
(227, 95, '500 ML', 3899, 'assets/products/8a824049c9c4fc1bed87f9ab8a22aecd.jpg', 10),
(228, 96, '100 GMS', 499, 'assets/products/27df76410f62ddc7f43b24396cb58f5d.jpg,assets/products/6b61badeb91d918d943eb779d8040fb0.jpg', 15),
(229, 96, '250 GMS', 999, 'assets/products/987c31726989d39abc0aec632fe75108.jpg,assets/products/680c2cd4caf105a2627531e4c9b48d04.jpg', 15),
(230, 96, '500 GMS', 1999, 'assets/products/c1fe48ba423d754c15eeb9171c1dea57.jpg,assets/products/94254a58ff42734084a561c1eff950ed.jpg', 15),
(231, 97, '200 ML', 300, 'assets/products/3a8fc4c3be2bdf34a56b6b2e32757860.jpg,assets/products/de7b536919f3e877f878c8bdf1dcf3c0.jpg', 9),
(232, 97, '500 ML', 700, 'assets/products/1aaeb28897db781f9fef025eeeb3b930.jpg,assets/products/9b36d3a7f3320018a4664c2360196b17.jpg', 10),
(233, 98, '100 GMS', 255, 'assets/products/6e9336eb097aeb3711eb2f3d66e1ccb6.jpg,assets/products/4124d8ef84b007c36cbb7f56bddf9551.jpg', 20),
(234, 98, '250 GMS', 549, 'assets/products/0fd9ed6c479915a19ab8827bb0aeb7fa.jpg,assets/products/119ec9fa809d2f5a16681cfa476a750e.jpg', 20),
(235, 99, '500 GMS', 499, 'assets/products/4e69f2b75633495778dee0daab8af254.jpg,assets/products/8c6556b95ca4b1c03f8bab987c1499ac.jpg,assets/products/8e0d1195ac8d888a985703ee2e9df79e.jpg', 20),
(236, 99, '1 KG', 999, 'assets/products/637339fc30435af966b0c0259699b71c.jpg,assets/products/755a25911180a120de71d2df591b66f2.jpg,assets/products/b8c9d1e60fcea0edc8db62943d02ffce.jpg', 20),
(237, 100, '250 ML', 300, 'assets/products/7ed8b360a8a24161d3a4726d01db9623.jpg', 20),
(238, 100, '500 ML', 600, 'assets/products/997e0621d3c86149062572a803d2efb4.jpg', 20),
(239, 100, '1 LTR', 900, 'assets/products/48cb4b545f7e0748e5428a857b7f5339.jpg', 20),
(240, 101, '5 KG', 500, 'assets/products/26d93ccae917c1b41b790a6f4a2a0be1.jpg,assets/products/23225042d9059f0e49a593ded5dde429.jpg,assets/products/00fca0d0cf031a9bbc351511aa855be8.jpg', 20),
(241, 101, '10 KG', 1000, 'assets/products/76fed2ea415707df053fd9cc9da52f5f.jpg,assets/products/c4666086c46f41161e8f5bea60cea369.jpg,assets/products/d84bcd600ef40138356c775872a9487e.jpg', 20),
(242, 101, '20 KG', 2000, 'assets/products/ce8e94d6064015a38e120f87782004fd.jpg,assets/products/65eaddb956fd7c76d5e17caa6b5513bc.jpg,assets/products/4f059151d2ff4ec5e73263f890bf9085.jpg', 20),
(243, 102, '10 KG', 900, 'assets/products/ba953ad049a9583700a5e5b3b2b9190e.jpg,assets/products/3ed5aaa0d029d04f7344cfca40370be8.jpg', 16),
(244, 102, '20 KG', 1800, 'assets/products/53d279af2e91f3a359b680a80645fb95.jpg,assets/products/814636c47334acbf0705209e88d4f279.jpg', 20),
(245, 103, '1 KG', 600, 'assets/products/dbfd5cd8850b8ec89ed8c4a30fcd8a5f.jpg,assets/products/59cc9be1f2568644a950bcdc7849fcfa.jpg,assets/products/6d67b19b27ae30f677d6007e950d69eb.jpg', 14),
(246, 103, '3 KG', 1800, 'assets/products/c8dbeffb754da94545118805a57aeb4c.jpg,assets/products/2a4d6e7bc583754f5625649dc385261e.jpg,assets/products/6ed8e3044e2be63c3120e0d41c38abe3.jpg', 15),
(247, 104, '1 KG', 700, 'assets/products/806ba6b9d49f7755a4c5386cefda7f84.jpg,assets/products/1cda679c51b35eaaf58b5b00bac60c23.jpg', 19),
(248, 104, '3 KG', 2100, 'assets/products/e6e464d6903e78aae1445b2750a831e0.jpg,assets/products/34980bbdd818c0bc23b2fe26686aa4a5.jpg', 20),
(249, 105, '5 KG', 599, 'assets/products/0b9fcd3f0adc75ae8fd9eadd37fe1ce5.jpg,assets/products/02fbbb4efe0825eea20f87719f77f911.jpg,assets/products/fbf03dcfdeb1fb067b803f870279f2d0.jpg', 15),
(250, 105, '10 KG', 1200, 'assets/products/3c43dbd3f92a8effc66f31ea542583b7.jpg,assets/products/ec7952c87ecc6207729f541b9ec37055.jpg,assets/products/ac46ebdfcfa2a8daa38bfd93f9ad817c.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promocode`
--

CREATE TABLE `tbl_promocode` (
  `promocode_id` int(5) NOT NULL,
  `code` varchar(50) NOT NULL,
  `amount` int(5) NOT NULL,
  `min_bill_price` int(5) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_promocode`
--

INSERT INTO `tbl_promocode` (`promocode_id`, `code`, `amount`, `min_bill_price`, `status`) VALUES
(1, 'Sun100', 100, 1000, 1),
(2, 'Holi500', 500, 5000, 1),
(3, 'Shop50', 50, 500, 1),
(4, 'Stud100', 100, 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recent_view`
--

CREATE TABLE `tbl_recent_view` (
  `view_id` int(5) NOT NULL,
  `register_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_recent_view`
--

INSERT INTO `tbl_recent_view` (`view_id`, `register_id`, `product_id`) VALUES
(18, 17, 15),
(19, 17, 102),
(20, 17, 97),
(21, 17, 18),
(22, 17, 103),
(23, 17, 28),
(24, 17, 35),
(25, 17, 88),
(26, 18, 30),
(27, 18, 102),
(28, 18, 105),
(29, 18, 70),
(30, 19, 101),
(31, 21, 65),
(32, 22, 99),
(33, 22, 98),
(34, 23, 105),
(35, 23, 43),
(36, 23, 97),
(37, 23, 99),
(38, 23, 15),
(39, 23, 28),
(40, 23, 28),
(41, 23, 102),
(42, 23, 95);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `register_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `password` varchar(12000) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `birth_date` date NOT NULL,
  `join_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`register_id`, `name`, `email`, `mobile`, `profile_pic`, `password`, `gender`, `birth_date`, `join_date`, `last_login`, `status`) VALUES
(23, 'Dhruvik', 'dhruvikmaru18@gmail.com', '', 'assets/member/profile_23.png', '0fff47785722404c6a9a271882f666de9e56a9b66fdb8ac819b4b094ce7de887a8f3c575769cfa2ef40fb50eb213196fc2eb6e43389bc18368715940b9f349d0kRYsWpMFVTjHHj3tbKxAC9v9LFn7PODOZBVFtsVmyEs=', '', '0000-00-00', '2025-09-24', '2025-09-30 02:41:02', 1),
(24, 'Kunj', 'kunj.koladiya1972@gmail.com', '', '', 'c925762c31bd87d5d4c72536526e226fa0bb05cb28de9a42b441688370cc9cc5ff967c38ed46f929a0cf08915a6cb234504e505926465e7c6ea0c699b5afdb914jpdRfNoeo29FoNEJs6MtIPUs1Kj+Ttu0q4j14tyrsk=', '', '0000-00-00', '2025-09-27', '2025-09-27 07:58:52', 1),
(25, 'Sunny', 'sunnysorathiya7@gmail.com', '', '', 'af909cfe38891d7f0fbc71629dfa0b89a6cc976b4eb4fa750d171c1a476d50c3b10ebbd33b11aed567a3c4f110e328a74e6644a6c28d9568b1fe591256a1360fl6pSkg79x6uvOm7h459vs1cRLhkfsSsNIs0VtgBuijg=', '', '0000-00-00', '2025-09-27', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(5) NOT NULL,
  `register_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `rating` int(5) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipment`
--

CREATE TABLE `tbl_shipment` (
  `shipment_id` int(5) NOT NULL,
  `register_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location_id` int(5) NOT NULL,
  `address` varchar(300) NOT NULL,
  `address_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shipment`
--

INSERT INTO `tbl_shipment` (`shipment_id`, `register_id`, `name`, `location_id`, `address`, `address_type`) VALUES
(15, 22, 'Dhruvik', 56, '123', 'home'),
(16, 23, 'Dhruvik', 56, '123', 'home');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transaction_id` int(5) NOT NULL,
  `bill_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `image_id` int(5) NOT NULL,
  `gross_id` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `total_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transaction_id`, `bill_id`, `product_id`, `image_id`, `gross_id`, `qty`, `total_price`) VALUES
(26, 19, 104, 247, 700, 1, 700),
(27, 20, 15, 16, 210, 1, 210),
(28, 21, 102, 243, 900, 1, 900),
(29, 22, 97, 231, 300, 1, 300),
(30, 23, 18, 26, 499, 1, 499),
(31, 24, 103, 245, 600, 1, 600),
(32, 25, 28, 60, 75, 4, 300),
(33, 26, 88, 213, 999, 1, 999),
(34, 27, 30, 66, 179, 1, 179),
(35, 28, 102, 243, 900, 1, 900),
(36, 29, 105, 249, 599, 2, 1198),
(37, 30, 70, 168, 399, 1, 399),
(38, 31, 105, 249, 599, 1, 599),
(39, 31, 43, 104, 999, 1, 999),
(40, 32, 28, 60, 75, 1, 75),
(41, 32, 102, 243, 900, 1, 900),
(42, 33, 102, 243, 900, 1, 900),
(43, 34, 95, 226, 1900, 1, 1900);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wish_id` int(5) NOT NULL,
  `register_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wish_id`, `register_id`, `product_id`) VALUES
(33, 17, 15),
(35, 17, 102),
(36, 18, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_email_subscriber`
--
ALTER TABLE `tbl_email_subscriber`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  ADD PRIMARY KEY (`promocode_id`);

--
-- Indexes for table `tbl_recent_view`
--
ALTER TABLE `tbl_recent_view`
  ADD PRIMARY KEY (`view_id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`register_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  ADD PRIMARY KEY (`shipment_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `banner_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  MODIFY `bill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `contact_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_email_subscriber`
--
ALTER TABLE `tbl_email_subscriber`
  MODIFY `subscriber_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `location_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  MODIFY `offer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  MODIFY `image_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  MODIFY `promocode_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_recent_view`
--
ALTER TABLE `tbl_recent_view`
  MODIFY `view_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `register_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  MODIFY `shipment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `transaction_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wish_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
