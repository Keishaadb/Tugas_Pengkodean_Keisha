<?php
$koneksi = mysqli_connect("localhost", "root", "", "sistem_perpustakaan");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
