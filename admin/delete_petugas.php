<?php 
require '../koneksi.php';
$id = $_GET['id']; // Ambil ID dari URL

$sql = "DELETE FROM petugas WHERE id_petugas='$id'"; // Query hapus data

if (mysqli_query($koneksi, $sql)) { // Coba jalankan query
    echo "<script type='text/javascript'>
        alert('Data Berhasil Dihapus');
        window.location='lihat_petugas.php';
    </script>"; // Jika berhasil, tampilkan pesan sukses dan redirect ke halaman lihat_petugas.php
} else {
    echo "<script type='text/javascript'>
        alert('Error: " . mysqli_error($koneksi) . "'); // Jika gagal, tampilkan pesan error
        window.location='lihat_petugas.php';
    </script>";
}