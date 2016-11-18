-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Nov 2016 pada 15.05
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `dealer`
--

INSERT INTO `dealer` (`id`, `nama`, `alamat`) VALUES
(3, 'MERDEKA DEALER 1', 'JLN. MANGGA NO. 2'),
(4, 'NUSA DUA', 'JLAN. NUSA DUA ');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `alamat`, `level`, `nomor_hp`, `id_dealer`) VALUES
(3, 'Fitrah Arisandi', 'blackshadow@gmail.com', '892ab763f02795bfa28354ef1d39059f', 'Jlan. Osap Sio Gg. III', 2, '0819212121212', 1),
(4, 'Ichal ', 'nicaljisk@gmail.com', '892ab763f02795bfa28354ef1d39059f', 'Nizar Hafizullah', 2, '081912233232', 1),
(8, 'Nizar Hafizullah', 'nizarhafizullahss66@gmail.com', '892ab763f02795bfa28354ef1d39059f', 'asfiajn nlajsjkldjkl', 2, '01829183892', 1),
(9, 'satria dinata', 'satria@gmail.com', '892ab763f02795bfa28354ef1d39059f', 'jlan. osap sio', 2, '0819212121212', 1),
(10, 'ADMIN DEALER 1', 'nizarhafizullah66@gmail.com', '892ab763f02795bfa28354ef1d39059f', 'JALAN MANGGA DUA NO. 14', 2, '081912737373', 4),
(11, 'NIZAR HAFIZULLAH', 'nicaljiks@gmail.com', '892ab763f02795bfa28354ef1d39059f', 'DESA UTAN, SUMBAWA BESAR', 3, '0819172838123', 4),
(12, 'SUPER ADMIN', 'admin', '0cc175b9c0f1b6a831c399e269772661', '', 1, '', 0),
(13, 'ADMIN DEALER MERDEKA', 'ichal@gmail.com', '892ab763f02795bfa28354ef1d39059f', 'JMDSKJFKSDJKSJD KJSADKJF', 3, '0819281982392', 4),
(14, 'Nizar Hafizullah', 'DEALER@GMAIL.COM', '892ab763f02795bfa28354ef1d39059f', 'j aksjdkk kdjkfjd', 2, '0819172838123', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stck_non_provite`
--

CREATE TABLE IF NOT EXISTS `stck_non_provite` (
  `no_rangka` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_mesin` varchar(15) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `model` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `silinder` varchar(10) NOT NULL,
  `thn_buat` int(4) NOT NULL,
  `thn_rakit` int(4) NOT NULL,
  `merk` varchar(10) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat_pemilik` text NOT NULL,
`id` int(11) NOT NULL,
  `tgl_entri` date NOT NULL,
  `cetak_stck_by` int(11) DEFAULT NULL,
  `cetak_stck_date` date DEFAULT NULL,
  `cetak_suket_by` int(11) DEFAULT NULL,
  `cetak_suket_date` date DEFAULT NULL,
  `lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `stck_non_provite`
--

INSERT INTO `stck_non_provite` (`no_rangka`, `id_user`, `no_mesin`, `tipe`, `id_dealer`, `model`, `jenis`, `warna`, `silinder`, `thn_buat`, `thn_rakit`, `merk`, `nama_pemilik`, `alamat_pemilik`, `id`, `tgl_entri`, `cetak_stck_by`, `cetak_stck_date`, `cetak_suket_by`, `cetak_suket_date`, `lastupdate`, `nama_file`) VALUES
('MH1JFU110GK34916M', 13, 'JFU1E1341845', 'E1F02N11M2 A/T', 4, 'SOLO', 'SEPEDA MOTOR', 'BLACK', '124.85 CC', 2016, 2016, 'HONDA', 'KANTOR CAMAT PENGARON', 'JL.PAHLAWAN NO.26', 1, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:07', 'data2.XLS'),
('MH1KC8111GK06970Z', 13, 'KC81E1069211', 'H5C02R20M1 M/T', 4, 'SOLO', 'SEPEDA MOTOR', 'WHITE BLUE', '149.16 CC', 2016, 2016, 'HONDA', 'BLH KAB.BANJAR', 'JL.A.YANI NO.3 JAWA', 2, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:07', 'data2.XLS'),
('MH1JFW115GK29562K', 13, 'JFW1E1299321', 'C1C02N16M2S A/T', 4, 'SOLO', 'SEPEDA MOTOR', 'MERAH PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'RUSIDI', 'JL. TELUK TIRAM DARAT GG. FAMILI RT.006 RW.001', 3, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:07', 'data2.XLS'),
('MH1JFR115GK28488X', 13, 'JFR1E1280190', 'X1B02R07L0 A/T', 4, 'SOLO', 'SEPEDA MOTOR', 'PUTIH BIRU', '108.2 CC', 2016, 2016, 'HONDA', 'LINA', 'JL. PEKAPURAN A RT.020 RW.002', 4, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:07', 'data2.XLS'),
('MH1KF1114GK54717X', 13, 'KF11E1550208', 'K1H02N14S1 A/T A', 4, 'SOLO', 'SEPEDA MOTOR', 'BLACK RED', '149.32 CC', 2016, 2016, 'HONDA', 'DAHRIANSYAH', 'JL. MARTAPURA LAMA KM 9.5', 5, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:08', 'data2.XLS'),
('MH1JFW117GK378743', 13, 'JFW1E1380811', 'C1C02N16M2S A/T', 4, 'SOLO', 'SEPEDA MOTOR', 'WHITE', '108.2 CC', 2016, 2016, 'HONDA', 'EKO PRASETYO', 'JL.SIDOMULYO RAYA RT/RW 002/009', 6, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:08', 'data2.XLS'),
('MH1JFR118GK318942', 13, 'JFR1E1310273', 'X1B02R07L0 A/T', 4, 'SOLO', 'SEPEDA MOTOR', 'PUTIH MERAH', '108.2 CC', 2016, 2016, 'HONDA', 'MAS''ANI', 'PULAU NYIUR RT/RW 003/002', 7, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:08', 'data2.XLS'),
('MH1KF1115GK583498', 13, 'KF11E1584612', 'K1H02N14S1 A/T A', 4, 'SOLO', 'SEPEDA MOTOR', 'BLACK', '149.32 CC', 2016, 2016, 'HONDA', 'ASNAN', 'DS.PEKAUMAN DALAM RT/RW 002/001', 8, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:08', 'data2.XLS'),
('MH1JFW116GK401476', 13, 'JFW1E1406393', 'C1C02N16M2S A/T', 4, 'SOLO', 'SEPEDA MOTOR', 'HITAM PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'SARJANI', 'GG.DARMAWAN RT/RW 003/008', 9, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:08', 'data2.XLS'),
('MH1JFP12XGK489625', 13, 'JFP1E2467688', 'X1B02N04L0 A/T', 4, 'SOLO', 'SEPEDA MOTOR', 'PUTIH BIRU', '108.2 CC', 2016, 2016, 'HONDA', 'RICKI RINALDI, SE', 'KOMP. BUMI CITRA PERMAI BLOK B RT.003', 10, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:08', 'data2.XLS'),
('MH1KF1119GK604661', 13, 'KF11E1603779', 'K1H02N14S1 A/T A', 4, 'SOLO', 'SEPEDA MOTOR', 'BROWN', '149.32 CC', 2016, 2016, 'HONDA', 'WAYAN AYU ANGGARAYANI', 'DESA WONOREJO RT. 002', 11, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:08', 'data2.XLS'),
('MH1KC8117GK091380', 13, 'KC81E1090839', 'H5C02R20M1 M/T', 4, 'SOLO', 'SEPEDA MOTOR', 'RED SILVER', '149.16 CC', 2016, 2016, 'HONDA', 'HERU NUSANTARA', 'DESA SUNGAI RIAM RT/RW 012/005', 12, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:08', 'data2.XLS'),
('MH1JFW110GK408410', 13, 'JFW1E1399512', 'C1C02N16M2 A/T A', 4, 'SOLO', 'SEPEDA MOTOR', 'KREM-COKLAT', '108.2 CC', 2016, 2016, 'HONDA', 'ERSY FAULINY', 'KOMP.ASABRI BLOK MC-04 RT/RW 018/004', 13, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:08', 'data2.XLS'),
('MH1JFW113GK414217', 13, 'JFW1E1418216', 'C1C02N16M2S A/T', 4, 'SOLO', 'SEPEDA MOTOR', 'HITAM PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'HELDA WATI', 'BATUMANDI RT. 001', 14, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:08', 'data2.XLS'),
('MH1JFW116GK416253', 13, 'JFW1E1409211', 'C1C02N16M2 A/T A', 4, 'SOLO', 'SEPEDA MOTOR', 'MERAH SILVER', '108.2 CC', 2016, 2016, 'HONDA', 'YUYUN ISWAHYUNI', 'JL.CEMPAKA RAYA AGRARIA II GG.5 RT/RW 025/002', 15, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:08', 'data2.XLS'),
('MH1JFW113GK419918', 13, 'JFW1E1420947', 'C1C02N16M2S A/T', 4, 'SOLO', 'SEPEDA MOTOR', 'MERAH PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'MUHAMMAD RAHIM', 'JL. MAHLIGAI RT.006 RW.002', 16, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:08', 'data2.XLS'),
('MH1JFW114GK419913', 13, 'JFW1E1420950', 'C1C02N16M2S A/T', 4, 'SOLO', 'SEPEDA MOTOR', 'MERAH PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'SINTA', 'JL. DEMANG LEMANG RT. 004', 17, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:09', 'data2.XLS'),
('MH1JFW117GK425964', 13, 'JFW1E1430782', 'C1C02N16M2S A/T', 4, 'SOLO', 'SEPEDA MOTOR', 'MERAH PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'MASHURI', 'JL.MENTERI 4 GANG.SETIA ABADI RT/RW 044/015', 18, '2016-11-13', NULL, NULL, NULL, NULL, '2016-11-13 04:55:09', 'data2.XLS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_main_table`
--

CREATE TABLE IF NOT EXISTS `temp_main_table` (
  `no_rangka` varchar(20) NOT NULL,
  `no_mesin` varchar(15) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `model` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `silinder` varchar(10) NOT NULL,
  `thn_buat` int(4) NOT NULL,
  `thn_rakit` int(4) NOT NULL,
  `merk` varchar(10) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat_pemilik` text NOT NULL,
`id` int(11) NOT NULL,
  `jenis_perubahan` enum('U','S','T') NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=687 ;

--
-- Dumping data untuk tabel `temp_main_table`
--

INSERT INTO `temp_main_table` (`no_rangka`, `no_mesin`, `tipe`, `id_dealer`, `model`, `jenis`, `warna`, `silinder`, `thn_buat`, `thn_rakit`, `merk`, `nama_pemilik`, `alamat_pemilik`, `id`, `jenis_perubahan`, `id_user`, `nama_file`) VALUES
('MH1JFU110GK34916M', 'JFU1E1341845', 'E1F02N11M2 A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'BLACK', '124.85 CC', 2016, 2016, 'HONDA', 'KANTOR CAMAT PENGARON', 'JL.PAHLAWAN NO.26', 650, 'U', 11, 'template_data.XLS'),
('MH1KC8111GK06970Z', 'KC81E1069211', 'H5C02R20M1 M/T', 0, 'SOLO', 'SEPEDA MOTOR', 'WHITE BLUE', '149.16 CC', 2016, 2016, 'HONDA', 'BLH KAB.BANJAR', 'JL.A.YANI NO.3 JAWA', 651, 'U', 11, 'template_data.XLS'),
('MH1JFW115GK29562K', 'JFW1E1299321', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'MERAH PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'RUSIDI', 'JL. TELUK TIRAM DARAT GG. FAMILI RT.006 RW.001', 652, 'U', 11, 'template_data.XLS'),
('MH1JFR115GK28488X', 'JFR1E1280190', 'X1B02R07L0 A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'PUTIH BIRU', '108.2 CC', 2016, 2016, 'HONDA', 'LINA', 'JL. PEKAPURAN A RT.020 RW.002', 653, 'U', 11, 'template_data.XLS'),
('MH1KF1114GK54717X', 'KF11E1550208', 'K1H02N14S1 A/T A', 0, 'SOLO', 'SEPEDA MOTOR', 'BLACK RED', '149.32 CC', 2016, 2016, 'HONDA', 'DAHRIANSYAH', 'JL. MARTAPURA LAMA KM 9.5', 654, 'U', 11, 'template_data.XLS'),
('MH1JFW117GK378743', 'JFW1E1380811', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'WHITE', '108.2 CC', 2016, 2016, 'HONDA', 'EKO PRASETYO', 'JL.SIDOMULYO RAYA RT/RW 002/009', 655, 'U', 11, 'template_data.XLS'),
('MH1JFR118GK318942', 'JFR1E1310273', 'X1B02R07L0 A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'PUTIH MERAH', '108.2 CC', 2016, 2016, 'HONDA', 'MAS''ANI', 'PULAU NYIUR RT/RW 003/002', 656, 'U', 11, 'template_data.XLS'),
('MH1KF1115GK583498', 'KF11E1584612', 'K1H02N14S1 A/T A', 0, 'SOLO', 'SEPEDA MOTOR', 'BLACK', '149.32 CC', 2016, 2016, 'HONDA', 'ASNAN', 'DS.PEKAUMAN DALAM RT/RW 002/001', 657, 'U', 11, 'template_data.XLS'),
('MH1JFW116GK401476', 'JFW1E1406393', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'HITAM PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'SARJANI', 'GG.DARMAWAN RT/RW 003/008', 658, 'U', 11, 'template_data.XLS'),
('MH1JFP12XGK489625', 'JFP1E2467688', 'X1B02N04L0 A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'PUTIH BIRU', '108.2 CC', 2016, 2016, 'HONDA', 'RICKI RINALDI, SE', 'KOMP. BUMI CITRA PERMAI BLOK B RT.003', 659, 'U', 11, 'template_data.XLS'),
('MH1KF1119GK604661', 'KF11E1603779', 'K1H02N14S1 A/T A', 0, 'SOLO', 'SEPEDA MOTOR', 'BROWN', '149.32 CC', 2016, 2016, 'HONDA', 'WAYAN AYU ANGGARAYANI', 'DESA WONOREJO RT. 002', 660, 'U', 11, 'template_data.XLS'),
('MH1KC8117GK091380', 'KC81E1090839', 'H5C02R20M1 M/T', 0, 'SOLO', 'SEPEDA MOTOR', 'RED SILVER', '149.16 CC', 2016, 2016, 'HONDA', 'HERU NUSANTARA', 'DESA SUNGAI RIAM RT/RW 012/005', 661, 'U', 11, 'template_data.XLS'),
('MH1JFW110GK408410', 'JFW1E1399512', 'C1C02N16M2 A/T A', 0, 'SOLO', 'SEPEDA MOTOR', 'KREM-COKLAT', '108.2 CC', 2016, 2016, 'HONDA', 'ERSY FAULINY', 'KOMP.ASABRI BLOK MC-04 RT/RW 018/004', 662, 'U', 11, 'template_data.XLS'),
('MH1JFW113GK414217', 'JFW1E1418216', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'HITAM PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'HELDA WATI', 'BATUMANDI RT. 001', 663, 'U', 11, 'template_data.XLS'),
('MH1JFW116GK416253', 'JFW1E1409211', 'C1C02N16M2 A/T A', 0, 'SOLO', 'SEPEDA MOTOR', 'MERAH SILVER', '108.2 CC', 2016, 2016, 'HONDA', 'YUYUN ISWAHYUNI', 'JL.CEMPAKA RAYA AGRARIA II GG.5 RT/RW 025/002', 664, 'U', 11, 'template_data.XLS'),
('MH1JFW113GK419918', 'JFW1E1420947', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'MERAH PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'MUHAMMAD RAHIM', 'JL. MAHLIGAI RT.006 RW.002', 665, 'U', 11, 'template_data.XLS'),
('MH1JFW114GK419913', 'JFW1E1420950', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'MERAH PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'SINTA', 'JL. DEMANG LEMANG RT. 004', 666, 'U', 11, 'template_data.XLS'),
('MH1JFW117GK425964', 'JFW1E1430782', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'MERAH PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'MASHURI', 'JL.MENTERI 4 GANG.SETIA ABADI RT/RW 044/015', 667, 'U', 11, 'template_data.XLS'),
('MH1JFU110GK34916M', 'JFU1E1341845', 'E1F02N11M2 A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'BLACK', '124.85 CC', 2016, 2016, 'HONDA', 'KANTOR CAMAT PENGARON', 'JL.PAHLAWAN NO.26', 669, 'U', 13, 'data2.XLS'),
('MH1KC8111GK06970Z', 'KC81E1069211', 'H5C02R20M1 M/T', 0, 'SOLO', 'SEPEDA MOTOR', 'WHITE BLUE', '149.16 CC', 2016, 2016, 'HONDA', 'BLH KAB.BANJAR', 'JL.A.YANI NO.3 JAWA', 670, 'U', 13, 'data2.XLS'),
('MH1JFW115GK29562K', 'JFW1E1299321', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'MERAH PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'RUSIDI', 'JL. TELUK TIRAM DARAT GG. FAMILI RT.006 RW.001', 671, 'U', 13, 'data2.XLS'),
('MH1JFR115GK28488X', 'JFR1E1280190', 'X1B02R07L0 A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'PUTIH BIRU', '108.2 CC', 2016, 2016, 'HONDA', 'LINA', 'JL. PEKAPURAN A RT.020 RW.002', 672, 'U', 13, 'data2.XLS'),
('MH1KF1114GK54717X', 'KF11E1550208', 'K1H02N14S1 A/T A', 0, 'SOLO', 'SEPEDA MOTOR', 'BLACK RED', '149.32 CC', 2016, 2016, 'HONDA', 'DAHRIANSYAH', 'JL. MARTAPURA LAMA KM 9.5', 673, 'U', 13, 'data2.XLS'),
('MH1JFW117GK378743', 'JFW1E1380811', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'WHITE', '108.2 CC', 2016, 2016, 'HONDA', 'EKO PRASETYO', 'JL.SIDOMULYO RAYA RT/RW 002/009', 674, 'U', 13, 'data2.XLS'),
('MH1JFR118GK318942', 'JFR1E1310273', 'X1B02R07L0 A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'PUTIH MERAH', '108.2 CC', 2016, 2016, 'HONDA', 'MAS''ANI', 'PULAU NYIUR RT/RW 003/002', 675, 'U', 13, 'data2.XLS'),
('MH1KF1115GK583498', 'KF11E1584612', 'K1H02N14S1 A/T A', 0, 'SOLO', 'SEPEDA MOTOR', 'BLACK', '149.32 CC', 2016, 2016, 'HONDA', 'ASNAN', 'DS.PEKAUMAN DALAM RT/RW 002/001', 676, 'U', 13, 'data2.XLS'),
('MH1JFW116GK401476', 'JFW1E1406393', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'HITAM PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'SARJANI', 'GG.DARMAWAN RT/RW 003/008', 677, 'U', 13, 'data2.XLS'),
('MH1JFP12XGK489625', 'JFP1E2467688', 'X1B02N04L0 A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'PUTIH BIRU', '108.2 CC', 2016, 2016, 'HONDA', 'RICKI RINALDI, SE', 'KOMP. BUMI CITRA PERMAI BLOK B RT.003', 678, 'U', 13, 'data2.XLS'),
('MH1KF1119GK604661', 'KF11E1603779', 'K1H02N14S1 A/T A', 0, 'SOLO', 'SEPEDA MOTOR', 'BROWN', '149.32 CC', 2016, 2016, 'HONDA', 'WAYAN AYU ANGGARAYANI', 'DESA WONOREJO RT. 002', 679, 'U', 13, 'data2.XLS'),
('MH1KC8117GK091380', 'KC81E1090839', 'H5C02R20M1 M/T', 0, 'SOLO', 'SEPEDA MOTOR', 'RED SILVER', '149.16 CC', 2016, 2016, 'HONDA', 'HERU NUSANTARA', 'DESA SUNGAI RIAM RT/RW 012/005', 680, 'U', 13, 'data2.XLS'),
('MH1JFW110GK408410', 'JFW1E1399512', 'C1C02N16M2 A/T A', 0, 'SOLO', 'SEPEDA MOTOR', 'KREM-COKLAT', '108.2 CC', 2016, 2016, 'HONDA', 'ERSY FAULINY', 'KOMP.ASABRI BLOK MC-04 RT/RW 018/004', 681, 'U', 13, 'data2.XLS'),
('MH1JFW113GK414217', 'JFW1E1418216', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'HITAM PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'HELDA WATI', 'BATUMANDI RT. 001', 682, 'U', 13, 'data2.XLS'),
('MH1JFW116GK416253', 'JFW1E1409211', 'C1C02N16M2 A/T A', 0, 'SOLO', 'SEPEDA MOTOR', 'MERAH SILVER', '108.2 CC', 2016, 2016, 'HONDA', 'YUYUN ISWAHYUNI', 'JL.CEMPAKA RAYA AGRARIA II GG.5 RT/RW 025/002', 683, 'U', 13, 'data2.XLS'),
('MH1JFW113GK419918', 'JFW1E1420947', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'MERAH PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'MUHAMMAD RAHIM', 'JL. MAHLIGAI RT.006 RW.002', 684, 'U', 13, 'data2.XLS'),
('MH1JFW114GK419913', 'JFW1E1420950', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'MERAH PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'SINTA', 'JL. DEMANG LEMANG RT. 004', 685, 'U', 13, 'data2.XLS'),
('MH1JFW117GK425964', 'JFW1E1430782', 'C1C02N16M2S A/T', 0, 'SOLO', 'SEPEDA MOTOR', 'MERAH PUTIH', '108.2 CC', 2016, 2016, 'HONDA', 'MASHURI', 'JL.MENTERI 4 GANG.SETIA ABADI RT/RW 044/015', 686, 'U', 13, 'data2.XLS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stck_non_provite`
--
ALTER TABLE `stck_non_provite`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_main_table`
--
ALTER TABLE `temp_main_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `stck_non_provite`
--
ALTER TABLE `stck_non_provite`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `temp_main_table`
--
ALTER TABLE `temp_main_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=687;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
