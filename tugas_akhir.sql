-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2017 at 11:16 AM
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
  `alamat` varchar(100) NOT NULL,
  `noHp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`no_guru`, `id_user`, `nama`, `alamat`, `noHp`) VALUES
('111', 20, 'asdf', 'asdf', '123451234567'),
('40', 19, 'fafaf', 'awsdfghjbj', '0987654321'),
('866', 2, 'haniyah', 'sxdrctfvygbuhnjk', '0987654321'),
('920', 1, 'sania', 'nanananna', '0810883678');

-- --------------------------------------------------------

--
-- Table structure for table `inputhafalan`
--

CREATE TABLE `inputhafalan` (
  `id_hafalan` int(5) NOT NULL,
  `noJuz` int(2) NOT NULL,
  `NIS` char(4) NOT NULL,
  `no_guru` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `noHalamanA` int(2) NOT NULL,
  `noHalamanB` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inputhafalan`
--

INSERT INTO `inputhafalan` (`id_hafalan`, `noJuz`, `NIS`, `no_guru`, `jenis`, `noHalamanA`, `noHalamanB`, `tanggal`, `nilai`) VALUES
(4, 1, '36', '920', 'ziadah', 1, 2, '2017-05-07', 13),
(5, 1, '36', '920', 'ziadah', 1, 2, '2017-05-07', 90),
(7, 1, '36', '920', 'ziadah', 1, 2, '2017-05-09', 44),
(8, 1, '68', '920', 'ziadah', 2, 3, '2017-05-09', 22),
(9, 1, '36', '920', 'ziadah', 2, 4, '2017-05-09', 66);

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
(1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `juz_surah`
--

CREATE TABLE `juz_surah` (
  `id` int(5) NOT NULL,
  `surah_id` int(5) NOT NULL,
  `juz_id` int(2) NOT NULL,
  `halamanSurah` int(2) NOT NULL,
  `jenisHalaman` enum('awal','akhir','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `kelas` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noHp` varchar(12) NOT NULL,
  `namaIbu` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `id_user`, `no_guru`, `nama`, `kelas`, `alamat`, `noHp`, `namaIbu`) VALUES
('36', 12, '920', 'kakak', 'X', 'fcgvhjkn', '0987654321', 'hahhah'),
('43', 18, '866', 'feaas', 'X', 'ikujyhgf', '0987654321', 'gjh'),
('68', 17, '920', 'baba', 'X', 'sxdcfgvbhnjm', '0987654321', 'tatata');

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `hapusSiswa` BEFORE DELETE ON `siswa` FOR EACH ROW DELETE FROM hafalan WHERE NIS=old.NIS
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `surah`
--

CREATE TABLE `surah` (
  `id` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surah`
--

INSERT INTO `surah` (`id`, `nama`) VALUES
(1, 'albaqoroh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` enum('Admin','Guru','Siswa','') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(1, 'sania', 'sanianuragustina@gmail.com', '$2y$10$EJvZMY.iTf3CQMU3HwKEuecKJinE8wTSr9OnpiwyT78hCAvucKGKu', 'zWaJPD140pteEwHFTlwG0TEznjWPcMVF34vQXMBewZvnKw6ZB70Brr7W82lw', '2017-04-21 02:30:51', '2017-04-21 02:30:51', 'Admin'),
(2, 'a', 'a@mail.com', '$2y$10$ODmscKlynrbms5C4CqB3J.rxu1VqcoFKA3HRfaz2ef1G5VldV1i72', 'UwGLRkOiesXuDtEDV7FWmcuVJY8EW7QHBWc7Tavxi2RkIDtH5g88FzJo9zXY', '2017-04-21 02:47:27', '2017-04-21 02:47:27', 'Guru'),
(3, 'haniyah', 'haniyah@mail.com', '123456', NULL, '2017-05-02 17:00:00', '2017-05-02 17:00:00', 'Guru'),
(4, 'nur', 'nur@mail.com', '$2y$10$PGeAyQ01RMrY/drZvjuYtuYZ9Uw40bQPZcJd2NC79/BWWbmvO6uG2', 'Epv1cUpOPleRs5T4scXnjUIG6DBMjskkXkB0KxKCVEIM8StdxqSP1nKyOGH3', '2017-05-03 02:01:03', '2017-05-03 02:01:03', 'Admin'),
(5, 'agustina', 'agustina@mail.com', '$2y$10$DdYHpA5kXqM8gOYI7m1rKOBOyeO46lL.i6G94cr6oc0R.bDqVcViW', 'vnUwRYs1kopXtqFI7unEd9YUoL6j5wjw6kGdZ89E7D0nSCuxG4cPuRQfqnht', '2017-05-03 02:02:34', '2017-05-03 02:02:34', 'Siswa'),
(8, 'hahah', 'haha@mail.com', '222222', NULL, '2017-05-03 03:46:47', '2017-05-03 03:46:47', 'Admin'),
(10, 'riska', NULL, '000000', NULL, '2017-05-03 03:52:38', '2017-05-03 03:52:38', 'Admin'),
(11, 'silmi', NULL, '333333', NULL, '2017-05-04 04:10:54', '2017-05-04 04:10:54', 'Admin'),
(12, 'kakak', NULL, '999999', NULL, '2017-05-04 05:32:37', '2017-05-04 05:32:37', 'Admin'),
(13, 'bbbb', NULL, '222222', NULL, '2017-05-04 05:44:34', '2017-05-04 05:44:34', 'Admin'),
(14, 'aaaa', NULL, '555555', NULL, '2017-05-05 03:03:57', '2017-05-05 03:03:57', 'Admin'),
(15, 'dddd', NULL, '777777', NULL, '2017-05-05 03:12:07', '2017-05-05 03:12:07', 'Admin'),
(16, 'b', 'b@mail.com', '$2y$10$7XleRAiZlVkbvbzwPBfsvOXJzM3I88WDu67a8szzyl4PlqayxF5s.', 'bnWbyICPYsYgjDigNb5JSSrWQ3lCQPtpLR6vKia5VGqDW3O0XWkZ0KhzyXTd', '2017-05-05 03:26:25', '2017-05-05 03:26:25', 'Guru'),
(17, 'baba', NULL, '123456', NULL, '2017-05-06 23:08:53', '2017-05-06 23:08:53', 'Admin'),
(18, 'feaas', NULL, '111111', NULL, '2017-05-06 23:44:53', '2017-05-06 23:44:53', 'Admin'),
(19, 'fafaf', NULL, 'fafafa', NULL, '2017-05-06 23:45:56', '2017-05-06 23:45:56', 'Admin'),
(20, 'asdf', NULL, 'sxsss', NULL, '2017-05-06 23:52:18', '2017-05-06 23:52:18', 'Admin'),
(21, 'QQQQ', NULL, 'rrr444', NULL, '2017-05-08 23:56:07', '2017-05-08 23:56:07', 'Admin');

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inputhafalan`
--
ALTER TABLE `inputhafalan`
  MODIFY `id_hafalan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `juz_surah`
--
ALTER TABLE `juz_surah`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `user_guru` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

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
  ADD CONSTRAINT `guru_siswa` FOREIGN KEY (`no_guru`) REFERENCES `guru` (`no_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_siswa` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
