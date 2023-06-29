<?php
if (!isset($_SESSION)) {
    session_start();
}
$koneksi = new mysqli("db", "root", "1", "untukkatakog");
