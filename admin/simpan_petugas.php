<?php
require '../koneksi.php';

// Periksa apakah semua data sudah diisi
if(isset($_POST['nama_petugas'], $_POST['username'], $_POST['password'], $_POST['telp'], $_POST['level'])) {
    $nama = $_POST['nama_petugas'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];

    // Prevent SQL Injection
    $nama = mysqli_real_escape_string($koneksi, $nama);
    $user = mysqli_real_escape_string($koneksi, $user);
    $pass = mysqli_real_escape_string($koneksi, $pass);
    $telp = mysqli_real_escape_string($koneksi, $telp);
    $level = mysqli_real_escape_string($koneksi, $level);

    // Query untuk insert data baru ke tabel petugas
    $sql = "INSERT INTO petugas (nama_petugas, username, password, telp, level) VALUES ('$nama', '$user', '$pass', '$telp', '$level')";

    // Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        echo "<script type='text/javascript'>alert('Data Berhasil Disimpan'); window.location='lihat_petugas.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
} else {
    // Tampilkan pesan jika ada data yang belum diisi
    echo "<script type='text/javascript'>alert('Harap lengkapi semua data'); window.history.back();</script>";
}
