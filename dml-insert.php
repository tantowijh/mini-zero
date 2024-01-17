<?php
require_once 'koneksi.php';

// Create a new connection
$koneksi = koneksi();

// Check if table exists
$tableExists = $koneksi->query("SHOW TABLES LIKE 'data_pendidikan'")->num_rows > 0;

if (!$tableExists) {
    echo 'Tabel data_pendidikan belum tersedia. Silakan buat tabel terlebih dahulu.';
} else {
    // Retrieve data from the form
    $tingkat = $_POST['tingkat'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $jurusan = $_POST['jurusan'];
    $tahun_mulai = $_POST['tahun_mulai'];
    $tahun_selesai = $_POST['tahun_selesai'];
    $nilai_akhir = $_POST['nilai_akhir'];
    $bersertifikat = $_POST['bersertifikat'];

    // Prepare the SQL statement    
    $sql = "INSERT INTO data_pendidikan (tingkat, nama_sekolah, jurusan, tahun_mulai, tahun_selesai, nilai_akhir, bersertifikat)
            VALUES ('$tingkat', '$nama_sekolah', '$jurusan', '$tahun_mulai', '$tahun_selesai', '$nilai_akhir', '$bersertifikat')";

    // Execute the SQL statement
    if ($koneksi->query($sql) === TRUE) {
        echo 'Data pendidikan berhasil disimpan.';
    } else {
        echo 'Error: ' . $sql . '<br>' . $koneksi->error;
    }
}

// Close the connection
$koneksi->close();
header("Location: index.php");
exit();
?>