-- phpMyAdmin SQL Dump
-- version 4.2.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2016 at 12:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laksyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_post`
--

CREATE TABLE IF NOT EXISTS `admin_post` (
`id` int(11) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `admin` int(11) NOT NULL,
  `static_pages` varchar(100) NOT NULL,
  `products` varchar(100) NOT NULL,
  `enquiry` int(11) NOT NULL,
  `orders` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `design` int(11) NOT NULL,
  `coupons` int(11) NOT NULL,
  `cms` int(11) NOT NULL,
  `CB` int(100) NOT NULL,
  `UB` int(100) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_post`
--

INSERT INTO `admin_post` (`id`, `post_name`, `admin`, `static_pages`, `products`, `enquiry`, `orders`, `request`, `design`, `coupons`, `cms`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'admin', 1, '1', '1', 1, 1, 1, 1, 1, 1, 0, 0, '0000-00-00', '0000-00-00'),
(2, 'user', 0, '1', '1', 1, 0, 0, 0, 0, 0, 4, 4, '2016-01-28', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
`id` int(11) NOT NULL,
  `admin_post_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `cb` int(100) NOT NULL,
  `UB` int(100) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `admin_post_id`, `username`, `password`, `name`, `email`, `phone`, `cb`, `UB`, `DOC`, `DOU`) VALUES
(4, 1, 'admin', 'admin', 'Laksyah', 'Laksyah@gmail.com', '45645654654', 1, 4, '0000-00-00', '2016-03-19 00:00:00'),
(5, 2, 'user', 'user', 'user', 'wdaddfaf', 'r4w5454345', 1, 4, '2016-01-28', '2016-01-28 06:55:36'),
(7, 2, 'sfsdf', 'sdfs', 'sdfsd', 'shahana@gmail.com', 'sdfsd', 4, 0, '2016-04-15', '2016-04-15 10:48:48'),
(8, 2, 'dfsd', 'sdgsdg', 'sdgsd', 'adssf@ihsdddddf.com', '3534543', 4, 0, '2016-04-15', '2016-04-15 10:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
`id` int(11) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `small_image` varchar(20) NOT NULL,
  `big_image` varchar(20) NOT NULL,
  `small_content` text NOT NULL,
  `big_content` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_description` text NOT NULL,
  `status` int(11) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `heading`, `small_image`, `big_image`, `small_content`, `big_content`, `meta_keywords`, `meta_title`, `meta_description`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(7, 'qqq', 'jpg', 'jpg', '<p>\r\n	s</p>\r\n', '<p>\r\n	qq</p>\r\n', 'qqq', 'qqq', '<p>\r\n	qqqq</p>\r\n', 1, 0, 0, '0000-00-00', '2016-03-28 11:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `book_appointment`
--

CREATE TABLE IF NOT EXISTS `book_appointment` (
`id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `phone` varchar(111) NOT NULL,
  `country` int(11) NOT NULL,
  `city` varchar(111) NOT NULL,
  `address` varchar(111) NOT NULL,
  `notes` varchar(111) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `book_appointment`
--

INSERT INTO `book_appointment` (`id`, `name`, `email`, `phone`, `country`, `city`, `address`, `notes`, `date`) VALUES
(5, 'shahana', 'gjkhdfjkl@hgkj.com', '5656565656', 3, 'dgdfgfd', 'dfgfdg', 'fdgfdg', '2016-03-29'),
(7, 'shahana', 'gjkhdfjkl@hgkj.com', '5656565656', 4, 'sdfsf', 'dgfdg', 'dfgfdg', '2016-03-29'),
(8, 'dgf', 'hgfhjg@hfjhhk.com', '6767676767', 1, 'fdgdf', 'dfhdf', 'dfhfdh', '2016-04-15'),
(9, 'dgf', 'hgfhjg@hfjhhk.com', '6767676767', 1, 'fdgdf', 'dfhdf', 'dfhfdh', '2016-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(225) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `options` int(11) NOT NULL,
  `date` date NOT NULL,
  `gift_option` int(11) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `session_id`, `product_id`, `quantity`, `options`, `date`, `gift_option`, `rate`) VALUES
(3, 1, NULL, 12, 1, 0, '2016-05-21', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `comment`, `date`) VALUES
(1, 'sfsdf', 'hfgsajkfg@jgj.com', '2323232323', 'sdffffffffffffffffffffffffffff', '2016-03-30'),
(2, 'dsfdsf', 'hfgsajkfg@jgj.com', '2323232323', 'xdgdfgf', '2016-03-30'),
(3, 'sdgsdg dsgsdg', 'fdghdfh@gjhg.com', '565656565', 'mnbmnb,b,mb,mb,b', '2016-04-15'),
(4, 'sdgsdg dsgsdg', 'fdghdfh@gjhg.com', '565656565', 'mnbmnb,b,mb,mb,b', '2016-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(1, 'USA'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
`id` int(11) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `cash_limit` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `starting_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `discount` int(11) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `unique` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=ready to use, 2 =used',
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `session_id` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `product_id`, `user_id`, `cash_limit`, `code`, `starting_date`, `expiry_date`, `discount`, `discount_type`, `unique`, `status`, `DOC`, `DOU`, `session_id`) VALUES
(1, '10', '1', 1000, 'sss', '0000-00-00', '0000-00-00', 1000, '1', 1, 2, '2016-03-29', '2016-05-11 06:33:30', 0),
(2, '10', '1', 0, 'ww', '2016-03-01', '2016-07-13', 2000, '1', 0, 1, '2016-03-29', '2016-05-11 09:59:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons_used`
--

CREATE TABLE IF NOT EXISTS `coupons_used` (
  `id` int(11) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `cash_limit` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `starting_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `discount` int(11) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `unique` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=ready to use, 2 =used',
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `session_id` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons_used`
--

INSERT INTO `coupons_used` (`id`, `product_id`, `user_id`, `cash_limit`, `code`, `starting_date`, `expiry_date`, `discount`, `discount_type`, `unique`, `status`, `DOC`, `DOU`, `session_id`) VALUES
(0, '', '1', 1000, 'sss', '0000-00-00', '0000-00-00', 1000, '1', 1, 2, '2016-05-11', '2016-05-11 06:34:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_history`
--

CREATE TABLE IF NOT EXISTS `coupon_history` (
`id` int(11) NOT NULL,
  `coupon_id` varchar(225) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `session_id` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
`id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `currency_code` varchar(50) NOT NULL,
  `symbol` varchar(225) NOT NULL,
  `rate` float NOT NULL,
  `image` varchar(225) NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country`, `currency`, `currency_code`, `symbol`, `rate`, `image`, `cb`, `ub`, `doc`, `dou`) VALUES
(1, 'India', 'Rupee', 'INR', 'fa-inr', 1, 'jpg', 0, 0, '0000-00-00', '2016-05-12 06:40:55'),
(2, 'US', 'Dollar', 'USD', 'fa-usd', 0.0149858, 'png', 0, 0, '0000-00-00', '2016-05-12 06:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `dimension_class`
--

CREATE TABLE IF NOT EXISTS `dimension_class` (
`id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dimension_class`
--

INSERT INTO `dimension_class` (`id`, `title`, `unit`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(2, 'Metre', 'm', 4, 0, '2016-01-12', '2016-03-15 18:30:00'),
(3, 'Millimetre', 'mm', 4, 0, '2016-01-12', '0000-00-00 00:00:00'),
(4, 'Centimetre', 'cm', 4, 0, '2016-01-12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
`Id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`Id`, `country_id`, `state_id`, `district_name`) VALUES
(1, 4, 5, 'Ernakulam'),
(2, 4, 5, 'Alappuzha'),
(3, 4, 5, 'Kottayam');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE IF NOT EXISTS `extras` (
`id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `value` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `title`, `value`, `doc`, `dou`) VALUES
(1, 'gift amount limit', 3000, '2016-04-26', '2016-04-26 10:14:31'),
(2, 'gift amount rate', 200, '2016-04-26', '2016-04-26 10:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL,
  `message` text NOT NULL,
  `DOC` date NOT NULL,
  `DOU` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE IF NOT EXISTS `forgot_password` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `DOC` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`id`, `user_id`, `code`, `status`, `DOC`) VALUES
(20, 2, '180549', 1, '2016-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `gift_card`
--

CREATE TABLE IF NOT EXISTS `gift_card` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `cb` int(11) NOT NULL,
  `doc` date NOT NULL,
  `ub` int(11) NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gift_card`
--

INSERT INTO `gift_card` (`id`, `name`, `amount`, `image`, `status`, `cb`, `doc`, `ub`, `dou`) VALUES
(1, 'LAKSYAH GIFT CARD', '1000', 'jpg', 1, 0, '0000-00-00', 0, '2016-05-19 18:30:00'),
(2, 'LAKSYAH GIFT CARD', '5000', 'jpg', 1, 0, '2016-05-20', 0, '2016-05-20 07:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `home_category`
--

CREATE TABLE IF NOT EXISTS `home_category` (
`id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `home_subcategory`
--

CREATE TABLE IF NOT EXISTS `home_subcategory` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `make_payment`
--

CREATE TABLE IF NOT EXISTS `make_payment` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_code` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `amount_type` varchar(15) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `pay_method` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `status` int(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `make_payment`
--

INSERT INTO `make_payment` (`id`, `userid`, `product_name`, `product_code`, `message`, `amount_type`, `amount`, `pay_method`, `date`, `status`) VALUES
(1, 1, 'sfsdfsd', 'sdfsdf', 'dasdas', '2', '34234', '1', '2016-05-19', 1),
(2, 1, 'sfsdfsd', 'sdfsdf', 'dasdas', '1', '34234', '2', '2016-05-19', 1),
(3, 2, 'sfsdfsd', 'sdfsdf', 'zczcczxc', '1', '1234', '2', '2016-05-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_category`
--

CREATE TABLE IF NOT EXISTS `master_category` (
`id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `master_category`
--

INSERT INTO `master_category` (`id`, `category_name`, `status`, `cb`, `ub`, `doc`, `dou`) VALUES
(1, 'sofa', 1, 4, 0, '2016-02-17', '0000-00-00 00:00:00'),
(2, 'chair', 1, 1, 1, '2016-03-15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `master_category_tags`
--

CREATE TABLE IF NOT EXISTS `master_category_tags` (
`id` int(11) NOT NULL,
  `category_tag` varchar(200) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `master_category_tags`
--

INSERT INTO `master_category_tags` (`id`, `category_tag`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'women', 0, 0, '0000-00-00', '2016-03-30 11:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `master_history_type`
--

CREATE TABLE IF NOT EXISTS `master_history_type` (
`id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `credit_debit` int(11) NOT NULL COMMENT '1=>credit,2=>debit',
  `field1` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `master_history_type`
--

INSERT INTO `master_history_type` (`id`, `type`, `credit_debit`, `field1`) VALUES
(1, 'Purchase Return', 1, ''),
(2, 'Money Added by Laksyah', 1, ''),
(3, 'Advance Payment from client', 2, ''),
(4, 'Purchase', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `master_options`
--

CREATE TABLE IF NOT EXISTS `master_options` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `option_type_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `master_options`
--

INSERT INTO `master_options` (`id`, `product_id`, `option_type_id`) VALUES
(38, 10, 1),
(39, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `master_shipping_types`
--

CREATE TABLE IF NOT EXISTS `master_shipping_types` (
`id` int(11) NOT NULL,
  `shipping_type` varchar(100) NOT NULL,
  `shipping_rate` float NOT NULL,
  `status` int(11) NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `master_shipping_types`
--

INSERT INTO `master_shipping_types` (`id`, `shipping_type`, `shipping_rate`, `status`, `cb`, `ub`, `doc`, `dou`) VALUES
(1, 'Type 1', 100, 1, 4, 4, '2016-05-20', '0000-00-00 00:00:00'),
(2, 'Type 2', 1000, 1, 4, 0, '2016-05-20', '0000-00-00 00:00:00'),
(3, 'Type 3', 250, 1, 4, 0, '2016-05-20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `master_size`
--

CREATE TABLE IF NOT EXISTS `master_size` (
`id` int(11) NOT NULL,
  `size` varchar(250) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `master_size`
--

INSERT INTO `master_size` (`id`, `size`, `doc`) VALUES
(1, 'XS/32', '2016-03-30 10:26:10'),
(2, 'S/34', '2016-03-30 10:26:10'),
(3, 'M/36', '2016-03-30 10:26:10'),
(4, 'L/38', '2016-03-30 10:26:10'),
(5, 'XL/40', '2016-03-30 10:26:10'),
(6, 'XXL/42', '2016-03-30 10:26:10'),
(7, 'XXXL-44', '2016-03-30 10:26:10'),
(8, 'NA', '2016-03-30 10:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
`id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `date`) VALUES
(1, 'surumiabin@gmail.com', '2016-02-22'),
(2, 'nithin@intersmart.in', '2016-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
`id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `tooltip` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `gallery` varchar(225) NOT NULL,
  `amount` float NOT NULL,
  `status` int(11) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `option_category`
--

CREATE TABLE IF NOT EXISTS `option_category` (
`id` int(11) NOT NULL,
  `option_type_id` int(11) NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `color_code` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `field1` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `option_category`
--

INSERT INTO `option_category` (`id`, `option_type_id`, `color_name`, `color_code`, `size`, `status`, `field1`) VALUES
(1, 1, 'Peach', '#EE6157', '', 0, 0),
(3, 2, '', '', 'S', 0, 0),
(4, 1, 'Light Gray', '#d2d2d2', '', 0, 0),
(5, 2, '', '', 'M', 0, 0),
(6, 2, '', '', 'L', 0, 0),
(7, 1, 'RED', '#FF0000', '', 0, 0),
(8, 1, 'MAROON', '#800000', '', 0, 0),
(9, 1, 'GREEN', '#008000', '', 0, 0),
(10, 2, '', '', 'XL', 0, 0),
(11, 2, '', '', 'XXL', 0, 0),
(12, 2, '', '', 'XXXL', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `option_details`
--

CREATE TABLE IF NOT EXISTS `option_details` (
`id` int(11) NOT NULL,
  `master_option_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `option_details`
--

INSERT INTO `option_details` (`id`, `master_option_id`, `color_id`, `size_id`, `stock`, `status`) VALUES
(40, 38, 1, 0, 100, 1),
(41, 38, 4, 0, 100, 1),
(42, 39, 0, 3, 10, 1),
(43, 39, 0, 5, 10, 1),
(46, 38, 7, 0, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `option_type`
--

CREATE TABLE IF NOT EXISTS `option_type` (
`id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `field1` int(11) NOT NULL,
  `field2` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `option_type`
--

INSERT INTO `option_type` (`id`, `type`, `field1`, `field2`) VALUES
(1, 'Color', 1, 0),
(2, 'Size', 1, 0),
(3, 'Both', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `discount_rate` int(11) NOT NULL,
  `gift_option` int(11) NOT NULL COMMENT '0=no giftpack , 1= giftpack option',
  `rate` double NOT NULL,
  `ship_address_id` int(11) NOT NULL,
  `bill_address_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `payment_mode` varchar(100) NOT NULL COMMENT '1=wallet,2=gateway,3=paypal',
  `admin_comment` text NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '0=notpay,1=success,2=failed',
  `admin_status` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=notplaced,1=success,2=failed',
  `DOC` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=285 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `total_amount`, `order_date`, `coupon_id`, `discount_rate`, `gift_option`, `rate`, `ship_address_id`, `bill_address_id`, `currency_id`, `comment`, `payment_mode`, `admin_comment`, `transaction_id`, `payment_status`, `admin_status`, `status`, `DOC`) VALUES
(279, 1, 3750, '2016-05-11', 0, 0, 1, 400, 0, 0, 0, '', '2', '', 0, 1, 0, 1, '2016-05-11'),
(280, 1, 2500, '2016-05-11', 0, 0, 0, 0, 0, 0, 0, '', '2', '', 0, 1, 0, 1, '2016-05-11'),
(281, 1, 1250, '2016-05-11', 0, 0, 0, 0, 0, 0, 0, '', '2', '', 0, 1, 0, 1, '2016-05-11'),
(282, 1, 2500, '2016-05-17', 0, 0, 0, 0, 0, 0, 0, '', '2', '', 0, 1, 0, 1, '2016-05-17'),
(283, 1, 2500, '2016-05-17', 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '2016-05-17'),
(284, 1, 1250, '2016-05-21', 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, '2016-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE IF NOT EXISTS `order_history` (
`id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_status_comment` varchar(500) NOT NULL,
  `order_status` int(11) NOT NULL,
  `shipping_type` int(11) NOT NULL,
  `tracking_id` varchar(225) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`id`, `order_id`, `order_status_comment`, `order_status`, `shipping_type`, `tracking_id`, `date`, `status`, `cb`, `ub`) VALUES
(3, 279, '', 3, 1, 'KJDSHNKFJK76', '2016-05-20 08:22:00', 1, 0, 0),
(5, 279, 'order placed by customer', 0, 0, '', '2016-05-16 11:00:00', 1, 0, 0),
(6, 279, 'payment made by customer', 0, 0, '', '2016-05-17 17:34:00', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
`id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `status` int(11) NOT NULL,
  `gift_option` int(11) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=318 ;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `option_id`, `quantity`, `amount`, `DOC`, `status`, `gift_option`, `rate`) VALUES
(311, 279, 11, 0, 1, 2500, '2016-05-11', 0, 1, 200),
(312, 279, 12, 0, 1, 1250, '2016-05-11', 0, 1, 200),
(313, 280, 11, 0, 1, 2500, '2016-05-11', 0, 0, 0),
(314, 281, 12, 0, 1, 1250, '2016-05-11', 1, 0, 0),
(315, 282, 11, 0, 1, 2500, '2016-05-17', 1, 0, 0),
(316, 283, 11, 0, 1, 2500, '2016-05-17', 0, 0, 0),
(317, 284, 13, 0, 1, 1250, '2016-05-21', 0, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
`id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `title`, `description`, `status`) VALUES
(3, 'item shipped', 'fdh rtyert rty ', 1),
(4, 'testing status', 'kjhjk kjkljlk lkjkljkl lkjlk lkjlk', 0),
(5, 'sorry for the delay', 'there is some issued to ship the product', 1),
(8, 'vvvv', 'vvvvv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `category_id` varchar(200) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_code` varchar(225) NOT NULL,
  `main_image` varchar(100) NOT NULL,
  `gallery_images` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `canonical_name` varchar(200) NOT NULL,
  `meta_title` varchar(225) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` varchar(225) NOT NULL,
  `header_visibility` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtract_stock` int(11) NOT NULL,
  `discount` float NOT NULL,
  `discount_type` varchar(100) NOT NULL,
  `discount_rate` float NOT NULL,
  `requires_shipping` int(11) NOT NULL,
  `enquiry_sale` int(11) NOT NULL,
  `new_from` date NOT NULL,
  `new_to` date NOT NULL,
  `sale_from` date NOT NULL,
  `sale_to` date NOT NULL,
  `special_price_from` date NOT NULL,
  `special_price_to` date NOT NULL,
  `tax` float NOT NULL,
  `gift_option` int(11) NOT NULL,
  `stock_availability` int(11) NOT NULL,
  `video_link` varchar(225) NOT NULL,
  `dimensionl` float NOT NULL,
  `dimensionw` float NOT NULL,
  `dimensionh` float NOT NULL,
  `dimension_class` int(11) NOT NULL,
  `weight` float NOT NULL,
  `weight_class` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `exchange` int(11) NOT NULL,
  `search_tag` varchar(225) NOT NULL,
  `related_products` varchar(225) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deal_day_status` int(11) NOT NULL,
  `deal_day_date` date NOT NULL,
  `hover_image` varchar(150) NOT NULL,
  `video` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_code`, `main_image`, `gallery_images`, `description`, `canonical_name`, `meta_title`, `meta_description`, `meta_keywords`, `header_visibility`, `sort_order`, `price`, `quantity`, `subtract_stock`, `discount`, `discount_type`, `discount_rate`, `requires_shipping`, `enquiry_sale`, `new_from`, `new_to`, `sale_from`, `sale_to`, `special_price_from`, `special_price_to`, `tax`, `gift_option`, `stock_availability`, `video_link`, `dimensionl`, `dimensionw`, `dimensionh`, `dimension_class`, `weight`, `weight_class`, `status`, `exchange`, `search_tag`, `related_products`, `CB`, `UB`, `DOC`, `DOU`, `deal_day_status`, `deal_day_date`, `hover_image`, `video`) VALUES
(10, '1,3,', 'salwar 1', 'S1', 'jpg', '', '<p>\r\n	salwar</p>\r\n', 'women-salwar', '', '', '', 1, 0, 12500, 0, 1, 0, '1', 0, 0, 1, '2016-03-01', '2016-03-04', '2016-04-09', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 1, 0, '', '', 4, 0, '2016-03-21', '2016-05-20 16:25:42', 1, '2016-05-21', 'jpg', 'mp4'),
(11, '1,3,', 'salwar new', 'p5', 'jpg', '', '<p>\r\n	new salwar suit</p>\r\n', 'women-pink-salwar', '', '', '', 1, 0, 2500, 7, 1, 0, '1', 0, 0, 0, '0000-00-00', '2016-04-18', '2016-04-02', '0000-00-00', '0000-00-00', '0000-00-00', 0, 1, 0, '', 0, 0, 0, 0, 0, 0, 1, 0, '', '', 4, 0, '2016-03-22', '2016-05-19 18:30:00', 1, '2016-04-29', 'jpg', ''),
(12, '1,2,', 'saree1', 'ddfdfs', 'jpg', '', '<p>\r\n	fgfhgfhfghgh</p>\r\n', 'sareeone', '', '', '', 1, 0, 1250, 20, 1, 0, '1', 0, 0, 1, '2016-03-08', '2016-03-16', '2016-04-13', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 1, 0, '', '', 4, 0, '2016-03-31', '2016-05-20 09:27:24', 1, '2016-05-20', 'jpg', ''),
(13, '1,2,', 'saree', 'ddfdfs', 'jpg', '', '<p>\r\n	fgfhgfhfghgh</p>\r\n', 'saree', '', '', '', 1, 0, 1250, 2, 1, 0, '1', 0, 0, 1, '2016-03-08', '2016-03-16', '2016-04-13', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 1, 0, '', '', 4, 0, '2016-03-31', '2016-05-19 18:30:00', 1, '2016-04-28', 'jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `products1`
--

CREATE TABLE IF NOT EXISTS `products1` (
`id` int(11) NOT NULL,
  `category_id` varchar(200) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_code` varchar(225) NOT NULL,
  `main_image` varchar(100) NOT NULL,
  `gallery_images` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(225) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` varchar(225) NOT NULL,
  `header_visibility` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtract_stock` int(11) NOT NULL,
  `discount` float NOT NULL,
  `discount_type` varchar(100) NOT NULL,
  `discount_rate` float NOT NULL,
  `requires_shipping` int(11) NOT NULL,
  `enquiry_sale` int(11) NOT NULL,
  `new_from` date NOT NULL,
  `new_to` date NOT NULL,
  `sale_from` date NOT NULL,
  `sale_to` date NOT NULL,
  `special_price_from` date NOT NULL,
  `special_price_to` date NOT NULL,
  `tax` float NOT NULL,
  `gift_option` int(11) NOT NULL,
  `stock_availability` int(11) NOT NULL,
  `canonical_name` varchar(225) NOT NULL,
  `video_link` varchar(225) NOT NULL,
  `dimensionl` float NOT NULL,
  `dimensionw` float NOT NULL,
  `dimensionh` float NOT NULL,
  `dimension_class` int(11) NOT NULL,
  `weight` float NOT NULL,
  `weight_class` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `exchange` int(11) NOT NULL,
  `search_tag` varchar(225) NOT NULL,
  `related_products` varchar(225) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products1`
--

INSERT INTO `products1` (`id`, `category_id`, `product_name`, `product_code`, `main_image`, `gallery_images`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `header_visibility`, `sort_order`, `price`, `quantity`, `subtract_stock`, `discount`, `discount_type`, `discount_rate`, `requires_shipping`, `enquiry_sale`, `new_from`, `new_to`, `sale_from`, `sale_to`, `special_price_from`, `special_price_to`, `tax`, `gift_option`, `stock_availability`, `canonical_name`, `video_link`, `dimensionl`, `dimensionw`, `dimensionh`, `dimension_class`, `weight`, `weight_class`, `status`, `exchange`, `search_tag`, `related_products`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, '3', 'eyerye', 'eryer', 'jpg', '', '<p>\r\n	ertert</p>\r\n', '', '', '', 1, 0, 4000, 3, 1, 1, '0', 20, 0, 0, '2016-03-01', '2016-03-22', '2016-03-23', '2016-03-24', '2016-03-25', '2016-03-30', 0, 0, 1, '', '', 0, 0, 0, 0, 0, 0, 1, 0, '', '', 4, 0, '2016-03-21', '2016-03-21 08:39:22'),
(2, '3', 'tyrtutr', 'yurtyu', 'jpg', '', '<p>\r\n	rty</p>\r\n', '', '', '', 1, 0, 6000, 2, 1, 0, '1', 0, 0, 0, '2016-03-01', '2016-03-04', '2016-03-08', '2016-03-21', '2016-03-23', '2016-03-24', 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 1, 0, '', '', 4, 0, '2016-03-21', '2016-03-21 07:59:58'),
(3, '2', 'tyhr', 'rty', 'jpg', '', '<p>\r\n	rtytryrty</p>\r\n', '', '', '', 1, 0, 2700, 3, 1, 0, '0', 10, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 1, 0, '', '', 4, 0, '2016-03-21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
`id` int(11) NOT NULL,
  `parent` varchar(225) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `meta_title` varchar(225) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` varchar(225) NOT NULL,
  `header_visibility` int(11) NOT NULL,
  `search_tag` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `canonical_name` varchar(225) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `parent`, `category_name`, `description`, `image`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `header_visibility`, `search_tag`, `status`, `canonical_name`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, '1', 'Women', '<p>\r\n	Testing category</p>\r\n', 'jpg', 0, '', '', '', 1, 'women', 1, 'women', 4, 0, '2016-03-21', '2016-03-30 11:39:19'),
(2, '1', 'Saree', '<p>\r\n	dfg</p>\r\n', 'jpg', 0, '', '', '', 1, '', 1, 'saree', 4, 0, '2016-03-21', '2016-03-21 06:06:28'),
(3, '1', 'Salwars', '<p>\r\n	dfg</p>\r\n', 'jpg', 0, '', '', '', 1, '', 1, 'salwars1', 4, 0, '2016-03-21', '2016-05-13 08:44:36'),
(4, '4', 'Celib Syle', '<p>\r\n	dfg</p>\r\n', 'jpg', 0, '', '', '', 1, '', 1, 'salwars2', 4, 0, '2016-03-21', '2016-05-13 08:44:38'),
(5, '4', 'Anarkali Suits', '<p>\r\n	dfg</p>\r\n', 'jpg', 0, '', '', '', 1, '', 1, 'salwars3', 4, 0, '2016-03-21', '2016-05-13 08:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_path`
--

CREATE TABLE IF NOT EXISTS `product_category_path` (
`id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `product_category_path`
--

INSERT INTO `product_category_path` (`id`, `category`, `parent`, `level`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_description`
--

CREATE TABLE IF NOT EXISTS `product_description` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_enquiry`
--

CREATE TABLE IF NOT EXISTS `product_enquiry` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `country` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `requirement` longtext NOT NULL,
  `product_id` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product_enquiry`
--

INSERT INTO `product_enquiry` (`id`, `name`, `email`, `phone`, `country`, `size`, `requirement`, `product_id`, `doc`, `dou`, `user_id`) VALUES
(2, 'asdas', 'ashiq@intersmart.in', '09037187848', 2, 4, '', 10, '0000-00-00', '2016-03-30 10:39:21', 0),
(3, 'Ashik Ali', 'ashiq@intersmart.in', '09037187848', 4, 1, '', 10, '0000-00-00', '2016-04-01 07:13:20', 0),
(4, 'Ashik Ali', 'ashiq@intersmart.in', '09037187848', 4, 5, '', 10, '0000-00-00', '2016-04-01 07:38:31', 0),
(5, 'Ashik Ali', 'ashiq@intersmart.in', '09037187848', 4, 5, '', 10, '0000-00-00', '2016-04-01 07:40:05', 0),
(6, 'Ashik Ali', 'ashiq@intersmart.in', '09037187848', 4, 5, '', 10, '0000-00-00', '2016-04-01 07:42:01', 0),
(7, 'Ashik Ali', 'ashiq@intersmart.in', '09037187848', 4, 5, '', 10, '0000-00-00', '2016-04-01 07:43:44', 0),
(8, 'Ashik Ali', 'ashiq@intersmart.in', '09037187848', 4, 2, '', 10, '0000-00-00', '2016-04-01 10:34:11', 0),
(9, 'Ashik Ali', 'ashiq@intersmart.in', '09037187848', 4, 3, '', 10, '0000-00-00', '2016-04-01 12:13:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_mail_template`
--

CREATE TABLE IF NOT EXISTS `product_mail_template` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` longtext NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `product_mail_template`
--

INSERT INTO `product_mail_template` (`id`, `product_id`, `title`, `content`, `cb`, `ub`, `doc`, `dou`) VALUES
(1, 11, 'drfgdgfgfdgyutu', '<p>\r\n	sssssssssssssssssssssssssssssssssssssssssss</p>\r\n', 4, 4, '2016-04-12', '2016-04-12 11:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_viewed`
--

CREATE TABLE IF NOT EXISTS `product_viewed` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `feild` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `product_viewed`
--

INSERT INTO `product_viewed` (`id`, `product_id`, `session_id`, `user_id`, `date`, `feild`) VALUES
(89, 10, '1463723914.635', 0, '2016-05-20', 0),
(90, 13, '1463723914.635', 0, '2016-05-20', 0),
(91, 11, '1463723914.635', 0, '2016-05-20', 0),
(92, 12, '', 1, '2016-05-21', 0),
(93, 0, '', 1, '2016-05-21', 0),
(94, 0, '', 1, '2016-05-21', 0),
(95, 0, '', 1, '2016-05-21', 0),
(96, 13, '', 1, '2016-05-21', 0),
(97, 0, '', 1, '2016-05-21', 0),
(98, 0, '', 1, '2016-05-21', 0),
(99, 0, '', 1, '2016-05-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE IF NOT EXISTS `shipping_charges` (
`id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `shipping_rate` double NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country`, `shipping_rate`, `doc`, `dou`, `cb`, `ub`, `status`, `sort_order`) VALUES
(1, 4, 0, '2016-04-30', '2016-04-30 05:20:37', 1, 1, 1, 1),
(2, 1, 260, '2016-04-30', '2016-04-30 05:20:37', 1, 1, 1, 1),
(3, 2, 260, '2016-04-30', '2016-04-30 05:20:37', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id` int(11) NOT NULL,
  `image_extension` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0',
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE IF NOT EXISTS `social_media` (
`id` int(10) NOT NULL,
  `name` varchar(225) NOT NULL,
  `link` varchar(225) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `link`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'facebook', 'https://www.facebook.com/', 0, 4, '2016-01-04', '2016-03-19 00:00:00'),
(2, 'youtube', 'https://www.youtube.com', 0, 4, '2016-01-04', '2016-03-19 00:00:00'),
(3, 'twitter', '', 0, 0, '2016-01-04', '2016-01-03 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
`Id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`Id`, `country_id`, `state_name`) VALUES
(1, 4, 'AndhraPradesh'),
(2, 4, 'Bihar'),
(3, 4, 'Haryana'),
(4, 4, 'jammu & Kashmir'),
(5, 4, 'Kerala');

-- --------------------------------------------------------

--
-- Table structure for table `static_page`
--

CREATE TABLE IF NOT EXISTS `static_page` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `big_content` text NOT NULL,
  `small_content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_user_gifts`
--

CREATE TABLE IF NOT EXISTS `temp_user_gifts` (
`id` int(11) NOT NULL,
  `session_id` varchar(225) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `temp_user_gifts`
--

INSERT INTO `temp_user_gifts` (`id`, `session_id`, `cart_id`, `from`, `to`, `message`, `status`, `date`, `user_id`) VALUES
(40, '', 194, 'sddsfdfsf', 'sdsdd', 'sdsdsdd', 1, '2016-04-26', 1),
(41, '', 196, 'dfg', 'fdgdfgfd', 'ggfdgfdvbvbvvbvbvb', 1, '2016-04-26', 1),
(42, '1461670649.0994', 197, 'sdfsdfsd', 'sdfsdfdsf', 'sdfsdf', 1, '2016-04-26', 0),
(43, '1461670649.0994', 198, 'sdfsdfsdf', 'fsdfsdfsdf', 'sdfsdfsdf', 1, '2016-04-26', 0),
(45, '', 4, 'vcbcv', 'cvbc', 'vbcvbcv', 1, '2016-04-29', 1),
(46, '1461991408.1965', 6, 'Ashik', 'ali', 'test', 1, '2016-04-30', 0),
(48, '', 8, 'fghfghf', 'ghfgh', 'gfhgf', 1, '2016-04-30', 1),
(53, '', 9, 'ghjhgj', 'jghjghjgh', 'hgjhgjhg', 1, '2016-05-02', 1),
(54, '', 10, 'ghjhg', 'jghjhgjgh', 'jghjghj', 1, '2016-05-02', 1),
(55, '1462178063.8226', 12, 'cvb', 'cvbcvbcvb', 'cvbcvb', 1, '2016-05-02', 0),
(56, '', 21, 'dsfdsfsd', 'fsdfsdfsdfsdf', 'sdfsdfdsf', 1, '2016-05-03', 1),
(64, '', 39, 'asdadasd', 'Asdasdas', 'dasasdasd', 1, '2016-05-04', 1),
(65, '', 40, 'sdsd', 'ffsdfds', 'fsdfsdf', 1, '2016-05-04', 1),
(66, '1462510508.0883', 41, 'sdfsfsd', 'fsdfsdfsdf', 'fsdfds', 1, '2016-05-06', 0),
(68, '', 45, 'dfgdg', 'dfgdfgdf', 'gdfgfdg', 1, '2016-05-06', 1),
(69, '1462597306.9326', 46, 'cdfg', 'dfgdfgdf', 'gdfgfdgd', 1, '2016-05-07', 0),
(70, '1462769220.519', 49, 'Ashik', 'aassa', 'aasdadasd', 1, '2016-05-09', 0),
(71, '1462769558.5072', 51, 'sds', 'sss', 'ss', 1, '2016-05-09', 0),
(72, '', 54, 'dfdfgdfg', 'dfgdfgfd', 'gdfgfdg', 1, '2016-05-09', 1),
(73, '', 62, 'asdas', 'dasdasd', 'asdas', 1, '2016-05-09', 1),
(74, '1462856399.5604', 73, 'sfsd', 'fsdfsdfsdfsdfsdfsdf', 'sdfsdf', 1, '2016-05-10', 0),
(75, '', 86, 'dsfsdfsdf', 'sdfsdfsdsdfsdsdf', 'sdfsdfsdf', 1, '2016-05-10', 2),
(76, '1462954886.6823', 118, 'xvc', 'xcxcvxc', 'vxcv', 1, '2016-05-11', 0),
(77, '1462954994.7044', 119, 'Ashik', 'adasd', 'dasdsadsa', 1, '2016-05-11', 0),
(78, '1462955295.6786', 120, 'dgfg', 'dfgfdg', 'dfgdfgfdg', 1, '2016-05-11', 0),
(79, '1462957288.7634', 121, 'sdffsd', 'fsdfsdfsdffsdfsdf', 'sdfsdfsdf', 1, '2016-05-11', 0),
(80, '', 122, 'sdfsdfsdfsd', 'fsdfsdfsdfsdfsdf', 'sdfsdfsd', 1, '2016-05-11', 1),
(81, '', 124, 'sdfdsfsdfsd', 'fsdfsdfsdffsdfsdfsdfsd', 'fsdfsdfsd', 1, '2016-05-11', 1),
(82, '', 123, 'sdfsdfsdfsd', 'dfsdfsdf', 'fsdfsdfsd', 1, '2016-05-11', 1),
(83, '1462958823.8979', 125, 'fsdfsdf', 'sdfsdfsdfsdfdfsd', 'sdfsdfsd', 1, '2016-05-11', 0),
(84, '1462958823.8979', 126, 'sdfsdfdsdf', 'fsdfsdfsdffsdfsdffsd', 'fsdfsdfsd', 1, '2016-05-11', 0),
(85, '', 127, 'sdfsdfdsfsdfds', 'fsdf', 'sdfsdf', 1, '2016-05-11', 1),
(86, '', 128, 'vvv', 'sdfsdfsdfsf', 'sdfsdfsdfsdf', 1, '2016-05-11', 1),
(87, '', 129, 'mk', 'km', 'jk', 1, '2016-05-11', 1),
(88, '', 130, 'kl', 'lk', 'kl', 1, '2016-05-11', 1),
(89, '1462959378.6643', 131, 'iui', 'yuiuy', 'iyuiyui', 1, '2016-05-11', 0),
(90, '1462959378.6643', 132, 'bbcvb', 'cvcvcv', 'cbcvcv', 1, '2016-05-11', 0),
(91, '1462960632.4962', 133, 'dsfd', 'fsdfsdfsdffsdfsdffsd', 'sdfsdf', 1, '2016-05-11', 0),
(92, '1462960632.4962', 134, 'sdfsdfsdfsd', 'sdfsdfsdf', 'sdfsdf', 1, '2016-05-11', 0),
(93, '', 135, 'ertet', 'eter', 'terter', 1, '2016-05-11', 1),
(94, '', 136, 'fdgdg', 'dgdf', 'gdgdf', 1, '2016-05-11', 1),
(95, '1462960838.5513', 137, 'rtret', 'te', 'retertert', 1, '2016-05-11', 0),
(96, '1462960838.5513', 138, 'ertert', 'rtert', 'retretert', 1, '2016-05-11', 0),
(98, '', 1, 'rtyr', 'tryrty', 'rtyrtyrty', 1, '2016-05-21', 1),
(100, '', 3, 'esrtert', 'ertert', 'ertertert', 1, '2016-05-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
`id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `position` varchar(111) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `position`, `content`, `status`, `cb`, `ub`, `doc`, `dou`) VALUES
(2, 'ggggggggggggggdd', 'ggggggggggggggg', '<h3>\r\n	trytrytryrtytryrt</h3>\r\n', 0, 0, 0, '0000-00-00', '0000-00-00 00:00:00'),
(3, 'shahana', 'php developer', '<h3 style="color:blue;">\r\n	zfsdgsdgdsg</h3>\r\n', 0, 0, 0, '0000-00-00', '0000-00-00 00:00:00'),
(5, 'dssdgsdgsfsf', 'dhdfhdddddddd', '<p>\r\n	dgfdgdfhd</p>\r\n', 0, 4, 0, '2016-03-28', '2016-03-27 18:30:00'),
(6, 'surumi', 'php developer', '<h3 style="color:red;">\r\n	<span style="color: rgb(87, 87, 87); font-family: ''Benton Sans''; font-size: 16px; line-height: 24px; background-color: rgb(255, 255, 255);">Our experience at the event has been excellent, in terms of the network connect, the other products and technologies that we saw and the interactions we had with the entrepreneurs and the VC&rsquo;s. We were extremely happy to present Heckyl and were overwhelmed with the response that we received from the attendees.</span></h3>\r\n', 1, 4, 0, '2016-03-28', '2016-03-28 18:30:00'),
(7, 'shahana', 'php developer', '<p>\r\n	<span style="color: rgb(87, 87, 87); font-family: ''Benton Sans''; font-size: 16px; line-height: 24px; background-color: rgb(255, 255, 255);">We at Heckyl always dreamt of getting on a podium where we could stand and speak about our company and our product and YourStory is the podium where we could live it in India. What YourStory and Shradha, (both have become a synonym with the start-ups or the entrepreneurs) has provided to the entrepreneurs, are the wings to dream big now, as the podium and the right people are already there.</span></p>\r\n', 1, 4, 0, '2016-03-28', '2016-03-28 18:30:00'),
(8, 'dssdgsdg', 'php developer', '<p>\r\n	sdfsdfsdfsd</p>\r\n', 0, 4, 0, '2016-03-31', '2016-03-30 18:30:00'),
(9, 'siby', 'dgdsgfg', '<p>\r\n	vnmvbcjsgadasfgkjsautgrfuaf yfargrfiuagfaiyyyyyyyyyyyyyyyyyyyyyyyyyyyyrfhgbssssssssssssssssssfj fd jsdfksd gawu guiguig iugiug</p>\r\n', 1, 4, 0, '2016-04-15', '2016-04-14 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE IF NOT EXISTS `user_address` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` varchar(111) NOT NULL,
  `country` int(11) NOT NULL,
  `state` varchar(111) NOT NULL,
  `default_billing_address` varchar(111) NOT NULL,
  `default_shipping_address` varchar(111) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `userid`, `first_name`, `last_name`, `company`, `contact_number`, `address_1`, `address_2`, `city`, `postcode`, `country`, `state`, `default_billing_address`, `default_shipping_address`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(7, 1, 'sdfsd', 'dfgdf', 'sdfds', '46546546', 'sdfsdfsd', 'sdfsdf', 'sdf', '33534', 4, 'dfgdfg', '1', '1', 0, 0, '0000-00-00', '2016-04-30 09:34:12'),
(9, 2, 'sdgsdg', 'dsgsdg', '', '4545454545', 'fsdfdsf', 'dfsdg', 'kochi', '454454', 4, 'kerala', '1', '1', 1, 0, '2016-04-12', '2016-04-29 12:32:16'),
(13, 1, 'Ashik', 'Ali', 'asds', 'dasdsadasd', '', '', 'sdsdfsd', '324324234', 3, 'Kerala', '', '', 0, 0, '0000-00-00', '2016-04-30 09:35:04'),
(14, 1, 'Ashikdrtret', 'Ali', '', '496879789', 'sdfdsfsdf', 'sdfsdfsdf', 'sdsdfsd', '324324234', 2, 'Kerala', '', '', 1, 0, '2016-04-29', '2016-04-30 09:34:38'),
(15, 1, 'siby', 'sam', '', '6756757', 'sdfsf', 'sdfsfs', 'dfsdrfs', '567575', 1, 'dfsdfgsdf', '', '', 1, 0, '2016-04-29', '2016-04-30 09:34:42'),
(17, 2, 'sdgsdg', 'dsgsdg', '', '4545454545', 'fsdfdsf', 'dfsdg', 'kochi', '454454', 4, 'kerala', '1', '1', 1, 0, '2016-04-12', '2016-04-29 12:22:25'),
(18, 1, 'Ashik', 'Ali', '', '435345345', 'sdfdsfsdf', 'sdfsdfsdf', 'sdsdfsd', '324324234', 4, 'Kerala', '', '', 1, 0, '2016-05-10', '0000-00-00 00:00:00'),
(19, 1, 'Ashik', 'Ali', '', '2424234234', 'sdfdsfsdf', 'sdfsdfsdf', 'sdsdfsd', '324324234', 3, 'Kerala', '', '', 1, 0, '2016-05-10', '0000-00-00 00:00:00'),
(20, 1, 'test', 'dfhdfh', '', '436457', 'dfgfdhfdh', 'fghfghfg', 'fghfghf', '5464565', 1, 'fdgdfg', '', '', 1, 0, '2016-05-21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
`id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no_1` varchar(100) NOT NULL,
  `phone_no_2` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confirm` varchar(225) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `wallet_amt` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `first_name`, `last_name`, `dob`, `gender`, `email`, `phone_no_1`, `phone_no_2`, `fax`, `password`, `confirm`, `newsletter`, `wallet_amt`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'siby', 'sam', '1991-03-24', 'female', 'tt', '456', '456464', '54545454', 'tt', '123456', 1, '0.00', 1, 1, 1, '2016-03-21', '2016-05-11 04:45:06'),
(2, 'shahana', 'mohan', '1992-07-05', 'female', 'we', '', '', '', 'we', 'shahana', 1, '0.00', 1, 1, 1, '2016-03-26', '2016-04-25 11:51:23'),
(4, 'Ashik', 'Ali', '1970-01-01', 'male', 'ashiq@intersmart.in', '09037187848', '09037187848', '2343242', '111', '111', 1, '0.00', 1, 1, 1, '2016-05-03', '0000-00-00 00:00:00'),
(5, 'Ashik', 'Ali', '2016-05-09', 'male', 'ashiq11@intersmart.in', '09037187848', '09037187848', '324234234234', 'qq', 'qq', 1, '1200.00', 1, 1, 1, '2016-05-03', '2016-05-11 04:42:33'),
(6, 'Ashik', 'Ali', '2016-05-15', 'male', 'ashiqsdsd@intersmart.in', '09037187848', '09037187848', '3424324', 'as', 'as', 1, '0.00', 1, 1, 1, '2016-05-03', '0000-00-00 00:00:00'),
(7, 'Ashik', 'Ali', '2016-05-23', 'male', 'ashiqerer@intersmart.in', '09037187848', '09037187848', '23423432432', 'sd', 'sd', 1, '0.00', 1, 1, 1, '2016-05-03', '0000-00-00 00:00:00'),
(8, 'Ashik', 'Ali', '1970-01-01', 'male', 'ashiqazxsc@intersmart.in', '09037187848', '09037187848', '324234234234', 'ed', 'ed', 1, '0.00', 1, 1, 1, '2016-05-04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_gifts`
--

CREATE TABLE IF NOT EXISTS `user_gifts` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `order_product_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=317 ;

--
-- Dumping data for table `user_gifts`
--

INSERT INTO `user_gifts` (`id`, `user_id`, `order_id`, `from`, `to`, `message`, `status`, `date`, `order_product_id`) VALUES
(67, 1, 111, 'hh', 'dfgdfgdf', 'gdfgdfgd', 1, '2016-04-25', 68),
(68, 1, 111, 'xdfg', 'dfgdf', 'ffffff', 1, '2016-04-25', 69),
(69, 1, 111, '', '', '', 1, '2016-04-25', 70),
(70, 1, 112, 'hh', 'dfgdfgdf', 'gdfgdfgd', 1, '2016-04-25', 71),
(71, 1, 112, 'xdfg', 'dfgdf', 'ffffff', 1, '2016-04-25', 72),
(72, 1, 112, '', '', '', 1, '2016-04-25', 73),
(73, 1, 113, 'hh', 'dfgdfgdf', 'gdfgdfgd', 1, '2016-04-25', 74),
(74, 1, 113, 'xdfg', 'dfgdf', 'ffffff', 1, '2016-04-25', 75),
(75, 1, 113, '', '', '', 1, '2016-04-25', 76),
(76, 1, 114, '', '', '', 1, '2016-04-25', 77),
(77, 1, 115, 'dsdfsd', 'sdsdds', 'dssdsd', 1, '2016-04-25', 78),
(78, 1, 116, '', '', '', 1, '2016-04-25', 79),
(79, 1, 117, '', '', '', 1, '2016-04-25', 80),
(80, 1, 118, '', '', '', 1, '2016-04-25', 81),
(81, 1, 118, '', '', '', 1, '2016-04-25', 82),
(82, 1, 119, 'dgd', 'dfgdfgdfg', 'dfgdfgdfg', 1, '2016-04-25', 83),
(83, 1, 120, 'sdfdsfds', 'sdfsf', 'fsdfdsfds', 1, '2016-04-25', 84),
(84, 1, 121, 'sdfdsfds', 'sdfsf', 'fsdfdsfds', 1, '2016-04-25', 85),
(85, 1, 122, 'sdfdsfds', 'sdfsf', 'fsdfdsfds', 1, '2016-04-25', 86),
(86, 1, 122, 'cfgb', 'cvbcvbcv', 'bvcb', 1, '2016-04-25', 87),
(87, 2, 123, '', '', '', 1, '2016-04-25', 88),
(88, 2, 124, 'sdfdsfdsf', 'sdfsdfdsf', 'sdfsdfsdfsdf', 1, '2016-04-25', 89),
(89, 1, 125, 'sdfdsfds', 'sdfsf', 'fsdfdsfds', 1, '2016-04-25', 90),
(90, 1, 125, 'cfgb', 'cvbcvbcv', 'bvcb', 1, '2016-04-25', 91),
(91, 1, 125, 'ttt', 'hhhh', 'hfsdfsdfs', 1, '2016-04-25', 92),
(92, 1, 126, 'ddd', 'dddd', 'ddd', 1, '2016-04-26', 93),
(93, 1, 127, '', '', '', 1, '2016-04-26', 94),
(94, 1, 127, '', '', '', 1, '2016-04-26', 95),
(95, 1, 128, '', '', '', 1, '2016-04-26', 96),
(96, 1, 129, '', '', '', 1, '2016-04-26', 97),
(97, 1, 130, '', '', '', 1, '2016-04-26', 98),
(98, 1, 131, '', '', '', 1, '2016-04-26', 99),
(99, 1, 132, '', '', '', 1, '2016-04-26', 100),
(100, 1, 133, '', '', '', 1, '2016-04-26', 101),
(101, 1, 133, 'dfg', 'fdgdfgfd', 'ggfdgfdvbvbvvbvbvb', 1, '2016-04-26', 102),
(102, 1, 134, 'sdfsdfsd', 'sdfsdfdsf', 'sdfsdf', 1, '2016-04-26', 103),
(103, 1, 134, 'sdfsdfsdf', 'fsdfsdfsdf', 'sdfsdfsdf', 1, '2016-04-26', 104),
(104, 1, 135, 'sdfsdfsd', 'sdfsdfdsf', 'sdfsdf', 1, '2016-04-26', 105),
(105, 1, 135, 'sdfsdfsdf', 'fsdfsdfsdf', 'sdfsdfsdf', 1, '2016-04-26', 106),
(106, 1, 136, '', '', '', 1, '2016-04-26', 107),
(107, 1, 137, '', '', '', 1, '2016-04-26', 108),
(108, 1, 137, '', '', '', 1, '2016-04-26', 109),
(109, 1, 138, '', '', '', 1, '2016-04-29', 110),
(110, 1, 138, 'Ashik', 'asas', 'asasa', 1, '2016-04-29', 111),
(111, 1, 139, 'vcbcv', 'cvbc', 'vbcvbcv', 1, '2016-04-29', 112),
(112, 1, 140, '', '', '', 1, '2016-04-30', 113),
(113, 1, 140, 'Ashik', 'ali', 'test', 1, '2016-04-30', 114),
(114, 1, 141, 'fghfghf', 'ghfgh', 'gfhgf', 1, '2016-04-30', 115),
(115, 1, 142, 'fghfghf', 'ghfgh', 'gfhgf', 1, '2016-04-30', 116),
(116, 1, 143, 'fghfghf', 'ghfgh', 'gfhgf', 1, '2016-04-30', 117),
(117, 1, 144, 'fghfghf', 'ghfgh', 'gfhgf', 1, '2016-04-30', 118),
(118, 1, 145, 'fghfghf', 'ghfgh', 'gfhgf', 1, '2016-04-30', 119),
(119, 1, 146, '', '', '', 1, '2016-05-02', 120),
(120, 1, 147, '', '', '', 1, '2016-05-02', 121),
(121, 1, 147, '', '', '', 1, '2016-05-02', 122),
(122, 1, 148, 'ghjhgj', 'jghjghjgh', 'hgjhgjhg', 1, '2016-05-02', 123),
(123, 1, 148, 'ghjhg', 'jghjhgjgh', 'jghjghj', 1, '2016-05-02', 124),
(124, 1, 149, 'ghjhgj', 'jghjghjgh', 'hgjhgjhg', 1, '2016-05-02', 125),
(125, 1, 149, 'ghjhg', 'jghjhgjgh', 'jghjghj', 1, '2016-05-02', 126),
(126, 1, 150, 'ghjhgj', 'jghjghjgh', 'hgjhgjhg', 1, '2016-05-02', 127),
(127, 1, 150, 'ghjhg', 'jghjhgjgh', 'jghjghj', 1, '2016-05-02', 128),
(128, 1, 151, 'ghjhgj', 'jghjghjgh', 'hgjhgjhg', 1, '2016-05-02', 129),
(129, 1, 151, 'ghjhg', 'jghjhgjgh', 'jghjghj', 1, '2016-05-02', 130),
(130, 1, 152, 'ghjhgj', 'jghjghjgh', 'hgjhgjhg', 1, '2016-05-02', 131),
(131, 1, 152, 'ghjhg', 'jghjhgjgh', 'jghjghj', 1, '2016-05-02', 132),
(132, 1, 153, 'ghjhgj', 'jghjghjgh', 'hgjhgjhg', 1, '2016-05-02', 133),
(133, 1, 153, 'ghjhg', 'jghjhgjgh', 'jghjghj', 1, '2016-05-02', 134),
(134, 1, 154, '', '', '', 1, '2016-05-03', 135),
(135, 1, 155, '', '', '', 1, '2016-05-03', 136),
(136, 1, 156, 'dsfdsfsd', 'fsdfsdfsdfsdf', 'sdfsdfdsf', 1, '2016-05-03', 137),
(137, 1, 157, 'dsfdsfsd', 'fsdfsdfsdfsdf', 'sdfsdfdsf', 1, '2016-05-03', 138),
(138, 3, 158, '', '', '', 1, '2016-05-03', 139),
(139, 1, 159, 'dsfdsfsd', 'fsdfsdfsdfsdf', 'sdfsdfdsf', 1, '2016-05-03', 140),
(140, 1, 160, '', '', '', 1, '2016-05-03', 141),
(141, 1, 161, '', '', '', 1, '2016-05-03', 142),
(142, 7, 162, '', '', '', 1, '2016-05-03', 143),
(143, 7, 163, '', '', '', 1, '2016-05-03', 144),
(144, 7, 164, '', '', '', 1, '2016-05-03', 145),
(145, 1, 165, '', '', '', 1, '2016-05-03', 146),
(146, 1, 165, '', '', '', 1, '2016-05-03', 147),
(147, 1, 165, '', '', '', 1, '2016-05-03', 148),
(148, 1, 166, '', '', '', 1, '2016-05-03', 149),
(149, 1, 166, '', '', '', 1, '2016-05-03', 150),
(150, 1, 166, '', '', '', 1, '2016-05-03', 151),
(151, 1, 167, '', '', '', 1, '2016-05-03', 152),
(152, 1, 167, '', '', '', 1, '2016-05-03', 153),
(153, 1, 167, '', '', '', 1, '2016-05-03', 154),
(154, 1, 168, '', '', '', 1, '2016-05-03', 155),
(155, 1, 168, '', '', '', 1, '2016-05-03', 156),
(156, 1, 168, '', '', '', 1, '2016-05-03', 157),
(157, 1, 169, '', '', '', 1, '2016-05-03', 158),
(158, 1, 169, '', '', '', 1, '2016-05-03', 159),
(159, 1, 169, '', '', '', 1, '2016-05-03', 160),
(160, 1, 170, '', '', '', 1, '2016-05-03', 161),
(161, 1, 170, '', '', '', 1, '2016-05-03', 162),
(162, 1, 170, '', '', '', 1, '2016-05-03', 163),
(163, 1, 171, '', '', '', 1, '2016-05-03', 164),
(164, 1, 171, '', '', '', 1, '2016-05-03', 165),
(165, 1, 171, '', '', '', 1, '2016-05-03', 166),
(166, 1, 172, '', '', '', 1, '2016-05-03', 167),
(167, 1, 172, '', '', '', 1, '2016-05-03', 168),
(168, 1, 172, '', '', '', 1, '2016-05-03', 169),
(169, 1, 173, '', '', '', 1, '2016-05-03', 170),
(170, 1, 173, '', '', '', 1, '2016-05-03', 171),
(171, 1, 173, '', '', '', 1, '2016-05-03', 172),
(172, 1, 174, '', '', '', 1, '2016-05-03', 173),
(173, 1, 174, '', '', '', 1, '2016-05-03', 174),
(174, 1, 174, '', '', '', 1, '2016-05-03', 175),
(175, 1, 175, '', '', '', 1, '2016-05-03', 176),
(176, 1, 175, '', '', '', 1, '2016-05-03', 177),
(177, 1, 175, '', '', '', 1, '2016-05-03', 178),
(178, 1, 176, '', '', '', 1, '2016-05-03', 179),
(179, 1, 176, '', '', '', 1, '2016-05-03', 180),
(180, 1, 176, '', '', '', 1, '2016-05-03', 181),
(181, 1, 177, '', '', '', 1, '2016-05-03', 182),
(182, 1, 177, '', '', '', 1, '2016-05-03', 183),
(183, 1, 177, '', '', '', 1, '2016-05-03', 184),
(184, 1, 186, '', '', '', 1, '2016-05-03', 185),
(185, 1, 186, '', '', '', 1, '2016-05-03', 186),
(186, 1, 186, '', '', '', 1, '2016-05-03', 187),
(187, 1, 195, '', '', '', 1, '2016-05-03', 188),
(188, 1, 195, '', '', '', 1, '2016-05-03', 189),
(189, 1, 195, '', '', '', 1, '2016-05-03', 190),
(190, 1, 197, '', '', '', 1, '2016-05-03', 191),
(191, 1, 197, '', '', '', 1, '2016-05-03', 192),
(192, 1, 197, '', '', '', 1, '2016-05-03', 193),
(193, 1, 201, '', '', '', 1, '2016-05-03', 194),
(194, 1, 202, '', '', '', 1, '2016-05-03', 195),
(195, 1, 203, '', '', '', 1, '2016-05-03', 196),
(196, 1, 204, '', '', '', 1, '2016-05-03', 197),
(197, 1, 204, '', '', '', 1, '2016-05-03', 198),
(198, 1, 204, '', '', '', 1, '2016-05-03', 199),
(199, 1, 205, '', '', '', 1, '2016-05-03', 200),
(200, 1, 205, '', '', '', 1, '2016-05-03', 201),
(201, 1, 205, '', '', '', 1, '2016-05-03', 202),
(202, 1, 206, '', '', '', 1, '2016-05-03', 203),
(203, 1, 206, '', '', '', 1, '2016-05-03', 204),
(204, 1, 206, '', '', '', 1, '2016-05-03', 205),
(205, 1, 207, '', '', '', 1, '2016-05-03', 206),
(206, 1, 207, '', '', '', 1, '2016-05-03', 207),
(207, 1, 207, '', '', '', 1, '2016-05-03', 208),
(208, 1, 208, '', '', '', 1, '2016-05-03', 209),
(209, 1, 208, '', '', '', 1, '2016-05-03', 210),
(210, 1, 208, '', '', '', 1, '2016-05-03', 211),
(211, 1, 209, '', '', '', 1, '2016-05-03', 212),
(212, 1, 209, '', '', '', 1, '2016-05-03', 213),
(213, 1, 209, '', '', '', 1, '2016-05-03', 214),
(214, 1, 210, '', '', '', 1, '2016-05-03', 215),
(215, 1, 210, '', '', '', 1, '2016-05-03', 216),
(216, 1, 210, '', '', '', 1, '2016-05-03', 217),
(217, 1, 211, '', '', '', 1, '2016-05-03', 218),
(218, 1, 211, '', '', '', 1, '2016-05-03', 219),
(219, 1, 211, '', '', '', 1, '2016-05-03', 220),
(220, 8, 212, '', '', '', 1, '2016-05-04', 221),
(221, 8, 213, '', '', '', 1, '2016-05-04', 222),
(222, 1, 214, 'asdadasd', 'Asdasdas', 'dasasdasd', 1, '2016-05-04', 223),
(223, 1, 214, 'sdsd', 'ffsdfds', 'fsdfsdf', 1, '2016-05-04', 224),
(224, 1, 215, 'asdadasd', 'Asdasdas', 'dasasdasd', 1, '2016-05-04', 225),
(225, 1, 215, 'sdsd', 'ffsdfds', 'fsdfsdf', 1, '2016-05-04', 226),
(226, 2, 216, 'sdfsfsd', 'fsdfsdfsdf', 'fsdfds', 1, '2016-05-06', 227),
(227, 1, 217, '', '', '', 1, '2016-05-06', 228),
(228, 1, 218, '', '', '', 1, '2016-05-06', 229),
(229, 1, 218, '', '', '', 1, '2016-05-06', 230),
(230, 1, 219, '', '', '', 1, '2016-05-06', 231),
(231, 1, 219, 'dfgdg', 'dfgdfgdf', 'gdfgfdg', 1, '2016-05-06', 232),
(232, 1, 220, '', '', '', 1, '2016-05-07', 233),
(233, 1, 221, '', '', '', 1, '2016-05-09', 234),
(234, 1, 221, '', '', '', 1, '2016-05-09', 235),
(235, 1, 222, '', '', '', 1, '2016-05-09', 236),
(236, 1, 222, '', '', '', 1, '2016-05-09', 237),
(237, 1, 223, '', '', '', 1, '2016-05-09', 238),
(238, 1, 223, '', '', '', 1, '2016-05-09', 239),
(239, 1, 224, 'dfdfgdfg', 'dfgdfgfd', 'gdfgfdg', 1, '2016-05-09', 240),
(240, 1, 224, '', '', '', 1, '2016-05-09', 241),
(241, 1, 225, 'dfdfgdfg', 'dfgdfgfd', 'gdfgfdg', 1, '2016-05-09', 242),
(242, 1, 225, '', '', '', 1, '2016-05-09', 243),
(243, 1, 226, 'dfdfgdfg', 'dfgdfgfd', 'gdfgfdg', 1, '2016-05-09', 244),
(244, 1, 226, '', '', '', 1, '2016-05-09', 245),
(245, 1, 227, '', '', '', 1, '2016-05-09', 246),
(246, 1, 227, '', '', '', 1, '2016-05-09', 247),
(247, 1, 228, '', '', '', 1, '2016-05-09', 248),
(248, 1, 228, '', '', '', 1, '2016-05-09', 249),
(249, 1, 229, '', '', '', 1, '2016-05-09', 250),
(250, 1, 230, '', '', '', 1, '2016-05-09', 251),
(251, 1, 231, 'asdas', 'dasdasd', 'asdas', 1, '2016-05-09', 252),
(252, 1, 232, 'asdas', 'dasdasd', 'asdas', 1, '2016-05-09', 253),
(253, 2, 233, '', '', '', 1, '2016-05-10', 254),
(254, 2, 234, 'sfsd', 'fsdfsdfsdfsdfsdfsdf', 'sdfsdf', 1, '2016-05-10', 255),
(255, 2, 235, 'sfsd', 'fsdfsdfsdfsdfsdfsdf', 'sdfsdf', 1, '2016-05-10', 256),
(256, 2, 236, '', '', '', 1, '2016-05-10', 257),
(257, 2, 236, '', '', '', 1, '2016-05-10', 258),
(258, 2, 238, '', '', '', 1, '2016-05-10', 259),
(259, 2, 238, '', '', '', 1, '2016-05-10', 260),
(260, 2, 239, '', '', '', 1, '2016-05-10', 261),
(261, 2, 240, '', '', '', 1, '2016-05-10', 262),
(262, 2, 240, '', '', '', 1, '2016-05-10', 263),
(263, 2, 241, '', '', '', 1, '2016-05-10', 264),
(264, 2, 242, '', '', '', 1, '2016-05-10', 265),
(265, 2, 243, '', '', '', 1, '2016-05-10', 266),
(266, 2, 244, '', '', '', 1, '2016-05-10', 267),
(267, 2, 245, '', '', '', 1, '2016-05-10', 268),
(268, 2, 246, '', '', '', 1, '2016-05-10', 269),
(269, 2, 247, '', '', '', 1, '2016-05-10', 270),
(270, 2, 248, '', '', '', 1, '2016-05-10', 271),
(271, 2, 249, '', '', '', 1, '2016-05-10', 272),
(272, 2, 250, '', '', '', 1, '2016-05-10', 273),
(273, 2, 251, '', '', '', 1, '2016-05-10', 274),
(274, 2, 252, 'dsfsdfsdf', 'sdfsdfsdsdfsdsdf', 'sdfsdfsdf', 1, '2016-05-10', 275),
(275, 2, 253, '', '', '', 1, '2016-05-10', 276),
(276, 2, 254, '', '', '', 1, '2016-05-10', 277),
(277, 2, 255, '', '', '', 1, '2016-05-10', 278),
(278, 2, 255, '', '', '', 1, '2016-05-10', 279),
(279, 2, 256, '', '', '', 1, '2016-05-10', 280),
(280, 2, 256, '', '', '', 1, '2016-05-10', 281),
(281, 1, 257, '', '', '', 1, '2016-05-10', 282),
(282, 1, 258, '', '', '', 1, '2016-05-10', 283),
(283, 1, 260, '', '', '', 1, '2016-05-10', 284),
(284, 1, 261, '', '', '', 1, '2016-05-10', 285),
(285, 1, 262, '', '', '', 1, '2016-05-10', 286),
(286, 1, 262, '', '', '', 1, '2016-05-10', 287),
(287, 1, 263, '', '', '', 1, '2016-05-11', 288),
(288, 1, 264, '', '', '', 1, '2016-05-11', 289),
(289, 1, 265, '', '', '', 1, '2016-05-11', 290),
(290, 1, 265, '', '', '', 1, '2016-05-11', 291),
(291, 1, 266, '', '', '', 1, '2016-05-11', 292),
(292, 1, 267, '', '', '', 1, '2016-05-11', 293),
(293, 1, 268, '', '', '', 1, '2016-05-11', 294),
(294, 1, 269, '', '', '', 1, '2016-05-11', 295),
(295, 1, 269, '', '', '', 1, '2016-05-11', 296),
(296, 1, 270, '', '', '', 1, '2016-05-11', 297),
(297, 2, 271, '', '', '', 1, '2016-05-11', 298),
(298, 1, 272, 'xvc', 'xcxcvxc', 'vxcv', 1, '2016-05-11', 299),
(299, 1, 273, 'Ashik', 'adasd', 'dasdsadsa', 1, '2016-05-11', 300),
(300, 1, 274, 'dgfg', 'dfgfdg', 'dfgdfgfdg', 1, '2016-05-11', 301),
(301, 1, 275, 'sdffsd', 'fsdfsdfsdffsdfsdf', 'sdfsdfsdf', 1, '2016-05-11', 302),
(302, 1, 276, 'fsdfsdf', 'sdfsdfsdfsdfdfsd', 'sdfsdfsd', 1, '2016-05-11', 303),
(303, 1, 276, 'sdfsdfdsdf', 'fsdfsdfsdffsdfsdffsd', 'fsdfsdfsd', 1, '2016-05-11', 304),
(304, 1, 276, 'sdfsdfdsfsdfds', 'fsdf', 'sdfsdf', 1, '2016-05-11', 305),
(305, 1, 276, 'vvv', 'sdfsdfsdfsf', 'sdfsdfsdfsdf', 1, '2016-05-11', 306),
(306, 1, 277, 'iui', 'yuiuy', 'iyuiyui', 1, '2016-05-11', 307),
(307, 1, 277, 'bbcvb', 'cvcvcv', 'cbcvcv', 1, '2016-05-11', 308),
(308, 1, 278, 'dsfd', 'fsdfsdfsdffsdfsdffsd', 'sdfsdf', 1, '2016-05-11', 309),
(309, 1, 278, 'sdfsdfsdfsd', 'sdfsdfsdf', 'sdfsdf', 1, '2016-05-11', 310),
(310, 1, 279, 'rtret', 'te', 'retertert', 1, '2016-05-11', 311),
(311, 1, 279, 'ertert', 'rtert', 'retretert', 1, '2016-05-11', 312),
(312, 1, 280, '', '', '', 1, '2016-05-11', 313),
(313, 1, 281, '', '', '', 1, '2016-05-11', 314),
(314, 1, 282, '', '', '', 1, '2016-05-17', 315),
(315, 1, 283, '', '', '', 1, '2016-05-17', 316),
(316, 1, 284, 'erytry', 'rtyrty', 'rtyrtyrty', 1, '2016-05-21', 317);

-- --------------------------------------------------------

--
-- Table structure for table `user_giftscard_history`
--

CREATE TABLE IF NOT EXISTS `user_giftscard_history` (
`id` int(11) NOT NULL,
  `giftcard_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(225) NOT NULL,
  `unique_code` varchar(225) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_notify`
--

CREATE TABLE IF NOT EXISTS `user_notify` (
`id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_notify`
--

INSERT INTO `user_notify` (`id`, `email_id`, `prod_id`, `status`, `date`) VALUES
(5, '', 11, 1, '2016-05-19'),
(7, '', 10, 1, '2016-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

CREATE TABLE IF NOT EXISTS `user_reviews` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guest_user` varchar(225) NOT NULL,
  `user_image` varchar(225) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `approvel` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_sizechart`
--

CREATE TABLE IF NOT EXISTS `user_sizechart` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `type` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `standerd` int(11) NOT NULL,
  `around_neck` float NOT NULL,
  `neck_depth` float NOT NULL,
  `around_upper_chest` float NOT NULL,
  `around_chest` float NOT NULL,
  `around_lower_chest` float NOT NULL,
  `shoulder_to_breastpoint` float NOT NULL,
  `around_waist` float NOT NULL,
  `shoulder_to_waist` float NOT NULL,
  `around_armhole` float NOT NULL,
  `sleeve_length` float NOT NULL,
  `arm_length` float NOT NULL,
  `around_upper_arm` float NOT NULL,
  `around_elbow` float NOT NULL,
  `around_wrist` float NOT NULL,
  `length_upper_garment` float NOT NULL,
  `shoulder_width` float NOT NULL,
  `around_lower_waist` float NOT NULL,
  `waist_to_ankle` float NOT NULL,
  `inseam_to_ankle` float NOT NULL,
  `around_hip` float NOT NULL,
  `around_tigh` float NOT NULL,
  `around_knee` float NOT NULL,
  `around_calf` float NOT NULL,
  `around_ankle` float NOT NULL,
  `skirt_length` float NOT NULL,
  `gown_full_length` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user_sizechart`
--

INSERT INTO `user_sizechart` (`id`, `user_id`, `product_name`, `product_code`, `type`, `unit`, `standerd`, `around_neck`, `neck_depth`, `around_upper_chest`, `around_chest`, `around_lower_chest`, `shoulder_to_breastpoint`, `around_waist`, `shoulder_to_waist`, `around_armhole`, `sleeve_length`, `arm_length`, `around_upper_arm`, `around_elbow`, `around_wrist`, `length_upper_garment`, `shoulder_width`, `around_lower_waist`, `waist_to_ankle`, `inseam_to_ankle`, `around_hip`, `around_tigh`, `around_knee`, `around_calf`, `around_ankle`, `skirt_length`, `gown_full_length`, `date`) VALUES
(13, 1, 'qwewqe', 'p5', 2, 1, 0, 0.393701, 0.393701, 0.393701, 0.393701, 0.393701, 0.393701, 0.393701, 0.393701, 0.393701, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-04-28'),
(14, 1, 'asas', 'S1', 2, 1, 0, 2.54, 2.54, 2.54, 2.54, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-04-28'),
(15, 1, 'ffsdfdsf', 'sdfsdf', 2, 2, 0, 12, 12, 12, 0, 0, 12, 0, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-04-28'),
(16, 1, 'ffsdfdsf', 'sdfsdf', 2, 2, 0, 12, 12, 12, 0, 0, 12, 0, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `user_standard_sizechart`
--

CREATE TABLE IF NOT EXISTS `user_standard_sizechart` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `standard` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_standard_sizechart`
--

INSERT INTO `user_standard_sizechart` (`id`, `user_id`, `product_id`, `standard`, `date`) VALUES
(1, 1, '0', 1, '2016-04-13'),
(2, 1, '0', 2, '2016-04-13'),
(3, 1, '0', 1, '2016-04-13'),
(4, 1, '0', 2, '2016-04-13'),
(5, 1, '0', 3, '2016-04-13'),
(6, 1, '0', 3, '2016-04-13'),
(7, 1, '', 2, '2016-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlist`
--

CREATE TABLE IF NOT EXISTS `user_wishlist` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `session_id` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_wishlist`
--

INSERT INTO `user_wishlist` (`id`, `user_id`, `prod_id`, `date`, `session_id`) VALUES
(1, 1, 12, '2016-04-12', 0),
(5, 1, 11, '2016-04-27', 0),
(7, 1, 10, '2016-04-27', 0),
(8, 1, 11, '2016-04-29', 0),
(9, 0, 11, '2016-05-19', 1463628690.4646),
(10, 0, 0, '2016-05-19', 1463628690.4646),
(11, 0, 0, '2016-05-20', 1463723914.635);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE IF NOT EXISTS `wallet_history` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `entry_date` datetime NOT NULL,
  `credit_debit` int(11) NOT NULL COMMENT '1=>credit, 2=>debit',
  `balance_amt` decimal(10,2) NOT NULL,
  `ids` int(11) NOT NULL COMMENT 'eg:purchase_id',
  `field1` varchar(200) NOT NULL,
  `field2` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `wallet_history`
--

INSERT INTO `wallet_history` (`id`, `user_id`, `type_id`, `amount`, `entry_date`, `credit_debit`, `balance_amt`, `ids`, `field1`, `field2`) VALUES
(1, 1, 3, '100.00', '2016-03-22 13:26:01', 2, '900.00', 33, 'ewr', 0),
(2, 1, 3, '500.00', '2016-03-22 13:26:19', 2, '400.00', 4, 'er', 0),
(3, 1, 3, '300.00', '2016-03-22 13:27:04', 2, '100.00', 33, 'gf', 0),
(4, 1, 3, '1.00', '2016-03-22 13:30:16', 2, '99.00', 2, 'sd', 0),
(5, 1, 2, '100.00', '2016-03-24 04:34:30', 1, '199.00', 0, 'chummma', 0),
(6, 1, 2, '1.00', '2016-03-24 04:39:03', 1, '200.00', 0, 'rete', 0),
(7, 1, 3, '100.00', '2016-03-24 04:39:18', 2, '100.00', 2, 'ui', 0),
(8, 1, 3, '100.00', '2016-03-24 04:41:17', 2, '0.00', 2, 'ui', 0),
(9, 1, 2, '200.00', '2016-03-24 04:43:38', 1, '200.00', 0, 'rsr', 0),
(10, 1, 2, '1000.00', '2016-03-24 04:44:21', 1, '1200.00', 0, 'dh', 0),
(11, 1, 2, '1000.00', '2016-03-24 04:45:05', 1, '2200.00', 0, 'dh', 0),
(12, 1, 2, '1000.00', '2016-03-24 04:45:26', 1, '3200.00', 0, 'dh', 0),
(13, 1, 2, '1000.00', '2016-03-24 04:47:24', 1, '4200.00', 0, 'dh', 0),
(14, 1, 2, '1000.00', '2016-03-24 04:47:46', 1, '5200.00', 0, 'dh', 0),
(15, 1, 2, '1000.00', '2016-03-24 04:48:12', 1, '6200.00', 0, 'dh', 0),
(16, 1, 2, '1000.00', '2016-03-24 04:48:38', 1, '7200.00', 0, 'dh', 0),
(17, 1, 2, '1000.00', '2016-03-24 04:48:49', 1, '8200.00', 0, 'dh', 0),
(18, 1, 3, '400.00', '2016-03-24 04:53:37', 2, '7800.00', 22, 'erty', 0),
(19, 1, 3, '400.00', '2016-03-24 04:53:58', 2, '7400.00', 22, 'erty', 0),
(20, 1, 3, '400.00', '2016-03-24 04:54:33', 2, '7000.00', 22, 'erty', 0),
(21, 1, 3, '400.00', '2016-03-24 04:55:18', 2, '6600.00', 22, 'erty', 0),
(22, 1, 2, '1000.00', '2016-03-24 04:58:15', 1, '7600.00', 0, 'dh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `weight_class`
--

CREATE TABLE IF NOT EXISTS `weight_class` (
`id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `weight_class`
--

INSERT INTO `weight_class` (`id`, `title`, `unit`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'kilogram', 'kg', 4, 0, '2016-01-12', '0000-00-00 00:00:00'),
(2, 'Gram', 'gm', 4, 0, '2016-01-12', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_post`
--
ALTER TABLE `admin_post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
 ADD PRIMARY KEY (`id`), ADD KEY `admin_post_id` (`admin_post_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_appointment`
--
ALTER TABLE `book_appointment`
 ADD PRIMARY KEY (`id`), ADD KEY `country` (`country`), ADD KEY `country_2` (`country`), ADD KEY `country_3` (`country`), ADD KEY `country_4` (`country`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id`), ADD KEY `product_id` (`product_id`), ADD KEY `user_id` (`user_id`), ADD KEY `user_id_2` (`user_id`), ADD KEY `user_id_3` (`user_id`), ADD KEY `product_id_2` (`product_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
 ADD PRIMARY KEY (`id`), ADD KEY `product_id` (`product_id`), ADD KEY `user_id` (`user_id`), ADD FULLTEXT KEY `user_id_2` (`user_id`);

--
-- Indexes for table `coupons_used`
--
ALTER TABLE `coupons_used`
 ADD PRIMARY KEY (`id`), ADD KEY `product_id` (`product_id`), ADD KEY `user_id` (`user_id`), ADD FULLTEXT KEY `user_id_2` (`user_id`);

--
-- Indexes for table `coupon_history`
--
ALTER TABLE `coupon_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dimension_class`
--
ALTER TABLE `dimension_class`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
 ADD PRIMARY KEY (`Id`), ADD KEY `country_id` (`country_id`), ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_card`
--
ALTER TABLE `gift_card`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_category`
--
ALTER TABLE `home_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_subcategory`
--
ALTER TABLE `home_subcategory`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `make_payment`
--
ALTER TABLE `make_payment`
 ADD PRIMARY KEY (`id`), ADD KEY `userid` (`userid`);

--
-- Indexes for table `master_category`
--
ALTER TABLE `master_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_category_tags`
--
ALTER TABLE `master_category_tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_history_type`
--
ALTER TABLE `master_history_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_options`
--
ALTER TABLE `master_options`
 ADD PRIMARY KEY (`id`), ADD KEY `product_id` (`product_id`,`option_type_id`), ADD KEY `option_type_id` (`option_type_id`);

--
-- Indexes for table `master_shipping_types`
--
ALTER TABLE `master_shipping_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_size`
--
ALTER TABLE `master_size`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_category`
--
ALTER TABLE `option_category`
 ADD PRIMARY KEY (`id`), ADD KEY `option_type_id` (`option_type_id`);

--
-- Indexes for table `option_details`
--
ALTER TABLE `option_details`
 ADD PRIMARY KEY (`id`), ADD KEY `master_option_id` (`master_option_id`,`color_id`,`size_id`), ADD KEY `color_id` (`color_id`), ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `option_type`
--
ALTER TABLE `option_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `address_book_id` (`ship_address_id`), ADD KEY `admin_status` (`admin_status`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
 ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`), ADD KEY `product_id` (`product_id`), ADD KEY `order_id_2` (`order_id`), ADD KEY `product_id_2` (`product_id`), ADD KEY `order_id_3` (`order_id`), ADD KEY `product_id_3` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`), ADD KEY `category_id_2` (`category_id`), ADD KEY `category_id_3` (`category_id`), ADD KEY `category_id_4` (`category_id`);

--
-- Indexes for table `products1`
--
ALTER TABLE `products1`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`), ADD KEY `category_id_2` (`category_id`), ADD KEY `category_id_3` (`category_id`), ADD KEY `category_id_4` (`category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category_path`
--
ALTER TABLE `product_category_path`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_description`
--
ALTER TABLE `product_description`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
 ADD PRIMARY KEY (`id`), ADD KEY `product_id` (`product_id`), ADD KEY `country` (`country`);

--
-- Indexes for table `product_mail_template`
--
ALTER TABLE `product_mail_template`
 ADD PRIMARY KEY (`id`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_viewed`
--
ALTER TABLE `product_viewed`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
 ADD PRIMARY KEY (`id`), ADD KEY `country` (`country`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`Id`), ADD KEY `country_id` (`country_id`), ADD KEY `country_id_2` (`country_id`);

--
-- Indexes for table `static_page`
--
ALTER TABLE `static_page`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_user_gifts`
--
ALTER TABLE `temp_user_gifts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
 ADD PRIMARY KEY (`id`), ADD KEY `country` (`country`), ADD KEY `state` (`state`), ADD KEY `state_2` (`state`), ADD KEY `country_2` (`country`), ADD KEY `country_3` (`country`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_gifts`
--
ALTER TABLE `user_gifts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_giftscard_history`
--
ALTER TABLE `user_giftscard_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notify`
--
ALTER TABLE `user_notify`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reviews`
--
ALTER TABLE `user_reviews`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user_sizechart`
--
ALTER TABLE `user_sizechart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_standard_sizechart`
--
ALTER TABLE `user_standard_sizechart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`,`type_id`), ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `weight_class`
--
ALTER TABLE `weight_class`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_post`
--
ALTER TABLE `admin_post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `book_appointment`
--
ALTER TABLE `book_appointment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `coupon_history`
--
ALTER TABLE `coupon_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dimension_class`
--
ALTER TABLE `dimension_class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `gift_card`
--
ALTER TABLE `gift_card`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `home_category`
--
ALTER TABLE `home_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `home_subcategory`
--
ALTER TABLE `home_subcategory`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `make_payment`
--
ALTER TABLE `make_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_category`
--
ALTER TABLE `master_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_category_tags`
--
ALTER TABLE `master_category_tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_history_type`
--
ALTER TABLE `master_history_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_options`
--
ALTER TABLE `master_options`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `master_shipping_types`
--
ALTER TABLE `master_shipping_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_size`
--
ALTER TABLE `master_size`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `option_category`
--
ALTER TABLE `option_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `option_details`
--
ALTER TABLE `option_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `option_type`
--
ALTER TABLE `option_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=285;
--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=318;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products1`
--
ALTER TABLE `products1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_category_path`
--
ALTER TABLE `product_category_path`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_description`
--
ALTER TABLE `product_description`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product_mail_template`
--
ALTER TABLE `product_mail_template`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_viewed`
--
ALTER TABLE `product_viewed`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `static_page`
--
ALTER TABLE `static_page`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_user_gifts`
--
ALTER TABLE `temp_user_gifts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_gifts`
--
ALTER TABLE `user_gifts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=317;
--
-- AUTO_INCREMENT for table `user_giftscard_history`
--
ALTER TABLE `user_giftscard_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_notify`
--
ALTER TABLE `user_notify`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_reviews`
--
ALTER TABLE `user_reviews`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_sizechart`
--
ALTER TABLE `user_sizechart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_standard_sizechart`
--
ALTER TABLE `user_standard_sizechart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `weight_class`
--
ALTER TABLE `weight_class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_appointment`
--
ALTER TABLE `book_appointment`
ADD CONSTRAINT `book_appointment_ibfk_1` FOREIGN KEY (`country`) REFERENCES `countries` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`Id`);

--
-- Constraints for table `make_payment`
--
ALTER TABLE `make_payment`
ADD CONSTRAINT `make_payment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user_details` (`id`);

--
-- Constraints for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
ADD CONSTRAINT `shipping_charges_ibfk_1` FOREIGN KEY (`country`) REFERENCES `countries` (`id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`country`) REFERENCES `countries` (`id`);

--
-- Constraints for table `wallet_history`
--
ALTER TABLE `wallet_history`
ADD CONSTRAINT `wallet_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`id`),
ADD CONSTRAINT `wallet_history_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `master_history_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
