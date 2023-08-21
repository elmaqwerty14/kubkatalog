<?php
if (!isset($_SESSION)) {
    session_start();
}
// local db connection
 $koneksi = new mysqli("localhost", "root", "", "untukkatakog");

// docker db connection
// $koneksi = new mysqli("db", "user", "test", "untukkatakog");

