<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

include 'koneksi.php';

// jika belum ada session pembeli(belum login), maka dibawah ke login.php
if (!isset($_SESSION["pembeli"])) {
    echo "<script>alert('Anda Belum Login');</script>";
    echo "<script>location='login_pembeli.php';</script>";
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KUB MERCI</title>
    <link rel="shortcut icon" href="logonew.jpeg">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/styleindex.css" rel="stylesheet">
    <link href="css/checkout.css" rel="stylesheet">
</head>

<style>
    /* NAVBAR */
    .navbar-nav li {
        padding: 0 2px;
        color: #fff;
    }

    #navbarNav ul li div.isi a {
        color: #FFF;
        border-bottom: 2px solid transparent;
        border-top: 2px solid transparent;
    }

    #navbarNav ul li div.isi a:hover {
        border-bottom: 2px solid #DE831D;
    }


    /* NAVBAR DROPDOWN */
    .dropdown-menu {
        display: none;
    }

    .navbar-nav li:hover>div.dropdown-menu {
        display: block;
        color: #000;
        font-size: 14px;
    }

    .dropdown-menu a:hover {
        color: #DE831D;
        font-weight: bold;
    }
</style>

<body>
    <?php include 'navbar.php'; ?>

    <!-- BREADCRUMB -->
    <div class="container">
        <nav aria-label="breadcrumb" style="background-color: #FFF;" class="mt-3">
            <ol class="breadcrumb p-3">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat Belanja</li>
            </ol>
        </nav>
    </div>
    <!-- END BREADCRUMB -->

    <!-- RIWAYAT BELANJA -->
    <div class="container">
        <div class="judul-kedai pt-4" style="background-color: #FFF; padding: 5px 10px;">
            <h5 class="daftar text-center" style="margin-top: 5px; margin-bottom: -5px; font-weight: bold; text-transform: uppercase;">RIWAYAT BELANJA <b class="pembeli" style="color: #DE831D;"><?php echo $_SESSION["pembeli"]["nama"] ?></b>
            </h5>
        </div>

        <div class="row row-keranjang">
            <div class="col table-responsive mt-3 mx-3">
                <table class="table align-middle text-center table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col" class="th-header">No</th>
                            <th scope="col" class="th-header">Tanggal Beli</th>
                            <th scope="col" class="th-header">Tanggal Expired Nota</th>
                            <th scope="col" class="th-header">Status Beli</th>
                            <th scope="col" class="th-header">Resi Pengiriman</th>
                            <th scope="col" class="th-header">Total Beli</th>
                            <th scope="col" class="th-header">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider align-middle">
                        <?php $nomor = 1; ?>
                        <?php $sts = "Bayar Langsung Di Toko"; ?>
                        <?php $resi = "---"; ?>
                        <!-- konfigurasi pagination -->
                        <?php

                        // mendapatkan id_pembeli yang login
                        $id_pembeli = $_SESSION["pembeli"]["id_pembeli"];
                        $jumlahDataPerHalaman = 5;
                        $jumlahData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_pembeli ='$id_pembeli'"));
                        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
                        $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
                        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

                        ?>

                        <?php

                        // mendapatkan id_pembeli yang login
                        $id_pembeli = $_SESSION["pembeli"]["id_pembeli"];
                        $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembeli ='$id_pembeli' ORDER BY id_pembelian DESC LIMIT $awalData, $jumlahDataPerHalaman"); ?>
                        <?php
                        while ($pecah = $ambil->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo date("d F Y, H:i", strtotime($pecah['tgl_pembelian'])) ?></td>
                                <td onload="get_ipk()"><?php echo date("d F Y, H:i", strtotime($pecah['tgl_expired'])) ?></td>
                                <!-- <td style="color: #DE831D;"><?php echo date("d F Y, H:i", strtotime($pecah['tgl_expired'])) ?></td> -->
                                <td>
                                    <?php if ($pecah['id_kurir'] == 5) : ?>
                                    <?php echo $sts; ?>
                                    <?php else : ?>
                                    <?php echo $pecah["status_pembelian"] ?>
                                    <?php endif ?>
                                    <!-- <?php if (!empty($pecah['resi_pengiriman'])): ?>
                                    <?php echo $pecah['resi_pengiriman']; ?>
                                    <?php endif ?> -->
                                </td>
                                <td>
                                    <?php if (!empty($pecah['resi_pengiriman'])): ?>
                                    <?php echo $pecah['resi_pengiriman']; ?>
                                    <?php else : ?>
                                    <?php echo $resi; ?>
                                    <?php endif ?>     
                                </td>
                                <td>Rp. <?php echo number_format($pecah["finaltotalbelanjabeli"]); ?></td>
                                <td>
                                    <?php if ($pecah['id_kurir'] == 5) : ?>
                                    <a href="nota.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-sm btn-primary nota mt-1 mb-1" id="btn-nota-<?php echo $pecah['id_pembelian']; ?>"><i class="fa fa-envelope"></i>&nbsp;Nota Kurir 5 <?php echo $pecah['id_pembelian']; ?></a>&nbsp;
                                    <?php else : ?>
                                    <a href="nota.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-sm btn-primary nota mt-1 mb-1" id="btn-nota-<?php echo $pecah['id_pembelian']; ?>"><i class="fa fa-envelope"></i>&nbsp;Nota </a>&nbsp;

                                        <?php if ($pecah['status_pembelian'] == "Pending") : ?>
                                            <a href="pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-sm btn-secondary input mt-1 mb-1" id="btn-bayar-<?php echo $pecah['id_pembelian']; ?>">
                                                <i class="fa-solid fa-dollar-sign"></i>&nbsp;Bayar 
                                            </a>

                                        <?php else : ?>
                                            <a href="lihatPembayaran.php?id=<?php echo ($pecah["id_pembelian"]); ?>" class="btn btn-sm btn-warning lihat mt-1 mb-1"><i class="fa fa-eye"></i>&nbsp;Lihat Pembayaran </a>

                                        <?php endif ?>

                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END RIWAYAT BELANJA -->

    <!-- navigasi pagination -->

    <nav class="page mt-4">
        <ul class="pagination justify-content-center">
            <!-- tombol sebelumnya -->
            <?php if ($halamanAktif > 1) { ?>
                <li class="page-item"><a href="?halaman=<?php echo $halamanAktif - 1; ?>" class="page-link" style="color: #000000;">Kembali</a></li>
            <?php } else { ?>
                <li class="page-item disabled"><a href="?halaman=<?php echo $halamanAktif - 1; ?>" class="page-link">Kembali</a></li>
            <?php } ?>
            <!-- akhir tombol sebelumnya -->

            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if ($i == $halamanAktif) : ?>
                    <li class="page-item"><a href="?halaman= <?php echo $i; ?>" class="page-link" style="background-color: #CCC; color: #000000;"><?php echo $i; ?></a>
                    </li>
                <?php else : ?>
                    <li class="page-item"><a href="?halaman= <?php echo $i; ?>" class="page-link" style="color: #000000;"><?php echo $i; ?></a>
                    </li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($halamanAktif < $jumlahHalaman) { ?>
                <li class="page-item"><a href="?halaman= <?php echo $halamanAktif + 1; ?>" class="page-link" style="color: #000000;">Lanjut</a></li>
            <?php } else { ?>
                <li class="page-item disabled"><a href="?halaman= <?php echo $halamanAktif + 1; ?>" class="page-link">Lanjut</a></li>
            <?php } ?>

        </ul>
    </nav>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/70cd04957d.js" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            <?php $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembeli ='$id_pembeli'"); ?>
            <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                var tanggalexpired = "<?php echo date('Y-m-d H:i:s', strtotime($pecah['tgl_expired'])); ?>";
                var tanggalSekarang = new Date();
                var timestamp1 = Date.parse(tanggalexpired);
                var timestamp2 = tanggalSekarang.getTime();
                if (timestamp1 < timestamp2) {
                    // $("#btn-nota-<?php echo $pecah['id_pembelian'];?>").removeAttr( "href" )
                    // $("#btn-nota-<?php echo $pecah['id_pembelian'];?>").addClass( "disabled" )
                    $("#btn-bayar-<?php echo $pecah['id_pembelian'];?>").removeAttr( "href" )
                    $("#btn-bayar-<?php echo $pecah['id_pembelian'];?>").addClass( "disabled" )
                }
            <?php } ?>
        })
    </script>
</body>

</html>