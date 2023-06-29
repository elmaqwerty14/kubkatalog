<?php
if (!isset($_SESSION)) {
    session_start();
}
$koneksi = new mysqli("127.0.0.1", "user", "test", "untukkatakog");
