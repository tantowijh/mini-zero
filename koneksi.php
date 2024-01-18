<?php

// Hapus baris dengan tanda *** jika composer autoload tidak dijalankan atau jika tidak menggunakan .env
ini_set('display_errors', 0); // ***
require_once 'vendor/autoload.php'; // ***
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // ***
$dotenv->safeLoad(); // ***

// Mengatur koneksi ke database ### , sesuaikan dengan konfigurasi database Anda langsung jika tidak menggunakan .env
$hostname = $_ENV['DB_HOST']; // ###
$username = $_ENV['DB_USERNAME']; // ###
$password = $_ENV['DB_PASSWORD']; // ###
$dbName = $_ENV['DB_NAME']; // ###
$port = $_ENV['PORT']; // ###
$ssl = $_ENV['MYSQL_ATTR_SSL_CA']; // ###

// Mengatur SSL untuk koneksi ke database
$koneksi = mysqli_init();
$koneksi->ssl_set(NULL, NULL, $ssl, NULL, NULL);
$koneksi->real_connect($hostname, $username, $password, $dbName, $port);

if ($koneksi->connect_error) {
    echo "Gagal terhubung ke MySQL: " . $koneksi->connect_error;
}
