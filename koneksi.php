<?php

$envFilePath = __DIR__ . '/.env';

if (!file_exists($envFilePath)) {
    die('Environment file not found');
}

$env = parse_ini_file($envFilePath);

if (!$env) {
    die('Failed to parse environment file');
}

// Mengatur koneksi ke database
$hostname = $env['DB_HOST'] ?? die('DB_HOST not set');
$username = $env['DB_USERNAME'] ?? die('DB_USERNAME not set');
$password = $env['DB_PASSWORD'] ?? die('DB_PASSWORD not set');
$dbName = $env['DB_NAME'] ?? die('DB_NAME not set');
$port = $env['DB_PORT'] ?? die('DB_PORT not set');
$ssl = $env['MYSQL_ATTR_SSL_CA'] ?? '';

// Mengatur SSL untuk koneksi ke database
$koneksi = mysqli_init();
$koneksi->ssl_set(NULL, NULL, $ssl, NULL, NULL);
$koneksi->real_connect($hostname, $username, $password, $dbName, $port);

if ($koneksi->connect_error) {
    die("Gagal terhubung ke MySQL: " . $koneksi->connect_error);
}


// Download the latest certificates
$certUrl1 = "https://letsencrypt.org/certs/isrgrootx1.pem";
$certUrl2 = "https://curl.se/ca/cacert.pem";
$certContent1 = @file_get_contents($certUrl1);
$certContent2 = @file_get_contents($certUrl2);

if ($certContent1 === false) {
    error_log('Failed to download certificate 1');
}

if ($certContent2 === false) {
    error_log('Failed to download certificate 2');
}

// Ensure the directory exists and is writable
$dirPath = __DIR__ . '/database/ssl';
if (!is_dir($dirPath)) {
    if (!@mkdir($dirPath, 0777, true)) {
        error_log('Failed to create directory');
    }
} elseif (!is_writable($dirPath)) {
    error_log('Directory is not writable');
}

// Save the certificates to the directory
$certFilePath1 = $dirPath . '/isrgrootx1.pem';
$certFilePath2 = $dirPath . '/cacert.pem';
$result1 = @file_put_contents($certFilePath1, $certContent1);
$result2 = @file_put_contents($certFilePath2, $certContent2);

if ($result1 === false) {
    error_log('Failed to save certificate 1');
}

if ($result2 === false) {
    error_log('Failed to save certificate 2');
}