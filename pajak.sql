-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 05:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pajak`
--

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
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'key1', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:api/pajak/index:get', 14, 1585657557, 'key1');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `objekpajak`
--

CREATE TABLE `objekpajak` (
  `idobjekpajak` int(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `nomorplat` varchar(50) NOT NULL,
  `jeniskendaraan` varchar(50) NOT NULL,
  `besarpajak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objekpajak`
--

INSERT INTO `objekpajak` (`idobjekpajak`, `merk`, `type`, `nomorplat`, `jeniskendaraan`, `besarpajak`) VALUES
(1, 'Honda', 'Supra 125', 'N 9393 CEE', 'motor bebek', '1.000.000'),
(2, 'Kawasaki', 'Ninja', 'N 6880 AF', 'Motor', '125.000'),
(3, 'Honda', 'Jazz', 'N 7868 EEG', 'Mobil', '150.000'),
(4, 'aprilia', '', 'N 933 CEE', 'motor', '500000'),
(6, 'happy', '', 'N 993 WE', 'motor', '300000'),
(10, 'Honda', 'Beat', 'N 212 NN', 'Motor', '225000');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idbayar` int(11) NOT NULL,
  `idobjekpajakfk` int(11) NOT NULL,
  `idpetugasfk` int(11) NOT NULL,
  `idnpwpfk` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idbayar`, `idobjekpajakfk`, `idpetugasfk`, `idnpwpfk`, `tanggal`) VALUES
(1, 1, 4, 2, '2020-03-17'),
(2, 3, 5, 3, '2020-03-16'),
(3, 4, 5, 4, '2020-03-20'),
(4, 2, 5, 5, '2020-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `petugaspajak`
--

CREATE TABLE `petugaspajak` (
  `idpetugas` int(11) NOT NULL,
  `namapetugas` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugaspajak`
--

INSERT INTO `petugaspajak` (`idpetugas`, `namapetugas`, `alamat`, `notelp`, `password`) VALUES
(3, 'Wakwak', 'Jl. wadidaw', '1243253453', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Selketep', 'Jl. wadidaw', '1243253453', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Lana', 'Jl.Longhengram', '084436253744', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Fuhuwa', 'Jl. Baratayudha', '0877465742', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'admin', 'jl lorem ipsum', '9348504385093', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mirza', 'mirza@gmail.com', NULL, '$2y$10$yDJttnS.a/UKKgtw/EBA8eBxV02qXhTznrP6eRGHkHAVJAliTXnXK', 'Y5MsbW0ghrvErgbPemAD1UkuZXhRffKhMv7RwMVe7UicrwsKBxKluV17XBA8', '2020-05-18 14:18:00', '2020-05-18 14:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `wajibpajak`
--

CREATE TABLE `wajibpajak` (
  `idnpwp` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `idobjekpajakfk` int(11) DEFAULT NULL,
  `namalengkap` varchar(128) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(5) NOT NULL COMMENT '0 = tdk aktif && 1 = aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wajibpajak`
--

INSERT INTO `wajibpajak` (`idnpwp`, `nama`, `idobjekpajakfk`, `namalengkap`, `alamat`, `notelp`, `password`, `status`) VALUES
(2, 'Meghan', 2, 'Taylor Meghan', 'Jl. wadidaw', '1243253453', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(3, 'Jordan', 3, 'mikaeel jordani', 'Jl. Shalom', '08866253744', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(4, 'sutar', 6, 'sutarji', 'jl lorem ipsum', '0857382422823', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(5, 'agsal', 4, 'agsal fairrohmad', 'jl za warudo', '12321948234387', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objekpajak`
--
ALTER TABLE `objekpajak`
  ADD PRIMARY KEY (`idobjekpajak`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idbayar`),
  ADD KEY `idobjekpajakfk` (`idobjekpajakfk`),
  ADD KEY `idpetugasfk` (`idpetugasfk`),
  ADD KEY `idnpwpfk` (`idnpwpfk`);

--
-- Indexes for table `petugaspajak`
--
ALTER TABLE `petugaspajak`
  ADD PRIMARY KEY (`idpetugas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wajibpajak`
--
ALTER TABLE `wajibpajak`
  ADD PRIMARY KEY (`idnpwp`),
  ADD KEY `idObjekPajak` (`idobjekpajakfk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `objekpajak`
--
ALTER TABLE `objekpajak`
  MODIFY `idobjekpajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `petugaspajak`
--
ALTER TABLE `petugaspajak`
  MODIFY `idpetugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wajibpajak`
--
ALTER TABLE `wajibpajak`
  MODIFY `idnpwp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idnpwpfk`) REFERENCES `wajibpajak` (`idnpwp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`idobjekpajakfk`) REFERENCES `objekpajak` (`idobjekpajak`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`idpetugasfk`) REFERENCES `petugaspajak` (`idpetugas`) ON UPDATE CASCADE;

--
-- Constraints for table `wajibpajak`
--
ALTER TABLE `wajibpajak`
  ADD CONSTRAINT `wajibpajak_ibfk_1` FOREIGN KEY (`idobjekpajakfk`) REFERENCES `objekpajak` (`idobjekpajak`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
