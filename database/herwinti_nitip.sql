-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2017 at 11:55 PM
-- Server version: 10.0.30-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herwinti_nitip`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '123', 'Bonie'),
(2, 'Tes', 'tes', 'Rio'),
(3, 'Admin', '4215', 'Azis');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi_berita` text NOT NULL,
  `tgl_berita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `tgl_berita`) VALUES
(0, 'dd', 'dd', '2013-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `komentar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`nama`, `email`, `komentar`) VALUES
('Redo Kusuma', 'crackcray@yahoo.co.id', 'lumayan'),
('th', 'redokusuma@ymail.com', 'karutt nianan sanak');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tpt_lahir` varchar(60) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelamin` varchar(15) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `tpt_lahir`, `tgl_lahir`, `kelamin`, `agama`, `jabatan`, `foto`) VALUES
(7, '1233455667', 'redo', '', '0000-00-00', 'LAKI-LAKI', 'ISLAM', 'Wali Kelas', '');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `active` varchar(50) NOT NULL,
  `first_login` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `profPic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `username`, `password`, `email`, `active`, `first_login`, `firstname`, `lastname`, `profPic`) VALUES
(1, 'herwin', '$2y$10$Z1t8sq4liKV4hX10zffjGOJKMmyAzlf5uaaupZNLYDl', 'herwin@windowslive.com', '0918e0941cad0285d24eae634d0e6740', 'Yes', '', '', ''),
(2, 'bibi', '$2y$10$kaxgxn6rixPjEZPIEKcMMerfBRZ2J1ilhAPhF8CJSle', 'bibi@gmail.com', 'de8b5bc311f7a56f69a6557a2a40a9e9', 'Yes', '', '', ''),
(5, 'Azis', '$2y$10$F4BnWSEgmzt6lF0tTAVP8.eg8vrJDfXV1uV/IU2pAVy', 'azis.mrsaw@gmail.com', '44f6851236d8db2cc40fb906e79dfea8', 'Yes', '', '', ''),
(9, 'ozan', '$2y$10$BEDvrJXS/yZFC8ZgolEx7.1dg04nTG8N4nZQkBAB43IsaY9Cnmx2G', 'ozan@mail.com', '12b5c3c8b60136b1b70b10a6aacb1ae6', 'Yes', '', '', ''),
(10, 'terserah', 'situ', 'situ@mail.com', 'a0bee037dfda13b87092a033680aae0d', 'No', 'Fauzan', 'Adhim', 'online-shopping-icon-70696-9193126726.png'),
(11, 'bonie', 'bonie', 'bonie@gmail.com', 'eda925a0440325a622874466161f008d', 'No', 'MasBonie', 'JKT', 'pas-foto-4x6-9487649970.jpg'),
(12, 'bonie222', '12345', 'bobonbonce@gmail.com', '2c95769ba66751f75abc1812828a2ae7', 'No', 'bonie', 'bonie', 'default.jpg'),
(13, 'Azis313', '4215', 'azis.ankhar2@gmail.com', '1f51fd42c6160b5c21470b777404e9e8', 'No', 'Azis', '.', 'img_20170430_113622_960-1019323845.jpg'),
(14, 'Shandy', '456789', 'shandy.yahya@gmail.com', '6d977aed36317a9a76f99940e23a30e8', 'No', 'Shandy', '.', 'default.jpg'),
(15, 'Fauzan', 'adhim', 'oadhim@gmail.com', '57aebcd835203f547d79b7a32792c908', 'No', 'Fauzan', 'Adhim', 'dsc01059-1846610149.jpg'),
(16, 'joni', '12345', 'joni@gmail.com', 'ffa74fda63edecc9eb46c3ac4917ff94', 'No', 'joni', 'joni', 'default.jpg'),
(19, 'kucing', 'kucing', 'kucing@mail.com', '37d326f612c891704f330385f8363bae', 'Yes', 'kucing', 'kucing', ''),
(20, 'kucing1', 'kucing1', 'kucing1@mail.com', '70510ef6995dd3ab5ce2c1f420e1178e', 'Yes', 'kucing1', 'kucing1', ''),
(21, '', '', '', '063d08f662a312f8f4b24a3a522bfd89', 'Yes', '', '', ''),
(22, 'reza', 'reza', 'milikreza11@gmail.com', '0d0506b19702aa1cfab5706896be163a', 'Yes', 'ali', 'reza', ''),
(23, 'tomcat', 'tomcat', 'tomcat@yahoo.com', '0f8c932902c31f6e4fc3a42d8d3cabf4', 'Yes', 'Tom', 'Cat', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `reqID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `itemDesc` varchar(999) NOT NULL,
  `itemCategory` varchar(50) NOT NULL,
  `itemPic` varchar(100) NOT NULL,
  `itemUrl` varchar(100) NOT NULL,
  `cityRequest` varchar(100) NOT NULL,
  `countryRequest` varchar(100) NOT NULL,
  `cityDeal` varchar(100) NOT NULL,
  `countryDeal` varchar(100) NOT NULL,
  `pay` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tripID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`reqID`, `memberID`, `item`, `itemDesc`, `itemCategory`, `itemPic`, `itemUrl`, `cityRequest`, `countryRequest`, `cityDeal`, `countryDeal`, `pay`, `status`, `tripID`) VALUES
(7, 10, 'Kamera Canon 675', 'Kamera Canon 675 DSLR Baru', 'nice', 'canon-9801982152.jpg', '', 'Jakarta', ' Indonesia', 'Surabaya', ' Indonesia', 4050000, 'open', 10),
(5, 10, 'Bakpia', 'Bakpia Patok 25 khas yogjakarta', 'nice', 'bakpia-8428327543.jpg', '', 'Jogjakarta', ' Indonesia', 'Surabaya', ' Indonesia', 100000, 'open', 10),
(6, 10, 'Iphone 5', 'Iphone 5 Refurbish 3/16 ', 'nice', 'iphone-4200219884.jpg', '', 'Jakarta', ' Indonesia', 'Surabaya', ' Indonesia', 3050000, 'open', 10),
(4, 10, 'Kaktus', 'Kaktus hias mini warna warni', 'nice', 'kaktus-4634256460.jpg', '', 'Surabaya', ' Indonesia', 'Lamongan', ' Indonesia', 50000, 'open', 10),
(8, 13, 'Mod Vape Dotmod 200W', '		    Rokok Elektrik', 'nice', 'img_20170430_113622_960-8053749431.jpg', '', 'Manchester', ' Inggris', 'Tangerang', ' Indonesia', 1000, 'open', 10),
(9, 10, 'Nasi Bungkus', 'Khas per limaan', 'nice', 'money-3168281149.png', '', 'Gresik', ' Indonesia', 'Jakarta', ' Indonesia', 500000, 'open', 10),
(10, 10, 'Seblak', 'Seblak level 5 Plus toping', 'nice', 'seblak-6029838132.jpg', '', 'Gresik', ' Indonesia', 'Surabaya', ' Indonesia', 20000, 'open', 10),
(11, 16, 'Jam tangan', 'fossil		    ', 'nice', 'fossil.jpg', '', 'London', 'Inggris', 'Jakarta', 'Indonesia', 2000000, 'open', 6),
(14, 10, 'Bakiak', 'Bakiak atau Klompen', 'nice', 'bakiak-1577296084.jpg', '', 'Tuban', 'Indonesia', 'Gresik', 'Indonesia', 75000, 'open', 10),
(13, 10, 'Blangkon', 'Blangkon', 'nice', 'blangkon-j-8557445728.jpg', '', 'Tuban', 'Indonesia', 'Gresik', 'Indonesia', 100000, 'open', 10),
(15, 13, 'Samsung Galaxy J7 Prime', '		    Warna Black', 'nice', '20170217_1-8798540085.jpg', '', 'Inggris', 'London', 'Tangerang', 'Indonesia', 3000, 'open', 14),
(17, 10, 'Cumin', 'CUmi Asam Masni', 'nice', 'cumi-cumi--214318395.jpg', '', 'Jakarta', 'Indonesia', 'Surabaya', 'Indonesia', 50000, 'open', 6),
(18, 14, 'Semirnof', '		     Minuman Berenergi', 'nice', 'vodka-2839187583.jpg', '', 'London', 'Inggris', 'Jakarta', 'Indonesia', 500000, 'open', 14),
(19, 23, 'Kluwek', 'Kluwek Bahan buat rawon', 'nice', 'kluwekaaas-6113301934.jpg', 'Bahanmasak.com', 'Gresik', 'Indonesia', 'Surabaya', 'Indonesia', 25000, 'open', 10);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(5) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kelamin` varchar(15) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `kelamin`, `agama`, `alamat`) VALUES
(38, 'redo', 'LAKI-LAKI', 'ISLAM', 'Sawah Lebar'),
(39, 'REDO KUSUMA', 'LAKI-LAKI', 'ISLAM', 'Meranti 3'),
(41, 'pt pt', '', '', 'piyungan'),
(42, 'mmm', '', '', 'kkk');

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `ket` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id`, `nama`, `pelanggan`, `alamat`, `kontak`, `telp`, `tgl`, `jam`, `ket`) VALUES
(1, 'aan', 'pt putri', 'jogja', '', '08995477796', '2015-04-08', '10:00:00', '100k'),
(7, 'Widodo', 'pt putri', 'yky', 'p', 'yky', '2015-04-15', '10:00:00', ''),
(8, 'Wintolo', 'p', 'k', '', '789', '2015-04-22', '00:00:00', ''),
(10, 'Anton', 'kkk', '', '', '', '0000-00-00', '00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `teknisi1`
--

CREATE TABLE `teknisi1` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teknisi1`
--

INSERT INTO `teknisi1` (`id`, `nama`) VALUES
(1, 'Widodo'),
(2, 'Anton Nugroho'),
(5, 'wintolo'),
(6, 'aan zuniarto');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `tripID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `travel_to_city` varchar(100) NOT NULL,
  `travel_to_country` varchar(100) NOT NULL,
  `back_to_city` varchar(100) NOT NULL,
  `back_to_country` varchar(100) NOT NULL,
  `expected_back_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`tripID`, `memberID`, `travel_to_city`, `travel_to_country`, `back_to_city`, `back_to_country`, `expected_back_date`) VALUES
(1, 10, 'test', 'test', 'test', 'test', '2017-05-06'),
(4, 8, 'Surabaya', 'Indonesia', 'Jogyakarta', 'Indonesia', '2017-05-09'),
(5, 7, 'Jakarta', 'Indonesia', 'Surabaya', 'Indonesia', '2017-05-03'),
(6, 12, 'test', 'test', 'test', 'test', '2017-05-20'),
(7, 13, 'Barcelona', ' Spanyol', 'Tangerang', ' Indonesia', '2017-05-09'),
(8, 13, 'Kuala Lumpur', ' Malaysia', 'Tangerang', ' Indonesia', '2017-05-09'),
(9, 13, 'Manchester', ' Inggris', 'Tangerang', ' Indonesia', '2017-05-10'),
(10, 10, 'Tuban', 'Indonesia', 'Gresik', 'Indonesia', '2017-05-29'),
(11, 10, 'Gresik', 'Indonesia', 'Surabaya', 'Indonesia', '2017-05-20'),
(12, 11, 'Surabaya', 'Indonesia', 'Colombo', 'Srilanka', '2017-05-11'),
(13, 12, 'London', 'Inggris', 'Jakart', 'Indonesia', '2017-05-11'),
(14, 12, 'London', 'Inggris', 'Jakarta', 'Indonesia', '2017-05-15'),
(15, 12, 'Kuala Lumpur', 'Malaysia', 'Jakarta', 'Indonesia', '2017-05-12'),
(16, 16, 'Tokyo', 'Jepang', 'Jakarta', 'Indonesia', '2017-05-31'),
(17, 13, 'Madrid', 'Spanyol', 'Tangerang', ' Indonesia', '2017-05-12'),
(18, 1, 'Surabaya', 'Indonesia', 'Jakarta', 'Indonesia', '2017-05-30'),
(19, 1, 'Surabaya', 'Indonesia', 'Papua', 'Indonesia', '2017-05-28'),
(20, 10, 'Bali', 'Indonesia', 'Surabaya', 'Indonesia', '2017-05-30'),
(22, 10, 'Bali', 'Indonesia', 'Jakarta', 'Indonesia', '2017-05-23'),
(24, 10, 'surabaya', 'indonesia', 'sidoarjo', 'indonesia', '2017-05-15'),
(25, 10, 'colombo', 'srilanka', 'jakarta', 'indonesia', '2017-05-16'),
(26, 10, 'Mojokerto', 'Indonesia', 'Jombang', 'Indonesia', '2017-05-29'),
(27, 10, 'Sampit', 'Indonesia', 'Majalengka', 'Indonesia', '2017-05-28'),
(28, 10, 'Surabaya', 'Indonesia', 'Lampung', 'Indonesia', '2017-05-23'),
(29, 22, 'gresik', 'indonesia', 'lamongan', 'indonesia', '2017-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `kontak` varchar(35) NOT NULL,
  `type` varchar(50) NOT NULL,
  `sn` varchar(35) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `telp`, `kontak`, `type`, `sn`, `tgl`) VALUES
(9, 'keke  ', 'bantul', '', '', 'Matrix Series', '', '2015-04-21'),
(11, 'mimi ', '', '', '', 'Matrix Series', '', '0000-00-00'),
(12, 'nn ', '', '', '', 'Matrix Series', '', '0000-00-00'),
(13, 'o', '', '', '', 'Matrix Series', '', '0000-00-00'),
(14, 'p', '', '', '', 'Matrix Series', '', '0000-00-00'),
(15, 'lll', '', '', '', 'Matrix Series', '', '0000-00-00'),
(16, 'ppppp', '', '', '', 'Matrix Series', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `kontak` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`id`, `nama`, `alamat`, `telp`, `kontak`) VALUES
(1, 'PT PUTRI ', 'jogja', '08995477796', 'putri'),
(10, 'ok', 'piyungan', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`reqID`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teknisi1`
--
ALTER TABLE `teknisi1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`tripID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `reqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `teknisi1`
--
ALTER TABLE `teknisi1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `tripID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
