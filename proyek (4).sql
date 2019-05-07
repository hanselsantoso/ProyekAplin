-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 10:03 AM
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
  `id_kelas` varchar(5) NOT NULL,
  `waktu_absendosen` time NOT NULL,
  `waktu_keluardosen` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen_dosen`
--

INSERT INTO `absen_dosen` (`id_absendosen`, `id_dosen`, `id_kelas`, `waktu_absendosen`, `waktu_keluardosen`) VALUES
('AD001', 'D0001', 'KE001', '08:00:00', '10:15:00'),
('AD002', 'D0002', 'KE002', '10:30:00', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `absen_siswa`
--

DROP TABLE IF EXISTS `absen_siswa`;
CREATE TABLE `absen_siswa` (
  `id_absensiswa` varchar(6) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `nrp` varchar(9) NOT NULL,
  `waktu_absensiswa` time NOT NULL,
  `waktu_keluarsiswa` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen_siswa`
--

INSERT INTO `absen_siswa` (`id_absensiswa`, `id_kelas`, `nrp`, `waktu_absensiswa`, `waktu_keluarsiswa`) VALUES
('AS0001', 'KE001', '219110001', '08:00:00', '10:30:00'),
('AS0002', 'KE002', '219180001', '10:30:00', '13:00:00'),
('AS0003', 'KE003', '219180002', '13:02:00', '15:35:00');

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

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama`, `password`) VALUES
('D0001', 'Aldo', 'abcd'),
('D0002', 'Hansel', '123456'),
('D0003', 'Adriel', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `id_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
('21911', 'Teknik Informatika'),
('21913', 'Teknik Elektro'),
('21918', 'Sistem Informasi Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` varchar(5) NOT NULL,
  `id_matakuliah` varchar(5) NOT NULL,
  `id_dosen` varchar(5) NOT NULL,
  `id_ruangan` varchar(5) NOT NULL,
  `mulai_kelas` time NOT NULL,
  `akhir_kelas` time NOT NULL,
  `hari` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_matakuliah`, `id_dosen`, `id_ruangan`, `mulai_kelas`, `akhir_kelas`, `hari`) VALUES
('KE001', 'MK001', 'D0001', 'RU001', '08:00:00', '10:30:00', '2019-05-06'),
('KE002', 'MK003', 'D0003', 'RU003', '10:30:00', '13:00:00', '2019-05-06'),
('KE003', 'MK005', 'D0002', 'RU002', '13:00:00', '15:30:00', '2019-05-06'),
('KE004', 'MK002', 'D0002', 'RU002', '08:00:00', '10:30:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `nrp` varchar(9) NOT NULL,
  `id_jurusan` varchar(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `id_jurusan`, `nama`, `password`, `status`) VALUES
('219110001', '21911', 'Irvan Ferdinan', 'abcde', 1),
('219180001', '21918', 'Aldo Kesuma Karman', '123456', 1),
('219180002', '21918', 'Kevin Wijaya', 'qwerty', 1);

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

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_matakuliah`, `id_jurusan`, `nama_matakuliah`) VALUES
('MK001', '21918', 'Aplikasi Internet'),
('MK002', '21918', 'Proyek Bisnis 1'),
('MK003', '21918', 'Jaringan Komputer'),
('MK004', '21911', 'Alpro 2'),
('MK005', '21911', 'Software Development Project'),
('MK006', '21911', 'Rangkaian Digital');

-- --------------------------------------------------------

--
-- Table structure for table `mengambil_kelas`
--

DROP TABLE IF EXISTS `mengambil_kelas`;
CREATE TABLE `mengambil_kelas` (
  `nrp` varchar(9) NOT NULL,
  `id_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mengambil_kelas`
--

INSERT INTO `mengambil_kelas` (`nrp`, `id_kelas`) VALUES
('219110001', 'KE001'),
('219180001', 'KE002'),
('219180002', 'KE003');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

DROP TABLE IF EXISTS `ruangan`;
CREATE TABLE `ruangan` (
  `id_ruangan` varchar(5) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `kapasitas` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `kapasitas`) VALUES
('', 'U301', 0),
('3', '', 0),
('RU', 'E-301', 0),
('RU001', 'B-301', 0),
('RU002', 'B-302', 0),
('RU003', 'B-303', 0),
('RU004', 'E-301', 0),
('RU005', 'E-302', 0),
('RU006', 'E-303', 0),
('RU007', 'E-303', 0),
('RU008', 'E-304', 0),
('RU009', '', 0),
('RU010', 'e-307', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_dosen`
--
ALTER TABLE `absen_dosen`
  ADD PRIMARY KEY (`id_absendosen`),
  ADD KEY `fk_absendosen` (`id_dosen`),
  ADD KEY `fk_kelasdosen` (`id_kelas`);

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
  ADD CONSTRAINT `fk_absendosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`),
  ADD CONSTRAINT `fk_kelasdosen` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

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
