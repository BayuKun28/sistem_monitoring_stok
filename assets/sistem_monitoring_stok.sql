-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2022 at 03:43 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_monitoring_stok`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `kategori`, `satuan`, `harga`, `stok`, `gambar`, `keterangan`) VALUES
(1, 'BAJUNIKE001', 'BAJU NIKE XL', 1, 1, 120000, 12, 'nike1.jpg', 'BAJU NIH'),
(2, 'BAJUNIKE002', 'Baju Nike Putih', 1, 1, 150000, 0, 'nike.jpg', 'Baju Nike Dengan Bahan Katun Yang Lembut dan Dingin'),
(4, 'KAOS123', 'KAOS', 1, 1, 25000, 5, 'nike2.jpg', 'kaos'),
(9, 'KAOS1234', 'KAOS AJA', 1, 1, 90000, 0, 'logitechb701.jpg', '123');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

DROP TABLE IF EXISTS `kategori_barang`;
CREATE TABLE IF NOT EXISTS `kategori_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `nama_kategori`) VALUES
(1, 'Baju'),
(2, 'Celana'),
(4, 'Sepatu'),
(5, 'Tas');

-- --------------------------------------------------------

--
-- Table structure for table `level_pengguna`
--

DROP TABLE IF EXISTS `level_pengguna`;
CREATE TABLE IF NOT EXISTS `level_pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_pengguna`
--

INSERT INTO `level_pengguna` (`id`, `nama_level`) VALUES
(1, 'admin'),
(2, 'pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `role`, `is_active`) VALUES
(1, 'admin', '$2y$10$/I7laWi1mlNFxYSv54EUPOH8MuZhmRWxhE.LaddTK9TSmVe.IHP2C', 'Admin', 1, 1),
(2, 'petugas', '$2y$10$Uci0nTmn0n56pgSmmuTtK.6XVWDBi.lSNC7SEJNXkk2ycPbQfAdLO', 'Petugas', 1, 1),
(4, 'bayu', '$2y$10$oNaIGdcyA2wp7/cXdvaZD.OlIi.WIfWIEI9MXRJXGWM/nELwKQ.FS', 'Bayu Prastyo', 1, 1),
(5, 'pimpinan', '$2y$10$D/uv2g7T8ze76P6a4xS3sezoFzyned.ZXD.2rc6hniadz1Uo4rw/a', 'pimpinan', 2, 1),
(8, 'nurdin', '$2y$10$IAgRyxPWPahkR3o8Tp9EGOwPJl8k9EnC8HyTFIG3NvSBPZC/UrwSG', 'nurdin', 1, 1),
(12, 'ilyas', '$2y$10$ak3UJrMKYLN1tqdm063yLOfNYQ0Qd97cWvwarQabtMA/dGdAYE3H6', 'Ilyas', 1, 1),
(36, 'anov', '$2y$10$EZF5mj4meoZVVd9pnRtKY.bOwazDbnha1udXSWBqKOrzZ.8xjs/Vq', 'anov', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `satuan_barang`
--

DROP TABLE IF EXISTS `satuan_barang`;
CREATE TABLE IF NOT EXISTS `satuan_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan_barang`
--

INSERT INTO `satuan_barang` (`id`, `nama_satuan`) VALUES
(1, 'PCS'),
(3, 'DUS');

-- --------------------------------------------------------

--
-- Table structure for table `stok_keluar`
--

DROP TABLE IF EXISTS `stok_keluar`;
CREATE TABLE IF NOT EXISTS `stok_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `vendor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_keluar`
--

INSERT INTO `stok_keluar` (`id`, `tanggal`, `kode_barang`, `jumlah`, `keterangan`, `vendor`) VALUES
(1, '2022-06-21 09:49:00', 'BAJUNIKE001', 3, 'Terjual', 1),
(2, '2022-06-27 09:49:00', 'KAOS123', 5, 'Terjual', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

DROP TABLE IF EXISTS `stok_masuk`;
CREATE TABLE IF NOT EXISTS `stok_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `vendor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`id`, `tanggal`, `kode_barang`, `jumlah`, `keterangan`, `vendor`) VALUES
(1, '2022-06-21 09:24:00', 'BAJUNIKE001', 10, 'penambahan', 1),
(2, '2022-06-21 09:37:00', 'BAJUNIKE001', 5, 'penambahan', 1),
(3, '2022-06-27 09:47:00', 'KAOS123', 10, 'penambahan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

DROP TABLE IF EXISTS `toko`;
CREATE TABLE IF NOT EXISTS `toko` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `nama_toko`, `alamat`) VALUES
(1, 'MAVIS CUSTOM APPAREL & MERCHANDISE', 'YOGYAKARTA');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE IF NOT EXISTS `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_vendor` text NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `nama_vendor`, `alamat`) VALUES
(1, 'PT PETO', 'Gedangan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
