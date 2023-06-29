<?php
include_once("koneksi.php");
$akun = $_GET['akunpem'];
$query =mysqli_query($koneksi, "SELECT provinsi FROM pembeli WHERE id_pembeli = '$akun'");
$data = mysqli_fetch_array($query);

echo json_encode($data[0]);

?>