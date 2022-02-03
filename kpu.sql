-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 07:30 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpu`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_bem`
--

CREATE TABLE `data_bem` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `slogan` varchar(128) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_bem`
--

INSERT INTO `data_bem` (`id`, `img`, `nama`, `no_urut`, `slogan`, `visi`, `misi`) VALUES
(5, 'DSC_0572.JPG', 'Shalahuddin Ahmad', 1, 'Maju Bersama', 'Tercapai nya cita cita bersama', 'Dibanggakan'),
(6, 'DSC_0560.JPG', 'Adi advokasi', 2, 'Bersama Menuju Kemenangan', 'Ayo', 'Berjuang'),
(7, 'DSC_0521.JPG', 'Nadia', 3, 'Makan', 'Makananana', 'Memakanan');

-- --------------------------------------------------------

--
-- Table structure for table `data_dpm`
--

CREATE TABLE `data_dpm` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `slogan` varchar(128) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_dpm`
--

INSERT INTO `data_dpm` (`id`, `img`, `nama`, `no_urut`, `slogan`, `visi`, `misi`) VALUES
(6, 'DSC_05341.JPG', 'Abdurrahman Alfath', 1, 'Maju Bersama', 'Maju', 'Maju Aja'),
(7, 'DSC_0560.JPG', 'Adi', 2, 'Maju Bersama', 'Mundur', 'Mundur cantik'),
(8, 'DSC_0540.JPG', 'Ayu', 3, 'keren', 'keren aja', 'keren kerenan');

-- --------------------------------------------------------

--
-- Table structure for table `data_himsisfo`
--

CREATE TABLE `data_himsisfo` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `slogan` varchar(128) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_himsisfo`
--

INSERT INTO `data_himsisfo` (`id`, `img`, `nama`, `no_urut`, `slogan`, `visi`, `misi`) VALUES
(1, 'DSC_0524.JPG', 'Carisa Aghata', 1, 'Maju Aja pokoknya dah', 'Maju ayo maju', 'Maju Aja Dulu yekan'),
(2, 'DSC_0589.JPG', 'Anisa chas', 2, 'Anjg', 'Hilangkan Anjg', 'Anjayani asasdawd'),
(3, 'DSC_0548.JPG', 'Fikri', 3, 'Insyaallah amanah', 'amanah', 'amanah aja');

-- --------------------------------------------------------

--
-- Table structure for table `data_himti`
--

CREATE TABLE `data_himti` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `slogan` varchar(128) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_himti`
--

INSERT INTO `data_himti` (`id`, `img`, `nama`, `no_urut`, `slogan`, `visi`, `misi`) VALUES
(2, 'DSC_0584.JPG', 'Hilmi Ismail', 1, 'Maju Bersama', 'Rajin', 'Pangkal Kaya'),
(3, 'DSC_0577.JPG', 'Mirza', 2, 'Maju Bersama', 'Tuhan', 'Yang Maha Esa aaaa'),
(4, 'DSC_0563.JPG', 'Teteh', 3, 'Anjg', 'dawdasd', 'weqweqweqwe');

-- --------------------------------------------------------

--
-- Table structure for table `home1`
--

CREATE TABLE `home1` (
  `id` int(11) NOT NULL,
  `sub_header` varchar(128) NOT NULL,
  `header` varchar(128) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `home2`
--

CREATE TABLE `home2` (
  `id` int(11) NOT NULL,
  `lembaga` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hp_kbem`
--

CREATE TABLE `hp_kbem` (
  `id` int(11) NOT NULL,
  `kode_pemilih` int(11) NOT NULL,
  `nama_pemilih` varchar(128) NOT NULL,
  `nim_pemilih` varchar(50) NOT NULL,
  `email_pemilih` varchar(128) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hp_kdpm`
--

CREATE TABLE `hp_kdpm` (
  `id` int(11) NOT NULL,
  `kode_pemilih` int(11) NOT NULL,
  `nama_pemilih` varchar(128) NOT NULL,
  `nim_pemilih` varchar(50) NOT NULL,
  `email_pemilih` varchar(128) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hp_khsi`
--

CREATE TABLE `hp_khsi` (
  `id` int(11) NOT NULL,
  `kode_pemilih` int(11) NOT NULL,
  `nama_pemilih` varchar(128) NOT NULL,
  `nim_pemilih` varchar(50) NOT NULL,
  `email_pemilih` varchar(128) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hp_khti`
--

CREATE TABLE `hp_khti` (
  `id` int(11) NOT NULL,
  `kode_pemilih` int(11) NOT NULL,
  `nama_pemilih` varchar(128) NOT NULL,
  `nim_pemilih` varchar(50) NOT NULL,
  `email_pemilih` varchar(128) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_bem`
--

CREATE TABLE `komentar_bem` (
  `id` int(11) NOT NULL,
  `nama_pengomentar` varchar(128) NOT NULL,
  `nim_pengomentar` varchar(50) NOT NULL,
  `email_pengomentar` varchar(128) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `komentar` text NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `komentar_bem`
--
DELIMITER $$
CREATE TRIGGER `clearreply2` AFTER DELETE ON `komentar_bem` FOR EACH ROW DELETE FROM reply_bem WHERE reply_bem.id_komentar = old.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_dpm`
--

CREATE TABLE `komentar_dpm` (
  `id` int(11) NOT NULL,
  `nama_pengomentar` varchar(128) NOT NULL,
  `nim_pengomentar` varchar(50) NOT NULL,
  `email_pengomentar` varchar(128) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `komentar` text NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `komentar_dpm`
--
DELIMITER $$
CREATE TRIGGER `clearreply` AFTER DELETE ON `komentar_dpm` FOR EACH ROW DELETE FROM reply_dpm WHERE reply_dpm.id_komentar = old.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_himsisfo`
--

CREATE TABLE `komentar_himsisfo` (
  `id` int(11) NOT NULL,
  `nama_pengomentar` varchar(128) NOT NULL,
  `nim_pengomentar` varchar(50) NOT NULL,
  `email_pengomentar` varchar(128) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `komentar` text NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `komentar_himsisfo`
--
DELIMITER $$
CREATE TRIGGER `clearreply4` AFTER DELETE ON `komentar_himsisfo` FOR EACH ROW DELETE FROM reply_himsisfo WHERE reply_himsisfo.id_komentar = old.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_himti`
--

CREATE TABLE `komentar_himti` (
  `id` int(11) NOT NULL,
  `nama_pengomentar` varchar(128) NOT NULL,
  `nim_pengomentar` varchar(50) NOT NULL,
  `email_pengomentar` varchar(128) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `komentar` text NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `komentar_himti`
--
DELIMITER $$
CREATE TRIGGER `clearreply3` AFTER DELETE ON `komentar_himti` FOR EACH ROW DELETE FROM reply_himti WHERE reply_himti.id_komentar = old.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_akses_peserta`
--

CREATE TABLE `menu_akses_peserta` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_akses_peserta`
--

INSERT INTO `menu_akses_peserta` (`id`, `menu`, `url`, `icon`, `is_active`) VALUES
(1, 'Peserta Baru Daftar', 'control1', 'fa fa-user-plus', 1),
(2, 'Peserta Aktivasi Awal', 'control2', 'fa fa-user-edit', 1),
(3, 'Peserta Aktif', 'control3', 'fa fa-user-check', 1),
(4, 'Peserta Diluar Fasilkom', 'control4', 'fa fa-user-times', 1),
(5, 'Peserta Nonaktif', 'control5', 'fa fa-user-lock', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_akses_peserta_akses`
--

CREATE TABLE `menu_akses_peserta_akses` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_akses_peserta_akses`
--

INSERT INTO `menu_akses_peserta_akses` (`id`, `role_id`, `jurusan`, `menu_id`) VALUES
(1, 1, 'Teknik Informatika', 1),
(2, 1, 'Teknik Informatika', 2),
(3, 1, 'Teknik Informatika', 3),
(4, 1, 'Teknik Informatika', 4),
(5, 1, 'Teknik Informatika', 5);

-- --------------------------------------------------------

--
-- Table structure for table `menu_awal`
--

CREATE TABLE `menu_awal` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_awal`
--

INSERT INTO `menu_awal` (`id`, `menu`, `url`, `icon`, `is_active`) VALUES
(1, 'Home', 'user', 'fa fa-home', 1),
(2, 'My Profile', 'profile', 'fa fa-user', 1),
(3, 'Role Control', 'role', 'fa fa-key', 1),
(4, 'Menu Control', 'menucontrol', 'fa fa-credit-card', 1),
(5, 'Menu Akses Control', 'menuaksescontrol', 'fa fa-hand-paper', 1),
(6, 'Master Admin Control', 'masteradmin', 'fa fa-user-secret', 1),
(7, 'Admin', 'admin', 'fa fa-user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_awal_akses`
--

CREATE TABLE `menu_awal_akses` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_awal_akses`
--

INSERT INTO `menu_awal_akses` (`id`, `role_id`, `jurusan`, `menu_id`) VALUES
(1, 1, 'Teknik Informatika', 1),
(2, 1, 'Teknik Informatika', 2),
(3, 1, 'Teknik Informatika', 3),
(4, 1, 'Teknik Informatika', 4),
(5, 1, 'Teknik Informatika', 5),
(9, 3, 'Teknik Informatika', 1),
(10, 3, 'Teknik Informatika', 2),
(11, 3, 'Sistem Informasi', 1),
(12, 3, 'Sistem Informasi', 2),
(13, 1, 'Teknik Informatika', 6),
(17, 1, 'Teknik Informatika', 7);

-- --------------------------------------------------------

--
-- Table structure for table `menu_data_kandidat`
--

CREATE TABLE `menu_data_kandidat` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_data_kandidat`
--

INSERT INTO `menu_data_kandidat` (`id`, `menu`, `url`, `icon`, `is_active`) VALUES
(1, 'DPM', 'kdpm', 'fa fa-user-alt', 1),
(2, 'BEM', 'kbem', 'fa fa-user-alt', 1),
(3, 'HiMTI', 'khti', 'fa fa-user-alt', 1),
(4, 'Himsisfo', 'khsi', 'fa fa-user-alt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_data_kandidat_akses`
--

CREATE TABLE `menu_data_kandidat_akses` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_data_kandidat_akses`
--

INSERT INTO `menu_data_kandidat_akses` (`id`, `role_id`, `jurusan`, `menu_id`) VALUES
(1, 1, 'Teknik Informatika', 1),
(2, 1, 'Teknik Informatika', 2),
(3, 1, 'Teknik Informatika', 3),
(4, 1, 'Teknik Informatika', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu_data_komentar`
--

CREATE TABLE `menu_data_komentar` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_data_komentar`
--

INSERT INTO `menu_data_komentar` (`id`, `menu`, `url`, `icon`, `is_active`) VALUES
(1, 'DPM', 'kkdpm', 'fa fa-comment-dots', 1),
(2, 'BEM', 'kkbem', 'fa fa-comment-dots', 1),
(3, 'HiMTI', 'kkhti', 'fa fa-comment-dots', 1),
(4, 'Himsisfo', 'kkhsi', 'fa fa-comment-dots', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_data_komentar_akses`
--

CREATE TABLE `menu_data_komentar_akses` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_data_komentar_akses`
--

INSERT INTO `menu_data_komentar_akses` (`id`, `role_id`, `jurusan`, `menu_id`) VALUES
(1, 1, 'Teknik Informatika', 1),
(2, 1, 'Teknik Informatika', 2),
(3, 1, 'Teknik Informatika', 3),
(4, 1, 'Teknik Informatika', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu_data_reply`
--

CREATE TABLE `menu_data_reply` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_data_reply`
--

INSERT INTO `menu_data_reply` (`id`, `menu`, `url`, `icon`, `is_active`) VALUES
(1, 'DPM', 'rkkdpm', 'fa fa-comment-medical', 1),
(2, 'BEM', 'rkkbem', 'fa fa-comment-medical', 1),
(3, 'HiMTI', 'rkkhti', 'fa fa-comment-medical', 1),
(4, 'Himsisfo', 'rkkhsi', 'fa fa-comment-medical', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_data_reply_akses`
--

CREATE TABLE `menu_data_reply_akses` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_data_reply_akses`
--

INSERT INTO `menu_data_reply_akses` (`id`, `role_id`, `jurusan`, `menu_id`) VALUES
(1, 1, 'Teknik Informatika', 1),
(2, 1, 'Teknik Informatika', 2),
(3, 1, 'Teknik Informatika', 3),
(4, 1, 'Teknik Informatika', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu_hasil`
--

CREATE TABLE `menu_hasil` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_hasil`
--

INSERT INTO `menu_hasil` (`id`, `menu`, `url`, `icon`, `is_active`) VALUES
(1, 'DPM', 'hpkdpm', 'fa fa-user-tie', 1),
(2, 'BEM', 'hpkbem', 'fa fa-user-tie', 1),
(3, 'HiMTI', 'hpkhti', 'fa fa-user-tie', 1),
(4, 'Himsisfo', 'hpkhsi', 'fa fa-user-tie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_hasil_akses`
--

CREATE TABLE `menu_hasil_akses` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_hasil_akses`
--

INSERT INTO `menu_hasil_akses` (`id`, `role_id`, `jurusan`, `menu_id`) VALUES
(1, 1, 'Teknik Informatika', 1),
(2, 1, 'Teknik Informatika', 2),
(3, 1, 'Teknik Informatika', 3),
(4, 1, 'Teknik Informatika', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu_info_kandidat`
--

CREATE TABLE `menu_info_kandidat` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_info_kandidat`
--

INSERT INTO `menu_info_kandidat` (`id`, `menu`, `url`, `icon`, `is_active`) VALUES
(1, 'DPM', 'ikdpm', 'fa fa-menu', 1),
(2, 'BEM', 'ikbem', 'fa fa-menu', 1),
(3, 'HiMTI', 'ikhti', 'fa fa-menu', 1),
(4, 'Himsisfo', 'ikhsi', 'fa fa-menu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_info_kandidat_akses`
--

CREATE TABLE `menu_info_kandidat_akses` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_info_kandidat_akses`
--

INSERT INTO `menu_info_kandidat_akses` (`id`, `role_id`, `jurusan`, `menu_id`) VALUES
(1, 1, 'Teknik Informatika', 1),
(2, 1, 'Teknik Informatika', 2),
(3, 1, 'Teknik Informatika', 3),
(4, 1, 'Teknik Informatika', 4),
(6, 3, 'Teknik Informatika', 1),
(7, 3, 'Teknik Informatika', 2),
(8, 3, 'Teknik Informatika', 3),
(9, 3, 'Teknik Informatika', 4),
(10, 3, 'Sistem Informasi', 1),
(11, 3, 'Sistem Informasi', 2),
(12, 3, 'Sistem Informasi', 3),
(13, 3, 'Sistem Informasi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu_pemilihan`
--

CREATE TABLE `menu_pemilihan` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_pemilihan`
--

INSERT INTO `menu_pemilihan` (`id`, `menu`, `url`, `icon`, `is_active`) VALUES
(1, 'DPM', 'pkdpm', 'fa fa-menu', 1),
(2, 'BEM', 'pkbem', 'fa fa-menu', 1),
(3, 'HiMTI', 'pkhti', 'fa fa-menu', 1),
(4, 'Himsisfo', 'pkhsi', 'fa fa-menu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_pemilihan_akses`
--

CREATE TABLE `menu_pemilihan_akses` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_pemilihan_akses`
--

INSERT INTO `menu_pemilihan_akses` (`id`, `role_id`, `jurusan`, `menu_id`) VALUES
(1, 1, 'Teknik Informatika', 1),
(2, 1, 'Teknik Informatika', 2),
(3, 1, 'Teknik Informatika', 3),
(4, 1, 'Teknik Informatika', 4),
(6, 3, 'Teknik Informatika', 1),
(7, 3, 'Teknik Informatika', 2),
(8, 3, 'Teknik Informatika', 3),
(9, 3, 'Sistem Informasi', 1),
(10, 3, 'Sistem Informasi', 2),
(11, 3, 'Sistem Informasi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu_report`
--

CREATE TABLE `menu_report` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_report`
--

INSERT INTO `menu_report` (`id`, `menu`, `url`, `icon`, `is_active`) VALUES
(1, 'DPM', 'rhpkdpm', 'fa fa-portrait', 1),
(2, 'BEM', 'rhpkbem', 'fa fa-portrait', 1),
(3, 'HiMTI', 'rhpkhti', 'fa fa-portrait', 1),
(4, 'Himsisfo', 'rhpkhsi', 'fa fa-portrait', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_report_akses`
--

CREATE TABLE `menu_report_akses` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_report_akses`
--

INSERT INTO `menu_report_akses` (`id`, `role_id`, `jurusan`, `menu_id`) VALUES
(1, 1, 'Teknik Informatika', 1),
(2, 1, 'Teknik Informatika', 2),
(3, 1, 'Teknik Informatika', 3),
(4, 1, 'Teknik Informatika', 4);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `tanggal` date NOT NULL,
  `pesan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_akun` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `nama`, `nim`, `email`, `no_telpon`, `jurusan`, `angkatan`, `tanggal`, `pesan`, `status`, `status_akun`, `gambar`) VALUES
(8, 'Shalahuddin Ahmad Aziz', '41518010139', 'shalahuddinahmad.aziz@gmail.com', 'Akun Aktif', 'Teknik Informatika', '2018', '2021-06-27', 'tes', 'Readed', 'Aktif', 'DSC_0572.JPG'),
(11, 'Shalahuddin Ahmad Aziz', '41518010139', 'shalahuddinahmad.aziz@gmail.com', 'Akun Aktif', 'Teknik Informatika', '2018', '2021-06-27', 'tes terus', 'Readed', 'Aktif', 'DSC_0572.JPG'),
(13, 'tester', '313123123', 'sicupufx@gmail.com', '3123123123123', 'Teknik Informatika', '2018', '2021-06-29', 'ddddddd', 'Readed', 'Nonaktif', 'default.png'),
(14, 'Admin KPU 139', '41518010adminonly139', 'shicfx.beatbox@gmail.com', 'Akun Aktif', 'Teknik Informatika', '2018', '2021-07-03', 'kpu kpu anjing', 'Readed', 'Aktif', 'DSC_0572.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `reply_bem`
--

CREATE TABLE `reply_bem` (
  `id` int(11) NOT NULL,
  `nama_pembalas` varchar(128) NOT NULL,
  `nim_pembalas` varchar(128) NOT NULL,
  `email_pembalas` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `balasan` text NOT NULL,
  `nim_pengomentar` varchar(128) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reply_dpm`
--

CREATE TABLE `reply_dpm` (
  `id` int(11) NOT NULL,
  `nama_pembalas` varchar(128) NOT NULL,
  `nim_pembalas` varchar(128) NOT NULL,
  `email_pembalas` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `balasan` text NOT NULL,
  `nim_pengomentar` varchar(128) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reply_himsisfo`
--

CREATE TABLE `reply_himsisfo` (
  `id` int(11) NOT NULL,
  `nama_pembalas` varchar(128) NOT NULL,
  `nim_pembalas` varchar(128) NOT NULL,
  `email_pembalas` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `balasan` text NOT NULL,
  `nim_pengomentar` varchar(128) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reply_himti`
--

CREATE TABLE `reply_himti` (
  `id` int(11) NOT NULL,
  `nama_pembalas` varchar(128) NOT NULL,
  `nim_pembalas` varchar(128) NOT NULL,
  `email_pembalas` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `balasan` text NOT NULL,
  `nim_pengomentar` varchar(128) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `img` varchar(128) NOT NULL,
  `ktm` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nim`, `email`, `img`, `ktm`, `password`, `angkatan`, `jurusan`, `role_id`, `is_active`, `date_created`) VALUES
(7, 'Admin KPU 139', '41518010adminonly139', 'shicfx.beatbox@gmail.com', 'DSC_0572.JPG', 'IMG_20181201_193705_262.jpg', '$2y$10$wVY4OctKBrPmsLTLbLPyFeQO18fVLOkM4A0G5LPdwW.nj3GPjldy.', 2018, 'Teknik Informatika', 1, 1, 1623832568);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Master Admin'),
(2, 'Admin'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_bem`
--
ALTER TABLE `data_bem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_dpm`
--
ALTER TABLE `data_dpm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_himsisfo`
--
ALTER TABLE `data_himsisfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_himti`
--
ALTER TABLE `data_himti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home1`
--
ALTER TABLE `home1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home2`
--
ALTER TABLE `home2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hp_kbem`
--
ALTER TABLE `hp_kbem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hp_kdpm`
--
ALTER TABLE `hp_kdpm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hp_khsi`
--
ALTER TABLE `hp_khsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hp_khti`
--
ALTER TABLE `hp_khti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_bem`
--
ALTER TABLE `komentar_bem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_dpm`
--
ALTER TABLE `komentar_dpm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_himsisfo`
--
ALTER TABLE `komentar_himsisfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_himti`
--
ALTER TABLE `komentar_himti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_akses_peserta`
--
ALTER TABLE `menu_akses_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_akses_peserta_akses`
--
ALTER TABLE `menu_akses_peserta_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_awal`
--
ALTER TABLE `menu_awal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_awal_akses`
--
ALTER TABLE `menu_awal_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_data_kandidat`
--
ALTER TABLE `menu_data_kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_data_kandidat_akses`
--
ALTER TABLE `menu_data_kandidat_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_data_komentar`
--
ALTER TABLE `menu_data_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_data_komentar_akses`
--
ALTER TABLE `menu_data_komentar_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_data_reply`
--
ALTER TABLE `menu_data_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_data_reply_akses`
--
ALTER TABLE `menu_data_reply_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_hasil`
--
ALTER TABLE `menu_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_hasil_akses`
--
ALTER TABLE `menu_hasil_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_info_kandidat`
--
ALTER TABLE `menu_info_kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_info_kandidat_akses`
--
ALTER TABLE `menu_info_kandidat_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_pemilihan`
--
ALTER TABLE `menu_pemilihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_pemilihan_akses`
--
ALTER TABLE `menu_pemilihan_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_report`
--
ALTER TABLE `menu_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_report_akses`
--
ALTER TABLE `menu_report_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_bem`
--
ALTER TABLE `reply_bem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_dpm`
--
ALTER TABLE `reply_dpm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_himsisfo`
--
ALTER TABLE `reply_himsisfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_himti`
--
ALTER TABLE `reply_himti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_bem`
--
ALTER TABLE `data_bem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_dpm`
--
ALTER TABLE `data_dpm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_himsisfo`
--
ALTER TABLE `data_himsisfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_himti`
--
ALTER TABLE `data_himti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home1`
--
ALTER TABLE `home1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home2`
--
ALTER TABLE `home2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hp_kbem`
--
ALTER TABLE `hp_kbem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hp_kdpm`
--
ALTER TABLE `hp_kdpm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hp_khsi`
--
ALTER TABLE `hp_khsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hp_khti`
--
ALTER TABLE `hp_khti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `komentar_bem`
--
ALTER TABLE `komentar_bem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar_dpm`
--
ALTER TABLE `komentar_dpm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `komentar_himsisfo`
--
ALTER TABLE `komentar_himsisfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar_himti`
--
ALTER TABLE `komentar_himti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu_akses_peserta`
--
ALTER TABLE `menu_akses_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_akses_peserta_akses`
--
ALTER TABLE `menu_akses_peserta_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_awal`
--
ALTER TABLE `menu_awal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu_awal_akses`
--
ALTER TABLE `menu_awal_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `menu_data_kandidat`
--
ALTER TABLE `menu_data_kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_data_kandidat_akses`
--
ALTER TABLE `menu_data_kandidat_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_data_komentar`
--
ALTER TABLE `menu_data_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_data_komentar_akses`
--
ALTER TABLE `menu_data_komentar_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_data_reply`
--
ALTER TABLE `menu_data_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_data_reply_akses`
--
ALTER TABLE `menu_data_reply_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_hasil`
--
ALTER TABLE `menu_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_hasil_akses`
--
ALTER TABLE `menu_hasil_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_info_kandidat`
--
ALTER TABLE `menu_info_kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_info_kandidat_akses`
--
ALTER TABLE `menu_info_kandidat_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menu_pemilihan`
--
ALTER TABLE `menu_pemilihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_pemilihan_akses`
--
ALTER TABLE `menu_pemilihan_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu_report`
--
ALTER TABLE `menu_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_report_akses`
--
ALTER TABLE `menu_report_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reply_bem`
--
ALTER TABLE `reply_bem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reply_dpm`
--
ALTER TABLE `reply_dpm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reply_himsisfo`
--
ALTER TABLE `reply_himsisfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reply_himti`
--
ALTER TABLE `reply_himti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
