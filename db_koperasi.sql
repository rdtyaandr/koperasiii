-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2024 at 07:57 AM
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
(398, '66666', 'toko', 'Isoplus', '', 13, 35, 1499, 3000, NULL, NULL, 61, '2024-10-18 10:06:41', '2024-10-30 09:27:14'),
(399, '66667', 'toko', 'Better', '', 4, 36, 1498, 3001, NULL, NULL, 460, '2024-10-18 10:07:14', '2024-10-25 08:29:10'),
(400, '', 'konsinyasi', 'Gorengan', '', NULL, NULL, 500, NULL, 1500, 1000, 132, '2024-10-18 10:07:40', '2024-10-30 09:27:33'),
(401, '565', 'konsinyasi', 'Ote Ote', '', NULL, NULL, 500, NULL, 1500, 1501, 43, '2024-10-18 10:08:01', '2024-10-31 14:39:21'),
(402, '', 'konsinyasi', 'Better', '', NULL, NULL, 1000, NULL, 2000, 1500, 0, '2024-10-18 10:11:11', '2024-11-01 10:33:28'),
(403, '', 'toko', 'Barangggggg', '', 5, 35, 1500, 2000, NULL, NULL, 333, '2024-10-22 15:18:22', '2024-10-22 15:19:13'),
(404, '', 'toko', 'Ote ote', '', 6, 36, 2000, 6000, NULL, NULL, 6885, '2024-10-24 09:02:58', '2024-10-24 09:02:58'),
(424, '', 'konsinyasi', '=0', '', NULL, NULL, 99, NULL, 99686, 9999, 0, '2024-11-04 14:38:39', '2024-11-04 14:39:07');

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
(801, 302, 400, 'konsinyasi', '400', 1500, 'pagi', 1, 1500, '2024-10-18 10:13:17', '2024-10-18 10:13:17'),
(802, 303, 399, 'toko', '399', 3001, 'default', 1, 3001, '2024-10-24 15:01:36', '2024-10-24 15:01:36'),
(803, 304, 399, 'toko', '399', 3001, 'default', 1, 3001, '2024-10-25 08:29:11', '2024-10-25 08:29:11'),
(804, 305, 401, 'konsinyasi', '401', 1501, 'sore', 1, 1501, '2024-10-25 08:29:21', '2024-10-25 08:29:21'),
(805, 306, 398, 'toko', '398', 3000, 'default', 1, 3000, '2024-10-30 09:27:14', '2024-10-30 09:27:14'),
(806, 307, 402, 'konsinyasi', '402', 2000, 'pagi', 1, 2000, '2024-10-30 09:27:21', '2024-10-30 09:27:21'),
(809, 308, 400, '400', '400', 1500, 'pagi', 1, 1500, '2024-10-31 09:09:00', '2024-10-31 09:09:00');

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
(1181, 'Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh abd.hakim dengan total Rp 2.500', 'admin', 111, 'add_circle_outline', '2024-10-18 10:13:17'),
(1182, 'Foto profil diperbarui', 'Anda telah berhasil memperbarui foto profil Anda.', 'admin', 111, 'update', '2024-10-22 08:13:53'),
(1183, 'Barang diubah', 'Barang dengan nama Isoplus telah diubah', 'admin', 111, 'edit', '2024-10-22 11:25:14'),
(1184, 'Barang diubah', 'Barang dengan nama Isoplus telah diubah', 'admin', 111, 'edit', '2024-10-22 11:25:44'),
(1185, 'Barang baru ditambahkan', 'Barang dengan nama Barangggggg telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-22 15:18:22'),
(1186, 'Barang diubah', 'Barang dengan nama Barangggggg telah diubah', 'admin', 111, 'edit', '2024-10-22 15:19:13'),
(1187, 'Barang diubah', 'Barang dengan nama Isoplus telah diubah', 'admin', 111, 'edit', '2024-10-22 15:28:58'),
(1188, 'Barang diubah', 'Barang dengan nama Better telah diubah', 'admin', 111, 'edit', '2024-10-22 15:40:30'),
(1189, 'Barang diubah', 'Barang dengan nama Better telah diubah', 'admin', 111, 'edit', '2024-10-22 15:49:48'),
(1190, 'Barang diubah', 'Barang dengan nama Better telah diubah', 'admin', 111, 'edit', '2024-10-22 15:49:57'),
(1191, 'Barang diubah', 'Barang dengan nama Better telah diubah', 'admin', 111, 'edit', '2024-10-23 10:10:20'),
(1192, 'Barang diubah', 'Barang dengan nama Better telah diubah', 'admin', 111, 'edit', '2024-10-23 10:10:40'),
(1193, 'Barang baru ditambahkan', 'Barang dengan nama Ote ote telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-24 09:02:58'),
(1194, 'Barang diubah', 'Barang dengan nama Better telah diubah', 'admin', 111, 'edit', '2024-10-24 09:19:25'),
(1195, 'Barang diubah', 'Barang dengan nama Better telah diubah', 'admin', 111, 'edit', '2024-10-24 09:26:54'),
(1196, 'Barang Konsinyasi diubah', 'Barang Konsinyasi dengan nama Ote Ote telah diubah', 'admin', 111, 'edit', '2024-10-24 09:34:44'),
(1197, 'Barang Konsinyasi diubah', 'Barang Konsinyasi dengan nama Ote Ote telah diubah', 'admin', 111, 'edit', '2024-10-24 09:38:25'),
(1198, 'Barang Konsinyasi diubah', 'Barang Konsinyasi dengan nama Ote Ote telah diubah', 'admin', 111, 'edit', '2024-10-24 09:38:36'),
(1199, 'Barang Konsinyasi diubah', 'Barang Konsinyasi dengan nama Ote Otee telah diubah', 'admin', 111, 'edit', '2024-10-24 09:43:08'),
(1200, 'Barang Konsinyasi diubah', 'Barang Konsinyasi dengan nama Ote Oteee telah diubah', 'admin', 111, 'edit', '2024-10-24 09:43:16'),
(1201, 'Barang Konsinyasi diubah', 'Barang Konsinyasi dengan nama Ote Ote telah diubah', 'admin', 111, 'edit', '2024-10-24 09:43:25'),
(1202, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama uuuuuu telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-24 09:43:55'),
(1203, 'Barang baru ditambahkan', 'Barang dengan nama Kopi telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-24 10:58:16'),
(1204, 'Kategori ditambahkan', 'Kategori dengan nama yjgh telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-24 14:46:59'),
(1205, 'Kategori dihapus', 'Kategori dengan nama yjgh telah dihapus', 'admin', 111, 'delete', '2024-10-24 14:47:02'),
(1206, 'Satuan ditambahkan', 'Satuan dengan nama 7777 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-24 14:47:10'),
(1207, 'Satuan dihapus', 'Satuan dengan nama 7777 telah dihapus', 'admin', 111, 'delete', '2024-10-24 14:47:12'),
(1208, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama 547547547 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-24 14:47:29'),
(1209, 'Barang dihapus', 'Barang dengan nama Kopi telah dihapus', 'admin', 111, 'delete', '2024-10-24 14:52:43'),
(1210, 'Barang baru ditambahkan', 'Barang dengan nama 6676 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-24 14:52:51'),
(1211, 'Barang dihapus', 'Barang dengan nama 6676 telah dihapus', 'admin', 111, 'delete', '2024-10-24 14:52:55'),
(1212, 'Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh zulki dengan total Rp 3.001', 'admin', 111, 'add_circle_outline', '2024-10-24 15:01:36'),
(1213, 'Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh abd.hakim dengan total Rp 3.001', 'admin', 111, 'add_circle_outline', '2024-10-25 08:29:11'),
(1214, 'Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh abdussalam dengan total Rp 1.501', 'admin', 111, 'add_circle_outline', '2024-10-25 08:29:21'),
(1215, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 5.676 telah diajukan dengan nama abdussalam', 'admin', 111, 'add_circle_outline', '2024-10-25 08:40:33'),
(1216, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 7.586.657 telah diajukan dengan nama agusta', 'admin', 111, 'add_circle_outline', '2024-10-25 08:40:43'),
(1217, 'Pinjaman dibatalkan', 'Pinjaman dengan nama agusta telah dibatalkan oleh Admin', 'admin', 111, 'cancel', '2024-10-25 08:40:45'),
(1218, 'Pinjaman disetujui', 'Pinjaman dengan nama abdussalam telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-10-25 08:40:46'),
(1219, 'Pinjaman disetujui', 'Pinjaman dengan nama agusta telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-10-25 08:43:52'),
(1220, 'Pinjaman dibatalkan', 'Pinjaman dengan nama agusta telah dibatalkan oleh Admin', 'admin', 111, 'cancel', '2024-10-25 08:43:53'),
(1221, 'Pinjaman dibatalkan', 'Pinjaman dengan nama abdussalam telah dibatalkan oleh Admin', 'admin', 111, 'cancel', '2024-10-25 08:43:56'),
(1222, 'Pinjaman disetujui', 'Pinjaman dengan nama abdussalam telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-10-25 08:43:57'),
(1223, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 757 telah diajukan dengan nama zulki', 'user', 110, 'add_circle_outline', '2024-10-25 08:46:08'),
(1224, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 68.688 telah diajukan dengan nama zulki', 'user', 110, 'add_circle_outline', '2024-10-25 08:46:18'),
(1225, 'Limit diperbarui', 'Total limit untuk pengguna dengan nama wikan.nastiti telah berhasil diperbarui menjadi Rp 1.600.000', 'admin', 111, 'save', '2024-10-25 09:44:05'),
(1226, 'Limit diperbarui', 'Total limit untuk pengguna dengan nama zulki telah berhasil diperbarui menjadi Rp 1.500.000', 'admin', 111, 'save', '2024-10-25 09:46:13'),
(1227, 'Limit dibayar', 'Limit untuk pengguna dengan nama zulki telah dibayar sebesar Rp 1.000', 'admin', 111, 'payment', '2024-10-25 09:46:26'),
(1228, 'Limit dibayar', 'Limit untuk pengguna dengan nama zulki telah dibayar sebesar Rp 1', 'admin', 111, 'payment', '2024-10-25 09:46:40'),
(1229, 'Limit direset', 'Limit untuk pengguna dengan nama zulki telah direset', 'admin', 111, 'refresh', '2024-10-25 10:12:25'),
(1230, 'Barang baru ditambahkan', 'Barang dengan nama turrt telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-25 11:11:07'),
(1231, 'Barang baru ditambahkan', 'Barang dengan nama 5675 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-25 11:11:14'),
(1232, 'Barang baru ditambahkan', 'Barang dengan nama 56547657 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-25 11:11:25'),
(1233, 'Barang baru ditambahkan', 'Barang dengan nama 65654 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-25 11:11:34'),
(1234, 'Barang baru ditambahkan', 'Barang dengan nama 3545 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-25 11:11:41'),
(1235, 'Barang baru ditambahkan', 'Barang dengan nama 463436 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-25 11:11:51'),
(1236, 'Barang baru ditambahkan', 'Barang dengan nama 46436 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-25 11:12:00'),
(1237, 'Barang baru ditambahkan', 'Barang dengan nama 5475 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-25 11:12:15'),
(1238, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama gcfh telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-25 15:34:56'),
(1239, 'Pinjaman disetujui', 'Pinjaman dengan nama zulki telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-10-25 15:52:35'),
(1240, 'Pinjaman disetujui', 'Pinjaman dengan nama agusta telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-10-25 15:53:01'),
(1241, 'Pinjaman dibatalkan', 'Pinjaman dengan nama agusta telah dibatalkan oleh Admin', 'admin', 111, 'cancel', '2024-10-25 15:53:07'),
(1242, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama kghk telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-30 09:01:22'),
(1243, 'Kategori ditambahkan', 'Kategori dengan nama e telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-30 09:16:33'),
(1244, 'Kategori ditambahkan', 'Kategori dengan nama treyry telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-30 09:16:42'),
(1245, 'Kategori ditambahkan', 'Kategori dengan nama yreyreyer telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-30 09:16:46'),
(1246, 'Kategori ditambahkan', 'Kategori dengan nama ertgert telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-30 09:16:49'),
(1247, 'Kategori ditambahkan', 'Kategori dengan nama eter telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-30 09:16:52'),
(1248, 'Kategori ditambahkan', 'Kategori dengan nama hthd telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-30 09:16:55'),
(1249, 'Kategori ditambahkan', 'Kategori dengan nama etert telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-30 09:17:01'),
(1250, 'Kategori dihapus', 'Kategori dengan nama etert telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:21:29'),
(1251, 'Kategori dihapus', 'Kategori dengan nama hthd telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:21:30'),
(1252, 'Kategori dihapus', 'Kategori dengan nama eter telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:21:31'),
(1253, 'Kategori dihapus', 'Kategori dengan nama ertgert telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:21:32'),
(1254, 'Kategori dihapus', 'Kategori dengan nama yreyreyer telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:21:33'),
(1255, 'Kategori dihapus', 'Kategori dengan nama treyry telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:21:35'),
(1256, 'Kategori dihapus', 'Kategori dengan nama e telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:21:36'),
(1257, 'Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh abd.hakim dengan total Rp 3.000', 'admin', 111, 'add_circle_outline', '2024-10-30 09:27:14'),
(1258, 'Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh ayis dengan total Rp 2.000', 'admin', 111, 'add_circle_outline', '2024-10-30 09:27:22'),
(1259, 'Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh abd.hakim dengan total Rp 1.500', 'admin', 111, 'add_circle_outline', '2024-10-30 09:27:33'),
(1260, 'Transaksi ditambahkan', 'Transaksi baru telah berhasil ditambahkan yang dibeli oleh gustiard dengan total Rp 1.500', 'admin', 111, 'add_circle_outline', '2024-10-30 09:27:46'),
(1261, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 757 telah diajukan dengan nama abdussalam', 'admin', 111, 'add_circle_outline', '2024-10-30 09:32:15'),
(1262, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 757 telah diajukan dengan nama adelia.alifiany', 'admin', 111, 'add_circle_outline', '2024-10-30 09:32:21'),
(1263, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 57 telah diajukan dengan nama achmad.effendy', 'admin', 111, 'add_circle_outline', '2024-10-30 09:32:29'),
(1264, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 77 telah diajukan dengan nama adelia.alifiany', 'admin', 111, 'add_circle_outline', '2024-10-30 09:32:36'),
(1265, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 5.676 telah diajukan dengan nama ahcmad.sodik', 'admin', 111, 'add_circle_outline', '2024-10-30 09:32:44'),
(1266, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 57 telah diajukan dengan nama adelia.alifiany', 'admin', 111, 'add_circle_outline', '2024-10-30 09:32:53'),
(1267, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama uihui telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-30 09:50:52'),
(1268, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama gfddf telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-30 09:51:03'),
(1269, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama 65756 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-30 09:51:09'),
(1270, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama 675 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-30 09:51:19'),
(1271, 'Barang Konsinyasi dihapus', 'Barang Konsinyasi dengan nama 675 telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:52:45'),
(1272, 'Barang Konsinyasi dihapus', 'Barang Konsinyasi dengan nama 65756 telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:52:47'),
(1273, 'Barang Konsinyasi dihapus', 'Barang Konsinyasi dengan nama gfddf telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:52:50'),
(1274, 'Barang Konsinyasi dihapus', 'Barang Konsinyasi dengan nama gcfh telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:52:58'),
(1275, 'Barang Konsinyasi dihapus', 'Barang Konsinyasi dengan nama 547547547 telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:53:00'),
(1276, 'Barang Konsinyasi dihapus', 'Barang Konsinyasi dengan nama uihui telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:53:04'),
(1277, 'Barang Konsinyasi dihapus', 'Barang Konsinyasi dengan nama kghk telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:53:06'),
(1278, 'Barang Konsinyasi dihapus', 'Barang Konsinyasi dengan nama uuuuuu telah dihapus', 'admin', 111, 'delete', '2024-10-30 09:53:09'),
(1279, 'Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'admin', 111, 'update', '2024-10-30 09:57:47'),
(1280, 'Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'admin', 111, 'update', '2024-10-30 09:57:49'),
(1281, 'Foto profil dihapus', 'Anda telah berhasil menghapus foto profil Anda.', 'admin', 111, 'delete', '2024-10-30 13:51:12'),
(1282, 'Foto profil diperbarui', 'Anda telah berhasil memperbarui foto profil Anda.', 'admin', 111, 'update', '2024-10-30 13:51:24'),
(1283, 'Transaksi diubah', 'Transaksi telah berhasil diubah yang dibeli oleh abd.hakim dengan total Rp 1.500', 'admin', 111, 'edit', '2024-10-31 09:09:00'),
(1284, 'Limit diperbarui', 'Total limit untuk pengguna dengan nama zulki telah berhasil diperbarui menjadi Rp 1.600.000', 'admin', 111, 'save', '2024-10-31 09:09:09'),
(1285, 'Kategori ditambahkan', 'Kategori dengan nama 856865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:29:04'),
(1286, 'Kategori dihapus', 'Kategori dengan nama 856865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:29:11'),
(1287, 'Kategori ditambahkan', 'Kategori dengan nama 76876 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:29:15'),
(1288, 'Kategori dihapus', 'Kategori dengan nama 76876 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:29:17'),
(1289, 'Kategori ditambahkan', 'Kategori dengan nama 6567865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:32:04'),
(1290, 'Kategori dihapus', 'Kategori dengan nama 6567865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:32:07'),
(1291, 'Kategori ditambahkan', 'Kategori dengan nama 5685685 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:32:53'),
(1292, 'Kategori dihapus', 'Kategori dengan nama 5685685 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:32:58'),
(1293, 'Kategori ditambahkan', 'Kategori dengan nama 577 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:33:12'),
(1294, 'Kategori dihapus', 'Kategori dengan nama 577 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:33:14'),
(1295, 'Kategori ditambahkan', 'Kategori dengan nama 4757 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:33:22'),
(1296, 'Kategori dihapus', 'Kategori dengan nama 4757 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:33:24'),
(1297, 'Kategori ditambahkan', 'Kategori dengan nama 5685685 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:33:39'),
(1298, 'Kategori dihapus', 'Kategori dengan nama 5685685 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:33:41'),
(1299, 'Kategori ditambahkan', 'Kategori dengan nama 568658 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:33:51'),
(1300, 'Kategori dihapus', 'Kategori dengan nama 568658 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:33:53'),
(1301, 'Kategori ditambahkan', 'Kategori dengan nama 56865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:34:05'),
(1302, 'Kategori dihapus', 'Kategori dengan nama 56865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:34:07'),
(1303, 'Kategori ditambahkan', 'Kategori dengan nama 5685656 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:34:19'),
(1304, 'Kategori dihapus', 'Kategori dengan nama 5685656 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:34:21'),
(1305, 'Kategori ditambahkan', 'Kategori dengan nama 5785656 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:34:31'),
(1306, 'Kategori dihapus', 'Kategori dengan nama 5785656 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:34:33'),
(1307, 'Kategori ditambahkan', 'Kategori dengan nama 6776 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:34:43'),
(1308, 'Kategori dihapus', 'Kategori dengan nama 6776 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:34:45'),
(1309, 'Kategori ditambahkan', 'Kategori dengan nama 568568 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:35:02'),
(1310, 'Kategori dihapus', 'Kategori dengan nama 568568 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:35:04'),
(1311, 'Kategori ditambahkan', 'Kategori dengan nama 65856865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:35:17'),
(1312, 'Kategori dihapus', 'Kategori dengan nama 65856865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:35:19'),
(1313, 'Kategori ditambahkan', 'Kategori dengan nama 65856 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:35:35'),
(1314, 'Kategori ditambahkan', 'Kategori dengan nama 6556 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:38:12'),
(1315, 'Kategori ditambahkan', 'Kategori dengan nama 6856 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:38:14'),
(1316, 'Kategori ditambahkan', 'Kategori dengan nama 65865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:38:17'),
(1317, 'Kategori ditambahkan', 'Kategori dengan nama 6565865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:38:22'),
(1318, 'Kategori ditambahkan', 'Kategori dengan nama 56856 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:38:27'),
(1319, 'Kategori dihapus', 'Kategori dengan nama 56856 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:38:34'),
(1320, 'Kategori dihapus', 'Kategori dengan nama 6565865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:38:35'),
(1321, 'Kategori dihapus', 'Kategori dengan nama 65865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:38:36'),
(1322, 'Kategori dihapus', 'Kategori dengan nama 6856 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:38:38'),
(1323, 'Kategori dihapus', 'Kategori dengan nama 6556 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:38:39'),
(1324, 'Kategori dihapus', 'Kategori dengan nama 65856 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:38:40'),
(1325, 'Satuan ditambahkan', 'Satuan dengan nama 56865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:39:10'),
(1326, 'Satuan dihapus', 'Satuan dengan nama 56865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:39:15'),
(1327, 'Barang Konsinyasi telah diretur', 'Barang konsinyasi dengan nama Better telah diretur dengan jumlah 340', 'admin', 111, 'remove_circle_outline', '2024-10-31 09:40:45'),
(1328, 'Kategori ditambahkan', 'Kategori dengan nama fdgfddf telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 09:44:17'),
(1329, 'Kategori dihapus', 'Kategori dengan nama fdgfddf telah dihapus', 'admin', 111, 'delete', '2024-10-31 09:44:32'),
(1330, 'Kategori ditambahkan', 'Kategori dengan nama 56765 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 10:34:40'),
(1331, 'Kategori dihapus', 'Kategori dengan nama 56765 telah dihapus', 'admin', 111, 'delete', '2024-10-31 10:34:43'),
(1332, 'Kategori ditambahkan', 'Kategori dengan nama 5656 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 10:35:37'),
(1333, 'Kategori dihapus', 'Kategori dengan nama 5656 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:37:34'),
(1334, 'Kategori ditambahkan', 'Kategori dengan nama 57547 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:38:35'),
(1335, 'Kategori dihapus', 'Kategori dengan nama 57547 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:40:33'),
(1336, 'Kategori ditambahkan', 'Kategori dengan nama 76556 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:42:13'),
(1337, 'Kategori dihapus', 'Kategori dengan nama 76556 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:43:13'),
(1338, 'Kategori ditambahkan', 'Kategori dengan nama ryreer telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:43:23'),
(1339, 'Kategori dihapus', 'Kategori dengan nama ryreer telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:45:02'),
(1340, 'Kategori ditambahkan', 'Kategori dengan nama 457547 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:45:08'),
(1341, 'Kategori dihapus', 'Kategori dengan nama 457547 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:46:12'),
(1342, 'Kategori ditambahkan', 'Kategori dengan nama 75547 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:46:20'),
(1343, 'Kategori dihapus', 'Kategori dengan nama 75547 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:46:24'),
(1344, 'Kategori ditambahkan', 'Kategori dengan nama 56856 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:47:38'),
(1345, 'Kategori dihapus', 'Kategori dengan nama 56856 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:47:44'),
(1346, 'Kategori ditambahkan', 'Kategori dengan nama 45754 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:48:10'),
(1347, 'Kategori dihapus', 'Kategori dengan nama 45754 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:48:15'),
(1348, 'Kategori ditambahkan', 'Kategori dengan nama 5665 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:48:34'),
(1349, 'Kategori dihapus', 'Kategori dengan nama 5665 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:49:51'),
(1350, 'Kategori ditambahkan', 'Kategori dengan nama 54754 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:49:58'),
(1351, 'Kategori dihapus', 'Kategori dengan nama 54754 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:50:16'),
(1352, 'Kategori ditambahkan', 'Kategori dengan nama 56865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:50:28'),
(1353, 'Kategori dihapus', 'Kategori dengan nama 56865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:50:34'),
(1354, 'Kategori ditambahkan', 'Kategori dengan nama 56865865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:50:44'),
(1355, 'Kategori dihapus', 'Kategori dengan nama 56865865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:52:43'),
(1356, 'Kategori ditambahkan', 'Kategori dengan nama 6556 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:52:51'),
(1357, 'Kategori ditambahkan', 'Kategori dengan nama 54756 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:52:56'),
(1358, 'Kategori dihapus', 'Kategori dengan nama 54756 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:53:58'),
(1359, 'Kategori dihapus', 'Kategori dengan nama 6556 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:54:10'),
(1360, 'Kategori ditambahkan', 'Kategori dengan nama 65865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:56:11'),
(1361, 'Kategori dihapus', 'Kategori dengan nama 65865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:56:28'),
(1362, 'Kategori ditambahkan', 'Kategori dengan nama 5665 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:56:43'),
(1363, 'Kategori dihapus', 'Kategori dengan nama 5665 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:57:49'),
(1364, 'Kategori ditambahkan', 'Kategori dengan nama 575 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 13:59:14'),
(1365, 'Kategori dihapus', 'Kategori dengan nama 575 telah dihapus', 'admin', 111, 'delete', '2024-10-31 13:59:25'),
(1366, 'Kategori ditambahkan', 'Kategori dengan nama 56865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:00:31'),
(1367, 'Kategori dihapus', 'Kategori dengan nama 56865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:01:15'),
(1368, 'Kategori ditambahkan', 'Kategori dengan nama 56865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:01:36'),
(1369, 'Kategori dihapus', 'Kategori dengan nama 56865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:02:17'),
(1370, 'Kategori ditambahkan', 'Kategori dengan nama 6586 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:02:28'),
(1371, 'Kategori dihapus', 'Kategori dengan nama 6586 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:03:03'),
(1372, 'Kategori ditambahkan', 'Kategori dengan nama 54754 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:03:19'),
(1373, 'Kategori dihapus', 'Kategori dengan nama 54754 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:03:49'),
(1374, 'Kategori ditambahkan', 'Kategori dengan nama 45754 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:04:12'),
(1375, 'Kategori dihapus', 'Kategori dengan nama 45754 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:04:29'),
(1376, 'Kategori ditambahkan', 'Kategori dengan nama 67867 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:07:32'),
(1377, 'Kategori dihapus', 'Kategori dengan nama 67867 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:07:53'),
(1378, 'Kategori ditambahkan', 'Kategori dengan nama 4575 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:08:06'),
(1379, 'Kategori ditambahkan', 'Kategori dengan nama 7657 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:08:09'),
(1380, 'Kategori dihapus', 'Kategori dengan nama 7657 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:14:58'),
(1381, 'Kategori dihapus', 'Kategori dengan nama 4575 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:15:07'),
(1382, 'Kategori ditambahkan', 'Kategori dengan nama 57457 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:16:23'),
(1383, 'Kategori dihapus', 'Kategori dengan nama 57457 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:16:43'),
(1384, 'Kategori ditambahkan', 'Kategori dengan nama 65568 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:18:14'),
(1385, 'Kategori dihapus', 'Kategori dengan nama 65568 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:19:24'),
(1386, 'Kategori ditambahkan', 'Kategori dengan nama 56865 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:22:02'),
(1387, 'Kategori dihapus', 'Kategori dengan nama 56865 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:22:17'),
(1388, 'Satuan ditambahkan', 'Satuan dengan nama 75547 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:22:53'),
(1389, 'Satuan dihapus', 'Satuan dengan nama 75547 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:22:56'),
(1390, 'Satuan ditambahkan', 'Satuan dengan nama 756756 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:24:27'),
(1391, 'Satuan dihapus', 'Satuan dengan nama 756756 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:24:33'),
(1392, 'Kategori ditambahkan', 'Kategori dengan nama 4754 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:25:55'),
(1393, 'Kategori dihapus', 'Kategori dengan nama 4754 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:26:28'),
(1394, 'Kategori ditambahkan', 'Kategori dengan nama 54756 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:27:24'),
(1395, 'Kategori dihapus', 'Kategori dengan nama 54756 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:27:42'),
(1396, 'Kategori ditambahkan', 'Kategori dengan nama 6586565 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:27:52'),
(1397, 'Kategori dihapus', 'Kategori dengan nama 6586565 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:28:03'),
(1398, 'Kategori ditambahkan', 'Kategori dengan nama 575 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:35:41'),
(1399, 'Kategori dihapus', 'Kategori dengan nama 575 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:36:59'),
(1400, 'Kategori ditambahkan', 'Kategori dengan nama 755474 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:37:06'),
(1401, 'Kategori ditambahkan', 'Kategori dengan nama 575475 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:37:16'),
(1402, 'Kategori dihapus', 'Kategori dengan nama 575475 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:37:25'),
(1403, 'Kategori dihapus', 'Kategori dengan nama 755474 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:37:28'),
(1404, 'Barang Konsinyasi diubah', 'Barang Konsinyasi dengan nama Ote Ote telah diubah', 'admin', 111, 'edit', '2024-10-31 14:39:21'),
(1405, 'Kategori ditambahkan', 'Kategori dengan nama 5754 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:41:54'),
(1406, 'Kategori dihapus', 'Kategori dengan nama 5754 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:42:01'),
(1407, 'Kategori ditambahkan', 'Kategori dengan nama 5765 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:42:05'),
(1408, 'Kategori dihapus', 'Kategori dengan nama 5765 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:42:07'),
(1409, 'Kategori ditambahkan', 'Kategori dengan nama 7547 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:51:43'),
(1410, 'Kategori dihapus', 'Kategori dengan nama 7547 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:52:04'),
(1411, 'Kategori ditambahkan', 'Kategori dengan nama 45754 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:52:07'),
(1412, 'Kategori ditambahkan', 'Kategori dengan nama 74547 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:52:32'),
(1413, 'Kategori ditambahkan', 'Kategori dengan nama 58656 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:53:56'),
(1414, 'Kategori dihapus', 'Kategori dengan nama 58656 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:54:21'),
(1415, 'Kategori ditambahkan', 'Kategori dengan nama 755475 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:54:24'),
(1416, 'Kategori dihapus', 'Kategori dengan nama 755475 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:54:37'),
(1417, 'Kategori dihapus', 'Kategori dengan nama 74547 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:54:38'),
(1418, 'Kategori dihapus', 'Kategori dengan nama 45754 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:54:40'),
(1419, 'Kategori ditambahkan', 'Kategori dengan nama 475 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:54:43'),
(1420, 'Kategori ditambahkan', 'Kategori dengan nama 568655 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:55:00'),
(1421, 'Kategori ditambahkan', 'Kategori dengan nama 7556 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:55:14'),
(1422, 'Kategori dihapus', 'Kategori dengan nama 7556 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:57:48'),
(1423, 'Kategori ditambahkan', 'Kategori dengan nama 56765 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 14:57:51'),
(1424, 'Kategori dihapus', 'Kategori dengan nama 56765 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:57:57'),
(1425, 'Kategori dihapus', 'Kategori dengan nama 568655 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:58:00'),
(1426, 'Kategori dihapus', 'Kategori dengan nama 475 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:58:02'),
(1427, 'Barang dihapus', 'Barang dengan nama 5475 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:59:05'),
(1428, 'Barang dihapus', 'Barang dengan nama 46436 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:59:06'),
(1429, 'Barang dihapus', 'Barang dengan nama 463436 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:59:07'),
(1430, 'Barang dihapus', 'Barang dengan nama 3545 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:59:08'),
(1431, 'Barang dihapus', 'Barang dengan nama 65654 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:59:09'),
(1432, 'Barang dihapus', 'Barang dengan nama 56547657 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:59:14'),
(1433, 'Barang dihapus', 'Barang dengan nama 5675 telah dihapus', 'admin', 111, 'delete', '2024-10-31 14:59:15'),
(1434, 'Barang diubah', 'Barang dengan nama turrt telah diubah', 'admin', 111, 'edit', '2024-10-31 14:59:27'),
(1435, 'Barang diubah', 'Barang dengan nama turrt telah diubah', 'admin', 111, 'edit', '2024-10-31 14:59:38'),
(1436, 'Kategori diubah', 'Kategori dengan nama atk telah diubah', 'admin', 111, 'edit', '2024-10-31 15:10:26'),
(1437, 'Kategori diubah', 'Kategori dengan nama ATK telah diubah', 'admin', 111, 'edit', '2024-10-31 15:10:33'),
(1438, 'Kategori ditambahkan', 'Kategori dengan nama 75575 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 15:12:52'),
(1439, 'Kategori dihapus', 'Kategori dengan nama 75575 telah dihapus', 'admin', 111, 'delete', '2024-10-31 15:13:02'),
(1440, 'Satuan ditambahkan', 'Satuan dengan nama 87676 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 15:16:37'),
(1441, 'Satuan dihapus', 'Satuan dengan nama 87676 telah dihapus', 'admin', 111, 'delete', '2024-10-31 15:16:48'),
(1442, 'Barang dihapus', 'Barang dengan nama turrt telah dihapus', 'admin', 111, 'delete', '2024-10-31 15:19:16'),
(1443, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama 6868 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 15:22:19'),
(1444, 'Barang Konsinyasi diubah', 'Barang Konsinyasi dengan nama 6868 telah diubah', 'admin', 111, 'edit', '2024-10-31 15:22:39'),
(1445, 'Barang Konsinyasi telah diretur', 'Barang konsinyasi dengan nama 6868 telah diretur dengan jumlah 6583', 'admin', 111, 'remove_circle_outline', '2024-10-31 15:25:48'),
(1446, 'Barang Konsinyasi diubah', 'Barang Konsinyasi dengan nama 6868 telah diubah', 'admin', 111, 'edit', '2024-10-31 15:26:20'),
(1447, 'Barang Konsinyasi telah diretur', 'Barang konsinyasi dengan nama 6868 telah diretur dengan jumlah 9000', 'admin', 111, 'remove_circle_outline', '2024-10-31 15:26:23'),
(1448, 'Barang Konsinyasi dihapus', 'Barang Konsinyasi dengan nama 6868 telah dihapus', 'admin', 111, 'delete', '2024-10-31 15:28:32'),
(1449, 'Pengguna diubah', 'Pengguna dengan nama oooooooooooo telah diubah', 'admin', 111, 'edit', '2024-10-31 15:40:52'),
(1450, 'Pengguna diubah', 'Pengguna dengan nama o telah diubah', 'admin', 111, 'edit', '2024-10-31 15:41:00'),
(1451, 'Pengguna diubah', 'Pengguna dengan nama o7 telah diubah', 'admin', 111, 'edit', '2024-10-31 15:41:43'),
(1452, 'Pengguna diubah', 'Pengguna dengan nama o telah diubah', 'admin', 111, 'edit', '2024-10-31 15:41:50'),
(1453, 'Pengguna ditambahkan', 'Pengguna dengan nama 55 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 15:43:18'),
(1454, 'Pengguna dihapus', 'Pengguna dengan nama 55 telah dihapus', 'admin', 111, 'delete', '2024-10-31 15:43:43'),
(1455, 'Limit diperbarui', 'Total limit untuk pengguna dengan nama zulki telah berhasil diperbarui menjadi Rp 1.500.000', 'admin', 111, 'save', '2024-10-31 15:45:08'),
(1456, 'Limit diperbarui', 'Total limit untuk pengguna dengan nama zulki telah berhasil diperbarui menjadi Rp 1.500.000', 'admin', 111, 'save', '2024-10-31 15:51:21'),
(1457, 'Limit diperbarui', 'Total limit untuk pengguna dengan nama zulki telah berhasil diperbarui menjadi Rp 1.500.000', 'admin', 111, 'save', '2024-10-31 15:51:23'),
(1458, 'Limit direset', 'Limit untuk pengguna dengan nama zulki telah direset', 'admin', 111, 'refresh', '2024-10-31 15:51:27'),
(1459, 'Kategori ditambahkan', 'Kategori dengan nama 554 telah ditambahkan', 'admin', 111, 'add_circle_outline', '2024-10-31 15:55:12'),
(1460, 'Kategori dihapus', 'Kategori dengan nama 554 telah dihapus', 'admin', 111, 'delete', '2024-10-31 15:55:14'),
(1461, 'Pinjaman dibatalkan', 'Pinjaman dengan nama zulki telah dibatalkan oleh Admin', 'admin', 111, 'cancel', '2024-11-01 09:43:32'),
(1462, 'Pinjaman disetujui', 'Pinjaman dengan nama agusta telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-11-01 09:43:50'),
(1463, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 12.000 telah diajukan dengan nama achmad.effendy', 'admin', 111, 'add_circle_outline', '2024-11-01 09:44:04'),
(1464, 'Barang Konsinyasi telah diretur', 'Barang konsinyasi dengan nama Better telah diretur dengan jumlah 2', 'admin', 111, 'remove_circle_outline', '2024-11-01 10:33:28'),
(1465, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 66.577 telah diajukan dengan nama achmad.effendy', 'admin', 111, 'add_circle_outline', '2024-11-04 13:48:27'),
(1466, 'Pinjaman disetujui', 'Pinjaman dengan nama zulki telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-11-04 13:59:57'),
(1467, 'Pinjaman dibatalkan', 'Pinjaman dengan nama zulki telah dibatalkan oleh Admin', 'admin', 111, 'cancel', '2024-11-04 14:00:05'),
(1468, 'Pinjaman disetujui', 'Pinjaman dengan nama abdussalam telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-11-04 14:00:16'),
(1469, 'Pinjaman disetujui', 'Pinjaman dengan nama zulki telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-11-04 14:00:26'),
(1470, 'Pinjaman dibatalkan', 'Pinjaman dengan nama abdussalam telah dibatalkan oleh Admin', 'admin', 111, 'cancel', '2024-11-04 14:00:28'),
(1471, 'Pinjaman dibatalkan', 'Pinjaman dengan nama zulki telah dibatalkan oleh Admin', 'admin', 111, 'cancel', '2024-11-04 14:00:29'),
(1472, 'Pinjaman dibatalkan', 'Pinjaman dengan nama zulki telah dibatalkan oleh Admin', 'admin', 111, 'cancel', '2024-11-04 14:00:31'),
(1473, 'Pinjaman disetujui', 'Pinjaman dengan nama zulki telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-11-04 14:00:34'),
(1474, 'Pinjaman disetujui', 'Pinjaman dengan nama abdussalam telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-11-04 14:00:35'),
(1475, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 54 telah diajukan dengan nama abdussalam', 'admin', 111, 'add_circle_outline', '2024-11-04 14:00:50'),
(1476, 'Pinjaman dibatalkan', 'Pinjaman dengan nama zulki telah dibatalkan oleh Admin', 'admin', 111, 'cancel', '2024-11-04 14:07:40'),
(1477, 'Pinjaman disetujui', 'Pinjaman dengan nama zulki telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-11-04 14:07:43'),
(1478, 'Pinjaman dibatalkan', 'Pinjaman dengan nama abdussalam telah dibatalkan oleh Admin', 'admin', 111, 'cancel', '2024-11-04 14:07:45'),
(1479, 'Pinjaman disetujui', 'Pinjaman dengan nama abdussalam telah disetujui oleh Admin', 'admin', 111, 'check_circle', '2024-11-04 14:07:49'),
(1480, 'Pinjaman dibatalkan', 'Pinjaman dengan nama zulki telah dibatalkan oleh Admin', 'admin', 111, 'cancel', '2024-11-04 14:07:50'),
(1481, 'Pengajuan pinjaman', 'Pinjaman sebesar Rp 7.567 telah diajukan dengan nama adenan', 'admin', 111, 'add_circle_outline', '2024-11-04 14:08:15'),
(1482, 'Foto profil dihapus', 'Anda telah berhasil menghapus foto profil Anda.', 'admin', 111, 'delete', '2024-11-04 14:17:45'),
(1483, 'Foto profil diperbarui', 'Anda telah berhasil memperbarui foto profil Anda.', 'admin', 111, 'update', '2024-11-04 14:17:55'),
(1484, 'Foto profil dihapus', 'Anda telah berhasil menghapus foto profil Anda.', 'admin', 111, 'delete', '2024-11-04 14:19:07'),
(1485, 'Foto profil diperbarui', 'Anda telah berhasil memperbarui foto profil Anda.', 'admin', 111, 'update', '2024-11-04 14:19:13'),
(1486, 'Foto profil diperbarui', 'Anda telah berhasil memperbarui foto profil Anda.', 'admin', 111, 'update', '2024-11-04 14:20:25'),
(1487, 'Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'admin', 111, 'update', '2024-11-04 14:24:40'),
(1488, 'Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'admin', 111, 'update', '2024-11-04 14:24:45'),
(1489, 'Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'admin', 111, 'update', '2024-11-04 14:24:49'),
(1490, 'Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'admin', 111, 'update', '2024-11-04 14:24:56'),
(1491, 'Foto profil diperbarui', 'Anda telah berhasil memperbarui foto profil Anda.', 'admin', 111, 'update', '2024-11-04 14:25:04'),
(1492, 'Foto profil dihapus', 'Anda telah berhasil menghapus foto profil Anda.', 'admin', 111, 'delete', '2024-11-04 14:25:45'),
(1493, 'Foto profil diperbarui', 'Anda telah berhasil memperbarui foto profil Anda.', 'admin', 111, 'update', '2024-11-04 14:25:59'),
(1494, 'Foto profil diperbarui', 'Anda telah berhasil memperbarui foto profil Anda.', 'admin', 111, 'update', '2024-11-04 14:26:29'),
(1495, 'Foto profil dihapus', 'Anda telah berhasil menghapus foto profil Anda.', 'admin', 111, 'delete', '2024-11-04 14:26:39'),
(1496, 'Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'operator', 112, 'update', '2024-11-04 14:35:48'),
(1497, 'Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'operator', 112, 'update', '2024-11-04 14:35:51'),
(1498, 'Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'operator', 112, 'update', '2024-11-04 14:35:57'),
(1499, 'Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'operator', 112, 'update', '2024-11-04 14:36:01'),
(1500, 'Foto profil diperbarui', 'Anda telah berhasil memperbarui foto profil Anda.', 'operator', 112, 'update', '2024-11-04 14:36:12'),
(1501, 'Foto profil dihapus', 'Anda telah berhasil menghapus foto profil Anda.', 'operator', 112, 'delete', '2024-11-04 14:36:16'),
(1502, 'Limit diperbarui', 'Total limit untuk pengguna dengan nama zulki telah berhasil diperbarui menjadi Rp 1.550.000', 'operator', 112, 'save', '2024-11-04 14:37:47'),
(1503, 'Limit diperbarui', 'Total limit untuk pengguna dengan nama zulki telah berhasil diperbarui menjadi Rp 1.500.000', 'operator', 112, 'save', '2024-11-04 14:37:50'),
(1504, 'Pengguna diubah', 'Pengguna dengan nama zulki telah diubah', 'operator', 112, 'edit', '2024-11-04 14:37:59'),
(1505, 'Pengguna diubah', 'Pengguna dengan nama zulki telah diubah', 'operator', 112, 'edit', '2024-11-04 14:38:04'),
(1506, 'Barang Konsinyasi baru ditambahkan', 'Barang Konsinyasi dengan nama =0 telah ditambahkan', 'operator', 112, 'add_circle_outline', '2024-11-04 14:38:39'),
(1507, 'Barang Konsinyasi telah diretur', 'Barang konsinyasi dengan nama =0 telah diretur dengan jumlah 6886', 'operator', 112, 'remove_circle_outline', '2024-11-04 14:39:08'),
(1508, 'Foto profil diperbarui', 'Anda telah berhasil memperbarui foto profil Anda.', 'user', 110, 'update', '2024-11-04 14:51:48'),
(1509, 'Foto profil dihapus', 'Anda telah berhasil menghapus foto profil Anda.', 'user', 110, 'delete', '2024-11-04 14:51:53'),
(1510, 'Foto profil dihapus', 'Anda telah berhasil menghapus foto profil Anda.', 'user', 110, 'delete', '2024-11-04 14:51:57'),
(1511, 'Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'user', 110, 'update', '2024-11-04 14:52:03'),
(1512, 'Profil diperbarui', 'Anda telah berhasil memperbarui profil Anda.', 'user', 110, 'update', '2024-11-04 14:52:08');

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
(38, 'ATK', '2024-07-30 06:28:16', '2024-10-31 15:10:33'),
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
(79, 'Konsumtif', '2024-10-18', '12000', '4', 0, '2024-10-18 02:24:58', 'Menunggu Persetujuan', '2024-10-18 09:24:58', 1),
(80, 'Produktif', '2024-10-25', '5676', '3', 0, '2024-10-25 01:40:33', 'Telah Disetujui oleh Admin', '2024-10-25 08:40:33', 2),
(81, 'Konsumtif', '2024-10-25', '7586657', '6', 0, '2024-10-25 01:40:43', 'Telah Disetujui oleh Admin', '2024-10-25 08:40:43', 9),
(82, 'Konsumtif', '2024-10-25', '757', '12', 0, '2024-10-25 01:46:08', 'Dibatalkan oleh Admin', '2024-10-25 08:46:08', 110),
(83, 'Konsumtif', '2024-10-25', '68688', '6', 0, '2024-10-25 01:46:18', 'Dibatalkan oleh Admin', '2024-10-25 08:46:18', 110),
(84, 'Konsumtif', '2024-10-30', '757', '12', 0, '2024-10-30 02:32:15', 'Telah Disetujui oleh Admin', '2024-10-30 09:32:15', 2),
(85, 'Konsumtif', '2024-10-30', '757', '7', 0, '2024-10-30 02:32:21', 'Menunggu Persetujuan', '2024-10-30 09:32:21', 4),
(86, 'Konsumtif', '2024-10-30', '57', '12', 0, '2024-10-30 02:32:29', 'Menunggu Persetujuan', '2024-10-30 09:32:29', 3),
(87, 'Produktif', '2024-10-30', '77', '7', 0, '2024-10-30 02:32:36', 'Menunggu Persetujuan', '2024-10-30 09:32:36', 4),
(88, 'Produktif', '2024-10-30', '5676', '5', 0, '2024-10-30 02:32:44', 'Menunggu Persetujuan', '2024-10-30 09:32:44', 10),
(89, 'Produktif', '2024-10-30', '57', '7', 0, '2024-10-30 02:32:53', 'Menunggu Persetujuan', '2024-10-30 09:32:53', 4),
(90, 'Konsumtif', '2024-11-01', '12000', '2', 0, '2024-11-01 02:44:04', 'Menunggu Persetujuan', '2024-11-01 09:44:04', 3),
(91, 'Konsumtif', '2024-11-04', '66577', '9', 0, '2024-11-04 06:48:27', 'Menunggu Persetujuan', '2024-11-04 13:48:27', 3),
(92, 'Konsumtif', '2024-11-04', '54', '5', 0, '2024-11-04 07:00:50', 'Menunggu Persetujuan', '2024-11-04 14:00:50', 2),
(93, 'Konsumtif', '2024-11-04', '7567', '12', 0, '2024-11-04 07:08:15', 'Menunggu Persetujuan', '2024-11-04 14:08:15', 5);

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
(106, 'Wikan Nastiti', 'wikan.nastiti', 'wikan.nastiti@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1600000, 'default.png', '2024-10-25 09:44:05', '2024-10-02 07:41:09'),
(107, 'Yeni Rahmawati', 'yenirahma', 'yenirahma@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(108, 'Yogi Chandra Sasmita', 'yogi.chandra', 'yogi.chandra@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(109, 'Yulifah Suryana', 'yulifah', 'yulifah@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-10-02 08:10:24', '2024-10-02 07:41:09'),
(110, 'Zulkipli', 'zulki', 'zulki@bps.go.id', '3500', '25d55ad283aa400af464c76d713c07ad', 'user', 0, 1500000, 'default.png', '2024-11-04 14:52:08', '2024-10-02 07:41:09'),
(111, 'Admin User', 'a', 'admin.user@bps.go.id', '3500', '0cc175b9c0f1b6a831c399e269772661', 'admin', 0, 1500000, 'default.png', '2024-11-04 14:26:39', '2024-10-02 07:44:55'),
(112, 'Operator User', 'o', 'operator.user@bps.go.id', '3500', 'd95679752134a2d9eb61dbd7b91c4bcc', 'operator', 0, 1500000, 'default.png', '2024-11-04 14:36:16', '2024-10-02 07:44:55');

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
(302, 1, 'Cash', 2500, '', '2024-10-18 03:13:17', '2024-10-18 03:13:17'),
(303, 110, 'Kredit', 3001, '', '2024-10-24 08:01:36', '2024-10-24 08:01:36'),
(304, 1, 'Cash', 3001, '', '2024-10-25 01:29:10', '2024-10-25 01:29:10'),
(305, 2, 'Cash', 1501, '', '2024-10-25 01:29:21', '2024-10-25 01:29:21'),
(306, 1, 'Cash', 3000, '', '2024-10-30 02:27:14', '2024-10-30 02:27:14'),
(307, 11, 'Cash', 2000, '', '2024-10-30 02:27:21', '2024-10-30 02:27:21'),
(308, 1, 'Cash', 1500, '', '2024-10-30 02:27:33', '2024-10-30 02:27:33');

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
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT for table `tb_detransaksi`
--
ALTER TABLE `tb_detransaksi`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=810;

--
-- AUTO_INCREMENT for table `tb_histori`
--
ALTER TABLE `tb_histori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1513;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `pengguna_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `tb_riwayat_harga`
--
ALTER TABLE `tb_riwayat_harga`
  MODIFY `id_riwayat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

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
