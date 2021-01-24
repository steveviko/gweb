-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 05:43 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'admin', '2017-01-24 16:21:18', '25-01-2017 12:05:43 AM');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(25) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `qty` int(25) NOT NULL,
  `productCode` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `productName`, `productPrice`, `productImage`, `qty`, `productCode`, `ip_add`) VALUES
(9, ' test product beach', ' 40', ' loginsystem.png', 1, 5, '::1'),
(10, ' test product name', ' 40', ' customerCLIP.jpg', 1, 1, '::1'),
(11, ' test product name3', ' 40', ' psOnlineOrder.png', 1, 3, '::1'),
(12, ' test product name', ' 40', ' psAddFormCsharpS.png', 1, 4, '::1'),
(13, ' Diamond ring', ' 300000', ' 18597101861698380152.jpg', 1, 6, '::1'),
(14, ' ', ' ', ' ', 1, 0, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` longtext NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'test category', 'category', '2018-12-04 23:35:35', ''),
(2, 'Beachs', 'Beaches', '2018-12-11 21:15:26', ''),
(3, 'Engagement Rings', '', '2020-06-24 22:05:15', ''),
(4, 'Wedding Rings', '', '2020-06-24 22:05:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(25) NOT NULL,
  `qty` int(25) NOT NULL,
  `product_Code` int(25) NOT NULL,
  `product_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `body_message` varchar(255) NOT NULL,
  `message_type` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `contact`, `body_message`, `message_type`, `email`) VALUES
(1, 'stevenviko', '07898986000', 'hhhhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'Technical issue', 'stevenviko@yahoo.com'),
(2, 'teph', '09092735719', 'nnnnnnnnnnnnnnnnnnn', 'Money refund', 'mike@example.com'),
(3, 'administrator', '09092735719', 'nnnnnnnnnnnnnnnnnnnnnnnnn', 'Recommendation', 'rizwan@gmail.com'),
(4, 'teph', '07898986000', 'uuuuuuuuuuuuuuuuuuuuuuuu', 'Money refund', 'stevenviko@yahoo.com'),
(5, 'geoo', '078989000000', 'its ok', 'Technical issue', 'darwin@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(25) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `AreaZone` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `products` varchar(255) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `userId` int(25) NOT NULL,
  `orderStatus` varchar(255) NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `orderDate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `productId` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `phone`, `AreaZone`, `customer_address`, `products`, `total_amount`, `userId`, `orderStatus`, `paymentMethod`, `orderDate`, `productId`, `quantity`) VALUES
(1, 'steven opio', '077325626223', 'nakawa', 'hhhhhhhhhhhhhhhhh', ' test product name3(7), test product name(5), test product beach(3)', '600', 1, 'pending', 'COD', '2020-06-24 06:37:21.466751', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 1, 'in Process', 'asdas', '2018-12-11 20:30:12'),
(2, 1, 'Delivered', 'zx', '2018-12-11 20:56:18'),
(3, 2, 'Declined', 'sad', '2018-12-12 09:29:56'),
(4, 2, 'in Process', 'zxc', '2018-12-12 09:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quality` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `review` longtext NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(100) NOT NULL,
  `rating` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`, `author`, `rating`) VALUES
(2, 3, 4, 5, 5, 'Anuj Kumar', 'BEST PRODUCT FOR ME :)', 'BEST PRODUCT FOR ME :)', '2017-02-26 20:43:57', '', 0),
(3, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:52:46', '', 0),
(4, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:59:19', '', 0),
(5, 1, 3, 3, 3, 'steven opio', 'its cool', 'greate product', '2020-06-29 17:56:02', '', 0),
(6, 1, 3, 3, 3, 'steven opio', 'its cool', 'greate product', '2020-06-29 17:58:01', '', 0),
(7, 10, 3, 3, 3, 'caller hjob', 'its alright', 'i like it', '2020-06-29 18:01:57', '', 0),
(8, 12, 3, 3, 3, 'shirt', 'it quite okay', 'from mi to u', '2020-06-29 18:17:04', '', 0),
(9, 12, 3, 3, 3, 'shirt', 'it quite okay', 'from mi to u', '2020-06-29 18:20:50', '', 0),
(10, 6, 5, 0, 1, 'caller hjob', 'the best u can ever purchase', 'it all i ever wanted to wear', '2020-07-06 23:11:34', '', 0),
(11, 4, 4, 0, 1, 'steven opio', 'its alright', 'hhhhhhhhhhhhhhhhhhhhcvccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', '2020-07-06 23:16:12', '', 0),
(12, 4, 4, 0, 1, 'steven opio', 'its alright', 'hhhhhhhhhhhhhhhhhhhhcvccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', '2020-07-06 23:16:21', '', 0),
(13, 6, 0, 0, 4, 'sjhjbasnl;sa,s', 'nsc;as,c', 'kjdshvjv', '2020-07-07 10:06:31', '', 0),
(14, 6, 3, 3, 3, 'klxxx', 'x,x,x', 'klxnz;x;z', '2020-07-07 10:07:08', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productCompany` varchar(255) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productPriceBeforeDiscount` int(11) NOT NULL,
  `productDescription` longtext NOT NULL,
  `productImage1` varchar(255) NOT NULL,
  `productImage2` varchar(255) NOT NULL,
  `productImage3` varchar(255) NOT NULL,
  `shippingCharge` int(11) NOT NULL,
  `productAvailability` varchar(255) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  `sex` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`, `sex`) VALUES
(1, 1, 13, 'test product name', 'test company', 40, 35, 'this is test products', '8167180521785802299.jpg', '7.jpg', '8.jpg', 100, 'In Stock', '2018-12-04 23:37:07', '', ''),
(3, 1, 13, 'test product name3', 'test company3', 40, 35, 'estint', '5.jpg', 'settingsCLIP.jpg', 'reportClip.png', 100, 'Out of Stock', '2018-12-05 04:00:59', '', ''),
(4, 1, 13, 'test product name', 'test company2', 40, 35, 'qwasa', '1.jpg', 'psCreateWindowsFomCSharp.png', 'reportClip.png', 100, 'In Stock', '2018-12-06 06:24:22', '', ''),
(5, 2, 14, 'test product beach', 'test company beach', 40, 35, 'this is beach', '9.jpg', 'loginClip.gif', 'new.jpg', 100, 'In Stock', '2018-12-11 21:17:01', '', ''),
(6, 3, 16, 'Diamond ring', 'just ebb', 300000, 400000, 'this is the best in town', '18597101861698380152.jpg', '19610990381873449251.jpg', '20969919121699133260.jpg', 30, 'In Stock', '2020-06-24 22:23:16', '', ''),
(7, 4, 19, 'mens diamonds', 'just ebb', 500000, 500000, 'For all engagements for men', '1.jpg', '8.jpg', '7.jpg', 30, 'In Stock', '2020-06-24 22:25:48', '', ''),
(8, 4, 18, 'gold ring', 'just ebb', 700000, 1000000, 'its golden ring', '11.jpg', '10.jpg', '5.jpg', 30, 'In Stock', '2020-06-24 22:28:13', '', ''),
(9, 4, 19, 'lady ring', 'just ebb', 300000, 400000, 'its for the ladies', '1.jpg', '10.jpg', '12.jpg', 30, 'In Stock', '2020-06-24 22:39:33', '', ''),
(10, 4, 19, 'the ring', 'just ebb', 300000, 500000, 'nnnnnnnnnnnhhhhhhhhhhhhhhjjjjjjjj', '2227175251849598159.jpg', '19610990381873449251.jpg', '18597101861698380152.jpg', 30, 'In Stock', '2020-06-27 19:18:52', '', 'Male'),
(11, 4, 19, 'the ring', 'just ebb', 300000, 500000, 'nnnnnnnnnnnhhhhhhhhhhhhhhjjjjjjjj', '2227175251849598159.jpg', '19610990381873449251.jpg', '18597101861698380152.jpg', 30, 'In Stock', '2020-06-27 19:20:43', '', 'Male'),
(12, 4, 18, 'my ringa', 'just ebb', 500000, 400000, 'gggggggggggggggggggggggffffffffffffffffffffffffffffccccccccccccccccc', '-6293416591459455010.jpg', '20969919121699133260.jpg', '18597101861698380152.jpg', 30, 'In Stock', '2020-06-27 19:27:56', '', 'Female'),
(13, 3, 17, 'engage ring', 'ebb', 700000, 700000, 'nnnnnnnnnnnnnnnnhhhhhhhhhhhhhhhhhhhhhhhhffffffffffffffffffffffffff', 'couple-engagement-rings-gold-marriage-204427.jpg', '20969919121699133260.jpg', '18597101861698380152.jpg', 50, 'In Stock', '2020-06-29 15:19:48', '', 'Male'),
(14, 3, 17, 'engage ring', 'ebb', 700000, 700000, 'nnnnnnnnnnnnnnnnhhhhhhhhhhhhhhhhhhhhhhhhffffffffffffffffffffffffff', 'couple-engagement-rings-gold-marriage-204427.jpg', '20969919121699133260.jpg', '18597101861698380152.jpg', 50, 'In Stock', '2020-06-30 17:38:20', '', 'Male'),
(15, 3, 8, 'all its ring', '', 200000, 0, 'its a great engagement ring for the ladies', '20969919121699133260.jpg', '8.jpg', '7.jpg', 0, 'In Stock', '2020-06-30 18:23:23', '', 'Female'),
(17, 3, 17, 'the rings 4', '', 1500, 0, 'its all for u ', '12.jpg', '2.jpg', '2.jpg', 0, 'In Stock', '2020-06-30 18:32:42', '', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `id` int(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `message_body` varchar(255) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `deliver_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE `sex` (
  `id` int(25) NOT NULL,
  `sexName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`id`, `sexName`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(2, 4, 'Led Television', '2017-01-26 16:24:52', '26-01-2017 11:03:40 PM'),
(3, 4, 'Television', '2017-01-26 16:29:09', ''),
(4, 4, 'Mobiles', '2017-01-30 16:55:48', ''),
(5, 4, 'Mobile Accessories', '2017-02-04 04:12:40', ''),
(6, 4, 'Laptops', '2017-02-04 04:13:00', ''),
(7, 4, 'Computers', '2017-02-04 04:13:27', ''),
(8, 3, 'Comics', '2017-02-04 04:13:54', ''),
(9, 5, 'Beds', '2017-02-04 04:36:45', ''),
(10, 5, 'Sofas', '2017-02-04 04:37:02', ''),
(11, 5, 'Dining Tables', '2017-02-04 04:37:51', ''),
(12, 6, 'Men Footwears', '2017-03-10 20:12:59', ''),
(13, 1, 'sub category', '2018-12-04 23:35:48', ''),
(14, 2, 'sub Beaches', '2018-12-11 21:15:48', ''),
(15, 3, 'Gold', '2020-06-24 22:12:57', ''),
(16, 3, 'Diamonds', '2020-06-24 22:13:15', ''),
(17, 3, 'Silver', '2020-06-24 22:13:30', ''),
(18, 4, 'Gold', '2020-06-24 22:13:43', ''),
(19, 4, 'Diamonds', '2020-06-24 22:13:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `subscribtions`
--

CREATE TABLE `subscribtions` (
  `id` int(25) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribtions`
--

INSERT INTO `subscribtions` (`id`, `email`) VALUES
(1, 'stevenviko@yahoo.com'),
(2, 'stevenviko@yahoo.com'),
(3, 'stevenviko@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory`
--

CREATE TABLE `tblinventory` (
  `INVENTORYID` int(11) NOT NULL,
  `PRODUCTID` int(11) NOT NULL,
  `IN_DATE` date NOT NULL,
  `STOCKIN` int(11) NOT NULL,
  `OUT_DATE` date NOT NULL,
  `STOCKOUT` int(11) NOT NULL,
  `REMAINING` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinventory`
--

INSERT INTO `tblinventory` (`INVENTORYID`, `PRODUCTID`, `IN_DATE`, `STOCKIN`, `OUT_DATE`, `STOCKOUT`, `REMAINING`) VALUES
(1, 3, '2018-12-05', 18, '0000-00-00', 0, 18),
(2, 1, '2018-12-05', 24, '0000-00-00', 2, 22),
(5, 4, '2018-12-06', 22, '0000-00-00', 0, 22),
(6, 5, '2018-12-12', 10, '0000-00-00', 0, 10),
(7, 0, '2020-06-25', 30, '0000-00-00', 0, 30),
(8, 0, '2020-06-25', 30, '0000-00-00', 0, 30),
(9, 0, '2020-06-25', 8, '0000-00-00', 0, 8),
(10, 0, '2020-06-25', 12, '0000-00-00', 0, 12),
(11, 0, '2020-06-27', 12, '0000-00-00', 0, 12),
(12, 0, '2020-06-27', 12, '0000-00-00', 0, 12),
(13, 0, '2020-06-27', 12, '0000-00-00', 0, 12),
(14, 0, '2020-06-27', 12, '0000-00-00', 0, 12),
(15, 0, '2020-06-27', 12, '0000-00-00', 0, 12),
(16, 0, '2020-06-27', 12, '0000-00-00', 0, 12),
(17, 13, '2020-06-29', 40, '0000-00-00', 0, 40),
(18, 14, '2020-06-30', 40, '0000-00-00', 0, 40),
(19, 15, '2020-06-30', 20, '0000-00-00', 0, 20),
(20, 16, '2020-06-30', 20, '0000-00-00', 0, 20),
(21, 17, '2020-06-30', 20, '0000-00-00', 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 11:18:50', '', 1),
(2, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 11:29:33', '', 1),
(3, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 11:30:11', '', 1),
(4, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 15:00:23', '26-02-2017 11:12:06 PM', 1),
(5, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:08:58', '', 0),
(6, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:09:41', '', 0),
(7, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:10:04', '', 0),
(8, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:10:31', '', 0),
(9, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-26 18:13:43', '', 1),
(10, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-27 18:52:58', '', 0),
(11, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-02-27 18:53:07', '', 1),
(12, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-03 18:00:09', '', 0),
(13, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-03 18:00:15', '', 1),
(14, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-06 18:10:26', '', 1),
(15, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-07 12:28:16', '', 1),
(16, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-07 18:43:27', '', 1),
(17, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-07 18:55:33', '', 1),
(18, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-07 19:44:29', '', 1),
(19, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-08 19:21:15', '', 1),
(20, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-15 17:19:38', '', 1),
(21, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-15 17:20:36', '15-03-2017 10:50:39 PM', 1),
(22, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-16 01:13:57', '', 1),
(23, 'aa@gmail.com', 0x3a3a3100000000000000000000000000, '2018-11-27 01:48:39', '', 1),
(24, 'jake@gmail.com', 0x3a3a3100000000000000000000000000, '2018-12-04 23:48:13', '', 1),
(25, 'jake@gmail.com', 0x3a3a3100000000000000000000000000, '2018-12-06 06:30:38', '', 1),
(26, 'jake@gmail.com', 0x3a3a3100000000000000000000000000, '2018-12-06 08:54:32', '', 1),
(27, 'jake@gmail.com', 0x3a3a3100000000000000000000000000, '2018-12-11 20:18:18', '', 1),
(28, 'salah@salah.com', 0x3a3a3100000000000000000000000000, '2020-06-24 04:08:22', '', 0),
(29, 'salah@salah.com', 0x3a3a3100000000000000000000000000, '2020-06-24 04:08:36', '', 0),
(30, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2020-06-24 04:09:18', '', 0),
(31, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2020-06-24 04:09:59', '', 1),
(32, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2020-06-27 16:21:05', '', 0),
(33, 'salah@salah.com', 0x3a3a3100000000000000000000000000, '2020-06-27 16:21:23', '', 0),
(34, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2020-06-27 16:21:51', '28-06-2020 05:27:50 AM', 1),
(35, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2020-06-28 12:17:32', '30-06-2020 12:52:34 AM', 1),
(36, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2020-06-29 21:28:04', '30-06-2020 03:07:00 AM', 1),
(37, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2020-06-30 23:00:53', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `shippingAddress` longtext NOT NULL,
  `shippingState` varchar(255) NOT NULL,
  `shippingCity` varchar(255) NOT NULL,
  `shippingPincode` int(11) NOT NULL,
  `billingAddress` longtext NOT NULL,
  `billingState` varchar(255) NOT NULL,
  `billingCity` varchar(255) NOT NULL,
  `billingPincode` int(11) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(1, 'Anuj Kumar', 'anuj.lpu1@gmail.com', 9009857868, 'f925916e2754e5e03f75dd58a5733251', 'CS New Delhi', 'New Delhi', 'Delhi', 110001, 'New Delhi', 'New Delhi', 'Delhi', 110092, '2017-02-04 19:30:50', ''),
(2, 'Amit ', 'amit@gmail.com', 8285703355, '5c428d8875d2948607f3e3fe134d71b4', '', '', '', 0, '', '', '', 0, '2017-03-15 17:21:22', ''),
(3, 'ma', 'aa@gmail.com', 9568834354, 'ea82410c7a9991816b5eeeebe195e20a', '', '', '', 0, '', '', '', 0, '2018-11-27 01:48:27', ''),
(4, 'Jake Cuenca', 'jake@gmail.com', 1293823723, '1200cf8ad328a60559cf5e7c5f46ee6d', '', 'sad', 'sad', 123, '', 'sad', 'sad', 0, '2018-12-04 23:47:50', ''),
(5, 'Jake Cuenca', 'jake@gmail.com', 1293823723, '1200cf8ad328a60559cf5e7c5f46ee6d', '', '', '', 0, '', '', '', 0, '2018-12-11 20:18:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(1, 1, 0, '2017-02-27 18:53:17'),
(2, 1, 10, '2020-06-29 18:10:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribtions`
--
ALTER TABLE `subscribtions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblinventory`
--
ALTER TABLE `tblinventory`
  ADD PRIMARY KEY (`INVENTORYID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sex`
--
ALTER TABLE `sex`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subscribtions`
--
ALTER TABLE `subscribtions`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblinventory`
--
ALTER TABLE `tblinventory`
  MODIFY `INVENTORYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
