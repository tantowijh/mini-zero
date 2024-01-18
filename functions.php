<?php
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

function dml_select($koneksi, $id){
    $sql = "SELECT * FROM data_pendidikan WHERE id = $id";
    return $koneksi->query($sql);
}

function dml_insert($koneksi, $data){
    $sql = "INSERT INTO data_pendidikan (tingkat, nama_sekolah, jurusan, tahun_mulai, tahun_selesai, nilai_akhir, bersertifikat)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $sql = $koneksi->prepare($sql);
    $sql->bind_param("sssssss", $data['tingkat'], $data['nama_sekolah'], $data['jurusan'], $data['tahun_mulai'], $data['tahun_selesai'], $data['nilai_akhir'], $data['bersertifikat']);
    return $sql->execute();
}

function dml_update($koneksi, $data, $id){
    $sql = "UPDATE data_pendidikan SET tingkat=?, nama_sekolah=?, jurusan=?, tahun_mulai=?, tahun_selesai=?, nilai_akhir=?, bersertifikat=? WHERE id=?";
    $sql = $koneksi->prepare($sql);
    $sql->bind_param("sssssssi", $data['tingkat'], $data['nama_sekolah'], $data['jurusan'], $data['tahun_mulai'], $data['tahun_selesai'], $data['nilai_akhir'], $data['bersertifikat'], $id);
    return $sql->execute();
}

function dml_delete($koneksi, $id){
    $sql = $koneksi->prepare("DELETE FROM data_pendidikan WHERE id=?");
    $sql->bind_param("i", $id);
    return $sql->execute();
}