-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2018 at 02:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gloftmaps_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dinas`
--

CREATE TABLE `tbl_dinas` (
  `id_dinas` int(11) NOT NULL,
  `kelembagaan` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `wilayah` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `pimpinan` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `telepon` text CHARACTER SET latin1,
  `fax` text CHARACTER SET latin1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dinas`
--

INSERT INTO `tbl_dinas` (`id_dinas`, `kelembagaan`, `wilayah`, `pimpinan`, `alamat`, `latitude`, `longitude`, `telepon`, `fax`) VALUES
(1, 'Badan Kepegawaian, Pendidikan dan Pelatihan', 'Kota Bandung', 'dr. H. Gunadi Sukma Bhinekas, M.kes', 'Jl. Wastukancana No.2, Babakan Ciamis, Sumur Bandung, Kota Bandung, Jawa Barat 40117, Indonesia', '-6.9131977', '107.60900859999992', '(022) 4206190', '(022) 4206190'),
(2, 'Dinas Kebakaran dan Penanggulangan Bencana', 'Kota Bandung', 'Entol Akhmad Ferdi Ligaswara, S.H. MH.', 'Jl. Sukabumi No.17, Kacapiring, Batununggal, Kota Bandung, Jawa Barat 40271, Indonesia', '-6.916824', '107.63410799999997', '022-7207113', '-'),
(3, 'Dinas Kebudayaan dan Pariwisata', 'Kota Bandung', 'Dra.Dewi Kaniasari,MA.', 'Jl. Jendral Ahmad Yani No.227, Kacapiring, Sumur Bandung, Kota Bandung, Jawa Barat 40113, Indonesia', '-6.9169168', '107.62759260000007', '(022)7271724', '-'),
(4, 'Dinas Kependudukan dan Pencatatan Sipil', 'Kota Bandung', 'Dra. Popong Warliati Nuraeni, M.MPd', 'Jl. Ambon No.1, Citarum, Bandung Wetan, Kota Bandung, Jawa Barat 40115, Indonesia', '-6.9087768', '107.61384980000003', '(022) 4209891', '-'),
(5, 'Rumah Sakit Khusus Ibu dan Anak', 'Kota Bandung', 'dr. Taat Tagore Diah R. , MKKK', 'Jl. Astanaanyar No.224, Nyengseret, Astanaanyar, Kota Bandung, Jawa Barat 40242, Indonesia', '-6.9292601', '107.60046020000004', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sessions`
--

CREATE TABLE `tbl_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sessions`
--

INSERT INTO `tbl_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ss9l64h7ej59b6dg6tlv05pd1rdid3j1', '::1', 1533657768, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533333635373736383b);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(512) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1533661304, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(3, '::1', NULL, '$2y$08$kzDOqL2cOJ3XdFC5jx1Fduz5OrGA6Xi9w5GIVzF.LkJjt4rYVcc9C', NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, 1533662161, 1533662170, 1, 'admin', 'admin', NULL, '08989239'),
(5, '::1', NULL, '$2y$08$ut.uckm1ect9ZZrVOhsLXu0z/Lq2Q/1YBkMSpmU3nYmDELV/EuWlC', NULL, 'ariyaagustian@gmail.com', NULL, NULL, NULL, NULL, 1533662519, 1533890715, 1, 'Ariya', 'Agustian', NULL, '082191987858'),
(6, '::1', NULL, '$2y$08$Mlu/HBAot5MpCvnECYjn6O9HZF8msXZv41sb0ftQwuHdXtmXja0QS', NULL, 'member@email.com', NULL, NULL, NULL, NULL, 1533662660, 1533662675, 1, 'member', 'member', NULL, '023889'),
(7, '::1', NULL, '$2y$08$G/aXMaFYDw.X8sdU00wgduGyjXq9OFO.4JFYXlNjnJFwS1ks7lVN.', NULL, 'admin@email.com', NULL, NULL, NULL, NULL, 1533662726, 1533662733, 1, 'admin', 'admin', NULL, '023889');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 3, 2),
(5, 5, 1),
(6, 6, 2),
(7, 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indexes for table `tbl_sessions`
--
ALTER TABLE `tbl_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  MODIFY `id_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
