-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 12:31 PM
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
(4, 'admperpus', 'Admin Perpustakaan', 'perpus@gmail.com', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 0, 3, '2017-11-08 03:18:42', '0000-00-00 00:00:00'),
(5, 'super', 'Super Admin', 'super@gmail.com', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 0, 0, '2017-10-27 03:28:36', '0000-00-00 00:00:00'),
(7, 'bapkm', 'BAPKM', 'bapkm@gmail.com', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 14, 0, '2017-11-08 05:01:25', '0000-00-00 00:00:00');

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
(0, 'Perpustakaan ITS', 'Perpustakaan', NULL, 0, '2017-10-27 02:59:56', '0000-00-00 00:00:00'),
(4, 'Ruang Baca Sistem Informasi', 'Ruang Baca', NULL, 1, '2017-10-26 17:33:54', '0000-00-00 00:00:00'),
(11, 'Ruang Baca Teknik Industri', 'Ruang Baca', NULL, 2, '2017-10-27 04:03:25', '0000-00-00 00:00:00'),
(14, 'BAPKM ITS', 'Bapkm', NULL, 0, '2017-11-02 15:17:22', '0000-00-00 00:00:00');

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
('kf69hg92a5ckv0d34fmnajgnhbrheqrj', '192.168.1.3', 1510311453, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303331313435323b6e616d617c733a31383a2241646d696e2050657270757374616b61616e223b757365726e616d657c733a393a2261646d706572707573223b656d61696c7c733a31363a2270657270757340676d61696c2e636f6d223b726f6c657c733a313a2233223b636976697461735f69647c733a313a2230223b636976697461735f6e616d617c733a31363a2250657270757374616b61616e20495453223b636976697461735f746970657c733a31323a2250657270757374616b61616e223b646570617274656d656e5f69647c733a313a2230223b6c6f676765645f696e7c623a313b),
('qdo7e8rec5kfvp55febdm6o13hhsgbl9', '192.168.1.2', 1510149539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303134393531363b6e616d617c733a353a224241504b4d223b757365726e616d657c733a353a226261706b6d223b656d61696c7c733a31353a226261706b6d40676d61696c2e636f6d223b726f6c657c733a313a2230223b636976697461735f69647c733a323a223134223b636976697461735f6e616d617c733a393a224241504b4d20495453223b636976697461735f746970657c733a353a224261706b6d223b646570617274656d656e5f69647c733a313a2230223b6c6f676765645f696e7c623a313b);

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
(0, 'Institut Teknologi Sepuluh Nopember', '2017-10-27 02:58:53', '0000-00-00 00:00:00'),
(1, 'Sistem Informasi', '2017-10-20 10:25:52', '0000-00-00 00:00:00'),
(2, 'Teknik Industri', '2017-10-27 03:43:31', '0000-00-00 00:00:00');

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
  `jmc_status` int(1) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'mhs si s1-1', '5213100001', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '3', '8', 1, '2017-11-08 11:47:45', '2017-11-08 06:13:47'),
(2, 'mhs si s1-2', '5213100002', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 1, '2017-11-08 11:47:41', '2017-11-02 15:23:14'),
(3, 'mhs si s1-3', '5213100003', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 1, '2017-11-08 11:47:41', '2017-11-02 15:23:14'),
(4, 'mhs si s1-4', '5213100004', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 1, '2017-11-08 11:47:41', '2017-11-02 15:23:14'),
(5, 'mhs si s1-5', '5213100005', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 1, '2017-11-08 11:47:41', '2017-11-02 15:23:14'),
(6, 'mhs si s1-6', '5213100006', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 1, '2017-11-08 11:47:41', '2017-11-02 15:23:14'),
(7, 'mhs si s1-7', '5213100007', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 1, '2017-11-08 11:47:41', '2017-11-02 15:23:14'),
(8, 'mhs si s1-8', '5213100008', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 1, '2017-11-08 11:47:41', '2017-11-02 15:23:14'),
(9, 'mhs si s1-9', '5213100009', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 1, '2017-11-08 11:47:41', '2017-11-02 15:23:14'),
(10, 'mhs si s1-10', '5213100010', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 1, '2017-11-08 11:47:41', '2017-11-02 15:23:14'),
(11, 'mhs si s2-1', '5210100001', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S2', 'M', '1993-10-01', '1111111', '4', 1, '2017-11-08 11:47:23', '2017-10-27 06:09:24'),
(12, 'mhs si s2-2', '5210100002', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S2', 'M', '1993-10-01', '1111111', '4', 1, '2017-11-08 11:47:23', '2017-10-27 06:09:24'),
(13, 'mhs si s2-3', '5210100003', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S2', 'M', '1993-10-01', '1111111', '4', 1, '2017-11-08 11:47:23', '2017-10-27 06:09:24'),
(14, 'mhs si s2-4', '5210100004', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S2', 'M', '1993-10-01', '1111111', '4', 1, '2017-11-08 11:47:23', '2017-10-27 06:09:24'),
(15, 'mhs si s2-5', '5210100005', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S2', 'M', '1993-10-01', '1111111', '4', 1, '2017-11-08 11:47:23', '2017-10-27 06:09:24'),
(16, 'mhs si s3-1', '5209100001', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S3', 'M', '1993-10-01', '1111111', '6', 1, '2017-11-08 11:47:32', '2017-10-27 05:26:07'),
(17, 'mhs si s3-2', '5209100002', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S3', 'M', '1993-10-01', '1111111', '6', 1, '2017-11-08 11:47:32', '2017-10-27 05:26:07'),
(18, 'mhs si s3-3', '5209100003', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S3', 'M', '1993-10-01', '1111111', '6', 1, '2017-11-08 11:47:32', '2017-10-27 05:26:07'),
(19, 'mhs ti s1-1', '2513100001', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '3', '8', 2, '2017-11-08 11:49:29', '2017-10-27 05:19:37'),
(20, 'mhs ti s1-2', '2513100002', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 2, '2017-11-08 11:49:33', '2017-10-27 05:25:31'),
(21, 'mhs ti s1-3', '2513100003', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 2, '2017-11-08 11:49:33', '2017-10-27 05:25:31'),
(22, 'mhs ti s1-4', '2513100004', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 2, '2017-11-08 11:49:33', '2017-10-27 05:25:31'),
(23, 'mhs ti s1-5', '2513100005', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 2, '2017-11-08 11:49:33', '2017-10-27 05:25:31'),
(24, 'mhs ti s1-6', '2513100006', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 2, '2017-11-08 11:49:33', '2017-10-27 05:25:31'),
(25, 'mhs ti s1-7', '2513100007', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 2, '2017-11-08 11:49:33', '2017-10-27 05:25:31'),
(26, 'mhs ti s1-8', '2513100008', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 2, '2017-11-08 11:49:33', '2017-10-27 05:25:31'),
(27, 'mhs ti s1-9', '2513100009', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 2, '2017-11-08 11:49:33', '2017-10-27 05:25:31'),
(28, 'mhs ti s1-10', '2513100010', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S1', 'M', '0000-00-00', '111111', '8', 2, '2017-11-08 11:49:33', '2017-10-27 05:25:31'),
(29, 'mhs ti s2-1', '2510100001', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S2', 'M', '1993-10-01', '1111111', '4', 2, '2017-11-08 11:49:07', '2017-10-27 05:26:07'),
(30, 'mhs ti s2-2', '2510100002', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S2', 'M', '1993-10-01', '1111111', '4', 2, '2017-11-08 11:49:07', '2017-10-27 05:26:07'),
(31, 'mhs ti s2-3', '2510100003', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S2', 'M', '1993-10-01', '1111111', '4', 2, '2017-11-08 11:49:07', '2017-10-27 05:26:07'),
(32, 'mhs ti s2-4', '2510100004', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S2', 'M', '1993-10-01', '1111111', '4', 2, '2017-11-08 11:49:07', '2017-10-27 05:26:07'),
(33, 'mhs ti s2-5', '2510100005', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S2', 'M', '1993-10-01', '1111111', '4', 2, '2017-11-08 11:49:07', '2017-10-27 05:26:07'),
(34, 'mhs ti s3-1', '2509100001', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S3', 'M', '1993-10-01', '1111111', '6', 2, '2017-11-08 11:49:21', '2017-10-27 05:26:07'),
(35, 'mhs ti s3-2', '2509100002', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S3', 'M', '1993-10-01', '1111111', '6', 2, '2017-11-08 11:49:21', '2017-10-27 05:26:07'),
(36, 'mhs ti s3-3', '2509100003', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'S3', 'M', '1993-10-01', '1111111', '6', 2, '2017-11-08 11:49:21', '2017-10-27 05:26:07');

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
(25, 'asd', NULL, 'upload link', 'S2', 0, '2017-11-08 13:25:39', '2017-11-08 14:25:39');

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
  MODIFY `adm_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `civitas`
--
ALTER TABLE `civitas`
  MODIFY `civitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `departemen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `junc_mhs_civitas`
--
ALTER TABLE `junc_mhs_civitas`
  MODIFY `jmc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `junc_mhs_syarat`
--
ALTER TABLE `junc_mhs_syarat`
  MODIFY `jms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `mhs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `syarat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
