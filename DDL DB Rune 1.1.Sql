-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 11:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rune`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_aset`
--

CREATE TABLE `t_aset` (
  `id_aset` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `nup` int(40) NOT NULL,
  `kode_unit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_penghunian`
--

CREATE TABLE `history_penghunian` (
  `id_history` int(11) NOT NULL,
  `no_sip` varchar(100) NOT NULL,
  `tgl_sip` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jenis_penghuni` varchar(50) NOT NULL,
  `status_validasi` enum('Valid', 'Tidak Valid', 'Belum Diperiksa') NOT NULL,
  `id_rn` int(11) NOT NULL,
  `id_penghuni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penghuni`
--

CREATE TABLE `t_penghuni` (
  `id_penghuni` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` int(18) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `pangkat_gol` varchar(10) NOT NULL,
  `kode_unit` varchar(20) NOT NULL,
  `asal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_rn_detail`
--

CREATE TABLE `t_rn_detail` (
  `id_rn` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `lat/long` point NOT NULL,
  `status_penggunaan` enum('Digunakan','Idle') NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `luas_rn` int(100) NOT NULL,
  `status_validasi` enum('Valid', 'Tidak Valid', 'Belum Diperiksa') NOT NULL,
  `id_tn` int(11) NOT NULL,
  `id_history` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tanah_rn_detail`
--

CREATE TABLE `t_tanah_rn_detail` (
  `id_tn` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `kepemilikan` varchar(100) NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `luas_tn` int(20) NOT NULL,
  `status_validasi` enum('Valid', 'Tidak Valid', 'Belum Diperiksa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `t_unit` (
  `kode_unit` varchar(20) NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `jenis_unit` enum('Pengguna Barang - Satker','Pengguna Barang - K/L','Pengelola - KPKNL') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `t_user` (
  `nip` int(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('Admin','Pengelola','Pengguna') NOT NULL,
  `kode_unit` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_aset`
--
ALTER TABLE `t_aset`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `fk_kode_unit` (`kode_unit`);

--
-- Indexes for table `history_penghunian`
--
ALTER TABLE `history_penghunian`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `fk_penghuni` (`id_penghuni`),
  ADD KEY `fk_id_rn` (`id_rn`);

--
-- Indexes for table `t_penghuni`
--
ALTER TABLE `t_penghuni`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD KEY `fk_id_penghuni` (`kode_unit`);

--
-- Indexes for table `t_rn_detail`
--
ALTER TABLE `t_rn_detail`
  ADD PRIMARY KEY (`id_rn`),
  ADD KEY `fk_id_tn` (`id_tn`),
  ADD KEY `fk_id_history` (`id_history`),
  ADD KEY `fk_aset2` (`id_aset`);

--
-- Indexes for table `t_tanah_rn_detail`
--
ALTER TABLE `t_tanah_rn_detail`
  ADD PRIMARY KEY (`id_tn`),
  ADD KEY `id_aset` (`id_aset`);

--
-- Indexes for table `unit`
--
ALTER TABLE `t_unit`
  ADD PRIMARY KEY (`kode_unit`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_user` (`kode_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_aset`
--
ALTER TABLE `t_aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_penghuni`
--
ALTER TABLE `t_penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_rn_detail`
--
ALTER TABLE `t_rn_detail`
  MODIFY `id_rn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tanah_rn_detail`
--
ALTER TABLE `t_tanah_rn_detail`
  MODIFY `id_tn` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_aset`
--
ALTER TABLE `t_aset`
  ADD CONSTRAINT `fk_aset` FOREIGN KEY (`kode_unit`) REFERENCES `t_unit` (`kode_unit`);

--
-- Constraints for table `history_penghunian`
--
ALTER TABLE `history_penghunian`
  ADD CONSTRAINT `fk_penghuni` FOREIGN KEY (`id_penghuni`) REFERENCES `t_penghuni` (`id_penghuni`);
--
-- Constraints for table `t_penghuni`
--
ALTER TABLE `t_penghuni`
  ADD CONSTRAINT `fk_id_penghuni` FOREIGN KEY (`kode_unit`) REFERENCES `t_unit` (`kode_unit`);

--
-- Constraints for table `t_rn_detail`
--
ALTER TABLE `t_rn_detail`
  ADD CONSTRAINT `fk_aset2` FOREIGN KEY (`id_aset`) REFERENCES `t_aset` (`id_aset`),
  ADD CONSTRAINT `fk_id_history` FOREIGN KEY (`id_history`) REFERENCES `history_penghunian` (`id_history`),
  ADD CONSTRAINT `fk_id_tn` FOREIGN KEY (`id_tn`) REFERENCES `t_tanah_rn_detail` (`id_tn`);

--
-- Constraints for table `t_tanah_rn_detail`
--
ALTER TABLE `t_tanah_rn_detail`
  ADD CONSTRAINT `fk_asset` FOREIGN KEY (`id_aset`) REFERENCES `t_aset` (`id_aset`);

--
-- Constraints for table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`kode_unit`) REFERENCES `t_unit` (`kode_unit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
