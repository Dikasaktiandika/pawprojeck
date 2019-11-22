-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2019 pada 08.57
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL DEFAULT '0',
  `stok` int(11) NOT NULL DEFAULT '0',
  `foto` varchar(70) NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idbarang`, `nama`, `kategori`, `harga`, `stok`, `foto`) VALUES
(7, 'Alcatroz Keyboard Wired Xplorer M550', 'lain', 50000, 2, 'alcatros.jpg'),
(8, 'SSD WD Green 240GB M.2', 'penyimpanan', 445000, 1, 'md m2.jpg'),
(9, 'HDD Caddy 9.5mm', 'lain', 45000, 3, 'caddy 95.jpg'),
(10, 'Bits Sport Baet Headphone BT-008', 'lain', 90000, 5, 'bits.jpg'),
(11, 'SODIMM V-Gen Rescue DDR4 4GB PC19200/240', 'penyimpanan', 300000, 3, 'vgen ddr4.jpg'),
(13, 'Delcell AELLO Powerbank 6000mAh', 'lain', 90000, 2, 'delcell.jpg'),
(14, 'Power Bank Baseus Mulight pd3.0 Quick Ch', 'lain', 350000, 10, 'baseus.jpg'),
(15, 'ROBOT RT130 Power Bank 10000mAh ', 'lain', 150000, 5, 'robot10.jpg'),
(16, 'Samsung Micro SD 64GB Evo Plus', 'penyimpanan', 100000, 4, 'samsung sd.jpg'),
(17, 'TEAMGROUP DDR4 4GB 2400MHz 1,2 v', 'penyimpanan', 350000, 2, 'teamgrup.jpg'),
(18, 'Orico 2139U3 Case External Hardisk 2.5\" ', 'lain', 80000, 7, 'case.jpg'),
(19, 'Vacum Cooler Laptop', 'lain', 45000, 15, 'vacum.jpg'),
(21, 'Sandisk ULTRA Fair CZ73 USB 3.0-16GB', 'lain', 87000, 2, 'rexus.jpg'),
(22, 'Speaker Advance Bluetooth M10 BT', 'lain', 200000, 9, 'advance.jpg'),
(23, 'Speaker Advance Bluetooth M10 BT', 'penyimpanan', 155000, 7, 'toshiba.jpg'),
(24, 'Power Bank iLo F1 12500mAh', 'lain', 167000, 12, 'pbilo125.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `djual`
--

CREATE TABLE `djual` (
  `iddjual` int(11) NOT NULL,
  `idhjual` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `djual`
--

INSERT INTO `djual` (`iddjual`, `idhjual`, `idbarang`, `qty`, `harga`) VALUES
(3, 1, 17, 1, 350000),
(4, 1, 16, 1, 100000),
(5, 2, 8, 1, 445000),
(6, 3, 8, 1, 445000),
(7, 4, 9, 1, 45000),
(8, 4, 9, 1, 45000),
(9, 4, 7, 1, 50000),
(11, 6, 8, 1, 445000),
(12, 6, 10, 1, 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hjual`
--

CREATE TABLE `hjual` (
  `idhjual` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `namacust` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL DEFAULT '',
  `notelp` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hjual`
--

INSERT INTO `hjual` (`idhjual`, `tanggal`, `namacust`, `alamat`, `notelp`) VALUES
(1, '2019-07-21', 'qwer', 'qwew31', '1241'),
(2, '2019-07-21', 'abc', 'def', '123'),
(3, '2019-07-21', 'abc', 'ewtr', '12'),
(4, '2019-07-21', 'q', '1', '1'),
(6, '2019-07-21', 'odah', 'jogja', '67');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(22, 'bayu123', '$2y$10$RlFlcYNPQBtLCydEL.mZLuYvL31oXwVvDm/DA8shb3kArFlpgItjy', 'pembeli'),
(23, 'admin', '$2y$10$Qc1X/hcM7Ps6YWw7DFAjFekzRBqjgsCHqgwX4qX89Ky1Guh1Jjdmi', 'admin'),
(25, 'coba', '$2y$10$m9VcWBjGTG0blE3WNsC9hexdEd98F8FoYuUwSVM9yR6jCOBBxKn3K', 'pembeli'),
(26, '', '$2y$10$lGpdh3vkaEN0uDiHwU4dsOcYJvEZTCU4iZhWgIzrwlVoBn5JA4cCe', 'pembeli');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `nama` (`nama`);

--
-- Indeks untuk tabel `djual`
--
ALTER TABLE `djual`
  ADD PRIMARY KEY (`iddjual`);

--
-- Indeks untuk tabel `hjual`
--
ALTER TABLE `hjual`
  ADD PRIMARY KEY (`idhjual`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `djual`
--
ALTER TABLE `djual`
  MODIFY `iddjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `hjual`
--
ALTER TABLE `hjual`
  MODIFY `idhjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
