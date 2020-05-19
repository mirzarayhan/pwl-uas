-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Apr 2020 pada 08.33
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'key1', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:api/pajak/index:get', 14, 1585657557, 'key1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `objekpajak`
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
-- Dumping data untuk tabel `objekpajak`
--

INSERT INTO `objekpajak` (`idobjekpajak`, `merk`, `type`, `nomorplat`, `jeniskendaraan`, `besarpajak`) VALUES
(1, 'Honda', 'Supra 125', 'N 9393 CEE', 'motor bebek', '1.000.000'),
(2, 'Kawasaki', 'Ninja', 'N 6880 AF', 'Motor', '125.000'),
(3, 'Honda', 'Jazz', 'N 7868 EEG', 'Mobil', '150.000'),
(4, 'aprilia', '', 'N 933 CEE', 'motor', '500000'),
(6, 'happy', '', 'N 993 WE', 'motor', '300000'),
(8, 'Hino', 'Dutro', 'B 4811 LW', 'Truk', '1000000'),
(10, 'Honda', 'Beat', 'N 212 NN', 'Motor', '225000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idbayar` int(11) NOT NULL,
  `idobjekpajakfk` int(11) NOT NULL,
  `idpetugasfk` int(11) NOT NULL,
  `idnpwpfk` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idbayar`, `idobjekpajakfk`, `idpetugasfk`, `idnpwpfk`, `tanggal`) VALUES
(1, 1, 4, 2, '2020-03-17'),
(2, 3, 5, 3, '2020-03-16'),
(3, 4, 5, 4, '2020-03-20'),
(4, 2, 5, 5, '2020-03-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugaspajak`
--

CREATE TABLE `petugaspajak` (
  `idpetugas` int(11) NOT NULL,
  `namapetugas` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugaspajak`
--

INSERT INTO `petugaspajak` (`idpetugas`, `namapetugas`, `alamat`, `notelp`, `password`) VALUES
(3, 'Wakwak', 'Jl. wadidaw', '1243253453', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Selketep', 'Jl. wadidaw', '1243253453', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Lana', 'Jl.Longhengram', '084436253744', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Fuhuwa', 'Jl. Baratayudha', '0877465742', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'admin', 'jl lorem ipsum', '9348504385093', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wajibpajak`
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
-- Dumping data untuk tabel `wajibpajak`
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
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `objekpajak`
--
ALTER TABLE `objekpajak`
  ADD PRIMARY KEY (`idobjekpajak`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idbayar`),
  ADD KEY `idobjekpajakfk` (`idobjekpajakfk`),
  ADD KEY `idpetugasfk` (`idpetugasfk`),
  ADD KEY `idnpwpfk` (`idnpwpfk`);

--
-- Indeks untuk tabel `petugaspajak`
--
ALTER TABLE `petugaspajak`
  ADD PRIMARY KEY (`idpetugas`);

--
-- Indeks untuk tabel `wajibpajak`
--
ALTER TABLE `wajibpajak`
  ADD PRIMARY KEY (`idnpwp`),
  ADD KEY `idObjekPajak` (`idobjekpajakfk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `objekpajak`
--
ALTER TABLE `objekpajak`
  MODIFY `idobjekpajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `petugaspajak`
--
ALTER TABLE `petugaspajak`
  MODIFY `idpetugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `wajibpajak`
--
ALTER TABLE `wajibpajak`
  MODIFY `idnpwp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idnpwpfk`) REFERENCES `wajibpajak` (`idnpwp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`idobjekpajakfk`) REFERENCES `objekpajak` (`idobjekpajak`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`idpetugasfk`) REFERENCES `petugaspajak` (`idpetugas`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wajibpajak`
--
ALTER TABLE `wajibpajak`
  ADD CONSTRAINT `wajibpajak_ibfk_1` FOREIGN KEY (`idobjekpajakfk`) REFERENCES `objekpajak` (`idobjekpajak`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
