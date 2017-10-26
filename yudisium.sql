-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2017 at 08:31 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yudisium`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `adm_id` int(100) NOT NULL,
  `adm_username` varchar(100) NOT NULL,
  `adm_nama` varchar(50) NOT NULL,
  `adm_email` varchar(30) NOT NULL,
  `adm_password` varchar(100) NOT NULL,
  `adm_civitas_id` int(11) NOT NULL,
  `adm_role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`adm_id`, `adm_username`, `adm_nama`, `adm_email`, `adm_password`, `adm_civitas_id`, `adm_role`, `created_at`, `updated_at`) VALUES
(1, 'baskara', 'Baskara Sakti', 'baskara@gmail.com', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 4, 1, '2017-10-26 14:33:16', '0000-00-00 00:00:00'),
(2, 'fahmi', 'Muchammad Fahmi', 'fahmi@gmail.com', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 2, 0, '2017-10-26 12:56:17', '0000-00-00 00:00:00'),
(3, 'bedu', 'Bedu Dudu', 'bedu@gmail.com', '$2y$10$BsExPyDIbumB09VLrE7yGuMGNclk6EIHJcuxr3dltzY9Yb6VWGkz2', 3, 1, '2017-10-26 14:03:00', '2017-10-26 16:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `civitas`
--

CREATE TABLE `civitas` (
  `civitas_id` int(11) NOT NULL,
  `civitas_nama` varchar(100) NOT NULL,
  `civitas_tipe` varchar(30) NOT NULL,
  `civitas_form_bebas` varchar(100) DEFAULT NULL,
  `civitas_departemen_id` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `civitas`
--

INSERT INTO `civitas` (`civitas_id`, `civitas_nama`, `civitas_tipe`, `civitas_form_bebas`, `civitas_departemen_id`, `created_at`, `updated_at`) VALUES
(2, 'TU Sistem Informasi', 'Tata Usaha', NULL, 1, '2017-10-26 10:58:13', '0000-00-00 00:00:00'),
(3, 'Sistem Enterprise', 'Laboratorium', NULL, 1, '2017-10-26 12:35:11', '0000-00-00 00:00:00'),
(4, 'Ruang Baca Sistem Informasi', 'Ruang Baca', NULL, 1, '2017-10-26 17:33:54', '0000-00-00 00:00:00'),
(5, 'Dosen 1', 'Dosen Pembimbing', NULL, 1, '2017-10-26 16:39:22', '0000-00-00 00:00:00'),
(6, 'Akusisi Data dan Diseminasi Informasi', 'Laboratorium', NULL, 1, '2017-10-26 17:15:04', '0000-00-00 00:00:00'),
(7, 'Dosen 2', 'Dosen Pembimbing', NULL, 1, '2017-10-26 17:15:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('28io89rjuqrard7r400fhnbjkemgfqte', '::1', 1509038450, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393033383334363b6e616d617c733a31353a224d756368616d6d6164204661686d69223b757365726e616d657c733a353a226661686d69223b656d61696c7c733a31353a226661686d6940676d61696c2e636f6d223b726f6c657c733a313a2230223b636976697461735f69647c733a313a2232223b636976697461735f6e616d617c733a31393a2254552053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a2254617461205573616861223b646570617274656d656e5f69647c733a313a2231223b6c6f676765645f696e7c623a313b737563636573737c733a31363a226372656174696f6e2073756363657373223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('5l3f2q15835rpbm5idp3d06av1shf4t8', '::1', 1509042099, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393034323039393b69647c733a313a2231223b6e616d657c733a32323a224261736b6172612053616b7469204d696e746172756d223b6e72707c733a31303a2235323133313030313533223b6a656e6a616e677c733a323a225331223b646570617274656d656e5f69647c733a313a2231223b646570617274656d656e7c733a31363a2253697374656d20496e666f726d617369223b6c6f676765645f696e7c623a313b),
('7mghssd7ktbqf7inul1d1eian4ihlben', '::1', 1509042044, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393034313739343b69647c733a313a2231223b6e616d657c733a32323a224261736b6172612053616b7469204d696e746172756d223b6e72707c733a31303a2235323133313030313533223b6a656e6a616e677c733a323a225331223b646570617274656d656e5f69647c733a313a2231223b646570617274656d656e7c733a31363a2253697374656d20496e666f726d617369223b6c6f676765645f696e7c623a313b),
('dmom4sr4nbtrtdg6ifhaq6m6vabtnoit', '::1', 1509041999, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393034313837373b6e616d617c733a31353a224d756368616d6d6164204661686d69223b757365726e616d657c733a353a226661686d69223b656d61696c7c733a31353a226661686d6940676d61696c2e636f6d223b726f6c657c733a313a2230223b636976697461735f69647c733a313a2232223b636976697461735f6e616d617c733a31393a2254552053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a2254617461205573616861223b646570617274656d656e5f69647c733a313a2231223b6c6f676765645f696e7c623a313b737563636573737c733a31363a226372656174696f6e2073756363657373223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('ek4fmmhg81vu7q6johh9u7lj1n38u12m', '::1', 1509038430, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393033383134373b69647c733a313a2231223b6e616d657c733a32323a224261736b6172612053616b7469204d696e746172756d223b6e72707c733a31303a2235323133313030313533223b6a656e6a616e677c733a323a225331223b646570617274656d656e5f69647c733a313a2231223b646570617274656d656e7c733a31363a2253697374656d20496e666f726d617369223b6c6f676765645f696e7c623a313b),
('lqf7stk48sdmllvt4v23s6chbrcgcq51', '::1', 1509041396, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393034313130303b69647c733a313a2231223b6e616d657c733a32323a224261736b6172612053616b7469204d696e746172756d223b6e72707c733a31303a2235323133313030313533223b6a656e6a616e677c733a323a225331223b646570617274656d656e5f69647c733a313a2231223b646570617274656d656e7c733a31363a2253697374656d20496e666f726d617369223b6c6f676765645f696e7c623a313b737563636573737c733a31353a2250726f66696c652055706461746564223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226e6577223b7d),
('mgb3s30rbvpthpb9fldkl6qnpvus5ejt', '::1', 1509042640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393034323632333b6e616d617c733a393a22426564752044756475223b757365726e616d657c733a343a2262656475223b656d61696c7c733a31343a226265647540676d61696c2e636f6d223b726f6c657c733a313a2231223b636976697461735f69647c733a313a2233223b636976697461735f6e616d617c733a31373a2253697374656d20456e7465727072697365223b636976697461735f746970657c733a31323a224c61626f7261746f7269756d223b646570617274656d656e5f69647c733a313a2231223b6c6f676765645f696e7c623a313b),
('oati547b0ntjmv4124rs5vhepei4ci3v', '::1', 1509041714, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393034313435393b69647c733a313a2231223b6e616d657c733a32323a224261736b6172612053616b7469204d696e746172756d223b6e72707c733a31303a2235323133313030313533223b6a656e6a616e677c733a323a225331223b646570617274656d656e5f69647c733a313a2231223b646570617274656d656e7c733a31363a2253697374656d20496e666f726d617369223b6c6f676765645f696e7c623a313b),
('ov0lvpi2r8ufa05oqt8phi2js1c3fbtd', '::1', 1509038498, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393033383435343b69647c733a313a2231223b6e616d657c733a32323a224261736b6172612053616b7469204d696e746172756d223b6e72707c733a31303a2235323133313030313533223b6a656e6a616e677c733a323a225331223b646570617274656d656e5f69647c733a313a2231223b646570617274656d656e7c733a31363a2253697374656d20496e666f726d617369223b6c6f676765645f696e7c623a313b),
('p1fkimuo7e6r9c9gl90r48rg3ah62gq6', '::1', 1509039508, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393033393230393b69647c733a313a2231223b6e616d657c733a32323a224261736b6172612053616b7469204d696e746172756d223b6e72707c733a31303a2235323133313030313533223b6a656e6a616e677c733a323a225331223b646570617274656d656e5f69647c733a313a2231223b646570617274656d656e7c733a31363a2253697374656d20496e666f726d617369223b6c6f676765645f696e7c623a313b),
('rgurbet1hhdrlmgjf2ke1egn8l7loqrh', '::1', 1509039619, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393033393535353b69647c733a313a2231223b6e616d657c733a32323a224261736b6172612053616b7469204d696e746172756d223b6e72707c733a31303a2235323133313030313533223b6a656e6a616e677c733a323a225331223b646570617274656d656e5f69647c733a313a2231223b646570617274656d656e7c733a31363a2253697374656d20496e666f726d617369223b6c6f676765645f696e7c623a313b),
('srg126kiippmdtpkqernn6jeig3bqhnk', '::1', 1509042651, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530393034323634383b69647c733a313a2231223b6e616d657c733a32323a224261736b6172612053616b7469204d696e746172756d223b6e72707c733a31303a2235323133313030313533223b6a656e6a616e677c733a323a225331223b646570617274656d656e5f69647c733a313a2231223b646570617274656d656e7c733a31363a2253697374656d20496e666f726d617369223b6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `departemen_id` int(11) NOT NULL,
  `departemen_nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`departemen_id`, `departemen_nama`, `created_at`, `updated_at`) VALUES
(1, 'Sistem Informasi', '2017-10-20 10:25:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `junc_mhs_civitas`
--

CREATE TABLE `junc_mhs_civitas` (
  `jmc_id` int(11) NOT NULL,
  `jmc_mhs_id` int(11) NOT NULL,
  `jmc_civitas_id` int(11) NOT NULL,
  `jmc_catatan` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junc_mhs_civitas`
--

INSERT INTO `junc_mhs_civitas` (`jmc_id`, `jmc_mhs_id`, `jmc_civitas_id`, `jmc_catatan`, `created_at`, `updated_at`) VALUES
(15, 1, 5, '', '2017-10-26 18:17:47', '2017-10-26 20:17:47'),
(16, 1, 3, '', '2017-10-26 18:17:47', '2017-10-26 20:17:47'),
(17, 1, 4, '', '2017-10-26 18:17:47', '2017-10-26 20:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `junc_mhs_syarat`
--

CREATE TABLE `junc_mhs_syarat` (
  `jms_id` int(11) NOT NULL,
  `jms_mhs_id` int(11) NOT NULL,
  `jms_syarat_id` int(11) NOT NULL,
  `jms_status` int(11) NOT NULL,
  `jms_bukti` varchar(100) NOT NULL,
  `jms_civitas_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junc_mhs_syarat`
--

INSERT INTO `junc_mhs_syarat` (`jms_id`, `jms_mhs_id`, `jms_syarat_id`, `jms_status`, `jms_bukti`, `jms_civitas_id`, `created_at`, `updated_at`) VALUES
(23, 1, 8, 0, 'Belum Diisi', 4, '2017-10-26 18:17:47', '2017-10-26 20:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `mhs_id` int(11) NOT NULL,
  `mhs_nama` varchar(100) NOT NULL,
  `mhs_nrp` varchar(20) NOT NULL,
  `mhs_password` varchar(100) NOT NULL,
  `mhs_jenjang` varchar(10) NOT NULL,
  `mhs_gender` varchar(20) NOT NULL,
  `mhs_tgllahir` date NOT NULL,
  `mhs_notelp` varchar(20) NOT NULL,
  `mhs_lamastudi` varchar(20) NOT NULL,
  `mhs_departemen_id` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`mhs_id`, `mhs_nama`, `mhs_nrp`, `mhs_password`, `mhs_jenjang`, `mhs_gender`, `mhs_tgllahir`, `mhs_notelp`, `mhs_lamastudi`, `mhs_departemen_id`, `created_at`, `updated_at`) VALUES
(1, 'Baskara Sakti Mintarum', '5213100153', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '3', '8', 1, '2017-10-26 18:17:47', '2017-10-26 20:17:47'),
(2, 'Muhammad Fahmi Zamroni', '5213100092', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '', '', 1, '2017-10-26 16:02:22', '0000-00-00 00:00:00'),
(3, 'MHS 1', '5213100001', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S2', 'M', '1993-10-01', '1111111', '8', 1, '2017-10-26 17:03:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE `syarat` (
  `syarat_id` int(11) NOT NULL,
  `syarat_nama` varchar(100) NOT NULL,
  `syarat_deskripsi` varchar(150) DEFAULT NULL,
  `syarat_jenis` varchar(30) NOT NULL,
  `syarat_jenjang` varchar(10) NOT NULL,
  `syarat_civitas_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syarat`
--

INSERT INTO `syarat` (`syarat_id`, `syarat_nama`, `syarat_deskripsi`, `syarat_jenis`, `syarat_jenjang`, `syarat_civitas_id`, `created_at`, `updated_at`) VALUES
(6, 'Mengumpulkan Buku TA', NULL, 'hard copy', 'S1', 4, '2017-10-26 10:15:36', '0000-00-00 00:00:00'),
(8, 'Sesuatu', NULL, 'hard copy', 'S1', 3, '2017-10-26 12:00:37', '0000-00-00 00:00:00'),
(9, 'Something', NULL, 'checked by admin', 'S1', 6, '2017-10-26 12:20:50', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `civitas`
--
ALTER TABLE `civitas`
  ADD PRIMARY KEY (`civitas_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`,`ip_address`) USING BTREE,
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`departemen_id`);

--
-- Indexes for table `junc_mhs_civitas`
--
ALTER TABLE `junc_mhs_civitas`
  ADD PRIMARY KEY (`jmc_id`);

--
-- Indexes for table `junc_mhs_syarat`
--
ALTER TABLE `junc_mhs_syarat`
  ADD PRIMARY KEY (`jms_id`) USING BTREE;

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`mhs_id`);

--
-- Indexes for table `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`syarat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `adm_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `civitas`
--
ALTER TABLE `civitas`
  MODIFY `civitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `departemen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `junc_mhs_civitas`
--
ALTER TABLE `junc_mhs_civitas`
  MODIFY `jmc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `junc_mhs_syarat`
--
ALTER TABLE `junc_mhs_syarat`
  MODIFY `jms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `mhs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `syarat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
