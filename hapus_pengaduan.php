<?php
session_start(); // Mulai sesi di awal kode
require 'koneksi.php';

// Periksa apakah pengguna sudah login dan memiliki nama dan NIK
if (isset($_SESSION['nama']) && isset($_SESSION['nik'])) {
    // Jika pengguna sudah login, cek apakah pengguna adalah pemilik pengaduan yang ingin dihapus
    if (isset($_GET['id'])) {
        // Melakukan sanitasi terhadap ID untuk mencegah serangan SQL injection
        $id = mysqli_real_escape_string($koneksi, $_GET['id']);

        // Ambil data pengaduan untuk dicek pemiliknya
        $query_pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'");
        $pengaduan = mysqli_fetch_assoc($query_pengaduan);

        // Periksa apakah pengguna adalah pemilik pengaduan yang ingin dihapus
        if ($_SESSION['nama'] != $pengaduan['nama'] || $_SESSION['nik'] != $pengaduan['nik']) {
            // Jika bukan pemilik, tampilkan pesan bahwa pengaduan tidak dapat dihapus
            echo "<script>
                alert('Maaf, Anda tidak memiliki izin untuk menghapus pengaduan ini.');
                window.location='lihat_pengaduan.php';
              </script>";
            exit(); // Hentikan eksekusi script setelah menampilkan pesan
        }
    }
} else {
    // Jika pengguna belum login atau tidak memiliki nama dan NIK, redirect ke halaman login
    header('Location: login.php');
    exit(); // Hentikan eksekusi script setelah melakukan redirect
}

// Lanjutkan proses penghapusan jika pengguna adalah pemilik pengaduan
// Ambil nama file foto terkait pengaduan
$query_foto = mysqli_query($koneksi, "SELECT foto FROM pengaduan WHERE id_pengaduan = '$id'");
$foto = mysqli_fetch_assoc($query_foto);
$nama_file = $foto['foto'];

// Persiapkan query untuk menghapus data
$sql = "DELETE FROM pengaduan WHERE id_pengaduan='$id'";

// Jalankan query untuk menghapus data
if (mysqli_query($koneksi, $sql)) {
    // Jika query berhasil, hapus juga foto terkait
    $file_path = "foto/" . $nama_file;
    if (file_exists($file_path)) {
        unlink($file_path); // Hapus foto dari direktori
    }

    // Redirect ke lihat_laporan.php
    echo "<script>
                alert('Data Berhasil Dihapus');
                window.location='lihat_pengaduan.php';
              </script>";
    exit(); // Hentikan eksekusi script setelah melakukan redirect
} else {
    // Jika terjadi kesalahan pada query, tampilkan pesan error
    echo "<script>
                alert('Error: " . mysqli_error($koneksi) . "');
                window.location='lihat_pengaduan.php';
              </script>";
    exit(); // Hentikan eksekusi script setelah melakukan redirect
}
?>