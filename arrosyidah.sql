-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2017 at 05:15 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arrosyidah`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `no_guru` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noHp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`no_guru`, `id_user`, `nama`, `jenisKelamin`, `alamat`, `noHp`) VALUES
('123', 53, 'sania', 'Perempuan', 'jogja', '90897976876');

-- --------------------------------------------------------

--
-- Stand-in structure for view `hafalanmurojaah`
--
CREATE TABLE `hafalanmurojaah` (
`id_hafalan` int(10) unsigned
,`noJuz` int(11)
,`NIS` char(4)
,`no_guru` varchar(20)
,`jenis` varchar(20)
,`noHalamanA` double(3,1)
,`noHalamanB` double(3,1)
,`tanggal` date
,`nilai` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `hafalanziadah`
--
CREATE TABLE `hafalanziadah` (
`id_hafalan` int(10) unsigned
,`noJuz` int(11)
,`NIS` char(4)
,`no_guru` varchar(20)
,`jenis` varchar(20)
,`noHalamanA` double(3,1)
,`noHalamanB` double(3,1)
,`tanggal` date
,`nilai` int(11)
,`totalHalaman` double(3,1)
);

-- --------------------------------------------------------

--
-- Table structure for table `inputhafalan`
--

CREATE TABLE `inputhafalan` (
  `id_hafalan` int(10) UNSIGNED NOT NULL,
  `noJuz` int(11) NOT NULL,
  `NIS` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_guru` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noHalamanA` double(3,1) NOT NULL,
  `noHalamanB` double(3,1) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai` int(11) NOT NULL,
  `totalHalaman` double(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inputhafalan`
--

INSERT INTO `inputhafalan` (`id_hafalan`, `noJuz`, `NIS`, `no_guru`, `jenis`, `noHalamanA`, `noHalamanB`, `tanggal`, `nilai`, `totalHalaman`) VALUES
(1, 1, '4444', '123', 'ziadah', 4.0, 8.0, '2017-08-26', 80, 0.0),
(2, 1, '4444', '123', 'ziadah', 8.0, 8.5, '2017-08-25', 80, 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_26_092917_create_guru_table', 1),
(4, '2017_08_26_095749_create_siswa_table', 1),
(5, '2017_08_26_100657_create_inputhafalan_table', 1),
(6, '2017_08_26_101548_create_surah_table', 1),
(7, '2017_08_26_103744_create_hafalanmurojaah_view', 1),
(8, '2017_08_26_120443_create_hafalanziadah_view', 1),
(9, '2017_08_26_124356_create_totalhafalan_view', 1);

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
  `NIS` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `no_guru` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` enum('X','XI','XII') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noHp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaIbu` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `id_user`, `no_guru`, `nama`, `jenisKelamin`, `kelas`, `alamat`, `noHp`, `namaIbu`) VALUES
('4444', 54, '123', 'dani', 'Laki-laki', 'X', 'jogja', '089789878987', 'ani');

-- --------------------------------------------------------

--
-- Table structure for table `surah`
--

CREATE TABLE `surah` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `halamanAwal` double(3,1) NOT NULL,
  `halamanAkhir` double(3,1) NOT NULL,
  `noJuzAwal` int(11) NOT NULL,
  `noJuzAkhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalhafalan`
--
CREATE TABLE `totalhafalan` (
`nis` char(4)
,`bulan` int(2)
,`tahun` int(4)
,`totalHalaman` double(18,1)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` enum('Admin','Guru','Siswa') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(4, 'nur', 'nur@mail.com', '$2y$10$PGeAyQ01RMrY/drZvjuYtuYZ9Uw40bQPZcJd2NC79/BWWbmvO6uG2', 'XjeGxELkRDMKCrZWZwNoODaX0HAAD95qsKqjfAU5fjNUA4W4EanGQb37UrvG', '2017-05-02 19:01:03', '2017-05-02 19:01:03', 'Admin'),
(52, 'Admin', 'admin', '$2y$10$NpXGtCq8dU62SpHnp2ytaegMaIHBHDKnvYgLR.VpE.WSglI/WZQ3y', 'jZ0OZFf8H8QARFpUzdBBFMc5Rzk6PdVcncyvwyHXoHIaRdw3qPa5D9v8SExl', '2017-05-29 17:53:39', '2017-05-29 17:53:39', 'Admin'),
(53, 'sania', '123', '$2y$10$ugAu/ZkmSKQMrMVmEK0g7eBO3zPR8cCgEW/XVTDp.Nh7jTPuTeBlW', NULL, '2017-08-26 06:37:28', '2017-08-26 06:37:28', 'Guru'),
(54, 'dani', '4444', '$2y$10$mExBNCtT7nExFfEpZFLMSOXZs/wY/x2oi9czOqI1ail1gNJWpVo2u', NULL, '2017-08-26 06:38:04', '2017-08-26 06:38:04', 'Siswa');

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
  ADD UNIQUE KEY `guru_no_guru_unique` (`no_guru`),
  ADD KEY `guru_id_user_foreign` (`id_user`);

--
-- Indexes for table `inputhafalan`
--
ALTER TABLE `inputhafalan`
  ADD PRIMARY KEY (`id_hafalan`),
  ADD KEY `inputhafalan_nis_foreign` (`NIS`),
  ADD KEY `inputhafalan_no_guru_foreign` (`no_guru`);

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
  ADD UNIQUE KEY `siswa_nis_unique` (`NIS`),
  ADD KEY `siswa_id_user_foreign` (`id_user`),
  ADD KEY `siswa_no_guru_foreign` (`no_guru`);

--
-- Indexes for table `surah`
--
ALTER TABLE `surah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `surah_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inputhafalan`
--
ALTER TABLE `inputhafalan`
  MODIFY `id_hafalan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `surah`
--
ALTER TABLE `surah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `inputhafalan`
--
ALTER TABLE `inputhafalan`
  ADD CONSTRAINT `inputhafalan_nis_foreign` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`),
  ADD CONSTRAINT `inputhafalan_no_guru_foreign` FOREIGN KEY (`no_guru`) REFERENCES `guru` (`no_guru`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `siswa_no_guru_foreign` FOREIGN KEY (`no_guru`) REFERENCES `guru` (`no_guru`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
