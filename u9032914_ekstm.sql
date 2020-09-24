-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2020 at 11:56 PM
-- Server version: 10.3.23-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u9032914_ekstm`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `id_pembuat` int(11) NOT NULL,
  `tanggal_dibuat` int(11) NOT NULL,
  `topik_bahasan` varchar(128) NOT NULL,
  `keterangan_bahasan` varchar(256) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `video` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kstm`
--

CREATE TABLE `laporan_kstm` (
  `id_laporan_kstm` int(11) NOT NULL,
  `id_pelapor` int(11) NOT NULL,
  `tanggal_laporan` int(11) NOT NULL,
  `deskripsi_laporan` varchar(256) NOT NULL,
  `jenis_ternak` varchar(128) NOT NULL,
  `jumlah_ternak_sebelumnya` int(11) NOT NULL,
  `jumlah_ternak_sekarang` int(11) NOT NULL,
  `jumlah_ternak_meninggal` int(11) NOT NULL,
  `keterangan_ternak_meninggal` varchar(256) NOT NULL,
  `jumlah_ternak_sehat` int(11) NOT NULL,
  `jumlah_ternak_sakit` int(11) NOT NULL,
  `keterangan_kesehatan_ternak` varchar(256) NOT NULL,
  `jumlah_ternak_dikonsumsi` int(11) NOT NULL,
  `keterangan_konsumsi` varchar(256) NOT NULL,
  `jumlah_ternak_dijual` int(11) NOT NULL,
  `harga_ternak_perekor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_kstm`
--

INSERT INTO `laporan_kstm` (`id_laporan_kstm`, `id_pelapor`, `tanggal_laporan`, `deskripsi_laporan`, `jenis_ternak`, `jumlah_ternak_sebelumnya`, `jumlah_ternak_sekarang`, `jumlah_ternak_meninggal`, `keterangan_ternak_meninggal`, `jumlah_ternak_sehat`, `jumlah_ternak_sakit`, `keterangan_kesehatan_ternak`, `jumlah_ternak_dikonsumsi`, `keterangan_konsumsi`, `jumlah_ternak_dijual`, `harga_ternak_perekor`) VALUES
(2, 40, 1600963722, '1', '1', 11, 1, 1, '1', 1, 1, '1', 1, '1', 1, 1),
(3, 43, 1600965723, 'a', '1', 1, 1, 1, '1', 1, 1, '1', 1, '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pengontrol`
--

CREATE TABLE `laporan_pengontrol` (
  `id_laporan_pengontrol` int(11) NOT NULL,
  `id_pelapor` int(11) NOT NULL,
  `tanggal_laporan` int(11) NOT NULL,
  `deskripsi_laporan` varchar(256) NOT NULL,
  `jenis_ternak` varchar(128) NOT NULL,
  `jumlah_ternak_sebelumnya` int(11) NOT NULL,
  `jumlah_ternak_sekarang` int(11) NOT NULL,
  `jumlah_ternak_meninggal` int(11) NOT NULL,
  `keterangan_ternak_meninggal` varchar(256) NOT NULL,
  `jumlah_ternak_sehat` int(11) NOT NULL,
  `jumlah_ternak_sakit` int(11) NOT NULL,
  `keterangan_kesehatan_ternak` varchar(256) NOT NULL,
  `jumlah_ternak_dikonsumsi` int(11) NOT NULL,
  `keterangan_konsumsi` varchar(256) NOT NULL,
  `jumlah_ternak_dijual` int(11) NOT NULL,
  `harga_ternak_perekor` int(11) NOT NULL,
  `foto` varchar(128) DEFAULT NULL,
  `video` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id_pemberitahuan` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `tanggal_pemberitahuan` int(11) NOT NULL,
  `isi_pemberitahuan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id_pemberitahuan`, `id_pengirim`, `id_role`, `tanggal_pemberitahuan`, `isi_pemberitahuan`) VALUES
(2, 39, 7, 1600955937, 'asdfdaf'),
(3, 39, 2, 1600956366, 'selamat datang'),
(4, 39, 4, 1600956386, 'buatkan email ya');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan_forum`
--

CREATE TABLE `tanggapan_forum` (
  `id_tanggapan` int(11) NOT NULL,
  `id_penanggap` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `tanggal_tanggapan` int(11) NOT NULL,
  `isi_tanggapan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_create`) VALUES
(25, 'Moh. Fahrul Hafidh', 'sakun915@gmail.com', 'default.jpg', '$2y$10$TOr1i6vLxzysM53Uv6Ofx.wXpGpTijaQOjDsaZPo3h2ppCWFrqwC2', 4, 1, 1600312024),
(27, 's', 'dakun916@gmail.com', 'default.jpg', '$2y$10$xulyhbru7pes6TlDnzmHae61cjR7sPcbgm4ntjvAp4dQbLXKmN3Ku', 1, 1, 1600312890),
(31, 'Alif Aditya Rahman', 'alifadityarahman18@gmail.com', 'default.jpg', '$2y$10$nf1zV.o/GDA6yvqqxeL3ge2nqWLnxReBP4SU2n3XO10UWC0WZvWgm', 2, 1, 1600317800),
(33, 'Adit Aladra', 'adit.aladra@gmail.com', 'default.jpg', '$2y$10$eqy9lwL84jBZ6v8ED2TeX.5mXrpZ1dkx1XrAU2HJAoPgnPkZPLCom', 2, 1, 1600318344),
(39, 'tst', 'test@test.id', 'default.jpg', '$2y$10$RMR8vxGKOCXmMOt0PxiHG.WjLLqRyNFHVPV/qI/5y4nowmMqEZjy2', 3, 1, 1600950084),
(40, 'kstm', 'kstm@gmail.com', 'default.jpg', '$2y$10$u93.h2mfgUIdUgnZqQJdpepkVZBK81S.Jq6xI7wAB9a35VmqptqUW', 7, 1, 1600957480),
(41, 'A', 'a@gmail.com', 'default.jpg', '$2y$10$lAtHzgKPZcRopnmnJDFUFezijN0HJRmQZcG9heUGCY0NGkGFpb3LG', 2, 0, 1600958496),
(42, 'Nsnsjsks', 'yaqinsuainul1@gmail.com', 'default.jpg', '$2y$10$67n7jZpU91IeEtsE1PtMHu9d.4ss2BUlsO25ux1L.TqkA4qd2l1pu', 2, 1, 1600960366),
(43, 'pelapor', 'pengontrol@pelapor.com', 'default.jpg', '$2y$10$0JpROAJc9bFn.59tCbsPquOLb10AgBDmtrnNnqKlFzTSmJPGfSt/y', 8, 1, 1600964040);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(5, 1, 3),
(6, 3, 2),
(7, 3, 8),
(8, 3, 9),
(9, 3, 10),
(10, 5, 10),
(11, 5, 9),
(12, 5, 2),
(14, 5, 8),
(15, 6, 10),
(16, 6, 9),
(17, 6, 2),
(18, 6, 6),
(19, 7, 10),
(20, 7, 9),
(21, 7, 6),
(22, 7, 2),
(23, 8, 2),
(24, 8, 7),
(25, 8, 9),
(26, 8, 10),
(27, 4, 11),
(28, 4, 2),
(29, 4, 10),
(30, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(6, 'Laporan Kstm'),
(7, 'Laporan Pengontrol'),
(8, 'Rekap Laporan'),
(9, 'Pengumuman'),
(10, 'Forum'),
(11, 'Akun');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member'),
(3, 'kepala dkpp'),
(4, 'tu dkpp'),
(5, 'anggota dkpp'),
(6, 'anggota kstm'),
(7, 'ketua kstm'),
(8, 'pengontrol lapangan');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(4, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(5, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(6, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(10, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(14, 6, 'Kelola Laporan', 'kstm', 'fas fa-fw fa-file-alt', 1),
(15, 7, 'Kelola Laporan', 'pengontrol', 'fas fa-fw fa-file-invoice', 1),
(16, 8, 'Rekap', 'rekap', 'fas fa-fw fa-folder-open', 1),
(17, 9, 'Pengumuman', 'pengumuman', 'fas fa-fw fa-bullhorn', 1),
(18, 10, 'Forum', 'forum', 'fas fa-fw fa-comments', 1),
(19, 11, 'Kelola Akun', 'akun', 'fas fa-fw fa-users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `token` varchar(256) NOT NULL,
  `date_created` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(25, 'a@gmail.com', 'MRw64J7R4C61T+tkMqtTOCz5jrVsEo+P1xdwvoJRAKg=', 1600958496);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`),
  ADD KEY `id_pembuat` (`id_pembuat`);

--
-- Indexes for table `laporan_kstm`
--
ALTER TABLE `laporan_kstm`
  ADD PRIMARY KEY (`id_laporan_kstm`),
  ADD KEY `id_pelapor` (`id_pelapor`);

--
-- Indexes for table `laporan_pengontrol`
--
ALTER TABLE `laporan_pengontrol`
  ADD PRIMARY KEY (`id_laporan_pengontrol`),
  ADD KEY `id_pelapor` (`id_pelapor`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id_pemberitahuan`),
  ADD KEY `id_pengirim` (`id_pengirim`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `tanggapan_forum`
--
ALTER TABLE `tanggapan_forum`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_penanggap` (`id_penanggap`),
  ADD KEY `id_forum` (`id_forum`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_kstm`
--
ALTER TABLE `laporan_kstm`
  MODIFY `id_laporan_kstm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan_pengontrol`
--
ALTER TABLE `laporan_pengontrol`
  MODIFY `id_laporan_pengontrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id_pemberitahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tanggapan_forum`
--
ALTER TABLE `tanggapan_forum`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`id_pembuat`) REFERENCES `user` (`id`);

--
-- Constraints for table `laporan_kstm`
--
ALTER TABLE `laporan_kstm`
  ADD CONSTRAINT `laporan_kstm_ibfk_1` FOREIGN KEY (`id_pelapor`) REFERENCES `user` (`id`);

--
-- Constraints for table `laporan_pengontrol`
--
ALTER TABLE `laporan_pengontrol`
  ADD CONSTRAINT `laporan_pengontrol_ibfk_1` FOREIGN KEY (`id_pelapor`) REFERENCES `user` (`id`);

--
-- Constraints for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD CONSTRAINT `pemberitahuan_ibfk_1` FOREIGN KEY (`id_pengirim`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pemberitahuan_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `tanggapan_forum`
--
ALTER TABLE `tanggapan_forum`
  ADD CONSTRAINT `tanggapan_forum_ibfk_1` FOREIGN KEY (`id_penanggap`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tanggapan_forum_ibfk_2` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id_forum`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
