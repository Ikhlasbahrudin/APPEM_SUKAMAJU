<?php 
require '../koneksi.php';
$id = $_GET['id']; // Ambil ID dari URL

// Ambil nama file foto terkait tanggapan
$query_foto = mysqli_query($koneksi, "SELECT foto FROM tanggapan WHERE id_tanggapan = '$id'");
$foto = mysqli_fetch_assoc($query_foto);
$nama_file = $foto['foto'];

$sql = "DELETE FROM tanggapan WHERE id_tanggapan='$id'"; // Query hapus data

if (mysqli_query($koneksi, $sql)) { // Coba jalankan query
    // Jika berhasil, hapus juga foto terkait
    $file_path = "../foto/" . $nama_file;
    if (file_exists($file_path)) {
        unlink($file_path); // Hapus foto dari direktori
    }

    echo "<script type='text/javascript'>
        alert('Data Berhasil Dihapus');
        window.location='lihat_tanggapan.php';
    </script>"; // Jika berhasil, tampilkan pesan sukses dan redirect ke halaman lihat_tanggapan.php
} else {
    echo "<script type='text/javascript'>
        alert('Error: " . mysqli_error($koneksi) . "'); // Jika gagal, tampilkan pesan error
        window.location='lihat_tanggapan.php';
    </script>";
}