<?php 
require '../koneksi.php';
$nik = $_GET['nik']; // Ambil ID dari URL

$sql = "DELETE FROM masyarakat WHERE nik='$nik'"; // Query hapus data

if (mysqli_query($koneksi, $sql)) { // Coba jalankan query
    echo "<script type='text/javascript'>
        alert('Data Berhasil Dihapus');
        window.location='lihat_masyarakat.php'; // Mengarahkan ke halaman lihat_masyarakat.php jika berhasil
    </script>"; // Jika berhasil, tampilkan pesan sukses dan redirect ke halaman lihat_masyarakat.php
} else {
    echo "<script type='text/javascript'>
        alert('Error: " . mysqli_error($koneksi) . "'); // Jika gagal, tampilkan pesan error
        window.location='lihat_masyarakat.php'; // Mengarahkan ke halaman lihat_masyarakat.php jika gagal
    </script>";
}
