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
                            </span> Etalase
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Etalase</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Etalase</h4>
                            <hr>
                            <div class="table-responsive">
                                <table id="example1" class="table table-hover">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Nama Etalase</th>
                                            <!-- <th>Telepon Kedai</th>
                                            <th>Email Kedai</th>
                                            <th>Alamat Kedai</th>
                                            <th>No. Rek</th>
                                            <th>Bank</th>
                                            <th>Rek atas nama</th> -->
                                            <th>Logo Etalase</th>
                                            <!-- <th>Pemilik</th>
                                            <th>NIK</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Username</th>
                                            <th>Password</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php $ambil = $koneksi->query("SELECT * FROM kedai"); ?>
                                        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-gradient-primary" data-toggle="modal" data-target="#ModalUbah<?php echo $pecah['id_kedai']; ?>" title="Ubah"><i class="mdi mdi-eyedropper"></i></a>
                                                    <a href="hapusKedai.php?id=<?php echo $pecah['id_kedai']; ?>" class="btn btn-sm btn-gradient-success" title="Hapus"><i class="mdi mdi-delete"></i></a>
                                                </td>
                                                <td><?php echo $pecah['nama_kedai']; ?></td>
                                                <!-- <td><?php echo $pecah['telepon_kedai']; ?></td>
                                                <td><?php echo $pecah['email_kedai']; ?></td>
                                                <td><?php echo $pecah['alamat_kedai']; ?></td>
                                                <td><?php echo $pecah['no_rekening']; ?></td>
                                                <td><?php echo $pecah['bank']; ?></td>
                                                <td><?php echo $pecah['rekening_atas_nama']; ?></td> -->
                                                <!-- <td><?php echo $pecah['logo_kedai']; ?></td> -->
                                                <td><img src="../gambar_kedai/<?php echo $pecah['logo_kedai']; ?>" style="width: 95px; height:95px; border-radius: 0;" alt=""></td>
                                                <!-- <td><?php echo $pecah['nama_pemilik']; ?></td>
                                                <td><?php echo $pecah['nik']; ?></td>
                                                <td><?php echo $pecah['tempat_lahir']; ?></td>
                                                <td><?php echo date("d F Y", strtotime($pecah['tanggal_lahir'])); ?></td>
                                                <td><?php echo $pecah['jk']; ?></td>
                                                <td><?php echo $pecah['alamat_pemilik']; ?></td>
                                                <td><?php echo date("d F Y", strtotime($pecah['tanggal_daftar'])); ?></td>
                                                <td><?php echo $pecah['email_pemilik']; ?></td>
                                                <td><?php echo $pecah['telepon_pemilik']; ?></td>
                                                <td><?php echo $pecah['username']; ?></td>
                                                <td><?php echo $pecah['password']; ?></td> -->
                                            </tr>

                                            <!-- Modal Ubah Data -->
                                            <div class="modal fade" id="ModalUbah<?php echo $pecah['id_kedai']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Ubah Data Etalase</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; outline: none;">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" enctype="multipart/form-data" action="daftarKedai.php?id=<?php echo $pecah['id_kedai']; ?>">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Nama Etalase :</label>
                                                                    <input type="text" class="form-control" name="nama_kedai" value="<?php echo $pecah['nama_kedai']; ?>">
                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <label class="col-form-label">Telepon Kedai :</label>
                                                                    <input type="number" class="form-control" name="telepon_kedai" value="<?php echo $pecah['telepon_kedai']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Email Kedai :</label>
                                                                    <input type="email" class="form-control" name="email_kedai" value="<?php echo $pecah['email_kedai']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Alamat Kedai :</label>
                                                                    <textarea class="form-control" name="alamat_kedai"><?php echo $pecah['alamat_kedai']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">No. Rekening :</label>
                                                                    <input type="number" class="form-control" name="no_rekening" value="<?php echo $pecah['no_rekening']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Bank :</label>
                                                                    <select class="form-control form-control-lg" name="bank" required>
                                                                        <option value="">Pilih Jenis Bank</option>
                                                                        <option <?php if ($pecah['bank'] == 'BANK BRI') {
                                                                                    echo "selected";
                                                                                } ?> value='BANK BRI'>BANK BRI</option>
                                                                        <option <?php if ($pecah['bank'] == 'BANK BCA') {
                                                                                    echo "selected";
                                                                                } ?> value='BANK BCA'>BANK BCA</option>
                                                                        <option <?php if ($pecah['bank'] == 'BANK MANDIRI') {
                                                                                    echo "selected";
                                                                                } ?> value='BANK MANDIRI'>BANK MANDIRI</option>
                                                                        <option <?php if ($pecah['bank'] == 'BANK NTT') {
                                                                                    echo "selected";
                                                                                } ?> value='BANK NTT'>BANK NTT</option>
                                                                        <option <?php if ($pecah['bank'] == 'BANK BNI') {
                                                                                    echo "selected";
                                                                                } ?> value='BANK BNI'>BANK BNI</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Rek Atas Nama :</label>
                                                                    <input type="text" class="form-control" name="rekening_atas_nama" value="<?php echo $pecah['rekening_atas_nama']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <img src="../gambar_kedai/<?php echo $pecah['logo_kedai']; ?>" alt="" width="450">
                                                                </div> -->
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Logo Etalase :</label>
                                                                    <input type="file" class="form-control" name="logo_kedai" value="<?php echo $pecah['logo_kedai']; ?>">
                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <label class="col-form-label">Pemilik :</label>
                                                                    <input type="text" class="form-control" name="nama_pemilik" value="<?php echo $pecah['nama_pemilik']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">NIK Pemilik :</label>
                                                                    <input type="number" class="form-control" name="nik" value="<?php echo $pecah['nik']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Tempat Lahir Pemilik :</label>
                                                                    <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $pecah['tempat_lahir']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Tanggal Lahir Pemilik :</label>
                                                                    <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $pecah['tanggal_lahir']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Jenis Kelamin :</label>
                                                                    <select class="form-control form-control-lg" name="jk" required>
                                                                        <option value="">Pilih Jenis Kelamin</option>
                                                                        <option <?php if ($pecah['jk'] == 'Laki - Laki') {
                                                                                    echo "selected";
                                                                                } ?> value='Laki - Laki'>Laki - Laki</option>
                                                                        <option <?php if ($pecah['jk'] == 'Perempuan') {
                                                                                    echo "selected";
                                                                                } ?> value='Perempuan'>Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Alamat Pemilik :</label>
                                                                    <textarea class="form-control" name="alamat_pemilik"><?php echo $pecah['alamat_pemilik']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Tanggal Daftar :</label>
                                                                    <input type="date" class="form-control" name="tanggal_daftar" value="<?php echo $pecah['tanggal_daftar']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Email Pemilik :</label>
                                                                    <input type="email" class="form-control" name="email_pemilik" value="<?php echo $pecah['email_pemilik']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Telepon Pemilik :</label>
                                                                    <input type="number" class="form-control" name="telepon_pemilik" value="<?php echo $pecah['telepon_pemilik']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Username :</label>
                                                                    <input type="text" class="form-control" name="username" value="<?php echo $pecah['username']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Password :</label>
                                                                    <input type="text" class="form-control" name="password" value="<?php echo $pecah['password']; ?>">
                                                                </div>
 -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" name="ubah">Ubah</button>
                                                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                        </form>
                                                        <?php
                                                        if (isset($_POST['ubah'])) {
                                                            $namafoto = $_FILES['logo_kedai']['name'];
                                                            $lokasifoto = $_FILES['logo_kedai']['tmp_name'];

                                                            // jika foto dirubah
                                                            if (!empty($lokasifoto)) {
                                                                move_uploaded_file($lokasifoto, "../gambar_kedai/$namafoto");
                                                                $sql = "UPDATE kedai SET nama_kedai = '$_POST[nama_kedai]',logo_kedai = '$namafoto' WHERE id_kedai = '$_GET[id]'";
                                                            } else {
                                                                $sql = "UPDATE kedai SET nama_kedai = '$_POST[nama_kedai]' WHERE id_kedai = '$_GET[id]'";
                                                            }

                                                            $koneksi->query($sql);
                                                            if ($koneksi) {

                                                                echo "<script>alert('Data Berhasil Diubah');</script>";
                                                                echo "<script>location='daftarkedai.php';</script>";
                                                            } else {
                                                                echo "<script>alert('Data Gagal Diubah');</script>";
                                                                echo "<script>history.back();</script>";
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Ubah Data -->

                                            <?php $nomor++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
    <!-- <?php include 'jsDataTable.php'; ?> -->
</body>

</html>