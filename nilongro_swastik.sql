-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2026 at 11:24 PM
-- Server version: 5.7.44-48
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nilongro_swastik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `logo`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'himanshu df', '15207680631001.png', '', '$2y$13$nrylH7bB41tGZv8lUKICdOQhwUbhKDLQ0J0.LoaUIFyv9/N33c.8S', 'vl7q6mZnz2GKNsp48ck91YuiKZTAdZDZ_1520446096', 'himanshu53939@gmail.com', 10, 1459751309, 1520768063),
(2, 'Admin', '', '', '$2y$13$nrylH7bB41tGZv8lUKICdOQhwUbhKDLQ0J0.LoaUIFyv9/N33c.8S', 'vl7q6mZnz2GKNsp48ck91YuiKZTAdZDZ_1520446096', 'admin@export.com', 10, 1459751309, 1520768063);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `name`, `image`, `date`, `status`) VALUES
(3, 'MAKINO', '59bcf5556fc23.jpg', '1616-0909-1717', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`, `image`, `id`, `date`) VALUES
(1, 'FORMALIN HYDRATE', '', 0, '10-05-18'),
(2, 'NEW GROUP', '', 0, '19-05-18'),
(3, 'FORMALDEHYDE', '', 0, '06-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `cgroup`
--

CREATE TABLE `cgroup` (
  `cgroup_id` int(10) NOT NULL,
  `cgroup_name` varchar(200) NOT NULL,
  `cgroup_price` varchar(5) NOT NULL,
  `cgroup_c_date` varchar(50) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgroup`
--

INSERT INTO `cgroup` (`cgroup_id`, `cgroup_name`, `cgroup_price`, `cgroup_c_date`, `status`) VALUES
(1, 'A', '-1', '09-05-2018', 1),
(2, 'B', '0.10', '09-05-2018', 1),
(3, 'C', '0.50', '19-05-2018', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `cgroup_id` int(10) NOT NULL,
  `cgroup_name` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `godown` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `delivery_charge` varchar(10) NOT NULL,
  `distance` varchar(10) NOT NULL,
  `deliverydays` int(2) NOT NULL,
  `payterm` varchar(255) NOT NULL,
  `contactnumber` varchar(20) NOT NULL,
  `alteremail` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `date` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `head` varchar(255) NOT NULL,
  `sales` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `customer_code` varchar(255) NOT NULL,
  `id_login` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `TallyPosted` varchar(1) NOT NULL DEFAULT 'N',
  `TallyRemarks` varchar(255) NOT NULL,
  `TallyPostDt` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `cgroup_id`, `cgroup_name`, `name`, `company_name`, `designation`, `address`, `godown`, `city`, `state`, `pincode`, `delivery_charge`, `distance`, `deliverydays`, `payterm`, `contactnumber`, `alteremail`, `mobile`, `phone`, `email`, `gst`, `pan`, `date`, `type`, `head`, `sales`, `username`, `customer_code`, `id_login`, `status`, `TallyPosted`, `TallyRemarks`, `TallyPostDt`) VALUES
(4, 0, '', 'ACCT', '', 'ACCOUNTS OFFICER', 'NARANPURA', '', 'AHMEDABAD', 'GUJARAT', '380013', '', '', 0, '', '', '', '4568529517', '2586547530', 'acct@GMAIL.COM', '', 'AMNPK1200J', '21-04-18', 2, 'admin', '', 'acct', '', 5, 1, 'N', '', ''),
(9, 1, '', 'DLR1', 'DLR1', 'DEALER OWNER', 'PALDI', '', 'AHMEDABAD', 'Gujarat', '380007', '50', '15', 1, '7 DAYS', '', '', '1234567890', '07123456789', 'D@GMAIL.COM', '24BCABD2100M28S', 'BCABD2100M', '09-05-2018', 1, 'accountuser', '', 'dlr1', '', 7, 1, 'Y', 'CREATED', '11-05-2018 18:29:43'),
(8, 1, '', 'ABC', 'ABC CO.', 'CUSTOMER OWNER', 'PALDI', '', 'AHMEDABAD', 'Gujarat', '380007', '500', '20', 1, '7 DAYS', '', '', '07123456789', '07123456789', 'CUST2@GMAIL.COM', '24AAAAA1719K18Z', 'AAAAA1719K', '09-05-2018', 5, '', '', 'abc', '', 6, 1, 'Y', 'CREATED', '11-05-2018 18:35:41'),
(10, 2, '', 'XYZ', 'XYZ', 'OWNER CUSTOMER', 'NAVRANGPURA', '', 'AHMEDABAD', 'Gujarat', '380009', '2500', '400', 2, '7 days', '', '', '9876543210', '1234567890', 'xyz@gmail.com', '24AAAAA1719K18Z', 'AAAAA1719K', '12-05-2018', 5, '', '', 'xyz', '', 8, 1, 'Y', 'CREATED', '14-05-2018 12:14:12'),
(11, 0, '', 'EXEC1', '', 'SALES EXECUTIVE', 'MANINAGAR', '', 'AHMEDABAD', 'Gujarat', '380008', '', '', 0, '', '', '', '8520321645', '07123456789', 'E@GMAIL.COM', '', 'ABCDE9876K', '12-05-18', 4, 'admin', '', 'exec1', '', 9, 1, 'N', '', ''),
(12, 2, '', 'CUST2', 'CUST2', 'CUSTOMER OWNER', 'BORIVALLI', '', 'MUMBAI', 'MAHARASHTRA', '400001', '500', '50', 1, '7 DAYS', '', '', '9876543210', '07123456789', 'D@GMAIL.COM', '27ABCDE9876KO5K', 'ABCDE9876K', '14-05-2018', 5, 'exec1', '', 'cust2', '', 10, 1, 'Y', 'CREATED', '14-05-2018 12:14:12'),
(13, 1, '', 'Ravi', 'UNITED RESIN', 'OWNER CUSTOMER', 'MUMBAI', '', 'MUMBAI', 'MAHARASHTRA', '400001', '1000', '50', 1, '60 DAYS', '', '', '9999912345', '07123456789', 'united@gmail.com', '27ABCDE9876KO5K', 'ABCDE9876K', '19-05-2018', 5, 'exec1', '', 'united', '', 11, 1, 'Y', 'CREATED', '19-05-2018 12:18:15'),
(14, 1, '', 'JAY', 'JAYESH TRADING', 'DEALER OWNER', 'MUMBAI', '', 'MUMBAI', 'MAHARASHTRA', '400001', '1200', '70', 1, '60 DAYS', '', '', '9876543210', '1234567890', 'jay@gmail.com', '27ASDFG1234I81Z', 'ASDFG1234', '19-05-2018', 1, 'accountuser', '', 'jay', '', 12, 1, 'Y', 'CREATED', '19-05-2018 12:13:20'),
(15, 0, '', 'SACHIN', '', 'SALES EXECUTIVE', 'MUMBAI', '', 'MUMBAI', 'MAHARASHTRA', '400001', '', '', 0, '', '', '', '1234569870', '9874563210', 'sachin@balajiformalin.com', '', 'AAAAA1719K', '19-05-18', 4, 'admin', '', 'sachin', '', 13, 1, 'N', '', ''),
(16, 1, '', 'ANANT JOSHI', 'AQUAPHARM CHEMICALS PVT LTD', 'officer ', 'PLOT NO K3/1K3/2, ADDITIONAL MAHAD INDUSTRIAL AREA\r\nMIDC,MAHAD,DIST. RAIGAD', '', 'mahad', 'maharashtra', '402302', '500', '150', 0, '90 days ', '', '', '9561655999', '', 'joshi.anant@aquapharm.net', '27AAECA7014R1ZB', '', '21-05-2018', 5, 'exec1', '', 'acqua', '', 14, 1, 'Y', 'CREATED', '06-06-2018 18:22:35'),
(17, 2, '', 'Kunal Shirke ', 'Millennium Boards Pvt Ltd', 'Purchase Executive', 'Plot No B-16,MIDC Tembhurni, Madha, Solapur', '', 'SOLAPUR', 'MAHARASHTRA', '413211', '600', '200', 2, '60 DAYS ', '', '', '9075025087', '9075025087', 'kunal@amazonwood.in', '27AAHCM2916R1ZV', '', '21-05-2018', 5, 'exec1', '', 'mille ', '', 15, 1, 'Y', 'ALTERED', '06-06-2018 18:22:36'),
(18, 1, '', 'Narshiha Rao ', 'Bharat Board Industries', 'purchase officer ', '16-94 IDA Bollaram,Jinnaram Mandal,Medak District,Hyderabad', '', 'HYDERABAD', 'MANDAL', '', '1000', '700', 4, '60 DAYS ', '', '', '7330911436', '7330911436', '', '36AADFB3625M1ZF', '', '21-05-2018', 5, 'exec1', '', 'bhara', '', 16, 1, 'Y', 'CREATED', '06-06-2018 18:22:37'),
(19, 1, '', 'UMA', 'Leo Laminates Private limited', 'OFFICER', 'Sy.No.252 Gaganpahad,Hyderabad R.R.DT\r\nHyderabad - 8008620909\r\nInfo@leolaminates.Com', '', 'HYDRABAD', 'Telangana', '500005', '2400', '700', 3, '5 DAYS', '', '', '8008620909', '8008620909', 'Info@leolaminates.Com', '36AAACL2456L1ZD', 'AAACL2456L', '06-06-2018', 5, 'exec1', '', 'LEO', '', 17, 1, 'Y', 'CREATED', '06-06-2018 18:22:39'),
(20, 1, '', 'MANMOHAN GADODIA', 'KRISHNA STEELS  AND CHEMICALS', 'OFFICER', '203,CORPORATE CORNER\r\nNEXT TO DALMIA COLLEGE\r\nSUNDER NAGAR,MALAD (WEST) - 400064\r\n', '', 'MUMBAI', 'Maharashtra', '400064', '0', '', 0, '', '', '', '8008620909', '', 'contactkrishna51@gmail.com', '27AABFK2187M2ZZ', 'AABFK2187M', '06-06-2018', 1, 'admin', '', 'KRISHNA', '', 18, 1, 'Y', 'CREATED', '06-06-2018 18:20:04'),
(21, 1, '', 'aaa', 'COATINGS & COATINGS (I) PVT LTD', 'OFFICER', 'K-32, MIDC,ADDL AMBERNATH INDL. AREA,\r\nANAND NAGAR, AMBERNATH (E)\r\nDIST: THANE- 421506\r\n', '', 'Thane', 'Maharashtra', '421506', '0', '', 0, '', '', '', '08008620909', '08008620909', 'contactkrishna51@gmail.com', '27AAACC9705F1ZS', 'AAACC9705F', '06-06-2018', 5, 'exec1', '', 'KRISHNA', '', 19, 0, 'Y', 'CREATED', '06-06-2018 18:22:40'),
(22, 1, '', 'aaa', 'COATINGS & COATINGS (I) PVT LTD', 'OFFICER', 'K-32, MIDC,ADDL AMBERNATH INDL. AREA,\r\nANAND NAGAR, AMBERNATH (E)\r\nDIST: THANE- 421506', '', 'Thane', 'Maharashtra', '421506', '0', '', 0, '', '', '', '08008620909', '08008620909', 'contactkrishna51@gmail.com', '', '', '06-06-2018', 5, 'exec1', '', 'COATINGS', '', 20, 1, 'Y', 'ALTERED', '06-06-2018 18:22:42'),
(23, 0, '', 'NITIN NAMDEV WANKHEDE Â ', 'Recorn Foods Pvt.Ltd', 'AREA SALES MANAGER', 'C302, Star premier, Indralok phase 5, Behind shalop hospital Bhayander â€“ (E) Thane - 400105', '', 'Bhayander â€“ (E)', 'Thana', '400105', '', '', 0, '', '', '', '9081918906', '', 'Wankhede_nitin@yahoo.com', '', '', '02-04-18', 7, 'admin', '', 'NITIN NAMDEV WANKHEDE', '', 24, 1, 'N', '', ''),
(24, 0, '', 'VINEETA BHARAT PANDEY', 'Recorn Foods Pvt.Ltd', 'SENIOR SALES OFFICERS', 'Maulana chawl no.1, room no. 10, Dargah, L B S Margh, Ghatkopar(w), Mumbai- 400086', '', 'Ghatkopar (w)', 'Mumbai', '400086', '', '', 0, '', '', '', '9081918907', '', 'vineetapanday0@gmail.com', '', '', '02-04-18', 6, 'admin', '', 'VINEETA BHARAT PANDEY', '', 25, 1, 'N', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `customer_address_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `unit_name` varchar(500) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `delivery_charge` varchar(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`customer_address_id`, `customer_id`, `unit_name`, `address`, `contact_person`, `mobileno`, `emailid`, `delivery_charge`, `status`) VALUES
(4, 13, 'OFFICE', 'MUMBAI OFFICE \r\nMUMBAI', 'MR,RAVI', '7123456789', 'united@gmail.com', '', 1),
(3, 10, 'MAIN OFFICE', 'NAVRANGPURA', 'XYZ', '7894456123', 'xyz@gmail.com', '', 1),
(5, 14, 'OFFICE', 'MUMBAI GODOWN OFFICE,\r\nMUMBAI', 'JAY', '7123456789', 'jay@gmail.com', '', 1),
(6, 17, 'FACTORY', 'Plot No B-16,MIDC Tembhurni,Madha, Solapur 413211', 'Kunal Shirke (Purchase Executive)', '9075025087', 'kunal@amazonwood.in', '', 1),
(7, 19, 'DELIVERY', 'Sy.No.252 Gaganpahad,Hyderabad R.R.DT\r\nHyderabad - 8008620909\r\nInfo@leolaminates.Com', 'UMA', '8008620909', 'Info@leolaminates.Com', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `id_customer_payment` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `method` varchar(20) NOT NULL,
  `transaction_receipt` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cust_balance`
--

CREATE TABLE `cust_balance` (
  `id_cust_balance` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cust_link`
--

CREATE TABLE `cust_link` (
  `id_custlink` int(11) NOT NULL,
  `uusername` varchar(255) NOT NULL,
  `lusername` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_link`
--

INSERT INTO `cust_link` (`id_custlink`, `uusername`, `lusername`, `date`, `time`) VALUES
(1, 'dlr1', 'abc', '11-05-2018', '12:33:29pm'),
(2, 'jay', 'united', '19-05-2018', '11:58:50am'),
(3, 'KRISHNA', 'KRISHNA', '06-06-2018', '11:45:47am'),
(4, 'KRISHNA', 'COATINGS', '06-06-2018', '12:23:02pm'),
(5, 'KRISHNA', 'abc', '06-06-2018', '12:26:18pm');

-- --------------------------------------------------------

--
-- Table structure for table `dgroup`
--

CREATE TABLE `dgroup` (
  `cgroup_id` int(10) NOT NULL,
  `cgroup_name` varchar(200) NOT NULL,
  `cgroup_price` varchar(5) NOT NULL,
  `cgroup_c_date` varchar(50) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dgroup`
--

INSERT INTO `dgroup` (`cgroup_id`, `cgroup_name`, `cgroup_price`, `cgroup_c_date`, `status`) VALUES
(1, 'D1', '0.50', '09-05-2018', 1),
(2, 'D2', '0.75', '09-05-2018', 1),
(3, 'DLR3', '0.85', '19-05-2018', 1);

-- --------------------------------------------------------

--
-- Table structure for table `distribute_order`
--

CREATE TABLE `distribute_order` (
  `id_order` int(11) NOT NULL,
  `orderno` varchar(255) NOT NULL,
  `invoiceno` varchar(255) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `taxtype` varchar(50) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `freight` varchar(20) NOT NULL,
  `finalamount` varchar(255) NOT NULL,
  `ship_address` varchar(255) DEFAULT NULL,
  `ship_city` varchar(255) DEFAULT NULL,
  `ship_state` varchar(255) DEFAULT NULL,
  `ship_pincode` int(6) DEFAULT NULL,
  `orderby` varchar(255) DEFAULT NULL,
  `orderdate` varchar(255) NOT NULL,
  `deliverydate` varchar(255) DEFAULT NULL,
  `forwarder` varchar(255) NOT NULL,
  `approve` int(1) NOT NULL,
  `referencepo` varchar(255) NOT NULL,
  `combine` int(1) NOT NULL,
  `type` int(11) NOT NULL,
  `ordertype` int(1) NOT NULL,
  `orderac` int(1) NOT NULL,
  `distribute` int(1) NOT NULL DEFAULT '0',
  `reject_order` int(1) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `distribute_order_product`
--

CREATE TABLE `distribute_order_product` (
  `purchase_order_product_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `mrp` varchar(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `id_purchase_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `f_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `sub_company` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`f_id`, `t_id`, `name`, `company`, `sub_company`, `created_at`, `updated_at`) VALUES
(1, 1, '1523524560_230.xlsx', 'cc', 'scc', 1523524560, 1523524560),
(2, 1, '1523525292_9219.xlsx', '12', '12', 1523525292, 1523525292),
(3, 1, '1523525429_8220.xlsx', '34', '34', 1523525429, 1523525429),
(4, 1, '1523787951_1023.xlsx', 'sdf', 'sadf', 1523787951, 1523787951),
(5, 2, '1523788614_2942.xlsx', 'dfgd', 'fgdfgdfg', 1523788614, 1523788614);

-- --------------------------------------------------------

--
-- Table structure for table `finalsales`
--

CREATE TABLE `finalsales` (
  `FinalSales_id` int(11) NOT NULL,
  `User_id` varchar(255) NOT NULL,
  `doid` varchar(255) DEFAULT NULL,
  `Dealer_Name` varchar(100) NOT NULL,
  `Dealer_Address` varchar(255) DEFAULT NULL,
  `Delivery_Address` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `Dealer_Tin` varchar(20) DEFAULT NULL,
  `Dealer_Cst` varchar(20) DEFAULT NULL,
  `Date` varchar(20) DEFAULT NULL,
  `dodate` varchar(20) DEFAULT NULL,
  `Discount` int(11) DEFAULT NULL,
  `taxtype` varchar(20) NOT NULL,
  `Vat` varchar(11) DEFAULT NULL,
  `Excise` varchar(11) DEFAULT NULL,
  `edu` varchar(11) DEFAULT NULL,
  `hiedu` varchar(11) DEFAULT NULL,
  `Total` varchar(15) DEFAULT NULL,
  `Totalbox` int(11) DEFAULT NULL,
  `roundoff` varchar(255) NOT NULL,
  `discountp` varchar(255) NOT NULL DEFAULT '0',
  `rsamount` varchar(255) NOT NULL,
  `Insurance` int(11) DEFAULT '0',
  `Dispatch` int(1) DEFAULT '0',
  `executive` varchar(255) DEFAULT NULL,
  `executivecontact` varchar(20) DEFAULT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `outstanding` varchar(255) NOT NULL,
  `Delivery_Date` varchar(20) DEFAULT NULL,
  `OrderStatus` int(1) DEFAULT '0',
  `NextConfirm` varchar(255) NOT NULL,
  `Confirm` int(1) DEFAULT '0',
  `sodate` varchar(50) NOT NULL,
  `TallyPosted` varchar(1) NOT NULL DEFAULT 'N',
  `TallyRemarks` varchar(255) NOT NULL,
  `TallyPostDt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finalsales_product`
--

CREATE TABLE `finalsales_product` (
  `finalsales_product_id` int(11) NOT NULL,
  `doid` varchar(20) NOT NULL,
  `DesignName` varchar(200) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `pack` int(11) NOT NULL,
  `Grade` varchar(20) NOT NULL,
  `Rate` varchar(10) NOT NULL,
  `MRP` varchar(10) NOT NULL,
  `Amount` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finalsales_revise`
--

CREATE TABLE `finalsales_revise` (
  `reviseid` int(11) NOT NULL,
  `dono` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finalsales_transport`
--

CREATE TABLE `finalsales_transport` (
  `id` int(11) NOT NULL,
  `User_id` varchar(255) NOT NULL,
  `doid` varchar(255) NOT NULL,
  `transportname` varchar(255) DEFAULT NULL,
  `drivername` varchar(255) DEFAULT NULL,
  `drivercontact` varchar(255) DEFAULT NULL,
  `licence` varchar(255) DEFAULT NULL,
  `vehicleno` varchar(255) DEFAULT NULL,
  `lrno` varchar(255) DEFAULT NULL,
  `lrdate` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` int(10) NOT NULL,
  `ledgerid` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `parent` varchar(250) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `telePhone` varchar(100) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `fax` varchar(500) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(1) NOT NULL,
  `lastlogin` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mrp`
--

CREATE TABLE `mrp` (
  `id_mrp` int(11) NOT NULL,
  `mrp` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) NOT NULL,
  `orderid` varchar(20) NOT NULL,
  `ledgerid` int(10) NOT NULL,
  `orderdate` datetime NOT NULL,
  `note` text NOT NULL,
  `isSocreated` tinyint(1) NOT NULL,
  `soDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `id` int(10) NOT NULL,
  `orderid` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `fabricorder` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_track`
--

CREATE TABLE `order_track` (
  `id_order_track` int(11) NOT NULL,
  `trackingno` varchar(255) NOT NULL,
  `builtin` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_title` varchar(255) NOT NULL,
  `pro_des` blob NOT NULL,
  `pro_code` varchar(255) NOT NULL,
  `pro_image` varchar(255) NOT NULL,
  `flavour` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `gram` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `percentage` varchar(4) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `date` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `TallyPosted` varchar(1) NOT NULL DEFAULT 'N',
  `TallyRemarks` varchar(255) NOT NULL,
  `TallyPostDt` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `pro_name`, `pro_title`, `pro_des`, `pro_code`, `pro_image`, `flavour`, `type`, `gram`, `quantity`, `unit`, `percentage`, `brand`, `date`, `id_category`, `status`, `TallyPosted`, `TallyRemarks`, `TallyPostDt`) VALUES
(1, 'FORMALIN HYDRATE <1%', 'FORMALIN HYDRATE <1%', '', '12345', '', '', '', '', 0, 'kg', '', '', '10-05-2018', 1, 1, 'Y', 'IGNORED', '11-05-2018 18:38:26'),
(2, 'FORMALIN  <1%', 'FORMALIN HYDRATE', '', '123456', '', '', '', '', 0, 'kg', '', '', '19-05-2018', 2, 1, 'E', 'Stock Group &apos;-1&apos; does not exist!', '06-06-2018 18:20:29'),
(3, 'FORMALDEHYDE 37% MeOH < 1%', 'FORMALDEHYDE', '', '29121100', '', '', '', '', 0, 'kg', '', '', '06-06-2018', 3, 1, 'E', 'Stock Group &apos;-1&apos; does not exist!', '06-06-2018 18:20:31'),
(5, 'FORMALDEHYDE 43% MeOH <1 %', 'FORMALDEHYDE', '', '29121100', '', '', '', '', 0, 'kg', '', '', '06-06-2018', 3, 1, 'E', 'Stock Group &apos;-1&apos; does not exist!', '06-06-2018 18:20:32'),
(7, 'FORMALEHYDE 37% MeOH 2%', 'FORMALDEHYDE', '', '29121100', '', '', '', '', 0, 'kg', '', '', '06-06-2018', 3, 1, 'E', 'Stock Group &apos;-1&apos; does not exist!', '06-06-2018 18:20:33'),
(8, 'FORMALDEHYDE 37% MeOH 4%', 'FORMALDEHYDE', '', '29121100', '', '', '', '', 0, 'kg', '', '', '06-06-2018', 3, 1, 'E', 'Stock Group &apos;-1&apos; does not exist!', '06-06-2018 18:20:34'),
(9, 'FORMALDEHYDE 39% MeOH 11%', 'FORMALDEHYDE', '', '29121100', '', '', '', '', 0, 'kg', '', '', '06-06-2018', 3, 1, 'E', 'Stock Group &apos;-1&apos; does not exist!', '06-06-2018 18:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `parent` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE `product_price` (
  `product_price_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `price` varchar(100) NOT NULL,
  `per1` varchar(255) NOT NULL,
  `per2` varchar(255) NOT NULL,
  `per3` varchar(255) NOT NULL,
  `per4` varchar(255) NOT NULL,
  `per5` varchar(255) NOT NULL,
  `per6` varchar(255) NOT NULL,
  `per7` varchar(255) NOT NULL,
  `per8` varchar(255) NOT NULL,
  `per9` varchar(255) NOT NULL,
  `per10` varchar(255) NOT NULL,
  `cdate` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`product_price_id`, `product_id`, `price`, `per1`, `per2`, `per3`, `per4`, `per5`, `per6`, `per7`, `per8`, `per9`, `per10`, `cdate`) VALUES
(1, 1, '150', '10', '160', '170', '180', '190', '200', '210', '220', '230', '240', '11-05-201812:35:41pm'),
(2, 1, '16', '0.40', '16.4', '16.8', '17.2', '17.6', '18', '18.4', '18.8', '19.2', '19.6', '14-05-201812:02:17pm'),
(3, 1, '16', '0.40', '16.4', '16.8', '17.2', '17.6', '18', '18.4', '18.8', '19.2', '19.6', '14-05-201812:02:58pm'),
(4, 1, '16', '0.40', '16.4', '16.8', '17.2', '17.6', '18', '18.4', '18.8', '19.2', '19.6', '19-05-201811:32:02am'),
(5, 1, '16', '0.40', '16.4', '16.8', '17.2', '17.6', '18', '18.4', '18.8', '19.2', '19.6', '19-05-201811:32:40am'),
(6, 3, '15.00', '1', '16', '17', '18', '19', '20', '21', '22', '23', '24', '06-06-201810:52:24am'),
(7, 3, '15.00', '.40', '15.4', '15.8', '16.2', '16.6', '17', '17.4', '17.8', '18.2', '18.6', '06-06-201810:52:48am');

-- --------------------------------------------------------

--
-- Table structure for table `profilesetting`
--

CREATE TABLE `profilesetting` (
  `profilesettingid` int(11) NOT NULL,
  `User_id` varchar(255) NOT NULL,
  `newdesign` int(1) DEFAULT '0',
  `editdesign` int(1) DEFAULT '0',
  `viewdesign` int(1) DEFAULT '0',
  `newstock` int(1) DEFAULT '0',
  `editstock` int(1) DEFAULT '0',
  `viewstock` int(1) DEFAULT '0',
  `newexecutive` int(1) DEFAULT '0',
  `editexecutive` int(1) DEFAULT '0',
  `viewexecutive` int(1) DEFAULT '0',
  `newdealer` int(1) DEFAULT '0',
  `editdealers` int(1) DEFAULT '0',
  `viewdealer` int(1) DEFAULT '0',
  `mobiledo` int(1) DEFAULT '0',
  `newdo` int(1) DEFAULT '0',
  `managedo` int(1) DEFAULT '0',
  `viewdo` int(1) DEFAULT '0',
  `deletedo` int(1) DEFAULT '0',
  `viewso` int(1) DEFAULT '0',
  `newdeposit` int(1) DEFAULT '0',
  `managedeposit` int(1) DEFAULT '0',
  `viewdeposit` int(1) DEFAULT '0',
  `target` int(1) DEFAULT '0',
  `availablestock` int(1) DEFAULT '0',
  `dealeraccount` int(1) DEFAULT '0',
  `stockreports` int(1) DEFAULT '0',
  `dealerreport` int(1) DEFAULT '0',
  `executivereport` int(1) DEFAULT '0',
  `salesreport` int(1) DEFAULT '0',
  `accounts` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_buyer_order`
--

CREATE TABLE `purchase_buyer_order` (
  `id_buyer_purchase` int(11) NOT NULL,
  `invoiceno` varchar(255) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `taxtype` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `finalamount` varchar(255) NOT NULL,
  `ship_address` varchar(255) NOT NULL,
  `ship_pincode` int(6) NOT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id_order` int(11) NOT NULL,
  `orderno` varchar(255) NOT NULL,
  `invoiceno` varchar(255) NOT NULL,
  `totalamount` varchar(25) NOT NULL,
  `orderby` varchar(255) DEFAULT NULL,
  `orderdate` varchar(255) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `dealer_name` varchar(255) NOT NULL,
  `customer_name` varchar(500) NOT NULL,
  `billing_add` varchar(1000) NOT NULL,
  `delivery_add_type` varchar(100) NOT NULL,
  `delivery_add` varchar(1000) NOT NULL,
  `payment_term` varchar(50) NOT NULL,
  `transport_freight` varchar(500) NOT NULL,
  `transporter` varchar(200) NOT NULL,
  `insurance` varchar(20) NOT NULL,
  `deliverydate` varchar(255) DEFAULT NULL,
  `forwarder` varchar(255) NOT NULL,
  `approve` int(1) NOT NULL,
  `review` int(1) NOT NULL,
  `schedule` int(1) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '0',
  `TallyPosted` varchar(1) NOT NULL DEFAULT 'N',
  `TallyRemarks` varchar(255) NOT NULL,
  `TallyPostDt` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id_order`, `orderno`, `invoiceno`, `totalamount`, `orderby`, `orderdate`, `id_dealer`, `id_customer`, `dealer_name`, `customer_name`, `billing_add`, `delivery_add_type`, `delivery_add`, `payment_term`, `transport_freight`, `transporter`, `insurance`, `deliverydate`, `forwarder`, `approve`, `review`, `schedule`, `status`, `TallyPosted`, `TallyRemarks`, `TallyPostDt`) VALUES
(1, 'CHEMICAL-2018-1', '', '75250', 'dlr1', '11-05-2018', 9, 8, 'DLR1', 'ABC CO.', 'PALDI,AHMEDABAD,Gujarat,380007', '', 'PALDI,AHMEDABAD,Gujarat,380007', '7 DAYS', 'Paid By dlr1', '', 'Yes', NULL, '2', 1, 0, 1, 1, 'Y', 'CREATED', '14-05-2018 12:13:22'),
(2, 'CHEMICAL-11-2', '', '16010', 'xyz', '2018-05-12', 0, 10, 'XYZ', 'XYZ', 'NAVRANGPURA,AHMEDABAD,Gujarat,380009', 'MAIN OFFICE', 'NAVRANGPURA', '7 days', 'Paid By XYZ', 'GATI CARGO', 'Yes', NULL, '2', 1, 0, 1, 1, 'Y', 'CREATED', '14-05-2018 12:36:20'),
(3, 'CHEMICAL-2018-3', '', '8500', 'jay', '19-05-2018', 14, 13, 'JAYESH TRADING', 'UNITED RESIN', 'MUMBAI,MUMBAI,MAHARASHTRA,400001', '', 'MUMBAI,MUMBAI,MAHARASHTRA,400001', '60 DAYS', 'Paid By jay', 'PAWAN TRANSPORT', 'Yes', NULL, '2', 1, 0, 1, 1, 'Y', 'CREATED', '19-05-2018 12:14:55'),
(4, 'CHEMICAL-19-4', '', '322000', 'mille', '2018-05-24', 0, 17, 'Millennium Boards Pvt Ltd', 'Millennium Boards Pvt Ltd', 'Plot No B-16,MIDC Tembhurni, Madha, Solapur,SOLAPUR,maharashtra,413211', '', '', '60 DAYS ', 'Paid By Millennium Boards Pvt Ltd', 'PAWAN TRANSPORT', 'Yes', NULL, '2', 1, 0, 0, 1, 'E', 'OrderDate', '06-06-2018 18:30:17'),
(5, 'CHEMICAL-2018-5', '', '322000', 'mille', '2018-06-01', 0, 17, 'Millennium Boards Pvt Ltd', 'Millennium Boards Pvt Ltd', 'Plot No B-16,MIDC Tembhurni, Madha, Solapur,SOLAPUR,maharashtra,413211', 'FACTORY', 'Plot No B-16,MIDC Tembhurni,Madha, Solapur 413211', '60 DAYS ', 'Paid By Millennium Boards Pvt Ltd', 'PAWAN TRANSPORT', 'No', NULL, '2', 1, 0, 1, 1, 'Y', 'CREATED', '05/06/2018 14:37:40'),
(6, 'CHEMICAL-2018-6', '', '600000', 'leo', '2018-06-06', 0, 19, 'Leo Laminates Private limited', 'Leo Laminates Private limited', 'Sy.No.252 Gaganpahad,Hyderabad R.R.DT\r\nHyderabad - 8008620909\r\nInfo@leolaminates.Com,HYDRABAD,Telangana,500005', 'DELIVERY', 'Sy.No.252 Gaganpahad,Hyderabad R.R.DT\r\nHyderabad - 8008620909\r\nInfo@leolaminates.Com', '5 DAYS', 'Paid By Balaji Formalin', 'PAWAN TRANSPORT', 'Yes', NULL, '2', 1, 0, 1, 1, 'Y', 'CREATED', '06-06-2018 11:15:15'),
(7, 'CHEMICAL-2018-7', '', '164000', 'krishna', '06-06-2018', 21, 20, 'COATINGS & COATINGS (I) PVT LTD', 'KRISHNA STEELS  AND CHEMICALS', 'K-32, MIDC,ADDL AMBERNATH INDL. AREA,\r\nANAND NAGAR, AMBERNATH (E)\r\nDIST: THANE- 421506\r\n,Thane,Maharashtra,421506', '', '203,CORPORATE CORNER\r\nNEXT TO DALMIA COLLEGE\r\nSUNDER NAGAR,MALAD (WEST) - 400064\r\n,MUMBAI,Maharashtra,400064', '', 'Paid By krishna', 'GATI CARGO', 'Yes', NULL, '2', 1, 0, 1, 1, 'Y', 'CREATED', '06-06-2018 18:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_ordersc`
--

CREATE TABLE `purchase_ordersc` (
  `id_purchase_ordersc` int(11) NOT NULL,
  `id_purchaseorder` varchar(50) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `cdate` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_ordersc`
--

INSERT INTO `purchase_ordersc` (`id_purchase_ordersc`, `id_purchaseorder`, `qty`, `date`, `cdate`, `status`) VALUES
(1, 'CHEMICAL-2018-1', '250', '15-05-18', '2018-05-11', 0),
(2, 'CHEMICAL-2018-1', '250', '15-05-18', '2018-05-11', 0),
(6, 'CHEMICAL-11-2', '50', '01-07-2018', '2018-05-14', 0),
(5, 'CHEMICAL-11-2', '50', '25-06-2018', '2018-05-14', 0),
(10, 'CHEMICAL-2018-3', '200', '30-05-2018', '2018-05-19', 0),
(9, 'CHEMICAL-2018-3', '300', '25-05-2018', '2018-05-19', 0),
(11, 'CHEMICAL-2018-5', '20000', '02.06.2018', '2018-06-01', 0),
(12, 'CHEMICAL-2018-6', '20000', '07.06.2016', '2018-06-06', 0),
(13, 'CHEMICAL-2018-6', '20000', '10.06.2016', '2018-06-06', 0),
(14, 'CHEMICAL-2018-7', '5000', '10-06-2018', '2018-06-06', 0),
(15, 'CHEMICAL-2018-7', '3000', '15-06-2018', '2018-06-06', 0),
(16, 'CHEMICAL-2018-7', '2000', '16-06-2018', '2018-06-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_approve`
--

CREATE TABLE `purchase_order_approve` (
  `id_purchase_order_approve` int(11) NOT NULL,
  `id_order` varchar(250) NOT NULL,
  `username` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_product`
--

CREATE TABLE `purchase_order_product` (
  `purchase_order_product_id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `mrp` varchar(20) NOT NULL,
  `percent` int(5) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `id_purchase_order` varchar(110) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_product`
--

INSERT INTO `purchase_order_product` (`purchase_order_product_id`, `category`, `productname`, `quantity`, `mrp`, `percent`, `unit`, `remarks`, `id_purchase_order`) VALUES
(1, '', 'FORMALIN HYDRATE <1%', 500, '150.5', 1, 'ton', '175', 'CHEMICAL-2018-1'),
(2, '', 'FORMALIN HYDRATE <1%', 100, '160.1', 2, 'kg', 'NO REM', 'CHEMICAL-11-2'),
(4, '', 'FORMALIN HYDRATE <1%', 500, '17', 2, 'kg', '18 selling rate', 'CHEMICAL-2018-3'),
(5, '', 'FORMALIN HYDRATE <1%', 20000, '16.1', 1, 'kg', '', 'CHEMICAL-19-4'),
(6, '', 'FORMALIN HYDRATE <1%', 20000, '16.1', 1, 'kg', '', 'CHEMICAL-2018-5'),
(7, '', 'FORMALIN HYDRATE <1%', 40000, '15', 1, 'kg', '', 'CHEMICAL-2018-6'),
(8, '', 'FORMALIN HYDRATE <1%', 10000, '16.4', 2, 'ton', '', 'CHEMICAL-2018-7');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_stock`
--

CREATE TABLE `purchase_stock` (
  `id_purchase_stock` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `mrp` varchar(20) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `id_buyer_purchase` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_transport`
--

CREATE TABLE `purchase_transport` (
  `id_purchase_transport` int(11) NOT NULL,
  `orderno` varchar(255) NOT NULL,
  `invoiceno` varchar(255) NOT NULL,
  `parcel` int(10) NOT NULL,
  `lrno` varchar(255) NOT NULL,
  `lrdate` varchar(20) NOT NULL,
  `transporter` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `builty` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reject_order`
--

CREATE TABLE `reject_order` (
  `id_order` int(11) NOT NULL,
  `orderno` varchar(255) NOT NULL,
  `invoiceno` varchar(255) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `taxtype` varchar(50) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `freight` varchar(20) NOT NULL,
  `finalamount` varchar(255) NOT NULL,
  `ship_address` varchar(255) DEFAULT NULL,
  `ship_city` varchar(255) DEFAULT NULL,
  `ship_state` varchar(255) DEFAULT NULL,
  `ship_pincode` int(6) DEFAULT NULL,
  `orderby` varchar(255) DEFAULT NULL,
  `orderdate` varchar(255) NOT NULL,
  `deliverydate` varchar(255) DEFAULT NULL,
  `forwarder` varchar(255) NOT NULL,
  `approve` int(1) NOT NULL,
  `referencepo` varchar(255) NOT NULL,
  `combine` int(1) NOT NULL,
  `type` int(11) NOT NULL,
  `ordertype` int(1) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reject_order_product`
--

CREATE TABLE `reject_order_product` (
  `reject_order_product_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `mrp` varchar(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `id_reject_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salesexe_link`
--

CREATE TABLE `salesexe_link` (
  `id_salesexe` int(11) NOT NULL,
  `executive` int(11) NOT NULL,
  `customer` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `Size` varchar(20) NOT NULL,
  `Thickness` int(2) NOT NULL,
  `Tiles` int(2) NOT NULL,
  `Sqft` varchar(30) NOT NULL,
  `Sqmt` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` int(6) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `cst` varchar(20) NOT NULL,
  `date` varchar(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment`
--

CREATE TABLE `supplier_payment` (
  `id_supplier_payment` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `method` varchar(20) NOT NULL,
  `transaction_receipt` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `t_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fields` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`t_id`, `name`, `fields`, `created_at`, `updated_at`) VALUES
(1, 'test', '[\"Submitting for\",\"autoAR\"]', 1523524544, 1523524544),
(2, 'k2', '[\"Location SZ & KB\",\"Daily\",\"Weekly\",\"Monthly\"]', 1523525532, 1523525532);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id_transport` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `person` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id_transport`, `name`, `person`, `email`, `mobile`, `date`) VALUES
(1, 'GATI CARGO', 'XX', '', '9876543210', ''),
(2, 'PAWAN TRANSPORT', 'SUJIT', '', '1234567890', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `userlogin_id` int(11) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Pass_Word` varchar(255) NOT NULL,
  `UserType` int(1) DEFAULT '6',
  `customer_code` varchar(255) NOT NULL,
  `lastlogin` varchar(255) NOT NULL,
  `Status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`userlogin_id`, `User_Name`, `Pass_Word`, `UserType`, `customer_code`, `lastlogin`, `Status`) VALUES
(1, 'admin', 'admin', 4, '', '', 1),
(5, 'acct', 'acct', 2, '', '21-04-18', 1),
(6, 'abc', 'abc@123', 5, '', '09-05-2018', 1),
(7, 'dlr1', 'dlr1', 1, '', '09-05-2018', 1),
(8, 'xyz', 'xyz', 5, '', '12-05-2018', 1),
(9, 'exec1', 'exec1', 4, '', '12-05-18', 1),
(10, 'cust2', 'cust2', 5, '', '14-05-2018', 1),
(11, 'united', 'united', 5, '', '19-05-2018', 1),
(12, 'jay', 'united', 1, '', '19-05-2018', 1),
(13, 'sachin', 'sachin', 4, '', '19-05-18', 1),
(14, 'acqua', '123', 5, '', '21-05-2018', 1),
(15, 'mille ', '123', 5, '', '21-05-2018', 1),
(16, 'bhara', '123', 5, '', '21-05-2018', 1),
(17, 'LEO', '123', 5, '', '06-06-2018', 1),
(18, 'KRISHNA', '123', 1, '', '06-06-2018', 1),
(19, 'KRISHNA', '123', 5, '', '06-06-2018', 1),
(20, 'COATINGS', '123', 5, '', '06-06-2018', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `UserRegistration_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Pincode` int(6) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(15) NOT NULL,
  `Phone1` varchar(15) DEFAULT NULL,
  `DOB` date NOT NULL,
  `Religious` varchar(255) NOT NULL,
  `Idproofname1` varchar(255) DEFAULT NULL,
  `Idproofpath1` varchar(255) DEFAULT NULL,
  `Idproof1` varchar(255) DEFAULT NULL,
  `Idproofname2` varchar(255) DEFAULT NULL,
  `Idproofpath2` varchar(255) DEFAULT NULL,
  `Idproof2` varchar(255) DEFAULT NULL,
  `Designation` varchar(255) NOT NULL,
  `PreviousCompany` varchar(255) DEFAULT NULL,
  `Salary` int(11) NOT NULL,
  `HQ` varchar(255) NOT NULL,
  `MobileBill` varchar(10) NOT NULL,
  `TA` varchar(4) NOT NULL,
  `DA` varchar(4) NOT NULL,
  `WorkAddress` varchar(255) NOT NULL,
  `WorkBranch` varchar(255) NOT NULL,
  `WorkCity` varchar(255) NOT NULL,
  `WorkState` varchar(255) NOT NULL,
  `WorkCountry` varchar(255) NOT NULL,
  `WorkPincode` int(6) NOT NULL,
  `WorkPhone` varchar(15) NOT NULL,
  `WorkEmail` varchar(255) NOT NULL,
  `EmpCode` varchar(255) NOT NULL,
  `RefEmpUsername` varchar(255) DEFAULT 'none',
  `letter` varchar(255) DEFAULT NULL,
  `remarks` blob,
  `BankName` varchar(255) NOT NULL,
  `AccName` varchar(255) DEFAULT NULL,
  `AccNo` varchar(25) NOT NULL,
  `Branch` varchar(255) DEFAULT NULL,
  `IFCI` varchar(12) DEFAULT NULL,
  `RegistrationDate` date NOT NULL,
  `uexecutive` varchar(255) NOT NULL,
  `UserType` int(2) NOT NULL,
  `Status` int(1) DEFAULT '0',
  `LastLogin` varchar(255) DEFAULT NULL,
  `LeaveDate` date DEFAULT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `cgroup`
--
ALTER TABLE `cgroup`
  ADD PRIMARY KEY (`cgroup_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`customer_address_id`);

--
-- Indexes for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`id_customer_payment`);

--
-- Indexes for table `cust_balance`
--
ALTER TABLE `cust_balance`
  ADD PRIMARY KEY (`id_cust_balance`);

--
-- Indexes for table `cust_link`
--
ALTER TABLE `cust_link`
  ADD PRIMARY KEY (`id_custlink`);

--
-- Indexes for table `dgroup`
--
ALTER TABLE `dgroup`
  ADD PRIMARY KEY (`cgroup_id`);

--
-- Indexes for table `distribute_order`
--
ALTER TABLE `distribute_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `distribute_order_product`
--
ALTER TABLE `distribute_order_product`
  ADD PRIMARY KEY (`purchase_order_product_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `finalsales`
--
ALTER TABLE `finalsales`
  ADD PRIMARY KEY (`FinalSales_id`);

--
-- Indexes for table `finalsales_product`
--
ALTER TABLE `finalsales_product`
  ADD PRIMARY KEY (`finalsales_product_id`);

--
-- Indexes for table `finalsales_revise`
--
ALTER TABLE `finalsales_revise`
  ADD PRIMARY KEY (`reviseid`);

--
-- Indexes for table `finalsales_transport`
--
ALTER TABLE `finalsales_transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `mrp`
--
ALTER TABLE `mrp`
  ADD PRIMARY KEY (`id_mrp`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_track`
--
ALTER TABLE `order_track`
  ADD PRIMARY KEY (`id_order_track`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_price`
--
ALTER TABLE `product_price`
  ADD PRIMARY KEY (`product_price_id`);

--
-- Indexes for table `profilesetting`
--
ALTER TABLE `profilesetting`
  ADD PRIMARY KEY (`profilesettingid`);

--
-- Indexes for table `purchase_buyer_order`
--
ALTER TABLE `purchase_buyer_order`
  ADD PRIMARY KEY (`id_buyer_purchase`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `purchase_ordersc`
--
ALTER TABLE `purchase_ordersc`
  ADD PRIMARY KEY (`id_purchase_ordersc`);

--
-- Indexes for table `purchase_order_approve`
--
ALTER TABLE `purchase_order_approve`
  ADD PRIMARY KEY (`id_purchase_order_approve`);

--
-- Indexes for table `purchase_order_product`
--
ALTER TABLE `purchase_order_product`
  ADD PRIMARY KEY (`purchase_order_product_id`);

--
-- Indexes for table `purchase_stock`
--
ALTER TABLE `purchase_stock`
  ADD PRIMARY KEY (`id_purchase_stock`);

--
-- Indexes for table `purchase_transport`
--
ALTER TABLE `purchase_transport`
  ADD PRIMARY KEY (`id_purchase_transport`);

--
-- Indexes for table `reject_order`
--
ALTER TABLE `reject_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `reject_order_product`
--
ALTER TABLE `reject_order_product`
  ADD PRIMARY KEY (`reject_order_product_id`);

--
-- Indexes for table `salesexe_link`
--
ALTER TABLE `salesexe_link`
  ADD PRIMARY KEY (`id_salesexe`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  ADD PRIMARY KEY (`id_supplier_payment`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id_transport`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`userlogin_id`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`UserRegistration_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cgroup`
--
ALTER TABLE `cgroup`
  MODIFY `cgroup_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `customer_address_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `id_customer_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cust_balance`
--
ALTER TABLE `cust_balance`
  MODIFY `id_cust_balance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cust_link`
--
ALTER TABLE `cust_link`
  MODIFY `id_custlink` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dgroup`
--
ALTER TABLE `dgroup`
  MODIFY `cgroup_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `distribute_order`
--
ALTER TABLE `distribute_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distribute_order_product`
--
ALTER TABLE `distribute_order_product`
  MODIFY `purchase_order_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `finalsales`
--
ALTER TABLE `finalsales`
  MODIFY `FinalSales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finalsales_product`
--
ALTER TABLE `finalsales_product`
  MODIFY `finalsales_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finalsales_revise`
--
ALTER TABLE `finalsales_revise`
  MODIFY `reviseid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finalsales_transport`
--
ALTER TABLE `finalsales_transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mrp`
--
ALTER TABLE `mrp`
  MODIFY `id_mrp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_track`
--
ALTER TABLE `order_track`
  MODIFY `id_order_track` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_price`
--
ALTER TABLE `product_price`
  MODIFY `product_price_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profilesetting`
--
ALTER TABLE `profilesetting`
  MODIFY `profilesettingid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_buyer_order`
--
ALTER TABLE `purchase_buyer_order`
  MODIFY `id_buyer_purchase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_ordersc`
--
ALTER TABLE `purchase_ordersc`
  MODIFY `id_purchase_ordersc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `purchase_order_approve`
--
ALTER TABLE `purchase_order_approve`
  MODIFY `id_purchase_order_approve` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_product`
--
ALTER TABLE `purchase_order_product`
  MODIFY `purchase_order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase_stock`
--
ALTER TABLE `purchase_stock`
  MODIFY `id_purchase_stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_transport`
--
ALTER TABLE `purchase_transport`
  MODIFY `id_purchase_transport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reject_order`
--
ALTER TABLE `reject_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reject_order_product`
--
ALTER TABLE `reject_order_product`
  MODIFY `reject_order_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesexe_link`
--
ALTER TABLE `salesexe_link`
  MODIFY `id_salesexe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  MODIFY `id_supplier_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id_transport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `userlogin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `UserRegistration_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
