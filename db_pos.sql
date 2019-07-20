-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2019 pada 03.40
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Drink', 1, '2016-09-11 19:15:34', 0, '0000-00-00 00:00:00', 1),
(3, 'Alcohol', 1, '2016-09-11 19:15:52', 0, '0000-00-00 00:00:00', 1),
(4, 'Book', 1, '2016-09-11 19:30:02', 0, '0000-00-00 00:00:00', 1),
(5, 'Food', 1, '2016-09-11 19:31:08', 0, '0000-00-00 00:00:00', 1),
(6, 'Electric', 1, '2016-09-11 19:31:12', 0, '0000-00-00 00:00:00', 1),
(7, 'Clothes', 1, '2016-09-11 19:31:18', 0, '0000-00-00 00:00:00', 1),
(8, 'Bath', 1, '2016-09-11 19:31:27', 1, '2016-09-24 12:01:24', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `currency`
--

CREATE TABLE `currency` (
  `iso` char(3) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `currency`
--

INSERT INTO `currency` (`iso`, `name`) VALUES
('KRW', '(South) Korean Won'),
('AFA', 'Afghanistan Afghani'),
('ALL', 'Albanian Lek'),
('DZD', 'Algerian Dinar'),
('ADP', 'Andorran Peseta'),
('AOK', 'Angolan Kwanza'),
('ARS', 'Argentine Peso'),
('AMD', 'Armenian Dram'),
('AWG', 'Aruban Florin'),
('AUD', 'Australian Dollar'),
('BSD', 'Bahamian Dollar'),
('BHD', 'Bahraini Dinar'),
('BDT', 'Bangladeshi Taka'),
('BBD', 'Barbados Dollar'),
('BZD', 'Belize Dollar'),
('BMD', 'Bermudian Dollar'),
('BTN', 'Bhutan Ngultrum'),
('BOB', 'Bolivian Boliviano'),
('BWP', 'Botswanian Pula'),
('BRL', 'Brazilian Real'),
('GBP', 'British Pound'),
('BND', 'Brunei Dollar'),
('BGN', 'Bulgarian Lev'),
('BUK', 'Burma Kyat'),
('BIF', 'Burundi Franc'),
('CAD', 'Canadian Dollar'),
('CVE', 'Cape Verde Escudo'),
('KYD', 'Cayman Islands Dollar'),
('CLP', 'Chilean Peso'),
('CLF', 'Chilean Unidades de Fomento'),
('COP', 'Colombian Peso'),
('XOF', 'Communauté Financière Africaine BCEAO - Francs'),
('XAF', 'Communauté Financière Africaine BEAC, Francs'),
('KMF', 'Comoros Franc'),
('XPF', 'Comptoirs Français du Pacifique Francs'),
('CRC', 'Costa Rican Colon'),
('CUP', 'Cuban Peso'),
('CYP', 'Cyprus Pound'),
('CZK', 'Czech Republic Koruna'),
('DKK', 'Danish Krone'),
('YDD', 'Democratic Yemeni Dinar'),
('DOP', 'Dominican Peso'),
('XCD', 'East Caribbean Dollar'),
('TPE', 'East Timor Escudo'),
('ECS', 'Ecuador Sucre'),
('EGP', 'Egyptian Pound'),
('SVC', 'El Salvador Colon'),
('EEK', 'Estonian Kroon (EEK)'),
('ETB', 'Ethiopian Birr'),
('EUR', 'Euro'),
('FKP', 'Falkland Islands Pound'),
('FJD', 'Fiji Dollar'),
('GMD', 'Gambian Dalasi'),
('GHC', 'Ghanaian Cedi'),
('GIP', 'Gibraltar Pound'),
('XAU', 'Gold, Ounces'),
('GTQ', 'Guatemalan Quetzal'),
('GNF', 'Guinea Franc'),
('GWP', 'Guinea-Bissau Peso'),
('GYD', 'Guyanan Dollar'),
('HTG', 'Haitian Gourde'),
('HNL', 'Honduran Lempira'),
('HKD', 'Hong Kong Dollar'),
('HUF', 'Hungarian Forint'),
('INR', 'Indian Rupee'),
('IDR', 'Indonesian Rupiah'),
('XDR', 'International Monetary Fund (IMF) Special Drawing Rights'),
('IRR', 'Iranian Rial'),
('IQD', 'Iraqi Dinar'),
('IEP', 'Irish Punt'),
('ILS', 'Israeli Shekel'),
('JMD', 'Jamaican Dollar'),
('JPY', 'Japanese Yen'),
('JOD', 'Jordanian Dinar'),
('KHR', 'Kampuchean (Cambodian) Riel'),
('KES', 'Kenyan Schilling'),
('KWD', 'Kuwaiti Dinar'),
('LAK', 'Lao Kip'),
('LBP', 'Lebanese Pound'),
('LSL', 'Lesotho Loti'),
('LRD', 'Liberian Dollar'),
('LYD', 'Libyan Dinar'),
('MOP', 'Macau Pataca'),
('MGF', 'Malagasy Franc'),
('MWK', 'Malawi Kwacha'),
('MYR', 'Malaysian Ringgit'),
('MVR', 'Maldive Rufiyaa'),
('MTL', 'Maltese Lira'),
('MRO', 'Mauritanian Ouguiya'),
('MUR', 'Mauritius Rupee'),
('MXP', 'Mexican Peso'),
('MNT', 'Mongolian Tugrik'),
('MAD', 'Moroccan Dirham'),
('MZM', 'Mozambique Metical'),
('NAD', 'Namibian Dollar'),
('NPR', 'Nepalese Rupee'),
('ANG', 'Netherlands Antillian Guilder'),
('YUD', 'New Yugoslavia Dinar'),
('NZD', 'New Zealand Dollar'),
('NIO', 'Nicaraguan Cordoba'),
('NGN', 'Nigerian Naira'),
('KPW', 'North Korean Won'),
('NOK', 'Norwegian Kroner'),
('OMR', 'Omani Rial'),
('PKR', 'Pakistan Rupee'),
('XPD', 'Palladium Ounces'),
('PAB', 'Panamanian Balboa'),
('PGK', 'Papua New Guinea Kina'),
('PYG', 'Paraguay Guarani'),
('PEN', 'Peruvian Nuevo Sol'),
('PHP', 'Philippine Peso'),
('XPT', 'Platinum, Ounces'),
('PLN', 'Polish Zloty'),
('QAR', 'Qatari Rial'),
('RON', 'Romanian Leu'),
('RUB', 'Russian Ruble'),
('RWF', 'Rwanda Franc'),
('WST', 'Samoan Tala'),
('STD', 'Sao Tome and Principe Dobra'),
('SAR', 'Saudi Arabian Riyal'),
('SCR', 'Seychelles Rupee'),
('SLL', 'Sierra Leone Leone'),
('XAG', 'Silver, Ounces'),
('SGD', 'Singapore Dollar'),
('SKK', 'Slovak Koruna'),
('SBD', 'Solomon Islands Dollar'),
('SOS', 'Somali Schilling'),
('ZAR', 'South African Rand'),
('LKR', 'Sri Lanka Rupee'),
('SHP', 'St. Helena Pound'),
('SDP', 'Sudanese Pound'),
('SRG', 'Suriname Guilder'),
('SZL', 'Swaziland Lilangeni'),
('SEK', 'Swedish Krona'),
('CHF', 'Swiss Franc'),
('SYP', 'Syrian Potmd'),
('TWD', 'Taiwan Dollar'),
('TZS', 'Tanzanian Schilling'),
('THB', 'Thai Baht'),
('TOP', 'Tongan Paanga'),
('TTD', 'Trinidad and Tobago Dollar'),
('TND', 'Tunisian Dinar'),
('TRY', 'Turkish Lira'),
('UGX', 'Uganda Shilling'),
('AED', 'United Arab Emirates Dirham'),
('UYU', 'Uruguayan Peso'),
('USD', 'US Dollar'),
('VUV', 'Vanuatu Vatu'),
('VEF', 'Venezualan Bolivar'),
('VND', 'Vietnamese Dong'),
('YER', 'Yemeni Rial'),
('CNY', 'Yuan (Chinese) Renminbi'),
('ZRZ', 'Zaire Zaire'),
('ZMK', 'Zambian Kwacha'),
('ZWD', 'Zimbabwe Dollar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `mobile`, `created_user_id`, `created_datetime`) VALUES
(1, 'Walk In Customer', '', '', 1, '2016-10-18 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `expenses_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense_category` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `outlet_name` varchar(4999) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `amount` double(11,2) NOT NULL,
  `reason` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: Inactive, 1: Active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gift_card`
--

CREATE TABLE `gift_card` (
  `id` int(11) NOT NULL,
  `card_number` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `value` double(11,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(1) NOT NULL COMMENT '0: haven''t use, 1: used'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `good_received`
--

CREATE TABLE `good_received` (
  `no_good_received` char(20) NOT NULL,
  `no_po` varchar(499) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `no_reff` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_code` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `customer_mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordered_datetime` datetime NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `outlet_name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `outlet_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `outlet_contact` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `outlet_receipt_footer` longtext COLLATE utf8_unicode_ci NOT NULL,
  `gift_card` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `subtotal` double(11,2) NOT NULL,
  `discount_total` double(11,2) NOT NULL,
  `discount_percentage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax` double(11,2) NOT NULL,
  `grandtotal` double(11,2) NOT NULL,
  `total_items` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `payment_method_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cheque_number` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amt` double(11,2) NOT NULL,
  `return_change` double(11,2) NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `vt_status` int(11) NOT NULL COMMENT '0: Debit Payment, 1: Completed',
  `status` int(11) NOT NULL COMMENT '1: Sales, 2: Return',
  `refund_status` int(11) NOT NULL COMMENT '1: Full Refund, 2: Partial Refund',
  `remark` longtext COLLATE utf8_unicode_ci NOT NULL,
  `card_number` varchar(499) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_code` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `product_category` int(11) NOT NULL,
  `cost` double(11,2) NOT NULL,
  `price` double(11,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlets`
--

CREATE TABLE `outlets` (
  `id` int(11) NOT NULL,
  `name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `receipt_header` longtext COLLATE utf8_unicode_ci NOT NULL,
  `receipt_footer` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '1: Active, 0: Inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `outlets`
--

INSERT INTO `outlets` (`id`, `name`, `address`, `contact_number`, `receipt_header`, `receipt_footer`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Uniqlo - NEX Outlet', '#02-11, B2, Nex Shopping Mall, Serangoon Central', '88837492', '', '<p>Thank you for coming!</p>', 1, '2016-09-11 19:24:33', 0, '0000-00-00 00:00:00', 1),
(2, 'Uniqlo - Changi Outlet', '#02, B2, Changi Airport', '92828394', '', '<p>Thank you for coming!</p>', 1, '2016-09-11 19:25:13', 0, '0000-00-00 00:00:00', 1),
(3, 'Uniqlo - Bugis Outlet', '#02-10, B2, Bugis Shopping Mall', '292948484', '', '<p>Thank you for Shopping with Us!</p>', 1, '2016-09-11 19:25:52', 1, '2016-10-02 11:04:06', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Cash', 1, '2016-09-25 01:43:41', 0, '0000-00-00 00:00:00', 1),
(2, 'Nett', 1, '2016-09-25 01:43:45', 0, '0000-00-00 00:00:00', 1),
(3, 'VISA', 1, '2016-09-25 01:43:50', 0, '0000-00-00 00:00:00', 1),
(4, 'Master Card', 1, '2016-09-25 01:43:58', 0, '0000-00-00 00:00:00', 1),
(5, 'Cheque', 1, '2016-09-25 01:44:02', 0, '0000-00-00 00:00:00', 1),
(6, 'Debit', 1, '2016-09-25 01:44:05', 0, '0000-00-00 00:00:00', 1),
(7, 'Gift Card', 1, '2016-10-16 01:23:05', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `code` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `purchase_price` double(11,2) NOT NULL,
  `retail_price` double(11,2) NOT NULL,
  `thumbnail` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `category`, `purchase_price`, `retail_price`, `thumbnail`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'UD0001', 'Coke', 1, 2.10, 3.50, 'UD0001.jpg', 1, '2016-09-11 19:16:46', 1, '2016-11-19 12:34:27', 1),
(2, 'UD0002', 'Pepsi', 1, 1.20, 2.70, 'UD0002.png', 1, '2016-09-11 19:17:21', 0, '0000-00-00 00:00:00', 1),
(3, 'UD0003', '7UP', 1, 1.10, 3.50, 'UD0003.jpg', 1, '2016-09-11 19:17:43', 0, '0000-00-00 00:00:00', 1),
(4, 'UD0004', 'Fanta', 1, 1.00, 3.40, 'UD0004.jpeg', 1, '2016-09-11 19:18:08', 0, '0000-00-00 00:00:00', 1),
(5, 'UD0005', 'Sprite', 1, 1.50, 3.40, 'UD0005.jpg', 1, '2016-09-11 19:18:44', 0, '0000-00-00 00:00:00', 1),
(6, 'UC0001', 'Strawberry Cake', 2, 1.20, 4.50, 'UC0001.jpg', 1, '2016-09-11 19:34:13', 0, '0000-00-00 00:00:00', 1),
(7, 'UC0002', 'Chocolate Cake', 5, 2.00, 5.00, 'UC0002.jpg', 1, '2016-09-11 19:34:34', 1, '2016-10-02 01:06:21', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `po_number` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `discount_amount` double(11,2) NOT NULL,
  `discount_percentage` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `subTotal` double(11,2) NOT NULL,
  `tax` double(11,2) NOT NULL,
  `grandTotal` double(11,2) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_tax` double(11,2) NOT NULL,
  `supplier_name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_email` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `supplier_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `outlet_name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `outlet_address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `outlet_contact` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `po_date` date NOT NULL,
  `attachment_file` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `received_user_id` int(11) NOT NULL,
  `received_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order_items`
--

CREATE TABLE `purchase_order_items` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `product_code` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `ordered_qty` int(11) NOT NULL,
  `received_qty` int(11) NOT NULL,
  `cost` double(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order_status`
--

CREATE TABLE `purchase_order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `purchase_order_status`
--

INSERT INTO `purchase_order_status` (`id`, `name`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Created', 1, '2016-09-10 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 'Sent To Supplier', 1, '2016-09-10 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 'Received From Supplier', 1, '2016-09-10 00:00:00', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `return_items`
--

CREATE TABLE `return_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_code` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(11,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_condition` int(11) NOT NULL COMMENT '1: Good, 2: Not Good'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `sales_order_no` char(15) NOT NULL,
  `date` date NOT NULL,
  `note` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_order_items`
--

CREATE TABLE `sales_order_items` (
  `id` int(11) NOT NULL,
  `id_sales_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `purchase_price` double NOT NULL,
  `retail_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `site_name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `pagination` int(11) NOT NULL,
  `tax` double(11,2) NOT NULL,
  `currency` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `datetime_format` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `display_product` int(11) NOT NULL,
  `display_keyboard` int(11) NOT NULL,
  `default_customer_id` int(11) NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `site_setting`
--

INSERT INTO `site_setting` (`id`, `site_name`, `site_logo`, `timezone`, `pagination`, `tax`, `currency`, `datetime_format`, `display_product`, `display_keyboard`, `default_customer_id`, `updated_user_id`, `updated_datetime`) VALUES
(1, 'POS - Multi Outlets', 'logo.jpg', 'Asia/Singapore', 10, 7.00, 'SGD', 'm/d/Y', 3, 1, 1, 1, '2016-10-02 11:18:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(4999) COLLATE utf8_unicode_ci NOT NULL,
  `tax` double(11,2) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `tax`, `email`, `address`, `tel`, `fax`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Drink Co., Ltd', 2.00, 'drink@gmail.com', 'Macpherson Industrial Zone, Aljunied, Singapore', '82938484', '82938483', 1, '2016-09-11 19:29:24', 1, '2016-11-19 17:39:55', 1),
(3, 'KK Food Supplier', 0.00, '', 'saf sdaf\r\n', '92929292', '', 1, '2016-11-19 17:42:18', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suspend`
--

CREATE TABLE `suspend` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `fullname` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ref_number` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `subtotal` double(11,2) NOT NULL,
  `discount_total` double(11,2) NOT NULL,
  `tax` double(11,2) NOT NULL,
  `grandtotal` double(11,2) NOT NULL,
  `total_items` int(11) NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suspend_items`
--

CREATE TABLE `suspend_items` (
  `id` int(11) NOT NULL,
  `suspend_id` int(11) NOT NULL,
  `product_code` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_cost` double(11,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_price` varchar(499) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id_bank` char(7) NOT NULL,
  `id_supplier` char(7) NOT NULL,
  `nama_bank` varchar(40) NOT NULL,
  `no_rek` char(15) NOT NULL,
  `atas_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(100) NOT NULL,
  `kode_upc` varchar(15) NOT NULL,
  `kode_department` int(11) NOT NULL,
  `id_supplier` char(7) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `nama_barang_panjang` varchar(100) NOT NULL,
  `tgl_input_barang` varchar(30) NOT NULL,
  `harga_beli_barang` double NOT NULL,
  `harga_jual_barang` double NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `isi` text NOT NULL,
  `satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `kode_upc`, `kode_department`, `id_supplier`, `nama_barang`, `nama_barang_panjang`, `tgl_input_barang`, `harga_beli_barang`, `harga_jual_barang`, `stok_barang`, `isi`, `satuan`) VALUES
('310001', '310001', 31, '1', 'Kopi', 'Kopi Kapal Api', '', 600, 6000, 98, 'kopi', 'pcs'),
('310002', '310002', 31, '1', 'Marina', 'marina hey marina', '', 700, 7000, 89, 'body lotion', 'pcs'),
('4510545', '4510545', 45, '2122457', 'Spatula', 'Spatula Spongebob', '25-11-2017', 4000, 8000, 94, 'apa aja deh', 'pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cust`
--

CREATE TABLE `tb_cust` (
  `id_cust` char(7) NOT NULL,
  `nama_cust` varchar(100) NOT NULL,
  `alamat_cust` text NOT NULL,
  `jk_cust` enum('L','P') NOT NULL,
  `no_telp` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_department`
--

CREATE TABLE `tb_department` (
  `kode_department` int(11) NOT NULL,
  `nama_department` varchar(100) NOT NULL,
  `ket_department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_department`
--

INSERT INTO `tb_department` (`kode_department`, `nama_department`, `ket_department`) VALUES
(45, 'Kitchen', 'untuk dapur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_po`
--

CREATE TABLE `tb_detail_po` (
  `no_purchase_order` char(9) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `qty_order` int(11) NOT NULL,
  `qty_kirim` int(11) NOT NULL,
  `qty_terima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_det_penjualan`
--

CREATE TABLE `tb_det_penjualan` (
  `no_faktur` char(12) NOT NULL,
  `kode_barang` char(8) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_det_retur`
--

CREATE TABLE `tb_det_retur` (
  `no_retur` int(12) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `qty_retur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_det_retur`
--

INSERT INTO `tb_det_retur` (`no_retur`, `kode_barang`, `qty_retur`) VALUES
(1711302745, '4510545', 1),
(1711303333, '4510545', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoices`
--

CREATE TABLE `tb_invoices` (
  `no_invoices` char(14) NOT NULL,
  `no_purchase_order` char(9) NOT NULL,
  `total` double NOT NULL,
  `status_approve` enum('0','1') NOT NULL,
  `status_invoice` enum('lunas','belum lunas') NOT NULL,
  `tgl_input_invoice` varchar(20) NOT NULL,
  `tgl_exp_invoice` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `keterangan_level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`, `keterangan_level`) VALUES
(1, 'superadmin', 'Super Admin'),
(2, 'admin', 'Admin'),
(3, 'md', 'MD'),
(4, 'supplier', 'Supplier'),
(5, 'toko', 'Toko'),
(6, 'finance', 'Finance'),
(7, 'kasir', 'Kasir'),
(8, 'supervisor', 'Supervisor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `no_faktur` char(12) NOT NULL,
  `tgl_transaksi` varchar(30) NOT NULL,
  `id_user` char(8) NOT NULL,
  `id_cust` char(8) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id_profile` char(7) NOT NULL,
  `id_user` char(7) NOT NULL,
  `nama_profile` varchar(40) NOT NULL,
  `alamat_profile` text NOT NULL,
  `provinsi_profile` varchar(30) NOT NULL,
  `kota_profile` varchar(40) NOT NULL,
  `kode_pos_profile` char(10) NOT NULL,
  `no_telp_profile` varchar(15) NOT NULL,
  `fax_profile` varchar(30) NOT NULL,
  `email_profile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_profile`
--

INSERT INTO `tb_profile` (`id_profile`, `id_user`, `nama_profile`, `alamat_profile`, `provinsi_profile`, `kota_profile`, `kode_pos_profile`, `no_telp_profile`, `fax_profile`, `email_profile`) VALUES
('2122457', '2907760', 'PT. Unilever Abadi', 'Jakarta Selatan Ha', 'Jawa Barat', 'Jakarta', '43214', '43214', '43214', 'unilever@gmail.com'),
('2827959', '4943896', 'hape', 'hape', 'hape', 'hape', 'hape', 'hape', 'hape', 'hape'),
('3475893', '0172381', 'Admin', 'Jalan Barisan Banteng', 'Jawa Barat', 'Cianjur', '43214', '089691954472', '12345', 'rizkihardinas@gmail.com'),
('5226584', '5591745', 'Kuda', 'Lumping', 'Lumping', 'Kuda', '43214', '0983201', '-', '-'),
('6617871', '4879200', 'Rizki Store', 'Jalan Barba', 'Jawa Barat', 'Cianjur', '43214', '123455', '123455', 'rizkistore@gmail.com'),
('7662589', '4294654', 'Dina', 'Jalan Cinajur', 'Jawa Barat', 'Cianjur', '43214', '43214', '43214', 'dinda@gmail.com'),
('7915230', '8320384', 'Md', 'Md Md', 'Md', 'Md', 'Md', 'Md', 'Md', 'Md');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_purchase_order`
--

CREATE TABLE `tb_purchase_order` (
  `no_purchase_order` char(9) NOT NULL,
  `tgl_input` char(10) NOT NULL,
  `tgl_exp` char(10) NOT NULL,
  `id_toko` char(7) NOT NULL,
  `status_approval` enum('1','0','2') NOT NULL,
  `status_po` enum('order','kirim','terima','invoice') NOT NULL,
  `id_supplier` char(7) NOT NULL,
  `ppn` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_retur_jual`
--

CREATE TABLE `tb_retur_jual` (
  `no_retur` char(12) NOT NULL,
  `tgl_retur` varchar(30) NOT NULL,
  `id_user` char(7) NOT NULL,
  `no_faktur` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_retur_jual`
--

INSERT INTO `tb_retur_jual` (`no_retur`, `tgl_retur`, `id_user`, `no_faktur`) VALUES
('1711302745', '30-11-2017 10:11:44', '5226584', '1711307674'),
('1711303333', '30-11-2017 10:11:40', '5226584', '1711307674'),
('1712107890', '10-12-2017 02:12:43', '5226584', '1711307674'),
('1801101223', '10-01-2018 06:01:55', '2827959', '1711307674'),
('1801102496', '10-01-2018 06:01:11', '2827959', '1711307674');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_session`
--

CREATE TABLE `tb_session` (
  `id_user` char(7) NOT NULL,
  `last_login` varchar(20) NOT NULL,
  `status` enum('online','offline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_session`
--

INSERT INTO `tb_session` (`id_user`, `last_login`, `status`) VALUES
('5226584', '10-12-2017 14:22:27', 'offline'),
('3475893', '10-12-2017 14:22:34', 'online'),
('2827959', '04-04-2019 20:59:27', 'online'),
('6617871', '05-07-2018 21:18:05', 'online');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_keputusan`
--

CREATE TABLE `tb_surat_keputusan` (
  `id_surat_keputusan` char(7) NOT NULL,
  `kode_listing` varchar(100) NOT NULL,
  `no_surat_keputusan` varchar(40) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `npwp_ktp` varchar(100) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_temp`
--

CREATE TABLE `tb_temp` (
  `no_faktur` char(10) NOT NULL,
  `kode_barang` char(8) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_temp`
--

INSERT INTO `tb_temp` (`no_faktur`, `kode_barang`, `qty`) VALUES
('1801203694', '310001', 2),
('1801205613', '310001', 2),
('1801208590', '310001', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` char(7) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `id_level`, `nama_user`) VALUES
('0172381', 'rizkihardinas', 'rizkihardinas', 1, ''),
('2907760', 'unilever', 'unilever', 4, 'Huang Zan'),
('4294654', 'dina', 'dina', 3, ''),
('4879200', 'rizki', 'rizki', 5, 'Rizki hape'),
('4943896', 'hape', 'hape', 8, 'Hape'),
('5591745', 'kuda', 'kuda', 7, 'Kuda Lumping'),
('8320384', 'Md', 'Md', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `timezones`
--

CREATE TABLE `timezones` (
  `id` int(11) NOT NULL,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(499) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `timezones`
--

INSERT INTO `timezones` (`id`, `code`, `timezone`) VALUES
(1, 'AD', 'Europe/Andorra'),
(2, 'AE', 'Asia/Dubai'),
(3, 'AF', 'Asia/Kabul'),
(4, 'AG', 'America/Antigua'),
(5, 'AI', 'America/Anguilla'),
(6, 'AL', 'Europe/Tirane'),
(7, 'AM', 'Asia/Yerevan'),
(8, 'AO', 'Africa/Luanda'),
(9, 'AQ', 'Antarctica/McMurdo'),
(10, 'AQ', 'Antarctica/Casey'),
(11, 'AQ', 'Antarctica/Davis'),
(12, 'AQ', 'Antarctica/DumontDUrville'),
(13, 'AQ', 'Antarctica/Mawson'),
(14, 'AQ', 'Antarctica/Palmer'),
(15, 'AQ', 'Antarctica/Rothera'),
(16, 'AQ', 'Antarctica/Syowa'),
(17, 'AQ', 'Antarctica/Troll'),
(18, 'AQ', 'Antarctica/Vostok'),
(19, 'AR', 'America/Argentina/Buenos_Aires'),
(20, 'AR', 'America/Argentina/Cordoba'),
(21, 'AR', 'America/Argentina/Salta'),
(22, 'AR', 'America/Argentina/Jujuy'),
(23, 'AR', 'America/Argentina/Tucuman'),
(24, 'AR', 'America/Argentina/Catamarca'),
(25, 'AR', 'America/Argentina/La_Rioja'),
(26, 'AR', 'America/Argentina/San_Juan'),
(27, 'AR', 'America/Argentina/Mendoza'),
(28, 'AR', 'America/Argentina/San_Luis'),
(29, 'AR', 'America/Argentina/Rio_Gallegos'),
(30, 'AR', 'America/Argentina/Ushuaia'),
(31, 'AS', 'Pacific/Pago_Pago'),
(32, 'AT', 'Europe/Vienna'),
(33, 'AU', 'Australia/Lord_Howe'),
(34, 'AU', 'Antarctica/Macquarie'),
(35, 'AU', 'Australia/Hobart'),
(36, 'AU', 'Australia/Currie'),
(37, 'AU', 'Australia/Melbourne'),
(38, 'AU', 'Australia/Sydney'),
(39, 'AU', 'Australia/Broken_Hill'),
(40, 'AU', 'Australia/Brisbane'),
(41, 'AU', 'Australia/Lindeman'),
(42, 'AU', 'Australia/Adelaide'),
(43, 'AU', 'Australia/Darwin'),
(44, 'AU', 'Australia/Perth'),
(45, 'AU', 'Australia/Eucla'),
(46, 'AW', 'America/Aruba'),
(47, 'AX', 'Europe/Mariehamn'),
(48, 'AZ', 'Asia/Baku'),
(49, 'BA', 'Europe/Sarajevo'),
(50, 'BB', 'America/Barbados'),
(51, 'BD', 'Asia/Dhaka'),
(52, 'BE', 'Europe/Brussels'),
(53, 'BF', 'Africa/Ouagadougou'),
(54, 'BG', 'Europe/Sofia'),
(55, 'BH', 'Asia/Bahrain'),
(56, 'BI', 'Africa/Bujumbura'),
(57, 'BJ', 'Africa/Porto-Novo'),
(58, 'BL', 'America/St_Barthelemy'),
(59, 'BM', 'Atlantic/Bermuda'),
(60, 'BN', 'Asia/Brunei'),
(61, 'BO', 'America/La_Paz'),
(62, 'BQ', 'America/Kralendijk'),
(63, 'BR', 'America/Noronha'),
(64, 'BR', 'America/Belem'),
(65, 'BR', 'America/Fortaleza'),
(66, 'BR', 'America/Recife'),
(67, 'BR', 'America/Araguaina'),
(68, 'BR', 'America/Maceio'),
(69, 'BR', 'America/Bahia'),
(70, 'BR', 'America/Sao_Paulo'),
(71, 'BR', 'America/Campo_Grande'),
(72, 'BR', 'America/Cuiaba'),
(73, 'BR', 'America/Santarem'),
(74, 'BR', 'America/Porto_Velho'),
(75, 'BR', 'America/Boa_Vista'),
(76, 'BR', 'America/Manaus'),
(77, 'BR', 'America/Eirunepe'),
(78, 'BR', 'America/Rio_Branco'),
(79, 'BS', 'America/Nassau'),
(80, 'BT', 'Asia/Thimphu'),
(81, 'BW', 'Africa/Gaborone'),
(82, 'BY', 'Europe/Minsk'),
(83, 'BZ', 'America/Belize'),
(84, 'CA', 'America/St_Johns'),
(85, 'CA', 'America/Halifax'),
(86, 'CA', 'America/Glace_Bay'),
(87, 'CA', 'America/Moncton'),
(88, 'CA', 'America/Goose_Bay'),
(89, 'CA', 'America/Blanc-Sablon'),
(90, 'CA', 'America/Toronto'),
(91, 'CA', 'America/Nipigon'),
(92, 'CA', 'America/Thunder_Bay'),
(93, 'CA', 'America/Iqaluit'),
(94, 'CA', 'America/Pangnirtung'),
(95, 'CA', 'America/Atikokan'),
(96, 'CA', 'America/Winnipeg'),
(97, 'CA', 'America/Rainy_River'),
(98, 'CA', 'America/Resolute'),
(99, 'CA', 'America/Rankin_Inlet'),
(100, 'CA', 'America/Regina'),
(101, 'CA', 'America/Swift_Current'),
(102, 'CA', 'America/Edmonton'),
(103, 'CA', 'America/Cambridge_Bay'),
(104, 'CA', 'America/Yellowknife'),
(105, 'CA', 'America/Inuvik'),
(106, 'CA', 'America/Creston'),
(107, 'CA', 'America/Dawson_Creek'),
(108, 'CA', 'America/Fort_Nelson'),
(109, 'CA', 'America/Vancouver'),
(110, 'CA', 'America/Whitehorse'),
(111, 'CA', 'America/Dawson'),
(112, 'CC', 'Indian/Cocos'),
(113, 'CD', 'Africa/Kinshasa'),
(114, 'CD', 'Africa/Lubumbashi'),
(115, 'CF', 'Africa/Bangui'),
(116, 'CG', 'Africa/Brazzaville'),
(117, 'CH', 'Europe/Zurich'),
(118, 'CI', 'Africa/Abidjan'),
(119, 'CK', 'Pacific/Rarotonga'),
(120, 'CL', 'America/Santiago'),
(121, 'CL', 'Pacific/Easter'),
(122, 'CM', 'Africa/Douala'),
(123, 'CN', 'Asia/Shanghai'),
(124, 'CN', 'Asia/Urumqi'),
(125, 'CO', 'America/Bogota'),
(126, 'CR', 'America/Costa_Rica'),
(127, 'CU', 'America/Havana'),
(128, 'CV', 'Atlantic/Cape_Verde'),
(129, 'CW', 'America/Curacao'),
(130, 'CX', 'Indian/Christmas'),
(131, 'CY', 'Asia/Nicosia'),
(132, 'CZ', 'Europe/Prague'),
(133, 'DE', 'Europe/Berlin'),
(134, 'DE', 'Europe/Busingen'),
(135, 'DJ', 'Africa/Djibouti'),
(136, 'DK', 'Europe/Copenhagen'),
(137, 'DM', 'America/Dominica'),
(138, 'DO', 'America/Santo_Domingo'),
(139, 'DZ', 'Africa/Algiers'),
(140, 'EC', 'America/Guayaquil'),
(141, 'EC', 'Pacific/Galapagos'),
(142, 'EE', 'Europe/Tallinn'),
(143, 'EG', 'Africa/Cairo'),
(144, 'EH', 'Africa/El_Aaiun'),
(145, 'ER', 'Africa/Asmara'),
(146, 'ES', 'Europe/Madrid'),
(147, 'ES', 'Africa/Ceuta'),
(148, 'ES', 'Atlantic/Canary'),
(149, 'ET', 'Africa/Addis_Ababa'),
(150, 'FI', 'Europe/Helsinki'),
(151, 'FJ', 'Pacific/Fiji'),
(152, 'FK', 'Atlantic/Stanley'),
(153, 'FM', 'Pacific/Chuuk'),
(154, 'FM', 'Pacific/Pohnpei'),
(155, 'FM', 'Pacific/Kosrae'),
(156, 'FO', 'Atlantic/Faroe'),
(157, 'FR', 'Europe/Paris'),
(158, 'GA', 'Africa/Libreville'),
(159, 'GB', 'Europe/London'),
(160, 'GD', 'America/Grenada'),
(161, 'GE', 'Asia/Tbilisi'),
(162, 'GF', 'America/Cayenne'),
(163, 'GG', 'Europe/Guernsey'),
(164, 'GH', 'Africa/Accra'),
(165, 'GI', 'Europe/Gibraltar'),
(166, 'GL', 'America/Godthab'),
(167, 'GL', 'America/Danmarkshavn'),
(168, 'GL', 'America/Scoresbysund'),
(169, 'GL', 'America/Thule'),
(170, 'GM', 'Africa/Banjul'),
(171, 'GN', 'Africa/Conakry'),
(172, 'GP', 'America/Guadeloupe'),
(173, 'GQ', 'Africa/Malabo'),
(174, 'GR', 'Europe/Athens'),
(175, 'GS', 'Atlantic/South_Georgia'),
(176, 'GT', 'America/Guatemala'),
(177, 'GU', 'Pacific/Guam'),
(178, 'GW', 'Africa/Bissau'),
(179, 'GY', 'America/Guyana'),
(180, 'HK', 'Asia/Hong_Kong'),
(181, 'HN', 'America/Tegucigalpa'),
(182, 'HR', 'Europe/Zagreb'),
(183, 'HT', 'America/Port-au-Prince'),
(184, 'HU', 'Europe/Budapest'),
(185, 'ID', 'Asia/Jakarta'),
(186, 'ID', 'Asia/Pontianak'),
(187, 'ID', 'Asia/Makassar'),
(188, 'ID', 'Asia/Jayapura'),
(189, 'IE', 'Europe/Dublin'),
(190, 'IL', 'Asia/Jerusalem'),
(191, 'IM', 'Europe/Isle_of_Man'),
(192, 'IN', 'Asia/Kolkata'),
(193, 'IO', 'Indian/Chagos'),
(194, 'IQ', 'Asia/Baghdad'),
(195, 'IR', 'Asia/Tehran'),
(196, 'IS', 'Atlantic/Reykjavik'),
(197, 'IT', 'Europe/Rome'),
(198, 'JE', 'Europe/Jersey'),
(199, 'JM', 'America/Jamaica'),
(200, 'JO', 'Asia/Amman'),
(201, 'JP', 'Asia/Tokyo'),
(202, 'KE', 'Africa/Nairobi'),
(203, 'KG', 'Asia/Bishkek'),
(204, 'KH', 'Asia/Phnom_Penh'),
(205, 'KI', 'Pacific/Tarawa'),
(206, 'KI', 'Pacific/Enderbury'),
(207, 'KI', 'Pacific/Kiritimati'),
(208, 'KM', 'Indian/Comoro'),
(209, 'KN', 'America/St_Kitts'),
(210, 'KP', 'Asia/Pyongyang'),
(211, 'KR', 'Asia/Seoul'),
(212, 'KW', 'Asia/Kuwait'),
(213, 'KY', 'America/Cayman'),
(214, 'KZ', 'Asia/Almaty'),
(215, 'KZ', 'Asia/Qyzylorda'),
(216, 'KZ', 'Asia/Aqtobe'),
(217, 'KZ', 'Asia/Aqtau'),
(218, 'KZ', 'Asia/Oral'),
(219, 'LA', 'Asia/Vientiane'),
(220, 'LB', 'Asia/Beirut'),
(221, 'LC', 'America/St_Lucia'),
(222, 'LI', 'Europe/Vaduz'),
(223, 'LK', 'Asia/Colombo'),
(224, 'LR', 'Africa/Monrovia'),
(225, 'LS', 'Africa/Maseru'),
(226, 'LT', 'Europe/Vilnius'),
(227, 'LU', 'Europe/Luxembourg'),
(228, 'LV', 'Europe/Riga'),
(229, 'LY', 'Africa/Tripoli'),
(230, 'MA', 'Africa/Casablanca'),
(231, 'MC', 'Europe/Monaco'),
(232, 'MD', 'Europe/Chisinau'),
(233, 'ME', 'Europe/Podgorica'),
(234, 'MF', 'America/Marigot'),
(235, 'MG', 'Indian/Antananarivo'),
(236, 'MH', 'Pacific/Majuro'),
(237, 'MH', 'Pacific/Kwajalein'),
(238, 'MK', 'Europe/Skopje'),
(239, 'ML', 'Africa/Bamako'),
(240, 'MM', 'Asia/Rangoon'),
(241, 'MN', 'Asia/Ulaanbaatar'),
(242, 'MN', 'Asia/Hovd'),
(243, 'MN', 'Asia/Choibalsan'),
(244, 'MO', 'Asia/Macau'),
(245, 'MP', 'Pacific/Saipan'),
(246, 'MQ', 'America/Martinique'),
(247, 'MR', 'Africa/Nouakchott'),
(248, 'MS', 'America/Montserrat'),
(249, 'MT', 'Europe/Malta'),
(250, 'MU', 'Indian/Mauritius'),
(251, 'MV', 'Indian/Maldives'),
(252, 'MW', 'Africa/Blantyre'),
(253, 'MX', 'America/Mexico_City'),
(254, 'MX', 'America/Cancun'),
(255, 'MX', 'America/Merida'),
(256, 'MX', 'America/Monterrey'),
(257, 'MX', 'America/Matamoros'),
(258, 'MX', 'America/Mazatlan'),
(259, 'MX', 'America/Chihuahua'),
(260, 'MX', 'America/Ojinaga'),
(261, 'MX', 'America/Hermosillo'),
(262, 'MX', 'America/Tijuana'),
(263, 'MX', 'America/Bahia_Banderas'),
(264, 'MY', 'Asia/Kuala_Lumpur'),
(265, 'MY', 'Asia/Kuching'),
(266, 'MZ', 'Africa/Maputo'),
(267, 'NA', 'Africa/Windhoek'),
(268, 'NC', 'Pacific/Noumea'),
(269, 'NE', 'Africa/Niamey'),
(270, 'NF', 'Pacific/Norfolk'),
(271, 'NG', 'Africa/Lagos'),
(272, 'NI', 'America/Managua'),
(273, 'NL', 'Europe/Amsterdam'),
(274, 'NO', 'Europe/Oslo'),
(275, 'NP', 'Asia/Kathmandu'),
(276, 'NR', 'Pacific/Nauru'),
(277, 'NU', 'Pacific/Niue'),
(278, 'NZ', 'Pacific/Auckland'),
(279, 'NZ', 'Pacific/Chatham'),
(280, 'OM', 'Asia/Muscat'),
(281, 'PA', 'America/Panama'),
(282, 'PE', 'America/Lima'),
(283, 'PF', 'Pacific/Tahiti'),
(284, 'PF', 'Pacific/Marquesas'),
(285, 'PF', 'Pacific/Gambier'),
(286, 'PG', 'Pacific/Port_Moresby'),
(287, 'PG', 'Pacific/Bougainville'),
(288, 'PH', 'Asia/Manila'),
(289, 'PK', 'Asia/Karachi'),
(290, 'PL', 'Europe/Warsaw'),
(291, 'PM', 'America/Miquelon'),
(292, 'PN', 'Pacific/Pitcairn'),
(293, 'PR', 'America/Puerto_Rico'),
(294, 'PS', 'Asia/Gaza'),
(295, 'PS', 'Asia/Hebron'),
(296, 'PT', 'Europe/Lisbon'),
(297, 'PT', 'Atlantic/Madeira'),
(298, 'PT', 'Atlantic/Azores'),
(299, 'PW', 'Pacific/Palau'),
(300, 'PY', 'America/Asuncion'),
(301, 'QA', 'Asia/Qatar'),
(302, 'RE', 'Indian/Reunion'),
(303, 'RO', 'Europe/Bucharest'),
(304, 'RS', 'Europe/Belgrade'),
(305, 'RU', 'Europe/Kaliningrad'),
(306, 'RU', 'Europe/Moscow'),
(307, 'RU', 'Europe/Simferopol'),
(308, 'RU', 'Europe/Volgograd'),
(309, 'RU', 'Europe/Kirov'),
(310, 'RU', 'Europe/Astrakhan'),
(311, 'RU', 'Europe/Samara'),
(312, 'RU', 'Europe/Ulyanovsk'),
(313, 'RU', 'Asia/Yekaterinburg'),
(314, 'RU', 'Asia/Omsk'),
(315, 'RU', 'Asia/Novosibirsk'),
(316, 'RU', 'Asia/Barnaul'),
(317, 'RU', 'Asia/Tomsk'),
(318, 'RU', 'Asia/Novokuznetsk'),
(319, 'RU', 'Asia/Krasnoyarsk'),
(320, 'RU', 'Asia/Irkutsk'),
(321, 'RU', 'Asia/Chita'),
(322, 'RU', 'Asia/Yakutsk'),
(323, 'RU', 'Asia/Khandyga'),
(324, 'RU', 'Asia/Vladivostok'),
(325, 'RU', 'Asia/Ust-Nera'),
(326, 'RU', 'Asia/Magadan'),
(327, 'RU', 'Asia/Sakhalin'),
(328, 'RU', 'Asia/Srednekolymsk'),
(329, 'RU', 'Asia/Kamchatka'),
(330, 'RU', 'Asia/Anadyr'),
(331, 'RW', 'Africa/Kigali'),
(332, 'SA', 'Asia/Riyadh'),
(333, 'SB', 'Pacific/Guadalcanal'),
(334, 'SC', 'Indian/Mahe'),
(335, 'SD', 'Africa/Khartoum'),
(336, 'SE', 'Europe/Stockholm'),
(337, 'SG', 'Asia/Singapore'),
(338, 'SH', 'Atlantic/St_Helena'),
(339, 'SI', 'Europe/Ljubljana'),
(340, 'SJ', 'Arctic/Longyearbyen'),
(341, 'SK', 'Europe/Bratislava'),
(342, 'SL', 'Africa/Freetown'),
(343, 'SM', 'Europe/San_Marino'),
(344, 'SN', 'Africa/Dakar'),
(345, 'SO', 'Africa/Mogadishu'),
(346, 'SR', 'America/Paramaribo'),
(347, 'SS', 'Africa/Juba'),
(348, 'ST', 'Africa/Sao_Tome'),
(349, 'SV', 'America/El_Salvador'),
(350, 'SX', 'America/Lower_Princes'),
(351, 'SY', 'Asia/Damascus'),
(352, 'SZ', 'Africa/Mbabane'),
(353, 'TC', 'America/Grand_Turk'),
(354, 'TD', 'Africa/Ndjamena'),
(355, 'TF', 'Indian/Kerguelen'),
(356, 'TG', 'Africa/Lome'),
(357, 'TH', 'Asia/Bangkok'),
(358, 'TJ', 'Asia/Dushanbe'),
(359, 'TK', 'Pacific/Fakaofo'),
(360, 'TL', 'Asia/Dili'),
(361, 'TM', 'Asia/Ashgabat'),
(362, 'TN', 'Africa/Tunis'),
(363, 'TO', 'Pacific/Tongatapu'),
(364, 'TR', 'Europe/Istanbul'),
(365, 'TT', 'America/Port_of_Spain'),
(366, 'TV', 'Pacific/Funafuti'),
(367, 'TW', 'Asia/Taipei'),
(368, 'TZ', 'Africa/Dar_es_Salaam'),
(369, 'UA', 'Europe/Kiev'),
(370, 'UA', 'Europe/Uzhgorod'),
(371, 'UA', 'Europe/Zaporozhye'),
(372, 'UG', 'Africa/Kampala'),
(373, 'UM', 'Pacific/Johnston'),
(374, 'UM', 'Pacific/Midway'),
(375, 'UM', 'Pacific/Wake'),
(376, 'US', 'America/New_York'),
(377, 'US', 'America/Detroit'),
(378, 'US', 'America/Kentucky/Louisville'),
(379, 'US', 'America/Kentucky/Monticello'),
(380, 'US', 'America/Indiana/Indianapolis'),
(381, 'US', 'America/Indiana/Vincennes'),
(382, 'US', 'America/Indiana/Winamac'),
(383, 'US', 'America/Indiana/Marengo'),
(384, 'US', 'America/Indiana/Petersburg'),
(385, 'US', 'America/Indiana/Vevay'),
(386, 'US', 'America/Chicago'),
(387, 'US', 'America/Indiana/Tell_City'),
(388, 'US', 'America/Indiana/Knox'),
(389, 'US', 'America/Menominee'),
(390, 'US', 'America/North_Dakota/Center'),
(391, 'US', 'America/North_Dakota/New_Salem'),
(392, 'US', 'America/North_Dakota/Beulah'),
(393, 'US', 'America/Denver'),
(394, 'US', 'America/Boise'),
(395, 'US', 'America/Phoenix'),
(396, 'US', 'America/Los_Angeles'),
(397, 'US', 'America/Anchorage'),
(398, 'US', 'America/Juneau'),
(399, 'US', 'America/Sitka'),
(400, 'US', 'America/Metlakatla'),
(401, 'US', 'America/Yakutat'),
(402, 'US', 'America/Nome'),
(403, 'US', 'America/Adak'),
(404, 'US', 'Pacific/Honolulu'),
(405, 'UY', 'America/Montevideo'),
(406, 'UZ', 'Asia/Samarkand'),
(407, 'UZ', 'Asia/Tashkent'),
(408, 'VA', 'Europe/Vatican'),
(409, 'VC', 'America/St_Vincent'),
(410, 'VE', 'America/Caracas'),
(411, 'VG', 'America/Tortola'),
(412, 'VI', 'America/St_Thomas'),
(413, 'VN', 'Asia/Ho_Chi_Minh'),
(414, 'VU', 'Pacific/Efate'),
(415, 'WF', 'Pacific/Wallis'),
(416, 'WS', 'Pacific/Apia'),
(417, 'YE', 'Asia/Aden'),
(418, 'YT', 'Indian/Mayotte'),
(419, 'ZA', 'Africa/Johannesburg'),
(420, 'ZM', 'Africa/Lusaka'),
(421, 'ZW', 'Africa/Harare');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role_id`, `outlet_id`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Owner', 'owner@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, 1, '2016-08-27 00:00:00', 1, '2016-09-03 18:15:48', 1),
(2, 'Bugis Manager', 'bugismanager@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 3, 1, '2016-08-27 12:30:07', 1, '2016-09-05 21:08:25', 1),
(3, 'Bugis Sales Staff', 'bugissales@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 3, 2, '2016-08-27 12:32:17', 1, '2016-09-05 21:08:43', 1),
(4, 'Changi Manager', 'changimanager@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 2, 1, '2016-08-27 12:35:03', 1, '2016-09-05 21:09:18', 1),
(5, 'Changi Sales', 'changisales@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 2, 1, '2016-08-27 12:35:32', 1, '2016-09-05 21:08:32', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`) VALUES
(1, 'Administrator', 1, '2016-08-16 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'Manager', 1, '2016-08-16 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'Sales Person', 1, '2016-08-16 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_det_penjualan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_det_penjualan` (
`no_faktur` char(12)
,`tgl_transaksi` varchar(30)
,`id_user` char(8)
,`id_cust` char(8)
,`total` double
,`qty` int(11)
,`kode_barang` varchar(100)
,`kode_upc` varchar(15)
,`kode_department` int(11)
,`id_supplier` char(7)
,`nama_barang` varchar(25)
,`nama_barang_panjang` varchar(100)
,`tgl_input_barang` varchar(30)
,`harga_beli_barang` double
,`harga_jual_barang` double
,`stok_barang` int(11)
,`isi` text
,`satuan` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_invoices`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_invoices` (
`nama_supplier` varchar(40)
,`alamat_supplier` text
,`id_supplier` char(7)
,`provinsi_supplier` varchar(30)
,`kota_supplier` varchar(40)
,`kode_pos_supplier` char(10)
,`no_telp_supplier` varchar(15)
,`profile_supplier` varchar(30)
,`email_supplier` varchar(50)
,`nama_toko` varchar(40)
,`alamat_toko` text
,`id_toko` char(7)
,`provinsi_toko` varchar(30)
,`kota_toko` varchar(40)
,`kode_pos_toko` char(10)
,`no_telp_toko` varchar(15)
,`profile_toko` varchar(30)
,`email_toko` varchar(50)
,`fax_toko` varchar(30)
,`no_invoices` char(14)
,`total` double
,`status_invoice` enum('lunas','belum lunas')
,`tgl_input_invoice` varchar(20)
,`tgl_exp_invoice` varchar(20)
,`no_purchase_order` char(9)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_profile`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_profile` (
`id_profile` char(7)
,`id_user` char(7)
,`nama_profile` varchar(40)
,`alamat_profile` text
,`provinsi_profile` varchar(30)
,`kota_profile` varchar(40)
,`kode_pos_profile` char(10)
,`no_telp_profile` varchar(15)
,`fax_profile` varchar(30)
,`email_profile` varchar(50)
,`username` varchar(50)
,`password` varchar(50)
,`nama_user` varchar(100)
,`level` varchar(100)
,`keterangan_level` text
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_det_penjualan`
--
DROP TABLE IF EXISTS `v_det_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_det_penjualan`  AS  select `tb_penjualan`.`no_faktur` AS `no_faktur`,`tb_penjualan`.`tgl_transaksi` AS `tgl_transaksi`,`tb_penjualan`.`id_user` AS `id_user`,`tb_penjualan`.`id_cust` AS `id_cust`,`tb_penjualan`.`total` AS `total`,`tb_det_penjualan`.`qty` AS `qty`,`tb_barang`.`kode_barang` AS `kode_barang`,`tb_barang`.`kode_upc` AS `kode_upc`,`tb_barang`.`kode_department` AS `kode_department`,`tb_barang`.`id_supplier` AS `id_supplier`,`tb_barang`.`nama_barang` AS `nama_barang`,`tb_barang`.`nama_barang_panjang` AS `nama_barang_panjang`,`tb_barang`.`tgl_input_barang` AS `tgl_input_barang`,`tb_barang`.`harga_beli_barang` AS `harga_beli_barang`,`tb_barang`.`harga_jual_barang` AS `harga_jual_barang`,`tb_barang`.`stok_barang` AS `stok_barang`,`tb_barang`.`isi` AS `isi`,`tb_barang`.`satuan` AS `satuan` from ((`tb_penjualan` join `tb_det_penjualan` on((`tb_penjualan`.`no_faktur` = `tb_det_penjualan`.`no_faktur`))) join `tb_barang` on((`tb_det_penjualan`.`kode_barang` = `tb_barang`.`kode_barang`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_invoices`
--
DROP TABLE IF EXISTS `v_invoices`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_invoices`  AS  select `s`.`nama_profile` AS `nama_supplier`,`s`.`alamat_profile` AS `alamat_supplier`,`s`.`id_profile` AS `id_supplier`,`s`.`provinsi_profile` AS `provinsi_supplier`,`s`.`kota_profile` AS `kota_supplier`,`s`.`kode_pos_profile` AS `kode_pos_supplier`,`s`.`no_telp_profile` AS `no_telp_supplier`,`s`.`fax_profile` AS `profile_supplier`,`s`.`email_profile` AS `email_supplier`,`t`.`nama_profile` AS `nama_toko`,`t`.`alamat_profile` AS `alamat_toko`,`t`.`id_profile` AS `id_toko`,`t`.`provinsi_profile` AS `provinsi_toko`,`t`.`kota_profile` AS `kota_toko`,`t`.`kode_pos_profile` AS `kode_pos_toko`,`t`.`no_telp_profile` AS `no_telp_toko`,`t`.`fax_profile` AS `profile_toko`,`t`.`email_profile` AS `email_toko`,`t`.`fax_profile` AS `fax_toko`,`i`.`no_invoices` AS `no_invoices`,`i`.`total` AS `total`,`i`.`status_invoice` AS `status_invoice`,`i`.`tgl_input_invoice` AS `tgl_input_invoice`,`i`.`tgl_exp_invoice` AS `tgl_exp_invoice`,`p`.`no_purchase_order` AS `no_purchase_order` from (((`tb_invoices` `i` join `tb_purchase_order` `p` on((`i`.`no_purchase_order` = `p`.`no_purchase_order`))) join `tb_profile` `s` on((`p`.`id_supplier` = `s`.`id_profile`))) join `tb_profile` `t` on((`p`.`id_toko` = `t`.`id_profile`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_profile`
--
DROP TABLE IF EXISTS `v_profile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_profile`  AS  select `tb_profile`.`id_profile` AS `id_profile`,`tb_profile`.`id_user` AS `id_user`,`tb_profile`.`nama_profile` AS `nama_profile`,`tb_profile`.`alamat_profile` AS `alamat_profile`,`tb_profile`.`provinsi_profile` AS `provinsi_profile`,`tb_profile`.`kota_profile` AS `kota_profile`,`tb_profile`.`kode_pos_profile` AS `kode_pos_profile`,`tb_profile`.`no_telp_profile` AS `no_telp_profile`,`tb_profile`.`fax_profile` AS `fax_profile`,`tb_profile`.`email_profile` AS `email_profile`,`tb_user`.`username` AS `username`,`tb_user`.`password` AS `password`,`tb_user`.`nama_user` AS `nama_user`,`tb_level`.`level` AS `level`,`tb_level`.`keterangan_level` AS `keterangan_level` from ((`tb_level` join `tb_user` on((`tb_level`.`id_level` = `tb_user`.`id_level`))) join `tb_profile` on((`tb_user`.`id_user` = `tb_profile`.`id_user`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`iso`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gift_card`
--
ALTER TABLE `gift_card`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `good_received`
--
ALTER TABLE `good_received`
  ADD PRIMARY KEY (`no_good_received`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `no_po` (`no_po`),
  ADD KEY `outlet_id` (`outlet_id`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `purchase_order_status`
--
ALTER TABLE `purchase_order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `return_items`
--
ALTER TABLE `return_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sales_order_items`
--
ALTER TABLE `sales_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sales_order` (`id_sales_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indeks untuk tabel `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suspend`
--
ALTER TABLE `suspend`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suspend_items`
--
ALTER TABLE `suspend_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id_bank`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`kode_department`);

--
-- Indeks untuk tabel `tb_det_retur`
--
ALTER TABLE `tb_det_retur`
  ADD PRIMARY KEY (`no_retur`,`kode_barang`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indeks untuk tabel `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_purchase_order`
--
ALTER TABLE `tb_purchase_order`
  ADD PRIMARY KEY (`no_purchase_order`);

--
-- Indeks untuk tabel `tb_retur_jual`
--
ALTER TABLE `tb_retur_jual`
  ADD PRIMARY KEY (`no_retur`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indeks untuk tabel `tb_session`
--
ALTER TABLE `tb_session`
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_surat_keputusan`
--
ALTER TABLE `tb_surat_keputusan`
  ADD PRIMARY KEY (`id_surat_keputusan`),
  ADD KEY `kode_listing` (`kode_listing`);

--
-- Indeks untuk tabel `tb_temp`
--
ALTER TABLE `tb_temp`
  ADD PRIMARY KEY (`no_faktur`,`kode_barang`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gift_card`
--
ALTER TABLE `gift_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `purchase_order_status`
--
ALTER TABLE `purchase_order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `return_items`
--
ALTER TABLE `return_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `suspend`
--
ALTER TABLE `suspend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suspend_items`
--
ALTER TABLE `suspend_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `timezones`
--
ALTER TABLE `timezones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
