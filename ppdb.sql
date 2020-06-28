-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 11:44 AM
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
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id_murid` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
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
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id_murid`, `id_user`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `agama`, `nm_ayah`, `nm_ibu`, `pk_ayah`, `pk_ibu`, `alamat`, `no_hp`, `jenjang`, `kursus`, `catatan`, `photo`) VALUES
(1, 1, 'sri', 'garut', '2020-06-15', 'perempuan', 'islam', 'rohman', 'aam', 'wrswsta', 'irt', 'kp gadog', '081244456776', 'umum', 'mewarnai', 'bagus', 'img3.jpg'),
(4, 3, 'sulastri', 'Garut', '2020-06-01', 'perempuan', 'Islam', 'Rohman', 'Aamm', 'Wiraswasta', 'Ibu Rumah Tangga', 'Kp Gadog Ds. Sirnajaya', '085311377749', 'umum', 'Mewarnai', 'Berkembang dengan baik', 'img3.jpg'),
(5, 2, 'Hendra', 'Bandung', '2020-06-01', 'laki-laki', 'Islam', 'AAAAAA', 'MMMMM', 'WIRASWASTA', 'IRT', 'Pasirwangi', '08976666666', 'smp', 'Mewarnai', 'Nyaman, bagus cara pembelajarannya', 'img1.jpg'),
(6, 4, 'Joni', 'Garut', '2020-06-07', 'laki-laki', 'Islam', 'Denda', 'Astri', 'Pengusaha', 'IRT', 'Pasirwangi', '087666663633', 'smp', 'mewarnai', 'Nyaman, bagus cara pembelajarannya', 'img2.jpg'),
(7, 5, 'Intan Nuraeni', 'Garut', '2020-06-01', 'perempuan', 'Islam', 'Jajang', 'Fitri', 'Wirausaha', 'Karyawan ', 'Pasirwangi', '085311377749', 'sd', 'Mewarnai', 'perngajar yang humble', '5ef857dca5be9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_p` int(11) NOT NULL,
  `id_murid` int(11) NOT NULL,
  `ket_pembayaran` varchar(250) NOT NULL,
  `kategori` enum('Kelompok Belajar','Privat') NOT NULL,
  `batas_bayar` date NOT NULL,
  `jml_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_p`, `id_murid`, `ket_pembayaran`, `kategori`, `batas_bayar`, `jml_bayar`) VALUES
(4, 1, 'registrasi', 'Kelompok Belajar', '2020-06-30', 750000),
(5, 1, 'spp', 'Kelompok Belajar', '2020-06-30', 250000),
(9, 4, 'adm', 'Kelompok Belajar', '2020-06-30', 100000),
(10, 4, 'registrasi', 'Kelompok Belajar', '2020-06-24', 750000),
(11, 5, 'administrasi', 'Privat', '2020-07-01', 100000),
(12, 5, 'spp', 'Privat', '2020-07-01', 500000),
(13, 6, 'adm', 'Privat', '2020-07-01', 100000),
(14, 6, 'spp', 'Privat', '2020-07-01', 500000),
(15, 7, 'administrasi', 'Kelompok Belajar', '2020-06-24', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_t` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  `bkt_bayar` varchar(250) NOT NULL,
  `status` enum('lunas','belum lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_t`, `id_p`, `id`, `tgl_bayar`, `jml_bayar`, `bkt_bayar`, `status`) VALUES
(1, 4, 1, '2020-06-30', 750000, 'img6.jpg', 'lunas'),
(3, 5, 1, '2020-07-31', 100000, 'img7.jpg', 'lunas'),
(6, 9, 3, '2020-06-10', 100000, 'img8.jpg', 'lunas'),
(7, 10, 3, '2020-06-10', 550000, 'img9.jpg', 'belum lunas'),
(8, 11, 5, '2020-06-30', 100000, 'img9.jpg', 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES
(1, '1606104@sttgarut.ac.id', '123456', 'user'),
(2, 'srilastri308@gmail.com', '123', 'user'),
(3, 'srisulastri@yahoo.com', '123', 'user'),
(4, 'aas@gmail.com', '123', 'user'),
(5, 'intan@gmail.com', '123', 'user'),
(8, 'admin@gmail.com', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id_murid`),
  ADD KEY `foreign_murid` (`id_user`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `foreign_bayarmurid` (`id_murid`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_t`),
  ADD KEY `foreign_pembayaran` (`id_p`),
  ADD KEY `foreign_user` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id_murid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `foreign_murid` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `foreign_bayarmurid` FOREIGN KEY (`id_murid`) REFERENCES `murid` (`id_murid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `foreign_pembayaran` FOREIGN KEY (`id_p`) REFERENCES `pembayaran` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_user` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
