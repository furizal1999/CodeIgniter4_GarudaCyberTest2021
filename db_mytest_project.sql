-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 08:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mytest_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `username` char(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `status_login` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `password` text NOT NULL,
  `status_akun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`username`, `nama_lengkap`, `status_login`, `jabatan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `foto`, `password`, `status_akun`) VALUES
('183510023', 'David Indra', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('183510099', 'Daniel Alves', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('183510111', 'Muhammad Indra', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('183510121', 'Muhammad Dani', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('183510123', 'Zali Syaputra', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('183510138', 'Alfa Syaputra', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('183510201', 'Reza Andin', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('183510222', 'Sofian', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('183510228', 'Roza Firdaus', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('183510321', 'Koni Hernandes', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('183510323', 'Zuladnan', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('183510432', 'Dendi', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('183510654', 'Novriansyah', 'Mahasiswa', 'Mahasiswa', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('furizal123', 'Furizal', 'Pimpinan', 'Rektor', 'Pekanbaru', '1976-03-14', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif'),
('rafi123', 'Rafi', 'Bendahara', 'Bendahara 1', 'Pekanbaru', '1982-03-11', 'Laki-laki', 'avatar-1.png', '$2y$10$soObm/MUaauRZTXSqUZSYOAy1NXQ2X1EfnAjs8h5xl5m0G5oouzlG', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_metode_bayar`
--

CREATE TABLE `tb_metode_bayar` (
  `id_metode_bayar` int(11) NOT NULL,
  `kode_bank` char(50) NOT NULL,
  `metode_bayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_metode_bayar`
--

INSERT INTO `tb_metode_bayar` (`id_metode_bayar`, `kode_bank`, `metode_bayar`) VALUES
(1, '001', 'Bank Mandiri'),
(2, '002', 'Bank BRI'),
(3, '003', 'Bank BNI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tanggal_awal_semester` date NOT NULL,
  `tanggal_akhir_semester` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `id_tahun_ajaran`, `semester`, `tanggal_awal_semester`, `tanggal_akhir_semester`) VALUES
(6, 4, 'Ganjil', '2021-07-01', '2021-12-30'),
(7, 4, 'Genap', '2022-01-01', '2022-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_penginput` varchar(100) NOT NULL,
  `jenis_tagihan` varchar(50) NOT NULL,
  `jumlah_tagihan` double NOT NULL,
  `tanggal_input_tagihan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_tagihan`, `id_semester`, `username`, `nama_penginput`, `jenis_tagihan`, `jumlah_tagihan`, `tanggal_input_tagihan`) VALUES
(3, 6, '183510222', 'Rafi', 'SKS', 7000000, '2022-03-30 17:35:17'),
(4, 6, '183510228', 'Rafi', 'SKS', 500000, '2022-03-30 17:35:17'),
(5, 6, '183510111', 'Rafi', 'SKS', 50000, '2022-03-30 19:41:51'),
(6, 6, '183510023', 'Rafi', 'Pembangunan', 2000000, '2022-03-30 19:43:19'),
(7, 6, '183510432', 'Rafi', 'SPP', 500000, '2022-03-30 19:44:19'),
(8, 7, '183510111', 'Rafi', 'SPP', 3000000, '2022-03-30 20:04:11'),
(9, 6, '183510228', 'Rafi', 'Pembangunan', 500000, '2022-03-31 08:22:42'),
(10, 7, '183510228', 'Rafi', 'Pembangunan', 5000000, '2022-03-31 09:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_ajaran`
--

CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tahun_ajaran`
--

INSERT INTO `tb_tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`) VALUES
(4, '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `id_metode_bayar` int(11) NOT NULL,
  `nama_pembayar` varchar(100) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `jumlah_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_tagihan`, `id_metode_bayar`, `nama_pembayar`, `tanggal_transaksi`, `jumlah_transaksi`) VALUES
(7, 9, 1, 'Roza Firdaus', '2022-03-31 11:17:51', 500000),
(10, 4, 2, 'Roza Firdaus', '2022-03-31 15:38:19', 500000),
(11, 10, 2, 'Roza Firdaus', '2022-03-31 15:38:19', 5000000),
(12, 5, 1, 'Muhammad Indra', '2022-03-31 17:31:03', 50000),
(13, 8, 1, 'Muhammad Indra', '2022-03-31 17:31:03', 3000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_metode_bayar`
--
ALTER TABLE `tb_metode_bayar`
  ADD PRIMARY KEY (`id_metode_bayar`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_metode_bayar`
--
ALTER TABLE `tb_metode_bayar`
  MODIFY `id_metode_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
