-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 04:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `tgl`, `waktu`, `keterangan`, `id_user`) VALUES
(29, '2022-06-22', '20:47:48', 'Masuk', 5),
(30, '2022-06-22', '20:47:56', 'Pulang', 5),
(31, '2022-06-23', '20:51:05', 'Masuk', 5),
(32, '2022-06-23', '20:51:10', 'Pulang', 5),
(33, '2022-06-27', '20:56:28', 'Masuk', 5),
(34, '2022-06-27', '20:57:17', 'Pulang', 5);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` smallint(3) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL,
  `gaji_divisi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `gaji_divisi`) VALUES
(2, 'SEKRETARIS DPRD', '5000000'),
(4, 'Kabag Fasilitasi dan Pengawasan', '4500000'),
(5, 'Kabag Persidangan dan Perundang-Undangan', '3500000'),
(9, 'Kabag Tata Usaha dan Kepegawaian', '4000000'),
(10, 'Kabag Umum dan Keuangan', '4600000');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` tinyint(1) NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `start`, `finish`, `keterangan`) VALUES
(1, '06:00:00', '08:15:00', 'Masuk'),
(2, '17:00:00', '19:00:00', 'Pulang');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` smallint(5) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(20) DEFAULT 'no-foto.png',
  `divisi` smallint(5) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('Manager','Karyawan','UmumKeuangan') NOT NULL DEFAULT 'Karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nik`, `nama`, `telp`, `email`, `foto`, `divisi`, `username`, `password`, `level`) VALUES
(1, '', 'SEKRETARIAT DPRD', '0823227777', 'dprdkapuashulu@gmail.com', '1653359977.png', NULL, 'dprd', '$2y$10$k2sC2A72HvZ1ZK65/.sEJeIq0q8AcarBBlQPyN/os0hofjjXl.IO2', 'Manager'),
(2, '196412311990032043', 'H.ABANG MUHAMMAD NASIR,S.Sos', '081258564128', 'abangnasir95@gmail.com', 'no-foto.png', 2, 'nasir', '$2y$10$dTWmVxugZ/Q739JOo07T7u5kg61dEi.TEkm7GkoufOrjdWuGHdpR6', 'Karyawan'),
(3, '196705151995031005', 'Dra. THERESIA LISSA,M.Si', '081345234675', 'ltheresialissa@gmail.com', 'no-foto.png', 4, 'lisa', '$2y$10$iv2b5YdMpRZLfe6tZaZuYOOuE3skxUuXt5BqUJ/kSriilvFGL.rYa', 'Karyawan'),
(4, '', 'UMUM & KEUANGAN', '0823227777', 'dprdkapuashulu@gmail.com', '1653359977.png', NULL, 'keuangan', '$2y$10$k2sC2A72HvZ1ZK65/.sEJeIq0q8AcarBBlQPyN/os0hofjjXl.IO2', 'UmumKeuangan'),
(5, '196812021991031007', 'BAMBANG,SE,M.Si', '085756234567', 'bambang75@gmail.com', 'no-foto.png', 10, 'bambang', '$2y$10$HRzHUnKzShn0EzqcjBc9FuFOpN4raRozTrcdF6U1uoP0LPiWDU.bq', 'Karyawan'),
(6, '196412311990032043', 'ALIYANTO,SE', '081258564128', 'aliyantose23@gmail.com', 'no-foto.png', 5, 'alianto', '$2y$10$PdETlB0kJ0UWszny5109JO1KwgfObhBeOaReOzYTFP95R7kSDJAV6', 'Karyawan'),
(7, '196412311990032043', 'JUANTO,S.Th', '081258564128', 'juanto123@gmail.com', 'no-foto.png', 9, 'juanto', '$2y$10$5/AR4lKlM8drOL0r47gvKOjn9aRCjXE8I/hmDmvNwT9mokXzbR102', 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
