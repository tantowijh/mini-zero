<?php
include 'functions.php';

// Mengecek apakah tabel data_pendidikan sudah tersedia
$adaTabel = tabelPendidikan($koneksi);

if (!$adaTabel) {
    displayNoTable();
} else {

    // Menyiapkan data dari form untuk dimasukkan ke tabel data_pendidikan
    $data = [
        'id' => $_POST['id'],
        'tingkat' => $_POST['tingkat'],
        'nama_sekolah' => $_POST['nama_sekolah'],
        'jurusan' => $_POST['jurusan'],
        'tahun_mulai' => $_POST['tahun_mulai'],
        'tahun_selesai' => $_POST['tahun_selesai'],
        'nilai_akhir' => $_POST['nilai_akhir'],
        'bersertifikat' => $_POST['bersertifikat']
    ];

    // Mengupdate data ke tabel data_pendidikan
    $update_data = dml_update($koneksi, $data, $data['id']);
    
    // Mengecek apakah data berhasil diupdate
    if ($update_data) {
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Terjadi kesalahan dalam mengupdate data.";
        header("Location: index-error.php?error_message=" . urlencode($error_message));
        exit();
    }
}
?>