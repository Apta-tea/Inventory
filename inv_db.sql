-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2023 at 10:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inv_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'Electronics  Category', 'active', '2019-11-18 05:15:34', NULL),
(2, 'Agriculture', 'Agriculture Category', 'active', '2019-11-18 05:17:32', NULL),
(4, 'Herbal', 'Traditional Herbal Medicine', 'active', '2023-11-28 08:17:26', '2023-11-28 08:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `company_name` varchar(127) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` varchar(127) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zip` varchar(64) DEFAULT NULL,
  `file_company_logo` varchar(256) DEFAULT NULL,
  `file_report_logo` varchar(256) DEFAULT NULL,
  `file_report_background` varchar(256) DEFAULT NULL,
  `report_footer` varchar(256) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `address`, `country`, `city`, `state`, `zip`, `file_company_logo`, `file_report_logo`, `file_report_background`, `report_footer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pata Corporation', 'C-20,JAkir Hossain Road,Block-E, Md-pur', 'US', 'Chicago', 'Illinois', '1212', NULL, NULL, NULL, 'footer content XXXXXXXXX', 'active', NULL, '2023-11-21 04:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `countrys`
--

CREATE TABLE `countrys` (
  `id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countrys`
--

INSERT INTO `countrys` (`id`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', NULL, NULL),
(2, 'Ã…land Islands', NULL, NULL),
(3, 'Albania', NULL, NULL),
(4, 'Algeria', NULL, NULL),
(5, 'American Samoa', NULL, NULL),
(6, 'Andorra', NULL, NULL),
(7, 'Angola', NULL, NULL),
(8, 'Anguilla', NULL, NULL),
(9, 'Antarctica', NULL, NULL),
(10, 'Antigua and Barbuda', NULL, NULL),
(11, 'Argentina', NULL, NULL),
(12, 'Armenia', NULL, NULL),
(13, 'Aruba', NULL, NULL),
(14, 'Australia', NULL, NULL),
(15, 'Austria', NULL, NULL),
(16, 'Azerbaijan', NULL, NULL),
(17, 'Bahamas', NULL, NULL),
(18, 'Bahrain', NULL, NULL),
(19, 'Bangladesh', NULL, NULL),
(20, 'Barbados', NULL, NULL),
(21, 'Belarus', NULL, NULL),
(22, 'Belgium', NULL, NULL),
(23, 'Belize', NULL, NULL),
(24, 'Benin', NULL, NULL),
(25, 'Bermuda', NULL, NULL),
(26, 'Bhutan', NULL, NULL),
(27, 'Bolivia', NULL, NULL),
(28, 'Bosnia and Herzegovina', NULL, NULL),
(29, 'Botswana', NULL, NULL),
(30, 'Bouvet Island', NULL, NULL),
(31, 'Brazil', NULL, NULL),
(32, 'British Indian Ocean Territory', NULL, NULL),
(33, 'Brunei Darussalam', NULL, NULL),
(34, 'Bulgaria', NULL, NULL),
(35, 'Burkina Faso', NULL, NULL),
(36, 'Burundi', NULL, NULL),
(37, 'Cambodia', NULL, NULL),
(38, 'Cameroon', NULL, NULL),
(39, 'Canada', NULL, NULL),
(40, 'Cape Verde', NULL, NULL),
(41, 'Cayman Islands', NULL, NULL),
(42, 'Central African Republic', NULL, NULL),
(43, 'Chad', NULL, NULL),
(44, 'Chile', NULL, NULL),
(45, 'China', NULL, NULL),
(46, 'Christmas Island', NULL, NULL),
(47, 'Cocos (Keeling) Islands', NULL, NULL),
(48, 'Colombia', NULL, NULL),
(49, 'Comoros', NULL, NULL),
(50, 'Congo', NULL, NULL),
(51, 'Congo, The Democratic Republic of the', NULL, NULL),
(52, 'Cook Islands', NULL, NULL),
(53, 'Costa Rica', NULL, NULL),
(54, 'CÃ´te D\'Ivoire', NULL, NULL),
(55, 'Croatia', NULL, NULL),
(56, 'Cuba', NULL, NULL),
(57, 'Cyprus', NULL, NULL),
(58, 'Czech Republic', NULL, NULL),
(59, 'Denmark', NULL, NULL),
(60, 'Djibouti', NULL, NULL),
(61, 'Dominica', NULL, NULL),
(62, 'Dominican Republic', NULL, NULL),
(63, 'Ecuador', NULL, NULL),
(64, 'Egypt', NULL, NULL),
(65, 'El Salvador', NULL, NULL),
(66, 'Equatorial Guinea', NULL, NULL),
(67, 'Eritrea', NULL, NULL),
(68, 'Estonia', NULL, NULL),
(69, 'Ethiopia', NULL, NULL),
(70, 'Falkland Islands (Malvinas)', NULL, NULL),
(71, 'Faroe Islands', NULL, NULL),
(72, 'Fiji', NULL, NULL),
(73, 'Finland', NULL, NULL),
(74, 'France', NULL, NULL),
(75, 'French Guiana', NULL, NULL),
(76, 'French Polynesia', NULL, NULL),
(77, 'French Southern Territories', NULL, NULL),
(78, 'Gabon', NULL, NULL),
(79, 'Gambia', NULL, NULL),
(80, 'Georgia', NULL, NULL),
(81, 'Germany', NULL, NULL),
(82, 'Ghana', NULL, NULL),
(83, 'Gibraltar', NULL, NULL),
(84, 'Greece', NULL, NULL),
(85, 'Greenland', NULL, NULL),
(86, 'Grenada', NULL, NULL),
(87, 'Guadeloupe', NULL, NULL),
(88, 'Guam', NULL, NULL),
(89, 'Guatemala', NULL, NULL),
(90, 'Guernsey', NULL, NULL),
(91, 'Guinea', NULL, NULL),
(92, 'Guinea-Bissau', NULL, NULL),
(93, 'Guyana', NULL, NULL),
(94, 'Haiti', NULL, NULL),
(95, 'Heard Island and McDonald Islands', NULL, NULL),
(96, 'Holy See (Vatican City State)', NULL, NULL),
(97, 'Honduras', NULL, NULL),
(98, 'Hong Kong', NULL, NULL),
(99, 'Hungary', NULL, NULL),
(100, 'Iceland', NULL, NULL),
(101, 'India', NULL, NULL),
(102, 'Indonesia', NULL, NULL),
(103, 'Iran, Islamic Republic of', NULL, NULL),
(104, 'Iraq', NULL, NULL),
(105, 'Ireland', NULL, NULL),
(106, 'Isle of Man', NULL, NULL),
(107, 'Israel', NULL, NULL),
(108, 'Italy', NULL, NULL),
(109, 'Jamaica', NULL, NULL),
(110, 'Japan', NULL, NULL),
(111, 'Jersey', NULL, NULL),
(112, 'Jordan', NULL, NULL),
(113, 'Kazakhstan', NULL, NULL),
(114, 'Kenya', NULL, NULL),
(115, 'Kiribati', NULL, NULL),
(116, 'Korea, Democratic People\'s Republic of', NULL, NULL),
(117, 'Korea, Republic of', NULL, NULL),
(118, 'Kuwait', NULL, NULL),
(119, 'Kyrgyzstan', NULL, NULL),
(120, 'Lao People\'s Democratic Republic', NULL, NULL),
(121, 'Latvia', NULL, NULL),
(122, 'Lebanon', NULL, NULL),
(123, 'Lesotho', NULL, NULL),
(124, 'Liberia', NULL, NULL),
(125, 'Libyan Arab Jamahiriya', NULL, NULL),
(126, 'Liechtenstein', NULL, NULL),
(127, 'Lithuania', NULL, NULL),
(128, 'Luxembourg', NULL, NULL),
(129, 'Macao', NULL, NULL),
(130, 'Macedonia, The Former Yugoslav Republic of', NULL, NULL),
(131, 'Madagascar', NULL, NULL),
(132, 'Malawi', NULL, NULL),
(133, 'Malaysia', NULL, NULL),
(134, 'Maldives', NULL, NULL),
(135, 'Mali', NULL, NULL),
(136, 'Malta', NULL, NULL),
(137, 'Marshall Islands', NULL, NULL),
(138, 'Martinique', NULL, NULL),
(139, 'Mauritania', NULL, NULL),
(140, 'Mauritius', NULL, NULL),
(141, 'Mayotte', NULL, NULL),
(142, 'Mexico', NULL, NULL),
(143, 'Micronesia, Federated States of', NULL, NULL),
(144, 'Moldova, Republic of', NULL, NULL),
(145, 'Monaco', NULL, NULL),
(146, 'Mongolia', NULL, NULL),
(147, 'Montenegro', NULL, NULL),
(148, 'Montserrat', NULL, NULL),
(149, 'Morocco', NULL, NULL),
(150, 'Mozambique', NULL, NULL),
(151, 'Myanmar', NULL, NULL),
(152, 'Namibia', NULL, NULL),
(153, 'Nauru', NULL, NULL),
(154, 'Nepal', NULL, NULL),
(155, 'Netherlands', NULL, NULL),
(156, 'Netherlands Antilles', NULL, NULL),
(157, 'New Caledonia', NULL, NULL),
(158, 'New Zealand', NULL, NULL),
(159, 'Nicaragua', NULL, NULL),
(160, 'Niger', NULL, NULL),
(161, 'Nigeria', NULL, NULL),
(162, 'Niue', NULL, NULL),
(163, 'Norfolk Island', NULL, NULL),
(164, 'Northern Mariana Islands', NULL, NULL),
(165, 'Norway', NULL, NULL),
(166, 'Oman', NULL, NULL),
(167, 'Pakistan', NULL, NULL),
(168, 'Palau', NULL, NULL),
(169, 'Palestinian Territory, Occupied', NULL, NULL),
(170, 'Panama', NULL, NULL),
(171, 'Papua New Guinea', NULL, NULL),
(172, 'Paraguay', NULL, NULL),
(173, 'Peru', NULL, NULL),
(174, 'Philippines', NULL, NULL),
(175, 'Pitcairn', NULL, NULL),
(176, 'Poland', NULL, NULL),
(177, 'Portugal', NULL, NULL),
(178, 'Puerto Rico', NULL, NULL),
(179, 'Qatar', NULL, NULL),
(180, 'Reunion', NULL, NULL),
(181, 'Romania', NULL, NULL),
(182, 'Russian Federation', NULL, NULL),
(183, 'Rwanda', NULL, NULL),
(184, 'Saint BarthÃ©lemy', NULL, NULL),
(185, 'Saint Helena', NULL, NULL),
(186, 'Saint Kitts and Nevis', NULL, NULL),
(187, 'Saint Lucia', NULL, NULL),
(188, 'Saint Martin', NULL, NULL),
(189, 'Saint Pierre and Miquelon', NULL, NULL),
(190, 'Saint Vincent and the Grenadines', NULL, NULL),
(191, 'Samoa', NULL, NULL),
(192, 'San Marino', NULL, NULL),
(193, 'Sao Tome and Principe', NULL, NULL),
(194, 'Saudi Arabia', NULL, NULL),
(195, 'Senegal', NULL, NULL),
(196, 'Serbia', NULL, NULL),
(197, 'Seychelles', NULL, NULL),
(198, 'Sierra Leone', NULL, NULL),
(199, 'Singapore', NULL, NULL),
(200, 'Slovakia', NULL, NULL),
(201, 'Slovenia', NULL, NULL),
(202, 'Solomon Islands', NULL, NULL),
(203, 'Somalia', NULL, NULL),
(204, 'South Africa', NULL, NULL),
(205, 'South Georgia and the South Sandwich Islands', NULL, NULL),
(206, 'Spain', NULL, NULL),
(207, 'Sri Lanka', NULL, NULL),
(208, 'Sudan', NULL, NULL),
(209, 'Suriname', NULL, NULL),
(210, 'Svalbard and Jan Mayen', NULL, NULL),
(211, 'Swaziland', NULL, NULL),
(212, 'Sweden', NULL, NULL),
(213, 'Switzerland', NULL, NULL),
(214, 'Syrian Arab Republic', NULL, NULL),
(215, 'Taiwan, Province Of China', NULL, NULL),
(216, 'Tajikistan', NULL, NULL),
(217, 'Tanzania, United Republic of', NULL, NULL),
(218, 'Thailand', NULL, NULL),
(219, 'Timor-Leste', NULL, NULL),
(220, 'Togo', NULL, NULL),
(221, 'Tokelau', NULL, NULL),
(222, 'Tonga', NULL, NULL),
(223, 'Trinidad and Tobago', NULL, NULL),
(224, 'Tunisia', NULL, NULL),
(225, 'Turkey', NULL, NULL),
(226, 'Turkmenistan', NULL, NULL),
(227, 'Turks and Caicos Islands', NULL, NULL),
(228, 'Tuvalu', NULL, NULL),
(229, 'Uganda', NULL, NULL),
(230, 'Ukraine', NULL, NULL),
(231, 'United Arab Emirates', NULL, NULL),
(232, 'United Kingdom', NULL, NULL),
(233, 'United States', NULL, NULL),
(234, 'United States Minor Outlying Islands', NULL, NULL),
(235, 'Uruguay', NULL, NULL),
(236, 'Uzbekistan', NULL, NULL),
(237, 'Vanuatu', NULL, NULL),
(238, 'Venezuela', NULL, NULL),
(239, 'Viet Nam', NULL, NULL),
(240, 'Virgin Islands, British', NULL, NULL),
(241, 'Virgin Islands, U.S.', NULL, NULL),
(242, 'Wallis And Futuna', NULL, NULL),
(243, 'Western Sahara', NULL, NULL),
(244, 'Yemen', NULL, NULL),
(245, 'Zambia', NULL, NULL),
(246, 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `customer_name` varchar(127) DEFAULT NULL,
  `email` varchar(127) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(127) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zip` varchar(64) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `email`, `address`, `city`, `state`, `zip`, `phone_no`, `created_at`, `updated_at`) VALUES
(1, 'Mike Jak', 'jam@gmail.com', 'California', 'NY', 'NY', '60000', '7864444', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `incoming`
-- (See below for the actual view)
--
CREATE TABLE `incoming` (
`product_id` varchar(127)
,`item_quantity` double(12,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) NOT NULL,
  `invoice_no` varchar(64) DEFAULT NULL,
  `customers_id` int(10) DEFAULT NULL,
  `date_of_invoice` date DEFAULT NULL,
  `users_id` int(10) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `internal_notes` text DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `customers_id`, `date_of_invoice`, `users_id`, `description`, `internal_notes`, `total_cost`, `amount_paid`) VALUES
(1, '201911-01', 1, '2019-11-18', 1, '', '', '150.00', '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `item_invoices`
--

CREATE TABLE `item_invoices` (
  `id` int(10) NOT NULL,
  `invoice_id` int(10) DEFAULT NULL,
  `product_id` varchar(127) DEFAULT NULL,
  `item_cost` varchar(127) DEFAULT NULL,
  `item_quantity` decimal(10,2) DEFAULT NULL,
  `item_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `item_invoices`
--

INSERT INTO `item_invoices` (`id`, `invoice_id`, `product_id`, `item_cost`, `item_quantity`, `item_total`) VALUES
(1, 1, '2', '30.00', '1.00', '30.00'),
(2, 1, '1', '120.00', '1.00', '120.00');

-- --------------------------------------------------------

--
-- Table structure for table `item_materials`
--

CREATE TABLE `item_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issued_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `item_price` double(10,2) DEFAULT NULL,
  `item_quantity` double(10,2) DEFAULT NULL,
  `item_total` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_materials`
--

INSERT INTO `item_materials` (`id`, `issued_id`, `product_id`, `item_price`, `item_quantity`, `item_total`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 25000.00, 10.00, 250000.00, '2023-12-15 22:13:58', '2023-12-15 22:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `item_purchases`
--

CREATE TABLE `item_purchases` (
  `id` int(10) NOT NULL,
  `purchase_id` int(10) DEFAULT NULL,
  `product_id` varchar(127) DEFAULT NULL,
  `item_cost` varchar(127) DEFAULT NULL,
  `item_quantity` decimal(10,2) DEFAULT NULL,
  `item_total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `item_purchases`
--

INSERT INTO `item_purchases` (`id`, `purchase_id`, `product_id`, `item_cost`, `item_quantity`, `item_total`, `created_at`, `updated_at`) VALUES
(1, 1, '2', '20.00', '100.00', '2000.00', '2023-12-07 05:51:19', '2023-12-06 22:51:19'),
(2, 1, '1', '100.00', '1.00', '100.00', '2023-12-03 10:13:37', '0000-00-00 00:00:00'),
(29, 11, '4', '15000.00', '10.00', '150000.00', '2023-12-09 20:40:13', '2023-12-09 20:40:13'),
(30, 11, '5', '15000.00', '10.00', '150000.00', '2023-12-09 20:40:13', '2023-12-09 20:40:13'),
(31, 12, '1', '100.00', '10.00', '1000.00', '2023-12-14 00:28:50', '2023-12-14 00:28:50'),
(32, 12, '2', '20.00', '100.00', '2000.00', '2023-12-14 00:28:51', '2023-12-14 00:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `production_no` varchar(255) DEFAULT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `stored_date` date DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `internal_notes` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `production_no`, `supplier_id`, `stored_date`, `user_id`, `description`, `internal_notes`, `amount`, `created_at`, `updated_at`) VALUES
(1, '1112-2023', 1, '2023-12-11', 1, 'desc', 'i-note', 2500000, '2023-12-11 10:11:12', NULL),
(3, '1212-2023', 1, '2023-12-12', 4, 'desc', 'nt', 250000, '2023-12-12 04:38:29', '2023-12-12 04:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issued_no` varchar(255) DEFAULT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `issued_date` date DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `internal_notes` varchar(255) DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `issued_no`, `company_id`, `issued_date`, `user_id`, `description`, `internal_notes`, `amount`, `created_at`, `updated_at`) VALUES
(1, '1612-2023', 1, '2023-12-16', 1, 'desc', 'in', 250000.00, '2023-12-15 22:13:57', '2023-12-15 22:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_11_15_045130_create_units_table', 2),
(11, '2023_11_17_095947_create_units_table', 3),
(12, '2023_12_11_061826_create_manufactures_table', 4),
(13, '2023_12_11_061916_create_productions_table', 4),
(14, '2023_12_16_035733_create_materials_table', 5),
(15, '2023_12_16_035822_create_item_materials_table', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `outgoing`
-- (See below for the actual view)
--
CREATE TABLE `outgoing` (
`product_id` varchar(127)
,`quantity` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `outt`
-- (See below for the actual view)
--
CREATE TABLE `outt` (
`product_id` varchar(127)
,`quantity` double(12,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stored_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `item_price` double(10,2) DEFAULT NULL,
  `item_quantity` double(10,2) DEFAULT NULL,
  `item_total` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `stored_id`, `product_id`, `item_price`, `item_quantity`, `item_total`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 25000.00, 100.00, 2500000.00, '2023-12-11 10:48:30', NULL),
(6, 3, 7, 25000.00, 10.00, 250000.00, '2023-12-12 04:39:00', '2023-12-12 04:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `users_id` int(10) DEFAULT NULL,
  `product_name` longtext DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `buying_price` decimal(10,2) DEFAULT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `brand` varchar(200) DEFAULT NULL,
  `specification` longtext DEFAULT NULL,
  `purchaseType` varchar(20) DEFAULT NULL,
  `assetType` varchar(20) DEFAULT NULL,
  `serial_number` longtext DEFAULT NULL,
  `barcodeNumber` varchar(100) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `unit` varchar(60) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `file_picture` varchar(256) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `users_id`, `product_name`, `category_id`, `sub_category_id`, `buying_price`, `selling_price`, `brand`, `specification`, `purchaseType`, `assetType`, `serial_number`, `barcodeNumber`, `description`, `unit`, `qty`, `file_picture`, `created_at`, `updated_at`, `status`) VALUES
(1, 4, 'Samsung', 1, 1, '100.00', '120.00', 'Samsung', '20 imch', 'Loam', 'Any one', '34343434', '43434343', 'Good Ptoducts', '', NULL, NULL, '2019-11-18 05:20:12', NULL, 'active'),
(2, 4, 'Tea100', 2, 2, '20.00', '30.00', 'Tea', 'Tea', 'Tea', 'Tea', 'Tea', 'Tea', 'Tea', '', NULL, NULL, '2019-11-18 06:09:44', NULL, 'active'),
(4, 1, 'Bawang Dayak', 4, 4, '15000.00', '25000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', 1, NULL, '2023-12-04 09:38:41', '2023-12-04 09:38:41', 'active'),
(5, 1, 'Daun Kelor', 4, 5, '15000.00', '25000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', 1, NULL, '2023-12-04 09:40:02', '2023-12-04 09:40:02', 'active'),
(6, 1, 'Ginseng', 4, 4, '25000.00', '35000.00', 'korean ginseng', NULL, NULL, NULL, NULL, NULL, NULL, '4', 1, NULL, '2023-12-04 09:41:04', '2023-12-04 09:41:04', 'active'),
(7, 1, 'Teh Daun Kelor', 4, 5, NULL, '25000.00', 'Manjur Muncul', 'Production', NULL, NULL, NULL, NULL, NULL, '2', 1, NULL, '2023-12-11 10:47:56', '2023-12-11 10:47:56', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) NOT NULL,
  `purchase_no` varchar(64) DEFAULT NULL,
  `supplier_id` int(10) DEFAULT NULL,
  `date_of_purchase` date DEFAULT NULL,
  `users_id` int(10) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `internal_notes` text DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchase_no`, `supplier_id`, `date_of_purchase`, `users_id`, `description`, `internal_notes`, `total_cost`, `amount_paid`, `created_at`, `updated_at`) VALUES
(1, '201911-01', 1, '2019-11-18', 4, 'Store this in room1', 'Store this in room1', '120.00', '120.00', '2023-12-07 10:45:36', '0000-00-00 00:00:00'),
(11, '1012-2023', 3, '2023-12-10', 1, 'desc', 'nt', '300000.00', '300000.00', '2023-12-09 20:40:13', '2023-12-09 20:40:13'),
(12, '1412-2023', 1, '2023-12-14', 1, 'des', 'in', '3000.00', '3000.00', '2023-12-14 00:28:50', '2023-12-14 00:28:50');

-- --------------------------------------------------------

--
-- Stand-in structure for view `recieve`
-- (See below for the actual view)
--
CREATE TABLE `recieve` (
`product_id` varchar(127)
,`quantity` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stock`
-- (See below for the actual view)
--
CREATE TABLE `stock` (
`product_id` varchar(127)
,`stock` double(19,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'TV', 'TV  Sub category', 'active', '2019-11-18 05:17:05', NULL),
(2, 2, 'Tea', 'Tea Sub category', 'active', '2019-11-18 05:17:56', NULL),
(4, 4, 'Herbal akar-akaran', NULL, 'active', '2023-11-28 08:19:21', '2023-12-04 09:35:29'),
(5, 4, 'Herbal Daun', 'Tanaman obat dari daun-daunan', 'active', '2023-12-04 09:36:30', '2023-12-04 09:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) NOT NULL,
  `company` varchar(256) DEFAULT NULL,
  `supplier_name` varchar(127) DEFAULT NULL,
  `email` varchar(127) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(127) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zip` varchar(64) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company`, `supplier_name`, `email`, `address`, `city`, `state`, `zip`, `phone_no`, `created_at`, `updated_at`) VALUES
(1, 'Janata Firm', 'Jatan Kumar', 'jatan@gmail.com', 'California', 'California', 'California', '66666', '01736878338', NULL, NULL),
(3, 'holybo corp.', 'cena john', 'cena@holybo.com', 'madagaskar', 'carlson', 'philiy', '2345', '0987898777', '2023-12-02 01:33:59', '2023-12-02 01:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit` varchar(255) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit`, `id`, `created_at`, `updated_at`) VALUES
('piece', 1, '2023-11-17 03:03:10', '2023-11-17 03:03:10'),
('dus', 2, '2023-11-17 03:03:10', '2023-11-17 03:03:10'),
('lusin', 3, '2023-11-17 03:03:10', '2023-11-17 03:03:10'),
('pack', 4, '2023-11-17 03:03:10', '2023-11-17 03:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `file_picture` varchar(255) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` enum('super','staff','client','visitor') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `title`, `first_name`, `last_name`, `file_picture`, `phone_no`, `dob`, `company`, `address`, `city`, `state`, `zip`, `country_id`, `remember_token`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(1, 'admin@inv.com', '$2y$10$cnc3BlSrHsokoWbYCqIF..4zZoeUv/mWmZA.CQlnjdmiPnrbz1liO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-17 03:03:08', '2023-11-17 03:03:08', 'super', 'active'),
(4, 'bobo@hai.com', '$2y$10$h3S5M1Lezl04euUlJ91NouQP4UVcQqunh2x3i2eRX4zHkencr6ME.', 'ms.', 'Bona', 'Garden', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-11-18 23:10:20', '2023-11-18 23:10:21', 'staff', 'active');

-- --------------------------------------------------------

--
-- Structure for view `incoming`
--
DROP TABLE IF EXISTS `incoming`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `incoming`  AS SELECT `item_purchases`.`product_id` AS `product_id`, `item_purchases`.`item_quantity` AS `item_quantity` FROM `item_purchases` union all select `productions`.`product_id` AS `product_id`,`productions`.`item_quantity` AS `item_quantity` from `productions`  ;

-- --------------------------------------------------------

--
-- Structure for view `outgoing`
--
DROP TABLE IF EXISTS `outgoing`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `outgoing`  AS SELECT `outt`.`product_id` AS `product_id`, ifnull(sum(`outt`.`quantity`),0) AS `quantity` FROM `outt` GROUP BY `outt`.`product_id``product_id`  ;

-- --------------------------------------------------------

--
-- Structure for view `outt`
--
DROP TABLE IF EXISTS `outt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `outt`  AS SELECT `item_invoices`.`product_id` AS `product_id`, `item_invoices`.`item_quantity` AS `quantity` FROM `item_invoices` union all select `item_materials`.`product_id` AS `product_id`,`item_materials`.`item_quantity` AS `quantity` from `item_materials`  ;

-- --------------------------------------------------------

--
-- Structure for view `recieve`
--
DROP TABLE IF EXISTS `recieve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recieve`  AS SELECT `incoming`.`product_id` AS `product_id`, ifnull(sum(`incoming`.`item_quantity`),0) AS `quantity` FROM `incoming` GROUP BY `incoming`.`product_id``product_id`  ;

-- --------------------------------------------------------

--
-- Structure for view `stock`
--
DROP TABLE IF EXISTS `stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stock`  AS SELECT `a`.`product_id` AS `product_id`, sum(`a`.`quantity`) - `b`.`quantity` AS `stock` FROM (`recieve` `a` join `outgoing` `b` on(`a`.`product_id` = `b`.`product_id`)) GROUP BY `a`.`product_id` union select `recieve`.`product_id` AS `product_id`,`recieve`.`quantity` AS `qty` from (`recieve` left join `outgoing` on(`recieve`.`product_id` = `outgoing`.`product_id`)) where `outgoing`.`product_id` is null  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countrys`
--
ALTER TABLE `countrys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_invoices`
--
ALTER TABLE `item_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_materials`
--
ALTER TABLE `item_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_purchases`
--
ALTER TABLE `item_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countrys`
--
ALTER TABLE `countrys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_invoices`
--
ALTER TABLE `item_invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_materials`
--
ALTER TABLE `item_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_purchases`
--
ALTER TABLE `item_purchases`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
