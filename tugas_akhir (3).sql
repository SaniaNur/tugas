-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2017 at 03:58 PM
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
('11', 78, 'Atika Sholihah', 'Perempuan', 'Magetan', '08123452345'),
('12', 79, 'I''anatul Mufarokhah', 'Perempuan', 'Magetan', '085753645364'),
('13', 80, 'Izzatul Laili Yazida', 'Perempuan', 'Magetan', '088767896789'),
('14', 81, 'Sarah Rahmatillah', 'Perempuan', 'Magetan', '089967896789'),
('15', 82, 'Aiji Nurrokhman', 'Laki-laki', 'Magetan', '08887776666'),
('16', 83, 'Qotrunnada', 'Perempuan', 'Magetan', '08213465875'),
('17', 84, 'Suroto', 'Laki-laki', 'Magetan', '082211122288');

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
(6, 20),
(7, 20),
(8, 20),
(9, 20),
(10, 20),
(11, 20),
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
('2222', 85, '15', 'Ahmad ma''ruf', 'Laki-laki', 'XI IPA 1', 'Magetan', '081234563456', 'Laili'),
('2223', 86, '11', 'Alfina Hazim Aulia', 'Perempuan', 'XI IPA 1', 'Magetan', '082212898291', 'Nur'),
('2224', 87, '12', 'Bunga Pangestu', 'Perempuan', 'XI IPA 2', 'Magetan', '081234562563', 'Hana'),
('2225', 88, '13', 'Qurota Aini', 'Perempuan', 'XI IPA 2', 'Magetan', '08877766445', 'Lala'),
('2226', 89, '14', 'Rahma Sari', 'Perempuan', 'XI IPA 2', 'Magetan', '081625893787', 'Puri'),
('2227', 90, '16', 'Zidna Zahidah', 'Perempuan', 'XI IPA 1', 'Magetan', '085789078965', 'Wardah'),
('2228', 91, '17', 'Farid Nur Fajar', 'Perempuan', 'XI IPA 1', 'Magetan', '08215364738', 'Nana'),
('3331', 93, '12', 'Diajeng Sekar', 'Perempuan', 'X', 'Magetan', '081234562453', 'Jannah'),
('3332', 94, '13', 'Fredella Putri', 'Perempuan', 'X', 'Magetan', '08996758475', 'Indah'),
('3333', 92, '11', 'Ardia Desivira', 'Perempuan', 'X', 'Magetan', '088856483784', 'Laili'),
('3334', 95, '14', 'Rahma Azizi', 'Perempuan', 'X', 'Magetan', '087656789765', 'Firda'),
('3335', 96, '16', 'Vita Nur Azizah', 'Perempuan', 'X', 'Magetan', '085764783748', 'Luku'),
('3336', 97, '15', 'Hasan Basri', 'Laki-laki', 'X', 'Magetan', '089956784757', 'lala'),
('3337', 98, '17', 'Junaidi Syahputra', 'Laki-laki', 'X', 'Magetan', '088855567788', 'Nuri');

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
(52, 'Admin', 'admin', '$2y$10$jeIYj2rWEOQNneY1nhsUvuzU2L.076mOixdbigHnowRza0eUJMfDO', 'NiAOxYpV49sEEPDjsOGHmVRSAFKnylvKaiijouRR3BrGnU771fqpjc0xGjNb', '2017-05-30 00:53:39', '2017-05-30 00:53:39', 'Admin'),
(78, 'Atika Sholihah', '11', '$2y$10$MLjZ5KEN8H5HnYK9myehWOZ69iJxmTn8cDojFEn56KCWpTWkNwABm', 'FEAun5uly7yCBlga8sXAaSH31DeCUI6dzHXyvI9TnPCju2m5Bnl6PQN2LkzE', '2017-07-05 05:32:46', '2017-07-05 05:32:46', 'Guru'),
(79, 'I''anatul Mufarokhah', '12', '$2y$10$qFeur2o6YUbVL.DpWIq0KuAbNrU2zLBXzosMMHKSVSRKa47T5D4AO', NULL, '2017-07-05 05:33:49', '2017-07-05 05:33:49', 'Guru'),
(80, 'Izzatul Laili Yazida', '13', '$2y$10$J4kx1FXFDIN/UhscJTrB4.hfDcCiDbkc95Igz6KsJoSdHxNKbYqva', NULL, '2017-07-05 05:34:40', '2017-07-05 05:34:40', 'Guru'),
(81, 'Sarah Rahmatillah', '14', '$2y$10$H89EiM/ujLcCx5ezOriPSeWw4q..cnE8Yf0aDFiBWOPH/aU22Ov7e', NULL, '2017-07-05 05:35:33', '2017-07-05 05:35:33', 'Guru'),
(82, 'Aiji Nurrokhman', '15', '$2y$10$t2srpRtc1jHWZtAtwNrZteEXYiJLn/Wy7msZNqv8XnkiePwvDQ2L.', NULL, '2017-07-05 05:36:10', '2017-07-05 05:36:10', 'Guru'),
(83, 'Qotrunnada', '16', '$2y$10$ilJQ0EKxEGtBCxKy0nvsn.BYB5lqRMXjqhDMqYIBy8v/dgKaEI4HS', NULL, '2017-07-05 05:37:11', '2017-07-05 05:37:11', 'Guru'),
(84, 'Suroto', '17', '$2y$10$rcd0DTY5je.lSFzG/XBvhe4sE.T.OWvjJ2r8Zn.GfZJxyxOyBpb02', NULL, '2017-07-05 05:37:37', '2017-07-05 05:37:37', 'Guru'),
(85, 'Ahmad ma''ruf', '2222', '$2y$10$YM4UVpPudGVit2iGwDrTo.mrH4fzlrPggQrGvxRn4yOOi7kdNIBB2', NULL, '2017-07-05 05:40:58', '2017-07-05 05:40:58', 'Siswa'),
(86, 'Alfina Hazim Aulia', '2223', '$2y$10$u9PBZojRwe6gB/3fepcOUuuK1UrngnJJz7m5EAM/maaAQESQ327UC', NULL, '2017-07-05 05:42:17', '2017-07-05 05:42:17', 'Siswa'),
(87, 'Bunga Pangestu', '2224', '$2y$10$4k8utCi1uDweltdoGU6.NugrIIZjxwIIPmcqNU8iqRNtkWg9NOIlO', NULL, '2017-07-05 05:43:42', '2017-07-05 05:43:42', 'Siswa'),
(88, 'Qurota Aini', '2225', '$2y$10$ai/RtFuTZKu2FRUWgVP2NeltlK3Zv336U1PTOUGua6vxWclcaI/3e', NULL, '2017-07-05 05:44:51', '2017-07-05 05:44:51', 'Siswa'),
(89, 'Rahma Sari', '2226', '$2y$10$gBhXJljE/vNuQQz/WfsIs.1SMp3sdSbFLB2E8rYFmnhas2IycAtpK', NULL, '2017-07-05 05:45:47', '2017-07-05 05:45:47', 'Siswa'),
(90, 'Zidna Zahidah', '2227', '$2y$10$hxQt.dx0s7el52IcjRGId.VymPDNsDuOO0B50LFfvDIG3.k1JerEO', NULL, '2017-07-05 05:46:54', '2017-07-05 05:46:54', 'Siswa'),
(91, 'Farid Nur Fajar', '2228', '$2y$10$kh5tuKx0VoKjNMM6Px3SBudQWfwi9ZPkStXam5x7.AtfYBTId1hoS', NULL, '2017-07-05 05:47:59', '2017-07-05 05:47:59', 'Siswa'),
(92, 'Ardia Desivira', '3333', '$2y$10$Fv9dFiLc7d1xMZpbcNQKxOkdvNI2QKZZD0ONcXfhZWvlo9H5b7B5S', NULL, '2017-07-05 05:50:03', '2017-07-05 05:50:03', 'Siswa'),
(93, 'Diajeng Sekar', '3331', '$2y$10$M11RIJEb9Fa.2DFybEGikueTEmwD8KoLq3s4.V/W7i7VLkVU1cx/y', NULL, '2017-07-05 05:52:58', '2017-07-05 05:52:58', 'Siswa'),
(94, 'Fredella Putri', '3332', '$2y$10$CTcZVJ3REvSok46w.TemQOIfn5sAbfvMvUkuxWkuqb6mX5/RhZHoO', NULL, '2017-07-05 05:54:32', '2017-07-05 05:54:32', 'Siswa'),
(95, 'Rahma Azizi', '3334', '$2y$10$XmSbGp8bw47C1Oy/c2n4vO3MQMSBWBITYVwlOLnJKfuRvm6ndSlCO', NULL, '2017-07-05 05:55:32', '2017-07-05 05:55:32', 'Siswa'),
(96, 'Vita Nur Azizah', '3335', '$2y$10$iOzQQHzbOm2AUhTdzA2.7.xDQ1zVmdx5qpIQKFRUFnLRmi2FGzgOy', NULL, '2017-07-05 05:56:28', '2017-07-05 05:56:28', 'Siswa'),
(97, 'Hasan Basri', '3336', '$2y$10$gQhDqx6kRpROi7CP7/Gs6O6Uu2zOry8grSMd1jMRbkusO3NxkVwz6', NULL, '2017-07-05 05:57:44', '2017-07-05 05:57:44', 'Siswa'),
(98, 'Junaidi Syahputra', '3337', '$2y$10$x/ug8UY.iOhJMPnIT1vzTut.gc.hxoWHDcPN/sna51gPM8IxCXfzK', NULL, '2017-07-05 05:58:35', '2017-07-05 05:58:35', 'Siswa');

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
  MODIFY `id_hafalan` int(5) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
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
