-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db_ekspedisi_mlg
-- ------------------------------------------------------
-- Server version	10.5.12-MariaDB-0+deb11u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `idAdmin` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_admin` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telpon` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idAdmin`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Admin','rahasia','081234567890','admin@mail.com','$2y$10$P32eCyl8/Lml5L0LZjiWb.LaoPEug9wJ5wVJ1LEgEfJJ5Td64e3YC','',NULL,NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `idBarang` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_barang` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_barang` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pengirim_idPengirim` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idBarang`),
  KEY `barang_pengirim_idpengirim_foreign` (`Pengirim_idPengirim`),
  CONSTRAINT `barang_pengirim_idpengirim_foreign` FOREIGN KEY (`Pengirim_idPengirim`) REFERENCES `pengirim` (`idPengirim`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `idInvoice` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Transaksi_id_Transaksi` bigint(20) unsigned NOT NULL,
  `Transaksi_Admin_idAdmin` bigint(20) unsigned NOT NULL,
  `Transaksi_Barang_idBarang` bigint(20) unsigned NOT NULL,
  `Transaksi_Barang_Pengirim_idPengirim` bigint(20) unsigned NOT NULL,
  `Jadwal_idJadwal` bigint(20) unsigned NOT NULL,
  `Jadwal_Admin_idAdmin` bigint(20) unsigned NOT NULL,
  `Jadwal_Kendaraan_idKendaraan` bigint(20) unsigned NOT NULL,
  `Jadwal_Kendaraan_Supir_idSupir` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idInvoice`),
  KEY `invoice_transaksi_id_transaksi_foreign` (`Transaksi_id_Transaksi`),
  KEY `invoice_transaksi_admin_idadmin_foreign` (`Transaksi_Admin_idAdmin`),
  KEY `invoice_transaksi_barang_idbarang_foreign` (`Transaksi_Barang_idBarang`),
  KEY `invoice_transaksi_barang_pengirim_idpengirim_foreign` (`Transaksi_Barang_Pengirim_idPengirim`),
  KEY `invoice_jadwal_idjadwal_foreign` (`Jadwal_idJadwal`),
  KEY `invoice_jadwal_admin_idadmin_foreign` (`Jadwal_Admin_idAdmin`),
  KEY `invoice_jadwal_kendaraan_idkendaraan_foreign` (`Jadwal_Kendaraan_idKendaraan`),
  KEY `invoice_jadwal_kendaraan_supir_idsupir_foreign` (`Jadwal_Kendaraan_Supir_idSupir`),
  CONSTRAINT `invoice_jadwal_admin_idadmin_foreign` FOREIGN KEY (`Jadwal_Admin_idAdmin`) REFERENCES `jadwal` (`Admin_idAdmin`) ON UPDATE CASCADE,
  CONSTRAINT `invoice_jadwal_idjadwal_foreign` FOREIGN KEY (`Jadwal_idJadwal`) REFERENCES `jadwal` (`idJadwal`) ON UPDATE CASCADE,
  CONSTRAINT `invoice_jadwal_kendaraan_idkendaraan_foreign` FOREIGN KEY (`Jadwal_Kendaraan_idKendaraan`) REFERENCES `jadwal` (`Kendaraan_idKendaraan`) ON UPDATE CASCADE,
  CONSTRAINT `invoice_jadwal_kendaraan_supir_idsupir_foreign` FOREIGN KEY (`Jadwal_Kendaraan_Supir_idSupir`) REFERENCES `jadwal` (`Kendaraan_Supir_idSupir`) ON UPDATE CASCADE,
  CONSTRAINT `invoice_transaksi_admin_idadmin_foreign` FOREIGN KEY (`Transaksi_Admin_idAdmin`) REFERENCES `transaksi` (`Admin_idAdmin`) ON UPDATE CASCADE,
  CONSTRAINT `invoice_transaksi_barang_idbarang_foreign` FOREIGN KEY (`Transaksi_Barang_idBarang`) REFERENCES `transaksi` (`Barang_idBarang`) ON UPDATE CASCADE,
  CONSTRAINT `invoice_transaksi_barang_pengirim_idpengirim_foreign` FOREIGN KEY (`Transaksi_Barang_Pengirim_idPengirim`) REFERENCES `transaksi` (`Barang_Pengirim_idPengirim`) ON UPDATE CASCADE,
  CONSTRAINT `invoice_transaksi_id_transaksi_foreign` FOREIGN KEY (`Transaksi_id_Transaksi`) REFERENCES `transaksi` (`idTransaksi`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal` (
  `idJadwal` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Admin_idAdmin` bigint(20) unsigned NOT NULL,
  `Kendaraan_idKendaraan` bigint(20) unsigned NOT NULL,
  `Kendaraan_Supir_idSupir` bigint(20) unsigned NOT NULL,
  `tanggal_pemberangkatan` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idJadwal`),
  KEY `jadwal_admin_idadmin_foreign` (`Admin_idAdmin`),
  KEY `jadwal_kendaraan_idkendaraan_foreign` (`Kendaraan_idKendaraan`),
  KEY `jadwal_kendaraan_supir_idsupir_foreign` (`Kendaraan_Supir_idSupir`),
  CONSTRAINT `jadwal_admin_idadmin_foreign` FOREIGN KEY (`Admin_idAdmin`) REFERENCES `admin` (`idAdmin`) ON UPDATE CASCADE,
  CONSTRAINT `jadwal_kendaraan_idkendaraan_foreign` FOREIGN KEY (`Kendaraan_idKendaraan`) REFERENCES `kendaraan` (`idKendaraan`) ON UPDATE CASCADE,
  CONSTRAINT `jadwal_kendaraan_supir_idsupir_foreign` FOREIGN KEY (`Kendaraan_Supir_idSupir`) REFERENCES `kendaraan` (`Supir_idSupir`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kendaraan`
--

DROP TABLE IF EXISTS `kendaraan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kendaraan` (
  `idKendaraan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_kendaraan` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plat_kendaraan` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_kendaraan` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Supir_idSupir` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idKendaraan`),
  KEY `kendaraan_supir_idsupir_foreign` (`Supir_idSupir`),
  CONSTRAINT `kendaraan_supir_idsupir_foreign` FOREIGN KEY (`Supir_idSupir`) REFERENCES `supir` (`idSupir`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kendaraan`
--

LOCK TABLES `kendaraan` WRITE;
/*!40000 ALTER TABLE `kendaraan` DISABLE KEYS */;
INSERT INTO `kendaraan` VALUES (1,'pickup','P 3991 VR','2001',1,'2022-01-14 14:09:05','2022-01-14 14:09:05'),(2,'pickup','P 3955 VR','2016',2,'2022-01-14 14:09:05','2022-01-14 14:09:05'),(3,'pickup','P 8513 VR','2019',3,'2022-01-14 14:09:05','2022-01-14 14:09:05'),(4,'truk','P 9861 VR','2012',4,'2022-01-14 14:09:05','2022-01-14 14:09:05'),(5,'truk','P 5179 VR','2010',5,'2022-01-14 14:09:05','2022-01-14 14:09:05'),(6,'pickup','P 5828 VR','2008',6,'2022-01-14 14:09:05','2022-01-14 14:09:05'),(7,'truk','P 6971 VR','2018',7,'2022-01-14 14:09:05','2022-01-14 14:09:05'),(8,'truk','P 1213 VR','2004',8,'2022-01-14 14:09:05','2022-01-14 14:09:05'),(9,'truk','P 8287 VR','2006',9,'2022-01-14 14:09:05','2022-01-14 14:09:05'),(10,'truk','P 8427 VR','2018',10,'2022-01-14 14:09:05','2022-01-14 14:09:05');
/*!40000 ALTER TABLE `kendaraan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (69,'2014_10_12_000000_create_users_table',1),(70,'2014_10_12_100000_create_password_resets_table',1),(71,'2019_08_19_000000_create_failed_jobs_table',1),(72,'2021_07_10_140223_create_pengirims_table',1),(73,'2021_07_10_140301_create_supirs_table',1),(74,'2021_07_10_140308_create_kendaraans_table',1),(75,'2021_07_10_140401_create_admins_table',1),(76,'2021_07_10_140409_create_jadwals_table',1),(77,'2021_07_10_140431_create_barangs_table',1),(78,'2021_07_10_140502_create_transaksis_table',1),(79,'2021_07_10_140552_create_invoices_table',1),(80,'2021_07_11_092916_create_tarifs_table',1),(81,'2021_07_11_102036_add_keterangan_to_tarif_table',1),(82,'2021_10_31_060717_add_status_to_supir_table',1),(83,'2021_10_31_060944_add_status_to_transaksi_table',1),(84,'2021_11_27_000349_add_column_tanggal_to_jadwal_table',1),(85,'2021_11_28_204429_create_muatan_table',1),(86,'2022_01_13_201654_create_table_tracking',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `muatan`
--

DROP TABLE IF EXISTS `muatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `muatan` (
  `idMuatan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_muatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim_id` bigint(20) unsigned NOT NULL,
  `tanggal_muat` date NOT NULL,
  `lokasi_kirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan_muatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idMuatan`),
  KEY `muatan_pengirim_id_foreign` (`pengirim_id`),
  CONSTRAINT `muatan_pengirim_id_foreign` FOREIGN KEY (`pengirim_id`) REFERENCES `pengirim` (`idPengirim`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `muatan`
--

LOCK TABLES `muatan` WRITE;
/*!40000 ALTER TABLE `muatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `muatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengirim`
--

DROP TABLE IF EXISTS `pengirim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengirim` (
  `idPengirim` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telpon` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPengirim`),
  UNIQUE KEY `pengirim_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengirim`
--

LOCK TABLES `pengirim` WRITE;
/*!40000 ALTER TABLE `pengirim` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengirim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supir`
--

DROP TABLE IF EXISTS `supir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supir` (
  `idSupir` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_supir` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supircadang` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_supir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telpon` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idSupir`),
  UNIQUE KEY `supir_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supir`
--

LOCK TABLES `supir` WRITE;
/*!40000 ALTER TABLE `supir` DISABLE KEYS */;
INSERT INTO `supir` VALUES (1,'Kezia Anggraini','Simon Maulana','Jr. Suniaraja No. 677, Subulussalam 18229, Kalteng','08935759990','jais.kuswoyo@yahoo.com','$2y$10$3e5t1xGQXpUpz.u2bVVxeu2cZpUc2dCGiI5hTQAHx3Y6TmOnCcPge','baru','$2y$10$0RW2yk4QRTdFuhY.PBI6MeMIxk8OePkKhI0OsPeR/zk5Zu2gKcLw2','2022-01-14 14:09:03','2022-01-14 14:09:03'),(2,'Melinda Maria Yuniar S.Pt','Damu Pangestu','Ds. S. Parman No. 552, Administrasi Jakarta Pusat 23875, NTB','08278322588','mhariyah@prayoga.co.id','$2y$10$jlOZrM8pQlm2TMbHHNmTYOg2nsaDHcMPDQldnfRTSZcB9y5BnU8CG','baru','$2y$10$oU3UqI2710BDwaWxR4pfdus754zyrcv6GiDjs2SkokJF4Y5yOTNSm','2022-01-14 14:09:03','2022-01-14 14:09:03'),(3,'Anita Oktaviani','Farhunnisa Yulianti','Ds. Jend. Sudirman No. 545, Jayapura 59751, Lampung','08765245287','nprayoga@yuniar.my.id','$2y$10$/TLUrltds8cQ/nt0JZX0..dYJhHevyGysows5ApRpjZPGdJGBsOG2','baru','$2y$10$wi9lUJ0GsgR9YGVukb7ZYu/AJbqKmxmj6VyJmW5fxjW8nwW6PA64i','2022-01-14 14:09:03','2022-01-14 14:09:03'),(4,'Iriana Febi Pertiwi','Iriana Qori Purwanti','Psr. Teuku Umar No. 558, Bogor 67078, Kaltim','08454568694','janet33@yahoo.co.id','$2y$10$yzX3ddFxPOVbn9IuNKDBiueAplsvw0H5/p8QKtN2Xm32v5GEamhma','baru','$2y$10$d2WnyAw6c.JN0aN7YpMnd.1jwEvwXTkeIhCNa6hbnPgfZLU/5PBnq','2022-01-14 14:09:03','2022-01-14 14:09:03'),(5,'Kayun Dono Rajasa','Laras Aryani','Gg. Setiabudhi No. 875, Pekanbaru 66595, NTT','08498502030','siska37@yahoo.co.id','$2y$10$opynKxPk7jt3FN/Mgims3u4Uc6H64jB1uobS0SH3W75eu05Jq/s0u','baru','$2y$10$/T1XMr.ei2AByOTQ4GFql.WrJnxm0u9QAPTk2.6FFS7lGQrxTEdXi','2022-01-14 14:09:04','2022-01-14 14:09:04'),(6,'Suci Kamaria Laksmiwati M.Ak','Jaswadi Gaduh Sitorus M.Farm','Psr. Cikutra Timur No. 876, Administrasi Jakarta Barat 73199, Sulbar','08849874900','ciaobella.haryanto@gmail.co.id','$2y$10$g1X5g6JcG6iFqXznGR6IA.0HjwUrOEAt.yugOIqC82ubgEGIA1AAC','baru','$2y$10$RAVb5I5QmIgtMgjcOMmdu.WZk/sb/4QAfx7TYzzVgozzRiL7qaCHS','2022-01-14 14:09:04','2022-01-14 14:09:04'),(7,'Adhiarja Irawan','Wawan Waskita S.Sos','Jln. Casablanca No. 166, Sawahlunto 11133, NTT','08644680178','tantri39@gmail.co.id','$2y$10$pwrvDioqz1RQV4JLRVJ5UuSVRWnGLCo5ljLF9dFVPp8bv9R0iq11S','baru','$2y$10$HTtj0Bs.yk9Z2xv.T/PRIebzT4mQc3mIGs2RNpaTU4PK5MzIyqZl2','2022-01-14 14:09:04','2022-01-14 14:09:04'),(8,'Martana Nugroho','Jinawi Wacana','Ki. Otto No. 742, Samarinda 15420, Babel','08178500593','nova02@anggriawan.co','$2y$10$.KVKe5eYb.8UAmd8ptaW5OQ1/HVEIb4o7CIr41loN5LuS15op72z2','baru','$2y$10$9m.Fh5m4Q7rQpHp4zbRIVOTHjwrt4/krtCVX//X.fFHN7yntHuXfG','2022-01-14 14:09:04','2022-01-14 14:09:04'),(9,'Simon Saptono S.Sos','Luthfi Prakasa','Gg. Wahidin Sudirohusodo No. 190, Batam 30117, Sultra','08663138562','marpaung.citra@andriani.name','$2y$10$97CHevouyUr9S11zKN5ox.6bViVz9G6wCXqxM1DJ.80lWPNZTFHoS','baru','$2y$10$9fsxRdXblRZxcMpeEsMa5OVKGHqN0VcIbrRlI7ojGaGaRjgq7EoMq','2022-01-14 14:09:04','2022-01-14 14:09:04'),(10,'Elvina Hassanah S.Pd','Maya Wulandari','Jln. Dewi Sartika No. 156, Bitung 68407, Papua','08151413715','gamblang76@yahoo.co.id','$2y$10$x3zWysNCxtqpwO7Gw2IXK.ND9LKAhHDGQPttoF.CyK08MalAeV3x6','baru','$2y$10$jgMtLQaPU4Tuj3rd/g9jYuPE1LyTm3l/7Md/4vH4VXUrp/nCQMIt6','2022-01-14 14:09:05','2022-01-14 14:09:05');
/*!40000 ALTER TABLE `supir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarif` (
  `idTarif` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titik_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idTarif`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarif`
--

LOCK TABLES `tarif` WRITE;
/*!40000 ALTER TABLE `tarif` DISABLE KEYS */;
INSERT INTO `tarif` VALUES (51,'BWI','JKT Pasar Induk',4500000,'Tersimpan','---','2022-01-14 14:10:29','2022-01-14 14:10:46');
/*!40000 ALTER TABLE `tarif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tracking`
--

DROP TABLE IF EXISTS `tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tracking` (
  `idTracking` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Supir_idSupir` bigint(20) unsigned NOT NULL,
  `muatan_idMuatan` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idTracking`),
  KEY `tracking_supir_idsupir_foreign` (`Supir_idSupir`),
  KEY `tracking_muatan_idmuatan_foreign` (`muatan_idMuatan`),
  CONSTRAINT `tracking_muatan_idmuatan_foreign` FOREIGN KEY (`muatan_idMuatan`) REFERENCES `muatan` (`idMuatan`) ON UPDATE CASCADE,
  CONSTRAINT `tracking_supir_idsupir_foreign` FOREIGN KEY (`Supir_idSupir`) REFERENCES `supir` (`idSupir`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tracking`
--

LOCK TABLES `tracking` WRITE;
/*!40000 ALTER TABLE `tracking` DISABLE KEYS */;
/*!40000 ALTER TABLE `tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `idTransaksi` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Admin_idAdmin` bigint(20) unsigned NOT NULL,
  `Barang_idBarang` bigint(20) unsigned NOT NULL,
  `Barang_Pengirim_idPengirim` bigint(20) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idTransaksi`),
  KEY `transaksi_admin_idadmin_foreign` (`Admin_idAdmin`),
  KEY `transaksi_barang_idbarang_foreign` (`Barang_idBarang`),
  KEY `transaksi_barang_pengirim_idpengirim_foreign` (`Barang_Pengirim_idPengirim`),
  CONSTRAINT `transaksi_admin_idadmin_foreign` FOREIGN KEY (`Admin_idAdmin`) REFERENCES `admin` (`idAdmin`) ON UPDATE CASCADE,
  CONSTRAINT `transaksi_barang_idbarang_foreign` FOREIGN KEY (`Barang_idBarang`) REFERENCES `barang` (`idBarang`) ON UPDATE CASCADE,
  CONSTRAINT `transaksi_barang_pengirim_idpengirim_foreign` FOREIGN KEY (`Barang_Pengirim_idPengirim`) REFERENCES `pengirim` (`idPengirim`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@mail.com',NULL,'$2y$10$tmcD1qKhPEq9mhw2oN0VY.O4Er/lRqTnDcsijRqRVYisl8y5uTzwq',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-14 21:13:22
