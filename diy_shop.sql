-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 22 Nov 2024 pada 11.35
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diy_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `multi_user`
--

CREATE TABLE `multi_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `multi_user`
--

INSERT INTO `multi_user` (`id_user`, `nama`, `password`, `email`, `alamat`, `role`) VALUES
(16, 'admin', 'ad12', 'admin@gmail.com', '-', 'admin'),
(19, 'User', 'us12', 'user@gmail.com', 'Tlogomas', 'user'),
(20, 'user2', 'us212', 'user2@gmail.com', 'Batu', 'user'),
(21, 'user3', 'us312', 'user3@gmail.com', 'Singosari', 'user'),
(22, 'user4', 'us412', 'user4@gmail.com', 'Suhat', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_user`, `total_harga`, `tanggal_beli`) VALUES
(94, 11, 30000, '2024-11-20'),
(95, 11, 15000, '2024-11-20'),
(96, 1, 15000, '2024-11-20'),
(97, 1, 50000, '2024-11-20'),
(99, 17, 95000, '2024-11-21'),
(104, 19, 50000, '2024-11-22'),
(105, 19, 50000, '2024-11-22'),
(106, 20, 90000, '2024-11-22'),
(107, 21, 344000, '2024-11-22'),
(108, 21, 80000, '2024-11-22'),
(109, 21, 60000, '2024-11-22'),
(110, 21, 45000, '2024-11-22'),
(111, 22, 159000, '2024-11-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order_item`
--

CREATE TABLE `tb_order_item` (
  `id_order_item` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_order_item`
--

INSERT INTO `tb_order_item` (`id_order_item`, `id_order`, `id_produk`, `quantity`) VALUES
(75, 94, 28, 1),
(76, 95, 16, 1),
(77, 96, 16, 1),
(78, 97, 15, 2),
(80, 99, 32, 2),
(81, 99, 33, 1),
(86, 104, 15, 2),
(87, 105, 32, 2),
(88, 106, 33, 2),
(89, 107, 40, 1),
(90, 107, 39, 1),
(91, 108, 29, 1),
(92, 109, 28, 2),
(93, 110, 33, 1),
(94, 111, 39, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama`, `deskripsi`, `harga`, `stok`, `gambar`) VALUES
(15, 'Star Clip', 'Jepit rambut bentuk bintang 5 pcs', '25000', 46, '1843641045.jpeg'),
(16, 'Jedai Haircules', 'Jedai strong by Declip berbahan dasar plastik warna yang kuat disertai dengan kawat yang berkualitas, sehingga TIDAK MUDAH PECAH.', '15000', 50, '586261553.jpeg'),
(28, 'Snow White jewelry', 'Kalung disney princess snow white dengan batu berlian berbentuk love berwarna merah', '30000', 47, '2134522921.jpeg'),
(29, 'Anting Reve', 'Anting reve big emas  sepasang warnanya tidak mudah pudar dan tidak berkarat', '80000', 49, '749325387.jpeg'),
(30, 'Kalung kupu', 'Set kalung kupu kupu stainless, mendapat 2 pcs kalung dengan charm yang berbeda warna hitam dan putih', '129000', 50, '1204613022.jpeg'),
(32, 'Fake Nails', 'Kuku palsu warna pink 1 set untuk 10 jari, motif coquette bergambar strawberry dan charm pita dan love', '25000', 47, '64050201.jpeg'),
(33, 'Bandana', 'Headband 1 bundle berisi 4 macam yang bentuknya berbeda-beda, charm utama yang digunakan yaitu mutiara', '45000', 52, '790995097.jpeg'),
(38, 'Gelang Y2Kk', 'Gelang Y2K silver dengan charm bintang dan mutiara panjang 14 cmkkk', '25000', 50, '1279648730.jpeg'),
(39, 'Disney Ring', 'Cincin princess disney aurora dengan bentuk yang unik dan terdapat charm bunga mawar merah', '159000', 23, '976695108.jpeg'),
(40, 'Tangled Set', 'Set aksesoris tangled princess rapunzel, dalam satu set ter dapat kalung, anting, cincin dan gelang, bewarna emas dan charm ungu', '185000', 15, '412916673.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `multi_user`
--
ALTER TABLE `multi_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `tb_order_item`
--
ALTER TABLE `tb_order_item`
  ADD PRIMARY KEY (`id_order_item`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `multi_user`
--
ALTER TABLE `multi_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `tb_order_item`
--
ALTER TABLE `tb_order_item`
  MODIFY `id_order_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
