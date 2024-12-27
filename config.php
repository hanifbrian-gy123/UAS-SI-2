<?php
// DEFINE BASEPATH DAN BASEURL
define('BASEPATH', $_SERVER["DOCUMENT_ROOT"] . "/UAS-SI-2");
define('BASEURL', "https://your-railway-app-url"); // Ganti dengan URL aplikasi Railway Anda

// KREDENSIAL DATABASE DARI ENVIRONMENT VARIABLES
$host = getenv('MYSQLHOST') ?: 'localhost';
$username = getenv('MYSQLUSER') ?: 'root';
$password = getenv('MYSQLPASSWORD') ?: '';
$dbname = getenv('MYSQLDATABASE') ?: 'smart';
$port = getenv('MYSQLPORT') ?: 3306;

// KONEKSI KE DATABASE
define('DB', mysqli_connect($host, $username, $password, $dbname, $port));

if (!DB) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
