-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2017 at 01:40 PM
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

INSERT INTO `adm` (`adm_id`, `adm_username`, `adm_email`, `adm_password`, `adm_civitas_id`, `adm_role`, `created_at`, `updated_at`) VALUES
(1, 'baskara', 'baskara@gmail.com', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 1, 0, '2017-10-18 15:21:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `civitas`
--

CREATE TABLE `civitas` (
  `civitas_id` int(11) NOT NULL,
  `civitas_nama` varchar(30) NOT NULL,
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
(1, 'Ruang Baca Sistem Informasi', 'Ruang Baca', 'Form Bebas RBSI', 1, '2017-10-20 10:26:10', '0000-00-00 00:00:00');

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
('3ogcs5f11grce43t69fb2634cmtmnegd', '::1', 1508412081, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383431313738343b757365726e616d657c733a373a226261736b617261223b656d61696c7c733a31373a226261736b61726140676d61696c2e636f6d223b636976697461735f6e616d617c733a32373a225275616e6720426163612053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a225275616e672042616361223b6c6f676765645f696e7c623a313b636976697461735f69647c733a313a2231223b),
('5d3qt7rool1fmp14ossrl13mejg0771a', '::1', 1508342327, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383334323037383b757365726e616d657c733a373a226261736b617261223b656d61696c7c733a31373a226261736b61726140676d61696c2e636f6d223b636976697461735f6e616d617c733a32373a225275616e6720426163612053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a225275616e672042616361223b6c6f676765645f696e7c623a313b),
('9bji5qag0lsai9aopm4f0goklgg2ta86', '::1', 1508413278, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383431323938323b757365726e616d657c733a373a226261736b617261223b656d61696c7c733a31373a226261736b61726140676d61696c2e636f6d223b636976697461735f6e616d617c733a32373a225275616e6720426163612053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a225275616e672042616361223b6c6f676765645f696e7c623a313b636976697461735f69647c733a313a2231223b),
('bhejubhgiuan3vgr5i1fq34nv334dt8q', '::1', 1508342933, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383334323734393b757365726e616d657c733a373a226261736b617261223b656d61696c7c733a31373a226261736b61726140676d61696c2e636f6d223b636976697461735f6e616d617c733a32373a225275616e6720426163612053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a225275616e672042616361223b6c6f676765645f696e7c623a313b),
('cm3n20jq82jkhqlmj9a0f3aafqrs4m7i', '::1', 1508411232, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383431313038343b757365726e616d657c733a373a226261736b617261223b656d61696c7c733a31373a226261736b61726140676d61696c2e636f6d223b636976697461735f6e616d617c733a32373a225275616e6720426163612053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a225275616e672042616361223b6c6f676765645f696e7c623a313b),
('djeh7cu0f2u72j6d7alu9f15h45cp268', '::1', 1508343293, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383334333135353b757365726e616d657c733a373a226261736b617261223b656d61696c7c733a31373a226261736b61726140676d61696c2e636f6d223b636976697461735f6e616d617c733a32373a225275616e6720426163612053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a225275616e672042616361223b6c6f676765645f696e7c623a313b),
('gb4g6vskcv0t6mlkdkk7t6liuu6r6jec', '::1', 1508342723, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383334323432373b757365726e616d657c733a373a226261736b617261223b656d61696c7c733a31373a226261736b61726140676d61696c2e636f6d223b636976697461735f6e616d617c733a32373a225275616e6720426163612053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a225275616e672042616361223b6c6f676765645f696e7c623a313b),
('gjnrujhr6cdqtikrbvu5lulobohp4o2o', '::1', 1508341504, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383334313434393b757365726e616d657c733a373a226261736b617261223b656d61696c7c733a31373a226261736b61726140676d61696c2e636f6d223b636976697461735f6e616d617c733a32373a225275616e6720426163612053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a225275616e672042616361223b6c6f676765645f696e7c623a313b),
('isagmu8h9j1h8uln3nb50f0u76libndb', '::1', 1508413578, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383431333330363b757365726e616d657c733a373a226261736b617261223b656d61696c7c733a31373a226261736b61726140676d61696c2e636f6d223b636976697461735f6e616d617c733a32373a225275616e6720426163612053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a225275616e672042616361223b6c6f676765645f696e7c623a313b636976697461735f69647c733a313a2231223b),
('jssivbiritoqhj2lfhf8qerr7s01iovq', '::1', 1508410567, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383431303536313b757365726e616d657c733a373a226261736b617261223b656d61696c7c733a31373a226261736b61726140676d61696c2e636f6d223b636976697461735f6e616d617c733a32373a225275616e6720426163612053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a225275616e672042616361223b6c6f676765645f696e7c623a313b),
('ma84atr9c1lo13gj7vqghdll8v2s0tn4', '::1', 1508412776, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383431323439353b757365726e616d657c733a373a226261736b617261223b656d61696c7c733a31373a226261736b61726140676d61696c2e636f6d223b636976697461735f6e616d617c733a32373a225275616e6720426163612053697374656d20496e666f726d617369223b636976697461735f746970657c733a31303a225275616e672042616361223b6c6f676765645f696e7c623a313b636976697461735f69647c733a313a2231223b),
('pghpbmd2d6knt7tmr6irujdpd7vqq7vm', '::1', 1508409463, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383430393436333b);

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
(1, 1, 1, '-', '2017-10-19 18:14:15', '2017-10-19 20:14:15'),
(2, 2, 1, 'test', '2017-10-19 16:48:22', '2017-10-19 18:48:22');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junc_mhs_syarat`
--

INSERT INTO `junc_mhs_syarat` (`jms_id`, `jms_mhs_id`, `jms_syarat_id`, `jms_status`, `jms_bukti`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'https://github.com/mfahmizamroni/yudisium', '2017-10-20 11:30:59', '2017-10-20 13:30:59'),
(2, 1, 2, 1, 'testest', '2017-10-20 11:30:59', '2017-10-20 13:30:59'),
(3, 2, 1, 1, '', '2017-10-20 11:31:02', '2017-10-20 13:31:02'),
(4, 2, 2, 1, '', '2017-10-20 11:31:02', '2017-10-20 13:31:02'),
(5, 1, 3, 1, 'asd', '2017-10-20 11:30:59', '2017-10-20 13:30:59'),
(6, 2, 3, 1, '', '2017-10-20 11:31:02', '2017-10-20 13:31:02'),
(7, 1, 4, 1, '', '2017-10-20 11:30:59', '2017-10-20 13:30:59'),
(8, 2, 4, 1, '', '2017-10-20 11:31:02', '2017-10-20 13:31:02'),
(9, 1, 5, 1, '', '2017-10-20 11:30:59', '2017-10-20 13:30:59'),
(10, 2, 5, 1, '', '2017-10-20 11:31:02', '2017-10-20 13:31:02');

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
  `mhs_departemen_id` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`mhs_id`, `mhs_nama`, `mhs_nrp`, `mhs_password`, `mhs_jenjang`, `mhs_departemen_id`, `created_at`, `updated_at`) VALUES
(1, 'Baskara Sakti Mintarum', '5213100153', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 1, '2017-10-20 10:26:49', '0000-00-00 00:00:00'),
(2, 'Muhammad Fahmi Zamroni', '5213100092', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 1, '2017-10-20 10:26:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE `syarat` (
  `syarat_id` int(11) NOT NULL,
  `syarat_nama` varchar(100) NOT NULL,
  `syarat_deskripsi` varchar(150) NOT NULL,
  `syarat_jenis` varchar(30) NOT NULL,
  `syarat_civitas_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syarat`
--

INSERT INTO `syarat` (`syarat_id`, `syarat_nama`, `syarat_deskripsi`, `syarat_jenis`, `syarat_civitas_id`, `created_at`, `updated_at`) VALUES
(1, 'Upload Buku TA', '', 'upload link', 1, '2017-10-19 15:23:09', '2017-10-19 17:23:09'),
(2, 'Mengumpulkan Hard Copy Buku TA', '', 'hard copy', 1, '2017-10-19 11:05:25', '0000-00-00 00:00:00'),
(3, 'upload sesuatu', 'testestes', 'upload link', 1, '2017-10-19 10:04:37', '0000-00-00 00:00:00'),
(4, 'tetsets', 'asdasdasd', 'hard copy', 1, '2017-10-19 10:07:34', '0000-00-00 00:00:00'),
(5, 'coba', 'coba2', 'upload link', 1, '2017-10-19 10:07:56', '0000-00-00 00:00:00');

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
  MODIFY `adm_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `civitas`
--
ALTER TABLE `civitas`
  MODIFY `civitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `departemen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `junc_mhs_civitas`
--
ALTER TABLE `junc_mhs_civitas`
  MODIFY `jmc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `junc_mhs_syarat`
--
ALTER TABLE `junc_mhs_syarat`
  MODIFY `jms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `mhs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `syarat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
