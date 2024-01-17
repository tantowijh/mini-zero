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
    $id = $_POST['id'];

    // Prepare the SQL statement
    $sql = "DELETE FROM data_pendidikan WHERE id='$id'";

    // Execute the SQL statement
    if ($koneksi->query($sql) === TRUE) {
        echo 'Data pendidikan berhasil dihapus.';
    } else {
        echo 'Error: ' . $sql . '<br>' . $koneksi->error;
    }
}

// Close the connection
$koneksi->close();
header("Location: index.php");
exit();
?>