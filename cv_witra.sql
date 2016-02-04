-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cv_witra
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `confirm_lelang`
--

DROP TABLE IF EXISTS `confirm_lelang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `confirm_lelang` (
  `id_confirm` int(11) NOT NULL AUTO_INCREMENT,
  `id_daftar_pemenang` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_confirm`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `daftar_pemenang`
--

DROP TABLE IF EXISTS `daftar_pemenang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daftar_pemenang` (
  `id_daftar_pemenang` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_iklan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_daftar_pemenang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `iklan`
--

DROP TABLE IF EXISTS `iklan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iklan` (
  `id_iklan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tgl_iklan` date NOT NULL,
  `file_iklan` varchar(35) NOT NULL,
  `judul_iklan` varchar(35) NOT NULL,
  `isi_iklan` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_iklan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_iklan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `waktu_komentar` date NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lelang`
--

DROP TABLE IF EXISTS `lelang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lelang` (
  `id_lelang` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_iklan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `ikhtisar` longtext NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `status_menang` enum('0','1') NOT NULL,
  `checked` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_lelang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notif_comentar`
--

DROP TABLE IF EXISTS `notif_comentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notif_comentar` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `id_iklan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_notif`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tahun_berdiri` date NOT NULL,
  `profil` longtext NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rekening`
--

DROP TABLE IF EXISTS `rekening`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rekening` (
  `id_rek` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `bank_rek` varchar(20) NOT NULL,
  `holder_rek` varchar(35) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  PRIMARY KEY (`id_rek`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tutorial`
--

DROP TABLE IF EXISTS `tutorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutorial` (
  `id_tutorial` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `kategori` enum('0','1') NOT NULL,
  `isi` longtext NOT NULL,
  PRIMARY KEY (`id_tutorial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `hak_akses` enum('0','1') NOT NULL,
  `block` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-04 14:20:49
