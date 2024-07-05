-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 10:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_registrasi_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id` int(11) NOT NULL,
  `no_anggota` varchar(100) DEFAULT NULL,
  `nis` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(100) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `status_pernikahan` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `kewarganegaraan` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nomor_hp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `selfie` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `approval` tinyint(1) DEFAULT 1,
  `id_koperasi` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id`, `no_anggota`, `nis`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `agama`, `status_pernikahan`, `pekerjaan`, `kewarganegaraan`, `alamat`, `nomor_hp`, `email`, `selfie`, `ktp`, `id_role`, `approval`, `id_koperasi`, `created_at`, `updated_at`) VALUES
(21, '10.00025.0405', NULL, '3171066206560001', 'Hj. Dina Latifah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0816769253', NULL, NULL, NULL, 1, 1, NULL, '2024-07-05 13:19:15', '2024-07-05 13:19:15'),
(22, '10.05156.0716', NULL, '123456', 'wahyudi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '087785784556', NULL, NULL, NULL, 2, 1, NULL, '2024-07-05 13:19:15', '2024-07-05 13:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_koperasi`
--

CREATE TABLE `tbl_koperasi` (
  `id` int(11) NOT NULL,
  `nama_koperasi` varchar(255) DEFAULT NULL,
  `no_phone` varchar(20) DEFAULT NULL,
  `hp_wa` varchar(20) DEFAULT NULL,
  `hp_fax` varchar(20) DEFAULT NULL,
  `email_koperasi` varchar(50) DEFAULT NULL,
  `url_website` varchar(255) DEFAULT NULL,
  `bidang_koperasi` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(20) DEFAULT NULL,
  `image_logo` varchar(255) DEFAULT NULL,
  `no_akta_pendirian` varchar(255) DEFAULT NULL,
  `tanggal_akta_pendirian` date DEFAULT NULL,
  `no_akta_perubahan` varchar(255) DEFAULT NULL,
  `tanggal_akta_perubahan` date DEFAULT NULL,
  `no_sk_kemenkumham` varchar(255) DEFAULT NULL,
  `tanggal_sk_kemenkumham` date DEFAULT NULL,
  `no_spkum` varchar(255) DEFAULT NULL,
  `tanggal_spkum` date DEFAULT NULL,
  `no_siup` varchar(255) DEFAULT NULL,
  `masa_berlaku_siup` date DEFAULT NULL,
  `no_sk_domisili` varchar(255) DEFAULT NULL,
  `masa_berlaku_sk_domisili` date DEFAULT NULL,
  `no_npwp` varchar(255) DEFAULT NULL,
  `no_pkp` varchar(255) DEFAULT NULL,
  `no_bpjs_kesehatan` varchar(255) DEFAULT NULL,
  `no_bpjs_tenaga_kerja` varchar(255) DEFAULT NULL,
  `no_sertifikat_koperasi` varchar(255) DEFAULT NULL,
  `file_sertifikat_koperasi` varchar(255) DEFAULT NULL,
  `approval` tinyint(1) DEFAULT 1,
  `doc_url` varchar(255) DEFAULT NULL,
  `singkatan_koperasi` varchar(100) DEFAULT NULL,
  `id_inkop` int(11) DEFAULT NULL,
  `id_puskop` int(11) DEFAULT NULL,
  `id_primkop` int(11) DEFAULT NULL,
  `ktp` varchar(255) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `password` text DEFAULT '123456789',
  `id_tingkatan_koperasi` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_koperasi`
--

INSERT INTO `tbl_koperasi` (`id`, `nama_koperasi`, `no_phone`, `hp_wa`, `hp_fax`, `email_koperasi`, `url_website`, `bidang_koperasi`, `alamat`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `kode_pos`, `image_logo`, `no_akta_pendirian`, `tanggal_akta_pendirian`, `no_akta_perubahan`, `tanggal_akta_perubahan`, `no_sk_kemenkumham`, `tanggal_sk_kemenkumham`, `no_spkum`, `tanggal_spkum`, `no_siup`, `masa_berlaku_siup`, `no_sk_domisili`, `masa_berlaku_sk_domisili`, `no_npwp`, `no_pkp`, `no_bpjs_kesehatan`, `no_bpjs_tenaga_kerja`, `no_sertifikat_koperasi`, `file_sertifikat_koperasi`, `approval`, `doc_url`, `singkatan_koperasi`, `id_inkop`, `id_puskop`, `id_primkop`, `ktp`, `slug`, `password`, `id_tingkatan_koperasi`, `created_at`, `updated_at`) VALUES
(2, 'Koperasi Serba Usaha \"Pegangsaan\"', '', '085718478040', '', 'deeah.dhanti@gmail.com', '', 'Serba Usaha', 'Jl. Matraman Dalam III No. 12 Rt. 005/007\n', 'dki jakarta', 'jakarta pusat', 'menteng', 'pegangsaan', '10320', '/koperasi/1719893230157.jpeg', '1367', '1980-09-06', '199', '2011-08-31', '11', '2011-08-25', '1367', '1980-06-09', '1296000230358', '2021-02-05', '118', '2016-07-19', '013745708071000', '123123', '0001263114821', '123456', '3173020020033', NULL, 1, '/koperasi/1719893230161.pdf', 'KSUPegangsaan', NULL, NULL, NULL, '/koperasi/1719893230158.jpeg', 'ksu-pegangsaan', '123456789', 2, '2024-07-05 13:18:46', '2024-07-05 13:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(30) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role_name`, `id_menu`, `created_date`, `updated_at`) VALUES
(1, 'ketua', NULL, '2024-07-03 12:15:12', '2024-07-03 12:15:24'),
(2, 'anggota', NULL, '2024-07-03 12:15:32', '2024-07-03 12:15:39'),
(3, 'pengawas', NULL, '2024-07-05 13:11:32', '2024-07-05 13:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tingkat_koperasi`
--

CREATE TABLE `tbl_tingkat_koperasi` (
  `id` int(11) NOT NULL,
  `nama_tingkatan` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tingkat_koperasi`
--

INSERT INTO `tbl_tingkat_koperasi` (`id`, `nama_tingkatan`, `created_at`, `updated_at`) VALUES
(1, 'inkop', '2024-07-04 12:59:17', '2024-07-04 12:59:17'),
(2, 'puskop', '2024-07-04 12:59:17', '2024-07-04 12:59:17'),
(3, 'primkop', '2024-07-04 12:59:17', '2024-07-04 12:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_koperasi` int(11) DEFAULT NULL,
  `permission_create` int(11) NOT NULL DEFAULT 1,
  `permssion_update` int(11) NOT NULL DEFAULT 1,
  `permission_delete` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `id_role`, `id_koperasi`, `permission_create`, `permssion_update`, `permission_delete`, `created_at`, `updated_at`) VALUES
(1, 'dina29', '', 1, 2, 1, 1, 1, '2024-07-03 12:16:05', '2024-07-03 12:16:05'),
(2, 'wahyudi88', '', 2, 2, 1, 1, 1, '2024-07-03 12:17:09', '2024-07-03 12:17:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_ibfk5` (`id_role`),
  ADD KEY `anggota_ibfk6` (`id_koperasi`);

--
-- Indexes for table `tbl_koperasi`
--
ALTER TABLE `tbl_koperasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `koperasi_ibfk_4` (`id_tingkatan_koperasi`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`),
  ADD KEY `role_ibfk_1` (`id_menu`) USING BTREE;

--
-- Indexes for table `tbl_tingkat_koperasi`
--
ALTER TABLE `tbl_tingkat_koperasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ibfk_2` (`id_role`),
  ADD KEY `user_ibfk_5` (`id_koperasi`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_koperasi`
--
ALTER TABLE `tbl_koperasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tingkat_koperasi`
--
ALTER TABLE `tbl_tingkat_koperasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD CONSTRAINT `anggota_ibfk5` FOREIGN KEY (`id_role`) REFERENCES `tbl_roles` (`id`),
  ADD CONSTRAINT `anggota_ibfk6` FOREIGN KEY (`id_koperasi`) REFERENCES `tbl_koperasi` (`id`);

--
-- Constraints for table `tbl_koperasi`
--
ALTER TABLE `tbl_koperasi`
  ADD CONSTRAINT `koperasi_ibfk_4` FOREIGN KEY (`id_tingkatan_koperasi`) REFERENCES `tbl_tingkat_koperasi` (`id`);

--
-- Constraints for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menu` (`id`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `tbl_roles` (`id`),
  ADD CONSTRAINT `user_ibfk_5` FOREIGN KEY (`id_koperasi`) REFERENCES `tbl_koperasi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
