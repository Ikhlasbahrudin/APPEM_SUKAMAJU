<?php
require '../koneksi.php';

$nama = $_POST['nama_petugas'];
$user = $_POST['username'];
$pass = $_POST['password'];
$telp = $_POST['telp'];
$level = $_POST['level'];
$id=$_POST['id_petugas'];

$sql = "UPDATE petugas SET nama_petugas='$nama', username='$user', password='$pass', telp='$telp', level='$level' WHERE id_petugas='$id'";
if (mysqli_query($koneksi, $sql)) {
    echo "<script type='text/javascript'>alert('Data Berhasil Diubah'); 
    window.location='lihat_petugas.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
