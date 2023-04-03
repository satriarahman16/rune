-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2023 at 12:42 AM
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
-- Database: `Rune`
--

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
  `status_validasi` enum('Valid','Tidak Valid','Belum Diperiksa') NOT NULL,
  `id_rn` int(11) NOT NULL,
  `id_penghuni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history_penghunian`
--

INSERT INTO `history_penghunian` (`id_history`, `no_sip`, `tgl_sip`, `tgl_mulai`, `tgl_selesai`, `jenis_penghuni`, `status_validasi`, `id_rn`, `id_penghuni`) VALUES
(1, '100', '2023-04-09', '2023-05-09', '2026-05-09', 'Pegawai', 'Belum Diperiksa', 1, 1),
(2, '102', '1990-04-09', '1990-05-09', '2000-05-09', 'Pribadi', 'Belum Diperiksa', 1, 2),
(3, '103', '1990-04-09', '1990-05-09', '2000-05-09', 'Pribadi', 'Belum Diperiksa', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `r_validasi`
--

CREATE TABLE `r_validasi` (
  `id_validasi` int(11) NOT NULL,
  `status_validasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `r_validasi`
--

INSERT INTO `r_validasi` (`id_validasi`, `status_validasi`) VALUES
(0, 'Belum Dicek'),
(1, 'Valid'),
(2, 'Tidak Valid');

-- --------------------------------------------------------

--
-- Table structure for table `t_aset`
--

CREATE TABLE `t_aset` (
  `id_aset` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `nup` int(40) NOT NULL,
  `kode_unit` varchar(20) NOT NULL,
  `id_validasi` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_aset`
--

INSERT INTO `t_aset` (`id_aset`, `kode_barang`, `nama_barang`, `nup`, `kode_unit`, `id_validasi`) VALUES
(1, '300', 'Rumah Negara 1', 1, '032050600123456000KD', 0),
(2, '301', 'Rumah Negara 2', 2, '032050600123456000KD', 0),
(3, '200', 'Tanah Rumah Negara 1', 1, '032050600123456000KD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_penghuni`
--

CREATE TABLE `t_penghuni` (
  `id_penghuni` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` int(18) DEFAULT NULL,
  `jabatan` varchar(200) DEFAULT NULL,
  `pangkat_gol` varchar(40) DEFAULT NULL,
  `kode_unit` varchar(20) DEFAULT NULL,
  `asal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_penghuni`
--

INSERT INTO `t_penghuni` (`id_penghuni`, `nama`, `nip`, `jabatan`, `pangkat_gol`, `kode_unit`, `asal`) VALUES
(1, 'Andi', 1988, 'Pelaksana', 'Pengatur / III.a', '032050600123456000KD', 'KPKNL Banda Aceh'),
(2, 'Budi', NULL, NULL, NULL, NULL, 'Pribadi'),
(3, 'Cindy', NULL, NULL, NULL, NULL, 'Keluarga Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `t_rn_detail`
--

CREATE TABLE `t_rn_detail` (
  `id_rn` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `alamat` text DEFAULT NULL,
  `lat/long` varchar(20) DEFAULT NULL,
  `status_penggunaan` enum('Digunakan','Idle') NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `luas_rn` int(100) NOT NULL,
  `status_validasi` enum('Valid','Tidak Valid','Belum Diperiksa') NOT NULL,
  `id_tn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_rn_detail`
--

INSERT INTO `t_rn_detail` (`id_rn`, `id_aset`, `alamat`, `lat/long`, `status_penggunaan`, `kondisi`, `luas_rn`, `status_validasi`, `id_tn`) VALUES
(1, 1, NULL, NULL, 'Digunakan', 'Baik', 100, 'Belum Diperiksa', 1),
(2, 2, 'Jalan jalan', NULL, 'Digunakan', 'Baik', 50, 'Belum Diperiksa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_tanah_rn_detail`
--

CREATE TABLE `t_tanah_rn_detail` (
  `id_tn` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `kepemilikan` varchar(100) NOT NULL,
  `kode_unit` varchar(20) NOT NULL,
  `luas_tn` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_tanah_rn_detail`
--

INSERT INTO `t_tanah_rn_detail` (`id_tn`, `id_aset`, `kepemilikan`, `kode_unit`, `luas_tn`) VALUES
(1, 3, 'Milik Satker Sendiri', '032050600123456000KD', 300);

-- --------------------------------------------------------

--
-- Table structure for table `t_unit`
--

CREATE TABLE `t_unit` (
  `kode_unit` varchar(20) NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `jenis_unit` enum('Pengguna Barang - Satker','Pengguna Barang - K/L','Pengelola - KPKNL') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_unit`
--

INSERT INTO `t_unit` (`kode_unit`, `nama_unit`, `jenis_unit`) VALUES
('01', 'KPKNL Banda Aceh', 'Pengelola - KPKNL'),
('032050600123456000KD', 'KPKNL Banda Aceh', 'Pengguna Barang - Satker');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `nip` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `peran` enum('Admin','Pengelola','Pengguna') NOT NULL,
  `kode_unit` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`nip`, `nama`, `peran`, `kode_unit`, `password`) VALUES
(1, '1', 'Admin', '01', '1'),
(2, '2', 'Pengelola', '01', '2'),
(1990, 'EA', 'Admin', '01', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_penghunian`
--
ALTER TABLE `history_penghunian`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `fk_penghuni` (`id_penghuni`),
  ADD KEY `fk_id_rn` (`id_rn`) USING BTREE;

--
-- Indexes for table `r_validasi`
--
ALTER TABLE `r_validasi`
  ADD PRIMARY KEY (`id_validasi`);

--
-- Indexes for table `t_aset`
--
ALTER TABLE `t_aset`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `fk_kode_unit` (`kode_unit`),
  ADD KEY `fk_id_validasi` (`id_validasi`) USING BTREE;

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
  ADD KEY `fk_aset2` (`id_aset`);

--
-- Indexes for table `t_tanah_rn_detail`
--
ALTER TABLE `t_tanah_rn_detail`
  ADD PRIMARY KEY (`id_tn`),
  ADD KEY `id_aset` (`id_aset`);

--
-- Indexes for table `t_unit`
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
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_penghuni`
--
ALTER TABLE `t_penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_rn_detail`
--
ALTER TABLE `t_rn_detail`
  MODIFY `id_rn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_tanah_rn_detail`
--
ALTER TABLE `t_tanah_rn_detail`
  MODIFY `id_tn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_penghunian`
--
ALTER TABLE `history_penghunian`
  ADD CONSTRAINT `fk_penghuni` FOREIGN KEY (`id_penghuni`) REFERENCES `t_penghuni` (`id_penghuni`),
  ADD CONSTRAINT `history_penghunian_ibfk_1` FOREIGN KEY (`id_rn`) REFERENCES `t_rn_detail` (`id_rn`);

--
-- Constraints for table `t_aset`
--
ALTER TABLE `t_aset`
  ADD CONSTRAINT `fk_aset` FOREIGN KEY (`kode_unit`) REFERENCES `t_unit` (`kode_unit`),
  ADD CONSTRAINT `t_aset_ibfk_1` FOREIGN KEY (`id_validasi`) REFERENCES `r_validasi` (`id_validasi`);

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
