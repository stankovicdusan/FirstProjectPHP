-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 03:51 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2017200986`
--

-- --------------------------------------------------------

--
-- Table structure for table `dobavljaci`
--

CREATE TABLE `dobavljaci` (
  `id_dobavljaci` int(10) NOT NULL,
  `ime_dobavljaca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prodavnica_id` int(10) NOT NULL,
  `proizvod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proizvod_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dobavljaci_prodavnica`
--

CREATE TABLE `dobavljaci_prodavnica` (
  `id_dobavljaci_prodavnica` int(10) NOT NULL,
  `prodavnice_id` int(10) NOT NULL,
  `dobavljaci_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info_proizvod`
--

CREATE TABLE `info_proizvod` (
  `id_ip` int(10) NOT NULL,
  `tekst1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tekst2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tekst3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tekst4` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `proizvod_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `info_proizvod`
--

INSERT INTO `info_proizvod` (`id_ip`, `tekst1`, `tekst2`, `tekst3`, `tekst4`, `proizvod_id`) VALUES
(1, 'Screen diagonal: 27\"', 'Screen resolution 1920 x 1080', 'IPS panel type', 'Response time of 1ms', 7),
(2, 'Screen diagonal: 25\"', 'Screen resolution 1920 x 1080', 'TN panel type', 'Response time of 1ms', 8),
(3, 'Connectivity Cable', 'Key type Diaphragm keys', 'Numerical part Np', 'Backlight Yes', 5),
(4, 'Connectivity Cable', 'Optical sensor', 'DPI resolution up to 3500dpi', 'Backlight Yes', 3),
(5, 'Connectivity Cable', 'Key type Diaphragm keys', 'Numerical part Yes', 'Backlight No', 6),
(6, 'Screen diagonal: 24\"', 'Screen resolution 1920 x 1080', 'VA panel type', 'Response time of 4ms', 9),
(7, 'Connectivity Cable', 'Key type Diaphragm keys', 'Numerical part Yes', 'Backlight Yes', 4),
(8, 'Connectivity Cable', 'Optical sensor', 'DPI resolution up to 3500dpi', 'Backlight Yes', 1),
(9, 'Connectivity Cable', 'Optical sensor', 'DPI resolution up to 14000dpi', 'Backlight Yes', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id_kategorija` int(10) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id_kategorija`, `naziv`) VALUES
(1, 'Mouse'),
(2, 'Keyboard'),
(3, 'Monitor');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(10) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `uloga_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `ime`, `prezime`, `username`, `email`, `password`, `uloga_id`) VALUES
(1, 'Milica', 'Vilic', 'milicavilic', 'milicavilic@gmail.com', '932e512d0da2821efe2b81539f0b82c5', 2),
(2, 'Pera', 'Peric', 'peraperic', 'peraperic@gmail.com', 'd8795f0d07280328f80e59b1e8414c49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `porudzbine`
--

CREATE TABLE `porudzbine` (
  `id_porudzbina` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `proizvod` varchar(50) NOT NULL,
  `nacin_placanja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `porudzbine`
--

INSERT INTO `porudzbine` (`id_porudzbina`, `ime`, `prezime`, `adresa`, `telefon`, `email`, `proizvod`, `nacin_placanja`) VALUES
(1, 'Milica', 'Vilic', 'VInogradi 1', '0691039980', 'milicamvilic@hotmail.com', 'Redragon M601', 'VISA'),
(2, 'Milica', 'Vilic', 'VInogradi 1', '0691039980', 'milicamvilic@hotmail.com', 'Redragon M601', 'VISA'),
(3, 'Milica', 'Vilic', 'VInogradi 1', '0691039980', 'milicamvilic@hotmail.com', 'Redragon M601', 'VISA');

-- --------------------------------------------------------

--
-- Table structure for table `prodavnica`
--

CREATE TABLE `prodavnica` (
  `id_prodavnica` int(10) NOT NULL,
  `ime_prodavnice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dobavljaci_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id_proizvod` int(15) NOT NULL,
  `src` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `naslov` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(10) NOT NULL,
  `href` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kategorija_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id_proizvod`, `src`, `alt`, `naslov`, `cena`, `href`, `kategorija_id`) VALUES
(1, 'images/redragon.jpg', 'Redragon', 'Redragon M601', 13, 'redragon-m1.php', 1),
(2, 'images/redragonm.jpg', 'Redragonm', 'Redragon M702', 14, 'redragon-m2.php', 1),
(3, 'images/genisis.jpg', 'Genisis', 'Genisis Xenon 210', 15, 'genisis.php', 1),
(4, 'images/redragon1.jpg', 'Redragon1', 'Redragon Asura K501', 40, 'redragon-k.php', 2),
(5, 'images/genious.jpg', 'Geniuos', 'Genious KB-128', 9, 'geniuos.php', 2),
(6, 'images/hama.jpg', 'Hama', 'Hama Urage', 10, 'hama.php', 2),
(7, 'images/acer.jpg', 'Acer', 'Acer VG27', 300, 'acer.php', 3),
(8, 'images/dell.jpg', 'Dell', 'Dell Alienwar AW25', 450, 'dell.php', 3),
(9, 'images/lenovo.jpg', 'Lenovo', 'Lenovo', 190, 'lenovo.php', 3);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id_uloga` int(10) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id_uloga`, `naziv`) VALUES
(1, 'korisnik'),
(2, 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dobavljaci`
--
ALTER TABLE `dobavljaci`
  ADD PRIMARY KEY (`id_dobavljaci`),
  ADD KEY `prodavnica_id` (`prodavnica_id`),
  ADD KEY `proizvod_id` (`proizvod_id`);

--
-- Indexes for table `dobavljaci_prodavnica`
--
ALTER TABLE `dobavljaci_prodavnica`
  ADD PRIMARY KEY (`id_dobavljaci_prodavnica`),
  ADD KEY `dobavljaci_id` (`dobavljaci_id`),
  ADD KEY `prodavnice_id` (`prodavnice_id`) USING BTREE;

--
-- Indexes for table `info_proizvod`
--
ALTER TABLE `info_proizvod`
  ADD PRIMARY KEY (`id_ip`),
  ADD KEY `proizvod_id` (`proizvod_id`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id_kategorija`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `uloga_id` (`uloga_id`);

--
-- Indexes for table `porudzbine`
--
ALTER TABLE `porudzbine`
  ADD PRIMARY KEY (`id_porudzbina`);

--
-- Indexes for table `prodavnica`
--
ALTER TABLE `prodavnica`
  ADD PRIMARY KEY (`id_prodavnica`),
  ADD KEY `dobavljaci_id` (`dobavljaci_id`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id_proizvod`),
  ADD KEY `kategorija_id` (`kategorija_id`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id_uloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dobavljaci`
--
ALTER TABLE `dobavljaci`
  MODIFY `id_dobavljaci` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dobavljaci_prodavnica`
--
ALTER TABLE `dobavljaci_prodavnica`
  MODIFY `id_dobavljaci_prodavnica` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_proizvod`
--
ALTER TABLE `info_proizvod`
  MODIFY `id_ip` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id_kategorija` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `porudzbine`
--
ALTER TABLE `porudzbine`
  MODIFY `id_porudzbina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prodavnica`
--
ALTER TABLE `prodavnica`
  MODIFY `id_prodavnica` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `id_proizvod` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id_uloga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dobavljaci`
--
ALTER TABLE `dobavljaci`
  ADD CONSTRAINT `dobavljaci_ibfk_2` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvod` (`id_proizvod`) ON UPDATE CASCADE;

--
-- Constraints for table `dobavljaci_prodavnica`
--
ALTER TABLE `dobavljaci_prodavnica`
  ADD CONSTRAINT `dobavljaci_prodavnica_ibfk_1` FOREIGN KEY (`dobavljaci_id`) REFERENCES `dobavljaci` (`id_dobavljaci`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dobavljaci_prodavnica_ibfk_2` FOREIGN KEY (`prodavnice_id`) REFERENCES `prodavnica` (`id_prodavnica`) ON UPDATE CASCADE;

--
-- Constraints for table `info_proizvod`
--
ALTER TABLE `info_proizvod`
  ADD CONSTRAINT `info_proizvod_ibfk_1` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvod` (`id_proizvod`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`uloga_id`) REFERENCES `uloga` (`id_uloga`);

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `proizvod_ibfk_1` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`id_kategorija`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
