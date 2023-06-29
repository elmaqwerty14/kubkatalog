<?php
session_start();
//koneksi ke database
include 'koneksi.php';

// mendapatkan id_menu dari url
$id_get = $_GET["id"];
$id_menu = $_GET["id"];

// query ambil data
$ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu = '$id_menu'");
$detail = $ambil->fetch_assoc();
// echo "<pre>";
// print_r($detail);
// echo "</pre>";

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
    <link href="css/styleDetailMenu.css" rel="stylesheet">
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

    .input-group input[type="number"] {
        border: 2px solid #D8D6D6;
        box-shadow: none;
        height: 48px;
    }

    .input-group input[type="number"]:focus {
        border: 2px solid #000;
    }
</style>

<body>
    <?php include 'navbar.php'; ?>

    <!-- BREADCRUMB -->
    <div class="container">
        <nav aria-label="breadcrumb" style="background-color: #FFF;" class="mt-3">
            <ol class="breadcrumb p-3">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Produk & Jasa KUB Merci</li>
            </ol>
        </nav>
    </div>
    <!-- END BREADCRUMB -->

    <!-- DETAIL MENU -->
    <div class="container">
        <div class="row row-detail-menu">
            <?php if ($detail['id_kedai'] == 3) : ?>
            <div class="col-lg-5">
                <figure class="figure">
                    <img src="menu_kedai/<?php echo $detail["foto_menu"]; ?>" class="figure-img img-fluid" style="border-radius: 5px; width: 450px; height: 450px;" alt="...">
                </figure>
            </div>

            <div class="col-lg-7">
                <h4><b><?php echo $detail["nama_menu"]; ?></b></h4>
                <div class="garis-judul-menu"></div>
                <!-- <h3 class="mb-2" font-size: 15px; style="color: #DE831D;"><b><?php echo $detail["deskripsi_menu"]; ?></b></h3> -->

                <div class="container">
                    <div class="row row-deskripsi-menu">
                            <!-- <div class="garis-judul-menu"></div> -->
                            <p><?php echo $detail["deskripsi_menu"]; ?></p>

                        
                    </div>
                </div>

                <form method="post">
                    <div class="form-group">
                        <!-- <div class="input-group">
                            <input type="number" style="max-width: 300px; font-size: 15px; border-radius: 7px;" min="1" max="<?php echo $detail["stok_menu"]; ?>" class="form-control" name="jumlah" placeholder="Masukan jumlah yang ingin dibeli" required>
                            <p style="margin: auto 10px;"><b><?php echo $detail["stok_menu"]; ?> cup tersisa</b></p>
                        </div> -->
                        <div class="input-group-btn mt-3 mb-3">
                          <?php if (isset($_SESSION["pembeli"])) : ?>

                                <!-- <button a href="https://wa.me/6285338381819?text=Halo%20Admin%2C%20mau%20tanya%20dongg..." name="beli_sekarang" style="color: #FFF;"><i class="btn btn-outline-success"></i>&nbsp;Informasi Lebih Lanjut</button> -->

                                <!-- <a href="https://wa.me/6285338381819?text=Halo%20Admin%2C%20mau%20tanya%20dongg..." class="tombol_contact_us"><img src="wabaru.png"></a> -->

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://wa.me/6285735501035?text=Halo Admin"class="btn" img src="wabaru.png" style="color: #FFF; background-color: #25D366;"><i class="fas fa-comments" ></i>&nbsp;Informasi Lebih Lanjut</a>

                                <!-- <a href="https://wa.me/6285735501035?text=Halo Admin"><button class="btn" name="chatadmin" style="color: #FFF; background-color: #DE831D;"><i class="fas fa-comments"></i>&nbsp;Chat Via WhatsApp</button></a>&nbsp; -->



                            <?php else : ?>

                                <!-- <a href="login_pembeli.php" class="btn btn-light" style="color: #FFF; background-color: #DE831D;" onclick="return confirm('Silahkan login terlebih dahulu!')"><i class="btn btn-outline-success"></i>&nbsp;Informasi Lebih Lanjut</a>&nbsp; -->
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="login_pembeli.php" class="btn" img src="wabaru.png" style="color: #FFF; background-color: #25D366;"><i class="fas fa-comments" ></i>&nbsp;Informasi Lebih Lanjut</a>
                                <!-- <a href="login_pembeli.php" class="tombol_contact_us"><img src="wabaru.png"></a> -->
                                <!-- <a href="login_pembeli.php" class="btn btn-primary" style="color: #FFF;" onclick="return confirm('Silahkan login terlebih dahulu!')"><i class="fa fa-shopping-bag"></i>&nbsp;Beli Sekarang</a> -->

                            <?php endif ?>


                        </div>
                    </div>
                </form>
            </div>
            <?php else : ?>
            <div class="col-lg-5">
                <figure class="figure">
                    <img src="menu_kedai/<?php echo $detail["foto_menu"]; ?>" class="figure-img img-fluid" style="border-radius: 5px; width: 450px; height: 450px;" alt="...">
                </figure>
            </div>

            <div class="col-lg-7">
                <h4><b><?php echo $detail["nama_menu"]; ?></b></h4>
                <div class="garis-judul-menu"></div>
                <h3 class="mb-2" style="color: #DE831D;"><b>Rp. <?php echo number_format($detail["harga_menu"]); ?></b></h3>

                <form method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" style="max-width: 300px; font-size: 15px; border-radius: 7px;" min="1" max="<?php echo $detail["stok_menu"]; ?>" class="form-control" name="jumlah" placeholder="Masukan jumlah yang ingin dibeli" required>
                            <p style="margin: auto 10px;"><b><?php echo $detail["stok_menu"]; ?> Prdouk tersisa</b></p>
                        </div>
                        <div class="input-group-btn mt-3 mb-3">

                            <?php if (isset($_SESSION["pembeli"])) : ?>

                                <button class="btn" name="beli" style="color: #FFF; background-color: #DE831D;"><i class="fa-solid fa-cart-plus"></i>&nbsp;Masukan ke Keranjang</button>&nbsp;
                                <button class="btn btn-primary" name="beli_sekarang" style="color: #FFF;"><i class="fa fa-shopping-bag"></i>&nbsp;Beli Sekarang</button>

                            <?php else : ?>

                                <a href="login_pembeli.php" class="btn btn-light" style="color: #FFF; background-color: #DE831D;" onclick="return confirm('Silahkan login terlebih dahulu!')"><i class="fa-solid fa-cart-plus"></i>&nbsp;Masukan ke Keranjang</a>&nbsp;
                                <a href="login_pembeli.php" class="btn btn-primary" style="color: #FFF;" onclick="return confirm('Silahkan login terlebih dahulu!')"><i class="fa fa-shopping-bag"></i>&nbsp;Beli Sekarang</a>

                            <?php endif ?>

                        </div>
                    </div>
                </form>
            </div>
            <?php endif ?>
        </div>
    </div>
    <!-- END DETAIL MENU -->

    <?php
    // jika ada tombol beli
    if (isset($_POST["beli"])) {
        // mendapatkan jumlah yang diinputkan
        $jumlah = $_POST["jumlah"];
        if (!isset($_SESSION["keranjang"])) {
            $_SESSION["keranjang"] = array();
        }

        // masukan di keranjang belanja 
        $_SESSION["keranjang"][$id_get] = $jumlah;

        // var_dump($_SESSION["keranjang"]);
        // exit();
        // echo "<script>alert('Menu telah masuk ke keranjang belanja');</script>";
        echo "<script>location='keranjang.php';</script>";
    }
    ?>

    <?php
    // jika ada tombol beli_sekarang
    if (isset($_POST["beli_sekarang"])) {
        // mendapatkan jumlah yang diinputkan
        $jumlah = $_POST["jumlah"];
        if (!isset($_SESSION["keranjang"])) {
            $_SESSION["keranjang"] = array();
        }

        // masukan di keranjang belanja 
        $_SESSION["keranjang"][$id_get] = $jumlah;

        // var_dump($_SESSION["keranjang"]);
        // exit();
        // echo "<script>alert('Menu telah masuk ke keranjang belanja');</script>";
        echo "<script>location='co.php';</script>";
    }
    ?>

    <!-- DESKRIPSI MENU -->
    <div class="container">
        <?php if ($detail['id_kedai'] != 3) : ?>
        <div class="row row-deskripsi-menu">
            <div class="col-12">
                <h4><b>Deskripsi Produk</b></h4>
                <div class="garis-judul-menu"></div>
                <p><?php echo $detail["deskripsi_menu"]; ?></p>
            </div>
        </div>
        <?php endif ?>
    </div>
    <!-- END DESKRIPSI MENU -->

    <?php include 'footer.php'; ?>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/70cd04957d.js" crossorigin="anonymous"></script>
</body>

</html>