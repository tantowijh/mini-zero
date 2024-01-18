<?php
include 'functions.php';

// Mengecek apakah tabel data_pendidikan sudah tersedia
$adaTabel = tabelPendidikan($koneksi);

if (!$adaTabel) {
    echo 'Tabel data_pendidikan belum tersedia. Silakan buat tabel terlebih dahulu.';
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
        echo 'Data berhasil diupdate';
    } else {
        echo 'Data gagal diupdate';
    }
}

header("Location: index.php");
exit();
?>