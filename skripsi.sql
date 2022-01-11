-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 04:09 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'ATK01', 'Kertas HVS 80 Gram', 847, NULL, NULL),
(4, 'ATK02', 'Tape Tipex Joyko', 12, NULL, NULL),
(5, 'ATK03', 'Amplop Coklat Tali', 49, NULL, NULL),
(6, 'ATK04', 'Rak buku kantor', 16, NULL, NULL),
(7, 'ATK05', 'Pensil 2b faber casttle', 41, NULL, NULL),
(8, 'ATK06', 'Tinta printer epson merah', 4, NULL, NULL),
(9, 'ATK07', 'Tinta printer epson kuning', 8, NULL, NULL),
(10, 'ATK08', 'Tinta printer epson biru', 3, NULL, NULL),
(11, 'ATK09', 'Tinta printer epson hitam', 8, NULL, NULL),
(12, 'TS01', 'Redmi Note 7', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barangkeluars`
--

CREATE TABLE `barangkeluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kode_keluar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permintaan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_barang_keluar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangkeluars`
--

INSERT INTO `barangkeluars` (`id`, `tanggal`, `kode_keluar`, `permintaan_id`, `user_id`, `total_barang_keluar`, `created_at`, `updated_at`) VALUES
(38, '2021-09-11', 'BK-0000001', 5, 2, 8, '2021-09-11 12:19:23', '2021-09-11 12:19:23'),
(39, '2021-09-11', 'BK-0000002', 6, 3, 4, '2021-09-11 23:43:31', '2021-09-11 23:43:31'),
(40, '2021-09-12', 'BK-0000003', 7, 3, 5, '2021-09-11 23:44:48', '2021-09-11 23:44:48'),
(41, '2021-09-11', 'BK-0000004', 3, 2, 7, '2021-09-12 06:04:54', '2021-09-12 06:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuks`
--

CREATE TABLE `barangmasuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kode_masuk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_barang_masuk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangmasuks`
--

INSERT INTO `barangmasuks` (`id`, `tanggal`, `kode_masuk`, `user_id`, `total_barang_masuk`, `created_at`, `updated_at`) VALUES
(11, '2021-09-12', 'BM-0000001', 1, 6, '2021-09-12 06:01:23', '2021-09-12 06:01:23'),
(12, '2021-09-12', 'BM-0000002', 1, 8, '2021-09-12 06:02:17', '2021-09-12 06:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `detailpemesanans`
--

CREATE TABLE `detailpemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `pemesanan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_suplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailpemesanans`
--

INSERT INTO `detailpemesanans` (`id`, `tanggal`, `pemesanan_id`, `user_id`, `nama_suplier`, `nama_barang`, `harga_barang`, `jumlah_beli`, `total`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, '2021-09-11', 1, 1, 'Mitra sejahtera', 'kursi', 7000, 3, 21000, 21000, '2021-09-11 08:19:41', '2021-09-11 08:19:41'),
(2, '2021-09-11', 2, 1, 'Mitra sejahtera', 'Meja', 7000, 3, 21000, 21000, '2021-09-11 08:22:27', '2021-09-11 08:22:27'),
(3, '2021-09-11', 3, 1, 'Mitra sejahtera', 'Meja', 7000, 3, 21000, 21000, '2021-09-11 09:05:32', '2021-09-11 09:05:32'),
(4, '2021-09-12', 4, 1, 'Toko Sinar Senjaya', 'Meja', 90000, 4, 360000, 440000, '2021-09-12 06:23:35', '2021-09-12 06:23:35'),
(5, '2021-09-12', 4, 1, 'Toko Sinar Senjaya', 'kursi', 40000, 2, 80000, 440000, '2021-09-12 06:23:35', '2021-09-12 06:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `detailproduksis`
--

CREATE TABLE `detailproduksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `produksi_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_kebutuhan_peralatan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailproduksis`
--

INSERT INTO `detailproduksis` (`id`, `tanggal`, `produksi_id`, `user_id`, `barang_id`, `jumlah`, `total_kebutuhan_peralatan`, `created_at`, `updated_at`) VALUES
(1, '2021-09-11', 1, 2, 1, 3, 3, '2021-09-11 09:33:36', '2021-09-11 09:33:36'),
(2, '2021-09-12', 2, 3, 1, 10, 10, '2021-09-12 06:21:24', '2021-09-12 06:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `detail_barangkeluars`
--

CREATE TABLE `detail_barangkeluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `barangkeluar_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_barangkeluars`
--

INSERT INTO `detail_barangkeluars` (`id`, `tanggal`, `barangkeluar_id`, `user_id`, `barang_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(6, '2021-09-11', 38, 2, 1, 4, '2021-09-11 12:19:23', '2021-09-11 12:19:23'),
(7, '2021-09-11', 38, 2, 1, 4, '2021-09-11 12:19:23', '2021-09-11 12:19:23'),
(8, '2021-09-11', 39, 3, 1, 4, '2021-09-11 23:43:31', '2021-09-11 23:43:31'),
(9, '2021-09-12', 40, 3, 1, 5, '2021-09-11 23:44:48', '2021-09-11 23:44:48'),
(10, '2021-09-11', 41, 2, 1, 3, '2021-09-12 06:04:54', '2021-09-12 06:04:54'),
(11, '2021-09-11', 41, 2, 1, 4, '2021-09-12 06:04:54', '2021-09-12 06:04:54');

--
-- Triggers `detail_barangkeluars`
--
DELIMITER $$
CREATE TRIGGER `barangkeluar` AFTER INSERT ON `detail_barangkeluars` FOR EACH ROW BEGIN
UPDATE barang set stock=stock-New.jumlah
WHERE id=New.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_barangmasuks`
--

CREATE TABLE `detail_barangmasuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `barangmasuk_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_barangmasuks`
--

INSERT INTO `detail_barangmasuks` (`id`, `tanggal`, `barangmasuk_id`, `user_id`, `barang_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, '2021-09-11', 1, 1, 1, 3, '2021-09-11 09:15:22', '2021-09-11 09:15:22'),
(2, '2021-09-11', 2, 1, 1, 5, '2021-09-11 09:16:35', '2021-09-11 09:16:35'),
(6, '2021-09-11', 6, 1, 1, 3, '2021-09-11 09:23:06', '2021-09-11 09:23:06'),
(9, '2021-09-11', 9, 1, 1, 3, '2021-09-11 09:31:09', '2021-09-11 09:31:09'),
(10, '2021-09-11', 10, 1, 1, 100, '2021-09-11 09:31:51', '2021-09-11 09:31:51'),
(11, '2021-09-12', 11, 1, 5, 4, '2021-09-12 06:01:23', '2021-09-12 06:01:23'),
(12, '2021-09-12', 11, 1, 9, 2, '2021-09-12 06:01:23', '2021-09-12 06:01:23'),
(13, '2021-09-12', 12, 1, 9, 3, '2021-09-12 06:02:17', '2021-09-12 06:02:17'),
(14, '2021-09-12', 12, 1, 11, 5, '2021-09-12 06:02:17', '2021-09-12 06:02:17');

--
-- Triggers `detail_barangmasuks`
--
DELIMITER $$
CREATE TRIGGER `barang` AFTER INSERT ON `detail_barangmasuks` FOR EACH ROW BEGIN
UPDATE barang set stock=stock+New.jumlah
WHERE id = New.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaan`
--

CREATE TABLE `detail_permintaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `permintaan_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_permintaan`
--

INSERT INTO `detail_permintaan` (`id`, `tanggal`, `permintaan_id`, `user_id`, `barang_id`, `jumlah_permintaan`, `created_at`, `updated_at`) VALUES
(1, '2021-09-11', 1, 2, 1, 3, '2021-09-11 09:33:19', '2021-09-11 09:33:19'),
(2, '2021-09-11', 2, 3, 1, 20, '2021-09-11 09:55:01', '2021-09-11 09:55:01'),
(3, '2021-09-11', 3, 2, 1, 3, '2021-09-11 10:06:47', '2021-09-11 10:06:47'),
(4, '2021-09-11', 3, 2, 1, 4, '2021-09-11 10:06:47', '2021-09-11 10:06:47'),
(6, '2021-09-11', 5, 2, 1, 4, '2021-09-11 10:21:04', '2021-09-11 10:21:04'),
(7, '2021-09-11', 5, 2, 1, 4, '2021-09-11 10:21:04', '2021-09-11 10:21:04'),
(8, '2021-09-11', 6, 3, 1, 4, '2021-09-11 10:45:02', '2021-09-11 10:45:02'),
(9, '2021-09-12', 7, 3, 1, 5, '2021-09-11 23:44:09', '2021-09-11 23:44:09'),
(10, '2021-09-12', 8, 2, 10, 1, '2021-09-12 00:07:13', '2021-09-12 00:07:13');

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
(101, '2014_10_12_000000_create_users_table', 1),
(102, '2014_10_12_100000_create_password_resets_table', 1),
(103, '2021_08_29_065803_create_status_table', 1),
(104, '2021_08_29_160613_create_barang_table', 1),
(105, '2021_09_05_074843_create_permintaans_table', 1),
(106, '2021_09_05_075607_create_roles_table', 1),
(107, '2021_09_06_123823_create_detail_permintaan', 1),
(108, '2021_09_06_152453_create_barangmasuks_table', 1),
(109, '2021_09_07_003648_create_detail_barangkeluars_table', 1),
(110, '2021_09_07_013335_create_detail_barangmasuks_table', 1),
(111, '2021_09_07_055022_create_barangkeluars_table', 1),
(112, '2021_09_07_141804_create_produksis_table', 1),
(113, '2021_09_08_144242_create_pemesanans_table', 1),
(114, '2021_09_09_024652_create_detailpemesanans_table', 1),
(115, '2021_09_09_151132_create_detailproduksis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_pemesanan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_suplier` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_barang_pesanan` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `buktipembayaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanans`
--

INSERT INTO `pemesanans` (`id`, `tanggal`, `user_id`, `kode_pemesanan`, `nama_suplier`, `total_barang_pesanan`, `total_biaya`, `buktipembayaran`, `created_at`, `updated_at`) VALUES
(3, '2021-09-11', 1, 'PM-0000001', 'Mitra sejahtera', 3, 21000, 'Screenshot (13).png', '2021-09-11 09:05:32', '2021-09-11 09:05:32'),
(4, '2021-09-12', 1, 'PM-0000003', 'Toko Sinar Senjaya', 6, 440000, 'nota-300x171.jpg', '2021-09-12 06:23:35', '2021-09-12 06:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `permintaans`
--

CREATE TABLE `permintaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kode_permintaan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_permintaan` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permintaans`
--

INSERT INTO `permintaans` (`id`, `tanggal`, `kode_permintaan`, `user_id`, `total_permintaan`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '2021-09-11', 'PM-0000001', 2, 3, 3, '2021-09-11 09:33:19', '2021-09-11 09:54:13'),
(2, '2021-09-11', 'PM-0000002', 3, 20, 3, '2021-09-11 09:55:01', '2021-09-11 10:19:09'),
(3, '2021-09-11', 'PM-0000003', 2, 7, 3, '2021-09-11 10:06:47', '2021-09-12 06:04:54'),
(4, '2021-09-11', 'PM-0000004', 2, 9, 3, '2021-09-11 10:20:23', '2021-09-11 11:54:08'),
(5, '2021-09-11', 'PM-0000005', 2, 8, 3, '2021-09-11 10:21:04', '2021-09-11 12:18:26'),
(6, '2021-09-11', 'PM-0000006', 3, 4, 3, '2021-09-11 10:45:02', '2021-09-11 10:54:40'),
(7, '2021-09-12', 'PM-0000007', 3, 5, 3, '2021-09-11 23:44:09', '2021-09-11 23:44:48'),
(8, '2021-09-12', 'PM-0000008', 2, 1, 1, '2021-09-12 00:07:13', '2021-09-12 00:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `produksis`
--

CREATE TABLE `produksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kode_produksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis_produksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_kebutuhan_peralatan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produksis`
--

INSERT INTO `produksis` (`id`, `tanggal`, `kode_produksi`, `user_id`, `jenis_produksi`, `keterangan`, `total_kebutuhan_peralatan`, `created_at`, `updated_at`) VALUES
(1, '2021-09-11', 'KP-0000001', 2, 'landing-page', 'Membuat landing page staycation', 3, '2021-09-11 09:33:36', '2021-09-11 09:33:36'),
(2, '2021-09-12', 'KP-0000002', 3, 'wirefrime sistem informasi kepegawai', 'Membuat wirefrime sistem informasi kepegawai', 10, '2021-09-12 06:21:24', '2021-09-12 06:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Sedang Diproses', NULL, NULL),
(2, 'Ditolak', NULL, NULL),
(3, 'Disetujui', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'pegawai', NULL, NULL),
(2, 'gudang', NULL, NULL),
(3, 'manajer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `nik`, `status_id`, `email`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rahmat setiawan', 'rahmat', '$2y$10$OLEYssfzpSMhNPSx36/FgeDUqtq.aFCnFUIm8TK5ldvFF6IkutXS6', 302917737, 2, 'rahmatsetiawan@gmail.com', NULL, 'jKog3eDp0dAvyCRwqJri', '2021-09-11 00:06:11', '2021-09-11 00:06:11'),
(2, 'Agung nugraha', 'agung', '$2y$10$uzI4laDtpIzPchf7O2u2IuMXhATLyH2ca6YkhjFe9ENSQm1RTrRGK', 302433233, 1, 'agungnugraha@gmail.com', NULL, 'ABOUdxenGyta2cZ3LOXH', '2021-09-11 00:49:27', '2021-09-11 00:49:27'),
(3, 'Melani pratiwi', 'melani', '$2y$10$gr8aDsgP/x4k.aUlNTPqkeHryXvafpJhZgfO/VVmRTBZXM1.aSE3e', 30244341, 1, 'melani@gmail.com', NULL, 'lWsy49rfH3tWfLwLmQrK', '2021-09-11 00:54:02', '2021-09-11 00:54:02'),
(4, 'Aqila Anindira', 'aqila', '$2y$10$tyLeZH2YBTYpBEZYva43pe2VS8doL/jIXocRIZcNTwoqwLVF9M3zi', 30244322, 3, 'aqila@gmail.com', NULL, 'jfauGIbNgq5LVUAuvUQw', '2021-09-11 00:56:14', '2021-09-11 00:56:14'),
(5, 'Riska nurfauziah', 'riska', '$2y$10$6Mg7bzlY4fpXm3ldR62mTe7m6cazk142NRHRGSvP0ctj9WlWZlFuu', 273728182, 1, 'riska@gmail.com', NULL, 'h8HfCa1ktT', '2021-09-12 06:28:38', '2021-09-12 06:28:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangkeluars`
--
ALTER TABLE `barangkeluars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangmasuks`
--
ALTER TABLE `barangmasuks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailpemesanans`
--
ALTER TABLE `detailpemesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailproduksis`
--
ALTER TABLE `detailproduksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_barangkeluars`
--
ALTER TABLE `detail_barangkeluars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_barangmasuks`
--
ALTER TABLE `detail_barangmasuks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaans`
--
ALTER TABLE `permintaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksis`
--
ALTER TABLE `produksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `barangkeluars`
--
ALTER TABLE `barangkeluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `barangmasuks`
--
ALTER TABLE `barangmasuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detailpemesanans`
--
ALTER TABLE `detailpemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detailproduksis`
--
ALTER TABLE `detailproduksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_barangkeluars`
--
ALTER TABLE `detail_barangkeluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_barangmasuks`
--
ALTER TABLE `detail_barangmasuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `pemesanans`
--
ALTER TABLE `pemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permintaans`
--
ALTER TABLE `permintaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produksis`
--
ALTER TABLE `produksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
