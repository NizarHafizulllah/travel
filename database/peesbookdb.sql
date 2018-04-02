-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 03:12 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `peesbookdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dpa`
--

CREATE TABLE IF NOT EXISTS `dpa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `dir` varchar(50) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `dpa`
--

INSERT INTO `dpa` (`id`, `judul`, `deskripsi`, `dir`, `id_kegiatan`, `id_program`, `tahun`, `tgl_input`) VALUES
(18, '', 'kkegiatan ini smenunjang pendcapain target aaa', '3b2a0f7a636681844a35bc0687f2f770.pdf', 32, 0, 2018, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_tfi`
--

CREATE TABLE IF NOT EXISTS `kegiatan_tfi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tfi` int(11) NOT NULL,
  `kegiatan_utm` text NOT NULL,
  `anggaran` decimal(11,2) NOT NULL,
  `sumber` varchar(20) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `kegiatan_tfi`
--

INSERT INTO `kegiatan_tfi` (`id`, `id_tfi`, `kegiatan_utm`, `anggaran`, `sumber`, `tahun`) VALUES
(29, 11, 'Koordinasi dan Fasilitasi Pembangunan Science Techno Park', 159756250.00, 'APBD', 2018),
(30, 11, 'Koordinasi pengembangan inovasi daerah', 0.00, '', 2018),
(31, 11, 'Pengkajian Masalah-masalah Strategis Pembangunan Daerah', 562754000.00, 'APBD', 2018),
(32, 11, 'Koordinasi dan Fasilitasi Dewan Riset Daerah', 308930500.00, 'APBD', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `m_kegiatan`
--

CREATE TABLE IF NOT EXISTS `m_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kegiatan` varchar(50) NOT NULL,
  `id_program` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_program`
--

CREATE TABLE IF NOT EXISTS `m_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `jabatan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `level`, `nama`, `foto`, `nip`, `jabatan`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'DR. DEDY HERIWIBOWO, S.Si.,M.Si.', 'avatar2.jpg', '19750620 200604 1 007', 'Kepala Sub Bidang Penelitian dan Pengkajian Strategis Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah Kabupaten Sumbawa'),
(2, 'kabid', '0cc175b9c0f1b6a831c399e269772661', 2, 'E.S. ADI NUSANTARA H. ST.,M.Sc..', 'avatar2.jpg', '19761024 20021 21 004', 'Kepala Bidang Penelitian, Pengembangan dan Evaluasi Perencanaan Pembangunan Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah Kabupaten Sumbawa');

-- --------------------------------------------------------

--
-- Table structure for table `sasaran`
--

CREATE TABLE IF NOT EXISTS `sasaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sasaran` text NOT NULL,
  `id_tfi` int(11) NOT NULL,
  `indikator` text NOT NULL,
  `target` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `sasaran`
--

INSERT INTO `sasaran` (`id`, `sasaran`, `id_tfi`, `indikator`, `target`) VALUES
(35, 'Meningkatnya produk ino-vasi daerah yang dimple-mentasikan', 11, 'Persentase pelaku usaha lulus seleksi yang dapat terfasilitasi dalam inkubasi bisnis Sumbawa Techno Park (STP)', 100),
(36, '', 11, 'Persentase usulan inovasi OPD lulus seleksi yang dapat difasilitasi penerapannya.', 100),
(37, 'Meningkatnya hasil peneli-tian dan pengembangan yang ditindaklanjuti dalam perencanaan dan pemba-ngunan daerah', 11, 'Persentase rencana penelitian dan pengembangan yang dapat dilaksanakan', 100),
(38, '', 11, 'Persentase pemanfaatan hasil penelitian dan pengembangan yang telah dilaksanakan', 80);

-- --------------------------------------------------------

--
-- Table structure for table `sop`
--

CREATE TABLE IF NOT EXISTS `sop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `dir` text NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sop`
--

INSERT INTO `sop` (`id`, `judul`, `deskripsi`, `dir`, `id_kegiatan`, `id_program`, `tahun`, `tgl_input`) VALUES
(1, '', 'test', '1d3a32d05833f45bb7e744b64f703dcf.pdf', 32, 0, 2018, '0000-00-00 00:00:00'),
(2, '', 'aaaku', '69822e2736b7845cc57a07fee7a2ee16.pdf', 29, 0, 2018, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sasaran`
--

CREATE TABLE IF NOT EXISTS `sub_sasaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indikator` text NOT NULL,
  `target` int(3) NOT NULL,
  `id_sasaran` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tfi`
--

CREATE TABLE IF NOT EXISTS `tfi` (
  `id_tfi` int(11) NOT NULL AUTO_INCREMENT,
  `nm_pihak_pertama` varchar(50) NOT NULL,
  `nip_pihak_pertama` varchar(25) NOT NULL,
  `jb_pihak_pertama` text NOT NULL,
  `nm_pihak_kedua` varchar(50) NOT NULL,
  `nip_pihak_kedua` varchar(25) NOT NULL,
  `jb_pihak_kedua` text NOT NULL,
  `tmpt` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_tfi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tfi`
--

INSERT INTO `tfi` (`id_tfi`, `nm_pihak_pertama`, `nip_pihak_pertama`, `jb_pihak_pertama`, `nm_pihak_kedua`, `nip_pihak_kedua`, `jb_pihak_kedua`, `tmpt`, `tgl`, `id_kegiatan`, `user_input`, `tgl_input`) VALUES
(11, 'DR. DEDY HERIWIBOWO, S.Si.,M.Si.', '19750620 200604 1 007', 'Kepala Sub Bidang Penelitian dan Pengkajian Strategis Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah Kabupaten Sumbawa', 'E.S. ADI NUSANTARA H. ST.,M.Sc..', '19761024 20021 21 004', 'Kepala Bidang Penelitian, Pengembangan dan Evaluasi Perencanaan Pembangunan Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah Kabupaten Sumbawa', 'Sumbawa Besar', '2018-03-23', 0, 'DR. DEDY HERIWIBOWO, S.Si.,M.Si.', '2018-03-23 08:17:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
