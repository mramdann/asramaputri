-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2021 at 08:14 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nisanurul`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asrama`
--

CREATE TABLE `tbl_asrama` (
  `id_asrama` int(11) NOT NULL,
  `no_kamar` varchar(20) NOT NULL,
  `kapasitas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_asrama`
--

INSERT INTO `tbl_asrama` (`id_asrama`, `no_kamar`, `kapasitas`) VALUES
(28, 'Kamar 1', 6),
(29, 'Kamar 2', 2),
(30, 'Kamar 3', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_izin`
--

CREATE TABLE `tbl_izin` (
  `id_ijin` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `tujuan` text,
  `catatan` text,
  `waktu_masuk` datetime DEFAULT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `status_izin` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_izin`
--

INSERT INTO `tbl_izin` (`id_ijin`, `id_karyawan`, `tujuan`, `catatan`, `waktu_masuk`, `waktu_keluar`, `status_izin`, `id_user`) VALUES
(15, 12, 'xxx', 'asdas', '2021-08-28 19:45:00', '2021-08-28 19:45:00', 'Diizinkan', 9),
(16, 12, 'xxx', 'as', '2021-08-28 19:48:00', '2021-08-28 19:48:00', 'Diizinkan', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `shift` varchar(20) DEFAULT NULL,
  `alamat` varchar(123) NOT NULL,
  `tlp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `nik`, `nama`, `jenis_kelamin`, `jabatan`, `shift`, `alamat`, `tlp`) VALUES
(12, '123123123', 'M. Ramdan', 'Laki-laki', 'Admin', 'Shift GS', 'Kp. Bojonggadog', '081912027289');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trans`
--

CREATE TABLE `tbl_trans` (
  `id_trans` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `id_asrama` int(11) DEFAULT NULL,
  `no_kamar` varchar(50) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_trans`
--

INSERT INTO `tbl_trans` (`id_trans`, `id_karyawan`, `id_asrama`, `no_kamar`, `tgl_masuk`) VALUES
(16, 12, 29, NULL, '2021-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `pass`, `nama_user`) VALUES
(9, 'nisa', 'nisa', 'Nisa Nurul Haqiqi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_asrama`
--
ALTER TABLE `tbl_asrama`
  ADD PRIMARY KEY (`id_asrama`) USING BTREE;

--
-- Indexes for table `tbl_izin`
--
ALTER TABLE `tbl_izin`
  ADD PRIMARY KEY (`id_ijin`) USING BTREE,
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`) USING BTREE;

--
-- Indexes for table `tbl_trans`
--
ALTER TABLE `tbl_trans`
  ADD PRIMARY KEY (`id_trans`) USING BTREE,
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_asrama` (`id_asrama`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_asrama`
--
ALTER TABLE `tbl_asrama`
  MODIFY `id_asrama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_izin`
--
ALTER TABLE `tbl_izin`
  MODIFY `id_ijin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_trans`
--
ALTER TABLE `tbl_trans`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_izin`
--
ALTER TABLE `tbl_izin`
  ADD CONSTRAINT `tbl_izin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_trans`
--
ALTER TABLE `tbl_trans`
  ADD CONSTRAINT `tbl_trans_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_karyawan` (`id_karyawan`),
  ADD CONSTRAINT `tbl_trans_ibfk_2` FOREIGN KEY (`id_asrama`) REFERENCES `tbl_asrama` (`id_asrama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
