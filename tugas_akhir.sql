-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 02:35 PM
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
('10', 108, 'Ghany', 'Laki-laki', 'jogja', '081726738278'),
('11', 78, 'Atika Sholihah', 'Perempuan', 'Magetan', '08123452345'),
('12', 79, 'I''anatul Mufarokhah', 'Perempuan', 'Magetan', '085753645364'),
('13', 80, 'Izzatul Laili Yazida', 'Perempuan', 'Magetan', '088767896789'),
('14', 81, 'Sarah Rahmatillah', 'Perempuan', 'Magetan', '089967896789'),
('15', 82, 'Aiji Nurrokhman', 'Laki-laki', 'Magetan', '08887776666'),
('16', 83, 'Qotrunnada', 'Perempuan', 'Magetan', '08213465875'),
('17', 84, 'Suroto', 'Laki-laki', 'Magetan', '082211122288'),
('45', 102, 'dani', 'Laki-laki', 'tuban', '081986382873'),
('65', 106, 'tata', 'Perempuan', 'yayasan', '1234567890'),
('78', 110, 'Doni', 'Laki-laki', 'jogja', '08123456789'),
('88', 99, 'Nayla', 'Perempuan', 'Yogyakarta', '09876544261');

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
(1, 2, '2222', '15', 'ziadah', 17, 20, '2017-07-05', 88, 3),
(2, 1, '2222', '15', 'ziadah', 9, 17, '2016-08-12', 99, 9),
(3, 1, '3333', '11', 'ziadah', 1, 6, '2016-08-19', 45, 6),
(4, 2, '3333', '11', 'ziadah', 1, 10, '2017-07-06', 99, 4),
(5, 1, '3331', '12', 'ziadah', 1, 20, '2016-12-24', 45, 20),
(6, 2, '3331', '12', 'ziadah', 1, 6, '2017-07-06', 99, 6),
(7, 1, '2224', '12', 'ziadah', 1, 15, '2016-08-19', 44, 15),
(8, 1, '2224', '12', 'ziadah', 15, 20, '2016-09-22', 46, 5),
(9, 2, '2224', '12', 'ziadah', 1, 6, '2017-07-06', 45, 6),
(10, 2, '2225', '13', 'ziadah', 1, 6, '2017-08-18', 87, 6),
(11, 1, '2225', '13', 'ziadah', 8, 12, '2016-08-11', 57, 4),
(12, 1, '2225', '13', 'ziadah', 1, 8, '2016-03-01', 45, 8),
(14, 4, '2222', '15', 'Pilih ziadah', 2, 3, '2017-07-12', 34, 0),
(16, 1, '2224', '12', 'ziadah', 6, 8, '2017-07-14', 78, 2),
(17, 6, '2224', '12', 'ziadah', 9, 18, '2017-08-01', 77, 10),
(18, 2, '3331', '12', 'ziadah', 18, 20, '2017-07-10', 89, 14),
(19, 2, '3331', '12', 'murojaah', 19, 19, '2017-07-10', 80, 13),
(21, 1, '3332', '13', 'ziadah', 1, 6, '2017-07-10', 88, 6),
(22, 1, '3335', '16', 'ziadah', 1, 6, '2017-07-08', 89, 6),
(23, 1, '3335', '16', 'ziadah', 18, 20, '2017-07-10', 78, 14),
(24, 30, '2227', '16', 'ziadah', 1, 7, '2017-06-14', 88, 7),
(25, 1, '2227', '16', 'ziadah', 8, 16, '2017-07-10', 78, 9),
(26, 30, '2227', '16', 'ziadah', 5, 20, '2017-06-15', 89, 13),
(27, 1, '8787', '88', 'ziadah', 8, 19, '2017-07-10', 88, 12),
(28, 1, '8787', '88', 'murojaah', 8, 9, '2017-07-10', 78, 0),
(29, 1, '9898', '88', 'ziadah', 1, 8, '2017-07-10', 76, 8),
(30, 1, '9898', '88', 'murojaah', 5, 8, '2017-07-10', 87, 0),
(31, 1, '7676', '45', 'ziadah', 4, 6, '2017-07-11', 66, 2),
(32, 1, '7676', '45', 'murojaah', 1, 4, '2017-12-10', 66, 0),
(33, 1, '7676', '45', 'murojaah', 1, 4, '2017-07-11', 56, 0),
(34, 1, '7676', '45', 'ziadah', 1, 4, '2017-07-10', 77, 4),
(35, 1, '5656', '45', 'ziadah', 5, 7, '2017-07-11', 77, 2),
(36, 1, '5656', '45', 'murojaah', 4, 4, '2017-07-11', 67, 0),
(37, 1, '5656', '45', 'ziadah', 1, 5, '2017-07-10', 56, 5),
(38, 1, '5656', '45', 'murojaah', 3, 4, '2017-07-10', 77, 0),
(39, 1, '5656', '45', 'ziadah', 5, 10, '2017-07-13', 77, 4),
(40, 1, '5656', '45', 'ziadah', 4, 6, '2017-07-12', 55, 0),
(41, 2, '9090', '11', 'ziadah', 4, 7, '2017-07-11', 87, 3),
(42, 2, '9090', '11', 'murojaah', 4, 4, '2017-07-11', 66, 0),
(43, 2, '9090', '11', 'ziadah', 1, 4, '2017-07-10', 77, 4),
(44, 1, '9090', '11', 'ziadah', 1, 20, '2016-08-12', 77, 20),
(45, 5, '9090', '11', 'ziadah', 6, 9, '2017-08-16', 66, 5),
(47, 1, '2226', '14', 'ziadah', 4, 7, '2017-07-11', 88, 4),
(64, 1, '7777', '11', 'ziadah', 5, 7, '2017-07-11', 88, 2),
(65, 1, '7777', '11', 'murojaah', 1, 4, '2017-07-11', 55, 0),
(66, 1, '7777', '11', 'ziadah', 1, 5, '2017-07-10', 56, 5),
(67, 1, '7777', '11', 'murojaah', 3, 3, '2017-07-10', 76, 0),
(68, 2, '9898', '88', 'ziadah', 11, 13, '2017-07-11', 66, 5),
(69, 2, '9898', '88', 'ziadah', 11, 11, '2017-07-06', 45, 1),
(81, 2, '4949', '10', 'murojaah', 5.5, 8, '2017-07-12', 76, 0),
(82, 2, '4949', '10', 'ziadah', 5, 9, '2017-07-12', 79, 3),
(83, 2, '4949', '10', 'ziadah', 1, 6, '2017-07-11', 46, 6),
(84, 2, '4949', '10', 'murojaah', 3, 4, '2017-07-11', 56, 0),
(85, 1, '4949', '10', 'ziadah', 1, 20, '2016-08-12', 23, 20),
(86, 1, '4949', '10', 'murojaah', 2, 4, '2016-08-19', 66, 0),
(87, 1, '9999', '78', 'ziadah', 5, 8, '2017-07-12', 45, 4),
(88, 1, '9999', '78', 'murojaah', 4, 4, '2017-07-12', 78, 0),
(89, 5, '2222', '15', 'ziadah', 1, 20, '2017-07-12', 46, 20);

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
  `kelas` enum('X','XI','XII') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noHp` varchar(12) NOT NULL,
  `namaIbu` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `id_user`, `no_guru`, `nama`, `jenisKelamin`, `kelas`, `alamat`, `noHp`, `namaIbu`) VALUES
('2222', 85, '15', 'Ahmad ma''ruf', 'Laki-laki', 'XI', 'Magetan', '081234563456', 'Laili'),
('2224', 87, '12', 'Bunga Pangestu', 'Perempuan', 'XII', 'Magetan', '081234562563', 'Hana'),
('2225', 88, '13', 'Qurota Aini', 'Perempuan', 'XI', 'Magetan', '08877766445', 'Lala'),
('2226', 89, '14', 'Rahma Sari', 'Perempuan', 'XI', 'Magetan', '081625893787', 'Puri'),
('2227', 90, '16', 'Zidna Zahidah', 'Perempuan', 'XII', 'Magetan', '085789078965', 'Wardah'),
('2228', 91, '17', 'Farid Nur Fajar', 'Perempuan', 'XI', 'Magetan', '08215364738', 'Nana'),
('3331', 93, '12', 'Diajeng Sekar', 'Perempuan', 'X', 'Magetan', '081234562453', 'Jannah'),
('3332', 94, '13', 'Fredella Putri', 'Perempuan', 'X', 'Magetan', '08996758475', 'Indah'),
('3333', 92, '11', 'Ardia Desivira', 'Perempuan', 'X', 'Magetan', '088856483784', 'Laili'),
('3334', 95, '14', 'Rahma Azizi', 'Perempuan', 'X', 'Magetan', '087656789765', 'Firda'),
('3335', 96, '16', 'Vita Nur Azizah', 'Perempuan', 'X', 'Magetan', '085764783748', 'Luku'),
('3336', 97, '15', 'Hasan Basri', 'Laki-laki', 'X', 'Magetan', '089956784757', 'lala'),
('3337', 98, '17', 'Junaidi Syahputra', 'Laki-laki', 'X', 'Magetan', '088855567788', 'Nuri'),
('4949', 109, '10', 'Tari', 'Perempuan', 'XI', 'godean', '08198987676', 'tata'),
('5656', 104, '45', 'fafa', 'Perempuan', 'XI', 'asas', '1234567890', 'ssas'),
('7676', 103, '45', 'fani', 'Perempuan', 'XII', 'sads', '1234567890', 'tata'),
('7777', 107, '11', 'roni', 'Laki-laki', 'X', 'tuban', '08886376377', 'yuli'),
('8787', 100, '88', 'Dania', 'Perempuan', 'X', 'Yogyakarta', '0812435672', 'Hana'),
('9090', 105, '11', 'Joni', 'Laki-laki', 'X', 'fyf', '0987654321', 'iuiu'),
('9898', 101, '88', 'jaja', 'Laki-laki', 'X', 'yogya', '0987654321', 'jani'),
('9999', 111, '78', 'yola', 'Perempuan', 'XI', 'jogja', '08123457729', 'hari');

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
(52, 'Admin', 'admin', '$2y$10$NpXGtCq8dU62SpHnp2ytaegMaIHBHDKnvYgLR.VpE.WSglI/WZQ3y', 'DoSMPE5qxsXnFQjTUdiwzQxyTYO5UUGkC4bjDeThwl7fS7QzBLq2t0IJ2vZD', '2017-05-30 00:53:39', '2017-05-30 00:53:39', 'Admin'),
(78, 'Atika Sholihah', '11', '$2y$10$KJGAMWJFNW6i09SXHXEupu15UhIiRXIwIZGpjJyruybI6zocN5.h.', 'kf2KKVuysgdL050RMzpTjrDOjgwP3rlQ3RTCBNBuSBEPxWTm3fHusJYgiPOV', '2017-07-05 05:32:46', '2017-07-06 23:59:35', 'Guru'),
(79, 'I''anatul Mufarokhah', '12', '$2y$10$qFeur2o6YUbVL.DpWIq0KuAbNrU2zLBXzosMMHKSVSRKa47T5D4AO', '6lhEFKIqKnB0goMIZyS2QA2C59O1rxcIPVCpYMW5wHerVfVadLziCltFsVIY', '2017-07-05 05:33:49', '2017-07-05 05:33:49', 'Guru'),
(80, 'Izzatul Laili Yazida', '13', '$2y$10$J4kx1FXFDIN/UhscJTrB4.hfDcCiDbkc95Igz6KsJoSdHxNKbYqva', 'xv9OX5WdRP766dwiaiqeNVaIWoMci6RHFv84EWyEwtL5Jgsqkq3EBVMiDJRE', '2017-07-05 05:34:40', '2017-07-05 05:34:40', 'Guru'),
(81, 'Sarah Rahmatillah', '14', '$2y$10$H89EiM/ujLcCx5ezOriPSeWw4q..cnE8Yf0aDFiBWOPH/aU22Ov7e', NULL, '2017-07-05 05:35:33', '2017-07-05 05:35:33', 'Guru'),
(82, 'Aiji Nurrokhman', '15', '$2y$10$t2srpRtc1jHWZtAtwNrZteEXYiJLn/Wy7msZNqv8XnkiePwvDQ2L.', NULL, '2017-07-05 05:36:10', '2017-07-05 05:36:10', 'Guru'),
(83, 'Qotrunnada', '16', '$2y$10$ilJQ0EKxEGtBCxKy0nvsn.BYB5lqRMXjqhDMqYIBy8v/dgKaEI4HS', 'TODi5cG4v5vevKS74MeSdulqTOwoX28ySVms8DbLZTlyaRPSdjKohjvLn2a5', '2017-07-05 05:37:11', '2017-07-05 05:37:11', 'Guru'),
(84, 'Suroto', '17', '$2y$10$rcd0DTY5je.lSFzG/XBvhe4sE.T.OWvjJ2r8Zn.GfZJxyxOyBpb02', NULL, '2017-07-05 05:37:37', '2017-07-05 05:37:37', 'Guru'),
(85, 'Ahmad ma''ruf', '2222', '$2y$10$uBc7dojn/5xkHY6Yiw.HqecsObcwAP0l5C6Snd./.pw5muHi1YEWe', 'dJH3Z33mnsKqdGF2tLasEJ8DpnwoAw5Dpv0V6HvdzBUNX5t6rifc1ajHMPER', '2017-07-05 05:40:58', '2017-07-11 08:19:06', 'Siswa'),
(87, 'Bunga Pangestu', '2224', '$2y$10$4k8utCi1uDweltdoGU6.NugrIIZjxwIIPmcqNU8iqRNtkWg9NOIlO', 'QDlNMT0FfSRjpmI5vr76maExkc1gEulkT1Yx69ag7NhjwTRjR5TSvBdPTM1n', '2017-07-05 05:43:42', '2017-07-11 08:19:23', 'Siswa'),
(88, 'Qurota Aini', '2225', '$2y$10$ai/RtFuTZKu2FRUWgVP2NeltlK3Zv336U1PTOUGua6vxWclcaI/3e', 'MCMQXEpfdSFLnEcOgDkbGBTz6ukJNuBgvqU7Vpw3NtExJF5XwBwSTFNODX24', '2017-07-05 05:44:51', '2017-07-11 08:19:31', 'Siswa'),
(89, 'Rahma Sari', '2226', '$2y$10$gBhXJljE/vNuQQz/WfsIs.1SMp3sdSbFLB2E8rYFmnhas2IycAtpK', NULL, '2017-07-05 05:45:47', '2017-07-11 08:19:41', 'Siswa'),
(90, 'Zidna Zahidah', '2227', '$2y$10$hxQt.dx0s7el52IcjRGId.VymPDNsDuOO0B50LFfvDIG3.k1JerEO', NULL, '2017-07-05 05:46:54', '2017-07-11 08:19:49', 'Siswa'),
(91, 'Farid Nur Fajar', '2228', '$2y$10$kh5tuKx0VoKjNMM6Px3SBudQWfwi9ZPkStXam5x7.AtfYBTId1hoS', NULL, '2017-07-05 05:47:59', '2017-07-11 08:20:00', 'Siswa'),
(92, 'Ardia Desivira', '3333', '$2y$10$Fv9dFiLc7d1xMZpbcNQKxOkdvNI2QKZZD0ONcXfhZWvlo9H5b7B5S', 'qJdn94XjlipmnkDGqAhNJ2CQ9EpkXuTXV2OJ4s8nzboljbQoP1h7434CDni6', '2017-07-05 05:50:03', '2017-07-05 05:50:03', 'Siswa'),
(93, 'Diajeng Sekar', '3331', '$2y$10$n0r4kzo6TLsfkho.kS1z0O.UQxGYE5W3mm4cZZf0Nop2uzP4btUJm', 'pynGtfkRKKTjjpoCENyN8HWQLwGOXtxozgzTDRfP9K4wVCsmoqURHDx4knBG', '2017-07-05 05:52:58', '2017-07-05 05:52:58', 'Siswa'),
(94, 'Fredella Putri', '3332', '$2y$10$CTcZVJ3REvSok46w.TemQOIfn5sAbfvMvUkuxWkuqb6mX5/RhZHoO', NULL, '2017-07-05 05:54:32', '2017-07-05 05:54:32', 'Siswa'),
(95, 'Rahma Azizi', '3334', '$2y$10$XmSbGp8bw47C1Oy/c2n4vO3MQMSBWBITYVwlOLnJKfuRvm6ndSlCO', NULL, '2017-07-05 05:55:32', '2017-07-05 05:55:32', 'Siswa'),
(96, 'Vita Nur Azizah', '3335', '$2y$10$iOzQQHzbOm2AUhTdzA2.7.xDQ1zVmdx5qpIQKFRUFnLRmi2FGzgOy', NULL, '2017-07-05 05:56:28', '2017-07-05 05:56:28', 'Siswa'),
(97, 'Hasan Basri', '3336', '$2y$10$gQhDqx6kRpROi7CP7/Gs6O6Uu2zOry8grSMd1jMRbkusO3NxkVwz6', NULL, '2017-07-05 05:57:44', '2017-07-05 05:57:44', 'Siswa'),
(98, 'Junaidi Syahputra', '3337', '$2y$10$x/ug8UY.iOhJMPnIT1vzTut.gc.hxoWHDcPN/sna51gPM8IxCXfzK', NULL, '2017-07-05 05:58:35', '2017-07-05 05:58:35', 'Siswa'),
(99, 'Nayla', '88', '$2y$10$m7Y7bhJq4N8C5xoyT0uF1eotk37cBHvkoZbSxRlDhIOCr7CyOyv82', 'dSj7g41mqSktzb21YVUNkmIpd4s18jcoivYz5ULWs7jPa74MaasSFdneyOIi', '2017-07-10 05:02:59', '2017-07-10 21:24:31', 'Guru'),
(100, 'Dania', '8787', '$2y$10$7RGmurf745Id16wy9BgowudpkVDFC8wvMDVWOLYEnMeBEn/uG5iLy', NULL, '2017-07-10 05:03:38', '2017-07-10 05:03:38', 'Siswa'),
(101, 'jaja', '9898', '$2y$10$PFpFGhjxUwB1Qr61Ipk7fOJCP4C/2fZZl74oaPd.3GZ9XdUEYfTHa', NULL, '2017-07-10 05:10:09', '2017-07-10 21:30:29', 'Siswa'),
(102, 'dani', '45', '$2y$10$UdlTy3rXn7a25h2JYOsdBOf9Ruis0.7btoyDPrQc/k7EQF8A9UJrm', 'wH1GpLj7WlUnkFIkEBMf7m5M5AeqmWjmnbOthn207UvrtWDgk56OLG43MIhQ', '2017-07-10 21:32:08', '2017-07-10 21:32:08', 'Guru'),
(103, 'fani', '7676', '$2y$10$syL2z10KPvboM0e/A2mHFOlrEot9itGzyz6MITEqYxr7gk5Pgyg3G', 'ENWI5DnVY5I6NArJDSlB0TRTynDaNWfn3A8iiptU9YbYRV6QuzhxJBj4rp8z', '2017-07-10 21:34:58', '2017-07-11 08:20:24', 'Siswa'),
(104, 'fafa', '5656', '$2y$10$F5luWGjQWtwQCx3IoRzbiujCATAG7F7lEuH3hZ9BgDlVMNp5s.a/O', NULL, '2017-07-10 21:51:59', '2017-07-11 08:20:11', 'Siswa'),
(105, 'Joni', '9090', '$2y$10$ZQbrLp0Qz4sSww2QINAowuxhEnu1Fn.2b8elahYKv4xV8RUi5yJeW', 'DA5EaX3sdpzQnpoRe82mlebDkApT6UDImzupDes4KzXovnhIMFaNmv0YD9ki', '2017-07-10 22:14:40', '2017-07-10 22:14:40', 'Siswa'),
(106, 'tata', '65', '$2y$10$jnN9Ru6skNh8UPAKpKwJ0edG5rrP5G2/rQATcB8QbRuePaavvWx1.', NULL, '2017-07-10 22:26:20', '2017-07-10 22:26:20', 'Guru'),
(107, 'roni', '7777', '$2y$10$ce2FnkTn0.5S4Txkzf7LXuh2l6Qu4Fsh8cICRzWKotw3cDjhwdXpi', 'wpKAty4WlPJfAj4oR2uCd0y5ofj959LgkGo67UFeKaAISpkcudBowWYCZDiN', '2017-07-10 22:27:45', '2017-07-10 22:27:45', 'Siswa'),
(108, 'Ghany', '10', '$2y$10$hLqRu7YKWTf8.DQnhlRa8OtKdPZ0ZTPXWuc57n0vZvDnofRB8TtQe', 'zEWwMmkAl29EydyGjBN0w4eEPUZ2ePKvth62zCy6UmyA4tm9g22wG52MPAhU', '2017-07-11 18:21:43', '2017-07-11 18:21:43', 'Guru'),
(109, 'Tari', '4949', '$2y$10$xzWCaozWhybx4TCiNLbUB.T8/pIRESD3aFmP.TufxQjAIFQxjbrXq', 'aAfIvl5DRPYOZaNOSO5wthUyvgmMMrfZgtuyqRCr4RL3m0KTFDz3NgpDA5j3', '2017-07-11 18:22:48', '2017-07-11 18:22:48', 'Siswa'),
(110, 'Doni', '78', '$2y$10$ZvQ7LY/gRXihATs6RxnjY.yQ/I2F1S81gy0DYE.iZI3nIIBf3q5kC', '5T0qiLh7KFSSCDHe56qpJRNZzQXIfRIcJq0nBN3yBdOFYiv1M6mhdmypZGUI', '2017-07-11 19:16:03', '2017-07-11 19:16:03', 'Guru'),
(111, 'yola', '9999', '$2y$10$Kr46/z/iZEDLhWY20FG38uOE9/9I2oXM81IZ5NVtJRjYllJaZQG12', 'mDeQJaSJNMefuC9gwf8rMKLuT4qcFG8fUwZ4SulfcACMZDdMkzlHmicQMMod', '2017-07-11 19:16:59', '2017-07-11 19:16:59', 'Siswa');

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
  MODIFY `id_hafalan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
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
  ADD CONSTRAINT `guru_hafalan` FOREIGN KEY (`no_guru`) REFERENCES `guru` (`no_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_siswa` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
