-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 01:13 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek`
--
CREATE DATABASE IF NOT EXISTS `proyek` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `proyek`;

-- --------------------------------------------------------

--
-- Table structure for table `absen_dosen`
--

DROP TABLE IF EXISTS `absen_dosen`;
CREATE TABLE `absen_dosen` (
  `id_absendosen` varchar(5) NOT NULL,
  `id_dosen` varchar(5) NOT NULL,
  `waktu_absendosen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `waktu_keluardosen` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `absen_siswa`
--

DROP TABLE IF EXISTS `absen_siswa`;
CREATE TABLE `absen_siswa` (
  `id_absensiswa` varchar(6) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `nrp` varchar(5) NOT NULL,
  `waktu_absensiswa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `waktu_keluarsiswa` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `id_dosen` varchar(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal` (
  `id_jadwal` varchar(5) NOT NULL,
  `jadwal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `id_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` varchar(5) NOT NULL,
  `id_matakuliah` varchar(5) NOT NULL,
  `id_jadwal` varchar(5) NOT NULL,
  `id_dosen` varchar(5) NOT NULL,
  `id_ruangan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `nrp` varchar(5) NOT NULL,
  `id_jurusan` varchar(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

DROP TABLE IF EXISTS `mata_kuliah`;
CREATE TABLE `mata_kuliah` (
  `id_matakuliah` varchar(5) NOT NULL,
  `id_jurusan` varchar(5) NOT NULL,
  `nama_matakuliah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mengambil_kelas`
--

DROP TABLE IF EXISTS `mengambil_kelas`;
CREATE TABLE `mengambil_kelas` (
  `nrp` varchar(5) NOT NULL,
  `id_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

DROP TABLE IF EXISTS `ruangan`;
CREATE TABLE `ruangan` (
  `id_ruangan` varchar(5) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_dosen`
--
ALTER TABLE `absen_dosen`
  ADD PRIMARY KEY (`id_absendosen`),
  ADD KEY `fk_absendosen` (`id_dosen`);

--
-- Indexes for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`id_absensiswa`),
  ADD KEY `fk_absensiswa` (`id_kelas`),
  ADD KEY `fk_nrpsiswa` (`nrp`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `fk_matkulkelas` (`id_matakuliah`),
  ADD KEY `fk_jadwalkelas` (`id_jadwal`),
  ADD KEY `fk_dosenkelas` (`id_dosen`),
  ADD KEY `fk_ruangankelas` (`id_ruangan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`),
  ADD KEY `fk_jurusansiswa` (`id_jurusan`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matakuliah`,`id_jurusan`),
  ADD KEY `fk_ruanganjurusan` (`id_jurusan`);

--
-- Indexes for table `mengambil_kelas`
--
ALTER TABLE `mengambil_kelas`
  ADD KEY `fk_nrpambilkelas` (`nrp`),
  ADD KEY `fk_kelasambil` (`id_kelas`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen_dosen`
--
ALTER TABLE `absen_dosen`
  ADD CONSTRAINT `fk_absendosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD CONSTRAINT `fk_absensiswa` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `fk_nrpsiswa` FOREIGN KEY (`nrp`) REFERENCES `mahasiswa` (`nrp`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_dosenkelas` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`),
  ADD CONSTRAINT `fk_jadwalkelas` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `fk_matkulkelas` FOREIGN KEY (`id_matakuliah`) REFERENCES `mata_kuliah` (`id_matakuliah`),
  ADD CONSTRAINT `fk_ruangankelas` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_jurusansiswa` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `fk_ruanganjurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `mengambil_kelas`
--
ALTER TABLE `mengambil_kelas`
  ADD CONSTRAINT `fk_kelasambil` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `fk_nrpambilkelas` FOREIGN KEY (`nrp`) REFERENCES `mahasiswa` (`nrp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
