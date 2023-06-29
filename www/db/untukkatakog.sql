-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2023 pada 15.57
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `untukkatakog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `foto_admin` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `foto_admin`) VALUES
(1, 'Elma Kiu', 'baron@gmail.com', 'baron', 'admin.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kedai`
--

CREATE TABLE `kedai` (
  `id_kedai` int(11) NOT NULL,
  `nama_kedai` varchar(500) NOT NULL,
  `logo_kedai` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kedai`
--

INSERT INTO `kedai` (`id_kedai`, `nama_kedai`, `logo_kedai`) VALUES
(1, 'Produk UMKM', 'WhatsApp Image 2023-04-22 at 23.56.17.jpeg'),
(2, 'Bahan Produksi', 'WhatsApp Image 2023-04-22 at 23.57.53 (1).jpeg'),
(3, 'Jenis Jasa', 'WhatsApp Image 2023-04-22 at 23.57.53.jpeg'),
(4, 'Lain-lainnya', 'WhatsApp Image 2023-04-22 at 23.56.18 (1).jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kotak_pesan`
--

CREATE TABLE `kotak_pesan` (
  `id_kotak_pesan` int(11) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `nama_client` varchar(50) NOT NULL,
  `wa` varchar(13) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kotak_pesan`
--

INSERT INTO `kotak_pesan` (`id_kotak_pesan`, `tgl`, `nama_client`, `wa`, `pesan`) VALUES
(1, '2023-04-28 17:11:48', 'Aron', '6285238970733', 'Test'),
(6, '2023-05-14 21:24:00', 'Coba', '6281994866117', 'Hallo admin'),
(7, '2023-06-14 11:39:56', 'ffgdffg', '621087345678', 'klklkl');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_kedai` int(11) NOT NULL,
  `nama_menu` varchar(200) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `foto_menu` varchar(300) NOT NULL,
  `stok_menu` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kedai`, `nama_menu`, `harga_menu`, `deskripsi_menu`, `foto_menu`, `stok_menu`, `berat_produk`) VALUES
(1, 1, 'Keripik Pisang', 18000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'WhatsApp Image 2023-04-23 at 02.00.45.jpeg', 339, 1200),
(2, 2, 'Botol Minum Siap Pakai', 15000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'WhatsApp Image 2023-04-23 at 02.11.27.jpeg', 391, 1500),
(7, 1, 'Abon Mamike', 15000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'WhatsApp Image 2023-04-23 at 02.00.44 (1).jpeg', 468, 1300),
(8, 1, 'Kapten Makaroni', 27000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'WhatsApp Image 2023-04-23 at 02.00.45 (1).jpeg', 81, 1100),
(9, 1, 'Corn Chips', 27000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'WhatsApp Image 2023-04-23 at 02.00.44.jpeg', 445, 1400),
(10, 2, 'Botol Serum Siap Pakai', 20000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'WhatsApp Image 2023-04-23 at 02.11.26.jpeg', 477, 1600),
(11, 2, 'Bibit Sawi Pakcoy Siap Pakai', 15000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'a2f930f2aed2baee0d89ca47b8ba075b.jpeg', 387, 1700),
(12, 2, 'Bibit Kubis Hijau Siap Pakai', 25000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'images.jpeg', 493, 1900),
(24, 3, 'PPOB & Agen Deposit Pulsa ALL Operator', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris convallis ante ac orci aliquam varius. Integer vitae semper nunc. Nullam vehicula elementum fringilla. Donec vitae metus rutrum, rutrum ligula eget, gravida est. Nunc dictum dui est, eget suscipit urna convallis ut. Praesent sit amet molestie mi. Integer porttitor porta sodales. Fusce purus magna, dapibus eu lobortis eget, dignissim et quam. Maecenas consectetur sit amet risus gravida convallis. Proin a vehicula mi, at ultricies risus. Nam semper tellus id tortor volutpat, sit amet blandit ex egestas. Vivamus quis lacus nec tortor consequat pulvinar. Fusce eget ullamcorper erat, in interdum magna. Morbi pretium risus in felis viverra, non maximus velit faucibus. Vestibulum scelerisque eleifend risus, quis semper sem tristique et. Pellentesque ac congue elit.', 'rbi_pulsa_banner_icon.png', 13, 1100),
(25, 3, 'Jasa Menjahit Segala Jenis Pakaian ', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae libero id risus finibus egestas et eget nibh. Integer in placerat tortor. Etiam porttitor tortor enim, ut malesuada erat luctus eget. Donec diam lectus, varius non convallis at, lacinia non tellus. Etiam vestibulum accumsan odio, varius commodo augue hendrerit sit amet. Quisque condimentum orci sapien, nec facilisis neque interdum ut. Nulla eget nibh ligula. Fusce malesuada tellus ut purus porttitor, id commodo massa tincidunt.', 'WhatsApp Image 2023-04-22 at 23.56.18 (2).jpeg', 13, 1400),
(26, 4, 'Keranjang Rotan ', 89000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'produk keranjang rotan karakter strawberry.jpg', 10, 1500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `total` varchar(999) NOT NULL,
  `bukti` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `tgl_bayar`, `total`, `bukti`) VALUES
(5, 6, 'Ekhy Welo', 'BANK BCA', '2022-07-09', '45000', 'profil.jpg'),
(6, 17, 'Yanse Oematan', 'BANK MANDIRI', '2022-07-10', '150000', 'WhatsApp Image 2022-07-06 at 17.35.06.jpeg'),
(7, 28, 'Elma Kiu', 'BANK MANDIRI', '2023-04-03', '18000', 'Chuseyo.PNG'),
(8, 53, 'Elma Kiu', 'BANK BRI', '2023-04-06', '284000', '03.jpg'),
(9, 75, 'Ekhy Welo', 'BANK BRI', '2023-04-17', '189000', 'bless.png'),
(10, 55, 'Ekhy Welo', 'BANK BCA', '2023-04-15', '386000', 'logo.png'),
(11, 106, 'Elma Kiu', 'BANK BCA', '2023-06-07', '111000', 'Tagihan Listrik.pdf'),
(12, 104, 'Elma Kiu', 'BANK BNI', '2023-06-07', '398000', 'Tagihan Listrik Bulan 1.pdf'),
(13, 107, 'Elma Kiu', 'BANK BNI', '2023-06-07', '85000', 'Tagihan Listrik.pdf'),
(14, 108, 'Elma Kiu', 'BANK BRI', '2023-06-07', '136000', 'Tagihan Listrik.pdf'),
(15, 109, 'Elma Kiu', 'BANK MANDIRI', '2023-06-08', '204000', 'Tagihan Listrik.pdf'),
(16, 111, 'Elma Kiu', 'BANK MANDIRI', '2023-06-07', '96000', 'Tagihan Listrik.pdf'),
(17, 110, 'Elma Kiu', 'BANK MANDIRI', '2023-06-07', '144000', 'Tagihan Listrik.pdf'),
(18, 114, 'Elma Kiu', 'BANK BCA', '2023-06-15', '66000', '6.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `provinsi` varchar(244) NOT NULL,
  `distrik` varchar(244) NOT NULL,
  `tipe` varchar(244) NOT NULL,
  `kodepos` varchar(244) NOT NULL,
  `idd` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama`, `alamat`, `telepon`, `email`, `password`, `provinsi`, `distrik`, `tipe`, `kodepos`, `idd`) VALUES
(1, 'Karlos Nende', 'Jl. Rantai Damai, Kayu Putih, Oebobo, Kota Kupang', '085111253741', 'karlos@gmail.com', 'karlos', '', '', '', '', ''),
(2, 'Ekhy Welo', 'Jl.Sukun, Oesapa, Oesapa Timur, Kota Kupang', '085239777999', 'eky@gmail.com', 'eky', 'Nusa Tenggara Timur (NTT)', 'Kupang', 'Kota', '85119', '213'),
(3, 'Desty Miha Balo', 'Jl. Air Lobang 3, Maulafa, Sikumana, Kota Kupang', '082266229669', 'desty@gmail.com', 'desty', '', '', '', '', ''),
(4, 'Elma Kiu', 'Jl. Damai, Oebufu, Oebobo, Kota Kupang', '085238970733', 'elma@gmail.com', 'elma', 'DKI Jakarta', 'Jakarta Pusat', 'Kota', '10540', '152'),
(5, 'Ifan Baletty', 'Jl. Amabi, Oebufu, Oebobo, Kota Kupang', '081334456210', 'ifan@gmail.com', 'ifan', '', '', '', '', ''),
(6, 'Yanse Oematan', 'Jl. Damai II Gang Damai 1 RT 30 RW 030 Oebufu', '081339655677', 'yansekiu.haryati2106@gmail.com', 'romansa120300', '', '', '', '', ''),
(7, 'Elma New', 'Jl. Sarwoendah Purwokerto Kulon', '085338318819', 'elmakiu79@gmail.com', 'elmaakunbaru', '', '', '', '', ''),
(8, 'hehe baru jadi', 'Jl. Damai 2 oebufu', '085338318819', 'hehe@gmail.com', 'sandibaru', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `tgl_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_expired` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `finaltotalbelanjabeli` int(11) NOT NULL,
  `ekspedisi` varchar(200) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(300) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `provinsi` varchar(244) NOT NULL,
  `distrik` varchar(244) NOT NULL,
  `kodepos` varchar(244) NOT NULL,
  `tipe` varchar(244) NOT NULL,
  `paket` varchar(244) NOT NULL,
  `estimasi` varchar(244) NOT NULL,
  `total_berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pembeli`, `tgl_pembelian`, `tgl_expired`, `finaltotalbelanjabeli`, `ekspedisi`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `ongkir`, `provinsi`, `distrik`, `kodepos`, `tipe`, `paket`, `estimasi`, `total_berat`) VALUES
(99, 2, '2023-05-29 07:56:33', '2023-06-07 04:01:41', 134000, 'jne', 'Jl.Sukun, Oesapa, Oesapa Timur, Kota Kupang', 'Pending', '', 54000, 'Banten', 'Serang', '42182', 'Kabupaten', 'OKE', '4-6', 3200),
(100, 2, '2023-05-29 07:57:46', '2023-06-07 04:01:41', 85000, 'tiki', 'Jl.Sukun, Oesapa, Oesapa Timur, Kota Kupang', 'Pending', '', 40000, 'Banten', 'Serang', '42182', 'Kabupaten', 'ECO', '4', 3400),
(101, 2, '2023-05-29 08:04:52', '2023-06-07 04:01:41', 180000, 'tiki', 'Jl.Sukun, Oesapa, Oesapa Timur, Kota Kupang', 'Pending', '', 72000, 'Nusa Tenggara Timur (NTT)', 'Kupang', '85119', 'Kota', 'ECO', '4', 2200),
(108, 4, '2023-06-06 17:21:15', '2023-06-07 04:01:41', 136000, 'jne', 'Jl. Damai, Oebufu, Oebobo, Kota Kupang', 'Barang Dikirim', '789FGT', 36000, 'DKI Jakarta', 'Jakarta Pusat', '10540', 'Kota', 'OKE', '2-3', 3800),
(109, 4, '2023-06-06 17:36:15', '2023-06-07 04:01:41', 204000, 'jne', 'Jl. Damai, Oebufu, Oebobo, Kota Kupang', 'Sudah Kirim Pembayaran', '', 42000, 'DKI Jakarta', 'Jakarta Pusat', '10540', 'Kota', 'REG', '1-2', 2800),
(110, 4, '2023-06-07 04:03:21', '2023-06-07 04:03:21', 144000, 'jne', 'Jl. Damai, Oebufu, Oebobo, Kota Kupang', 'Sudah Kirim Pembayaran', '', 36000, 'DKI Jakarta', 'Jakarta Pusat', '10540', 'Kota', 'OKE', '2-3', 2800),
(111, 4, '2023-06-07 04:06:47', '2023-06-10 04:06:47', 96000, 'jne', 'Jl. Damai, Oebufu, Oebobo, Kota Kupang', 'Sudah Kirim Pembayaran', '', 36000, 'DKI Jakarta', 'Jakarta Pusat', '10540', 'Kota', 'OKE', '2-3', 3200),
(112, 4, '2023-06-03 09:30:17', '2023-06-06 09:30:17', 117000, 'jne', 'Jl. Damai, Oebufu, Oebobo, Kota Kupang', 'Pending', '', 36000, 'DKI Jakarta', 'Jakarta Pusat', '10540', 'Kota', 'OKE', '2-3', 2800),
(113, 4, '2023-06-10 16:35:13', '2023-06-13 16:35:13', 78000, 'jne', 'Jl. Damai, Oebufu, Oebobo, Kota Kupang', 'Pending', '', 42000, 'DKI Jakarta', 'Jakarta Pusat', '10540', 'Kota', 'REG', '1-2', 3000),
(114, 4, '2023-06-14 04:33:59', '2023-06-17 04:33:59', 66000, 'pos', 'Jl. Damai, Oebufu, Oebobo, Kota Kupang', 'Sudah Kirim Pembayaran', '', 36000, 'DKI Jakarta', 'Jakarta Pusat', '10540', 'Kota', 'Pos Reguler', '2 HARI', 3400),
(115, 2, '2023-06-19 08:21:45', '2023-06-22 08:21:45', 564000, 'tiki', 'Jl.Sukun, Oesapa, Oesapa Timur, Kota Kupang', 'Pending', '', 148000, 'Nusa Tenggara Timur (NTT)', 'Kupang', '85119', 'Kota', 'REG', '3', 3200),
(116, 4, '2023-06-19 08:25:29', '2023-06-22 08:25:29', 122000, 'jne', 'Jl. Damai, Oebufu, Oebobo, Kota Kupang', 'Pending', '', 42000, 'DKI Jakarta', 'Jakarta Pusat', '10540', 'Kota', 'REG', '1-2', 3200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_menu`
--

CREATE TABLE `pembelian_menu` (
  `id_pembelian_menu` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_kedai` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_menu`
--

INSERT INTO `pembelian_menu` (`id_pembelian_menu`, `id_pembelian`, `id_menu`, `id_kedai`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(1, 1, 1, 1, 3, 'Kopi Susu1', 15000, 45000),
(2, 1, 2, 2, 2, 'Kopi Susu2', 15000, 30000),
(3, 2, 1, 1, 3, 'Kopi Susu1', 15000, 45000),
(4, 2, 6, 6, 3, 'Kopi Susu6', 15000, 45000),
(42, 35, 2, 0, 3, '', 0, 0),
(43, 36, 3, 0, 4, 'Produk Ngasal', 25000, 100000),
(44, 40, 2, 0, 1, '', 0, 0),
(45, 41, 2, 0, 4, '', 0, 0),
(46, 42, 2, 0, 6, '', 0, 0),
(47, 43, 0, 0, 0, '', 0, 0),
(48, 44, 1, 0, 5, '', 0, 0),
(49, 45, 1, 0, 5, '', 0, 0),
(50, 46, 1, 0, 6, 'Aneka Bubuk Bumbu Dapur : Bawang Putih', 20000, 120000),
(51, 50, 2, 0, 2, 'Produk Souvenir Hampers Ramadhan', 56000, 112000),
(52, 51, 2, 0, 1, 'Produk Souvenir Hampers Ramadhan', 56000, 56000),
(53, 52, 1, 0, 6, 'Aneka Bubuk Bumbu Dapur : Bawang Putih', 20000, 120000),
(54, 53, 2, 0, 3, 'Aneka Bubuk Bumbu Dapur : Bawang Putih', 20000, 60000),
(55, 53, 2, 0, 4, 'Produk Souvenir Hampers Ramadhan', 56000, 224000),
(56, 54, 3, 0, 5, 'Produk Ngasal', 25000, 125000),
(57, 55, 2, 0, 2, 'Produk Ngasal', 25000, 50000),
(58, 55, 2, 0, 6, 'Produk Souvenir Hampers Ramadhan', 56000, 336000),
(59, 56, 1, 0, 3, 'Aneka Bubuk Bumbu Dapur : Bawang Putih', 20000, 60000),
(60, 57, 2, 0, 1, 'Produk Souvenir Hampers Ramadhan', 56000, 56000),
(61, 58, 3, 0, 2, 'Produk Ngasal', 25000, 50000),
(62, 59, 3, 0, 1, 'Produk Ngasal', 25000, 25000),
(63, 60, 1, 0, 2, 'Aneka Bubuk Bumbu Dapur : Bawang Putih', 20000, 40000),
(64, 61, 2, 0, 1, 'Produk Souvenir Hampers Ramadhan', 56000, 56000),
(65, 62, 3, 0, 1, 'Produk Ngasal', 25000, 25000),
(66, 63, 1, 0, 2, 'Aneka Bubuk Bumbu Dapur : Bawang Putih', 20000, 40000),
(67, 64, 3, 0, 3, 'Produk Ngasal', 25000, 75000),
(68, 65, 2, 0, 2, 'Produk Souvenir Hampers Ramadhan', 56000, 112000),
(69, 66, 2, 0, 7, 'Produk Souvenir Hampers Ramadhan', 56000, 392000),
(70, 67, 1, 0, 4, 'Aneka Bubuk Bumbu Dapur : Bawang Putih', 20000, 80000),
(71, 0, 1, 0, 9, 'Aneka Bubuk Bumbu Dapur : Bawang Putih', 20000, 180000),
(72, 0, 1, 0, 4, 'Aneka Bubuk Bumbu Dapur : Bawang Putih', 20000, 80000),
(73, 68, 3, 0, 4, 'Produk Ngasal', 25000, 100000),
(74, 69, 2, 0, 8, 'Produk Souvenir Hampers Ramadhan', 56000, 448000),
(75, 70, 3, 0, 5, 'Produk Ngasal', 25000, 125000),
(76, 71, 1, 0, 1, 'Aneka Bubuk Bumbu Dapur : Bawang Putih', 20000, 20000),
(77, 72, 1, 0, 1, 'Aneka Bubuk Bumbu Dapur : Bawang Putih', 20000, 20000),
(78, 73, 3, 0, 3, 'Produk Ngasal', 25000, 75000),
(79, 74, 10, 2, 5, 'Vanilla Jelly', 20000, 100000),
(80, 75, 9, 1, 7, 'Avocado Choco', 27000, 189000),
(81, 76, 8, 1, 3, 'Kapten Makaroni', 27000, 81000),
(82, 77, 1, 1, 2, 'Keripik Pisang', 18000, 36000),
(83, 77, 7, 1, 2, 'Abon Mamike', 15000, 30000),
(84, 78, 7, 1, 7, 'Abon Mamike', 15000, 105000),
(85, 78, 9, 1, 4, 'Corn Chips', 27000, 108000),
(86, 79, 7, 1, 9, 'Abon Mamike', 15000, 135000),
(87, 80, 20, 4, 3, 'Cendol Ori', 12000, 36000),
(88, 81, 2, 2, 1, 'Botol Minum Siap Pakai', 15000, 15000),
(89, 82, 1, 1, 2, 'Keripik Pisang', 18000, 36000),
(90, 83, 20, 4, 4, 'Cendol Ori', 12000, 48000),
(91, 84, 1, 1, 8, 'Keripik Pisang', 18000, 144000),
(92, 85, 20, 4, 4, 'Cendol Ori', 12000, 48000),
(93, 86, 1, 1, 2, 'Keripik Pisang', 18000, 36000),
(94, 87, 8, 1, 2, 'Kapten Makaroni', 27000, 54000),
(95, 87, 9, 1, 3, 'Corn Chips', 27000, 81000),
(96, 88, 20, 4, 6, 'Cendol Ori', 12000, 72000),
(97, 88, 21, 4, 2, 'Cendol Dawet', 15000, 30000),
(98, 89, 1, 1, 1, 'Keripik Pisang', 18000, 18000),
(99, 90, 7, 1, 2, 'Abon Mamike', 15000, 30000),
(100, 91, 9, 1, 2, 'Corn Chips', 27000, 54000),
(101, 92, 1, 1, 2, 'Keripik Pisang', 18000, 36000),
(102, 93, 9, 1, 3, 'Corn Chips', 27000, 81000),
(103, 94, 10, 2, 3, 'Botol Serum Siap Pakai', 20000, 60000),
(104, 95, 7, 1, 3, 'Abon Mamike', 15000, 45000),
(105, 95, 8, 1, 3, 'Kapten Makaroni', 27000, 81000),
(106, 96, 7, 1, 2, 'Abon Mamike', 15000, 30000),
(107, 97, 1, 1, 2, 'Keripik Pisang', 18000, 36000),
(108, 97, 9, 1, 3, 'Corn Chips', 27000, 81000),
(109, 98, 8, 1, 3, 'Kapten Makaroni', 27000, 81000),
(110, 99, 10, 2, 4, 'Botol Serum Siap Pakai', 20000, 80000),
(111, 100, 11, 2, 3, 'Bibit Sawi Pakcoy Siap Pakai', 15000, 45000),
(112, 101, 8, 1, 4, 'Kapten Makaroni', 27000, 108000),
(113, 0, 26, 4, 3, 'Keranjang Rotan ', 89000, 267000),
(114, 102, 26, 4, 4, 'Keranjang Rotan ', 89000, 356000),
(115, 103, 21, 4, 4, 'Cendol Dawet', 15000, 60000),
(116, 104, 26, 4, 4, 'Keranjang Rotan ', 89000, 356000),
(117, 105, 11, 2, 8, 'Bibit Sawi Pakcoy Siap Pakai', 15000, 120000),
(118, 106, 12, 2, 3, 'Bibit Kubis Hijau Siap Pakai', 25000, 75000),
(119, 107, 7, 1, 3, 'Abon Mamike', 15000, 45000),
(120, 108, 12, 2, 4, 'Bibit Kubis Hijau Siap Pakai', 25000, 100000),
(121, 0, 8, 1, 4, 'Kapten Makaroni', 27000, 108000),
(122, 0, 1, 1, 4, 'Keripik Pisang', 18000, 72000),
(123, 0, 9, 1, 3, 'Corn Chips', 27000, 81000),
(124, 0, 9, 1, 3, 'Corn Chips', 27000, 81000),
(125, 0, 9, 1, 3, 'Corn Chips', 27000, 81000),
(126, 0, 9, 1, 6, 'Corn Chips', 27000, 162000),
(127, 0, 9, 1, 3, 'Corn Chips', 27000, 81000),
(128, 109, 9, 1, 6, 'Corn Chips', 27000, 162000),
(129, 110, 9, 1, 4, 'Corn Chips', 27000, 108000),
(130, 111, 10, 2, 3, 'Botol Serum Siap Pakai', 20000, 60000),
(131, 112, 9, 1, 3, 'Corn Chips', 27000, 81000),
(132, 113, 20, 4, 3, 'Cendol Ori', 12000, 36000),
(133, 114, 11, 2, 2, 'Bibit Sawi Pakcoy Siap Pakai', 15000, 30000),
(134, 115, 26, 4, 4, 'Keranjang Rotan ', 89000, 356000),
(135, 115, 10, 2, 3, 'Botol Serum Siap Pakai', 20000, 60000),
(136, 116, 10, 2, 4, 'Botol Serum Siap Pakai', 20000, 80000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kedai`
--
ALTER TABLE `kedai`
  ADD PRIMARY KEY (`id_kedai`);

--
-- Indeks untuk tabel `kotak_pesan`
--
ALTER TABLE `kotak_pesan`
  ADD PRIMARY KEY (`id_kotak_pesan`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_menu`
--
ALTER TABLE `pembelian_menu`
  ADD PRIMARY KEY (`id_pembelian_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kedai`
--
ALTER TABLE `kedai`
  MODIFY `id_kedai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kotak_pesan`
--
ALTER TABLE `kotak_pesan`
  MODIFY `id_kotak_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `pembelian_menu`
--
ALTER TABLE `pembelian_menu`
  MODIFY `id_pembelian_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
