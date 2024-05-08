<?php

require '../koneksi.php';

$id_pengaduan = $_POST['id_pengaduan'];
$tgl = $_POST['tgl_tanggapan'];
$tanggapan = $_POST['tanggapan'];
$id_petugas = $_POST['id_petugas'];
$st = 'selesai';

// Query untuk menambahkan tanggapan
$sql_tanggapan = "INSERT INTO tanggapan(id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('$id_pengaduan', '$tgl', '$tanggapan', '$id_petugas')";
// Jalankan query untuk menambahkan tanggapan
$result_tanggapan = mysqli_query($koneksi, $sql_tanggapan);

// Query untuk memperbarui status pengaduan menjadi selesai
$sql_update = "UPDATE pengaduan SET status='$st' WHERE id_pengaduan='$id_pengaduan'";
// Jalankan query untuk memperbarui status
$result_update = mysqli_query($koneksi, $sql_update);

if ($result_tanggapan && $result_update) {
    ?>
    <script type="text/javascript">
        alert('Data Sudah Ditanggapi');
        window.location = "verifikasi_pengaduan.php";
    </script>
<?php
} else {
    echo "Error: " . mysqli_error($koneksi);
}

?>

