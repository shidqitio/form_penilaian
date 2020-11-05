-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 09:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c4db_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bertugas_sebagai`
--

CREATE TABLE `bertugas_sebagai` (
  `id` int(5) NOT NULL,
  `bertugas_sebagai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bertugas_sebagai`
--

INSERT INTO `bertugas_sebagai` (`id`, `bertugas_sebagai`) VALUES
(1, 'Pemantau'),
(2, 'PJTU'),
(3, 'PJLU'),
(4, 'Pendamping');

-- --------------------------------------------------------

--
-- Table structure for table `form_evaluasi`
--

CREATE TABLE `form_evaluasi` (
  `no` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_ujian` varchar(50) NOT NULL,
  `tugas` varchar(20) NOT NULL,
  `masa_ujian` varchar(15) NOT NULL,
  `upbjj` varchar(50) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `select1` varchar(5) DEFAULT NULL,
  `select2` varchar(5) DEFAULT NULL,
  `select3` varchar(5) DEFAULT NULL,
  `select4` varchar(5) DEFAULT NULL,
  `select5` varchar(5) DEFAULT NULL,
  `select6` varchar(5) DEFAULT NULL,
  `select7` varchar(5) DEFAULT NULL,
  `select8` varchar(5) DEFAULT NULL,
  `select9` varchar(5) DEFAULT NULL,
  `select10` varchar(5) DEFAULT NULL,
  `select11` varchar(5) DEFAULT NULL,
  `select12` varchar(5) DEFAULT NULL,
  `select13` varchar(5) DEFAULT NULL,
  `pesan1` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_evaluasi`
--

INSERT INTO `form_evaluasi` (`no`, `nama`, `tempat_ujian`, `tugas`, `masa_ujian`, `upbjj`, `tanggal_ujian`, `select1`, `select2`, `select3`, `select4`, `select5`, `select6`, `select7`, `select8`, `select9`, `select10`, `select11`, `select12`, `select13`, `pesan1`) VALUES
(1, 'ddwq', 'adwas', 'PJLU', '2022/23.2', '41 Purwokerto', '2020-03-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'dwq', 'qwe', 'Pemantau', '2023/24.1', '41 Purwokerto', '2020-03-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'test123', 'jauh banget', 'Pemantau', '2020/21.2', 'Banda Aceh', '2020-11-04', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form_feedback`
--

CREATE TABLE `form_feedback` (
  `no` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_ujian` varchar(50) DEFAULT NULL,
  `lokasi_ujian` varchar(50) DEFAULT NULL,
  `bertugas_sebagai` varchar(20) DEFAULT NULL,
  `upbjj` varchar(50) DEFAULT NULL,
  `masa_ujian` varchar(50) DEFAULT NULL,
  `tanggal_mulai_observasi` date DEFAULT NULL,
  `tanggal_akhir_observasi` date DEFAULT NULL,
  `lokasi1` varchar(50) DEFAULT NULL,
  `aspek1` varchar(50) DEFAULT NULL,
  `praktikbaik1` varchar(100) DEFAULT NULL,
  `temuan1` varchar(50) DEFAULT NULL,
  `saran1` varchar(50) DEFAULT NULL,
  `lokasi2` varchar(50) DEFAULT NULL,
  `aspek2` varchar(75) DEFAULT NULL,
  `praktikbaik2` varchar(100) DEFAULT NULL,
  `temuan2` varchar(50) DEFAULT NULL,
  `saran2` varchar(50) DEFAULT NULL,
  `lokasi3` varchar(50) DEFAULT NULL,
  `aspek3` varchar(75) DEFAULT NULL,
  `praktikbaik3` varchar(100) DEFAULT NULL,
  `temuan3` varchar(50) DEFAULT NULL,
  `saran3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_feedback`
--

INSERT INTO `form_feedback` (`no`, `nama`, `tempat_ujian`, `lokasi_ujian`, `bertugas_sebagai`, `upbjj`, `masa_ujian`, `tanggal_mulai_observasi`, `tanggal_akhir_observasi`, `lokasi1`, `aspek1`, `praktikbaik1`, `temuan1`, `saran1`, `lokasi2`, `aspek2`, `praktikbaik2`, `temuan2`, `saran2`, `lokasi3`, `aspek3`, `praktikbaik3`, `temuan3`, `saran3`) VALUES
(1, 'sekut', 'jajjas', 'liwjdas', 'PJLU', 'Banda Aceh', '2021/22.1', NULL, '2020-03-06', 'njkasdjkawndkjansjkd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'ddsad', '1111', 'dadsdw', 'Pemantau', 'Surakarta', '2020/21.1', NULL, '2020-03-16', 'apa aja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'dsda', '12312', '33121', 'PJTU', '41 Purwokerto', '2022/23.1', NULL, '2020-03-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'saya', 'jauh', 'banget', 'PJTU', '23 Bogor', '2021/22.1', NULL, '2020-05-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'ckiw', 'jsjakw', 'jnsmand', 'Pemantau', '11 Banda Aceh', '2020/21.2', NULL, '2020-08-05', 'ajdkas', 'aliwjdliasjd', 'liajsldkjalk', 'lasjdlaiwjd', 'lijasldijlaw', 'alidjwlaijdn', ',masndlawindl', 'laiwldijalskdj', 'alwmdlaksn', 'lawidlasjdlk', NULL, NULL, NULL, NULL, NULL),
(6, 'test345', 'komdak', 'skmdaw', 'Pemantau', 'Banda Aceh', '2020/21.2', '2020-11-04', '2020-11-11', 'asdaw', 'dasdawdasd', 'wawdasda', 'awdasdawd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form_mra`
--

CREATE TABLE `form_mra` (
  `no` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `upbjj` varchar(50) NOT NULL,
  `masa_ujian` varchar(15) DEFAULT NULL,
  `select1` varchar(15) DEFAULT NULL,
  `select2` varchar(15) DEFAULT NULL,
  `select3` varchar(15) DEFAULT NULL,
  `select4` varchar(15) DEFAULT NULL,
  `select5` varchar(15) DEFAULT NULL,
  `select6` varchar(15) DEFAULT NULL,
  `select7` varchar(15) DEFAULT NULL,
  `select8` varchar(15) DEFAULT NULL,
  `select9` varchar(15) DEFAULT NULL,
  `select10` varchar(15) DEFAULT NULL,
  `select11` varchar(15) DEFAULT NULL,
  `select12` varchar(15) DEFAULT NULL,
  `select13` varchar(15) DEFAULT NULL,
  `select14` varchar(15) DEFAULT NULL,
  `select15` varchar(15) DEFAULT NULL,
  `select16` varchar(15) DEFAULT NULL,
  `select17` varchar(15) DEFAULT NULL,
  `select18` varchar(15) DEFAULT NULL,
  `select19` varchar(15) DEFAULT NULL,
  `select20` varchar(15) DEFAULT NULL,
  `select21` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_mra`
--

INSERT INTO `form_mra` (`no`, `nama`, `upbjj`, `masa_ujian`, `select1`, `select2`, `select3`, `select4`, `select5`, `select6`, `select7`, `select8`, `select9`, `select10`, `select11`, `select12`, `select13`, `select14`, `select15`, `select16`, `select17`, `select18`, `select19`, `select20`, `select21`) VALUES
(1, 'acep', 'Banda Aceh', '2020/21.1', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'pejot', 'Surakarta', '2020/21.1', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'jeng', 'Bandung', '2020/21.1', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'testing kuy', 'Pekanbaru', '2020/21.1', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Cukup mudah', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit'),
(5, 'testing kuy', 'Bandung', '2020/21.1', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Cukup mudah', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit'),
(6, 'testing kuy', '16 Pekanbaru', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Cukup mudah', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit'),
(7, 'bismillah', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL),
(8, 'bismillah', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL),
(9, 'bismillah', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL),
(10, 'bismillah', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL),
(11, 'bismillah', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL),
(12, 'bismillah', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL),
(13, 'bismillah', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL),
(14, 'yukkahh', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'yukkahh', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'yukkahh', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'yukkahh', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'yukkahh', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'yukkahh', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'yukkahh', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'yukkahh', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'yukkahh', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'yukkahh', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'blukblik', '42 Semarang', NULL, 'Sulit', 'Sulit', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'blukblik', '42 Semarang', NULL, 'Sulit', 'Sulit', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'siapa hayo', '24 Bandung', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'siapa hayo', '24 Bandung', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'siapa hayo', '24 Bandung', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'siapa hayo', '24 Bandung', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'siapa hayo', '24 Bandung', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'siapa hayo', '24 Bandung', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'siapa hayo', '24 Bandung', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'siapa hayo', '24 Bandung', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'siapa hayo', '24 Bandung', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'bedugul', '22 Serang', NULL, 'Sulit', 'Mudah', 'Sulit', 'Cukup mudah', 'Cukup mudah', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'bedugul', '22 Serang', NULL, 'Sulit', 'Mudah', 'Sulit', 'Cukup mudah', 'Cukup mudah', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'pirang', '24 Bandung', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL),
(38, 'bedul', '44 Surakarta', NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', NULL, NULL, 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit'),
(39, 'kolot', 'Banda Aceh', '2020/21.2', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit', 'Sulit');

-- --------------------------------------------------------

--
-- Table structure for table `form_pemantau`
--

CREATE TABLE `form_pemantau` (
  `no` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tempat_ujian` varchar(50) NOT NULL,
  `lokasi_ujian` varchar(50) NOT NULL,
  `upbjj` varchar(50) NOT NULL,
  `masa_ujian` varchar(15) DEFAULT NULL,
  `tanggal_ujian` date NOT NULL,
  `select1` varchar(5) DEFAULT NULL,
  `select2` varchar(5) DEFAULT NULL,
  `select3` varchar(5) DEFAULT NULL,
  `select4` varchar(5) DEFAULT NULL,
  `select5` varchar(5) DEFAULT NULL,
  `select6` varchar(5) DEFAULT NULL,
  `select7` varchar(5) DEFAULT NULL,
  `select8` varchar(5) DEFAULT NULL,
  `pesan1` varchar(500) DEFAULT NULL,
  `select9` varchar(5) DEFAULT NULL,
  `pesan2` varchar(500) DEFAULT NULL,
  `select10` varchar(5) DEFAULT NULL,
  `pesan3` varchar(500) DEFAULT NULL,
  `select11` varchar(5) DEFAULT NULL,
  `pesan4` varchar(500) DEFAULT NULL,
  `select12` varchar(5) DEFAULT NULL,
  `select13` varchar(5) DEFAULT NULL,
  `select14` varchar(5) DEFAULT NULL,
  `pesan5` varchar(500) DEFAULT NULL,
  `select15` varchar(5) DEFAULT NULL,
  `pesan6` varchar(500) DEFAULT NULL,
  `select16` varchar(5) DEFAULT NULL,
  `pesan7` varchar(500) DEFAULT NULL,
  `select17` varchar(5) DEFAULT NULL,
  `select18` varchar(5) DEFAULT NULL,
  `pesan8` varchar(500) DEFAULT NULL,
  `select19` varchar(5) DEFAULT NULL,
  `pesan9` varchar(500) DEFAULT NULL,
  `select20` varchar(5) DEFAULT NULL,
  `pesan10` varchar(500) DEFAULT NULL,
  `select21` varchar(5) DEFAULT NULL,
  `pesan11` varchar(500) DEFAULT NULL,
  `select22` varchar(5) DEFAULT NULL,
  `pesan12` varchar(500) DEFAULT NULL,
  `select23` varchar(5) DEFAULT NULL,
  `pesan13` varchar(500) DEFAULT NULL,
  `pesan14` varchar(500) DEFAULT NULL,
  `select24` varchar(5) DEFAULT NULL,
  `pesan15` varchar(500) DEFAULT NULL,
  `pesan16` varchar(500) DEFAULT NULL,
  `select25` varchar(5) DEFAULT NULL,
  `pesan17` varchar(500) DEFAULT NULL,
  `pesan18` varchar(500) DEFAULT NULL,
  `select26` varchar(5) DEFAULT NULL,
  `pesan19` varchar(500) DEFAULT NULL,
  `select27` varchar(5) DEFAULT NULL,
  `pesan20` varchar(500) DEFAULT NULL,
  `select28` varchar(5) DEFAULT NULL,
  `select29` varchar(5) DEFAULT NULL,
  `pesan21` varchar(500) DEFAULT NULL,
  `select30` varchar(5) DEFAULT NULL,
  `select31` varchar(5) DEFAULT NULL,
  `pesan22` varchar(500) DEFAULT NULL,
  `pesan23` varchar(500) DEFAULT NULL,
  `pesan24` varchar(500) DEFAULT NULL,
  `pesan25` varchar(500) DEFAULT NULL,
  `pesan26` varchar(500) DEFAULT NULL,
  `pesan27` varchar(500) DEFAULT NULL,
  `pesan28` varchar(500) DEFAULT NULL,
  `pesan29` varchar(500) DEFAULT NULL,
  `pesan30` varchar(500) DEFAULT NULL,
  `pesan31` varchar(500) DEFAULT NULL,
  `pesan32` varchar(500) DEFAULT NULL,
  `pesan33` varchar(500) DEFAULT NULL,
  `pesan34` varchar(500) DEFAULT NULL,
  `pesan35` varchar(500) DEFAULT NULL,
  `pesan36` varchar(500) DEFAULT NULL,
  `pesan37` varchar(500) DEFAULT NULL,
  `pesan38` varchar(500) DEFAULT NULL,
  `pesan39` varchar(500) DEFAULT NULL,
  `pesan40` varchar(500) DEFAULT NULL,
  `pesan41` varchar(500) DEFAULT NULL,
  `pesan42` varchar(500) DEFAULT NULL,
  `pesan43` varchar(500) DEFAULT NULL,
  `pesan44` varchar(500) DEFAULT NULL,
  `pesan45` varchar(500) DEFAULT NULL,
  `pesan46` varchar(500) DEFAULT NULL,
  `pesan47` varchar(500) DEFAULT NULL,
  `pesan48` varchar(500) DEFAULT NULL,
  `pesan49` varchar(500) DEFAULT NULL,
  `pesan50` varchar(500) DEFAULT NULL,
  `pesan51` varchar(500) DEFAULT NULL,
  `pesan52` varchar(500) DEFAULT NULL,
  `pesan53` varchar(500) DEFAULT NULL,
  `pesan54` varchar(500) DEFAULT NULL,
  `pesan55` varchar(500) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_pemantau`
--

INSERT INTO `form_pemantau` (`no`, `nama`, `nip`, `email`, `tempat_ujian`, `lokasi_ujian`, `upbjj`, `masa_ujian`, `tanggal_ujian`, `select1`, `select2`, `select3`, `select4`, `select5`, `select6`, `select7`, `select8`, `pesan1`, `select9`, `pesan2`, `select10`, `pesan3`, `select11`, `pesan4`, `select12`, `select13`, `select14`, `pesan5`, `select15`, `pesan6`, `select16`, `pesan7`, `select17`, `select18`, `pesan8`, `select19`, `pesan9`, `select20`, `pesan10`, `select21`, `pesan11`, `select22`, `pesan12`, `select23`, `pesan13`, `pesan14`, `select24`, `pesan15`, `pesan16`, `select25`, `pesan17`, `pesan18`, `select26`, `pesan19`, `select27`, `pesan20`, `select28`, `select29`, `pesan21`, `select30`, `select31`, `pesan22`, `pesan23`, `pesan24`, `pesan25`, `pesan26`, `pesan27`, `pesan28`, `pesan29`, `pesan30`, `pesan31`, `pesan32`, `pesan33`, `pesan34`, `pesan35`, `pesan36`, `pesan37`, `pesan38`, `pesan39`, `pesan40`, `pesan41`, `pesan42`, `pesan43`, `pesan44`, `pesan45`, `pesan46`, `pesan47`, `pesan48`, `pesan49`, `pesan50`, `pesan51`, `pesan52`, `pesan53`, `pesan54`, `pesan55`, `pdf`) VALUES
(1, 'shidqi', '12312312', 'shidqitio@gmail.com', 'jakarta', 'ciputat', 'Surabaya', '2020/21.1', '2020-10-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'shidqi2020-10-06.pdf'),
(2, 'Pemantau', '7894561231593574865', 'pemantau@gmail.com', 'jakarta', 'ciputat', 'Banda Aceh', '2020/21.1', '2020-10-07', 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pemantau2020-10-07.pdf'),
(3, 'Pemantau', '7894561231593574865', 'pemantau@gmail.com', 'yuhuuu', 'ah', 'Banda Aceh', '2020/21.1', '2020-10-07', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', NULL, NULL, NULL, 'asdawd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pemantau2020-10-07.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `form_pjtu`
--

CREATE TABLE `form_pjtu` (
  `no` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_ujian` varchar(50) NOT NULL,
  `lokasi_ujian` varchar(50) NOT NULL,
  `upbjj` varchar(50) NOT NULL,
  `masa_ujian` varchar(15) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `select1` varchar(6) DEFAULT NULL,
  `select2` varchar(6) DEFAULT NULL,
  `select3` varchar(6) DEFAULT NULL,
  `select4` varchar(6) DEFAULT NULL,
  `select5` varchar(6) DEFAULT NULL,
  `select6` varchar(6) DEFAULT NULL,
  `select7` varchar(6) DEFAULT NULL,
  `select8` varchar(6) DEFAULT NULL,
  `select9` varchar(6) DEFAULT NULL,
  `select10` varchar(6) DEFAULT NULL,
  `select11` varchar(6) DEFAULT NULL,
  `select12` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_pjtu`
--

INSERT INTO `form_pjtu` (`no`, `nama`, `tempat_ujian`, `lokasi_ujian`, `upbjj`, `masa_ujian`, `tanggal_ujian`, `select1`, `select2`, `select3`, `select4`, `select5`, `select6`, `select7`, `select8`, `select9`, `select10`, `select11`, `select12`) VALUES
(1, 'dini', 'jakarta', 'jakarta', '21 Jakarta', '2020/21.2', '2019-11-09', 'Baik', 'Sedang', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Mudah', 'Mudah'),
(2, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Popon .S', 'Bogor', 'Bogor', '23 Bogor', '2021/22.1', '2019-11-11', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Mudah', 'Mudah'),
(4, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'dini', '', '', '45 Yogyakarta', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'sasda', 'qweqw', 'sadw', '13 Batam', '2019/20.1', '2020-02-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'sasda', 'qweqw', 'sadw', '13 Batam', '2019/20.1', '2020-02-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'awdas', 'wdwdq', 'asdw', '41 Purwokerto', '2020/21.1', '2020-02-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'awdas', 'wdwdq', 'asdw', '41 Purwokerto', '2020/21.1', '2020-02-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'febri', 'aw', 'wa', '17 Jambi', '2020/21.2', '2020-02-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'bidea', 'aussss', 'iiwindasd', '45 Yogyakarta', '2021/22.2', '2020-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'bidea', 'aussss', 'iiwindasd', '45 Yogyakarta', '2021/22.2', '2020-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'baxia', 'aa', 'sduw', '19 Bengkulu', '2018/19.1', '2020-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'baxia', 'aa', 'sduw', '19 Bengkulu', '2018/19.1', '2020-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'wdqd', 'qwe', 'qweqwe', '44 Surakarta', '2023/24.1', '2020-02-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'pejot', 'wq', 'sdw', '42 Semarang', '2022/23.2', '2020-03-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'dsdasd', 'dwdawd', 'ddwad', '44 Surakarta', '2021/22.1', '2020-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'asd', 'qweee', 'rrreq', '44 Surakarta', '2020/21.1', '2020-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'adw', 'qqqe', 'jl.kl.kl', '44 Surakarta', '2020/21.1', '2020-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'sasda', 'asdwa', 'ah', '45 Yogyakarta', '2022/23.2', '2020-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'bbbb', 'aawdwd', 'rafasf', '44 Surakarta', '2020/21.2', '2020-03-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galeri_pemantau`
--

CREATE TABLE `galeri_pemantau` (
  `id` int(11) NOT NULL,
  `foto_lokasi` varchar(100) DEFAULT NULL,
  `foto_pelaksanaan` varchar(100) DEFAULT NULL,
  `foto_pemusnahan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri_pemantau`
--

INSERT INTO `galeri_pemantau` (`id`, `foto_lokasi`, `foto_pelaksanaan`, `foto_pemusnahan`) VALUES
(1, '1584326553.pingber.jfif', '1584326553.tenyom.jfif', '1584326553.panda.jfif'),
(2, '1584339279.anan.jfif', '1584339279.panda.jfif', '1584339279.tenyom.jfif'),
(3, '1584339386.pingber.jfif', '1584339386.burung.jfif', '1584339386.kucing 1.jfif'),
(4, '1585208796.DSC09040.jpg', '1585208797.DSC09043.jpg', '1585208797.DSC09106.jpg'),
(5, '1585209624.7P5A7249.jpg', '1585209624.7P5A7463.jpg', '1585209624.7P5A7531.jpg'),
(6, '1590503737.logo.png', '1590503738.slide-image-1.jpg', '1590503738.slide-image-2.jpg'),
(7, '1602043404.kucing 1.jfif', '1602043404.burung.jfif', '1602043404.pingber.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_pjtu`
--

CREATE TABLE `galeri_pjtu` (
  `id` int(11) NOT NULL,
  `foto_persiapan_uas` varchar(100) DEFAULT NULL,
  `foto_pelaksanaan_uas` varchar(100) DEFAULT NULL,
  `foto_lokasi_uas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri_pjtu`
--

INSERT INTO `galeri_pjtu` (`id`, `foto_persiapan_uas`, `foto_pelaksanaan_uas`, `foto_lokasi_uas`) VALUES
(1, '1583479050.anan.jfif', '1583479050.panda.jfif', '1583479050.tenyom.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id` int(3) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id`, `Nama`, `Username`, `Password`) VALUES
(1, 'kautsar', 'kautsar99', 'kautsar123'),
(2, 'dini', 'dini99', 'dini123'),
(3, 'admin', 'admin99', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `masa`
--

CREATE TABLE `masa` (
  `kd_masa` int(5) NOT NULL,
  `tahun_masa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masa`
--

INSERT INTO `masa` (`kd_masa`, `tahun_masa`) VALUES
(4, '2020/21.1'),
(5, '2020/21.2');

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
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_resets_table', 1),
(25, '2020_03_10_030611_create_roles_table', 1),
(26, '2020_03_10_030848_create_user_roles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `panduan`
--

CREATE TABLE `panduan` (
  `id` int(11) NOT NULL,
  `panduan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panduan`
--

INSERT INTO `panduan` (`id`, `panduan`) VALUES
(1, '20202530041324030031.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `panduan_lampiran`
--

CREATE TABLE `panduan_lampiran` (
  `id` int(11) NOT NULL,
  `masa_ujian` varchar(15) DEFAULT NULL,
  `lampiran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panduan_lampiran`
--

INSERT INTO `panduan_lampiran` (`id`, `masa_ujian`, `lampiran`) VALUES
(1, '1', 'b'),
(2, '2020/21.1', 'agus2020-08-18.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `panduan_manual`
--

CREATE TABLE `panduan_manual` (
  `id` int(11) NOT NULL,
  `manual` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panduan_manual`
--

INSERT INTO `panduan_manual` (`id`, `manual`) VALUES
(1, 'test.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `panduan_uas`
--

CREATE TABLE `panduan_uas` (
  `id` int(11) NOT NULL,
  `masa_ujian` varchar(15) DEFAULT NULL,
  `uas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panduan_uas`
--

INSERT INTO `panduan_uas` (`id`, `masa_ujian`, `uas`) VALUES
(1, '1', '16-Article Text-74-2-10-20191207.pdf');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'pemantau', NULL, NULL),
(3, 'upbjj', NULL, NULL),
(4, 'pjtu', NULL, NULL),
(5, 'adminupbjj', NULL, NULL),
(6, 'unit', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 3),
(7, 4),
(25, 3),
(26, 5),
(27, 3),
(28, 2),
(39, 2),
(40, 3),
(41, 2),
(42, 6),
(43, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `kd_tugas` int(5) NOT NULL,
  `nm_tugas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`kd_tugas`, `nm_tugas`) VALUES
(1, 'Pemantau'),
(2, 'PJTU'),
(3, 'Pendamping PJTU'),
(4, 'PJLU');

-- --------------------------------------------------------

--
-- Table structure for table `upbjj`
--

CREATE TABLE `upbjj` (
  `id_upbjj` int(10) NOT NULL,
  `kode_wilayah` int(11) NOT NULL,
  `upbjj` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upbjj`
--

INSERT INTO `upbjj` (`id_upbjj`, `kode_wilayah`, `upbjj`) VALUES
(1, 11, 'Banda Aceh'),
(2, 12, 'Medan'),
(3, 13, 'Batam'),
(4, 14, 'Padang'),
(5, 15, 'Pangkalpinang'),
(6, 16, 'Pekanbaru'),
(7, 17, 'Jambi'),
(9, 19, 'Bengkulu'),
(10, 20, 'Bandar Lampung'),
(11, 21, 'Jakarta'),
(12, 22, 'Serang'),
(13, 23, 'Bogor'),
(14, 24, 'Bandung'),
(15, 41, 'Purwokerto'),
(16, 42, 'Semarang'),
(17, 44, 'Surakarta'),
(18, 45, 'Yogyakarta'),
(19, 71, 'Surabaya'),
(20, 74, 'Malang'),
(21, 76, 'Jember'),
(22, 77, 'Denpasar'),
(23, 78, 'Mataram'),
(24, 79, 'Kupang'),
(25, 47, 'Pontianak'),
(26, 48, 'Palangka Raya'),
(27, 49, 'Banjarmasin'),
(28, 50, 'Samarinda'),
(29, 80, 'Makassar'),
(30, 81, 'Majene'),
(31, 82, 'Palu'),
(32, 83, 'Kendari'),
(33, 84, 'Manado'),
(34, 85, 'Gorontalo'),
(35, 86, 'Ambon'),
(36, 89, 'Ternate'),
(37, 87, 'Jayapura'),
(38, 10, 'Sorong'),
(39, 51, 'Tarakan'),
(40, 90, 'Pusat Pengelolaan Mahasiswa Luar Nege');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id_file` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id_file`, `nama_file`) VALUES
(44, 'rwb-556fef6ebf19d.jpg'),
(45, 'rwb-556fef6ebf19d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_upbjj` int(3) UNSIGNED DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(19) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_upbjj`, `name`, `nip`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Admin', '8456799451236547845', 'admin@gmail.com', '$2y$10$AT6wgaJhRDjJBCBbivdPvOKPbsIp6nfbMM2wFuLYLrmTP7MfH/Dua', '4Q7ZSKEEaWpkbcz0q9tWELGDhACS8k1BRUf9IXW3D73WVK8W0ghVv0YEApMK', '2020-03-13 01:16:32', '2020-03-13 01:16:32'),
(2, 0, 'Pemantau', '7894561231593574865', 'pemantau@gmail.com', '$2y$10$RiAtgF031CrLSJKo3uw2OOR0hgW5XIBEa1BHgGNcuHCMWNe2tTu4.', 'jodFyMXSihOGowtcfQZuIWjPPqr7zYqQj7C3VQGVUZIfLWkFIKaefhZjqozA', '2020-03-13 02:05:43', '2020-03-13 02:05:43'),
(3, 0, 'Jeki', '9846578413654879451', 'jeki@gmail.com', '$2y$10$CtLagr1GjapBUVZkIwOyjO567yPae0dWgz4.HX.KI39miepjiM/5q', '61TqfHN7xX71CofopwVhNO1dmhaXg1OV4B6zjWEceXmEHqtAo5ad9HL4VAis', '2020-03-13 02:06:56', '2020-03-13 02:06:56'),
(4, 0, 'asd', '984563487845632156', 'asd@gmail.com', '$2y$10$DcyRmLb6DKOPLSE/Rx7LGesu12ZLVi42l6Gcg69eTHtxpEk7t5Fsy', 'FmjkIzyOmF5zrMyIu0R0QywNQlgSY7IZgrsbw7YCyibJWBPZbK1nzstrDgag', '2020-03-13 02:10:09', '2020-03-13 02:10:09'),
(5, 0, 'bbb', '4896574567893256847', 'bbb@bbb.com', '$2y$10$JrpB7.Jh1KlHI2Z5UzX6Numwa9i25J5.N/TFUn0ioX6xJDXnqM4FC', 's0N5KSt3v77EyAjf99RosOka20xf5uF8D8ZMVEuXgEAmXicofOOnCeoj7CM0', '2020-03-13 02:14:57', '2020-03-13 02:14:57'),
(6, 0, 'UPBJJ', '789987456852678947', 'upbjj@gmail.com', '$2y$10$l.Hv4VYJ5IWYuzl8eBNa6eDi1mzRDE0UgaIRSVgrcm0uE.BIlvOz6', 'QxCGdAQR91SXmREGQBUvNJFbgCxupgSibYGBzKI5b1v4CL82ApoYQwbPlAdn', '2020-03-15 20:07:30', '2020-03-15 20:07:30'),
(7, 0, 'PJTU', '598776653208479845', 'pjtu@gmail.com', '$2y$10$V.vYS70mmSwUIdY75XGXDeFbkUgZCmy/JxP2zGTX6qfL2/UBu8o2q', 'cVrBQoRz53fYEGjlICUdQg8Og1PkvnVRhlj8Hw9jOSvrM1IjVoDZHwsHIocP', '2020-03-15 21:03:58', '2020-03-15 21:03:58'),
(8, 0, 'Acep ', '1.56486523689748e17', 'acep@gmail.com', 'acep5236', NULL, '2020-03-31 01:02:30', '2020-03-31 01:02:30'),
(9, 0, 'Usup', '9.84536781532648e17', 'usup@gmail.com', 'usup8153', NULL, '2020-03-31 01:02:30', '2020-03-31 01:02:30'),
(25, 2, 'dummy', '56712537612736', 'icibangse@gmail.com', '$2y$10$clpxv3OmBnHu0Hd7/5uOJuLFWsKL63.x8uhYPh6RNq.9g0ja.sF0u', NULL, '2020-05-06 01:00:16', '2020-05-06 01:00:16'),
(26, 0, 'AdminUPBJJ', '123456789012345', 'adminupbjj@gmail.com', '$2y$10$HAIRi/1sClHu8CY74Df0gOWuICMTejyX7EVZBAaNJ6K6mE9NUmewu', '7imRmTHVDwAUlFIChiJS88y6EbNh7XQs1kZuItJxuDAs9SfKAl7jOSMgo1SF', '2020-05-06 01:11:15', '2020-05-06 01:11:15'),
(27, 1, 'UPBJJAceh', '56712537612736', 'upbjjaceh@gmail.com', '$2y$10$clpxv3OmBnHu0Hd7/5uOJuLFWsKL63.x8uhYPh6RNq.9g0ja.sF0u', '16InLNiL84JK0iDEwtYS8N8OvV3r31UDTj9kp5gic0VbKw2ojdJx1l8Y0orA', '2020-05-06 01:00:16', '2020-05-06 01:00:16'),
(28, 0, 'Pemantau', '123456789012345', 'icibangse02@gmail.com', '$2y$10$9SoIisdlKPf0tfzxsm4/9ObonEYt/oLNyXpNvesEIHJGiCo7Sb/gS', 'dUiyZr8q9nnByfO87ofp4Lf8nTFda7vmTqTSuM3m1H8I9lgxLFXB0RKcaCws', '2020-05-26 09:01:50', '2020-05-26 09:01:50'),
(39, 0, 'shidqi', '12312312', 'shidqitio@gmail.com', '$2y$10$.slHxW5wKZ9p6fdpyAmxGO0pyqmCfVQfvayoNpLkkEnnm1uxWrT6y', NULL, '2020-06-10 01:43:46', '2020-06-10 01:43:46'),
(40, 9, 'Michael', '123123', 'realtes@gmail.com', '$2y$10$nh9z3Jr9J7yn8lsumvOUJu2JCJy6UcdG0aYSAT3MtxbazmxU6Nr7a', NULL, '2020-06-30 05:02:02', '2020-06-30 05:02:02'),
(41, NULL, 'as', '123123', 'sda@gmail.com', '$2y$10$458qNsYcBxWZMudtPhVcru/ZU2U3ewvc76LXr1ER4xowYTMk9RWXG', NULL, '2020-06-30 05:03:32', '2020-06-30 05:03:32'),
(42, NULL, 'Unit', '12356412653', 'unit@gmail.com', '$2y$10$Vx2RPoHmDP.GeItCu4nQ5.bcP4LOWx9s1loN/GJc.voe9cJu0lS9u', 'O3YQpGQUPLIjMD9IvxuofNsIFmgKcrNNBhjCbtOtaMgAXvjjCGDwjLqy6RhJ', '2020-06-30 20:49:02', '2020-06-30 20:49:02'),
(43, 0, 'bot', '123456789', 'bot@gmail.com', '$2y$10$Ymms7Hv.x0r/waHtD5FXeOiuKSE0tibl8nCMnEwL7bqqhpE7sk4Gi', NULL, '2020-11-02 20:32:06', '2020-11-02 20:32:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bertugas_sebagai`
--
ALTER TABLE `bertugas_sebagai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_evaluasi`
--
ALTER TABLE `form_evaluasi`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `form_feedback`
--
ALTER TABLE `form_feedback`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `form_mra`
--
ALTER TABLE `form_mra`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `form_pemantau`
--
ALTER TABLE `form_pemantau`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `form_pjtu`
--
ALTER TABLE `form_pjtu`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `galeri_pemantau`
--
ALTER TABLE `galeri_pemantau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri_pjtu`
--
ALTER TABLE `galeri_pjtu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masa`
--
ALTER TABLE `masa`
  ADD PRIMARY KEY (`kd_masa`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panduan`
--
ALTER TABLE `panduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panduan_lampiran`
--
ALTER TABLE `panduan_lampiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panduan_manual`
--
ALTER TABLE `panduan_manual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panduan_uas`
--
ALTER TABLE `panduan_uas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`kd_tugas`);

--
-- Indexes for table `upbjj`
--
ALTER TABLE `upbjj`
  ADD PRIMARY KEY (`id_upbjj`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_file`);

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
-- AUTO_INCREMENT for table `bertugas_sebagai`
--
ALTER TABLE `bertugas_sebagai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `form_evaluasi`
--
ALTER TABLE `form_evaluasi`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_feedback`
--
ALTER TABLE `form_feedback`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `form_mra`
--
ALTER TABLE `form_mra`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `form_pemantau`
--
ALTER TABLE `form_pemantau`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_pjtu`
--
ALTER TABLE `form_pjtu`
  MODIFY `no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `galeri_pemantau`
--
ALTER TABLE `galeri_pemantau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galeri_pjtu`
--
ALTER TABLE `galeri_pjtu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masa`
--
ALTER TABLE `masa`
  MODIFY `kd_masa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `panduan`
--
ALTER TABLE `panduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `panduan_lampiran`
--
ALTER TABLE `panduan_lampiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `panduan_manual`
--
ALTER TABLE `panduan_manual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `panduan_uas`
--
ALTER TABLE `panduan_uas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `kd_tugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upbjj`
--
ALTER TABLE `upbjj`
  MODIFY `id_upbjj` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
