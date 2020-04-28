-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2020 pada 14.57
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoofixtest`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fixer`
--

CREATE TABLE `fixer` (
  `IDFixer` int(11) NOT NULL,
  `nameFixer` varchar(100) NOT NULL,
  `addressFixer` varchar(500) NOT NULL,
  `cityFixer` varchar(100) NOT NULL,
  `provinceFixer` varchar(100) NOT NULL,
  `IDService` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fixer`
--

INSERT INTO `fixer` (`IDFixer`, `nameFixer`, `addressFixer`, `cityFixer`, `provinceFixer`, `IDService`) VALUES
(1, 'Kanaya Puji', 'Jl. Insinyur Djuanda No.21 Blok D Kelurahan Raya, Kabupaten Bantul, Yogyakarta', 'Kabupaten Bantul', 'DI Yogyakarta', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ordr`
--

CREATE TABLE `ordr` (
  `IDOrder` int(11) NOT NULL,
  `dateOrder` date NOT NULL,
  `timeOrder` date NOT NULL,
  `statusOrder` varchar(10) NOT NULL,
  `rangeOrder` int(11) NOT NULL,
  `timeWorkOrder` int(11) DEFAULT NULL,
  `priceOrder` int(11) DEFAULT NULL,
  `emailUser` varchar(100) NOT NULL,
  `IDFixer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `IDService` int(11) NOT NULL,
  `nameService` varchar(100) NOT NULL,
  `priceService` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`IDService`, `nameService`, `priceService`) VALUES
(1, 'Tukang AC', 50000),
(2, 'Pompa air', 45000),
(3, 'Reparasi Kulkas', 42000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `usr`
--

CREATE TABLE `usr` (
  `emailUser` varchar(100) NOT NULL,
  `nameUser` varchar(100) NOT NULL,
  `addressUser` varchar(500) NOT NULL,
  `cityUser` varchar(50) NOT NULL,
  `provinceUser` varchar(50) NOT NULL,
  `kontakUser` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `usr`
--

INSERT INTO `usr` (`emailUser`, `nameUser`, `addressUser`, `cityUser`, `provinceUser`, `kontakUser`) VALUES
('nikeishadeandra@gmail.com', 'Nikeisha Deandra', 'Jl. Kenari Raya Utara, Perumahan Graha Abdi No.14E Kota Yogyakarta, Yogyakarta', 'Kota Yogyakarta', 'DI Yogyakarta', '082536152736'),
('nikyayulestari@gmail.com', 'Niky Ayu Lestari', 'Jl. Kaliurang KM.14 Tegalsari Gg. Merpati No.10D Umbulmartani Ngemplak, Sleman, Yogyakarta 55584', 'Kabupaten Sleman', 'DI Yogyakarta', '082137970054');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fixer`
--
ALTER TABLE `fixer`
  ADD PRIMARY KEY (`IDFixer`),
  ADD KEY `IDService` (`IDService`);

--
-- Indeks untuk tabel `ordr`
--
ALTER TABLE `ordr`
  ADD PRIMARY KEY (`IDOrder`),
  ADD KEY `emailUser` (`emailUser`),
  ADD KEY `IDFixer` (`IDFixer`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`IDService`);

--
-- Indeks untuk tabel `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`emailUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fixer`
--
ALTER TABLE `fixer`
  MODIFY `IDFixer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ordr`
--
ALTER TABLE `ordr`
  MODIFY `IDOrder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `IDService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fixer`
--
ALTER TABLE `fixer`
  ADD CONSTRAINT `fixer_ibfk_1` FOREIGN KEY (`IDService`) REFERENCES `service` (`IDService`);

--
-- Ketidakleluasaan untuk tabel `ordr`
--
ALTER TABLE `ordr`
  ADD CONSTRAINT `ordr_ibfk_1` FOREIGN KEY (`emailUser`) REFERENCES `usr` (`emailUser`),
  ADD CONSTRAINT `ordr_ibfk_2` FOREIGN KEY (`IDFixer`) REFERENCES `fixer` (`IDFixer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
