-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2015 at 10:45 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cv_witra`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_pemenang`
--

CREATE TABLE IF NOT EXISTS `daftar_pemenang` (
  `id_daftar_pemenang` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_iklan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_daftar_pemenang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `daftar_pemenang`
--

INSERT INTO `daftar_pemenang` (`id_daftar_pemenang`, `id_user`, `id_admin`, `id_iklan`, `tanggal`) VALUES
(4, 2, 1, 2, '2015-12-17'),
(5, 2, 1, 1, '2015-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE IF NOT EXISTS `iklan` (
  `id_iklan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tgl_iklan` date NOT NULL,
  `file_iklan` varchar(35) NOT NULL,
  `judul_iklan` varchar(35) NOT NULL,
  `isi_iklan` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_iklan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`id_iklan`, `id_user`, `tgl_iklan`, `file_iklan`, `judul_iklan`, `isi_iklan`, `status`) VALUES
(1, 1, '2015-12-15', '1_20151215_110736.zip', 'test', 'coba', '1'),
(2, 1, '2015-12-16', '1_20151216_090229.zip', 'Iklan percobaan Ke 3', 'Ini iklan ke 3 :<br>\r\nFile Terlampir', '1'),
(3, 1, '2015-12-16', '1_20151216_090251.zip', 'ini Iklan ke 4', 'Ini percobaan iklan ke 4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_iklan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `waktu_komentar` date NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_iklan`, `id_user`, `isi_komentar`, `waktu_komentar`, `jam`) VALUES
(1, 1, 1, 'testing', '2015-12-15', '21:15:45'),
(2, 1, 2, 'coba', '2015-12-15', '21:15:56'),
(3, 1, 2, 'coba lagi', '2015-12-16', '03:10:36'),
(4, 1, 1, 'coba apa ??', '2015-12-16', '03:10:56'),
(5, 1, 2, 'gak tau nih', '2015-12-16', '03:14:59'),
(6, 2, 2, 'boleh saya ikut ?', '2015-12-16', '09:03:08'),
(7, 3, 2, 'boleh saya ikut ?', '2015-12-16', '09:03:18'),
(8, 2, 1, 'silahkan', '2015-12-16', '09:03:40'),
(9, 3, 1, 'silahkan', '2015-12-16', '09:03:44'),
(10, 1, 1, 'masa gak tau', '2015-12-17', '05:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE IF NOT EXISTS `lelang` (
  `id_lelang` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_iklan` int(11) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `status_menang` enum('0','1') NOT NULL,
  `checked` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_lelang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lelang`
--

INSERT INTO `lelang` (`id_lelang`, `id_user`, `id_iklan`, `nama_file`, `status_menang`, `checked`) VALUES
(1, 2, 1, '2-15122015120512-db_cv_witra.zip', '0', '0'),
(2, 2, 2, '2-16122015090434-db_cv_witra.zip', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `notif_comentar`
--

CREATE TABLE IF NOT EXISTS `notif_comentar` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `id_iklan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_notif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `notif_comentar`
--

INSERT INTO `notif_comentar` (`id_notif`, `id_iklan`, `id_user`, `status`) VALUES
(1, 1, 1, '0'),
(2, 1, 2, '1'),
(3, 2, 1, '0'),
(4, 3, 1, '0'),
(5, 2, 2, '0'),
(6, 3, 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tahun_berdiri` date NOT NULL,
  `profil` longtext NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
  `id_rek` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `bank_rek` varchar(20) NOT NULL,
  `holder_rek` varchar(35) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  PRIMARY KEY (`id_rek`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rek`, `id_user`, `bank_rek`, `holder_rek`, `no_rek`) VALUES
(2, 1, 'Riau', 'Gandhi', '098823456'),
(3, 2, 'Riau', 'Galung', '98833456');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE IF NOT EXISTS `tutorial` (
  `id_tutorial` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `kategori` enum('0','1') NOT NULL,
  `isi` longtext NOT NULL,
  PRIMARY KEY (`id_tutorial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `hak_akses` enum('0','1') NOT NULL,
  `block` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_hp`, `email`, `username`, `password`, `hak_akses`, `block`) VALUES
(1, 'admin', '', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1'),
(2, 'Galung', '082388715998', 'galung@ymail.com', 'galung', '2a73ac17d4d6653f3edbe8265fbf3a94', '0', '0'),
(3, 'Gandhi', '082388715998', 'gandhiw@ymail.com', 'gandhi', 'f18ed7847686171c3f3f8670cdb0291e', '0', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
