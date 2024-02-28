-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 28. Februari 2024 jam 05:45
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ukkppdbimam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbllogin`
--

CREATE TABLE IF NOT EXISTS `tbllogin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbllogin`
--

INSERT INTO `tbllogin` (`username`, `password`) VALUES
('admin', 'imam123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpendaftaran`
--

CREATE TABLE IF NOT EXISTS `tblpendaftaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(255) NOT NULL,
  `TempatTanggalLahir` varchar(255) NOT NULL,
  `WargaNegara` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NoHP` int(12) NOT NULL,
  `AsalSMP` varchar(255) NOT NULL,
  `NamaAyah` varchar(255) NOT NULL,
  `NamaIbu` varchar(255) NOT NULL,
  `PenghasilanOrTu` varchar(255) NOT NULL,
  `UploadFoto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `tblpendaftaran`
--

INSERT INTO `tblpendaftaran` (`id`, `Nama`, `TempatTanggalLahir`, `WargaNegara`, `Alamat`, `Email`, `NoHP`, `AsalSMP`, `NamaAyah`, `NamaIbu`, `PenghasilanOrTu`, `UploadFoto`) VALUES
(21, 'aku imamadwdaw', 'tanah merah 09-09-2007', 'dwadaw', 'hghghg', 'imaam0710@gmail.com', 2147483647, 'smp 1air puti', 'adwwad', 'wadada', '100000011', 'UPB.jpeg'),
(22, 'aku imamadwdawdawa', 'tanah merah 09-09-2007', 'dwadaw', 'hghghg', 'imaam0710@gmail.com', 2147483647, 'smp 1air puti', 'adwwad', 'wadada', '100000011', 'UPB.jpeg'),
(23, 'aku imamadwdawddawawa', 'tanah merah 09-09-2007', 'dwadaw', 'hghghg', 'imaam0710@gmail.com', 2147483647, 'smp 1air puti', 'adwwad', 'wadada', '100000011', 'UPB.jpeg'),
(25, 'imamtua', 'imam, 07 02 2007', 'indonesia', 'tanh merah', 'imaam0710@email.com', 2147483647, 'Smp Negeri 3 Air Putih\\', 'adwwad', 'dwadwa', '921909021', 'RESTU IMAM (1).jpg'),
(26, 'RAHMA', 'tanah merah 09-09-2007', 'indonesia', 'tanah merah', 'imamrestu042@gmail.com', 2147483647, 'smp 1air puti', 'dwaawd', 'dmakwdk', '92190902190', 'RESTU IMAM.jpg'),
(27, 'RAHMA rahma', 'tanah merah 09-09-2007', 'indonesia', 'tanah merah', 'imamrestu042@gmail.com', 2147483647, 'smp 1air puti', 'dwaawd', 'dmakwdk', '92190902190', 'RESTU IMAM.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
