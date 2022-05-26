-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 05:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_keuangan_gereja`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `id_anggaran` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `id_tahunanggaran` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `namaanggaran` varchar(250) NOT NULL,
  `tempatanggaran` varchar(250) NOT NULL,
  `penanggungjawab` varchar(250) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sisa` int(11) DEFAULT NULL,
  `status_persetujuan` enum('diterima','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id_anggaran`, `id_departemen`, `id_tahunanggaran`, `tanggal_mulai`, `tanggal_selesai`, `namaanggaran`, `tempatanggaran`, `penanggungjawab`, `jumlah`, `sisa`, `status_persetujuan`) VALUES
(1, 2, 1, '2022-03-02', '2022-03-18', 'Agenda Hari Minggu Update', 'Ditempat Update', 'Ahmad Update', 2000000, 788000, 'diterima'),
(2, 1, 1, '2022-04-01', '2022-04-12', 'Sample Anggaran', 'Tempat Anggaran', 'Sample', 2000000, 2000000, 'diterima'),
(6, 1, 1, '2022-05-04', '2022-05-20', 'Sample', 'Sample', 'Sample', 1000000, 1000000, 'diterima'),
(8, 1, 1, '2022-05-04', '2022-05-21', '-', '-', '-', 1000000, 1000000, 'diterima'),
(9, 1, 1, '2022-05-04', '2022-05-21', '-', '-', '-', 1000000, 1000000, 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `cashadvance`
--

CREATE TABLE `cashadvance` (
  `id_cashadvance` int(11) NOT NULL,
  `id_tahunanggaran` int(11) NOT NULL,
  `id_anggaran` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `penanggung_jawab` varchar(250) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status_persetujuan` enum('diterima','ditolak') NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_pengambilan` enum('belum','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashadvance`
--

INSERT INTO `cashadvance` (`id_cashadvance`, `id_tahunanggaran`, `id_anggaran`, `keterangan`, `penanggung_jawab`, `tanggal`, `status_persetujuan`, `jumlah`, `status_pengambilan`) VALUES
(11, 1, 1, 'Sample fe 2', 'Sample fe 2', '2022-05-14 02:26:23', 'diterima', 12000, 'selesai'),
(13, 1, 1, '-', '-', '2022-05-14 20:12:57', 'ditolak', 1000000, 'belum'),
(14, 1, 1, '-', '-', '2022-05-14 20:39:28', 'diterima', 100000, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`, `keterangan`) VALUES
(1, 'Keuangan 4', 'testing'),
(2, 'Sekretaris 2', 'Sekretaris adalah bagian yang bertanggung jawab atas pelaksanaan tugas-tugas administratif. Sekretaris mengelola permintaan surat, mengurus database BEM, mengelola ruang BEM, dan perpustakaan BEM.');

-- --------------------------------------------------------

--
-- Table structure for table `jemaat`
--

CREATE TABLE `jemaat` (
  `id_jemaat` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jemaat` varchar(200) NOT NULL,
  `kontak` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jemaat`
--

INSERT INTO `jemaat` (`id_jemaat`, `nama`, `alamat`, `jemaat`, `kontak`) VALUES
(1, 'Jamet 3', 'Palangkaraya', 'Indonesia', '088221777888'),
(2, 'Budi', 'Tuban', 'Indonesia', '089776665321'),
(3, 'Jamet 4', 'Palangkaraya juga', 'Indonesia', '088996772121');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `id_jemaat` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `perpuluhan` int(11) NOT NULL,
  `syukur` int(11) NOT NULL,
  `persembahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `jenis` enum('cash','debit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `id_jemaat`, `tanggal`, `perpuluhan`, `syukur`, `persembahan`, `jumlah`, `keterangan`, `jenis`) VALUES
(8, 3, '2022-04-12 18:37:36', 100000, 20000, 0, 120000, 'Testing Update', 'cash'),
(9, 1, '2022-03-30 16:49:20', 10000, 0, 0, 10000, 'sample aja', 'cash'),
(10, 1, '2022-03-30 16:49:33', 10000, 0, 0, 10000, 'test update sample aja', 'cash'),
(18, 1, '2022-05-14 04:47:43', 100000, 0, 0, 100000, 'Sample', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_departemen` int(11) DEFAULT NULL,
  `keterangan` varchar(250) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_departemen`, `keterangan`, `tanggal`, `jumlah`) VALUES
(1, 1, 'Untuk memebeli meja dan kursi yang sudah rusak dan tidak layak di gunakan UPDATED', '2022-03-30 17:59:14', 200000),
(2, 2, 'Untuk membeli keperluan alat dokumentasi', '2022-03-01 00:00:00', 200000),
(4, 1, 'sample', '2022-03-30 00:00:00', 5000),
(5, 1, 'UPDATE TEST', '2022-03-30 17:58:19', 2000),
(12, NULL, 'Anggaran Tahun 2022 2020', '2022-05-14 12:21:25', 100000000),
(13, NULL, 'Anggaran Tahun 2022 2020', '2022-05-14 12:32:35', 100000000),
(14, NULL, 'Anggaran Tahun 2022 2020', '2022-05-14 13:36:33', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tahunanggaran`
--

CREATE TABLE `tahunanggaran` (
  `id_tahunanggaran` int(11) NOT NULL,
  `tahun_anggaran` year(4) NOT NULL,
  `saldo_anggaran` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahunanggaran`
--

INSERT INTO `tahunanggaran` (`id_tahunanggaran`, `tahun_anggaran`, `saldo_anggaran`, `keterangan`) VALUES
(1, 2022, 23000000, 'Tahun anggaran untuk semua keperluan 2022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`) VALUES
(1, 'Yanto Update Lagi', 'yanto123@gmail.com', 'yanto123'),
(2, 'frengki', 'frengki123@gmail.com', 'frengk123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id_anggaran`),
  ADD KEY `id_departemen` (`id_departemen`),
  ADD KEY `id_tahunanggaran` (`id_tahunanggaran`);

--
-- Indexes for table `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD PRIMARY KEY (`id_cashadvance`),
  ADD KEY `id_anggaran` (`id_anggaran`),
  ADD KEY `id_tahunanggaran` (`id_tahunanggaran`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`id_jemaat`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_jemaat` (`id_jemaat`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_departemen` (`id_departemen`);

--
-- Indexes for table `tahunanggaran`
--
ALTER TABLE `tahunanggaran`
  ADD PRIMARY KEY (`id_tahunanggaran`),
  ADD UNIQUE KEY `tahun_anggaran` (`tahun_anggaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cashadvance`
--
ALTER TABLE `cashadvance`
  MODIFY `id_cashadvance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `id_jemaat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tahunanggaran`
--
ALTER TABLE `tahunanggaran`
  MODIFY `id_tahunanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD CONSTRAINT `anggaran_ibfk_1` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`),
  ADD CONSTRAINT `anggaran_ibfk_2` FOREIGN KEY (`id_tahunanggaran`) REFERENCES `tahunanggaran` (`id_tahunanggaran`);

--
-- Constraints for table `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD CONSTRAINT `cashadvance_ibfk_1` FOREIGN KEY (`id_anggaran`) REFERENCES `anggaran` (`id_anggaran`),
  ADD CONSTRAINT `cashadvance_ibfk_3` FOREIGN KEY (`id_tahunanggaran`) REFERENCES `tahunanggaran` (`id_tahunanggaran`);

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `pemasukan_ibfk_1` FOREIGN KEY (`id_jemaat`) REFERENCES `jemaat` (`id_jemaat`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
