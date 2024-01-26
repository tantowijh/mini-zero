<?php
include 'functions.php';

// Memanggil fungsi untuk membuat tabel data_pendidikan
$ddl_tabel = ddl_tabel($koneksi);

// Mengecek apakah tabel data_pendidikan berhasil dibuat
if ($ddl_tabel) {
    header("Location: index.php");
    exit();
} else {
    $error_message = "Terjadi kesalahan dalam membuat tabel.";
    header("Location: index-error.php?error_message=" . urlencode($error_message));
    exit();
}
