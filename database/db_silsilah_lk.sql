-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 02:41 AM
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
-- Database: `db_silsilah_lk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_nikah`
--

CREATE TABLE `tb_nikah` (
  `id` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suami` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `istri` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tglnikah` date DEFAULT NULL,
  `tglcerai` date DEFAULT NULL,
  `admin` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_buat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_ubah` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabel pernikahan ';

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jeniskelamin` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayah` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ibu` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idnikah` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `tglkematian` date DEFAULT NULL,
  `anakke` int(2) DEFAULT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_ubah` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Indexes for table `tb_nikah`
--
ALTER TABLE `tb_nikah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
