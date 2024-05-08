<?php 
require 'koneksi.php';

$tgl = date('Y/m/d');
$nik = $_POST['nik'];
$isi = $_POST['isi_laporan'];
$ft = $_FILES['foto']['name'];
$file = $_FILES['foto']['tmp_name'];
$long = $_POST['long'];
$lat = $_POST['lat'];
$st = 0;

// Gabungkan nilai longitude dan latitude menjadi satu string untuk kolom lokasi
$lokasi = $lat . ',' . $long;

// Tentukan lokasi upload file
$upload_folder = "foto/";

// Generate nama unik untuk file foto
$nama_file_baru = uniqid() . '_' . $ft;

// Set path file yang akan diupload
$upload_path = $upload_folder . $nama_file_baru;

// Eksekusi query
$sql = "INSERT INTO pengaduan(tgl_pengaduan, nik, isi_laporan, foto, lokasi, status) 
        VALUES ('$tgl', '$nik', '$isi', '$nama_file_baru', '$lokasi', '$st')";
$result = $koneksi->query($sql);

// Periksa apakah query berhasil dan file diunggah
if ($result && move_uploaded_file($file, $upload_path)) {
    ?>
<script type="text/javascript">
alert('Data Berhasil Disimpan, Terimakasih Sudah Menulis Laporan');
window.location = "masyarakat.php";
</script>
<?php
} else {
    // Tampilkan pesan kesalahan jika query atau upload gagal
    ?>
<script type="text/javascript">
alert('Error: Anda Belum Menulis Laporan Dan Unggah Foto');
window.location = "tulis_pengaduan.php";
</script>
<?php
}
?>