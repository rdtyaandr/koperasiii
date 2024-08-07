-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Agu 2024 pada 02.58
-- Versi server: 8.0.30
-- Versi PHP: 8.3.8

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
-- Struktur dari tabel `tb_anggota`
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

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`anggota_id`, `anggota_nama`, `anggota_jk`, `anggota_tempat_lahir`, `anggota_tanggal_lahir`, `anggota_nik`, `anggota_agama`, `anggota_nama_ibu`, `anggota_alamat`, `anggota_pekerjaan`, `anggota_pendidikan`, `anggota_status_kawin`, `anggota_nomor_hp`, `anggota_email`, `anggota_pendapatan`, `anggota_dokumen`, `anggota_date_created`) VALUES
(2, 'Nama Anggota 1', 'L', 'Tempat Lahir', '2011-08-15', '9131658728', 'Islam', 'Nama Ibu 1', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126216562', 'email1@domain.com', 518266, NULL, '2024-08-02 13:48:22'),
(3, 'Nama Anggota 2', 'P', 'Tempat Lahir', '2020-09-27', '2060158943', 'Islam', 'Nama Ibu 2', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08124880750', 'email2@domain.com', 309304, NULL, '2024-08-02 13:48:22'),
(4, 'Nama Anggota 3', 'L', 'Tempat Lahir', '2000-06-04', '1710041278', 'Islam', 'Nama Ibu 3', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08121203410', 'email3@domain.com', 614401, NULL, '2024-08-02 13:48:22'),
(5, 'Nama Anggota 4', 'P', 'Tempat Lahir', '1989-01-10', '4256556000', 'Islam', 'Nama Ibu 4', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08122522533', 'email4@domain.com', 870458, NULL, '2024-08-02 13:48:23'),
(6, 'Nama Anggota 5', 'P', 'Tempat Lahir', '2006-04-15', '448127650', 'Islam', 'Nama Ibu 5', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08124916619', 'email5@domain.com', 82649, NULL, '2024-08-02 13:48:23'),
(7, 'Nama Anggota 6', 'P', 'Tempat Lahir', '2002-06-08', '4020371487', 'Islam', 'Nama Ibu 6', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08129314301', 'email6@domain.com', 74130, NULL, '2024-08-02 13:48:23'),
(8, 'Nama Anggota 7', 'P', 'Tempat Lahir', '1991-08-22', '5679819291', 'Islam', 'Nama Ibu 7', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123719653', 'email7@domain.com', 548708, NULL, '2024-08-02 13:48:23'),
(9, 'Nama Anggota 8', 'P', 'Tempat Lahir', '2000-01-01', '5775746736', 'Islam', 'Nama Ibu 8', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123908525', 'email8@domain.com', 978930, NULL, '2024-08-02 13:48:23'),
(10, 'Nama Anggota 9', 'P', 'Tempat Lahir', '1990-12-05', '2021424539', 'Islam', 'Nama Ibu 9', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127402717', 'email9@domain.com', 675816, NULL, '2024-08-02 13:48:23'),
(11, 'Nama Anggota 10', 'L', 'Tempat Lahir', '1986-06-02', '3446655230', 'Islam', 'Nama Ibu 10', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123261888', 'email10@domain.com', 258271, NULL, '2024-08-02 13:48:23'),
(12, 'Nama Anggota 11', 'L', 'Tempat Lahir', '1985-02-27', '73309056', 'Islam', 'Nama Ibu 11', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126131430', 'email11@domain.com', 93211, NULL, '2024-08-02 13:48:24'),
(13, 'Nama Anggota 12', 'P', 'Tempat Lahir', '1981-12-10', '3876519709', 'Islam', 'Nama Ibu 12', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123000508', 'email12@domain.com', 13905, NULL, '2024-08-02 13:48:24'),
(14, 'Nama Anggota 13', 'L', 'Tempat Lahir', '1984-05-11', '5176250138', 'Islam', 'Nama Ibu 13', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08123105209', 'email13@domain.com', 34567, NULL, '2024-08-02 13:48:24'),
(15, 'Nama Anggota 14', 'L', 'Tempat Lahir', '2019-06-17', '7894884895', 'Islam', 'Nama Ibu 14', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08126423662', 'email14@domain.com', 534518, NULL, '2024-08-02 13:48:24'),
(16, 'Nama Anggota 15', 'P', 'Tempat Lahir', '2018-05-25', '3830550754', 'Islam', 'Nama Ibu 15', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123562347', 'email15@domain.com', 143921, NULL, '2024-08-02 13:48:24'),
(17, 'Nama Anggota 16', 'P', 'Tempat Lahir', '1983-06-24', '1610761025', 'Islam', 'Nama Ibu 16', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08122013', 'email16@domain.com', 394094, NULL, '2024-08-02 13:48:24'),
(18, 'Nama Anggota 17', 'P', 'Tempat Lahir', '1991-04-05', '4256545691', 'Islam', 'Nama Ibu 17', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08123586374', 'email17@domain.com', 411826, NULL, '2024-08-02 13:48:24'),
(19, 'Nama Anggota 18', 'P', 'Tempat Lahir', '1990-07-31', '4534410894', 'Islam', 'Nama Ibu 18', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08127664021', 'email18@domain.com', 155975, NULL, '2024-08-02 13:48:24'),
(20, 'Nama Anggota 19', 'L', 'Tempat Lahir', '1977-11-06', '2351453176', 'Islam', 'Nama Ibu 19', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126002840', 'email19@domain.com', 576275, NULL, '2024-08-02 13:48:24'),
(21, 'Nama Anggota 20', 'L', 'Tempat Lahir', '1990-12-03', '1274412014', 'Islam', 'Nama Ibu 20', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '0812893301', 'email20@domain.com', 539087, NULL, '2024-08-02 13:48:24'),
(22, 'Nama Anggota 21', 'L', 'Tempat Lahir', '1998-08-10', '3175050889', 'Islam', 'Nama Ibu 21', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08121855820', 'email21@domain.com', 845051, NULL, '2024-08-02 13:48:25'),
(23, 'Nama Anggota 22', 'P', 'Tempat Lahir', '1984-03-30', '315098166', 'Islam', 'Nama Ibu 22', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08127757307', 'email22@domain.com', 765490, NULL, '2024-08-02 13:48:25'),
(24, 'Nama Anggota 23', 'P', 'Tempat Lahir', '2014-05-09', '5233522425', 'Islam', 'Nama Ibu 23', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08124413583', 'email23@domain.com', 199942, NULL, '2024-08-02 13:48:25'),
(25, 'Nama Anggota 24', 'P', 'Tempat Lahir', '1985-09-11', '8649036072', 'Islam', 'Nama Ibu 24', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127938384', 'email24@domain.com', 911920, NULL, '2024-08-02 13:48:25'),
(26, 'Nama Anggota 25', 'L', 'Tempat Lahir', '2016-11-10', '2391328487', 'Islam', 'Nama Ibu 25', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08127216613', 'email25@domain.com', 81997, NULL, '2024-08-02 13:48:25'),
(27, 'Nama Anggota 26', 'L', 'Tempat Lahir', '1975-09-02', '1600888698', 'Islam', 'Nama Ibu 26', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08124559213', 'email26@domain.com', 500049, NULL, '2024-08-02 13:48:25'),
(28, 'Nama Anggota 27', 'L', 'Tempat Lahir', '2016-06-24', '4138452302', 'Islam', 'Nama Ibu 27', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '0812192896', 'email27@domain.com', 277558, NULL, '2024-08-02 13:48:25'),
(29, 'Nama Anggota 28', 'L', 'Tempat Lahir', '1983-10-08', '949035967', 'Islam', 'Nama Ibu 28', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08128338742', 'email28@domain.com', 98220, NULL, '2024-08-02 13:48:25'),
(30, 'Nama Anggota 29', 'P', 'Tempat Lahir', '1991-12-22', '2952119468', 'Islam', 'Nama Ibu 29', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08127138948', 'email29@domain.com', 674430, NULL, '2024-08-02 13:48:25'),
(31, 'Nama Anggota 30', 'L', 'Tempat Lahir', '2018-02-21', '9537883558', 'Islam', 'Nama Ibu 30', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '0812934599', 'email30@domain.com', 323927, NULL, '2024-08-02 13:48:25'),
(32, 'Nama Anggota 31', 'L', 'Tempat Lahir', '1988-05-21', '6047863043', 'Islam', 'Nama Ibu 31', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126368548', 'email31@domain.com', 871453, NULL, '2024-08-02 13:48:25'),
(33, 'Nama Anggota 32', 'L', 'Tempat Lahir', '1993-08-26', '7556789645', 'Islam', 'Nama Ibu 32', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08129250701', 'email32@domain.com', 612651, NULL, '2024-08-02 13:48:25'),
(34, 'Nama Anggota 33', 'L', 'Tempat Lahir', '1994-06-30', '1472513099', 'Islam', 'Nama Ibu 33', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08122385201', 'email33@domain.com', 576528, NULL, '2024-08-02 13:48:25'),
(35, 'Nama Anggota 34', 'L', 'Tempat Lahir', '2019-04-20', '278950333', 'Islam', 'Nama Ibu 34', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126653299', 'email34@domain.com', 247871, NULL, '2024-08-02 13:48:25'),
(36, 'Nama Anggota 35', 'L', 'Tempat Lahir', '2000-12-10', '6360436367', 'Islam', 'Nama Ibu 35', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08122712510', 'email35@domain.com', 783390, NULL, '2024-08-02 13:48:25'),
(37, 'Nama Anggota 36', 'L', 'Tempat Lahir', '2016-04-20', '5195686095', 'Islam', 'Nama Ibu 36', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08129429908', 'email36@domain.com', 413936, NULL, '2024-08-02 13:48:25'),
(38, 'Nama Anggota 37', 'L', 'Tempat Lahir', '1976-07-14', '865645120', 'Islam', 'Nama Ibu 37', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127488786', 'email37@domain.com', 309374, NULL, '2024-08-02 13:48:25'),
(39, 'Nama Anggota 38', 'L', 'Tempat Lahir', '1995-12-15', '9645460843', 'Islam', 'Nama Ibu 38', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08126242663', 'email38@domain.com', 810589, NULL, '2024-08-02 13:48:25'),
(40, 'Nama Anggota 39', 'L', 'Tempat Lahir', '2001-02-26', '8043820465', 'Islam', 'Nama Ibu 39', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123374752', 'email39@domain.com', 293393, NULL, '2024-08-02 13:48:25'),
(41, 'Nama Anggota 40', 'L', 'Tempat Lahir', '2004-12-22', '5990630533', 'Islam', 'Nama Ibu 40', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '081234087', 'email40@domain.com', 143142, NULL, '2024-08-02 13:48:26'),
(42, 'Nama Anggota 41', 'P', 'Tempat Lahir', '2019-09-10', '3735513131', 'Islam', 'Nama Ibu 41', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08128519970', 'email41@domain.com', 202201, NULL, '2024-08-02 13:48:26'),
(43, 'Nama Anggota 42', 'L', 'Tempat Lahir', '1991-03-10', '9773520519', 'Islam', 'Nama Ibu 42', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127287206', 'email42@domain.com', 219997, NULL, '2024-08-02 13:48:26'),
(44, 'Nama Anggota 43', 'P', 'Tempat Lahir', '1979-03-01', '8042417166', 'Islam', 'Nama Ibu 43', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123993954', 'email43@domain.com', 828547, NULL, '2024-08-02 13:48:26'),
(45, 'Nama Anggota 44', 'P', 'Tempat Lahir', '2012-09-27', '3519081998', 'Islam', 'Nama Ibu 44', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08121852979', 'email44@domain.com', 781876, NULL, '2024-08-02 13:48:26'),
(46, 'Nama Anggota 45', 'L', 'Tempat Lahir', '2003-07-06', '485936860', 'Islam', 'Nama Ibu 45', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08126585056', 'email45@domain.com', 962028, NULL, '2024-08-02 13:48:26'),
(47, 'Nama Anggota 46', 'P', 'Tempat Lahir', '2010-03-31', '9313500299', 'Islam', 'Nama Ibu 46', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08125332307', 'email46@domain.com', 114112, NULL, '2024-08-02 13:48:26'),
(48, 'Nama Anggota 47', 'P', 'Tempat Lahir', '1999-01-02', '6474473379', 'Islam', 'Nama Ibu 47', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08128827537', 'email47@domain.com', 269505, NULL, '2024-08-02 13:48:26'),
(49, 'Nama Anggota 48', 'P', 'Tempat Lahir', '1990-03-22', '3413000594', 'Islam', 'Nama Ibu 48', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '0812273515', 'email48@domain.com', 562876, NULL, '2024-08-02 13:48:26'),
(50, 'Nama Anggota 49', 'P', 'Tempat Lahir', '1975-12-21', '6681138963', 'Islam', 'Nama Ibu 49', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08122514349', 'email49@domain.com', 947601, NULL, '2024-08-02 13:48:26'),
(51, 'Nama Anggota 50', 'P', 'Tempat Lahir', '2020-10-21', '4274808265', 'Islam', 'Nama Ibu 50', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126132154', 'email50@domain.com', 259703, NULL, '2024-08-02 13:48:26'),
(52, 'Nama Anggota 51', 'L', 'Tempat Lahir', '1998-11-04', '1996497131', 'Islam', 'Nama Ibu 51', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08128094097', 'email51@domain.com', 167125, NULL, '2024-08-02 13:48:26'),
(53, 'Nama Anggota 52', 'L', 'Tempat Lahir', '1997-10-28', '4559141569', 'Islam', 'Nama Ibu 52', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08128163767', 'email52@domain.com', 199674, NULL, '2024-08-02 13:48:26'),
(54, 'Nama Anggota 53', 'P', 'Tempat Lahir', '2017-03-26', '881968458', 'Islam', 'Nama Ibu 53', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08121250069', 'email53@domain.com', 631409, NULL, '2024-08-02 13:48:26'),
(55, 'Nama Anggota 54', 'P', 'Tempat Lahir', '2023-10-17', '7334488367', 'Islam', 'Nama Ibu 54', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08124473957', 'email54@domain.com', 353426, NULL, '2024-08-02 13:48:26'),
(56, 'Nama Anggota 55', 'L', 'Tempat Lahir', '2021-05-14', '473816544', 'Islam', 'Nama Ibu 55', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '0812757524', 'email55@domain.com', 248024, NULL, '2024-08-02 13:48:26'),
(57, 'Nama Anggota 56', 'L', 'Tempat Lahir', '2008-08-02', '5626205118', 'Islam', 'Nama Ibu 56', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08128428915', 'email56@domain.com', 275477, NULL, '2024-08-02 13:48:26'),
(58, 'Nama Anggota 57', 'P', 'Tempat Lahir', '2003-09-30', '5395502956', 'Islam', 'Nama Ibu 57', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08127915433', 'email57@domain.com', 779343, NULL, '2024-08-02 13:48:26'),
(59, 'Nama Anggota 58', 'P', 'Tempat Lahir', '2010-12-23', '7958105986', 'Islam', 'Nama Ibu 58', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08124215960', 'email58@domain.com', 622563, NULL, '2024-08-02 13:48:27'),
(60, 'Nama Anggota 59', 'P', 'Tempat Lahir', '2005-12-23', '3182105266', 'Islam', 'Nama Ibu 59', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126476241', 'email59@domain.com', 996936, NULL, '2024-08-02 13:48:27'),
(61, 'Nama Anggota 60', 'L', 'Tempat Lahir', '2013-09-06', '9658066136', 'Islam', 'Nama Ibu 60', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08129740200', 'email60@domain.com', 347236, NULL, '2024-08-02 13:48:27'),
(62, 'Nama Anggota 61', 'P', 'Tempat Lahir', '2023-02-22', '7021259290', 'Islam', 'Nama Ibu 61', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127946961', 'email61@domain.com', 933579, NULL, '2024-08-02 13:48:27'),
(63, 'Nama Anggota 62', 'L', 'Tempat Lahir', '1993-09-11', '2400636712', 'Islam', 'Nama Ibu 62', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08129984604', 'email62@domain.com', 971455, NULL, '2024-08-02 13:48:27'),
(64, 'Nama Anggota 63', 'P', 'Tempat Lahir', '2004-11-05', '3899085516', 'Islam', 'Nama Ibu 63', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08128633430', 'email63@domain.com', 426575, NULL, '2024-08-02 13:48:27'),
(65, 'Nama Anggota 64', 'P', 'Tempat Lahir', '2002-11-16', '5440708282', 'Islam', 'Nama Ibu 64', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '081281189', 'email64@domain.com', 685517, NULL, '2024-08-02 13:48:27'),
(66, 'Nama Anggota 65', 'L', 'Tempat Lahir', '1976-08-22', '5883228383', 'Islam', 'Nama Ibu 65', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08125490533', 'email65@domain.com', 556853, NULL, '2024-08-02 13:48:27'),
(67, 'Nama Anggota 66', 'L', 'Tempat Lahir', '2023-11-03', '6635836452', 'Islam', 'Nama Ibu 66', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '0812516424', 'email66@domain.com', 135876, NULL, '2024-08-02 13:48:27'),
(68, 'Nama Anggota 67', 'P', 'Tempat Lahir', '2013-11-11', '4998233229', 'Islam', 'Nama Ibu 67', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08122563721', 'email67@domain.com', 330216, NULL, '2024-08-02 13:48:27'),
(69, 'Nama Anggota 68', 'P', 'Tempat Lahir', '2003-08-24', '4499756670', 'Islam', 'Nama Ibu 68', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08125755154', 'email68@domain.com', 630924, NULL, '2024-08-02 13:48:27'),
(70, 'Nama Anggota 69', 'L', 'Tempat Lahir', '2012-03-20', '9537769229', 'Islam', 'Nama Ibu 69', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08122690912', 'email69@domain.com', 267203, NULL, '2024-08-02 13:48:27'),
(71, 'Nama Anggota 70', 'P', 'Tempat Lahir', '1982-07-06', '6242673356', 'Islam', 'Nama Ibu 70', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127269065', 'email70@domain.com', 327313, NULL, '2024-08-02 13:48:27'),
(72, 'Nama Anggota 71', 'L', 'Tempat Lahir', '2009-09-25', '1189887981', 'Islam', 'Nama Ibu 71', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126816301', 'email71@domain.com', 933735, NULL, '2024-08-02 13:48:27'),
(73, 'Nama Anggota 72', 'P', 'Tempat Lahir', '2008-09-17', '7172413251', 'Islam', 'Nama Ibu 72', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08121684603', 'email72@domain.com', 801737, NULL, '2024-08-02 13:48:27'),
(74, 'Nama Anggota 73', 'P', 'Tempat Lahir', '2019-01-10', '466537531', 'Islam', 'Nama Ibu 73', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '0812853968', 'email73@domain.com', 356957, NULL, '2024-08-02 13:48:27'),
(75, 'Nama Anggota 74', 'P', 'Tempat Lahir', '1996-01-02', '2747246811', 'Islam', 'Nama Ibu 74', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123401360', 'email74@domain.com', 313425, NULL, '2024-08-02 13:48:27'),
(76, 'Nama Anggota 75', 'P', 'Tempat Lahir', '1984-12-12', '3264335005', 'Islam', 'Nama Ibu 75', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126521964', 'email75@domain.com', 415679, NULL, '2024-08-02 13:48:27'),
(77, 'Nama Anggota 76', 'L', 'Tempat Lahir', '2006-07-02', '4446274931', 'Islam', 'Nama Ibu 76', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08123516302', 'email76@domain.com', 346843, NULL, '2024-08-02 13:48:27'),
(78, 'Nama Anggota 77', 'P', 'Tempat Lahir', '2006-10-18', '7425441283', 'Islam', 'Nama Ibu 77', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08122105956', 'email77@domain.com', 936711, NULL, '2024-08-02 13:48:27'),
(79, 'Nama Anggota 78', 'L', 'Tempat Lahir', '2002-03-03', '882399334', 'Islam', 'Nama Ibu 78', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08122106430', 'email78@domain.com', 767997, NULL, '2024-08-02 13:48:27'),
(80, 'Nama Anggota 79', 'L', 'Tempat Lahir', '1987-10-19', '573139545', 'Islam', 'Nama Ibu 79', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08122164440', 'email79@domain.com', 849188, NULL, '2024-08-02 13:48:28'),
(81, 'Nama Anggota 80', 'P', 'Tempat Lahir', '2002-10-30', '3876164447', 'Islam', 'Nama Ibu 80', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08124204824', 'email80@domain.com', 858741, NULL, '2024-08-02 13:48:28'),
(82, 'Nama Anggota 81', 'L', 'Tempat Lahir', '1995-05-10', '8285616494', 'Islam', 'Nama Ibu 81', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '0812989241', 'email81@domain.com', 137574, NULL, '2024-08-02 13:48:28'),
(83, 'Nama Anggota 82', 'L', 'Tempat Lahir', '1997-06-20', '5405468871', 'Islam', 'Nama Ibu 82', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08127505082', 'email82@domain.com', 529251, NULL, '2024-08-02 13:48:28'),
(84, 'Nama Anggota 83', 'L', 'Tempat Lahir', '2005-04-21', '7453910035', 'Islam', 'Nama Ibu 83', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08128779541', 'email83@domain.com', 365332, NULL, '2024-08-02 13:48:28'),
(85, 'Nama Anggota 84', 'L', 'Tempat Lahir', '1981-03-20', '7616205557', 'Islam', 'Nama Ibu 84', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08127355870', 'email84@domain.com', 65666, NULL, '2024-08-02 13:48:28'),
(86, 'Nama Anggota 85', 'L', 'Tempat Lahir', '2004-01-22', '6895474872', 'Islam', 'Nama Ibu 85', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '081272720', 'email85@domain.com', 390811, NULL, '2024-08-02 13:48:28'),
(87, 'Nama Anggota 86', 'P', 'Tempat Lahir', '2000-03-01', '6471414944', 'Islam', 'Nama Ibu 86', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123805057', 'email86@domain.com', 244299, NULL, '2024-08-02 13:48:28'),
(88, 'Nama Anggota 87', 'L', 'Tempat Lahir', '1991-04-06', '950346599', 'Islam', 'Nama Ibu 87', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '081266981', 'email87@domain.com', 775926, NULL, '2024-08-02 13:48:28'),
(89, 'Nama Anggota 88', 'P', 'Tempat Lahir', '1976-02-15', '2709835528', 'Islam', 'Nama Ibu 88', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127286573', 'email88@domain.com', 404813, NULL, '2024-08-02 13:48:28'),
(90, 'Nama Anggota 89', 'P', 'Tempat Lahir', '1975-10-27', '3658802205', 'Islam', 'Nama Ibu 89', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123404600', 'email89@domain.com', 475679, NULL, '2024-08-02 13:48:28'),
(91, 'Nama Anggota 90', 'L', 'Tempat Lahir', '2006-09-12', '7191637230', 'Islam', 'Nama Ibu 90', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126897597', 'email90@domain.com', 95898, NULL, '2024-08-02 13:48:28'),
(92, 'Nama Anggota 91', 'L', 'Tempat Lahir', '1986-06-12', '5861869115', 'Islam', 'Nama Ibu 91', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123057021', 'email91@domain.com', 191575, NULL, '2024-08-02 13:48:28'),
(93, 'Nama Anggota 92', 'L', 'Tempat Lahir', '1993-02-25', '233288742', 'Islam', 'Nama Ibu 92', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '0812763103', 'email92@domain.com', 693773, NULL, '2024-08-02 13:48:28'),
(94, 'Nama Anggota 93', 'L', 'Tempat Lahir', '2018-09-03', '8719986666', 'Islam', 'Nama Ibu 93', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08124085475', 'email93@domain.com', 28011, NULL, '2024-08-02 13:48:28'),
(95, 'Nama Anggota 94', 'P', 'Tempat Lahir', '2000-03-15', '6969619139', 'Islam', 'Nama Ibu 94', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '0812125395', 'email94@domain.com', 642, NULL, '2024-08-02 13:48:28'),
(96, 'Nama Anggota 95', 'P', 'Tempat Lahir', '1983-04-25', '2334502537', 'Islam', 'Nama Ibu 95', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '0812577391', 'email95@domain.com', 312692, NULL, '2024-08-02 13:48:28'),
(97, 'Nama Anggota 96', 'L', 'Tempat Lahir', '2023-12-06', '8950492524', 'Islam', 'Nama Ibu 96', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08121612324', 'email96@domain.com', 325034, NULL, '2024-08-02 13:48:29'),
(98, 'Nama Anggota 97', 'L', 'Tempat Lahir', '1988-01-01', '2369252939', 'Islam', 'Nama Ibu 97', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08121780963', 'email97@domain.com', 205553, NULL, '2024-08-02 13:48:29'),
(99, 'Nama Anggota 98', 'L', 'Tempat Lahir', '1982-01-30', '7732070998', 'Islam', 'Nama Ibu 98', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123066296', 'email98@domain.com', 784237, NULL, '2024-08-02 13:48:29'),
(100, 'Nama Anggota 99', 'L', 'Tempat Lahir', '1991-12-03', '2650168400', 'Islam', 'Nama Ibu 99', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '0812269331', 'email99@domain.com', 63781, NULL, '2024-08-02 13:48:29'),
(101, 'Nama Anggota 100', 'L', 'Tempat Lahir', '1974-08-30', '2816630194', 'Islam', 'Nama Ibu 100', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08128109407', 'email100@domain.com', 428839, NULL, '2024-08-02 13:48:29'),
(102, 'Nama Anggota 1', 'L', 'Tempat Lahir', '2003-12-04', '4568283552', 'Islam', 'Nama Ibu 1', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08128471944', 'email1@domain.com', 105364, NULL, '2024-08-02 13:49:27'),
(103, 'Nama Anggota 2', 'P', 'Tempat Lahir', '1994-02-07', '948204948', 'Islam', 'Nama Ibu 2', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08129006833', 'email2@domain.com', 281042, NULL, '2024-08-02 13:49:28'),
(104, 'Nama Anggota 3', 'P', 'Tempat Lahir', '1990-12-23', '2539270299', 'Islam', 'Nama Ibu 3', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127260199', 'email3@domain.com', 141630, NULL, '2024-08-02 13:49:28'),
(105, 'Nama Anggota 4', 'P', 'Tempat Lahir', '2013-04-26', '5375613156', 'Islam', 'Nama Ibu 4', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08124428408', 'email4@domain.com', 180889, NULL, '2024-08-02 13:49:28'),
(106, 'Nama Anggota 5', 'P', 'Tempat Lahir', '2007-10-02', '9569871155', 'Islam', 'Nama Ibu 5', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123764827', 'email5@domain.com', 857531, NULL, '2024-08-02 13:49:28'),
(107, 'Nama Anggota 6', 'L', 'Tempat Lahir', '2013-09-03', '6176188426', 'Islam', 'Nama Ibu 6', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08122561630', 'email6@domain.com', 348172, NULL, '2024-08-02 13:49:28'),
(108, 'Nama Anggota 7', 'P', 'Tempat Lahir', '1983-10-01', '1695854367', 'Islam', 'Nama Ibu 7', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08121661901', 'email7@domain.com', 418602, NULL, '2024-08-02 13:49:28'),
(109, 'Nama Anggota 8', 'P', 'Tempat Lahir', '1988-10-16', '7987133141', 'Islam', 'Nama Ibu 8', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08124972707', 'email8@domain.com', 701978, NULL, '2024-08-02 13:49:29'),
(110, 'Nama Anggota 9', 'L', 'Tempat Lahir', '1975-05-26', '8680844845', 'Islam', 'Nama Ibu 9', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08124933427', 'email9@domain.com', 474058, NULL, '2024-08-02 13:49:29'),
(111, 'Nama Anggota 10', 'P', 'Tempat Lahir', '2023-02-18', '4749250770', 'Islam', 'Nama Ibu 10', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08121944309', 'email10@domain.com', 938543, NULL, '2024-08-02 13:49:29'),
(112, 'Nama Anggota 11', 'L', 'Tempat Lahir', '1988-01-15', '3292324816', 'Islam', 'Nama Ibu 11', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08129979132', 'email11@domain.com', 177840, NULL, '2024-08-02 13:49:29'),
(113, 'Nama Anggota 12', 'P', 'Tempat Lahir', '1977-06-06', '325389644', 'Islam', 'Nama Ibu 12', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08123298998', 'email12@domain.com', 245193, NULL, '2024-08-02 13:49:29'),
(114, 'Nama Anggota 13', 'L', 'Tempat Lahir', '2002-04-25', '5199904381', 'Islam', 'Nama Ibu 13', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08126348428', 'email13@domain.com', 237173, NULL, '2024-08-02 13:49:29'),
(115, 'Nama Anggota 14', 'L', 'Tempat Lahir', '1989-11-08', '6318701539', 'Islam', 'Nama Ibu 14', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08124734754', 'email14@domain.com', 145925, NULL, '2024-08-02 13:49:29'),
(116, 'Nama Anggota 15', 'L', 'Tempat Lahir', '2019-03-07', '6135653682', 'Islam', 'Nama Ibu 15', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08121014183', 'email15@domain.com', 71382, NULL, '2024-08-02 13:49:29'),
(117, 'Nama Anggota 16', 'L', 'Tempat Lahir', '2022-02-18', '877193800', 'Islam', 'Nama Ibu 16', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '0812902260', 'email16@domain.com', 872866, NULL, '2024-08-02 13:49:30'),
(118, 'Nama Anggota 17', 'L', 'Tempat Lahir', '1982-02-18', '9673639870', 'Islam', 'Nama Ibu 17', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08124975435', 'email17@domain.com', 22514, NULL, '2024-08-02 13:49:30'),
(119, 'Nama Anggota 18', 'P', 'Tempat Lahir', '2022-12-25', '3009581177', 'Islam', 'Nama Ibu 18', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08124687728', 'email18@domain.com', 927615, NULL, '2024-08-02 13:49:30'),
(120, 'Nama Anggota 19', 'L', 'Tempat Lahir', '2005-10-20', '1845091471', 'Islam', 'Nama Ibu 19', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127151028', 'email19@domain.com', 316046, NULL, '2024-08-02 13:49:30'),
(121, 'Nama Anggota 20', 'L', 'Tempat Lahir', '2013-04-09', '8276308130', 'Islam', 'Nama Ibu 20', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08129540481', 'email20@domain.com', 738606, NULL, '2024-08-02 13:49:30'),
(122, 'Nama Anggota 21', 'P', 'Tempat Lahir', '1977-09-09', '2004283118', 'Islam', 'Nama Ibu 21', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08123301512', 'email21@domain.com', 91894, NULL, '2024-08-02 13:49:30'),
(123, 'Nama Anggota 22', 'L', 'Tempat Lahir', '2021-02-13', '9399943490', 'Islam', 'Nama Ibu 22', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08126758207', 'email22@domain.com', 223906, NULL, '2024-08-02 13:49:30'),
(124, 'Nama Anggota 23', 'L', 'Tempat Lahir', '1985-03-08', '6669915799', 'Islam', 'Nama Ibu 23', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '0812366371', 'email23@domain.com', 241666, NULL, '2024-08-02 13:49:30'),
(125, 'Nama Anggota 24', 'L', 'Tempat Lahir', '1986-04-05', '5402404065', 'Islam', 'Nama Ibu 24', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126942455', 'email24@domain.com', 334856, NULL, '2024-08-02 13:49:30'),
(126, 'Nama Anggota 25', 'P', 'Tempat Lahir', '1976-12-17', '9911546753', 'Islam', 'Nama Ibu 25', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08125080294', 'email25@domain.com', 251251, NULL, '2024-08-02 13:49:31'),
(127, 'Nama Anggota 26', 'P', 'Tempat Lahir', '1979-04-07', '3389356297', 'Islam', 'Nama Ibu 26', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08121045405', 'email26@domain.com', 529508, NULL, '2024-08-02 13:49:31'),
(128, 'Nama Anggota 27', 'L', 'Tempat Lahir', '2020-07-15', '4036313829', 'Islam', 'Nama Ibu 27', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08129777876', 'email27@domain.com', 907589, NULL, '2024-08-02 13:49:31'),
(129, 'Nama Anggota 28', 'P', 'Tempat Lahir', '2009-08-04', '6870363957', 'Islam', 'Nama Ibu 28', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08124526905', 'email28@domain.com', 889479, NULL, '2024-08-02 13:49:31'),
(130, 'Nama Anggota 29', 'L', 'Tempat Lahir', '1985-09-15', '6229283899', 'Islam', 'Nama Ibu 29', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08128183395', 'email29@domain.com', 996508, NULL, '2024-08-02 13:49:31'),
(131, 'Nama Anggota 30', 'P', 'Tempat Lahir', '1992-03-16', '6579342630', 'Islam', 'Nama Ibu 30', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123859533', 'email30@domain.com', 742760, NULL, '2024-08-02 13:49:31'),
(132, 'Nama Anggota 31', 'P', 'Tempat Lahir', '1997-01-13', '893456228', 'Islam', 'Nama Ibu 31', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123833320', 'email31@domain.com', 637324, NULL, '2024-08-02 13:49:31'),
(133, 'Nama Anggota 32', 'L', 'Tempat Lahir', '2011-01-15', '2459059788', 'Islam', 'Nama Ibu 32', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08124647204', 'email32@domain.com', 295862, NULL, '2024-08-02 13:49:31'),
(134, 'Nama Anggota 33', 'L', 'Tempat Lahir', '1997-09-12', '4354059793', 'Islam', 'Nama Ibu 33', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08127019062', 'email33@domain.com', 976966, NULL, '2024-08-02 13:49:31'),
(135, 'Nama Anggota 34', 'P', 'Tempat Lahir', '1976-05-21', '4859740096', 'Islam', 'Nama Ibu 34', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08124998355', 'email34@domain.com', 834685, NULL, '2024-08-02 13:49:31'),
(136, 'Nama Anggota 35', 'P', 'Tempat Lahir', '1981-05-04', '3059778048', 'Islam', 'Nama Ibu 35', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08124637147', 'email35@domain.com', 493422, NULL, '2024-08-02 13:49:31'),
(137, 'Nama Anggota 36', 'L', 'Tempat Lahir', '1979-08-22', '2699692242', 'Islam', 'Nama Ibu 36', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08122751305', 'email36@domain.com', 38556, NULL, '2024-08-02 13:49:31'),
(138, 'Nama Anggota 37', 'L', 'Tempat Lahir', '1988-07-19', '5042230975', 'Islam', 'Nama Ibu 37', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08122968317', 'email37@domain.com', 662954, NULL, '2024-08-02 13:49:31'),
(139, 'Nama Anggota 38', 'L', 'Tempat Lahir', '2017-12-19', '3897580703', 'Islam', 'Nama Ibu 38', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08126436551', 'email38@domain.com', 375627, NULL, '2024-08-02 13:49:31'),
(140, 'Nama Anggota 39', 'P', 'Tempat Lahir', '1994-02-28', '2033338231', 'Islam', 'Nama Ibu 39', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08123388128', 'email39@domain.com', 124775, NULL, '2024-08-02 13:49:31'),
(141, 'Nama Anggota 40', 'P', 'Tempat Lahir', '1991-06-20', '4920288310', 'Islam', 'Nama Ibu 40', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08123220599', 'email40@domain.com', 630191, NULL, '2024-08-02 13:49:31'),
(142, 'Nama Anggota 41', 'L', 'Tempat Lahir', '2022-12-04', '6122279461', 'Islam', 'Nama Ibu 41', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08129073394', 'email41@domain.com', 647487, NULL, '2024-08-02 13:49:31'),
(143, 'Nama Anggota 42', 'P', 'Tempat Lahir', '1992-11-16', '6269590823', 'Islam', 'Nama Ibu 42', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08122734270', 'email42@domain.com', 674552, NULL, '2024-08-02 13:49:31'),
(144, 'Nama Anggota 43', 'P', 'Tempat Lahir', '1987-09-04', '363102453', 'Islam', 'Nama Ibu 43', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123068342', 'email43@domain.com', 458464, NULL, '2024-08-02 13:49:31'),
(145, 'Nama Anggota 44', 'L', 'Tempat Lahir', '2000-06-02', '3030406099', 'Islam', 'Nama Ibu 44', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08124114065', 'email44@domain.com', 864715, NULL, '2024-08-02 13:49:31'),
(146, 'Nama Anggota 45', 'L', 'Tempat Lahir', '1981-12-26', '9951720740', 'Islam', 'Nama Ibu 45', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08122664399', 'email45@domain.com', 20097, NULL, '2024-08-02 13:49:31'),
(147, 'Nama Anggota 46', 'L', 'Tempat Lahir', '2002-04-29', '3242438634', 'Islam', 'Nama Ibu 46', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123968736', 'email46@domain.com', 634018, NULL, '2024-08-02 13:49:31'),
(148, 'Nama Anggota 47', 'P', 'Tempat Lahir', '1974-11-09', '381365195', 'Islam', 'Nama Ibu 47', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08129093313', 'email47@domain.com', 932412, NULL, '2024-08-02 13:49:31'),
(149, 'Nama Anggota 48', 'P', 'Tempat Lahir', '1980-12-18', '5632790229', 'Islam', 'Nama Ibu 48', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08122957046', 'email48@domain.com', 887198, NULL, '2024-08-02 13:49:31'),
(150, 'Nama Anggota 49', 'P', 'Tempat Lahir', '2020-06-14', '7673297419', 'Islam', 'Nama Ibu 49', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08122420327', 'email49@domain.com', 914081, NULL, '2024-08-02 13:49:32'),
(151, 'Nama Anggota 50', 'P', 'Tempat Lahir', '2000-08-21', '8635471173', 'Islam', 'Nama Ibu 50', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08125920129', 'email50@domain.com', 749326, NULL, '2024-08-02 13:49:32'),
(152, 'Nama Anggota 51', 'P', 'Tempat Lahir', '1994-05-12', '1131448132', 'Islam', 'Nama Ibu 51', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08128197758', 'email51@domain.com', 855627, NULL, '2024-08-02 13:49:32'),
(153, 'Nama Anggota 52', 'P', 'Tempat Lahir', '1998-04-01', '1793859099', 'Islam', 'Nama Ibu 52', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08122489372', 'email52@domain.com', 127528, NULL, '2024-08-02 13:49:32'),
(154, 'Nama Anggota 53', 'P', 'Tempat Lahir', '2021-01-04', '6853373867', 'Islam', 'Nama Ibu 53', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '081239393', 'email53@domain.com', 383725, NULL, '2024-08-02 13:49:32'),
(155, 'Nama Anggota 54', 'P', 'Tempat Lahir', '2005-06-16', '1939525037', 'Islam', 'Nama Ibu 54', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08122066320', 'email54@domain.com', 566340, NULL, '2024-08-02 13:49:32'),
(156, 'Nama Anggota 55', 'L', 'Tempat Lahir', '2006-08-07', '1646403597', 'Islam', 'Nama Ibu 55', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08128800352', 'email55@domain.com', 734457, NULL, '2024-08-02 13:49:32'),
(157, 'Nama Anggota 56', 'L', 'Tempat Lahir', '1976-09-29', '6911138060', 'Islam', 'Nama Ibu 56', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08127691890', 'email56@domain.com', 469664, NULL, '2024-08-02 13:49:32'),
(158, 'Nama Anggota 57', 'L', 'Tempat Lahir', '1984-11-16', '8516326750', 'Islam', 'Nama Ibu 57', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08128057027', 'email57@domain.com', 679475, NULL, '2024-08-02 13:49:32'),
(159, 'Nama Anggota 58', 'P', 'Tempat Lahir', '1981-06-21', '3738175065', 'Islam', 'Nama Ibu 58', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08125595556', 'email58@domain.com', 957486, NULL, '2024-08-02 13:49:32'),
(160, 'Nama Anggota 59', 'L', 'Tempat Lahir', '1991-01-16', '305927396', 'Islam', 'Nama Ibu 59', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08126023497', 'email59@domain.com', 595272, NULL, '2024-08-02 13:49:32'),
(161, 'Nama Anggota 60', 'L', 'Tempat Lahir', '2021-07-21', '7957729425', 'Islam', 'Nama Ibu 60', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08121597943', 'email60@domain.com', 30508, NULL, '2024-08-02 13:49:32'),
(162, 'Nama Anggota 61', 'P', 'Tempat Lahir', '2010-11-19', '3518659838', 'Islam', 'Nama Ibu 61', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08127466971', 'email61@domain.com', 756820, NULL, '2024-08-02 13:49:32'),
(163, 'Nama Anggota 62', 'P', 'Tempat Lahir', '2002-02-14', '6159831980', 'Islam', 'Nama Ibu 62', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08127997764', 'email62@domain.com', 465409, NULL, '2024-08-02 13:49:32'),
(164, 'Nama Anggota 63', 'P', 'Tempat Lahir', '2012-06-23', '4286768226', 'Islam', 'Nama Ibu 63', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08122542691', 'email63@domain.com', 87087, NULL, '2024-08-02 13:49:32'),
(165, 'Nama Anggota 64', 'P', 'Tempat Lahir', '2019-07-01', '4915061858', 'Islam', 'Nama Ibu 64', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08122849675', 'email64@domain.com', 969146, NULL, '2024-08-02 13:49:32'),
(166, 'Nama Anggota 65', 'P', 'Tempat Lahir', '2022-04-03', '2610254737', 'Islam', 'Nama Ibu 65', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '0812420317', 'email65@domain.com', 715093, NULL, '2024-08-02 13:49:32'),
(167, 'Nama Anggota 66', 'L', 'Tempat Lahir', '2019-07-07', '1598193404', 'Islam', 'Nama Ibu 66', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08124134714', 'email66@domain.com', 633310, NULL, '2024-08-02 13:49:32'),
(168, 'Nama Anggota 67', 'P', 'Tempat Lahir', '1988-01-28', '8753591802', 'Islam', 'Nama Ibu 67', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08122965920', 'email67@domain.com', 929358, NULL, '2024-08-02 13:49:32'),
(169, 'Nama Anggota 68', 'P', 'Tempat Lahir', '1974-10-09', '7139937139', 'Islam', 'Nama Ibu 68', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08128758943', 'email68@domain.com', 299024, NULL, '2024-08-02 13:49:32'),
(170, 'Nama Anggota 69', 'P', 'Tempat Lahir', '2002-08-06', '5982871899', 'Islam', 'Nama Ibu 69', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08122650699', 'email69@domain.com', 957393, NULL, '2024-08-02 13:49:32'),
(171, 'Nama Anggota 70', 'P', 'Tempat Lahir', '2020-04-05', '4577361433', 'Islam', 'Nama Ibu 70', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08127711823', 'email70@domain.com', 769277, NULL, '2024-08-02 13:49:32'),
(172, 'Nama Anggota 71', 'P', 'Tempat Lahir', '2006-10-13', '1833150556', 'Islam', 'Nama Ibu 71', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08124113010', 'email71@domain.com', 372354, NULL, '2024-08-02 13:49:32'),
(173, 'Nama Anggota 72', 'P', 'Tempat Lahir', '2023-06-23', '2277642462', 'Islam', 'Nama Ibu 72', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08126767175', 'email72@domain.com', 167581, NULL, '2024-08-02 13:49:32'),
(174, 'Nama Anggota 73', 'P', 'Tempat Lahir', '1997-10-21', '2569016779', 'Islam', 'Nama Ibu 73', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123031609', 'email73@domain.com', 433513, NULL, '2024-08-02 13:49:32'),
(175, 'Nama Anggota 74', 'L', 'Tempat Lahir', '1975-02-16', '1751718522', 'Islam', 'Nama Ibu 74', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123088824', 'email74@domain.com', 527917, NULL, '2024-08-02 13:49:32'),
(176, 'Nama Anggota 75', 'P', 'Tempat Lahir', '1975-07-29', '7659554255', 'Islam', 'Nama Ibu 75', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '0812226538', 'email75@domain.com', 703241, NULL, '2024-08-02 13:49:32'),
(177, 'Nama Anggota 76', 'L', 'Tempat Lahir', '2018-01-06', '3128264987', 'Islam', 'Nama Ibu 76', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08129094722', 'email76@domain.com', 38590, NULL, '2024-08-02 13:49:32'),
(178, 'Nama Anggota 77', 'L', 'Tempat Lahir', '2014-04-02', '6409011125', 'Islam', 'Nama Ibu 77', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08121618385', 'email77@domain.com', 118726, NULL, '2024-08-02 13:49:32'),
(179, 'Nama Anggota 78', 'L', 'Tempat Lahir', '2015-05-17', '5976489499', 'Islam', 'Nama Ibu 78', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126063087', 'email78@domain.com', 884673, NULL, '2024-08-02 13:49:32'),
(180, 'Nama Anggota 79', 'P', 'Tempat Lahir', '2006-03-11', '275865840', 'Islam', 'Nama Ibu 79', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '0812841828', 'email79@domain.com', 320748, NULL, '2024-08-02 13:49:32'),
(181, 'Nama Anggota 80', 'L', 'Tempat Lahir', '1984-12-05', '9150789882', 'Islam', 'Nama Ibu 80', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08122257366', 'email80@domain.com', 546099, NULL, '2024-08-02 13:49:33'),
(182, 'Nama Anggota 81', 'L', 'Tempat Lahir', '1993-03-15', '9808121025', 'Islam', 'Nama Ibu 81', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08121558524', 'email81@domain.com', 720288, NULL, '2024-08-02 13:49:33'),
(183, 'Nama Anggota 82', 'L', 'Tempat Lahir', '1999-03-06', '1411928964', 'Islam', 'Nama Ibu 82', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08124776768', 'email82@domain.com', 847630, NULL, '2024-08-02 13:49:33'),
(184, 'Nama Anggota 83', 'P', 'Tempat Lahir', '2000-06-20', '9982705507', 'Islam', 'Nama Ibu 83', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08127149822', 'email83@domain.com', 648082, NULL, '2024-08-02 13:49:33'),
(185, 'Nama Anggota 84', 'L', 'Tempat Lahir', '1997-12-14', '3790158539', 'Islam', 'Nama Ibu 84', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08128230401', 'email84@domain.com', 88881, NULL, '2024-08-02 13:49:33'),
(186, 'Nama Anggota 85', 'P', 'Tempat Lahir', '1994-02-13', '1230627755', 'Islam', 'Nama Ibu 85', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08125442896', 'email85@domain.com', 385751, NULL, '2024-08-02 13:49:33'),
(187, 'Nama Anggota 86', 'L', 'Tempat Lahir', '2008-06-28', '7232686669', 'Islam', 'Nama Ibu 86', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08124462069', 'email86@domain.com', 993700, NULL, '2024-08-02 13:49:33'),
(188, 'Nama Anggota 87', 'P', 'Tempat Lahir', '2016-03-06', '9518636995', 'Islam', 'Nama Ibu 87', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123191920', 'email87@domain.com', 346496, NULL, '2024-08-02 13:49:33'),
(189, 'Nama Anggota 88', 'P', 'Tempat Lahir', '1982-11-12', '8505134087', 'Islam', 'Nama Ibu 88', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126856626', 'email88@domain.com', 871549, NULL, '2024-08-02 13:49:33'),
(190, 'Nama Anggota 89', 'L', 'Tempat Lahir', '1980-02-28', '5434870166', 'Islam', 'Nama Ibu 89', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08126194084', 'email89@domain.com', 947120, NULL, '2024-08-02 13:49:33'),
(191, 'Nama Anggota 90', 'P', 'Tempat Lahir', '1997-05-01', '955036031', 'Islam', 'Nama Ibu 90', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08125856586', 'email90@domain.com', 724195, NULL, '2024-08-02 13:49:33'),
(192, 'Nama Anggota 91', 'P', 'Tempat Lahir', '2017-03-22', '1451364645', 'Islam', 'Nama Ibu 91', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123434639', 'email91@domain.com', 544428, NULL, '2024-08-02 13:49:33'),
(193, 'Nama Anggota 92', 'P', 'Tempat Lahir', '1983-05-06', '520758899', 'Islam', 'Nama Ibu 92', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '0812414614', 'email92@domain.com', 807785, NULL, '2024-08-02 13:49:33'),
(194, 'Nama Anggota 93', 'P', 'Tempat Lahir', '2017-02-15', '31469408', 'Islam', 'Nama Ibu 93', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08127210292', 'email93@domain.com', 280484, NULL, '2024-08-02 13:49:33'),
(195, 'Nama Anggota 94', 'L', 'Tempat Lahir', '2006-11-03', '581343044', 'Islam', 'Nama Ibu 94', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08129505218', 'email94@domain.com', 77654, NULL, '2024-08-02 13:49:33'),
(196, 'Nama Anggota 95', 'P', 'Tempat Lahir', '2002-01-28', '6427214915', 'Islam', 'Nama Ibu 95', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123210541', 'email95@domain.com', 461211, NULL, '2024-08-02 13:49:33'),
(197, 'Nama Anggota 96', 'L', 'Tempat Lahir', '2008-01-21', '6255584495', 'Islam', 'Nama Ibu 96', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08127995368', 'email96@domain.com', 591956, NULL, '2024-08-02 13:49:33'),
(198, 'Nama Anggota 97', 'P', 'Tempat Lahir', '2023-02-02', '4664651830', 'Islam', 'Nama Ibu 97', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08128122774', 'email97@domain.com', 334383, NULL, '2024-08-02 13:49:33'),
(199, 'Nama Anggota 98', 'L', 'Tempat Lahir', '2015-12-25', '1561144386', 'Islam', 'Nama Ibu 98', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08127527886', 'email98@domain.com', 381529, NULL, '2024-08-02 13:49:33'),
(200, 'Nama Anggota 99', 'P', 'Tempat Lahir', '2019-07-02', '5612622448', 'Islam', 'Nama Ibu 99', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08125370733', 'email99@domain.com', 886324, NULL, '2024-08-02 13:49:33'),
(201, 'Nama Anggota 100', 'P', 'Tempat Lahir', '2002-06-14', '7539412358', 'Islam', 'Nama Ibu 100', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '0812989067', 'email100@domain.com', 340880, NULL, '2024-08-02 13:49:33'),
(202, 'Nama Anggota 1', 'P', 'Tempat Lahir', '1981-09-30', '4803774752', 'Islam', 'Nama Ibu 1', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08121224090', 'email1@domain.com', 464786, NULL, '2024-08-02 13:51:19'),
(203, 'Nama Anggota 2', 'P', 'Tempat Lahir', '2005-02-21', '757384338', 'Islam', 'Nama Ibu 2', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08128286738', 'email2@domain.com', 509835, NULL, '2024-08-02 13:51:19'),
(204, 'Nama Anggota 3', 'L', 'Tempat Lahir', '1985-04-20', '7419254768', 'Islam', 'Nama Ibu 3', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123578654', 'email3@domain.com', 23905, NULL, '2024-08-02 13:51:19'),
(205, 'Nama Anggota 4', 'L', 'Tempat Lahir', '2016-09-11', '6518849103', 'Islam', 'Nama Ibu 4', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08126094329', 'email4@domain.com', 531109, NULL, '2024-08-02 13:51:19'),
(206, 'Nama Anggota 5', 'P', 'Tempat Lahir', '1997-06-17', '2328152910', 'Islam', 'Nama Ibu 5', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08124915878', 'email5@domain.com', 602120, NULL, '2024-08-02 13:51:19'),
(207, 'Nama Anggota 6', 'P', 'Tempat Lahir', '1980-12-22', '7566083164', 'Islam', 'Nama Ibu 6', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08125530272', 'email6@domain.com', 271424, NULL, '2024-08-02 13:51:19'),
(208, 'Nama Anggota 7', 'P', 'Tempat Lahir', '1990-10-25', '2855762115', 'Islam', 'Nama Ibu 7', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08125176238', 'email7@domain.com', 157441, NULL, '2024-08-02 13:51:19'),
(209, 'Nama Anggota 8', 'L', 'Tempat Lahir', '1989-08-23', '7937390867', 'Islam', 'Nama Ibu 8', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123249864', 'email8@domain.com', 880279, NULL, '2024-08-02 13:51:19'),
(210, 'Nama Anggota 9', 'L', 'Tempat Lahir', '2000-01-14', '1774853125', 'Islam', 'Nama Ibu 9', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08125535698', 'email9@domain.com', 474039, NULL, '2024-08-02 13:51:19'),
(211, 'Nama Anggota 10', 'P', 'Tempat Lahir', '2018-04-29', '4981706668', 'Islam', 'Nama Ibu 10', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '0812798379', 'email10@domain.com', 54579, NULL, '2024-08-02 13:51:19'),
(212, 'Nama Anggota 11', 'L', 'Tempat Lahir', '2024-06-05', '9157831845', 'Islam', 'Nama Ibu 11', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127889998', 'email11@domain.com', 646765, NULL, '2024-08-02 13:51:19'),
(213, 'Nama Anggota 12', 'P', 'Tempat Lahir', '2004-11-28', '3687413291', 'Islam', 'Nama Ibu 12', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '0812366367', 'email12@domain.com', 569294, NULL, '2024-08-02 13:51:19'),
(214, 'Nama Anggota 13', 'P', 'Tempat Lahir', '1975-11-16', '6649404574', 'Islam', 'Nama Ibu 13', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08128242903', 'email13@domain.com', 107008, NULL, '2024-08-02 13:51:19'),
(215, 'Nama Anggota 14', 'L', 'Tempat Lahir', '1975-02-17', '7626765042', 'Islam', 'Nama Ibu 14', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08128305286', 'email14@domain.com', 777994, NULL, '2024-08-02 13:51:19'),
(216, 'Nama Anggota 15', 'L', 'Tempat Lahir', '1991-09-18', '945430156', 'Islam', 'Nama Ibu 15', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08125576037', 'email15@domain.com', 155440, NULL, '2024-08-02 13:51:19'),
(217, 'Nama Anggota 16', 'L', 'Tempat Lahir', '2021-10-22', '9650119375', 'Islam', 'Nama Ibu 16', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '081240605', 'email16@domain.com', 833201, NULL, '2024-08-02 13:51:19'),
(218, 'Nama Anggota 17', 'L', 'Tempat Lahir', '2011-02-14', '8861504037', 'Islam', 'Nama Ibu 17', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123955918', 'email17@domain.com', 620689, NULL, '2024-08-02 13:51:19'),
(219, 'Nama Anggota 18', 'P', 'Tempat Lahir', '1988-07-19', '8564396368', 'Islam', 'Nama Ibu 18', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '0812223061', 'email18@domain.com', 756555, NULL, '2024-08-02 13:51:19'),
(220, 'Nama Anggota 19', 'P', 'Tempat Lahir', '2009-02-12', '4006077781', 'Islam', 'Nama Ibu 19', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08121687970', 'email19@domain.com', 621613, NULL, '2024-08-02 13:51:19'),
(221, 'Nama Anggota 20', 'P', 'Tempat Lahir', '2017-06-01', '9126373388', 'Islam', 'Nama Ibu 20', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08129250415', 'email20@domain.com', 227435, NULL, '2024-08-02 13:51:19'),
(222, 'Nama Anggota 21', 'L', 'Tempat Lahir', '2018-03-12', '5536549515', 'Islam', 'Nama Ibu 21', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08121516319', 'email21@domain.com', 975288, NULL, '2024-08-02 13:51:19'),
(223, 'Nama Anggota 22', 'L', 'Tempat Lahir', '2015-07-02', '6447307631', 'Islam', 'Nama Ibu 22', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08122456640', 'email22@domain.com', 860470, NULL, '2024-08-02 13:51:19'),
(224, 'Nama Anggota 23', 'P', 'Tempat Lahir', '2012-04-29', '5308814798', 'Islam', 'Nama Ibu 23', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08121935697', 'email23@domain.com', 254406, NULL, '2024-08-02 13:51:19'),
(225, 'Nama Anggota 24', 'P', 'Tempat Lahir', '1989-12-10', '3930320044', 'Islam', 'Nama Ibu 24', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08125735816', 'email24@domain.com', 130835, NULL, '2024-08-02 13:51:19'),
(226, 'Nama Anggota 25', 'P', 'Tempat Lahir', '2010-11-12', '5730258697', 'Islam', 'Nama Ibu 25', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08124865791', 'email25@domain.com', 309501, NULL, '2024-08-02 13:51:19'),
(227, 'Nama Anggota 26', 'L', 'Tempat Lahir', '1999-02-02', '2884407856', 'Islam', 'Nama Ibu 26', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08125222867', 'email26@domain.com', 455279, NULL, '2024-08-02 13:51:20'),
(228, 'Nama Anggota 27', 'P', 'Tempat Lahir', '2015-07-03', '7806647222', 'Islam', 'Nama Ibu 27', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08121606221', 'email27@domain.com', 462779, NULL, '2024-08-02 13:51:20'),
(229, 'Nama Anggota 28', 'P', 'Tempat Lahir', '1986-01-09', '3630213629', 'Islam', 'Nama Ibu 28', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08125466561', 'email28@domain.com', 505943, NULL, '2024-08-02 13:51:20'),
(230, 'Nama Anggota 29', 'P', 'Tempat Lahir', '1978-01-27', '9853387027', 'Islam', 'Nama Ibu 29', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08127136885', 'email29@domain.com', 166619, NULL, '2024-08-02 13:51:20');
INSERT INTO `tb_anggota` (`anggota_id`, `anggota_nama`, `anggota_jk`, `anggota_tempat_lahir`, `anggota_tanggal_lahir`, `anggota_nik`, `anggota_agama`, `anggota_nama_ibu`, `anggota_alamat`, `anggota_pekerjaan`, `anggota_pendidikan`, `anggota_status_kawin`, `anggota_nomor_hp`, `anggota_email`, `anggota_pendapatan`, `anggota_dokumen`, `anggota_date_created`) VALUES
(231, 'Nama Anggota 30', 'P', 'Tempat Lahir', '1976-08-09', '7254527823', 'Islam', 'Nama Ibu 30', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '0812215407', 'email30@domain.com', 495247, NULL, '2024-08-02 13:51:20'),
(232, 'Nama Anggota 31', 'L', 'Tempat Lahir', '1995-12-28', '6268171943', 'Islam', 'Nama Ibu 31', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127736961', 'email31@domain.com', 253503, NULL, '2024-08-02 13:51:20'),
(233, 'Nama Anggota 32', 'P', 'Tempat Lahir', '1976-01-15', '188618852', 'Islam', 'Nama Ibu 32', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08128405265', 'email32@domain.com', 664365, NULL, '2024-08-02 13:51:20'),
(234, 'Nama Anggota 33', 'P', 'Tempat Lahir', '2024-03-07', '6399516906', 'Islam', 'Nama Ibu 33', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08129568608', 'email33@domain.com', 258274, NULL, '2024-08-02 13:51:20'),
(235, 'Nama Anggota 34', 'L', 'Tempat Lahir', '2008-02-22', '3832874469', 'Islam', 'Nama Ibu 34', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08126895785', 'email34@domain.com', 961873, NULL, '2024-08-02 13:51:20'),
(236, 'Nama Anggota 35', 'P', 'Tempat Lahir', '1983-09-28', '8657530926', 'Islam', 'Nama Ibu 35', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '0812974524', 'email35@domain.com', 618232, NULL, '2024-08-02 13:51:20'),
(237, 'Nama Anggota 36', 'P', 'Tempat Lahir', '2017-08-17', '3001948877', 'Islam', 'Nama Ibu 36', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08125144716', 'email36@domain.com', 323324, NULL, '2024-08-02 13:51:20'),
(238, 'Nama Anggota 37', 'L', 'Tempat Lahir', '2004-10-18', '7606843521', 'Islam', 'Nama Ibu 37', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08122425408', 'email37@domain.com', 837724, NULL, '2024-08-02 13:51:20'),
(239, 'Nama Anggota 38', 'L', 'Tempat Lahir', '1985-01-09', '5760974516', 'Islam', 'Nama Ibu 38', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08129556226', 'email38@domain.com', 370376, NULL, '2024-08-02 13:51:20'),
(240, 'Nama Anggota 39', 'P', 'Tempat Lahir', '1983-12-02', '1146810493', 'Islam', 'Nama Ibu 39', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08123138054', 'email39@domain.com', 174318, NULL, '2024-08-02 13:51:20'),
(241, 'Nama Anggota 40', 'P', 'Tempat Lahir', '2018-03-13', '8490546735', 'Islam', 'Nama Ibu 40', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08128075218', 'email40@domain.com', 384242, NULL, '2024-08-02 13:51:20'),
(242, 'Nama Anggota 41', 'L', 'Tempat Lahir', '2007-07-29', '2065764639', 'Islam', 'Nama Ibu 41', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08124371396', 'email41@domain.com', 151576, NULL, '2024-08-02 13:51:20'),
(243, 'Nama Anggota 42', 'L', 'Tempat Lahir', '1985-09-25', '5485736537', 'Islam', 'Nama Ibu 42', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127933227', 'email42@domain.com', 752462, NULL, '2024-08-02 13:51:20'),
(244, 'Nama Anggota 43', 'L', 'Tempat Lahir', '1991-11-23', '1246496505', 'Islam', 'Nama Ibu 43', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08124956913', 'email43@domain.com', 512012, NULL, '2024-08-02 13:51:20'),
(245, 'Nama Anggota 44', 'L', 'Tempat Lahir', '1983-03-04', '9255338189', 'Islam', 'Nama Ibu 44', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08129282583', 'email44@domain.com', 218376, NULL, '2024-08-02 13:51:20'),
(246, 'Nama Anggota 45', 'L', 'Tempat Lahir', '1980-08-06', '4806728572', 'Islam', 'Nama Ibu 45', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08125576767', 'email45@domain.com', 681869, NULL, '2024-08-02 13:51:20'),
(247, 'Nama Anggota 46', 'P', 'Tempat Lahir', '1992-10-23', '9709064149', 'Islam', 'Nama Ibu 46', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08128490954', 'email46@domain.com', 459333, NULL, '2024-08-02 13:51:20'),
(248, 'Nama Anggota 47', 'P', 'Tempat Lahir', '2006-02-26', '5963368980', 'Islam', 'Nama Ibu 47', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08127668304', 'email47@domain.com', 919267, NULL, '2024-08-02 13:51:20'),
(249, 'Nama Anggota 48', 'L', 'Tempat Lahir', '1988-07-17', '7195577814', 'Islam', 'Nama Ibu 48', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127444149', 'email48@domain.com', 695061, NULL, '2024-08-02 13:51:20'),
(250, 'Nama Anggota 49', 'L', 'Tempat Lahir', '2018-05-03', '8995015052', 'Islam', 'Nama Ibu 49', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08129119434', 'email49@domain.com', 193448, NULL, '2024-08-02 13:51:20'),
(251, 'Nama Anggota 50', 'L', 'Tempat Lahir', '1995-10-09', '1893282879', 'Islam', 'Nama Ibu 50', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08125145341', 'email50@domain.com', 923159, NULL, '2024-08-02 13:51:20'),
(252, 'Nama Anggota 51', 'L', 'Tempat Lahir', '1995-01-13', '7408903406', 'Islam', 'Nama Ibu 51', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123459248', 'email51@domain.com', 448128, NULL, '2024-08-02 13:51:20'),
(253, 'Nama Anggota 52', 'L', 'Tempat Lahir', '1991-02-11', '7411594798', 'Islam', 'Nama Ibu 52', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08121932925', 'email52@domain.com', 197794, NULL, '2024-08-02 13:51:20'),
(254, 'Nama Anggota 53', 'L', 'Tempat Lahir', '2001-12-31', '331935566', 'Islam', 'Nama Ibu 53', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08127287047', 'email53@domain.com', 698437, NULL, '2024-08-02 13:51:20'),
(255, 'Nama Anggota 54', 'L', 'Tempat Lahir', '2002-11-07', '2570465051', 'Islam', 'Nama Ibu 54', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127059111', 'email54@domain.com', 141877, NULL, '2024-08-02 13:51:20'),
(256, 'Nama Anggota 55', 'P', 'Tempat Lahir', '1997-12-22', '8882291492', 'Islam', 'Nama Ibu 55', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08124838027', 'email55@domain.com', 736092, NULL, '2024-08-02 13:51:20'),
(257, 'Nama Anggota 56', 'L', 'Tempat Lahir', '1977-10-08', '9977752426', 'Islam', 'Nama Ibu 56', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08128962565', 'email56@domain.com', 947533, NULL, '2024-08-02 13:51:20'),
(258, 'Nama Anggota 57', 'L', 'Tempat Lahir', '2004-07-04', '8627351716', 'Islam', 'Nama Ibu 57', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08129518952', 'email57@domain.com', 435415, NULL, '2024-08-02 13:51:20'),
(259, 'Nama Anggota 58', 'L', 'Tempat Lahir', '2009-07-24', '5394201460', 'Islam', 'Nama Ibu 58', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123973852', 'email58@domain.com', 917602, NULL, '2024-08-02 13:51:20'),
(260, 'Nama Anggota 59', 'L', 'Tempat Lahir', '2013-04-09', '9448245763', 'Islam', 'Nama Ibu 59', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08123889500', 'email59@domain.com', 810696, NULL, '2024-08-02 13:51:20'),
(261, 'Nama Anggota 60', 'P', 'Tempat Lahir', '2024-07-14', '3454327940', 'Islam', 'Nama Ibu 60', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08129784995', 'email60@domain.com', 655013, NULL, '2024-08-02 13:51:21'),
(262, 'Nama Anggota 61', 'L', 'Tempat Lahir', '1987-12-22', '6452862943', 'Islam', 'Nama Ibu 61', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08122043327', 'email61@domain.com', 937548, NULL, '2024-08-02 13:51:21'),
(263, 'Nama Anggota 62', 'L', 'Tempat Lahir', '1996-07-21', '5811799984', 'Islam', 'Nama Ibu 62', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08123697059', 'email62@domain.com', 180582, NULL, '2024-08-02 13:51:21'),
(264, 'Nama Anggota 63', 'P', 'Tempat Lahir', '2003-03-30', '7547340595', 'Islam', 'Nama Ibu 63', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08125030014', 'email63@domain.com', 927605, NULL, '2024-08-02 13:51:21'),
(265, 'Nama Anggota 64', 'L', 'Tempat Lahir', '1981-07-03', '9244118388', 'Islam', 'Nama Ibu 64', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08124026242', 'email64@domain.com', 907605, NULL, '2024-08-02 13:51:21'),
(266, 'Nama Anggota 65', 'L', 'Tempat Lahir', '1978-03-22', '6492996631', 'Islam', 'Nama Ibu 65', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08124386336', 'email65@domain.com', 97232, NULL, '2024-08-02 13:51:21'),
(267, 'Nama Anggota 66', 'L', 'Tempat Lahir', '1996-08-17', '2872420514', 'Islam', 'Nama Ibu 66', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08129947041', 'email66@domain.com', 911235, NULL, '2024-08-02 13:51:21'),
(268, 'Nama Anggota 67', 'P', 'Tempat Lahir', '2018-04-06', '9169226288', 'Islam', 'Nama Ibu 67', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08122729335', 'email67@domain.com', 750446, NULL, '2024-08-02 13:51:21'),
(269, 'Nama Anggota 68', 'P', 'Tempat Lahir', '2003-10-24', '2788477263', 'Islam', 'Nama Ibu 68', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08128971994', 'email68@domain.com', 45751, NULL, '2024-08-02 13:51:21'),
(270, 'Nama Anggota 69', 'P', 'Tempat Lahir', '1997-03-07', '1312474404', 'Islam', 'Nama Ibu 69', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08126592606', 'email69@domain.com', 264501, NULL, '2024-08-02 13:51:21'),
(271, 'Nama Anggota 70', 'L', 'Tempat Lahir', '1978-02-11', '6164373677', 'Islam', 'Nama Ibu 70', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '0812379135', 'email70@domain.com', 669212, NULL, '2024-08-02 13:51:21'),
(272, 'Nama Anggota 71', 'L', 'Tempat Lahir', '2016-11-22', '729370965', 'Islam', 'Nama Ibu 71', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127662191', 'email71@domain.com', 946432, NULL, '2024-08-02 13:51:21'),
(273, 'Nama Anggota 72', 'L', 'Tempat Lahir', '2008-03-09', '3406387943', 'Islam', 'Nama Ibu 72', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08127753640', 'email72@domain.com', 784549, NULL, '2024-08-02 13:51:21'),
(274, 'Nama Anggota 73', 'P', 'Tempat Lahir', '1993-02-16', '3581429658', 'Islam', 'Nama Ibu 73', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08124686113', 'email73@domain.com', 38555, NULL, '2024-08-02 13:51:21'),
(275, 'Nama Anggota 74', 'P', 'Tempat Lahir', '1983-08-31', '7344091094', 'Islam', 'Nama Ibu 74', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08128712893', 'email74@domain.com', 711736, NULL, '2024-08-02 13:51:21'),
(276, 'Nama Anggota 75', 'P', 'Tempat Lahir', '1995-03-02', '1098878617', 'Islam', 'Nama Ibu 75', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08121171098', 'email75@domain.com', 863126, NULL, '2024-08-02 13:51:21'),
(277, 'Nama Anggota 76', 'P', 'Tempat Lahir', '2012-12-27', '2677589629', 'Islam', 'Nama Ibu 76', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08121163063', 'email76@domain.com', 355437, NULL, '2024-08-02 13:51:21'),
(278, 'Nama Anggota 77', 'L', 'Tempat Lahir', '2020-11-02', '902969949', 'Islam', 'Nama Ibu 77', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08128612491', 'email77@domain.com', 626961, NULL, '2024-08-02 13:51:21'),
(279, 'Nama Anggota 78', 'P', 'Tempat Lahir', '1980-11-23', '7189269510', 'Islam', 'Nama Ibu 78', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08128307695', 'email78@domain.com', 395280, NULL, '2024-08-02 13:51:21'),
(280, 'Nama Anggota 79', 'L', 'Tempat Lahir', '2012-11-11', '7208697420', 'Islam', 'Nama Ibu 79', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08129970047', 'email79@domain.com', 965998, NULL, '2024-08-02 13:51:21'),
(281, 'Nama Anggota 80', 'P', 'Tempat Lahir', '2009-10-02', '9675527438', 'Islam', 'Nama Ibu 80', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08121132152', 'email80@domain.com', 599297, NULL, '2024-08-02 13:51:21'),
(282, 'Nama Anggota 81', 'P', 'Tempat Lahir', '2000-04-15', '4610553648', 'Islam', 'Nama Ibu 81', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08129715655', 'email81@domain.com', 747629, NULL, '2024-08-02 13:51:21'),
(283, 'Nama Anggota 82', 'P', 'Tempat Lahir', '1980-11-24', '9015116448', 'Islam', 'Nama Ibu 82', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08125216915', 'email82@domain.com', 803678, NULL, '2024-08-02 13:51:21'),
(284, 'Nama Anggota 83', 'L', 'Tempat Lahir', '1981-11-03', '9177789156', 'Islam', 'Nama Ibu 83', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08123579561', 'email83@domain.com', 723005, NULL, '2024-08-02 13:51:21'),
(285, 'Nama Anggota 84', 'P', 'Tempat Lahir', '1997-10-07', '603888510', 'Islam', 'Nama Ibu 84', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123099686', 'email84@domain.com', 718932, NULL, '2024-08-02 13:51:21'),
(286, 'Nama Anggota 85', 'P', 'Tempat Lahir', '2016-03-30', '8406848403', 'Islam', 'Nama Ibu 85', 'Alamat', 'Pekerjaan', 'Pendidikan', 'duda', '08122474504', 'email85@domain.com', 706439, NULL, '2024-08-02 13:51:21'),
(287, 'Nama Anggota 86', 'P', 'Tempat Lahir', '1983-02-13', '7800533126', 'Islam', 'Nama Ibu 86', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08125148047', 'email86@domain.com', 582850, NULL, '2024-08-02 13:51:21'),
(288, 'Nama Anggota 87', 'L', 'Tempat Lahir', '2019-07-24', '3937193419', 'Islam', 'Nama Ibu 87', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08127605756', 'email87@domain.com', 346557, NULL, '2024-08-02 13:51:21'),
(289, 'Nama Anggota 88', 'L', 'Tempat Lahir', '2013-10-24', '7249690412', 'Islam', 'Nama Ibu 88', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '0812577628', 'email88@domain.com', 367394, NULL, '2024-08-02 13:51:21'),
(290, 'Nama Anggota 89', 'P', 'Tempat Lahir', '2013-10-13', '901592169', 'Islam', 'Nama Ibu 89', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08122458319', 'email89@domain.com', 349919, NULL, '2024-08-02 13:51:21'),
(291, 'Nama Anggota 90', 'L', 'Tempat Lahir', '2024-01-19', '174545971', 'Islam', 'Nama Ibu 90', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08122227179', 'email90@domain.com', 948540, NULL, '2024-08-02 13:51:21'),
(292, 'Nama Anggota 91', 'L', 'Tempat Lahir', '1998-04-01', '4120000586', 'Islam', 'Nama Ibu 91', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08123494017', 'email91@domain.com', 275871, NULL, '2024-08-02 13:51:21'),
(293, 'Nama Anggota 92', 'L', 'Tempat Lahir', '1983-03-18', '1472614483', 'Islam', 'Nama Ibu 92', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08122091398', 'email92@domain.com', 48526, NULL, '2024-08-02 13:51:21'),
(294, 'Nama Anggota 93', 'P', 'Tempat Lahir', '1978-02-04', '8068111388', 'Islam', 'Nama Ibu 93', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08127924841', 'email93@domain.com', 234670, NULL, '2024-08-02 13:51:21'),
(295, 'Nama Anggota 94', 'P', 'Tempat Lahir', '2010-10-28', '9897049032', 'Islam', 'Nama Ibu 94', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08126413116', 'email94@domain.com', 840302, NULL, '2024-08-02 13:51:21'),
(296, 'Nama Anggota 95', 'L', 'Tempat Lahir', '1981-04-08', '5021681520', 'Islam', 'Nama Ibu 95', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08124852866', 'email95@domain.com', 297440, NULL, '2024-08-02 13:51:22'),
(297, 'Nama Anggota 96', 'L', 'Tempat Lahir', '2011-05-18', '2279270526', 'Islam', 'Nama Ibu 96', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08122032736', 'email96@domain.com', 870771, NULL, '2024-08-02 13:51:22'),
(298, 'Nama Anggota 97', 'P', 'Tempat Lahir', '2019-03-14', '3071954867', 'Islam', 'Nama Ibu 97', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08121404029', 'email97@domain.com', 64821, NULL, '2024-08-02 13:51:22'),
(299, 'Nama Anggota 98', 'P', 'Tempat Lahir', '2008-08-06', '8914296281', 'Islam', 'Nama Ibu 98', 'Alamat', 'Pekerjaan', 'Pendidikan', 'janda', '08123877283', 'email98@domain.com', 246053, NULL, '2024-08-02 13:51:22'),
(300, 'Nama Anggota 99', 'L', 'Tempat Lahir', '1994-09-30', '7850212164', 'Islam', 'Nama Ibu 99', 'Alamat', 'Pekerjaan', 'Pendidikan', 'lajang', '08123116569', 'email99@domain.com', 158252, NULL, '2024-08-02 13:51:22'),
(301, 'Nama Anggota 100', 'P', 'Tempat Lahir', '1984-04-12', '4646260100', 'Islam', 'Nama Ibu 100', 'Alamat', 'Pekerjaan', 'Pendidikan', 'menikah', '08128972658', 'email100@domain.com', 122516, NULL, '2024-08-02 13:51:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_angsuran`
--

CREATE TABLE `tb_angsuran` (
  `angsuran_id` int NOT NULL,
  `angsuran_pinjaman_id` int NOT NULL,
  `angsuran_jumlah` double NOT NULL,
  `angsuran_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int NOT NULL,
  `kode_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `detail_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_satuan` int NOT NULL,
  `id_kategori` int NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `detail_barang`, `id_satuan`, `id_kategori`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(358, '-', 'Susu', '-', 12, 35, 3000, 5000, 9997127, '2024-08-06 01:13:58', '2024-08-06 02:59:36'),
(359, '-', 'Gorengan', '-', 15, 36, 500, 2000, 514, '2024-08-06 01:14:26', '2024-08-06 02:56:23'),
(361, '', 'hhgft', '', 6, 36, 76587658, 856658, 85664, '2024-08-06 07:46:18', '2024-08-06 07:51:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detransaksi`
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
-- Dumping data untuk tabel `tb_detransaksi`
--

INSERT INTO `tb_detransaksi` (`id_detail`, `id_transaksi`, `id_barang`, `nama_barang`, `harga`, `jumlah`, `total`) VALUES
(223, 123, 359, 'Gorengan', 2000, 80, 160000),
(224, 123, 358, 'Susu', 5000, 49, 245000),
(226, 124, 361, 'hhgft', 856658, 1, 856658),
(227, 125, 358, 'Susu', 5000, 43, 215000),
(231, 126, 358, 'Susu', 5000, 6, 30000),
(232, 127, 358, 'Susu', 5000, 67, 335000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_histori`
--

CREATE TABLE `tb_histori` (
  `id` int NOT NULL,
  `message_text` varchar(255) NOT NULL,
  `message_summary` varchar(255) NOT NULL,
  `message_icon` varchar(50) NOT NULL,
  `message_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_histori`
--

INSERT INTO `tb_histori` (`id`, `message_text`, `message_summary`, `message_icon`, `message_date_time`) VALUES
(36, 'Kategori dihapus', 'Kategori  telah dihapus', 'delete', '2024-08-07 02:52:34'),
(37, 'Kategori ditambahkan', 'Kategori 68588 telah ditambahkan', 'add_circle_outline', '2024-08-07 02:55:07'),
(38, 'Kategori ditambahkan', 'Kategori 68588 telah ditambahkan', 'add_circle_outline', '2024-08-07 02:55:08'),
(39, 'Kategori ditambahkan', 'Kategori 68588 telah ditambahkan', 'add_circle_outline', '2024-08-07 02:55:09'),
(40, 'Kategori dihapus', 'Kategori  telah dihapus', 'delete', '2024-08-07 02:55:15'),
(41, 'Kategori dihapus', 'Kategori  telah dihapus', 'delete', '2024-08-07 02:55:19'),
(42, 'Kategori dihapus', 'Kategori  telah dihapus', 'delete', '2024-08-07 02:55:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(35, 'Minuman', '2024-07-30 03:52:07', '2024-07-30 03:52:07'),
(36, 'Makanan', '2024-07-30 03:52:18', '2024-07-30 03:52:18'),
(38, 'ATK', '2024-07-30 06:28:16', '2024-07-30 06:28:16'),
(39, 'AKM (Alat kamar mandi)', '2024-07-30 06:30:25', '2024-07-30 06:30:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id` int NOT NULL,
  `jenis_pinjaman` text COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_pinjam` text COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_pinjaman` text COLLATE utf8mb4_general_ci NOT NULL,
  `lama_pinjaman` text COLLATE utf8mb4_general_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `waktu_pengajuan` datetime DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `pengguna_id` int NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satker` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pengguna_hak_akses` enum('user','operator','admin') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `limit` int DEFAULT NULL,
  `pengguna_picture` varchar(255) DEFAULT NULL,
  `pengguna_date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`pengguna_id`, `nama_lengkap`, `username`, `email`, `satker`, `password`, `pengguna_hak_akses`, `limit`, `pengguna_picture`, `pengguna_date_update`, `pengguna_date_created`) VALUES
(5, 'a', 'a', 'adit@gmail.com', 'ipds', 'a', 'admin', 1500000, NULL, '2024-08-06 15:49:18', '2024-07-30 15:31:36'),
(8, 'User 1', 'user1', 'user1@example.com', 'Satker', 'password', 'user', 740000, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(9, 'User 2', 'user2', 'user2@example.com', 'Satker', 'password', 'user', 1495000, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(10, 'User 3', 'user3', 'user3@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(11, 'User 4', 'user4', 'user4@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(12, 'User 5', 'user5', 'user5@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(13, 'User 6', 'user6', 'user6@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(14, 'User 7', 'user7', 'user7@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(15, 'User 8', 'user8', 'user8@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(16, 'User 9', 'user9', 'user9@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(17, 'User 10', 'user10', 'user10@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(18, 'User 11', 'user11', 'user11@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(19, 'User 12', 'user12', 'user12@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(20, 'User 13', 'user13', 'user13@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(21, 'User 14', 'user14', 'user14@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(22, 'User 15', 'user15', 'user15@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(23, 'User 16', 'user16', 'user16@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(24, 'User 17', 'user17', 'user17@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(25, 'User 18', 'user18', 'user18@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(26, 'User 19', 'user19', 'user19@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(27, 'User 20', 'user20', 'user20@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(28, 'User 21', 'user21', 'user21@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(29, 'User 22', 'user22', 'user22@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:15'),
(30, 'User 23', 'user23', 'user23@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(31, 'User 24', 'user24', 'user24@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(32, 'User 25', 'user25', 'user25@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(33, 'User 26', 'user26', 'user26@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(34, 'User 27', 'user27', 'user27@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(35, 'User 28', 'user28', 'user28@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(36, 'User 29', 'user29', 'user29@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(37, 'User 30', 'user30', 'user30@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(38, 'User 31', 'user31', 'user31@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(39, 'User 32', 'user32', 'user32@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(40, 'User 33', 'user33', 'user33@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(41, 'User 34', 'user34', 'user34@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(42, 'User 35', 'user35', 'user35@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(43, 'User 36', 'user36', 'user36@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(44, 'User 37', 'user37', 'user37@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(45, 'User 38', 'user38', 'user38@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(46, 'User 39', 'user39', 'user39@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(47, 'User 40', 'user40', 'user40@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(48, 'User 41', 'user41', 'user41@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(49, 'User 42', 'user42', 'user42@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(50, 'User 43', 'user43', 'user43@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(51, 'User 44', 'user44', 'user44@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(52, 'User 45', 'user45', 'user45@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(53, 'User 46', 'user46', 'user46@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(54, 'User 47', 'user47', 'user47@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(55, 'User 48', 'user48', 'user48@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(56, 'User 49', 'user49', 'user49@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(57, 'User 50', 'user50', 'user50@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(58, 'User 51', 'user51', 'user51@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(59, 'User 52', 'user52', 'user52@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(60, 'User 53', 'user53', 'user53@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(61, 'User 54', 'user54', 'user54@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:16'),
(62, 'User 55', 'user55', 'user55@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(63, 'User 56', 'user56', 'user56@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(64, 'User 57', 'user57', 'user57@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(65, 'User 58', 'user58', 'user58@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(66, 'User 59', 'user59', 'user59@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(67, 'User 60', 'user60', 'user60@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(68, 'User 61', 'user61', 'user61@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(69, 'User 62', 'user62', 'user62@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(70, 'User 63', 'user63', 'user63@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(71, 'User 64', 'user64', 'user64@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(72, 'User 65', 'user65', 'user65@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(73, 'User 66', 'user66', 'user66@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(74, 'User 67', 'user67', 'user67@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(75, 'User 68', 'user68', 'user68@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(76, 'User 69', 'user69', 'user69@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(77, 'User 70', 'user70', 'user70@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(78, 'User 71', 'user71', 'user71@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(79, 'User 72', 'user72', 'user72@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(80, 'User 73', 'user73', 'user73@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(81, 'User 74', 'user74', 'user74@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(82, 'User 75', 'user75', 'user75@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(83, 'User 76', 'user76', 'user76@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(84, 'User 77', 'user77', 'user77@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:17'),
(85, 'User 78', 'user78', 'user78@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(86, 'User 79', 'user79', 'user79@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(87, 'User 80', 'user80', 'user80@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(88, 'User 81', 'user81', 'user81@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(89, 'User 82', 'user82', 'user82@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(90, 'User 83', 'user83', 'user83@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(91, 'User 84', 'user84', 'user84@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(92, 'User 85', 'user85', 'user85@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(93, 'User 86', 'user86', 'user86@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(94, 'User 87', 'user87', 'user87@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(95, 'User 88', 'user88', 'user88@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(96, 'User 89', 'user89', 'user89@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(97, 'User 90', 'user90', 'user90@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(98, 'User 91', 'user91', 'user91@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(99, 'User 92', 'user92', 'user92@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(100, 'User 93', 'user93', 'user93@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(101, 'User 94', 'user94', 'user94@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(102, 'User 95', 'user95', 'user95@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(103, 'User 96', 'user96', 'user96@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(104, 'User 97', 'user97', 'user97@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(105, 'User 98', 'user98', 'user98@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(106, 'User 99', 'user99', 'user99@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(107, 'User 100', 'user100', 'user100@example.com', 'Satker', 'password', 'user', 0, NULL, '2024-08-06 15:49:18', '2024-08-02 13:51:18'),
(108, 'aeng', 'aaedasdas', 'fssad@nfasfjnasd.com', 'twet', 'twetw', 'admin', 600000, NULL, '2024-08-06 15:49:18', '2024-08-06 11:11:00'),
(109, 'trutrut', 'urrtu', 'truur@gamil.com', 'ewwse', 'wewetew', 'admin', NULL, NULL, '2024-08-06 15:49:18', '2024-08-06 14:10:32'),
(110, '7676', '767', 'gfhfg@fgfgfgj.hugh', '76676', '86857', 'admin', NULL, NULL, '2024-08-06 15:49:18', '2024-08-06 15:31:30'),
(111, 'fgddfhdh', 'fdhhdfhf', 'hfddfg@fgfdd', '63465', 'fdhdf', 'admin', NULL, NULL, '2024-08-06 15:49:18', '2024-08-06 15:34:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjaman`
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
-- Struktur dari tabel `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int NOT NULL,
  `nama_satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_satuan`
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
-- Struktur dari tabel `tb_simpanan`
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
-- Struktur dari tabel `tb_transaksi`
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
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `pengguna_id`, `cara_bayar`, `total`, `detail`, `created_at`, `updated_at`) VALUES
(123, 8, 'Kredit', 405000, '', '2024-08-06 08:05:12', '2024-08-06 08:13:34'),
(124, 8, 'Cash', 856658, '', '2024-08-06 08:14:39', '2024-08-06 08:15:03'),
(125, 11, 'Cash', 215000, '', '2024-08-06 08:16:57', '2024-08-06 08:16:57'),
(126, 8, 'Cash', 30000, '', '2024-08-06 08:17:59', '2024-08-06 08:22:20'),
(127, 8, 'Cash', 335000, '', '2024-08-07 02:43:12', '2024-08-07 02:43:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indeks untuk tabel `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD PRIMARY KEY (`angsuran_id`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_detransaksi`
--
ALTER TABLE `tb_detransaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_histori`
--
ALTER TABLE `tb_histori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indeks untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`pinjaman_id`);

--
-- Indeks untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tb_simpanan`
--
ALTER TABLE `tb_simpanan`
  ADD PRIMARY KEY (`simpanan_id`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `anggota_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT untuk tabel `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  MODIFY `angsuran_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT untuk tabel `tb_detransaksi`
--
ALTER TABLE `tb_detransaksi`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT untuk tabel `tb_histori`
--
ALTER TABLE `tb_histori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `pengguna_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `pinjaman_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_simpanan`
--
ALTER TABLE `tb_simpanan`
  MODIFY `simpanan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detransaksi`
--
ALTER TABLE `tb_detransaksi`
  ADD CONSTRAINT `tb_detransaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `tb_detransaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `tb_pengguna` (`pengguna_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
