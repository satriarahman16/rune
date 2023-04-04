-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2023 pada 03.16
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

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
-- Struktur dari tabel `t_penghuni`
--

CREATE TABLE `t_penghuni` (
  `id_penghuni` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `jabatan` varchar(200) DEFAULT NULL,
  `pangkat_gol` varchar(40) DEFAULT NULL,
  `kode_unit` varchar(20) DEFAULT NULL,
  `asal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_penghuni`
--

INSERT INTO `t_penghuni` (`id_penghuni`, `nama`, `nip`, `jabatan`, `pangkat_gol`, `kode_unit`, `asal`) VALUES
(1, 'Andi', '1988', 'Pelaksana', 'Pengatur / III.a', '032050600123456000KD', 'KPKNL Banda Aceh'),
(2, 'Budi', NULL, NULL, NULL, NULL, 'Pribadi'),
(3, 'Cindy', NULL, NULL, NULL, NULL, 'Keluarga Pegawai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_penghuni`
--
ALTER TABLE `t_penghuni`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD KEY `fk_id_penghuni` (`kode_unit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_penghuni`
--
ALTER TABLE `t_penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_penghuni`
--
ALTER TABLE `t_penghuni`
  ADD CONSTRAINT `fk_id_penghuni` FOREIGN KEY (`kode_unit`) REFERENCES `t_unit` (`kode_unit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
