-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 08:12 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jadwal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `password`, `nama`, `email`) VALUES
('admin', 'admin', 'Administrator', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id` int(5) NOT NULL,
  `nbm` varchar(10) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `title` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id`, `nbm`, `nama`, `title`, `alamat`, `notelp`) VALUES
(4, '959773', 'Muh. Basri', 'ST.,MT', '', '6282189862124'),
(5, '1085476', 'Mansur', ' S.kom.,MT', '', '6285299346927'),
(6, '856 590', 'Ahmad Selao', ' STP,M.Sc', 'Kompleks BTN BPP E2/24', '6281355021427'),
(7, '1070 326', 'Ferdiansyah', ' S.kom', 'Jl. Lahalede No.22 Parepare', '6282347881033'),
(8, '1153 739', 'Firdaus', ' S.kom', 'Jl. Ajatappareng No.11', '6285255659132'),
(9, '', 'Ade Hastuti', ' ST., S.kom.,MT', 'Graha 2 Lembah', '6281355723982'),
(10, '', 'Abd.Hamid', ' S.kom', 'Perumnas Wekke\'e', '6281342451882'),
(11, '', 'Herlan Sanjaya', ' S.kom', 'Jl. Jend. Ahmad Yani', '6282344042424'),
(12, '', 'M. Anis Amin', ' S.kom', 'Anaf Komputer', '62812424658364'),
(13, '', 'M. Ismail', ' S.kom', 'Jl. Bau Massepe No.414', '6282347881033'),
(14, '', 'Mughaffir Yunus', ' ST., MT', '', '6282293016060'),
(15, '', 'Marlina', 'S.kom,.M.Kom', '', '62811415610'),
(16, '1153708', 'A. Wijaya', ' S.kom', 'Jl. Kejayaan Blok G No.41 Prumnas Wekke\'e', '6285255433923'),
(17, '', 'Iskandar Masse', ' S.kom', '', '6281213256404'),
(18, '1208 048', 'Wahyuddin', 'S.kom,.M.Kom', '', '6285240474228'),
(19, '1112351', 'Panji Rachman R', ' ST', 'Perumnas Wekke\'e', '628567774615'),
(20, '', 'Arif Hidayat', ' ST', 'Kompleks Lapan, Jl. Ahmdad Yani Km 6', '628112503667'),
(21, '', 'A. Wafiah', 'S.Kom,.M.Kom', 'BTN Sao Asri Blok E3/3', '6285293944221'),
(22, '', 'Untung Suwardoyo', 'S.Kom,.MT', '', '6285240802223'),
(23, '1165 548', 'Fanshur', ' S.Kom', '', '6285205079190'),
(24, '', 'A. Hutami Endang', ' S.Kom., M.Kom', '', '6281241225111'),
(25, '', 'A. Mery Arafah', '', '', '6281342494922'),
(26, '', 'Wisma Saputri WS', ' S.Pd.,MT', '', '628114190790'),
(27, '938 317', 'H. Hakzah', ' ST., MT', 'Jl. Poros Parepare No. 36 Lt Sulo Rappang', '62811425607'),
(28, '933289', 'Jasman', ' ST., MT', 'Jl. Lasiming No.59', '6281335186897'),
(29, '970091', 'Andi Bustan Didi', ' ST.,MT', 'Jl. Rusa No.10 B Parepare', '6285230655435'),
(30, '784 726', 'M. Nasir T', ' ST.,MT', '', '6281354783640'),
(31, '', 'Hendro Widarto', ' ST.,MT', 'Jl. JEnd A. Yani Km 6 BTN BPP C3/9', '6285240605275'),
(32, '', 'Hamka Wakkang', ' ST.,MT', '', '6281342113988'),
(33, '', 'Abdul Muis', ' ST.,MT', '', '6285299837636'),
(34, '960810', 'Drs. Parman Farid', ' MM', 'Jl. Handayani No.7', '628124250844'),
(35, '', 'Muh. Jabir', ' ST.,MT', 'BTN. Timurama A19/11', '6285298322745'),
(36, '959 770', 'Rahmawati', ' S.T., M.Eng', 'BTN Bukit PAre Permai', '6281342407932'),
(37, '985 440', 'Hamsyah', 'ST,.MT', 'Jl. Jend. Muh Yusuf RT', '6281343594212'),
(38, '1034728', 'Mustakim', 'ST,.MT', 'Jl. Lastassakka No. 10 C Parepare', '6285255853465'),
(39, '1099693', 'Kasmaida', ' ST', 'Komp. Ruko Bukit Pare', '6285341767550'),
(40, '', 'Tamsil', ' AD.,ST', 'BTN Pare Bukit Permai', '6285242378309'),
(41, '', 'Imam Fadly', ' ST.,MT', 'Perm. Grand Sulawesi', '6285299934896'),
(42, '', 'Asnita Virlayani', ' ST.,MT', 'Jl. Tun ABD Rasak Komp. Rgaha Makassar 47/17 Mks', '628124250677'),
(43, '', 'Andi Sulfanita', ' ST.,MT', 'Jl.Komp. berlian Blok A3/7 Makassar', '6281355197969'),
(44, '', 'Misbahuddin', ' ST.,M.Si', '', '6281355431175'),
(45, '1112352', 'Syarifuddin', 'ST', 'Jl. Industri Kecil No.73 B', '6285342034788'),
(46, '933 291', 'Adnan', ' ST.,MT', 'jl. Jend Sudirman', '6281242526356'),
(47, '931 108', 'H. Anugrah Yasin', ' ST.,M.Si', 'jl. Lasinrang 135', '6281355131023'),
(48, '', 'Faisal Tinulu', 'S.Sos', '', '628534112255'),
(49, '', 'Henra Aditya', ' SE', '', '6285341554878'),
(50, '', 'Irma Mariana', 'S.Kom', '', '6285203079192'),
(51, '', 'Abd. Muin Nurdin', ' S.Kom', '', '6285256530395'),
(52, '', 'Muh. Rafie Mius', ' S.Kom', '', '6285241241494'),
(53, '', 'Ardiansyah', ' S.Kom', '', '628230677304'),
(54, '', 'Andi Roy', ' S.Kom', '', '6285399392393'),
(56, '', 'Rahmat', ' S.Kom', '', '6281241896372'),
(57, '', 'Subhan Saleh', ' S.Kom', '', '6285255876933'),
(58, '', 'Nurhasidah', '', '', '6285244188682'),
(59, '962 571', 'Muh. Zainal', ' S.T.,M.T', 'Jl. Singa No. 17', '6281355793579'),
(60, '859 497', 'Hj. A. Irmayani P.', 'S.T.,M.T', 'JL. Poros Parepare No.36', '6285243476556'),
(61, '929 234', 'Syarifullah', ' ST', '', '62811421762'),
(62, '942 477', 'Ir. Siti Rahmat', '', 'Datae Kel. Lawawoi, Kec.Wt.Pulu Sudrap', '6281342757048'),
(63, '1027 234', 'Masnur', 'ST.,M.Kom', 'Jl. Ahmad Yani Km 6', '6282189628131'),
(64, '986 836', 'Asrul', 'ST.,MT', 'BTN Sao Asri Blok E3/01', '6285696230676'),
(65, '1051 105', 'Hamira', ' ST', 'Perumnas Wekke\'e', '6282194585850'),
(66, '873 749', 'Nasrim', ' ST', 'Jl. Kelapa Gading Perm. Yasmin Garden I Blok B.19', '6281355233364'),
(67, '1152 814', 'A. Muh. Syafar', ' S.T.,M.T', '', '6281355347721'),
(68, '1442 644', 'Sudirman Sahidin', ' ST', 'Perumnas Wekke\'e', '6285255981924'),
(69, '1140 376', 'Alauddin', ' S.T., M.Kom', '', '6285255534833'),
(70, '30917', 'Ir. A. ABD. Jabbar', ' MT', 'Jl. Reformasi No.25', '6281355995517'),
(71, '929 000', 'Ir. H. Zahrial Djafar', '', 'J;. Latassakka N0.77', '6281242215048'),
(72, '', 'Syahirun Alam', 'ST.MT', '', ''),
(73, '', 'Hamra', ' S.Kom', '', ''),
(74, '', 'Ramdiana', ' ST., M.Si', '', ''),
(75, '', 'Dr. Amaluddin', ' M.Hum', '', ''),
(76, '', 'Dr. Ammang Latifa', ' M.Hum', '', ''),
(77, '', 'Drs. H. Ramlan', ' M.pd', '', ''),
(78, '', 'Amiruddin Z Nur', ' S.Pd.I.,M.Pd.I', '', ''),
(79, '', 'Siti Maryam', ' S.Pd.,M.Pd.I', '', ''),
(81, '', 'Syaifullah', 'ST', '', ''),
(82, '', 'Ir. A. Abd. Djabbar', 'MT', '', ''),
(83, '', 'Ashadi Amir', 'ST.,MT', '', ''),
(84, '', 'Muh. Ismail', 'S.Kom', '', ''),
(85, '', 'Mukhlishah Sam', 'ST,. MT', '', ''),
(86, '', 'Ir. Syukur', 'M.Si', '', ''),
(87, '', 'Andriyani', 'ST,.M.Si', '', ''),
(88, '', 'Dr. Awaluddin', 'M.Hum', '', ''),
(89, '', 'Drs. Nurhana Ibrahim', 'M.Pd', '', ''),
(90, '', 'Drs. Muhammad Haidir', 'M. Kes', '', ''),
(91, '', 'Drs. H. Sawaty Lambe', 'M.Pd', '', ''),
(92, '', 'Drs. Syafaruddin', 'M.Pd.I', '', ''),
(93, '', 'Muh. Nur Maallah', 'S,Ag.,M.Ag', '', ''),
(94, '', 'Andi Abdul Muis', 'S.Ag.,M.Ag', '', ''),
(95, '', 'Jasmawati', 'S,Pd.,M.Pd', '', ''),
(96, '', 'Alwira Rahman', 'S.Pd.,M.Pd', '', ''),
(97, '', 'Hasbiah Srianah Amir', 'S.Pd.,M.Pd', '', ''),
(98, '', 'Salahuddin', 'SE.,MH', '', ''),
(99, '', 'Siti Munawarah', 'SH.,MH', '', ''),
(100, '', 'Dr. M. Nasir Maidin', 'MA', '', ''),
(101, '', 'Dr. H. Djamaluddin M Idris', 'M.Fii.I', '', ''),
(102, '', 'A. Fitrianai Djollong', 'S.Ag.,M.Pd', '', ''),
(103, '', 'Ikhwan Sawaty', 'S.Pd.,M.Pd.I', '', ''),
(104, '', 'Drs. Nadjib La ady', 'M.,Pd.I', '', ''),
(105, '', 'Rosmiati Ramli', 'S.Ag.,M.Ag', '', ''),
(106, '', 'Ibrahim Fattah', 'SH.,MH', '', ''),
(107, '', 'Marino', 'SH.,MH', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hari`
--

CREATE TABLE `tbl_hari` (
  `id` int(3) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hari`
--

INSERT INTO `tbl_hari` (`id`, `nama`, `kelas`) VALUES
(1, 'Senin', 'REGULER'),
(2, 'Selasa', 'REGULER'),
(3, 'Rabu', 'REGULER'),
(4, 'Kamis', 'REGULER'),
(5, 'Jumat', 'REGULER'),
(6, 'Sabtu', 'NONREGULER'),
(7, 'Minggu', 'NONREGULER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwalkuliah`
--

CREATE TABLE `tbl_jadwalkuliah` (
  `id` int(3) NOT NULL,
  `id_pengampu` int(3) NOT NULL,
  `id_jam` int(3) NOT NULL,
  `id_hari` int(3) NOT NULL,
  `id_ruang` int(3) NOT NULL,
  `kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwalkuliah`
--

INSERT INTO `tbl_jadwalkuliah` (`id`, `id_pengampu`, `id_jam`, `id_hari`, `id_ruang`, `kelas`) VALUES
(1, 1, 14, 3, 9, 'A'),
(2, 1, 8, 1, 10, 'B'),
(3, 2, 15, 5, 10, 'A'),
(4, 2, 7, 2, 11, 'B'),
(5, 2, 13, 7, 12, 'F'),
(6, 3, 13, 1, 1, 'C'),
(7, 3, 1, 2, 1, 'D'),
(8, 3, 6, 5, 6, 'E'),
(9, 3, 14, 6, 6, 'F'),
(10, 4, 2, 3, 6, 'E'),
(11, 4, 3, 6, 5, 'F'),
(12, 7, 15, 5, 11, 'B'),
(13, 8, 2, 4, 12, 'B'),
(14, 8, 7, 6, 8, 'F'),
(15, 9, 4, 5, 5, 'A'),
(16, 9, 2, 3, 1, 'B'),
(17, 10, 5, 3, 10, 'A'),
(18, 10, 13, 5, 9, 'B'),
(19, 10, 4, 6, 11, 'F'),
(20, 11, 3, 3, 9, 'A'),
(21, 11, 5, 2, 12, 'B'),
(22, 11, 9, 7, 11, 'F'),
(23, 13, 1, 5, 11, 'A'),
(24, 14, 13, 1, 12, 'A'),
(25, 15, 5, 5, 10, 'A'),
(26, 15, 13, 2, 11, 'B'),
(27, 15, 6, 7, 8, 'F'),
(28, 16, 2, 1, 5, 'C'),
(29, 16, 3, 4, 6, 'D'),
(30, 16, 14, 1, 3, 'E'),
(31, 17, 5, 1, 2, 'D'),
(32, 17, 5, 2, 3, 'E'),
(33, 17, 8, 7, 4, 'F'),
(34, 20, 14, 5, 8, 'A'),
(35, 20, 4, 1, 8, 'B'),
(36, 21, 13, 3, 8, 'A'),
(37, 21, 4, 5, 9, 'B'),
(38, 21, 14, 7, 8, 'F'),
(39, 23, 6, 3, 12, 'B'),
(40, 23, 1, 7, 9, 'F'),
(41, 24, 9, 1, 9, 'B'),
(42, 24, 15, 6, 8, 'F'),
(43, 25, 19, 3, 5, 'A'),
(44, 25, 13, 3, 1, 'B'),
(45, 25, 19, 4, 1, 'C'),
(46, 26, 1, 5, 10, 'A'),
(47, 27, 2, 2, 9, 'A'),
(48, 28, 19, 4, 10, 'A'),
(49, 28, 14, 3, 10, 'B'),
(50, 32, 5, 2, 2, 'A'),
(51, 32, 5, 1, 3, 'B'),
(52, 32, 5, 3, 7, 'C'),
(53, 34, 14, 5, 4, 'A'),
(54, 34, 5, 5, 4, 'B'),
(55, 34, 8, 3, 3, 'C'),
(56, 34, 8, 4, 2, 'D'),
(57, 34, 3, 2, 4, 'E'),
(58, 34, 13, 7, 4, 'F'),
(59, 38, 8, 1, 7, 'D'),
(60, 38, 5, 7, 5, 'F'),
(61, 41, 8, 1, 2, 'A'),
(62, 41, 8, 2, 4, 'B'),
(63, 41, 15, 5, 1, 'C'),
(64, 41, 15, 4, 4, 'D'),
(65, 44, 7, 5, 3, 'D'),
(66, 44, 14, 2, 5, 'E'),
(67, 44, 6, 6, 6, 'F'),
(68, 46, 6, 5, 1, 'A'),
(69, 46, 1, 5, 5, 'B'),
(70, 46, 15, 2, 4, 'C'),
(71, 46, 1, 3, 5, 'D'),
(72, 46, 7, 2, 6, 'E'),
(73, 46, 14, 6, 3, 'F'),
(74, 47, 15, 5, 2, 'A'),
(75, 47, 1, 4, 5, 'B'),
(76, 48, 7, 3, 1, 'A'),
(77, 48, 7, 2, 5, 'B'),
(78, 48, 13, 5, 3, 'C'),
(79, 48, 8, 4, 6, 'D'),
(80, 48, 6, 1, 1, 'E'),
(81, 48, 1, 7, 7, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jam`
--

CREATE TABLE `tbl_jam` (
  `id` int(3) NOT NULL,
  `range_jam` varchar(50) NOT NULL,
  `waktu_sholat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jam`
--

INSERT INTO `tbl_jam` (`id`, `range_jam`, `waktu_sholat`) VALUES
(1, '07:00-07:30', ''),
(2, '07:30-08:00', ''),
(3, '08:00-08:30', ''),
(4, '08:30-09:00', ''),
(5, '09:00-09:30', ''),
(6, '09:30-10:00', ''),
(7, '10:00-10:30', ''),
(8, '10:30-11:00', ''),
(9, '11:00-11:30', ''),
(10, '11:30-12:00', ''),
(11, '12:00-12:30', '[\"jumat\"]'),
(12, '12:30-13:00', '[\"dzuhur\",\"jumat\"]'),
(13, '13:00-13:30', ''),
(14, '13:30-14:00', ''),
(15, '14:00-14:30', ''),
(16, '14:30-15:00', ''),
(17, '15:00-15:30', ''),
(18, '15:30-16:00', '[\"ashar\"]'),
(19, '16:00-16:30', ''),
(20, '16:30-17:00', ''),
(21, '17:00-17:30', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id` int(3) NOT NULL,
  `nama` longtext NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `tahun_angkatan` varchar(50) NOT NULL,
  `id_prodi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id`, `nama`, `jenis`, `tahun_angkatan`, `id_prodi`) VALUES
(13, '[\"A\",\"B\",\"C\",\"D\",\"E\"]', 'REGULER', '2016', 1),
(14, '[\"A\",\"B\",\"C\",\"D\",\"E\"]', 'REGULER', '2017', 1),
(15, '[\"A\",\"B\",\"C\",\"D\",\"E\"]', 'REGULER', '2018', 1),
(16, '[\"A\",\"B\",\"C\",\"D\",\"E\"]', 'REGULER', '2019', 1),
(17, '[\"F\"]', 'NONREGULER', '2016', 1),
(18, '[\"F\"]', 'NONREGULER', '2017', 1),
(19, '[\"F\"]', 'NONREGULER', '2018', 1),
(20, '[\"F\"]', 'NONREGULER', '2019', 1),
(21, '[\"A\",\"B\",\"C\",\"D\",\"E\"]', 'REGULER', '2016', 3),
(22, '[\"A\",\"B\",\"C\",\"D\",\"E\"]', 'REGULER', '2017', 3),
(23, '[\"A\",\"B\",\"C\",\"D\",\"E\"]', 'REGULER', '2018', 3),
(24, '[\"A\",\"B\",\"C\",\"D\"]', 'REGULER', '2019', 3),
(25, '[\"F\"]', 'NONREGULER', '2016', 3),
(26, '[\"F\"]', 'NONREGULER', '2018', 3),
(27, '[\"F\"]', 'NONREGULER', '2019', 3),
(28, '[\"A\",\"B\"]', 'REGULER', '2016', 2),
(29, '[\"F\"]', 'NONREGULER', '2016', 2),
(30, '[\"A\",\"B\"]', 'REGULER', '2017', 2),
(31, '[\"F\"]', 'NONREGULER', '2017', 2),
(32, '[\"A\",\"B\"]', 'REGULER', '2018', 2),
(33, '[\"F\"]', 'NONREGULER', '2018', 2),
(34, '[\"A\",\"B\"]', 'REGULER', '2019', 2),
(36, '[\"F\"]', 'NONREGULER', '2017', 3),
(40, '[\"F\"]', 'NONREGULER', '2019', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `id` int(5) NOT NULL,
  `kode_mk` varchar(10) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `sks` int(2) NOT NULL,
  `semester` int(2) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `id_prodi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`id`, `kode_mk`, `nama`, `sks`, `semester`, `jenis`, `id_prodi`) VALUES
(1, 'MKK 1805', 'Dasar Komputer dan Pemrograman', 3, 1, 'TEORI', 2),
(2, 'MKK 1826', 'Jaringan Komputer', 3, 5, 'TEORI', 2),
(3, 'MKK 2819', 'Komputasi Numerik', 3, 5, 'TEORI', 1),
(6, 'MKK 1803', 'Kalkulus I', 3, 1, 'TEORI', 2),
(7, 'MKK 1815', 'Dasar Tenaga Listrik', 2, 1, 'TEORI', 2),
(8, 'MKK 1824', 'Matematika Teknik II', 3, 5, 'TEORI', 2),
(9, 'MKK 2801', 'Kalkulus', 4, 1, 'TEORI', 1),
(10, 'MKK 1813', 'Elektronika Telekomunikasi', 2, 3, 'TEORI', 2),
(11, 'MKK 1830', 'Komunikasi Digital', 2, 5, 'TEORI', 2),
(13, 'MKK 18583', 'Divais Mikroeloktronika', 2, 3, 'TEORI', 2),
(14, 'MKB 2808', 'Jaringan Nirkabel', 3, 5, 'TEORI', 1),
(15, 'MKK 2803', 'Pengantar Sistem Digital', 2, 1, 'TEORI', 1),
(17, 'MKK 1802', 'Gambar Teknik Elektro', 2, 1, 'TEORI', 2),
(18, 'MKK 1812', 'Kalkulus III', 2, 3, 'TEORI', 2),
(20, 'MKK 1828', 'Sistem Mikroprosessor', 3, 5, 'TEORI', 2),
(21, 'MKB 1804', 'Perancangan Sistem Elektronika', 3, 7, 'TEORI', 2),
(23, 'MKK 1801', 'Ilmu Bahan Listrik', 2, 1, 'TEORI', 2),
(28, 'MKK 1827', 'Sistem Linier', 3, 5, 'TEORI', 2),
(29, 'MKK 2802', 'Dasar Pemrograman', 4, 1, 'TEORI', 1),
(31, 'MKK 2820', 'Teori Bahasa dan Otomata', 3, 5, 'TEORI', 1),
(35, 'MKB 1827', 'Sistem Enterprise', 3, 7, 'TEORI', 1),
(40, 'MKK 2811', 'Arsitektur dan Organisasi Komputer', 3, 3, 'TEORI', 1),
(41, 'MKB 2802', 'Interaksi Manusia dan Komputer', 3, 3, 'TEORI', 1),
(47, 'MKB 2804', 'Pengolahan Citra', 3, 5, 'TEORI', 1),
(48, 'MKK 2813', 'Sistem Multimedia', 3, 3, 'TEORI', 1),
(50, 'MKB 1932', 'Hidrologi Terapan', 2, 2, 'TEORI', 3),
(51, 'MKK 1919', 'Rekayasa Lingkungan', 2, 2, 'TEORI', 3),
(52, 'MKK 1920', 'Informasi Tata Ruang', 2, 2, 'TEORI', 3),
(53, 'MKK 1926', 'Mekanika Bahan', 2, 2, 'TEORI', 3),
(54, 'MKK 1927', 'Teknologi Bahan', 2, 2, 'TEORI', 3),
(55, 'MKK 1930', 'Ilmu Ukur Tanah', 3, 2, 'TEORI', 3),
(56, 'MKK 1942', 'K3 Konstroksi', 2, 2, 'TEORI', 3),
(57, 'MPK 1902', 'Al-Islam/Kemuhammadiyaan II', 1, 2, 'TEORI', 3),
(58, 'MPK 1916', 'Pendidikan Pancasila', 2, 2, 'TEORI', 3),
(59, 'MPK 1917', 'Filsafat Ilmu Pemgetahuan', 2, 2, 'TEORI', 3),
(60, 'MKB 1934', 'Pengembangan Sumber Daya Air ', 2, 4, 'TEORI', 3),
(61, 'MKB 1937', 'Rekayasa Lalu Lintas', 2, 4, 'TEORI', 3),
(62, 'MKB 1939', 'Struktur Kaya', 2, 4, 'TEORI', 3),
(63, 'MKB 1944', 'Analisa Numerik', 2, 4, 'TEORI', 3),
(65, 'MKB 1962', 'Manajemen Konstruksi', 2, 4, 'TEORI', 3),
(66, 'MKK 1901', 'Al-Islam/Kemuhammadiyaan I', 1, 1, 'TEORI', 3),
(67, 'MKK 1910', 'Bahasa Arab', 2, 1, 'TEORI', 3),
(68, 'MKK 1911', 'Bahasa Indonesia', 2, 1, 'TEORI', 3),
(69, 'MKK 1912', 'Bahasa Inggris', 2, 1, 'TEORI', 3),
(70, 'MKK 1915', 'Kewarganegaraan', 2, 1, 'TEORI', 3),
(71, 'MKK 1936', 'Sistem Transportasi', 2, 3, 'TEORI', 3),
(73, 'MKK 1949', 'Struktur Benton Bertulang I', 3, 3, 'TEORI', 3),
(74, 'MKK 1954', 'Struktur Baja', 3, 3, 'TEORI', 3),
(75, 'MKK 1923', 'Matematika Rekayasa I', 2, 3, 'TEORI', 3),
(77, 'MKK 1931', 'Pemrograman Komputer', 2, 3, 'TEORI', 3),
(78, 'MKK 1940', 'Analisa Struktur I', 2, 3, 'TEORI', 3),
(79, 'MKK 1903', 'Al-Islam Kemuhammadiyahan III', 1, 3, 'TEORI', 3),
(80, 'MKK 1933', 'Sistem Dan Bangunan Irigasi', 2, 5, 'TEORI', 3),
(81, 'MKK 1935', 'Drainase Perkotaan', 2, 5, 'TEORI', 3),
(82, 'MKK 1945', 'Geometrik Jalan Raya', 2, 5, 'TEORI', 3),
(83, 'MKK 1947', 'Rekayasa Pondasi I', 2, 5, 'TEORI', 3),
(84, 'MKK 1959', 'Pelabuhan', 2, 5, 'TEORI', 3),
(86, 'MKK 1938', 'Teknik Jalan Rel', 2, 5, 'TEORI', 3),
(87, 'MKK 1956', 'Kewirausahaan Teknik Sipil', 2, 5, 'TEORI', 3),
(89, 'MKK 1905', 'Al-Islam Kemuhammadiyahan V', 1, 5, 'TEORI', 3),
(91, 'MKK 1962', 'Manajemen Konstruksi', 2, 4, 'TEORI', 3),
(92, 'MKK 1924', 'Matematika Rekayasa II', 2, 4, 'TEORI', 3),
(93, 'MKK 1941', 'Analisa Struktur II', 2, 4, 'TEORI', 3),
(94, 'MKK 1904', 'Al-Islam Kemuhammadiyahaan IV', 1, 4, 'TEORI', 3),
(95, 'MKB 1946', 'Analisis Dampak Lalu Lintas', 2, 6, 'TEORI', 3),
(96, 'MKB 1948', 'Rekayasa Pondasi II', 2, 6, 'TEORI', 3),
(97, 'MKB 1991', 'Beton Prategang', 2, 6, 'TEORI', 3),
(98, 'MKB 1952', 'Perencanaan Jembatan', 2, 6, 'TEORI', 3),
(99, 'MKB 1953', 'Perencanaan Bandar Udara', 2, 6, 'TEORI', 3),
(100, 'MKB 1957', 'Metodologi Penelitian', 2, 6, 'TEORI', 3),
(101, 'MKB 1963', 'Etika Profesi', 2, 6, 'TEORI', 3),
(102, 'MKB 1906', 'Al-Islam Kemuhammadiyahan VI', 2, 6, 'TEORI', 3),
(103, 'MPK 3808', 'Bahasa Arab', 2, 1, 'TEORI', 4),
(104, 'MPK 3810', 'Bahasa Indonesia', 2, 1, 'TEORI', 4),
(105, 'MPK 3811', 'Bahasa Inggris', 2, 1, 'TEORI', 4),
(106, 'MPK 3801', 'Al-Islam Kemuhammadiyahan I', 1, 1, 'TEORI', 4),
(107, 'MPK 3812', 'Pancasila dan Kewarganegaraan', 2, 1, 'TEORI', 4),
(108, 'MKK 3801', 'Analisis Sumber Daya dan Geologi Lingkungan', 2, 1, 'TEORI', 4),
(109, 'MKK 3802', 'Matematika Rekayasa', 2, 1, 'TEORI', 4),
(110, 'MKK 3803', 'Statistik Perencanaan', 2, 1, 'TEORI', 4),
(111, 'MKB 3801', 'Pengantar Perencanaan Wilayah dan Kota', 3, 1, 'TEORI', 4),
(112, 'MPK 3803', 'Al-Islam Kemuhammadiyahan III', 1, 3, 'TEORI', 4),
(114, 'MKB 3806', 'Sistem dan Perencanaan Transportasi', 2, 3, 'TEORI', 4),
(115, 'MKK 3808', 'Tata Guna Lahan', 3, 3, 'TEORI', 4),
(116, 'MKK 3809', 'Sistem Informasi dan Wilayah Hijau', 3, 3, 'TEORI', 4),
(117, 'MKB 3807', 'Business Project', 2, 3, 'TEORI', 4),
(118, 'MKK 3810', 'Pemograman Komputer', 3, 3, 'TEORI', 4),
(119, 'MKB 3808', 'Aspek Sosial dan Pengembangan  Komunitas', 2, 3, 'TEORI', 4),
(120, 'MKB 1801', 'Statistik dan Probabilitas', 2, 3, 'TEORI', 2),
(121, 'MKK 1925', 'Statistik dan Probabilitas', 2, 1, 'TEORI', 3),
(122, 'MKK 1809', 'Filsafat Ilmu Pengetahuan', 2, 1, 'TEORI', 2),
(127, 'MKB 1975', 'Teknik Tenaga Air', 2, 7, 'TEORI', 3),
(131, 'MPK 2802', 'Al-Islam Kemuhammadiyahan II', 1, 2, 'TEORI', 1),
(132, 'MKK 2804', 'Konsep Teknologi Informasi', 2, 2, 'TEORI', 1),
(133, 'MKK 2805', 'Struktur Data', 4, 2, 'TEORI', 1),
(134, 'MKK 2806', 'Struktur Diskrit', 4, 2, 'TEORI', 1),
(135, 'MKK 2807', 'Aljabar Linier', 3, 2, 'TEORI', 1),
(136, 'MKK 2808', 'Sistem Basis Dataa', 4, 2, 'TEORI', 1),
(137, 'MKB 2801', 'Metode Statistika', 3, 2, 'TEORI', 1),
(138, 'MBB  2801', 'Ko-Kurikuler', 1, 2, 'TEORI', 1),
(139, 'MPK 2804', 'Al-Islam Kemuhammadiyahan IV', 1, 4, 'TEORI', 1),
(140, 'MKB 2803', 'Grafika Komputer', 3, 4, 'TEORI', 1),
(142, 'MKK 2815', 'Desain dan Analisis Algoritma', 3, 4, 'TEORI', 1),
(145, 'MKK  2816', 'Keamanan Komputer', 3, 4, 'TEORI', 1),
(146, 'MPK 2806', 'Al-Islam Kemuhammadiyahan VI', 1, 6, 'TEORI', 1),
(147, 'MKK 2823', 'Pemodelan dan Simulasi', 2, 6, 'TEORI', 1),
(150, 'MKK 2826', 'Tata Tulis Ilmiah dan Presentasi', 2, 6, 'TEORI', 1),
(151, 'MPB 2802', 'Kerja Praktek', 3, 6, 'TEORI', 1),
(161, 'MKB 1955', 'Perkerasan Jalan Raya', 3, 4, 'TEORI', 3),
(168, 'MKB 1951', 'Beton Prategang', 2, 6, 'TEORI', 3),
(171, 'MPB 1957', 'Metologi Penelitian', 2, 6, 'TEORI', 3),
(172, 'MPB 1963', 'Etika Profesi', 2, 6, 'TEORI', 3),
(173, 'MPK 1906', 'Al-Islam/Kemihammadiyaan VI', 1, 6, 'TEORI', 3),
(175, 'MKB 1983', 'Rekayasa Lalulintas Lanjutan', 2, 8, 'TEORI', 3),
(176, 'MKB 1984', 'ANDALALIN Lanjutan', 2, 8, 'TEORI', 3),
(177, 'MKB 1973', 'Metode Elemen Hingga', 2, 8, 'TEORI', 3),
(178, 'MKB 1974', 'Plat dan Cangkang', 2, 8, 'TEORI', 3),
(179, 'MKB 1987', 'Teknik Sungai', 2, 8, 'TEORI', 3),
(180, 'MKB 1979', 'Erosi dan Sedimentasi', 2, 8, 'TEORI', 3),
(181, 'MKB 1988', 'Manajemen Konstruksi Lanjutan', 2, 8, 'TEORI', 3),
(182, 'MKB 1989', 'Manajemen Risiko Kontruksi', 2, 8, 'TEORI', 3),
(183, 'MPK 1802', 'Al-Islam/Kemuhammadiyaan II', 1, 2, 'TEORI', 2),
(184, 'MPK 1810', 'Bahasa Arab', 2, 2, 'TEORI', 2),
(185, 'MPK 1811', 'Bahasa Indonesia', 2, 2, 'TEORI', 2),
(186, 'MKK 1806', 'Kalkulus II', 3, 2, 'TEORI', 2),
(187, 'MKK 1807', 'Fisika Dasar II', 3, 2, 'TEORI', 2),
(188, 'MKK 1808', 'Dasar Elektronika', 3, 2, 'TEORI', 2),
(190, 'MKK 1810', 'Pengukuran Besaran Listrik', 2, 2, 'TEORI', 2),
(191, 'MKK 1811', 'Algoritma Pemograman', 3, 2, 'TEORI', 2),
(192, 'MPK 1804', 'Al-Islam/Kemuhammadiyaan IV', 1, 4, 'TEORI', 2),
(193, 'MKK 1818', 'Rangkaian Listrik II', 3, 4, 'TEORI', 2),
(194, 'MKK 1819', 'Matematika Teknik II', 3, 4, 'TEORI', 2),
(195, 'MKK 1820', 'Komunikasi Data', 2, 4, 'TEORI', 2),
(196, 'MKK 1821', 'Medan Elektromagnetik', 3, 4, 'TEORI', 2),
(197, 'MKB 1802', 'Teknologi Informasi', 2, 4, 'TEORI', 2),
(198, 'MKK 1822', 'Sistem Pengolahan Sinyal', 2, 4, 'TEORI', 2),
(199, 'MKK 1823', 'Matematika Distrik', 3, 4, 'TEORI', 2),
(201, 'MPK 1806', 'Al-Islam/Kemuhammadiyaan VI', 1, 6, 'TEORI', 2),
(202, 'MKK 1831', 'Elektronika Digital', 3, 6, 'TEORI', 2),
(203, 'MKK 1832', 'Arsitektur Komputer', 2, 6, 'TEORI', 2),
(204, 'MKK 1833', 'Sistem Kendali Digital', 3, 6, 'TEORI', 2),
(205, 'MKK 1834', 'Elektronika Optik', 2, 6, 'TEORI', 2),
(206, 'MKK 1835', 'Sistem Instrumensi', 3, 6, 'TEORI', 2),
(207, 'MKK 1836', 'Elektronika Daya', 2, 6, 'TEORI', 2),
(210, 'MKK 1814', 'Instalasi Listrik', 2, 3, '', 2),
(211, 'MKK 1816', 'Rangkaian Listrik', 3, 3, '', 2),
(212, 'MKK 1817', 'Operasi Sistem Komputer', 2, 5, '', 2),
(213, 'MKK 1804', 'Fisika Dasar I', 3, 1, '', 2),
(214, 'MKK 1825', 'Elektronika Analog', 3, 3, '', 2),
(215, 'MKK 1837', 'Perancangan Sistem Kendali', 3, 7, '', 2),
(216, 'MKK 1829', 'Dasar Tenaga Listrik', 2, 3, '', 2),
(217, 'MKK 2810', 'Jaringan Komputer', 4, 3, '', 1),
(218, 'MKK 2822', 'E-Learning', 3, 5, '', 1),
(219, 'MKK 2812', 'Pemrograman Terstruktur', 4, 3, '', 1),
(220, 'MKK 2827', 'Analisis Big Data', 3, 7, '', 1),
(221, 'MKK 2824', 'Sistem Pakar', 3, 5, '', 1),
(222, 'MKK 2825', 'Data Mining', 3, 5, '', 1),
(223, 'MKK 2828', 'Cloud Komputing', 3, 7, '', 1),
(224, 'MKK 2809', 'Sistem Operasi', 3, 3, '', 1),
(225, 'MKK 2829', 'Teknik Pengembangan Game', 3, 7, '', 1),
(226, 'MKK 2830', 'Internet Of Things', 3, 7, '', 1),
(227, 'MKK 2816', 'Pemrosesan Data Terdistribusi', 3, 5, '', 1),
(228, 'MKK 2817', 'Pengkodean dan Kompresi Data ', 3, 5, '', 1),
(229, 'MKK 1918', 'Struktur Beton Bertulang I', 3, 3, '', 3),
(230, 'MKK 1916', 'Hidrolika', 3, 3, '', 3),
(231, 'MKK 1906', 'Statistik Probabilitas', 2, 1, '', 3),
(232, 'MKK 1934', 'Pemodelan Transportasi', 2, 7, '', 3),
(233, 'MKK 2814', 'Wawasan Iptek', 2, 1, '', 1),
(234, 'MKK 1922', 'Teknik Pelaksanaan Konsentrasi dan Alat Berat', 2, 5, '', 3),
(235, 'MKK 1928', 'Mekanika Tanah', 3, 3, '', 3),
(236, 'MKK 1939', 'Dinamika Struktur dan Rekayasa Gempa', 2, 7, '', 3),
(237, 'MKK 1902', 'Gambar Struktur Bangunan', 3, 1, '', 3),
(238, 'MKK 1921', 'Ekonomi Rekayasa', 2, 5, '', 3),
(239, 'MKK 1929', 'Kalkulus', 3, 5, '', 3),
(240, 'MKK 1932', 'Pengawasan dan Pengendalian Teknik Kontruksi', 2, 7, '', 3),
(241, 'MKK 1937', 'Teknik Penulisan Ilmiah dan Presentasi', 2, 7, '', 2),
(242, 'MKK 1943', 'Teknik Pantai', 2, 7, '', 3),
(243, 'MKK 1944', 'Produktivitas dan Alokasi Sumber Daya', 2, 7, '', 3),
(244, 'MKK 1946', 'Analisa Struktur Lanjutan', 2, 7, '', 3),
(245, 'MKB 1903', 'Fisika Teknik', 2, 1, '', 3),
(246, 'MKK 1913', 'Kalkulus', 3, 1, '', 3),
(247, 'MKB 1803', 'Bahasa Indonesia', 2, 1, '', 1),
(248, 'MKB 2805', 'Bahasa Inggris', 2, 1, '', 1),
(249, 'MKB 1805', 'Bahasa Inggris', 2, 1, '', 2),
(250, 'MKB 1806', 'Pendidikan Pancasila', 2, 1, '', 2),
(251, 'MPK 2801', 'Al-Islam/Kemuhammadiyahan I', 1, 1, '', 1),
(252, 'MPK 2805', 'Al-Islam/Kemuhammadiyahan III', 1, 3, '', 1),
(253, 'MPK 2807', 'Al-Islam/Kemuhammadiyahan V', 1, 5, '', 1),
(254, 'MPK 1803', 'Al-Islam/Kemuhammadiyahan I', 1, 1, '', 2),
(255, 'MPK 1805', 'Al-Islam/Kemuhammadiyahan V', 1, 5, '', 2),
(256, 'MPK 1807', 'Al-Islam/Kemuhammadiyahan III', 1, 3, '', 2),
(257, 'MPK 2810', 'Bahasa Arab', 1, 1, '', 1),
(258, 'MPK 2808', 'Pancasila dan Kewarganegaraan', 2, 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengampu`
--

CREATE TABLE `tbl_pengampu` (
  `id` int(3) NOT NULL,
  `id_mk` int(3) NOT NULL,
  `id_dosen` int(3) NOT NULL,
  `kelas` longtext NOT NULL,
  `tahun_akademik` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengampu`
--

INSERT INTO `tbl_pengampu` (`id`, `id_mk`, `id_dosen`, `kelas`, `tahun_akademik`) VALUES
(1, 1, 72, '[[\"34\",\"A\"],[\"34\",\"B\"]]', '2019-2020'),
(2, 2, 72, '[[\"30\",\"A\"],[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(3, 9, 72, '[[\"16\",\"C\"],[\"16\",\"D\"],[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(4, 3, 72, '[[\"14\",\"E\"],[\"18\",\"F\"]]', '2019-2020'),
(7, 7, 59, '[[\"34\",\"B\"]]', '2019-2020'),
(8, 8, 59, '[[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(9, 9, 59, '[[\"16\",\"A\"],[\"16\",\"B\"]]', '2019-2020'),
(10, 10, 60, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(11, 11, 60, '[[\"30\",\"A\"],[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(13, 6, 26, '[[\"34\",\"A\"]]', '2019-2020'),
(14, 8, 26, '[[\"30\",\"A\"]]', '2019-2020'),
(15, 13, 63, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(16, 14, 63, '[[\"14\",\"C\"],[\"14\",\"D\"],[\"14\",\"E\"]]', '2019-2020'),
(17, 15, 63, '[[\"16\",\"D\"],[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(20, 17, 64, '[[\"34\",\"A\"],[\"34\",\"B\"]]', '2019-2020'),
(21, 18, 65, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(23, 20, 4, '[[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(24, 21, 4, '[[\"28\",\"B\"],[\"29\",\"F\"]]', '2019-2020'),
(25, 15, 4, '[[\"16\",\"A\"],[\"16\",\"B\"],[\"16\",\"C\"]]', '2019-2020'),
(26, 20, 68, '[[\"30\",\"A\"]]', '2019-2020'),
(27, 21, 68, '[[\"28\",\"A\"]]', '2019-2020'),
(28, 23, 69, '[[\"34\",\"A\"],[\"34\",\"B\"]]', '2019-2020'),
(32, 29, 9, '[[\"16\",\"A\"],[\"16\",\"B\"],[\"16\",\"C\"]]', '2019-2020'),
(34, 31, 12, '[[\"14\",\"A\"],[\"14\",\"B\"],[\"14\",\"C\"],[\"14\",\"D\"],[\"14\",\"E\"],[\"18\",\"F\"]]', '2019-2020'),
(38, 35, 7, '[[\"13\",\"D\"],[\"17\",\"F\"]]', '2019-2020'),
(41, 3, 14, '[[\"14\",\"A\"],[\"14\",\"B\"],[\"14\",\"C\"],[\"14\",\"D\"]]', '2019-2020'),
(44, 29, 15, '[[\"16\",\"D\"],[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(46, 40, 21, '[[\"15\",\"A\"],[\"15\",\"B\"],[\"15\",\"C\"],[\"15\",\"D\"],[\"15\",\"E\"],[\"19\",\"F\"]]', '2019-2020'),
(47, 35, 21, '[[\"13\",\"A\"],[\"13\",\"B\"]]', '2019-2020'),
(48, 41, 18, '[[\"15\",\"A\"],[\"15\",\"B\"],[\"15\",\"C\"],[\"15\",\"D\"],[\"15\",\"E\"],[\"19\",\"F\"]]', '2019-2020'),
(55, 47, 6, '[[\"14\",\"A\"],[\"14\",\"B\"],[\"14\",\"E\"]]', '2019-2020'),
(56, 48, 6, '[[\"15\",\"D\"],[\"15\",\"E\"],[\"19\",\"F\"]]', '2019-2020'),
(57, 48, 57, '[[\"15\",\"A\"],[\"15\",\"B\"],[\"15\",\"C\"]]', '2019-2020'),
(58, 81, 27, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"22\",\"C\"]]', '2019-2020'),
(59, 73, 27, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"23\",\"C\"],[\"26\",\"F\"]]', '2019-2020'),
(60, 120, 29, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(62, 80, 29, '[[\"22\",\"D\"],[\"36\",\"F\"]]', '2019-2020'),
(63, 121, 29, '[[\"27\",\"F\"],[\"24\",\"D\"],[\"24\",\"A\"],[\"24\",\"B\"],[\"24\",\"C\"]]', '2019-2020'),
(64, 122, 30, '[[\"34\",\"A\"],[\"34\",\"B\"],[\"40\",\"F\"]]', '2019-2020'),
(65, 84, 30, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"22\",\"C\"],[\"22\",\"D\"],[\"22\",\"E\"],[\"36\",\"F\"]]', '2019-2020'),
(66, 71, 30, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"26\",\"F\"]]', '2019-2020'),
(67, 86, 30, '[[\"22\",\"A\"],[\"36\",\"F\"]]', '2019-2020'),
(68, 87, 31, '[[\"36\",\"F\"]]', '2019-2020'),
(69, 83, 31, '[[\"22\",\"B\"],[\"22\",\"C\"],[\"22\",\"D\"]]', '2019-2020'),
(70, 82, 32, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"22\",\"C\"],[\"22\",\"D\"],[\"36\",\"F\"]]', '2019-2020'),
(72, 83, 32, '[[\"22\",\"A\"],[\"36\",\"F\"]]', '2019-2020'),
(73, 78, 33, '[[\"23\",\"D\"],[\"26\",\"F\"]]', '2019-2020'),
(74, 77, 33, '[[\"23\",\"D\"],[\"26\",\"F\"]]', '2019-2020'),
(76, 74, 37, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"23\",\"C\"],[\"23\",\"D\"],[\"26\",\"F\"]]', '2019-2020'),
(77, 78, 38, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"23\",\"C\"]]', '2019-2020'),
(78, 77, 38, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"23\",\"C\"]]', '2019-2020'),
(80, 75, 41, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"26\",\"F\"]]', '2019-2020'),
(81, 87, 44, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"22\",\"C\"],[\"22\",\"D\"]]', '2019-2020'),
(82, 75, 44, '[[\"23\",\"C\"],[\"23\",\"D\"]]', '2019-2020'),
(87, 71, 74, '[[\"23\",\"C\"]]', '2019-2020'),
(88, 68, 75, '[[\"24\",\"A\"],[\"24\",\"B\"],[\"24\",\"C\"],[\"24\",\"D\"],[\"27\",\"F\"]]', '2019-2020'),
(89, 69, 76, '[[\"27\",\"F\"]]', '2019-2020'),
(90, 70, 77, '[[\"24\",\"A\"],[\"24\",\"B\"]]', '2019-2020'),
(91, 67, 79, '[[\"24\",\"D\"],[\"27\",\"F\"]]', '2019-2020'),
(92, 136, 15, '[[\"16\",\"A\"],[\"16\",\"B\"],[\"16\",\"C\"],[\"16\",\"D\"],[\"16\",\"E\"]]', '2019-2020'),
(93, 150, 72, '[[\"14\",\"A\"],[\"14\",\"B\"],[\"14\",\"C\"],[\"14\",\"D\"],[\"14\",\"E\"],[\"18\",\"F\"]]', '2019-2020'),
(94, 132, 30, '[[\"16\",\"A\"],[\"16\",\"B\"],[\"16\",\"C\"],[\"16\",\"D\"],[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(95, 140, 5, '[[\"15\",\"A\"],[\"15\",\"B\"],[\"15\",\"C\"],[\"15\",\"D\"],[\"15\",\"E\"],[\"19\",\"F\"]]', '2019-2020'),
(98, 137, 29, '[[\"16\",\"A\"],[\"16\",\"B\"],[\"16\",\"C\"]]', '2019-2020'),
(99, 137, 59, '[[\"16\",\"D\"],[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(100, 135, 4, '[[\"16\",\"A\"],[\"16\",\"B\"],[\"16\",\"C\"]]', '2019-2020'),
(101, 135, 63, '[[\"16\",\"D\"],[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(102, 133, 21, '[[\"16\",\"A\"],[\"16\",\"B\"],[\"16\",\"C\"],[\"16\",\"D\"],[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(103, 142, 9, '[[\"15\",\"A\"],[\"15\",\"B\"],[\"15\",\"C\"]]', '2019-2020'),
(104, 142, 57, '[[\"15\",\"D\"],[\"15\",\"E\"],[\"19\",\"F\"]]', '2019-2020'),
(106, 134, 72, '[[\"16\",\"A\"],[\"16\",\"B\"],[\"16\",\"C\"],[\"16\",\"D\"],[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(108, 145, 18, '[[\"15\",\"A\"],[\"15\",\"B\"],[\"15\",\"C\"],[\"15\",\"D\"],[\"15\",\"E\"],[\"19\",\"F\"]]', '2019-2020'),
(111, 147, 6, '[[\"14\",\"A\"],[\"14\",\"B\"],[\"14\",\"C\"],[\"14\",\"D\"],[\"14\",\"E\"],[\"18\",\"F\"]]', '2019-2020'),
(114, 198, 69, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(115, 197, 60, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(116, 202, 64, '[[\"30\",\"A\"],[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(117, 186, 59, '[[\"34\",\"A\"],[\"34\",\"B\"],[\"40\",\"F\"]]', '2019-2020'),
(118, 205, 63, '[[\"30\",\"A\"],[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(119, 194, 26, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(120, 206, 70, '[[\"30\",\"A\"],[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(122, 207, 59, '[[\"30\",\"A\"],[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(123, 190, 60, '[[\"34\",\"A\"],[\"34\",\"B\"],[\"40\",\"F\"]]', '2019-2020'),
(124, 193, 59, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(125, 203, 67, '[[\"30\",\"A\"],[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(126, 204, 4, '[[\"30\",\"A\"],[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(127, 191, 72, '[[\"34\",\"A\"],[\"34\",\"B\"],[\"40\",\"F\"]]', '2019-2020'),
(128, 196, 4, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(129, 199, 72, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(130, 188, 64, '[[\"34\",\"A\"],[\"34\",\"B\"],[\"40\",\"F\"]]', '2019-2020'),
(131, 161, 32, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"26\",\"F\"]]', '2019-2020'),
(132, 96, 36, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"36\",\"F\"]]', '2019-2020'),
(133, 168, 38, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"36\",\"F\"]]', '2019-2020'),
(134, 98, 32, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"36\",\"F\"]]', '2019-2020'),
(135, 99, 30, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"36\",\"F\"]]', '2019-2020'),
(136, 171, 27, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"36\",\"F\"]]', '2019-2020'),
(137, 172, 44, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"36\",\"F\"]]', '2019-2020'),
(138, 95, 30, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"36\",\"F\"]]', '2019-2020'),
(139, 60, 29, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"26\",\"F\"]]', '2019-2020'),
(140, 61, 40, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"26\",\"F\"]]', '2019-2020'),
(141, 62, 28, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"26\",\"F\"]]', '2019-2020'),
(144, 91, 41, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"26\",\"F\"]]', '2019-2020'),
(145, 63, 37, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"26\",\"F\"]]', '2019-2020'),
(146, 92, 41, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"26\",\"F\"]]', '2019-2020'),
(147, 93, 33, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"26\",\"F\"]]', '2019-2020'),
(148, 176, 30, '[[\"21\",\"A\"],[\"21\",\"B\"],[\"25\",\"F\"]]', '2019-2020'),
(149, 177, 33, '[[\"21\",\"A\"],[\"21\",\"B\"],[\"25\",\"F\"]]', '2019-2020'),
(150, 178, 37, '[[\"21\",\"A\"],[\"21\",\"B\"],[\"25\",\"F\"]]', '2019-2020'),
(151, 180, 36, '[[\"21\",\"A\"],[\"21\",\"B\"],[\"25\",\"F\"]]', '2019-2020'),
(152, 179, 29, '[[\"21\",\"A\"],[\"21\",\"B\"],[\"25\",\"F\"]]', '2019-2020'),
(153, 175, 31, '[[\"21\",\"A\"],[\"21\",\"B\"],[\"25\",\"F\"]]', '2019-2020'),
(154, 54, 27, '[[\"24\",\"A\"],[\"24\",\"B\"],[\"27\",\"F\"]]', '2019-2020'),
(155, 55, 37, '[[\"24\",\"A\"],[\"24\",\"B\"],[\"27\",\"F\"]]', '2019-2020'),
(156, 52, 44, '[[\"24\",\"A\"],[\"24\",\"B\"],[\"27\",\"F\"]]', '2019-2020'),
(157, 53, 38, '[[\"24\",\"A\"],[\"24\",\"B\"],[\"27\",\"F\"]]', '2019-2020'),
(158, 56, 32, '[[\"24\",\"A\"],[\"24\",\"B\"],[\"27\",\"F\"]]', '2019-2020'),
(159, 50, 29, '[[\"24\",\"A\"],[\"24\",\"B\"],[\"27\",\"F\"]]', '2019-2020'),
(160, 51, 44, '[[\"24\",\"A\"],[\"24\",\"B\"],[\"27\",\"F\"]]', '2019-2020'),
(161, 210, 59, '[[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(162, 6, 59, '[[\"34\",\"B\"],[\"40\",\"F\"]]', '2019-2020'),
(163, 7, 59, '[[\"40\",\"F\"]]', '2019-2020'),
(164, 211, 81, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(165, 212, 64, '[[\"30\",\"A\"],[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(166, 17, 64, '[[\"40\",\"F\"]]', '2019-2020'),
(167, 213, 65, '[[\"40\",\"F\"]]', '2019-2020'),
(168, 23, 69, '[[\"40\",\"F\"]]', '2019-2020'),
(169, 214, 82, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(170, 215, 82, '[[\"28\",\"A\"],[\"28\",\"B\"],[\"29\",\"F\"]]', '2019-2020'),
(171, 216, 67, '[[\"32\",\"A\"]]', '2019-2020'),
(172, 210, 67, '[[\"32\",\"A\"]]', '2019-2020'),
(173, 28, 83, '[[\"30\",\"A\"],[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(174, 217, 11, '[[\"15\",\"A\"],[\"15\",\"B\"]]', '2019-2020'),
(175, 218, 84, '[[\"14\",\"B\"],[\"14\",\"C\"],[\"14\",\"D\"]]', '2019-2020'),
(176, 220, 84, '[[\"13\",\"B\"],[\"17\",\"F\"]]', '2019-2020'),
(177, 221, 7, '[[\"14\",\"A\"],[\"14\",\"B\"],[\"14\",\"C\"],[\"14\",\"D\"],[\"14\",\"E\"],[\"18\",\"F\"]]', '2019-2020'),
(178, 222, 14, '[[\"14\",\"A\"],[\"18\",\"F\"]]', '2019-2020'),
(179, 223, 14, '[[\"13\",\"A\"],[\"13\",\"C\"],[\"13\",\"D\"],[\"13\",\"E\"]]', '2019-2020'),
(180, 219, 15, '[[\"15\",\"A\"],[\"15\",\"B\"],[\"15\",\"C\"]]', '2019-2020'),
(181, 217, 73, '[[\"15\",\"C\"],[\"15\",\"D\"],[\"15\",\"E\"],[\"19\",\"F\"]]', '2019-2020'),
(182, 224, 23, '[[\"15\",\"D\"],[\"15\",\"E\"],[\"19\",\"F\"]]', '2019-2020'),
(183, 225, 23, '[[\"13\",\"C\"],[\"13\",\"E\"],[\"17\",\"F\"]]', '2019-2020'),
(184, 226, 22, '[[\"13\",\"C\"],[\"13\",\"E\"]]', '2019-2020'),
(185, 227, 22, '[[\"14\",\"A\"],[\"14\",\"B\"],[\"14\",\"C\"],[\"14\",\"D\"],[\"14\",\"E\"],[\"18\",\"F\"]]', '2019-2020'),
(186, 228, 22, '[[\"18\",\"F\"]]', '2019-2020'),
(187, 224, 20, '[[\"15\",\"A\"],[\"15\",\"B\"],[\"15\",\"C\"]]', '2019-2020'),
(188, 229, 27, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"23\",\"C\"],[\"23\",\"D\"],[\"26\",\"F\"]]', '2019-2020'),
(189, 233, 30, '[[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(190, 232, 30, '[[\"25\",\"F\"]]', '2019-2020'),
(191, 232, 31, '[[\"21\",\"A\"],[\"21\",\"B\"]]', '2019-2020'),
(192, 234, 31, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"22\",\"C\"],[\"22\",\"D\"],[\"36\",\"F\"]]', '2019-2020'),
(193, 235, 32, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"23\",\"C\"],[\"23\",\"D\"],[\"26\",\"F\"]]', '2019-2020'),
(194, 236, 37, '[[\"21\",\"A\"],[\"21\",\"B\"],[\"25\",\"F\"]]', '2019-2020'),
(195, 237, 38, '[[\"24\",\"A\"],[\"24\",\"B\"]]', '2019-2020'),
(196, 238, 39, '[[\"22\",\"A\"],[\"22\",\"C\"]]', '2019-2020'),
(197, 240, 39, '[[\"21\",\"A\"],[\"21\",\"B\"],[\"25\",\"F\"]]', '2019-2020'),
(198, 238, 41, '[[\"22\",\"B\"],[\"22\",\"D\"],[\"36\",\"F\"]]', '2019-2020'),
(199, 239, 41, '[[\"22\",\"B\"],[\"22\",\"C\"],[\"22\",\"D\"],[\"36\",\"F\"]]', '2019-2020'),
(200, 241, 44, '[[\"28\",\"A\"],[\"28\",\"B\"],[\"29\",\"F\"]]', '2019-2020'),
(201, 233, 44, '[[\"16\",\"A\"],[\"16\",\"B\"]]', '2019-2020'),
(202, 230, 36, '[[\"23\",\"A\"],[\"23\",\"D\"]]', '2019-2020'),
(203, 80, 36, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"22\",\"C\"]]', '2019-2020'),
(204, 242, 36, '[[\"21\",\"A\"],[\"21\",\"B\"],[\"25\",\"F\"]]', '2019-2020'),
(205, 244, 46, '[[\"21\",\"A\"],[\"21\",\"B\"],[\"25\",\"F\"]]', '2019-2020'),
(206, 245, 71, '[[\"24\",\"A\"],[\"24\",\"B\"],[\"24\",\"C\"]]', '2019-2020'),
(207, 237, 85, '[[\"24\",\"C\"],[\"24\",\"D\"],[\"27\",\"F\"]]', '2019-2020'),
(208, 243, 34, '[[\"21\",\"A\"],[\"21\",\"B\"],[\"25\",\"F\"]]', '2019-2020'),
(209, 71, 86, '[[\"23\",\"D\"]]', '2019-2020'),
(210, 246, 87, '[[\"24\",\"A\"]]', '2019-2020'),
(211, 86, 87, '[[\"22\",\"B\"],[\"22\",\"C\"],[\"22\",\"D\"]]', '2019-2020'),
(212, 247, 88, '[[\"16\",\"A\"],[\"16\",\"B\"],[\"16\",\"C\"],[\"16\",\"D\"],[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(213, 248, 76, '[[\"16\",\"A\"],[\"16\",\"B\"],[\"16\",\"C\"],[\"16\",\"D\"],[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(214, 249, 76, '[[\"34\",\"A\"],[\"34\",\"B\"],[\"40\",\"F\"]]', '2019-2020'),
(215, 250, 77, '[[\"34\",\"A\"],[\"34\",\"B\"],[\"40\",\"F\"]]', '2019-2020'),
(216, 254, 78, '[[\"34\",\"A\"],[\"34\",\"B\"],[\"40\",\"F\"]]', '2019-2020'),
(217, 256, 105, '[[\"32\",\"A\"],[\"32\",\"B\"],[\"33\",\"F\"]]', '2019-2020'),
(218, 258, 106, '[[\"16\",\"C\"],[\"16\",\"D\"]]', '2019-2020'),
(219, 258, 107, '[[\"16\",\"A\"],[\"16\",\"B\"]]', '2019-2020'),
(220, 257, 79, '[[\"16\",\"D\"],[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(221, 67, 89, '[[\"24\",\"A\"],[\"24\",\"B\"],[\"24\",\"C\"]]', '2019-2020'),
(222, 257, 89, '[[\"16\",\"A\"],[\"16\",\"B\"],[\"16\",\"C\"]]', '2019-2020'),
(223, 233, 90, '[[\"16\",\"C\"],[\"16\",\"D\"]]', '2019-2020'),
(224, 251, 91, '[[\"16\",\"A\"],[\"16\",\"B\"],[\"16\",\"C\"],[\"16\",\"D\"],[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(225, 66, 92, '[[\"24\",\"A\"],[\"24\",\"B\"],[\"24\",\"C\"],[\"24\",\"D\"],[\"27\",\"F\"]]', '2019-2020'),
(226, 255, 93, '[[\"30\",\"A\"],[\"30\",\"B\"],[\"31\",\"F\"]]', '2019-2020'),
(227, 252, 93, '[[\"15\",\"A\"],[\"15\",\"B\"],[\"15\",\"C\"]]', '2019-2020'),
(228, 252, 94, '[[\"15\",\"D\"],[\"15\",\"E\"],[\"19\",\"F\"]]', '2019-2020'),
(229, 213, 95, '[[\"34\",\"A\"],[\"34\",\"B\"]]', '2019-2020'),
(230, 245, 95, '[[\"24\",\"D\"],[\"27\",\"F\"]]', '2019-2020'),
(231, 69, 96, '[[\"24\",\"A\"],[\"24\",\"B\"],[\"24\",\"C\"]]', '2019-2020'),
(232, 69, 97, '[[\"24\",\"D\"]]', '2019-2020'),
(233, 70, 98, '[[\"24\",\"C\"],[\"24\",\"D\"]]', '2019-2020'),
(234, 70, 99, '[[\"27\",\"F\"]]', '2019-2020'),
(235, 258, 99, '[[\"16\",\"E\"],[\"20\",\"F\"]]', '2019-2020'),
(236, 253, 100, '[[\"14\",\"A\"],[\"14\",\"B\"],[\"14\",\"C\"],[\"14\",\"D\"],[\"14\",\"E\"],[\"18\",\"F\"]]', '2019-2020'),
(237, 89, 101, '[[\"22\",\"A\"],[\"22\",\"B\"],[\"22\",\"C\"],[\"22\",\"D\"],[\"36\",\"F\"]]', '2019-2020'),
(238, 79, 102, '[[\"23\",\"A\"],[\"23\",\"B\"],[\"23\",\"C\"],[\"23\",\"D\"],[\"26\",\"F\"]]', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id`, `nama`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknik Elektro'),
(3, 'Teknik Sipil'),
(4, 'Perencanaan Wilayah dan Kota');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruang`
--

CREATE TABLE `tbl_ruang` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `id_prodi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruang`
--

INSERT INTO `tbl_ruang` (`id`, `nama`, `jenis`, `id_prodi`) VALUES
(1, 'F.1.1', 'TEORI', 1),
(2, 'F.1.2', 'TEORI', 1),
(3, 'F.1.3', 'TEORI', 1),
(4, 'F.1.4', 'TEORI', 1),
(5, 'F.1.5', 'TEORI', 1),
(6, 'F.1.6', 'TEORI', 1),
(7, 'F.1.7', 'TEORI', 1),
(8, 'F.1.8', 'TEORI', 2),
(9, 'F.1.9', 'TEORI', 2),
(10, 'F.1.10', 'TEORI', 2),
(11, 'F.1.11', 'TEORI', 2),
(12, 'F.1.12', 'TEORI', 2),
(13, 'F.1.13', 'TEORI', 3),
(14, 'F.1.14', 'TEORI', 3),
(15, 'F.1.15', 'TEORI', 3),
(16, 'F.1.16', 'TEORI', 3),
(17, 'F.1.17', 'TEORI', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hari`
--
ALTER TABLE `tbl_hari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jadwalkuliah`
--
ALTER TABLE `tbl_jadwalkuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengampu` (`id_pengampu`),
  ADD KEY `id_jam` (`id_jam`),
  ADD KEY `id_hari` (`id_hari`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_pengampu_2` (`id_pengampu`),
  ADD KEY `id_hari_2` (`id_hari`),
  ADD KEY `id_ruang_2` (`id_ruang`);

--
-- Indexes for table `tbl_jam`
--
ALTER TABLE `tbl_jam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_mk` (`kode_mk`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_prodi_2` (`id_prodi`),
  ADD KEY `id_prodi_3` (`id_prodi`),
  ADD KEY `id_prodi_4` (`id_prodi`);

--
-- Indexes for table `tbl_pengampu`
--
ALTER TABLE `tbl_pengampu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mk` (`id_mk`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `kelas` (`kelas`(3072));

--
-- Indexes for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ruang`
--
ALTER TABLE `tbl_ruang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_hari`
--
ALTER TABLE `tbl_hari`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_jadwalkuliah`
--
ALTER TABLE `tbl_jadwalkuliah`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_jam`
--
ALTER TABLE `tbl_jam`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `tbl_pengampu`
--
ALTER TABLE `tbl_pengampu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_ruang`
--
ALTER TABLE `tbl_ruang`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jadwalkuliah`
--
ALTER TABLE `tbl_jadwalkuliah`
  ADD CONSTRAINT `tbl_jadwalkuliah_ibfk_1` FOREIGN KEY (`id_jam`) REFERENCES `tbl_jam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_jadwalkuliah_ibfk_2` FOREIGN KEY (`id_hari`) REFERENCES `tbl_hari` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_jadwalkuliah_ibfk_3` FOREIGN KEY (`id_pengampu`) REFERENCES `tbl_pengampu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_jadwalkuliah_ibfk_4` FOREIGN KEY (`id_ruang`) REFERENCES `tbl_ruang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD CONSTRAINT `tbl_matakuliah_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tbl_prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pengampu`
--
ALTER TABLE `tbl_pengampu`
  ADD CONSTRAINT `tbl_pengampu_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `tbl_dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pengampu_ibfk_2` FOREIGN KEY (`id_mk`) REFERENCES `tbl_matakuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
