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
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
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
    /*section {
      width: 120%;
      margin-left: none;
    }*/
    /*.card-body {
      margin: 31px auto;
      width: 80%;
    }*/
    .card-body input{
        border: double;
        outline: none;
        background: transparent;
        color: #000;
    }
    /*.card-body table{
        width: 80%;
        border: double;
        outline: none;
        background: transparent;
        color: #000;
    }*/
</style>

<body>
    <div class="container-scroller">
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
                            </span> Transaksi
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                            </ol>
                        </nav>
                    </div>
                    <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-12">

                            <div class="card">
                              <!-- /.card-header -->
                              <div class="card-body">
                                <h4 class="card-title">Data Pembelian</h4>
                                <hr>

                                  <!-- <div class="row text-center">
                                        <form action="" method="post">
                                            <input type="text" name="keyword" size="50" autofocus placeholder=" Masukan kata kunci pencarian" autocomplete="off" style="height:29px; padding-bottom:5px;">&nbsp;
                                            <button type="submit" class="mdi mdi-search-web" name="cari"><i class="fa fa-search"></i></button>
                                        </form>             
                                  </div> -->

                                  <br>
                                  <table class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Tanggal</th>
                                        <th>Status Pembelian</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $nomor = 1; ?>
                                       <?php 
                                       //tombol pencarian     
                                      
                                      if (isset($_POST['cari'])) {
                                        $keyword = $_POST["keyword"];
                                        $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pembeli ON pembelian.id_pembeli=pembeli.id_pembeli WHERE 
                                          nama LIKE '%$keyword%' OR
                                          tgl_pembelian LIKE '%$keyword%' OR
                                          status_pembelian LIKE '%$keyword%' OR
                                          finaltotalbelanjabeli LIKE '%$keyword%' ");
                                        $pecah = $ambil->fetch_assoc();
                                      }
                                      //akhir tombol pencarian
                                       ?>
                                    
                                       <!-- konfigurasi pagination -->
                                      <?php  

                                      $jumlahDataPerHalaman = 5;
                                      $jumlahData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pembelian"));
                                      $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
                                      if (isset($_GET["halaman"])) {
                                        $halamanAktif = $_GET['halaman'];
                                      }
                                      else {
                                        $halamanAktif = 1;
                                      }
                                      $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

                                      ?>
                                      <!-- akhir konfigurasi pagination -->

                                      <?php
                                          $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pembeli 
                                      ON pembelian.id_pembeli=pembeli.id_pembeli
                                      WHERE pembelian.id_pembelian LIMIT $awalData, $jumlahDataPerHalaman");
                                      ?>
                                      
                                      <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                                      
                                      
                                      <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $pecah ['nama']; ?></td>
                                        <td><?php echo date("d F Y", strtotime($pecah ['tgl_pembelian'])); ?></td>
                                        <td><?php echo $pecah ['status_pembelian']; ?></td>
                                        <td>Rp. <?php echo number_format($pecah ['finaltotalbelanjabeli']); ?></td>
                                        <td>
                                          <a href="detailpembelian.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-sm btn-primary" title="Detail Pembelian"><i class="mdi mdi-eye"></i></a>&nbsp;

                                        <?php if ($pecah['status_pembelian']!=="Pending"):?>
                                        
                                          <a href="pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-sm btn-warning" title="Pembayaran"><i class="mdi mdi-cash-multiple"></i>&nbsp;</a> 
                                        <?php endif ?>
                                        </td>
                                      </tr>
                                      <?php $nomor++; ?>
                                      <?php } ?>

                                    </tbody>

                                  </table>
                                  <br>
          <!-- navigasi pagination -->

          <nav>
            <ul class="pagination justify-content-center">
              <!-- tombol sebelumnya -->
              <?php if ($halamanAktif <= 1) { ?>
                <li class="page-item disabled"><a href="?halaman= <?php echo $halamanAktif -1; ?>" class="page-link">Sebelumnya</a></li>
              <?php } else{ ?>
                <li class="page-item"><a href="?halaman= <?php echo $halamanAktif -1; ?>" class="page-link" style="color: #000000;">Sebelumnya</a></li>
              <?php } ?>
              <!-- akhir tombol sebelumnya -->


              <?php for ($i =1; $i<=$jumlahHalaman; $i++) { ?>
                <?php if ($i == $halamanAktif) : ?>
                    <li class="page-item"><a href="?halaman= <?php echo $i; ?>" class="page-link" style="background-color: #CCC; color: #000000;"><?php echo $i; ?>
                    </a></li>
                <?php else : ?>
                    <li class="page-item"><a href="?halaman= <?php echo $i; ?>" class="page-link" style="color: #000000;"><?php echo $i; ?>
                    </a></li>
            <?php endif; ?>
            <?php } ?>


            <!-- tombol selanjutnya -->
            <?php if ($halamanAktif >= $jumlahHalaman) { ?>
              <li class="page-item disabled"><a href="?halaman= <?php echo $halamanAktif +1; ?>" class="page-link">Selanjutnya</a></li>
            <?php } else{ ?>
              <li class="page-item"><a href="?halaman= <?php echo $halamanAktif +1; ?>" class="page-link" style="color: #000000;">Selanjutnya</a></li>
            <?php } ?>
            <!-- akhir tombol selanjutnya -->
          </ul> 
        </nav>
                                </div>                                        
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                      <!-- /.container-fluid -->
                    </section>

    <!-- /.content -->
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
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
     <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/70cd04957d.js" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    <!-- DataTables  & Plugins -->
    <?php include 'jsDataTable.php'; ?>
</body>

</html>