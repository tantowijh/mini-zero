<?php
include 'functions.php';

// Mengecek apakah tabel data_pendidikan sudah tersedia
$adaTabel = tabelPendidikan($koneksi);

if (!$adaTabel) {
    echo 'Tabel data_pendidikan belum tersedia. Silakan buat tabel terlebih dahulu.';
} else {
    // Menyiapkan id untuk dihapus
    $id = $_POST['id'];

    // Menghapus data dari tabel data_pendidikan
    $delete_data = dml_delete($koneksi, $id);

    // Mengecek apakah data berhasil dihapus
    if ($delete_data) {
        echo 'Data berhasil dihapus';
    } else {
        echo 'Data gagal dihapus';
    }

}

header("Location: index.php");
exit();
?>