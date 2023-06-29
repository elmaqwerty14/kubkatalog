<?php
if (!isset($_SESSION)) {
    session_start();
}
$koneksi = new mysqli("localhost:2022", "root", "1", "untukkatakog");
