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
    .card-body select{
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
    .img-responsive {
        max-width: 100%;
        height: auto;
    }

    @media (max-width: 768px) {
        .img-responsive {
            max-width: 100%;
            height: auto;
        }
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

                                <!-- <?php 

                                // mendapatkan id_pembelian dari url
                                $id_pembelian = $_GET['id'];

                                // mengambil data pembayaran berdasarkan id_pembelian
                                $ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id_pembelian'");
                                $detail = $ambil->fetch_assoc();

                                ?> -->
                                <?php
                                $ambil = $koneksi->query("SELECT * FROM pembayaran JOIN pembelian 
                                ON pembayaran.id_pembelian=pembelian.id_pembelian
                                WHERE pembayaran.id_pembelian='$_GET[id]'");
                                $detail = $ambil->fetch_assoc();
                                ?>

                                <div class="row">
                                        <div class="col-md-10">
                                            <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Penyetor</th>
                                                <td><?php echo $detail ['nama']; ?></td>
                                            </tr>
                                            <!-- <tr>
                                                <th>Bank</th>
                                                <td><?php echo $detail ['bank']; ?></td>
                                            </tr> -->
                                            <tr>
                                                <th>Jumlah</th>
                                                <td>Rp. <?php echo number_format($detail ['total']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal</th>
                                                <td><?php echo date("d F Y", strtotime($detail ['tgl_bayar'])); ?></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                        <div class="col-bg-4">
                                            <img src="../buktiBayar/<?php echo $detail ['bukti']; ?>" class="img-responsive">
                                        </div>
                                </div>

                                     <form method="post">   
                                        <div class="form-group">
                                            <label>No. Resi Pengiriman</label>
                                            <input type="text" class="form-control" name="resi_pengiriman" value="<?php echo $detail['resi_pengiriman']; ?>" autofocus="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status_pembelian" required>
                                                <!-- <option value=""><?php echo $detail['status_pembelian']; ?></option> -->
                                                <option value=""><?php echo $detail['status_pembelian']; ?></option>
                                                <option value="Batal">Batal</option>
                                                <option value="Lunas">Lunas</option>
                                                <option value="Barang Dikirim">Barang Dikirim</option>
                                                <option value="Barang Sudah Sampai">Barang Sudah Sampai</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-sm btn-primary" name="proses"><i class="fa fa-check"></i>&nbsp;Proses</button>
                                     </form>


                                     <?php 
                                        if (isset($_POST["proses"]))
                                        {
                                            $resi_pengiriman = $_POST["resi_pengiriman"];
                                            $status_pembelian = $_POST["status_pembelian"];
                                            $koneksi->query("UPDATE pembelian SET resi_pengiriman = '$_POST[resi_pengiriman]',status_pembelian = '$_POST[status_pembelian]' WHERE id_pembelian = '$id_pembelian'");

                                            echo "<script>alert('Data Pembelian Terupdate');</script>";
                                            echo "<script>location='datapembelian.php';</script>";
                                        }
                                      ?>


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