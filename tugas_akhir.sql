-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 09:53 AM
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
-- Table structure for table `detail_hafalan`
--

CREATE TABLE `detail_hafalan` (
  `id_detail` int(5) NOT NULL,
  `id_hafalan` int(5) NOT NULL,
  `id_surah` int(5) NOT NULL,
  `ayat` int(3) NOT NULL,
  `jenisAyat` enum('awal','akhir','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `no_guru` varchar(20) NOT NULL,
  `id_user` int(5) DEFAULT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noHp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`no_guru`, `id_user`, `nama`, `alamat`, `noHp`) VALUES
('1', 1, 'sania', 'nanananna', '0810883678'),
('2', NULL, 'haniyah', 'jdhdfkhzklji', '098783787584'),
('3', NULL, 'nila', 'djhkdxffd', '08123637376'),
('4', NULL, 'meilida', 'nzdhndhf', '08123344758');

-- --------------------------------------------------------

--
-- Table structure for table `hafalan`
--

CREATE TABLE `hafalan` (
  `id_hafalan` int(5) NOT NULL,
  `NIS` char(4) NOT NULL,
  `no_guru` varchar(20) NOT NULL,
  `jenis` enum('ziadah','murojoah','','') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `juz`
--

CREATE TABLE `juz` (
  `id` int(5) NOT NULL,
  `noJuz` int(2) NOT NULL,
  `ayatTerakhir` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `juz`
--

INSERT INTO `juz` (`id`, `noJuz`, `ayatTerakhir`) VALUES
(1, 1, 200),
(2, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `juz_surah`
--

CREATE TABLE `juz_surah` (
  `id` int(5) NOT NULL,
  `surah_id` int(5) NOT NULL,
  `juz_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `juz_surah`
--

INSERT INTO `juz_surah` (`id`, `surah_id`, `juz_id`) VALUES
(1, 1, 1),
(2, 1, 2);

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
  `id_user` int(5) DEFAULT NULL,
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
('1234', NULL, '1', 'nana', 'X', 'dfbsgnxf', '098654477665', 'Siti'),
('1728', NULL, '3', 'tata', 'XI IPA 2', 'jshkfszkeufhzs', '09876648394', 'b'),
('345', NULL, '4', 'shinta', 'XI IPA 2', 'jsjhdjert', '1234567890', 'susi');

-- --------------------------------------------------------

--
-- Table structure for table `surah`
--

CREATE TABLE `surah` (
  `id` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jumlahAyat` int(3) NOT NULL,
  `surahKe` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surah`
--

INSERT INTO `surah` (`id`, `nama`, `jumlahAyat`, `surahKe`) VALUES
(1, 'albaqoroh', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(2, 'a', 'a@mail.com', '$2y$10$ODmscKlynrbms5C4CqB3J.rxu1VqcoFKA3HRfaz2ef1G5VldV1i72', 'SMxndtSKVuaX3bZliilmTM8juljtxuhjLfis9RFEyf7sVRoK4GJhc9UXrpN4', '2017-04-21 02:47:27', '2017-04-21 02:47:27', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_hafalan`
--
ALTER TABLE `detail_hafalan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_hafalan` (`id_hafalan`),
  ADD KEY `id_surah` (`id_surah`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`no_guru`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `hafalan`
--
ALTER TABLE `hafalan`
  ADD PRIMARY KEY (`id_hafalan`),
  ADD UNIQUE KEY `NIS` (`NIS`),
  ADD UNIQUE KEY `no_guru` (`no_guru`);

--
-- Indexes for table `juz`
--
ALTER TABLE `juz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juz_surah`
--
ALTER TABLE `juz_surah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surah` (`surah_id`),
  ADD KEY `id_juz` (`juz_id`);

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
  ADD KEY `id_user` (`id_user`),
  ADD KEY `no_guru` (`no_guru`),
  ADD KEY `id_user_2` (`id_user`);

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
-- AUTO_INCREMENT for table `detail_hafalan`
--
ALTER TABLE `detail_hafalan`
  MODIFY `id_detail` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hafalan`
--
ALTER TABLE `hafalan`
  MODIFY `id_hafalan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `juz`
--
ALTER TABLE `juz`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_hafalan`
--
ALTER TABLE `detail_hafalan`
  ADD CONSTRAINT `hafalan_detail` FOREIGN KEY (`id_hafalan`) REFERENCES `hafalan` (`id_hafalan`),
  ADD CONSTRAINT `surah_detail` FOREIGN KEY (`id_surah`) REFERENCES `surah` (`id`);

--
-- Constraints for table `hafalan`
--
ALTER TABLE `hafalan`
  ADD CONSTRAINT `guru_hafalan` FOREIGN KEY (`no_guru`) REFERENCES `guru` (`no_guru`),
  ADD CONSTRAINT `siswa_hafalan` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`);

--
-- Constraints for table `juz_surah`
--
ALTER TABLE `juz_surah`
  ADD CONSTRAINT `juz_detail` FOREIGN KEY (`juz_id`) REFERENCES `juz` (`id`),
  ADD CONSTRAINT `surah` FOREIGN KEY (`surah_id`) REFERENCES `surah` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_guru` FOREIGN KEY (`no_guru`) REFERENCES `guru` (`no_guru`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
