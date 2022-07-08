-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2022 pada 10.28
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `macito`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `macito`
--

CREATE TABLE `macito` (
  `id_macito` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `kuota` int(10) NOT NULL,
  `jam_operasional` time NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `is_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `is_deleted` datetime NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_macito` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto_ktp` varchar(50) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `salt` varchar(20) NOT NULL,
  `is_verified` datetime NOT NULL,
  `user_level` varchar(10) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `is_deleted` datetime DEFAULT NULL,
  `email_verification_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama`, `foto_ktp`, `nik`, `alamat`, `no_hp`, `salt`, `is_verified`, `user_level`, `date_created`, `date_modified`, `is_deleted`, `email_verification_code`) VALUES
(1, 'admin@gmail.com', '4c30158163a5ae2deb4da0e85c362b8d8c8d5e7a5674847409b309633346dd8b', 'admin', '', NULL, 'Jl. Mayjend Panjaitan Malang', '08112245672', '1655888395', '2022-06-20 00:00:00', '1', '2022-06-20 00:00:00', '2022-06-20 00:00:00', NULL, ''),
(5, 'akunkerja.ivan07@gmail.com', '68bdd75334844b5c1e1be07592984df5e0a1c7b59645a3e5c594dbe1e94c7cfc', 'Dinda', '', '3579010702000004', 'Jl. Pisang Kipas 4A Lowokwaru, Malang', '0822112545636', '1656021600', '2022-06-24 00:00:00', '2', '2022-06-24 00:00:00', NULL, NULL, 'W2YhqAmPvTIEcfBpdeM9'),
(6, 'ivanardiyanto07@gmail.com', 'e21bb0de7f40ffedbdf22f10ea4dcb060ee492c91bf267e1f4fac8256d2731dc', 'Ivan Ardiyanto', '', '3579010702000012', 'Jl. Pisang Kipas 4A Lowokwaru, Malang', '0822112545636', '1657144800', '0000-00-00 00:00:00', '2', '2022-07-07 00:00:00', NULL, NULL, 'QwRA3r5VGKqXl1Et6fJO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `macito`
--
ALTER TABLE `macito`
  ADD PRIMARY KEY (`id_macito`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_macito` (`id_macito`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `macito`
--
ALTER TABLE `macito`
  MODIFY `id_macito` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_macito`) REFERENCES `macito` (`id_macito`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
