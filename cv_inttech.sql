-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 03:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_inttech`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_service_masuk`
--

CREATE TABLE `detail_service_masuk` (
  `id_detail` bigint(20) UNSIGNED NOT NULL,
  `id_service` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kerusakan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelengkapan_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_service_masuk`
--

INSERT INTO `detail_service_masuk` (`id_detail`, `id_service`, `nm_unit`, `deskripsi_kerusakan`, `kelengkapan_unit`) VALUES
(1, '525202206001', 'xiaomi', 'hf', 'Unit'),
(2, '525202206002', 'asus', 'csasfvsfsfeg', 'Unit,Charger,Kotak'),
(3, '525202206003', 'asus', 'eq4wetet', 'Unit,Charger');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_jasa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `ketegori` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `nm_jasa`, `harga`, `ketegori`) VALUES
('75001', 'Flashing ROM', 50000, 'handphone');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_pelanggan` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nm_pelanggan`, `telp`, `alamat`) VALUES
('9120220502', 'Rani Gusti Ansyari', '081277590838', 'Indarung'),
('9120220503', 'putra', '52168631312', 'lolong');

-- --------------------------------------------------------

--
-- Table structure for table `service_masuk`
--

CREATE TABLE `service_masuk` (
  `id_service` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pelanggan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teknisi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis_layanan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan_teknisi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_masuk`
--

INSERT INTO `service_masuk` (`id_service`, `id_pelanggan`, `id_teknisi`, `tanggal_masuk`, `jenis_layanan`, `status`, `catatan_teknisi`) VALUES
('525202206001', '9120220502', '20212', '2022-06-19 21:15:53', 'Antar oleh Pelanggan', '8', 'ichbjcgchbmbcssvsv'),
('525202206002', '9120220502', '0', '2022-06-26 10:02:30', 'Di Jemput Oleh Kurir', '1', NULL),
('525202206003', '9120220503', '20212', '2022-06-26 10:49:43', 'Antar oleh Pelanggan', '7', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id_sparepart` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_sparepart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `ketegori` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id_sparepart`, `nm_sparepart`, `harga`, `ketegori`) VALUES
('59001', 'LCD', 350000, 'handphone'),
('59002', 'Baterai HP-BW0036ax', 350000, 'laptop'),
('59003', 'RAM DDR4 8 GB Samsung Evo', 670000, 'laptop'),
('59004', 'Hardisk 1TB Seagate', 700000, 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_teknisi` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nm_teknisi`, `telp`) VALUES
('20212', 'Ahmad Fauzan', '08125164315');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `jenis_pembelian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_user`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'admin@gmail.com', NULL, '$2y$10$sxUr3h/n4HfDLS.Y9p1Z6uVSPnvi7NMuN7aXSvIqNRCrLMtcR1sOy', 'admin', NULL, '2021-12-13 09:15:14', '2022-02-16 13:34:44'),
(29, '9120220502', 'ilhammaulana704@gmail.com', NULL, '$2y$10$Q0KqPmvZoHinEL2qlTbg9u2v0gCuUwLcTvnXykiEmY7c7ZdATUkmC', 'pelanggan', NULL, '2022-06-20 11:04:01', '2022-06-20 11:04:01'),
(30, '20212', 'teknisiinttech@gmail.com', NULL, '$2y$10$UeUZ6tfn735cB9lLi3lNRuSHC81mccpU/2GlP6hxIlPEVOlbKAXmi', 'teknisi', NULL, '2022-06-20 11:09:03', '2022-06-20 11:10:42'),
(31, '9120220503', 'putraevans001@gmail.com', NULL, '$2y$10$MLdhwkHq8cdy8hi1b/YIg.muESoQy09jpdDdV1x4oMHsQbZcwjnf.', 'pelanggan', NULL, '2022-06-26 10:46:46', '2022-06-26 10:46:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_service_masuk`
--
ALTER TABLE `detail_service_masuk`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

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
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `service_masuk`
--
ALTER TABLE `service_masuk`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id_sparepart`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

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
-- AUTO_INCREMENT for table `detail_service_masuk`
--
ALTER TABLE `detail_service_masuk`
  MODIFY `id_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
