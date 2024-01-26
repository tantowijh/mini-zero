<?php

$envFilePath = __DIR__ . '/.env';
$_ENV = parse_ini_file($envFilePath);

// Mengatur koneksi ke database
$hostname = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbName = $_ENV['DB_NAME'];
$port = $_ENV['DB_PORT'];
$ssl = isset($_ENV['MYSQL_ATTR_SSL_CA']) ? $_ENV['MYSQL_ATTR_SSL_CA'] : '';

// Mengatur SSL untuk koneksi ke database
$koneksi = mysqli_init();
$koneksi->ssl_set(NULL, NULL, $ssl, NULL, NULL);
$koneksi->real_connect($hostname, $username, $password, $dbName, $port);

if ($koneksi->connect_error) {
    echo "Gagal terhubung ke MySQL: " . $koneksi->connect_error;
}
