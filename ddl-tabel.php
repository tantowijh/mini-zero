<?php
include 'functions.php';

// Memanggil fungsi untuk membuat tabel data_pendidikan
$ddl_tabel = ddl_tabel($koneksi);

// Mengecek apakah tabel data_pendidikan berhasil dibuat
if ($ddl_tabel) {
    echo 'Tabel data_pendidikan berhasil dibuat';
} else {
    echo 'Tabel data_pendidikan gagal dibuat';
}

header("Location: index.php");
exit();
?>