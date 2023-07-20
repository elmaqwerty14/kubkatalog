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
    .card-body input{
        border: double;
        outline: none;
        background: transparent;
        color: #000;
    }
    .card-body textarea{
        border: double;
        outline: none;
        background: transparent;
        color: #000;
    }
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
                            </span> Produk dan Jasa
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Produk & Jasa</li>
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
                                <h4 class="card-title">Tambah Produk & Jasa</h4>
                                <hr>
                                <div class="card-body">
                                     <form method="post" enctype="multipart/form-data">
                                      <div class="form-group row">
                                        <div class="col-md-2">
                                          <label>Nama Produk</label>
                                        </div>
                                        <div class="col-md-10">
                                          <input type="text" class="form-control" name="nama_menu" required="">
                                        </div>
                                      </div>

                                    <div class="form-group row">
                                        <div class="col-md-2">
                                          <label>No Etalase</label>
                                        </div>
                                        <div class="col-md-10">
                                          <input type="number" class="form-control" name="id_kedai" required="">
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <div class="col-md-2">
                                          <label>Harga Produk</label>
                                        </div>
                                        <div class="col-md-10">
                                          <input type="number-format" class="form-control" name="harga_menu" required="">
                                        </div>
                                      </div>


                                      <div class="form-group row">
                                        <div class="col-md-2">
                                          <label>Deskripsi Produk</label>
                                        </div>
                                        <div class="col-md-10">
                                          <textarea type="text" class="form-control" name="deskripsi_menu" required=""></textarea>
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <div class="col-md-2">
                                          <label>Gambar Produk</label>
                                        </div>
                                        <div class="col-md-10">
                                          <input type="file" class="form-control" name="foto_menu" required="">
                                        </div>
                                      </div>


                                      <div class="form-group row">
                                        <div class="col-md-2">
                                          <label>Stok Produk</label>
                                        </div>
                                        <div class="col-md-10">
                                          <input type="number" class="form-control" name="stok_menu" required="">
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <div class="col-md-2">
                                          <label>Berat Produk (Gram)</label>
                                        </div>
                                        <div class="col-md-10">
                                          <input type="number" class="form-control" name="berat_produk" required="">
                                        </div>
                                      </div>

                                      <button class="btn btn-sm btn-primary" name="save"><i class="fa fa-check"></i>&nbsp;Simpan</button>
                                    </form>

                                    <?php 
                                      if (isset($_POST['save']))
                                      {
                                        $nama = $_FILES ['foto_menu']['name'];
                                        $lokasi = $_FILES ['foto_menu']['tmp_name'];
                                        move_uploaded_file($lokasi, "../menu_kedai/".$nama);
                                        $koneksi->query ("INSERT INTO menu
                                        (nama_menu,id_kedai,harga_menu,deskripsi_menu,foto_menu, stok_menu, berat_produk)
                                        VALUES ('$_POST[nama_menu]','$_POST[id_kedai]','$_POST[harga_menu]','$_POST[deskripsi_menu]','$nama','$_POST[stok_menu]','$_POST[berat_produk]')");

                                        echo "<script>alert('Data Berhasil Ditambah');</script>";
                                        echo "<script>location.href='daftarmenu.php';</script>";
                                      }
                                     ?> 
                                  </div>
                                  <!-- /.card-body -->

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
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    <!-- DataTables  & Plugins -->
    <?php include 'jsDataTable.php'; ?>
</body>

</html>