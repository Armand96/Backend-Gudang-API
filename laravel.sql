-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 05:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `tipe_audit` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_barang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_keluar_id` int(10) UNSIGNED DEFAULT NULL,
  `barang_masuk_id` int(10) UNSIGNED DEFAULT NULL,
  `nilai_lama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_baru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proyek` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_order` int(10) UNSIGNED NOT NULL,
  `bengkel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pekerjaan` int(10) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `nomor_barang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_klr_permintaan_angka` int(11) NOT NULL,
  `jml_klr_permintaan_huruf` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_klr_angka` int(10) UNSIGNED NOT NULL,
  `jml_klr_huruf` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `proyek`, `no_order`, `bengkel`, `pekerjaan`, `kode_pekerjaan`, `tgl_keluar`, `nomor_barang`, `jml_klr_permintaan_angka`, `jml_klr_permintaan_huruf`, `jml_klr_angka`, `jml_klr_huruf`, `created_at`, `updated_at`) VALUES
(11, 'Aircraft Carrier', 84, 'Gal1', 'Perbaikan', 94, '2019-08-22', '3113.4272', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-22 23:37:42', '2019-08-22 23:37:42'),
(12, 'Submarine', 49, 'Gal2', 'Buat Baru', 82, '2019-08-22', '2189.9007', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-22 23:37:42', '2019-08-22 23:37:42'),
(13, 'Kapal', 50, 'Gal2', 'Buat Baru', 92, '2019-08-22', '2189.9007', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-22 23:37:42', '2019-08-22 23:37:42'),
(14, 'Submarine', 99, 'DKB', 'Perawatan', 58, '2019-08-22', '3092.500', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-22 23:37:42', '2019-08-22 23:37:42'),
(15, 'Ship', 24, 'Gal1', 'Buat Baru', 91, '2019-08-22', '1386.864', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-22 23:37:42', '2019-08-22 23:37:42'),
(16, 'Ship', 24, 'Gal1', 'Perawatan', 83, '2019-08-22', '3092.500', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-22 23:37:42', '2019-08-22 23:37:42'),
(17, 'Kapal', 15, 'Gal1', 'Buat Baru', 48, '2019-08-22', '3092.500', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-22 23:37:43', '2019-08-22 23:37:43'),
(18, 'Aircraft Carrier', 53, 'Gal2', 'Perawatan', 26, '2019-08-22', '2189.9007', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-22 23:37:43', '2019-08-22 23:37:43'),
(19, 'Submarine', 4, 'Gal2', 'Perbaikan', 94, '2019-08-22', '3927.6890', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-22 23:37:43', '2019-08-22 23:37:43'),
(20, 'Aircraft Carrier', 34, 'Gal1', 'Perawatan', 88, '2019-08-22', '3092.500', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-22 23:37:43', '2019-08-22 23:37:43'),
(21, 'Ship', 49, 'Gal2', 'Perbaikan', 46, '2019-08-24', '3113.4272', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-24 15:22:21', '2019-08-24 15:22:21'),
(22, 'Kapal', 92, 'Gal2', 'Perbaikan', 1, '2019-08-24', '3092.500', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-24 15:22:21', '2019-08-24 15:22:21'),
(23, 'Aircraft Carrier', 44, 'DKB', 'Perawatan', 89, '2019-08-24', '2189.9007', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-24 15:22:22', '2019-08-24 15:22:22'),
(24, 'Kapal', 76, 'Gal2', 'Perbaikan', 17, '2019-08-24', '1386.864', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-24 15:22:22', '2019-08-24 15:22:22'),
(25, 'Ship', 4, 'DKB', 'Perbaikan', 22, '2019-08-24', '3927.6890', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-24 15:22:22', '2019-08-24 15:22:22'),
(26, 'Submarine', 8, 'Gal1', 'Buat Baru', 99, '2019-08-24', '3927.6890', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-24 15:22:22', '2019-08-24 15:22:22'),
(27, 'Ship', 20, 'Gal2', 'Buat Baru', 27, '2019-08-24', '1386.864', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-24 15:22:22', '2019-08-24 15:22:22'),
(28, 'Ship', 4, 'DKB', 'Buat Baru', 61, '2019-08-24', '3927.6890', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-24 15:22:22', '2019-08-24 15:22:22'),
(29, 'Aircraft Carrier', 54, 'Gal2', 'Buat Baru', 56, '2019-08-24', '1386.864', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-24 15:22:22', '2019-08-24 15:22:22'),
(30, 'Ship', 78, 'Gal1', 'Buat Baru', 99, '2019-08-24', '3927.6890', 10, 'Sepuluh', 10, 'Sepuluh', '2019-08-24 15:22:22', '2019-08-24 15:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `barang_list`
--

CREATE TABLE `barang_list` (
  `nomor_barang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuantitas` int(10) UNSIGNED NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `dibuat_oleh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_list`
--

INSERT INTO `barang_list` (`nomor_barang`, `nama_barang`, `satuan`, `kuantitas`, `harga_satuan`, `dibuat_oleh`, `created_at`, `updated_at`) VALUES
('1386.864', 'Onie Nicolas', 'ONS', 9, 70081, 'admin', '2019-08-22 13:42:05', '2019-08-22 13:42:05'),
('2189.9007', 'Leif Reilly', 'ONS', 78, 69644, 'Armand', '2019-08-22 13:47:43', '2019-08-22 13:47:43'),
('2334.454', 'PELAT', 'KG', 10, 10000, 'admin', '2019-08-25 11:17:39', '2019-08-25 11:17:39'),
('2720.7985', 'Ms. Mattie Quitzon DVM', 'LTR', 62, 40432, 'Eli', '2019-08-22 13:47:43', '2019-08-22 13:47:43'),
('3092.500', 'Antonio Goyette', 'KG', 80, 95915, 'admin', '2019-08-22 13:42:05', '2019-08-22 13:42:05'),
('3113.4272', 'Kathlyn Reichel', 'ONS', 90, 69266, 'Armand', '2019-08-22 13:42:05', '2019-08-22 13:42:05'),
('3604.8343', 'Jerad Prohaska', 'ONS', 10, 71520, 'Armand', '2019-08-22 13:42:05', '2019-08-22 13:42:05'),
('3927.6890', 'Shaniya Lockman', 'ONS', 66, 43911, 'admin', '2019-08-22 13:47:43', '2019-08-22 13:47:43'),
('4209.6429', 'Joshuah Swaniawski', 'LTR', 40, 48203, 'Iskandar', '2019-08-22 13:42:05', '2019-08-22 13:42:05'),
('4273.2192', 'Devin Shields', 'LTR', 6, 62598, 'admin', '2019-08-22 13:47:43', '2019-08-22 13:47:43'),
('536.528', 'Ben Haley', 'ONS', 27, 9748, 'Iskandar', '2019-08-22 13:42:05', '2019-08-22 13:42:05'),
('5371.8473', 'Dana Ryan', 'ONS', 70, 86448, 'Armand', '2019-08-22 13:47:43', '2019-08-22 13:47:43'),
('5406.995', 'Prof. Emory Jacobson II', 'LTR', 83, 49801, 'Armand', '2019-08-22 13:47:43', '2019-08-22 13:47:43'),
('5594.662', 'Wilbert Collins II', 'KG', 11, 44048, 'Eli', '2019-08-22 13:42:05', '2019-08-22 13:42:05'),
('6526.4651', 'Prof. Maurice Gusikowski', 'ONS', 20, 46765, 'Armand', '2019-08-22 13:47:43', '2019-08-22 13:47:43'),
('6753.1755', 'Donna Goldner II', 'ONS', 5, 10245, 'admin', '2019-08-22 13:47:43', '2019-08-22 13:47:43'),
('7267.5222', 'Julio Marks', 'KG', 81, 28128, 'admin', '2019-08-22 13:47:43', '2019-08-22 13:47:43'),
('7914.991', 'Macie Dietrich', 'ONS', 93, 35928, 'Iskandar', '2019-08-22 13:47:43', '2019-08-22 13:47:43'),
('822.7517', 'Prof. Clovis Larson', 'LTR', 66, 83268, 'Iskandar', '2019-08-22 13:42:05', '2019-08-22 13:42:05'),
('8300.5166', 'Trent Hettinger', 'KG', 84, 1289, 'admin', '2019-08-22 13:42:05', '2019-08-22 13:42:05'),
('9295.5866', 'Palma Walsh', 'LTR', 30, 21789, 'Armand', '2019-08-22 13:42:05', '2019-08-22 13:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asal_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kontrak` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nomor_barang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_msk_angka` int(10) UNSIGNED NOT NULL,
  `jml_msk_huruf` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `asal_barang`, `no_kontrak`, `tgl_masuk`, `nomor_barang`, `jml_msk_angka`, `jml_msk_huruf`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'DKB', 'Aircraft Carrier', '2019-08-24', '3113.4272', 10, 'Sepuluh', 'Perbaikan', '2019-08-24 15:22:35', '2019-08-24 15:22:35'),
(2, 'DKB', 'Submarine', '2019-08-24', '3092.500', 10, 'Sepuluh', 'Buat Baru', '2019-08-24 15:22:36', '2019-08-24 15:22:36'),
(3, 'Gal2', 'Aircraft Carrier', '2019-08-24', '3113.4272', 10, 'Sepuluh', 'Perawatan', '2019-08-24 15:22:36', '2019-08-24 15:22:36'),
(4, 'Gal2', 'Kapal', '2019-08-24', '2189.9007', 10, 'Sepuluh', 'Buat Baru', '2019-08-24 15:22:36', '2019-08-24 15:22:36'),
(5, 'DKB', 'Submarine', '2019-08-24', '1386.864', 10, 'Sepuluh', 'Perbaikan', '2019-08-24 15:22:36', '2019-08-24 15:22:36'),
(6, 'Gal1', 'Ship', '2019-08-24', '3113.4272', 10, 'Sepuluh', 'Buat Baru', '2019-08-24 15:22:36', '2019-08-24 15:22:36'),
(7, 'Gal1', 'Kapal', '2019-08-24', '1386.864', 10, 'Sepuluh', 'Buat Baru', '2019-08-24 15:22:36', '2019-08-24 15:22:36'),
(8, 'Gal2', 'Aircraft Carrier', '2019-08-24', '2189.9007', 10, 'Sepuluh', 'Perawatan', '2019-08-24 15:22:36', '2019-08-24 15:22:36'),
(9, 'Gal2', 'Ship', '2019-08-24', '1386.864', 10, 'Sepuluh', 'Perbaikan', '2019-08-24 15:22:36', '2019-08-24 15:22:36'),
(10, 'Gal1', 'Submarine', '2019-08-24', '3113.4272', 10, 'Sepuluh', 'Perawatan', '2019-08-24 15:22:36', '2019-08-24 15:22:36'),
(11, 'Gal1', 'Submarine', '2019-08-24', '3113.4272', 10, 'Sepuluh', 'Buat Baru', '2019-08-24 15:22:45', '2019-08-24 15:22:45'),
(12, 'Gal1', 'Aircraft Carrier', '2019-08-24', '2189.9007', 10, 'Sepuluh', 'Perawatan', '2019-08-24 15:22:45', '2019-08-24 15:22:45'),
(13, 'Gal2', 'Aircraft Carrier', '2019-08-24', '3927.6890', 10, 'Sepuluh', 'Perbaikan', '2019-08-24 15:22:45', '2019-08-24 15:22:45'),
(14, 'Gal1', 'Kapal', '2019-08-24', '2189.9007', 10, 'Sepuluh', 'Perbaikan', '2019-08-24 15:22:45', '2019-08-24 15:22:45'),
(15, 'Gal2', 'Kapal', '2019-08-24', '2189.9007', 10, 'Sepuluh', 'Perawatan', '2019-08-24 15:22:45', '2019-08-24 15:22:45'),
(16, 'DKB', 'Ship', '2019-08-24', '3092.500', 10, 'Sepuluh', 'Perbaikan', '2019-08-24 15:22:45', '2019-08-24 15:22:45'),
(17, 'Gal1', 'Aircraft Carrier', '2019-08-24', '2189.9007', 10, 'Sepuluh', 'Perbaikan', '2019-08-24 15:22:45', '2019-08-24 15:22:45'),
(18, 'Gal2', 'Kapal', '2019-08-24', '3113.4272', 10, 'Sepuluh', 'Perbaikan', '2019-08-24 15:22:45', '2019-08-24 15:22:45'),
(19, 'Gal1', 'Ship', '2019-08-24', '2189.9007', 10, 'Sepuluh', 'Perawatan', '2019-08-24 15:22:45', '2019-08-24 15:22:45'),
(20, 'DKB', 'Submarine', '2019-08-24', '1386.864', 10, 'Sepuluh', 'Perbaikan', '2019-08-24 15:22:45', '2019-08-24 15:22:45');

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
(6, '2019_08_20_161128_user', 1),
(7, '2019_08_20_164544_barang_list', 1),
(8, '2019_08_20_231240_barang_keluar', 1),
(9, '2019_08_20_232033_barang_masuk', 1),
(10, '2019_08_21_134506_audits', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` bigint(20) UNSIGNED NOT NULL,
  `nomor_pegawai` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userpassword` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `nomor_pegawai`, `username`, `userpassword`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Armani', '$2y$10$16JqmvRtfSgw1hSiG0NrP.hptKBNhXJ16iIBeHqwUGu6uBN9BFTrS', 'eEhV4eZnTz6HmSo1lM3IIgU7jfHv4M', '2019-08-25 08:26:55', '2019-08-25 10:42:28'),
(2, 2, 'Iskandar', '$2y$10$74oBI5Pc4Q5PfRIsr2qBseiiS1t64zB2PpWpJbCw361a6OWNmbvAa', 'SE9YYUc1WVp2a1JGWTBKZEtxNnY=', '2019-08-25 11:12:50', '2019-08-30 14:04:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_list`
--
ALTER TABLE `barang_list`
  ADD PRIMARY KEY (`nomor_barang`),
  ADD UNIQUE KEY `barang_list_nomor_barang_unique` (`nomor_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
