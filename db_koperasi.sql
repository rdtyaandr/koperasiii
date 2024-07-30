-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2024 at 04:34 AM
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
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int NOT NULL,
  `pengguna_id` int NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_anggota`
--

CREATE TABLE `simkopsis_anggota` (
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

--
-- Dumping data for table `simkopsis_anggota`
--

INSERT INTO `simkopsis_anggota` (`anggota_id`, `anggota_nama`, `anggota_jk`, `anggota_tempat_lahir`, `anggota_tanggal_lahir`, `anggota_nik`, `anggota_agama`, `anggota_nama_ibu`, `anggota_alamat`, `anggota_pekerjaan`, `anggota_pendidikan`, `anggota_status_kawin`, `anggota_nomor_hp`, `anggota_email`, `anggota_pendapatan`, `anggota_dokumen`, `anggota_date_created`) VALUES
(2, 'sasa', 'P', 'surabaya', '2024-07-02', '4234432432423', 'Islam', 'sasa', 'ndsadsaind', 'magangan', 'SD', 'janda', '2131123213', 'sasa@magang.go', 500, NULL, '2024-07-25 09:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_angsuran`
--

CREATE TABLE `simkopsis_angsuran` (
  `angsuran_id` int NOT NULL,
  `angsuran_pinjaman_id` int NOT NULL,
  `angsuran_jumlah` double NOT NULL,
  `angsuran_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_level`
--

CREATE TABLE `simkopsis_level` (
  `id` int NOT NULL,
  `level_pengguna` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `simkopsis_level`
--

INSERT INTO `simkopsis_level` (`id`, `level_pengguna`) VALUES
(1, 'Ketua'),
(2, 'pengurus'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_pengguna`
--

CREATE TABLE `simkopsis_pengguna` (
  `pengguna_id` int NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satker` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pengguna_hak_akses` enum('ketua','operator','user') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pengguna_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simkopsis_pengguna`
--

INSERT INTO `simkopsis_pengguna` (`pengguna_id`, `nama_lengkap`, `username`, `email`, `satker`, `password`, `pengguna_hak_akses`, `pengguna_date_created`, `pengguna_date_update`) VALUES
(7, 'bambang suharjo', 'bambang', 'bambang@kompas.idn', 'IDK', '123', 'ketua', '2024-07-27 19:31:02', '2024-07-27 19:31:02'),
(8, 'bang sat', 'sat ', 'satrio213@magang.io', 'MAGANG', '123', 'operator', '2024-07-29 08:19:45', '2024-07-29 08:19:45'),
(9, 'user', 'user', 'user@gmail.gblok', 'IDK', '123', 'user', '2024-07-29 08:26:01', '2024-07-29 08:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `simkopsis_pinjaman`
--

CREATE TABLE `simkopsis_pinjaman` (
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
-- Table structure for table `simkopsis_simpanan`
--

CREATE TABLE `simkopsis_simpanan` (
  `simpanan_id` int NOT NULL,
  `simpanan_anggota_id` int NOT NULL,
  `simpanan_jenis` enum('amanah','kurban','pendidikan','umroh','idul_fitri','wadiah') NOT NULL,
  `simpanan_total` double NOT NULL,
  `simpanan_keterangan` text NOT NULL,
  `simpanan_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simkopsis_simpanan`
--

INSERT INTO `simkopsis_simpanan` (`simpanan_id`, `simpanan_anggota_id`, `simpanan_jenis`, `simpanan_total`, `simpanan_keterangan`, `simpanan_date_created`) VALUES
(1, 0, 'amanah', 50, 'SIMPANAN AMANAH : Simpanan bersifat umum yang penyimpanan dan penarikannya dapat dilakukan kapan saja oleh nasabah pada jam kerja. Simpanan awal Rp 25.000 dan selanjutnya minimal Rp 10.000.', '2024-07-26 10:57:22'),
(2, 0, 'amanah', 25000, 'SIMPANAN AMANAH : Simpanan bersifat umum yang penyimpanan dan penarikannya dapat dilakukan kapan saja oleh nasabah pada jam kerja. Simpanan awal Rp 25.000 dan selanjutnya minimal Rp 10.000.', '2024-07-26 10:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `detail_barang` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `detail_barang`, `satuan`, `kategori`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(2, 'BR002', 'LAKBAN HITAM', 'Merk A', 'PCS', 'ATK', 19200, 23040, 6, '2020-12-01 07:31:03', '0000-00-00 00:00:00'),
(3, 'BR003', 'TINTA EPRINT CAIR ', 'Merk A', 'PCS', 'ATK', 42000, 50400, 0, '2020-12-01 07:31:34', '0000-00-00 00:00:00'),
(4, 'BR004', 'KERTAS F4', 'Merk A', 'RIM', 'ATK', 50000, 60000, -19, '2020-12-01 07:32:13', '0000-00-00 00:00:00'),
(5, 'BR005', 'PULPEN AE7', 'Merk A', 'PCS', 'ATK', 1800, 2160, 0, '2020-12-01 07:34:08', '0000-00-00 00:00:00'),
(6, 'BR006', 'LEM STIK 24', 'Merk A', 'PCS', 'ATK', 4800, 5760, -10, '2020-12-01 07:34:58', '0000-00-00 00:00:00'),
(7, 'BR007', 'KALKULATOR CITIZEN', 'Merk A', 'PCS', 'ATK', 162000, 194400, 0, '2020-12-01 07:36:12', '0000-00-00 00:00:00'),
(8, 'BR008', 'KERTAS 1 PLY', 'Merk A', 'DUS', 'ATK', 295000, 354000, 0, '2020-12-01 07:36:43', '0000-00-00 00:00:00'),
(9, 'BR009', 'ODNERD GEMA', 'Merk A', 'PCS', 'ATK', 24000, 28800, 0, '2020-12-01 07:38:09', '0000-00-00 00:00:00'),
(10, 'BR0010', 'AMPLOP PUTIH KECIL', 'Merk A', 'PCS', 'ATK', 19200, 23040, 0, '2020-12-01 07:39:47', '0000-00-00 00:00:00'),
(11, 'BR0011', 'KWITANSI TELLER', 'Merk B', 'PCS', 'PRC', 11400, 13680, 0, '2020-12-01 07:41:23', '0000-00-00 00:00:00'),
(12, 'BR0012', 'AMPLOP UANG SEDANG', 'Merk B', 'PCS', 'PRC', 1500, 1800, 0, '2020-12-01 07:44:16', '0000-00-00 00:00:00'),
(13, 'BR0013', 'BUKTI KAS 50', 'Merk B', 'PCS', 'PRC', 3600, 4320, 0, '2020-12-01 07:45:10', '2020-12-02 05:42:33'),
(15, 'BR0014', 'Pita Epson 2180', 'Merk A', 'PCS', 'SUP', 100000, 120000, -8, '2020-12-02 13:23:09', '0000-00-00 00:00:00'),
(16, 'BR0015', 'Tisu Basah', 'Merk Mitu', 'PCS', 'AKB', 20000, 24000, 67, '2020-12-02 13:23:36', '0000-00-00 00:00:00'),
(18, 'BR0017', 'Bumbu Penyedap', 'Merek Masako', 'PCS', 'ATK', 2500, 3000, -770, '2024-07-09 15:34:10', '2024-07-12 01:02:52'),
(19, 'BR0018', 'Minuman Bersoda', 'Merek Coca Cola', 'PCS', 'SUP', 5000, 6000, 5, '2024-07-12 15:36:05', '0000-00-00 00:00:00'),
(20, 'KJ817', 'Kopi', 'Merek Abc', 'PCS', 'SUP', 2500, 3000, 30, '2024-07-15 08:40:39', '0000-00-00 00:00:00'),
(21, 'br0019', 'Mie Instan', 'Indomie', 'DUS', 'PRC', 32000, 38400, 90, '2024-07-15 11:41:12', '2024-07-22 03:38:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simkopsis_anggota`
--
ALTER TABLE `simkopsis_anggota`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indexes for table `simkopsis_angsuran`
--
ALTER TABLE `simkopsis_angsuran`
  ADD PRIMARY KEY (`angsuran_id`);

--
-- Indexes for table `simkopsis_level`
--
ALTER TABLE `simkopsis_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simkopsis_pengguna`
--
ALTER TABLE `simkopsis_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `simkopsis_pinjaman`
--
ALTER TABLE `simkopsis_pinjaman`
  ADD PRIMARY KEY (`pinjaman_id`);

--
-- Indexes for table `simkopsis_simpanan`
--
ALTER TABLE `simkopsis_simpanan`
  ADD PRIMARY KEY (`simpanan_id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simkopsis_anggota`
--
ALTER TABLE `simkopsis_anggota`
  MODIFY `anggota_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `simkopsis_angsuran`
--
ALTER TABLE `simkopsis_angsuran`
  MODIFY `angsuran_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simkopsis_level`
--
ALTER TABLE `simkopsis_level`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `simkopsis_pengguna`
--
ALTER TABLE `simkopsis_pengguna`
  MODIFY `pengguna_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `simkopsis_pinjaman`
--
ALTER TABLE `simkopsis_pinjaman`
  MODIFY `pinjaman_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simkopsis_simpanan`
--
ALTER TABLE `simkopsis_simpanan`
  MODIFY `simpanan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
