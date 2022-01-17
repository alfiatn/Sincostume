-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 10:40 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `id_level`) VALUES
(1, 'resa', 'da3af93c9078340ddbc58d450f65ea3f', 'alfia', 1),
(2, 'alfia', 'bdd6c6261c5c8ae7a1533c792dbac32a', 'teresia', 2),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'alfia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `id_chart` int(11) NOT NULL,
  `chart_id` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`id_chart`, `chart_id`, `id_produk`, `jumlah`) VALUES
(1, 'ardel', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Kostum'),
(2, 'Studio');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama_pelanggan`, `email`, `telp`) VALUES
(1, 'ardel', 'd910e6266b934d4c6c3aff7144b14f88', 'Ardellia', 'ardellia@gmail.com', '089765432'),
(2, 'teresia', '006f31db5610d756b2fc886ffc11ba6b', 'alfia', 'alfia@gmail.com', '098765433'),
(3, 'ardelliaaz', '81dc9bdb52d04dc20036dbd8313ed055', 'Ardellia', 'ardellia@gmail.com', '083845238210');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `tanggal_pinjam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alamat` text NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `id_kasir` varchar(50) DEFAULT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `nama_peminjam`, `tanggal_pinjam`, `alamat`, `jumlah`, `id_kasir`, `id_produk`) VALUES
(1, 'Alfia', '2019-12-03 16:30:11', 'Jarakan', '1', 'resa', 1),
(2, 'Resa', '2019-12-03 16:37:41', 'Nganjuk', '1', 'resa', 1),
(3, 'Alfia', '2019-12-03 16:42:14', 'Jl Danau Kerinci V', '1', 'resa', 1),
(4, 'Resa', '2019-12-03 16:44:23', 'Jl Danau Kerinci IV', '1', 'resa', 1),
(30, 'Alfia Teresia', '2019-12-03 23:31:16', 'Jarakan', '1', NULL, 2),
(31, 'Alfia', '2019-12-03 23:41:45', 'Jl Danau Kerinci', '2', NULL, 2),
(32, 'ardelliaa', '2019-12-03 23:47:17', 'Malang', '1', NULL, 1),
(33, 'Resa', '2019-12-03 23:53:10', 'Malang', '1', NULL, 2),
(34, 'Resa', '2019-12-03 23:53:10', 'Malang', '1', NULL, 8),
(35, 'Resa', '2019-12-04 00:05:29', 'Malang', '1', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL,
  `harga` varchar(100) NOT NULL,
  `size` varchar(30) NOT NULL,
  `stok` int(30) NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi`, `foto`, `harga`, `size`, `stok`, `id_jenis`) VALUES
(1, 'Vampire', 'Warna : Hitam', '13.jpg', '20000', 'M', 0, 1),
(2, 'Hallowen Witch', 'Wana Merah', '52.jpg', '30000', 'L', 0, 1),
(3, 'Unicorn pink', 'warna pink', '14.jpg', '30000', 'L', 3, 1),
(4, 'Light uiry', 'Warna Putih biru', '21.jpg', '32000', 'M', 2, 1),
(5, 'racoon', 'warna abu-abu', '42.jpg', '40000', 'L', 4, 1),
(6, 'Belle', 'Warna Kuning', '43.jpg', '30000', 'M', 0, 1),
(7, 'Aurora', 'Warna Pink', '32.jpg', '25000', 'M', 2, 1),
(8, 'inflatable', 'Warna Putih hitam', '15.jpg', '30000', 'M', 2, 1),
(9, 'flower both', 'Available', '22.jpg', '20000', '', 1, 2),
(11, 'Simple Both', 'available', '16.jpg', '30000', '', 1, 2),
(12, 'brown both ', 'available', '33.jpg', '20000', '', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `username` (`username`),
  ADD KEY `username_3` (`username`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id_chart`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `id_chart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chart`
--
ALTER TABLE `chart`
  ADD CONSTRAINT `chart_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
