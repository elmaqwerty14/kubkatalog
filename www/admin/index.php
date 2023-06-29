<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda belum Sign In');</script>";
    echo "<script>location='login.php';</script>";
    exit;
}
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Kub Merci</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <!-- bootstrap import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- chartjs import -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .dropdown-menu[data-bs-popper] {
            left: unset !important;
            right: 0 !important;
        }

        .chartjs-render-monitor {
            display: block !important;
            width: 100% !important;
            height: 230px !important;
        }

        nav .breadcrumb .breadcrumb-item a {
            text-decoration: none !important;
            color: #000;
        }

        nav .breadcrumb .breadcrumb-item a:hover {
            color: #B66DFF;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- partial:partials/_navbar.html -->
        <?php include 'navTop.php'; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include 'navSide.php'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-home"></i>
                            </span> Dashboard
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card bg-gradient-danger">
                                <a href="daftarPembeli.php" class=" text-white" style="text-decoration: none;">
                                    <div class="card-body">
                                        <div class="d-flex flex-row align-items-top">
                                            <i class="mdi mdi-account-multiple icon-lg" style="margin-right: 8px !important;"></i>
                                            <div class="ml-3">
                                                <?php
                                                $data_pembeli = mysqli_query($koneksi, "SELECT * FROM pembeli");
                                                $jumlah_pembeli = mysqli_num_rows($data_pembeli);
                                                ?>
                                                <h5>Total <?php echo "$jumlah_pembeli"; ?> data</h5>
                                                <p class="mt-2 card-text">Pembeli</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card bg-gradient-primary">
                                <a href="daftarKedai.php" class="text-white" style="text-decoration: none;">
                                    <div class="card-body">
                                        <div class="d-flex flex-row align-items-top">
                                            <i class="mdi mdi-store icon-lg" style="margin-right: 8px !important;"></i>
                                            <div class="ml-3">
                                                <?php
                                                $data_kedai = mysqli_query($koneksi, "SELECT * FROM kedai");
                                                $jumlah_kedai = mysqli_num_rows($data_kedai);
                                                ?>
                                                <h5>Total <?php echo "$jumlah_kedai"; ?> data</h5>
                                                <p class="mt-2 card-text">Kedai</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card bg-gradient-success">
                                <a href="daftarKurir.php" class="text-white" style="text-decoration: none;">
                                    <div class="card-body">
                                        <div class="d-flex flex-row align-items-top">
                                            <i class="mdi mdi-format-list-bulleted menu icon-lg" style="margin-right: 8px !important;"></i>
                                            <div class="ml-3">
                                                <?php
                                                $data_kurir = mysqli_query($koneksi, "SELECT * FROM menu");
                                                $jumlah_kurir = mysqli_num_rows($data_kurir);
                                                ?>
                                                <h5>Total <?php echo "$jumlah_kurir"; ?> data</h5>
                                                <p class="mt-2 card-text">Produk & Jasa</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <h3 class="card-title float-left">Grafik Pembelian</h3>
                                        <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- canvas untuk grafik verifikasi-->
                                            <canvas id="myTypeBeasiswa" style="height:70vh; width:70vh; margin:0 auto;"></canvas>
                                        </div>
                                        <!-- canvas untuk grafik verifikasi -->
                                        <div class="col-md-6">
                                            <canvas id="myStatus" style="height:70vh; width:70vh; margin:0 auto;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include 'footer.php'; ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->


        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <script>
        <?php
            // define hostname, username, password, dbname
            $hostname = 'db';
            $username = 'user';
            $password = 'test';
            $dbname = 'untukkatakog';
            // koneksi ke database dengan definename
            
            $conn = mysqli_connect($hostname, $username, $password, $dbname);
            mysqli_set_charset($conn, "utf8");
            // pengecekan koneksi  ke database
            if(!$conn) {
                echo "koneksi gagal" + mysqli_connect_error();
            }
            ?>
        // define variabel chart typebeasiswa dan setup dataset
        const data = {
            labels: [
                'Pos Indonesia',
                'TIKI',
                'JNE',
            ],
            datasets: [{
                label: 'total',
                data: [
                    <?php 
                    // query untuk koneksi dan ambil data dari database
                    $qry = $conn->query("SELECT ekspedisi FROM pembelian  WHERE ekspedisi ='pos'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>,
                    <?php 
                    // query untuk koneksi dan ambil data dari database
                    $qry = $conn->query("SELECT ekspedisi FROM pembelian  WHERE ekspedisi ='tiki'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>,
                    <?php 
                    // query untuk koneksi dan ambil data dari database
                    $qry = $conn->query("SELECT ekspedisi FROM pembelian  WHERE ekspedisi ='jne'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                    'rgb(205, 133, 63)',
                ],
                hoverOffset: 4
            }]
        };  
        
        // variabel untuk konfigurasi chart
        const config = {
            type: 'polarArea',
            data: data
        };
        // untuk mengambil id dari elemen html dengan id myVerifikasi
        const myChart = new Chart(
            document.getElementById('myTypeBeasiswa'),
            config
            );


        // define variabel chart verifikasi
        const status = {
            labels: [
                'Pending',
                'Sudah Kirim Pembayaran',
            ],
            datasets: [{
                label: 'total',
                data: [
                    <?php 
                    // query untuk koneksi dan ambil data dari database
                    $qry = $conn->query("SELECT status_pembelian FROM pembelian WHERE status_pembelian='Pending'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>,
                    <?php 
                    // query untuk koneksi dan ambil data dari database
                    $qry = $conn->query("SELECT status_pembelian FROM pembelian WHERE status_pembelian='Sudah Kirim Pembayaran'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>
                ],
                // background untuk pie
                backgroundColor: [
                    'rgb(255, 205, 86)',
                    'rgb(176, 224, 230)'
                ],
                hoverOffset: 4
            }]
            };   
            
            // variabel untuk konfigurasi chart
            const confStatus = {
                type: 'polarArea',
                data: status,
            };
            
            // untuk mengambil id dari elemen html dengan id myVerifikasi
            const myChart1 = new Chart(
                document.getElementById('myStatus'),
                confStatus
                )
                

    </script>
    <!-- script end -->

<!-- import bootstrap chartjs -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>