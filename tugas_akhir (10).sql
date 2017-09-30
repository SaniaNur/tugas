-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2017 at 03:46 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `no_guru` varchar(20) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noHp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`no_guru`, `id_user`, `nama`, `jenisKelamin`, `alamat`, `noHp`) VALUES
('99999', 57, 'gani', 'Laki-laki', 'hgu', '0987654321');

-- --------------------------------------------------------

--
-- Stand-in structure for view `hafalanmurojaah`
--
CREATE TABLE `hafalanmurojaah` (
`id_hafalan` int(5)
,`noJuz` int(2)
,`NIS` char(4)
,`no_guru` varchar(20)
,`jenis` varchar(20)
,`noHalamanA` float
,`noHalamanB` float
,`tanggal` date
,`nilai` int(3)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `hafalanziadah`
--
CREATE TABLE `hafalanziadah` (
`id_hafalan` int(5)
,`noJuz` int(2)
,`NIS` char(4)
,`no_guru` varchar(20)
,`jenis` varchar(20)
,`noHalamanA` float
,`noHalamanB` float
,`tanggal` date
,`nilai` int(3)
,`totalHalaman` float
);

-- --------------------------------------------------------

--
-- Table structure for table `inputhafalan`
--

CREATE TABLE `inputhafalan` (
  `id_hafalan` int(5) NOT NULL,
  `noJuz` int(2) DEFAULT NULL,
  `NIS` char(4) NOT NULL,
  `no_guru` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `noHalamanA` float DEFAULT NULL,
  `noHalamanB` float DEFAULT NULL,
  `tanggal` date NOT NULL,
  `nilai` int(3) DEFAULT NULL,
  `totalHalaman` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inputhafalan`
--

INSERT INTO `inputhafalan` (`id_hafalan`, `noJuz`, `NIS`, `no_guru`, `jenis`, `noHalamanA`, `noHalamanB`, `tanggal`, `nilai`, `totalHalaman`) VALUES
(1, 1, '7777', '99999', 'ziadah', 1, 5, '2017-09-25', 78, 5),
(2, 1, '7777', '99999', 'murojaah', 1, 3, '2017-09-27', 77, 0),
(3, 1, '7777', '99999', 'ziadah', 4, 5, '2017-09-29', 66, 0),
(4, 1, '7777', '99999', 'murojaah', 2, 3, '2017-09-29', 44, 0),
(5, 1, '7777', '99999', 'ziadah', 2, 9, '2017-09-27', 67, 4),
(6, 1, '7777', '99999', 'murojaah', 4, 4, '2017-09-28', 88, 0),
(7, 1, '7777', '99999', 'ziadah', 4, 6, '2017-09-30', 98, 0),
(9, 1, '8888', '99999', 'murojaah', 1, 3, '2017-09-11', 69, 0),
(10, 1, '8888', '99999', 'murojaah', 4, 9, '2017-09-13', 88, 6),
(11, 1, '8888', '99999', 'murojaah', 2, 2, '2017-09-13', 78, 0),
(15, 1, '8888', '99999', 'ziadah', 4, 4, '2017-09-14', 67, 1),
(16, 1, '8888', '99999', 'murojaah', 4, 10, '2017-09-12', 90, 7),
(17, 1, '8888', '99999', 'ziadah', 5, 12, '2017-09-18', 78, 0),
(18, 1, '8888', '99999', 'ziadah', 6, 13, '2017-09-16', 89, 9);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NIS` char(4) NOT NULL,
  `id_user` int(5) NOT NULL,
  `no_guru` varchar(20) DEFAULT NULL,
  `nama` varchar(40) NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noHp` varchar(12) NOT NULL,
  `namaIbu` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `id_user`, `no_guru`, `nama`, `jenisKelamin`, `kelas`, `alamat`, `noHp`, `namaIbu`) VALUES
('7777', 56, '99999', 'ww', 'Laki-laki', 'X', 'hgjf', '1234567890', 'jhgfh'),
('8888', 58, '99999', 'a', 'Laki-laki', 'X', 'bytf', '0987654321', 'uyguf');

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `hapusSiswa` BEFORE DELETE ON `siswa` FOR EACH ROW DELETE FROM inputhafalan WHERE NIS=old.NIS
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `surah`
--

CREATE TABLE `surah` (
  `id` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `halamanAwal` float NOT NULL,
  `halamanAkhir` float NOT NULL,
  `noJuzAwal` int(2) NOT NULL,
  `noJuzAkhir` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surah`
--

INSERT INTO `surah` (`id`, `nama`, `halamanAwal`, `halamanAkhir`, `noJuzAwal`, `noJuzAkhir`) VALUES
(1, 'Al-Baqarah', 2, 8, 1, 3),
(2, 'Ali ''Imran', 9, 15, 3, 4),
(3, 'An-Nisa''', 16, 4.5, 4, 6),
(4, 'Al-Ma''idah', 4.5, 6, 6, 7),
(5, 'Al-An''am', 6, 9, 7, 8),
(6, 'Al-A''raf', 10, 15, 8, 9),
(7, 'Al-Anfal', 16, 5, 9, 10),
(8, 'At-Taubah', 6, 6, 10, 11),
(9, 'Yunus', 7, 19.5, 11, 11),
(10, 'Hud', 19.5, 13.5, 11, 12),
(11, 'Yusuf', 235.5, 248, 0, 0),
(12, 'Ar-Ra''d', 249, 254, 0, 0),
(13, 'Ibrahim', 255, 261, 0, 0),
(14, 'Al-Hijr', 262, 267.5, 0, 0),
(15, 'An-Nahl', 267.5, 281, 0, 0),
(16, 'Al-Isra''', 282, 293.5, 0, 0),
(17, 'Al-Kahf', 293.5, 304, 0, 0),
(18, 'Maryam', 305, 312.5, 0, 0),
(19, 'At-Taha', 312.5, 321, 0, 0),
(20, 'Al-Nabiya''', 322, 331, 0, 0),
(21, 'Al-Hajj', 332, 341, 0, 0),
(22, 'Al-Mu''minun', 342, 349, 0, 0),
(23, 'An-Nur', 350, 359.5, 0, 0),
(24, 'Al-Furqan', 359.5, 366, 0, 0),
(25, 'Asy-Syu''ara', 367, 376, 0, 0),
(26, 'An-Naml', 377, 385.5, 0, 0),
(27, 'Al-Qasas', 385.5, 396.5, 0, 0),
(28, 'Al-Ankabut', 396.5, 404.5, 0, 0),
(29, 'Al-''Ankabut', 396.5, 404.5, 0, 0),
(30, 'Ar-Rum', 404.5, 410, 0, 0),
(31, 'Al-Luqman', 411, 414, 0, 0),
(32, 'As-Sajdah', 415, 417, 0, 0),
(33, 'Al-Ahzab', 418, 427, 0, 0),
(34, 'Saba''', 428, 434.5, 0, 0),
(35, 'Fatir', 434.5, 439, 0, 0),
(36, 'Yasin', 440, 445, 0, 0),
(37, 'As-Saffat', 446, 452, 0, 0),
(38, 'Sad', 435, 457, 0, 0),
(39, 'Az-Zumar', 458, 466, 0, 0),
(40, 'Gafir', 467, 476, 0, 0),
(41, 'Fussilat', 477, 482, 0, 0),
(42, 'Asy-Syura', 438, 489.5, 0, 0),
(43, 'Az-Zukhraf', 489, 495, 0, 0),
(44, 'Ad-Dukhan', 496, 498, 0, 0),
(45, 'Al-Jasiyah', 499, 502, 0, 0),
(46, 'Al-Ahqaf', 502, 506, 0, 0),
(47, 'Muhammad', 507, 510, 0, 0),
(48, 'Al-Fath', 511, 515.5, 0, 0),
(49, 'Al-Hujurat', 515, 517, 0, 0),
(50, 'Qaf', 518, 520, 0, 0),
(51, 'Az-Zariyat', 521, 523.5, 0, 0),
(52, 'At-Tur', 523.5, 525, 0, 0),
(53, 'An-Najm', 526, 528.5, 0, 0),
(54, 'Al-Qamar', 528.5, 531.5, 0, 0),
(55, 'Ar-Rahman', 531.5, 534.5, 0, 0),
(56, 'Al-Waqiah', 534.5, 537.5, 0, 0),
(57, 'Al-Hadid', 537.5, 541, 0, 0),
(58, 'Al-Mujadalah', 542, 545.5, 0, 0),
(59, 'Al-Hasyr', 545.5, 548, 0, 0),
(60, 'Al-Mumtahanah', 549, 551.5, 0, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalhafalan`
--
CREATE TABLE `totalhafalan` (
`nis` char(4)
,`bulan` int(2)
,`tahun` int(4)
,`totalHalaman` double
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` enum('Admin','Guru','Siswa','') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(4, 'nur', 'nur@mail.com', '$2y$10$PGeAyQ01RMrY/drZvjuYtuYZ9Uw40bQPZcJd2NC79/BWWbmvO6uG2', 'XjeGxELkRDMKCrZWZwNoODaX0HAAD95qsKqjfAU5fjNUA4W4EanGQb37UrvG', '2017-05-03 02:01:03', '2017-05-03 02:01:03', 'Admin'),
(52, 'Admin', 'admin', '$2y$10$NpXGtCq8dU62SpHnp2ytaegMaIHBHDKnvYgLR.VpE.WSglI/WZQ3y', 'OD18q8KHlty82xkWyokP0ViVbALB8qweAMRm7svaPWBFwlXqVRIvd32BPTXr', '2017-05-30 00:53:39', '2017-05-30 00:53:39', 'Admin'),
(54, 'gg', '4444', '$2y$10$5LLnHm90rBwWbwF/oOffcOASLvq6WCCy6.MquoU50NIaUJg9C5T4K', NULL, '2017-08-26 05:59:36', '2017-08-26 05:59:36', 'Siswa'),
(56, 'ww', '7777', '$2y$10$vaTzY3JeKnHBBZGrojEVpesw4OaoftwfJhxt/YzaDLck/Uy6eMg6.', NULL, '2017-09-26 08:53:17', '2017-09-26 09:08:56', 'Siswa'),
(57, 'gani', '999999', '$2y$10$kUUUreK/qOyqOj07QVQUR.G/nnEbdifMSMidn54.g/ayuUWNegy46', 'ldK726Hu1ev9or97rsLqWlXzRZAvRoO6KdkET2ugeuAgYLKPlhY72j3E3WIC', '2017-09-26 09:08:45', '2017-09-26 09:08:45', 'Guru'),
(58, 'a', '8888', '$2y$10$oj25AFDPZxDDB1fAjZW7eeR/Hbk7qKsYNSha/6v6Db0q5EsIphUT6', NULL, '2017-09-26 12:17:09', '2017-09-26 12:17:09', 'Siswa');

-- --------------------------------------------------------

--
-- Structure for view `hafalanmurojaah`
--
DROP TABLE IF EXISTS `hafalanmurojaah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hafalanmurojaah`  AS  select `inputhafalan`.`id_hafalan` AS `id_hafalan`,`inputhafalan`.`noJuz` AS `noJuz`,`inputhafalan`.`NIS` AS `NIS`,`inputhafalan`.`no_guru` AS `no_guru`,`inputhafalan`.`jenis` AS `jenis`,`inputhafalan`.`noHalamanA` AS `noHalamanA`,`inputhafalan`.`noHalamanB` AS `noHalamanB`,`inputhafalan`.`tanggal` AS `tanggal`,`inputhafalan`.`nilai` AS `nilai` from `inputhafalan` where (`inputhafalan`.`jenis` = 'murojaah') ;

-- --------------------------------------------------------

--
-- Structure for view `hafalanziadah`
--
DROP TABLE IF EXISTS `hafalanziadah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hafalanziadah`  AS  select `inputhafalan`.`id_hafalan` AS `id_hafalan`,`inputhafalan`.`noJuz` AS `noJuz`,`inputhafalan`.`NIS` AS `NIS`,`inputhafalan`.`no_guru` AS `no_guru`,`inputhafalan`.`jenis` AS `jenis`,`inputhafalan`.`noHalamanA` AS `noHalamanA`,`inputhafalan`.`noHalamanB` AS `noHalamanB`,`inputhafalan`.`tanggal` AS `tanggal`,`inputhafalan`.`nilai` AS `nilai`,`inputhafalan`.`totalHalaman` AS `totalHalaman` from `inputhafalan` where (`inputhafalan`.`jenis` = 'ziadah') ;

-- --------------------------------------------------------

--
-- Structure for view `totalhafalan`
--
DROP TABLE IF EXISTS `totalhafalan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalhafalan`  AS  select `hafalanziadah`.`NIS` AS `nis`,month(`hafalanziadah`.`tanggal`) AS `bulan`,year(`hafalanziadah`.`tanggal`) AS `tahun`,sum(`hafalanziadah`.`totalHalaman`) AS `totalHalaman` from `hafalanziadah` group by `hafalanziadah`.`NIS`,month(`hafalanziadah`.`tanggal`),year(`hafalanziadah`.`tanggal`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`no_guru`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `inputhafalan`
--
ALTER TABLE `inputhafalan`
  ADD PRIMARY KEY (`id_hafalan`),
  ADD KEY `NIS` (`NIS`),
  ADD KEY `no_guru` (`no_guru`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`),
  ADD UNIQUE KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `no_guru` (`no_guru`);

--
-- Indexes for table `surah`
--
ALTER TABLE `surah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inputhafalan`
--
ALTER TABLE `inputhafalan`
  MODIFY `id_hafalan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `surah`
--
ALTER TABLE `surah`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `user_guru` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inputhafalan`
--
ALTER TABLE `inputhafalan`
  ADD CONSTRAINT `guru` FOREIGN KEY (`no_guru`) REFERENCES `guru` (`no_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `guru_hafalan` FOREIGN KEY (`no_guru`) REFERENCES `guru` (`no_guru`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_siswa` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
