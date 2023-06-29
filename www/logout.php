<?php 
session_start();

unset($_SESSION["pembeli"]);


echo "<script>alert('Anda Telah Logout');</script>";
echo "<script>location='index.php';</script>";
    // session_destroy();
    exit();

