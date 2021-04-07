-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 09:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdonasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `id_iklan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nominal` double NOT NULL,
  `date` int(11) NOT NULL,
  `pesan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id`, `id_iklan`, `id_user`, `name`, `nominal`, `date`, `pesan`) VALUES
(18, 0, 0, 'andi', 2000, 1617636141, 'alhamdulillah'),
(20, 48, 0, 'andi', 70000, 1617637879, 'alhamdulilah'),
(21, 44, 0, 'andi', 90000, 1617640619, 'alhamdulillah'),
(22, 44, 0, 'andi', 90000, 1617640658, 'alhamdulillah'),
(23, 44, 0, 'andi', 90000, 1617640751, 'alh'),
(24, 44, 0, 'andi', 70000, 1617640824, 'a'),
(25, 47, 0, 'andi', 90000, 1617644912, 'aslha'),
(26, 46, 0, '', 0, 1617693872, ''),
(27, 46, 0, 'andi', 90000, 1617693882, 'halo'),
(28, 44, 0, 'andi', 90000, 1617693985, 's'),
(29, 46, 0, 'andi', 70000, 1617694052, 'm'),
(30, 46, 0, 'andi', 90000, 1617694092, 'a'),
(31, 44, 0, 'andi', 70000, 1617694163, 'k'),
(32, 44, 0, 'andi', 90000, 1617694264, 'q'),
(33, 44, 0, '', 90000, 1617694473, ''),
(34, 44, 0, '', 90000, 1617694571, ''),
(41, 44, 0, 'andi', 90000, 1617714904, 'l'),
(44, 2, 0, '', 0, 1617717534, ''),
(45, 1, 0, 'andi', 90000, 1617777165, 'alhamdulillah'),
(46, 5, 0, 'andi', 90000, 1617777388, 'Alhamdulillah');

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE `iklan` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(64) NOT NULL,
  `date` int(11) NOT NULL,
  `date_end` int(11) NOT NULL,
  `total_dana` int(11) NOT NULL,
  `cerita` varchar(512) NOT NULL,
  `status` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`id`, `id_kategori`, `id_user`, `judul`, `date`, `date_end`, `total_dana`, `cerita`, `status`, `gambar`) VALUES
(1, 3, 2, 'Bantu Masyarakat Miskin', 1617716235, 1619042400, 8000000, 'jadi gini', 1, 'img_3_gray.jpg'),
(2, 2, 2, 'Kesehatan', 1617716474, 1617573600, 76000000, 'jadi gini', 1, 'img_1.jpg'),
(3, 1, 2, 'Banjir Bandang', 1617768901, 1617746400, 80000000, 'jadi gini', 1, 'img_2.jpg'),
(4, 3, 2, 'Bantu kaum dhuafa', 1617768957, 1619733600, 60000000, 'jadi gini', 0, 'img_2_gray1.jpg'),
(5, 2, 2, 'Kekurangan Makanan', 1617769020, 1622412000, 10000000, 'jadi gini', 1, 'img_3.jpg'),
(6, 3, 2, 'Zakati Kaum Dhuafa', 1617777311, 1619733600, 80000000, 'jadi gini', 0, 'img_2_gray2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_iklan`
--

CREATE TABLE `kategori_iklan` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_iklan`
--

INSERT INTO `kategori_iklan` (`id`, `id_kategori`, `nama_kategori`) VALUES
(1, 1, 'Livelihood'),
(2, 2, 'Health'),
(3, 3, 'Zakat');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_usr` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_usr`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Admin', 'admin@gmail.com', 'default.jpg', '$2y$10$d9bgvInipcSbI63bJvWFleeHibI64TAfUyChb4NjERPs86GZKWN9e', 1, 1, 1616405445),
(2, 'User', 'user@gmail.com', 'default.jpg', '$2y$10$Nq22aqp7VZtDbB8jFBuFJevI3BlSLMPZZ63M/FY2Jc28c8xoDUAiK', 2, 1, 1616405484);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(11, 1, 'Data Iklan', 'admin/data_iklan', 'fas fa-fw fa-folder', 1),
(12, 1, 'Data Kategori', 'admin/data_kategori', 'fas fa-fw fa-folder', 1),
(13, 1, 'Pengajuan Iklan', 'admin/pengajuanIklan', 'fas fa-fw fa-folder', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_iklan`
--
ALTER TABLE `kategori_iklan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_usr`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_iklan`
--
ALTER TABLE `kategori_iklan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
