-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 02:21 AM
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
-- Database: `dasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_tugas`
--

DROP TABLE IF EXISTS `area_tugas`;
CREATE TABLE IF NOT EXISTS `area_tugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `keterangan` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `area_tugas`
--

TRUNCATE TABLE `area_tugas`;
--
-- Dumping data for table `area_tugas`
--

INSERT INTO `area_tugas` (`id`, `kode`, `nama`, `keterangan`) VALUES
(1, 'PENGGUNA', 'Manajemen Pengguna', ''),
(2, 'JABATAN', 'Manajemen Jabatan', ''),
(3, 'AREA_TUGAS', 'Area Tugas', ''),
(7, 'DEPARTEMEN', 'Departemen', ''),
(13, 'AUDIT_TRAIL', 'AUDIT TRAIL', ''),
(14, 'MAINTENANCE', 'Maintenance', 'Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `def_privilege`
--

DROP TABLE IF EXISTS `def_privilege`;
CREATE TABLE IF NOT EXISTS `def_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idjabatan` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `lihat` tinyint(4) NOT NULL,
  `tambah` tinyint(4) NOT NULL,
  `ubah` tinyint(4) NOT NULL,
  `hapus` tinyint(4) NOT NULL,
  `isprovide` tinyint(4) NOT NULL,
  `isapprove` tinyint(4) NOT NULL,
  `isrelease` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `def_privilege`
--

TRUNCATE TABLE `def_privilege`;
--
-- Dumping data for table `def_privilege`
--

INSERT INTO `def_privilege` (`id`, `idjabatan`, `idarea`, `lihat`, `tambah`, `ubah`, `hapus`, `isprovide`, `isapprove`, `isrelease`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1, 1, 1, 1),
(10, 4, 3, 0, 0, 0, 0, 0, 0, 0),
(12, 4, 2, 0, 0, 0, 0, 0, 0, 0),
(13, 4, 1, 0, 0, 0, 0, 0, 0, 0),
(21, 1, 7, 1, 1, 1, 1, 1, 1, 1),
(22, 4, 7, 0, 0, 0, 0, 0, 0, 0),
(107, 1, 13, 1, 1, 1, 1, 0, 0, 0),
(128, 4, 13, 0, 0, 0, 0, 0, 0, 0),
(129, 1, 14, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

DROP TABLE IF EXISTS `departemen`;
CREATE TABLE IF NOT EXISTS `departemen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `departemen`
--

TRUNCATE TABLE `departemen`;
--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `nama`) VALUES
(1, 'Internal'),
(2, 'Eksternal');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `jabatan`
--

TRUNCATE TABLE `jabatan`;
--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(1, 'Super Admin'),
(4, 'Staff Internal');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ismaintenance` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `maintenance`
--

TRUNCATE TABLE `maintenance`;
--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `ismaintenance`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(64) NOT NULL,
  `departemen` int(11) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(254) NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `islogin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `pengguna`
--

TRUNCATE TABLE `pengguna`;
--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `departemen`, `jabatan`, `nama`, `email`, `isactive`, `islogin`) VALUES
(1, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 1, 1, 'Super Admin', 'agung@agung.com', 1, 0),
(8, 'ekopurnomo', '285c701ec6c7ccce009424717c34da67', 1, 4, 'Eko Purnomo', 'eko@purnomo.com', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trail`
--

DROP TABLE IF EXISTS `trail`;
CREATE TABLE IF NOT EXISTS `trail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `postingdate` datetime NOT NULL,
  `keterangan` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `trail`
--

TRUNCATE TABLE `trail`;
--
-- Dumping data for table `trail`
--

INSERT INTO `trail` (`id`, `userid`, `username`, `postingdate`, `keterangan`) VALUES
(1, 1, 'superadmin', '2017-09-28 11:24:10', 'Login ke dashboard'),
(2, 1, 'superadmin', '2017-09-28 13:57:40', 'Logout dari dashboard'),
(3, 1, 'superadmin', '2017-09-28 13:57:56', 'Login ke dashboard'),
(4, 1, 'superadmin', '2017-09-29 08:04:42', 'Login ke dashboard'),
(5, 8, 'ekopurnomo', '2017-09-29 10:05:13', 'Login ke dashboard'),
(6, 1, 'superadmin', '2017-09-29 10:07:07', 'Login ke dashboard'),
(7, 8, 'ekopurnomo', '2017-09-29 13:16:45', 'Login ke dashboard'),
(8, 1, 'superadmin', '2017-09-29 14:42:26', 'Logout dari dashboard'),
(9, 1, 'superadmin', '2018-01-18 08:13:13', 'Login ke dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege`
--

DROP TABLE IF EXISTS `user_privilege`;
CREATE TABLE IF NOT EXISTS `user_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpengguna` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `lihat` tinyint(4) NOT NULL,
  `tambah` tinyint(4) NOT NULL,
  `ubah` tinyint(4) NOT NULL,
  `hapus` tinyint(4) NOT NULL,
  `isprovide` tinyint(4) NOT NULL,
  `isapprove` tinyint(4) NOT NULL,
  `isrelease` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idpengguna` (`idpengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `user_privilege`
--

TRUNCATE TABLE `user_privilege`;
--
-- Dumping data for table `user_privilege`
--

INSERT INTO `user_privilege` (`id`, `idpengguna`, `idarea`, `lihat`, `tambah`, `ubah`, `hapus`, `isprovide`, `isapprove`, `isrelease`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1, 1, 1, 1),
(5, 1, 7, 1, 1, 1, 1, 1, 1, 1),
(18, 8, 1, 0, 0, 0, 0, 0, 0, 0),
(19, 8, 2, 0, 0, 0, 0, 0, 0, 0),
(20, 8, 3, 0, 0, 0, 0, 0, 0, 0),
(22, 8, 7, 0, 0, 0, 0, 0, 0, 0),
(66, 1, 13, 1, 1, 1, 1, 1, 1, 1),
(84, 8, 13, 0, 0, 0, 0, 0, 0, 0),
(85, 1, 14, 1, 1, 1, 1, 1, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
