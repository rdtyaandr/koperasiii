-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2024 at 06:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

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
-- Table structure for table `tb_anggota`
--
CREATE DATABASE IF NOT EXISTS `db_koperasi`;
USE `db_koperasi`;
-- ... kode lainnya tetap sama ...

CREATE TABLE `tb_anggota` (
  `anggota_id` int NOT NULL,
  `anggota_nama` varchar(100) NOT NULL,
  `anggota_jk` enum('L','P') NOT NULL,
  `anggota_tempat_lahir` varchar(50) NOT NULL,
  `anggota_tanggal_lahir` date NOT NULL,
  `anggota_nik` varchar(25) NOT NULL,
  `anggota_agama` enum('Islam','Kristen','Katolik','Buddha','Hindu','Konghuchu') NOT NULL,
  `anggota_nama_ibu` varchar(100) NOT NULL,
  `anggota_alamat` text NOT NULL,
  `anggota_pekerjaan` varchar(100) NOT NULL,
  `anggota_pendidikan` varchar(50) NOT NULL,
  `anggota_status_kawin` enum('lajang','menikah','janda','duda') NOT NULL,
  `anggota_nomor_hp` varchar(20) NOT NULL,
  `anggota_email` varchar(50) NOT NULL,
  `anggota_pendapatan` bigint NOT NULL,
  `anggota_dokumen` text,
  `anggota_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `detail_barang` varchar(100) NOT NULL,
  `id_satuan` int NOT NULL,
  `id_kategori` int NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
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
(39, 'AKM (Alat kamar mandi)', '2024-07-30 06:30:25', '2024-07-30 06:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `pengguna_id` int NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satker` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pengguna_hak_akses` enum('user','operator','admin') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pengguna_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`pengguna_id`, `nama_lengkap`, `username`, `email`, `satker`, `password`, `pengguna_hak_akses`, `pengguna_date_created`) VALUES
(5, 'a', 'a', 'adit@gmail.com', 'ipds', 'a', 'admin', '2024-07-30 15:31:36'),
(6, 'hyyhrt', '365675', 'sdgsdg@jfhkjghk', '36436346', '6574587', 'admin', '2024-08-01 14:42:10'),
(7, 'agus', 'agus', 'agus@777757', 'ttttttttttttttttt', '12345678', 'admin', '2024-08-02 11:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `pinjaman_id` int NOT NULL,
  `pinjaman_anggota_id` int NOT NULL,
  `pinjaman_jenis` enum('mudharobah','murabahah','musyarakah','ijarah') NOT NULL,
  `pinjaman_total` double NOT NULL,
  `pinjaman_tenggat` int NOT NULL,
  `pinjaman_keterangan` text NOT NULL,
  `pinjaman_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int NOT NULL,
  `nama_satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
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
(15, 'Biji', '2024-07-30 08:32:12', '2024-07-30 08:32:12');

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

--
-- Dumping data for table `tb_simpanan`
--

INSERT INTO `tb_simpanan` (`simpanan_id`, `simpanan_anggota_id`, `simpanan_jenis`, `simpanan_total`, `simpanan_keterangan`, `simpanan_date_created`) VALUES
(1, 0, 'amanah', 20000, 'SIMPANAN AMANAH : Simpanan bersifat umum yang penyimpanan dan penarikannya dapat dilakukan kapan saja oleh nasabah pada jam kerja. Simpanan awal Rp 25.000 dan selanjutnya minimal Rp 10.000.', '2024-07-25 13:41:44'),
(2, 0, 'amanah', 1e18, 'SIMPANAN AMANAH : Simpanan bersifat umum yang penyimpanan dan penarikannya dapat dilakukan kapan saja oleh nasabah pada jam kerja. Simpanan awal Rp 25.000 dan selanjutnya minimal Rp 10.000.', '2024-07-25 13:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int NOT NULL,
  `pengguna_id` int NOT NULL,
  `cara_bayar` varchar(50) NOT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `status_barang` varchar(50) NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--
CREATE TABLE `tb_pengajuan` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `nama_anggota` text NOT NULL,
  `jenis_pinjaman` text NOT NULL,
  `tanggal_pinjam` text NOT NULL,
  `jumlah_pinjaman` text NOT NULL,
  `lama_pinjaman` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT NULL,
  `waktu_pengajuan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id`, `pengguna_id`, `nama_anggota`, `jenis_pinjaman`, `tanggal_pinjam`, `jumlah_pinjaman`, `lama_pinjaman`, `is_read`, `created_at`, `status`, `waktu_pengajuan`) VALUES
(9, 0, 'UFUWEWE', 'Jenis 1', '2024-08-15', '3232', '2323', 0, '2024-07-31 18:13:24', 'Telah Disetujui oleh Admin', '2024-07-31 20:13:24'),
(10, 0, 'UYUY', 'Jenis 1', '2024-08-15', '879', '879', 0, '2024-07-31 18:30:58', 'Menunggu Persetujuan', '2024-07-31 20:30:58'),
(11, 0, 'kjr2o', 'xx', '2024-08-15', '8398', '3 bulan, ', 0, '2024-08-01 13:20:42', 'Telah Disetujui oleh Admin', '2024-08-01 15:20:42'),
(12, 0, 'ewr', 'wer', '2024-08-07', '3243', '342', 0, '2024-08-01 13:47:53', 'Menunggu Persetujuan', '2024-08-01 15:47:53'),
(13, 0, 'RIVI GANTENG', 'Jenis 1', '2024-07-31', '31231', '21313', 0, '2024-08-01 15:43:18', 'Menunggu Persetujuan', '2024-08-01 17:43:18'),
(14, 0, 'oioi', 'Mutasi', '2024-08-30', '560000', '6 - 7', 0, '2024-08-01 15:47:12', 'Telah Disetujui oleh Admin', '2024-08-01 17:47:12');

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`anggota_id`);

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
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`pinjaman_id`);

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
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `anggota_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  MODIFY `angsuran_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_detransaksi`
--
ALTER TABLE `tb_detransaksi`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `pengguna_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `pinjaman_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_simpanan`
--
ALTER TABLE `tb_simpanan`
  MODIFY `simpanan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `tb_pengguna` (`pengguna_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
