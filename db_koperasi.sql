-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2024 at 08:25 AM
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

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `detail_barang`, `id_satuan`, `id_kategori`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(45, '-', 'yuyuouuuuu', '-', 4, 35, 96969, 76979679, 73, '2024-07-30 03:39:07', '2024-07-30 07:37:27'),
(46, '-', 'jukukkkkhkhjh', '-', 15, 35, 5668565, 68556865, 6, '2024-07-30 03:47:26', '2024-07-30 07:37:33'),
(47, '-', 'uhhigiuiyiy', '-', 6, 35, 685865, 86586, 86, '2024-07-30 03:52:46', '2024-07-30 07:37:42'),
(48, '', 'baju', '', 9, 36, 976976, 79769, 76, '2024-07-30 04:07:44', '2024-07-30 07:37:38'),
(49, '', 'Asus Rog', 'Sampo Merek Panteen', 6, 39, 12000, 15000, 10, '2024-07-30 06:31:39', '2024-07-30 06:31:39');

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
(3, 'a', 'a', 'adit@gmail.com', 'ipds', '0cc175b9c0f1b6a831c399e269772661', 'user', '2024-07-25 08:01:44'),
(4, 'b', 'b', 'sandhikagalih@unpas.ac.id', 'ipds', '92eb5ffee6ae2fec3ad71c777531578f', 'user', '2024-07-25 09:11:38');

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
  `id_detailtransaksi` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_barang` int NOT NULL,
  `jumlah_beli` int NOT NULL,
  `total` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id_detailtransaksi`);

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
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `pengguna_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_detailtransaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
