<?php
function koneksi() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mini_zero";

    // Membuat koneksi
    $koneksi = new mysqli($servername, $username, $password, $database);

    // Memeriksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    return $koneksi;
}
?>