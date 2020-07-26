-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 04:11 PM
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
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_p` int(11) NOT NULL,
  `ket_pembayaran` varchar(250) NOT NULL,
  `kategori` enum('Privat','Kelompok Belajar') NOT NULL,
  `jml_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_p`, `ket_pembayaran`, `kategori`, `jml_bayar`) VALUES
(14, 'Administrasi', '', 100000),
(15, 'SPP', 'Privat', 500000),
(17, 'SPP', 'Kelompok Belajar', 350000),
(18, 'Infaq ', 'Privat', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_t` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_bayar` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `bkt_bayar` varchar(250) NOT NULL,
  `status` enum('Lunas','Belum Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_t`, `id_p`, `id_user`, `tgl_bayar`, `bayar`, `bkt_bayar`, `status`) VALUES
(28, 14, 22, 'Sunday, 26-07-2020', 100000, '5f1d8948ee5e0.jpg', 'Lunas'),
(29, 15, 22, 'Sunday, 26-07-2020', 500000, '5f1d8a29e32db.jpg', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` enum('Admin','User') NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `nm_ayah` varchar(50) NOT NULL,
  `nm_ibu` varchar(50) NOT NULL,
  `pk_ayah` varchar(100) NOT NULL,
  `pk_ibu` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jenjang` enum('tk','sd','smp','smk','umum') NOT NULL,
  `kursus` varchar(50) NOT NULL,
  `catatan` varchar(150) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `agama`, `nm_ayah`, `nm_ibu`, `pk_ayah`, `pk_ibu`, `alamat`, `no_hp`, `jenjang`, `kursus`, `catatan`, `photo`) VALUES
(10, '521@gmail.com', '$2y$10$NTOGLO8pDUDtcGzE.Bo99OW.k34SNs/.3wVJ4tLipgTHsmC6kcdP.', 'Admin', 'Sri Sulastri', 'Garut', '2020-07-01', 'perempuan', 'Islam', 'Rohman', 'Aam', 'Pedagang', 'IRT', 'Pasirwangi', '0895554232', 'smk', 'Mewarnai', 'belum pernah', '5efc0d125b464.jpg'),
(11, 'astri@gmail.com', '$2y$10$DXqVmUg0PBGSPir7m5F4..aK9Pq6EqT0iEvNYKd4JzVHEd3/dNi/e', 'User', 'Astri Susilawati', 'Garut', '2020-07-01', 'perempuan', 'Islam', 'Rohman', 'Aam', 'Pedagang', 'IRT', 'Pasirwangi', '08995432222', 'umum', 'Mewarnai', 'tidak ada catatan', '5f01dd8be43f1.jpg'),
(12, '123@gmail.com', '$2y$10$17mSNAQLxE1MnENU4CF1luclEMgyd9TkfMXhSll9IDMLScQEwpkGa', 'User', 'Azmi N', 'Garut', '2020-07-02', 'laki-laki', 'Islam', 'Endang', 'Endah', 'Wiraswasta', 'IRT', 'Pasirwangi', '08966653333', 'umum', 'mewarnai', 'belum pernah ikut', '5efe48a5051de.jpg'),
(15, 'intan@gmail.com', '$2y$10$7CFRdYP3y0ltPu7I7WJ16e0ADg3epDDx.FsKUa8FkzAeZowBQKTu6', 'User', 'Intan Nuraeni', 'Garut', '2020-07-03', 'perempuan', 'Islam', 'Rohman', 'Aam', 'Wiraswasta', 'IRT', 'Pasirwangi', '089936454555', 'sd', 'Mewarnai', 'Betul betul sangat baik', '5efece44dd6bd.jpg'),
(16, '1606001@gmail.com', '$2y$10$iIRxaoltSmX3J/sHQCXN5.9eiFEJiRBGkQ5GMsmL1PwVICFl83Rpq', 'User', 'Enzi', 'Bandung', '2020-07-11', 'laki-laki', 'Islam', 'Benzo', 'Alisya', 'Pengusaha', 'PNS', 'Garkot', '089777665544', 'umum', 'Mewarnai', 'Sangat nyaman', '5f09c160e834b.jpg'),
(17, 'dinda@gmail.com', '$2y$10$EPsfJdi3F.cg8V81tbys0.QJxeVo2lUJDJxoKc53n4si9jqZkPIoe', 'User', 'Adinda', 'Bandung', '2020-07-12', 'perempuan', 'Islam', 'Aa', 'Uu', 'PNS', 'PNS', 'Garut', '087666644322', 'sd', 'Mewarnai', 'Tidak ada', '5f0b21e4684fa.jpg'),
(18, 'anggi@gmail.com', '$2y$10$wgEsFX2WFIa5li4OHwfCdOj8niFvxPNbw4otBS.EsQLTy9cAnVoRO', 'User', 'Anggika', 'Garut', '2020-07-12', 'laki-laki', 'Islam', 'BB', 'AA', 'Karyawan', 'IRT', 'Garut', '087666544332', 'umum', 'Mewarnai', 'Tidak ada', '5f0b22c1de951.jpg'),
(19, 'djemis@gmail.com', '$2y$10$/DUlbkgLs6FTbk2V7m3XHeKV.x9AM7pvoQn6p6m1H0z3oKEbDlvGa', 'User', 'Djemisya', 'Garut', '2020-07-12', 'perempuan', 'Islam', 'Nm', 'Lp', 'Pegawai', 'Wanita karir', 'Garut', '08965432247', 'tk', 'Mewarnai', 'Tidak ada', '5f0b234e9809f.jpg'),
(20, 'denda@gmail.com', '$2y$10$GzgFNAdRvuvPN3ssend9rurWTuS8eitXmSkKwq91c7l2R6AevidaO', 'User', 'Denda', 'Garut', '2020-07-12', 'laki-laki', 'Islam', 'Agus', 'Murni', 'PNS', 'IRT', 'Garut', '08435678865', 'tk', 'Mewarnai', 'Tidak ada', '5f0b23d216638.jpg'),
(21, 'syam@gmail.com', '$2y$10$v3gcJ0p0RAM7PbPgU1oxHuXpJmPzTu5qkpvtldvDtBioEBGpCcRN6', 'User', 'Syam', 'Garut', '2020-07-12', 'laki-laki', 'Islam', 'Perdi', 'Astuti', 'Polisi', 'Pramugari', 'Garut', '08967754324', 'smk', 'Mewarnai', 'Tidak ada', '5f0b244813176.jpg'),
(22, 'srilastri308@gmail.com', '$2y$10$xbTR6CFMWym2ADxdFtYVwurp7/Zl3KMjzZmv34ddvAYJmDwQ97qEO', 'User', 'Sri Sulastri', 'Garut', '2020-07-26', 'perempuan', 'Islam', 'Rohman', 'Aam', 'Wiraswasta', 'Ibu Rumah Tangga', 'Kp. Gadog Pasirwangi', '082113868479', 'umum', 'Mewarnai', 'Bagus, guru sangat akrab dengan muridnya', '5f1d5eb56a9ce.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_t`),
  ADD KEY `f_p` (`id_p`),
  ADD KEY `f_u` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `f_p` FOREIGN KEY (`id_p`) REFERENCES `pembayaran` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `f_u` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
