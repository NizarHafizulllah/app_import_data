-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Nov 2016 pada 12.07
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app_importdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dealer`
--

CREATE TABLE IF NOT EXISTS `dealer` (
`id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `dealer`
--

INSERT INTO `dealer` (`id`, `nama`, `alamat`) VALUES
(1, 'Tugu Mas', 'Jlan. Mangga No. 17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_table`
--

CREATE TABLE IF NOT EXISTS `main_table` (
  `no_rangka` varchar(20) NOT NULL,
  `no_mesin` varchar(15) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `tipe_x` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `silinder` varchar(10) NOT NULL,
  `thn_buat` int(4) NOT NULL,
  `thn_rakit` int(4) NOT NULL,
  `merk` varchar(10) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat_pemilik` text NOT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
`id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `level` int(1) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `id_dealer` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `alamat`, `level`, `nomor_hp`, `id_dealer`) VALUES
(1, 'Super Admin', 'admin', '0cc175b9c0f1b6a831c399e269772661', '', 1, '', 0),
(2, 'Nizar Hafizullah', 'nizarhafizullah66@gmail.com', '892ab763f02795bfa28354ef1d39059f', 'Jalan Osap Sio ', 2, '0819172838123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_table`
--
ALTER TABLE `main_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `main_table`
--
ALTER TABLE `main_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
