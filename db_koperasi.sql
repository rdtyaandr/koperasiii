-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2024 at 03:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int NOT NULL,
  `kode_barang` varchar(100) DEFAULT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `detail_barang` varchar(100) DEFAULT NULL,
  `id_satuan` int DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int DEFAULT NULL,
  `harga_jual_pagi` int DEFAULT NULL,
  `harga_jual_sore` int DEFAULT NULL,
  `stok` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `jenis_barang`, `nama_barang`, `detail_barang`, `id_satuan`, `id_kategori`, `harga_beli`, `harga_jual`, `harga_jual_pagi`, `harga_jual_sore`, `stok`, `created_at`, `updated_at`) VALUES
(398, '', 'toko', 'Isoplus', '', 13, 35, 2000, 3000, NULL, NULL, 62, '2024-10-18 10:06:41', '2024-10-18 10:09:52'),
(399, '', 'toko', 'Better', '', 4, 36, 1000, 2000, NULL, NULL, 462, '2024-10-18 10:07:14', '2024-10-18 10:09:52'),
(400, '', 'konsinyasi', 'Gorengan', '', NULL, NULL, 500, NULL, 1500, 1000, 133, '2024-10-18 10:07:40', '2024-10-18 10:13:17'),
(401, '', 'konsinyasi', 'Ote Ote', '', NULL, NULL, 500, NULL, 1500, 1000, 41, '2024-10-18 10:08:01', '2024-10-18 10:13:17'),
(402, '', 'konsinyasi', 'Better', '', NULL, NULL, 1000, NULL, 2000, 1500, 342, '2024-10-18 10:11:11', '2024-10-18 10:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detransaksi`
--

CREATE TABLE `tb_detransaksi` (
  `id_detail` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_barang` int DEFAULT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int NOT NULL,
  `harga_waktu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'default',
  `jumlah` int NOT NULL,
  `total` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_detransaksi`
--

INSERT INTO `tb_detransaksi` (`id_detail`, `id_transaksi`, `id_barang`, `jenis_barang`, `nama_barang`, `harga`, `harga_waktu`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES
(796, 299, 398, 'toko', '398', 3000, 'default', 1, 3000, '2024-10-18 10:08:31', '2024-10-18 10:08:31'),
(797, 300, 398, 'toko', '398', 3000, 'default', 1, 3000, '2024-10-18 10:09:52', '2024-10-18 10:09:52'),
(798, 300, 399, 'toko', '399', 2000, 'default', 2, 4000, '2024-10-18 10:09:52', '2024-10-18 10:09:52'),
(799, 301, 402, 'konsinyasi', '402', 2000, 'pagi', 1, 2000, '2024-10-18 10:11:32', '2024-10-18 10:11:32'),
(800, 302, 401, 'konsinyasi', '401', 1000, 'sore', 1, 1000, '2024-10-18 10:13:17', '2024-10-18 10:13:17'),
(801, 302, 400, 'konsinyasi', '400', 1500, 'pagi', 1, 1500, '2024-10-18 10:13:17', '2024-10-18 10:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_histori`
--

CREATE TABLE `tb_histori` (
  `id` int NOT NULL,
  `message_text` varchar(255) NOT NULL,
  `message_summary` varchar(255) NOT NULL,
  `role` enum('admin','operator','user') NOT NULL,
  `pengguna_id` int NOT NULL,
  `message_icon` varchar(50) NOT NULL,
  `message_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_histori`
--

INSERT INTO `tb_histori` (`id`, `message_text`, `message_summary`, `role`, `pengguna_id`, `message_icon`, `message_date_time`) VALUES
(1173, 'Barang baru ditambahkan', 'Barang dengan nama Isoplus telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-18 10:06:41'),
(1174, 'Barang baru ditambahkan', 'Barang dengan nama Better telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-18 10:07:14'),
(1175, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama Gorengan telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-18 10:07:40'),
(1176, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama Ote Ote telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-18 10:08:02'),
(1177, 'Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh eko.hardi dengan total Rp 3.000', 'admin', 111, 'add_circle_outline', '2024-10-18 10:08:31'),
(1178, 'Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh abd.hakim dengan total Rp 7.000', 'admin', 111, 'add_circle_outline', '2024-10-18 10:09:52'),
(1179, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama Better telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-18 10:11:11'),
(1180, 'Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh abdussalam dengan total Rp 2.000', 'admin', 111, 'add_circle_outline', '2024-10-18 10:11:32'),
(1181, 'Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh abd.hakim dengan total Rp 2.500', 'admin', 111, 'add_circle_outline', '2024-10-18 10:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(35, 'Minuman', '2024-07-30 03:52:07', '2024-07-30 03:52:07'),
(36, 'Makanan', '2024-07-30 03:52:18', '2024-07-30 03:52:18'),
(38, 'ATK', '2024-07-30 06:28:16', '2024-07-30 06:28:16'),
(39, 'AKM (Alat kamar mandi)', '2024-07-30 06:30:25', '2024-07-30 06:30:25'),
(54, 'AKP', '2024-09-18 06:29:54', '2024-09-25 15:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id` int NOT NULL,
  `jenis_pinjaman` text NOT NULL,
  `tanggal_pinjam` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `jumlah_pinjaman` text NOT NULL,
  `lama_pinjaman` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL,
  `waktu_pengajuan` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id`, `jenis_pinjaman`, `tanggal_pinjam`, `jumlah_pinjaman`, `lama_pinjaman`, `is_read`, `created_at`, `status`, `waktu_pengajuan`, `user_id`) VALUES
(79, 'Konsumtif', '2024-10-18', '12000', '4', 0, '2024-10-18 02:24:58', 'Menunggu Persetujuan', '2024-10-18 09:24:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `pengguna_id` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `satker` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pengguna_hak_akses` enum('user','operator','admin') NOT NULL,
  `limit` int DEFAULT '0',
  `limit_total` int DEFAULT '0',
  `profile_picture` varchar(255) DEFAULT NULL,
  `pengguna_date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pengguna_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`pengguna_id`, `nama_lengkap`, `username`, `email`, `satker`, `password`, `pengguna_hak_akses`, `limit`, `limit_total`, `profile_picture`, `pengguna_date_update`, `pengguna_date_created`) VALUES
(1, 'Abdullah Hakim', 'abd.hakim', 'abd.hakim@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 09:04:59', '2024-10-02 07:41:09'),
(2, 'Abdus Salam', 'abdussalam', 'abdussalam@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-14 08:09:56', '2024-10-02 07:41:09'),
(3, 'Achmad Aziz Effendy', 'achmad.effendy', 'achmad.effendy@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(4, 'Adelia Alifiany Basory', 'adelia.alifiany', 'adelia.alifiany@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 09:05:38', '2024-10-02 07:41:09'),
(5, 'Adenan', 'adenan', 'adenan@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(6, 'Adis Nalia', 'adisnalia', 'adisnalia@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(7, 'Afina Nur Firdaus', 'afina.nur', 'afina.nur@BPS.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(8, 'Agus Sutikno', 'asutikno', 'asutikno@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(9, 'Agusta Briliantono Yusuf', 'agusta', 'agusta@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(10, 'Ahcmad Sodik', 'ahcmad.sodik', 'ahcmad.sodik@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(11, 'Ahmad Ayis', 'ayis', 'ayis@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(12, 'Ahmad Rifan Ferdiyansyah', 'ahmad.rifan', 'ahmad.rifan@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(13, 'Ajiwasesa Harumeka', 'ajiwasesa', 'ajiwasesa@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(14, 'Akhmad Yuliadi', 'akhmad.yuliadi', 'akhmad.yuliadi@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(15, 'Aldizah Dajustia Hutami', 'aldizah', 'aldizah@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(16, 'Amin Fathullah', 'amin.fathullah', 'amin.fathullah@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(17, 'Amin Sani Kertiyasa', 'aminsanikertiyasa', 'aminsanikertiyasa@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(18, 'Anang Dwi Setyawan', 'anangdwi-pppk', 'anangdwi-pppk@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(19, 'Anggoro Sosiantiwi', 'awie', 'awie@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(20, 'Arga Parama Yufinanda', 'argaparama', 'argaparama@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(21, 'Arih Thoyyibatul Izdihar', 'arih.izdihar', 'arih.izdihar@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(22, 'Arum Widyastuti', 'arum.widyastuti', 'arum.widyastuti@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(23, 'Bahrul Ulum', 'bahrul.ulum', 'bahrul.ulum@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(24, 'Baiq Irfa Noer Hamidah', 'baiqirfa', 'baiqirfa@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(25, 'Bambang Febrianto', 'bamfebrian', 'bamfebrian@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(26, 'Bambang Yulianto', 'bams', 'bams@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(27, 'Boby Eko Heru Mulyadi', 'boby', 'boby@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(28, 'Chindy Saktias Pratiwi', 'chindy.pratiwi', 'chindy.pratiwi@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(29, 'Chusnul Chotimah', 'chus_chot', 'chus_chot@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(30, 'Daizy Pangeswari', 'daizy.pangeswari', 'daizy.pangeswari@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(31, 'Damas Iskandar Wahidayat', 'damas.wahidayat', 'damas.wahidayat@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(32, 'Debora Sulistya Rini', 'debora.sr', 'debora.sr@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(33, 'Desy Widya Indahyani Hartono', 'desy.widya', 'desy.widya@BPS.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(34, 'Dhani Eko Wahyu Nugroho', 'dhonieko', 'dhonieko@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(35, 'Dian Tri Kusuma Hardiyanto', 'dian_tkh', 'dian_tkh@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(36, 'Dwi Agustin Rahayu Susanti', 'dwi.agustin', 'dwi.agustin@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(37, 'Dyah Pembayun Indrijatmiko', 'pembayun', 'pembayun@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(38, 'Dyah Reni Irmawati', 'dyahreni', 'dyahreni@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(39, 'Dyah Sujiati', 'dyah.sujiati', 'dyah.sujiati@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(40, 'Eko Hardiyanto', 'eko.hardi', 'eko.hardi@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(41, 'Eko Susanto', 'ekosusanto', 'ekosusanto@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(42, 'Elita Susilawati', 'elitasusilawati', 'elitasusilawati@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(43, 'Faridah', 'farid.ah', 'farid.ah@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(44, 'Fitriana Kusmarini', 'kusmarini', 'kusmarini@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(45, 'Fitriana Zahroh', 'azza', 'azza@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(46, 'Gusti Ayu Ratna Dewi', 'gustiard', 'gustiard@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(47, 'Hadi Suroso', 'hadisbaya', 'hadisbaya@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(48, 'Heri Soesanto', 'herisoesanto', 'herisoesanto@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(49, 'Herlina Sri Martanti', 'hsmartanti', 'hsmartanti@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(50, 'Icha Merisa Anie Prananita', 'icha.merisa', 'icha.merisa@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(51, 'Ika Widiati Nugraheny', 'ikanugraheny', 'ikanugraheny@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(52, 'Ike Rahayu Sri', 'ike', 'ike@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(53, 'Irien Kamaratih Arsiani', 'irien.ka', 'irien.ka@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(54, 'Joko Ade Nursiyono', 'joko.ade', 'joko.ade@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(55, 'Kartika Yunitaningtyas', 'kartika.yn', 'kartika.yn@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(56, 'La Ode Ahmad Arafat', 'ahmad.arafat', 'ahmad.arafat@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(57, 'Luxy Lutfiana Rachmawati', 'luxy.lutfiana', 'luxy.lutfiana@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(58, 'Megasari Mamita', 'mamita', 'mamita@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(59, 'Merina Andriati', 'merina.andriati', 'merina.andriati@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(60, 'Meyrina', 'meyrina', 'meyrina@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(61, 'Muhamad Suharsa', 'msuharsa', 'msuharsa@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(62, 'Muhammad Basorudin', 'muh_basorudin', 'muh_basorudin@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(63, 'Muhammad Dwi Prasetiyo', 'md.prasetiyo', 'md.prasetiyo@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(64, 'Muslikin', 'muslikh', 'muslikh@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(65, 'Nanik Hidayati', 'hidayati', 'hidayati@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(66, 'Natria Nur Wulan', 'natria', 'natria@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(67, 'Nik Imatun', 'nikmah', 'nikmah@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(68, 'Nizar Irsyad', 'nizar.irsyad', 'nizar.irsyad@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(69, 'Norman Try Prastomo', 'normantry', 'normantry@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(70, 'Novi Rosiana', 'novi.rosiana', 'novi.rosiana@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(71, 'Nur Jannati Rokimah', 'nur.jannati', 'nur.jannati@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(72, 'Nurhayati', 'nurhayat', 'nurhayat@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(73, 'Nurul Andriana', 'andriananurul', 'andriananurul@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(74, 'Peni Meivita', 'meivita', 'meivita@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(75, 'Pramana Yhoga Chandra Kusuma', 'yhoga', 'yhoga@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(76, 'Pramu Mai Sandi', 'pramu.sandi', 'pramu.sandi@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(77, 'Putri Rachma Sari', 'putri.rachma', 'putri.rachma@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(78, 'Putri Sheilah Wardani', 'putrisheilah-pppk', 'putrisheilah-pppk@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(79, 'R. Arief Budi Setyono', 'arifbudi', 'arifbudi@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(80, 'R. Rino Yunarno', 'rino', 'rino@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(81, 'Rahma Nuryanti', 'rahma.nuryanti', 'rahma.nuryanti@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(82, 'Rendy Karuniawan', 'rendy', 'rendy@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(83, 'Riena Widianingtyas', 'rwidianing', 'rwidianing@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(84, 'Rika Muji Astuti', 'rikamujiastuti', 'rikamujiastuti@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(85, 'Rofikotul Arfati', 'fiko', 'fiko@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(86, 'Ryan Willmanda Januardi', 'ryan.januardi', 'ryan.januardi@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(87, 'Sandra Logaritma', 'sandra.logaritma', 'sandra.logaritma@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(88, 'Satriyo Wibowo', 'satriyo', 'satriyo@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(89, 'Sevtie Marthalena', 'smarthalena', 'smarthalena@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(90, 'Soleh', 'soleh5', 'soleh5@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(91, 'Sumaidi', 'maidi', 'maidi@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(92, 'Sunu Fakhriadi', 'sunufahri', 'sunufahri@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(93, 'Tatis Yuliarisaningtyas', 'tatis', 'tatis@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(94, 'Teguh Trilaksono', 'trilaksono', 'trilaksono@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(95, 'Tri Dewi Wahyuningsih', 'veronicadewi', 'veronicadewi@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(96, 'Ulia Ulfah', 'uli.ulia', 'uli.ulia@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(97, 'Ummatin Yulinda Sangaji', 'linda', 'linda@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(98, 'Uswatun Nurul Afifah', 'uswatunnurula', 'uswatunnurula@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(99, 'Vidya Nurina Paramita', 'vidya.paramita', 'vidya.paramita@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(100, 'Vina Suci Romadhona', 'vina.romadhona', 'vina.romadhona@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(101, 'Wahyu Pujiati', 'wpuji', 'wpuji@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(102, 'Wahyu Razi Indrawan', 'wahyu.razi', 'wahyu.razi@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(103, 'Wahyu Wibowo', 'wahyu.wibowo', 'wahyu.wibowo@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(104, 'Warisna Endah Fitrianti', 'warisna.fitrianti', 'warisna.fitrianti@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(105, 'Widia Puspitasari', 'widia', 'widia@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(106, 'Wikan Nastiti', 'wikan.nastiti', 'wikan.nastiti@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(107, 'Yeni Rahmawati', 'yenirahma', 'yenirahma@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(108, 'Yogi Chandra Sasmita', 'yogi.chandra', 'yogi.chandra@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(109, 'Yulifah Suryana', 'yulifah', 'yulifah@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(110, 'Zulkipli', 'zulki', 'zulki@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-17 14:55:11', '2024-10-02 07:41:09'),
(111, 'Admin User', 'a', 'admin.user@bps.go.id', '3500', '0cc175b9c0f1b6a831c399e269772661', 'admin', 0, 1500000, 'default.png', '2024-10-02 08:10:58', '2024-10-02 07:44:55'),
(112, 'Operator User', 'o', 'operator.user@bps.go.id', '3500', 'd95679752134a2d9eb61dbd7b91c4bcc', 'operator', 0, 1500000, 'default.png', '2024-10-02 08:10:37', '2024-10-02 07:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_harga`
--

CREATE TABLE `tb_riwayat_harga` (
  `id_riwayat` int NOT NULL,
  `id_barang` int DEFAULT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `tanggal_berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int NOT NULL,
  `nama_satuan` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `nama_satuan`, `created_at`, `updated_at`) VALUES
(4, 'Unit', '2024-07-30 08:32:12', '2024-07-30 08:32:12'),
(5, 'Karton/boks', '2024-07-30 08:32:12', '2024-07-30 08:32:12'),
(6, 'Dus/paket', '2024-07-30 08:32:12', '2024-07-30 08:32:12'),
(7, 'Palet', '2024-07-30 08:32:12', '2024-07-30 08:32:12'),
(8, 'm²', '2024-07-30 08:32:12', '2024-07-30 08:32:12'),
(9, 'm³', '2024-07-30 08:32:12', '2024-07-30 08:32:12'),
(10, 'Kg', '2024-07-30 08:32:12', '2024-07-30 08:32:12'),
(11, 'Pon', '2024-07-30 08:32:12', '2024-07-30 08:32:12'),
(12, 'Kemasan', '2024-07-30 08:32:12', '2024-07-30 08:32:12'),
(13, 'PCS', '2024-07-30 08:32:12', '2024-07-30 08:32:12'),
(14, 'Buah', '2024-07-30 08:32:12', '2024-07-30 08:32:12'),
(15, 'Biji', '2024-07-30 08:32:12', '2024-09-25 15:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int NOT NULL,
  `pengguna_id` int NOT NULL,
  `cara_bayar` varchar(50) NOT NULL,
  `total` int NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `pengguna_id`, `cara_bayar`, `total`, `detail`, `created_at`, `updated_at`) VALUES
(299, 40, 'Cash', 3000, '', '2024-10-18 03:08:31', '2024-10-18 03:08:31'),
(300, 1, 'Cash', 7000, '', '2024-10-18 03:09:52', '2024-10-18 03:09:52'),
(301, 2, 'Cash', 2000, '', '2024-10-18 03:11:32', '2024-10-18 03:11:32'),
(302, 1, 'Cash', 2500, '', '2024-10-18 03:13:17', '2024-10-18 03:13:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_detransaksi`
--
ALTER TABLE `tb_detransaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_histori`
--
ALTER TABLE `tb_histori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `tb_riwayat_harga`
--
ALTER TABLE `tb_riwayat_harga`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `tb_detransaksi`
--
ALTER TABLE `tb_detransaksi`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=802;

--
-- AUTO_INCREMENT for table `tb_histori`
--
ALTER TABLE `tb_histori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1182;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `pengguna_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `tb_riwayat_harga`
--
ALTER TABLE `tb_riwayat_harga`
  MODIFY `id_riwayat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detransaksi`
--
ALTER TABLE `tb_detransaksi`
  ADD CONSTRAINT `tb_detransaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `tb_detransaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Constraints for table `tb_riwayat_harga`
--
ALTER TABLE `tb_riwayat_harga`
  ADD CONSTRAINT `tb_riwayat_harga_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `tb_pengguna` (`pengguna_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
