-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2024 at 06:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `alternatif_id` int(11) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `perhitungan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`alternatif_id`, `nama_alternatif`, `perhitungan_id`) VALUES
(1, 'Adih Venanda Angri Awan', 1),
(2, 'Agus Winardi', 1),
(3, 'Ahmad Safingudin', 1),
(4, 'Ali Zaenal Abidin', 1),
(5, 'Ami Asmini', 1),
(6, 'Arif Hidayat Akbar', 1),
(7, 'Aulia Karima Zuhda Utami', 1),
(8, 'Dian Inugrah Wijayanti', 1),
(9, 'Diyah Ratnasari', 1),
(10, 'Yulianti Wardani', 1),
(11, 'Itmamul Wafa', 1),
(12, 'Joni Setiyawan', 1),
(13, 'Khudori', 1),
(14, 'Lusinah', 1),
(15, 'Masruri', 1),
(16, 'Moh. Asroni', 1),
(17, 'Moh. Sun Ngali', 1),
(18, 'Mokhamad Sahidin', 1),
(19, 'Muarif Mahmud Suhada', 1),
(20, 'Muyazidil Khoiri', 1),
(21, 'Najib Irwanto', 1),
(22, 'Nur Khafiana', 1),
(23, 'Nur Laeli', 1),
(24, 'Pramudhita Dyah Nugraheni', 1),
(25, 'Rohmat Rivai', 1),
(26, 'Siti Anisah', 1),
(27, 'Siti Halimah', 1),
(28, 'Siti Mulyati', 1),
(29, 'Siti Salimah', 1),
(30, 'Sri Khotimah', 1),
(31, 'Suharti', 1),
(32, 'Sumargiyaningsih', 1),
(33, 'Surinta Arimurti', 1),
(34, 'Suwignyo', 1),
(35, 'Syamsul Arifin', 1),
(36, 'Tri Palupi', 1),
(37, 'Tursini', 1),
(38, 'Yuli Novita Sari', 1),
(39, 'Endhang Agustina Arianingrum', 1),
(40, 'Zidna Karimatunisa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_perhitungan`
--

CREATE TABLE `detail_perhitungan` (
  `enroll_id` varchar(7) NOT NULL,
  `nilai_akhir` float DEFAULT NULL,
  `perhitungan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_perhitungan`
--

INSERT INTO `detail_perhitungan` (`enroll_id`, `nilai_akhir`, `perhitungan_id`) VALUES
('1#1', 26.5, 1),
('1#2', 24, 1),
('1#3', 18.5, 1),
('1#4', 49, 1),
('1#5', 34.5, 1),
('1#6', 21, 1),
('1#7', 10.6, 1),
('10#1', 20.5, 1),
('10#2', 31, 1),
('10#3', 29.5, 1),
('10#4', 63, 1),
('10#5', 36.5, 1),
('10#6', 24.25, 1),
('10#7', 10.75, 1),
('11#1', 22, 1),
('11#2', 35, 1),
('11#3', 28.5, 1),
('11#4', 56.5, 1),
('11#5', 37, 1),
('11#6', 23, 1),
('11#7', 7.9, 1),
('12#1', 22, 1),
('12#2', 37.5, 1),
('12#3', 25, 1),
('12#4', 53, 1),
('12#5', 37, 1),
('12#6', 20.75, 1),
('12#7', 12.95, 1),
('13#1', 22, 1),
('13#2', 40.5, 1),
('13#3', 27, 1),
('13#4', 65, 1),
('13#5', 41, 1),
('13#6', 23.75, 1),
('13#7', 16.55, 1),
('14#1', 20, 1),
('14#2', 37.5, 1),
('14#3', 24.5, 1),
('14#4', 59, 1),
('14#5', 37, 1),
('14#6', 22.5, 1),
('14#7', 11.15, 1),
('15#1', 20, 1),
('15#2', 45, 1),
('15#3', 26, 1),
('15#4', 63, 1),
('15#5', 38.5, 1),
('15#6', 25.25, 1),
('15#7', 15.8, 1),
('16#1', 24.5, 1),
('16#2', 34.5, 1),
('16#3', 24, 1),
('16#4', 55, 1),
('16#5', 38.5, 1),
('16#6', 22, 1),
('16#7', 12.9, 1),
('17#1', 21, 1),
('17#2', 34.5, 1),
('17#3', 24, 1),
('17#4', 48, 1),
('17#5', 34.5, 1),
('17#6', 19.25, 1),
('17#7', 12.4, 1),
('18#1', 15, 1),
('18#2', 39, 1),
('18#3', 29.5, 1),
('18#4', 59, 1),
('18#5', 38, 1),
('18#6', 23, 1),
('18#7', 11.5, 1),
('19#1', 23.5, 1),
('19#2', 32.5, 1),
('19#3', 19, 1),
('19#4', 49, 1),
('19#5', 34.5, 1),
('19#6', 21.75, 1),
('19#7', 9, 1),
('2#1', 15.5, 1),
('2#2', 23, 1),
('2#3', 26, 1),
('2#4', 55, 1),
('2#5', 40, 1),
('2#6', 22, 1),
('2#7', 10.2, 1),
('20#1', 13.5, 1),
('20#2', 28, 1),
('20#3', 30, 1),
('20#4', 54, 1),
('20#5', 39.5, 1),
('20#6', 22.75, 1),
('20#7', 7.65, 1),
('21#1', 19.5, 1),
('21#2', 26.5, 1),
('21#3', 21.5, 1),
('21#4', 54, 1),
('21#5', 36, 1),
('21#6', 22, 1),
('21#7', 7.3, 1),
('22#1', 19.5, 1),
('22#2', 35, 1),
('22#3', 28, 1),
('22#4', 61, 1),
('22#5', 36, 1),
('22#6', 22.5, 1),
('22#7', 13.5, 1),
('23#1', 16, 1),
('23#2', 36.5, 1),
('23#3', 22, 1),
('23#4', 58, 1),
('23#5', 37, 1),
('23#6', 22, 1),
('23#7', 16.55, 1),
('24#1', 19.5, 1),
('24#2', 29.5, 1),
('24#3', 24.5, 1),
('24#4', 56, 1),
('24#5', 34, 1),
('24#6', 22, 1),
('24#7', 8.5, 1),
('25#1', 21.5, 1),
('25#2', 32.5, 1),
('25#3', 26.5, 1),
('25#4', 52, 1),
('25#5', 33, 1),
('25#6', 18.25, 1),
('25#7', 8.6, 1),
('26#1', 20.5, 1),
('26#2', 42, 1),
('26#3', 26, 1),
('26#4', 54, 1),
('26#5', 40, 1),
('26#6', 22.5, 1),
('26#7', 12.6, 1),
('27#1', 19.5, 1),
('27#2', 34.5, 1),
('27#3', 30, 1),
('27#4', 55, 1),
('27#5', 38, 1),
('27#6', 23, 1),
('27#7', 16.6, 1),
('28#1', 20.5, 1),
('28#2', 34.5, 1),
('28#3', 24, 1),
('28#4', 56, 1),
('28#5', 37, 1),
('28#6', 22, 1),
('28#7', 10.5, 1),
('29#1', 19, 1),
('29#2', 36.5, 1),
('29#3', 22.5, 1),
('29#4', 46, 1),
('29#5', 37.5, 1),
('29#6', 20, 1),
('29#7', 12.1, 1),
('3#1', 20.5, 1),
('3#2', 36, 1),
('3#3', 39, 1),
('3#4', 55, 1),
('3#5', 41, 1),
('3#6', 23.5, 1),
('3#7', 13.45, 1),
('30#1', 19.5, 1),
('30#2', 36.5, 1),
('30#3', 28, 1),
('30#4', 54, 1),
('30#5', 37, 1),
('30#6', 18, 1),
('30#7', 10.1, 1),
('31#1', 20.5, 1),
('31#2', 37, 1),
('31#3', 25.5, 1),
('31#4', 57, 1),
('31#5', 37.5, 1),
('31#6', 23, 1),
('31#7', 7.95, 1),
('32#1', 20.5, 1),
('32#2', 34.5, 1),
('32#3', 24, 1),
('32#4', 56, 1),
('32#5', 37, 1),
('32#6', 22, 1),
('32#7', 9.6, 1),
('33#1', 22, 1),
('33#2', 31, 1),
('33#3', 24.5, 1),
('33#4', 52, 1),
('33#5', 34.5, 1),
('33#6', 22.5, 1),
('33#7', 13.15, 1),
('34#1', 22, 1),
('34#2', 35, 1),
('34#3', 29, 1),
('34#4', 62, 1),
('34#5', 38.5, 1),
('34#6', 23, 1),
('34#7', 10.35, 1),
('35#1', 21, 1),
('35#2', 29, 1),
('35#3', 27, 1),
('35#4', 55.5, 1),
('35#5', 33.5, 1),
('35#6', 21.75, 1),
('35#7', 8.95, 1),
('36#1', 21.5, 1),
('36#2', 35.5, 1),
('36#3', 22.5, 1),
('36#4', 50.5, 1),
('36#5', 33, 1),
('36#6', 19, 1),
('36#7', 13.7, 1),
('37#1', 19.5, 1),
('37#2', 38.5, 1),
('37#3', 28, 1),
('37#4', 49, 1),
('37#5', 37, 1),
('37#6', 22, 1),
('37#7', 12.1, 1),
('38#1', 19.5, 1),
('38#2', 22.75, 1),
('38#3', 23, 1),
('38#4', 54, 1),
('38#5', 34.5, 1),
('38#6', 23, 1),
('38#7', 7.025, 1),
('39#1', 21, 1),
('39#2', 33.5, 1),
('39#3', 27, 1),
('39#4', 52, 1),
('39#5', 40, 1),
('39#6', 23, 1),
('39#7', 13.4, 1),
('4#1', 20.5, 1),
('4#2', 30.5, 1),
('4#3', 28.5, 1),
('4#4', 53, 1),
('4#5', 37, 1),
('4#6', 23, 1),
('4#7', 8.95, 1),
('40#1', 20.5, 1),
('40#2', 26, 1),
('40#3', 28, 1),
('40#4', 53, 1),
('40#5', 35.5, 1),
('40#6', 23, 1),
('40#7', 9.6, 1),
('5#1', 18, 1),
('5#2', 35.5, 1),
('5#3', 24.5, 1),
('5#4', 58, 1),
('5#5', 37, 1),
('5#6', 21.5, 1),
('5#7', 16.8, 1),
('6#1', 22, 1),
('6#2', 31, 1),
('6#3', 28, 1),
('6#4', 49, 1),
('6#5', 37, 1),
('6#6', 23, 1),
('6#7', 10.8, 1),
('7#1', 20.5, 1),
('7#2', 25, 1),
('7#3', 24, 1),
('7#4', 53, 1),
('7#5', 40, 1),
('7#6', 23, 1),
('7#7', 11.5, 1),
('8#1', 19.5, 1),
('8#2', 35, 1),
('8#3', 29.5, 1),
('8#4', 61, 1),
('8#5', 37, 1),
('8#6', 23, 1),
('8#7', 18.95, 1),
('9#1', 22, 1),
('9#2', 35, 1),
('9#3', 24.5, 1),
('9#4', 52, 1),
('9#5', 34.5, 1),
('9#6', 22.25, 1),
('9#7', 12.15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot` float NOT NULL,
  `perhitungan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `nama_kriteria`, `bobot`, `perhitungan_id`) VALUES
(1, 'Penguasaan IPTEK', 20, 1),
(2, 'Penguasaan Materi\r\n', 70, 1),
(3, 'Pemahaman terhadap Siswa\r\n', 60, 1),
(4, 'Tanggung Jawab\r\n', 40, 1),
(5, 'Kedisiplinan\r\n', 50, 1),
(6, 'Kreativitas dan Komunikasi\r\n', 25, 1),
(7, 'Pengalaman\r\n', 15, 1),
(1, 'Penguasaan IPTEK', 20, 17),
(2, 'Penguasaan Materi ', 70, 17),
(3, 'Pemahaman terhadap Siswa Pemahaman terhadap Siswa ', 60, 17),
(4, 'Tanggung Jawab ', 40, 17),
(5, 'Kedisiplinan', 50, 17),
(6, 'Kreativitas dan Komunikasi', 25, 17),
(7, 'Pengalaman', 15, 17);

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan`
--

CREATE TABLE `perhitungan` (
  `perhitungan_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perhitungan`
--

INSERT INTO `perhitungan` (`perhitungan_id`, `title`, `keterangan`, `user_id`, `created_at`) VALUES
(1, 'Perhitungan Mts N 8 Kebumen', 'Tahun 2021', 1, '2024-12-24 07:04:40'),
(17, 'Perangkingan guru Mts N 8 Kebumen', 'Tahun', 1, '2024-12-25 00:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(12) NOT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `instansi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `username`, `alamat`, `email`, `instansi`) VALUES
(1, 'admin1234', 'Admin1', NULL, 'admin1@example.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`perhitungan_id`,`alternatif_id`),
  ADD KEY `fk_perhitungan_id_perhitungan` (`perhitungan_id`);

--
-- Indexes for table `detail_perhitungan`
--
ALTER TABLE `detail_perhitungan`
  ADD PRIMARY KEY (`enroll_id`,`perhitungan_id`),
  ADD KEY `perhitungan_id` (`perhitungan_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`perhitungan_id`,`kriteria_id`),
  ADD KEY `kirteria_ibfk_1` (`perhitungan_id`);

--
-- Indexes for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD PRIMARY KEY (`perhitungan_id`),
  ADD KEY `fk_user_id_users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perhitungan`
--
ALTER TABLE `perhitungan`
  MODIFY `perhitungan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `fk_perhitungan_id_perhitungan` FOREIGN KEY (`perhitungan_id`) REFERENCES `perhitungan` (`perhitungan_id`);

--
-- Constraints for table `detail_perhitungan`
--
ALTER TABLE `detail_perhitungan`
  ADD CONSTRAINT `detail_perhitungan_ibfk_1` FOREIGN KEY (`perhitungan_id`) REFERENCES `perhitungan` (`perhitungan_id`);

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kirteria_ibfk_1` FOREIGN KEY (`perhitungan_id`) REFERENCES `perhitungan` (`perhitungan_id`);

--
-- Constraints for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD CONSTRAINT `fk_user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
