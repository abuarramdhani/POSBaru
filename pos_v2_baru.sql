-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2019 at 12:05 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `name` varchar(100) NOT NULL,
  `code` char(3) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`name`, `code`, `status`) VALUES
('AMERICAN EXPRESS BANK LTD', '030', '0'),
('ANGLOMAS INTERNASIONAL BANK', '531', '0'),
('ANZ PANIN BANK', '061', '1'),
('BANK ABN AMRO', '052', '0'),
('BANK AGRO NIAGA', '494', '0'),
('BANK AKITA', '525', '0'),
('BANK ALFINDO', '503', '0'),
('BANK ANTARDAERAH', '088', '0'),
('BANK ARTA NIAGA KENCANA', '020', '0'),
('BANK ARTHA GRAHA', '037', '0'),
('BANK ARTOS IND', '542', '0'),
('BANK BCA', '014', '1'),
('BANK BENGKULU', '133', '0'),
('BANK BII', '016', '1'),
('BANK BINTANG MANUNGGAL', '484', '0'),
('BANK BISNIS INTERNASIONAL', '459', '0'),
('BANK BNI', '009', '1'),
('BANK BNP PARIBAS INDONESIA', '057', '0'),
('BANK BRI', '002', '1'),
('BANK BUANA IND', '023', '0'),
('BANK BUKOPIN', '441', '1'),
('BANK BUMI ARTA', '076', '0'),
('BANK BUMIPUTERA', '485', '0'),
('BANK CAPITAL INDONESIA, TBK.', '054', '0'),
('BANK CENTURY, TBK.', '095', '0'),
('BANK CHINA TRUST INDONESIA', '949', '0'),
('BANK COMMONWEALTH', '950', '0'),
('BANK CREDIT AGRICOLE INDOSUEZ', '039', '0'),
('BANK DANAMON', '011', '0'),
('BANK DBS INDONESIA', '046', '0'),
('BANK DIPO INTERNATIONAL', '523', '0'),
('BANK DKI', '111', '0'),
('BANK EKONOMI', '087', '0'),
('BANK EKSEKUTIF', '558', '0'),
('BANK EKSPOR INDONESIA', '003', '0'),
('BANK FAMA INTERNASIONAL', '562', '0'),
('BANK FINCONESIA', '945', '0'),
('BANK GANESHA', '161', '0'),
('BANK HAGA', '089', '0'),
('BANK HAGAKITA', '159', '0'),
('BANK HARDA', '567', '0'),
('BANK HARFA', '517', '0'),
('BANK HARMONI INTERNATIONAL', '166', '0'),
('BANK HIMPUNAN SAUDARA 1906, TBK .', '212', '0'),
('BANK IFI', '093', '0'),
('BANK INA PERDANA', '513', '0'),
('BANK INDEX SELINDO', '555', '0'),
('BANK INDOMONEX', '498', '0'),
('BANK JABAR', '110', '0'),
('BANK JASA ARTA', '422', '0'),
('BANK JASA JAKARTA', '472', '0'),
('BANK JATENG', '113', '0'),
('BANK JATIM', '114', '0'),
('BANK KEPPEL TATLEE BUANA', '053', '0'),
('BANK KESAWAN', '167', '0'),
('BANK KESEJAHTERAAN EKONOMI', '535', '0'),
('BANK LAMPUNG', '121', '0'),
('BANK LIPPO', '026', '1'),
('BANK MALUKU', '131', '0'),
('BANK MANDIRI', '008', '1'),
('BANK MASPION', '157', '0'),
('BANK MAYAPADA', '097', '0'),
('BANK MAYBANK INDOCORP', '947', '0'),
('BANK MAYORA', '553', '0'),
('BANK MEGA', '426', '1'),
('BANK MERINCORP', '946', '0'),
('BANK MESTIKA', '151', '0'),
('BANK METRO EXPRESS', '152', '0'),
('BANK MITRANIAGA', '491', '0'),
('BANK MIZUHO INDONESIA', '048', '0'),
('BANK MUAMALAT', '147', '0'),
('BANK MULTI ARTA SENTOSA', '548', '0'),
('BANK MULTICOR TBK.', '036', '0'),
('BANK NAGARI', '118', '0'),
('BANK NIAGA', '022', '1'),
('BANK NISP', '028', '0'),
('BANK NTT', '130', '0'),
('BANK NUSANTARA PARAHYANGAN', '145', '0'),
('BANK OCBC – INDONESIA', '948', '1'),
('BANK OF AMERICA, N.A', '033', '0'),
('BANK OF CHINA LIMITED', '069', '0'),
('BANK PANIN', '019', '0'),
('BANK PERSYARIKATAN INDONESIA', '521', '0'),
('BANK PURBA DANARTA', '547', '0'),
('BANK RESONA PERDANIA', '047', '0'),
('BANK RIAU', '119', '0'),
('BANK ROYAL INDONESIA', '501', '0'),
('BANK SHINTA INDONESIA', '153', '0'),
('BANK SINAR HARAPAN BALI', '564', '0'),
('BANK SRI PARTHA', '466', '0'),
('BANK SULTRA', '135', '0'),
('BANK SULUT', '127', '0'),
('BANK SUMITOMO MITSUI INDONESIA', '045', '0'),
('BANK SUMSEL', '120', '0'),
('BANK SUMUT', '117', '0'),
('BANK SWADESI', '146', '0'),
('BANK SWAGUNA', '405', '0'),
('BANK SYARIAH MANDIRI', '451', '0'),
('BANK SYARIAH MEGA', '506', '0'),
('BANK TABUNGAN NEGARA (PERSERO)', '200', '0'),
('BANK TABUNGAN PENSIUNAN NASIONAL', '213', '0'),
('BANK UIB', '536', '0'),
('BANK UOB INDONESIA', '058', '0'),
('BANK VICTORIA INTERNATIONAL', '566', '0'),
('BANK WINDU KENTJANA', '162', '0'),
('BANK WOORI INDONESIA', '068', '0'),
('BANK YUDHA BHAKTI', '490', '0'),
('BPD ACEH', '116', '0'),
('BPD BALI', '129', '0'),
('BPD DIY', '112', '0'),
('BPD JAMBI', '115', '0'),
('BPD KALIMANTAN BARAT', '123', '0'),
('BPD KALSEL', '122', '0'),
('BPD KALTENG', '125', '0'),
('BPD KALTIM', '124', '0'),
('BPD NTB', '128', '0'),
('BPD PAPUA', '132', '0'),
('BPD SULAWESI TENGAH', '134', '0'),
('BPD SULSEL', '126', '0'),
('CENTRATAMA NASIONAL BANK', '559', '0'),
('CITIBANK N.A.', '031', '1'),
('DEUTSCHE BANK AG.', '067', '0'),
('HALIM INDONESIA BANK', '164', '0'),
('ING INDONESIA BANK', '034', '0'),
('JP. MORGAN CHASE BANK, N.A.', '032', '0'),
('KOREA EXCHANGE BANK DANAMON', '059', '0'),
('LIMAN INTERNATIONAL BANK', '526', '0'),
('PERMATA BANK', '013', '0'),
('PRIMA MASTER BANK', '520', '0'),
('RABOBANK INTERNASIONAL INDONESIA', '060', '0'),
('STANDARD CHARTERED BANK', '050', '0'),
('THE BANGKOK BANK COMP. LTD', '040', '0'),
('THE BANK OF TOKYO MITSUBISHI UFJ LTD', '042', '0'),
('THE HONGKONG & SHANGHAI B.C.', '041', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
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
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Kursi', 1, '2019-08-30 16:43:41', 0, '0000-00-00 00:00:00', 1),
(2, 'Meja', 1, '2019-08-30 16:51:10', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('814qket402535ffqm7kgvgc9ga', '::1', 1568289152, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238393135323b),
('drg0vr5rtd6728cps4thanfb7f', '::1', 1568289152, ''),
('b9jg1aljmf1i14nl3c32gneq39', '::1', 1568289152, ''),
('0p6gh4ffm7tr2csken2dukf9ir', '::1', 1568289152, ''),
('ng478h2kmpl64js5ur7pa5ec9q', '::1', 1568194757, ''),
('mau4403p6p64ucl4m8481tcd9m', '::1', 1568194757, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139343735373b),
('hbqivvpkls0mlrqd1bhbbh14iu', '::1', 1568194755, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139343735343b),
('km2r835tspu97dqhptba46porp', '::1', 1568194616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139343631363b),
('lvtrr2pim9cp44ojr2cljsg6pc', '::1', 1568194616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139343631363b7c4e3b),
('2qf6ibn7l00eet9fl5ljcfa5g4', '::1', 1568194599, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139343539393b),
('qip40cqc6c7kobiijgghq0th4j', '192.168.8.171', 1568194541, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139343534313b),
('tbrfm5ksv1k76i84kevoi099tu', '192.168.8.171', 1568194541, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139343534313b7c4e3b),
('pkbq7e7qjhf4lavoto1307moea', '192.168.8.171', 1568194531, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139343533303b),
('2tc4mtapc9hp3ca99blng767q1', '192.168.8.171', 1568194530, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139343533303b),
('jjbjbklnct1td7h2qh0ufpe94k', '::1', 1568289151, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238393135313b),
('tbde3us95gin80nsdd086b1e9p', '192.168.8.171', 1568194530, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139343533303b),
('t1qdd2aqvlfa9hlrrsjctm8d47', '::1', 1568288983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383938333b),
('31tu5us9n4nf09ag3fo6mtog8v', '::1', 1568288986, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383938363b),
('spohlpplbm76l2g01uf7h8f1ij', '::1', 1568288392, ''),
('meh63a4hmdmqoarhk0qdm75uja', '::1', 1568288397, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383339373b),
('pmb0ehdib4pvnhr6s0i2gg6n5n', '::1', 1568288402, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383430323b),
('5bmp986tamn6nemd08o1q4u9kt', '::1', 1568288391, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383339313b),
('ea5jfv28h0rh3nccik7doo5hab', '::1', 1568288381, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383338313b),
('b52q89l2t9l9017fji78o0uei1', '::1', 1568288386, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383338363b),
('uk2618gvhcarjtpfasbqn2i3fs', '::1', 1568288366, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383336363b),
('hfe9vjklt9c23uqjoefn5du616', '::1', 1568288369, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383336393b),
('16tdquv8afpjeq7rmamkf2v66v', '::1', 1568288372, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383337313b),
('8dtdnno7k2ohn4lru5fkpiigir', '::1', 1568288377, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383337363b),
('labk0kdtgs39p9decjh3fsc20m', '::1', 1568288356, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383335363b),
('61nrgqdf6ajangbfshmimmnovd', '::1', 1568288365, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383336353b),
('vr5ummr1aie9iiukcutteolnv6', '::1', 1568288355, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383335353b),
('f2lo5hn5blv6f1mhc820j0088p', '::1', 1568288353, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383335333b),
('ob8ged5uqt6o1ek7p5m4095j3r', '::1', 1568288350, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383335303b),
('hqjj9b9l6q4lebn6jdnji5af2j', '::1', 1568288342, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383334323b),
('gn094k5fjp124949h5b089atm9', '::1', 1568288342, ''),
('sqo8v79bjpmgnhdj7560t1oe0v', '::1', 1568288342, ''),
('dol9c4sb0r270cq6587erqb238', '::1', 1568288340, ''),
('9otl6a32edfogubb8kt6q5s8s3', '::1', 1568288340, ''),
('ad2gtc74k8meanqcdk694j4ft8', '::1', 1568288336, ''),
('tlr480kgt037bbojfla23fi040', '::1', 1568288337, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383333373b),
('cc34b29csgvn5ehdne7ba9gbhf', '::1', 1568288337, ''),
('nosv5tljs4lhehtm8gq3iv0afl', '::1', 1568288337, ''),
('t1m1oe353l7qv5lupqgd3nguta', '::1', 1568288340, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383334303b),
('n22l7s8ibsua5o3g7pnfb3eif7', '::1', 1568288336, ''),
('68vb94ooncqg60sa3l78j7uatg', '::1', 1568288336, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383333363b),
('5moo7tec55mqj1upmlq505kh69', '::1', 1568288326, ''),
('738riuh2s55aj8knh0gvuq1sn6', '::1', 1568288326, ''),
('hscc3gstiq2cq4lcg06s08hfak', '::1', 1568288332, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383333323b),
('7edsn5aa9c5k1td6l49iqe6ue2', '::1', 1568288326, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383332363b),
('n3ig0gkthte0loev53l81gbvac', '::1', 1568288323, ''),
('1jjdg1h2kduqo8cu4n4kna5s9t', '::1', 1568288319, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383331393b),
('4pgr60k2sc6ke84ts6p5mtt3il', '::1', 1568288323, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383332333b),
('khkrfsi8j6vl2ta2po7gkv41b7', '::1', 1568288316, ''),
('rv6pp4dcg11lru3rcvrc0arild', '::1', 1568288316, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383331363b),
('ejbj6idn8v00m093g1svfm9mfb', '::1', 1568288305, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383330353b),
('hkekkj8btp8otqrdf7lhgsadjk', '::1', 1568288298, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383239383b),
('d2mug12v808hcmuutdoeuln5lu', '::1', 1568288293, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383239333b),
('291uoib36pav10lirt2nu0cd64', '::1', 1568288288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383238383b),
('3f1lourbks4328k9g2qpj5uaai', '::1', 1568288285, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383238353b),
('ls0vq5pl7v86lrv4unjapiejq2', '::1', 1568288281, ''),
('njjpb7m3gj28bb3u4hkal1fb3m', '::1', 1568288280, ''),
('kq2g5tvgpp4cn4q78sdjrlc05l', '::1', 1568288280, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383238303b),
('1hjge7erofa0terk05m99bsb4h', '::1', 1568288271, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383237313b),
('l1u91k9depqp27idl8nhrd3oo3', '::1', 1568288277, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383237373b),
('rbkqs5scebai6450udgaomqnl9', '::1', 1568288263, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383236333b),
('g56d7fqr23esddhau4hcgpulc3', '::1', 1568288270, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383237303b),
('eidkmj2bs5qc9k8frmkvk8hdba', '::1', 1568288266, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383236363b),
('eu2ca8khtjn66nmnshisro17ut', '::1', 1568288260, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383236303b),
('0ud2dbh0uq20lmhin7a0mvbplm', '::1', 1568288259, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383235393b),
('hn4b0hhs6mdvfdkj4620ddr1d7', '::1', 1568288251, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383235313b),
('src076ijgpj0fj35eiuh2mqo0r', '::1', 1568288239, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383233393b),
('ocn4l7tv6ep0papas507co07vf', '::1', 1568288234, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383233343b),
('4quhr6tbvnt2p4vdg2mqm3hfv1', '::1', 1568288247, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383234373b),
('fismndtakq5hj0ndvc2tc02ag2', '::1', 1568288216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383231363b),
('atcd9mf0gf8o7jah0ko5d85u3s', '::1', 1568288222, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383232323b),
('9ibhdn00lapb5ndmnchrcqd44f', '::1', 1568288210, ''),
('20en8116h6rvtvddpurdk2rmvg', '::1', 1568288210, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383231303b),
('maultasjt69rg6fafn51ll5n58', '::1', 1568288210, ''),
('j06mu3bcvoj0dhcqo35ldgc648', '::1', 1568288210, ''),
('00rd0gdmcsse43o4a32k3dvc5k', '::1', 1568288208, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383230383b),
('ib8hltvjdanf4l3rkb3gt15mtu', '::1', 1568288204, ''),
('tmuuknem0c3uteqjeid4u2fkoq', '::1', 1568288203, ''),
('c7srjeoqd57ufs4rhhvg6prv1b', '::1', 1568288203, ''),
('6d28r31muto4m47vu2hhr61sma', '::1', 1568288203, ''),
('scnlh9ga8g5egah1p0ju46lgt6', '::1', 1568288196, ''),
('nanbp6f9p6tpjflhfla29tej4b', '::1', 1568288196, ''),
('usevjcube35oai63783spsi7nu', '::1', 1568288203, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383230333b),
('fdbgj1q5pcf6iuhj9fnlc08ue6', '::1', 1568288196, ''),
('h5uelhvs1jk6djldc7omthfgfm', '::1', 1568288196, ''),
('p9ocegc8vb7h26ujsq85k6ua4f', '::1', 1568288179, ''),
('e6elmfcuia1eo1fv40psfdtlkg', '::1', 1568288179, ''),
('65oqhb469snt1k728b6v50o686', '::1', 1568288179, ''),
('u9mlltid2d71gsj7p1572r58et', '::1', 1568288179, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383137393b),
('9s5dre3uhqu08hbdu33ae07qlr', '::1', 1568288174, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383137343b),
('a43bfm9rsov1jfgu3cnd26hpr1', '::1', 1568288175, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383137353b),
('6sp8ol1hj000b5jksb1k59msi6', '::1', 1568288170, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383137303b),
('u2l4s8o2p3f8s7v40q9knrca9o', '::1', 1568288168, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383136383b),
('sj5tti6le0s76od9ovl8q9130h', '::1', 1568288161, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383136313b),
('vn9g9l3g5ahgnid5gpe0qs37hl', '::1', 1568288151, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383135313b),
('dnns7tsoed5opuvcmblq0pec9b', '::1', 1568288136, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383133363b7c4e3b),
('gc3kh9sfp2qhftpmdi3994aj3j', '::1', 1568288136, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383133363b),
('kel5jolc8n45jug99egcq9238k', '::1', 1568288129, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383132393b7c4e3b),
('0nq1iclsvcqbh3etm8pd7tdit4', '::1', 1568288129, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383132393b),
('f94m22mr6ittcf49evkceggk9u', '::1', 1568288129, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383132393b),
('opbgcv7pn9jrtg2d2mvuhtj2fr', '192.168.8.171', 1568260882, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383236303838323b),
('aqmoufhcbgs6qma8gnno8taidl', '::1', 1568288116, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383131363b),
('k4nv9icq0fr5fm0ffjfs84odv1', '::1', 1568288084, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383238383038343b),
('i0k8ejrg6qo0qgbr329j225ash', '192.168.8.171', 1568260882, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383236303838323b),
('5m9vaasp77cametqtefasgr5fq', '192.168.8.171', 1568260346, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383236303334363b),
('7rag58p2qqpa2tllgpr1qu5io5', '192.168.8.171', 1568260341, ''),
('0bm5p7pdov3sn0creverg1a40a', '192.168.8.171', 1568260341, ''),
('s45dt964tuvg73v33479fom9lk', '192.168.8.171', 1568260339, ''),
('hfbeec16rg385hje9np14ds8sa', '192.168.8.171', 1568260341, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383236303334313b),
('6eu7decjeekur2c90t29l82dff', '192.168.8.171', 1568260339, ''),
('503aa72n3v7j2u8141eev0ek2n', '192.168.8.171', 1568260333, ''),
('6o5kpqaa1kp38pd0k8i9g1ob5k', '192.168.8.171', 1568260333, ''),
('l0vogqsahdbdn7l6s04ojgqrs2', '192.168.8.171', 1568260338, ''),
('d9617gc6nnctb4hc5dhqgvdmvk', '192.168.8.171', 1568260333, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383236303333333b),
('35epvs4qsgpe3eal8vmpgs5gug', '192.168.8.171', 1568260333, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383236303333333b),
('vlj9clbdauiu7kv9vlbpv60hd8', '192.168.8.171', 1568260327, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383236303332373b7c4e3b),
('0jsbiugodg021pt69msneb0495', '192.168.8.171', 1568260327, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383236303332373b),
('o2pshkp17k817l4fgpbddo925t', '192.168.8.171', 1568260313, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383236303331333b),
('nvva6ci3grvjr30hutbbkf7mp0', '::1', 1568196993, ''),
('q1a9fd2mu6hpl42hcqenuf60up', '::1', 1568196993, ''),
('qsau0mhm2gpvv94bue321pa3rc', '::1', 1568196993, ''),
('80oqpu6v54scc64ksnf7jtc9kq', '192.168.8.171', 1568260313, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383236303331333b),
('c3grjf32n4oicbgmufscfuurlu', '192.168.8.171', 1568195791, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139353739313b),
('mlvjm4jq4jtdn592ino5en51ki', '::1', 1568196993, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139363939333b),
('0ou7j31i7paohfvkulo74drp07', '192.168.8.171', 1568195790, ''),
('i2s4is0kcrf6dnr4r0erdo2hcc', '192.168.8.171', 1568195790, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139353739303b),
('rneq3fvol82eue6m6tnu0cn537', '192.168.8.171', 1568195784, ''),
('jbjn64c35o35db1tfunrq7cs5g', '192.168.8.171', 1568195788, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139353738373b),
('4pf3253nf73tic3t4ieqnf1akp', '192.168.8.171', 1568195780, ''),
('h9nfv6e8p9mtoo8iq3olvpmblf', '192.168.8.171', 1568195784, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139353738333b),
('cgm3kvdq1u4a5kg4jtgq84l8bg', '192.168.8.171', 1568195768, ''),
('mj7gbnj7lmeb3snnmlpspp11kp', '192.168.8.171', 1568195780, ''),
('ocroi3gp70a8fcn9v3e5n73kcc', '192.168.8.171', 1568195780, ''),
('lflcapqogffi1nquhlktiiarhc', '192.168.8.171', 1568195768, ''),
('1f58imcohugdt6uj25omn7i748', '192.168.8.171', 1568195764, ''),
('0bolqu8vh0dbvddto52716rn2j', '192.168.8.171', 1568195768, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139353736383b),
('adnrakiif6h5oc891pjpvc34n1', '192.168.8.171', 1568195757, ''),
('tr7apk407jm3p3s7op0097fq2j', '192.168.8.171', 1568195763, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139353736333b),
('ki3hduv2bkl0oj1hslatsjuffd', '192.168.8.171', 1568195757, ''),
('0n188td93mghj6n5ksqj89mu4s', '192.168.8.171', 1568195757, ''),
('q1sngdodpmn8rq3dmc2hhnna6g', '192.168.8.171', 1568195746, ''),
('5s29fgsd6inghuudjc0jdr5vmq', '192.168.8.171', 1568195746, ''),
('36d6m4odtmrki1i45n9ab46nuo', '192.168.8.171', 1568195746, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139353734363b),
('pgdng9c73nvfvqc37mtjtu88np', '192.168.8.171', 1568195746, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139353734363b),
('gg2o5c1ec8516lrfhacmmig52v', '::1', 1568194757, ''),
('rqp3dvtn8pnilkk05m59r8s0s3', '192.168.8.171', 1568195742, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139353734323b),
('q4gslca2ik19o304o3hdlo8l04', '::1', 1568194758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536383139343735383b);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `iso` char(3) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
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
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `mobile`, `address`, `created_user_id`, `created_datetime`) VALUES
(2, 'Walk in Customer', 'rizkiahrd@gmail.com', '123123', '', 1, '2019-06-24 18:18:20'),
(5, '123', '123@gmail.com', '123', 'Jl. Cianjur Raya km 14', 1, '2019-08-31 05:39:11'),
(6, 'Namolo siregar', 'namolo@gmail.com', '085721996539', 'Jl. narasumber 57', 17, '2019-08-31 17:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
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

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expenses_number`, `expense_category`, `outlet_id`, `outlet_name`, `date`, `amount`, `reason`, `file_name`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, '02563145', 1, 1, '', '1970-01-01', 50000.00, 'beli lakban hitam', '', 1, '2019-08-31 10:05:31', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
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

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'ATK', 1, '2019-08-31 10:04:37', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gift_card`
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
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id` int(11) NOT NULL,
  `code` char(15) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `amount` double NOT NULL,
  `note` text NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `preference_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`id`, `code`, `supplier_id`, `created_id`, `created_date`, `amount`, `note`, `jatuh_tempo`, `preference_id`, `status`) VALUES
(8, 'H20190830101643', 1, 0, '2019-08-30 14:12:35', 1000000, 'pembelian meja', '2019-09-05', 0, 'paid'),
(9, 'H20190830180551', 1, 0, '2019-08-30 14:21:20', 1000000, 'huhuy', '2019-09-04', 0, 'paid'),
(10, 'H20190830185870', 1, 0, '2019-08-30 14:35:11', 500000, '', '2019-09-04', 0, 'unpaid'),
(11, 'H20190830156571', 2, 0, '2019-08-30 14:36:39', 5000000, '', '2019-08-31', 0, 'paid'),
(12, 'H20190830198769', 2, 0, '2019-08-30 14:36:53', 6000000, '', '2019-08-31', 0, 'paid'),
(13, 'H20190830762938', 2, 0, '2019-08-30 14:44:44', 100000, '', '2019-08-31', 0, 'paid'),
(14, 'H20190830218098', 2, 0, '2019-08-30 14:44:55', 10000000, '', '2019-08-31', 0, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `hutang_payment`
--

CREATE TABLE `hutang_payment` (
  `id_hutang` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang_payment`
--

INSERT INTO `hutang_payment` (`id_hutang`, `created_date`, `created_id`) VALUES
(8, '2019-08-30 14:20:06', 1),
(12, '2019-08-30 14:38:58', 1),
(13, '2019-08-30 14:45:42', 1),
(11, '2019-08-30 14:48:34', 1),
(9, '2019-08-31 09:21:22', 1),
(14, '2019-09-12 05:52:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_code` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_code`, `outlet_id`, `qty`) VALUES
(1, '1', 1, -1),
(2, '2', 1, 0),
(3, '3', 1, 5),
(4, '4', 1, 4),
(5, '4', 2, 15),
(6, '3', 2, 5),
(7, '1', 2, 4),
(8, '5', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
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
-- Table structure for table `order_items`
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
-- Table structure for table `outlets`
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
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `name`, `address`, `contact_number`, `receipt_header`, `receipt_footer`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Showroom', 'Jl. raya cianjur ', '0262555', '', '', 1, '2019-08-30 17:08:28', 0, '0000-00-00 00:00:00', 1),
(2, 'Gudang Belakang', 'di belakang showroom', '0852566', '', '', 1, '2019-08-30 17:15:14', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
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
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Cash', 1, '2016-09-25 01:43:41', 0, '0000-00-00 00:00:00', 1),
(2, 'Nett', 1, '2016-09-25 01:43:45', 0, '0000-00-00 00:00:00', 0),
(3, 'VISA', 1, '2016-09-25 01:43:50', 0, '0000-00-00 00:00:00', 0),
(9, 'Kredit', 1, '2019-08-05 15:59:29', 0, '0000-00-00 00:00:00', 1),
(6, 'Debit', 1, '2016-09-25 01:44:05', 0, '0000-00-00 00:00:00', 1),
(7, 'Gift Card', 1, '2016-10-16 01:23:05', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `amount` double NOT NULL,
  `crated_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `preference_id` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`id`, `customer_id`, `created_date`, `amount`, `crated_id`, `note`, `jatuh_tempo`, `preference_id`) VALUES
(1, 5, '2019-08-31 06:49:59', 175000, 16, '', '2019-09-03', '201908313'),
(2, 5, '2019-08-31 07:08:05', 360000, 16, '', '2019-09-05', '201908315'),
(3, 6, '2019-09-06 10:12:29', 120000, 1, '', '2019-09-09', '2019090620'),
(4, 2, '2019-09-06 19:45:18', 50000, 1, '', '2019-09-07', '2019090621');

-- --------------------------------------------------------

--
-- Table structure for table `piutang_payment`
--

CREATE TABLE `piutang_payment` (
  `id` int(11) NOT NULL,
  `code` char(15) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piutang_payment`
--

INSERT INTO `piutang_payment` (`id`, `code`, `created_date`, `created_id`, `amount`, `customer_id`) VALUES
(1, 'PI2019083110999', '2019-08-31 08:52:21', 1, 50000, 5),
(2, 'PI2019090552561', '2019-09-05 06:30:13', 1, 25000, 5),
(3, 'PI2019090520203', '2019-09-05 06:30:42', 1, 400000, 5),
(4, 'PI2019090520333', '2019-09-05 06:31:00', 1, 60000, 5),
(5, 'PI2019090750048', '2019-09-07 07:26:31', 1, 50000, 2),
(6, 'PI2019091114705', '2019-09-11 11:55:57', 1, 100000, 6),
(7, 'PI2019091114102', '2019-09-11 11:56:20', 1, 20000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `code` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `purchase_price` double NOT NULL,
  `retail_price` double NOT NULL,
  `thumbnail` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `special_price` decimal(10,0) DEFAULT '0',
  `member_price` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `category`, `purchase_price`, `retail_price`, `thumbnail`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`, `special_price`, `member_price`) VALUES
(1, 'sp001', 'Kursi Bakso', 1, 25000, 50000, 'no_image.jpg', 1, '2019-08-30 16:54:30', 0, '0000-00-00 00:00:00', 1, '0', 0),
(2, 'sp002', 'Meja Makan Bundar', 2, 75000, 120000, 'no_image.jpg', 1, '2019-08-30 16:55:36', 0, '0000-00-00 00:00:00', 1, '0', 0),
(3, 'sp003', 'Meja Santai', 2, 145000, 175000, 'no_image.jpg', 1, '2019-08-30 16:56:51', 0, '0000-00-00 00:00:00', 1, '0', 0),
(4, 'sp004', 'Kursi Bola', 1, 250000, 350000, 'no_image.jpg', 1, '2019-08-30 16:57:32', 1, '2019-08-31 14:12:18', 1, '24000', 24000),
(5, 'B001', 'Pulpen', 1, 2000, 5000, 'no_image.jpg', 1, '2019-08-31 14:19:06', 0, '0000-00-00 00:00:00', 1, '4000', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
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
-- Table structure for table `purchase_order_items`
--

CREATE TABLE `purchase_order_items` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `product_code` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `ordered_qty` int(11) NOT NULL,
  `received_qty` int(11) NOT NULL,
  `cost` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_status`
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
-- Dumping data for table `purchase_order_status`
--

INSERT INTO `purchase_order_status` (`id`, `name`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Created', 1, '2016-09-10 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 'Sent To Supplier', 1, '2016-09-10 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 'Received From Supplier', 1, '2016-09-10 00:00:00', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `return_items`
--

CREATE TABLE `return_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_code` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(11,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_condition` int(11) NOT NULL COMMENT '1: Good, 2: Not Good'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `return_items`
--

INSERT INTO `return_items` (`id`, `order_id`, `product_code`, `price`, `qty`, `item_condition`) VALUES
(1, 1, '1', 50000.00, 1, 2),
(2, 2, '3', 175000.00, 1, 1),
(3, 3, '4', 350000.00, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `return_sales`
--

CREATE TABLE `return_sales` (
  `id` int(11) NOT NULL,
  `code` char(15) NOT NULL,
  `sales_code` char(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `id_created` int(11) NOT NULL,
  `amount` double NOT NULL,
  `type_return` varchar(30) NOT NULL,
  `return_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_sales`
--

INSERT INTO `return_sales` (`id`, `code`, `sales_code`, `date_created`, `id_created`, `amount`, `type_return`, `return_status`) VALUES
(2, 'RS201908312', '201908313', '2019-08-31 06:58:14', 1, 175000, 'goods', 'success'),
(3, 'RS201908313', '201908314', '2019-08-31 07:08:37', 16, 1050000, 'goods', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `code` char(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_deal` double NOT NULL,
  `total_print` double NOT NULL,
  `method_id` int(11) NOT NULL,
  `bank_id` char(3) NOT NULL,
  `no_rek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `code`, `created_date`, `created_id`, `customer_id`, `total_deal`, `total_print`, `method_id`, `bank_id`, `no_rek`) VALUES
(1, '201908301', '2019-08-31 00:00:00', 16, 2, 135000, 165000, 1, '', ''),
(2, '201908302', '2019-08-31 00:00:00', 16, 2, 50000, 65000, 1, '', ''),
(3, '201908313', '2019-08-31 00:00:00', 16, 5, 175000, 175000, 9, '', ''),
(4, '201908314', '2019-08-31 00:00:00', 16, 5, 8750000, 8750000, 6, '', '3480174649'),
(5, '201908315', '2019-08-31 00:00:00', 16, 5, 360000, 360000, 9, '', ''),
(6, '201909016', '2019-09-01 00:00:00', 1, 6, 225000, 225000, 1, '', ''),
(7, '201909028', '2019-09-02 00:00:00', 1, 2, 120000, 120000, 1, '', ''),
(8, '201909027', '2019-09-02 00:00:00', 1, 2, 180000, 180000, 1, '', ''),
(9, '201909029', '2019-09-02 00:00:00', 1, 2, 120000, 120000, 1, '', ''),
(10, '2019090211', '2019-09-02 00:00:00', 17, 6, 5000, 5000, 1, '', ''),
(11, '2019090212', '2019-09-03 00:00:00', 1, 2, 525000, 525000, 1, '', ''),
(12, '2019090312', '2019-09-03 00:00:00', 1, 2, 175000, 200000, 1, '', ''),
(13, '2019090313', '2019-09-03 00:00:00', 1, 6, 165000, 200000, 1, '', ''),
(14, '2019090314', '2019-09-03 00:00:00', 1, 5, 150000, 175000, 1, '', ''),
(15, '2019090415', '2019-09-04 04:58:51', 1, 2, 175000, 175000, 6, '009', '123123'),
(16, '2019090416', '2019-09-04 10:00:42', 1, 6, 700000, 700000, 1, '', ''),
(17, '2019090417', '2019-09-04 10:45:05', 1, 2, 350000, 350000, 1, '', ''),
(18, '2019090518', '2019-09-05 09:54:00', 1, 6, 5000, 5000, 1, '', ''),
(19, '2019090619', '2019-09-06 09:48:26', 1, 2, 120000, 120000, 1, '', ''),
(20, '2019090620', '2019-09-06 10:12:29', 1, 6, 120000, 120000, 9, '', ''),
(21, '2019090621', '2019-09-06 19:45:18', 1, 2, 50000, 50000, 9, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `sales_id` char(10) NOT NULL,
  `product_code` varchar(499) NOT NULL,
  `qty` int(11) NOT NULL,
  `price_print` double NOT NULL,
  `price_deal` double NOT NULL,
  `price_cost` double NOT NULL,
  `outlet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`sales_id`, `product_code`, `qty`, `price_print`, `price_deal`, `price_cost`, `outlet_id`) VALUES
('201908301', '2', 1, 165000, 135000, 75000, 1),
('201908302', '1', 1, 65000, 50000, 25000, 1),
('201908313', '3', 1, 175000, 175000, 145000, 1),
('201908314', '4', 25, 350000, 350000, 250000, 1),
('201908315', '2', 3, 120000, 120000, 75000, 1),
('201909016', '1', 1, 50000, 50000, 25000, 1),
('201909016', '3', 1, 175000, 175000, 145000, 1),
('201909028', '2', 1, 120000, 120000, 75000, 1),
('201909027', '3', 1, 175000, 175000, 145000, 1),
('201909027', '5', 1, 5000, 5000, 2000, 1),
('201909029', '2', 1, 120000, 120000, 75000, 1),
('2019090211', '5', 1, 5000, 5000, 2000, 1),
('2019090212', '3', 1, 175000, 175000, 145000, 1),
('2019090212', '4', 1, 350000, 350000, 250000, 1),
('2019090312', '3', 1, 200000, 175000, 145000, 1),
('2019090313', '3', 1, 200000, 165000, 145000, 1),
('2019090314', '3', 1, 175000, 150000, 145000, 1),
('2019090415', '3', 1, 175000, 175000, 145000, 1),
('2019090416', '4', 2, 350000, 350000, 250000, 1),
('2019090417', '4', 1, 350000, 350000, 250000, 1),
('2019090518', '5', 1, 5000, 5000, 2000, 1),
('2019090619', '2', 1, 120000, 120000, 75000, 1),
('2019090620', '2', 1, 120000, 120000, 75000, 1),
('2019090621', '1', 1, 50000, 50000, 25000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `sales_order_no` char(15) NOT NULL,
  `date` date NOT NULL,
  `note` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_items`
--

CREATE TABLE `sales_order_items` (
  `id` int(11) NOT NULL,
  `id_sales_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `retail_price` double NOT NULL,
  `purchase_price` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `site_name` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `pagination` int(11) NOT NULL,
  `tax` double(11,2) NOT NULL,
  `currency` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `datetime_format` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `display_product` int(11) NOT NULL,
  `display_keyboard` int(11) NOT NULL,
  `default_customer_id` int(11) NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `site_name`, `site_logo`, `timezone`, `pagination`, `tax`, `currency`, `address`, `datetime_format`, `display_product`, `display_keyboard`, `default_customer_id`, `updated_user_id`, `updated_datetime`) VALUES
(1, 'PooniePoop', 'logo.png', 'Asia/Jakarta', 10, 7.00, 'IDR', 'Jl. Hos Cokroaminoto no 169- Cianjur', 'm/d/Y', 3, 0, 2, 1, '2019-08-26 12:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(4999) COLLATE utf8_unicode_ci NOT NULL,
  `tax` double NOT NULL DEFAULT '0',
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
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `tax`, `email`, `address`, `tel`, `fax`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Mahligai Propent', 0, 'mahligal@gmail.com', 'JL. Borobudur jakarta', '0857219932566', '0263281546', 1, '2019-08-30 18:37:21', 0, '0000-00-00 00:00:00', 1),
(2, 'Jk', 0, 'jk@gmail.com', '123', '0263 123456789', '0263 123456789', 1, '2019-08-30 19:36:23', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suspend`
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
-- Table structure for table `suspend_items`
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
-- Table structure for table `temp_sales`
--

CREATE TABLE `temp_sales` (
  `id` int(11) NOT NULL,
  `code` char(10) NOT NULL,
  `created_date` date NOT NULL,
  `created_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `method_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_sales_items`
--

CREATE TABLE `temp_sales_items` (
  `sales_id` char(10) NOT NULL,
  `product_code` varchar(499) NOT NULL,
  `qty` int(11) NOT NULL,
  `price_print` double NOT NULL,
  `price_deal` double NOT NULL,
  `price_cost` double NOT NULL,
  `outlet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_sales_items`
--

INSERT INTO `temp_sales_items` (`sales_id`, `product_code`, `qty`, `price_print`, `price_deal`, `price_cost`, `outlet_id`) VALUES
('2019091222', '2', 1, 120000, 120000, 75000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_transfer_stock_items`
--

CREATE TABLE `temp_transfer_stock_items` (
  `transfer_stock_id` char(15) NOT NULL,
  `product_code` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `first_location` int(11) NOT NULL,
  `second_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `id` int(11) NOT NULL,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(499) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `timezones`
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
-- Table structure for table `transfer_stock`
--

CREATE TABLE `transfer_stock` (
  `id` int(11) NOT NULL,
  `code` char(15) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_stock`
--

INSERT INTO `transfer_stock` (`id`, `code`, `created_id`, `created_date`, `note`) VALUES
(1, 'TS2019083091042', 1, '2019-08-30 14:00:41', 'Transfer_stock');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_stock_items`
--

CREATE TABLE `transfer_stock_items` (
  `transfer_stock_id` char(15) NOT NULL,
  `product_code` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `first_location` int(11) NOT NULL,
  `second_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_stock_items`
--

INSERT INTO `transfer_stock_items` (`transfer_stock_id`, `product_code`, `qty`, `first_location`, `second_location`) VALUES
('TS2019083091042', 1, 3, 1, 2),
('TS2019083091042', 4, 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role_id`, `outlet_id`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Owner', 'owner@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, 1, '2016-08-27 00:00:00', 1, '2016-09-03 18:15:48', 1),
(17, 'Nadia', 'manajer@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 1, 1, '2019-08-31 17:26:19', 0, '0000-00-00 00:00:00', 1),
(16, 'Maria', 'kasir1@gmail.com', '25f9e794323b453885f5181f1b624d0b', 3, 1, 1, '2019-08-30 18:27:26', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
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
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`) VALUES
(1, 'Administrator', 1, '2016-08-16 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'Manager', 1, '2016-08-16 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'Sales Person', 1, '2016-08-16 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_data_piutang`
-- (See below for the actual view)
--
CREATE TABLE `v_data_piutang` (
`id` int(11)
,`jatuh_tempo` date
,`fullname` varchar(499)
,`customer_id` int(11)
,`amount` double
,`created_date` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_final_hutang`
-- (See below for the actual view)
--
CREATE TABLE `v_final_hutang` (
`piutang` double
,`total_bayar` double
,`sisa` double
,`customer_id` int(11)
,`jatuh_tempo` date
,`fullname` varchar(499)
,`created_date` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_piutang`
-- (See below for the actual view)
--
CREATE TABLE `v_piutang` (
`piutang` double
,`customer_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_piutang_customer`
-- (See below for the actual view)
--
CREATE TABLE `v_piutang_customer` (
`id` int(11)
,`jatuh_tempo` date
,`fullname` varchar(499)
,`customer_id` int(11)
,`amount` double
,`created_date` datetime
,`sisa` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_total_bayar`
-- (See below for the actual view)
--
CREATE TABLE `v_total_bayar` (
`total_bayar` double
,`customer_id` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_data_piutang`
--
DROP TABLE IF EXISTS `v_data_piutang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_data_piutang`  AS  select `piutang`.`id` AS `id`,`piutang`.`jatuh_tempo` AS `jatuh_tempo`,`customers`.`fullname` AS `fullname`,`piutang`.`customer_id` AS `customer_id`,sum(`piutang`.`amount`) AS `amount`,`piutang`.`created_date` AS `created_date` from (`piutang` join `customers` on((`piutang`.`customer_id` = `customers`.`id`))) group by `customers`.`fullname` ;

-- --------------------------------------------------------

--
-- Structure for view `v_final_hutang`
--
DROP TABLE IF EXISTS `v_final_hutang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_final_hutang`  AS  select `v_piutang`.`piutang` AS `piutang`,ifnull(`v_total_bayar`.`total_bayar`,0) AS `total_bayar`,(`v_piutang`.`piutang` - ifnull(`v_total_bayar`.`total_bayar`,0)) AS `sisa`,`v_data_piutang`.`customer_id` AS `customer_id`,`v_data_piutang`.`jatuh_tempo` AS `jatuh_tempo`,`v_data_piutang`.`fullname` AS `fullname`,`v_data_piutang`.`created_date` AS `created_date` from ((`v_piutang` left join `v_total_bayar` on((`v_total_bayar`.`customer_id` = `v_piutang`.`customer_id`))) join `v_data_piutang` on((`v_piutang`.`customer_id` = `v_data_piutang`.`customer_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_piutang`
--
DROP TABLE IF EXISTS `v_piutang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_piutang`  AS  select sum(`piutang`.`amount`) AS `piutang`,`piutang`.`customer_id` AS `customer_id` from `piutang` group by `piutang`.`customer_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_piutang_customer`
--
DROP TABLE IF EXISTS `v_piutang_customer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_piutang_customer`  AS  select `v_data_piutang`.`id` AS `id`,`v_data_piutang`.`jatuh_tempo` AS `jatuh_tempo`,`v_data_piutang`.`fullname` AS `fullname`,`v_data_piutang`.`customer_id` AS `customer_id`,`v_data_piutang`.`amount` AS `amount`,`v_data_piutang`.`created_date` AS `created_date`,(`v_data_piutang`.`amount` - sum(`piutang_payment`.`amount`)) AS `sisa` from (`v_data_piutang` join `piutang_payment` on((`v_data_piutang`.`customer_id` = `piutang_payment`.`customer_id`))) group by `v_data_piutang`.`customer_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_total_bayar`
--
DROP TABLE IF EXISTS `v_total_bayar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_total_bayar`  AS  select sum(`piutang_payment`.`amount`) AS `total_bayar`,`piutang_payment`.`customer_id` AS `customer_id` from `piutang_payment` group by `piutang_payment`.`customer_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`iso`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_card`
--
ALTER TABLE `gift_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hutang_payment`
--
ALTER TABLE `hutang_payment`
  ADD KEY `id_hutang` (`id_hutang`),
  ADD KEY `created_id` (`created_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `crated_id` (`crated_id`),
  ADD KEY `preference_id` (`preference_id`);

--
-- Indexes for table `piutang_payment`
--
ALTER TABLE `piutang_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `created_id` (`created_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_status`
--
ALTER TABLE `purchase_order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_items`
--
ALTER TABLE `return_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_sales`
--
ALTER TABLE `return_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_created` (`id_created`),
  ADD KEY `sales_code` (`sales_code`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `method_id` (`method_id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD KEY `sales_id` (`sales_id`),
  ADD KEY `outlet_id` (`outlet_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`sales_order_no`);

--
-- Indexes for table `sales_order_items`
--
ALTER TABLE `sales_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sales_order` (`id_sales_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suspend`
--
ALTER TABLE `suspend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suspend_items`
--
ALTER TABLE `suspend_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_sales`
--
ALTER TABLE `temp_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_sales_items`
--
ALTER TABLE `temp_sales_items`
  ADD PRIMARY KEY (`sales_id`,`product_code`);

--
-- Indexes for table `temp_transfer_stock_items`
--
ALTER TABLE `temp_transfer_stock_items`
  ADD KEY `product_code` (`product_code`),
  ADD KEY `transfer_stock_id` (`transfer_stock_id`),
  ADD KEY `first_location` (`first_location`),
  ADD KEY `second_location` (`second_location`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_stock`
--
ALTER TABLE `transfer_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_id` (`created_id`);

--
-- Indexes for table `transfer_stock_items`
--
ALTER TABLE `transfer_stock_items`
  ADD KEY `product_code` (`product_code`),
  ADD KEY `transfer_stock_id` (`transfer_stock_id`),
  ADD KEY `first_location` (`first_location`,`second_location`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gift_card`
--
ALTER TABLE `gift_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `piutang_payment`
--
ALTER TABLE `piutang_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_status`
--
ALTER TABLE `purchase_order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `return_items`
--
ALTER TABLE `return_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `return_sales`
--
ALTER TABLE `return_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sales_order_items`
--
ALTER TABLE `sales_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suspend`
--
ALTER TABLE `suspend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suspend_items`
--
ALTER TABLE `suspend_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_sales`
--
ALTER TABLE `temp_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

--
-- AUTO_INCREMENT for table `transfer_stock`
--
ALTER TABLE `transfer_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
