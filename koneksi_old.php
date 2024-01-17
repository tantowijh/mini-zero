<?php
function koneksi()
{
    $hostname = "aws.connect.psdb.cloud";
    $dbName = "skillzone__studios";
    $username = "lupngs9penu04928ubon__zonestudio";
    $password = "pscale__zonestudio__pw_VCwPj7T1HfCzHvWtDBJsHgQZg0Md8aeGFkWrGZ9Z0kG";
    $port = 3306;
    $ssl = "/etc/ssl/cert.pem";

    // Set SSL cert and open connection to the MySQL server
    $mysqli = mysqli_init();
    $mysqli->ssl_set(NULL, NULL, $ssl, NULL, NULL);
    $mysqli->real_connect($hostname, $username, $password, $dbName, $port);

    if ($mysqli->connect_error) {
        die("Koneksi gagal: " . $mysqli->connect_error);
    }

    return $mysqli;
}
?>