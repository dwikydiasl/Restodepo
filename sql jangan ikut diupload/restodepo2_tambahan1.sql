-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 05:11 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restodepo2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_list`
--

DROP TABLE IF EXISTS `bank_list`;
CREATE TABLE `bank_list` (
  `kode` varchar(4) NOT NULL,
  `nama` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `bank_list`
--

TRUNCATE TABLE `bank_list`;
--
-- Dumping data for table `bank_list`
--

INSERT INTO `bank_list` (`kode`, `nama`) VALUES
('002', 'PT. BANK RAKYAT INDONESIA TBK.'),
('008', 'PT. BANK MANDIRI TBK.'),
('009', 'PT. BANK NEGARA INDONESIA 46 TBK.'),
('011', 'PT. BANK DANAMON INDONESIA TBK.'),
('013', 'PT. BANK PERMATA TBK.'),
('014', 'PT. BANK CENTRAL ASIA TBK.'),
('016', 'PT. BANK INTERNASIONAL INDONESIA'),
('019', 'PT. PANIN BANK TBK.'),
('022', 'PT. BANK CIMB NIAGA TBK'),
('023', 'PT. BANK UOB BUANA TBK.'),
('028', 'PT. BANK OCBC NISP TBK'),
('031', 'CITIBANK, NA'),
('032', 'JPMORGAN CHASE BANK, NA'),
('033', 'BANK OF AMERICA, NA'),
('036', 'PT. BANK WINDU KENTJANA INTL TBK.'),
('037', 'PT. BANK ARTHA GRAHA INTERNASIONAL'),
('040', 'THE BANGKOK BANK PCL'),
('041', 'THE HONGKONG AND SHANGHAI BC'),
('042', 'THE BANK OF TOKYO MITSUBISHI LTD.'),
('045', 'PT. BANK SUMITOMO MITSUI INDONESIA'),
('046', 'PT. BANK DBS INDONESIA'),
('047', 'PT. BANK RESONA PERDANIA'),
('048', 'PT. BANK MIZUHO INDONESIA'),
('050', 'STANDARD CHARTERED BANK'),
('052', 'ABN AMRO BANK NV'),
('054', 'PT. BANK CAPITAL INDONESIA TBK.'),
('057', 'PT. BANK BNP PARIBAS INDONESIA'),
('059', 'PT. KOREA EXCHANGE BANK DANAMON'),
('060', 'PT. BANK RABOBANK INTERNATIONAL INDONESIA'),
('061', 'PT. ANZ PANIN BANK'),
('067', 'DEUTSCHE BANK AG'),
('068', 'PT. BANK WOORI INDONESIA'),
('069', 'BANK OF CHINA LIMITED'),
('076', 'PT. BANK BUMI ARTA'),
('087', 'PT. BANK EKONOMI RAHARJA'),
('088', 'PT. BANK ANTAR DAERAH'),
('095', 'PT. BANK MUTIARA TBK.'),
('097', 'PT. BANK MAYAPADA TBK.'),
('110', 'PT. BANK PEMBANGUNAN DAERAH JABAR DAN BANTEN TBK.'),
('111', 'PT. BPD DKI JAKARTA'),
('112', 'PT. BANK PEMBANGUNAN DAERAH DIY'),
('113', 'PT. BANK PEMBANGUNAN DAERAH JATENG'),
('114', 'PT. BANK PEMBANGUNAN DAERAH JATIM'),
('115', 'PT. BANK PEMBANGUNAN DAERAH JAMBI'),
('116', 'PT. BANK PEMBANGUNAN DI ACEH'),
('117', 'PT. BANK PEMBANGUNAN DAERAH SUMUT'),
('119', 'PT. BANK PEMBANGUNAN DAERAH RIAU'),
('120', 'PT. BANK PEMBANGUNAN DAERAH SUMATERA SELATAN DAN BANGKA BELITUNG'),
('121', 'PT. BANK PEMBANGUNAN DAERAH LAMPUNG'),
('122', 'PT. BANK PEMBANGUNAN DAERAH KALSEL'),
('123', 'PT. BANK PEMBANGUNAN DAERAH KALBAR'),
('124', 'PT. BANK PEMBANGUNAN DAERAH KALTIM'),
('125', 'PT. BANK PEMBANGUNAN DAERAH KALTENG'),
('126', 'PT. BANK PEMBANGUNAN DAERAH SULAWESI SELATAN DAN SULAWESI BARAT'),
('127', 'PT. BANK PEMBANGUNAN SULUT'),
('128', 'PT. BANK PEMBANGUNAN DAERAH NTB'),
('129', 'PT. BANK PEMBANGUNAN DAERAH BALI'),
('130', 'PT. BANK PEMBANGUNAN DAERAH NTT'),
('131', 'PT. BANK PEMBANGUNAN DAERAH MALUKU'),
('132', 'PT. BANK PEMBANGUNAN DAERAH PAPUA'),
('133', 'PT. BPD BENGKULU'),
('135', 'PT. BPD SULAWESI TENGGARA'),
('145', 'PT. BANK NUSANTARA PARAHYANGAN'),
('146', 'PT. BANK SWADESI TBK.'),
('147', 'PT. BANK MUAMALAT INDONESIA'),
('151', 'PT. BANK MESTIKA DHARMA'),
('152', 'PT. BANK METRO EKSPRESS'),
('153', 'PT. BANK SINAR MAS'),
('157', 'PT. BANK MASPION INDONESIA'),
('161', 'PT. BANK GANESHA'),
('167', 'PT. BANK KESAWAN'),
('200', 'PT. BANK TABUNGAN NEGARA'),
('212', 'PT. BANK HS 1906'),
('213', 'PT. BANK TABUNGAN'),
('405', 'PT. BANK SWAGUNA'),
('422', 'PT. BANK RAKYAT INDONESIA SYARIAH TBK'),
('426', 'PT. BANK MEGA TBK.'),
('427', 'PT. BANK JASA JAKARTA'),
('441', 'PT. BUKOPIN'),
('451', 'PT. BANK SYARIAH MANDIRI TBK.'),
('459', 'PT. BANK BISNIS INTERNATIONAL'),
('485', 'PT. BANK BUMIPUTERA'),
('490', 'PT. BANK YUDHA BHAKTI'),
('491', 'PT. BANK MITRANIAGA'),
('494', 'PT. AGRONIAGA BANK'),
('498', 'PT. BANK SBI INDONESIA'),
('501', 'PT. BANK ROYAL INDONESIA'),
('506', 'PT. BANK SYARIAH MEGA INDONESIA'),
('513', 'PT. BANK INA PERDANA'),
('517', 'PT. BANK HARFA'),
('520', 'PT. PRIMA MASTER BANK'),
('521', 'PT. BANK PERSYARIKATAN INDONESIA'),
('523', 'PT. BANK DIPO INTERNATIONAL'),
('525', 'PT. BANK AKITA'),
('526', 'PT. BANK LIMAN INTERNATIONAL'),
('531', 'PT. ANGLOMAS INTERNATIONAL BANK'),
('535', 'PT. BANK KESEJAHTERAAN EKONOMI'),
('542', 'PT. BANK ARTOS INDONESIA'),
('547', 'PT. BANK SAHABAT PURBA DANARTA'),
('548', 'PT. BANK MULTIARTA SENTOSA'),
('553', 'PT. BANK MAYORA INDONESIA'),
('555', 'PT. BANK INDEX SELINDO'),
('559', 'PT. CENTRATAMA NASIONAL BANK'),
('562', 'PT. BANK FAMA INTERNATIONAL'),
('564', 'PT. BANK SINAR HARAPAN BALI'),
('566', 'PT. BANK VICTORIA INTERNATIONAL'),
('567', 'PT. BANK HARDA INTERNASIONAL'),
('947', 'PT. BANK MAYBANK INDOCORP'),
('949', 'PT. BANK CHINATRUST INDONESIA'),
('950', 'PT. BANK COMMONWEALTH');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

DROP TABLE IF EXISTS `penjual`;
CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `nama_toko` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `id_kota` int(11) NOT NULL,
  `telepon` varchar(64) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penjual_key` varchar(32) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL COMMENT '0 ga aktif, 1 aktif',
  `status` tinyint(4) NOT NULL COMMENT '0 baru, 1 aktif, 2 suspend, 3 hapus',
  `permalink` varchar(254) NOT NULL,
  `the_lat` varchar(254) NOT NULL,
  `the_long` varchar(254) NOT NULL,
  `deskripsi_toko` text NOT NULL,
  `catatan_toko` text NOT NULL,
  `thumbnail_logo` varchar(254) NOT NULL,
  `file_npwp_or_siup` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `penjual`
--

TRUNCATE TABLE `penjual`;
--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `username`, `password`, `nama`, `nama_toko`, `alamat`, `id_kota`, `telepon`, `join_date`, `penjual_key`, `last_login`, `is_active`, `status`, `permalink`, `the_lat`, `the_long`, `deskripsi_toko`, `catatan_toko`, `thumbnail_logo`, `file_npwp_or_siup`) VALUES
(1, 'tk.gusti@gmail.com', '6f87be24eb9cd90e7803bec2c3343349', 'Gusti', 'Rumah Kopi', 'Jl Lawu no 101 karanganyar', 200, '081 66778899', '2018-05-22 10:30:30', '49cUQhs6DPcX9QIS', '2018-07-16 08:30:00', 1, 1, 'rumah-kopi', '-7.5981957', '110.9541759', 'disini jualan kopi yang enak dan murah', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `penjual_no_rek`
--

DROP TABLE IF EXISTS `penjual_no_rek`;
CREATE TABLE `penjual_no_rek` (
  `id_rekening` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `kode_bank` varchar(8) NOT NULL,
  `nama_akun` varchar(64) NOT NULL,
  `nomor_rekening` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `penjual_no_rek`
--

TRUNCATE TABLE `penjual_no_rek`;
--
-- Dumping data for table `penjual_no_rek`
--

INSERT INTO `penjual_no_rek` (`id_rekening`, `id_penjual`, `kode_bank`, `nama_akun`, `nomor_rekening`) VALUES
(1, 1, '014', 'Ugus Marugus', '1122334455');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_list`
--
ALTER TABLE `bank_list`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`) USING BTREE;

--
-- Indexes for table `penjual_no_rek`
--
ALTER TABLE `penjual_no_rek`
  ADD PRIMARY KEY (`id_rekening`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penjual_no_rek`
--
ALTER TABLE `penjual_no_rek`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
