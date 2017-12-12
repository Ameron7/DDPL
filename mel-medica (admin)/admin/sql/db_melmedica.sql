-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 05:50 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_melmedica`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ctg_id` int(1) NOT NULL,
  `ctg_name` varchar(10) NOT NULL,
  `ctg_desc` varchar(30) NOT NULL,
  `ctg_image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ctg_id`, `ctg_name`, `ctg_desc`, `ctg_image`) VALUES
(1, 'Generik', '', 'generik.png'),
(2, 'Etikal', '', 'etikal.png'),
(3, 'Lain-Lain', '', 'lain.png');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logo_id` int(1) NOT NULL,
  `logo_name` varchar(20) NOT NULL,
  `logo_desc` varchar(100) NOT NULL,
  `logo_image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logo_id`, `logo_name`, `logo_desc`, `logo_image`) VALUES
(1, 'Obat Bebas', 'Obat Bebas merupakan obat yang boleh digunakan tanpa resep dokter.', 'bebas.png'),
(2, 'Obat Bebas Terbatas', 'Jenis obat yang pada setiap takaran penggunaan diberi batas dan boleh dibeli tanpa resep.', 'terbatas.png'),
(3, 'Obat Keras', 'Obat keras adalah obat yang hanya boleh diserahkan dengan resep dokter.', 'keras.png');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `prod_id` int(5) NOT NULL,
  `ctg_id` int(1) NOT NULL,
  `prod_name` varchar(30) NOT NULL,
  `prod_desc` varchar(80) NOT NULL,
  `prod_cost` bigint(20) NOT NULL,
  `prod_image` text NOT NULL,
  `logo_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`prod_id`, `ctg_id`, `prod_name`, `prod_desc`, `prod_cost`, `prod_image`, `logo_id`) VALUES
(1, 1, 'Panadol Hijau', 'Obat pilek dan flu', 8000, 'panadolhijau.jpg', 1),
(18, 1, 'Vicks Formula 44 Syrup', 'Obat Batuk', 14000, 'vickssirup.jpg', 2),
(21, 1, 'Actifed Merah', 'Obat pilek', 5000, 'actifedmerah.png', 2),
(22, 1, 'Panadol Merah', 'Pereda Sakit Kepala Hebat', 9000, 'panadolmerah.jpg', 1),
(23, 2, 'Ampicillin', 'Antibiotik', 10000, 'ampicilin.jpg', 3),
(24, 2, 'Lodia', 'Antidiare', 9800, 'lo.jpg', 3),
(25, 2, 'Salbutamol', 'Mengobati Bronkospasme', 15000, 'salbutamol.jpg', 3),
(26, 3, 'Balsem Kuning Cap Kaki Tiga', 'Meredakan sakit kepala, nyeri, dan gatal-gatal', 20000, 'balsem.jpg', 1),
(27, 3, 'Bye Bye Fever', 'kompres pereda panas', 5000, 'byebyefever.jpg', 1),
(28, 3, 'Hansaplast Kid', 'plester luka', 800, 'hpkids.png', 1),
(36, 1, 'Panadol Anak Sirup', 'Meredakan panas', 14000, 'panadolsirup.png', 1),
(37, 1, 'Actifed Hijau', 'Obat batuk', 8000, 'actifedhijau.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `promo_id` int(1) NOT NULL,
  `prod_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`promo_id`, `prod_id`) VALUES
(0, 27),
(1, 22),
(2, 21),
(3, 28),
(4, 18),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slid_id` int(1) NOT NULL,
  `slid_title` varchar(20) NOT NULL,
  `slid_desc` varchar(60) NOT NULL,
  `slid_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slid_id`, `slid_title`, `slid_desc`, `slid_image`) VALUES
(1, 'Banner 1', 'Banner Slide 1', 'banner1.jpg'),
(2, 'Bsnner 2', 'Banner Slide 2', 'banner2.jpg'),
(3, 'Banner 3', 'Banner Slide 3', 'banner3.jpg'),
(4, 'Banner 4', 'Banner Slide 4', 'banner4.jpg'),
(5, 'Banner 5', 'Banner Slide 5', 'banner5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role_id` int(2) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`, `nama_lengkap`, `email`, `telpon`) VALUES
(2, 'admin', '9fa186b48d8784d512254b5f3c5d80c2', 1, 'Admin Apotek Melmedica', 'melmedica@gmail.com', '08123156299');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slid_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `prod_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
