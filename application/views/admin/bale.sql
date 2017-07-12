-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 22. Februari 2017 jam 05:07
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bale`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username_admin` varchar(254) NOT NULL,
  `password_admin` varchar(245) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(254) NOT NULL,
  `alamat` text,
  `latitude` varchar(254) NOT NULL,
  `longitude` varchar(254) NOT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`, `alamat`, `latitude`, `longitude`) VALUES
(5, 'Universitas Negeri Yogyakarta', 'Yogyakarta', '-7.775846', '110.383853'),
(6, 'Bantul', 'Bantul', '-7.840243', '110.408333'),
(7, 'Yogyakarta', 'Yogyakarta', '-7.797068', '110.370529');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumah`
--

CREATE TABLE IF NOT EXISTS `rumah` (
  `id_rumah` int(11) NOT NULL AUTO_INCREMENT,
  `id_lokasi` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tipe` char(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(254) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `kamar_tidur` int(11) NOT NULL,
  `kamar_mandi` int(11) NOT NULL,
  `parkir` tinyint(1) DEFAULT NULL,
  `internet` tinyint(1) DEFAULT NULL,
  `ac` tinyint(1) DEFAULT NULL,
  `verifikasi` char(30) NOT NULL,
  `dapur` tinyint(1) DEFAULT NULL,
  `mesin_cuci` tinyint(1) DEFAULT NULL,
  `tv` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_rumah`),
  KEY `id_lokasi` (`id_lokasi`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data untuk tabel `rumah`
--

INSERT INTO `rumah` (`id_rumah`, `id_lokasi`, `id`, `tipe`, `harga`, `deskripsi`, `foto`, `kapasitas`, `kamar_tidur`, `kamar_mandi`, `parkir`, `internet`, `ac`, `verifikasi`, `dapur`, `mesin_cuci`, `tv`) VALUES
(35, 5, 1, 'Kamar Pribadi', 500000, '			coba insert		', 'IMG_20161021_155708.jpg', 1, 1, 1, 1, 0, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `privileges` char(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `privileges`) VALUES
(1, 'Selvi P', 'selvipurwanti@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(2, 'Retno Nur ', 'reretnur@gmail.com', '202cb962ac59075b964b07152d234b70', '2');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rumah`
--
ALTER TABLE `rumah`
  ADD CONSTRAINT `rumah_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`),
  ADD CONSTRAINT `rumah_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
