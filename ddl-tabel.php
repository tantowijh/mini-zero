<?php
require_once 'koneksi.php';

// Create a new connection
$koneksi = koneksi();

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS data_pendidikan (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    tingkat VARCHAR(7) NOT NULL,
    nama_sekolah VARCHAR(30) NOT NULL,
    jurusan VARCHAR(25) NOT NULL,
    tahun_mulai INT(4) NOT NULL,
    tahun_selesai INT(4) NOT NULL,
    nilai_akhir FLOAT(4,2) NOT NULL,
    bersertifikat VARCHAR(5) NOT NULL
)";

if ($koneksi->query($sql) === TRUE) {
    echo "Tabel data_pendidikan berhasil dibuat.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Close the connection
$koneksi->close();

header("Location: index.php");
exit();
?>