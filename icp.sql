-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 04:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icp`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_dosen`
--

CREATE TABLE `data_dosen` (
  `nip` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_dosen`
--

INSERT INTO `data_dosen` (`nip`, `username`, `nama_dosen`) VALUES
('197406231993121001', 'hermawan', 'HERMAWAN SETIAWAN, S.Si., M.T.I.'),
('197701092005011006', 'girinoto', 'GIRINOTO, S.Si., M.Si.'),
('198512292019021001', 'komang', 'I KOMANG SETIA BUANA, M.T.'),
('198604132017121002', 'herman', 'HERMAN KABETTA, M.T.'),
('198610172017121001', 'budi', 'R BUDIARTO HADIPRAKOSO, MMSI'),
('199102272017122001', 'nurul', 'NURUL QOMARIASIH, M.Si'),
('199211112019022001', 'ray', 'RAY NOVITA YASA, M.Si.');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `npm` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `prodi` enum('rks','rk','rpk','') NOT NULL,
  `bidang_minat` enum('rplk','rsk','-','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`npm`, `username`, `nama_lengkap`, `prodi`, `bidang_minat`) VALUES
(1918101234, 'arion', 'Arion Sapril', 'rpk', '-'),
(1918101412, 'fathur', 'Fathurrahman Rifqi Azzami', 'rk', 'rplk'),
(1918101423, 'azhim', 'Alhafidh Azhimullah', 'rpk', '-'),
(1918101431, 'joko', 'Joko Nugroho ', 'rpk', '-'),
(1918101433, 'bagas', 'Bagas Megantoro', 'rpk', '-'),
(1918101439, 'shaki', 'Shakira Putri Ayunda', 'rk', 'rplk'),
(1918101444, 'rizal', 'Muhammad Rizal Fitrian', 'rpk', '-'),
(1918101460, 'arga', 'Arga Prayoga', 'rk', 'rplk'),
(1918101461, 'aldi', 'Aldi Cahya', 'rks', '-'),
(1918101462, 'dhana', 'Dhana Arvina Alwan', 'rk', 'rplk'),
(1918101463, 'yogi', 'Yogi Ibnu Prasetya', 'rk', 'rplk'),
(1918101465, 'arif', 'Akhmad Rizal Arifudin', 'rk', 'rplk'),
(1918101466, 'yehe', 'Yehezikha Beatrix Natasya Ully', 'rk', 'rplk'),
(1918101467, 'hedian', 'Hedian Alif Hedfanaja', 'rk', 'rplk'),
(1918101468, 'adiva', 'Adiva Fiqri Nugra', 'rk', 'rplk'),
(1918101469, 'adek', 'Adek Muhammad', 'rk', 'rplk'),
(1918101470, 'hilya', 'Hilya Tazkia Kamalia', 'rk', 'rplk'),
(1918101490, 'geby', 'Olga Geby Nabila', 'rk', 'rplk'),
(1918101499, 'ngurah', 'Gusti Agung Ngurah Gde', 'rk', 'rplk');

-- --------------------------------------------------------

--
-- Table structure for table `telaah_icp`
--

CREATE TABLE `telaah_icp` (
  `ID` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `id_dosen` int(10) NOT NULL,
  `prodi` enum('rks','rk','rpk') NOT NULL,
  `judul_ta` varchar(255) NOT NULL,
  `C1` int(10) NOT NULL,
  `C2` enum('sangat iya','iya','kurang','tidak') NOT NULL,
  `C3` enum('iya','tidak','tidak semua') NOT NULL,
  `C4` enum('diterima','diterima dengan perbaikan','ditolak') NOT NULL,
  `indeks_vikor` decimal(6,5) NOT NULL,
  `hasil_prodi` enum('diterima','ditolak','menunggu review') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `telaah_icp`
--

INSERT INTO `telaah_icp` (`ID`, `id_siswa`, `id_dosen`, `prodi`, `judul_ta`, `C1`, `C2`, `C3`, `C4`, `indeks_vikor`, `hasil_prodi`) VALUES
(50, 1, 27, 'rk', 'a1', 90, 'iya', 'tidak semua', 'diterima dengan perbaikan', '0.29832', 'menunggu review'),
(51, 10, 27, 'rk', 'a2', 91, 'sangat iya', 'tidak semua', 'diterima dengan perbaikan', '0.22210', 'menunggu review'),
(52, 10, 27, 'rk', 'a3', 70, 'tidak', 'iya', 'diterima dengan perbaikan', '1.00000', 'menunggu review'),
(53, 17, 27, 'rk', 'a4', 90, 'iya', 'iya', 'diterima dengan perbaikan', '0.23430', 'menunggu review'),
(54, 17, 27, 'rk', 'a5', 86, 'iya', 'tidak', 'diterima dengan perbaikan', '0.54238', 'menunggu review'),
(55, 11, 27, 'rk', 'a6', 86, 'sangat iya', 'iya', 'diterima', '0.14878', 'menunggu review'),
(56, 11, 27, 'rk', 'a7', 87, 'iya', 'tidak semua', 'diterima dengan perbaikan', '0.33491', 'menunggu review'),
(57, 14, 27, 'rk', 'a8', 90, 'sangat iya', 'iya', 'diterima', '0.00000', 'menunggu review'),
(58, 21, 27, 'rk', 'a9', 89, 'iya', 'tidak semua', 'diterima dengan perbaikan', '0.31052', 'menunggu review'),
(59, 22, 27, 'rk', 'a10', 90, 'iya', 'iya', 'diterima dengan perbaikan', '0.23430', 'menunggu review'),
(60, 22, 27, 'rk', 'a11', 86, 'iya', 'iya', 'diterima dengan perbaikan', '0.28308', 'menunggu review'),
(61, 12, 27, 'rk', 'a12', 81, 'tidak', 'tidak semua', 'diterima dengan perbaikan', '0.79863', 'menunggu review'),
(62, 18, 27, 'rk', 'a13', 80, 'tidak', 'iya', 'diterima dengan perbaikan', '0.74680', 'menunggu review'),
(63, 18, 27, 'rk', 'a14', 84, 'tidak', 'iya', 'diterima dengan perbaikan', '0.69802', 'menunggu review'),
(64, 20, 27, 'rk', 'a15', 80, 'iya', 'iya', 'diterima dengan perbaikan', '0.50000', 'menunggu review'),
(65, 19, 27, 'rk', 'a16', 86, 'sangat iya', 'iya', 'diterima', '0.14878', 'menunggu review'),
(66, 19, 27, 'rk', 'a17', 89, 'kurang', 'iya', 'diterima dengan perbaikan', '0.44177', 'menunggu review'),
(67, 15, 27, 'rk', 'a18', 85, 'iya', 'tidak semua', 'diterima dengan perbaikan', '0.37805', 'menunggu review'),
(68, 13, 27, 'rk', 'a19', 78, 'tidak', 'iya', 'diterima dengan perbaikan', '0.77119', 'menunggu review'),
(69, 13, 27, 'rk', 'a20', 80, 'kurang', 'tidak semua', 'diterima dengan perbaikan', '0.62805', 'menunggu review');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cred` enum('siswa','dosen','prodi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `cred`) VALUES
(1, 'adek', 'adek', 'siswa'),
(3, 'ica', 'icaa', 'prodi'),
(4, 'aldi', 'aldi', 'siswa'),
(5, 'arion', 'arion', 'siswa'),
(10, 'adiva', 'adiva', 'siswa'),
(11, 'arga', 'arga', 'siswa'),
(12, 'hedian', 'hedia', 'siswa'),
(13, 'yogi', 'yogi', 'siswa'),
(14, 'dhana', 'dhana', 'siswa'),
(15, 'yehe', 'yehe', 'siswa'),
(16, 'yehe', 'yehe', 'siswa'),
(17, 'arif', 'arif', 'siswa'),
(18, 'hilya', 'hilya', 'siswa'),
(19, 'shaki', 'shaki', 'siswa'),
(20, 'geby', 'geby', 'siswa'),
(21, 'fathur', 'fathur', 'siswa'),
(22, 'ngurah', 'ngurah', 'siswa'),
(23, 'girinoto', 'girinoto', 'dosen'),
(24, 'hermawan', 'hermawan', 'dosen'),
(25, 'komang', 'komang', 'dosen'),
(26, 'herman', 'herman', 'dosen'),
(27, 'budi', 'budi', 'dosen'),
(28, 'nurul', 'nurul', 'dosen'),
(29, 'ray', 'ray', 'dosen'),
(30, 'azhim', 'azhim', 'siswa'),
(31, 'bagas', 'bagas', 'siswa'),
(32, 'joko', 'joko', 'siswa'),
(33, 'rizal', 'rizal', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dosen`
--
ALTER TABLE `data_dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `telaah_icp`
--
ALTER TABLE `telaah_icp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `telaah_icp`
--
ALTER TABLE `telaah_icp`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
