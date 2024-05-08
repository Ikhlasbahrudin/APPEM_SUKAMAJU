<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'appem';

    // Membuat koneksi
    $koneksi = new mysqli($host, $user, $password, $database);

    // Periksa koneksi
    if ($koneksi->connect_error) {
        die('Koneksi gagal: ' . $koneksi->connect_error);
    }