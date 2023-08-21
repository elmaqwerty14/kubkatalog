<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include 'koneksi.php';
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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
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

    #btn {
        width: 30%;
        padding: 7px 9px;
        border: none;
        background-color: #4345E7;
        color: #FFF;
        cursor: pointer;
        border-radius: 7px;
    }

    #btn:hover {
        background-color: #000;
    }
</style>

<body>
    <?php include 'navbar.php'; ?>

    <!-- HOME -->

    <section id="home" class="home">
        <div class="media-icons">
            <a href="https://www.facebook.com/p/KUB-MERCI-kec-Cilongok-100076704667062/"><i class="uil uil-facebook-f"></i></a>
            <a href="https://www.instagram.com/kubmerciofficial/"><i class="uil uil-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCqoghb2J3J2Wjl0c0Cv_G5w"><i class="uil uil-youtube"></i></a>
        </div>
        <div class="swiper bg-slider" style="width: 84%; height: 8px; margin-top: 2px;">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="img1" ></div>
                    <div class="text-content">
                        <h2 class="title">Welcome !</h2>
                        <p> E-Katalog KUB MERCI Cilongok Dusun I, Pernasidi, Kec. Cilongok, Kabupaten Banyumas, Jawa Tengah 53162 Portal.</p>
                        <a href="#kedai"><button class="read-btn">Produk Kami <i class="uil uil-arrow-right"></i></button></a>
                    </div>
                </div>
                <div class="swiper-slide dark-layer">
                    <div class="img2"></div>
                    <div class="text-content">
                        <h2 class="title">Welcome !</h2>
                        <p> E-Katalog KUB MERCI Cilongok Dusun I, Pernasidi, Kec. Cilongok, Kabupaten Banyumas, Jawa Tengah 53162 Portal.</p>
                        <a href="#kedai"><button class="read-btn">Produk Kami <i class="uil uil-arrow-right"></i></button></a>
                    </div>
                </div>
                <div class="swiper-slide dark-layer">
                    <div class="img3"></div>
                    <div class="text-content">
                        <h2 class="title">Welcome !</h2>
                        <p> E-Katalog KUB MERCI Cilongok Dusun I, Pernasidi, Kec. Cilongok, Kabupaten Banyumas, Jawa Tengah 53162 Portal.</p>
                        <a href="#kedai"><button class="read-btn">Produk Kami <i class="uil uil-arrow-right"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-slider-thumbs">
            <div class="swiper-wrapper thumbs-container">
                <img src="img/b3.jpg" class="swiper-slide" alt="">
                <img src="img/b2.jpg" class="swiper-slide" alt="">
                <img src="img/b1.jpg" class="swiper-slide" alt="">
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <!-- DAFTAR KEDAI -->
    <div id="kedai" class="container mt-4">
        <div class="judul-kedai pt-3 pb-3" style="background-color: #FFF; padding: 5px 10px;">
            <h5 class="daftar text-center" style="margin-top: 5px; font-weight: bold;">Produk & Jasa Kami</h5>
            <div class="border" style="width: 90px; height: 5px; background: #DE831D; border-radius: 6px; margin: 2px auto;"></div>
        </div>
        <div class="row text-center row-container justify-content-center">
            <?php $ambil = $koneksi->query("SELECT * FROM kedai"); ?>
            <?php while ($perkedai = $ambil->fetch_assoc()) { ?>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="daftar-kedai">
                        <a href="menu_kedai.php?id=<?php echo ($perkedai['id_kedai']); ?>"><img src="gambar_kedai/<?php echo ($perkedai['logo_kedai']); ?>" class="gambar-kedai mt-3" alt=""></a>
                        <p class="mt-2" style="font-style: italic;"><b><?php echo ($perkedai['nama_kedai']); ?></b></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- END DAFTAR KEDAI -->

    <!-- HUBUNGI KAMI -->
    <div id="contactUs" class="container mt-4">
        <div class="judul-kedai pt-3" style="background-color: #FFF; padding: 5px 10px;">
            <h5 class="daftar text-center" style="margin-top: 5px; font-weight: bold;">HUBUNGI KAMI</h5>
            <div class="border" style="width: 90px; height: 5px; background: #DE831D; border-radius: 6px; margin: 2px auto;"></div>
        </div>
        <div class="row text-center row-container justify-content-center">
            <div class="col-md-5 mx-2 my-2">
                <img src="gambar/contactus12.gif" style="width: 100%; height: 50vh;" alt="">
            </div>
            <div class="col-md-5 mx-2 my-2 pb-2">
                <form method="POST" class="pt-2 pb-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nama_client" placeholder="nama_client" id="nama_client" required>
                        <label for="nama_client">Nama Anda / contoh : Nicholas Saputra</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="wa" name="wa" placeholder="wa" required>
                        <label for="wa">No. WhatsApp / contoh : 6285123456789</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="pesan" id="pesan" name="pesan" style="height: 100px" required></textarea>
                        <label for="pesan">Pesan Anda</label>
                    </div>
                    <button id="btn" name="submit" style="float: right;">Kirim Pesan</button>
                </form>
                <?php
                if (isset($_POST["submit"])) {
                    $tgl = date("Y-m-d H:i:s");
                    $nama_client = $_POST['nama_client'];
                    $wa = $_POST['wa'];
                    $pesan = $_POST['pesan'];
                    $koneksi->query("INSERT INTO kotak_pesan (tgl,nama_client,wa,pesan) VALUES ('$tgl','$nama_client','$wa', '$pesan')");
                    echo "<script>alert('Pesan Anda telah dikirim');</script>";
                    echo "<script>location='index.php;</script>";
                } 
                ?>

            </div>
        </div>
    </div>
    <!-- END HUBUNGI KAMI -->
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>

    <?php include 'footer.php'; ?>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/943a58e089.js" crossorigin="anonymous"></script>

</body>

</html>