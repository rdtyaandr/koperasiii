-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2024 at 08:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
-- Table structure for table `tb_angsuran`
--

CREATE TABLE `tb_angsuran` (
  `angsuran_id` int NOT NULL,
  `angsuran_pinjaman_id` int NOT NULL,
  `angsuran_jumlah` double NOT NULL,
  `angsuran_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int NOT NULL,
  `kode_barang` varchar(100) DEFAULT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `detail_barang` varchar(100) DEFAULT NULL,
  `id_satuan` int NOT NULL,
  `id_kategori` int NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `detail_barang`, `id_satuan`, `id_kategori`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(358, '-', 'Susu', '-', 12, 35, 3000, 5000, 9968, '2024-08-06 01:13:58', '2024-08-20 02:36:58'),
(359, '-', 'Gorengan', '-', 15, 36, 500, 2000, 99890, '2024-08-06 01:14:26', '2024-08-20 02:36:46'),
(363, '', 'pc', '', 5, 35, 68568, 658865, 9999, '2024-08-13 01:55:49', '2024-08-20 02:36:50'),
(364, '', '6565', '', 5, 39, 6765, 5000, 65326, '2024-08-13 08:48:04', '2024-08-13 08:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detransaksi`
--

CREATE TABLE `tb_detransaksi` (
  `id_detail` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_barang` int NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_detransaksi`
--

INSERT INTO `tb_detransaksi` (`id_detail`, `id_transaksi`, `id_barang`, `nama_barang`, `harga`, `jumlah`, `total`) VALUES
(274, 151, 358, 'Susu', 50000, 2, 100000),
(276, 152, 358, 'Susu', 50000, 1, 50000),
(277, 153, 359, 'Gorengan', 2000, 7, 14000),
(279, 154, 364, '6565', 6000, 1, 6000),
(281, 155, 364, '6565', 6000, 1, 6000),
(282, 156, 358, 'Susu', 5000, 1, 5000),
(283, 157, 358, 'Susu', 5000, 1, 5000),
(284, 158, 358, 'Susu', 6000, 2, 12000),
(285, 159, 359, 'Gorengan', 2000, 99, 198000),
(286, 160, 364, '6565', 5000, 2, 10000),
(287, 161, 358, 'Susu', 5000, 1, 5000),
(288, 162, 358, 'Susu', 5000, 2, 10000),
(289, 163, 359, 'Gorengan', 1000, 3, 3000),
(290, 164, 358, 'Susu', 5000, 21, 105000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_histori`
--

CREATE TABLE `tb_histori` (
  `id` int NOT NULL,
  `message_text` varchar(255) NOT NULL,
  `message_summary` varchar(255) NOT NULL,
  `role` enum('admin','operator','user') NOT NULL,
  `message_icon` varchar(50) NOT NULL,
  `message_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_histori`
--

INSERT INTO `tb_histori` (`id`, `message_text`, `message_summary`, `role`, `message_icon`, `message_date_time`) VALUES
(275, 'Barang dihapus', 'Barang  telah dihapus', 'admin', 'delete', '2024-08-20 07:05:04'),
(276, 'Transaksi ditambahkan', 'Transaksi baru telah ditambahkan dengan total 5.000 Rupiah', 'admin', 'add_circle_outline', '2024-08-20 07:07:34'),
(277, 'Transaksi ditambahkan', 'Transaksi baru telah ditambahkan dengan total 12.000 Rupiah', 'admin', 'add_circle_outline', '2024-08-20 07:09:46'),
(278, 'Limit untuk pengguna dengan ID 124 telah direset', 'Limit direset', 'admin', 'update', '2024-08-20 07:27:37'),
(279, 'Limit untuk pengguna dengan ID 124 telah direset', 'Limit direset', 'admin', 'update', '2024-08-20 07:27:41'),
(280, 'Total limit untuk pengguna dengan ID 132 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-20 08:10:15'),
(281, 'Total limit untuk pengguna dengan ID 132 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-20 08:10:16'),
(282, 'Total limit untuk pengguna dengan ID 132 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-20 08:10:16'),
(283, 'Total limit untuk pengguna dengan ID 132 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-20 08:10:17'),
(284, 'Total limit untuk pengguna dengan ID 132 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-20 08:10:17'),
(285, 'Total limit untuk pengguna dengan ID 132 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-20 08:10:17'),
(286, 'Total limit untuk pengguna dengan ID 132 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-20 08:10:42'),
(287, 'Limit untuk pengguna dengan ID 133 telah direset', 'Limit direset', 'admin', 'update', '2024-08-20 08:12:05'),
(288, 'Total limit untuk pengguna dengan ID 125 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-20 08:27:34'),
(289, 'Total limit untuk pengguna dengan ID 125 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-20 08:27:36'),
(290, 'Total limit untuk pengguna dengan ID 125 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-20 08:27:42'),
(291, 'Total limit untuk pengguna dengan ID 132 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-20 11:52:07'),
(292, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 08:19:23'),
(293, 'Transaksi ditambahkan', 'Transaksi baru telah ditambahkan dengan total 198.000 Rupiah', 'admin', 'add_circle_outline', '2024-08-21 08:19:38'),
(294, 'Limit untuk pengguna dengan ID 125 telah direset', 'Limit direset', 'admin', 'update', '2024-08-21 08:19:47'),
(295, 'Total limit untuk pengguna dengan ID 124 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:08:11'),
(296, 'Limit untuk pengguna dengan ID 124 telah direset', 'Limit direset', 'admin', 'update', '2024-08-21 09:08:14'),
(297, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:08:16'),
(298, 'Total limit untuk pengguna dengan ID 132 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:08:17'),
(299, 'Total limit untuk pengguna dengan ID 125 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:08:18'),
(300, 'Total limit untuk pengguna dengan ID 124 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:08:18'),
(301, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:45:07'),
(302, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:45:18'),
(303, 'Total limit untuk pengguna dengan ID 132 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:45:23'),
(304, 'Total limit untuk pengguna dengan ID 125 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:45:41'),
(305, 'Total limit untuk pengguna dengan ID 125 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:45:48'),
(306, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:46:43'),
(307, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:46:44'),
(308, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:46:45'),
(309, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:46:45'),
(310, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:46:45'),
(311, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:46:46'),
(312, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:46:46'),
(313, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 09:46:46'),
(314, 'Transaksi ditambahkan', 'Transaksi baru telah ditambahkan dengan total 10.000 Rupiah', 'admin', 'add_circle_outline', '2024-08-21 09:47:42'),
(315, 'Transaksi ditambahkan', 'Transaksi baru telah ditambahkan dengan total 5.000 Rupiah', 'admin', 'add_circle_outline', '2024-08-21 09:48:13'),
(316, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 08:38:57'),
(317, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 08:39:01'),
(318, 'Total limit untuk pengguna dengan ID 132 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 08:39:05'),
(319, 'Total limit untuk pengguna dengan ID 124 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-21 08:39:08'),
(320, 'Limit untuk pengguna dengan ID 125 telah direset', 'Limit direset', 'admin', 'update', '2024-08-21 08:39:12'),
(321, 'Limit untuk pengguna dengan ID 133 telah direset', 'Limit direset', 'admin', 'update', '2024-08-21 08:39:16'),
(322, 'Pinjaman dibatalkan', 'Pinjaman dengan ID 30 telah dibatalkan oleh Admin', 'admin', 'delete', '2024-08-21 08:39:36'),
(323, 'Pinjaman disetujui', 'Pinjaman dengan ID 30 telah disetujui oleh Admin', 'admin', 'update', '2024-08-21 08:39:38'),
(324, 'Pinjaman dibatalkan', 'Pinjaman dengan ID 30 telah dibatalkan oleh Admin', 'admin', 'delete', '2024-08-21 08:39:45'),
(325, 'Pinjaman disetujui', 'Pinjaman dengan ID 30 telah disetujui oleh Admin', 'admin', 'update', '2024-08-21 08:39:53'),
(326, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-26 01:04:46'),
(327, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-26 01:04:48'),
(328, 'Total limit untuk pengguna dengan ID 132 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-26 01:06:35'),
(329, 'Pinjaman dibatalkan', 'Pinjaman dengan ID 30 telah dibatalkan oleh Admin', 'admin', 'delete', '2024-08-26 05:43:55'),
(330, 'Pinjaman disetujui', 'Pinjaman dengan ID 30 telah disetujui oleh Admin', 'admin', 'update', '2024-08-26 05:44:08'),
(331, 'Pengajuan pinjaman', 'Pengguna dengan ID bagas telah mengajukan pinjaman sebesar 500.000', 'admin', 'add_circle_outline', '2024-08-26 05:44:57'),
(332, 'Pengajuan pinjaman', 'Pengguna dengan ID Yono telah mengajukan pinjaman sebesar 60.000', 'admin', 'add_circle_outline', '2024-08-26 05:45:27'),
(333, 'Kategori ditambahkan', 'Kategori 89098- telah ditambahkan', 'admin', 'add_circle_outline', '2024-08-26 06:02:52'),
(334, 'Kategori dihapus', 'Kategori  telah dihapus', 'admin', 'delete', '2024-08-26 06:02:59'),
(335, 'Satuan ditambahkan', 'Satuan 68686 telah ditambahkan', 'admin', 'add_circle_outline', '2024-08-26 06:03:05'),
(336, 'Satuan dihapus', 'Satuan  telah dihapus', 'admin', 'delete', '2024-08-26 06:03:11'),
(337, 'Pengguna dengan nama 8558 telah ditambahkan', 'Pengguna ditambahkan', 'admin', 'add_circle_outline', '2024-08-26 06:03:37'),
(338, 'Pengguna dengan nama  telah dihapus', 'Pengguna dihapus', 'admin', 'delete', '2024-08-26 06:03:44'),
(339, 'Pengajuan pinjaman', 'Pengguna dengan ID 124 telah mengajukan pinjaman sebesar 7.000', 'admin', 'add_circle_outline', '2024-08-26 07:12:06'),
(340, 'Pengajuan pinjaman', 'Pengguna dengan ID 124 telah mengajukan pinjaman sebesar 65.865.856.655.686.865.777.962.793.304.064', 'admin', 'add_circle_outline', '2024-08-26 07:23:39'),
(341, 'Pinjaman disetujui', 'Pinjaman dengan ID 34 telah disetujui oleh Admin', 'admin', 'update', '2024-08-26 07:24:05'),
(342, 'Pinjaman dibatalkan', 'Pinjaman dengan ID 34 telah dibatalkan oleh Admin', 'admin', 'delete', '2024-08-26 07:24:20'),
(343, 'Pengajuan pinjaman', 'Pengguna dengan ID Sunandi telah mengajukan pinjaman sebesar 0', 'admin', 'add_circle_outline', '2024-08-26 07:56:41'),
(344, 'Pengajuan pinjaman', 'Pengguna dengan ID 124 telah mengajukan pinjaman sebesar 6.745', 'admin', 'add_circle_outline', '2024-08-26 07:57:06'),
(345, 'Pengajuan pinjaman', 'Pengguna dengan ID 124 telah mengajukan pinjaman sebesar 0', 'admin', 'add_circle_outline', '2024-08-26 07:57:20'),
(346, 'Pinjaman disetujui', 'Pinjaman dengan ID 33 telah disetujui oleh Admin', 'admin', 'update', '2024-08-27 03:13:00'),
(347, 'Transaksi ditambahkan', 'Transaksi baru telah ditambahkan dengan total 10.000 Rupiah', 'admin', 'add_circle_outline', '2024-08-27 03:51:27'),
(348, 'Total limit untuk pengguna dengan ID 124 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 03:51:50'),
(349, 'Total limit untuk pengguna dengan ID 124 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 03:52:03'),
(350, 'Total limit untuk pengguna dengan ID 124 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 03:52:10'),
(351, 'Total limit untuk pengguna dengan ID 124 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 03:52:15'),
(352, 'Transaksi ditambahkan', 'Transaksi baru telah ditambahkan dengan total 3.000 Rupiah', 'admin', 'add_circle_outline', '2024-08-27 03:53:03'),
(353, 'Kategori diubah', 'Kategori rtre799 telah diubah', 'admin', 'update', '2024-08-27 04:03:55'),
(354, 'Kategori diubah', 'Kategori vcncghjfgu telah diubah', 'admin', 'update', '2024-08-27 04:04:04'),
(355, 'Kategori diubah', 'Kategori vcncghjfgu telah diubah', 'admin', 'update', '2024-08-27 04:30:45'),
(356, 'Kategori ditambahkan', 'Kategori jhkjghkg telah ditambahkan', 'admin', 'add_circle_outline', '2024-08-27 04:34:48'),
(357, 'Kategori dihapus', 'Kategori  telah dihapus', 'admin', 'delete', '2024-08-27 04:34:52'),
(358, 'Kategori dihapus', 'Kategori  telah dihapus', 'admin', 'delete', '2024-08-27 04:34:55'),
(359, 'Kategori ditambahkan', 'Kategori jhgkhhkkkkkkkkkkkkkkk telah ditambahkan', 'admin', 'add_circle_outline', '2024-08-27 04:35:01'),
(360, 'Kategori dihapus', 'Kategori  telah dihapus', 'admin', 'delete', '2024-08-27 04:35:11'),
(361, 'Kategori diubah', 'Kategori oiiiiiiiiiiiiiiiiiiiiiiiiiii telah diubah', 'admin', 'update', '2024-08-27 04:35:26'),
(362, 'Pengajuan pinjaman', 'Pengguna dengan ID 125 telah mengajukan pinjaman sebesar 656.666', 'admin', 'add_circle_outline', '2024-08-27 06:51:51'),
(363, 'Pengajuan pinjaman', 'Pengguna dengan ID 125 telah mengajukan pinjaman sebesar 9.000', 'user', 'add_circle_outline', '2024-08-27 06:52:20'),
(364, 'Pinjaman disetujui', 'Pinjaman dengan ID 39 telah disetujui oleh Admin', 'admin', 'update', '2024-08-27 06:53:13'),
(365, 'Pinjaman disetujui', 'Pinjaman dengan ID 37 telah disetujui oleh Admin', 'admin', 'update', '2024-08-27 06:53:14'),
(366, 'Pinjaman disetujui', 'Pinjaman dengan ID 36 telah disetujui oleh Admin', 'admin', 'update', '2024-08-27 06:53:14'),
(367, 'Pinjaman disetujui', 'Pinjaman dengan ID 38 telah disetujui oleh Admin', 'admin', 'update', '2024-08-27 06:53:16'),
(368, 'Kategori ditambahkan', 'Kategori 9867976 telah ditambahkan', 'admin', 'add_circle_outline', '2024-08-27 06:59:45'),
(369, 'Kategori diubah', 'Kategori hgjfgjfg telah diubah', 'admin', 'update', '2024-08-27 06:59:49'),
(370, 'Kategori dihapus', 'Kategori  telah dihapus', 'admin', 'delete', '2024-08-27 06:59:52'),
(371, 'Satuan ditambahkan', 'Satuan hgikku telah ditambahkan', 'admin', 'add_circle_outline', '2024-08-27 07:22:13'),
(372, 'Satuan diubah', 'Satuan uuuuuuuuuuu telah diubah', 'admin', 'update', '2024-08-27 07:22:18'),
(373, 'Satuan dihapus', 'Satuan  telah dihapus', 'admin', 'delete', '2024-08-27 07:22:33'),
(374, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 07:37:26'),
(375, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 07:37:33'),
(376, 'Limit untuk pengguna dengan ID 133 telah direset', 'Limit direset', 'admin', 'update', '2024-08-27 07:37:37'),
(377, 'Limit untuk pengguna dengan ID 124 telah direset', 'Limit direset', 'admin', 'update', '2024-08-27 07:37:40'),
(378, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 09:04:41'),
(379, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 09:04:44'),
(380, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 09:04:56'),
(381, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 09:04:57'),
(382, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 09:04:58'),
(383, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 09:04:58'),
(384, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-27 09:04:59'),
(385, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-28 07:21:41'),
(386, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-28 07:21:44'),
(387, 'Total limit untuk pengguna dengan ID 125 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-28 07:29:02'),
(388, 'Total limit untuk pengguna dengan ID 125 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-28 07:29:07'),
(389, 'Total limit untuk pengguna dengan ID 125 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-28 07:29:13'),
(390, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-28 07:29:20'),
(391, 'Limit untuk pengguna dengan ID 133 telah dikurangi sebesar 4575474', 'Limit dikurangi', 'admin', 'update', '2024-08-28 07:32:14'),
(392, 'Limit untuk pengguna dengan ID 133 telah direset', 'Limit direset', 'admin', 'update', '2024-08-28 07:32:19'),
(393, 'Limit untuk pengguna dengan ID 133 telah dikurangi sebesar 500000', 'Limit dikurangi', 'admin', 'update', '2024-08-28 07:32:29'),
(394, 'Limit untuk pengguna dengan ID 124 telah dikurangi sebesar 46443', 'Limit dikurangi', 'admin', 'update', '2024-08-28 07:33:19'),
(395, 'Limit untuk pengguna dengan ID 124 telah direset', 'Limit direset', 'admin', 'update', '2024-08-28 07:33:27'),
(396, 'Limit untuk pengguna dengan ID 133 telah direset', 'Limit direset', 'admin', 'update', '2024-08-28 07:42:27'),
(397, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-28 07:42:57'),
(398, 'Total limit untuk pengguna dengan ID 133 telah diperbarui', 'Limit diperbarui', 'admin', 'update', '2024-08-28 07:43:01'),
(399, 'Transaksi ditambahkan', 'Transaksi baru telah ditambahkan dengan total 105.000 Rupiah', 'admin', 'add_circle_outline', '2024-08-28 07:43:21'),
(400, 'Limit untuk pengguna dengan ID 124 telah dikurangi sebesar 5000', 'Limit dikurangi', 'admin', 'update', '2024-08-28 07:43:37'),
(401, 'Limit untuk pengguna dengan ID 124 telah dikurangi sebesar 99000', 'Limit dikurangi', 'admin', 'update', '2024-08-28 07:44:42'),
(402, 'Limit untuk pengguna dengan ID 124 telah dikurangi sebesar 999', 'Limit dikurangi', 'admin', 'update', '2024-08-28 07:44:49'),
(403, 'Limit untuk pengguna dengan ID 124 telah dikurangi sebesar 1', 'Limit dikurangi', 'admin', 'update', '2024-08-28 07:45:10'),
(404, 'Pinjaman disetujui', 'Pinjaman dengan ID 34 telah disetujui oleh Admin', 'admin', 'update', '2024-08-28 07:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(35, 'Minuman', '2024-07-30 03:52:07', '2024-07-30 03:52:07'),
(36, 'Makanan', '2024-07-30 03:52:18', '2024-07-30 03:52:18'),
(38, 'ATK', '2024-07-30 06:28:16', '2024-07-30 06:28:16'),
(39, 'AKM (Alat kamar mandi)', '2024-07-30 06:30:25', '2024-07-30 06:30:25'),
(48, 'oiiiiiiiiiiiiiiiiiiiiiiiiiii', '2024-08-07 03:35:10', '2024-08-27 04:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id` int NOT NULL,
  `jenis_pinjaman` text NOT NULL,
  `tanggal_pinjam` text NOT NULL,
  `jumlah_pinjaman` text NOT NULL,
  `lama_pinjaman` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL,
  `waktu_pengajuan` datetime DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id`, `jenis_pinjaman`, `tanggal_pinjam`, `jumlah_pinjaman`, `lama_pinjaman`, `is_read`, `created_at`, `status`, `waktu_pengajuan`, `user_id`) VALUES
(33, 'Konsumtif', '2024-08-26', '7000', '5', 0, '2024-08-26 07:12:06', 'Telah Disetujui oleh Admin', '2024-08-26 07:12:06', 124),
(34, 'Konsumtif', '2024-08-26', '65865856655686865856865865856856', '8', 0, '2024-08-26 07:23:37', 'Telah Disetujui oleh Admin', '2024-08-26 07:23:37', 124),
(36, 'Produktif', '2024-08-26', '6745', '12', 0, '2024-08-26 07:57:06', 'Telah Disetujui oleh Admin', '2024-08-26 07:57:06', 124),
(37, 'Konsumtif', '2024-08-26', '0', '12', 0, '2024-08-26 07:57:20', 'Telah Disetujui oleh Admin', '2024-08-26 07:57:20', 124),
(38, 'Konsumtif', '2024-08-27', '656666', '12', 0, '2024-08-27 06:51:51', 'Telah Disetujui oleh Admin', '2024-08-27 06:51:51', 125),
(39, 'Konsumtif', '2024-08-27', '9000', '8', 0, '2024-08-27 06:52:20', 'Telah Disetujui oleh Admin', '2024-08-27 06:52:20', 125);

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
  `limit` int DEFAULT NULL,
  `limit_total` int DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `pengguna_date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`pengguna_id`, `nama_lengkap`, `username`, `email`, `satker`, `password`, `pengguna_hak_akses`, `limit`, `limit_total`, `profile_picture`, `pengguna_date_update`, `pengguna_date_created`) VALUES
(124, 'pegawai keuangan', 'siwung', 'orang@gmail.com', 'Keuangan', 'aaaa', 'user', 0, 1500000, NULL, '2024-08-08 08:58:10', '2024-08-08 08:58:10'),
(125, 'user', 'bagas', 'dgffdghdf@fdhfg.c', 'aa', 'aaaa', 'user', 0, 1500000, 'default.png', '2024-08-08 13:40:09', '2024-08-08 13:40:09'),
(126, 'o', 'o', 'gfjgff@bhcv.g', 'ut', 'o', 'operator', NULL, 0, '66c2b1371f126.png', '2024-08-12 13:14:04', '2024-08-12 13:14:04'),
(127, 'Ganendra Praditya Kencana', 'a', 'aditchuy@gmail.com', 'IPDS', 'a', 'admin', NULL, 0, '66cd788116a7a.jpg', '2024-08-13 09:04:05', '2024-08-13 09:04:05'),
(128, 'y', 'ytu', 'ytityi@fghf.hl', 'dyd', 'dyfy', 'operator', NULL, NULL, NULL, '2024-08-13 14:07:40', '2024-08-13 14:07:40'),
(132, 'hjkgh', 'Yono', 'tgfjgf@fgjgh.hjhf', 'ufgjugf', 'ftgufuj', 'user', 0, 1500000, NULL, '2024-08-19 12:01:54', '2024-08-19 12:01:54'),
(133, 'oke', 'Sunandi', 'sadlskn@kdsgsd.gsdg', 'uuuu', 'khgkghk', 'user', 0, 1500000, NULL, '2024-08-19 14:08:23', '2024-08-19 14:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_harga`
--

CREATE TABLE `tb_riwayat_harga` (
  `id_riwayat` int NOT NULL,
  `id_barang` int NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `tanggal_berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_riwayat_harga`
--

INSERT INTO `tb_riwayat_harga` (`id_riwayat`, `id_barang`, `harga_beli`, `harga_jual`, `tanggal_berlaku`) VALUES
(7, 359, 500, 1000, '2024-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int NOT NULL,
  `nama_satuan` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(15, 'Biji', '2024-07-30 08:32:12', '2024-07-30 08:32:12'),
(20, 'uuuuuuuuuuu', '2024-08-13 08:49:46', '2024-08-13 08:49:46'),
(21, 'uuuuuuuuuuu', '2024-08-13 08:49:47', '2024-08-13 08:49:47'),
(22, 'oooooooo', '2024-08-13 08:49:53', '2024-08-13 08:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_simpanan`
--

CREATE TABLE `tb_simpanan` (
  `simpanan_id` int NOT NULL,
  `simpanan_anggota_id` int NOT NULL,
  `simpanan_jenis` enum('amanah','kurban','pendidikan','umroh','idul_fitri','wadiah') NOT NULL,
  `simpanan_total` double NOT NULL,
  `simpanan_keterangan` text NOT NULL,
  `simpanan_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(151, 125, 'Cash', 100000, '', '2024-08-20 02:54:48', '2024-08-20 02:54:48'),
(152, 125, 'Kredit', 50000, '', '2024-08-20 02:55:34', '2024-08-20 02:55:57'),
(153, 125, 'Kredit', 14000, '', '2024-08-20 04:03:12', '2024-08-20 04:03:12'),
(154, 133, 'Kredit', 6000, '', '2024-08-20 05:09:02', '2024-08-20 05:09:37'),
(155, 132, 'Kredit', 6000, '', '2024-08-20 06:58:32', '2024-08-20 06:59:40'),
(156, 124, 'Cash', 5000, '', '2024-08-20 07:01:51', '2024-08-20 07:01:51'),
(157, 133, 'Kredit', 5000, '', '2024-08-20 07:07:34', '2024-08-20 07:07:34'),
(158, 124, 'Kredit', 12000, '', '2024-08-20 07:09:46', '2024-08-20 07:09:46'),
(159, 125, 'Kredit', 198000, '', '2024-08-21 06:19:38', '2024-08-21 06:19:38'),
(160, 125, 'Kredit', 10000, '', '2024-08-21 07:47:42', '2024-08-21 07:47:42'),
(161, 133, 'Kredit', 5000, '', '2024-08-21 07:48:12', '2024-08-21 07:48:12'),
(162, 124, 'Kredit', 10000, '', '2024-08-27 03:51:27', '2024-08-27 03:51:27'),
(163, 124, 'Kredit', 3000, '', '2024-08-27 03:53:03', '2024-08-27 03:53:03'),
(164, 124, 'Kredit', 105000, '', '2024-08-28 07:43:20', '2024-08-28 07:43:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD PRIMARY KEY (`angsuran_id`);

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
-- Indexes for table `tb_simpanan`
--
ALTER TABLE `tb_simpanan`
  ADD PRIMARY KEY (`simpanan_id`);

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
-- AUTO_INCREMENT for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  MODIFY `angsuran_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `tb_detransaksi`
--
ALTER TABLE `tb_detransaksi`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `tb_histori`
--
ALTER TABLE `tb_histori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `pengguna_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tb_riwayat_harga`
--
ALTER TABLE `tb_riwayat_harga`
  MODIFY `id_riwayat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_simpanan`
--
ALTER TABLE `tb_simpanan`
  MODIFY `simpanan_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

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
