-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2016 at 07:02 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oims`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset_name`
--

CREATE TABLE IF NOT EXISTS `asset_name` (
`ast_id` int(5) NOT NULL,
  `ast_name` varchar(50) NOT NULL,
  `ast_at_id` int(5) NOT NULL,
  `ast_usr_id` int(5) NOT NULL DEFAULT '1',
  `ast_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `asset_name`
--

INSERT INTO `asset_name` (`ast_id`, `ast_name`, `ast_at_id`, `ast_usr_id`, `ast_update`) VALUES
(25, 'Campus Building', 5, 1, '2016-04-29 05:07:23'),
(16, 'Chair', 3, 1, '2016-04-05 19:39:33'),
(1, 'CPU', 1, 1, '2016-04-05 18:53:36'),
(19, 'Document Scanner', 1, 1, '2016-04-05 20:19:45'),
(7, 'Dot Matrix Printer', 1, 1, '2016-04-05 18:55:11'),
(15, 'HDD', 1, 1, '2016-04-05 19:04:01'),
(6, 'InkJet Printer', 1, 1, '2016-04-05 18:54:51'),
(11, 'Keyboard', 1, 1, '2016-04-05 19:02:01'),
(24, 'Lab', 5, 1, '2016-04-29 05:07:00'),
(17, 'Laptop', 1, 1, '2016-04-05 20:16:22'),
(5, 'LaserJet Printer', 1, 1, '2016-04-05 18:54:39'),
(23, 'Library', 5, 1, '2016-04-29 05:06:44'),
(20, 'MICR Scanner', 1, 1, '2016-04-05 20:19:57'),
(2, 'Monitor', 1, 1, '2016-04-05 18:53:46'),
(12, 'Mouse', 1, 1, '2016-04-05 19:02:06'),
(0, 'None', 0, 1, '2016-04-04 10:35:12'),
(26, 'Office Building', 5, 1, '2016-04-29 05:07:35'),
(22, 'Office Table', 3, 1, '2016-04-24 04:56:27'),
(3, 'Offline UPS', 1, 1, '2016-04-05 18:53:57'),
(4, 'Online UPS', 1, 1, '2016-04-05 18:54:10'),
(29, 'Paper Weight', 2, 3, '2016-05-06 09:38:43'),
(27, 'Pen Drive', 1, 3, '2016-05-06 09:36:20'),
(14, 'RAM', 1, 1, '2016-04-05 19:03:31'),
(9, 'Router', 1, 1, '2016-04-05 18:55:37'),
(13, 'Server', 1, 1, '2016-04-05 19:02:58'),
(28, 'Staple Machine', 2, 3, '2016-05-06 09:38:27'),
(8, 'Switch', 1, 1, '2016-04-05 18:55:31'),
(18, 'Thin Client', 1, 1, '2016-04-05 20:16:45'),
(21, 'Web Cam', 1, 1, '2016-04-05 20:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `asset_type`
--

CREATE TABLE IF NOT EXISTS `asset_type` (
`at_id` int(5) NOT NULL,
  `at_name` varchar(30) NOT NULL,
  `at_remarks` varchar(250) DEFAULT NULL,
  `at_usr_id` int(5) NOT NULL DEFAULT '1',
  `at_store` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'store it or not',
  `at_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `asset_type`
--

INSERT INTO `asset_type` (`at_id`, `at_name`, `at_remarks`, `at_usr_id`, `at_store`, `at_update`) VALUES
(1, 'ICT', 'ICT related goods like router, cpu, monitor, switch', 1, 1, '2016-03-10 22:31:25'),
(2, 'Stationary', 'Daily Stationary Items', 1, 1, '2016-03-10 22:39:34'),
(3, 'Furniture', 'Office Furniture', 1, 1, '2016-03-10 22:41:43'),
(4, 'Decoration', 'Office Decoration items', 1, 1, '2016-03-10 22:43:26'),
(5, 'Property', 'Lands, Office, Apartment, Recidential', 1, 1, '2016-04-27 21:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
`br_id` int(5) NOT NULL,
  `br_div_id` int(5) NOT NULL,
  `br_code` varchar(6) CHARACTER SET latin1 NOT NULL,
  `br_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `br_addr1` varchar(100) CHARACTER SET latin1 NOT NULL,
  `br_addr2` varchar(100) CHARACTER SET latin1 NOT NULL,
  `br_dis_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `br_zip` varchar(10) CHARACTER SET latin1 NOT NULL,
  `br_tel` varchar(16) CHARACTER SET latin1 NOT NULL,
  `br_mob` varchar(16) CHARACTER SET latin1 NOT NULL,
  `br_fax` varchar(16) CHARACTER SET latin1 NOT NULL,
  `br_email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `br_kcp_name` varchar(150) CHARACTER SET latin1 NOT NULL,
  `br_kcp_mob` varchar(16) CHARACTER SET latin1 NOT NULL,
  `br_kcp_email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `br_usr_id` int(5) NOT NULL DEFAULT '1',
  `br_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`br_id`, `br_div_id`, `br_code`, `br_name`, `br_addr1`, `br_addr2`, `br_dis_id`, `br_zip`, `br_tel`, `br_mob`, `br_fax`, `br_email`, `br_kcp_name`, `br_kcp_mob`, `br_kcp_email`, `br_usr_id`, `br_update`) VALUES
(1, 1, '001', 'Head Office', '122-124, MCCI Bhaban,', 'Motijhil C/A', 'Dhaka', '1205', '+88-02-9582060', '', '', 'headoffice@standardbankbd.com', 'Kamar Para', '+8801552376594', 'headoffice@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(3, 1, '002', 'Principal Branch', 'MCCI Building (Ground floor) ', '122-124, Motijheel C/A.', 'Dhaka', '1000', '+88-02-9558375', '', '+88-02-9559044', 'principal@standardbankbd.com', 'Mr. Md. Motaleb Hossain', '', 'pbmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(4, 1, '004', 'Imamgonj Branch', 'Bellal Market', '79, Moulvibazar, Dhaka-1100.', 'Dhaka', '', '+88-02-7316820', '', '', 'imamgonj@standardbankbd.com', 'Mr. S. M. Nazrul Islam', '', 'imgmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(5, 1, '005', 'Topkhana Road Branch', '36, Crescent Center (1st Floor)', 'Topkhana Road', 'Dhaka', '1000', '+88-02-9582060', '', '', 'topkhanaroad@standardbankbd.co', 'Mr. Md. Nurul Islam', '+8801552376594', 'topmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(6, 1, '009', 'Gulshan Branch', 'Shezad Palace (1st & 2nd Floor)', '32, Gulshan Avenue, North Commercial Area', 'Dhaka', '1212', '+88-02-9881015', '', '', 'gulshan@standardbankbd.com', 'Mr. Md. Anwar Hossain', '+8801714136686', 'gulmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(7, 1, '011', 'Munshikhola Branch', 'Dhaka-Nararangonj Road', 'Munshikhola, Shampur', 'Dhaka', '1204', '+88-02-7448979', '', '', 'munshikhola@standardbankbd.com', 'Mr. Md. Shahabuddin Chisti', '+8801714096158', 'munmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(8, 1, '013', 'Foreign Exchange Branch', 'NIK Tower', '55, Dilkusha C/A (2nd & 3rd Floor)', 'Dhaka', '1000', '+88-02-9571933', '', '', 'foreignexchange@standardbankbd', 'Mr. A.M.M. Lasker', '', 'fexmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(9, 1, '014', 'Dhanmondi Branch', 'House # 4, Road # 27(Old)', '16 (New), Dhanmondi R/A, Dhaka-1209.', 'Dhaka', '', '+88-02-8156621', '', '', 'dhanmondi@standardbankbd.com', 'Mr. S.M. Hemayet Uddin', '+8801811483830', 'dhnmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(10, 1, '015', 'Uttara Model Town Branch', 'Plot #113/C', 'Road-7, Sector-4, Uttara Model Town', 'Dhaka', '1230', '+88-02-8955171', '', '+88-02-7911469', 'uttara@standardbankbd.com', 'Mr. Md. Suruj Ali', '+8801755500237', 'uttara@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(11, 1, '016', 'Takerhat Bazar Branch', 'UP Road', 'Takerhat Bazar, Rajoir', 'Madaripur', '', '', '', '', 'takerhatbazar@standardbankbd.c', 'Mr. Md. Shafiqul Islam', '+8801712599795', 'tkhmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(12, 1, '017', 'Panthapath Branch', '77, Bir Uttam C.R. Dutta Road', 'Free School Street, Hatirpool', 'Dhaka', '', '+88-02-9667126', '', '+88-02-9666521', 'panthapath@standardbankbd.com', 'Mr. Mohammad Ahmed Zaki', '', 'panmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(13, 1, '018', 'Gulshan-1 Branch', 'Uday Tower', '57/A Gulshan Avenue (South), Circle-1', 'Dhaka', '1212', '+88-02-9862111', '', '+88-02-9840906', 'gulshan1@standardbankbd.com', 'Mr. Mohammad Ali', '+8801817506293', 'gul1manager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(14, 1, '022', 'Narayangonj Branch', 'Khan Super Market', '47/9 BB Road, DIT, Narayangonj', 'Narayangonj', '', '+88-02-7646153', '', '+88-02-7646153', 'narayangonj@standardbankbd.com', 'Mr. Muhammad Golam Mustafa', '+8801727426037', 'nrgmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(15, 1, '024', 'Ekoria Branch', 'Hasnabad', 'Ekoria, South Keranigonj', 'Dhaka', '', '+88-02-7761100', '', '', 'ekoria@standardbankbd.com', 'Mr. Khan Md. Zahurul Haque', '+8801711462440', 'ekomanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(16, 1, '025', 'Gopalgonj Branch', 'City Square Shopping Mall', 'College Road, Gopalgnoj', 'Gopalgnoj', '', '6681570-1', '', '', 'gopalgonj@standardbankbd.com', 'Mr. Md. Munir Hassan', '+8801718502269', 'gopalgonj@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(17, 1, '026', 'Banani Branch', 'Plot-106, Road-11', 'Block-C, Banani, Dhaka', 'Dhaka', '', '+88-02-9889545', '', '+88-02-9889545', 'banani@standardbankbd.com', 'Mr. Ashek Abedin', '', 'banmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(18, 1, '028', 'Dakkhin Khan Branch', '57, Dakkhin Khan Bazar', 'Sultan Market , P.O + P.S- Dakkhin Khan, Dhaka-1230.', 'Dhaka', '', '+88-02-8956056', '', '', 'dakkhinkhan@standardbankbd.com', 'Mr. Munshi Golam Rahman', '+8801713078155', 'dkbmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(19, 1, '031', 'Mirpur Branch', 'Northern Lionâ€™s R.P. Tower (1st Floor)', 'Plot-4, Block-D, Section-2, Chiriakhana Road, Mirpur', 'Dhaka', '1216', '+88-02-9014059', '', '+88-02-9014059', 'mirpur@standardbankbd.com', 'Mr. Rahim Khan', '+8801726176601', 'mirmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(20, 1, '032', 'Matuail Branch', 'Momenbagh Chowrasta', 'Paradogair Konapara, Matuail, Demra', 'Dhaka', '1362', '+88-02-7559147', '', '', 'matuail@standardbankbd.com', 'Mr. Humayun Kabir', '+8801912965887', 'matmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(21, 1, '035', 'Kotalipara Branch', 'K.M. Super Market (1st Floor)', 'Ghagor Bazar, Kotalipara', 'Gopalgonj', '', '+88-02-6651277', '', '', 'kotalipara@standardbankbd.com', 'Mr.Md. Kazi Shahed Ali', '+8801719816944', 'kotmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(22, 1, '038', 'Pragoti Sharani Branch', 'KA-70, Hazi Ahmed Plaza (1st Floor)', 'Pragati Sharani, Kuril, PO-Khilkhet, PS-Vatara', 'Dhaka', '1229', '+88-02-8410225', '', '+88-02-8410226', 'progotisharani@standardbankbd.', 'Mr. Md. Abdus Salam', '+8801722242869', 'pramanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(23, 1, '042', 'Nawabpur Road Branch', 'Shahi Bhaban (1st floor)', '106, BCC Road, Thatari Bazar', 'Dhaka', '1203', '+88-02-9512138', '', '', 'nawabpurroad@standardbankbd.co', 'Mr. Md. Moyeedul Islam', '+8801715364865', 'nbpmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(24, 1, '043', 'Shafipur Branch', 'Shapna Joy Tower (1st Floor)', 'Shafipur Bazar, Kaliakair', 'Gazipur', '', '+880682251058', '', '', 'shafipur@standardbankbd.com', 'Mr. Md. Billal Hossain', '+8801717095055', 'shafipur@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(25, 1, '048', 'Kamarpara Branch', 'A. R. Complex', '75 Kamarpara, Uttara, Turag', 'Dhaka', '', '+88-02-8981591', '', '', 'kamarpara@standardbankbd.com', 'Mr. Khandoker Didarul Islam', '+8801711692004', 'kammanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(26, 1, '050', 'Gazipur SME/Krishi Branch', 'Sahabuddin Complex (1st floor)', '168, Joydebpur Bazar, Gazipur-1700.', 'Gazipur', '', '+88-02-9264263', '', '', 'gazipursme/krishi@standardbank', 'Mr. Khondoker Md. Raqibul Haque', '+8801716040988', 'joydevmanager@standardbankbd.c', 1, '0000-00-00 00:00:00'),
(27, 1, '051', 'Green Road Branch', 'Castle Green (1st floor)', '142 Green Road, Dhaka.', 'Dhaka', '', '+88-02-9102770', '', '', 'greenroad@standardbankbd.com', 'Mr. M. S. Shahriar', '+8801755569088', 'gremanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(28, 1, '052', 'Savar SME/Krishi Branch', 'B-66, Bazar Road', 'Savar-1340, Dhaka.', 'Dhaka', '', '+88-02-7745991', '', '', 'savar@standardbankbd.com', 'Mr. Nurul Murshid Rajee', '+8801762120185', 'savarmanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(29, 1, '053', 'Mymensingh Branch', '27, Rambabu Road', 'Canada Square Shopping Complex, Mymensingh.', 'Mymensingh', '', '+88-091-63530', 'mymensingh@stand', '', 'mymensingh@standardbankbd.com', 'Mr. Mohammad Shahinoor Rahman', '+8801712000663', 'mymensingh@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(30, 1, '054', 'Bhairab SME/Krishi Branch', '595/2 Bangabandhu Soroni', 'Bhairabpur, Bhairab', 'Kishorgonj', '', '+88-02-9471301', '', '', 'bhairab@standardbankbd.com', 'Mr. Mohammad Ali', '+8801711245471', 'bhairabmanager@standardbankbd.', 1, '0000-00-00 00:00:00'),
(31, 1, '058', 'Faridpur Branch', 'R.K. Plaza (1st floor)', '244 Goalchamot, Hazralota, Faridpur Sadar', 'Faridpur', '', '+88-0631-61875', '', '', 'faridpur@stadndardbankbd.com', 'Mesbah Ul Alam', '+8801716346036', 'frdpmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(32, 1, '059', 'Ring Road Branch', 'Probal Tower', '45-49 Ring Road (1st floor), Adabor-Shamoly', 'Dhaka', '', '+88-02-9103413', '', '', 'ringroad@standardbankbd.com', '', '', 'ringroad@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(34, 1, '062', 'Shibchar Branch', '286 Iman Gomosta Market (1st floor)', 'Guatola, Shibchar', 'Madaripur', '', '+880662456500', '', '', 'shibchar@standardbankbd.com', 'Mr. Md. Nazrul Islam', '+8801721656895', 'shibcmanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(35, 1, '067', 'Nawabgonj Branch', 'Nawabgonj Adhunik Biponi', 'Zilla Parishad Market, Nawabgonj', 'Dhaka', '', '', '', '', 'nawabgonj@standardbankbd.com', 'Mr. Md. Alhaj Ullah', '+8801716339111', 'nbgmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(36, 1, '068', 'Malibagh Branch', 'Faith Tower (1st Floor & 2nd Floor)', '476/A, DIT Road, Malibagh', 'Dhaka', '1217', '+88-02-9331929', '', '', 'malibag@standardbankbd.com', 'Mr. Md. Shariful Islam', '+8801714204450', 'malimanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(37, 1, '071', 'Ashkona Branch', '247 Dana Plaza', 'Ashkona, Dakkhinkhan', 'Dhaka', '1230', '+88-02-8961823', '', '', 'ashkona@standardbankbd.com', 'Ms. Sultana Jahan', '+8801715366786', 'ashkmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(38, 1, '072', 'Kanchpur Branch', 'Narayangonj Jamir Khan Complex (1st Floor)', 'Kanchpur Bus Stand, Kanchpur, Sonargoan', 'Narayangonj', '', '', '', '', 'kanchpur@standardbankbd.com', '', '', 'kanchpur@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(39, 1, '073', 'Tangail Branch', 'Khan Super Market', 'Holding -533,Ward-13, Tangail Pouroshova', 'Tangail', '', '+88-0921-61774', '', '', 'tangail@standardbankbd.com', 'Mr. Md. Rafiqul Islam', '+8801988287742', 'tanmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(40, 1, '074', 'Mohakhali Branch', 'Dhaka Green Delta Aims Tower (GF)', '51-52, Mohakhali C/A., Mohakhali', 'Dhaka', '', '+88-02-9855478', '', '', 'mohakhali@standardbankbd.com', 'Mr. Mominul Abedin', '+8801716224310', 'mohamanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(41, 1, '076', 'Bakshigonj Branch', 'Sawdagor Shopping Complex (1st floor)', 'Old Bus Stand Road, Bakshigonj', 'Jamalpur', '', '+88-09822-56136', '', '', 'bakshigonj@standardbankbd.com', 'Mr. Md. Akter Hossain', '+8801734498448', 'bakshmanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(42, 1, '078', 'Bhojeshwar Branch', 'Shahnoor Shopping Complex (1st floor)', 'Bhojeshwar Bazar, College Road, Naria', 'Shariatpur', '', '', '', '', 'bhojeswar@standardbankbd.com', 'Mr. Md. Kamruzzaman', '+8801759142432', 'bhojeshwar@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(43, 1, '078', 'Bhojeshwar Branch', 'Shahnoor Shopping Complex (1st floor)', 'Bhojeshwar Bazar, College Road, Naria', 'Shariatpur', '', '', '', '', 'bhojeswar@standardbankbd.com', 'Mr. Md. Kamruzzaman', '+8801759142432', 'bhojeshwar@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(44, 1, '079', 'Tungipara Branch', 'Rahima-Rangu Plaza (1st Floor)', 'Patgati Bazar, Tungipara', 'Gopalgonj', '', '6656253', '', '', 'tungipara@standardbankbd.com', 'Mr. Badiuzzaman Sharif', '+8801779985185', 'tungimanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(45, 1, '081', 'New Eskaton Branch', '129, New Eskaton Road', 'Eskaton Tower, Mogbazar, Ramna', 'Dhaka', '1000', '+88-02-9341993', '', '', 'neweskaton@standardbankbd.com', 'Mr. Md. Khurshed Alam', '+8801711934385', 'eskatonmanager@standardbankbd.', 1, '0000-00-00 00:00:00'),
(46, 1, '082', 'Sonargaon Janapath Branch', 'Muktijoddha K.S. Tower (1st Floor)', 'Sonargaon Janapath Avenue, House-01, Road-17/B, Sector-12', 'Dhaka', '1230', '+88-02-8955158', '', '', 'sonargaonjanapath@standardbank', '', '', 'sjpmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(47, 1, '095', 'Aganagar Branch', 'Haji Alim Ullah Complex,', 'East Aganagar,, South Keranigonj', 'Dhaka', '', '+88-02-7762380', '', '', 'aganagar@standardbankbd.com', 'Mr. Shahnur Md. Oleul Hassan', '+8801922755875', 'aganagar@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(48, 1, '097', 'Ashulia Branch', 'Bhai Bhai Plaza (1st floor)', 'Bogabari, Baipail, Ashulia, Savar', 'Dhaka', '', '+88-02-7790004', '', '', 'ashulia@standardbankbd.com', 'Mr. Md. Sayedur Rahman', '+8801929764524', 'ashuliamanager@standardbankbd.', 1, '0000-00-00 00:00:00'),
(49, 4, '003', 'Khatungonj Branch', 'Khatungonj Trade Centre (1st Floor)', 'Ramjoy Mohajan Lane (Post Office Goli), Khatungonj', 'Chittagong', '', '+88-031-639594', '', '+88-031-610192', 'khatungonj@standardbankbd.com', 'Mr. Md. Mabzulul Bari', '+8801819328491', 'ktgmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(50, 4, '006', 'Chowdhuryhat Branch', 'Fatehabad', 'Chikondandi, Hathazari', 'Chittagong', '', '+88-031-683225', '', '', 'chowduryhat@standardbankbd.com', 'Mr. Mrinal Kanti Sutradhar', '+8801819331290', 'chwmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(51, 4, '007', 'Agrabad Branch', 'Hossen Chamber (G/F)', '105, Agrabad C/A, Chittagong', 'Chittagong', '', '+88-031-2513857', '', '', 'agrabad@standardbankbd.com', 'Mr. M.U.M Musaddeque', '+8801789373469', 'agrmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(52, 4, '012', 'Jubilee Road Branch', 'Aziz Chamber (1st Floor)', '6 Noor Ahmed Road, Jubilee Road', 'Jubilee Road', '', '+88-031-610356', '', '', 'jubilee@standardbankbd.com', 'Mr. Md. Emdadul Hassan', '+8801819380278', 'jubmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(53, 4, '023', 'CDA Avenue Branch', '1000/A, Hosneara Villa (1st floor)', 'Nasirabad, CDA Avenue', 'Chittagong', '4000', '+88-031-2553462', '', '+88- 031-610029', 'cdaavenue@standardbankbd.com', 'Mr. Muhammad Jabedul Islam', '+8801819626399', 'cdamanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(54, 4, '027', 'Brahmanbaria Branch', 'Peara Miah Tower (1st Floor)', '1034, Court Road, Brahmanbaria.', 'Brahmanbaria', '', '+88-0851-61788', '', '', 'brahmanbaria@standardbankbd.co', 'Mr. Kazi Abdul Kyum Khadem', '+8801726264854', 'brmmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(55, 4, '029', 'Chittagong EPZ Branch', 'Gazi Complex (1st Floor)', 'Airport Road, EPZ Gate, Bandar', 'Chittagong', '', '+88-031-740912', '', '', 'cepz@standardbankbd.com', 'Mr. Md. Abu Hena Nazim Uddin', '+8801819376988', 'cepzmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(56, 4, '030', 'Bahaddarhat Branch', 'Manila Tower(1st Floor)', '4544, Bahaddarhat Moor, Chittagong.', 'Chittagong', '', '+88-031-2552512', '', '', 'bahadderhat@standardbankbd.com', 'Mr. A.K.M. Manjur Alam', '+8801710950169', 'bdhatmanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(57, 4, '036', 'Pahartali Branch', 'Chittagong Abul Khair Bhaban', '20/44, D.T. Road, CDA Market, Pahartali,', 'Chittagong', '', '+88-031-2771931', '', '', 'pahartali@standardbankbd.com', 'Mr. Sheikh Lutfar Rahman', '+8801817700484', 'phrmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(58, 4, '037', 'Cox''s Bazar Branch', 'Hefazat Market (1st Floor)', '103, Main Road, East Bazar Ghata', 'Cox`s Bazar', '', '+88-0341-51377', '', '', 'cox''sbazar@standardbankbd.com', 'Mr. M.U.M Musaddeque', '+8801815602796', 'coxmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(59, 4, '044', 'Nangalmora SME/Krishi Branch', 'Nangalmora High School Market (1st floor)', 'Nangalmora Bazar, Hathazari', 'Chittagong', '', '', '', '', 'nangolmora@standardbankbd.com', 'Mr. Md. Morshedul Anwar', '+8801710999912', 'nmoramanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(60, 4, '049', 'Sadarghat Branch', '291,Hourbourage Dream', 'Sadarghat Road, Chittagong.', 'Chittagong', '', '+88-031-619960', '', '', 'sadarghat@standardbankbd.com', 'Mr. Prabir Ranjan Das', '+8801714131383', 'sdgtmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(61, 4, '061', 'Comilla Branch', '4/4 Kapariapatti (1st floor)', 'Comilla., ', '', '', '+88-081-72489', '', '', 'comilla@standardbankbd.com', '', '', 'commanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(62, 4, '063', 'Basurhat Branch', 'Noakhali Rupali Plaza (1st floor)', 'Rupali Chattar, Bashurhat, Companigonj', 'Noakhali', '', '+88-03223-56093', '', '', 'basurhat@standardbankbd.com ', 'Md. Kamal Uddin', '+8801711712503', 'basumanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(63, 4, '069', 'Oxygen More Branch', 'Ali Noor Complex (1st floor)', 'Oxygen More, Chittagong.', 'Chittagong', '', '+88-031-2584461', '', '', 'oxygenmore@standardbankbd.com', '', '', 'oxznmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(64, 4, '077', 'Chaktai Branch', '330, Chaulpotti', 'Natun Chaktai, Bakalia', 'Chittagong', '', '+88-031-626794', '', '', 'chaktai@standardbankbd.com', 'Mr. Mohd. Shawkat Hossain', '+8801817753266', 'chktmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(65, 4, '080', 'Gunagari Branch', 'S. M. Chowdhury Super Market', 'Khasmohol, Gunagari, Kalipur, Banskhali', 'Chittagong', '', '+88-03037-56308', '', '', 'gunagari@standardbankbd.com', 'Mr. Shasan Barua', '+8801717161469', 'gunamanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(66, 4, '086', 'Patherhat  Branch', 'School Market (1st Floor)', 'Noapara, Raozan', 'Chittagong', '', '+88-031-2572188', '', '', 'patherhat@standardbankbd.com', 'Mr. Md. Amtiaz Uddin', '+8801819948117', 'patherhatmanager@standardbankb', 1, '0000-00-00 00:00:00'),
(67, 4, '087', 'Panchlaish Branch', 'S.F.A. Tower (Ground Floor)', 'Probortak More, 132 Panchlaish', 'Chittagong', '', '+88-031-2558640', '', '', 'panchlaish@standardbankbd.com', 'Mr. Mohammad Jahangir Alam', '+8801714852438', 'panchmanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(68, 4, '088', 'Ramchandrapur Branch', 'NGS Bhaban (1st Floor)', 'Ramchandrapur Bazar, Muradnagor', 'Comilla', '', '', '', '', 'ramchadrapur@standardbankbd.co', 'Mr. Md. Faruque Miah', '+8801919739791', 'ramchamanager@standardbankbd.c', 1, '0000-00-00 00:00:00'),
(69, 4, '089', 'Bakalia Branch', 'Hossain Tower (1st Floor)', '3615/A,Shah Amanat Bridge Connecting Road, Kalamia Bazar, Bakalia', 'Chittagong', '', '+88-031-2866171', '', '', 'bakalia@standardbankbd.com', 'Mr. Md. Abdul Khaleque', '+8801815947792', 'bakaliamanager@standardbankbd.', 1, '0000-00-00 00:00:00'),
(70, 4, '093', 'Karnaphuli Branch', 'Haji Jafor Ahmed market (2nd & 3rd floor)', 'Moizzartek, Chorpathorghata, Karnaphuli', 'Chittagong', '', '+88-031-2855002', '', '', 'karnaphuli@standardbankbd.com', 'Mr. Mir Mohammad Emrul Kayes', '+8801711111269', 'karnaphulimanager@standardbank', 1, '0000-00-00 00:00:00'),
(71, 4, '094', 'Nimsar Branch', 'Insaf Super Market (1st Floor)', 'Nimsar, Burichong', 'Comilla', '', '', '', '', 'nimsar@standardbankbd.com', 'Mr. Ahammed Mehedi Imam', '+8801718302344', 'nimsarmanager@standardbankbd.c', 1, '0000-00-00 00:00:00'),
(72, 4, '096', 'Feni Branch', 'Sayed Ambia Tower (1st & 2nd floor)', '74-75, Trank Road, Rajbari Gate', 'Feni', '3900', '+88-0331-61080', '', '', 'feni@standardbankbd.com', 'Mr. Mohammad Jahedul Islam', '+8801817757511', 'fenimanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(73, 3, '008', 'Khulna Branch', 'Chamber Building', '5, K.D.A. C/A (Ground Floor)', 'Khulna', '9100', '+88-0417-32633', '', '', 'khulna@standardbankbd.com', 'Mr. Zaglul Pasha', '+8801825922462', 'khlmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(74, 3, '020', 'Benapole Branch', 'Nahar Tower', 'Benapole Bazar, Benapole', 'Jessore', '', '+88-04228-76076', '', '', 'benapole@Standardbankbd.com', 'Mr. Munir Hossain', '+8801711159073', 'benamanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(75, 3, '021', 'Jessore Branch', 'Utshab Bhaban', '6/D, R.N. Road, Katwali', 'Jessore', '', '+88042168394', '', '', 'jessore@standardbankbd.com', 'Mr. Muhammad Muzibur Rahman', '+8801733808799', 'jesmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(76, 3, '033', 'Barisal Branch', 'Mannan Plaza', '84, Sadar Road, Barisal.', 'Barisal', '', '+88-0431-61274', '', '', 'barisal@standardbankbd.com', 'Mr. K M Rafiqul Islam', '+8801720510474', 'barmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(77, 3, '047', 'Kushtia Branch', '43, N.S. Road (1st floor)', 'Amlapara, Kushtia.', 'Kushtia', '', '+88-071-72458', '', '', 'kushtia@standardbankbd.com', 'Mr. Sk. Mustafizul Islam', '+8801713129503', 'kushmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(78, 3, '057', 'Patuakhali Branch', 'Gazi Plaza (1st floor)', '02 Sadar Road, Patuakhali.', 'Patuakhali', '', '+88-0441-62359', '', '', 'patuakhali@standardbankbd.com', 'Mr. Sanaul Hoque Sumon', '+8801711001734', 'patuamanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(79, 3, '064', 'Satkhira Branch', 'Islam Tower', 'Holding No.-5043, Ward No.-8, Pourashava Satkhira', 'Satkhira', '', '+88-0471-62405', '', '', 'satkhira@standardbankbd.com', 'Mr. A.K.M. Omar Faruq', '+8801711133083', 'satkhmanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(80, 3, '065', 'Bagerhat Branch', '119/2 K, Ali Road (1st floor)', 'Mithapukurpar, Amlapara', 'Bagerhat', '', '+88-0468-64202', '', '', 'bagerhat@standardbankbd.com', 'Mr. Pintu Kumar Saha', '+8801711942668', 'bagermanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(81, 3, '090', 'Alamdanga Branch', '640/A, London Tower (1st floor)', 'Alif Uddin Road, Alamdanga', 'Chuadanga', '', '+88-07622-56353', '', '', 'alamdanga@standardbankbd.com', 'Mr. Shubir Kumar Mondal', '+8801798225565', 'alamdangamanager@standardbankb', 1, '0000-00-00 00:00:00'),
(82, 3, '092', 'Khan Jahan Ali Branch', 'Haji Hanif Complex (2nd & 3rd floor)', '12-13, Khan Jahan Ali Road, Khulna.', 'Khulna', '', '', '', '', 'khanjahan@standardbankbd.com', 'Mr. Md. Zahidul Hassan', '+8801711352757', 'khanjahanalimanager@standardba', 1, '0000-00-00 00:00:00'),
(83, 2, '019', 'Rajshahi Branch', '61 Chand & Sons Shopping Complex', 'Gorhanga, Boalia', 'Rajshahi', '6100', '+88-0721-811981', '', '+88-0721-811982', 'rajshahi@standardbankbd.com', 'Mr. Md. Hamidul Haque', '+8801712620556', 'rajmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(84, 6, '034', 'Bogra Branch', 'Helal Mansion (1st Floor)', 'Sherpur Road, Sutrapur, Bogra Sadar', 'Bogra', '', '+88-051-67508', '', '', 'bogra@standardbankbd.com', '', '', 'bogmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(85, 6, '039', 'Rangpur Branch', 'Shah Jamal Market (1st Floor)', 'Station Road, Rangpur-5400.', 'Rangpur', '', '+88-0521-52127', '', '', 'rangpur@standardbankbd.com', 'Mr. Kazi Rayhanul Haque', '+8801712370825', 'rangmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(86, 6, '055', 'Saidpur SME/Krishi Branch', 'Khaled Market (1st floor)', 'Shahed Dr. Zhikrul Haque Road, Saidpur', 'Nilphamari', '', '+88-0552-671454', '', '', 'saidpur@standardbankbd.com', 'Mr. Binoy Kumar Ghos', '+8801976625242', 'saidpurmanager@standardbankbd.', 1, '0000-00-00 00:00:00'),
(87, 6, '056', 'Dinajpur Branch', 'Northern Plaza', 'Goneshtala, Dinajpur sadar', 'Dinajpur sadar', '', '+88-0531-63979', '', '', 'dinajpur@standardbankbd.com', '', '', 'dinajpur@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(88, 6, '060', 'Nilphamari Branch', 'Nilphamari Chamber of Commerce & Industry Bhaban (1st floor)', 'Hazi Mohsin Sarak, Nilphamari Bazar', 'Nilphamari', '', '+88-0551-62590', '', '', 'nilphamari@standardbankbd.com', 'Mr. Sufi Md. Mostofa Jaman', '+8801781672626', 'nilmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(89, 6, '070', 'Rohanpur Branch', 'Alhaz Abdul Latib Super Market (1st Floor)', 'Rohanpur Boro Bazar, Rohanpur, Gomostapur', 'Chapai Nawabgonj', '', '+88-07823-74228', '', '', 'rohanpur@standardbankbd.com', 'Mr. Md. Zohurul Islam', '+8801761646963', 'rohanmanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(90, 6, '075', 'Gobindagonj Branch', 'Shila Plaza (1st floor)', '211/1, Gobindagonj, Dhaka-Rangpur Highway', 'Gaibandha', '', '+88-0542375108', '', '', 'gobindagonj@standardbankbd.com', 'Mr. Md. Wahidul Huda', '+8801711284141', 'gobinmanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(91, 6, '083', 'Hatikumrul Branch', 'Sabuj Bilab Super Market (1st floor)', 'Hatikumrul Goal Chattar, Ullapara', 'Sirajgonj', '', '+88-07532-51292', '', '', 'hatikumrul@standardbankbd.com', 'Mr. Md. Nayeem Chowdhury', '+8801730300730', 'hatimanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(92, 6, '085', 'Pabna Branch ', 'BGC Complex (1st Floor)', 'Thana Road, Pabna Sadar', 'Pabna', '', '+88-0731-63182', '', '', 'pabna@standardbankbd.com', 'Mr. Md. Rezaul Hoque', '+8801715249880', 'pabmmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(93, 6, '091', 'Kansat Branch', 'Idris Plaza Super Market (2nd floor)', 'Kansatmore, Sona Mosjid Road, Shibgonj', 'Chapainawabgonj', '', '', '', '', 'kansat@standardbankbd.com', 'Mr. Md. Rabiul Islam', '+8801717559660', 'kansatmanager@standardbankbd.c', 1, '0000-00-00 00:00:00'),
(94, 7, '010', 'Sylhet Branch', 'Thikana Tower (1st Floor)', 'Nayasarak', 'Sylhet', '', '+88-0821-710434', '', '+88-0821-710434', 'sylhet@standardbankbd.com', 'Mr. Parvez Mahfuz', '+8801727579630', 'sylmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(95, 7, '040', 'Beani Bazar Branch', 'Holding no 1803,Word no 03', 'Zaman Plaza (1st floor), Beanibazar Pourashava', 'Beanibazar Pourashava', '', '+88-08223-56097', '', '', 'beanibazar@standardbankbd.com', 'Mr. Kamal Ahmed', '+8801716929400', 'bianimanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(96, 7, '041', 'Moulvibazar Branch', 'Kusumbag Shopping City', 'Sylhet Road, Kusumbag', 'Moulvibazar', '', '+88-0861-63451', '', '', 'moulvibazar@standardbankbd.com', 'Mr. Razeebur Rahman', '+8801717871082', 'moulvimanager@standardbankbd.c', 1, '0000-00-00 00:00:00'),
(97, 7, '045', 'Biswanath SME/Krishi Branch', 'Aasmot Ali Complex', 'College Road, Biswanath', 'Sylhet', '', '+88-08222-456207', '', '', 'biswanath@standardbankbd.com', 'Mr. Sujit Chandra Das', '+8801710186046', 'biswmanager@standardbankbd.com', 1, '0000-00-00 00:00:00'),
(98, 7, '046', 'Goalabazar SME/Krishi Branch', 'Plaza Market (2nd Floor)', 'Sylhet Road Goalabazar, Osmani Nagar', 'Sylhet', '', '+88-0824-256187', '', '', 'goalabazar@standardbankbd.com', 'Mr. Sadananda Debnath', '+8801722598295', 'goalamanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(99, 7, '084', 'Sunamgonj Branch', 'Nasir Plaza', 'Station Road, Sunamgonj.', 'Sunamgonj', '', '+88-0871-62720', '', '', 'sunamgonj@standardbankbd.com', 'Mr. Md. Jasim Uddin', '+8801715388522', 'sunammanager@standardbankbd.co', 1, '0000-00-00 00:00:00'),
(100, 0, '100', 'Green Road Branch', '69, Green Road', 'Panthapath', 'Dhaka', '', '00', '000', '', 'green@diu.net', 'Mahabubur Rahman', '+88011111', 'mahabubur@diu.net', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`bnd_id` int(5) NOT NULL,
  `bnd_name` varchar(50) NOT NULL,
  `bnd_ast_id` int(5) NOT NULL,
  `bnd_usr_id` int(5) NOT NULL,
  `bnd_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`bnd_id`, `bnd_name`, `bnd_ast_id`, `bnd_usr_id`, `bnd_update`) VALUES
(20, 'A4 Tech', 11, 1, '2016-04-05 21:30:10'),
(42, 'A4 Tech', 12, 1, '2016-04-05 21:36:37'),
(5, 'Acer', 1, 1, '2016-04-05 20:24:08'),
(28, 'Acer', 17, 1, '2016-04-05 21:32:21'),
(50, 'AEC', 4, 1, '2016-04-05 21:38:56'),
(54, 'AirLive', 9, 1, '2016-04-05 21:40:43'),
(45, 'Apollo', 3, 1, '2016-04-05 21:37:38'),
(29, 'Apple', 17, 1, '2016-04-05 21:32:57'),
(40, 'Asus', 2, 1, '2016-04-05 21:35:53'),
(25, 'Asus', 17, 1, '2016-04-05 21:31:35'),
(23, 'Bijoy', 11, 1, '2016-04-05 21:30:55'),
(33, 'Brother', 5, 1, '2016-04-05 21:34:13'),
(19, 'Brother', 6, 1, '2016-04-05 21:29:51'),
(7, 'Cannon', 19, 1, '2016-04-05 20:25:03'),
(17, 'Canon', 6, 1, '2016-04-05 21:28:30'),
(36, 'Canon', 20, 1, '2016-04-05 21:34:58'),
(65, 'Chemistry Lab', 24, 1, '2016-04-29 05:08:39'),
(55, 'CISCO', 8, 1, '2016-04-05 21:40:56'),
(52, 'CISCO', 9, 1, '2016-04-05 21:40:09'),
(63, 'Computer Lab', 24, 1, '2016-04-29 05:08:11'),
(59, 'DELCO', 16, 1, '2016-04-13 22:23:52'),
(2, 'DELL', 1, 1, '2016-04-05 20:14:05'),
(38, 'DELL', 2, 1, '2016-04-05 21:35:26'),
(22, 'DELL', 11, 1, '2016-04-05 21:30:34'),
(26, 'DELL', 17, 1, '2016-04-05 21:31:48'),
(57, 'DELL', 18, 1, '2016-04-06 06:16:47'),
(24, 'Digital', 11, 1, '2016-04-05 21:31:19'),
(18, 'Epson', 6, 1, '2016-04-05 21:29:32'),
(8, 'Epson', 7, 1, '2016-04-05 21:17:52'),
(35, 'Fuji', 20, 1, '2016-04-05 21:34:47'),
(30, 'Fujitsu', 17, 1, '2016-04-05 21:33:28'),
(60, 'Hatil', 16, 1, '2016-04-13 22:24:06'),
(62, 'Hatil', 22, 1, '2016-04-24 04:57:19'),
(10, 'Hitachi', 15, 1, '2016-04-05 21:25:03'),
(1, 'HP', 1, 1, '2016-04-05 20:13:52'),
(39, 'HP', 2, 1, '2016-04-05 21:35:41'),
(32, 'HP', 5, 1, '2016-04-05 21:33:55'),
(16, 'HP', 6, 1, '2016-04-05 21:27:48'),
(21, 'HP', 11, 1, '2016-04-05 21:30:23'),
(27, 'HP', 17, 1, '2016-04-05 21:32:01'),
(56, 'HP', 18, 1, '2016-04-06 06:16:38'),
(6, 'HP', 19, 1, '2016-04-05 20:24:23'),
(3, 'IBM', 1, 1, '2016-04-05 20:14:24'),
(4, 'Lenovo', 1, 1, '2016-04-05 20:23:54'),
(58, 'Lenovo', 18, 1, '2016-04-06 06:17:02'),
(44, 'Logitech', 11, 1, '2016-04-05 21:37:26'),
(43, 'Logitech', 12, 1, '2016-04-05 21:37:01'),
(11, 'Maxtor', 15, 1, '2016-04-05 21:25:12'),
(53, 'MikroTik', 9, 1, '2016-04-05 21:40:21'),
(61, 'Navana', 16, 1, '2016-04-13 22:24:16'),
(0, 'None', 0, 1, '2016-04-04 10:43:11'),
(37, 'Panini', 20, 1, '2016-04-05 21:35:12'),
(64, 'Physics lab', 24, 1, '2016-04-29 05:08:25'),
(48, 'Power Pac', 3, 1, '2016-04-05 21:38:22'),
(41, 'Samsung', 2, 1, '2016-04-05 21:36:08'),
(34, 'Samsung', 5, 1, '2016-04-05 21:34:29'),
(9, 'Samsung', 15, 1, '2016-04-05 21:19:13'),
(31, 'Samsung', 17, 1, '2016-04-05 21:33:43'),
(47, 'Sandon', 3, 1, '2016-04-05 21:38:05'),
(13, 'Seagate', 15, 1, '2016-04-05 21:27:04'),
(46, 'Socomec', 3, 1, '2016-04-05 21:37:50'),
(49, 'Technoware', 3, 1, '2016-04-05 21:38:45'),
(14, 'Toshiba', 15, 1, '2016-04-05 21:27:16'),
(12, 'Transcend', 15, 1, '2016-04-05 21:26:01'),
(51, 'Twinmos', 14, 1, '2016-04-05 21:39:11'),
(66, 'TwinMos', 27, 3, '2016-05-06 09:36:56'),
(15, 'Western Digital', 15, 1, '2016-04-05 21:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
`dis_id` int(5) NOT NULL,
  `dis_name` varchar(35) NOT NULL,
  `dis_div_id` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dis_id`, `dis_name`, `dis_div_id`) VALUES
(1, 'Shariatpur', 1),
(2, 'Dhaka', 1),
(3, 'Faridpur', 1),
(4, 'Gazipur', 1),
(5, 'Gopalganj', 1),
(6, 'Jamalpur', 1),
(7, 'Kishoreganj', 1),
(8, 'Madaripur', 1),
(9, 'Manikganj', 1),
(10, 'Munshiganj', 1),
(11, 'Mymensingh', 1),
(12, 'Narayanganj', 1),
(13, 'Narshingdi', 1),
(14, 'Netrakona', 1),
(15, 'Rajbari', 1),
(16, 'Sherpur', 1),
(17, 'Tangail', 1),
(18, 'Bogra', 2),
(19, 'Joypurhat', 2),
(20, 'Naogaon', 2),
(21, 'Natore', 2),
(22, 'Nawabganj', 2),
(23, 'Pabna', 2),
(24, 'Rajshahi', 2),
(25, 'Sirajganj', 2),
(26, 'Bagerhat', 3),
(27, 'Chuadanga', 3),
(28, 'Jessore', 3),
(29, 'Jhenaidah', 3),
(30, 'Khulna', 3),
(32, 'Kushtia', 3),
(33, 'Magura', 3),
(34, 'Meherpur', 3),
(35, 'Narail', 3),
(36, 'Satkhira', 3),
(37, 'Bandarban', 4),
(38, 'Brahmanbaria', 4),
(39, 'Chandpur', 4),
(40, 'Chittagong', 4),
(41, 'Comilla', 4),
(42, 'Cox''s Bazar', 4),
(43, 'Feni', 4),
(44, 'Khagrachhari', 4),
(45, 'Lakshmipur', 4),
(46, 'Noakhali', 4),
(47, 'Rangamati', 4),
(48, 'Barguna', 5),
(49, 'Barisal', 5),
(50, 'Bhola', 5),
(51, 'Jhalokati', 5),
(52, 'Patuakhali', 5),
(53, 'Pirojpur', 5),
(54, 'Dinajpur', 6),
(55, 'Gaibandha', 6),
(56, 'Kurigram', 6),
(57, 'Lalmonirhat', 6),
(58, 'Nilphamari', 6),
(59, 'Panchagarh', 6),
(60, 'Rangpur', 6),
(61, 'Thakurgaon', 6),
(62, 'Habiganj', 7),
(64, 'Moulvibazar', 7),
(65, 'Sunamganj', 7),
(66, 'Sylhet', 7);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
`div_id` int(5) NOT NULL,
  `div_name` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`div_id`, `div_name`) VALUES
(5, 'Barisal'),
(4, 'Chittagong'),
(1, 'Dhaka'),
(3, 'Khulna'),
(8, 'Mymensingh'),
(2, 'Rajshahi'),
(6, 'Rangpur'),
(7, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE IF NOT EXISTS `model` (
`mod_id` int(5) NOT NULL,
  `mod_name` varchar(50) NOT NULL,
  `mod_bnd_id` int(5) NOT NULL,
  `mod_usr_id` int(5) NOT NULL,
  `mod_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`mod_id`, `mod_name`, `mod_bnd_id`, `mod_usr_id`, `mod_update`) VALUES
(36, '1000VA', 45, 1, '2016-04-06 06:59:56'),
(37, '1000VA', 46, 1, '2016-04-06 07:00:09'),
(39, '1000VA', 47, 1, '2016-04-06 07:00:39'),
(40, '1000VA', 48, 1, '2016-04-06 07:01:01'),
(23, '200', 6, 1, '2016-04-06 06:34:40'),
(42, '2KVA', 50, 1, '2016-04-06 07:01:36'),
(11, '3100', 1, 1, '2016-04-06 06:28:13'),
(13, '3130', 1, 1, '2016-04-06 06:30:19'),
(43, '3KVA', 50, 1, '2016-04-06 07:01:48'),
(29, '430', 27, 1, '2016-04-06 06:56:56'),
(14, '5048', 3, 1, '2016-04-06 06:32:01'),
(38, '600VA', 46, 1, '2016-04-06 07:00:25'),
(41, '600VA', 49, 1, '2016-04-06 07:01:18'),
(12, '6200', 1, 1, '2016-04-06 06:29:36'),
(20, '6270', 3, 1, '2016-04-06 06:33:44'),
(15, '8175', 3, 1, '2016-04-06 06:32:17'),
(18, '8705', 3, 1, '2016-04-06 06:33:06'),
(19, '8706', 3, 1, '2016-04-06 06:33:22'),
(50, '8GB', 66, 3, '2016-05-06 09:37:31'),
(16, '9128', 3, 1, '2016-04-06 06:32:28'),
(17, '9216', 3, 1, '2016-04-06 06:32:51'),
(33, 'CR80', 36, 1, '2016-04-06 06:58:46'),
(8, 'DC5700', 1, 1, '2016-04-06 06:23:47'),
(10, 'DC5800', 1, 1, '2016-04-06 06:27:58'),
(45, 'Double Seat', 59, 1, '2016-04-13 22:25:16'),
(46, 'Executive', 59, 1, '2016-04-13 22:25:35'),
(35, 'FB20', 35, 1, '2016-04-06 06:59:22'),
(9, 'HP ProDesk 400 G2', 1, 1, '2016-04-06 06:24:10'),
(27, 'Latitude 520', 26, 1, '2016-04-06 06:56:19'),
(28, 'Latitude 630', 26, 1, '2016-04-06 06:56:37'),
(21, 'Lide110', 7, 1, '2016-04-06 06:34:02'),
(22, 'Lide200', 7, 1, '2016-04-06 06:34:20'),
(26, 'LQ-350', 8, 1, '2016-04-06 06:38:24'),
(25, 'LQ-390', 8, 1, '2016-04-06 06:36:17'),
(24, 'LQ-590', 8, 1, '2016-04-06 06:36:04'),
(49, 'MR-751', 53, 1, '2016-04-29 05:22:51'),
(48, 'MR450', 53, 1, '2016-04-29 05:22:35'),
(0, 'None', 0, 1, '2016-04-05 18:49:58'),
(6, 'OptiPlex 3010', 2, 1, '2016-04-06 06:23:17'),
(7, 'OptiPlex 3020', 2, 1, '2016-04-06 06:23:32'),
(3, 'OptiPlex 360', 2, 1, '2016-04-06 06:21:43'),
(1, 'OptiPlex 380', 2, 1, '2016-04-06 06:21:02'),
(2, 'OptiPlex 390', 2, 1, '2016-04-06 06:21:20'),
(4, 'OptiPlex 755', 2, 1, '2016-04-06 06:22:36'),
(5, 'OptiPlex 780', 2, 1, '2016-04-06 06:22:52'),
(31, 'P3005', 32, 1, '2016-04-06 06:57:59'),
(32, 'P3015', 32, 1, '2016-04-06 06:58:14'),
(44, 'Single Seat', 59, 1, '2016-04-13 22:24:57'),
(34, 'VisionX', 37, 1, '2016-04-06 06:59:07'),
(47, 'Visitor', 59, 1, '2016-04-13 22:26:02'),
(30, 'X200MA', 25, 1, '2016-04-06 06:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `org_id` int(5) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_name_s` varchar(30) NOT NULL,
  `org_address` varchar(250) NOT NULL,
  `org_dis_id` varchar(50) DEFAULT NULL,
  `org_tel` varchar(15) DEFAULT NULL,
  `org_mob` varchar(15) DEFAULT NULL,
  `org_email` varchar(35) DEFAULT NULL,
  `org_web` varchar(50) DEFAULT NULL,
  `org_fax` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `org_name`, `org_name_s`, `org_address`, `org_dis_id`, `org_tel`, `org_mob`, `org_email`, `org_web`, `org_fax`) VALUES
(1, 'Dhaka International University', 'DIU', '66, Green Road, Panthapath, Dhaka', '', '0200000', '01000000', 'info@diu.net', 'www.diu.ac.bd', '02000000');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
`pur_id` int(10) NOT NULL,
  `pur_wo_no` varchar(30) NOT NULL,
  `pur_wo_date` date DEFAULT NULL,
  `pur_bill_no` varchar(35) NOT NULL,
  `pur_bill_date` date DEFAULT NULL,
  `pur_at_id` int(5) DEFAULT NULL,
  `pur_ven_id` int(5) DEFAULT NULL,
  `pur_usr_id` int(5) NOT NULL,
  `pur_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`pur_id`, `pur_wo_no`, `pur_wo_date`, `pur_bill_no`, `pur_bill_date`, `pur_at_id`, `pur_ven_id`, `pur_usr_id`, `pur_update`) VALUES
(6, 'DIU/2016/0009', '2016-06-16', 'FLO/2016/0009', '2016-06-16', 1, 2, 1, '2016-06-16 09:39:18'),
(1, 'DIU/2016/01/001', '2016-01-31', 'CS/DIU/2016/01/001', '2016-01-31', 1, 1, 1, '2016-04-06 07:03:48'),
(2, 'DIU/2016/01/02', '2016-04-01', 'CS/DIU/2016/01/002', '2016-04-01', 3, 3, 1, '2016-04-13 22:27:48'),
(3, 'WO001', '2016-04-20', 'BILL01', '2016-04-20', 3, 3, 1, '2016-04-24 05:02:03'),
(4, 'WO002', '2016-04-29', 'BILL002', '2016-04-29', 1, 1, 1, '2016-04-29 05:20:04'),
(5, 'WO003', '2016-05-06', 'BILL003', '2016-05-06', 1, 5, 3, '2016-05-06 09:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
`str_id` int(11) NOT NULL,
  `str_pur_id` int(5) DEFAULT NULL,
  `str_ast_id` int(5) DEFAULT NULL,
  `str_bnd_id` int(5) DEFAULT NULL,
  `str_mod_id` int(5) DEFAULT NULL,
  `str_sl` varchar(35) DEFAULT NULL,
  `str_qnty` int(5) DEFAULT NULL,
  `str_unt_price` decimal(8,0) NOT NULL DEFAULT '0',
  `str_exp_date` date DEFAULT NULL,
  `str_w_pre` int(5) NOT NULL DEFAULT '0',
  `str_loc` varchar(6) DEFAULT '000',
  `str_pre_loc` int(5) DEFAULT NULL,
  `str_status` int(1) NOT NULL DEFAULT '0',
  `str_usr_id` int(5) NOT NULL DEFAULT '1',
  `str_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`str_id`, `str_pur_id`, `str_ast_id`, `str_bnd_id`, `str_mod_id`, `str_sl`, `str_qnty`, `str_unt_price`, `str_exp_date`, `str_w_pre`, `str_loc`, `str_pre_loc`, `str_status`, `str_usr_id`, `str_update`) VALUES
(1, 1, 1, 2, 1, '69YD82S', 1, '46750', '2017-01-01', 2, '095', NULL, 1, 1, '2016-04-06 07:28:42'),
(2, 1, 1, 2, 1, '69YD821', 1, '46750', '2017-01-01', 2, '005', NULL, 1, 1, '2016-04-06 10:50:34'),
(3, 1, 1, 2, 1, '69YD822', 1, '46750', '2017-01-01', 2, '001', NULL, 1, 1, '2016-04-06 10:52:15'),
(4, 1, 1, 2, 1, '69YD823', 1, '46750', '2017-01-01', 2, '001', NULL, 1, 1, '2016-04-06 10:57:33'),
(5, 1, 1, 2, 1, '69YD829', 1, '46750', '2017-01-01', 2, '001', NULL, 1, 1, '2016-04-06 11:00:04'),
(6, 1, 2, 38, 0, 'MON001', 1, '7700', '2017-01-01', 2, '001', NULL, 1, 1, '2016-04-07 19:33:07'),
(7, 1, 2, 38, 0, 'MON002', 1, '7700', '2017-01-01', 2, '002', NULL, 0, 1, '2016-04-07 19:33:17'),
(8, 1, 2, 38, 0, 'MON003', 1, '7700', '2017-01-01', 2, '001', NULL, 1, 1, '2016-04-07 19:33:22'),
(9, 1, 2, 38, 0, 'MON004', 1, '7700', '2017-01-01', 2, '005', NULL, 1, 1, '2016-04-07 19:33:28'),
(10, 1, 2, 38, 0, 'MON006', 1, '7700', '2017-01-01', 2, '001', NULL, 1, 1, '2016-04-07 19:33:35'),
(11, 1, 3, 45, 36, 'APL001', 1, '32000', '2017-01-01', 2, '001', NULL, 1, 1, '2016-04-07 22:17:30'),
(12, 1, 3, 45, 36, 'APL002', 1, '3200', '2017-01-01', 1, '001', NULL, 1, 1, '2016-04-07 22:26:22'),
(13, 1, 3, 45, 36, 'APL003', 1, '3200', '2017-01-01', 1, '001', NULL, 1, 1, '2016-04-07 22:26:33'),
(14, 1, 3, 45, 36, 'APL004', 1, '3200', '2017-01-01', 1, '001', NULL, 1, 1, '2016-04-07 22:26:47'),
(15, 1, 3, 45, 36, 'APL005', 1, '3200', '2017-01-01', 1, '011', NULL, 1, 1, '2016-04-07 22:27:08'),
(16, 1, 4, 50, 43, 'AEC001', 1, '80000', '2017-01-01', 3, '001', NULL, 1, 1, '2016-04-07 22:27:43'),
(17, 1, 5, 32, 32, 'HP3015001', 1, '70000', '2017-01-01', 3, '001', NULL, 1, 1, '2016-04-07 22:29:39'),
(18, 2, 16, 59, 45, 'CHAIR001', 1, '10000', '0000-00-00', 1, '001', NULL, 1, 1, '2016-04-13 22:28:58'),
(19, 3, 22, 62, 0, 'HC01', 1, '10000', '0000-00-00', 0, '001', NULL, 1, 1, '2016-04-24 05:03:19'),
(20, 3, 22, 62, 0, 'HC02', 1, '10000', '0000-00-00', 0, '001', NULL, 1, 1, '2016-04-24 05:03:38'),
(21, 3, 0, 0, 0, 'NONE001', 1, '0', '0000-00-00', 0, '002', NULL, 1, 1, '2016-04-26 23:58:27'),
(26, 3, 16, 61, 0, 'CH001', 1, '12000', '0000-00-00', 0, '001', NULL, 1, 1, '2016-04-28 19:40:49'),
(27, 3, 16, 59, 45, 'DCH001', 1, '22000', '0000-00-00', 0, '001', NULL, 1, 1, '2016-04-28 19:42:51'),
(28, 4, 20, 36, 33, '8765439', 1, '125000', '2019-04-29', 3, '001', NULL, 1, 1, '2016-04-29 05:21:10'),
(29, 4, 9, 53, 48, 'MR098765432', 1, '4500', '2018-04-29', 2, '001', NULL, 1, 1, '2016-04-29 05:24:48'),
(30, 4, 19, 6, 23, '200001', 1, '10000', '2018-04-29', 2, '001', NULL, 1, 1, '2016-04-30 23:21:41'),
(31, 5, 27, 66, 50, 'TW8GB001', 1, '500', '0000-00-00', 0, '018', NULL, 1, 1, '2016-05-06 09:42:53'),
(32, 5, 27, 66, 50, 'TW8GB002', 1, '500', '0000-00-00', 0, '001', NULL, 1, 1, '2016-05-06 09:43:04'),
(33, 6, 1, 1, 8, 'SDF234SDF', 1, '34000', '2019-06-16', 3, '001', NULL, 1, 1, '2016-06-16 09:41:00'),
(34, 6, 3, 45, 36, 'EDFSDF34324', 1, '8000', '2017-06-16', 1, '001', NULL, 1, 1, '2016-06-16 09:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`usr_id` int(5) NOT NULL,
  `usr_login` varchar(10) NOT NULL,
  `usr_name` varchar(50) NOT NULL,
  `usr_cont` varchar(15) NOT NULL,
  `usr_passwd` varchar(250) NOT NULL,
  `usr_access` varchar(25) NOT NULL DEFAULT 'admin',
  `usr_email` varchar(50) DEFAULT NULL,
  `usr_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pass_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_login`, `usr_name`, `usr_cont`, `usr_passwd`, `usr_access`, `usr_email`, `usr_update`, `pass_status`) VALUES
(1, 'arif', 'Arif Uddin', '8801715865458', '202cb962ac59075b964b07152d234b70', 'admin', 'arifrhb@gmail.com', '0000-00-00 00:00:00', 1),
(2, 'shela', 'Shela Khatun', '880191111111', '202cb962ac59075b964b07152d234b70', 'store', 'shela_diu@yahoo.com', '2016-05-02 19:59:52', 1),
(3, 'bilkis', 'Bilkis Begum', '880191111111', '202cb962ac59075b964b07152d234b70', 'admin', 'bilkis@yahoo.com', '2016-05-02 20:35:01', 1),
(4, 'bishamver', 'Bishamver Borman', '8800023423423', '250cf8b51c773f3f8dc8b4be867a9a02', 'store', 'bishamver@gmail.com', '2016-05-03 21:21:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
`ven_id` int(5) NOT NULL,
  `ven_name` varchar(50) NOT NULL,
  `ven_addr` varchar(250) DEFAULT NULL,
  `ven_dis_id` int(5) DEFAULT '0',
  `ven_tel` varchar(20) DEFAULT 'N/A',
  `ven_mob` varchar(20) NOT NULL DEFAULT 'N/A',
  `ven_email` varchar(35) DEFAULT 'N/A',
  `ven_fax` varchar(15) DEFAULT NULL,
  `ven_web` varchar(35) DEFAULT NULL,
  `ven_kcp_name` varchar(35) NOT NULL,
  `ven_kcp_mob` varchar(20) NOT NULL,
  `ven_kcp_email` varchar(35) DEFAULT NULL,
  `ven_at_id` int(5) NOT NULL,
  `ven_usr_id` int(5) NOT NULL,
  `ven_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`ven_id`, `ven_name`, `ven_addr`, `ven_dis_id`, `ven_tel`, `ven_mob`, `ven_email`, `ven_fax`, `ven_web`, `ven_kcp_name`, `ven_kcp_mob`, `ven_kcp_email`, `ven_at_id`, `ven_usr_id`, `ven_update`) VALUES
(1, 'Computer Source', 'Dhanmondi, Dhaka, Bangladesh', NULL, '880219364758', '8801712345678', 'info@source.com', '', 'www.source.com', 'Ahmed Alam', '880123456789', 'ahmed@source.com', 1, 1, '2016-03-13 21:50:35'),
(2, 'Flora Limited', 'Adamjee Court Annex-2 (4th Floor), 119-120, Motijheel C/A. Dhaka-1000, Bangladesh', NULL, '88029587255', '88029587255', 'info@floralimited.com', '88029550030', 'www.floralimited.com', 'Mr. Hasanuzzaman', '88029587255', 'hzaman@floralimited.com', 1, 1, '2016-03-14 08:20:10'),
(3, 'Bengal Furniture', 'Dhaka', NULL, '880219364758', '8801712345678', 'info@bengal.com', '', 'www.bengal.com', 'Kalam', '880171122334455', 'kalam@bengal.com', 3, 1, '2016-03-15 18:11:52'),
(4, 'Hamid Real Estate Limited', 'Banani', NULL, '8802000000', '880171500000000', 'info@hrel.com', '', 'www.hrel.com', 'Hamid', '8800000000', 'hamid@hrel.com', 5, 3, '2016-04-29 05:10:50'),
(5, 'Smart Technologies', 'Motijhil', NULL, '88023344444', '88013445677888', 'info@smart.com', '', 'www.smart-bd.com', 'Kuddus', '8801876555557', 'kuddus@smart-bd.om', 1, 3, '2016-05-06 09:41:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset_name`
--
ALTER TABLE `asset_name`
 ADD PRIMARY KEY (`ast_name`,`ast_at_id`), ADD UNIQUE KEY `ast_id` (`ast_id`), ADD KEY `ast_usr_id` (`ast_usr_id`);

--
-- Indexes for table `asset_type`
--
ALTER TABLE `asset_type`
 ADD PRIMARY KEY (`at_id`), ADD UNIQUE KEY `at_name` (`at_name`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
 ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
 ADD PRIMARY KEY (`bnd_name`,`bnd_ast_id`), ADD UNIQUE KEY `bnd_id` (`bnd_id`), ADD KEY `bnd_ast_id` (`bnd_ast_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
 ADD PRIMARY KEY (`dis_id`), ADD UNIQUE KEY `dis_name` (`dis_name`), ADD KEY `dis_div_id` (`dis_div_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
 ADD PRIMARY KEY (`div_id`), ADD UNIQUE KEY `div_name` (`div_name`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
 ADD PRIMARY KEY (`mod_name`,`mod_bnd_id`), ADD UNIQUE KEY `mod_id` (`mod_id`), ADD KEY `mod_bnd_id` (`mod_bnd_id`), ADD KEY `mod_usr_id` (`mod_usr_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
 ADD PRIMARY KEY (`org_id`), ADD UNIQUE KEY `org_name` (`org_name`,`org_name_s`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
 ADD PRIMARY KEY (`pur_wo_no`,`pur_bill_no`), ADD UNIQUE KEY `pur_id` (`pur_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
 ADD PRIMARY KEY (`str_id`), ADD UNIQUE KEY `str_sl` (`str_sl`), ADD KEY `str_pur_id` (`str_pur_id`), ADD KEY `str_usr_id` (`str_usr_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`usr_id`), ADD UNIQUE KEY `usr_id` (`usr_login`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
 ADD PRIMARY KEY (`ven_id`), ADD UNIQUE KEY `ven_name` (`ven_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset_name`
--
ALTER TABLE `asset_name`
MODIFY `ast_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `asset_type`
--
ALTER TABLE `asset_type`
MODIFY `at_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
MODIFY `br_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
MODIFY `bnd_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
MODIFY `dis_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
MODIFY `div_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
MODIFY `mod_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
MODIFY `pur_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
MODIFY `str_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `usr_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
MODIFY `ven_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asset_name`
--
ALTER TABLE `asset_name`
ADD CONSTRAINT `asset_name_ibfk_1` FOREIGN KEY (`ast_usr_id`) REFERENCES `users` (`usr_id`);

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`bnd_ast_id`) REFERENCES `asset_name` (`ast_id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`dis_div_id`) REFERENCES `division` (`div_id`);

--
-- Constraints for table `model`
--
ALTER TABLE `model`
ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`mod_bnd_id`) REFERENCES `brand` (`bnd_id`),
ADD CONSTRAINT `model_ibfk_2` FOREIGN KEY (`mod_usr_id`) REFERENCES `users` (`usr_id`);

--
-- Constraints for table `store`
--
ALTER TABLE `store`
ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`str_pur_id`) REFERENCES `purchase` (`pur_id`),
ADD CONSTRAINT `store_ibfk_2` FOREIGN KEY (`str_usr_id`) REFERENCES `users` (`usr_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
