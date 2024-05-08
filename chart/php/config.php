<?php
$hostname = "localhost"; // Hapus titik dua setelah "localhost"
$username = "root";
$password = "";
$dbname = "chatapp";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if(!$conn){
  echo "Database connection error: " . mysqli_connect_error();
  exit(); // Keluar dari skrip jika koneksi gagal
}

// Pastikan koneksi berhasil sebelum menggunakan mysqli_real_escape_string()
$email = mysqli_real_escape_string($conn, 'yasir@gmail.com');
// Lanjutan kode Anda...