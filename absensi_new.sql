-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 04:22 PM
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
(11, '2022-06-24', '20:46:31', 'Masuk', 2),
(12, '2022-06-24', '20:47:31', 'Masuk', 3),
(13, '2022-06-24', '20:51:38', 'Pulang', 3);

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
(2, 'Manajer', '3400000'),
(4, 'Karyawan', '4100000'),
(5, 'Umum', '3500000');

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
(2, '12312312312312', 'Sandhika', '+1 (158) 686-93', 'buceny@mailinator.com', 'no-foto.png', 2, 'user1', '$2y$10$DQgqeJUIFR0kJzYc/J20zOZdigq.vARKTc4SHna.Y75q9jpHrpYWa', 'Karyawan'),
(3, '23423423423423423', 'Galih', '+1 (853) 151-81', 'user2@mail.com', 'no-foto.png', 4, 'user2', '$2y$10$Zvjojj0Bl9a8wwKwxgnoO.wxNLc5zUscDVFbHtdnqvqMTHHsMf4uO', 'Karyawan'),
(4, '', 'UMUM & KEUANGAN', '0823227777', 'dprdkapuashulu@gmail.com', '1653359977.png', NULL, 'keuangan', '$2y$10$k2sC2A72HvZ1ZK65/.sEJeIq0q8AcarBBlQPyN/os0hofjjXl.IO2', 'UmumKeuangan');

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
