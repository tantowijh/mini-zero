<?php
$hostname = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbName = $_ENV['DB_NAME'];
$port = $_ENV['PORT'];
$ssl = $_ENV['MYSQL_ATTR_SSL_CA'];

// Set SSL cert and open connection to the MySQL server
$koneksi = mysqli_init();
$koneksi->ssl_set(NULL, NULL, $ssl, NULL, NULL);
$koneksi->real_connect($hostname, $username, $password, $dbName, $port);

if ($koneksi->connect_error) {
    echo "Gagal terhubung ke MySQL: " . $koneksi->connect_error;
}
