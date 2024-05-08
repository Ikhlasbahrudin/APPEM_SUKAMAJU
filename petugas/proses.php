<?php
require '../koneksi.php';

// Periksa apakah parameter id tersedia di URL
if (isset($_GET['id'])) {
    // Gunakan parameterized query untuk menghindari SQL injection
    $id_pengaduan = $_GET['id'];
    $query = "UPDATE pengaduan SET status='proses' WHERE id_pengaduan=?";
    $stmt = mysqli_prepare($koneksi, $query);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "i", $id_pengaduan);

    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        // Redirect ke halaman verifikasi_pengaduan
        header('Location: verifikasi_pengaduan.php');
        exit(); // Pastikan kode setelah header() tidak dieksekusi
    } else {
        echo "Gagal memperbarui status pengaduan.";
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    echo "ID Pengaduan tidak valid.";
}
