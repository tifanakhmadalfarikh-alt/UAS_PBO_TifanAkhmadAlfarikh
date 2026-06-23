-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2026 at 03:02 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_trpl1b_tifanakhmadalfarikh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` int NOT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(10,2) NOT NULL,
  `jenis_karyawan` enum('Kontrak','Tetap','Magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(10,2) DEFAULT NULL,
  `opsi_saham_id` varchar(50) DEFAULT NULL,
  `uang_saku_bulanan` decimal(10,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
(1, 'Budi Santoso', 'IT', 20, 150000.00, 'Kontrak', 12, 'PT Tech Source', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', 'HR', 22, 130000.00, 'Kontrak', 6, 'PT SDM Maju', NULL, NULL, NULL, NULL),
(3, 'Ahmad Dahlan', 'Finance', 21, 140000.00, 'Kontrak', 12, 'PT Bina Karya', NULL, NULL, NULL, NULL),
(4, 'Dewi Lestari', 'Marketing', 20, 145000.00, 'Kontrak', 6, 'PT Kreatif Media', NULL, NULL, NULL, NULL),
(5, 'Fajar Pratama', 'IT', 18, 150000.00, 'Kontrak', 12, 'PT Tech Source', NULL, NULL, NULL, NULL),
(6, 'Rina Gunawan', 'Operations', 24, 120000.00, 'Kontrak', 3, 'PT Fast Respon', NULL, NULL, NULL, NULL),
(7, 'Dedi Mulyadi', 'Marketing', 22, 145000.00, 'Kontrak', 6, 'PT Kreatif Media', NULL, NULL, NULL, NULL),
(8, 'Andi Wijaya', 'IT', 24, 250000.00, 'Tetap', NULL, NULL, 500000.00, 'SHM-001', NULL, NULL),
(9, 'Maya Saputri', 'HR', 22, 230000.00, 'Tetap', NULL, NULL, 400000.00, 'SHM-002', NULL, NULL),
(10, 'Bambang Pamungkas', 'Operations', 25, 210000.00, 'Tetap', NULL, NULL, 400000.00, 'SHM-003', NULL, NULL),
(11, 'Rizky Febian', 'Marketing', 21, 240000.00, 'Tetap', NULL, NULL, 450000.00, 'SHM-004', NULL, NULL),
(12, 'Putri Tanjung', 'Finance', 23, 260000.00, 'Tetap', NULL, NULL, 600000.00, 'SHM-005', NULL, NULL),
(13, 'Eko Prasetyo', 'IT', 24, 250000.00, 'Tetap', NULL, NULL, 500000.00, 'SHM-006', NULL, NULL),
(14, 'Ayu Ningtyas', 'HR', 20, 230000.00, 'Tetap', NULL, NULL, 400000.00, 'SHM-007', NULL, NULL),
(15, 'Zainal Abidin', 'IT', 15, 0.00, 'Magang', NULL, NULL, NULL, NULL, 1500000.00, 1),
(16, 'Nadia Saphira', 'Marketing', 14, 0.00, 'Magang', NULL, NULL, NULL, NULL, 1200000.00, 0),
(17, 'Reza Rahadian', 'IT', 16, 0.00, 'Magang', NULL, NULL, NULL, NULL, 1500000.00, 1),
(18, 'Dian Sastro', 'Operations', 15, 0.00, 'Magang', NULL, NULL, NULL, NULL, 1000000.00, 0),
(19, 'Raditya Dika', 'Finance', 12, 0.00, 'Magang', NULL, NULL, NULL, NULL, 1200000.00, 1),
(20, 'Salsa Bila', 'HR', 14, 0.00, 'Magang', NULL, NULL, NULL, NULL, 1000000.00, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
