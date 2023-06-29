<h2>Hapus Data Pesan</h2>

<?php include '../koneksi.php'; ?>

<?php
$ambil = $koneksi->query("SELECT * FROM kotak_pesan WHERE id_kotak_pesan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM kotak_pesan WHERE id_kotak_pesan='$_GET[id]'");
echo "<script>alert('Data Pesan Telah Dihapus');</script>";
echo "<script>location='datacs.php';</script>";
?>