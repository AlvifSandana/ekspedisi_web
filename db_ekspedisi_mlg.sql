-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2022 at 02:16 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ekspedisi_mlg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` bigint(20) UNSIGNED NOT NULL,
  `nama_admin` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_admin` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telpon` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nama_admin`, `alamat_admin`, `nomor_telpon`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'rahasia', '081234567890', 'admin@mail.com', '$2y$10$2CHHcEe/As0ujzSuhOwE0.PYbSDp3INsKOjqdVz2JPWC8WYy6p.Um', '', NULL, NULL),
(2, 'test', 'test', '089876543219', 'admin@example.com', '$2y$10$ZlVY/EfGkTg1d2cexA04QuGzJV557I0THEoHDy6hqSSo0jEUqFGYe', '$2y$10$k15KJuUtEA0.8pQvYbCNf.bRIg6T89wLQ5y.3I42t12A05otF.WHS', '2022-01-05 13:10:31', '2022-01-05 13:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idBarang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_barang` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_barang` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pengirim_idPengirim` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idBarang`, `nama_barang`, `jenis_barang`, `berat_barang`, `Pengirim_idPengirim`, `created_at`, `updated_at`) VALUES
(1, 'Barang A1', 'Makanan', '50kg', 1, '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(2, 'Barang A2', 'Makanan', '50kg', 2, '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(3, 'Barang A3', 'Makanan', '50kg', 3, '2022-01-05 06:33:19', '2022-01-05 06:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `idInvoice` bigint(20) UNSIGNED NOT NULL,
  `Transaksi_id_Transaksi` bigint(20) UNSIGNED NOT NULL,
  `Transaksi_Admin_idAdmin` bigint(20) UNSIGNED NOT NULL,
  `Transaksi_Barang_idBarang` bigint(20) UNSIGNED NOT NULL,
  `Transaksi_Barang_Pengirim_idPengirim` bigint(20) UNSIGNED NOT NULL,
  `Jadwal_idJadwal` bigint(20) UNSIGNED NOT NULL,
  `Jadwal_Admin_idAdmin` bigint(20) UNSIGNED NOT NULL,
  `Jadwal_Kendaraan_idKendaraan` bigint(20) UNSIGNED NOT NULL,
  `Jadwal_Kendaraan_Supir_idSupir` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`idInvoice`, `Transaksi_id_Transaksi`, `Transaksi_Admin_idAdmin`, `Transaksi_Barang_idBarang`, `Transaksi_Barang_Pengirim_idPengirim`, `Jadwal_idJadwal`, `Jadwal_Admin_idAdmin`, `Jadwal_Kendaraan_idKendaraan`, `Jadwal_Kendaraan_Supir_idSupir`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 6, 1, 6, 6, '2022-01-05 06:34:36', '2022-01-05 06:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idJadwal` bigint(20) UNSIGNED NOT NULL,
  `Admin_idAdmin` bigint(20) UNSIGNED NOT NULL,
  `Kendaraan_idKendaraan` bigint(20) UNSIGNED NOT NULL,
  `Kendaraan_Supir_idSupir` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pemberangkatan` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idJadwal`, `Admin_idAdmin`, `Kendaraan_idKendaraan`, `Kendaraan_Supir_idSupir`, `tanggal_pemberangkatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-11-27', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(2, 1, 2, 2, '2021-11-27', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(3, 1, 3, 3, '2021-11-27', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(4, 1, 4, 4, '2021-11-27', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(5, 1, 5, 5, '2021-11-27', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(6, 1, 6, 6, '2021-12-01', '2022-01-05 06:34:36', '2022-01-05 06:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `idKendaraan` bigint(20) UNSIGNED NOT NULL,
  `jenis_kendaraan` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plat_kendaraan` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_kendaraan` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Supir_idSupir` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`idKendaraan`, `jenis_kendaraan`, `plat_kendaraan`, `tahun_kendaraan`, `Supir_idSupir`, `created_at`, `updated_at`) VALUES
(1, 'pickup', 'P 7547 VR', '2003', 1, '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(2, 'truk', 'P 7138 VR', '2003', 2, '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(3, 'pickup', 'P 1978 VR', '2005', 3, '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(4, 'truk', 'P 3662 VR', '2009', 4, '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(5, 'truk', 'P 4464 VR', '2011', 5, '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(6, 'pickup', 'P 7539 VR', '2013', 6, '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(7, 'truk', 'P 1245 VR', '2018', 7, '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(8, 'pickup', 'P 1530 VR', '2013', 8, '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(9, 'truk', 'P 3185 VR', '2000', 9, '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(10, 'truk', 'P 2917 VR', '2018', 10, '2022-01-05 06:33:17', '2022-01-05 06:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2021_07_10_140223_create_pengirims_table', 1),
(18, '2021_07_10_140301_create_supirs_table', 1),
(19, '2021_07_10_140308_create_kendaraans_table', 1),
(20, '2021_07_10_140401_create_admins_table', 1),
(21, '2021_07_10_140409_create_jadwals_table', 1),
(22, '2021_07_10_140431_create_barangs_table', 1),
(23, '2021_07_10_140502_create_transaksis_table', 1),
(24, '2021_07_10_140552_create_invoices_table', 1),
(25, '2021_07_11_092916_create_tarifs_table', 1),
(26, '2021_07_11_102036_add_keterangan_to_tarif_table', 1),
(27, '2021_10_31_060717_add_status_to_supir_table', 1),
(28, '2021_10_31_060944_add_status_to_transaksi_table', 1),
(29, '2021_11_27_000349_add_column_tanggal_to_jadwal_table', 1),
(30, '2021_11_28_204429_create_muatan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `muatan`
--

CREATE TABLE `muatan` (
  `idMuatan` bigint(20) UNSIGNED NOT NULL,
  `nama_muatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_muat` date NOT NULL,
  `lokasi_kirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan_muatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `muatan`
--

INSERT INTO `muatan` (`idMuatan`, `nama_muatan`, `pengirim_id`, `tanggal_muat`, `lokasi_kirim`, `catatan_muatan`, `created_at`, `updated_at`) VALUES
(1, 'Buah Naga 1', 1, '2021-12-01', 'Jatisari, Banyuwangi', '--', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(2, 'Buah Naga 2', 2, '2021-12-01', 'Jatisari, Banyuwangi', '--', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(3, 'Buah Naga 3', 3, '2021-12-01', 'Jatisari, Banyuwangi', '--', '2022-01-05 06:33:19', '2022-01-05 06:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengirim`
--

CREATE TABLE `pengirim` (
  `idPengirim` bigint(20) UNSIGNED NOT NULL,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telpon` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengirim`
--

INSERT INTO `pengirim` (`idPengirim`, `nama_pengirim`, `alamat_pengirim`, `nomor_telpon`, `email`, `password`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'Puput Widiastuti S.Sos', 'Psr. Madrasah No. 786, Palembang 96301, Jambi', '08930970352', 'intan58@mandala.or.id', '$2y$10$WDeq2Kh3QaJaBfJZ.9A.Se0.5WhLV3U/.z5TW7ngdIQeHItLK2aKC', '$2y$10$P1j1T8t5.fevt9NgIH6w9eaj9On0WkDP0CsStEcrazkhQE9LV.oHq', '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(2, 'Eko Tampubolon', 'Jr. Ahmad Dahlan No. 461, Pasuruan 19840, Aceh', '08178920099', 'whastuti@irawan.my.id', '$2y$10$oiyGGMg/9NcIZ5mQdHarD.pdfAAIVvmrfKSNAiGSo3GVlYCaOwZTy', '$2y$10$PkQQn/EU9ndS3iJEm2zks.riUtKvhfZVMGe2iWtEUOdfCNEMlOLZ2', '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(3, 'Najam Kuswoyo', 'Dk. Laksamana No. 967, Administrasi Jakarta Selatan 37781, Papua', '08975848379', 'shania10@mandasari.go.id', '$2y$10$vm8rdz2aH.Kl8ngfBNG0uewwYFzRt8rUr213TNayHs4W1HGavc406', '$2y$10$WcH31o/hqF479npXNchbje2PP2EmKHxCotPm.wTS9dH2zfWSfnT5S', '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(4, 'Ina Usada', 'Ki. Bagas Pati No. 564, Denpasar 33244, Malut', '08845742146', 'jnapitupulu@gmail.co.id', '$2y$10$U2hHQfuaFuNjcCEE.OqbFeuEpQ.u8AwCMNPt4X687c9qqU2PlrwdW', '$2y$10$7N0329mHIZ6bT6Y9/LoE7uClzMLnvnBZM2S32lx0XucOC3hE588/6', '2022-01-05 06:33:17', '2022-01-05 06:33:17'),
(5, 'Kajen Pradipta S.H.', 'Dk. Ciumbuleuit No. 911, Malang 41053, Banten', '08408735936', 'vnajmudin@suryatmi.id', '$2y$10$.BEx6kyKvzLOoQKGdRhX2uc3TQVnHqMCQI88Xg1xt7jGJJb85zMtW', '$2y$10$aRuA1sDaEfO7zJKJ4Ep.PuCofn5Bvtafkftr/jAFwq.tsV6Xkrh2q', '2022-01-05 06:33:18', '2022-01-05 06:33:18'),
(6, 'Embuh Hidayat', 'Ds. Supomo No. 41, Pontianak 73348, Kalteng', '08543473346', 'mtarihoran@andriani.asia', '$2y$10$1ut0biShf3rb45561yOX7.vdquM1uCq1ekn3aM5lsIuB3l6C4pjIa', '$2y$10$3gmSBi6FHCHArp539DD0gOtpu9O5tA2ZjkOKownVkBZOj7j5QJPCu', '2022-01-05 06:33:18', '2022-01-05 06:33:18'),
(7, 'Fitriani Febi Susanti', 'Dk. Bah Jaya No. 538, Sukabumi 86491, Babel', '08632803993', 'mandasari.hamima@yahoo.co.id', '$2y$10$9D0k2TmjrHkcSzBzAMCsRePKmCP4gA/HnPswfVqICbUlHCDyHSBIK', '$2y$10$oWLDXrXbyUykecIfE4q99OiSbm1LG/.zfaB9exoVvuDZD0vXzH3QG', '2022-01-05 06:33:18', '2022-01-05 06:33:18'),
(8, 'Lukita Bagas Najmudin', 'Jln. Pattimura No. 44, Pekalongan 69827, Kaltim', '08757704306', 'cayadi57@hardiansyah.my.id', '$2y$10$Z2qpRdEtVbPrQgOalvcY0uv4o/a5pMKcr.5Xw1EVpdUKVj7DOjshy', '$2y$10$lxXvG/DmzhKh2iqe43VKqeigIp2F7tikqbwHwt4q0IQbi9yUH1uM2', '2022-01-05 06:33:18', '2022-01-05 06:33:18'),
(9, 'Jati Simanjuntak', 'Jln. BKR No. 624, Malang 97407, Kaltara', '08521449363', 'kala68@wulandari.ac.id', '$2y$10$F2p.BJs80fGGNPNBmjvE.OkorO9wp.u5RC319vyaKLiAhVpINf2Lu', '$2y$10$Hp77wJydGh60PkyW88GuUOXcqEAee0sfWBayZE08L4NTf2afe8yy2', '2022-01-05 06:33:18', '2022-01-05 06:33:18'),
(10, 'Devi Halima Astuti S.Ked', 'Jln. Asia Afrika No. 740, Singkawang 26393, Kaltara', '08771336533', 'anggriawan.zahra@maryati.web.id', '$2y$10$yMtNWKGEdQsWH4Hs7AWLTeGqdhHjxrhFQgjc8Usu55B0.WWqrHs7O', '$2y$10$cMuSv2Zjm78YuBGPmYupzO.nlifDvrh1jgemlUc1DX6F1h7v9gNZG', '2022-01-05 06:33:19', '2022-01-05 06:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE `supir` (
  `idSupir` bigint(20) UNSIGNED NOT NULL,
  `nama_supir` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supircadang` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_supir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telpon` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`idSupir`, `nama_supir`, `nama_supircadang`, `alamat_supir`, `nomor_telpon`, `email`, `password`, `status`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'Hafshah Unjani Rahayu', 'Amalia Yuniar', 'Dk. Veteran No. 490, Solok 94265, Jateng', '08189966510', 'bkusmawati@ramadan.info', '$2y$10$sfnOiu3OIZ.J/LXB0/J4o.W/baXjYJryQ9WCNyUV86PQURyxYBVqq', 'baru', '$2y$10$99c/xC83Vf3ds0PCuystjunb3oeeLrSGXID9t1x04wIzqvmmgzCNu', '2022-01-05 06:33:15', '2022-01-05 06:33:15'),
(2, 'Jono Haryanto S.H.', 'Bajragin Pratama M.Kom.', 'Dk. Basuki No. 501, Binjai 74271, Kaltim', '08473968584', 'sihombing.danuja@yahoo.co.id', '$2y$10$O/PLCOby/h.FQmYKl1NHh.Xe3uSaNvYdY9qJ59vxr8CY8ZjoyI.JO', 'baru', '$2y$10$EcJg7Cj7kum6G/C6ua.LM./Dy5UoHvV/SAOOuIX6bjFsEVrleH0fC', '2022-01-05 06:33:15', '2022-01-05 06:33:15'),
(3, 'Putri Wahyuni', 'Darijan Bakidin Rajasa', 'Dk. Merdeka No. 336, Pangkal Pinang 37327, Kalteng', '08898572938', 'suryatmi.nardi@latupono.in', '$2y$10$d8fkhnLM8DAMRwBfzRcoNu3f./hITgoJSTL7cnErgRl/tqGqlEmGK', 'baru', '$2y$10$7C/lrCsvmpTkdSatRob2vuigDBPt39HbwbN9Ykw6qihq0/IHVLX8G', '2022-01-05 06:33:15', '2022-01-05 06:33:15'),
(4, 'Melinda Hastuti', 'Catur Anggriawan', 'Gg. Casablanca No. 270, Surabaya 29321, Gorontalo', '08587334448', 'aurora04@yahoo.com', '$2y$10$/rOWqqUltRumjpphT900lOpRiGxIUClx9lRPdC.erlKJSS9Y1yH6K', 'baru', '$2y$10$YO2.4yDhysa2Gwm/3lSqLOERCZgF8uqG1Jk5ljZU6DyZV4K9vm162', '2022-01-05 06:33:15', '2022-01-05 06:33:15'),
(5, 'Rahmat Mursita Utama', 'Fitriani Puspita', 'Kpg. Nangka No. 309, Cimahi 88333, Sulsel', '08959880562', 'jsiregar@gmail.com', '$2y$10$vw3GACH5s/.6mPUJEvqJ8ez2lL6UokKaCDufIZW/U0Y4nKSc4lw3.', 'baru', '$2y$10$RXCjAzsZbMAf0TsgRy52ruJf7Dintrft.rI/mhY9LHatP144Jv0EG', '2022-01-05 06:33:16', '2022-01-05 06:33:16'),
(6, 'Irnanto Halim', 'Bella Uchita Sudiati S.Gz', 'Kpg. Pasirkoja No. 865, Tanjungbalai 98305, Sultra', '08620776880', 'ikhsan00@simanjuntak.com', '$2y$10$dHXXHCJLgiAPVCPQfi8wiebBhJgR0.mTE5kiy4gNLFpV004sHGKJC', 'baru', '$2y$10$vpcZOZ/nUXYCaVri7Ga9A.3xlof4FAdm8fjnQiK61R5zuY529QDxq', '2022-01-05 06:33:16', '2022-01-05 06:33:16'),
(7, 'Dartono Samosir', 'Salimah Tami Wulandari', 'Jr. Cikapayang No. 14, Padang 62325, Sulsel', '08558241228', 'wtarihoran@hartati.co', '$2y$10$QuHBAj4BP6NrV.vro5M0Q.QzC63f/LWr779/zPHEcpd5dR/ZRMZTe', 'baru', '$2y$10$vMIx1NB2sXChMnCG0wfwE.nnDV4QANvU8boBsIOwqkucC..HuD/Ky', '2022-01-05 06:33:16', '2022-01-05 06:33:16'),
(8, 'Dina Anastasia Nurdiyanti S.Gz', 'Ajimat Putra', 'Psr. Dewi Sartika No. 47, Banjar 53292, Riau', '08820064115', 'suwarno.syahrini@gmail.com', '$2y$10$QVC7RWH/WeyjCs3qGFHJmOPcGpZOXSv4ojM251yrxMkwynhL5BxMq', 'baru', '$2y$10$Kl/nDEjMQsI3OeouyU5bce5KbXiRhrMiAjTWXM84wJmwT1wni32pm', '2022-01-05 06:33:16', '2022-01-05 06:33:16'),
(9, 'Hesti Oliva Anggraini', 'Cawisadi Jagapati Marbun S.Kom', 'Jln. Yoga No. 644, Magelang 27103, Pabar', '08520012299', 'iswahyudi.bambang@gmail.co.id', '$2y$10$ZiNPAcYNNNvwevXuuQZN3.kCHk/kiXMreSacTT9VTPjdjxUGAbH/2', 'baru', '$2y$10$HB6B2lcBiMPXieVoEVqm0uwgIRn8VZRnGhCfpYkUbCzh5iepEu3YG', '2022-01-05 06:33:16', '2022-01-05 06:33:16'),
(10, 'Sari Ika Pudjiastuti', 'Hardana Waluyo', 'Dk. Peta No. 794, Palopo 48305, Papua', '08727956395', 'fujiati.zalindra@mulyani.sch.id', '$2y$10$gR8Yn/E48R5zm5s6Z5Dpa.BEwIbEFpOw047b384Fk0ywQd01nzXtW', 'baru', '$2y$10$MqsrtEb5FAvbT5wcZ0X6Du8Biuae5s4PQcxbRZA5kcY6sm0rBsllu', '2022-01-05 06:33:17', '2022-01-05 06:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `idTarif` bigint(20) UNSIGNED NOT NULL,
  `titik_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`idTarif`, `titik_pengiriman`, `tujuan_pengiriman`, `tarif`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Aceh', 'Papua Barat', 10000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(2, 'Sumatera Selatan', 'Kalimantan Utara', 1000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(3, 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 10000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(4, 'Kalimantan Tengah', 'Papua Barat', 2000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(5, 'Sulawesi Tengah', 'Jawa Barat', 5000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(6, 'Kalimantan Barat', 'Sulawesi Barat', 5000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(7, 'Kepulauan Bangka Belitung', 'Kalimantan Barat', 10000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(8, 'Kepulauan Bangka Belitung', 'Kalimantan Barat', 10000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(9, 'Sumatera Selatan', 'Papua Barat', 3000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(10, 'Kalimantan Selatan', 'Kepulauan Riau', 2000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(11, 'Banten', 'Maluku Utara', 20000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(12, 'Kalimantan Timur', 'Kalimantan Tengah', 2000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(13, 'Kalimantan Selatan', 'Kepulauan Riau', 4000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(14, 'Jawa Timur', 'Banten', 20000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(15, 'Kalimantan Barat', 'Sulawesi Barat', 20000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(16, 'Aceh', 'Aceh', 5000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(17, 'Sulawesi Tenggara', 'Kalimantan Timur', 4000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(18, 'Kalimantan Timur', 'DI Yogyakarta', 1000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(19, 'Jawa Timur', 'Jawa Tengah', 1000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(20, 'Sumatera Utara', 'Kepulauan Bangka Belitung', 1000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(21, 'Maluku', 'Jawa Timur', 10000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(22, 'Aceh', 'Bengkulu', 20000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(23, 'Kalimantan Tengah', 'Sulawesi Tenggara', 10000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(24, 'Kalimantan Selatan', 'Jawa Timur', 10000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(25, 'Sulawesi Utara', 'Aceh', 5000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(26, 'Kepulauan Riau', 'Sulawesi Tengah', 5000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(27, 'Maluku', 'Jawa Tengah', 1000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(28, 'Sulawesi Tenggara', 'Nusa Tenggara Barat', 2000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(29, 'Aceh', 'Papua', 4000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(30, 'Kalimantan Tengah', 'Jawa Timur', 10000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(31, 'Nusa Tenggara Timur', 'Kalimantan Barat', 20000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(32, 'Kalimantan Timur', 'Gorontalo', 4000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(33, 'Jambi', 'Sulawesi Tenggara', 3000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(34, 'Nusa Tenggara Barat', 'Papua', 1000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(35, 'Gorontalo', 'Sulawesi Tenggara', 10000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(36, 'DI Yogyakarta', 'Sulawesi Tenggara', 3000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(37, 'DKI Jakarta', 'Sulawesi Utara', 3000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(38, 'Jawa Timur', 'Aceh', 20000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(39, 'Papua Barat', 'Sumatera Utara', 5000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(40, 'Nusa Tenggara Barat', 'Bali', 2000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(41, 'Sulawesi Tenggara', 'Jawa Tengah', 4000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(42, 'Lampung', 'Lampung', 10000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(43, 'Papua', 'Nusa Tenggara Barat', 5000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(44, 'Gorontalo', 'Bengkulu', 2000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(45, 'Lampung', 'Bali', 10000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(46, 'Sulawesi Utara', 'Sumatera Utara', 1000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(47, 'Maluku Utara', 'Jambi', 20000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(48, 'Kalimantan Barat', 'Bengkulu', 2000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(49, 'Kalimantan Barat', 'Sumatera Utara', 3000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(50, 'DI Yogyakarta', 'Jawa Barat', 5000000, 'Tersimpan', '---', '2022-01-05 06:33:19', '2022-01-05 06:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` bigint(20) UNSIGNED NOT NULL,
  `Admin_idAdmin` bigint(20) UNSIGNED NOT NULL,
  `Barang_idBarang` bigint(20) UNSIGNED NOT NULL,
  `Barang_Pengirim_idPengirim` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `Admin_idAdmin`, `Barang_idBarang`, `Barang_Pengirim_idPengirim`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'diproses', '2022-01-05 06:33:19', '2022-01-05 06:34:36'),
(2, 1, 2, 2, 'tertunda', '2022-01-05 06:33:19', '2022-01-05 06:33:19'),
(3, 1, 3, 3, 'tertunda', '2022-01-05 06:33:19', '2022-01-05 06:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', NULL, '$2y$10$Ue35Og/8qD3pwC8/ucjCJ.Cqg2Qqb58LQR3bslVWVfU8TJfDo9myK', NULL, NULL, NULL),
(2, 'test', 'admin@example.com', NULL, '$2y$10$2rkgW8ZYFy2P67uUiglyGOXwLM93dlXKktWXrFG2cTE7EGzTb44yq', 'wW6uONCdbhW1lBIEjrKvHrfpMVHT5RagaU0DqiKxFlyVbqGORyM51B4n6U0e', '2022-01-05 13:10:31', '2022-01-05 13:10:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`),
  ADD KEY `barang_pengirim_idpengirim_foreign` (`Pengirim_idPengirim`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`idInvoice`),
  ADD KEY `invoice_transaksi_id_transaksi_foreign` (`Transaksi_id_Transaksi`),
  ADD KEY `invoice_transaksi_admin_idadmin_foreign` (`Transaksi_Admin_idAdmin`),
  ADD KEY `invoice_transaksi_barang_idbarang_foreign` (`Transaksi_Barang_idBarang`),
  ADD KEY `invoice_transaksi_barang_pengirim_idpengirim_foreign` (`Transaksi_Barang_Pengirim_idPengirim`),
  ADD KEY `invoice_jadwal_idjadwal_foreign` (`Jadwal_idJadwal`),
  ADD KEY `invoice_jadwal_admin_idadmin_foreign` (`Jadwal_Admin_idAdmin`),
  ADD KEY `invoice_jadwal_kendaraan_idkendaraan_foreign` (`Jadwal_Kendaraan_idKendaraan`),
  ADD KEY `invoice_jadwal_kendaraan_supir_idsupir_foreign` (`Jadwal_Kendaraan_Supir_idSupir`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`),
  ADD KEY `jadwal_admin_idadmin_foreign` (`Admin_idAdmin`),
  ADD KEY `jadwal_kendaraan_idkendaraan_foreign` (`Kendaraan_idKendaraan`),
  ADD KEY `jadwal_kendaraan_supir_idsupir_foreign` (`Kendaraan_Supir_idSupir`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`idKendaraan`),
  ADD KEY `kendaraan_supir_idsupir_foreign` (`Supir_idSupir`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muatan`
--
ALTER TABLE `muatan`
  ADD PRIMARY KEY (`idMuatan`),
  ADD KEY `muatan_pengirim_id_foreign` (`pengirim_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengirim`
--
ALTER TABLE `pengirim`
  ADD PRIMARY KEY (`idPengirim`),
  ADD UNIQUE KEY `pengirim_email_unique` (`email`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`idSupir`),
  ADD UNIQUE KEY `supir_email_unique` (`email`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`idTarif`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `transaksi_admin_idadmin_foreign` (`Admin_idAdmin`),
  ADD KEY `transaksi_barang_idbarang_foreign` (`Barang_idBarang`),
  ADD KEY `transaksi_barang_pengirim_idpengirim_foreign` (`Barang_Pengirim_idPengirim`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idBarang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `idInvoice` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idJadwal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `idKendaraan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `muatan`
--
ALTER TABLE `muatan`
  MODIFY `idMuatan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengirim`
--
ALTER TABLE `pengirim`
  MODIFY `idPengirim` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supir`
--
ALTER TABLE `supir`
  MODIFY `idSupir` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `idTarif` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_pengirim_idpengirim_foreign` FOREIGN KEY (`Pengirim_idPengirim`) REFERENCES `pengirim` (`idPengirim`) ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_jadwal_admin_idadmin_foreign` FOREIGN KEY (`Jadwal_Admin_idAdmin`) REFERENCES `jadwal` (`Admin_idAdmin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_jadwal_idjadwal_foreign` FOREIGN KEY (`Jadwal_idJadwal`) REFERENCES `jadwal` (`idJadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_jadwal_kendaraan_idkendaraan_foreign` FOREIGN KEY (`Jadwal_Kendaraan_idKendaraan`) REFERENCES `jadwal` (`Kendaraan_idKendaraan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_jadwal_kendaraan_supir_idsupir_foreign` FOREIGN KEY (`Jadwal_Kendaraan_Supir_idSupir`) REFERENCES `jadwal` (`Kendaraan_Supir_idSupir`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_transaksi_admin_idadmin_foreign` FOREIGN KEY (`Transaksi_Admin_idAdmin`) REFERENCES `transaksi` (`Admin_idAdmin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_transaksi_barang_idbarang_foreign` FOREIGN KEY (`Transaksi_Barang_idBarang`) REFERENCES `transaksi` (`Barang_idBarang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_transaksi_barang_pengirim_idpengirim_foreign` FOREIGN KEY (`Transaksi_Barang_Pengirim_idPengirim`) REFERENCES `transaksi` (`Barang_Pengirim_idPengirim`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_transaksi_id_transaksi_foreign` FOREIGN KEY (`Transaksi_id_Transaksi`) REFERENCES `transaksi` (`idTransaksi`) ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_admin_idadmin_foreign` FOREIGN KEY (`Admin_idAdmin`) REFERENCES `admin` (`idAdmin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_kendaraan_idkendaraan_foreign` FOREIGN KEY (`Kendaraan_idKendaraan`) REFERENCES `kendaraan` (`idKendaraan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_kendaraan_supir_idsupir_foreign` FOREIGN KEY (`Kendaraan_Supir_idSupir`) REFERENCES `kendaraan` (`Supir_idSupir`) ON UPDATE CASCADE;

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_supir_idsupir_foreign` FOREIGN KEY (`Supir_idSupir`) REFERENCES `supir` (`idSupir`) ON UPDATE CASCADE;

--
-- Constraints for table `muatan`
--
ALTER TABLE `muatan`
  ADD CONSTRAINT `muatan_pengirim_id_foreign` FOREIGN KEY (`pengirim_id`) REFERENCES `pengirim` (`idPengirim`) ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_admin_idadmin_foreign` FOREIGN KEY (`Admin_idAdmin`) REFERENCES `admin` (`idAdmin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_barang_idbarang_foreign` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_barang_pengirim_idpengirim_foreign` FOREIGN KEY (`Barang_Pengirim_idPengirim`) REFERENCES `pengirim` (`idPengirim`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
