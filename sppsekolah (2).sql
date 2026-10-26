-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 09:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppsekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `namalengkap` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'novita', '698d51a19d8a121ce581499d7b701668', 'novita kharisma nurul azizah '),
(3, 'rani', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'syahrani'),
(7, 'mutil', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'mutia'),
(8, 'lase', '8cb2237d0679ca88db6464eac60da96345513964', 'triolase');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idguru` int(5) NOT NULL,
  `namaguru` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idguru`, `namaguru`) VALUES
(1, 'NOVITA, S.T'),
(4, 'SYAHRANI, S.T'),
(5, 'MUTIA, S.T'),
(6, 'DANIEL, S.T'),
(7, 'NADYA, S.T');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(10) NOT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `namasiswa` varchar(40) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `tahunajaran` varchar(10) DEFAULT NULL,
  `biaya` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nis`, `namasiswa`, `kelas`, `tahunajaran`, `biaya`) VALUES
(1, '202510001', 'Na Jaemin', 'IX A', '2023/2024', 250000),
(2, '202510002', 'Mark Lee', 'VII B', '2025/2026', 250000),
(3, '202510003', 'Haechan', 'VII C', '2025/2026', 250000),
(4, '202510004', 'Huang Renjun', 'VIII A', '2024/2025', 250000),
(5, '202510005', 'Zhong Chenle', 'VIII B', '2024/2025', 250000),
(7, '202510007', 'Park Jisung', 'VIII C', '2024/2025', 250000),
(32, '202410008', 'Park Chanyeol', 'X A', '2024/2025', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(5) NOT NULL,
  `idsiswa` int(10) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `nobayar` varchar(10) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `idadmin` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `idsiswa`, `jatuhtempo`, `bulan`, `nobayar`, `tglbayar`, `jumlah`, `ket`, `idadmin`) VALUES
(1, 1, '2023-10-10', 'Oktober  2023', '20170919', '2023-09-24', 250000, 'LUNAS', 1),
(2, 2, '2023-11-10', 'November  2023', '1809240001', '2023-09-24', 250000, 'LUNAS', 1),
(3, 3, '2023-12-10', 'Desember  2023', '1809240002', '2023-09-24', 250000, 'LUNAS', 1),
(4, 4, '2024-01-10', 'januari  2024', NULL, NULL, 250000, NULL, NULL),
(5, 5, '2024-02-10', 'Februari  2024', NULL, NULL, 250000, NULL, NULL),
(7, 7, '2024-04-10', 'April  2024', NULL, NULL, 250000, NULL, NULL),
(109, 32, '2025-10-10', 'Oktober  2025', '2501190001', '2025-01-19', 500000, 'LUNAS', 1),
(110, 32, '2025-11-10', 'November  2025', '2501190002', '2025-01-19', 500000, 'LUNAS', 1),
(111, 32, '2025-12-10', 'Desember  2025', '2501190003', '2025-01-19', 500000, 'LUNAS', 1),
(112, 32, '2026-01-10', 'januari  2026', '2501190004', '2025-01-19', 500000, 'LUNAS', 1),
(113, 32, '2026-02-10', 'Februari  2026', NULL, NULL, 500000, NULL, NULL),
(114, 32, '2026-03-10', 'Maret  2026', NULL, NULL, 500000, NULL, NULL),
(115, 32, '2026-04-10', 'April  2026', NULL, NULL, 500000, NULL, NULL),
(116, 32, '2026-05-10', 'Mei  2026', NULL, NULL, 500000, NULL, NULL),
(117, 32, '2026-06-10', 'Juni  2026', NULL, NULL, 500000, NULL, NULL),
(118, 32, '2026-07-10', 'Juli  2026', NULL, NULL, 500000, NULL, NULL),
(119, 32, '2026-08-10', 'Agustus  2026', NULL, NULL, 500000, NULL, NULL),
(120, 32, '2026-09-10', 'September  2026', NULL, NULL, 500000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `walikelas`
--

CREATE TABLE `walikelas` (
  `kelas` varchar(10) NOT NULL,
  `idguru` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `walikelas`
--

INSERT INTO `walikelas` (`kelas`, `idguru`) VALUES
('IX A', 1),
('VII C', 1),
('VIII B', 1),
('VII B', 4),
('X A', 5),
('VIII C', 6),
('VIII A', 7),
('IX B', 9),
('VII A', 11),
('X B', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `fk_kelas` (`kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`),
  ADD KEY `fk_admin` (`idadmin`),
  ADD KEY `fk_siswa` (`idsiswa`);

--
-- Indexes for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`kelas`),
  ADD KEY `fk_guru` (`idguru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`kelas`) REFERENCES `walikelas` (`kelas`) ON UPDATE CASCADE;

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_siswa` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
