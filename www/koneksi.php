<?php
if (!isset($_SESSION)) {
    session_start();
}
$koneksi = new mysqli("localhost", "root", "1", "untukkatakog");
