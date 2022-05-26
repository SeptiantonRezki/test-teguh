<?php

$host = 'localhost';
$nama = 'root';
$pass = '';
$db = 'db_keuangan_gereja';

$koneksi = mysqli_connect($host, $nama, $pass, $db);
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}