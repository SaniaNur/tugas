-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 06:54 PM
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
('11', 26, 'sans', 'Laki-laki', 'dfghjm', '0987654321'),
('22', 46, 'mei', 'Laki-laki', 'asdfghjn', '09876543221');

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
,`noHalamanA` int(2)
,`noHalamanB` int(2)
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
,`noHalamanA` int(2)
,`noHalamanB` int(2)
,`tanggal` date
,`nilai` int(3)
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
  `noHalamanA` int(2) DEFAULT NULL,
  `noHalamanB` int(2) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `nilai` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inputhafalan`
--

INSERT INTO `inputhafalan` (`id_hafalan`, `noJuz`, `NIS`, `no_guru`, `jenis`, `noHalamanA`, `noHalamanB`, `tanggal`, `nilai`) VALUES
(1, 1, '3333', '11', 'ziadah', 2, 3, '2017-05-01', 55),
(10, 1, '4444', '22', 'ziadah', 4, 5, '2017-03-15', 64),
(11, 1, '4444', '22', 'murojaah', 3, 3, '2017-03-15', 87),
(12, 1, '4444', '22', 'ziadah', 5, 6, '2017-03-16', 45),
(13, 1, '4444', '22', 'murojaah', 4, 4, '2017-03-16', 88),
(14, 1, '4444', '22', 'ziadah', 6, 7, '2017-03-17', 98),
(15, 1, '4444', '22', 'murojaah', 5, 6, '2017-03-17', 79),
(16, 2, '4444', '22', 'ziadah', 7, 8, '2017-04-06', 56),
(17, 2, '4444', '22', 'murojaah', 6, 7, '2017-04-06', 75),
(18, 2, '4444', '22', 'ziadah', 8, 9, '2017-04-07', 46),
(19, 2, '4444', '22', 'murojaah', 7, 7, '2017-04-07', 34),
(20, 2, '4444', '22', 'murojaah', 8, 9, '2017-04-08', 66),
(22, 1, '3333', '11', 'ziadah', 8, 9, '2017-05-08', 77),
(23, 2, '4444', '22', 'ziadah', 9, 10, '2017-04-08', 82),
(24, 3, '4444', '22', 'ziadah', 11, 12, '2017-05-09', 52),
(25, 3, '4444', '22', 'murojaah', 10, 11, '2017-05-09', 57),
(26, 3, '4444', '22', 'ziadah', 5, 6, '2017-05-10', 89),
(27, 3, '4444', '22', 'murojaah', 5, 6, '2017-05-10', 33),
(28, 3, '4444', '22', 'ziadah', 7, 8, '2017-05-11', 56),
(29, 3, '4444', '22', 'murojaah', 7, 7, '2017-05-11', 87);

-- --------------------------------------------------------

--
-- Table structure for table `juz`
--

CREATE TABLE `juz` (
  `noJuz` int(2) NOT NULL,
  `jumlahHalaman` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `juz`
--

INSERT INTO `juz` (`noJuz`, `jumlahHalaman`) VALUES
(1, 19),
(2, 20),
(3, 20),
(4, 20),
(5, 20),
(30, 23);

-- --------------------------------------------------------

--
-- Table structure for table `juz_surah`
--

CREATE TABLE `juz_surah` (
  `id` int(5) NOT NULL,
  `surah_id` int(5) NOT NULL,
  `juz_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `juz_surah`
--

INSERT INTO `juz_surah` (`id`, `surah_id`, `juz_id`) VALUES
(1, 1, 1),
(2, 1, 3);

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
  `no_guru` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noHp` varchar(12) NOT NULL,
  `namaIbu` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `id_user`, `no_guru`, `nama`, `jenisKelamin`, `kelas`, `alamat`, `noHp`, `namaIbu`) VALUES
('3333', 43, '11', 'aaaa', 'Laki-laki', 'X', 'asdfghj', '0987654321', 'dddd'),
('3334', 45, '11', 'nana', 'Laki-laki', 'X', 'fgvhbn', '0987654321', 'ffff'),
('4444', 47, '22', 'bababa', 'Laki-laki', 'XI IPA 1', 'sdfghjkl', '1234567890', 'sasasa');

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
  `halamanAwal` int(2) NOT NULL,
  `halamanAkhir` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surah`
--

INSERT INTO `surah` (`id`, `nama`, `halamanAwal`, `halamanAkhir`) VALUES
(1, 'albaqoroh', 0, 0);

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
(25, 'pppp', '1212', '$2y$10$NMZxV3mes2EMM0JMRulw1OprpVLjRVEXc.AIVzpDJJB78HDjxJPry', 'cjvMZaNwQ8SnZwWGQz25haz93J2GjIW4KZy9v3VrmkgjZsWvI03GRz1pkZRf', '2017-05-12 00:02:24', '2017-05-16 02:42:07', 'Siswa'),
(26, 'sans', '11', '$2y$10$QAxOeDKFyG.Kkh.DUONWCOP8ar5qBqafg2sbsksrcLoWtruY56ySm', 'vqbbXanhDyRaKxQvkDgGVuovRcoyUnf3GFoGrIThHMt3U0HVm1cMwwYGL9Gv', '2017-05-12 00:09:35', '2017-05-20 02:55:07', 'Guru'),
(39, 'aaa', '13', '$2y$10$vTwg7mP1zCfqK3gXJS6HiO8Uz04gJKaPTMkp/SmkAkQuV.TdnRwe2', NULL, '2017-05-20 02:52:42', '2017-05-20 02:52:42', 'Guru'),
(42, 'aaa', '14', '$2y$10$msbWNs46udVlr05/JYxL5O5xnZ/qvg/a9pflY4j6r8p6or.s.XK92', NULL, '2017-05-20 02:53:22', '2017-05-20 02:53:22', 'Guru'),
(43, 'aaaa', '3333', '$2y$10$5VU5c6p/db7ttw5wauSt3OZv1S2jr.nwFIxDIHWh5yxYSs1//2Beu', 'vh3hk1Bsgqxzxwa2NgreY1Hyl6CcmqHjILAgrnb5Bg6TXtvvXhWQPyUw89Od', '2017-05-20 02:57:46', '2017-05-20 02:57:46', 'Siswa'),
(44, 'hani', '12', '$2y$10$2Su7ZAXidAnjjAwJdN3YEeUEOiJy7786gsZ3qcCpJWPlt0xWli76.', NULL, '2017-05-20 23:05:17', '2017-05-20 23:05:17', 'Guru'),
(45, 'nana', '3334', '$2y$10$fkbfA5KaQgSvdvbrjIdTOueuZzzzadkfoMcktn4.Y0ozmvsQ472da', NULL, '2017-05-20 23:05:51', '2017-05-20 23:05:51', 'Siswa'),
(46, 'mei', '22', '$2y$10$nZZzpeBMPPL5Bu8GQw8MxeDF.2y9ETzL5WcyaiOSO044koZkAURQO', 'dXGFtqrsRCjRmIRVWf6gMzVJE4Lq0crzqCDTFpDbo1hLmwMcbLCAb75NxJxi', '2017-05-25 22:35:11', '2017-05-25 22:35:11', 'Guru'),
(47, 'bababa', '4444', '$2y$10$VvFXWgJT7gimYP6CtpJ4h.XZmgHTznpe4am63m6F/Uv.SK9lP/UrS', 'PXCpgFBWOeb3hVyONO6aYngp0N6HK0EqxlV7Da6Zt9JAuQb6q0m8EXNd81hH', '2017-05-25 22:35:50', '2017-05-31 00:37:09', 'Siswa'),
(48, 'neniya', '33', '$2y$10$5NruP2hFI6NByFJ01TsjLOQkaqjG.zCY2vkhbL2fuBkpcfN/.FvWG', NULL, '2017-05-30 00:24:36', '2017-05-30 00:31:24', 'Guru'),
(49, 'riska', '5555', '$2y$10$kkC69q8XVP1QpzdY7hOKO.YPtQtc8fBEETrW8BWGsnPfmt.3wZdKW', 'eV4Hf33LmZ2xdBXE4BJDrDSBceZggzEGTlKvoMPDAExeixCgeRGwXFQSoqYY', '2017-05-30 00:39:07', '2017-05-30 00:39:07', 'Siswa'),
(51, 'riska', '6666', '$2y$10$h6QJRIIIL6t.isYO1Ersa.xJeNFa5fNPD7GATMRq3.47h4YR3CROy', NULL, '2017-05-30 00:42:35', '2017-05-30 00:42:35', 'Siswa'),
(52, 'Admin', 'admin', '$2y$10$Xj8zLZrNIRZ/Mq1IIjlQaeDNHDdgYZ7LSh2vNun..GqQgdvpzZlDa', '1CQBSuoEoFxkhMqeKDPeiC0pT03Sj7kMIj9uPIASsaPdCtkv6ZEIM20P01xK', '2017-05-30 00:53:39', '2017-05-30 00:53:39', 'Admin'),
(53, 'weda', '4455', '$2y$10$k/IexDmuahtmiEjmrlpX4Ovd9S5nKgK4BMQ1w01ajqcOj6b1/W45u', NULL, '2017-05-30 23:48:44', '2017-05-30 23:48:44', 'Siswa'),
(54, 'QQq', '3232', '$2y$10$fqd1crELziTeHAN6Jk/JWuxH.dzE2cWVJsl.JlSMK14pyEgN1jSiK', NULL, '2017-05-31 00:00:57', '2017-05-31 00:00:57', 'Siswa');

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hafalanziadah`  AS  select `inputhafalan`.`id_hafalan` AS `id_hafalan`,`inputhafalan`.`noJuz` AS `noJuz`,`inputhafalan`.`NIS` AS `NIS`,`inputhafalan`.`no_guru` AS `no_guru`,`inputhafalan`.`jenis` AS `jenis`,`inputhafalan`.`noHalamanA` AS `noHalamanA`,`inputhafalan`.`noHalamanB` AS `noHalamanB`,`inputhafalan`.`tanggal` AS `tanggal`,`inputhafalan`.`nilai` AS `nilai` from `inputhafalan` where (`inputhafalan`.`jenis` = 'ziadah') ;

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
  ADD KEY `noJuz` (`noJuz`),
  ADD KEY `NIS` (`NIS`),
  ADD KEY `no_guru` (`no_guru`);

--
-- Indexes for table `juz`
--
ALTER TABLE `juz`
  ADD PRIMARY KEY (`noJuz`);

--
-- Indexes for table `juz_surah`
--
ALTER TABLE `juz_surah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surah` (`surah_id`),
  ADD KEY `juz_id` (`juz_id`);

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
  MODIFY `id_hafalan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `juz_surah`
--
ALTER TABLE `juz_surah`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `surah`
--
ALTER TABLE `surah`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
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
  ADD CONSTRAINT `juz` FOREIGN KEY (`noJuz`) REFERENCES `juz` (`noJuz`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `juz_surah`
--
ALTER TABLE `juz_surah`
  ADD CONSTRAINT `surah` FOREIGN KEY (`surah_id`) REFERENCES `surah` (`id`),
  ADD CONSTRAINT `surahjuz` FOREIGN KEY (`juz_id`) REFERENCES `juz` (`noJuz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `guru_hafalan` FOREIGN KEY (`no_guru`) REFERENCES `guru` (`no_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_siswa` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
