-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2023 pada 20.21
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 1, 'Keripik Pisang', 18000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'WhatsApp Image 2023-04-23 at 02.00.45.jpeg', 336, 1200),
(2, 2, 'Botol Minum Siap Pakai', 15000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'WhatsApp Image 2023-04-23 at 02.11.27.jpeg', 385, 1500),
(7, 1, 'Abon Mamike', 15000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'WhatsApp Image 2023-04-23 at 02.00.44 (1).jpeg', 465, 1300),
(8, 1, 'Kapten Makaroni', 27000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'WhatsApp Image 2023-04-23 at 02.00.45 (1).jpeg', 81, 1100),
(9, 1, 'Corn Chips', 27000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'WhatsApp Image 2023-04-23 at 02.00.44.jpeg', 445, 1400),
(10, 2, 'Botol Serum Siap Pakai', 20000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'WhatsApp Image 2023-04-23 at 02.11.26.jpeg', 472, 1600),
(11, 2, 'Bibit Sawi Pakcoy Siap Pakai', 15000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'a2f930f2aed2baee0d89ca47b8ba075b.jpeg', 387, 1700),
(12, 2, 'Bibit Kubis Hijau Siap Pakai', 25000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id cum quasi a repellendus necessitatibus accusantium praesentium sit! Odit beatae culpa facere deleniti fugit fuga consequatur dolores. Eligendi, amet cupiditate?', 'images.jpeg', 493, 1900),
(24, 3, 'PPOB & Agen Deposit Pulsa ALL Operator', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris convallis ante ac orci aliquam varius. Integer vitae semper nunc. Nullam vehicula elementum fringilla. Donec vitae metus rutrum, rutrum ligula eget, gravida est. Nunc dictum dui est, eget suscipit urna convallis ut. Praesent sit amet molestie mi. Integer porttitor porta sodales. Fusce purus magna, dapibus eu lobortis eget, dignissim et quam. Maecenas consectetur sit amet risus gravida convallis. Proin a vehicula mi, at ultricies risus. Nam semper tellus id tortor volutpat, sit amet blandit ex egestas. Vivamus quis lacus nec tortor consequat pulvinar. Fusce eget ullamcorper erat, in interdum magna. Morbi pretium risus in felis viverra, non maximus velit faucibus. Vestibulum scelerisque eleifend risus, quis semper sem tristique et. Pellentesque ac congue elit.', 'rbi_pulsa_banner_icon.png', 13, 1100),
(25, 3, 'Jasa Menjahit Segala Jenis Pakaian ', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae libero id risus finibus egestas et eget nibh. Integer in placerat tortor. Etiam porttitor tortor enim, ut malesuada erat luctus eget. Donec diam lectus, varius non convallis at, lacinia non tellus. Etiam vestibulum accumsan odio, varius commodo augue hendrerit sit amet. Quisque condimentum orci sapien, nec facilisis neque interdum ut. Nulla eget nibh ligula. Fusce malesuada tellus ut purus porttitor, id commodo massa tincidunt.', 'WhatsApp Image 2023-04-22 at 23.56.18 (2).jpeg', 13, 1400),
(26, 4, 'Keranjang Rotan ', 89000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'produk keranjang rotan karakter strawberry.jpg', 9, 1500);

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
(19, 121, 'Ifan Baletty', 'BANK BNI', '2023-06-26', '81000', '10259342_4359230.jpg'),
(20, 120, 'Elma Kiu', 'BANK BRI', '2023-06-26', '63000', 'hasilsentimen.png'),
(21, 122, 'Elma Kiu', 'BANK BCA', '2023-06-26', '75000', 'relasi tabel kub merci.PNG');

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
(1, 'Karlos Nende', ' Jl. Embong Kenongo No 17 Surabaya ', '085111253741', 'karlos@gmail.com', 'karlos', 'Jawa Timur', 'Surabaya', 'Kota', '60119', '444'),
(2, 'Ekhy Welo', 'Jl.Sukun, Oesapa, Oesapa Timur, Kota Kupang', '085239777999', 'eky@gmail.com', 'eky', 'Nusa Tenggara Timur (NTT)', 'Kupang', 'Kota', '85119', '213'),
(3, 'Desty Miha Balo', 'Jl. Air Lobang 3, Maulafa, Sikumana, Kota Kupang', '082266229669', 'desty@gmail.com', 'desty', '', '', '', '', ''),
(4, 'Elma Kiu', 'Jl. Damai, Oebufu, Oebobo, Kota Kupang', '085238970733', 'elma@gmail.com', 'elma', 'DI Yogyakarta', 'Yogyakarta', 'Kota', '55111', '501'),
(5, 'Ifan Baletty', 'Jl. RE. Martadinata, Potongan Kec. Cilacap Sel., Kabupaten Cilacap, Jawa Tengah 53211', '081334456210', 'ifan@gmail.com', 'ifan', 'Jawa Tengah', 'Cilacap', 'Kabupaten', '53211', '105'),
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
  `tgl_pembelian` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_expired` timestamp NOT NULL DEFAULT current_timestamp(),
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
  `total_berat` int(11) NOT NULL,
  `have_seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pembeli`, `tgl_pembelian`, `tgl_expired`, `finaltotalbelanjabeli`, `ekspedisi`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `ongkir`, `provinsi`, `distrik`, `kodepos`, `tipe`, `paket`, `estimasi`, `total_berat`, `have_seen`) VALUES
(120, 4, '2023-06-26 07:17:17', '2023-06-29 07:17:17', 63000, 'jne', 'Jl. Damai, Oebufu, Oebobo, Kota Kupang', 'Sudah Kirim Pembayaran', '', 18000, 'DKI Jakarta', 'Jakarta Pusat', '10540', 'Kota', 'OKE', '2-3', 2600, 0),
(121, 5, '2023-06-26 07:23:07', '2023-06-29 07:23:07', 81000, 'pos', 'Jl. RE. Martadinata, Potongan, Tambakreja, Kec. Cilacap Sel., Kabupaten Cilacap, Jawa Tengah 53211', 'Barang Dikirim', '789FGT', 36000, 'Jawa Tengah', 'Cilacap', '53211', 'Kabupaten', 'Pos Reguler', '2 HARI', 3000, 1),
(122, 4, '2023-06-26 14:16:46', '2023-06-29 14:16:46', 75000, 'jne', 'Jl. Damai, Oebufu, Oebobo, Kota Kupang', 'Sudah Kirim Pembayaran', '', 21000, 'DKI Jakarta', 'Jakarta Pusat', '10540', 'Kota', 'REG', '1-2', 2400, 1);

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
(140, 120, 7, 1, 3, 'Abon Mamike', 15000, 45000),
(141, 121, 2, 2, 3, 'Botol Minum Siap Pakai', 15000, 45000),
(142, 122, 1, 1, 3, 'Keripik Pisang', 18000, 54000);

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
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kedai` (`id_kedai`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `pembelian_menu`
--
ALTER TABLE `pembelian_menu`
  ADD PRIMARY KEY (`id_pembelian_menu`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_kedai` (`id_kedai`),
  ADD KEY `id_menu` (`id_menu`);

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
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT untuk tabel `pembelian_menu`
--
ALTER TABLE `pembelian_menu`
  MODIFY `id_pembelian_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kedai`) REFERENCES `kedai` (`id_kedai`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian_menu`
--
ALTER TABLE `pembelian_menu`
  ADD CONSTRAINT `pembelian_menu_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
