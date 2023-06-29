<?php 
// include 'menu.php';
include '../koneksi.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin KUB Merci</title>
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
</style>

<body>

<div class="wrapper">
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">
          
          <div class="col-sm-6">
            <h1>Tambah Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                 <form method="post" enctype="multipart/form-data">
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Nama Menu</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="nama_menu" required="">
                    </div>
                  </div>

                <div class="form-group row">
                    <div class="col-md-2">
                      <label>No Kedai</label>
                    </div>
                    <div class="col-md-4">
                      <input type="number" class="form-control" name="id_kedai" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Harga Menu</label>
                    </div>
                    <div class="col-md-4">
                      <input type="number-format" class="form-control" name="harga_menu" required="">
                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Deskripsi Menu</label>
                    </div>
                    <div class="col-md-4">
                      <textarea type="text" class="form-control" name="deskripsi_menu" required=""></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Gambar Menu</label>
                    </div>
                    <div class="col-md-4">
                      <input type="file" class="form-control" name="foto_menu" required="">
                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-md-2">
                      <label>Stok Produk</label>
                    </div>
                    <div class="col-md-4">
                      <input type="number" class="form-control" name="stok_menu" required="">
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
                    (nama_menu,id_kedai,harga_menu,deskripsi_menu,foto_menu, stok_menu)
                    VALUES ('$_POST[nama_menu]','$_POST[id_kedai]','$_POST[harga_menu]','$_POST[deskripsi_menu]','$nama','$_POST[stok_menu]')");

                    echo "<script>alert('Data Berhasil Ditambah');</script>";
                    echo "<script>location='daftarmenu.php';</script>";
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
  </div>
  <!-- /.content-wrapper -->
   <?php include 'footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>

</html>