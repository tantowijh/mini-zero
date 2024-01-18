<?php
ini_set('display_errors', 0);

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

include 'koneksi.php';

function tabelPendidikan($koneksi){
    $sql = "SHOW TABLES LIKE 'data_pendidikan'";
    return $koneksi->query($sql)->num_rows > 0;
}

function dataPendidikan($koneksi){
    $sql = "SELECT * FROM data_pendidikan";
    return $koneksi->query($sql);
}

function ddl_tabel($koneksi){
    $sql = "CREATE TABLE IF NOT EXISTS data_pendidikan (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        tingkat VARCHAR(7) NOT NULL,
        nama_sekolah VARCHAR(35) NOT NULL,
        jurusan VARCHAR(25) NOT NULL,
        tahun_mulai INT(4) NOT NULL,
        tahun_selesai INT(4) NOT NULL,
        nilai_akhir FLOAT(4,2) NOT NULL,
        bersertifikat VARCHAR(5) NOT NULL
    )";
    return $koneksi->query($sql);
}

function dml_select_all($koneksi){
    $sql = "SELECT * FROM data_pendidikan";
    return $koneksi->query($sql);
}

function dml_select($koneksi, $id){
    $sql = "SELECT * FROM data_pendidikan WHERE id = $id";
    return $koneksi->query($sql);
}

function dml_insert($koneksi, $data){
    $sql = "INSERT INTO data_pendidikan (tingkat, nama_sekolah, jurusan, tahun_mulai, tahun_selesai, nilai_akhir, bersertifikat)
            VALUES ('$data[tingkat]', '$data[nama_sekolah]', '$data[jurusan]', '$data[tahun_mulai]', '$data[tahun_selesai]', '$data[nilai_akhir]', '$data[bersertifikat]')";
    return $koneksi->query($sql);
}

function dml_update($koneksi, $data, $id){
    $sql = "UPDATE data_pendidikan SET tingkat='$data[tingkat]', nama_sekolah='$data[nama_sekolah]', jurusan='$data[jurusan]', 
            tahun_mulai='$data[tahun_mulai]', tahun_selesai='$data[tahun_selesai]', nilai_akhir='$data[nilai_akhir]', 
            bersertifikat='$data[bersertifikat]' WHERE id='$id'";
    return $koneksi->query($sql);
}

function dml_delete($koneksi, $id){
    $sql = "DELETE FROM data_pendidikan WHERE id='$id'";
    return $koneksi->query($sql);
}